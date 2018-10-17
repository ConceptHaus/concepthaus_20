<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package tdMinimal
 */
?>

	</div><!-- #content -->
	
	<div class="container">
		<?php if( tdminimal_is_footer_widgets() ): ?>
		<div class="footer-widget-section">
			<div class="row">
				<div class="col-lg-4 col-md-4">
					<?php if ( ! dynamic_sidebar( 'footer-1' ) ) : ?>
					<?php endif; ?>
				</div><!-- .col -->
				<div class="col-lg-4 col-md-4">
					<?php if ( ! dynamic_sidebar( 'footer-2' ) ) : ?>
					<?php endif; ?>				
				</div><!-- .col -->
				<div class="col-lg-4 col-md-4">
					<?php if ( ! dynamic_sidebar( 'footer-3' ) ) : ?>
					<?php endif; ?>	
				</div><!-- .col -->
			</div><!-- .row -->
		</div><!-- .footer-widget-section -->
		<?php endif; ?>
		<footer id="colophon" class="site-footer" role="contentinfo">
			<div class="site-info">
				<?php echo tdminimal_footer_text(); ?>
			</div><!-- .site-info -->
			<div class="social-icon-section">
				<ul>
					<?php echo tdminimal_social_links(); ?>
				</ul>
			</div>
		</footer><!-- #colophon -->
	</div><!-- .container -->
</div><!-- #page -->

<div id="gotop">
	<i class="fa fa-long-arrow-up"></i>
</div><!-- #gotop -->

<?php tdminimal_tracking_code(); ?>
<?php wp_footer(); ?>

</body>
</html>