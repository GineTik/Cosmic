<?php

function register_styles() {
    wp_enqueue_style('style', get_template_directory_uri() . '/assets/css/style.min.css');
}

function register_scripts() {
    wp_enqueue_script('fontawesome', 'https://kit.fontawesome.com/a2be051007.js', );
}

add_action('wp_head', 'register_styles');
add_action('wp_footer', 'register_scripts');