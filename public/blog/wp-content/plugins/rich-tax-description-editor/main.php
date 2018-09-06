<?php
/*
Plugin Name: Rich Tax Description Editor
Plugin URI: http://wordpress.org/support/plugin/rich-tax-description-editor
Description: Turns Description field on Taxonomy pages into the full scale Rich Text Editor.
Version: 1.2.4
Author: Davit Barbakadze
Author URI: http://wordpress.org/support/profile/jayarjo
*/

require_once(dirname(__FILE__) . '/i8/class.Plugino.php');

class RTE_Embed extends WP_Embed {
	
	private $rte;
	
	function __construct($rte) {
		$this->rte = $rte;
		parent::__construct();	
	}
	
	function shortcode( $attr, $url = '' ) {
		global $rte;

		if ( empty( $url ) )
			return '';

		$rawattr = $attr;
		$attr = wp_parse_args( $attr, wp_embed_defaults() );

		// kses converts & into &amp; and we need to undo this
		// See http://core.trac.wordpress.org/ticket/11311
		$url = str_replace( '&amp;', '&', $url );

		// Look for known internal handlers
		ksort( $this->handlers );
		foreach ( $this->handlers as $priority => $handlers ) {
			foreach ( $handlers as $id => $handler ) {
				if ( preg_match( $handler['regex'], $url, $matches ) && is_callable( $handler['callback'] ) ) {
					if ( false !== $return = call_user_func( $handler['callback'], $matches, $attr, $url, $rawattr ) )
						return apply_filters( 'embed_handler_html', $return, $url, $attr );
				}
			}
		}

		// Check for a cached result (stored in the post meta)
		$cachekey = '_oembed_' . md5( $url . serialize( $attr ) );
		if ( $this->usecache ) {
			$cache = $this->rte->get_cache($cachekey);

			// Failures are cached
			if ( '{{unknown}}' === $cache )
				return $this->maybe_make_link( $url );

			if ( ! empty( $cache ) )
				return apply_filters( 'embed_oembed_html', $cache, $url, $attr);
		}

		// Use oEmbed to get the HTML
		$attr['discover'] = ( apply_filters('embed_oembed_discover', false) && current_user_can( 'unfiltered_html' ) );
		$html = wp_oembed_get( $url, $attr );

		// Cache the result
		$cache = ( $html ) ? $html : '{{unknown}}';
		$this->rte->set_cache($cachekey, $cache, 3600 * 24 * 7); // one week

		// If there was a result, return it
		if ( $html )
			return apply_filters( 'embed_oembed_html', $html, $url, $attr);

		// Still unknown
		return $this->maybe_make_link( $url );
	}
}


class RTE extends RTE_Plugino {	

	var $rte_embed;
	
	function __construct()
	{
		parent::__construct(__FILE__);
		
		if (version_compare(get_bloginfo('version'), '3.3', '<') || !function_exists('wp_editor')) {
			$this->warn("<strong>{$this->info['Name']}</strong> requires <strong><i>wp_editor API</i></strong>, which seems to be not available in <i>your version</i> of WordPress. Make sure that you are running at least <strong><i>version 3.3</i></strong>.<br /><br /> Plugin will <strong><i>deactivate</i></strong> itself now!");	
		}
		
		$this->rte_embed = new RTE_Embed($this);
	}

	
	function a__init()
	{		
		// Hack to get the [embed] shortcode to run before wpautop()
		add_filter('term_description', array($this->rte_embed, 'run_shortcode'), 8);

		// Shortcode placeholder for strip_shortcodes()
		add_shortcode('embed', '__return_false');

		// Attempts to embed all URLs in a post
		add_filter('term_description', array($this->rte_embed, 'autoembed'), 8);
		
		add_filter('term_description', 'do_shortcode');	
	}


	function a_99__wp_loaded() // make sure this runs as late as possible (following after_setup_theme and init)
	{
		foreach (get_taxonomies() as $tax) {
			add_action("{$tax}_pre_add_form", create_function('', 'ob_start();'));
			add_action("{$tax}_pre_edit_form", create_function('', 'ob_start();'));
			add_action("{$tax}_add_form", array($this, 'a_term_edit_form'), 10, 1);
			add_action("{$tax}_edit_form", array($this, 'a_term_edit_form'), 10, 2);
		}	
	}

	
	function a_term_edit_form()
	{
		$html = ob_get_clean();
		
		$args = func_get_args();
		$content = sizeof($args) == 2 ? htmlspecialchars_decode($args[0]->description) : '';
		
		ob_start();
		
		$args = array(
			'textarea_name' => 'description', // id cannot be 'description', 'cause this causes UI conflict on a list page
			'editor_css' => '<style>.quicktags-toolbar input { width: auto; } .form-field textarea#desc { border: none; }</style>' // fix some defalt styles
		);
		
		 // load minimal version on list page	
		if (!isset($_GET['action']) || $_GET['action'] != 'edit') {
			$args += array(
				'teeny' => true,
				'textarea_rows' => 6,
				'tinymce' => array(
					'theme_advanced_buttons1' => 'bold, italic, underline, blockquote, separator, strikethrough, justifyleft, justifycenter, justifyright, link, unlink, fullscreen, wp_adv',
					'theme_advanced_buttons2' => 'formatselect, forecolor, backcolor, bullist, numlist, outdent, indent, separator, removeformat'
				)
			);
			
			// avoid ugly overflow bug of toolbar and status bar on small screens
			?><style>#wp-desc-wrap { overflow: hidden; }</style><?php 
			
			// list page is ajaxified, so we need to syncronize the editor with the textarea before the form is serialized
			?><script>
			jQuery(function($) {
				$('#submit').click(function() { 
					tinymce.get("desc").save();
					
					<?php // now we need to clear the editor after tag has been added ?>
					if (validateForm($(this).parents('form'))) { <?php // make sure that form can be submitted ?>
						<?php // we hook onto the global success event and wait for add-tag submission ?>
						$(document).bind("ajaxSuccess", function onAjaxSuccess(e, xhr, settings) {
							if (/action=add\-tag/.test(settings.data)) {
								$(document).unbind('ajaxSuccess', onAjaxSuccess);
								<?php // reset the contents ?>
								tinymce.get("desc").setContent('');
							}
						});
					}
				});
			});
            </script><?php		
		}
		
		wp_editor($content, 'desc', $args);
		echo preg_replace('|<textarea name="description"[\s\S]+?</textarea>|', ob_get_clean(), $html);
	}
	
	
	// disable extra sanitization on description field
	function f_0__pre_term_description($description)
	{
		remove_filter('pre_term_description', 'wp_filter_kses'); // disable kses on term description
		return $description;	
	}
	
	
	// truncate term description
	function f_10_3__get_terms($terms, $taxonomies, $args)
	{
		global $pagenow;
		if (is_admin() && $pagenow == 'edit-tags.php' && !isset($_REQUEST['action'])) { // detect taxonomy list page
			foreach ($terms as &$term) {
				$term->description = $this->to_plain_text($term->description);
			}
		}
		return $terms;	
	}
	
	
	private function to_plain_text($text) 
	{		
		$text = strip_shortcodes( $text );
		$text = apply_filters('the_content', $text);
		$text = str_replace(']]>', ']]&gt;', $text);
		$text = wp_trim_words( $text, 12, '...' );
		return $text;
	}
}

new RTE;
