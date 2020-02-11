<?php
/**
 * LiveMag functions and definitions
 [TABLE OF CONTENTS]
	- Declare some constant
	- Add CSS files
	- Add JS files 
	- Content width
	- Register menu
	- Theme support
	- Social list
	- Single page support
		- Thumbnail
		- Paginated
		- Breadcrumbs
	- Comments
	- Required plugins
	- Quick Translate
	- Set default theme option
*/

/*============================================================================
 * DECLARE SOME CONSTANT
============================================================================*/
define('ALITHEMES_THEME_DIR', get_template_directory());
define('ALITHEMES_THEME_INC_DIR', ALITHEMES_THEME_DIR . '/inc');
define('ALITHEMES_THEME_URL', get_template_directory_uri());
define('ALITHEMES_THEME_JS_URL', ALITHEMES_THEME_URL . '/js');
define('ALITHEMES_THEME_CSS_URL', ALITHEMES_THEME_URL . '/css');
define('ALITHEMES_THEME_IMG_URL', ALITHEMES_THEME_URL . '/images');
define('ALITHEMES_THEME_WIDGET_DIR', ALITHEMES_THEME_DIR . '/inc/widgets');
define('ALITHEMES_THEME_WIDGET_URL', ALITHEMES_THEME_URL . '/inc/widgets');
require_once ALITHEMES_THEME_INC_DIR . '/wp_bootstrap_navwalker.php';
require_once ALITHEMES_THEME_INC_DIR . '/customizer.php';
require_once ALITHEMES_THEME_INC_DIR . '/customizer_css.php';
require_once ALITHEMES_THEME_INC_DIR . '/widgets.php';
new Alithemes_Theme_Widget_Include();
if(!class_exists('AlithemesHtml') && is_admin()){
	require_once ALITHEMES_THEME_INC_DIR . '/html.php';
}
$language_folder = ALITHEMES_THEME_URL . '/languages';
load_theme_textdomain( 'livemag', $language_folder );
/*============================================================================
 * ADD CSS FILE
============================================================================*/
if ( ! function_exists( 'alithemes_theme_register_style' ) ) :
	function alithemes_theme_register_style(){		
		wp_enqueue_style('bootstrap', ALITHEMES_THEME_CSS_URL . '/bootstrap.css',array(),'1.0'); // bootstrap framework		
		wp_enqueue_style('flexslider', ALITHEMES_THEME_CSS_URL . '/flexslider.css',array(),'1.0'); //flexslider style
		wp_enqueue_style('fontawesome', ALITHEMES_THEME_CSS_URL . '/font-awesome.min.css',array(),'1.0'); //font awesome		
		wp_enqueue_style('alithemes-theme-style', ALITHEMES_THEME_CSS_URL . '/style.css',array(),'1.0');; //main style
		wp_enqueue_style('alithemes-theme-custom', ALITHEMES_THEME_CSS_URL . '/custom.css',array(),'1.0'); //custom style
	}
endif;
add_action('wp_enqueue_scripts', 'alithemes_theme_register_style');
/*============================================================================
 * ADD JQUERY FILE
============================================================================*/
if ( ! function_exists( 'alithemes_theme_register_js' ) ) :
	function alithemes_theme_register_js(){
		wp_enqueue_script('bootstrap', ALITHEMES_THEME_JS_URL . '/bootstrap.min.js',array('jquery'),'1.0',true);
		wp_enqueue_script('flexslider', ALITHEMES_THEME_JS_URL . '/jquery.flexslider.js',array('jquery'),'1.0',true);
		wp_enqueue_script('retina', ALITHEMES_THEME_JS_URL . '/jquery.retina.min.js',array('jquery'),'1.0',true);
		wp_enqueue_script('ticker', ALITHEMES_THEME_JS_URL . '/jquery.easy-ticker.js',array('jquery'),'1.0',true);
		wp_enqueue_script('easing', ALITHEMES_THEME_JS_URL . '/jquery.easing.min.js',array('jquery'),'1.0',true);
		wp_enqueue_script('alithemes-theme-plugins', ALITHEMES_THEME_JS_URL . '/plugins.js',array('jquery'),'1.0',true);	
		wp_enqueue_script('mousewheel', ALITHEMES_THEME_JS_URL . '/jquery.mousewheel.js',array('jquery'),'1.0',true);
		wp_enqueue_script('jscrollpane', ALITHEMES_THEME_JS_URL . '/jquery.jscrollpane.min.js',array('jquery'),'1.0',true);	
		if(is_singular() && comments_open() ){ 	wp_enqueue_script('comment-reply');	}
		wp_register_script( 'alithemes-theme-ie9', ALITHEMES_THEME_JS_URL . '/html5.js',array('jquery'),'1.0',true);
		wp_enqueue_script( 'alithemes-theme-ie9', 'conditional', 'lt IE 9' );
	}
	add_action('wp_enqueue_scripts', 'alithemes_theme_register_js');
