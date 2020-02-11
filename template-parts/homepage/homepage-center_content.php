<div class="col-md-3 col-sm-6 col-xs-12">
	<?php if(is_active_sidebar('primary-widget-area')):?>
		<?php dynamic_sidebar('primary-widget-area');?>			
	<?php endif;?>
</div>

<div class="col-md-6 col-sm-6 col-xs-12">
	<?php if(is_active_sidebar('before-content-area')):?>
		<?php dynamic_sidebar('before-content-area');?>			
	<?php endif;?>
	
	<?php if (!get_theme_mod('alith_disable_latest_posts')): ?>
	<div class="the_post_list">
	<!--THE LOOP-->
	<?php while (have_posts()) : the_post(); ?>
	<div class="post-item clearfix <?php if (is_sticky()) echo 'sticky_post'; ?>">
		<?php 
			if (get_theme_mod('alith_home_content_style')!='') { 
				$alith_home_content_style		= get_theme_mod('alith_home_content_style');
			} else {$alith_home_content_style	= "home_content_big_thumb"; }
			
			switch ( $alith_home_content_style ) {
				case 'home_content_big_thumb':  get_template_part( 'template-parts/homepage/homecontent', 'big_thumb' ); break;
				case 'home_content_small_thumb':  get_template_part( 'template-parts/homepage/homecontent', 'small_thumb' ); break;
				default: get_template_part( 'template-parts/homecontent/homecontent', 'big_thumb' ); break;
			}
		?>
	</div> <!--end post-item-->
	<?php endwhile;?>			
	<!--END LOOP-->
	</div> <!-- end the_post_list -->
	<?php endif;?>
	
	<?php if (!get_theme_mod('alith_disable_latest_posts')): ?>
		<?php require_once ALITHEMES_THEME_INC_DIR . '/paging.php';?>
	<?php endif;?>
	
	<?php if(is_active_sidebar('after-content-area')):?>
		<?php dynamic_sidebar('after-content-area');?>			
	<?php endif;?>
	
	<div class="row">
		<div class="col-md-6 col-sm-6 col-xs-12">
			<?php if(is_active_sidebar('home-content-column-one-area')):?>
				<?php dynamic_sidebar('home-content-column-one-area');?>			
			<?php endif;?>
		</div>
		
		<div class="col-md-6 col-sm-6 col-xs-12">
		<?php if(is_active_sidebar('home-content-column-two-area')):?>
			<?php dynamic_sidebar('home-content-column-two-area');?>			
		<?php endif;?>
		</div>	
	</div>
</div> <!-- end col-sm-6 -->

<div class="col-md-3 col-sm-6 col-xs-12">
	<?php if(is_active_sidebar('second-widget-area')):?>
		<?php dynamic_sidebar('second-widget-area');?>			
	<?php endif;?>
</div>