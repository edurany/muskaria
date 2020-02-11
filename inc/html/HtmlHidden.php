<?php
class HtmlHidden{
	/*
	* $ Name: The name of the hidden element
	* $ Attr: The hidden element's attributes
	* Id - style - width - class - value ...
	* $ Options: The additional components will arise when new cases
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
		//Create an HTML element
		$html = '<input type="hidden" name="'. esc_attr($name) . '" ' . esc_attr($strAttr) . ' value="' . esc_attr($value) . '" />';
		return $html;
	}
}