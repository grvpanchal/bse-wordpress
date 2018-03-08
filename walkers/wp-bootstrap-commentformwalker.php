<?php

add_filter( 'comment_form_default_fields', 'bootstrap3_comment_form_fields' );
function bootstrap3_comment_form_fields( $fields ) {
    $commenter = wp_get_current_commenter();
    
    $req      = get_option( 'require_name_email' );
    $aria_req = ( $req ? " aria-required='true'" : '' );
    $html5    = current_theme_supports( 'html5', 'comment-form' ) ? 1 : 0;
    
    $fields   =  array(
        'author' => '<div class="col-xs-12 col-md-6"><div class="form-group comment-form-author">' . '<label for="author">' . esc_html__( 'Name', 'bootstrap-essentials' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label> ' .
                    '<input class="form-control" id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' /></div></div>',
        'email'  => '<div class="col-xs-12 col-md-6"><div class="form-group comment-form-email"><label for="email">' . esc_html__( 'Email', 'bootstrap-essentials' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label> ' .
                    '<input class="form-control" id="email" name="email" ' . ( $html5 ? 'type="email"' : 'type="text"' ) . ' value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' /></div></div>'
    );
    
    return $fields;
}

add_filter( 'comment_form_defaults', 'bootstrap3_comment_form' );
function bootstrap3_comment_form( $args ) {
    $args['title_reply_before'] = '<h4 id="reply-title" class="comment-reply-title mt-xs-4">';
    $args['title_reply'] = 'Submit a Comment';
    $args['title_reply_after'] = '</h4>';
    $args['comment_field'] = '<div class="col-xs-12"><div class="form-group comment-form-comment">
            <label for="comment">' . esc_html__( 'Comment', 'bootstrap-essentials' ) . '</label> 
            <textarea class="form-control" id="comment" name="comment" cols="45" rows="6" aria-required="true"></textarea>
        </div></div>';
    $args['class_submit'] = 'btn btn-default mr-xs-3 ml-xs-3'; // since WP 4.1
    
    return $args;
}

function wpb_move_comment_field_to_bottom( $fields ) {
$comment_field = $fields['comment'];
unset( $fields['comment'] );
$fields['comment'] = $comment_field;
return $fields;
}

add_filter( 'comment_form_fields', 'wpb_move_comment_field_to_bottom' );