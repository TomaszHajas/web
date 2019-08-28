<?php 
	$args_comment = array(
		'callback' => 'futura_comments',
		'type' => 'comment'
	);
	$args_pingback = array(
		'type' => 'pingback',
		'short_ping' => true,
	);
?>
<?php if (post_password_required() == true) {
	return;
} ?>
<div class="comment-wrap" id="comments">
	<div class="comment-count">
		<h3><?php comments_number( __('0 Comments', 'futura'), __('1 Comment', 'futura'), __('% Comments', 'futura')); ?></h3>
	</div>
	<ol>
		<?php wp_list_comments($args_comment); ?>
		<?php wp_list_comments($args_pingback); ?>
	</ol>
<?php previous_comments_link() ?>
<?php next_comments_link() ?>
	<?php
		global $aria_req;
		$req      = get_option( 'require_name_email' );
	    $aria_req = ( $req ? " aria-required='true'" : '' );
		$args_comment_form = array(
			'title_reply' => __( 'Leave a Reply', 'futura'),
			'title_reply_to' => '<h4>'.__( 'Leave a Reply to %s', 'futura').'</h4>',
			'comment_notes_after' => '',
			'fields' => array(
				'author' => '<div class="form-group comment-form-author"><label for="author">' . __( 'Name', 'futura') . ( $req ? ' <span class="required">*</span>' : '' ) . '</label> ' .
	                    '<input class="form-control" id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' /></div>',
		        'email'  => '<div class="form-group comment-form-email"><label for="email">' . __( 'Email', 'futura') . ( $req ? ' <span class="required">*</span>' : '' ) . '</label> ' .
		                    '<input class="form-control" id="email" name="email" type="email" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' /></div>',
		        'url'    => '<div class="form-group comment-form-url"><label for="url">' . __( 'Website', 'futura') . '</label> ' .
		                    '<input class="form-control" id="url" name="url" type="url" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /></div>'
			),
			'comment_field' => '<div class="form-group comment-form-comment">  <label for="comment">' . __( 'Comment', 'futura') . '</label>
		        					<textarea class="form-control" id="comment" name="comment" cols="45" rows="6" aria-required="true"></textarea></div>',
			'must_log_in' => '<p class="must-log-in">' .  sprintf( __( 'You must be <a href="%s">logged in</a> to post a comment.', 'futura' ), wp_login_url( apply_filters( 'the_permalink', get_permalink( ) ) ) ) . '</p>',
		    'logged_in_as' => '<p class="logged-in-as">' . sprintf( __( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>', 'futura' ), admin_url( 'profile.php' ), $user_identity, wp_logout_url( apply_filters( 'the_permalink', get_permalink( ) ) ) ) . '</p>',
		    'label_submit' => __('Submit Comment', 'futura')
		);
	?>
	<?php comment_form($args_comment_form); ?>
</div>
