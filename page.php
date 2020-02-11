<?php
/**
 * The template for displaying pages 
 */
get_header(); ?>

<div class="main-content">
	<section class="container sitecontainer bgw">
			<div class="row">
				<div class="col-md-9 col-sm-9 col-xs-12 single-post-padding">			
					<div class="bread">
						<?php alithemes_theme_breadcrumbs(); ?>
					</div><!-- end bread -->
					<?php if(have_posts()) while (have_posts()) : the_post();?>
					<article id="post-<?php the_ID();?>" <?php post_class('clr')?>>
						<header class="page-header clr">
							<h1 class="page-header-title"><?php the_title();?></h1>
						</header>
						<div class="entry clr"><?php the_content();?></div>
					</article>
					
					<?php if (!get_theme_mod('alith_disable_comment_box')): 
					if( comments_open() ): //check if comments are enable
					?>
					<div class="comment-wrapper">
						<section id="comments">
							<h2 class="related-title"><?php echo esc_html__('Comments', 'livemag') ?></h2>
							<?php comments_template()?>	
						</section>	
					</div>
					<?php endif; endif;?>	
				<?php endwhile;?>
				</div>
				<!-- end col-sm-9 -->
			
				<div class="col-md-3 col-sm-3 col-xs-12">
					<?php if(is_active_sidebar('primary-widget-area')):?>
						<?php dynamic_sidebar('primary-widget-area');?>			
					<?php endif;?>
				</div>				
			</div>	
	</section>
</div>

<?php get_footer(); ?>
