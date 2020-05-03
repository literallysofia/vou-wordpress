<?php

/**
 * Include Bootstrap
 */
require_once('bs4navwalker.php');

function themevou_enqueue_styles()
{

    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/assets/bootstrap/css/bootstrap.min.css');
    wp_enqueue_style('core', get_template_directory_uri() . '/style.css');
}
add_action('wp_enqueue_scripts', 'themevou_enqueue_styles');

function themevou_enqueue_scripts()
{
    wp_enqueue_script('bootstrap', get_template_directory_uri() . '/assets/bootstrap/js/bootstrap.bundle.min.js', array('jquery'));
    wp_enqueue_script('script', get_template_directory_uri() . '/assets/js/scripts.js', array(), '', true);
}
add_action('wp_enqueue_scripts', 'themevou_enqueue_scripts');

/**
 * Header logo and navigation menu
 */
register_nav_menu('header-menu', 'Header Menu');

function themevou_custom_logo_setup()
{
    $defaults = array(
        'height'      => 250,
        'width'       => 250,
        'flex-width'  => true,
        'header-text' => array('site-title', 'site-description'),
    );
    add_theme_support('custom-logo', $defaults);
}
add_action('after_setup_theme', 'themevou_custom_logo_setup');

function themevou_custom_header_setup()
{
    $defaults = array(
        // Default Header Image to display
        'default-image'         => get_template_directory_uri() . '/assets/images/default-header.png',
        // Display the header text along with the image
        'header-text'           => true,
        // Header text color default
        'default-text-color'        => '000',
        // Header image width (in pixels)
        'width'             => 1740,
        // Header image height (in pixels)
        'height'            => 1334
    );
    add_theme_support('custom-header', $defaults);
}
add_action('after_setup_theme', 'themevou_custom_header_setup');


/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';
add_theme_support( 'post-thumbnails' );
