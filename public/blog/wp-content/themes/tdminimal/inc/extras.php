<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package tdMinimal
 */

/**
 * Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
 */
function tdminimal_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'tdminimal_page_menu_args' );

/**
 * Adds custom classes to the array of body classes.
 */
function tdminimal_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	return $classes;
}
add_filter( 'body_class', 'tdminimal_body_classes' );

/**
 * Filter in a link to a content ID attribute for the next/previous image links on image attachment pages
 */
function tdminimal_enhanced_image_navigation( $url, $id ) {
	if ( ! is_attachment() && ! wp_attachment_is_image( $id ) )
		return $url;

	$image = get_post( $id );
	if ( ! empty( $image->post_parent ) && $image->post_parent != $id )
		$url .= '#main';

	return $url;
}
add_filter( 'attachment_link', 'tdminimal_enhanced_image_navigation', 10, 2 );

/**
 * Filters wp_title to print a neat <title> tag based on what is being viewed.
 */
function tdminimal_wp_title( $title, $sep ) {
	global $page, $paged;

	if ( is_feed() )
		return $title;

	// Add the blog name
	$title .= get_bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title .= " $sep $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		$title .= " $sep " . sprintf( __( 'Page %s', 'tdminimal' ), max( $paged, $page ) );

	return $title;
}
add_filter( 'wp_title', 'tdminimal_wp_title', 10, 2 );

 /**
 * Color Schemes
 *
 * @since tdminimal 1.0
 */
 function tdminimal_get_color_scheme() {
 	global $data;
 	
 	if( isset( $data['tdminimal_color_scheme'] ) ) {
		return esc_attr( $data['tdminimal_color_scheme'] );
	} else {
		return false;
	}
 }

/**
 * Website Logo
 *
 * @since tdminimal 1.0
 */
function tdminimal_website_logo() {
 	global $data;
 	$website_logo = $data['tdminimal_website_logo'];
 	$only_logo = $data['tdminimal_logo_as_title'];
 	
 	if( $website_logo != '' && $only_logo ) {
 		echo '
				<div class="website-logo">
					<a href="http://concepthaus.mx/#screen_cinco" title="'. esc_attr( get_bloginfo( 'name', 'display' ) ) .'" rel="home">
						<img src="'. $website_logo .'" alt="'. esc_attr( get_bloginfo( 'name', 'display' ) ) .'">
					</a>
				</div>
			 ';
 	} else if ( $website_logo != '' && !$only_logo ) {
 		echo '
				<div class="website-logo">
					<img src="'. $website_logo .'" alt="'. esc_attr( get_bloginfo( 'name', 'display' ) ) .'">
				</div>
			 ';
 	}
 	
}
  
 /**
 * "Only Logo" Check
 *
 * @since tdminimal 1.0
 */
function tdminimal_is_only_logo() {
	global $data;
	return $data['tdminimal_logo_as_title'];
}

 /**
 * Custom Favicon
 *
 * @since tdminimal 1.0
 */
function tdminimal_custom_favicon() {
	global $data;
	
	if( isset( $data['tdminimal_favicon_upload'] ) ) {
		$tdminimal_favicon = $data['tdminimal_favicon_upload'];
	} else {
		$tdminimal_favicon = false;
	}
	
	if ( $tdminimal_favicon ) {
		echo '<link rel="shortcut icon" href="'.$tdminimal_favicon.'" title="Favicon" />' . "\n";
	}
}

/**
*  This function adds custom styles to website head.
*
* @since tdminimal 1.0
*/
function tdminimal_custom_styles() { 
	
	//Website Background Color
	$tdminimal_background_color = get_theme_mod( 'tdminimal_background_color', '#f7f9f9' );
	if( $tdminimal_background_color != '#f7f9f9' ) {
		$tdminimal_background_color = " body {background-color: ". $tdminimal_background_color .";} \n ";
	} else {
		$tdminimal_background_color = '';
	}
	
	//Website Background Patterns & Background Image
	$tdminimal_background_pattern = get_theme_mod( 'tdminimal_background_pattern', '' );
	$tdminimal_background_image = get_theme_mod( 'tdminimal_bg_fixed_image', '' );
	if( $tdminimal_background_pattern != '' && $tdminimal_background_image == '' ) {
		$tdminimal_background_pattern = " body {background: url(". $tdminimal_background_pattern .");} \n ";
	} else {
		$tdminimal_background_pattern = '';
	}
	
	//Header Background Color
	$tdminimal_header_background_color = get_theme_mod( 'tdminimal_header_background_color', '#ecf0f1' );
	if( $tdminimal_header_background_color != '#ecf0f1' ) {
		$tdminimal_header_background_color = " #masthead, #site-navigation.sticky-navigation, .main-navigation ul ul {background: ". $tdminimal_header_background_color .";} \n ";
	} else {
		$tdminimal_header_background_color = '';
	}
	
	//Header Primary Text Color
	$tdminimal_header_primary_text_color = get_theme_mod( 'tdminimal_header_primary_text_color', '#2d2f30' );
	if( $tdminimal_header_primary_text_color != '#2d2f30' ) {
		$tdminimal_header_primary_text_color = " .site-title a, .menu-toggle, #site-navigation .nav-bar a, .main-navigation .nav-bar li.menu-item-has-child > a:after {color: ". $tdminimal_header_primary_text_color ." !important;} \n ";
	} else {
		$tdminimal_header_primary_text_color = '';
	}
	
	//Header Secondary Text Color
	$tdminimal_header_secondary_text_color = get_theme_mod( 'tdminimal_header_secondary_text_color', '#bdc3c7' );
	if( $tdminimal_header_secondary_text_color != '#bdc3c7' ) {
		$tdminimal_header_secondary_text_color = " #masthead .site-description, .header-search-box .screen-reader-text, #header-search-button-hide {color: ". $tdminimal_header_secondary_text_color .";} \n ";
	} else {
		$tdminimal_header_secondary_text_color = '';
	}
	
	$tdminimal_custom_style = $tdminimal_background_color.
							  $tdminimal_background_pattern.
							  $tdminimal_header_background_color.
							  $tdminimal_header_primary_text_color.
							  $tdminimal_header_secondary_text_color;
							
	if( $tdminimal_custom_style != '' ) {
		echo "
			<style type='text/css'> \n
				" . $tdminimal_custom_style . "
			</style>
	     ";	
	} else {
		return false;
	}
}

 /**
 * Returns Website Background
 *
 * @since tdminimal 1.0
 */
 function tdminimal_is_background_image() {
 	$tdminimal_background_images = get_theme_mod( 'tdminimal_bg_fixed_image', '' );
 	
 	if( $tdminimal_background_images != '' ) {
		$images = explode( ",", $tdminimal_background_images );
		return json_encode( $images );
	} else {
		return false;
	}
 }
 
  /**
 * Audio player for Audio Post
 *
 * @since tdminimal 1.0
 */
