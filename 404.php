<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Bootstap_Essentials
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<section class="error-404 not-found container-login-2">
				<header class="text-center">
					<h1><span class="fs-xs-3-2 text-danger">404</span></h1>
					<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'bootstrap-essentials' ); ?></h1>
					<a class="btn btn-danger btn-lg mb-xs-4" href="/">Go Home</a>
				</header><!-- .page-header -->
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
