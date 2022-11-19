<?php

function register_menus() {
    register_nav_menu('header_menu', __( 'Header menu' ));
}

add_action( 'init', 'register_menus' );