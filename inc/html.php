<?php
class AlithemesHtml{
	public function __construct($options = null){
	}
	public function btn_media_script($button_id,$input_id){
		$script = "<script>
						jQuery(document).ready(function($){
							$('#{$button_id}').AlithemesBtnMedia('{$input_id}');
						});
					</script>";
		return $script;
	}
	public function pTag($value = '', $attr = array(), $options = null){
		$strAttr = '';
		if(count($attr)> 0){
			foreach ($attr as $key => $val){
				if($key != "type" && $key != 'value'){
					$strAttr .= ' ' . $key . '="' . $val . '" ';
				}
			}
		}
		return '<p ' . $strAttr .' >' . $value . '</p>';
	}
	public function label($value = '',$attr = array(), $options = null){
		$strAttr = '';
		if(count($attr)> 0){
			foreach ($attr as $key => $val){
				if($key != "type" && $key != 'value'){
					$strAttr .= ' ' . $key . '="' . $val . '" ';
				}
			}
		}
		return '<label ' . $strAttr . ' >' . $value . ':</label>';
	}
	//TEXTBOX
	public function textbox($name = '', $value = '', $attr = array(), $options = null){
		require_once ALITHEMES_THEME_INC_DIR . '/html/HtmlTextbox.php';		
		return HtmlTextbox::create($name, $value, $attr, $options);
	}	
	//FILEUPLOAD
	public function fileupload($name = '', $value = '', $attr = array(), $options = null){
		require_once ALITHEMES_THEME_INC_DIR . '/html/HtmlFileupload.php';
		return HtmlFileupload::create($name, $value, $attr, $options);
	}
	//PASSWORD
	public function password($name = '', $value = '', $attr = array(), $options = null){
		require_once ALITHEMES_THEME_INC_DIR . '/html/HtmlPassword.php';
		return HtmlPassword::create($name, $value, $attr, $options);
	}
	//HIDDEN
	public function hidden($name = '', $value = '', $attr = array(), $options = null){
		require_once ALITHEMES_THEME_INC_DIR . '/html/HtmlHidden.php';
		return HtmlHidden::create($name, $value, $attr, $options);
	}
	//BUTTON - SUBMIT - RESET
	public function button($name = '', $value = '', $attr = array(), $options = null){
		require_once ALITHEMES_THEME_INC_DIR . '/html/HtmlButton.php';
		return HtmlButton::create($name, $value, $attr, $options);
	}
	//TEXTAREA
	public function textarea($name = '', $value = '', $attr = array(), $options = null){
		require_once ALITHEMES_THEME_INC_DIR . '/html/HtmlTextarea.php';
		return HtmlTextarea::create($name, $value, $attr, $options);
	}
	//RADIO
	public function radio($name = '', $value = '', $attr = array(), $options = null){
		require_once ALITHEMES_THEME_INC_DIR . '/html/HtmlRadio.php';
		return HtmlRadio::create($name, $value, $attr, $options);
	}
	//CHECKBOX
	public function checkbox($name = '', $value = '', $attr = array(), $options = null){
		require_once ALITHEMES_THEME_INC_DIR . '/html/HtmlCheckbox.php';
		return HtmlCheckbox::create($name, $value, $attr, $options);
	}
	//SELECTBOX
	public function selectbox($name = '', $value = '', $attr = array(), $options = null){
		require_once ALITHEMES_THEME_INC_DIR . '/html/HtmlSelectbox.php';
		return HtmlSelectbox::create($name, $value, $attr, $options);
	}
}