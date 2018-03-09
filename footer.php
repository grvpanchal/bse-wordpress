<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Bootstrap_Essentials
 */

$footer_type = get_option('footer_type') == '' ? 'navbar-inverse' : get_option('footer_type');

?>
<footer id="colophon" class="footer <?php echo esc_attr($footer_type); ?>" role="contentinfo">
	<div class="container">
		<p><a href="<?php echo esc_url( __( 'https://wordpress.org/', 'bootstrap-essentials' ), 'bootstrap-essentials' ); ?>">
		<?php 
		/* translators: %s: CMS name, i.e. WordPress. */
		printf( esc_html__( 'Proudly powered by %s', 'bootstrap-essentials' ), 'WordPress' ); ?></a>
			<span class="sep"> | </span>
			<?php 
			/* translators: 1: Theme name, 2: Theme author. */
			printf( esc_html('Theme: %1$s by %2$s.', 'bootstrap-essentials'), 'Bootstrap Essentials Wordpress Theme', '<a href="http://grvpanchal.me/" rel="designer">Gaurav Panchal</a>' ); ?>
		</p>
	</div>
</footer><!-- #colophon -->
</div><!-- #page -->
<?php wp_footer(); ?>

</body>
</html>
