<?php
/**
 * Boxing Martial Arts: Customizer
 *
 * @package Boxing Martial Arts
 * @subpackage boxing_martial_arts
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function boxing_martial_arts_customize_register( $wp_customize ) {

	require get_parent_theme_file_path('/inc/controls/icon-changer.php');

	require get_parent_theme_file_path('/inc/controls/range-slider-control.php');

	// Register the custom control type.
	$wp_customize->register_control_type( 'Boxing_Martial_Arts_Toggle_Control' );

	//Register the sortable control type.
	$wp_customize->register_control_type( 'Boxing_Martial_Arts_Control_Sortable' );	

	//add home page setting pannel
	$wp_customize->add_panel( 'boxing_martial_arts_panel_id', array(
	    'priority' => 10,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => __( 'Custom Home page', 'boxing-martial-arts' ),
	    'description' => __( 'Description of what this panel does.', 'boxing-martial-arts' ),
	) );

	//TP Genral Option
	$wp_customize->add_section('boxing_martial_arts_tp_general_settings',array(
        'title' => __('TP General Option', 'boxing-martial-arts'),
        'priority' => 1,
        'panel' => 'boxing_martial_arts_panel_id'
    ) );
 	$wp_customize->add_setting('boxing_martial_arts_tp_body_layout_settings',array(
		'default' => 'Full',
		'sanitize_callback' => 'boxing_martial_arts_sanitize_choices'
	));
 	$wp_customize->add_control('boxing_martial_arts_tp_body_layout_settings',array(
		'type' => 'radio',
		'label'     => __('Body Layout Setting', 'boxing-martial-arts'),
		'description'   => __('This option work for complete body, if you want to set the complete website in container.', 'boxing-martial-arts'),
		'section' => 'boxing_martial_arts_tp_general_settings',
		'choices' => array(
		'Full' => __('Full','boxing-martial-arts'),
		'Container' => __('Container','boxing-martial-arts'),
		'Container Fluid' => __('Container Fluid','boxing-martial-arts')
		),
	) );

    // Add Settings and Controls for Post Layout
	$wp_customize->add_setting('boxing_martial_arts_sidebar_post_layout',array(
     'default' => 'right',
     'sanitize_callback' => 'boxing_martial_arts_sanitize_choices'
	));
	$wp_customize->add_control('boxing_martial_arts_sidebar_post_layout',array(
     'type' => 'radio',
     'label'     => __('Post Sidebar Position', 'boxing-martial-arts'),
     'description'   => __('This option work for blog page, blog single page, archive page and search page.', 'boxing-martial-arts'),
     'section' => 'boxing_martial_arts_tp_general_settings',
     'choices' => array(
         'full' => __('Full','boxing-martial-arts'),
         'left' => __('Left','boxing-martial-arts'),
         'right' => __('Right','boxing-martial-arts'),
         'three-column' => __('Three Columns','boxing-martial-arts'),
         'four-column' => __('Four Columns','boxing-martial-arts'),
         'grid' => __('Grid Layout','boxing-martial-arts')
     ),
	) );

	// Add Settings and Controls for single post sidebar Layout
	$wp_customize->add_setting('boxing_martial_arts_sidebar_single_post_layout',array(
        'default' => 'right',
        'sanitize_callback' => 'boxing_martial_arts_sanitize_choices'
	));
	$wp_customize->add_control('boxing_martial_arts_sidebar_single_post_layout',array(
        'type' => 'radio',
        'label'     => __('Single Post Sidebar Position', 'boxing-martial-arts'),
        'description'   => __('This option work for single blog page', 'boxing-martial-arts'),
        'section' => 'boxing_martial_arts_tp_general_settings',
        'choices' => array(
            'full' => __('Full','boxing-martial-arts'),
            'left' => __('Left','boxing-martial-arts'),
            'right' => __('Right','boxing-martial-arts'),
        ),
	) );

	// Add Settings and Controls for Page Layout
	$wp_customize->add_setting('boxing_martial_arts_sidebar_page_layout',array(
     'default' => 'right',
     'sanitize_callback' => 'boxing_martial_arts_sanitize_choices'
	));
	$wp_customize->add_control('boxing_martial_arts_sidebar_page_layout',array(
     'type' => 'radio',
     'label'     => __('Page Sidebar Position', 'boxing-martial-arts'),
     'description'   => __('This option work for pages.', 'boxing-martial-arts'),
     'section' => 'boxing_martial_arts_tp_general_settings',
     'choices' => array(
         'full' => __('Full','boxing-martial-arts'),
         'left' => __('Left','boxing-martial-arts'),
         'right' => __('Right','boxing-martial-arts')
     ),
	) );
    $wp_customize->add_setting( 'boxing_martial_arts_sticky', array(
		'default'           => false,
		'transport'         => 'refresh',
		'sanitize_callback' => 'boxing_martial_arts_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Boxing_Martial_Arts_Toggle_Control( $wp_customize, 'boxing_martial_arts_sticky', array(
		'label'       => esc_html__( 'Show / Hide Sticky Header', 'boxing-martial-arts' ),
		'section'     => 'boxing_martial_arts_tp_general_settings',
		'type'        => 'toggle',
		'settings'    => 'boxing_martial_arts_sticky',
	) ) );
	//tp typography option
	$boxing_martial_arts_font_array = array(
		''                       => 'No Fonts',
		'Abril Fatface'          => 'Abril Fatface',
		'Acme'                   => 'Acme',
		'Anton'                  => 'Anton',
		'Architects Daughter'    => 'Architects Daughter',
		'Arimo'                  => 'Arimo',
		'Arsenal'                => 'Arsenal',
		'Arvo'                   => 'Arvo',
		'Alegreya'               => 'Alegreya',
		'Alfa Slab One'          => 'Alfa Slab One',
		'Averia Serif Libre'     => 'Averia Serif Libre',
		'Bangers'                => 'Bangers',
		'Boogaloo'               => 'Boogaloo',
		'Bad Script'             => 'Bad Script',
		'Bitter'                 => 'Bitter',
		'Bree Serif'             => 'Bree Serif',
		'BenchNine'              => 'BenchNine',
		'Cabin'                  => 'Cabin',
		'Cardo'                  => 'Cardo',
		'Courgette'              => 'Courgette',
		'Cherry Swash'           => 'Cherry Swash',
		'Cormorant Garamond'     => 'Cormorant Garamond',
		'Crimson Text'           => 'Crimson Text',
		'Cuprum'                 => 'Cuprum',
		'Cookie'                 => 'Cookie',
		'Chewy'                  => 'Chewy',
		'Days One'               => 'Days One',
		'Dosis'                  => 'Dosis',
		'Droid Sans'             => 'Droid Sans',
		'Economica'              => 'Economica',
		'Fredoka One'            => 'Fredoka One',
		'Fjalla One'             => 'Fjalla One',
		'Francois One'           => 'Francois One',
		'Frank Ruhl Libre'       => 'Frank Ruhl Libre',
		'Gloria Hallelujah'      => 'Gloria Hallelujah',
		'Great Vibes'            => 'Great Vibes',
		'Handlee'                => 'Handlee',
		'Hammersmith One'        => 'Hammersmith One',
		'Inconsolata'            => 'Inconsolata',
		'Indie Flower'           => 'Indie Flower',
		'IM Fell English SC'     => 'IM Fell English SC',
		'Julius Sans One'        => 'Julius Sans One',
		'Josefin Slab'           => 'Josefin Slab',
		'Josefin Sans'           => 'Josefin Sans',
		'Kanit'                  => 'Kanit',
		'Lobster'                => 'Lobster',
		'Lato'                   => 'Lato',
		'Lora'                   => 'Lora',
		'Libre Baskerville'      => 'Libre Baskerville',
		'Lobster Two'            => 'Lobster Two',
		'Merriweather'           => 'Merriweather',
		'Monda'                  => 'Monda',
		'Montserrat'             => 'Montserrat',
		'Muli'                   => 'Muli',
		'Marck Script'           => 'Marck Script',
		'Noto Serif'             => 'Noto Serif',
		'Open Sans'              => 'Open Sans',
		'Overpass'               => 'Overpass',
		'Overpass Mono'          => 'Overpass Mono',
		'Oxygen'                 => 'Oxygen',
		'Orbitron'               => 'Orbitron',
		'Patua One'              => 'Patua One',
		'Pacifico'               => 'Pacifico',
		'Padauk'                 => 'Padauk',
		'Playball'               => 'Playball',
		'Playfair Display'       => 'Playfair Display',
		'PT Sans'                => 'PT Sans',
		'Philosopher'            => 'Philosopher',
		'Permanent Marker'       => 'Permanent Marker',
		'Poiret One'             => 'Poiret One',
		'Quicksand'              => 'Quicksand',
		'Quattrocento Sans'      => 'Quattrocento Sans',
		'Raleway'                => 'Raleway',
		'Rubik'                  => 'Rubik',
		'Rokkitt'                => 'Rokkitt',
		'Russo One'              => 'Russo One',
		'Righteous'              => 'Righteous',
		'Slabo'                  => 'Slabo',
		'Source Sans Pro'        => 'Source Sans Pro',
		'Shadows Into Light Two' => 'Shadows Into Light Two',
		'Shadows Into Light'     => 'Shadows Into Light',
		'Sacramento'             => 'Sacramento',
		'Shrikhand'              => 'Shrikhand',
		'Tangerine'              => 'Tangerine',
		'Ubuntu'                 => 'Ubuntu',
		'VT323'                  => 'VT323',
		'Varela Round'           => 'Varela Round',
		'Vampiro One'            => 'Vampiro One',
		'Vollkorn'               => 'Vollkorn',
		'Volkhov'                => 'Volkhov',
		'Yanone Kaffeesatz'      => 'Yanone Kaffeesatz'
	);

	$wp_customize->add_section('boxing_martial_arts_typography_option',array(
		'title'         => __('TP Typography Option', 'boxing-martial-arts'),
		'priority' => 1,
		'panel' => 'boxing_martial_arts_panel_id'
   	));

   	$wp_customize->add_setting('boxing_martial_arts_heading_font_family', array(
		'default'           => '',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'boxing_martial_arts_sanitize_choices',
	));
	$wp_customize->add_control(	'boxing_martial_arts_heading_font_family', array(
		'section' => 'boxing_martial_arts_typography_option',
		'label'   => __('heading Fonts', 'boxing-martial-arts'),
		'type'    => 'select',
		'choices' => $boxing_martial_arts_font_array,
	));

	$wp_customize->add_setting('boxing_martial_arts_body_font_family', array(
		'default'           => '',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'boxing_martial_arts_sanitize_choices',
	));
	$wp_customize->add_control(	'boxing_martial_arts_body_font_family', array(
		'section' => 'boxing_martial_arts_typography_option',
		'label'   => __('Body Fonts', 'boxing-martial-arts'),
		'type'    => 'select',
		'choices' => $boxing_martial_arts_font_array,
	));

	//TP Preloader Option
	$wp_customize->add_section('boxing_martial_arts_prelaoder_option',array(
		'title'         => __('TP Preloader Option', 'boxing-martial-arts'),
		'priority' => 1,
		'panel' => 'boxing_martial_arts_panel_id'
	) );
	$wp_customize->add_setting( 'boxing_martial_arts_preloader_show_hide', array(
		'default'           => false,
		'transport'         => 'refresh',
		'sanitize_callback' => 'boxing_martial_arts_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Boxing_Martial_Arts_Toggle_Control( $wp_customize, 'boxing_martial_arts_preloader_show_hide', array(
		'label'       => esc_html__( 'Show / Hide Preloader Option', 'boxing-martial-arts' ),
		'section'     => 'boxing_martial_arts_prelaoder_option',
		'type'        => 'toggle',
		'settings'    => 'boxing_martial_arts_preloader_show_hide',
	) ) );
	$wp_customize->add_setting( 'boxing_martial_arts_tp_preloader_color1_option', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'boxing_martial_arts_tp_preloader_color1_option', array(
			'label'     => __('Preloader First Ring Color', 'boxing-martial-arts'),
	    'description' => __('It will change the complete theme preloader ring 1 color in one click.', 'boxing-martial-arts'),
	    'section' => 'boxing_martial_arts_prelaoder_option',
	    'settings' => 'boxing_martial_arts_tp_preloader_color1_option',
  	)));
  	$wp_customize->add_setting( 'boxing_martial_arts_tp_preloader_color2_option', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'boxing_martial_arts_tp_preloader_color2_option', array(
			'label'     => __('Preloader Second Ring Color', 'boxing-martial-arts'),
	    'description' => __('It will change the complete theme preloader ring 2 color in one click.', 'boxing-martial-arts'),
	    'section' => 'boxing_martial_arts_prelaoder_option',
	    'settings' => 'boxing_martial_arts_tp_preloader_color2_option',
  	)));
  	$wp_customize->add_setting( 'boxing_martial_arts_tp_preloader_bg_color_option', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'boxing_martial_arts_tp_preloader_bg_color_option', array(
			'label'     => __('Preloader Background Color', 'boxing-martial-arts'),
	    'description' => __('It will change the complete theme preloader bg color in one click.', 'boxing-martial-arts'),
	    'section' => 'boxing_martial_arts_prelaoder_option',
	    'settings' => 'boxing_martial_arts_tp_preloader_bg_color_option',
  	)));

  	//TP Color Option
	$wp_customize->add_section('boxing_martial_arts_color_option',array(
     'title'         => __('TP Color Option', 'boxing-martial-arts'),
     'panel' => 'boxing_martial_arts_panel_id',
     'priority' => 1,
    ) );
	$wp_customize->add_setting( 'boxing_martial_arts_tp_color_option', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'boxing_martial_arts_tp_color_option', array(
			'label'     => __('Theme Color', 'boxing-martial-arts'),
	    'description' => __('It will change the complete theme color in one click.', 'boxing-martial-arts'),
	    'section' => 'boxing_martial_arts_color_option',
	    'settings' => 'boxing_martial_arts_tp_color_option',
  	)));

	//TP Blog Option
	$wp_customize->add_section('boxing_martial_arts_blog_option',array(
		'title' => __('TP Blog Option', 'boxing-martial-arts'),
		'priority' => 1,
		'panel' => 'boxing_martial_arts_panel_id'
	) );
	$wp_customize->add_setting('blog_meta_order', array(
        'default' => array('date', 'author', 'comment', 'category'),
        'sanitize_callback' => 'boxing_martial_arts_sanitize_sortable',
    ));
    $wp_customize->add_control(new Boxing_Martial_Arts_Control_Sortable($wp_customize, 'blog_meta_order', array(
    	'label' => esc_html__('Meta Order', 'boxing-martial-arts'),
        'description' => __('Drag & Drop post items to re-arrange the order and also hide and show items as per the need by clicking on the eye icon.', 'boxing-martial-arts') ,
        'section' => 'boxing_martial_arts_blog_option',
        'choices' => array(
            'date' => __('date', 'boxing-martial-arts') ,
            'author' => __('author', 'boxing-martial-arts') ,
            'comment' => __('comment', 'boxing-martial-arts') ,
            'category' => __('category', 'boxing-martial-arts') ,
        ) ,
    )));
    $wp_customize->add_setting( 'boxing_martial_arts_excerpt_count', array(
		'default'              => 35,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'boxing_martial_arts_sanitize_number_range',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'boxing_martial_arts_excerpt_count', array(
		'label'       => esc_html__( 'Edit Excerpt Limit','boxing-martial-arts' ),
		'section'     => 'boxing_martial_arts_blog_option',
		'type'        => 'number',
		'input_attrs' => array(
			'step'             => 2,
			'min'              => 0,
			'max'              => 50,
		),
	) );
	$wp_customize->add_setting('boxing_martial_arts_read_more_text',array(
		'default'=> __('Read More','boxing-martial-arts'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('boxing_martial_arts_read_more_text',array(
		'label'	=> __('Edit Button Text','boxing-martial-arts'),
		'section'=> 'boxing_martial_arts_blog_option',
		'type'=> 'text'
	));

	$wp_customize->add_setting('boxing_martial_arts_post_image_round', array(
	  'default' => '0',
      'sanitize_callback' => 'boxing_martial_arts_sanitize_number_range',
	));
	$wp_customize->add_control(new boxing_martial_arts_Range_Slider($wp_customize, 'boxing_martial_arts_post_image_round', array(
       'section' => 'boxing_martial_arts_blog_option',
      'label' => esc_html__('Edit Post Image Border Radius', 'boxing-martial-arts'),
      'input_attrs' => array(
        'min' => 0,
        'max' => 180,
        'step' => 1
    )
	)));

	$wp_customize->add_setting('boxing_martial_arts_post_image_width', array(
	  'default' => '',
      'sanitize_callback' => 'boxing_martial_arts_sanitize_number_range',
	));
	$wp_customize->add_control(new boxing_martial_arts_Range_Slider($wp_customize, 'boxing_martial_arts_post_image_width', array(
       'section' => 'boxing_martial_arts_blog_option',
      'label' => esc_html__('Edit Post Image Width', 'boxing-martial-arts'),
      'input_attrs' => array(
        'min' => 0,
        'max' => 367,
        'step' => 1
    )
	)));

	$wp_customize->add_setting('boxing_martial_arts_post_image_length', array(
	  'default' => '',
      'sanitize_callback' => 'boxing_martial_arts_sanitize_number_range',
	));
	$wp_customize->add_control(new boxing_martial_arts_Range_Slider($wp_customize, 'boxing_martial_arts_post_image_length', array(
       'section' => 'boxing_martial_arts_blog_option',
      'label' => esc_html__('Edit Post Image height', 'boxing-martial-arts'),
      'input_attrs' => array(
        'min' => 0,
        'max' => 900,
        'step' => 1
    )
	)));
	
	$wp_customize->add_setting( 'boxing_martial_arts_remove_read_button', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'boxing_martial_arts_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Boxing_Martial_Arts_Toggle_Control( $wp_customize, 'boxing_martial_arts_remove_read_button', array(
		'label'       => esc_html__( 'Show / Hide Read More Button', 'boxing-martial-arts' ),
		'section'     => 'boxing_martial_arts_blog_option',
		'type'        => 'toggle',
		'settings'    => 'boxing_martial_arts_remove_read_button',
	) ) );
    $wp_customize->selective_refresh->add_partial( 'boxing_martial_arts_remove_read_button', array(
		'selector' => '.readmore-btn',
		'render_callback' => 'boxing_martial_arts_customize_partial_boxing_martial_arts_remove_read_button',
	 ));

	 $wp_customize->add_setting( 'boxing_martial_arts_remove_tags', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'boxing_martial_arts_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Boxing_Martial_Arts_Toggle_Control( $wp_customize, 'boxing_martial_arts_remove_tags', array(
		'label'       => esc_html__( 'Show / Hide Tags Option', 'boxing-martial-arts' ),
		'section'     => 'boxing_martial_arts_blog_option',
		'type'        => 'toggle',
		'settings'    => 'boxing_martial_arts_remove_tags',
	) ) );
    $wp_customize->selective_refresh->add_partial( 'boxing_martial_arts_remove_tags', array(
		'selector' => '.box-content a[rel="tag"]',
		'render_callback' => 'boxing_martial_arts_customize_partial_boxing_martial_arts_remove_tags',
	));
	$wp_customize->add_setting( 'boxing_martial_arts_remove_category', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'boxing_martial_arts_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Boxing_Martial_Arts_Toggle_Control( $wp_customize, 'boxing_martial_arts_remove_category', array(
		'label'       => esc_html__( 'Show / Hide Category Option', 'boxing-martial-arts' ),
		'section'     => 'boxing_martial_arts_blog_option',
		'type'        => 'toggle',
		'settings'    => 'boxing_martial_arts_remove_category',
	) ) );
    $wp_customize->selective_refresh->add_partial( 'boxing_martial_arts_remove_category', array(
		'selector' => '.box-content a[rel="category"]',
		'render_callback' => 'boxing_martial_arts_customize_partial_boxing_martial_arts_remove_category',
	));
	$wp_customize->add_setting( 'boxing_martial_arts_remove_comment', array(
	 'default'           => true,
	 'transport'         => 'refresh',
	 'sanitize_callback' => 'boxing_martial_arts_sanitize_checkbox',
 	) );

	$wp_customize->add_control( new Boxing_Martial_Arts_Toggle_Control( $wp_customize, 'boxing_martial_arts_remove_comment', array(
	 'label'       => esc_html__( 'Show / Hide Comment Form', 'boxing-martial-arts' ),
	 'section'     => 'boxing_martial_arts_blog_option',
	 'type'        => 'toggle',
	 'settings'    => 'boxing_martial_arts_remove_comment',
	) ) );

	$wp_customize->add_setting( 'boxing_martial_arts_remove_related_post', array(
	 'default'           => true,
	 'transport'         => 'refresh',
	 'sanitize_callback' => 'boxing_martial_arts_sanitize_checkbox',
 	) );

	$wp_customize->add_control( new Boxing_Martial_Arts_Toggle_Control( $wp_customize, 'boxing_martial_arts_remove_related_post', array(
	 'label'       => esc_html__( 'Show / Hide Related Post', 'boxing-martial-arts' ),
	 'section'     => 'boxing_martial_arts_blog_option',
	 'type'        => 'toggle',
	 'settings'    => 'boxing_martial_arts_remove_related_post',
	) ) );
	$wp_customize->add_setting( 'boxing_martial_arts_related_post_per_page', array(
		'default'              => 3,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'boxing_martial_arts_sanitize_number_range',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'boxing_martial_arts_related_post_per_page', array(
		'label'       => esc_html__( 'Related Post Per Page','boxing-martial-arts' ),
		'section'     => 'boxing_martial_arts_blog_option',
		'type'        => 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 3,
			'max'              => 9,
		),
	) );
	$wp_customize->add_setting('boxing_martial_arts_post_layout',array(
        'default' => 'image-content',
        'sanitize_callback' => 'boxing_martial_arts_sanitize_choices'
	));
	$wp_customize->add_control('boxing_martial_arts_post_layout',array(
        'type' => 'radio',
        'label'     => __('Post Layout', 'boxing-martial-arts'),
        'section' => 'boxing_martial_arts_blog_option',
        'choices' => array(
            'image-content' => __('Media-Content','boxing-martial-arts'),
            'content-image' => __('Content-Media','boxing-martial-arts'),
        ),
	) );


 	 //MENU TYPOGRAPHY
	$wp_customize->add_section( 'boxing_martial_arts_menu_typography', array(
    	'title'      => __( 'Menu Typography', 'boxing-martial-arts' ),
    	'priority' => 2,
		'panel' => 'boxing_martial_arts_panel_id'
	) );
	$wp_customize->add_setting('boxing_martial_arts_menu_font_family', array(
		'default'           => '',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'boxing_martial_arts_sanitize_choices',
	));
	$wp_customize->add_control(	'boxing_martial_arts_menu_font_family', array(
		'section' => 'boxing_martial_arts_menu_typography',
		'label'   => __('Menu Fonts', 'boxing-martial-arts'),
		'type'    => 'select',
		'choices' => $boxing_martial_arts_font_array,
	));
	$wp_customize->add_setting('boxing_martial_arts_menu_text_tranform',array(
		'default' => 'Uppercase',
		'sanitize_callback' => 'boxing_martial_arts_sanitize_choices'
 	));
 	$wp_customize->add_control('boxing_martial_arts_menu_text_tranform',array(
		'type' => 'select',
		'label' => __('Menu Text Transform','boxing-martial-arts'),
		'section' => 'boxing_martial_arts_menu_typography',
		'choices' => array(
		   'Uppercase' => __('Uppercase','boxing-martial-arts'),
		   'Lowercase' => __('Lowercase','boxing-martial-arts'),
		   'Capitalize' => __('Capitalize','boxing-martial-arts'),
		),
	) );
	$wp_customize->add_setting('boxing_martial_arts_menu_font_size', array(
	  'default' => 14,
      'sanitize_callback' => 'boxing_martial_arts_sanitize_number_range',
	));
	$wp_customize->add_control(new Boxing_Martial_Arts_Range_Slider($wp_customize, 'boxing_martial_arts_menu_font_size', array(
       'section' => 'boxing_martial_arts_menu_typography',
      'label' => esc_html__('Font Size', 'boxing-martial-arts'),
      'input_attrs' => array(
        'min' => 0,
        'max' => 20,
        'step' => 1
    )
	)));

	// Top Bar
	$wp_customize->add_section( 'boxing_martial_arts_topbar', array(
    	'title'      => __( 'Header Details', 'boxing-martial-arts' ),
    	'priority' => 2,
    	'description' => __( 'Add your contact details', 'boxing-martial-arts' ),
		'panel' => 'boxing_martial_arts_panel_id'
	) );
	$wp_customize->add_setting('boxing_martial_arts_topbar_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('boxing_martial_arts_topbar_text',array(
		'label'	=> __('Topbar Text','boxing-martial-arts'),
		'section'=> 'boxing_martial_arts_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting('boxing_martial_arts_topbar_discount_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('boxing_martial_arts_topbar_discount_text',array(
		'label'	=> __('Topbar Discount Text','boxing-martial-arts'),
		'section'=> 'boxing_martial_arts_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting('boxing_martial_arts_shop_btn_url',array(
		'default'=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('boxing_martial_arts_shop_btn_url',array(
		'label'	=> __('Discount Text Link','boxing-martial-arts'),
		'section'=> 'boxing_martial_arts_topbar',
		'type'=> 'url'
	));

	$wp_customize->add_setting('boxing_martial_arts_mail',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_email'
	));
	$wp_customize->add_control('boxing_martial_arts_mail',array(
		'label'	=> __('Add Mail Address','boxing-martial-arts'),
		'section'=> 'boxing_martial_arts_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting('boxing_martial_arts_membership_button',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('boxing_martial_arts_membership_button',array(
		'label'	=> __('Membership Button Text','boxing-martial-arts'),
		'section'=> 'boxing_martial_arts_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting('boxing_martial_arts_membership_link',array(
		'default'=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('boxing_martial_arts_membership_link',array(
		'label'	=> __('Membership Button Link','boxing-martial-arts'),
		'section'=> 'boxing_martial_arts_topbar',
		'type'=> 'url'
	));

	//home page slider
	$wp_customize->add_section( 'boxing_martial_arts_slider_section' , array(
    	'title'      => __( 'Slider Section', 'boxing-martial-arts' ),
    	'priority' => 2,
		'panel' => 'boxing_martial_arts_panel_id'
	) );

	$wp_customize->add_setting( 'boxing_martial_arts_slider_arrows', array(
		'default'           => false,
		'transport'         => 'refresh',
		'sanitize_callback' => 'boxing_martial_arts_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Boxing_Martial_Arts_Toggle_Control( $wp_customize, 'boxing_martial_arts_slider_arrows', array(
		'label'       => esc_html__( 'Show / Hide slider', 'boxing-martial-arts' ),
		'section'     => 'boxing_martial_arts_slider_section',
		'type'        => 'toggle',
		'settings'    => 'boxing_martial_arts_slider_arrows',
	) ) );

	$wp_customize->add_setting('boxing_martial_arts_slider_short_heading',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('boxing_martial_arts_slider_short_heading',array(
		'label'	=> __('Add short Heading','boxing-martial-arts'),
		'section'=> 'boxing_martial_arts_slider_section',
		'type'=> 'text'
	));

	for ( $boxing_martial_arts_count = 1; $boxing_martial_arts_count <= 4; $boxing_martial_arts_count++ ) {

		$wp_customize->add_setting( 'boxing_martial_arts_slider_page' . $boxing_martial_arts_count, array(
			'default'           => '',
			'sanitize_callback' => 'boxing_martial_arts_sanitize_dropdown_pages'
		) );

		$wp_customize->add_control( 'boxing_martial_arts_slider_page' . $boxing_martial_arts_count, array(
			'label'    => __( 'Select Slide Image Page', 'boxing-martial-arts' ),
			'description' => __('Image Size ( 1835 x 700 ) px','boxing-martial-arts'),
			'section'  => 'boxing_martial_arts_slider_section',
			'type'     => 'dropdown-pages'
		) );
	}

	$wp_customize->add_setting('boxing_martial_arts_slider_second_img',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'boxing_martial_arts_slider_second_img',array(
        'label' => __('joiner Image','boxing-martial-arts'),
         'section' => 'boxing_martial_arts_slider_section'
	)));

	$wp_customize->add_setting('boxing_martial_arts_slider_join_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('boxing_martial_arts_slider_join_text',array(
		'label'	=> __('Joiner Text','boxing-martial-arts'),
		'section'=> 'boxing_martial_arts_slider_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'boxing_martial_arts_return_to_header', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'boxing_martial_arts_sanitize_checkbox',
	) );

	$boxing_martial_arts_args = array('numberposts' => -1);
	$post_list = get_posts($boxing_martial_arts_args);
	$i = 0;
	$pst[]='Select';
	foreach($post_list as $post){
		$pst[$post->post_title] = $post->post_title;
	}

	// Matches Section
	$wp_customize->add_section('boxing_martial_arts_matches_section',array(
		'title'	=> __('Matches Section','boxing-martial-arts'),
		'panel' => 'boxing_martial_arts_panel_id',
		'priority' => 3,
	));
	$wp_customize->add_setting( 'boxing_martial_arts_matches_enable', array(
		'default'           => false,
		'transport'         => 'refresh',
		'sanitize_callback' => 'boxing_martial_arts_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Boxing_Martial_Arts_Toggle_Control( $wp_customize, 'boxing_martial_arts_matches_enable', array(
		'label'       => esc_html__( 'Show / Hide Matches', 'boxing-martial-arts' ),
		'section'     => 'boxing_martial_arts_matches_section',
		'type'        => 'toggle',
		'settings'    => 'boxing_martial_arts_matches_enable',
	) ) );
	$wp_customize->add_setting('boxing_martial_arts_matches_heading',array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('boxing_martial_arts_matches_heading',array(
		'label'	=> __('Section Title','boxing-martial-arts'),
		'section'	=> 'boxing_martial_arts_matches_section',
		'type'		=> 'text'
	));
	$wp_customize->selective_refresh->add_partial( 'boxing_martial_arts_matches_heading', array(
		'selector' => '#matches h2',
		'render_callback' => 'boxing_martial_arts_customize_partial_boxing_martial_arts_matches_heading',
	) );
	$wp_customize->add_setting('boxing_martial_arts_matches_sub_heading',array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('boxing_martial_arts_matches_sub_heading',array(
		'label'	=> __('Section Sub Title','boxing-martial-arts'),
		'section'	=> 'boxing_martial_arts_matches_section',
		'type'		=> 'text'
	));
	$boxing_martial_arts_categories = get_categories();
	$cats = array();
	$i = 0;
	$boxing_martial_arts_offer_cat[]= 'select';
	foreach($boxing_martial_arts_categories as $category){
		if($i==0){
			$default = $category->slug;
			$i++;
		}
		$boxing_martial_arts_offer_cat[$category->slug] = $category->name;
	}
	$wp_customize->add_setting('boxing_martial_arts_matches_section_category',array(
		'default'	=> 'select',
		'sanitize_callback' => 'boxing_martial_arts_sanitize_choices',
	));
	$wp_customize->add_control('boxing_martial_arts_matches_section_category',array(
		'type'    => 'select',
		'choices' => $boxing_martial_arts_offer_cat,
		'label' => __('Select Category','boxing-martial-arts'),
		'section' => 'boxing_martial_arts_matches_section',
	));

	//footer
	$wp_customize->add_section('boxing_martial_arts_footer_section',array(
		'title'	=> __('Footer Text','boxing-martial-arts'),
		'description'	=> __('Add copyright text.','boxing-martial-arts'),
		'panel' => 'boxing_martial_arts_panel_id',
		'priority' => 7,
	));
	$wp_customize->add_setting('boxing_martial_arts_footer_text',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('boxing_martial_arts_footer_text',array(
		'label'	=> __('Copyright Text','boxing-martial-arts'),
		'section'	=> 'boxing_martial_arts_footer_section',
		'type'		=> 'text'
	));
	// footer columns
	$wp_customize->add_setting('boxing_martial_arts_footer_columns',array(
		'default'	=> 4,
		'sanitize_callback'	=> 'boxing_martial_arts_sanitize_number_absint'
	));
	$wp_customize->add_control('boxing_martial_arts_footer_columns',array(
		'label'	=> __('Footer Widget Columns','boxing-martial-arts'),
		'section'	=> 'boxing_martial_arts_footer_section',
		'setting'	=> 'boxing_martial_arts_footer_columns',
		'type'	=> 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 4,
		),
	));
	$wp_customize->add_setting( 'boxing_martial_arts_tp_footer_bg_color_option', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'boxing_martial_arts_tp_footer_bg_color_option', array(
			'label'     => __('Footer Widget Background Color', 'boxing-martial-arts'),
			'description' => __('It will change the complete footer widget backgorund color.', 'boxing-martial-arts'),
			'section' => 'boxing_martial_arts_footer_section',
			'settings' => 'boxing_martial_arts_tp_footer_bg_color_option',
	)));
	$wp_customize->add_setting('boxing_martial_arts_footer_widget_image',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'boxing_martial_arts_footer_widget_image',array(
        'label' => __('Footer Widget Background Image','boxing-martial-arts'),
         'section' => 'boxing_martial_arts_footer_section'
	)));
	$wp_customize->add_setting( 'boxing_martial_arts_return_to_header', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'boxing_martial_arts_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Boxing_Martial_Arts_Toggle_Control( $wp_customize, 'boxing_martial_arts_return_to_header', array(
		'label'       => esc_html__( 'Show / Hide Return to header', 'boxing-martial-arts' ),
		'section'     => 'boxing_martial_arts_footer_section',
		'type'        => 'toggle',
		'settings'    => 'boxing_martial_arts_return_to_header',
	) ) );
    $wp_customize->add_setting('boxing_martial_arts_scroll_top_icon',array(
	  'default'	=> 'fas fa-arrow-up',
	  'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Boxing_Martial_Arts_Icon_Changer(
	        $wp_customize,'boxing_martial_arts_scroll_top_icon',array(
		'label'	=> __('Scroll to top Icon','boxing-martial-arts'),
		'transport' => 'refresh',
		'section'	=> 'boxing_martial_arts_footer_section',
			'type'		=> 'icon'
	)));

    // Add Settings and Controls for Scroll top
	$wp_customize->add_setting('boxing_martial_arts_scroll_top_position',array(
        'default' => 'Right',
        'sanitize_callback' => 'boxing_martial_arts_sanitize_choices'
	));
	$wp_customize->add_control('boxing_martial_arts_scroll_top_position',array(
        'type' => 'radio',
        'label'     => __('Scroll to top Position', 'boxing-martial-arts'),
        'description'   => __('This option work for scroll to top', 'boxing-martial-arts'),
       'section' => 'boxing_martial_arts_footer_section',
       'choices' => array(
            'Right' => __('Right','boxing-martial-arts'),
            'Left' => __('Left','boxing-martial-arts'),
            'Center' => __('Center','boxing-martial-arts')
     ),
	) );
	$wp_customize->get_setting( 'blogname' )->transport          = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport   = 'postMessage';
	$wp_customize->selective_refresh->add_partial( 'blogname', array(
		'selector' => '.site-title a',
		'render_callback' => 'boxing_martial_arts_customize_partial_blogname',
	) );
	$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
		'selector' => '.site-description',
		'render_callback' => 'boxing_martial_arts_customize_partial_blogdescription',
	) );

	//Mobile Respnsive
	$wp_customize->add_section('boxing_martial_arts_mobile_media_option',array(
		'title'         => __('Mobile Responsive media', 'boxing-martial-arts'),
		'description' => __('Control will not function if the toggle in the main settings is off.', 'boxing-martial-arts'),
		'priority' => 8,
		'panel' => 'boxing_martial_arts_panel_id'
	) );
	$wp_customize->add_setting( 'boxing_martial_arts_return_to_header_mob', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'boxing_martial_arts_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Boxing_Martial_Arts_Toggle_Control( $wp_customize, 'boxing_martial_arts_return_to_header_mob', array(
		'label'       => esc_html__( 'Show / Hide Return to header', 'boxing-martial-arts' ),
		'section'     => 'boxing_martial_arts_mobile_media_option',
		'type'        => 'toggle',
		'settings'    => 'boxing_martial_arts_return_to_header_mob',
	) ) );
	$wp_customize->add_setting( 'boxing_martial_arts_related_post_mob', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'boxing_martial_arts_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Boxing_Martial_Arts_Toggle_Control( $wp_customize, 'boxing_martial_arts_related_post_mob', array(
		'label'       => esc_html__( 'Show / Hide Related Post', 'boxing-martial-arts' ),
		'section'     => 'boxing_martial_arts_mobile_media_option',
		'type'        => 'toggle',
		'settings'    => 'boxing_martial_arts_related_post_mob',
	) ) );

	//Site Identity
	$wp_customize->add_setting( 'boxing_martial_arts_site_title', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'boxing_martial_arts_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Boxing_Martial_Arts_Toggle_Control( $wp_customize, 'boxing_martial_arts_site_title', array(
		'label'       => esc_html__( 'Show / Hide Site Title', 'boxing-martial-arts' ),
		'section'     => 'title_tagline',
		'type'        => 'toggle',
		'settings'    => 'boxing_martial_arts_site_title',
	) ) );
	$wp_customize->add_setting('boxing_martial_arts_site_title_font_size',array(
		'default'	=> 25,
		'sanitize_callback'	=> 'boxing_martial_arts_sanitize_number_absint'
	));
	$wp_customize->add_control('boxing_martial_arts_site_title_font_size',array(
		'label'	=> __('Site Title Font Size in PX','boxing-martial-arts'),
		'section'	=> 'title_tagline',
		'setting'	=> 'boxing_martial_arts_site_title_font_size',
		'type'	=> 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 0,
			'max'              => 80,
		),
	));

	$wp_customize->add_setting( 'boxing_martial_arts_site_tagline_color', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'boxing_martial_arts_site_tagline_color', array(
			'label'     => __('Change Site Title Color', 'boxing-martial-arts'),
	    'section' => 'title_tagline',
	    'settings' => 'boxing_martial_arts_site_tagline_color',
  	)));

	$wp_customize->add_setting( 'boxing_martial_arts_site_tagline', array(
	    'default'           => false,
		'transport'         => 'refresh',
		'sanitize_callback' => 'boxing_martial_arts_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Boxing_Martial_Arts_Toggle_Control( $wp_customize, 'boxing_martial_arts_site_tagline', array(
		'label'       => esc_html__( 'Show / Hide Site Tagline', 'boxing-martial-arts' ),
		'section'     => 'title_tagline',
		'type'        => 'toggle',
		'settings'    => 'boxing_martial_arts_site_tagline',
	) ) );

	// logo site tagline size
	$wp_customize->add_setting('boxing_martial_arts_site_tagline_font_size',array(
		'default'	=> 15,
		'sanitize_callback'	=> 'boxing_martial_arts_sanitize_number_absint'
	));
	$wp_customize->add_control('boxing_martial_arts_site_tagline_font_size',array(
		'label'	=> __('Site Tagline Font Size in PX','boxing-martial-arts'),
		'section'	=> 'title_tagline',
	    'setting'	=> 'boxing_martial_arts_site_tagline_font_size',
		'type'	=> 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 0,
			'max'              => 50,
		),
	));

	$wp_customize->add_setting( 'boxing_martial_arts_logo_tagline_color', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'boxing_martial_arts_logo_tagline_color', array(
			'label'     => __('Change Site Tagline Color', 'boxing-martial-arts'),
	    'section' => 'title_tagline',
	    'settings' => 'boxing_martial_arts_logo_tagline_color',
  	)));
  	
    $wp_customize->add_setting('boxing_martial_arts_logo_width',array(
		'default' => 150,
		'sanitize_callback'	=> 'boxing_martial_arts_sanitize_number_absint'
	));
	$wp_customize->add_control('boxing_martial_arts_logo_width',array(
		'label'	=> esc_html__('Here You Can Customize Your Logo Size','boxing-martial-arts'),
		'section'	=> 'title_tagline',
		'type'		=> 'number'
	));

	$wp_customize->add_setting('boxing_martial_arts_logo_settings',array(
		'default' => 'Different Line',
		'sanitize_callback' => 'boxing_martial_arts_sanitize_choices'
	));
    $wp_customize->add_control('boxing_martial_arts_logo_settings',array(
        'type' => 'radio',
        'label'     => __('Logo Layout Settings', 'boxing-martial-arts'),
        'description'   => __('Here you have two options 1. Logo and Site tite in differnt line. 2. Logo and Site title in same line.', 'boxing-martial-arts'),
        'section' => 'title_tagline',
        'choices' => array(
            'Different Line' => __('Different Line','boxing-martial-arts'),
            'Same Line' => __('Same Line','boxing-martial-arts')
        ),
	) );

	//Woo Coomerce
	$wp_customize->add_setting('boxing_martial_arts_per_columns',array(
		'default'=> 3,
		'sanitize_callback'	=> 'boxing_martial_arts_sanitize_number_absint'
	));
	$wp_customize->add_control('boxing_martial_arts_per_columns',array(
		'label'	=> __('Product Per Row','boxing-martial-arts'),
		'section'=> 'woocommerce_product_catalog',
		'type'=> 'number'
	));
	$wp_customize->add_setting('boxing_martial_arts_product_per_page',array(
		'default'=> 9,
		'sanitize_callback'	=> 'boxing_martial_arts_sanitize_number_absint'
	));
	$wp_customize->add_control('boxing_martial_arts_product_per_page',array(
		'label'	=> __('Product Per Page','boxing-martial-arts'),
		'section'=> 'woocommerce_product_catalog',
		'type'=> 'number'
	));
   	$wp_customize->add_setting( 'boxing_martial_arts_product_sidebar', array(
		 'default'           => true,
		 'transport'         => 'refresh',
		 'sanitize_callback' => 'boxing_martial_arts_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Boxing_Martial_Arts_Toggle_Control( $wp_customize, 'boxing_martial_arts_product_sidebar', array(
		'label'       => esc_html__( 'Show / Hide Shop Page Sidebar', 'boxing-martial-arts' ),
		'section'     => 'woocommerce_product_catalog',
		'type'        => 'toggle',
		'settings'    => 'boxing_martial_arts_product_sidebar',
	) ) );

	$wp_customize->add_setting( 'boxing_martial_arts_single_product_sidebar', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'boxing_martial_arts_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Boxing_Martial_Arts_Toggle_Control( $wp_customize, 'boxing_martial_arts_single_product_sidebar', array(
		'label'       => esc_html__( 'Show / Hide Product Page Sidebar', 'boxing-martial-arts' ),
		'section'     => 'woocommerce_product_catalog',
		'type'        => 'toggle',
		'settings'    => 'boxing_martial_arts_single_product_sidebar',
	) ) );
	$wp_customize->add_setting( 'boxing_martial_arts_related_product', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'boxing_martial_arts_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Boxing_Martial_Arts_Toggle_Control( $wp_customize, 'boxing_martial_arts_related_product', array(
		'label'       => esc_html__( 'Show / Hide related product', 'boxing-martial-arts' ),
		'section'     => 'woocommerce_product_catalog',
		'type'        => 'toggle',
		'settings'    => 'boxing_martial_arts_related_product',
	) ) );

	//Page template settings
	$wp_customize->add_panel( 'boxing_martial_arts_page_panel_id', array(
	    'priority' => 10,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => __( 'Page Template Settings', 'boxing-martial-arts' ),
	    'description' => __( 'Description of what this panel does.', 'boxing-martial-arts' ),
	) );

	// 404 PAGE
	$wp_customize->add_section('boxing_martial_arts_404_page_section',array(
		'title'         => __('404 Page', 'boxing-martial-arts'),
		'description'   => 'Here you can customize 404 Page content.',
		'panel' => 'boxing_martial_arts_page_panel_id'
	) );

	$wp_customize->add_setting('boxing_martial_arts_edit_404_title',array(
		'default'=> __('Oops! That page cant be found.','boxing-martial-arts'),
		'sanitize_callback'	=> 'sanitize_text_field',
	));
	$wp_customize->add_control('boxing_martial_arts_edit_404_title',array(
		'label'	=> __('Edit Title','boxing-martial-arts'),
		'section'=> 'boxing_martial_arts_404_page_section',
		'type'=> 'text',
	));

	$wp_customize->add_setting('boxing_martial_arts_edit_404_text',array(
		'default'=> __('It looks like nothing was found at this location. Maybe try a search?','boxing-martial-arts'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('boxing_martial_arts_edit_404_text',array(
		'label'	=> __('Edit Text','boxing-martial-arts'),
		'section'=> 'boxing_martial_arts_404_page_section',
		'type'=> 'text'
	));

	// Search Results
	$wp_customize->add_section('boxing_martial_arts_no_result_section',array(
		'title'         => __('Search Results', 'boxing-martial-arts'),
		'description'   => 'Here you can customize Search Result content.',
		'panel' => 'boxing_martial_arts_page_panel_id'
	) );

	$wp_customize->add_setting('boxing_martial_arts_edit_no_result_title',array(
		'default'=> __('Nothing Found','boxing-martial-arts'),
		'sanitize_callback'	=> 'sanitize_text_field',
	));
	$wp_customize->add_control('boxing_martial_arts_edit_no_result_title',array(
		'label'	=> __('Edit Title','boxing-martial-arts'),
		'section'=> 'boxing_martial_arts_no_result_section',
		'type'=> 'text',
	));

	$wp_customize->add_setting('boxing_martial_arts_edit_no_result_text',array(
		'default'=> __('Sorry, but nothing matched your search terms. Please try again with some different keywords.','boxing-martial-arts'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('boxing_martial_arts_edit_no_result_text',array(
		'label'	=> __('Edit Text','boxing-martial-arts'),
		'section'=> 'boxing_martial_arts_no_result_section',
		'type'=> 'text'
	));

}
add_action( 'customize_register', 'boxing_martial_arts_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @since Boxing Martial Arts 1.0
 * @see boxing_martial_arts_customize_register()
 *
 * @return void
 */
