<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    <title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>

    <meta name="description" content="">
    <meta name="author" content="">

    <meta name="viewport" content="width=device-width">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <a class="navbar-brand" href="#">
            <img src="<?php bloginfo('template_url'); ?>/assets/images/logo.png" class="img-fluid" alt="Logo">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <?php
        wp_nav_menu([
            'menu'            => 'primary',
            'theme_location'  => 'menu-1',
            'container'       => 'div',
            'container_id'    => 'navbarCollapse',
            'container_class' => 'collapse navbar-collapse',
            'menu_id'         => false,
            'menu_class'      => 'navbar-nav mr-auto',
            'depth'           => 0,
            'fallback_cb'     => 'bs4navwalker::fallback',
            'walker'          => new bs4navwalker()
        ]);
        ?>
    </nav>