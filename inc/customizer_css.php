<?php
if (!function_exists('alith_customize_css')) {
function alith_customize_css() {
    wp_enqueue_style(
        'custom-style',
        get_template_directory_uri() . '/css/custom.css'
    );
	global $content_width;
	if (get_theme_mod('alith_main_nav_background')!='') { 
		$nav_background		= get_theme_mod('alith_main_nav_background');
	} else {$nav_background	= "#2855a6"; }
	
	if (get_theme_mod('alith_main_nav_text_color')!='') { 
		$nav_text_color		= get_theme_mod('alith_main_nav_text_color');
	} else {$nav_text_color	= "#ffffff"; }
	
	if (get_theme_mod('alith_topbar_background')!='') { 
		$topbar_background		= get_theme_mod('alith_topbar_background');
	} else {$topbar_background	= "#232323"; }
	
	if (get_theme_mod('alith_topbar_text_color')!='') { 
		$topbar_text_color		= get_theme_mod('alith_topbar_text_color');
	} else {$topbar_text_color	= "#ffffff"; }
	
	if (get_theme_mod('alith_primary_color')!='') {
		$primary_color 		= get_theme_mod('alith_primary_color');
	} else {$primary_color 	= "#2855a6"; }
	
	if (get_theme_mod('alith_link_color')!='') {
		$link_color 		= get_theme_mod('alith_link_color');
	} else {$link_color 	= "#2855a6"; }
	
	if (get_theme_mod('alith_link_hover_color')!='') {
		$link_hover_color 		= get_theme_mod('alith_link_hover_color');
	} else {$link_hover_color 	= "#23527c"; }
	
	if (get_theme_mod('alith_text_color')!='') { 
		$text_color 		= get_theme_mod('alith_text_color');
	} else {$text_color 	= "#111111"; }
	
	if (get_theme_mod('alith_widget_title_color')!='') { 
		$widget_title_color 		= get_theme_mod('alith_widget_title_color');
	} else {$widget_title_color 	= "#000000"; }
	
	if (get_theme_mod('alith_body_background')!='') { 
		$body_background 		= get_theme_mod('alith_body_background');
	} else {$body_background 	= "#ffffff"; }
	
	if (get_theme_mod('alith_header_background')!='') { 
		$header_background 		= get_theme_mod('alith_header_background');
	} else {$header_background 	= "#ffffff"; }
	
	if (get_theme_mod('alith_bottom_background')!='') { 
		$bottom_background 		= get_theme_mod('alith_bottom_background');
	} else {$bottom_background 	= "#161616"; }
	
	if (get_theme_mod('alith_bottom_link_color')!='') { 
		$bottom_link_color 		= get_theme_mod('alith_bottom_link_color');
	} else {$bottom_link_color 	= "#ffffff"; }
	
	if (get_theme_mod('alith_bottom_text_color')!='') { 
		$bottom_text_color 		= get_theme_mod('alith_bottom_text_color');
	} else {$bottom_text_color 	= "#999999"; }
	
	if (get_theme_mod('alith_footer_background')!='') { 
		$footer_background 		= get_theme_mod('alith_footer_background');
	} else {$footer_background 	= "#101010"; }
	
	if (get_theme_mod('alith_footer_color')!='') { 
		$footer_color		= get_theme_mod('alith_footer_color');
	} else {$footer_color 	= "#999999"; }
	
	if (get_theme_mod('alith_off_canvas_background')!='') { 
		$off_canvas_background		= get_theme_mod('alith_off_canvas_background');
	} else {$off_canvas_background 	= "#f1f1f1"; }
	
	$custom_css = "
		.navbar-default,
		.header-two-mainnav,
		.header		
		{
			background: {$nav_background} !important;
		}
		.header-two-mainnav .navbar-nav > li > a,
		.header-three-mainnav .navbar-nav > li > a,
		.header .navbar-nav > li > a,
		.open_sidebar_area a
		{
			color: {$nav_text_color} !important;
		}
		.in_header_two,.in_header_three {background: {$header_background} !important;}
		.top_bar {
			background: {$topbar_background} !important;
		}
		.top_bar .navbar-nav > li > a,.top_bar .open_sidebar_area a {
			color: {$topbar_text_color} !important;
		}
		.top_bar .navbar-toggle .icon-bar {background: {$topbar_text_color} !important;}
		.navbar-default .navbar-toggle .icon-bar {
			  background: {$nav_text_color} !important;
		}
		.tags a,
		.btn-primary,
		.pagination > li > a,
		.pagination > li > span,
		.search_box input[type='submit'],
		.tagcloud a:hover,
		.widget_header_one h2.widget-title::before,
		.widget_header_two h2.widget-title::before
		{
			background-color: {$primary_color}!important;
			border-color: {$primary_color}!important;
		}
		.site-pagination ul
		{
			border: 2px solid {$primary_color}!important;
		}
		a.back-to-top,
		.feature_posts_carausel .cat-wrap,
		.feature_posts_grid .cat-wrap,
		.post-tags a,
		.comment-wrapper #comments .form-submit input,
		.comment-wrapper .commentlist li .reply a,
		.author_box .count_article,
		#wp-calendar caption,
		input.search-submit,
		.post_content input[type='submit'],
		.page-links a, .page-links > span
		{
			background: {$primary_color} !important;		
		}
		.post_date i,
		.post-meta i,
		.single_post_meta i,
		.site-pagination span.current
		{
			color: {$primary_color} !important;
		}
		.widget_header_three h2.widget-title
		{
		  border-bottom: 1px solid {$primary_color} !important;
		}
		#alith-tab li .alith-current-item  {
			border-bottom: 3px solid {$primary_color} !important;
		}
		a,
		.feature_posts_carausel .cat-wrap,
		.widget-title a,
		.post-title  a,
		.post-share .fa-share-alt
		{
			color: {$link_color} !important;
		}
		.sticky_post a {
			color: {$primary_color} !important;
		}
		a:hover,
		.widget_latest_news_style_1 li.items a:hover,
		.widget_latest_news_style_2 li.items a:hover,
		.widget_latest_news_style_3 li.items a:hover span,
		.slider_posts_slideshow a:hover span,
		.alith_ticker li:hover a,
		.footer ul.footer-menu li:hover a,
		.dropdown-menu > li:hover > a
		{
			color: {$link_hover_color} !important;
		}
		body,.bgw {
			color: {$text_color} !important;
			background-color: {$body_background} !important;
		}
		h2.widget-title{
			color: {$widget_title_color} !important;
		}
		.sidebar_area {
			background: {$off_canvas_background} !important;
		}
		
		.site_bottom {
		  background: {$bottom_background} !important;
		  color: {$bottom_text_color} !important;
		}
		.site_bottom a,
		.site_bottom h2.widget-title span,
		.site_bottom .post_date i,
		.site_bottom .post-meta i
		{
			color: {$bottom_link_color} !important;
		}
		.footer {
		  background: {$footer_background} !important;
		  color: {$footer_color} !important; 
		}
		.footer a {
			color: {$footer_color} !important; 
		}
		@media (min-width: 1200px) {
			.container {width:{$content_width}px !important;}
			.main-wrap {width:{$content_width}px !important;}
			
		}
		";
    wp_add_inline_style( 'custom-style', $custom_css );
}
add_action( 'wp_enqueue_scripts', 'alith_customize_css' );
}
?>