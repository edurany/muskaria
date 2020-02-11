<?php
// attachments
$attachments = get_post_meta( get_the_ID() , '_format_gallery_images', true );

if (  count($attachments) == 0 ):	// nothing at all
		return;
else: 
?>

<div class="post-thumbnail">

    <div class="flexslider">
        <div class="flexslider">
            <ul class="slides">
                <?php
                foreach ( $attachments as $attachment):
                    $attachment_src = wp_get_attachment_image_src( $attachment, 'full' );
                    $attachment_post = get_post($attachment);
                    ?>
                    <li class="slide">
                        <figure><img src="<?php echo esc_url ( $attachment_src[0] );?>" width="<?php echo esc_attr($attachment_src[1]);?>" height="<?php echo esc_attr($attachment_src[2]);?>" alt="<?php echo basename( $attachment_src[0] );?>" /></figure>
                        <?php if ($caption = $attachment_post->post_excerpt){?>
                        <span class="slide-caption"><?php echo wp_kses($caption,'');?></span>
                        <?php } ?>
                    </li>
                <?php
                endforeach;
                ?>
            </ul><!-- .slides -->
        </div><!-- .flexslider -->
    </div><!-- .flexslider -->
    
</div><!-- .post-thumbnail -->

<?php endif; ?>