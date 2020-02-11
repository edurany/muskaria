<?php
class HtmlCheckbox{
	/*
	* $ Name: The name of the checkbox element
	* $ Attr: attributes checkbox element
	* Id - style - width - class - value ...
	* $ Options: The additional components will arise when new cases
	* [current_value]
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
		//Check to see if the check or not
		$checked = '';
		if(isset($options['current_value'])){
			if($options['current_value'] == $value){
				$checked = ' checked="checked" ';
			}
		}
		//Create HTML elements
		$html = '<input type="checkbox" name="'. esc_attr($name) . '" ' 
				. esc_attr($strAttr) . ' value="' . esc_attr($value) . '" ' . $checked  . ' />';
		return $html;
	}
}