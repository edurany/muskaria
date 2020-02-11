<?php get_header(); ?>
<div class="main-content">
<section class="container sitecontainer bgw">
		<div class="row">
			<div class="col-md-9 col-sm-9 col-xs-12 single-post-padding">	
				<?php if (!get_theme_mod('alith_disable_breadcrumb')): ?>			
				<div class="bread">
					<?php alithemes_theme_breadcrumbs(); ?>
				</div><!-- end bread -->
				<?php endif; ?>
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
					   <?php get_template_part( 'template-parts/post/content', get_post_format() ); ?>
				<?php endwhile; ?>
				<?php if(has_tag()): ?>
				<div class="post-tags">
					<span class="fa fa-tag" aria-hidden="true"></span>
					<?php the_tags(esc_html__('Tags: ', 'livemag'), '', '');?>
				</div>
				<?php endif;?>
				<?php if (!get_theme_mod('alith_disable_share')): ?>
				<div class="post_share">
					<div class="widget_alith_social_widget">
						<h3><?php echo esc_html__('Share this article', 'livemag') ?></h3>
						<ul class="share-buttons color">
						  <li class="facebook"><a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode(get_permalink());?>%2F&t=" title="Share on Facebook" target="_blank"><span class="fa fa-facebook"></span><?php echo esc_html__('Facebook', 'livemag') ?></a></li>
						  <li class="twitter"><a href="https://twitter.com/intent/tweet?source=<?php echo urlencode(get_permalink());?>%2F&text=:%20<?php echo urlencode(get_permalink());?>%2F" target="_blank" title="Tweet"><span class="fa fa-twitter"></span><?php echo esc_html__('Twitter', 'livemag') ?></a></li>
						  <li class="google-plus"><a href="https://plus.google.com/share?url=<?php echo urlencode(get_permalink());?>%2F" target="_blank" title="Share on Google+"><span class="fa fa-google-plus"></span><?php echo esc_html__('Google +', 'livemag') ?></a></li>
						  <li class="pinterest"><a href="http://pinterest.com/pin/create/button/?url=<?php echo urlencode(get_permalink());?>%2F&description=" target="_blank" title="Pin it"><span class="fa fa-pinterest"></span><?php echo esc_html__('Pinterest', 'livemag') ?></a></li>
						  <li class="reddit"><a href="http://www.reddit.com/submit?url=<?php echo urlencode(get_permalink());?>%2F&title=" target="_blank" title="Submit to Reddit"><span class="fa fa-reddit"></span><?php echo esc_html__('Reddit', 'livemag') ?></a></li>
						  <li class="linkedin"><a href="http://www.linkedin.com/shareArticle?mini=true&url=<?php echo urlencode(get_permalink());?>%2F&title=&summary=&source=<?php echo urlencode(get_permalink());?>%2F" target="_blank" title="Share on LinkedIn"><span class="fa fa-linkedin"></span><?php echo esc_html__('LinkedIn', 'livemag') ?></a></li>
						</ul>
					</div>
				</div><!-- .post-share -->
				<?php endif;?>
				<?php if (!get_theme_mod('alith_disable_navigation')): ?>
				<div class="post-nav clearfix">
					<?php alithemes_theme_pagination(); ?>
				</div> <!-- .post-nav  -->
				<?php endif;?>
				<?php if (!get_theme_mod('alith_disable_author_info')): ?>
				<div
					class="author-bio clr">
					<div class="author-bio-avatar clr">
						<a title="Visit Author Page"
							href="<?php echo get_author_posts_url($post->post_author)?>"> <?php echo get_avatar($post->post_author,60);?>
						</a>
					</div>
					<!-- .author-bio-avatar -->
					<div class="author-bio-content clr">
						<div class="author-bio-author clr">
							<?php echo esc_html__('By', 'livemag'). ': '; ?>
							<?php the_author_posts_link();?>
						</div>	
						<?php if(strlen(the_author_meta('description')) > 0 ): ?>		
						<p>
							<?php the_author_meta('description')?>
						</p>
						<?php endif; ?>
					</div>
				</div> <!-- .author-bio  -->
				<?php endif;?>
				<!----RELATED---->
				<?php if (!get_theme_mod('alith_disable_related_posts')): ?>
				<div class="related_posts">
					<h3 class="related_title"><?php echo esc_html__('You may also like', 'livemag') ?></h3>
					<div class="review-posts row">
					<?php
						$related = get_posts( array( 'category__in' => wp_get_post_categories($post->ID), 'numberposts' => 6, 'post__not_in' => array($post->ID) ) );
						if( $related ) foreach( $related as $post ) {
						setup_postdata($post); ?>
							<div id="post-<?php the_ID(); ?>" <?php post_class('post-review col-md-4 col-sm-12 col-xs-12'); ?>>
								<div class="post-content clear">   
									<div class="post-thumbnail thumb-wrap">
										<a title="<?php the_title();?>" href="<?php the_permalink();?>">						
											<?php the_post_thumbnail(); ?>						
										</a>
									</div> <!-- .post-thumbnail -->
									<div class="desc-wrap">
										<h3 class="sub_title"><a title="<?php the_title();?>" href="<?php the_permalink();?>"><?php the_title();?></a></h3>
									</div>
								</div>
							</div><!-- .post-related -->
						<?php }
						wp_reset_postdata(); ?>
					</div>
				</div> <!----.related_posts------>	
				<?php endif;?>
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
				<?php else : ?>
						<?php get_template_part( 'content', 'none' ); ?>
				<?php endif; ?>
			</div> <!-- end col-sm-9 -->
			<div class="col-md-3 col-sm-3 col-xs-12">
				<?php if(is_active_sidebar('primary-widget-area')):?>
					<?php dynamic_sidebar('primary-widget-area');?>			
				<?php endif;?>
			</div>			
		</div>
</section>
</div> <!--.main-content-->
<?php get_footer();?>