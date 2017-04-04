<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Bootstap_Essentials
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="footer navbar-default" role="contentinfo">
		<div class="container">
			<p><a href="<?php echo esc_url( __( 'https://wordpress.org/', 'bse-wordpress' ) ); ?>"><?php printf( esc_html__( 'Proudly powered by %s', 'bse-wordpress' ), 'WordPress' ); ?></a>
				<span class="sep"> | </span>
				<?php printf( esc_html__( 'Theme: %1$s by %2$s.', 'bse-wordpress' ), 'bse-wordpress', '<a href="https://automattic.com/" rel="designer">Gaurav Panchal</a>' ); ?>
			</p>
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.1/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js'></script>
<script src='https://cdn.rawgit.com/grvpanchal/bootstrap-essentials/v0.4.0/dist/js/bootstrap-essentials.min.js'></script>
<?php wp_footer(); ?>

</body>
</html>
