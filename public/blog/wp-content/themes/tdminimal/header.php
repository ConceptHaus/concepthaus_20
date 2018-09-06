<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <main id="main">
 *
 * @package tdMinimal
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="<?php echo tdminimal_html_class(); ?>">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link href="http://www.m.concepthaus.mx/apple-touch-icon.png" rel="apple-touch-icon"/>
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php tdminimal_custom_favicon(); ?>
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php
	global $woocommerce;
	if ( class_exists( 'woocommerce' ) ):
?>
	<?php woocommerce_cart_link(); ?>
<?php endif; ?>

<div id="page" class="hfeed site">
	<header id="masthead" class="site-header" role="banner">
		<div class="container">
			<div class="site-branding">
				<?php tdminimal_website_logo(); ?>
				<?php if( !tdminimal_is_only_logo() ): ?>
				<h1 class="site-title"><a href="http://concepthaus.mx" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
				<?php endif; ?>
			</div>
			
			<nav id="site-navigation" class="main-navigation clearfix" role="navigation">
				<h1 class="menu-toggle"><?php _e( 'Menu', 'tdminimal' ); ?> <i class="fa fa-reorder"></i></h1>
				<?php if ( has_nav_menu( 'primary' ) ) { ?>
					<?php wp_nav_menu( array( 'container' => 'ul', 'menu_class' => 'nav-bar', 'theme_location' => 'primary') ); ?>
				<?php } else { ?>
					<ul class="nav-bar">
						<?php 
							wp_list_pages('title_li=' ); 
						?>
					</ul>
				<?php } ?>
				<div class="header-search-button">
					<a id="header-search-button" href="#"><?php _e( 'Search...', 'tdminimal' ); ?><i class="fa fa-search"></i></a>
				</div><!-- .header-search-button -->
				<div class="header-search-box">
					<?php get_search_form(); ?>
					<a id="header-search-button-hide" href="#"><i class="fa fa-times"></i></a>
				</div>
			</nav><!-- #site-navigation -->
		</div><!-- .container -->
	</header><!-- #masthead -->
	
	<div id="content" class="site-content">