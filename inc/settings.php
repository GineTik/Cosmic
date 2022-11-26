<?php

function register_color_settings($wp_customize) {
    $theme_title = 'cosmic';
    $section_name = 'stylization_section';

    $wp_customize->add_section( $section_name , array(
        'title'      => __('Stylization', $theme_title),
        'priority'   => 30,
    ));

// === background color ===

    add_simple_setting(
        $wp_customize,
        $section_name,
        'background_color',
        '#E4ECD2');

// === primary color === 

    add_simple_setting(
        $wp_customize,
        $section_name,
        'primary_color',
        '#6C8536');

// === text color === 
    
    add_simple_setting(
        $wp_customize,
        $section_name,
        'text_color',
        '#2b2222');
}






// gutenberg settings

function register_gutenberg_settings() {
	wp_enqueue_script(
        'cosmic-gutenberg-filters', 
        get_template_directory_uri() . '/assets/js/gutenberg-filters.js', 
        array('wp-blocks', 'wp-i18n', 'wp-editor')
    );
        //['wp-edit-post']);
}





//add_action('enqueue_block_editor_assets', 'register_gutenberg_settings');
add_action('customize_register', 'register_color_settings');





// helpers

function add_simple_setting($wp_customize, $section_name, $setting_name, $default_value) {
    $wp_customize->add_setting($setting_name, array(
        'default'   => $default_value,
        'type' => 'option',
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, $setting_name . '_control', array(
        'label'      => __($setting_name),
        'section'    => $section_name,
        'settings'   => $setting_name,
    )));
}