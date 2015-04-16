<?php
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');
	
	if ( post_password_required() ) { ?>
		<p class="nocomments">This post is password protected. Enter the password to view comments.</p>
	<?php
		return;
	}
?>

<?php if ( have_comments() ) : ?>
	<div class="post-comments doubleborder" id="comments">
		<h2><?php comments_number('No Comments...', 'One comment so far...', '% Comments Already' );?></h2>
		<?php wp_list_comments('callback=pro_print_comments&style=div'); ?>
	</div>

	<div class="navigation">
		<div class="alignleft"><?php previous_comments_link() ?></div>
		<div class="alignright"><?php next_comments_link() ?></div>
	</div>

<?php else : ?>
	<div id="comments" class="cl"></div>
	<?php if ( comments_open() ) : ?>
        <!-- If comments are open, but there are no comments. -->
	 <?php else : // comments are closed ?>
		<p class="nocomments">Comments are closed.</p>
	<?php endif; ?>
<?php endif; ?>

<?php if ( comments_open() ) : ?>
	<div class="leave-comment-form" id="respond">
		<div class="divider-line"></div>
		<h2>Leave a Comment Below</h2>
		
		<div class="cancel-comment-reply">
			<?php cancel_comment_reply_link(); ?>
		</div>
		
		<?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>
			<p>You must be <a href="<?php echo wp_login_url( get_permalink() ); ?>">logged in</a> to post a comment.</p>
		<?php else : ?>
			
			<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
				<div id="cf">
					<div class="top">
						<div class="bottom">
								<div>
									<?php if ( is_user_logged_in() ) : ?>
										<p>
											Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a> 
											<a style="float:right;" href="<?php echo wp_logout_url(get_permalink()); ?>" title="Log out of this account">Log out &raquo;</a>
											<div class="clearfix"></div>
										</p>
									<?php else : ?>
									<label for="author">Name</label><br /><input type="text" class="tfield blink" title="Name<?php if ($req) echo "(required)"; ?>" name="author"/><br />
									<label for="email">Email (Not Published)</label><br /><input type="text" class="tfield blink" title="Email<?php if ($req) echo "(required)"; ?>"  name="email"/><br />
									<label for="url">Website</label><br /><input type="text" class="tfield blink" title="Website"  name="url"/><br />
									<?php endif; ?>
									<label for="comments">Comment</label><br />
									<textarea name="comment" class="field" id="comment" rows="" cols=""></textarea>
									<?php comment_id_fields(); ?>
									<?php do_action('comment_form', $post->ID); ?>
								</div>
						</div>
					</div>
				</div>
				<input name="submit" type="submit" class="contact-submit-button" title="Post Comment"  value="Submit" />
			</form>
			<div class="cl">&nbsp;</div>
			
		<?php endif; // If registration required and not logged in ?>
	</div>
<?php endif; ?>