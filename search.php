<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Bootstrap_Essentials
 */

get_header(); ?>
	<div class="<?php echo esc_attr(sidebar_class('container')); ?>">
	<main id="main" class="page page-main <?php echo esc_attr(sidebar_class('fixed-width-right')); ?>" role="main">
		<div id="content" class="<?php echo esc_attr(sidebar_class('page-content pr-sm-4')); ?><?php echo esc_attr(not_sidebar_class('container')); ?>">
		<?php
		if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title"><?php 
				/* translators: %s: search query. */
				printf( esc_html__( 'Search Results for: %s', 'bootstrap-essentials' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
			</header><!-- .page-header -->

			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'template-parts/content', 'search' );

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
