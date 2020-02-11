<?php get_header(); ?>
 
<div class="main-content">
	<section class="container sitecontainer bgw">
		<div class="row">
			<div class="col-md-9 col-sm-9 col-xs-12">	
								
				<div class="author_box">
					<?php
					// author avatar
					echo '<div class="author-avatar">'. get_avatar( get_the_author_meta( 'ID' ) ) . '</div>';
					?>
					<div class="author-description">
						<h3>
							<?php
								echo esc_html__('Author: ', 'livemag')
							?>					
							<?php							
							// author name
							printf( the_author_meta('display_name') );	
							?>
						</h3>
						<?php					
						// author discriptions
						echo '<p>'. get_the_author_meta( 'description' ) . '</p>';			 
						// author site
						if ( get_the_author_meta( 'user_url' ) ) : printf( __('<a target="_blank" href="%1$s" title="Visit to %2$s website">Visit author site</a>', 'livemag'),
								get_the_author_meta( 'user_url' ), get_the_author() );
						endif;
						?>
					</div>
				</div> <!--.author-box--->
				<div class="the_post_list">
				<!--THE LOOP-->
				<?php while (have_posts()) : the_post(); ?>
					<div class="post-item clearfix">
					
						<?php if (has_post_thumbnail()) : ?>
							<figure class="post-media">
								<a title="<?php the_title();?>"  href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
							</figure>
						<?php else : ?>
						<?php endif; ?>
						<!-- end media -->	
						
						
						<div class="post-meta">
							<span class="fa fa-user-o" aria-hidden="true"></span>				
							<span>
								<?php the_author_posts_link(); ?>
							</span>	
							<small> | </small>
							<span class="fa fa-clock-o"></span>
							<span>
								<?php echo get_the_date(); ?>
							</span>
							<small> | </small>
							<span class="fa fa-comment-o" aria-hidden="true"></span> 
							<span>
								<a title="<?php the_title();?>" href="<?php comments_link();?>">
									<?php comments_number('No comment','once comments','% comments');?>
								</a>
							</span>
						</div> <!-- end meta -->

						<div class="post-title">
							<a title="<?php the_title();?>" href="<?php the_permalink();?>"><?php the_title();?></a>
						</div><!-- end title -->
						
						<div class="entry-content">
							<?php echo mb_substr(get_the_excerpt(), 0, 200) . '...';?>
						</div>
						
						<div class="post-share">					
							<div class="customshare">
								<span class="list">
									<strong><i class="fa fa-share-alt"></i>
									<a href="#" class="tw"><i class="fa fa-twitter"></i></a>
									<a href="#" class="fb"><i class="fa fa-facebook"></i></a>
									<a href="#" class="gp"><i class="fa fa-google-plus"></i></a>
									</strong>
								</span>
							</div>
						</div><!-- end share -->
					</div>
				<?php endwhile;?>			
				<!--END LOOP-->
				</div> <!-- end the_post_list -->
			<?php require_once ALITHEMES_THEME_INC_DIR . '/paging.php';?>
			
			<?php if(is_active_sidebar('after-content-area')):?>
				<?php dynamic_sidebar('after-content-area');?>			
			<?php endif;?>
			
			</div> <!-- end col-sm-9 -->
			<div class="col-md-3 col-sm-6 col-xs-12">
				<?php if(is_active_sidebar('primary-widget-area')):?>
					<?php dynamic_sidebar('primary-widget-area');?>			
				<?php endif;?>
			</div>
		</div>
</div>
 
<?php get_footer(); ?>