<?php
class HtmlButton{
	/*
	* $ Name: The name of the button element
	* $ Attr: The attributes of the element button
	* Id - style - width - class - value ...
	* $ Options: The additional components will arise when new cases
	* [Type]: button - submit - reset
	 */
	public static function create($name = '', $value = '', $attr = array(), $options = null){
		$html = '';
		//Create an attribute from the parameter string $ attr
		$strAttr = '';
		if(count($attr)> 0){
			foreach ($attr as $key => $val){
				if($key != "type" && $key != 'value'){
					$strAttr .= ' ' . $key . '="' . $val . '" ';
				}
			}
		}
		//Button type
		if(!isset($options['type'])){
			$type = 'submit';
		}else{		
			$type = $options['type'];
		}
		//Create HTML element
		$html = '<input type="' . esc_attr($type) .'" name="'. esc_attr($name) . '" ' . esc_attr($strAttr) . ' value="' . esc_attr($value) . '" />';
		return $html;
	}
}