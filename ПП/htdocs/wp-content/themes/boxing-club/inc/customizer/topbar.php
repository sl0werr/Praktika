<?php

$default = boxing_club_get_default_theme_options();
/**
* Add Header Top Panel
*/
$wp_customize->add_panel( 'header_top_panel', array(
    'title'          => __( 'Header Top', 'boxing-club' ),
    'priority'       => 20,
    'capability'     => 'edit_theme_options',
) );

/** Header contact info section */
$wp_customize->add_section(
    'header_contact_info_section',
    array(
        'title'    => __( 'Contact Info', 'boxing-club' ),
        'panel'    => 'header_top_panel',
        'priority' => 10,
    )
);

/** Header contact info control */
$wp_customize->add_setting( 
    'theme_options[show_header_contact_info]', 
    array(
        'default'           => $default['show_header_contact_info'],
        'sanitize_callback' => 'boxing_club_sanitize_checkbox',
    ) 
);

$wp_customize->add_control(
    'theme_options[show_header_contact_info]',
    array(
        'label'       => __( 'Show Contact Info', 'boxing-club' ),
        'section'     => 'header_contact_info_section',
        'type'        => 'checkbox',
    )
);

/** Phone */
$wp_customize->add_setting( 'theme_options[header_phone]', array(
    'sanitize_callback' => 'boxing_club_sanitize_phone_number',
) );

$wp_customize->add_control(
    'theme_options[header_phone]',
    array(
        'label'           => __( 'Phone', 'boxing-club' ),
        'description'     => __( 'Enter phone number.', 'boxing-club' ),
        'section'         => 'header_contact_info_section',
        'active_callback' => 'boxing_club_contact_info_ac',
    )
);

/** Header social links section */
$wp_customize->add_section(
    'header_social_links_section',
    array(
        'title'    => __( 'Social Links', 'boxing-club' ),
        'panel'    => 'header_top_panel',
        'priority' => 20,
    )
);

/** Header social links control */
$wp_customize->add_setting( 
    'theme_options[show_header_social_links]', 
    array(
        'default'           => $default['show_header_social_links'],
        'sanitize_callback' => 'boxing_club_sanitize_checkbox',
    ) 
);

$wp_customize->add_control(
    'theme_options[show_header_social_links]',
    array(
        'label'       => __( 'Show Social Links', 'boxing-club' ),
        'section'     => 'header_social_links_section',
        'type'        => 'checkbox',
    )
);

// Setting social_links.
$wp_customize->add_setting( 
    'theme_options[social_link_1]', 
    array(
        'sanitize_callback' => 'esc_url_raw',
    ) 
);

$wp_customize->add_control(
    'theme_options[social_link_1]',
    array(
        'label'           => __( 'Social Link 1', 'boxing-club' ),
        'description'     => __( 'Enter valid url.', 'boxing-club' ),
        'section'         => 'header_social_links_section',
        'type'            => 'url',
        'active_callback' => 'boxing_club_social_links_active',
    )
);

$wp_customize->add_setting( 
    'theme_options[social_link_2]', 
    array(
        'sanitize_callback' => 'esc_url_raw',
    ) 
);

$wp_customize->add_control(
    'theme_options[social_link_2]',
    array(
        'label'           => __( 'Social Link 2', 'boxing-club' ),
        'description'     => __( 'Enter valid url.', 'boxing-club' ),
        'section'         => 'header_social_links_section',
        'type'            => 'url',
        'active_callback' => 'boxing_club_social_links_active',
    )
);
$wp_customize->add_setting( 
    'theme_options[social_link_3]', 
    array(
        'sanitize_callback' => 'esc_url_raw',
    ) 
);

$wp_customize->add_control(
    'theme_options[social_link_3]',
    array(
        'label'           => __( 'Social Link 3', 'boxing-club' ),
        'description'     => __( 'Enter valid url.', 'boxing-club' ),
        'section'         => 'header_social_links_section',
        'type'            => 'url',
        'active_callback' => 'boxing_club_social_links_active',
    )
);

$wp_customize->add_setting( 
    'theme_options[social_link_4]', 
    array(
        'sanitize_callback' => 'esc_url_raw',
    ) 
);

$wp_customize->add_control(
    'theme_options[social_link_4]',
    array(
        'label'           => __( 'Social Link 4', 'boxing-club' ),
        'description'     => __( 'Enter valid url.', 'boxing-club' ),
        'section'         => 'header_social_links_section',
        'type'            => 'url',
        'active_callback' => 'boxing_club_social_links_active',
    )
);