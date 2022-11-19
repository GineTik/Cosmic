<?php

function register_color_settings($wp_customize) {
    $theme_title = 'cosmic';
    $section_name = 'colors_section';

    $wp_customize->add_section( $section_name , array(
        'title'      => __('Colors', $theme_title),
        'priority'   => 30,
    ));

// === background color ===

    $wp_customize->add_setting( 'background_color' , array(
        'default'   => '#E4ECD2',
        'type' => 'option',
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'background_color_control', array(
        'label'      => __('Background color', $theme_title),
        'section'    => $section_name,
        'settings'   => 'background_color',
    )));

// === primary color === 

    $wp_customize->add_setting( 'primary_color' , array(
        'default'   => '#6C8536',
        'type' => 'option',
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'primary_color_control', array(
        'label'      => __('Primary color', $theme_title),
        'section'    => $section_name,
        'settings'   => 'primary_color',
    )));
}

add_action('customize_register', 'register_color_settings');