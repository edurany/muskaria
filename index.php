<?php get_header(); ?>
<div class="main-content">
<?php if(get_query_var('paged') == 0): ?>
	<section class="top_content">
		<?php if(is_active_sidebar('top-content-area')):?>
			<?php dynamic_sidebar('top-content-area');?>			
		<?php endif;?>
	</section>
<?php endif; ?>
	<section class="container sitecontainer bgw">
		<div class="row">
			<?php 
			$alith_homepage_style = get_theme_mod('alith_homepage_style');	
			switch ( $alith_homepage_style ) {
				case 'homepage_three_columns':  get_template_part( 'template-parts/homepage/homepage', 'three_columns' ); break;
				case 'homepage_two_columns':  get_template_part( 'template-parts/homepage/homepage', 'two_columns' ); break;
				case 'homepage_center_content':  get_template_part( 'template-parts/homepage/homepage', 'center_content' ); break;
				default: get_template_part( 'template-parts/homepage/homepage', 'three_columns' ); break;
			}
			?>
		</div> <!-- end row -->
	</section>
</div>
<?php get_footer();?>