endif;
if ( ! function_exists( 'alithemes_javascript_detection' ) ) :
	function alithemes_javascript_detection() {
		echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
	}
endif;
add_action( 'wp_head', 'alithemes_javascript_detection', 0 );
/* -------------------------------------------------------------------- */
/* CONTENT WIDTH 
/* -------------------------------------------------------------------- */
global $content_width;
if ( ! isset( $content_width ) ) {
	$content_width = absint(get_theme_mod('alith_content_width')) ? absint(get_theme_mod('alith_content_width')) : 1350;
}
/*============================================================================
 * REGISTER MENUS
============================================================================*/
if ( ! function_exists( 'alithemes_theme_register_menus' ) ) :
	function alithemes_theme_register_menus(){
		register_nav_menus(
		array(
			'top-menu' 		=> esc_html__('Top menu', 'livemag'),
			'main-menu' 	=> esc_html__('Main menu', 'livemag'),
			'footer-menu' 	=> esc_html__('Footer menu', 'livemag')
		)
		);
	}
endif;
add_action('after_setup_theme', 'alithemes_theme_register_menus');
/*============================================================================
 * THEME SUPPORT
============================================================================*/
if ( ! function_exists( 'alithemes_theme_support' ) ) :
	function alithemes_theme_support(){
		add_theme_support( 'post-formats', array('aside','image','gallery','video','audio') );
		add_theme_support('post-thumbnails');
		add_theme_support('html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );
		add_theme_support( 'title-tag' );	
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'custom-background' );
	}
