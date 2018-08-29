<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package awps
 */

?>

	</div><!-- #content -->

	<?php if ( is_customize_preview() ) echo '<div id="awps-footer-control" style="margin-top:-30px;position:absolute;"></div>'; ?>

	<!-- transplant code -->
	
	<div class="footer">
		Copyright &copy; 2018 <?php wp_list_authors('style=none'); ?>  | <a href="/privacy/">Privacy Policy</a>
    <br /><a class="color-text" href="http://foliotwist.com/">Art websites by Foliotwist</a><br />
	
	<a class="button" href="<?php echo admin_url(); ?>">Back to Admin Panel&nbsp;&nbsp;<i class="fa fa-unlock-alt" aria-hidden="true"></i></a>
			</div>
	
	<!-- end transplant code -->
	
	<footer id="colophon" class="site-footer container-fluid" role="contentinfo">

		<div class="site-info">
			<a <?php if ( is_customize_preview() ) echo 'id="awps-footer-copy-control"'; ?> href="<?php
				/* translators: %s: Github repo URL. */
				echo esc_url( __( 'https://github.com/Alecaddd/awps', 'awps' ) ); ?>"><?php echo Awps\Api\Customizer::text( 'awps_footer_copy_text' ); ?></a>
			
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
