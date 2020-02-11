<?php
if (!class_exists('Alithemes_Theme_Widget_Include')):
	class Alithemes_Theme_Widget_Include{
		private $_widget_options = array();
		public function __construct(){
			$this->_widget_options = array(
						'advs' 	=> true,
						'last_posts' => true,
						'slider' => true,
						'tags' 	=> true,
						'social' 	=> true,
						'feature_posts' 	=> true,
						'categories_tabs' 	=> true,
					);
			foreach ($this->_widget_options as $key => $val){	
				if($val == true){
					add_action('widgets_init',array($this,$key));
				}
			}
		}
		public function advs(){
			require_once ALITHEMES_THEME_WIDGET_DIR . '/advs.php';
			register_widget('Alithemes_Media_Upload_Widget');
		}
		public function last_posts(){
			require_once ALITHEMES_THEME_WIDGET_DIR . '/last_posts.php';
			register_widget('Alithemes_Theme_Widget_LastPost');
		}
		public function slider(){
			require_once ALITHEMES_THEME_WIDGET_DIR . '/sliders.php';
			register_widget('Alithemes_Theme_Widget_Sliders');
		}
		public function tags(){
			require_once ALITHEMES_THEME_WIDGET_DIR . '/tags.php';
			register_widget('Alithemes_Theme_Widget_Tags');
		}
		public function social(){
			require_once ALITHEMES_THEME_WIDGET_DIR . '/social.php';
			register_widget('Alithemes_Theme_Widget_Social');
		}
		public function feature_posts(){
			require_once ALITHEMES_THEME_WIDGET_DIR . '/feature_posts.php';
			register_widget('Alithemes_Theme_Widget_FeaturePosts');
		}
		public function categories_tabs(){
			require_once ALITHEMES_THEME_WIDGET_DIR . '/categories_tabs.php';
			register_widget('Alithemes_Theme_Widget_CategoriesTabs');
		}
	}
endif; // class_exists