function tdminimal_post_audio_player() {
	global $post;
	$args = array(
				'post_type' => 'attachment',
				'post_status' => 'inherit',
				'post_mime_type' => 'audio',
				'post_parent' => $post->ID
			); 
		
	$audio = get_posts( $args );

	if( !empty( $audio ) ) {
		wp_reset_postdata();
		if( floatval ( get_bloginfo('version') ) <= 3.5 ) {
			return '<audio width="100%" height="100%" style="width: 100%; height: 100%;" class="wp-audio-shortcode" src="'.$audio[0]->guid.'"></audio>';
		} else {
			return do_shortcode( '[audio src="'.$audio[0]->guid.'"]' );
		}
	} else {
		return false;
	}
}

/**
 * Social Icons
 *
 * @since tdminimal 1.0
 */
function tdminimal_social_links() {
	global $data;
	
	if( isset( $data['tdminimal_social_twitter'] ) ) {
		$twitter = $data['tdminimal_social_twitter'];
	} else {
		$twitter = '';
	}
	
	if( isset( $data['tdminimal_social_facebook'] ) ) {
		$facebook = $data['tdminimal_social_facebook'];
	} else {
		$facebook = '';
	}
	
	if( isset( $data['tdminimal_social_googleplus'] ) ) {
		$googleplus = $data['tdminimal_social_googleplus'];
	} else {
		$googleplus = '';
	}
	
	if( isset( $data['tdminimal_social_skype'] ) ) {
		$skype = $data['tdminimal_social_skype'];
	} else {
		$skype = '';
	}
	
	if( isset( $data['tdminimal_social_flickr'] ) ) {
		$flickr = $data['tdminimal_social_flickr'];
	} else {
		$flickr = '';
	}
	
	if( isset( $data['tdminimal_social_linkedin'] ) ) {
		$linkedin = $data['tdminimal_social_linkedin'];
	} else {
		$linkedin = '';
	}
	
	if( isset( $data['tdminimal_social_pinterest'] ) ) {
		$pinterest = $data['tdminimal_social_pinterest'];
	} else {
		$pinterest = '';
	}
	
	if( isset( $data['tdminimal_social_dribbble'] ) ) {
		$dribbble = $data['tdminimal_social_dribbble'];
	} else {
		$dribbble = '';
	}
	
	if( isset( $data['tdminimal_social_tumblr'] ) ) {
		$tumblr = $data['tdminimal_social_tumblr'];
	} else {
		$tumblr = '';
	}
	
	if( isset( $data['tdminimal_social_github'] ) ) {
		$github = $data['tdminimal_social_github'];
	} else {
		$github = '';
	}
	
	if( isset( $data['tdminimal_social_instagram'] ) ) {
		$instagram = $data['tdminimal_social_instagram'];
	} else {
		$instagram = '';
	}
	
	if( isset( $data['tdminimal_social_rss'] ) ) {
		$rss = $data['tdminimal_social_rss'];
	} else {
		$rss = '';
	}
	
	if( isset( $data['tdminimal_social_youtube'] ) ) {
		$youtube = $data['tdminimal_social_youtube'];
	} else {
		$youtube = '';
	}
	
	if( isset( $data['tdminimal_social_vimeo'] ) ) {
		$vimeo = $data['tdminimal_social_vimeo'];
	} else {
		$vimeo = '';
	}
	
	if( isset( $data['tdminimal_social_apple'] ) ) {
		$apple_app = $data['tdminimal_social_apple'];
	} else {
		$apple_app = '';
	}
	
	if( isset( $data['tdminimal_social_windows'] ) ) {
		$windows_app = $data['tdminimal_social_windows'];
	} else {
		$windows_app = '';
	}

	if( isset( $data['tdminimal_social_android'] ) ) {
		$android_app = $data['tdminimal_social_android'];
	} else {
		$android_app = '';
	}
 	
 	$output = '';
 	
 	if( !empty( $twitter ) ) {
 		$output .= '<li class="social-twitter"><a class="td-tooltip" title="'.__( 'Twitter', 'tdminimal' ).'" href="'.esc_url( $twitter ).'"><i class="fa fa-twitter"></i></a></li>';	
 	}
 	
 	if( !empty( $facebook ) ) {
 		$output .= '<li class="social-facebook"><a class="td-tooltip" title="'.__( 'Facebook', 'tdminimal' ).'" href="'.esc_url( $facebook ).'"><i class="fa fa-facebook"></i></a></li>';	
 	}
 	
 	if( !empty( $googleplus ) ) {
 		$output .= '<li class="social-googleplus"><a class="td-tooltip" title="'.__( 'Google+', 'tdminimal' ).'" href="'.esc_url( $googleplus ).'"><i class="fa fa-google-plus"></i></a></li>';	
 	}
 	
 	if( !empty( $skype ) ) {
 		$output .= '<li class="social-skype"><a class="td-tooltip" title="'.__( 'Skype', 'tdminimal' ).'" href="skype:'.esc_attr( $skype ).'?call"><i class="fa fa-skype"></i></a></li>';	
 	}
 	
 	if( !empty( $flickr ) ) {
 		$output .= '<li class="social-flickr"><a class="td-tooltip" title="'.__( 'Flickr', 'tdminimal' ).'" href="'.esc_url( $flickr ).'"><i class="fa fa-flickr"></i></a></li>';	
 	}
 	
 	if( !empty( $linkedin ) ) {
 		$output .= '<li class="social-linkedin"><a class="td-tooltip" title="'.__( 'LinkedIn', 'tdminimal' ).'" href="'.esc_url( $linkedin ).'"><i class="fa fa-linkedin"></i></a></li>';	
 	}
 	
 	if( !empty( $pinterest ) ) {
 		$output .= '<li class="social-pinterest"><a class="td-tooltip" title="'.__( 'Pinterest', 'tdminimal' ).'" href="'.esc_url( $pinterest ).'"><i class="fa fa-pinterest-square"></i></a></li>';	
 	}
 	
 	if( !empty( $dribbble ) ) {
 		$output .= '<li class="social-dribbble"><a class="td-tooltip" title="'.__( 'Dribbble', 'tdminimal' ).'" href="'.esc_url( $dribbble ).'"><i class="fa fa-dribbble"></i></a></li>';	
 	}
 	
 	if( !empty( $tumblr ) ) {
 		$output .= '<li class="social-tumblr"><a class="td-tooltip" title="'.__( 'Tumblr', 'tdminimal' ).'" href="'.esc_url( $tumblr ).'"><i class="fa fa-tumblr"></i></a></li>';	
 	}
 	
 	if( !empty( $github ) ) {
 		$output .= '<li class="social-github"><a class="td-tooltip" title="'.__( 'Github', 'tdminimal' ).'" href="'.esc_url( $github ).'"><i class="fa fa-github-alt"></i></a></li>';	
 	}
 	
 	if( !empty( $instagram ) ) {
 		$output .= '<li class="social-instagram"><a class="td-tooltip" title="'.__( 'Instagram', 'tdminimal' ).'" href="'.esc_url( $instagram ).'"><i class="fa fa-instagram"></i></a></li>';	
 	}
 	
 	if( !empty( $rss ) ) {
 		$output .= '<li class="social-rss"><a class="td-tooltip" title="'.__( 'RSS', 'tdminimal' ).'" href="'.esc_url( $rss ).'"><i class="fa fa-rss"></i></a></li>';	
 	}
 	
 	if( !empty( $youtube ) ) {
 		$output .= '<li class="social-youtube"><a class="td-tooltip" title="'.__( 'YouTube', 'tdminimal' ).'" href="'.esc_url( $youtube ).'"><i class="fa fa-youtube"></i></a></li>';	
 	}
 	
 	if( !empty( $vimeo ) ) {
 		$output .= '<li class="social-vimeo"><a class="td-tooltip" title="'.__( 'Vimeo', 'tdminimal' ).'" href="'.esc_url( $vimeo ).'"><i class="fa fa-vimeo-square"></i></a></li>';	
 	}
 	
 	if( !empty( $apple_app ) ) {
 		$output .= '<li class="social-apple-app"><a class="td-tooltip" title="'.__( 'Apple App', 'tdminimal' ).'" href="'.esc_url( $apple_app ).'"><i class="fa fa-apple"></i></a></li>';	
 	}
 	
 	if( !empty( $windows_app ) ) {
 		$output .= '<li class="social-windows-app"><a class="td-tooltip" title="'.__( 'Windows App', 'tdminimal' ).'" href="'.esc_url( $windows_app ).'"><i class="fa fa-windows"></i></a></li>';	
 	}
 	
 	if( !empty( $android_app ) ) {
 		$output .= '<li class="social-android-app"><a class="td-tooltip" title="'.__( 'Android App', 'tdminimal' ).'" href="'.esc_url( $android_app ).'"><i class="fa fa-android"></i></a></li>';	
 	}
 	
 	return $output;
}

