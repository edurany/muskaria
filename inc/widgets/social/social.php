	<?php if(!empty($instance['content'])):?>
	<div class="social-widget-description clr"><?php echo esc_attr($instance['content']);?></div>
	<?php endif;?>
	
	<!-- .social-widget-description -->
	<ul class="clr color flat">
		
		<?php if(!empty($instance['facebook'])):?>
		<li class="facebook"><a href="<?php echo esc_attr($instance['facebook']);?>" title="Facebook" target="_blank"> 
			<span class="fa fa-facebook"></span>				
			<?php echo esc_html__('Facebook', 'livemag'); ?>
		</a></li>
		<?php endif;?>

		<?php if(!empty($instance['twitter'])):?>
		<li class="twitter"><a href="<?php echo esc_attr($instance['twitter']);?>" title="Twitter" target="_blank"> 
			<span class="fa fa-twitter"></span>
			<?php echo esc_html__('Twitter', 'livemag'); ?>
		</a></li>
		<?php endif;?>
		
		<?php if(!empty($instance['youtube'])):?>
		<li class="youtube"><a href="<?php echo esc_attr($instance['youtube']);?>" title="Youtube" target="_blank"> 
			<span class="fa fa-youtube-play"></span>
			<?php echo esc_html__('Youtube', 'livemag'); ?>
		</a></li>
		<?php endif;?>
		
		<?php if(!empty($instance['google_plus'])):?>
		<li class="google-plus"><a href="<?php echo esc_attr($instance['google_plus']);?>" title="Google+" target="_blank"> 	<span class="fa fa-google-plus"></span>
			<?php echo esc_html__('Google+', 'livemag'); ?>
		</a></li>
		<?php endif;?>
				
		<?php if(!empty($instance['dribbble'])):?>
		<li class="dribbble"><a href="<?php echo esc_attr($instance['dribbble']);?>" title="Dribbble" target="_blank"> 
			<span class="fa fa-dribbble"></span>
			<?php echo esc_html__('Dribbble', 'livemag'); ?>
		</a></li>
		<?php endif;?>	
		
		<?php if(!empty($instance['pinterest'])):?>
		<li class="pinterest"><a href="<?php echo esc_attr($instance['pinterest']);?>" title="Pinterest" target="_blank"> 
			<span class="fa fa-pinterest"></span>
			<?php echo esc_html__('Pinterest', 'livemag'); ?>
		</a></li>
		<?php endif;?>			
	</ul>