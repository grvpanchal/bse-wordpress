<?php

function my_filter_dynamic_sidebar_params( $sidebar_params ) {
 
    if ( is_admin() ) {
        return $sidebar_params;
    }
 
    global $wp_registered_widgets;
    $widget_id = $sidebar_params[0]['widget_id'];
 
    $wp_registered_widgets[ $widget_id ]['original_callback'] = $wp_registered_widgets[ $widget_id ]['callback'];
    $wp_registered_widgets[ $widget_id ]['callback'] = 'my_custom_widget_callback_function';
 
    return $sidebar_params;
 
}
add_filter( 'dynamic_sidebar_params', 'my_filter_dynamic_sidebar_params' );

function my_custom_widget_callback_function() {
 
    global $wp_registered_widgets;
    $original_callback_params = func_get_args();
    $widget_id = $original_callback_params[0]['widget_id'];
 
    $original_callback = $wp_registered_widgets[ $widget_id ]['original_callback'];
    $wp_registered_widgets[ $widget_id ]['callback'] = $original_callback;
 
    $widget_id_base = $wp_registered_widgets[ $widget_id ]['callback'][0]->id_base;
 
    if ( is_callable( $original_callback ) ) {
 
        ob_start();
        call_user_func_array( $original_callback, $original_callback_params );
        $widget_output = ob_get_clean();
 
        echo apply_filters( 'widget_output', $widget_output, $widget_id_base, $widget_id);
 
    }
 
}

function wop_bootstrap_widget_output_filters( $widget_output, $widget_type, $widget_id ) {
	
	switch( $widget_type ) {
		
        case 'categories' :
        if (strpos($widget_output , '<select')) {
            $widget_output = str_replace('<select', '<select class="form-control mb-3" ', $widget_output);
            $widget_output = str_replace('screen-reader-text', 'sr-only', $widget_output);
        }
        else
        {
      			$widget_output = str_replace('<ul>', '<ul class="list-group b-0 mb-3">', $widget_output);
      			$widget_output = str_replace('<li class="cat-item cat-item-', '<li class="list-group-item pl-0 pr-0 cat-item cat-item-', $widget_output);
      			$widget_output = str_replace('(', '<span class="badge cat-item-count"> ', $widget_output);
      			$widget_output = str_replace(')', ' </span>', $widget_output);
                  break;
        }
		case 'calendar' :
			$widget_output = str_replace('calendar_wrap', 'calendar_wrap table-responsive', $widget_output);
        		$widget_output = str_replace('<table id="wp-calendar', '<table class="table table-condensed" id="wp-calendar', $widget_output);
    			break;
        case 'tag_cloud' :
            // $widget_output = str_replace('font-size:', '_font-size:', $widget_output);
            // $widget_output = str_replace('class="tag-cloud-link', 'class="label label-primary tag-cloud-link', $widget_output);
            // $widget_output = str_replace('<span class="tag-link-count"> (', '<span class="badge cat-item-count"> ', $widget_output);
            // $widget_output = str_replace(')</span>', '</span>', $widget_output);
    			break;
        case 'archives' :	
            if (strpos($widget_output , '<select')) {
                $widget_output = str_replace('<select', '<select class="form-control mb-3" ', $widget_output);
                $widget_output = str_replace('screen-reader-text', 'sr-only', $widget_output);
            }
            else
            {
      			$widget_output = str_replace('<ul>', '<ul class="list-group b-0">', $widget_output);
      			$widget_output = str_replace('<li>', '<li class="list-group-item pl-0 pr-0">', $widget_output);
			    $widget_output = str_replace('(', ' <span class="badge cat-item-count"> ', $widget_output);
                   $widget_output = str_replace(')', ' </span>', $widget_output);
            }
    			break;
		case 'meta' :   	
        		$widget_output = str_replace('<ul>', '<ul class="list-group b-0 mb-3">', $widget_output);
        		$widget_output = str_replace('<li>', '<li class="list-group-item pl-0 pr-0">', $widget_output);
    			break;
		case 'recent-posts' :   	
        		$widget_output = str_replace('<ul>', '<ul class="list-group b-0 mb-3">', $widget_output);
        		$widget_output = str_replace('<li>', '<li class="list-group-item bl-0 br-0 pl-0 pr-0">', $widget_output);
			$widget_output = str_replace('class="post-date"', 'class="post-date text-muted small d-block text-right"', $widget_output);
    			break;
		case 'recent-comments' :   	
        		$widget_output = str_replace('<ul id="recentcomments">', '<ul id="recentcomments" class="list-group b-0 mb-3">', $widget_output);
        		$widget_output = str_replace('<li class="recentcomments">', '<li class="recentcomments list-group-item pl-0 pr-0">', $widget_output);
     			break;
		case 'pages' :   	
	        	$widget_output = str_replace('<ul>', '<ul class="nav nav-stacked nav-pills">', $widget_output);
	        	$widget_output = str_replace(" class='children'", ' class="children ml-1 nav nav-stacked nav-pills bt"', $widget_output);
	     		break;
		case 'nav_menu' :   	
                $widget_output = str_replace(' class="menu"', 'class="menu nav nav-stacked nav-pills"', $widget_output);
                $widget_output = str_replace(' class="sub-menu"', ' class="sub-menu ml-1 nav nav-stacked nav-pills bt"', $widget_output);
                break;
        case 'media_gallery' :   	
                $widget_output = str_replace(' class="attachment-thumbnail', 'class="attachment-thumbnail img-responsive', $widget_output);
	    		break;
            default:
			$widget_output = $widget_output; // not sure if this is needed
	}
      return $widget_output;
}
add_filter( 'widget_output', 'wop_bootstrap_widget_output_filters', 10, 4); // not sure if this should be hooked into an action... maybe init or widgets_init