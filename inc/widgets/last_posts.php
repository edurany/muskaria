<?php
class Alithemes_Theme_Widget_LastPost extends WP_Widget {
	public function __construct() {
		$id_base = 'alithemes-theme-widget-last-post';
		$name	= esc_html__('Alithemes Last Posts', 'livemag');
		$widget_options = array(
					'classname' => 'widget_alith_recent_posts_thumb_widget',
					'description' => esc_html__('Lastest Posts ', 'livemag')
				);
		$control_options = array('width'=>'350px');
		parent::__construct($id_base, $name,$widget_options, $control_options);	

	}	
	public function widget( $args, $instance ) {
		extract($args);
		$title 			= apply_filters('widget_title', $instance['title']);
		$title 			= (empty($title))? esc_html__('', 'livemag'): $title;
		$cat 			= (empty($instance['cat']))? 0: $instance['cat'];
		$type 			= (empty($instance['type']))? 'only': $instance['type'];
		$post_format 	= (empty($instance['post_format']))? 'standard': $instance['post_format'];
		$hide_except = (empty($instance['hide_except']))? 0: $instance['hide_except'];
		$items 			= (empty($instance['items']))? 5: $instance['items'];	
		$width 			= (empty($instance['width']))? 300: $instance['width'];
		$height 		= (empty($instance['height']))? 126: $instance['height'];
		$show_type 		= (empty($instance['show_type']))? 'sidebar': $instance['show_type'];
		
			
		echo $before_widget;
		if(!empty($title)){
			echo $before_title . $title . $after_title;
		}
		

		$args = array(
				'post_type' 			=> 'post',
				'orderby' 				=> 'ID',
				'order'					=> 'DESC',
				'posts_per_page' 		=> $items,
				'post_status' 			=>'publish',
				'ignore_sticky_posts' 	=> true
		);
			
		if($cat != 0){
			if($type == 'only'){
				$args['category__in'] = array($cat);
			}else{
				$args['cat'] = $cat;
			}
		}
		

		if($post_format != 'standard'){
			$tax_query = array(
					array(
							'field' => 'slug',
							'terms'=>'post-format-'	. $post_format,
							'taxonomy' => 'post_format',
							'operator' => 'IN'
					)
			);
			$args['tax_query'] = $tax_query;
		}
			
		$wpQuery = new WP_Query($args);
			
		if($show_type == 'style-1' ){
			require ALITHEMES_THEME_WIDGET_DIR . '/last_posts/last_posts_style_1.php';
		}else if($show_type == 'style-2'){
			require ALITHEMES_THEME_WIDGET_DIR . '/last_posts/last_posts_style_2.php';
		}else if($show_type == 'style-3'){
			require ALITHEMES_THEME_WIDGET_DIR . '/last_posts/last_posts_style_3.php';
		}else if($show_type == 'style-4'){
			require ALITHEMES_THEME_WIDGET_DIR . '/last_posts/last_posts_style_4.php';
		}else if($show_type == 'style-5'){
			require ALITHEMES_THEME_WIDGET_DIR . '/last_posts/last_posts_style_5.php';
		}
		
		wp_reset_postdata();
		
		echo $after_widget;
	}
	
	public function update( $new_instance, $old_instance ) {
	
		$instance = $old_instance;
	
		$instance['title'] 			= strip_tags($new_instance['title']);
		$instance['cat'] 			= strip_tags($new_instance['cat']);
		$instance['type'] 			= strip_tags($new_instance['type']);
		$instance['post_format']	= strip_tags($new_instance['post_format']);
		$instance['hide_except']	= (int)$new_instance['hide_except'];
		$instance['items']			= strip_tags($new_instance['items']);
		$instance['show_type']		= strip_tags($new_instance['show_type']);
		$instance['width']			= strip_tags($new_instance['width']);
		$instance['height']			= strip_tags($new_instance['height']);
	
		return $instance;
	}
	
