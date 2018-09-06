<?php
/*
Plugin Name: Email This Page
Plugin URI: http://www.instaemail.com/
Description: Adds an Email this Page button to your post pages. Allow users to share by email.
Version: 1.1.6
Author: InstaEmail, PrintFriendly
Author URI: http://www.instaemail.com
Changelog :
1.1.6 - Fix button style.
1.1.5 - Readme.txt update.
1.1.4 - Remove break tag from Button code.
1.1.3 - Added Support for https, Button Format Fix, Fixed Admin CSS. Add email this page display settings on per individual category.
1.1.2 - Fix chrome css caching issue.
1.1.1 - Fix alignment. Fix layout mess caused by old version in tags folder.
1.1 - Complete overhaul to make admin options consistent with printfriendly wordpress plugin.
1.0.1 - Fix homepage issue.
1.0.0 - Initial release.
*/

/**
 * InstaEmail WordPress plugin. Allows easy email sending.
 * @package InstaEmail_WordPress
 * @author PrintFriendly <taylor@printfriendly.com>
 * @copyright Copyright (C) 2012, InstaEmail
 */
if ( ! class_exists( 'InstaEmail_WordPress' ) ) {

  /**
   * Class containing all the plugins functionality.
   * @package InstaEmail_WordPress
   */
  class InstaEmail_WordPress {
      /**
       * The hook, used for text domain as well as hooks on pages and in get requests for admin.
       * @var string
       */
      var $hook = 'instaemail';

      /**
       * The option name, used throughout to refer to the plugins option and option group.
       * @var string
       */
      var $option_name = 'instaemail_option';

      /**
       * The plugins options, loaded on init containing all the plugins settings.
       * @var array
       */
      var $options = array();

      /**
       * Database version, used to allow for easy upgrades to / additions in plugin options between plugin versions.
       * @var int
       */
      var $db_version = 4;

      /**
       * Settings page, used within the plugin to reliably load the plugins admin JS and CSS files only on the admin page.
       * @var string
       */
      var $settings_page = '';

      /**
       * Constructor
       *
       */
      function __construct() {
        // delete_option( $this->option_name );

        // Retrieve the plugin options
        $this->options = get_option( $this->option_name );

        // If the options array is empty, set defaults
        if ( ! is_array( $this->options ) )
          $this->set_defaults();

        // If the version number doesn't match, upgrade
        if ( $this->db_version > $this->options['db_version'] )
          $this->upgrade();

        add_action( 'wp_head', array( &$this, 'front_head' ) );
        // automaticaly add the link
        if( !$this->is_manual() ) {
          add_filter( 'the_content', array( &$this, 'show_link' ) );
          add_filter( 'the_excerpt', array( &$this, 'show_link' ) );
        }

        if ( !is_admin() )
          return;

        // Hook into init for registration of the option and the language files
        add_action( 'admin_init', array( &$this, 'init' ) );

        // Register the settings page
        add_action( 'admin_menu', array( &$this, 'add_config_page' ) );

        // Register the contextual help
        add_filter( 'contextual_help', array( &$this, 'contextual_help' ), 10, 2 );

        // Enqueue the needed scripts and styles
        add_action( 'admin_enqueue_scripts', array( &$this, 'admin_enqueue_scripts' ) );

        // Register a link to the settings page on the plugins overview page
        add_filter( 'plugin_action_links', array( &$this, 'filter_plugin_actions' ), 10, 2 );
      }

      /**
       * PHP 4 Compatible Constructor
       *
       */
      function InstaEmail_WordPress() {
        $this->__construct();
      }

      /**
       * Prints the InstaEmail button CSS, in the header. Possible to disable this in the plugin settings.
       *
       */
      function front_head() {
        if ( isset( $this->options['enable_css'] ) && $this->options['enable_css'] != 'on' )
          return;

?>

        <style type="text/css" media="screen">

          div.instaemail {
            margin: <?php echo $this->options['margin_top'].'px '.$this->options['margin_right'].'px '.$this->options['margin_bottom'].'px '.$this->options['margin_left'].'px'; ?>;
          }
          div.instaemail a, div.instaemail a:link, div.instaemail a:visited {
            text-decoration: none;
            font-size: <?php echo $this->options['text_size']; ?>px;
            color: <?php echo $this->options['text_color']; ?>;
            vertical-align: bottom;
            border: none;
          }

          .instaemail a:hover {
            cursor: pointer;
          }

          .instaemail a img  {
            border: none;
            padding:0;
            margin-right: 6px;
            box-shadow: none;
            -webkit-box-shadow: none;
            -moz-box-shadow: none;
          }

          .etp-alignleft {
            float: left;
          }
          .etp-alignright {
            float: right;
          }
          div.etp-aligncenter {
            display: block;
            margin-left: auto;
            margin-right: auto;
            text-align: center;
          }
          .instaemail a span {
            vertical-align: bottom;
          }

        </style>
        <style type="text/css" media="print">
          .instaemail {
            display: none;
          }
        </style>
        <?php
      }

      /**
       * Prints the InstaEmail JavaScript, in the footer, and loads it asynchronously.
       *
       */
      function instaemail_script_footer() {
        ?>
  <script type="text/javascript">
    // InstaEmail
	(function(){var js, pf;pf = document.createElement('script');pf.type = 'text/javascript';if('https:' == document.location.protocol){js='https://pf-cdn.printfriendly.com/javascripts/email/app.js'}else{js='http://cdn.instaemail.net/js/app.js'}pf.src=js;document.getElementsByTagName('head')[0].appendChild(pf)})();
  </script>


        <?php

      }

      /**
       * Primary frontend function, used either as a filter for the_content, or directly using instaemail_show_link
       *
       * @param string $content the content of the post, when the function is used as a filter
       * @return string $button or $content with the button added to the content when appropriate, just the content when button shouldn't be added or just button when called manually.
       */
      function show_link( $content = false ) {
        $is_manual = $this->is_manual();
        if( !$content && !$is_manual )
          return "";

        $button = apply_filters( 'instaemail_button', $this->anchor_tag());

        if ( $is_manual )
        {
          // Hook the script call now, so it only get's loaded when needed, and need is determined by the user calling instaemail_button
          add_action( 'wp_footer', array( &$this, 'instaemail_script_footer' ) );
          return $button;
        }
        else
        {

        if ( (is_page() && isset($this->options['show_on_pages']))
          || (is_home() && isset($this->options['show_on_homepage']) && $this->category_included())
          || (is_tax() && isset($this->options['show_on_taxonomies']))
          || (is_category() && $this->category_included())
          || (is_single() && isset($this->options['show_on_posts']) && $this->category_included()) )
          {
            // Hook the script call now, so it only get's loaded when needed, and need is determined by the user calling instaemail_button
            add_action( 'wp_footer', array( &$this, 'instaemail_script_footer' ) );

            if ( $this->options['content_placement'] == 'before' )
              return $button.$content;
            else
              return $content.$button;
          }
          else
          {
            return $content;
          }
        }

      }

	  /**
       * Gets anchor tag based on type of button
       *
       * @since 1.1.4
       * @return anchor tag
       */
	  function anchor_tag() {	
        $href = '#';
        $onclick = 'onclick="pfEmail.init()"';

        $align = '';
        if ( 'none' != $this->options['content_position'] )
          $align = ' etp-align'.$this->options['content_position'];		

		switch($this->options['button_type']) {
			case "custom-image":
				$anchor_tag = '<a class="instaemail" href="'.$href.'" style="box-shadow: none" rel="nofollow" title="Email this page" '.$onclick.' >'.$this->button($this->options['button_type']).'</a>';
	          	break;
	        case "text-only": 				
				$anchor_tag = '<a class="instaemail" href="'.$href.'" rel="nofollow" title="Email this page" '.$onclick.' >'.$this->button($this->options['button_type']).'</a>';
				break;
	        default:
				$button_type = $this->get_button_type();
				$anchor_tag = '<a class="instaemail" id="instaemail-button" href="'.$href.'" rel="nofollow" title="Email this page" '.$onclick.' data-button-img='.$button_type.'>Email this page</a>';
				break;
		
		}
		$anchor_tag_with_wrapper = '<div class="instaemail'.$align.'">'.$anchor_tag.'</div>';
		return $anchor_tag_with_wrapper;
	  }
	
	/*
	** Added 1.1.4
	** Handling "email-button.png" issue
	*/
	  function get_button_type() {
		$button_type_arr = explode('.', $this->options['button_type']);
		return $button_type_arr[0];
	  }

      /**
       * Filter posts by category.
       *
       * @since 1.1.2
       * @return boolean true if post belongs to category selected for button display
       */
      function category_included() {
        return ($this->options['category_ids'][0] == 'all' || in_category($this->options['category_ids']));
      }

      /**
       * Register the textdomain and the options array along with the validation function
       *
       */
      function init() {
        // Allow for localization
        load_plugin_textdomain( $this->hook, false, basename( dirname( __FILE__ ) ) . '/languages' );

        // Register our option array
        register_setting( $this->option_name, $this->option_name, array( &$this, 'options_validate' ) );
      }

      /**
       * Validate the saved options.
       *
       * @param array $input with unvalidated options.
       * @return array $valid_input with validated options.
       */
      function options_validate( $input ) {
        $valid_input = $input;

        $valid_input['category_ids'] = explode(',', $input['category_ids']);


        // echo '<pre>'.print_r($input,1).'</pre>';
        // die;

        if ( !in_array( $input['button_type'], array( '	.png', 'email-button-green.png',  'email-button-white.png', 'text-only', 'custom-image') ) )
          $valid_input['button_type'] = 'email-button.png';

        if ( !isset( $input['custom_image'] ) )
          $valid_input['custom_image'] = '';

        if ( !in_array( $input['content_position'], array( 'none', 'left', 'center', 'right' ) ) )
          $valid_input['content_position'] = 'left';

        if ( !in_array( $input['content_placement'], array( 'before', 'after' ) ) )
          $valid_input['content_placement'] = 'after';

        foreach ( array( 'margin_top', 'margin_right', 'margin_bottom', 'margin_left' ) as $opt )
          $valid_input[$opt] = (int) $input[$opt];

        $valid_input['text_size'] = (int) $input['text_size'];

        if ( !isset($valid_input['text_size']) || 0 == $valid_input['text_size'] ) {
          $valid_input['text_size'] = 14;
        } else if ( 25 < $valid_input['text_size'] || 9 > $valid_input['text_size'] ) {
          $valid_input['text_size'] = 14;
          add_settings_error( $this->option_name, 'invalid_color', __( 'The text size you entered is too high, please stay below 25px.', $this->hook ) );
        }

        if ( !isset( $input['text_color'] )) {
          $valid_input['text_color'] = $this->options['text_color'];
        } else if ( ! preg_match('/^#[a-f0-9]{3,6}$/i', $input['text_color'] ) ) {
          // Revert to previous setting and throw error.
          $valid_input['text_color'] = $this->options['text_color'];
          add_settings_error( $this->option_name, 'invalid_color', __( 'The color you entered is not valid, it must be a valid hexadecimal RGB font color.', $this->hook ) );
        }

        $valid_input['db_version'] = $this->db_version;

        return $valid_input;
      }

    /**
     * Helper that checks if wp versions is above 3.0.
     *
     * @since 1.1.3
     * @return boolean true wp version is above 3.0
     *
     */
    function wp_version_gt30() {
      global $wp_version;
      return version_compare($wp_version, '3.0', '>=');
    }


    /**
     * Create box for picking individual categories.
     *
     * @since 1.1.3
     */
    function create_category_metabox() {
      do_meta_boxes('settings_page_' . $this->hook, 'normal', array());
    }


    /**
     * Load metaboxes advanced button display settings.
     *
     * @since 1.1.3
     */
    function on_load_instaemail() {
      if($this->wp_version_gt30()) {
        require_once('includes/meta-boxes.php');
        wp_enqueue_script('post');

        add_meta_box('categorydiv', __('Button categories:'), 'post_categories_meta_box', 'settings_page_'. $this->hook, 'normal', 'core');
      }
    }


      /**
       * Register the config page for all users that have the manage_options capability
       *
       */
      function add_config_page() {
        $this->settings_page = add_options_page( __( 'InstaEmail Options', $this->hook ), __( 'InstaEmail', $this->hook ), 'manage_options', $this->hook, array( &$this, 'config_page' ) );

        //register callback gets call prior your own page gets rendered
        add_action('load-'.$this->settings_page, array(&$this, 'on_load_instaemail'));
      }

      /**
       * Shows help on the plugin page when clicking on the Help button, top right.
       *
       */
      function contextual_help( $contextual_help, $screen_id ) {
        if ( $this->settings_page == $screen_id ) {
          $contextual_help = '<strong>'.__( "Need Help?", $this->hook ).'</strong><br/>'
                    .sprintf( __( "Be sure to check out the %s!"), '<a href="http://wordpress.org/extend/plugins/instaemail/faq/">'.__( "Frequently Asked Questions", $this->hook ).'</a>' );
        }
        return $contextual_help;
      }

      /**
       * Enqueue the scripts for the admin settings page
       *
       * @param string $hook_suffix hook to check against whether the current page is the InstaEmail settings page.
       */
      function admin_enqueue_scripts( $screen_id ) {
        if ( $this->settings_page == $screen_id ) {
          $ver = '1.1.4';
          wp_register_script( 'instaemail-color-picker', plugins_url( 'colorpicker.js', __FILE__ ), array( 'jquery', 'media-upload' ), $ver );
          wp_register_script( 'instaemail-admin-js', plugins_url( 'admin.js', __FILE__ ), array( 'jquery', 'media-upload' ), $ver );

          wp_enqueue_script( 'instaemail-color-picker' );
          wp_enqueue_script( 'instaemail-admin-js' );

          wp_enqueue_style( 'instaemail-admin-css', plugins_url( 'admin.css', __FILE__ ), array(), $ver );
        }
      }

      /**
       * Register the settings link for the plugins page
       *
       * @param array $links the links for the plugins.
       * @param string $file filename to check against plugins filename.
       * @return array $links the links with the settings link added to it if appropriate.
       */
      function filter_plugin_actions( $links, $file ){
        // Static so we don't call plugin_basename on every plugin row.
        static $this_plugin;
        if ( ! $this_plugin ) $this_plugin = plugin_basename( __FILE__ );

        if ( $file == $this_plugin ){
          $settings_link = '<a href="options-general.php?page='.$this->hook.'">' . __( 'Settings', $this->hook ) . '</a>';
          array_unshift( $links, $settings_link ); // before other links
        }
        return $links;
      }

      /**
       * Set default values for the plugin.
       *
       */
      function set_defaults() {
        // Set some defaults
        $this->options = array(
          'button_type' => 'email-button.png',
          'content_position' => 'left',
          'content_placement' => 'after',
          'custom_image' => '',
          'custom_text' => 'EmailThis',
          'margin_top' => 12,
          'margin_right' => 12,
          'margin_bottom' => 12,
          'margin_left' => 12,
          'text_color' => '#55750C',
          'text_size' => 14,
          'show_on_posts' => 'on',
          'show_on_pages' => 'on',
          'category_ids' => array('all'),
        );

        // This should always be set to the latest immediately when defaults are pushed in.
        $this->options['db_version'] = $this->db_version;

        update_option( $this->option_name, $this->options );
      }

      /**
       * Upgrades the stored options, used to add new defaults if needed etc.
       *
       * @since 1.0
       *
       */
      function upgrade() {
        // Do stuff
        if($this->options['db_version'] < 2) {

          $old_show_on = $this->options['show_list'];
          // 'manual' setting
          $additional_options = array();

          if($old_show_on == 'all') {
            $additional_options = array(
              'show_on_pages' => 'on',
              'show_on_posts' => 'on',
              'show_on_homepage' => 'on',
              'show_on_categories' => 'on',
              'show_on_taxonomies' => 'on'
            );
          }

          if($old_show_on == 'single') {
            $additional_options = array(
              'show_on_pages' => 'on',
              'show_on_posts' => 'on'
            );
          }

          if($old_show_on == 'posts') {
            $additional_options = array(
              'show_on_posts' => 'on',
            );
          }

          unset($this->options['show_list']);

          // correcting badly named option
          if(isset($this->options['disable_css'])) {
            unset($this->options['disable_css']);
          } else {
            $additional_options['enable_css'] = 'no';
          }
          $this->options = array_merge($this->options, $additional_options);
        }

        if($this->options['db_version'] < 3) {
          $additional_options = array(
            'category_ids' => array('all'),
          );

          // since we use category_ids this is not required anymore
          unset($this->options['show_on_categories']);

          $this->options = array_merge($this->options, $additional_options);
        }

        $this->options['db_version'] = $this->db_version;
        update_option( $this->option_name, $this->options );
      }

      /**
       * Displays radio button in the admin area
       *
       * @param string $name the name of the radio button to generate.
       * @param boolean $br whether or not to add an HTML <br> tag, defaults to true.
       */
      function radio($name, $br = false){
        $var = '<input id="'.$name.'" class="radio" name="'.$this->option_name.'[button_type]" type="radio" value="'.$name.'" '.$this->checked( 'button_type', $name, false ).'/>';
        $button = $this->button( $name );
        if ( '' != $button )
          echo '<label for="'.$name.'">' . $var . $button . '</label>';
        else
          echo $var;

        if ( $br )
          echo '<br>';
      }

      /**
       * Displays button image in the admin area
       *
       * @param string $name the name of the button to generate.
       */
      function button( $type = false ){
        if( !$type )
          $type = $this->options['button_type'];
        $text = $this->options['custom_text'];
       
 		$img_path = 'http://cdn.instaemail.net/images/';

        switch($type){
        case "custom-image":
          if( '' == $this->options['custom_image'] )
            $return = '';
          else
            $return = '<img src="'.$this->options['custom_image'].'" style="display: inline-block" alt="Email This Page" />';

          $return .= $text;

          return $return;
          break;
        case "text-only":
          return '<span class="printfriendly-text2">'.$text.'</span>';
          break;
        default:
		  $img_url = $img_path.$type;
          return '<img src="'.$img_url.'" alt="Email This Page" />';
          break;
        }
      }




    /**
     * Convenience function to output a value custom button preview elements
     *
     * @since 1.1
     */
    function custom_button_preview() {
      if( '' == trim($this->options['custom_image']) )
        $button_preview = '<span id="pf-custom-button-preview"></span>';
      else
        $button_preview = '<span id="pf-custom-button-preview"><img src="'.$this->options['custom_image'].'" alt="Email This Button" /></span>';

      $button_preview .= '<span class="printfriendly-text2">'.$this->options['custom_text'].'</span>';

      echo $button_preview;
    }

      /**
       * Convenience function to output a value for an input
       *
       * @param string $val value to check.
       */
      function val( $val ) {
        if ( isset( $this->options[$val] ) )
          echo esc_attr( $this->options[$val] );
      }

      /**
       * Like the WordPress checked() function but it doesn't throw notices when the array key isn't set and uses the plugins options array.
       *
       * @param mixed $val value to check.
       * @param mixed $check_against value to check against.
       * @param boolean $echo whether or not to echo the output.
       * @return string checked, when true, empty, when false.
       */
      function checked( $val, $check_against = true, $echo = true ) {
        if ( !isset( $this->options[$val] ) )
          return;

        if ( $this->options[$val] == $check_against ) {
          if ( $echo )
            echo ' checked="checked" ';
          else
            return ' checked="checked" ';
        }
      }

      /**
       * Helper for creating checkboxes.
       *
       * @since 1.1
       * @param string $name string used for various parts of checkbox
       *
       */
      function create_checkbox($name) {
        echo '<input type="checkbox" class="show_list" name="' . $this->option_name . '[show_on_' . $name . ']" value="on" ';
        $this->checked( 'show_on_' . $name, 'on');
        echo ' />';
        _e( ucfirst($name), $this->hook );
      }


      /**
       * Helper that checks if any of the content types is checked to display button
       *
       * @since 3.1
       * @return boolean true if none of the content types is checked
       *
       */
      function is_manual() {
        return !(isset($this->options['show_on_posts']) ||
          isset($this->options['show_on_pages']) ||
          isset($this->options['show_on_homepage']) ||
          isset($this->options['show_on_taxonomies']));
      }


      /**
       * Output the config page
       *
       */
      function config_page() {

        // Since WP 3.2 outputs these errors by default, only display them when we're on versions older than 3.2 that do support the settings errors.
        global $wp_version;
        if ( version_compare( $wp_version, '3.2', '<' ) )
          settings_errors();

        // Show the content of the options array when debug is enabled
        if ( WP_DEBUG )
          echo '<pre>Options:<br><br>' . print_r( $this->options, 1 ) . '</pre>';
      ?>
          <div id="instaemail_settings" class="wrap">
          <div class="icon32" id="instaemail"></div>
          <h2><?php _e( 'Email This Button Settings', $this->hook ); ?></h2>

          <form action="options.php" method="post">
            <?php settings_fields( $this->option_name ); ?>

            <h3><?php _e( "Pick Your Button Style", $this->hook ); ?></h3>

            <fieldset id="button-style">
              <div id="buttongroup1">
                <?php $this->radio('email-button.png'); ?>
                <?php $this->radio('email-button-green.png'); ?>
                <?php $this->radio('email-button-white.png'); ?>
                <?php //$this->radio('text-only'); ?>
              </div>

              <div id="custom">
                <label for="custom-image">
                  <?php echo '<input id="custom-image" class="radio" name="'.$this->option_name.'[button_type]" type="radio" value="custom-image" '.$this->checked( 'button_type', 'custom-image', false ).'/>'; ?>
                  <?php _e( "Custom Button", $this->hook ); ?>
                </label>
                <div id="custom-img">
                  <?php _e( "Enter Image URL", $this->hook ); ?><br>
                  <input id="custom_image" type="text" class="clear regular-text" size="30" name="<?php echo $this->option_name; ?>[custom_image]" value="<?php $this->val( 'custom_image' ); ?>" />
                  <div class="description"><?php _e( "Ex: http://www.example.com/<br>Ex: /wp/wp-content/uploads/example.png)", $this->hook ); ?>
                  </div>
                </div>
                <div id="pf-custom-button-error"></div>
                <div id="custom-txt" >
                  <div id="txt-enter">
                    <?php _e( "Text", $this->hook ); ?><br>
                    <input type="text" size="10" name="<?php echo $this->option_name; ?>[custom_text]" id="custom_text" value="<?php $this->val( 'custom_text' ); ?>">
                  </div>
                  <div id="txt-color">
                    <?php _e( "Text Color", $this->hook ); ?>
                    <input type="hidden" name="<?php echo $this->option_name; ?>[text_color]" id="text_color" value="<?php $this->val( 'text_color' ); ?>"/><br>
                    <div id="colorSelector">
                      <div style="background-color: <?php echo $this->options['text_color']; ?>;"></div>
                    </div>
                  </div>
                  <div id="txt-size">
                    <?php _e( "Text Size", $this->hook ); ?><br>
                    <input type="number" id="text_size" min="9" max="25" class="small-text" name="<?php echo $this->option_name; ?>[text_size]" value="<?php $this->val( 'text_size' ); ?>"/>
                  </div>
                </div>
              <div id="custom-button-preview">
                <?php $this->custom_button_preview(); ?>
              </div>
            </fieldset>
            <br class="clear">

      <!--Section 2 Button Placement-->
            <div id="button-placement">
              <h3><?php _e( "Button Placement", $this->hook ); ?>
        <span id="css"><input type="checkbox" name="<?php echo $this->option_name; ?>[enable_css]" value="<?php $this->val('enable_css');?>" <?php $this->checked('enable_css', 'no'); ?> />Do not use CSS for button styles</span>
              </h3>
              <div id="button-placement-options">
                <div id="alignment">
                  <label>
                    <select id="pf_content_position" name="<?php echo $this->option_name; ?>[content_position]" >
                      <option value="left" <?php selected( $this->options['content_position'], 'left' ); ?>><?php _e( "Left Align", $this->hook ); ?></option>
                      <option value="right" <?php selected( $this->options['content_position'], 'right' ); ?>><?php _e( "Right Align", $this->hook ); ?></option>
                      <option value="center" <?php selected( $this->options['content_position'], 'center' ); ?>><?php _e( "Center", $this->hook ); ?></option>
                      <option value="none" <?php selected( $this->options['content_position'], 'none' ); ?>><?php _e( "None", $this->hook ); ?></option>
                    </select>
                  </label>
                </div>
                <div class="content_placement">
                  <label>
                    <select id="pf_content_placement" name="<?php echo $this->option_name; ?>[content_placement]" >
                      <option value="before" <?php selected( $this->options['content_placement'], 'before' ); ?>><?php _e( "Above Content", $this->hook ); ?></option>
                      <option value="after" <?php selected( $this->options['content_placement'], 'after' ); ?>><?php _e( "Below Content", $this->hook ); ?></option>
                    </select>
                  </label>
                </div>
                <div id="margin">
                  <label>
                    <input type="number" name="<?php echo $this->option_name; ?>[margin_left]" value="<?php $this->val( 'margin_left' ); ?>" maxlength="3"/>
                    <?php _e( "Margin Left", $this->hook ); ?>
                  </label>
                  <label>
                    <input type="number" name="<?php echo $this->option_name; ?>[margin_right]" value="<?php $this->val( 'margin_right' ); ?>"/> <?php _e( "Margin Right", $this->hook ); ?>
                  </label>
                  <label>
                    <input type="number" name="<?php echo $this->option_name; ?>[margin_top]"  value="<?php $this->val( 'margin_top' ); ?>" maxlength="3"/> <?php _e( "Margin Top", $this->hook ); ?>
                  </label>
                  <label>
                    <input type="number" name="<?php echo $this->option_name; ?>[margin_bottom]" value="<?php $this->val( 'margin_bottom' ); ?>" maxlength="3"/> <?php _e( "Margin Bottom", $this->hook ); ?>
                  </label>
                </div>
              </div>

              <div id="pages">
                <label><?php $this->create_checkbox('posts'); ?></label>
                <label><?php $this->create_checkbox('pages'); ?></label>
                <label><?php $this->create_checkbox('homepage'); ?></label>
                <label><?php $this->create_checkbox('taxonomies'); ?></label>
                <label><input type="checkbox" class="show_template" name="show_on_template" /><?php echo _e( 'Add direct to template', $this->hook ); ?></label>
                <textarea id="pf-shortcode" class="code" rows="2" cols="40">&lt;?php if(function_exists('instaemail_show_link')){echo instaemail_show_link();} ?&gt;</textarea>
                <label><?php _e( "or use shortcode inside your page/article", $this->hook ); ?></label>
                <textarea id="pf-shortcode" class="code" rows="2" cols="40">[email_this_button]</textarea>
                <input type="hidden" name="<?php echo $this->option_name; ?>[category_ids]" id="category_ids" value="<?php echo implode(',', $this->options['category_ids']); ?>" />
              </div>
            </div>

            <?php if($this->wp_version_gt30()) { ?>
            <div id="etp-categories">
              Specify <a href="javascript:void(0)" id="toggle-categories">categories</a>
              <br/>
              <div id="etp-categories-metabox">
                <?php $this->create_category_metabox(); ?>
              </div>
            </div>
            <?php } ?>
            <div class="clear"></div>


          <br class="clear">
          <p class="submit">
            <input type="submit" class="button-primary" value="<?php esc_attr_e( "Save Options", $this->hook ); ?>"/>
            <input type="reset" class="button-secondary" value="<?php esc_attr_e( "Cancel", $this->hook ); ?>"/>
          </p>
          <div id="after-submit">
            <p>
                <?php _e( "Like InstaEmail?", $this->hook ); ?> <a href="http://wordpress.org/extend/plugins/instaemail/"><?php _e( "Give us a rating", $this->hook ); ?></a>. <?php _e( "Need help or have suggestions?", $this->hook ); ?> <a href="mailto:support@printfriendly.com?subject=Support%20for%20InstaEmail%20WordPress%20plugin">support@PrintFriendly.com</a>
            </p>
          </div>

          </form>
        </div>
<?php
      }
  }
  $instaemail = new InstaEmail_WordPress();
}

// Add shortcode for email this button
add_shortcode( 'email_this_button', 'instaemail_show_link' );

/**
 * Convenience function for use in templates.
 *
 * @return string returns a button to be printed.
 */
function instaemail_show_link() {
  global $instaemail;
  return $instaemail->show_link();
}
