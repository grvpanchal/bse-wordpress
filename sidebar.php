<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Bootstrap_Essentials
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area page-sidebar" role="complementary">
    <div class="mt-xs-4 <?php echo esc_attr(cards_class('panel panel-default panel-body')); ?>">
	<?php if(function_exists('dynamic_sidebar')) {

        ob_start();
        dynamic_sidebar('sidebar-1');
        $sidebar_output = ob_get_clean();
        echo apply_filters( 'my_sidebar_output', $sidebar_output );
    } 
    
  ?>
  </div>
</aside><!-- #secondary -->