	public function form( $instance ) {
		$htmlObj =  new AlithemesHtml();
			
		//Title
		$inputID 	= $this->get_field_id('title');
		$inputName 	= $this->get_field_name('title');
		$inputValue = @$instance['title'];
		$arr = array('class' =>'widefat','id' => $inputID);
		$html		= $htmlObj->label(esc_html__('Title', 'livemag'),array('for'=>$inputID))
					. $htmlObj->textbox($inputName,$inputValue,$arr);
		echo wp_kses($htmlObj->pTag($html),
			array(
			'p' => array(),
			'label' => array(
						'for' => array()
					),
			'input' => array(
						'type'  => array(),
						'name'  => array(),
						'class' => array(),
						'id'    => array(),
						'value' => array()
					)
		));
		
		//Category
		$inputID 	= $this->get_field_id('cat');
		$inputName 	= $this->get_field_name('cat');
		$inputValue = @$instance['cat'];		
		
		$args = array(
				'show_option_all'    => esc_html__('All category', 'livemag'),
				'show_option_none'   => '',
				'orderby'            => 'ID',
				'order'              => 'ASC',
				'show_count'         => 1,
				'hide_empty'         => 1,
				'child_of'           => 0,
				'exclude'            => '',
				'echo'               => 0,
				'selected'           => $inputValue,
				'hierarchical'       => 1,
				'name'               => $inputName,
				'id'                 => $inputID,
				'class'              => 'widefat',
				'depth'              => 0,
				'tab_index'          => 0,
				'taxonomy'           => 'category',
				'hide_if_empty'      => false,
		);
		
		$html		= $htmlObj->label(esc_html__('Categories', 'livemag'),array('for'=>$inputID))
						. wp_dropdown_categories($args);
		echo wp_kses($htmlObj->pTag($html),
			array(
			'p' => array(),
			'label' => array(
						'for' => array()
					),
			'select' => array(
						'name'  => array(),
						'class'  => array(),
						'id' => array(),			

					),
			'option'    => array(
							'value' 	=> array(),
							'selected' 	=> array()
						),
		));
		
		//Type Show
		$inputID 	= $this->get_field_id('type');
		$inputName 	= $this->get_field_name('type');
		$inputValue = @$instance['type'];
		$arr 		= array('class' =>'widefat','id' => $inputID);
		$options['data'] = array(
								'only' => esc_html__('Only category', 'livemag'),
								'child' => esc_html__('Include child', 'livemag')
								);
		$html		= $htmlObj->label(esc_html__('Show Post in category', 'livemag'),array('for'=>$inputID))
					.	$htmlObj->selectbox($inputName,$inputValue,$arr,$options);
		echo wp_kses($htmlObj->pTag($html),
			array(
			'p' => array(),
			'label' => array(
						'for' => array()
					),
			'select' => array(
						'name'  => array(),
						'class'  => array(),
						'id' => array(),			

					),
			'option'    => array(
							'value' 	=> array(),
							'selected' 	=> array()
						),
		));
		
		//Hide except Image
		$inputID 	= $this->get_field_id('hide_except');
		$inputName 	= $this->get_field_name('hide_except');
		$inputValue = 1;
		$arr 		= array('class' =>'widefat','id' => $inputID);
		$options['current_value'] = @$instance['hide_except'];
		
		$html		= $htmlObj->label(esc_html__('Hide Except?', 'livemag'),array('for'=>$inputID))
						. '<br/>' .	$htmlObj->checkbox($inputName,$inputValue,$arr,$options)
						. esc_html__('Yes', 'livemag');
		echo $htmlObj->pTag($html);
		
		//Post Format
		$inputID 	= $this->get_field_id('post_format');
		$inputName 	= $this->get_field_name('post_format');
		$inputValue = @$instance['post_format'];
		$arr 		= array('class' =>'widefat','id' => $inputID);
		$tmp 		= get_theme_support('post-formats');
		$tmp 		= $tmp[0];
		
		$options['data'] = array(
				'standard' => 'Standard'
		);
		for($i=0; $i< count($tmp); $i++){
				$options['data'][$tmp[$i]] = $tmp[$i];
		}
		$html		= $htmlObj->label(esc_html__('Post Format', 'livemag'),array('for'=>$inputID))
						.	$htmlObj->selectbox($inputName,$inputValue,$arr,$options);
		echo wp_kses($htmlObj->pTag($html),
			array(
			'p' => array(),
			'label' => array(
						'for' => array()
					),
			'select' => array(
						'name'  => array(),
						'class'  => array(),
						'id' => array(),			

					),
			'option'    => array(
							'value' 	=> array(),
							'selected' 	=> array()
						),
		));
		
		//Type
		$inputID 	= $this->get_field_id('show_type');
		$inputName 	= $this->get_field_name('show_type');
		$inputValue = @$instance['show_type'];
		$arr 		= array('class' =>'widefat','id' => $inputID);
		
		$options['data'] = array(
				'style-1' 		=> esc_html__('Style 1', 'livemag' ),
				'style-2' 		=> esc_html__('Style 2', 'livemag' ),
				'style-3' 		=> esc_html__('Style 3', 'livemag' ),
				'style-4' 		=> esc_html__('Style 4', 'livemag' ),
				'style-5' 		=> esc_html__('Style 5', 'livemag' ),
		);
		
		$html		= $htmlObj->label(esc_html__('Show Type', 'livemag'),array('for'=>$inputID))
		.	$htmlObj->selectbox($inputName,$inputValue,$arr,$options);
		echo wp_kses($htmlObj->pTag($html),
			array(
			'p' => array(),
			'label' => array(
						'for' => array()
					),
			'select' => array(
						'name'  => array(),
						'class'  => array(),
						'id' => array(),			

					),
			'option'    => array(
							'value' 	=> array(),
							'selected' 	=> array()
						),
		));
		
		//Item
		$inputID 	= $this->get_field_id('items');
		$inputName 	= $this->get_field_name('items');
		$inputValue = @$instance['items'];
		$arr 		= array('class' =>'widefat','id' => $inputID);
		$html		= $htmlObj->label(esc_html__('Items', 'livemag'),array('for'=>$inputID))
						. $htmlObj->textbox($inputName,$inputValue,$arr);
		echo wp_kses($htmlObj->pTag($html),
			array(
			'p' => array(),
			'label' => array(
						'for' => array()
					),
			'input' => array(
						'type'  => array(),
						'name'  => array(),
						'class' => array(),
						'id'    => array(),
						'value' => array()
					)
		));
		
		//Width
		$inputID 	= $this->get_field_id('width');
		$inputName 	= $this->get_field_name('width');
		$inputValue = @$instance['width'];
		$arr 		= array('class' =>'widefat','id' => $inputID);
		$html		= $htmlObj->label(esc_html__('Image Width', 'livemag'),array('for'=>$inputID))
		. $htmlObj->textbox($inputName,$inputValue,$arr);
		echo wp_kses($htmlObj->pTag($html),
			array(
			'p' => array(),
			'label' => array(
						'for' => array()
					),
			'input' => array(
						'type'  => array(),
						'name'  => array(),
						'class' => array(),
						'id'    => array(),
						'value' => array()
					)
		));
		
		//Height
		$inputID 	= $this->get_field_id('height');
		$inputName 	= $this->get_field_name('height');
		$inputValue = @$instance['height'];
		$arr 		= array('class' =>'widefat','id' => $inputID);
		$html		= $htmlObj->label(esc_html__('Image height', 'livemag'),array('for'=>$inputID))
		. $htmlObj->textbox($inputName,$inputValue,$arr);
		echo wp_kses($htmlObj->pTag($html),
			array(
			'p' => array(),
			'label' => array(
						'for' => array()
					),
			'input' => array(
						'type'  => array(),
						'name'  => array(),
						'class' => array(),
						'id'    => array(),
						'value' => array()
					)
		));
	}

