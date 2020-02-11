<?php
/* -------------------------------------------------------------------- 
 *  CUSTOMIZER TABLE CONTENT

	GENERAL SETTING
		logo
		Header social icons
		Header search
		Off canvas
		Back to top
		Copyright text
	STYLE
		Container width	
		Color
	SOCIAL ICONS
	SINGLE POST LAYOUT
		Breadcrumb
		Metabox
		Share
		Navigation
		Author info
		Related posts
		Comment box
	ARCHIVE LAYOUT
		Archive title
		Archive breadcrumb
		Sidebar position
	QUICK TRANSLATION
-------------------------------------------------------------------- */

if (!class_exists('Alitheme_Customize')):
class Alitheme_Customize {	
	public static function register( $wp_customize ) {
        /* -------------------------------------------------------------------- */
        /* ADD SECTION
        /* -------------------------------------------------------------------- */
        $wp_customize->add_section(
					 'alith_general', array(
							 'title'    => esc_html__( 'Header & Footer', 'livemag' ),
							 'priority' => 10,
						 )
		);
        $wp_customize->add_section(
					 'alith_style', array(
							 'title'    => esc_html__( 'Color Setting', 'livemag' ),
							 'priority' => 11,
						 )
		);     
        $wp_customize->add_section(
					 'alith_social', array(
							 'title'    => esc_html__( 'Social Media', 'livemag' ),
							 'priority' => 13,
						 )
		);
        
        $wp_customize->add_section(
					 'alith_translation', array(
							 'title'    => esc_html__( 'Quick Translation', 'livemag' ),
							 'priority' => 14,
						 )
		);
        $wp_customize->add_panel( //add panel Layout
				'layout', 
				array(
					'priority'    => 12,
					'title'       => esc_html__('Layout Setting', 'livemag' )
				) 
			);
		$wp_customize->add_section(
				'alith_general_layout',
				array(
						'title' => esc_html__('General layout', 'livemag' ),
						'description' => esc_html__('General layout options', 'livemag' ),
						'priority' => 120,
						'panel'  => 'layout'						
				)
			);
		$wp_customize->add_section(
				'alith_homepage_layout',
				array(
						'title' => esc_html__('Homepage layout', 'livemag' ),
						'description' => esc_html__('Homepage layout options', 'livemag' ),
						'priority' => 120,
						'panel'  => 'layout'						
				)
			);
		$wp_customize->add_section(
				'alith_single_layout',
				array(
						'title' => esc_html__('Single post layout', 'livemag' ),
						'description' => esc_html__('Layout options for post', 'livemag' ),
						'priority' => 120,
						'panel'  => 'layout'						
				)
			);
		$wp_customize->add_section(
				'alith_archive_layout',
				array(
						'title' => esc_html__('Archive layout', 'livemag' ),
						'description' => esc_html__('Layout options for archive (categories, tags, search... )', 'livemag' ),
						'priority' => 121,
						'panel'  => 'layout'						
				)
			);
        /* -------------------------------------------------------------------- */
        /* GENERAL SETTING
        /* -------------------------------------------------------------------- */
		// Header style
			$wp_customize->add_setting(
				'alith_header_style', 
				array(
					'default'           => 'header_one',
					'sanitize_callback' => 'alith_sanitize_selectbox',					 
				)
			);
			$wp_customize->add_control(
				'alith_header_style', 
				array(
					 'label'    => esc_html__('Select Header Style', 'livemag' ),
					 'section'  => 'alith_general',
					 'settings' => 'alith_header_style',					 
					 'type'     => 'select',
					 'choices'  =>  array(
						 'header_one' 	=>  'Header one',
						 'header_two' 	=>  'Header two',			
						 'header_three'	=>  'Header three',		
					 ),
				)
			);
			// Widget header style
			$wp_customize->add_setting(
				'alith_widget_header_style', 
				array(
					'default'           => 'widget_header_one',
					'sanitize_callback' => 'alith_sanitize_selectbox',					 
				)
			);
			$wp_customize->add_control(
				'alith_widget_header_style', 
				array(
					 'label'    => esc_html__('Select Header Style', 'livemag' ),
					 'section'  => 'alith_general',
					 'settings' => 'alith_widget_header_style',					 
					 'type'     => 'select',
					 'choices'  =>  array(
						 'widget_header_one' 	=>  'Widget Header one',
						 'widget_header_two' 	=>  'Widget Header two',			
						 'widget_header_three'	=>  'Widget Header three',		
					 ),
				)
			);			
		
        // logo
        $wp_customize->add_setting(
			'alith_logo', array(
					'sanitize_callback' => 'alith_sanitize_image_upload',
			)
		);
        $wp_customize->add_control(
           new WP_Customize_Image_Control(
               $wp_customize,
               'logo',
               array(
                   'label'      => esc_html__( 'Upload a logo', 'livemag' ),
                   'section'    => 'alith_general',
                   'settings'   => 'alith_logo',
               )
           )
       );
        // logo retina
        $wp_customize->add_setting(
				'alith_logo_retina', array(
				'sanitize_callback' => 'alith_sanitize_image_upload',
			)
		);
        $wp_customize->add_control(
           new WP_Customize_Image_Control(
               $wp_customize,
               'logo_retina',
               array(
                   'label'      => esc_html__( 'Upload retina version of the logo', 'livemag' ),
                   'section'    => 'alith_general',
                   'settings'   => 'alith_logo_retina',
                   'description'=> esc_html__('2x times logo dimensions','livemag'), 
               )
           )
        );

        // Header social icons
		$wp_customize->add_setting(
					 'alith_disable_header_social', array(
							 'default'           => false,
							 'sanitize_callback' => 'alith_sanitize_checkbox',
						 )
		);
		$wp_customize->add_control(
					 'disable_header_social', array(
							 'label'    => esc_html__( 'Disable header social icons', 'livemag' ),
							 'settings' => 'alith_disable_header_social',
							 'section'  => 'alith_general',
							 'type'     => 'checkbox',
						 )
		);
        // Header search
		$wp_customize->add_setting(
					 'alith_disable_header_search', array(
							 'default'           => false,
							 'sanitize_callback' => 'alith_sanitize_checkbox',
						 )
		);
		$wp_customize->add_control(
					 'disable_header_search', array(
							 'label'    => esc_html__( 'Disable header search', 'livemag' ),
							 'settings' => 'alith_disable_header_search',
							 'section'  => 'alith_general',
							 'type'     => 'checkbox',
						 )
		);
		
		// Off canvas
		$wp_customize->add_setting(
					 'alith_disable_off_canvas', array(
							 'default'           => false,
							 'sanitize_callback' => 'alith_sanitize_checkbox',
						 )
		);
		$wp_customize->add_control(
					 'disable_off_canvas', array(
							 'label'    => esc_html__('Disable Off canvas', 'livemag' ),
							 'settings' => 'alith_disable_off_canvas',
							 'section'  => 'alith_general',
							 'type'     => 'checkbox',
						 )
		);
		
		// Back to top
		$wp_customize->add_setting(
					 'alith_disable_back_to_top', array(
							 'default'           => false,
							 'sanitize_callback' => 'alith_sanitize_checkbox',
						 )
		);
		$wp_customize->add_control(
					 'disable_toggle_back_to_top', array(
							 'label'    => esc_html__('Disable BackToTop button', 'livemag' ),
							 'settings' => 'alith_disable_back_to_top',
							 'section'  => 'alith_general',
							 'type'     => 'checkbox',
						 )
		);
        
              
        // Copyright text
        $wp_customize->add_setting(
                     'alith_copyright', array(
                            'default'           => esc_html__('Copyright by Alithemes.com', 'livemag' ),
							'sanitize_callback' => 'alith_sanitize_textbox'
                        )
        );
        $wp_customize->add_control(
                     'copyright', array(
                             'label'    => esc_html__( 'Copyright text', 'livemag' ),
                             'settings' => 'alith_copyright',
                             'section'  => 'alith_general',
                             'type'     => 'textarea',
                         )
        );
        /* -------------------------------------------------------------------- */
        /* STYLE
        /* -------------------------------------------------------------------- */
		// Container width
		$wp_customize->add_setting(
					 'alith_content_width', array(
							 'default'           => '',
							 'sanitize_callback' => 'alith_sanitize_textbox'
						 )
		);
		$wp_customize->add_control(
					 'content_width', array(
							 'label'    => 'Container width (px)',
							 'settings' => 'alith_content_width',
							 'section'  => 'alith_general_layout',
							 'type'     => 'number',
                             'description'   => 'Enter a number.',
						 )
		);
		
		// Boxed layout
		$wp_customize->add_setting(
					 'alith_boxed_layout', array(
							 'default'           => false,
							 'sanitize_callback' => 'alith_sanitize_checkbox',
						 )
		);
		$wp_customize->add_control(
					 'alith_boxed_layout', array(
							 'label'    => esc_html__('Boxed layout?', 'livemag' ),
							 'settings' => 'alith_boxed_layout',
							 'section'  => 'alith_general_layout',
							 'type'     => 'checkbox',
						 )
		);

		//Color
		$colors = array();
        $colors[] = array(
			'slug'    => 'body_background',
			'default' => '#ffffff',
			'label'   => esc_html__( 'Body background', 'livemag' )
		);
        $colors[] = array(
			'slug'    => 'primary_color',
			'default' => '#2855a6',
			'label'   => esc_html__( 'Primary color', 'livemag' )
		);		
		$colors[] = array(
			'slug'    => 'main_nav_background',
			'default' => '#2855a6',
			'label'   => esc_html__( 'Main navigation background', 'livemag' )
		);		
		$colors[] = array(
			'slug'    => 'main_nav_text_color',
			'default' => '#ffffff',
			'label'   => esc_html__( 'Main navigation text color', 'livemag' )
		);		
		$colors[] = array(
			'slug'    => 'topbar_background',
			'default' => '#232323',
			'label'   => esc_html__( 'Top bar  background', 'livemag' )
		);		
		$colors[] = array(
			'slug'    => 'topbar_text_color',
			'default' => '#ffffff',
			'label'   => esc_html__( 'Top bar text color', 'livemag' )
		);		
		$colors[] = array(
			'slug'    => 'header_background',
			'default' => '#ffffff',
			'label'   => esc_html__( 'Header background', 'livemag' )
		);
		$colors[] = array(
			'slug'    => 'text_color',
			'default' => '#111111',
			'label'   => esc_html__( 'Text color', 'livemag' )
		);        
		$colors[] = array(
			'slug'    => 'link_color',
			'default' => '#2855a6',
			'label'   => esc_html__( 'Link color', 'livemag' )
		);
		$colors[] = array(
			'slug'    => 'link_hover_color',
			'default' => '#2855a6',
			'label'   => esc_html__( 'Link Hover color', 'livemag' )
		);
		$colors[] = array(
			'slug'    => 'widget_title_color',
			'default' => '#000000',
			'label'   => esc_html__( 'Widget title color', 'livemag' )
		);		
		$colors[] = array(
			'slug'    => 'bottom_background',
			'default' => '#161616',
			'label'   => esc_html__( 'Bottom background', 'livemag' )
		);
		$colors[] = array(
			'slug'    => 'bottom_link_color',
			'default' => '#ffffff',
			'label'   => esc_html__( 'Bottom link color', 'livemag' )
		);
		$colors[] = array(
			'slug'    => 'bottom_text_color',
			'default' => '#999999',
			'label'   => esc_html__( 'Bottom text color', 'livemag' )
		);
		$colors[] = array(
			'slug'    => 'footer_background',
			'default' => '#101010',
			'label'   => esc_html__( 'Footer background', 'livemag' )
		);	
		$colors[] = array(
			'slug'    => 'footer_color',
			'default' => '#999999',
			'label'   => esc_html__( 'Footer text color', 'livemag' )
		);		
		$colors[] = array(
			'slug'    => 'off_canvas_background',
			'default' => '#f1f1f1',
			'label'   => esc_html__( 'Off canvas background', 'livemag' )
		);
		foreach ( $colors as $color ) {
			// SETTINGS
			$wp_customize->add_setting(
						 'alith_' . $color['slug'], array(
								'default'    => $color['default'],
								'type'       => 'theme_mod',
								'capability' =>
								'edit_theme_options',
								'sanitize_callback' => 'sanitize_hex_color'
							 )
			);
			// CONTROLS
			$wp_customize->add_control(
						 new WP_Customize_Color_Control(
							 $wp_customize,
							 $color['slug'],
							 array(
								 'label'    => $color['label'],
								 'section'  => 'alith_style',
								 'settings' => 'alith_' . $color['slug']
							 )
						 )
			);
		}
        
        /* -------------------------------------------------------------------- */
        /* SOCIAL ICONS
        /* -------------------------------------------------------------------- */
        $social_arr = alith_social_array();
        foreach ($social_arr as $s => $c):
            // Social icon
            $wp_customize->add_setting(
                         'alith_social_'.$s, array(
                                 'default'           => '',
                                 'sanitize_callback' => 'sanitize_text_field',
                             )
            );
            $wp_customize->add_control(
                         'social'.$s, array(
                                 'label'    => $c,
                                 'settings' => 'alith_social_'.$s,
                                 'section'  => 'alith_social',
                                 'type'     => 'text',
                             )
            );
        endforeach;
		/* -------------------------------------------------------------------- */
        /* HOMEPAGE LAYOUT
        /* -------------------------------------------------------------------- */
		// Homepage layout option
			$wp_customize->add_setting(
				'alith_homepage_style', 
				array(
					'default'           => 'homepage_three_columns',
					'sanitize_callback' => 'alith_sanitize_selectbox',					 
				)
			);
			$wp_customize->add_control(
				'alith_homepage_style', 
				array(
					 'label'    => esc_html__('Select Homepage Style', 'livemag' ),
					 'section'  => 'alith_homepage_layout',
					 'settings' => 'alith_homepage_style',					 
					 'type'     => 'select',
					 'choices'  =>  array(
						 'homepage_three_columns' 	=>  'Home 2 sidebar',
						 'homepage_two_columns' 	=>  'Home 1 sidebar',		
						 'homepage_center_content' 	=>  'Home center content',		
					 ),
				)
			);
		// Home content styles
			$wp_customize->add_setting(
				'alith_home_content_style', 
				array(
					'default'           => 'home_content_big_thumb',
					'sanitize_callback' => 'alith_sanitize_selectbox',					 
				)
			);
			$wp_customize->add_control(
				'alith_home_content_style', 
				array(
					 'label'    => esc_html__('Select Home Content Style', 'livemag' ),
					 'section'  => 'alith_homepage_layout',
					 'settings' => 'alith_home_content_style',					 
					 'type'     => 'select',
					 'choices'  =>  array(
						 'home_content_big_thumb' 	=>  'Big thumbnail',
						 'home_content_small_thumb' 	=>  'Small thumbnail',		
					 ),
				)
			);
		// Disable latest posts
			$wp_customize->add_setting(
				'alith_disable_latest_posts', 
				array(
					 'default'           => false,
					 'sanitize_callback' => 'alith_sanitize_checkbox',
				)
			);
			$wp_customize->add_control(
				'alith_disable_latest_posts', 
				array(
					 'label'    => esc_html__('Disable Latest Posts', 'livemag' ),
					 'section'  => 'alith_homepage_layout',
					 'settings' => 'alith_disable_latest_posts',					 
					 'type'     => 'checkbox',
				)
			);
		/* -------------------------------------------------------------------- */
        /* SINGLE POST LAYOUT
        /* -------------------------------------------------------------------- */
		// Disable Breadcrumb
			$wp_customize->add_setting(
				'alith_disable_breadcrumb', 
				array(
					 'default'           => false,
					 'sanitize_callback' => 'alith_sanitize_checkbox',
				)
			);
			$wp_customize->add_control(
				'alith_disable_breadcrumb', 
				array(
					 'label'    => esc_html__('Disable Breadcumb', 'livemag' ),
					 'section'  => 'alith_single_layout',
					 'settings' => 'alith_disable_breadcrumb',					 
					 'type'     => 'checkbox',
				)
			);
		// Disable Metabox
			$wp_customize->add_setting(
				'alith_disable_metabox', 
				array(
					 'default'           => false,
					 'sanitize_callback' => 'alith_sanitize_checkbox',
				)
			);
			$wp_customize->add_control(
				'alith_disable_metabox', 
				array(
					 'label'    => esc_html__('Disable metabox', 'livemag' ),
					 'section'  => 'alith_single_layout',
					 'settings' => 'alith_disable_metabox',					 
					 'type'     => 'checkbox',
				)
			);
		// Disable share
			$wp_customize->add_setting(
				'alith_disable_share', 
				array(
					 'default'           => false,
					 'sanitize_callback' => 'alith_sanitize_checkbox',
				)
			);
			$wp_customize->add_control(
				'alith_disable_share', 
				array(
					 'label'    => esc_html__('Disable share button', 'livemag' ),
					 'section'  => 'alith_single_layout',
					 'settings' => 'alith_disable_share',					 
					 'type'     => 'checkbox',
				)
			);
		// Disable navigation
			$wp_customize->add_setting(
				'alith_disable_navigation', 
				array(
					 'default'           => false,
					 'sanitize_callback' => 'alith_sanitize_checkbox',
				)
			);
			$wp_customize->add_control(
				'alith_disable_navigation', 
				array(
					 'label'    => esc_html__('Disable navigation', 'livemag' ),
					 'section'  => 'alith_single_layout',
					 'settings' => 'alith_disable_navigation',					 
					 'type'     => 'checkbox',
				)
			);
		// Disable author info box
			$wp_customize->add_setting(
				'alith_disable_author_info', 
				array(
					 'default'           => false,
					 'sanitize_callback' => 'alith_sanitize_checkbox',
				)
			);
			$wp_customize->add_control(
				'alith_disable_author_info', 
				array(
					 'label'    => esc_html__('Disable author infor', 'livemag' ),
					 'section'  => 'alith_single_layout',
					 'settings' => 'alith_disable_author_info',					 
					 'type'     => 'checkbox',
				)
			); 
		// Disable related posts
			$wp_customize->add_setting(
				'alith_disable_related_posts', 
				array(
					 'default'           => false,
					 'sanitize_callback' => 'alith_sanitize_checkbox',
				)
			);
			$wp_customize->add_control(
				'alith_disable_related_posts', 
				array(
					 'label'    => esc_html__('Disable related posts', 'livemag' ),
					 'section'  => 'alith_single_layout',
					 'settings' => 'alith_disable_related_posts',					 
					 'type'     => 'checkbox',
				)
			);
		// Disable comment box
			$wp_customize->add_setting(
				'alith_disable_comment_box', 
				array(
					 'default'           => false,
					 'sanitize_callback' => 'alith_sanitize_checkbox',
				)
			);
			$wp_customize->add_control(
				'alith_disable_comment_box', 
				array(
					 'label'    => esc_html__('Disable comment box', 'livemag' ),
					 'section'  => 'alith_single_layout',
					 'settings' => 'alith_disable_comment_box',					 
					 'type'     => 'checkbox',
				)
			);
		/* -------------------------------------------------------------------- */
        /* ARCHIVE LAYOUT
        /* -------------------------------------------------------------------- */
		// archive title
			$wp_customize->add_setting(
				'alith_disable_archive_title', 
				array(
					 'default'           => false,
					 'sanitize_callback' => 'alith_sanitize_checkbox',
				)
			);
			$wp_customize->add_control(
				'alith_disable_archive_title', 
				array(
					 'label'    => esc_html__('Disable archive title', 'livemag' ),
					 'section'  => 'alith_archive_layout',
					 'settings' => 'alith_disable_archive_title',					 
					 'type'     => 'checkbox',
				)
			);	
			
		// archive breadcrumb
			$wp_customize->add_setting(
				'alith_disable_archive_breadcrumb', 
				array(
					 'default'           => false,
					 'sanitize_callback' => 'alith_sanitize_checkbox',
				)
			);
			$wp_customize->add_control(
				'alith_disable_archive_breadcrumb', 
				array(
					 'label'    => esc_html__('Disable archive breadcrumb', 'livemag' ),
					 'section'  => 'alith_archive_layout',
					 'settings' => 'alith_disable_archive_breadcrumb',					 
					 'type'     => 'checkbox',
				)
			);		
		// sidebar position
			$wp_customize->add_setting(
				'alith_archive_sidebar_position', 
				array(
					'default'           => 'one_sidebar_right',
					'sanitize_callback' => 'alith_sanitize_selectbox',					 
				)
			);
			$wp_customize->add_control(
				'alith_archive_sidebar_position', 
				array(
					 'label'    => esc_html__('Select layout', 'livemag' ),
					 'section'  => 'alith_archive_layout',
					 'settings' => 'alith_archive_sidebar_position',					 
					 'type'     => 'select',
					 'choices'  =>  array(
						 'one_sidebar_right' 	=>  'One Sidebar Right',
						 'one_sidebar_left' 	=>  'One Sidebar Left',			
						 'two_sidebar_right'	=>  'Two Sidebar Right',			
						 'two_sidebar_left' 	=>  'Two Sidebar Left',			
						 'center_content'		=>  'Content center',			
					 ),
				)
			);	
			// Archive content styles
			$wp_customize->add_setting(
				'alith_archive_content_style', 
				array(
					'default'           => 'archive_content_big_thumb',
					'sanitize_callback' => 'alith_sanitize_selectbox',					 
				)
			);
			$wp_customize->add_control(
				'alith_archive_content_style', 
				array(
					 'label'    => esc_html__('Select Content Style', 'livemag' ),
					 'section'  => 'alith_archive_layout',
					 'settings' => 'alith_archive_content_style',					 
					 'type'     => 'select',
					 'choices'  =>  array(
						 'archive_content_big_thumb' 	=>  'Big thumbnail',
						 'archive_content_small_thumb' 	=>  'Small thumbnail',		
					 ),
				)
			);
		
		
        /* -------------------------------------------------------------------- */
        /* QUICK TRANSLATION
        /* -------------------------------------------------------------------- */
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
        // Quick Translation
        foreach ($options as $k => $v) {
            $wp_customize->add_setting(
                         'alith_translate_'.$k, array('sanitize_callback' => 'sanitize_text_field')
            );
            $wp_customize->add_control(
                         'translate_'.$k, array(
                                 'label'    => sprintf('Translation for "%s"',$v),
                                 'settings' => 'alith_translate_'.$k,
                                 'section'  => 'alith_translation',
                                 'type'     => 'text',
                             )
            );
        }
	} // end function customize	
}
endif; // class_exists
/**
 * Callback function for sanitizing checkbox settings.
 * Used by Alitheme_Customize
 * @param $input
 * @return int|string
 */
