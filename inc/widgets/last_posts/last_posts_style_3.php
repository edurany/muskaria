<?php 
$width=$instance['width'];
$height=$instance['height'];
$title = $instance['title'];
$postObj = $wpQuery->post;
if($wpQuery->have_posts()){
	?>
<ul class="widget-latest-news widget_latest_news_style_3 clr">
	<?php if($title==''):?>
	<?php if($cat !=0):?>
	<li>
		<h2 class="widget-title"><a href="<?php echo get_category_link($cat)?>" title="<?php echo get_cat_name($cat)?>"><span><?php echo get_cat_name($cat)?></span></a></h2>
	</li>
	<?php endif;?>
	<?php endif;?>
	<?php 
	while ($wpQuery->have_posts()){
		$wpQuery->the_post();
		$postObj = $wpQuery->post;
		?>
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
	<li class="items">
		<div class="thumb_media clr">
			<span class="thumb_hover post_date"><i class="fa fa-calendar-o" aria-hidden="true"></i><?php echo get_the_date(); ?></span>
			<a href="<?php the_permalink();?>" title="<?php the_title();?>">
			<img class="mini-widget-thumb" src="<?php echo esc_attr($imgUrl);?>" alt="<?php the_title();?>"/></a>
		</div>
		<a class="the_post_title post-title" href="<?php the_permalink();?>" title="<?php the_title();?>"><?php echo get_the_title(); ?></a>
	</li>
	<?php 
	}
	?>
</ul>
<?php 
}
?>
