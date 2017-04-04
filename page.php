<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Bootstap_Essentials
 */

get_header(); ?>

	
	<main id="main" class="page page-main <?php echo sidebar_class('fixed-width-right') ?>" role="main">
		<div class="<?php echo sidebar_class('page-content pr-sm-30') ?><?php echo not_sidebar_class('container') ?> ">
		<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>
		</div>

<?php
get_sidebar();
?>
</main><!-- #main -->
<?php
get_footer();