endif;
add_action('after_setup_theme', 'alithemes_theme_support');
/*============================================================================
	* SOCIAL
============================================================================*/
if (!function_exists('alith_social_array')){
function alith_social_array() {
    return array(
		'facebook'      =>	esc_html__('Facebook','livemag'),
		'twitter'              =>	esc_html__('Twitter','livemag'),
		'google-plus'          =>	esc_html__('Google+','livemag'),
		'linkedin'             =>	esc_html__('LinkedIn','livemag'),
		'tumblr'               =>	esc_html__('Tumblr','livemag'),
		'pinterest'            =>	esc_html__('Pinterest','livemag'),
		'youtube'              =>	esc_html__('YouTube','livemag'),
		'skype'                =>	esc_html__('Skype','livemag'),
		'instagram'            =>	esc_html__('Instagram','livemag'),
		'delicious'            =>	esc_html__('Delicious','livemag'),
		'digg'                 =>	esc_html__('Digg','livemag'),
		'reddit'               =>	esc_html__('Reddit','livemag'),
		'stumbleupon'          =>	esc_html__('StumbleUpon','livemag'),
        'medium'               =>	esc_html__('Medium','livemag'),
		'vimeo-square'         =>	esc_html__('Vimeo','livemag'),
		'yahoo'                =>	esc_html__('Yahoo!','livemag'),
		'flickr'               =>	esc_html__('Flickr','livemag'),
		'deviantart'           =>	esc_html__('DeviantArt','livemag'),
		'github'               =>	esc_html__('GitHub','livemag'),
		'stack-overflow'       =>	esc_html__('StackOverFlow','livemag'),
        'stack-exchange'       =>	esc_html__('Stack Exchange','livemag'),
        'bitbucket'            =>	esc_html__('Bitbucket','livemag'),
		'xing'                 =>	esc_html__('Xing','livemag'),
		'foursquare'           =>	esc_html__('Foursquare','livemag'),
		'paypal'               =>	esc_html__('Paypal','livemag'),
		'yelp'                 =>	esc_html__('Yelp','livemag'),
		'soundcloud'           =>	esc_html__('SoundCloud','livemag'),
		'lastfm'               =>	esc_html__('Last.fm','livemag'),
        'spotify'              =>	esc_html__('Spotify','livemag'),
        'slideshare'           =>	esc_html__('Slideshare','livemag'),
		'dribbble'             =>	esc_html__('Dribbble','livemag'),
		'steam'                =>	esc_html__('Steam','livemag'),
		'behance'              =>	esc_html__('Behance','livemag'),
		'weibo'                =>	esc_html__('Weibo','livemag'),
		'trello'               =>	esc_html__('Trello','livemag'),
		'vk'                   =>	esc_html__('VKontakte','livemag'),
		'home'                 =>	esc_html__('Homepage','livemag'),
		'envelope'             =>	esc_html__('Email','livemag'),
		'rss'                  =>	esc_html__('Feed','livemag'),
	);
}
}
if (!function_exists('alith_social_list')){
    function alith_social_list($search = false){
        $social_array = alith_social_array();
        foreach ( $social_array as $k => $v){
            if ( get_theme_mod('alith_social_'.$k) ){?>
                <li class="li-<?php echo str_replace('','',$k);?>"><a href="<?php echo esc_url(get_theme_mod('alith_social_'.$k));?>" target="_blank" rel="alternate" title="<?php echo esc_attr($v);?>"><i class="fa fa-<?php echo esc_attr($k);?>"></i></a></li>
            <?php }
        }?>
        <?php if ($search){ ?>
        <?php }
    }
}
/*============================================================================
 * DECLARE THE WIDGETS AREA
============================================================================*/
if ( ! function_exists( 'alithemes_theme_widgets_init' ) ) :
	function alithemes_theme_widgets_init(){
		//Primary widget
		register_sidebar(array(
		'name'          => esc_html__( 'Primary widget', 'livemag' ),
		'id'            => 'primary-widget-area',
		'description'   => esc_html__( 'Primary widget area', 'livemag' ),
		'before_widget' => '<div id="%1$s" class="sidebar-widget %2$s clr">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="widget-title"><h2 class="widget-title"><span>',
		'after_title'   => '</span></h2></div>'
		));
		//Second widget
		register_sidebar(array(
		'name'          => esc_html__( 'Second widget', 'livemag' ),
		'id'            => 'second-widget-area',
		'description'   => esc_html__( 'Second widget area', 'livemag' ),
		'before_widget' => '<div id="%1$s" class="sidebar-widget %2$s clr">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="widget-title"><h2 class="widget-title"><span>',
		'after_title'   => '</span></h2></div>'
		));
		//Off canvas
		if (!get_theme_mod('alith_disable_off_canvas')):
			register_sidebar(array(
			'name'          => esc_html__( 'Off canvas', 'livemag' ),
			'id'            => 'off-canvas-area',
			'description'   => esc_html__( 'Right toggle area', 'livemag' ),
			'before_widget' => '<div id="%1$s" class="sidebar-widget %2$s clr">',
			'after_widget'  => '</div>',
			'before_title'  => '<div class="widget-title"><h2 class="widget-title"><span>',
			'after_title'   => '</span></h2></div>'
			));
		endif; 
		//Toggle widget
		register_sidebar(array(
		'name'          => esc_html__( 'Top content', 'livemag' ),
		'id'            => 'top-content-area',
		'description'   => esc_html__( 'Top content area', 'livemag' ),
		'before_widget' => '<div id="%1$s" class="sidebar-widget %2$s clr">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="widget-title"><h2 class="widget-title"><span>',
		'after_title'   => '</span></h2></div>'
		));
		//Before main content widget
		register_sidebar(array(
		'name'          => esc_html__( 'Before Main Content', 'livemag' ),
		'id'            => 'before-content-area',
		'description'   => esc_html__( 'Before Main Content area', 'livemag' ),
		'before_widget' => '<div id="%1$s" class="sidebar-widget %2$s clr">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="widget-title"><h2 class="widget-title"><span>',
		'after_title'   => '</span></h2></div>'
		));
		//After main content widget
		register_sidebar(array(
		'name'          => esc_html__( 'After Main Content', 'livemag' ),
		'id'            => 'after-content-area',
		'description'   => esc_html__( 'After Main Content area', 'livemag' ),
		'before_widget' => '<div id="%1$s" class="sidebar-widget %2$s clr">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="widget-title"><h2 class="widget-title"><span>',
		'after_title'   => '</span></h2></div>'
		));
		//Home content column one
		register_sidebar(array(
		'name'          => esc_html__( 'Home content column one', 'livemag' ),
		'id'            => 'home-content-column-one-area',
		'description'   => esc_html__( 'Home content column one', 'livemag' ),
		'before_widget' => '<div id="%1$s" class="sidebar-widget %2$s clr">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="widget-title"><h2 class="widget-title"><span>',
		'after_title'   => '</span></h2></div>'
		));
		//Home content column two
		register_sidebar(array(
		'name'          => esc_html__( 'Home content column two', 'livemag' ),
		'id'            => 'home-content-column-two-area',
		'description'   => esc_html__( 'Home content column two', 'livemag' ),
		'before_widget' => '<div id="%1$s" class="sidebar-widget %2$s clr">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="widget-title"><h2 class="widget-title"><span>',
		'after_title'   => '</span></h2></div>'
		));		
		//Bottom column #1
		register_sidebar(array(
		'name'          => esc_html__( 'Bottom column #1', 'livemag' ),
		'id'            => 'bottom_column_1_area',
		'description'   => esc_html__( 'Bottom column #1 area', 'livemag' ),
		'before_widget' => '<div id="%1$s" class="sidebar-widget %2$s clr">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="widget-title"><h2 class="widget-title"><span>',
		'after_title'   => '</span></h2></div>'
		));
		//Bottom column #2
		register_sidebar(array(
		'name'          => esc_html__( 'Bottom column #2', 'livemag' ),
		'id'            => 'bottom_column_2_area',
		'description'   => esc_html__( 'Bottom column #2 area', 'livemag' ),
		'before_widget' => '<div id="%1$s" class="sidebar-widget %2$s clr">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="widget-title"><h2 class="widget-title"><span>',
		'after_title'   => '</span></h2></div>'
		));
		//Bottom column #3
		register_sidebar(array(
		'name'          => esc_html__( 'Bottom column #3', 'livemag' ),
		'id'            => 'bottom_column_3_area',
		'description'   => esc_html__( 'Bottom column #3 area', 'livemag' ),
		'before_widget' => '<div id="%1$s" class="sidebar-widget %2$s clr">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="widget-title"><h2 class="widget-title"><span>',
		'after_title'   => '</span></h2></div>'
		));
		//Bottom column #4
		register_sidebar(array(
		'name'          => esc_html__( 'Bottom column #4', 'livemag' ),
		'id'            => 'bottom_column_4_area',
		'description'   => esc_html__( 'Bottom column #4 area', 'livemag' ),
		'before_widget' => '<div id="%1$s" class="sidebar-widget %2$s clr">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="widget-title"><h2 class="widget-title"><span>',
		'after_title'   => '</span></h2></div>'
		));
		//Top banner (Only for header style two )
		if (get_theme_mod('alith_header_style')=='header_two') {
			register_sidebar(array(
			'name'          => esc_html__( 'Top banner', 'livemag' ),
			'id'            => 'top_banner',
			'description'   => esc_html__( 'Top advertise', 'livemag' ),
			'before_widget' => '<div id="%1$s" class="sidebar-widget %2$s clr">',
			'after_widget'  => '</div>',
			'before_title'  => '<div class="widget-title"><h2 class="widget-title"><span>',
			'after_title'   => '</span></h2></div>'
			));
		}
}
add_action('widgets_init', 'alithemes_theme_widgets_init');
endif;

