<?php
class HtmlRadio{
	/*
	* $ Name: The name of the Radio element
	* $ Attr: The attributes of the Radio element
	* Id - style - width - class - value ...
	* $ Options: The additional components will arise when new cases
	* [Data]: the element will contain an array of value and label of the radio element
	* [Separator]: The value of the radio buttons separated
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
		//Check the value of $ value
		$strValue = $value;
		//Check delimiters between the radio buttons
		if(!isset($options['separator'])){
			$options['separator'] = ' ';
		}
		//Create the radio buttons
		$html = '';
		$data = $options['data'];
		if(count($data)){
			foreach ($data as $key => $val){
				$checked = '';
				if(preg_match('/^(' . $strValue .')$/i', $key)){
					$checked = ' checked="checked" ';
				}				
				$html  .= '<input type="radio" name="' . esc_attr($name) . '" ' . esc_attr($checked) . ' value="' . esc_attr($key) . '"/>' 
						  . esc_attr($val)  . esc_attr($options['separator']);
			}
		}
		return $html;
	}
}