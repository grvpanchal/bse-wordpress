<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Bootstrap_Essentials
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(cards_class('panel panel-default panel-body mt-xs-4', 'pb-xs-4 mb-xs-0 bb')); ?>>
	<header class="entry-header">
		<?php
		if ( is_single() ) :
			the_post_thumbnail( 'full', array('class' => 'img-responsive text-center img-rounded center-block' . cards_class(' mb-xs-3', ' mt-xs-4')) );
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark" class="no-underline">', '</a></h2>' );
		endif;

		if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta text-right text-muted mb-xs-2">
			<small><?php bse_wordpress_posted_on(); ?></small>
		</div><!-- .entry-meta -->
		<?php
		endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
		if ( is_single() ) :
			the_content( sprintf(
				/* translators: %s: Name of current post. */
				wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'bootstrap-essentials' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );
			?>
			<footer class="entry-footer">
				<?php bse_wordpress_entry_footer(); ?>
			</footer><!-- .entry-footer -->
			<?php
		else :
			the_excerpt( sprintf(
				/* translators: %s: Name of current post. */
				wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'bootstrap-essentials' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );
			?>
			<div class="pull-right"><a href="<?php echo esc_url( get_permalink() ) ?>" class="btn btn-danger"><?php esc_html_e("Read More", 'bootstrap-essentials'); ?></a></div>
			<div class="entry-footer mt-xs-4">
				<?php bse_wordpress_entry_footer(); ?>
			</div><!-- .entry-footer -->
			<?php
		endif;

		if(function_exists('wp_link_pages')) :
			wp_link_pages( array(
				'before' => '<ul class="pagination pagination-sm text-center"><li>',
				'after'  => '</li></ul>',
				'separator'  => '</li><li>',
				'link_before'  => '<span class="page-numbers">',
				'link_after'  => '</span>',
			) );
		else :
			the_posts_navigation();
		endif;
		?>
	</div><!-- .entry-content -->

	
</article><!-- #post-## -->