/**
* Shows post attachments as a slideshow
*
* @since tdminimal 1.0
*/
function tdminimal_post_slideshow() {
	global $post;
	
	$args = array(
		'post_type' => 'attachment',
		'numberposts' => -1,
		'post_status' => null,
		'post_parent' => $post->ID,
		'order' => 'ASC',
		'orderby' => 'menu_order'
	);
	
	$attachments = get_posts( $args );
	
	ob_start(); 
		
		if(!empty($attachments)) {
			echo '<ul class="list-unstyled bxslider">';
			foreach ( $attachments as $attachment ) { 
				echo '<li><img src="'.wp_get_attachment_url( $attachment->ID ).'" alt="'.$attachment->post_title.'"></li>';
			}
			echo '</ul>';
		} 
	
	$output = ob_get_contents();
	ob_end_clean();
	
	return $output;
}

/**
 * This function checks if user want to have an infinite scroll or not
 *
 * @since tdminimal 1.0
 */
 function tdminimal_is_infinite_scroll() {
	global $data;
	
	if( isset( $data['tdminimal_infinite_scroll'] ) ) {
		return $data['tdminimal_infinite_scroll'];
	} else {
		return false;
	}
 }

/**
 * Checks if user wants to have a Smooth Scroll
 *
 * @since tdminimal 1.0
 */
 function tdminimal_is_smooth_scroll() {
	global $data;
	
	if( isset( $data['tdminimal_is_smooth_scroll'] ) ) { 
		return $data['tdminimal_is_smooth_scroll'];
	} else {
		return false;
	}
 }

 /**
 * Checks if user wants to have a fixed menu
 *
 * @since tdminimal 1.0
 */
 function tdminimal_is_fixed_menu() {
	global $data;
	
	if( isset( $data['tdminimal_is_fixed_menu'] ) ) {
		return $data['tdminimal_is_fixed_menu'];
	} else {
		return false;
	}
 }
 
  /**
 * This function checks if user want to have an auto summary
 *
 * @since tdminimal 1.0
 */
 function tdminimal_is_auto_summary() {
	global $data;
	
	if( isset( $data['tdminimal_is_auto_blog_summary'] ) ) {
		return $data['tdminimal_is_auto_blog_summary'];
	} else {
		return false;
	}
 }
 
/**
 * Excerpt Length 
 *
 * @since tdminimal 1.0
 */
 function tdminimal_get_excerpt_length() {
 	global $data;
 	if( isset( $data['tdminimal_auto_blog_summary_length'] ) ) {
		return intval( $data['tdminimal_auto_blog_summary_length'] );
	} else {
		return 55;
	}
 }
 
 /**
 * Author Social Links
 *
 * @since tdminimal 1.0
 */
