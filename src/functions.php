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
 * Customize Admin Panel
 * Although the sanitize_callback parameter is optional, if you’re submitting your theme to the WordPress.org Theme Directory, it’s part of their requirement that every call to add_setting must specify a sanitization function. 
 */

function themevou_customize_register($wp_customize)
{
    $wp_customize->add_panel(
        'homepage_panel',
        array(
            'title' => __('Homepage'),
            'description' => __('Customize your front page.'),
            'priority' => 50
        )
    );
    // BANNER
    $wp_customize->add_section('banner_section', array(
        'title'    => __('Banner', 'banner'),
        'panel' => 'homepage_panel'
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
        'label' => __('Button Text')
    ));

    $wp_customize->add_setting('banner_button_url', array(
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'esc_url_raw'
    ));

    $wp_customize->add_control('banner_button_url', array(
        'type' => 'text',
        'section' => 'banner_section',
        'label' => __('Button URL')
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
        'panel' => 'homepage_panel'
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

    // ABOUT
    $wp_customize->add_section('about_section', array(
        'title'    => __('About', 'about'),
        'panel' => 'homepage_panel'
    ));

    $wp_customize->add_setting('about_title', array(
        'capability' => 'edit_theme_options',
        'default' => 'Quem Somos',
        'sanitize_callback' => 'sanitize_text_field'
    ));

    $wp_customize->add_control('about_title', array(
        'type' => 'text',
        'section' => 'about_section',
        'label' => __('Title')
    ));

    $wp_customize->add_setting('about_subtitle', array(
        'capability' => 'edit_theme_options',
        'default' => 'Os nossos planos',
        'sanitize_callback' => 'sanitize_text_field'
    ));

    $wp_customize->add_control('about_subtitle', array(
        'type' => 'text',
        'section' => 'about_section',
        'label' => __('Subtitle')
    ));

    $wp_customize->add_setting(
        'about_image_1',
        array(
            'default' => get_template_directory_uri() . '/assets/images/vida.png',
            'transport' => 'refresh',
            'sanitize_callback' => 'esc_url_raw'
        )
    );

    $wp_customize->add_control(new WP_Customize_Image_Control(
        $wp_customize,
        'about_image_1',
        array(
            'label' => __('First Image'),
            'description' => __('Choose an image for the first column.'),
            'section' => 'about_section'
        )
    ));

    $wp_customize->add_setting('about_text_1', array(
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_textarea_field'
    ));

    $wp_customize->add_control('about_text_1', array(
        'type' => 'textarea',
        'section' => 'about_section',
        'label' => __('First Text'),
        'description' => __('Write a description for the first column.')
    ));

    $wp_customize->add_setting(
        'about_image_2',
        array(
            'default' => get_template_directory_uri() . '/assets/images/mundo.png',
            'transport' => 'refresh',
            'sanitize_callback' => 'esc_url_raw'
        )
    );

    $wp_customize->add_control(new WP_Customize_Image_Control(
        $wp_customize,
        'about_image_2',
        array(
            'label' => __('Second Image'),
            'description' => __('Choose an image for the second column.'),
            'section' => 'about_section'
        )
    ));

    $wp_customize->add_setting('about_text_2', array(
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_textarea_field'
    ));

    $wp_customize->add_control('about_text_2', array(
        'type' => 'textarea',
        'section' => 'about_section',
        'label' => __('Second Text'),
        'description' => __('Write a description for the second column.')
    ));

    $wp_customize->add_setting(
        'about_image_3',
        array(
            'default' => get_template_directory_uri() . '/assets/images/ponte.png',
            'transport' => 'refresh',
            'sanitize_callback' => 'esc_url_raw'
        )
    );

    $wp_customize->add_control(new WP_Customize_Image_Control(
        $wp_customize,
        'about_image_3',
        array(
            'label' => __('Third Image'),
            'description' => __('Choose an image for the third column.'),
            'section' => 'about_section'
        )
    ));

    $wp_customize->add_setting('about_text_3', array(
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_textarea_field'
    ));

    $wp_customize->add_control('about_text_3', array(
        'type' => 'textarea',
        'section' => 'about_section',
        'label' => __('Third Text'),
        'description' => __('Write a description for the third column.')
    ));

    // DIVIDER
    $wp_customize->add_section('divider_section', array(
        'title'    => __('Divider', 'divider'),
        'panel' => 'homepage_panel'
    ));

    $wp_customize->add_setting('divider_title', array(
        'capability' => 'edit_theme_options',
        'default' => 'Banco de Voluntariado',
        'sanitize_callback' => 'sanitize_text_field'
    ));

    $wp_customize->add_control('divider_title', array(
        'type' => 'text',
        'section' => 'divider_section',
        'label' => __('Title')
    ));

    $wp_customize->add_setting('divider_subtitle', array(
        'capability' => 'edit_theme_options',
        'default' => 'Queres mudar o mundo?',
        'sanitize_callback' => 'sanitize_text_field'
    ));

    $wp_customize->add_control('divider_subtitle', array(
        'type' => 'text',
        'section' => 'divider_section',
        'label' => __('Subtitle')
    ));

    $wp_customize->add_setting(
        'divider_image',
        array(
            'default' => get_template_directory_uri() . '/assets/images/default-divider.png',
            'transport' => 'refresh',
            'sanitize_callback' => 'esc_url_raw'
        )
    );

    $wp_customize->add_control(new WP_Customize_Image_Control(
        $wp_customize,
        'divider_image',
        array(
            'label' => __('Image'),
            'section' => 'divider_section'
        )
    ));

    $wp_customize->add_setting('divider_text', array(
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_textarea_field'
    ));

    $wp_customize->add_control('divider_text', array(
        'type' => 'textarea',
        'section' => 'divider_section',
        'label' => __('Description')
    ));


    $wp_customize->add_setting('divider_button_text', array(
        'capability' => 'edit_theme_options',
        'default' => 'Inscrições',
        'sanitize_callback' => 'sanitize_text_field'
    ));

    $wp_customize->add_control('divider_button_text', array(
        'type' => 'text',
        'section' => 'divider_section',
        'label' => __('Button Text')
    ));

    $wp_customize->add_setting('divider_button_url', array(
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'esc_url_raw'
    ));

    $wp_customize->add_control('divider_button_url', array(
        'type' => 'text',
        'section' => 'divider_section',
        'label' => __('Button URL')
    ));

    $wp_customize->add_setting('divider_show_button', array(
        'default'    => '1'
    ));

    $wp_customize->add_control('divider_show_button', array(
        'type' => 'checkbox',
        'section' => 'divider_section',
        'label' => __('Display Button')
    ));

    // PROJECTS
    $wp_customize->add_section('projects_section', array(
        'title'    => __('Projects', 'projects'),
        'panel' => 'homepage_panel'
    ));

    $wp_customize->add_setting('projects_title', array(
        'capability' => 'edit_theme_options',
        'default' => 'Projetos',
        'sanitize_callback' => 'sanitize_text_field'
    ));

    $wp_customize->add_control('projects_title', array(
        'type' => 'text',
        'section' => 'projects_section',
        'label' => __('Title')
    ));

    $wp_customize->add_setting('projects_subtitle', array(
        'capability' => 'edit_theme_options',
        'default' => 'Os nossos projetos',
        'sanitize_callback' => 'sanitize_text_field'
    ));

    $wp_customize->add_control('projects_subtitle', array(
        'type' => 'text',
        'section' => 'projects_section',
        'label' => __('Subtitle')
    ));

    $wp_customize->add_setting(
        'projects_image',
        array(
            'default' => get_template_directory_uri() . '/assets/images/default-projects.png',
            'transport' => 'refresh',
            'sanitize_callback' => 'esc_url_raw'
        )
    );

    $wp_customize->add_control(new WP_Customize_Image_Control(
        $wp_customize,
        'projects_image',
        array(
            'label' => __('Image'),
            'section' => 'projects_section'
        )
    ));

    $wp_customize->add_setting('projects_text', array(
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_textarea_field'
    ));

    $wp_customize->add_control('projects_text', array(
        'type' => 'textarea',
        'section' => 'projects_section',
        'label' => __('Description')
    ));


    $wp_customize->add_setting('projects_button_text', array(
        'capability' => 'edit_theme_options',
        'default' => 'Ver Todos',
        'sanitize_callback' => 'sanitize_text_field'
    ));

    $wp_customize->add_control('projects_button_text', array(
        'type' => 'text',
        'section' => 'projects_section',
        'label' => __('Button Text')
    ));

    $wp_customize->add_setting('projects_button_url', array(
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'esc_url_raw'
    ));

    $wp_customize->add_control('projects_button_url', array(
        'type' => 'text',
        'section' => 'projects_section',
        'label' => __('Button URL')
    ));

    // DEPARTMENTS
    $wp_customize->add_section('dep_section', array(
        'title'    => __('Departments', 'departments'),
        'panel' => 'homepage_panel'
    ));

    $wp_customize->add_setting('dep_title', array(
        'capability' => 'edit_theme_options',
        'default' => 'Núcleos',
        'sanitize_callback' => 'sanitize_text_field'
    ));

    $wp_customize->add_control('dep_title', array(
        'type' => 'text',
        'section' => 'dep_section',
        'label' => __('Title')
    ));

    $wp_customize->add_setting('dep_subtitle', array(
        'capability' => 'edit_theme_options',
        'default' => 'Os nossos núcleos',
        'sanitize_callback' => 'sanitize_text_field'
    ));

    $wp_customize->add_control('dep_subtitle', array(
        'type' => 'text',
        'section' => 'dep_section',
        'label' => __('Subtitle')
    ));

    $wp_customize->add_setting(
        'dep_image',
        array(
            'default' => get_template_directory_uri() . '/assets/images/default-dep.png',
            'transport' => 'refresh',
            'sanitize_callback' => 'esc_url_raw'
        )
    );

    $wp_customize->add_control(new WP_Customize_Image_Control(
        $wp_customize,
        'dep_image',
        array(
            'label' => __('Image'),
            'section' => 'dep_section'
        )
    ));

    $wp_customize->add_setting('dep_text', array(
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_textarea_field'
    ));

    $wp_customize->add_control('dep_text', array(
        'type' => 'textarea',
        'section' => 'dep_section',
        'label' => __('Description')
    ));


    $wp_customize->add_setting('dep_button_text', array(
        'capability' => 'edit_theme_options',
        'default' => 'Ver Todos',
        'sanitize_callback' => 'sanitize_text_field'
    ));

    $wp_customize->add_control('dep_button_text', array(
        'type' => 'text',
        'section' => 'dep_section',
        'label' => __('Button Text')
    ));

    $wp_customize->add_setting('dep_button_url', array(
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'esc_url_raw'
    ));

    $wp_customize->add_control('dep_button_url', array(
        'type' => 'text',
        'section' => 'dep_section',
        'label' => __('Button URL')
    ));

    // COUNTER
    $wp_customize->add_section('counter_section', array(
        'title'    => __('Counter', 'counter'),
        'panel' => 'homepage_panel'
    ));

    $wp_customize->add_setting('counter_title_1', array(
        'capability' => 'edit_theme_options',
        'default' => 'Projetos',
        'sanitize_callback' => 'sanitize_text_field'
    ));

    $wp_customize->add_control('counter_title_1', array(
        'type' => 'text',
        'section' => 'counter_section',
        'label' => __('First Title'),
        'description' => __('An item for the first column.')
    ));

    $wp_customize->add_setting('counter_number_1', array(
        'capability' => 'edit_theme_options',
        'default' => '0',
        'sanitize_callback' => 'sanitize_text_field'
    ));

    $wp_customize->add_control('counter_number_1', array(
        'type' => 'number',
        'section' => 'counter_section',
        'label' => __('First Total'),
        'description' => __('The total number of items.')
    ));

    $wp_customize->add_setting('counter_title_2', array(
        'capability' => 'edit_theme_options',
        'default' => 'Núcleos',
        'sanitize_callback' => 'sanitize_text_field'
    ));

    $wp_customize->add_control('counter_title_2', array(
        'type' => 'text',
        'section' => 'counter_section',
        'label' => __('Second Title'),
        'description' => __('An item for the second column.')
    ));

    $wp_customize->add_setting('counter_number_2', array(
        'capability' => 'edit_theme_options',
        'default' => '0',
        'sanitize_callback' => 'sanitize_text_field'
    ));

    $wp_customize->add_control('counter_number_2', array(
        'type' => 'number',
        'section' => 'counter_section',
        'label' => __('Second Total'),
        'description' => __('The total number of items.')
    ));

    $wp_customize->add_setting('counter_title_3', array(
        'capability' => 'edit_theme_options',
        'default' => 'Voluntários',
        'sanitize_callback' => 'sanitize_text_field'
    ));

    $wp_customize->add_control('counter_title_3', array(
        'type' => 'text',
        'section' => 'counter_section',
        'label' => __('Third Title'),
        'description' => __('An item for the third column.')
    ));

    $wp_customize->add_setting('counter_number_3', array(
        'capability' => 'edit_theme_options',
        'default' => '0',
        'sanitize_callback' => 'sanitize_text_field'
    ));

    $wp_customize->add_control('counter_number_3', array(
        'type' => 'number',
        'section' => 'counter_section',
        'label' => __('Third Total'),
        'description' => __('The total number of items.')
    ));

    // NEWS
    $wp_customize->add_section('news_section', array(
        'title'    => __('News', 'news'),
        'panel' => 'homepage_panel'
    ));

    $wp_customize->add_setting('news_title', array(
        'capability' => 'edit_theme_options',
        'default' => 'Notícias',
        'sanitize_callback' => 'sanitize_text_field'
    ));

    $wp_customize->add_control('news_title', array(
        'type' => 'text',
        'section' => 'news_section',
        'label' => __('Title')
    ));

    $wp_customize->add_setting('news_subtitle', array(
        'capability' => 'edit_theme_options',
        'default' => 'Últimas novidades',
        'sanitize_callback' => 'sanitize_text_field'
    ));

    $wp_customize->add_control('news_subtitle', array(
        'type' => 'text',
        'section' => 'news_section',
        'label' => __('Subtitle')
    ));
}
add_action('customize_register', 'themevou_customize_register');
