<!DOCTYPE html>
<html <?php bloginfo('language'); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title(); ?></title>

    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<header class="header container">
    <div class="header__logo"><?php echo bloginfo('name'); ?></div>
    <span class="header__description"><?php echo bloginfo('description'); ?></span>
    <nav class="header__navbar navbar">
        <div class="navbar__item navbar__menu">Меню</div>
        <a class="navbar__item navbar__icon">
            <i class="fa-solid fa-envelope"></i>
        </a>
        <a class="navbar__item navbar__icon">
            <i class="fa-solid fa-phone"></i>
        </a>
    </nav>
</header>