<?php
class HtmlTextbox{	
	/*
	 * $name 	: name of textboxx
	 * $attr 	: textbox properties
	 * 		   	  Id - style - width - class ...
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
		$html = '<input type="text" name="'. esc_attr($name) . '" ' . esc_attr($strAttr) . ' value="' . esc_attr($value) . '" />';	
		return $html;
	}
}
