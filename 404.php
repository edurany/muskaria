<?php
/**
 * The template for displaying 404 pages (not found)
 */
get_header(); ?>
 
<div class="main-content">
	<section class="container sitecontainer bgw">
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">	
				<div class="page_404">
					<h1><?php echo esc_html__('Error 404', 'livemag'); ?></h1>
					<h2><?php echo esc_html__('OOPS, THIS PAGE NOT FOUND', 'livemag'); ?></h2>
					<p><?php echo esc_html__('Sorry, we can not find the page you are looking for.', 'livemag'); ?><br> <?php echo esc_html__('Please check the URL or Try the search box below or', 'livemag'); ?> <a href="<?php echo site_url();?>"><?php echo esc_html__('Back to Homepage', 'livemag');?></a></p>
					
					<div class="search_box">	
						<?php get_search_form(); ?>
					</div>
				</div>
			</div>
		</div>
    </section> 
</div>
 
<?php get_footer(); ?>
