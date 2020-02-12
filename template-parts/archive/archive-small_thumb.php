<div class="home_small_thumb">
<?php if (has_post_thumbnail()) : ?>
	<figure class="post-media">
		<a title="<?php the_title();?>"  href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
	</figure>
<?php else : ?>
<?php endif; ?>
</div>
<!-- end media -->	

<div class="post_content home_content_small_thumb">
<div class="post-title">
	<a class="post-title" title="<?php the_title();?>" href="<?php the_permalink();?>"><?php the_title();?></a>
</div><!-- end title -->

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
</div> <!-- end meta -->



<div class="entry-content">
	<?php echo mb_substr(get_the_excerpt(), 0, 200) . '...';?>
</div>
<!--
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