function tdminimal_get_author_social_links( $author_id ) { 
	$author_twitter = get_the_author_meta( 'twitter', $author_id );
	$author_facebook = get_the_author_meta( 'facebook', $author_id );
	$author_googleplus = get_the_author_meta( 'gplus', $author_id );
	
	if( $author_twitter != '' ) {
		$author_twitter_link = '<a href="'.esc_url( 'https://twitter/'.$author_twitter ).'" class="author-twitter pull-right" target="_blank"><i class="fa fa-twitter"></i> <span class="social-meta">Twitter</span></a>';
	} else {
		$author_twitter_link = '';
	}
	
	if( $author_facebook != '' ) {
		$author_facebook_link = '<a href="'.esc_url( $author_facebook ).'" class="author-facebook pull-right" target="_blank"><i class="fa fa-facebook"></i> <span class="social-meta">Facebook</span></a>'; 
	} else {
		$author_facebook_link = '';
	}
	
	if( $author_googleplus != '' ) {
		$author_googleplus_link = '<a href="'.esc_url( $author_googleplus ).'" class="author-googleplus pull-right" target="_blank"><i class="fa fa-google-plus"></i> <span class="social-meta">Google Plus</span></a>';
	} else {
		$author_googleplus_link = '';
	}
	
	$author_social_links = $author_twitter_link . $author_facebook_link . $author_googleplus_link;
	
	return $author_social_links;
}

/**
 * Author Section
 *
 * @since tdminimal 1.0
 */
function tdminimal_author_section() {	
	global $data;
	
	if( isset( $data['tdminimal_author_section'] ) ) {
		$is_author_section = $data['tdminimal_author_section'];
	} else {
		$is_author_section = true;
	}
	
	if( $is_author_section ) {
		global $post;
		
		$author_social_links = tdminimal_get_author_social_links( $post->post_author );
	
		$author_section = '<div class="author-section">';
				$author_section .= '<h4 class="author-name"><span class="author-name-sub">'.__( 'About', 'tdminimal' ).'</span> <a href="'.get_author_posts_url( $post->post_author ).'">'.get_the_author().'</a></h4>';

		$author_section .= '<div class="about clearfix"><div class="gravatar">'. get_avatar( $post->post_author, 192 );
		if( $author_social_links != '' ) {
			$author_section .= '<div class="author-social-links clearfix">'.$author_social_links.'</div>';
		}
		
		$author_section .= '</div>';
		$author_section .= '<div class="info">';
		$author_section .= '<p>'.nl2br( get_the_author_meta( 'description', $post->post_author ) ).'</p></div>';
		$author_section .= '</div>';
		
		$author_section .= '</div>';
	
		echo $author_section;
	}
}

/**
 * Checks if user wants to have Newsletter Section
 *
 * @since tdminimal 1.0
 */
function tdminimal_is_newsletter_section() {
	global $data;
	
	if( isset( $data['tdminimal_newsletter_section'] ) ) {
		return $data['tdminimal_newsletter_section'];
	} else {
		return false;
	}
}

 /**
 * Returns Newsletter Form
 *
 * @since tdminimal 1.0
 */
function tdminimal_newsletter_form() {
	global $data;
	
	if( isset( $data['tdminimal_newsletter_code'] ) ) {
		$tdminimal_newsletter_code = $data['tdminimal_newsletter_code'];
	} else {
		$tdminimal_newsletter_code = '';
	}
		
	if( isset( $data['tdminimal_newsletter_image'] ) ) {
		$tdminimal_newsletter_image = $data['tdminimal_newsletter_image'];
	} else {
		$tdminimal_newsletter_image = '';
	}
	
 	$temp_array = array();
 	
 	if( $tdminimal_newsletter_code != '' ) {
 		$temp_array['newsletter-code'] = $tdminimal_newsletter_code;
 		
 		if( $tdminimal_newsletter_image != '' ) {
 			$temp_array['newsletter-image'] = $tdminimal_newsletter_image;
 		} else {
 			$temp_array['newsletter-image'] = '';
 		}
 		
 		return $temp_array;
 	} else {
 		return false;
 	}
}

 /**
 * Returns Newsletter Image
 *
 * @since tdminimal 1.0
 */
 function tdminimal_newsletter_image() { 
 	$tdminimal_newsletter = tdminimal_newsletter_form();
 	
	if( $tdminimal_newsletter['newsletter-image'] != '' ) {
		return '
					<div class="newsletter-image">
						<img src="'.esc_url( $tdminimal_newsletter['newsletter-image'] ).'" alt="">
					</div>
			   ';
	} else {
		return false;
	}
 }
 
 /**
 * Adds a custom class to the HTML tag
 *
 * @since tdminimal 1.0
 */
 function tdminimal_html_class() { 
	global $data;
	$class = '';
	if( is_singular() ) {
		$has_sidebar_class = '';
		
		$tdminimal_page_post_template = get_post_meta( get_the_ID(), '_tdminimal_page_post_template', true );
		if( $tdminimal_page_post_template != 'full-width' ) {
			$has_sidebar_class = ' layout-has-sidebar';
		}
		
		if( !tdminimal_is_auto_post_page_sidebar() ) {
			$has_sidebar_class = '';
		}
		
		$class .= $has_sidebar_class;
	} else {
		if( isset( $data['tdminimal_is_sidebar'] ) && $data['tdminimal_is_sidebar'] ) {
			$class .= ' layout-has-sidebar';
		}
	} 
	
	if( class_exists('bbPress') && is_bbpress() ) {
		$class = 'bbpress-layout';
	}
	
	if( class_exists('Woocommerce') && is_woocommerce() ) {
		$class = 'woo-layout';
	}
	
	if( is_home() || is_archive() || is_search() ) {
		if( isset( $data['tdminimal_blog_layout'] ) && ( $data['tdminimal_blog_layout'] === 'dynamic' || $data['tdminimal_blog_layout'] === 'dynamic-alt' ) ) {
			$class .= ' dynamic-layout';
		}
	}
	
	return $class;

 }
 
 /**
 * Template for Page or Post
 *
 * @since tdminimal 1.0
 */
 function tdminimal_post_page_template() {
	$tdminimal_page_post_template = get_post_meta( get_the_ID(), '_tdminimal_page_post_template', true );
		
	$is_sidebar = true;
	$sidebar_right = true;
	$sidebar_left = false;
	$span_class = 'col-lg-8 col-md-8';
	
	if( !tdminimal_is_auto_post_page_sidebar() ) {
		$span_class = 'col-lg-12 col-md-12';
		$is_sidebar = false;
	} else {
		if( $tdminimal_page_post_template === 'left-sidebar' ) {
			$sidebar_right = false;
			$sidebar_left = true;
			$span_class = 'col-lg-8 col-md-8 pull-right';
		} else if( $tdminimal_page_post_template === 'full-width' ) {
			$span_class = 'col-lg-12 col-md-12';
			$is_sidebar = false;
		}
	}
	
	$post_page_template_info = array(
		'is_sidebar' => $is_sidebar,
		'right_sidebar' => $sidebar_right,
		'left_sidebar' => $sidebar_left,
		'span_class' => $span_class
	); 
	
	return $post_page_template_info;
 }
 
 /**
 * Sidebar Visability 
 *
 * @since tdminimal 1.0
 */
 function tdminimal_is_sidebar() {
	global $data;
	
	if( isset( $data['tdminimal_is_sidebar'] ) && !$data['tdminimal_is_sidebar'] ) {
		$output = array(
			'class' => 'col-lg-12 col-md-12',
			'is_sidebar' => false
		);
	} else if( isset( $data['tdminimal_blog_layout'] ) && ( $data['tdminimal_blog_layout'] === 'dynamic' || $data['tdminimal_blog_layout'] === 'dynamic-alt' ) ) {
		$output = array(
			'class' => 'col-lg-12 col-md-12',
			'is_sidebar' => false
		);
	} else {
		$output = array(
			'class' => 'col-lg-8 col-md-8',
			'is_sidebar' => true
		);
	}
	
	return $output;
 }
 
 /**
 * Checks if user wants to have 1 Column (Alternative) Layout
 *
 * @since tdminimal 1.0
 */
 function tdminimal_is_one_column_alt_layout() {
 	global $data;
 	
 	if( isset( $data['tdminimal_blog_layout'] ) && $data['tdminimal_blog_layout'] === 'alternative' ) {
 		return true;
 	} else {
 		return false;
 	}
 }
 
 /**
 * Checks if user wants to have 2 Columns Layout
 *
 * @since tdminimal 1.0
 */
 function tdminimal_is_two_columns_layout() {
 	global $data;
 	
 	if( isset( $data['tdminimal_blog_layout'] ) && $data['tdminimal_blog_layout'] === 'dynamic' ) {
 		return true;
 	} else {
 		return false;
 	}
 }
 
 /**
 * Checks if user wants to have 2 Columns (Alternative) Layout
 *
 * @since tdminimal 1.0
 */
 function tdminimal_is_two_columns_alt_layout() {
 	global $data;
 	
 	if( isset( $data['tdminimal_blog_layout'] ) && $data['tdminimal_blog_layout'] === 'dynamic-alt' ) {
 		return true;
 	} else {
 		return false;
 	}
 }
 
 /**
 * Slider Content (Home Page)
 *
 * @since tdminimal 1.0
 */
