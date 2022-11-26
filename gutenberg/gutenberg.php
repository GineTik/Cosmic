<?php

function register_block_styles() {
    wp_enqueue_script(
        'block-styles',
        get_template_directory_uri() . '/gutenberg/register-block-styles.js',
        array('wp-blocks')
    );
}

function register_block_types() {
    wp_enqueue_script(
        'block-types',
        get_template_directory_uri() . '/gutenberg/register-block-types.js',
        array('wp-blocks', 'wp-element', 'wp-i18n', 'wp-block-editor')
    );
}

add_action('enqueue_block_editor_assets', 'register_block_styles');
add_action('enqueue_block_editor_assets', 'register_block_types');