function alith_sanitize_checkbox( $input ) {
	if ( $input == 1 ) {
		return 1;
	} else {
		return $input;
	}
}
function alith_sanitize_selectbox( $input ) {
	return $input;
}
function alith_sanitize_textbox( $input ) {
	return $input;
}
function alith_sanitize_image_upload( $image, $setting ) {
	/*
	 * Array of valid image file types.
	 *
	 * The array includes image mime types that are included in wp_get_mime_types()
	 */
    $mimes = array(
        'jpg|jpeg|jpe' => 'image/jpeg',
        'gif'          => 'image/gif',
        'png'          => 'image/png',
        'bmp'          => 'image/bmp',
        'tif|tiff'     => 'image/tiff',
        'ico'          => 'image/x-icon'
    );
	// Return an array with file extension and mime_type.
    $file = wp_check_filetype( $image, $mimes );
	// If $image has a valid mime_type, return it; otherwise, return the default.
    return ( $file['ext'] ? $image : $setting->default );
}
/**
 * Callback function for sanitizing select menu for Excerpt Options.
 * Used by Alitheme_Customize
 * @param $input
 * @return string
 */
function alith_sanitize_select_excerpt_options( $input ) {
	$valid = array( '0' => 'Disabled',
					'1' => 'Enabled', );
	if ( array_key_exists( $input, $valid ) ) {
		return $input;
	} else {
		return '';
	}
}

// Setup the Theme Customizer settings and controls...
add_action( 'customize_register', array( 'Alitheme_Customize', 'register' ) );