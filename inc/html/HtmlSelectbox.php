<?php
class HtmlSelectbox{
	/*
	* $name 	: Name of Selectbox
	* $attr 	: Textbox properties
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
		//check $value
		$strValue = '';
		if(is_array($value)){		
			$strValue = implode("|", $value);
		}else{
			$strValue = $value;
		}
		//Create value and label of <option>
		$strOption = '';
		$data = $options['data'];
		if(count($data)){
			foreach ($data as $key => $val){
				$selected = '';
				if(preg_match('/^(' . $strValue .')$/i', $key)){
					$selected = ' selected="selected" ';
				}
				$strOption .= '<option value="' . $key . '" ' . $selected . ' >' . $val . '</option>';
			}
		}
		//Create HTML tag
		$html = '<select name="'. esc_attr($name) . '" ' . esc_attr($strAttr) . ' >'
				. $strOption
				. '</select>';
		return $html;
	}
}