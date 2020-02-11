<div class="container bgw">
<div class="row">
<div class="col-md-12 col-sm-12">
<?php 
$width=$instance['width'];
$height=$instance['height'];
$title = $instance['title'];
$postObj = $wpQuery->post;
if($wpQuery->have_posts()){
	?>
<div class="feature_posts_grid feature_posts_grid_2 clr">
	<?php 
	$i = 1;
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
	<?php if($i < 6) :?>	
	<div class="post-grid-item">
		<div class="post-content clear">
			<div class="thumb-wrap not-media">
				<a href="<?php the_permalink();?>" title="<?php the_title();?>"> 
					<img class="mini-widget-thumb" src="<?php echo esc_attr($imgUrl);?>" alt="<?php the_title();?>"/>
				</a>
			</div>
			<div class="desc-wrap">
				<div class="cat-wrap">
				<?php
					$categories = get_the_category(); 
					if ( ! empty( $categories ) ) {
						echo esc_html( $categories[0]->name );   
					}
				?>
				</div>
				<h3 class="sub_title"><a class="post-title" href="<?php the_permalink();?>" title="<?php the_title();?>"><?php the_title();?></a></h3>
			</div>
		</div>
	</div>
	<?php endif; ?>		
	<?php 
		$i++;
		}
	?>
</div>
<?php 
} // end if
?>
</div>
</div>
</div>