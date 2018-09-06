<?php

add_action('init','of_options');

if (!function_exists('of_options')) {
	function of_options() {
	
		$tdminimal_color_scheme_options = array(
							"" => "Default",
							"blue" => __( "Blue", "tdminimal" ),
							"red" => __( "Red", "tdminimal" ),
							"orange" => __( "Orange", "tdminimal" ),
							"purple" => __( "Purple", "tdminimal" ),
							"brown" => __( "Brown", "tdminimal" ),
							"pink" => __( "Pink", "tdminimal" ),
							"gray" => __( "Gray", "tdminimal" )
							
		);
		
		$tdminimal_blog_layout_options = array(
							"" => __( "1 Column", "tdminimal" ),
							"alternative" => __( "1 Column ( Alternative )", "tdminimal" ),
							"dynamic" => __( "2 Columns", "tdminimal" ),
							"dynamic-alt" => __( "2 Columns ( Alternative )", "tdminimal" )
		);
		
		$tdminimal_related_posts_section_layout_options = array(
							"" => __( "Thumbnail and Title", "tdminimal" ),
							"thumbs-only" => __( "Thumbnail Only", "tdminimal" ),
							"simple-list" => __( "Simple List", "tdminimal" )
		);
		
		$tdminimal_homepage_blocks = array (
			"disabled" => array (
				"placebo" 				=> "placebo", //REQUIRED!
				"slider_block"			=> __( "Home Slider", "tdminimal" ),
				"recent_posts_block"	=> __( "Recent Posts", "tdminimal" ),
			), 
			"enabled" => array (
				"placebo" 		=> "placebo", //REQUIRED!
			),
		);

/*-----------------------------------------------------------------------------------*/
/* The Options Array */
/*-----------------------------------------------------------------------------------*/

// Set the Options Array
global $of_options;
$of_options = array();

$of_options[] = array( 	"name" 		=> __( "General Settings", "tdminimal" ),
						"type" 		=> "heading",
						"icon"		=> ADMIN_IMAGES . "icon-settings.png"
				);

$of_options[] = array( 	"name" 		=> __( "Smooth Scroll", "tdminimal" ),
						"desc" 		=> __( "If left checked then your website will have a Smooth Scroll.", "tdminimal" ),
						"id" 		=> "tdminimal_is_smooth_scroll",
						"std" 		=> 0,
						"on" 		=> __( "On", "tdminimal" ),
						"off" 		=> __( "Off", "tdminimal" ),
						"type" 		=> "switch"
				);

$of_options[] = array( 	"name" 		=> __( "Fixed Menu", "tdminimal" ),
						"desc" 		=> __( "If left checked then your top menu will be fixed.", "tdminimal" ),
						"id" 		=> "tdminimal_is_fixed_menu",
						"std" 		=> 0,
						"on" 		=> __( "On", "tdminimal" ),
						"off" 		=> __( "Off", "tdminimal" ),
						"type" 		=> "switch"
				);

$of_options[] = array( 	"name" 		=> __( "Pre-defined Color Schemes", "tdminimal" ),
						"desc" 		=> __( "Select a color scheme for your website.", "tdminimal" ),
						"id" 		=> "tdminimal_color_scheme",
						"std" 		=> "",
						"type" 		=> "select",
						"options" 	=> $tdminimal_color_scheme_options
				);


/* Header Settings */
$of_options[] = array( 	"name" 		=> __( "Header Settings", "tdminimal" ),
						"type" 		=> "heading",
						"icon"		=> ADMIN_IMAGES . "header-icon.png"
				);

$of_options[] = array( 	"name" 		=> __( "Use Logo as a Website Title?", "tdminimal" ),
						"desc" 		=> __( "If left checked then your Logo will replace the Site Title.", "tdminimal" ),
						"id" 		=> "tdminimal_logo_as_title",
						"std" 		=> 0,
						"on" 		=> __( "Yes", "tdminimal" ),
						"off" 		=> __( "No", "tdminimal" ),
						"type" 		=> "switch"
				);
				
$of_options[] = array( 	"name" 		=> __( "Logo Upload", "tdminimal" ),
						"desc" 		=> __( "Upload your logo here.", "tdminimal" ),
						"id" 		=> "tdminimal_website_logo",
						"std" 		=> "",
						"type" 		=> "upload"
				);

$of_options[] = array( 	"name" 		=> __( "Favicon Upload", "tdminimal" ),
						"desc" 		=> __( "Upload your favicon here. Make sure that your favicon is 16x16 px and has .ico format)", "tdminimal" ),
						"id" 		=> "tdminimal_favicon_upload",
						"std" 		=> "",
						"type" 		=> "upload"
				);

/* Home Settings */
$of_options[] = array( 	"name" 		=> __( "Home Settings", "tdminimal" ),
						"type" 		=> "heading",
						"icon"		=> ADMIN_IMAGES . "icon-home.png"
				);

$of_options[] = array( 	"name" 		=> __( "Homepage Layout Manager", "tdminimal" ),
						"desc" 		=> __( "Organize how you want the layout to appear on the homepage", "tdminimal" ),
						"id" 		=> "tdminimal_home_page_manager",
						"std" 		=> $tdminimal_homepage_blocks,
						"type" 		=> "sorter"
				);
				
$of_options[] = array( 	"name" 		=> __( "Featured Slideshow Settings", "tdminimal" ),
						"desc" 		=> __( "<strong>Home Slider Block</strong>. Unlimited slider with drag and drop sortings.", "tdminimal" ),
						"id" 		=> "tdminimal_content_slider",
						"std" 		=> "",
						"type" 		=> "featured_slider"
				); 	

$of_options[] = array( 	"name" 		=> __( "Recent Blog Posts Options", "tdminimal" ),
						"desc" 		=> __( "<strong>Recent Posts Block</strong>. Unlimited blog posts with drag and drop sortings.", "tdminimal" ),
						"id" 		=> "tdminimal_recent_blog_posts",
						"std" 		=> "",
						"type" 		=> "recent_posts"
				);

$of_options[] = array( 	"name" 		=> " ",
						"sub"		=> __( "Recent Blog Post Summary", "tdminimal" ),
						"desc" 		=> "If left checked then Post summary will be shown",
						"id" 		=> "tdminimal_recent_blog_posts_summary",
						"std" 		=> 0,
						"on" 		=> "On",
						"off" 		=> "Off",
						"type" 		=> "switch"
				);

/* Blog Settings */
$of_options[] = array( 	"name" 		=> __( "Blog Settings", "tdminimal" ),
						"type" 		=> "heading",
						"icon"		=> ADMIN_IMAGES . "blog-icon.png"
				);

$of_options[] = array( 	"name" 		=> __( "Infinite Scroll", "tdminimal" ),
						"desc" 		=> __( "If left checked then Infinite Scroll will be added to your blog posts.", "tdminimal" ),
						"id" 		=> "tdminimal_infinite_scroll",
						"std" 		=> 0,
						"on" 		=> __( "On", "tdminimal" ),
						"off" 		=> __( "Off", "tdminimal" ),
						"type" 		=> "switch"
				);

$of_options[] = array( 	"name" 		=> __( "Blog Layout", "tdminimal" ),
						"desc" 		=> __( "Select layout for your Blog. 2 Columns layout does not have a sidebar.", "tdminimal" ),
						"id" 		=> "tdminimal_blog_layout",
						"std" 		=> "",
						"type" 		=> "select",
						"options" 	=> $tdminimal_blog_layout_options
				);
				
$of_options[] = array( 	"name" 		=> __( "Sidebar Options", "tdminimal" ),
						"desc" 		=> __( "If left checked then a Sidebar will be shown on blog/archive/search pages This option will not turn off a sidebar on a single post/page.", "tdminimal" ),
						"id" 		=> "tdminimal_is_sidebar",
						"std" 		=> 0,
						"on" 		=> __( "On", "tdminimal" ),
						"off" 		=> __( "Off", "tdminimal" ),
						"type" 		=> "switch"
				);		

$of_options[] = array( 	"name" 		=> __( "Post/Page Sidebar Options", "tdminimal" ),
						"desc" 		=> __( "If left Disabled then a Sidebar will be hidden on Posts and Pages and this option will not allow you to change Post/Page template (Full Width Only).", "tdminimal" ),
						"id" 		=> "tdminimal_is_post_page_sidebar",
						"std" 		=> 1,
						"on" 		=> __( "Auto", "tdminimal" ),
						"off" 		=> __( "Disable", "tdminimal" ),
						"type" 		=> "switch"
				);

$of_options[] = array( 	"name" 		=> __( "Author Section", "tdminimal" ),
						"desc" 		=> __( "If left checked then Author section will be shown.", "tdminimal" ),
						"id" 		=> "tdminimal_author_section",
						"std" 		=> 1,
						"on" 		=> __( "On", "tdminimal" ),
						"off" 		=> __( "Off", "tdminimal" ),
						"type" 		=> "switch"
				);

$of_options[] = array( 	"name" 		=> __( "Newsletter Section", "tdminimal" ),
						"desc" 		=> __( "If left checked then newsletter section will be shown under the post's content.", "tdminimal" ),
						"id" 		=> "tdminimal_newsletter_section",
						"std" 		=> 0,
						"on" 		=> __( "On", "tdminimal" ),
						"off" 		=> __( "Off", "tdminimal" ),
						"type" 		=> "switch"
				);

$of_options[] = array( 	"name" 		=> __( "Related Posts Section", "tdminimal" ),
						"desc" 		=> __( "If left checked then Related Posts section will be shown.", "tdminimal" ),
						"id" 		=> "tdminimal_related_posts_section",
						"std" 		=> 1,
						"on" 		=> __( "On", "tdminimal" ),
						"off" 		=> __( "Off", "tdminimal" ),
						"type" 		=> "switch"
				);

$of_options[] = array( 	"name" 		=> " ",
						"sub"		=> __( "Section Title", "tdminimal" ),
						"desc" 		=> __( "Enter your Title for the Related Posts Section.", "tdminimal" ),
						"id" 		=> "tdminimal_related_posts_section_title",
						"std" 		=> "Related Articles",
						"type" 		=> "text"
				);

$of_options[] = array( 	"name" 		=> " ",
						"sub"       => __( "Related Posts Section Layout", "tdminimal" ),
						"desc" 		=> __( "Select layout for your Related Posts Section.", "tdminimal" ),
						"id" 		=> "tdminimal_related_posts_section_layout",
						"std" 		=> "",
						"type" 		=> "select",
						"options" 	=> $tdminimal_related_posts_section_layout_options
				);

$of_options[] = array( 	"name" 		=> " ",
						"sub"		=> __( "Number of Related Posts to show", "tdminimal" ),
						"desc" 		=> __( "Choose a number of Related Posts to show per page. ", "talana" ),
						"id" 		=> "tdminimal_related_posts_section_number",
						"std" 		=> "3",
						"min" 		=> "3",
						"step"		=> "3",
						"max" 		=> "9",
						"type" 		=> "sliderui" 
				);

$of_options[] = array( 	"name" 		=> __( "Auto Post Summary", "tdminimal" ),
						"desc" 		=> __( "If left checked then WordPress will generate an post summary automatically.", "tdminimal" ),
						"id" 		=> "tdminimal_is_auto_blog_summary",
						"std" 		=> 0,
						"on" 		=> __( "On", "tdminimal" ),
						"off" 		=> __( "Off", "tdminimal" ),
						"type" 		=> "switch"
				);	

$of_options[] = array( 	"name" 		=> __( "Auto Summary Length", "tdminimal" ),
						"desc" 		=> __( "By default, Auto Summary length is set to 55 words.", "talana" ),
						"id" 		=> "tdminimal_auto_blog_summary_length",
						"std" 		=> "55",
						"min" 		=> "1",
						"step"		=> "1",
						"max" 		=> "250",
						"type" 		=> "sliderui" 
				);

$of_options[] = array( 	"name" 		=> __( "Share Buttons Style", "tdminimal" ),
						"desc" 		=> __( "If you want to have share/like counter then you should use Default Share Buttons Style.", "tdminimal" ),
						"id" 		=> "tdminimal_share_buttons_style",
						"std" 		=> 1,
						"on" 		=> __( "Custom", "tdminimal" ),
						"off" 		=> __( "Default", "tdminimal" ),
						"type" 		=> "switch"
				);

$of_options[] = array( 	"name" 		=> __( "Share Buttons (Bottom)", "tdminimal" ),
						"desc" 		=> __( "If left checked then share buttons will be shown (Bottom of the Post Page)", "tdminimal" ),
						"id" 		=> "tdminimal_share_buttons_bottom",
						"std" 		=> 1,
						"on" 		=> __( "On", "tdminimal" ),
						"off" 		=> __( "Off", "tdminimal" ),
						"type" 		=> "switch"
				);	

$of_options[] = array( 	"name" 		=> __( "Masonry Layout", "tdminimal" ),
						"desc" 		=> __( "<strong>Warning!</strong> If you turn it Off then it can create some space between your posts ( 2 columns layout ) if images/titles/contents have different height.", "tdminimal" ),
						"id" 		=> "tdminimal_is_blog_masonry",
						"std" 		=> 1,
						"on" 		=> __( "On", "tdminimal" ),
						"off" 		=> __( "Off", "tdminimal" ),
						"type" 		=> "switch"
				);	

$of_options[] = array( 	"name" 		=> __( "Featured Image as a Thumbnail ( Blog/Archive/Search Page )", "tdminimal" ),
						"desc" 		=> __( "<strong>Warning!</strong> Read theme documentation before using this option ( see '<u>How to make a Featured Image looks like a Thumbnail?</u>' ).", "tdminimal" ),
						"id" 		=> "tdminimal_is_featured_image_as_thumb",
						"std" 		=> 0,
						"on" 		=> __( "On", "tdminimal" ),
						"off" 		=> __( "Off", "tdminimal" ),
						"type" 		=> "switch"
				);	

/* Social Settings */
$of_options[] = array( 	"name" 		=> __( "Social Settings", "tdminimal" ),
						"type" 		=> "heading",
						"icon"		=> ADMIN_IMAGES . "social-icon.png"
				);
	
$of_options[] = array( 	"name" 		=> __( "Facebook Link", "tdminimal" ),
						"desc" 		=> __( "Enter your Facebook link here.", "tdminimal" ),
						"id" 		=> "tdminimal_social_facebook",
						"std" 		=> "",
						"type" 		=> "text"
				);

$of_options[] = array( 	"name" 		=> __( "Twitter Link", "tdminimal" ),
						"desc" 		=> __( "Enter your Twitter link here.", "tdminimal" ),
						"id" 		=> "tdminimal_social_twitter",
						"std" 		=> "",
						"type" 		=> "text"
				);

$of_options[] = array( 	"name" 		=> __( "Google Plus Link", "tdminimal" ),
						"desc" 		=> __( "Enter your Google Plus link here.", "tdminimal" ),
						"id" 		=> "tdminimal_social_googleplus",
						"std" 		=> "",
						"type" 		=> "text"
				);

$of_options[] = array( 	"name" 		=> __( "Skype Username", "tdminimal" ),
						"desc" 		=> __( "Enter your Skype Username here.", "tdminimal" ),
						"id" 		=> "tdminimal_social_skype",
						"std" 		=> "",
						"type" 		=> "text"
				);

$of_options[] = array( 	"name" 		=> __( "Flickr Link", "tdminimal" ),
						"desc" 		=> __( "Enter your Flickr link here.", "tdminimal" ),
						"id" 		=> "tdminimal_social_flickr",
						"std" 		=> "",
						"type" 		=> "text"
				);
				
$of_options[] = array( 	"name" 		=> __( "LinkedIn Link", "tdminimal" ),
						"desc" 		=> __( "Enter your LinkedIn link here.", "tdminimal" ),
						"id" 		=> "tdminimal_social_linkedin",
						"std" 		=> "",
						"type" 		=> "text"
				);
				
$of_options[] = array( 	"name" 		=> __( "Pinterest Link", "tdminimal" ),
						"desc" 		=> __( "Enter your Pinterest link here.", "tdminimal" ),
						"id" 		=> "tdminimal_social_pinterest",
						"std" 		=> "",
						"type" 		=> "text"
				);

$of_options[] = array( 	"name" 		=> __( "Dribbble Link", "tdminimal" ),
						"desc" 		=> __( "Enter your Dribbble link here.", "tdminimal" ),
						"id" 		=> "tdminimal_social_dribbble",
						"std" 		=> "",
						"type" 		=> "text"
				);

$of_options[] = array( 	"name" 		=> __( "RSS Link", "tdminimal" ),
						"desc" 		=> __( "Enter your RSS link here.", "tdminimal" ),
						"id" 		=> "tdminimal_social_rss",
						"std" 		=> "",
						"type" 		=> "text"
				);

$of_options[] = array( 	"name" 		=> __( "Tumblr Link", "tdminimal" ),
						"desc" 		=> __( "Enter your Tumblr link here.", "tdminimal" ),
						"id" 		=> "tdminimal_social_tumblr",
						"std" 		=> "",
						"type" 		=> "text"
				);

$of_options[] = array( 	"name" 		=> __( "Github Link", "tdminimal" ),
						"desc" 		=> __( "Enter your Github link here.", "tdminimal" ),
						"id" 		=> "tdminimal_social_github",
						"std" 		=> "",
						"type" 		=> "text"
				);

$of_options[] = array( 	"name" 		=> __( "Instagram Link", "tdminimal" ),
						"desc" 		=> __( "Enter your Instagram link here.", "tdminimal" ),
						"id" 		=> "tdminimal_social_instagram",
						"std" 		=> "",
						"type" 		=> "text"
				);

$of_options[] = array( 	"name" 		=> __( "YouTube Link", "tdminimal" ),
						"desc" 		=> __( "Enter your YouTube link here.", "tdminimal" ),
						"id" 		=> "tdminimal_social_youtube",
						"std" 		=> "",
						"type" 		=> "text"
				);

$of_options[] = array( 	"name" 		=> __( "Vimeo Link", "tdminimal" ),
						"desc" 		=> __( "Enter your Vimeo link here.", "tdminimal" ),
						"id" 		=> "tdminimal_social_vimeo",
						"std" 		=> "",
						"type" 		=> "text"
				);

$of_options[] = array( 	"name" 		=> __( "Apple App Link", "tdminimal" ),
						"desc" 		=> __( "Enter your Apple App link here.", "tdminimal" ),
						"id" 		=> "tdminimal_social_apple",
						"std" 		=> "",
						"type" 		=> "text"
				);

$of_options[] = array( 	"name" 		=> __( "Windows App Link", "tdminimal" ),
						"desc" 		=> __( "Enter your Windows App link here.", "tdminimal" ),
						"id" 		=> "tdminimal_social_windows",
						"std" 		=> "",
						"type" 		=> "text"
				);

$of_options[] = array( 	"name" 		=> __( "Android App Link", "tdminimal" ),
						"desc" 		=> __( "Enter your Android App link here.", "tdminimal" ),
						"id" 		=> "tdminimal_social_android",
						"std" 		=> "",
						"type" 		=> "text"
				);

$of_options[] = array( 	"name" 		=> __( "Newsletter Settings", "tdminimal" ),
						"desc" 		=> __( "Upload your custom newsletter image here. it will be shown above the newsletter form.", "tdminimal" ),
						"id" 		=> "tdminimal_newsletter_image",
						"std" 		=> "",
						"mod"		=> "min",
						"type" 		=> "upload"
				);

$of_options[] = array( 	"name" 		=> "",
						"desc" 		=> __( "Paste your Newsletter HTML code here.", "tdminimal" ),
						"id" 		=> "tdminimal_newsletter_code",
						"std" 		=> "",
						"type" 		=> "textarea"
				);

/* Footer Settings */
$of_options[] = array( 	"name" 		=> __( "Footer Settings", "tdminimal" ),
						"type" 		=> "heading",
						"icon"		=> ADMIN_IMAGES . "footer-icon.png"
				);		

$of_options[] = array( 	"name" 		=> __( "Footer Widget Area", "tdminimal" ),
						"desc" 		=> __( "If left checked then an additional widget area will be shown in your footer section.", "tdminimal" ),
						"id" 		=> "tdminimal_footer_widget_area",
						"std" 		=> 0,
						"on" 		=> __( "On", "tdminimal" ),
						"off" 		=> __( "Off", "tdminimal" ),
						"type" 		=> "switch"
				);		

$of_options[] = array( 	"name" 		=> __( "Footer Text", "tdminimal" ),
						"desc" 		=> __( "Customize your footer text here.<br> [td_site_copyright] shorcode outputs 'Copyright YOUR_SITE_NAME'.", "tdminimal" ),
						"id" 		=> "tdminimal_footer_text",
						"std" 		=> "",
						"type" 		=> "textarea"
				);
		
$of_options[] = array( 	"name" 		=> __( "Tracking Code", "tdminimal" ),
						"desc" 		=> __( "Paste your Google Analytics (or other) tracking code here. This will be added into the footer template of your theme.", "tdminimal" ),
						"id" 		=> "tdminimal_google_analytics",
						"std" 		=> "",
						"type" 		=> "textarea"
				);
				
/* Other Settings */
$of_options[] = array( 	"name" 		=> __( "Other Settings", "tdminimal" ),
						"type" 		=> "heading",
						"icon"		=> ADMIN_IMAGES . "icon-add.png"
				);

$of_options[] = array( 	"name" 		=> __( "bbPress Sidebar", "tdminimal" ),
						"desc" 		=> __( "If left checked then a sidebar will be shown on bbPress Page.", "tdminimal" ),
						"id" 		=> "tdminimal_bbpress_sidebar",
						"std" 		=> 0,
						"on" 		=> __( "On", "tdminimal" ),
						"off" 		=> __( "Off", "tdminimal" ),
						"type" 		=> "switch"
				);	

// Backup Options
$of_options[] = array( 	"name" 		=> __( "Backup Options", "tdminimal" ),
						"type" 		=> "heading",
						"icon"		=> ADMIN_IMAGES . "icon-slider.png"
				);
				
$of_options[] = array( 	"name" 		=> __( "Backup and Restore Options", "tdminimal" ),
						"id" 		=> "of_backup",
						"std" 		=> "",
						"type" 		=> "backup",
						"desc" 		=> __( 'You can use the two buttons below to backup your current options, and then restore it back at a later time. This is useful if you want to experiment on the options but would like to keep the old settings in case you need it back.', 'tdminimal' ),
				);
				
$of_options[] = array( 	"name" 		=> __( "Transfer Theme Options Data", "tdminimal" ),
						"id" 		=> "of_transfer",
						"std" 		=> "",
						"type" 		=> "transfer",
						"desc" 		=> __( 'You can tranfer the saved options data between different installs by copying the text inside the text box. To import data from another install, replace the data in the text box with the one from another install and click "Import Options".', 'tdminimal' ),
				);
				
	}//End function: of_options()
}//End chack if function exists: of_options()
?>
