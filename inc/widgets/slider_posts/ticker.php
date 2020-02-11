<?php 
$width=$instance['width'];
$height=$instance['height'];

$postObj = $wpQuery->post;
if($wpQuery->have_posts()){
	?>

	<div class="alith_ticker_control_block">
		<span class="up"><i class="fa fa-angle-left"></i></span>
		<span class="down"><i class="fa fa-angle-right"></i></span>
	</div>	
<div class="alith_ticker">
	
	<ul>
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
		<li class="ticker">
			<a class="post-title sub-title" href="<?php the_permalink();?>" title="<?php the_title();?>">
			<img class="mini-widget-thumb" src="<?php echo esc_attr($imgUrl);?>" alt="<?php the_title();?>"/>
			<?php echo get_the_title(); ?></a>
		</li>

		<?php 
		}
		?>
	</ul>
</div>


<?php 
}
?>