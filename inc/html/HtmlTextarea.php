<?php
class HtmlTextarea{
	/*
	 * $name 	: name of textarea
	 * $attr 	: textarea properties 
	 * 		   	  Id - style - width - class - value ...
	 * $options	: more option
	 */
	public static function create($name = '', $value = '', $attr = array(), $options = null){
		$html = '';
		//create properties from $attr
		$strAttr = '';
		if(count($attr)> 0){
			foreach ($attr as $key => $val){
				if($key != "type" && $key != 'value'){
					$strAttr .= ' ' . $key . '="' . $val . '" ';
				}
			}
		}
		//create HTML tag
		$html = '<textarea name="'. esc_attr($name) . '" ' . esc_attr($strAttr) . '/>' . esc_attr($value) . '</textarea>';
		return $html;
	}
}