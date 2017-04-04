<?php
/**
 * Build comment using bootstrap media object
 */
 
function bs_media_comment($comment, $args, $depth) {
  //get comment to determine type
  $GLOBALS['comment'] = $comment;
 
  switch ($comment->comment_type):
    case 'pingback':
    case 'trackback': ?>
      <li class="media" id="comment-<?php comment_ID(); ?>">
        <div class="media-body">
          <p>
            <?php _e('Pingback:', 'sage'); ?> <?php comment_author_link(); ?>
          </p>
        </div><!--/.media-body -->
      </li>
    <?php
    break;
    default:
      global $post; ?>
      <li class="list-group-item"><div class="media">
        <article>
          <div class="media-left hidden-xs">
              <a href="<?php echo $comment->comment_author_url;?>" class="pull-left">
                <?php echo get_avatar($comment, 48); ?>
              </a>
          </div>
          <div class="media-body">
            <h4 class="media-heading comment-author vcard">
            <?php printf('<cite class="fn">%1$s %2$s</cite>',
                  get_comment_author_link(),
                  // If current post author is also comment author, make it known visually.
                  ($comment->user_id === $post->post_author) ? '<span class="label"> ' . __(
                      'Post author',
                      'sage'
                  ) . '</span> ' : ''); ?>                
            </h4>
            <?php if ('0' == $comment->comment_approved) : ?>
              <p class="comment-awaiting-moderation">
                <?php _e('Your comment is awaiting moderation.','sage'); ?>
              </p>
            <?php endif; ?>
            <?php comment_text(); ?>
            <p class="meta">
                <?php printf('<a href="%1$s"><time datetime="%2$s">%3$s</time></a>',
                            esc_url(get_comment_link($comment->comment_ID)),
                            get_comment_time('c'),
                            sprintf(
                                __('%1$s at %2$s', 'sage'),
                                get_comment_date(),
                                get_comment_time()
                            )); 
                ?>
            </p>
            <p class="reply">
                <?php comment_reply_link( array_merge($args, array(
                            //'reply_text' => __('Reply <span>&darr;</span>', 'sage'),
                            'reply_text' => __('Reply', 'sage'),
                            'depth'      => $depth,
                            'max_depth'  => $args['max_depth']
                        )
                    )); 
                ?>
            </p>
 
          </div>
        </article>
      </div></li>
<?php
    break;
  endswitch;
}