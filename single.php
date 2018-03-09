<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Bootstrap_Essentials
 */

get_header(); ?>
	<div class="<?php echo esc_attr(sidebar_class('container')); ?>">
	<main id="main" class="page page-main <?php echo esc_attr(sidebar_class('fixed-width-right')); ?>" role="main">
		<div id="content" class="<?php echo esc_attr(sidebar_class('page-content pr-sm-4')); ?><?php echo esc_attr(not_sidebar_class('container')); ?>">
		<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', get_post_format() );

				// the_post_navigation();

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
</div>
<?php
get_footer();