function tdminimal_slider_content() { 
	global $data;
	
	if( isset( $data['tdminimal_content_slider'] ) ) {
		$featured_items = $data['tdminimal_content_slider'];
		if( !empty( $featured_items ) ) {
	
			$output = '<div class="featured-content post-slideshow"><ul class="bxslider list-unstyled">';
			foreach( $featured_items as $featured_item ) {
				$output .= '<li class="'.esc_attr( $featured_item['caption_align'] ).'">';
				if( $featured_item['embed_video'] != '' ) {
					$output .= $featured_item['embed_video'];
				} else {
					$output .= '<a href="'.esc_url( $featured_item['link'] ).'"><img src="'.esc_url ( $featured_item['url'] ).'" alt="'.esc_attr( $featured_item['title'] ).'"></a>';
					$output .= '<div class="featured-info">';
					$output .= '<h2 class="featured-title"><a href="'.esc_url( $featured_item['link'] ).'">'.$featured_item['title'].'</a></h2>';
					$output .= '<p class="featured-description">'.$featured_item['description'].'</p>';
				
					if( $featured_item['cta'] != '' ) {
						$output .= '<div class="featured-content-more"><a class="button" href="'.esc_url( $featured_item['link'] ).'">'.$featured_item['cta'].'</a></div>';
					}
				
					$output .= '</div>';
				}
				$output .= '</li>';
			}
			$output .= '</ul></div>';
		
			echo $output;
		
		}
	}
}

/**
 * Home Page Recent Blog Posts
 *
 * @since tdminimal 1.0
 */
