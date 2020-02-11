<?php
class HtmlFileupload{
	/*
	* $ Name: The name of the element Fileupload
	* $ Attr: The attributes of the element Fileupload
	* Id - style - width - class - value ...
	* $ Options: The additional components will arise when new cases
	 */
	public static function create($name = '', $value = '', $attr = array(), $options = null){
		$html = '';
		//Create attribute from the parameter string $ attr
		$strAttr = '';
		if(count($attr)> 0){
			foreach ($attr as $key => $val){
				if($key != "type" && $key != 'value'){
					$strAttr .= ' ' . $key . '="' . $val . '" ';
				}
			}
		}
		//Create an HTML element
		$html = '<input type="file" name="'. esc_attr($name) . '" ' . esc_attr($strAttr) . ' value="' . esc_attr($value) . '" />';
		return $html;
	}
}