=== Rich Tax Description Editor ===
Contributors: jayarjo
Donate link: http://profiles.wordpress.org/jayarjo
Tags: tag, category, taxonomy, rich text editor
Requires at least: 3.3
Tested up to: 3.8.1
Stable tag: 1.2.4

Turns boring Description field on Taxonomy pages into full scale Rich Text Editor.

== Description ==

No Settings, no hassle. Clean and short. Activate it and you will get pretty, handy Rich Text Editor on all Taxonomy pages, including Tags, Categories and any other taxonomies you will ever create in future.

To display the rich category description use [term_description()](http://codex.wordpress.org/Function_Reference/term_description).

Supports [Shortcodes](http://codex.wordpress.org/Shortcode_API) and [oEmbeds](http://codex.wordpress.org/Embeds).

== Installation ==

1. Go to: Plugins > Add New > upload
2. Browse for `rich-tax-description-editor-x.x.x.zip` file
3. Hit `Install Now`
4. Activate

or

1. Upload contents of `rich-tax-description-editor-x.x.x.zip` to `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress

== Frequently Asked Questions ==


== Screenshots ==

1. 
2. 

== Changelog ==

= 1.0 =   
* Initial release.

= 1.1 =  
* Fix undefined notices.  
* Truncate description on listing pages.  
* Process shortcodes.  

= 1.2 =  
* Support oEmbed.

= 1.2.1 =  
* Avoid ugly overflow bug of toolbar and status bar on small screens.  
* Properly check for unfiltered_html capability.  

= 1.2.2 =  
* Fix more undefined notices.  
* Insert rich editors on after_setup_theme, instead of on init.  

= 1.2.3 =
* Insert rich editors on after_setup_theme, instead of on wp_loaded (as late as possible). 

= 1.2.4 = 
* Fix description not saving on the taxonomy list page.

