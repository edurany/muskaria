<?php if (has_post_thumbnail()) : ?>
	<figure class="post-media">
		<a title="<?php the_title();?>"  href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
	</figure>
<?php else : ?>
<?php get_template_part('template-parts/thumbnail/thumbnail',get_post_format()); ?>
<?php endif; ?>
<!-- end media -->	
<div class="post_content">
	<div class="post-meta">
		<i class="fa fa-user-o" aria-hidden="true"></i>				
		<span>
			<?php the_author_posts_link(); ?>
		</span>	
		<small> | </small>
		<i class="fa fa-clock-o"></i>
		<span>
			<?php echo get_the_date(); ?>
		</span>
		<small> | </small>
		<i class="fa fa-comment-o" aria-hidden="true"></i> 
		<span>
			<a title="<?php the_title();?>" href="<?php comments_link();?>">
				<?php comments_number('No comment','once comments','% comments');?>
			</a>
		</span>
		<?php if (is_sticky()) echo '<i class="fa fa-thumb-tack sticky_icon" aria-hidden="true"></i>'; ?>
	</div> <!-- end meta -->
	<div class="post-title">
	<?php 
		$format = get_post_format();
		switch($format) {
			case 'gallery': echo '<i class="fa fa-picture-o" aria-hidden="true"></i>'; break;
			case 'image': echo '<i class="fa fa-camera" aria-hidden="true"></i>'; break;
			case 'video': echo '<i class="fa fa-caret-square-o-right" aria-hidden="true"></i>'; break;
			case 'audio': echo '<i class="fa fa-music" aria-hidden="true"></i>'; break;
		}
	?>
		<a class="post-title" title="<?php the_title();?>" href="<?php the_permalink();?>"><?php the_title();?></a>
	</div><!-- end title -->
	<div class="entry-content">
		<?php echo mb_substr(get_the_excerpt(), 0, 200) . '...';?>
	</div>
	<div class="post-share">					
		<div class="customshare">
			<span class="list">
				<strong><i class="fa fa-share-alt"></i>
					<a class="tw" href="https://twitter.com/intent/tweet?source=<?php echo urlencode(get_permalink());?>%2F&text=:%20<?php echo urlencode(get_permalink());?>" target="_blank" title="Tweet"><i class="fa fa-twitter"></i></a>
					<a class="fb" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode(get_permalink());?>%1F&t=" title="Share on Facebook" target="_blank"><i class="fa fa-facebook"></i></a>
					<a class="gp" href="https://plus.google.com/share?url=<?php echo urlencode(get_permalink());?>" target="_blank" title="Share on Google+"><i class="fa fa-google-plus"></i></a>
				</strong>
			</span>
		</div>
	</div><!-- end share -->
</div>