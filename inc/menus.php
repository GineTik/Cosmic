<?php

function register_menus() {
    register_nav_menu('header_menu', __( 'Header menu' ));
    register_nav_menu('social_networks_menu', __( 'Menu with social networks' ));
}

add_action('init', 'register_menus');