/*============================================================================
	* SINGLE PAGE SUPPORT FUNCTIONS
============================================================================*/
if ( ! function_exists( 'alithemes_theme_pagination' ) ) {
  function alithemes_theme_pagination() {
		$prev_post = get_adjacent_post(false, '', true);
		if(!empty($prev_post)) {
			?>
			<div class="prev-post">			
			<span><i class="fa fa-long-arrow-left" aria-hidden="true"></i><?php echo esc_html__( 'Prev Post', 'livemag' ); ?></span>
			<?php
			echo '<a href="' . get_permalink($prev_post->ID) . '" title="' . $prev_post->post_title . '">' . $prev_post->post_title . '</a>'; 
			?>
			</div>
			<?php
			}
		$next_post = get_adjacent_post(false, '', false);
		if(!empty($next_post)) {
			?>
			<div class="next-post">			
			<span><?php echo esc_html__( 'Next Post', 'livemag' ); ?><i class="fa fa-long-arrow-right" aria-hidden="true"></i></span>
			<?php
			echo '<a href="' . get_permalink($next_post->ID) . '" title="' . $next_post->post_title . '">' . $next_post->post_title . '</a>'; 
			?>
			</div>
			<?php
			}
  }
}

/* -------------------------------------------------------------------- */
/* MEDIA RESULT
/* -------------------------------------------------------------------- */
if (!function_exists('alithemes_theme_get_media')) {
function alithemes_theme_get_media($size = 'full') {
    
	// get data
	$type = get_post_format();	
	if ($type=='audio') $media_code = trim( get_post_meta( get_the_ID(), '_format_audio_embed' , true ) );
	elseif ($type=='video') $media_code = trim( get_post_meta( get_the_ID(), '_format_video_embed' , true ) );
	else $media_code = '';
	
	// return none
	if (!$media_code) return;
	
	// case url	
	// detect if self-hosted
	$url = $media_code;
	$parse = parse_url(home_url());
	$host = preg_replace('#^www\.(.+\.)#i', '$1', $parse['host']);
	$media_result = '';
	
	// not self-hosted
	if (strpos($url,$host)===false) {
		global $wp_embed;
		return $wp_embed->run_shortcode('[embed]' . $media_code . '[/embed]');
	
	// self-hosted	
	} else {
		if ($type=='video') {
			$args = array('src' => esc_url($url), 'width' => '643' );
			if ( has_post_thumbnail() ) {
				$full_src = wp_get_attachment_image_src( get_post_thumbnail_id() , $size );
				$args['poster'] = $full_src[0];
			}
			$media_result = '<div class="hosted-sc">'.wp_video_shortcode($args).'</div>';
		} elseif ($type=='audio') {
            
            if ( has_post_thumbnail() ) {
				$full_src = wp_get_attachment_image_src( get_post_thumbnail_id() , $size );
			}
            
			$media_result = '<figure class="audio-poster"><img src="'.esc_url($full_src[0]).'" width="'.$full_src[1].'" height="'.$full_src[2].'" alt="'.esc_attr(get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', true)) .'" /></figure>' . wp_audio_shortcode(array('src' => esc_url($url)));
		}
	}
	
	return $media_result;
	
}
}

/** Breadcrumbs
	Many thanks https://www.thewebtaylor.com/articles/wordpress-creating-breadcrumbs-without-a-plugin **/
if ( ! function_exists( 'alithemes_theme_breadcrumbs' ) ) {
function alithemes_theme_breadcrumbs() {       
    // Settings
    $separator          = '&gt;';
    $breadcrums_id      = 'breadcrumbs';
    $breadcrums_class   = 'breadcrumbs';
    $home_title         =  esc_html__('Home', 'livemag');
    // If you have any custom post types with custom taxonomies, put the taxonomy name below (e.g. product_cat)
    $custom_taxonomy    = 'product_cat';
    // Get the query & post information
    global $post,$wp_query;
    // Do not display on the homepage
    if ( !is_front_page() ) {
        // Build the breadcrums
        echo '<ul id="' . $breadcrums_id . '" class="' . $breadcrums_class . '">';
        // Home page
        echo '<li class="item-home"><a class="bread-link bread-home" href="' . home_url() . '" title="' . $home_title . '">' . $home_title . '</a></li>';
        echo '<li class="separator separator-home"> ' . $separator . ' </li>';
        if ( is_archive() && !is_tax() && !is_category() && !is_tag() ) {
            echo '<li class="item-current item-archive"><strong class="bread-current bread-archive">' . post_type_archive_title($prefix, false) . '</strong></li>';
        } else if ( is_archive() && is_tax() && !is_category() && !is_tag() ) {
            // If post is a custom post type
            $post_type = get_post_type();
            // If it is a custom post type display name and link
            if($post_type != 'post') {
                $post_type_object = get_post_type_object($post_type);
                $post_type_archive = get_post_type_archive_link($post_type);
                echo '<li class="item-cat item-custom-post-type-' . $post_type . '"><a class="bread-cat bread-custom-post-type-' . $post_type . '" href="' . $post_type_archive . '" title="' . $post_type_object->labels->name . '">' . $post_type_object->labels->name . '</a></li>';
                echo '<li class="separator"> ' . $separator . ' </li>';
            }
            $custom_tax_name = get_queried_object()->name;
            echo '<li class="item-current item-archive"><strong class="bread-current bread-archive">' . $custom_tax_name . '</strong></li>';
        } else if ( is_single() ) {
            // If post is a custom post type
            $post_type = get_post_type();
            // If it is a custom post type display name and link
            if($post_type != 'post') {
                $post_type_object = get_post_type_object($post_type);
                $post_type_archive = get_post_type_archive_link($post_type);
                echo '<li class="item-cat item-custom-post-type-' . $post_type . '"><a class="bread-cat bread-custom-post-type-' . $post_type . '" href="' . $post_type_archive . '" title="' . $post_type_object->labels->name . '">' . $post_type_object->labels->name . '</a></li>';
                echo '<li class="separator"> ' . $separator . ' </li>';
            }
            // Get post category info
			$last_category = '';
            $category = get_the_category();
            if(!empty($category)) {
                // Get last category post is in
				$vals = array_values($category);
				$last_category = end($vals);
                // Get parent any categories and create array
                $get_cat_parents = rtrim(get_category_parents($last_category->term_id, true, ','),',');
                $cat_parents = explode(',',$get_cat_parents);
                // Loop through parent categories and store in variable $cat_display
                $cat_display = '';
                foreach($cat_parents as $parents) {
                    $cat_display .= '<li class="item-cat">'.$parents.'</li>';
                    $cat_display .= '<li class="separator"> ' . $separator . ' </li>';
                }
            }
            // If it's a custom post type within a custom taxonomy
            $taxonomy_exists = taxonomy_exists($custom_taxonomy);
            if(empty($last_category) && !empty($custom_taxonomy) && $taxonomy_exists) {
                $taxonomy_terms = get_the_terms( $post->ID, $custom_taxonomy );
                $cat_id         = $taxonomy_terms[0]->term_id;
                $cat_nicename   = $taxonomy_terms[0]->slug;
                $cat_link       = get_term_link($taxonomy_terms[0]->term_id, $custom_taxonomy);
                $cat_name       = $taxonomy_terms[0]->name;
            }
            // Check if the post is in a category
            if(!empty($last_category)) {
                echo $cat_display;
                echo '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</strong></li>';
            // Else if post is in a custom taxonomy
            } else if(!empty($cat_id)) {
                echo '<li class="item-cat item-cat-' . $cat_id . ' item-cat-' . $cat_nicename . '"><a class="bread-cat bread-cat-' . $cat_id . ' bread-cat-' . $cat_nicename . '" href="' . $cat_link . '" title="' . $cat_name . '">' . $cat_name . '</a></li>';
                echo '<li class="separator"> ' . $separator . ' </li>';
                echo '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</strong></li>';
            } else {
                echo '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</strong></li>';
            }
        } else if ( is_category() ) {
            // Category page
            echo '<li class="item-current item-cat"><strong class="bread-current bread-cat">' . single_cat_title('', false) . '</strong></li>';
        } else if ( is_page() ) {
            // Standard page
            if( $post->post_parent ){
                // If child page, get parents 
                $anc = get_post_ancestors( $post->ID );
                // Get parents in the right order
                $anc = array_reverse($anc);
                // Parent page loop
                if ( !isset( $parents ) ) $parents = null;
                foreach ( $anc as $ancestor ) {
                    $parents .= '<li class="item-parent item-parent-' . $ancestor . '"><a class="bread-parent bread-parent-' . $ancestor . '" href="' . get_permalink($ancestor) . '" title="' . get_the_title($ancestor) . '">' . get_the_title($ancestor) . '</a></li>';
                    $parents .= '<li class="separator separator-' . $ancestor . '"> ' . $separator . ' </li>';
                }
                // Display parent pages
                echo $parents;
                // Current page
                echo '<li class="item-current item-' . $post->ID . '"><strong title="' . get_the_title() . '"> ' . get_the_title() . '</strong></li>';
            } else {
                // Just display current page if not parents
                echo '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '"> ' . get_the_title() . '</strong></li>';
            }
        } else if ( is_tag() ) {
            // Tag page
            // Get tag information
            $term_id        = get_query_var('tag_id');
            $taxonomy       = 'post_tag';
            $args           = 'include=' . $term_id;
            $terms          = get_terms( $taxonomy, $args );
            $get_term_id    = $terms[0]->term_id;
            $get_term_slug  = $terms[0]->slug;
            $get_term_name  = $terms[0]->name;
            // Display the tag name
            echo '<li class="item-current item-tag-' . $get_term_id . ' item-tag-' . $get_term_slug . '"><strong class="bread-current bread-tag-' . $get_term_id . ' bread-tag-' . $get_term_slug . '">' . $get_term_name . '</strong></li>';
        } elseif ( is_day() ) {
            // Day archive
            // Year link
            echo '<li class="item-year item-year-' . get_the_time('Y') . '"><a class="bread-year bread-year-' . get_the_time('Y') . '" href="' . get_year_link( get_the_time('Y') ) . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</a></li>';
            echo '<li class="separator separator-' . get_the_time('Y') . '"> ' . $separator . ' </li>';
            // Month link
            echo '<li class="item-month item-month-' . get_the_time('m') . '"><a class="bread-month bread-month-' . get_the_time('m') . '" href="' . get_month_link( get_the_time('Y'), get_the_time('m') ) . '" title="' . get_the_time('M') . '">' . get_the_time('M') . ' Archives</a></li>';
            echo '<li class="separator separator-' . get_the_time('m') . '"> ' . $separator . ' </li>';
            // Day display
            echo '<li class="item-current item-' . get_the_time('j') . '"><strong class="bread-current bread-' . get_the_time('j') . '"> ' . get_the_time('jS') . ' ' . get_the_time('M') . ' Archives</strong></li>';
        } else if ( is_month() ) {
            // Month Archive
            // Year link
            echo '<li class="item-year item-year-' . get_the_time('Y') . '"><a class="bread-year bread-year-' . get_the_time('Y') . '" href="' . get_year_link( get_the_time('Y') ) . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</a></li>';
            echo '<li class="separator separator-' . get_the_time('Y') . '"> ' . $separator . ' </li>';
            // Month display
            echo '<li class="item-month item-month-' . get_the_time('m') . '"><strong class="bread-month bread-month-' . get_the_time('m') . '" title="' . get_the_time('M') . '">' . get_the_time('M') . ' Archives</strong></li>';
        } else if ( is_year() ) {
            // Display year archive
            echo '<li class="item-current item-current-' . get_the_time('Y') . '"><strong class="bread-current bread-current-' . get_the_time('Y') . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</strong></li>';
        } else if ( is_author() ) {
            // Auhor archive
            // Get the author information
            global $author;
            $userdata = get_userdata( $author );
            // Display author name
            echo '<li class="item-current item-current-' . $userdata->user_nicename . '"><strong class="bread-current bread-current-' . $userdata->user_nicename . '" title="' . $userdata->display_name . '">' . 'Author: ' . $userdata->display_name . '</strong></li>';
        } else if ( get_query_var('paged') ) {
            // Paginated archives
            echo '<li class="item-current item-current-' . get_query_var('paged') . '"><strong class="bread-current bread-current-' . get_query_var('paged') . '" title="Page ' . get_query_var('paged') . '">'.esc_html__('Page','livemag') . ' ' . get_query_var('paged') . '</strong></li>';
        } else if ( is_search() ) {
            // Search results page
            echo '<li class="item-current item-current-' . get_search_query() . '"><strong class="bread-current bread-current-' . get_search_query() . '" title="Search results for: ' . get_search_query() . '">Search results for: ' . get_search_query() . '</strong></li>';
        } elseif ( is_404() ) {
            // 404 page
            echo '<li>' . 'Error 404' . '</li>';
        }
        echo '</ul>';
    }       
}
}
/*============================================================================
 * COMMENT DISPLAY
============================================================================*/
if ( ! function_exists( 'alithemes_theme_comment' ) ) :
	function alithemes_theme_comment($comment, $args,$depth){
		global $post;
		$author_id = $post->post_author;
		switch ($comment->comment_type){
			//pingback - trackback
			case 'pingback':
			case 'trackback':
				?>
				<li id="comment-<?php comment_ID()?>"  <?php comment_class('clr');?>>
					<div class="pingback-entry">
						<span class="pingback-heading"><?php echo esc_html__('Pingback:','livemag')?></span>
						<?php comment_author_link();?>
					</div>
				<?php 
				break;
				case '':
				?>
			<li id="li-comment-<?php comment_ID()?>">
			<article id="comment-<?php comment_ID()?>" <?php comment_class('clr');?>	>
				<div class="comment-author vcard">
					<?php echo get_avatar($comment,60)?>
				</div>
				<div class="comment-details clr ">
					<header class="comment-meta">
						<cite class="fn"> <?php echo get_comment_author_link();?> 
						<?php if($comment->user_id == $author_id):?>
						<span class="author-badge"><?php esc_html__('Author','livemag') ?></span>
						<?php endif;?>
						</cite> <span class="comment-date"><?php comment_date();?></time>
							 <?php esc_html__('at','livemag') ?><?php comment_time()?>
						</span>
					</header>
					<div class="comment-content entry clr">
						<?php comment_text();?>
					</div>
					<div class="reply comment-reply-link-div">
						<?php 
							$replyArr = array(
										'depth'=>$depth,
										'reply_text'=>esc_html__('Reply','livemag'),
										'max_depth' => $args['max_depth']
										);
							comment_reply_link($replyArr);
						?>
					</div>
				</div>
			</article> 
			<?php 
			break;
			}
	}
endif;
/***Custom comment fields****/
if ( ! function_exists( 'alithemes_theme_comment_fields' ) ) {
	function alithemes_theme_comment_fields( $fields ) {
		$commenter = wp_get_current_commenter();
		$req       = get_option( 'require_name_email' );
		$label     = $req ? '*' : ' ' . esc_html__( '(optional)', 'livemag' );
		$aria_req  = $req ? "aria-required='true'" : '';
		$fields['author'] =
			'<p class="comment-form-author">
				<label for="author">' . esc_html__( "Name", "livemag" ) . $label . '</label>
				<input id="author" name="author" type="text" placeholder="' . esc_attr__( "Your name", "livemag" ) . '" value="' . esc_attr( $commenter['comment_author'] ) .
			'" size="30" ' . $aria_req . ' />
			</p>';
		$fields['email'] =
			'<p class="comment-form-email">
				<label for="email">' . esc_html__( "Email", "livemag" ) . $label . '</label>
				<input id="email" name="email" type="email" placeholder="' . esc_attr__( "Email", "livemag" ) . '" value="' . esc_attr( $commenter['comment_author_email'] ) .
			'" size="30" ' . $aria_req . ' />
			</p>';
		$fields['url'] =
			'<p class="comment-form-url">
				<label for="url">' . esc_html__( "Website", "livemag" ) . '</label>
				<input id="url" name="url" type="url"  placeholder="' . esc_attr__( "Your site", "livemag" ) . '" value="' . esc_attr( $commenter['comment_author_url'] ) .
			'" size="30" />
				</p>';
		return $fields;
	}
}
add_filter( 'comment_form_default_fields', 'alithemes_theme_comment_fields' );

/*============================================================================
 * REQUIRED PLUGINS
============================================================================*/
require_once ALITHEMES_THEME_INC_DIR . '/class-tgm-plugin-activation.php';
add_action( 'tgmpa_register', 'alithemes_theme_register_required_plugins' ); // thanks https://themes.trac.wordpress.org/browser/firmasite/1.1.13/functions/class-tgm-plugin-activation.php

if ( !function_exists('alithemes_theme_register_required_plugins') ) {
    function alithemes_theme_register_required_plugins(){
        $plugins = array( 
			array(
                'name'     				=>  esc_html__('Vafpress Post Formats UI', 'livemag' ), // The plugin name
                'slug'     				=> 'VafpressPostFormatsUI', // The plugin slug (typically the folder name)
                'required' 				=> true, // If false, the plugin is only 'recommended' instead of required
				'source'   				=> esc_url('http://livemag.alithemes.com/plugins/vafpress-post-formats-ui-develop.zip'), // The plugin source             
            ),
			array(
                'name'     				=>  esc_html__('Alithemes Google Fonts Plugin', 'livemag' ), // The plugin name
                'slug'     				=> 'AlithemesGoogleFontsPlugin', // The plugin slug (typically the folder name)
                'required' 				=> false, // If false, the plugin is only 'recommended' instead of required
				'source'   				=> esc_url('http://livemag.alithemes.com/plugins/AlithemesGoogleFontsPlugin.zip'), // The plugin source             
            ),
			array(
                'name'     				=>  esc_html__('LiveMag Demo Import', 'livemag' ), // The plugin name
                'slug'     				=> 'LiveMagDemoImport', // The plugin slug (typically the folder name)
                'required' 				=> false, // If false, the plugin is only 'recommended' instead of required
				'source'   				=> esc_url('http://livemag.alithemes.com/plugins/LiveMagDemoImport.zip'), // The plugin source             
            ),
        
        );

        // Change this to your theme text domain, used for internationalising strings
        $theme_text_domain = 'livemag';

        $config = array(
            'id'           => 'tgmpa',                 // Unique ID for hashing notices for multiple instances of TGMPA.
            'default_path' => '',                      // Default absolute path to bundled plugins.
            'menu'         => 'tgmpa-install-plugins', // Menu slug.
            'parent_slug'  => 'themes.php',            // Parent menu slug.
            'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
            'has_notices'  => true,                    // Show admin notices or not.
            'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
            'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
            'is_automatic' => false,                   // Automatically activate plugins after installation or not.
            'message'      => '',                      // Message to output right before the plugins table.
        );
        tgmpa( $plugins, $config );
    }
}	

/* -------------------------------------------------------------------- */
/* QUICK TRANSLATION
/* -------------------------------------------------------------------- */

if (!function_exists('alith_quick_translate')){
	function alith_quick_translate($string,$text,$domain) {    
		$options = array(
				'tags'               =>  'Tags: ',
				'tag'           	 =>  'Tag',
				'share_this'    	 =>  'Share this article',
				'by'            	 =>  'By',
				'also_like'			 =>  'You may also like',
				'comments'      	 =>  'Comments',
				'leave_reply'      	 =>  'Leave a Reply',
				'post_comment'       =>  'Post Comment',
				'be_first_comment'   =>  'be the first to comment on this article',
				'reply'         	 =>  'Reply',
				'autho'         	 =>  'Author',
				'author'         	 =>  'Author: ',
				'home'          	 =>  'Home',
				'next'          	 =>  'Next Post',
				'prev'          	 =>  'Prev Post',	
				'category'      	 =>  'Category',
			);    
		foreach ($options as $k => $v) {
			if ($string==$v && get_theme_mod('alith_translate_'.$k)!='') $string = get_theme_mod('alith_translate_'.$k);
		}    
		return $string;    
	}
	add_filter('gettext','alith_quick_translate',20,3);
}
if (!function_exists('alith_add_next_page_button')){
	 /* Add Next Page Button in First Row */
	add_filter( 'mce_buttons', 'alith_add_next_page_button', 1, 2 ); // 1st row
	 
	/**
	 * Add Next Page/Page Break Button
	 * in WordPress Visual Editor
	 * 
	 * @link https://shellcreeper.com/?p=889
	 */
	function alith_add_next_page_button( $buttons, $id ){
	 
		/* only add this for content editor */
		if ( 'content' != $id )
			return $buttons;
	 
		/* add next page after more tag button */
		array_splice( $buttons, 13, 0, 'wp_page' );
	 
		return $buttons;
	}
}

if ( ! function_exists( 'alith_theme_fonts_url' ) ) :
/**
 * Register Google fonts.
 * @return string Google fonts URL for the theme.
 */
function alith_theme_fonts_url() {
	$fonts_url = '';
	$fonts     = array();
	$subsets   = 'latin,latin-ext';

	/*
	 * Translators: If there are characters in your language that are not supported
	 * by Noto Sans, translate this to 'off'. Do not translate into your own language.
	 */
	if ( 'off' !== _x( 'on', 'Montserrat font: on or off', 'livemag' ) ) {
		$fonts[] = 'Montserrat:400,700';
	}

	/*
	 * Translators: If there are characters in your language that are not supported
	 * by Raleway, translate this to 'off'. Do not translate into your own language.
	 */
	if ( 'off' !== _x( 'on', 'Raleway font: on or off', 'livemag' ) ) {
		$fonts[] = 'Raleway:300,400,600i,700';
	}

	/*
	 * Translators: To add an additional character subset specific to your language,
	 * translate this to 'greek', 'cyrillic', 'devanagari' or 'vietnamese'. Do not translate into your own language.
	 */
	$subset = _x( 'no-subset', 'Add new subset (greek, cyrillic, devanagari, vietnamese)', 'livemag' );

	if ( 'cyrillic' == $subset ) {
		$subsets .= ',cyrillic,cyrillic-ext';
	} elseif ( 'greek' == $subset ) {
		$subsets .= ',greek,greek-ext';
	} elseif ( 'devanagari' == $subset ) {
		$subsets .= ',devanagari';
	} elseif ( 'vietnamese' == $subset ) {
		$subsets .= ',vietnamese';
	}

	if ( $fonts ) {
		$fonts_url = add_query_arg( array(
			'family' => urlencode( implode( '|', $fonts ) ),
			'subset' => urlencode( $subsets ),
		), 'https://fonts.googleapis.com/css' );
	}

	return $fonts_url;
}
endif;
/*Enqueuing on the front end*/
function alith_theme_slug_scripts_styles() {
wp_enqueue_style( 'alith_theme_slug_fonts', alith_theme_fonts_url(), array(), null );
}
add_action( 'wp_enqueue_scripts', 'alith_theme_slug_scripts_styles' );