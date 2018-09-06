<?php
/**
 * The template for displaying Archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package tdminimal
 */

get_header(); ?>
<?php $website_layout = tdminimal_is_sidebar(); ?>
<?php $curauth = ( isset( $_GET['author_name'] ) ) ? get_user_by( 'slug', $author_name ) : get_userdata( intval( $author ) ); ?>

<div class="container">
	<div class="row">
		<section id="primary" class="content-area author-archive">
			<div id="main" class="site-main <?php echo $website_layout['class']; ?>" role="main">
			<header class="page-header">
				<h2 class="author-name"><?php echo $curauth->display_name; ?></h2>
				<div class="author-archive-container clearfix">
					<div class="avatar-container pull-left">
						<?php echo get_avatar( $curauth->ID, 96 ); ?>
					</div><!-- .avatar-container -->
					<div class="author-info">
						<?php echo $curauth->user_description; ?>				
					</div><!-- .author-info -->
					<div class="author-archive-social clearfix">
						<?php echo tdminimal_get_author_social_links( $curauth->ID ); ?>
					</div><!-- .author-archive-social -->
				</div><!-- .author-archive-container -->
			</header><!-- .page-header -->
			<?php if ( have_posts() ) : ?>

				<?php while ( have_posts() ) : the_post(); ?>

					<?php
						/* Include the Post-Format-specific template for the content.
						 * If you want to overload this in a child theme then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
						get_template_part( 'content', get_post_format() );
					?>

				<?php endwhile; ?>

				<div class="container nav-container">
					<?php tdminimal_content_nav( 'nav-below' ); ?>
				</div>

			<?php else : ?>

				<?php get_template_part( 'no-results', 'archive' ); ?>

			<?php endif; ?>

			</div><!-- #main -->
		</section><!-- #primary -->

		<?php if( $website_layout['is_sidebar'] ): ?>
		<div class="col-lg-4 col-md-4">
			<?php get_sidebar(); ?>
		</div>
		<?php endif; ?>
	</div><!-- .row -->
</div><!-- .container -->
<?php get_footer(); ?>
