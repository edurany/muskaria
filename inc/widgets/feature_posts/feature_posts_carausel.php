<?php 
	$width=$instance['width'];
	$height=$instance['height'];
	if($wpQuery->have_posts()){
?>
<div class="feature_posts_carausel">
<div class="feature_carausel">	
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
		<div class="slide-contents">
			<div class="thumb-wrap">
				<a href="<?php the_permalink();?>" title="<?php the_title();?>"> 
					<img src="<?php echo esc_attr($imgUrl);?>" alt="<?php the_title();?>" />			
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
				<div class="post-meta">
					<i class="fa fa-clock-o"></i>
					<span>
						<?php echo get_the_date(); ?>
					</span>
					<small> | </small>
					<i class="fa fa-comment-o" aria-hidden="true"></i> 
					<span>
						<a title="<?php the_title();?>" href="<?php comments_link();?>">
							<?php comments_number('No comment','once comments','% comments');?>
						</a>
					</span>
				</div> <!-- end meta -->
				<h3><a class="post-title" href="<?php the_permalink();?>" title="<?php the_title();?>"><?php the_title();?></a></h3>			
			</div>
		</div>
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