function tdminimal_recent_blog_posts() {
	global $data;
	
	if( $data['tdminimal_recent_blog_posts'] ) {
		$recent_blog_posts = $data['tdminimal_recent_blog_posts'];
	} else {
		$recent_blog_posts = array();
	}
	
	setlocale( LC_TIME, get_locale() );
	
	if( !empty( $recent_blog_posts ) ) {
		
		if( $data['tdminimal_recent_blog_posts_summary'] ) {
			$is_post_summary = $data['tdminimal_recent_blog_posts_summary'];
		} else {
			$is_post_summary = false;
		}
	
		$output = '<div class="recent-blog-posts-container">';
		
		foreach( $recent_blog_posts as $recent_blog_post ) { 
			$count = 1;
			$section_category_name = '';
			
			if( $recent_blog_post['per_page'] != '' ) {
				$posts_per_page = intval( $recent_blog_post['per_page'] );
			} else {
				$posts_per_page = 3;
			}
			
			if( $recent_blog_post['cat_id'] != '' ) {
				$category_id = intval( $recent_blog_post['cat_id'] );
				$recent_posts_args = array(
					'post_type' => 'post',
					'posts_per_page' => $posts_per_page,
					'ignore_sticky_posts' => 1,
					'cat' => $category_id
				);
				$section_category_name = sanitize_title( $recent_blog_post['title'] ).'-items';
				$section_title = '<h4 class="recent-blog-posts-category clearfix"><a class="title" href="'.get_category_link( $category_id ).'">'.$recent_blog_post['title'].'</a><span class="pull-right"><a class="recent-posts-view-more" href="'.get_category_link( $category_id ).'"><span class="recent-posts-view-more-meta">'.__( 'View More', 'tdminimal' ).'</span><i class="fa fa-list"></i></a></span></h4>';
			} else {
				$recent_posts_args = array(
					'post_type' => 'post',
					'posts_per_page' => $posts_per_page,
					'ignore_sticky_posts' => 1
				);
				$section_category_name = sanitize_title( $recent_blog_post['title'] ).'-items';
				$posts_page_id = get_option( 'page_for_posts');
				$posts_page_url = get_page_uri($posts_page_id  );
				$section_title = '<h4 class="recent-blog-posts-category clearfix"><a class="title" href="'.$posts_page_url.'">'.$recent_blog_post['title'].'</a><span class="pull-right"><a class="recent-posts-view-more" href="'.$posts_page_url.'"><span class="recent-posts-view-more-meta">'.__( 'View More', 'tdminimal' ).'</span><i class="fa fa-list"></i></a></span></h4>';
			}
			
			$output .= $section_title;
			$output .= '<div class="row">';
			$output .= '<div class="recent-blog-posts-container-inner '.$section_category_name.'">';
			
			$recent_posts_query = new WP_Query( $recent_posts_args );
			
			while( $recent_posts_query->have_posts() ) {
				$recent_posts_query->the_post(); 
				
				ob_start();
				comments_popup_link( __( 'Leave a Comment', 'tdminimal' ), __( '1 Comment', 'tdminimal' ), __( '% Comments', 'tdminimal' ) );
				$count_comments = ob_get_contents();
				ob_end_clean();
				
				$output .= '<div class="col-lg-6 col-md-6 recent-blog-post-item"><div class="recent-blog-posts-inner">';
				
				if( get_the_post_thumbnail() ) {
					$output .= '<div class="post-thumb">';
					$output .= get_the_post_thumbnail();
					$output .= '<a href="'.get_permalink().'" class="thumb-mask"></a>';
					$output .= '<a href="'.get_permalink().'" class="thumb-mask-link-icon"><i class="fa fa-link"></i></a>';
					$output .= '</div>';
					$output .= '<div class="recent-blog-post-header">';
					$output .= '<h4 class="recent-blog-post-title"><a href="'.esc_url( get_permalink() ).'">'.get_the_title().'</a></h4>';
					
					$output .= '<div class="recent-blog-post-meta">';
					$output .= '<span>'.esc_html( strftime('%B %e, %Y', get_post_time('U', true)) ).'</span><span class="sep">&mdash;</span>';
					$output .= '<span>'.$count_comments.'</span>';
					$output .= '</div>';
					
					$output .= '</div>';
				} else {
					$output .= '<div class="recent-blog-post-header">';
					$output .= '<h4 class="recent-blog-post-title"><a href="'.esc_url( get_permalink() ).'">'.get_the_title().'</a></h4>';
					$output .= '<div class="recent-blog-post-meta">';
					$output .= '<span>'.esc_html( strftime('%B %e, %Y', get_post_time('U', true)) ).'</span><span class="sep">&mdash;</span>';
					$output .= '<span>'.$count_comments.'</span>';
					$output .= '</div>';
					$output .= '</div>';
				}
				
				if( $is_post_summary ) {
					$output .= '<div class="recent-blog-post-summary">';	
					$output .= get_the_excerpt();
					$output .= '</div>';
				}
				
				$output .= '</div></div>';
				$count++;
			}
			
			$output .= '</div>';
			$output .= '</div>';
		}
		
		$output .= '</div>';
		
		echo $output;
		?>
		<script type="text/javascript">
		jQuery(document).ready(function(){	
			jQuery(document).imagesLoaded(function(){
				jQuery('.recent-blog-posts-container-inner').isotope({
					itemSelector : '.recent-blog-post-item',
					transformsEnabled: false,
					layoutMode: 'sloppyMasonry'
				});
			});
		
			jQuery(document).smartresize(function(){
				jQuery('.recent-blog-posts-container-inner').isotope({
					itemSelector : '.recent-blog-post-item',
					transformsEnabled: false,
					layoutMode: 'sloppyMasonry'
				});
			});
        });
		</script>
		<?php
	}
}

/**
 * Checks if user wants to have a custom
 * share buttons tyle
 *
 * @since tdminimal 1.0.0
 */
 function tdminimal_is_custom_share_buttons() {
 	global $data;
	
	if( isset( $data['tdminimal_share_buttons_style'] ) ) {
		return $data['tdminimal_share_buttons_style'];
	} else {
		return true;
	}
 }

/**
* Share Buttons
*
* @since tdminimal 1.0
*/
function tdminimal_get_share_buttons() {
	global $data;
	
	if( isset( $data['tdminimal_share_buttons_title'] ) ) {
		$share_butons_title = $data['tdminimal_share_buttons_title'];
	} else {
		$share_butons_title = 'Share';
	}
	
	$current_url = get_permalink();
	$current_title = get_the_title();

	$output = '<div class="share-buttons-container">';
	$output .= '<div class="share-buttons-inner">';
	
	if( !tdminimal_is_custom_share_buttons() ) {
		$google_plus_share = '<div class="g-plus" data-action="share" data-annotation="bubble"></div>';
		$google_plus_share .= '<script type="text/javascript">';
		$google_plus_share .= '(function() {';	
		$google_plus_share .= 'var po = document.createElement("script"); po.type = "text/javascript"; po.async = true;';	
		$google_plus_share .= 'po.src = "https://apis.google.com/js/plusone.js";'; 
		$google_plus_share .= 'var s = document.getElementsByTagName("script")[0]; s.parentNode.insertBefore(po, s);';
		$google_plus_share .= '})();';	
		$google_plus_share .= '</script>';
	
		$in_share = '<script src="//platform.linkedin.com/in.js" type="text/javascript">lang: en_US</script>';
		$in_share .= '<script type="IN/Share" data-counter="right"></script>';

		$facebook_share = '<iframe src="//www.facebook.com/plugins/like.php?href='.$current_url.'&amp;send=false&amp;layout=button_count&amp;width=450&amp;show_faces=true&amp;font&amp;colorscheme=light&amp;action=like&amp;height=21" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:450px; height:21px;" allowTransparency="true"></iframe>';	 

		$twitter_share = '<a href="https://twitter.com/share" class="twitter-share-button">Tweet</a>';
		$twitter_share .= '<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?"http":"https";if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document, "script", "twitter-wjs");</script>';
		
		$output .= '<ul class="default-share-buttons"><li><div class="share-buttons-title"><i class="icon-share-sign"></i> '.$share_butons_title.'</div></li><li class="facebook">'.$facebook_share.'</li><li class="twitter">'.$twitter_share.'</li><li class="google-plus">'.$google_plus_share.'</li><li class="in">'.$in_share.'</li></ul>';
	} else {
		$output .= '<div class="share-buttons-title"><i class="fa fa-share-square"></i> '.$share_butons_title.'</div>';
		$output .= '<div class="share-btns">';
		$output .= '<a href="http://www.facebook.com/share.php?u='.urlencode( $current_url ).'&title='.$current_title.'" class="facebook"><i class="fa fa-facebook"></i> <span class="share-meta">Facebook</span></a>';
		$output .= '<a href="https://twitter.com/intent/tweet?url='.urlencode( $current_url ).'&text='.$current_title.'" class="twitter"><i class="fa fa-twitter"></i> <span class="share-meta">Twitter</span></a>';
		$output .= '<a href="https://plus.google.com/share?url='.urlencode( $current_url ).'" class="googleplus"><i class="fa fa-google-plus"></i> <span class="share-meta">Google Plus</span></a>';
		$output .= '<a href="http://www.linkedin.com/shareArticle?mini=true&url='.urlencode( $current_url ).'&title='.$current_title.'" class="linkedin"><i class="fa fa-linkedin"></i> <span class="share-meta">LinkedIn</span></a>';
		$output .= '</div>';
	}
	
	$output .= '</div>';
	
	$output .= '</div>';

	echo $output;
}

