<?php
if (!class_exists('Alithemes_Media_Upload_Widget')):
class Alithemes_Media_Upload_Widget extends WP_Widget
{
    public function __construct()
    {
        $widget_ops = array(
            'classname' => 'alithemes_media_upload',
            'description' => esc_html__('Simple advertise banner widget', 'livemag' )
        );
        parent::__construct( 'alithemes_media_upload', esc_html__('Alithemes Advertise Widget', 'livemag' ), $widget_ops );
        add_action('admin_enqueue_scripts', array($this, 'upload_scripts'));
    }
    /**
     * Upload the Javascripts for the media uploader
     */
    public function upload_scripts()
    {
        wp_enqueue_script('media-upload');
        wp_enqueue_script('thickbox');
        wp_enqueue_script('upload_media_widget', ALITHEMES_THEME_JS_URL . '/upload-media.js', array('jquery'));
        wp_enqueue_style('thickbox');
    }

    public function widget( $args, $instance )
    {
       extract($args);
	
		$title = apply_filters('widget_title', $instance['title']);
		$title = (empty($title))? '': $title;
		
		echo $before_widget;
		if(!empty($title)){
			echo $before_title . $title . $after_title;
		}		
		//display frontpage
		echo '<div class="advertise-container">';
		$url = isset($instance['url']) ? $instance['url'] : '';
		$image = isset($instance['image']) ? $instance['image'] : '';
		$target = isset($instance['target']) ? $instance['target'] : '';
		
		if (trim($url)) echo '<a href="'.esc_url(trim($url)).'" target="'.esc_attr($target).'">';
        if ($image) echo '<img src="'.esc_url($image).'" alt="'.basename($image).'" />';
        if (trim($url)) echo '</a>';
		echo '<div class="clearfix"></div></div>';
		
				
		echo $after_widget;
    }
    public function update( $new_instance, $old_instance ) {
        // update logic goes here
        $updated_instance = $new_instance;
        return $updated_instance;
    }

    function form( $instance ) {	
		$title = isset ( $instance['title'] ) ? $instance['title'] : '';		
		?>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('title')); ?>" style="display:inline-block;width:50px"><?php _e('Title:','livemag'); ?></label>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
		</p>
		<?php
			$url = isset($instance['url']) ? $instance['url'] : '';
			$image = isset($instance['image']) ? $instance['image'] : '';
			$target = isset($instance['target']) ? $instance['target'] : '';
			?>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('url')); ?>"><?php _e('Banner URL','livemag') ?></label>
				<input class="widefat" id="<?php echo esc_attr($this->get_field_id('url')); ?>" name="<?php echo esc_attr($this->get_field_name('url')); ?>" type="text" value="<?php echo esc_attr($url); ?>" />
			</p>
			
			<p>
				<label for="<?php echo $this->get_field_name( 'image' ); ?>"><?php echo esc_html__( 'Image:','livemag' ); ?></label>
				<input name="<?php echo $this->get_field_name( 'image' ); ?>" id="<?php echo $this->get_field_id( 'image' ); ?>" class="widefat" type="text" size="36"  value="<?php echo esc_url( $image ); ?>" />
				<input class="upload_image_button" type="button" value="Upload Image" />
			</p> 
			<p>
				<label for="<?php echo $this->get_field_name( 'target' ); ?>"><?php echo esc_html__( 'Link target','livemag' ); ?></label>
				<select class="widefat" id="<?php echo $this->get_field_name( 'target' ); ?>" name="<?php echo $this->get_field_name( 'target' ); ?>">
					<option value="_blank"><?php echo esc_html__( 'New window','livemag' ); ?></option>
					<option value="_self" selected="selected"><?php echo esc_html__( 'Same frame','livemag' ); ?></option>
					<option value="_parent"><?php echo esc_html__( 'Parent frameset','livemag' ); ?></option>
					<option value="_top"><?php echo esc_html__( 'Full window','livemag' ); ?></option>
				</select>
			</p>			
			
<?php			
	}
}
endif; // class_exists
?>