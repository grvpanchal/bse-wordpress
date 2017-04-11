<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Bootstap_Essentials
 */

get_header(); ?>

	<div class="<?php echo sidebar_class('container') ?>">
	<main id="main" class="page page-main <?php echo sidebar_class('fixed-width-right') ?>" role="main">
		<div id="content" class="<?php echo sidebar_class('page-content pr-sm-30') ?><?php echo not_sidebar_class('container') ?>">
		<?php
		if ( have_posts() ) : ?>

			<header class="page-header">
				<?php
					the_archive_title( '<h1 class="page-title">', '</h1>' );
					the_archive_description( '<div class="archive-description">', '</div>' );
				?>
			</header><!-- .page-header -->

			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_format() );

			endwhile;

			wp_bootstrap_pagination();
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
