<?php
/**
 * Features Section options.
 *
 * @package Boxing Club
 */

$default = boxing_club_get_default_theme_options();

// Features Section
$wp_customize->add_section( 'section_featured_features',
	array(
	'title'      => __( 'Features Section', 'boxing-club' ),
	'priority'   => 100,
	'capability' => 'edit_theme_options',
	'panel'      => 'home_page_panel',
	)
);

// Enable Section
$wp_customize->add_setting('theme_options[enable_featured_features_section]', 
	array(
	'default' 			=> $default['enable_featured_features_section'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'boxing_club_sanitize_checkbox'
	)
);

$wp_customize->add_control('theme_options[enable_featured_features_section]', 
	array(		
	'label' 	=> __('Enable Section', 'boxing-club'),
	'section' 	=> 'section_featured_features',
	'settings'  => 'theme_options[enable_featured_features_section]',
	'type' 		=> 'checkbox',	
	)
);

// Items
$wp_customize->add_setting('theme_options[number_of_featured_features_items]', 
	array(
	'default' 			=> $default['number_of_featured_features_items'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'boxing_club_sanitize_number_range'
	)
);

$wp_customize->add_control('theme_options[number_of_featured_features_items]', 
	array(
	'label'       => __('Items (Max: 6)', 'boxing-club'),
	'section'     => 'section_featured_features',   
	'settings'    => 'theme_options[number_of_featured_features_items]',		
	'type'        => 'number',
	'active_callback' => 'boxing_club_featured_features_active',
	'input_attrs' => array(
			'min'	=> 1,
			'max'	=> 6,
			'step'	=> 1,
		),
	)
);

// Column
$wp_customize->add_setting('theme_options[featured_features_column]', 
	array(
	'default' 			=> $default['featured_features_column'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'boxing_club_sanitize_select'
	)
);

$wp_customize->add_control(new boxing_club_Image_Radio_Control($wp_customize, 'theme_options[featured_features_column]', 
	array(		
	'label' 	=> __('Column', 'boxing-club'),
	'section' 	=> 'section_featured_features',
	'settings'  => 'theme_options[featured_features_column]',
	'type' 		=> 'radio-image',
	'active_callback' => 'boxing_club_featured_features_active',
	'choices' 	=> array(		
		'col-1' 	=> esc_url(get_template_directory_uri()) . '/assets/images/column-1.jpg',						
		'col-2' 	=> esc_url(get_template_directory_uri()) . '/assets/images/column-2.jpg',
		'col-3' 	=> esc_url(get_template_directory_uri()) . '/assets/images/column-3.jpg',
		'col-4' 	=> esc_url(get_template_directory_uri()) . '/assets/images/column-4.jpg',
		'col-5' 	=> esc_url(get_template_directory_uri()) . '/assets/images/column-5.jpg',
		'col-6' 	=> esc_url(get_template_directory_uri()) . '/assets/images/column-6.jpg',
		),	
	))
);

// Content Type
$wp_customize->add_setting('theme_options[featured_features_content_type]', 
	array(
	'default' 			=> $default['featured_features_content_type'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'boxing_club_sanitize_select'
	)
);

$wp_customize->add_control('theme_options[featured_features_content_type]', 
	array(
	'label'       => __('Content Type', 'boxing-club'),
	'section'     => 'section_featured_features',   
	'settings'    => 'theme_options[featured_features_content_type]',		
	'type'        => 'select',
	'active_callback' => 'boxing_club_featured_features_active',
	'choices'	  => array(
			'featured_features_page'	  => __('Page','boxing-club'),
			'featured_features_post'	  => __('Post','boxing-club'),
		),
	)
);

$number_of_featured_features_items = boxing_club_get_option( 'number_of_featured_features_items' );

for( $i=1; $i<=$number_of_featured_features_items; $i++ ) {

	// Icon
	$wp_customize->add_setting('theme_options[featured_features_icon_'.$i.']', 
		array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',	
		'sanitize_callback' => 'sanitize_text_field'
		)
	);

	$wp_customize->add_control('theme_options[featured_features_icon_'.$i.']', 
		array(
		'label'       		=> sprintf( __('Icon #%1$s', 'boxing-club'), $i),
		'section'     		=> 'section_featured_features',   
		'settings'    		=> 'theme_options[featured_features_icon_'.$i.']',		
		'active_callback' 	=> 'boxing_club_featured_features_active',			
		'type'        		=> 'text',
		)
	);

	// Page
	$wp_customize->add_setting('theme_options[featured_features_page_'.$i.']', 
		array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',	
		'sanitize_callback' => 'boxing_club_dropdown_pages'
		)
	);
	
	$wp_customize->add_control('theme_options[featured_features_page_'.$i.']', 
		array(
		'label'       => sprintf( __('Page #%1$s', 'boxing-club'), $i),
		'section'     => 'section_featured_features',   
		'settings'    => 'theme_options[featured_features_page_'.$i.']',		
		'type'        => 'dropdown-pages',
		'active_callback' => 'boxing_club_featured_features_page',
		)
	);

	// Post
	$wp_customize->add_setting('theme_options[featured_features_post_'.$i.']', 
		array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',	
		'sanitize_callback' => 'boxing_club_dropdown_pages'
		)
	);

	$wp_customize->add_control('theme_options[featured_features_post_'.$i.']', 
		array(
		'label'       => sprintf( __('Post #%1$s', 'boxing-club'), $i),
		'section'     => 'section_featured_features',   
		'settings'    => 'theme_options[featured_features_post_'.$i.']',		
		'type'        => 'select',
		'choices'	  => boxing_club_dropdown_posts(),
		'active_callback' => 'boxing_club_featured_features_post',
		)
	);
}