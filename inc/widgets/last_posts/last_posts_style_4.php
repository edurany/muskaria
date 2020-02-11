<?php 
$width=$instance['width'];
$height=$instance['height'];
$title = $instance['title'];
$hide_except = $instance['hide_except'];
$postObj = $wpQuery->post;
if($wpQuery->have_posts()){
	?>
<div class="widget-latest-news widget_latest_news_style_4 clr">

	<?php 
	$i = 1;
	while ($wpQuery->have_posts()){
		$wpQuery->the_post();
		$postObj = $wpQuery->post;
		?>
	<?php if($i== 1):?>
	<?php 
	$feature_img = wp_get_attachment_url(get_post_thumbnail_id($postObj->ID));
	if($feature_img == false){
		$imgUrl = $this->get_img_url($postObj->post_content);
	}else{
		$imgUrl = $feature_img;
	}
	if(!empty($imgUrl)){
		$imgUrl = $this->get_new_img_url($imgUrl, $width, $height);
	}
	
	?>
	
	<?php if($title==''):?>
	<?php if($cat !=0):?>
	<div>
		<h2 class="widget-title"><a href="<?php echo get_category_link($cat)?>" title="<?php echo get_cat_name($cat)?>"><span><?php echo get_cat_name($cat)?></span></a></h2>
	</div>
	<?php endif;?>
	<?php endif;?>
	
	
	<div class="first-post clr margin_bottom_15">
		<div class="thumb_media clr">
			<a href="<?php the_permalink();?>" title="<?php the_title();?>"> 
			<img src="<?php echo esc_attr($imgUrl);?>" alt="<?php the_title();?>"/>
			</a>
		</div> <!-- .first-post-media --> 
		<a class="post-title" href="<?php the_permalink();?>" title="<?php the_title();?>" class="widget_latest_news_style_1_first_link"><?php the_title();?></a>
			<div class="post-meta">
				<i class="fa fa-calendar-o" aria-hidden="true"></i>
				<span>
					<?php echo get_the_date(); ?>
				</span>
				<small> | </small>
				<i class="fa fa-comment-o" aria-hidden="true"></i> 
				<span>
				<a title="<?php the_title();?>" href="<?php comments_link();?>">
					<?php comments_number('0','1','%');?>
				</a>
				</span>		
			</div> <!-- end meta -->
		<p><?php echo mb_substr(get_the_excerpt(), 0,85);?></p>
	</div>
	<?php else :?>
	<div class="items latest_news_style_4">
		<div class="row margin_bottom_15">
			<div class="col-md-4 col-sm-12">
				<a href="<?php the_permalink();?>" title="<?php the_title();?>"> 
					<?php the_post_thumbnail(); ?>
				</a>
			</div>
			<div class="col-md-8 col-sm-12 pull_left_15">
				<a class="post-title sub-title" href="<?php the_permalink();?>" title="<?php the_title();?>"><?php echo mb_substr(get_the_title(), 0,32) . '...';?></a>
				<div class="post-meta">
					<i class="fa fa-calendar-o" aria-hidden="true"></i>
					<span>
						<?php echo get_the_date(); ?>
					</span>
					<small> | </small>
					<i class="fa fa-comment-o" aria-hidden="true"></i> 
					<span>
					<a title="<?php the_title();?>" href="<?php comments_link();?>">
						<?php comments_number('0','1','%');?>
					</a>
					</span>		
				</div> <!-- end meta -->
				<?php if(!$hide_except): ?><p><?php echo mb_substr(get_the_excerpt(), 0,65);?></p><?php endif; ?>
			</div>
		</div>
	</div>
	<?php endif;?>

	<?php 
	$i++;
	}
	?>
</div>
<?php 
}
?>
