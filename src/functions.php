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
 * Customize Admin Panel
 * Although the sanitize_callback parameter is optional, if you’re submitting your theme to the WordPress.org Theme Directory, it’s part of their requirement that every call to add_setting must specify a sanitization function. 
 */

function themevou_customize_register($wp_customize)
{
    // BANNER
    $wp_customize->add_section('banner_section', array(
        'title'    => __('Banner', 'banner'),
        'priority' => 50
    ));

    $wp_customize->add_setting('banner_title_text', array(
        'capability' => 'edit_theme_options',
        'default' => 'Vem ser VO.U.',
        'sanitize_callback' => 'sanitize_text_field'
    ));

    $wp_customize->add_control('banner_title_text', array(
        'type' => 'text',
        'section' => 'banner_section',
        'label' => __('Title'),
        'description' => __('Write a catchy headline.')
    ));

    $wp_customize->add_setting('banner_description_text', array(
        'capability' => 'edit_theme_options',
        'default' => 'Na VO.U. Associação de Voluntariado Universitário acreditamos no conceito de Ensino Superior Solidário!',
        'sanitize_callback' => 'sanitize_textarea_field'
    ));

    $wp_customize->add_control('banner_description_text', array(
        'type' => 'textarea',
        'section' => 'banner_section',
        'label' => __('Description'),
        'description' => __('Explain further.')
    ));

    $wp_customize->add_setting('banner_button_text', array(
        'capability' => 'edit_theme_options',
        'default' => 'Saber Mais',
        'sanitize_callback' => 'sanitize_text_field'
    ));

    $wp_customize->add_control('banner_button_text', array(
        'type' => 'text',
        'section' => 'banner_section',
        'label' => __('Button')
    ));

    $wp_customize->add_setting('banner_show_button', array(
        'default'    => '1'
    ));

    $wp_customize->add_control('banner_show_button', array(
        'type' => 'checkbox',
        'section' => 'banner_section',
        'label' => __('Display Button')
    ));

    // FOOTER
    $wp_customize->add_section('footer_section', array(
        'title'    => __('Footer', 'footer'),
        'priority' => 105
    ));

    $wp_customize->add_setting('footer_text', array(
        'capability' => 'edit_theme_options',
        'default' => 'Copyright 2020 VO.U. Todos os direitos reservados.',
        'sanitize_callback' => 'sanitize_text_field'
    ));

    $wp_customize->add_control('footer_text', array(
        'type' => 'text',
        'section' => 'footer_section',
        'label' => __('Footer'),
        'description' => __('Copyright information.')
    ));

    $wp_customize->add_setting('footer_facebook', array(
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'esc_url_raw'
    ));

    $wp_customize->add_control('footer_facebook', array(
        'type' => 'text',
        'section' => 'footer_section',
        'label' => __('Facebook URL')
    ));

    $wp_customize->add_setting('footer_instagram', array(
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'esc_url_raw'
    ));

    $wp_customize->add_control('footer_instagram', array(
        'type' => 'text',
        'section' => 'footer_section',
        'label' => __('Instagram URL')
    ));

    $wp_customize->add_setting('footer_twitter', array(
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'esc_url_raw'
    ));

    $wp_customize->add_control('footer_twitter', array(
        'type' => 'text',
        'section' => 'footer_section',
        'label' => __('Twitter URL')
    ));

    $wp_customize->add_setting('footer_linkedin', array(
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'esc_url_raw'
    ));

    $wp_customize->add_control('footer_linkedin', array(
        'type' => 'text',
        'section' => 'footer_section',
        'label' => __('LinkedIn URL')
    ));

    $wp_customize->add_setting('footer_youtube', array(
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'esc_url_raw'
    ));

    $wp_customize->add_control('footer_youtube', array(
        'type' => 'text',
        'section' => 'footer_section',
        'label' => __('Youtube URL')
    ));
}
add_action('customize_register', 'themevou_customize_register');
