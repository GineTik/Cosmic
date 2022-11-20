<?php

function register_editor_styles() {
    wp_enqueue_style( 'editor-style', get_template_directory_uri() . '/assets/css/editor-style.min.css' );
    wp_enqueue_style( 'fonts', get_template_directory_uri() . '/assets/css/fonts.min.css' );

    register_block_style(
        'core/paragraph',
        array(
            'name'         => 'custom-paragraph',
            'label'        => __('Custom paragraph'),
            'style_handle' => 'editor-style',
        )
    );

    register_block_style(
        'core/image',
        array(
            'name'         => 'text-in-image',
            'label'        => __('Text in the image'),
            'style_handle' => 'editor-style',
        )
    );

    register_block_style(
        'core/audio',
        array(
            'name'         => 'width-100-percent',
            'label'        => __('Width 100%'),
            'style_handle' => 'editor-style',
        )
    );
}

function register_site_styles() {
    wp_enqueue_style('style', get_template_directory_uri() . '/assets/css/style.min.css');
    wp_enqueue_style('fonts', get_template_directory_uri() . '/assets/css/fonts.min.css');
}

function register_site_scripts() {
    
}

function register_variables_styles() {
    require_once get_template_directory() . '/assets/css/variables.php';
}

function register_scripts() {
    //wp_enqueue_script('jquery', get_template_directory_uri() . '/lib/jquery/jquery.min.js');
    wp_enqueue_script('fontawesome', 'https://kit.fontawesome.com/a2be051007.js');
    wp_enqueue_script('audio', get_template_directory_uri() . '/assets/js/audio.js', array('jquery'));
}

// variables
add_action('admin_head', 'register_variables_styles');
add_action('wp_head', 'register_variables_styles');


// editor styles
add_action('admin_init', 'register_editor_styles');


// style scripts for site and admin editor
add_action('wp_head', 'register_scripts');
add_action('admin_footer', 'register_scripts');


// default site styles and scripts
add_action('wp_head', 'register_site_styles');
add_action('wp_footer', 'register_site_scripts');