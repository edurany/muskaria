<div class="col-md-3 col-sm-6 col-xs-12">
	<?php if(is_active_sidebar('primary-widget-area')):?>
		<?php dynamic_sidebar('primary-widget-area');?>			
	<?php endif;?>
</div>
<div class="col-md-3 col-sm-6 col-xs-12">
	<?php if(is_active_sidebar('second-widget-area')):?>
		<?php dynamic_sidebar('second-widget-area');?>			
	<?php endif;?>
</div>
<div class="col-md-6 col-sm-6 col-xs-12">
	<?php if (!get_theme_mod('alith_disable_archive_title')): ?>			
	<div class="archive-title">
		<h2>
			<?php
				if ( is_tag() ) :   printf( esc_html__('%1$s: %2$s','livemag'), esc_html__('Tag','livemag'), single_tag_title( '', false ) );
				elseif ( is_category() ) : printf( esc_html__('%1$s: %2$s','livemag'), esc_html__('Category','livemag'), single_cat_title( '', false ) );
				elseif ( is_day() ) : printf( __('%1$s','livemag'), the_time('l, F j, Y') );
				elseif ( is_month() ) : printf( __('%1$s','livemag'), the_time('F Y') );
				elseif ( is_year() ) : printf( __('%1$s','livemag'), the_time('Y') );
				endif;
			?>
		</h2>
	</div>
	<?php if ( is_tag() || is_category() ) : ?>
		<?php if(get_query_var('paged') == 0): ?>
		<div class="archive-description">
			<?php echo term_description(); ?>
		</div>
		<?php endif; ?>
	<?php endif; ?>
	<?php endif; ?>
	
	<?php if (!get_theme_mod('alith_disable_archive_breadcrumb')): ?>
	<div class="bread">
		<?php alithemes_theme_breadcrumbs(); ?>
	</div><!-- end bread -->
	<?php endif; ?>
	
	<div class="the_post_list">
	<!--THE LOOP-->
	<?php while (have_posts()) : the_post(); ?>
		<div class="post-item clearfix">
			<?php 
			$alith_archive_content_style = get_theme_mod('alith_archive_content_style');	
			switch ( $alith_archive_content_style ) {
				case 'archive_content_big_thumb':  get_template_part( 'template-parts/archive/archive', 'big_thumb' ); break;
				case 'archive_content_small_thumb':  get_template_part( 'template-parts/archive/archive', 'small_thumb' ); break;
				default: get_template_part( 'template-parts/archive/archive', 'big_thumb' ); break;
			}
			?>
		</div> <!-- end post-item -->
	<?php endwhile;?>			
	<!--END LOOP-->
	</div> <!-- end the_post_list -->
<?php require_once ALITHEMES_THEME_INC_DIR . '/paging.php';?>

<?php if(is_active_sidebar('after-content-area')):?>
	<?php dynamic_sidebar('after-content-area');?>			
<?php endif;?>

</div> <!-- end col-sm-6 -->
