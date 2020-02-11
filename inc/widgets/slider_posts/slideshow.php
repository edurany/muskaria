<?php 
	$width=$instance['width'];
	$height=$instance['height'];
	if($wpQuery->have_posts()){
?>
<div class="slider_posts_slideshow">
<div class="flexslider">
  <ul class="slides">
	<?php 
		while ($wpQuery->have_posts()){
			$wpQuery->the_post();
			$postObj = $wpQuery->post;
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
	<li>
		<a href="<?php the_permalink();?>" title="<?php the_title();?>"> 
			<img src="<?php echo esc_attr($imgUrl);?>" alt="<?php the_title();?>" />
			<span class="post-title" ><?php the_title();?></span>
		</a>
	</li>
	<?php 
		}
	?>
	<!-- #home-slider -->
  </ul>
</div>
</div>
<?php 
	}
?>