/**
* Checks if user wants to have share button on the bottom of the post
*
* @since tdminimal 1.0
*/
function tdminimal_is_bottom_share_buttons() {
	global $data;
	
	if( isset( $data['tdminimal_share_buttons_bottom'] ) ) {
		return $data['tdminimal_share_buttons_bottom'];
	} else {
		return true;
	}
}

/**
 * Google Tracking Code
 *
 * @since tdminimal 1.0
 */
function tdminimal_tracking_code() {
	global $data;
	
	if( isset( $data['tdminimal_google_analytics'] ) ) {
		if( $data['tdminimal_google_analytics'] != '' ) {
			echo $data['tdminimal_google_analytics'];
		}
	}
}

 /**
 * Checks if user wants to have a sidebar on bbPress Page
 *
 * @since tdminimal 1.0
 */
 function tdminimal_is_bbpress_sidebar() {
	global $data;
	
	if( isset( $data['tdminimal_bbpress_sidebar'] ) ) {
		return $data['tdminimal_bbpress_sidebar'];
	} else {
		return false;
	}
 }

 /**
 * Related Posts
 *
 * @since tdminimal 1.0
 */
 function tdminimal_related_posts() {
	global $data;
	
	if( isset( $data['tdminimal_related_posts_section'] ) ) {
		$is_related_posts = $data['tdminimal_related_posts_section'];
	} else {
		$is_related_posts = true;
	}
	
	if( isset( $data['tdminimal_related_posts_section_title'] ) && $data['tdminimal_related_posts_section_title'] != '' ) {
		$section_title = '<h4 class="related-posts-container-title">' . $data['tdminimal_related_posts_section_title'] . '</h4>';
	} else {
		$section_title = '';
	}
	
	if( isset( $data['tdminimal_related_posts_section_number'] ) ) {
		$items_per_page = $data['tdminimal_related_posts_section_number'];
	} else {
		$items_per_page = 3;
	}
	
	if( isset( $data['tdminimal_related_posts_section_layout'] ) ) {
		$section_layout = $data['tdminimal_related_posts_section_layout'];
	} else {
		$section_layout = "";
	}
	
	if( $is_related_posts ) { 
		global $post;
		setlocale( LC_TIME, get_locale() );
		
		$categories = get_the_category( $post->ID );

		if ( $categories ) {
			$category_ids = array();
			
			foreach( $categories as $individual_category ) {
				$category_ids[] = $individual_category->term_id;
			}
			
			$args = array(
				'category__in' => $category_ids,
				'post__not_in' => array( $post->ID ),
				'posts_per_page'=> $items_per_page
			);
			
			$related_posts_query = new WP_Query( $args );
			
			if( $related_posts_query->have_posts() ) {
				$output = '<div class="related-posts-container">';
				$output .= $section_title;
				if( $section_layout === 'simple-list' ) {
					$output .= '<ul class="related-posts-list">';
					while( $related_posts_query->have_posts() ) { 
						   $related_posts_query->the_post();
						$output .= '<li>';
						$output .= '<a href="'.get_permalink().'" rel="bookmark" title="'.get_the_title().'">'.get_the_title().'</a>';
						$output .= '</li>';
					}
					$output .= '</ul>';
				} else {
					if( $section_layout === 'thumbs-only' ) { 
						$has_meta = false;
					} else {
						$has_meta = true;
					}
					
					$output .= '<div class="row related-posts-thumbs">';
					while( $related_posts_query->have_posts() ) { 
						   $related_posts_query->the_post();
						$output .= '<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 related-post-item">';
						if ( get_the_post_thumbnail( $post->ID, 'thumbnail') ) {
							$output .= '<div class="post-thumb">';
							$output .= '<a href="'.get_permalink( $related_posts_query->post->ID ).'">';
							$output .= get_the_post_thumbnail( $related_posts_query->post->ID, 'thumbnail' );
							$output .= '<a href="'.get_permalink().'" class="thumb-mask" alt="'.get_the_title().'"></a>';
							$output .= '<a href="'.get_permalink().'" class="thumb-mask-link-icon" alt="'.get_the_title().'"><i class="fa fa-link"></i></a>';
							$output .= '</a>';
							$output .= '</div>';
						}
						
						if( $has_meta ) {
							$output .= '<h4 class="related-post-item-title"><a href="'.get_permalink().'" rel="bookmark" title="'.get_the_title().'">'.get_the_title().'</a></h4>';
						}
						$output .= '</div>';
					}
					$output .= '</div>';
					
					$output .= '<script type="text/javascript">';
					$output .= "var relatedPostsContainer = jQuery('.related-posts-thumbs');";
					$output .= "relatedPostsContainer.imagesLoaded(function(){";
						$output .= "relatedPostsContainer.isotope({ itemSelector : '.related-post-item', layoutMode : 'fitRows' });";
						$output .= "jQuery(window).smartresize(function(){ relatedPostsContainer.isotope({ itemSelector : '.related-post-item', layoutMode : 'fitRows' }); });";
					$output .= "});";
					$output .= '</script>';
				}
				$output .= '</div> <!-- .related-posts-container -->';
				
				wp_reset_postdata();
				return $output;
			}
		}
	}
 }
 
