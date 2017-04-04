<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Bootstap_Essentials
 */

get_header(); ?>

	<main id="main" class="page page-main <?php echo sidebar_class('fixed-width-right') ?>" role="main">
		<div class="<?php echo sidebar_class('page-content pr-sm-30') ?><?php echo not_sidebar_class('container') ?>">
		<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', get_post_format() );

				the_post_navigation();

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
