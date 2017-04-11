<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Bootstap_Essentials
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(cards_class('panel panel-default panel-body mt-xs-20')); ?>>
	<header class="entry-header">
		<?php
		if ( is_single() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

		if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta text-right text-muted mb-xs-10">
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
				wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'bse-wordpress' ), array( 'span' => array( 'class' => array() ) ) ),
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
				wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'bse-wordpress' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );
			?>
			<div class="pull-right"><a href="<?php echo esc_url( get_permalink() ) ?>" class="btn btn-primary">Read More</a></div>
			<div class="entry-footer mt-xs-20">
				<?php bse_wordpress_entry_footer(); ?>
			</div><!-- .entry-footer -->
			<?php
		endif;
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'bse-wordpress' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	
</article><!-- #post-## -->