	private function get_img_url($post_content) {
		
		$image  = '';
		if(!empty($post_content)){	
			preg_match_all( '|<img.*?src=[\'"](.*?)[\'"].*?>|i', $post_content, $matches );
		}
	
		if ( isset( $matches ) ) $image = $matches[1][0];
		
		return $image;
	}
	

	private function get_new_img_url($imgUrl, $width = 0, $heigt = 0 ,	$suffixes = '-alith-slider-'){
		$suffixes = $suffixes . $width . 'x'. $heigt;
	
		//get name of current image
		preg_match("/[^\/|\\\]+$/", $imgUrl, $currentName);
		$currentName = $currentName[0];
	
		//create new name for image base on old name
		$tmpFileName = explode('.', $currentName);
		$newFileName = $tmpFileName[0] . $suffixes . '.' . $tmpFileName[1];
	
		//convert URL to PATH
		$tmp 	= explode('/wp-content/', $imgUrl);
		$imgDir = ABSPATH.'wp-content/' . $tmp[1];
	
	
		$newImgDir = str_replace($currentName, $newFileName, $imgDir);
		if(!file_exists($newImgDir)){
			$wpImageEditor =  wp_get_image_editor( $imgDir);
			if ( ! is_wp_error( $wpImageEditor ) ) {
				$wpImageEditor->resize($width, $heigt, array('center','center'));
				$wpImageEditor->save( $newImgDir);
			}
		}
		$newImgUrl= str_replace($currentName, $newFileName, $imgUrl);
	
		return $newImgUrl;
	}
}
