<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>	
	<div class="title-area">		
		<div class="entry-thumbnail post_image_type">
			<div class="feature_posts_grid">
				<div class="thumb-wrap not-media">		
					<?php get_template_part('template-parts/thumbnail/thumbnail',get_post_format()); ?>				
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
						<h3 class="sub_title"><a class="post-title" href="<?php the_permalink();?>" title="<?php the_title();?>"><?php the_title();?></a></h3>
					</div>
			</div>
		</div>
		<?php if (!get_theme_mod('alith_disable_metabox')): ?>
		<div class="single_post_meta">
			<span class="post-format">
				<i class="fa fa-camera" aria-hidden="true"></i>
				<a class="entry-format" href="<?php echo esc_url( get_post_format_link( 'image' ) ); ?>"><?php echo get_post_format_string( 'image' ); ?></a>
			</span>
			<small class="hidden-xs">&#124;</small>
			<span><i class="fa fa-user-o"></i><?php the_author_posts_link();?></span>
			<small class="hidden-xs">&#124;</small>
			
			<span><i class="fa fa-folder-o"></i> <?php the_category(' , ')?></span>
			<small class="hidden-xs">&#124;</small>
			
			<span><i class="fa fa-clock-o"></i><?php the_modified_date();?></span>
			<small class="hidden-xs">&#124;</small>
			
			<span class="hidden-xs"><i class="fa fa-comment-o"></i><a title="<?php the_title();?>" href="<?php comments_link();?>"><?php comments_number('No comment','once comments','% comments');?></a></span>
		</div><!-- end meta -->
		<?php endif; ?>
	</div>	
	<div class="post_content">
		<?php
			the_content( sprintf(
				__( 'Continue reading %s', 'livemag' ),
				the_title( '<span class="screen-reader-text">', '</span>', false )
			) );

			wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'livemag' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
				'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'livemag' ) . ' </span>%',
				'separator'   => '<span class="screen-reader-text">, </span>',
			) );
		?>
	</div>
</article>