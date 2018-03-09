<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Bootstrap_Essentials
 */

get_header(); ?>

	<div class="<?php echo esc_attr(sidebar_class('container')); ?>">
	<main id="main" class="page page-main <?php echo esc_attr(sidebar_class('fixed-width-right')); ?>" role="main">
		<div id="content" class="<?php echo esc_attr(sidebar_class('page-content pr-sm-4')); ?><?php echo esc_attr(not_sidebar_class('container')); ?>">
		<?php
		if ( have_posts() ) :

			if ( is_home() && ! is_front_page() ) : ?>
				<header class="page-header">
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>

			<?php
			endif;

			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/*
				* Include the Post-Format-specific template for the content.
				* If you want to override this in a child theme, then include a file
				* called content-___.php (where ___ is the Post Format name) and that will be used instead.
				*/
				get_template_part( 'template-parts/content', get_post_format() );

			endwhile;

			wp_bootstrap_pager();
			// the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>
		
		</div>

<?php
get_sidebar();
?>
</main><!-- #main -->
</div>
<?php
get_footer();