/**
 * Related Posts
 *
 * @since tdminimal 1.0.1
 */
 function tdminimal_is_auto_post_page_sidebar() {
	global $data;
	
	if( isset( $data['tdminimal_is_post_page_sidebar'] ) ) {
		return $data['tdminimal_is_post_page_sidebar'];
	} else {
		return true;
	}
 }
 
/**
 * Footer Text
 *
 * @since tdminimal 1.0.2
 */
 function tdminimal_footer_text() {
 	global $data;
 	if( isset( $data['tdminimal_footer_text'] ) && $data['tdminimal_footer_text'] != '' ) {
		return do_shortcode( $data['tdminimal_footer_text'] );
	} else {
		$output = __( 'Copyright', 'tdminimal' ) . ' <a href="'.get_home_url( '/' ).'" title="'.esc_attr( get_bloginfo( 'name', 'display' ) ).'" rel="home">'.get_bloginfo( 'name' ).'</a>';
		$output .= '<span class="sep">&bull;</span>';
		$output .= sprintf( __( '%1$s by %2$s', 'tdminimal' ), 'tdMinimal Theme', '<a href="http://tasko.us/" target="_blank" rel="designer">tdThemes</a>' );
		return $output;
	}
 }
 
/**
 * Footer Copyright Shortcode
 *
 * @since tdminimal 1.0.2
 */
 function tdminimal_footer_copyright_shortcode() {
 	return __( 'Copyright', 'tdminimal' ) . ' <a href="'.get_home_url( '/' ).'" title="'.esc_attr( get_bloginfo( 'name', 'display' ) ).'" rel="home">'.get_bloginfo( 'name' ).'</a>';
 }
 add_shortcode( 'td_site_copyright', 'tdminimal_footer_copyright_shortcode' );
 
/**
 * Checks if user wants to replace full size featured image
 * with thumbnail for Blog/Archive/Search Page
 *
 * @since tdminimal 1.0.2
 */
 function tdminimal_is_featured_image_as_thumb() {
 	global $data;
 	
 	if( isset( $data['tdminimal_is_featured_image_as_thumb'] ) ) {
		return $data['tdminimal_is_featured_image_as_thumb'];
	} else {
		return false;
	}
 }
 
 /**
 * Checks if user wants to have a Masonry Layout for Blog posts
 *
 * @since tdminimal 1.0.2
 */
 function tdminimal_is_masonry_layout() {
 	global $data;
 	
 	if( isset( $data['tdminimal_is_blog_masonry'] ) ) {
		return $data['tdminimal_is_blog_masonry'];
	} else {
		return true;
	}
 }
 
/**
 * Footer Widget Area
 *
 * @since tdminimal 1.0.3
 */
 function tdminimal_is_footer_widgets() { 
 	global $data;
	
	if( isset( $data['tdminimal_footer_widget_area'] ) ) {
		return $data['tdminimal_footer_widget_area'];
	} else {
		return false;
	}
}
 
/**
 * Cusom Meta Boxes
 *
 * @since tdminimal 1.0
 */
 function tdminimal_metaboxes() {
	add_meta_box('tdminimal-page-post-template-settings', 'Post Template', 'tdminimal_page_post_template_ui', 'post', 'side', 'high');
    add_meta_box('tdminimal-page-post-template-settings', 'Page Template', 'tdminimal_page_post_template_ui', 'page', 'side', 'high');
 }
 add_action( 'add_meta_boxes', 'tdminimal_metaboxes' );

/**
* Options for Page/Post Template Meta Box
*
* @since tdminimal 1.0
*/
function tdminimal_page_post_template_ui() {
    global $post;
    
    wp_nonce_field( plugin_basename( __FILE__ ), 'tdminimal_page_post_template_noncename' );
    
    $tdminimal_page_template = get_post_meta( $post->ID, '_tdminimal_page_post_template', true );
    
    echo '	<select name="_tdminimal_page_post_template">
         		<option value="" ' . selected( $tdminimal_page_template , '', false) . '>'.__( 'Right Sidebar', 'tdminimal' ).'</option>
         		<option value="left-sidebar" ' . selected( $tdminimal_page_template , 'left-sidebar', false ) . '>'.__( 'Left Sidebar', 'tdminimal' ).'</option>
         		<option value="full-width" ' . selected( $tdminimal_page_template , 'full-width', false ) . '>'.__( 'Full Width', 'tdminimal' ).'</option>
         	</select>
         ';
}

/**
* Save Custom Metabox Data
*
* @since tdminimal 1.0
*/
function tdminimal_save_custom_metabox_data( $post_id, $post ) {
	
	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return  $post->ID;
	}
	
	if ( isset( $_POST['post_type'] ) && $_POST['post_type'] == 'page' ) { 
    	if ( !isset( $_POST['tdminimal_page_post_template_noncename'] ) || !wp_verify_nonce( $_POST['tdminimal_page_post_template_noncename'], plugin_basename(__FILE__) )) {
			return $post->ID;
		} 
		
		$tdminimal_custom_data['_tdminimal_page_post_template'] = $_POST['_tdminimal_page_post_template'];
    } else {
    	if ( !isset( $_POST['tdminimal_page_post_template_noncename'] ) || !wp_verify_nonce( $_POST['tdminimal_page_post_template_noncename'], plugin_basename(__FILE__) )) {
			return $post->ID;
		} 
		
    	$tdminimal_custom_data['_tdminimal_page_post_template'] = $_POST['_tdminimal_page_post_template'];
    }
    
    foreach ( $tdminimal_custom_data as $key => $value ) { 
    
        if( $post->post_type == 'revision' ) {
        	return; 
        }
        
        $value = implode(',', (array)$value);
        
        if( get_post_meta( $post->ID, $key, false ) ) { 
            update_post_meta( $post->ID, $key, $value );
        } else { 
            add_post_meta( $post->ID, $key, $value );
        }
        
        if( !$value ) {
        	delete_post_meta( $post->ID, $key );
        }
    }
}
add_action('save_post', 'tdminimal_save_custom_metabox_data', 1, 2);