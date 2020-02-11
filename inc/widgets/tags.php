<?php
// Tags widget by Alithemes.com
// Version: 1.0
class Alithemes_Theme_Widget_Tags extends WP_Widget {

	public function __construct() {
		$id_base = 'alithemes-theme-widget-tags';
		$name	= esc_html__('Alithemes Tags', 'livemag' );
		$widget_options = array(
					'classname' => 'widget_tag_cloud',
					'description' => esc_html__('This is Tags widget ', 'livemag' )
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
		
		require ALITHEMES_THEME_WIDGET_DIR . '/tags/tags.php';		
		echo $after_widget;
	}	
	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['smallest'] = strip_tags($new_instance['smallest']);
		$instance['largest'] = strip_tags($new_instance['largest']);
		$instance['number'] = strip_tags($new_instance['number']);
		return $instance;
	}
	
	public function form( $instance ) {
		$htmlObj =  new AlithemesHtml();
		$inputID 	= $this->get_field_id('title');
		$inputName 	= $this->get_field_name('title');
		$inputValue = @$instance['title'];
		$arr = array('class' =>'widefat','id' => $inputID);
		$html		= 	$htmlObj->label(esc_html__('Title', 'livemag'),array('for'=>$inputID))
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
		
		//smallest
		$inputID 	= $this->get_field_id('smallest');
		$inputName 	= $this->get_field_name('smallest');
		$inputValue = @$instance['smallest'];
		$arr 		= array('class' =>'widefat','id' => $inputID);
		$html		= $htmlObj->label(esc_html__('Smallest tags size', 'livemag'),array('for'=>$inputID))
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
		
		//largest
		$inputID 	= $this->get_field_id('largest');
		$inputName 	= $this->get_field_name('largest');
		$inputValue = @$instance['largest'];
		$arr 		= array('class' =>'widefat','id' => $inputID);
		$html		= $htmlObj->label(esc_html__('Largest tags size', 'livemag'),array('for'=>$inputID))
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
		
		//number
		$inputID 	= $this->get_field_id('number');
		$inputName 	= $this->get_field_name('number');
		$inputValue = @$instance['number'];
		$arr 		= array('class' =>'widefat','id' => $inputID);
		$html		= $htmlObj->label(esc_html__('Number tags display', 'livemag'),array('for'=>$inputID))
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
