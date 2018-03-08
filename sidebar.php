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
    <div class="mt-xs-4 <?php echo cards_class('panel panel-default panel-body'); ?>">
	<?php if(function_exists('dynamic_sidebar')) {

    ob_start();
    dynamic_sidebar('sidebar-1');
    $sidebar = ob_get_contents();
    ob_end_clean();
	$sidebar_corrected_ul = $sidebar;
	
    $sidebar_corrected_ul = str_replace('<ul id="recentcomments">', '<ul class="list-group b-0">', $sidebar_corrected_ul);
    $sidebar_corrected_ul = str_replace("<ul>", '<ul class="list-group b-0">', $sidebar_corrected_ul);
    $sidebar_corrected_ul = str_replace('<li class="recentcomments">', '<li class="list-group-item">', $sidebar_corrected_ul);
    $sidebar_corrected_ul = str_replace('<li class="cat-item', '<li class="list-group-item cat-item', $sidebar_corrected_ul);
    $sidebar_corrected_ul = str_replace("<li>", '<li class="list-group-item">', $sidebar_corrected_ul);

    echo $sidebar_corrected_ul;
    } 
    
  ?>
  </div>
</aside><!-- #secondary -->