function boxing_martial_arts_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @since Boxing Martial Arts 1.0
 * @see boxing_martial_arts_customize_register()
 *
 * @return void
 */
function boxing_martial_arts_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

if ( ! defined( 'BOXING_MARTIAL_ARTS_PRO_THEME_NAME' ) ) {
	define( 'BOXING_MARTIAL_ARTS_PRO_THEME_NAME', esc_html__( 'Boxing Martial Arts Pro', 'boxing-martial-arts' ));
}
if ( ! defined( 'BOXING_MARTIAL_ARTS_PRO_THEME_URL' ) ) {
	define( 'BOXING_MARTIAL_ARTS_PRO_THEME_URL', esc_url('https://www.themespride.com/products/boxing-wordpress-theme'));
}
if ( ! defined( 'BOXING_MARTIAL_ARTS_DOCS_URL' ) ) {
	define( 'BOXING_MARTIAL_ARTS_DOCS_URL', esc_url('https://page.themespride.com/demo/docs/boxing-martial-arts/'));
}

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class Boxing_Martial_Arts_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	 */
	public function sections( $manager ) {

		// Load custom sections.
		load_template( trailingslashit( get_template_directory() ) . '/inc/section-pro.php' );

		// Register custom section types.
		$manager->register_section_type( 'Boxing_Martial_Arts_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(
			new Boxing_Martial_Arts_Customize_Section_Pro(
				$manager,
				'boxing_martial_arts_section_pro',
				array(
					'priority'   => 9,
					'title'    => BOXING_MARTIAL_ARTS_PRO_THEME_NAME,
					'pro_text' => esc_html__( 'Upgrade Pro', 'boxing-martial-arts' ),
					'pro_url'  => esc_url( BOXING_MARTIAL_ARTS_PRO_THEME_URL, 'boxing-martial-arts' ),
				)
			)
		);
		    // Register sections.
		$manager->add_section(
			new Boxing_Martial_Arts_Customize_Section_Pro(
				$manager,
				'boxing_martial_arts_documentation',
				array(
					'priority'   => 500,
					'title'    => esc_html__( 'Theme Documentation', 'boxing-martial-arts' ),
					'pro_text' => esc_html__( 'Click Here', 'boxing-martial-arts' ),
					'pro_url'  => esc_url( BOXING_MARTIAL_ARTS_DOCS_URL, 'boxing-martial-arts'),
				)
			)
		);
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'boxing-martial-arts-customize-controls', trailingslashit( esc_url( get_template_directory_uri() ) ) . '/assets/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'boxing-martial-arts-customize-controls', trailingslashit( esc_url( get_template_directory_uri() ) ) . '/assets/css/customize-controls.css' );
	}
}

// Doing this customizer thang!
Boxing_Martial_Arts_Customize::get_instance();
