<?php
class Alithemes_Theme_Widget_Social extends WP_Widget {

	public function __construct() {
		$id_base = 'alithemes-theme-widget-social';
		$name	= esc_html__('Alithemes Social', 'livemag' );
		$widget_options = array(
					'classname' => 'widget_alith_social_widget',
					'description' => esc_html__('This is Social widget ', 'livemag' )
				);
		$control_options = array('width'=>'350px');
		parent::__construct($id_base, $name,$widget_options, $control_options);	

	}	
	public function widget( $args, $instance ) {
	
		extract($args);
	
		$title = apply_filters('widget_title', $instance['title']);
		$title = (empty($title))? '': $title;
		
		echo $before_widget;
		if(!empty($title)){
			echo $before_title . $title . $after_title;
		}
		
		require ALITHEMES_THEME_WIDGET_DIR . '/social/social.php';
		
		echo $after_widget;
	}
	
	public function update( $new_instance, $old_instance ) {
	
		$instance = $old_instance;
	
		$instance['title'] 		= strip_tags($new_instance['title']);
		$instance['content'] 	= strip_tags($new_instance['content']);
		$instance['twitter'] 	= strip_tags($new_instance['twitter']);
		$instance['facebook'] 	= strip_tags($new_instance['facebook']);
		$instance['google_plus']= strip_tags($new_instance['google_plus']);
		$instance['dribbble'] 	= strip_tags($new_instance['dribbble']);
		$instance['pinterest'] 	= strip_tags($new_instance['pinterest']);
		$instance['youtube'] 	= strip_tags($new_instance['youtube']);
		
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
		
		//Content
		$inputID 	= $this->get_field_id('content');
		$inputName 	= $this->get_field_name('content');
		$inputValue = @$instance['content'];
		$arr 		= array('class' =>'widefat','id' => $inputID);
		$html		= $htmlObj->label(esc_html__('Content', 'livemag'),array('for'=>$inputID))
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
		
		//twitter
		$inputID 	= $this->get_field_id('twitter');
		$inputName 	= $this->get_field_name('twitter');
		$inputValue = @$instance['twitter'];
		$arr 		= array('class' =>'widefat','id' => $inputID);
		$html		= $htmlObj->label(esc_html__('Twitter link', 'livemag'),array('for'=>$inputID))
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
		
		//facebook
		$inputID 	= $this->get_field_id('facebook');
		$inputName 	= $this->get_field_name('facebook');
		$inputValue = @$instance['facebook'];
		$arr 		= array('class' =>'widefat','id' => $inputID);
		$html		= $htmlObj->label(esc_html__('Facebook link', 'livemag'),array('for'=>$inputID))
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
		
		//google-plus
		$inputID 	= $this->get_field_id('google_plus');
		$inputName 	= $this->get_field_name('google_plus');
		$inputValue = @$instance['google_plus'];
		$arr 		= array('class' =>'widefat','id' => $inputID);
		$html		= $htmlObj->label(esc_html__('Google plus link', 'livemag'),array('for'=>$inputID))
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
		
		//dribbble
		$inputID 	= $this->get_field_id('dribbble');
		$inputName 	= $this->get_field_name('dribbble');
		$inputValue = @$instance['dribbble'];
		$arr 		= array('class' =>'widefat','id' => $inputID);
		$html		= $htmlObj->label(esc_html__('Dribbble link', 'livemag'),array('for'=>$inputID))
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
		
		//pinterest
		$inputID 	= $this->get_field_id('pinterest');
		$inputName 	= $this->get_field_name('pinterest');
		$inputValue = @$instance['pinterest'];
		$arr 		= array('class' =>'widefat','id' => $inputID);
		$html		= $htmlObj->label(esc_html__('Pinterest link', 'livemag'),array('for'=>$inputID))
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
		
		//youtube
		$inputID 	= $this->get_field_id('youtube');
		$inputName 	= $this->get_field_name('youtube');
		$inputValue = @$instance['youtube'];
		$arr 		= array('class' =>'widefat','id' => $inputID);
		$html		= $htmlObj->label(esc_html__('Youtube link', 'livemag'),array('for'=>$inputID))
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
}
