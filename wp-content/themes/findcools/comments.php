<div class="post-comments" id="comments">
	
	<?php 
		if ( comments_open() ) :
		echo '<div class="post-box"><h4 class="post-box-title"><span>';
		comments_number(__('No Comments','findcools'), __('1 Comment','findcools'), '% ' . __('Comments','findcools') );
		echo '</span></h4></div>';
		endif;

		echo "<div class='comments'>";
		
			wp_list_comments(array(
				'avatar_size'	=> 60,
				'max_depth'		=> 5,
				'style'			=> 'ul',
				'callback'		=> 'findcools_comments',
				'type'			=> 'all'
			));

		echo "</div>";

		echo "<div id='comments_pagination'>";
			paginate_comments_links(array('prev_text' => '&laquo;', 'next_text' => '&raquo;'));
		echo "</div>";

		$custom_comment_field = '<p class="comment-form-comment"><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea></p>';  //label removed for cleaner layout

		comment_form(array(
			'comment_field'			=> $custom_comment_field,
			'comment_notes_after'	=> '',
			'logged_in_as' 			=> '',
			'comment_notes_before' 	=> '',
			'title_reply'			=> __('Leave a Reply', 'findcools'),
			'cancel_reply_link'		=> __('Cancel Reply', 'findcools'),
			'label_submit'			=> __('Post Comment', 'findcools')
		));
	 ?>


</div> <!-- end comments div -->
