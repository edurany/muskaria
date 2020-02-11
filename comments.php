<?php 
	if(post_password_required()== true) return;	
	if(!comments_open() && get_comment_pages_count() == 0) return;
?>
<?php 
	$comment_number = get_comments_number();
?>

<div class="comments-inner clr">
	<div class="comments-title"> 
		<?php 
		if($comment_number == 0){
			echo esc_html__('be the first to comment on this article','livemag');
		}else {
			if($comment_number == 1){
				echo esc_html__('There is 1 comment for this article','livemag');
			}else if($comment_number > 1){
				echo sprintf(esc_html__('There are %s comments for this article','livemag'),$comment_number);
			}
		}
		?>
	</div>
	<ol class="commentlist">
	<?php 
		$commentListArr = array('callback'=> 'alithemes_theme_comment');
		wp_list_comments($commentListArr);
	?>
	</ol>
	<?php 
		if(get_comment_pages_count() > 1 && get_option('page_comments')==1){
	?>
	<nav class="comment-navigation clr" role="navigation">
		<div class="nav-previous span_1_of_2 col col-1">
			<?php previous_comments_link(_('&larr; Older Comments'));?>
		</div>
		<div class="nav-next span_1_of_2 col">
			<?php next_comments_link(_('Newer Comments &rarr;'));?>
		</div>
	</nav>
	<?php }?>
	<?php 
		$formArr = array('cancel_reply_link'=> '<i class="fa fa-times"></i> Cancel comment reply');
		comment_form($formArr);
	?>
</div>