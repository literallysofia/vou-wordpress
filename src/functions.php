<?php

/**
 * Include Bootstrap
 */
require_once('bs4navwalker.php');
require_once dirname(__FILE__) . '/inc/class-tgm-plugin-activation.php';

add_action('tgmpa_register', 'my_theme_register_required_plugins');

/**
 * Register the required plugins for this theme.
 *
 *  <snip />
 *
 * This function is hooked into tgmpa_init, which is fired within the
 * TGM_Plugin_Activation class constructor.
 */
function my_theme_register_required_plugins()
{
	/*
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(
		array(
			'name'      => 'Permalink Manager Lite',
			'slug'      => 'permalink-manager',
			'required'  => true,
			'force_activation' => true,
		),
		array(
			'name'      => 'Font Awesome',
			'slug'      => 'font-awesome',
			'required'  => true,
			'force_activation' => true,
		),
		array(
			'name'      => 'Instagram Feed',
			'slug'      => 'instagram-feed',
			'required'  => true,
			'force_activation' => true,
		),
		array(
			'name'      => 'JetPack',
			'slug'      => 'jetpack',
			'required'  => true,
			'force_activation' => true,
		),
		array(
			'name'      => 'WP Subtitle',
			'slug'      => 'wp-subtitle',
			'required'  => true,
			'force_activation' => true,
		),
		array(
			'name'      => 'Categories Images',
			'slug'      => 'categories-images',
			'required'  => true,
			'force_activation' => true,
		),
		array(
			'name'      => 'Advanced Custom Fields',
			'slug'      => 'advanced-custom-fields',
			'required'  => true,
			'force_activation' => true,
		)
	);

	/*
	 * Array of configuration settings. Amend each line as needed.
	 *
	 * TGMPA will start providing localized text strings soon. If you already have translations of our standard
	 * strings available, please help us make TGMPA even better by giving us access to these translations or by
	 * sending in a pull-request with .po file(s) with the translations.
	 *
	 * Only uncomment the strings in the config array if you want to customize the strings.
	 */
	$config = array(
		'id'           => 'tgmpa',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'parent_slug'  => 'themes.php',            // Parent menu slug.
		'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.
	);

	tgmpa($plugins, $config);
}

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
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

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

add_theme_support('post-thumbnails');

function remove_custom_fields_from_posts()
{
	remove_post_type_support('post', 'wps_subtitle');
}

add_action('init', 'remove_custom_fields_from_posts');

function remove_toolbar_items()
{
	remove_menu_page('edit-comments.php');
}

add_action('admin_menu', 'remove_toolbar_items');

function create_posttype()
{

	register_post_type(
		'faq',
		// CPT Options
		array(
			'labels' => array(
				'name' => __('FAQs'),
				'singular_name' => __('FAQ'),
				'all_items' => __('All FAQs')
			),
			'public' => true,
			'has_archive' => false,
			'rewrite' => array('slug' => 'faq'),
			'menu_icon' => 'dashicons-format-chat',
			'supports' => array('title', 'editor')
		)
	);

	register_post_type(
		'member',
		// CPT Options
		array(
			'labels' => array(
				'name' => __('Members'),
				'singular_name' => __('Member'),
				'all_items' => __('All Members')
			),
			'public' => true,
			'has_archive' => false,
			'rewrite' => array('slug' => 'member'),
			'menu_icon' => 'dashicons-heart',
			'supports' => array('title', 'editor', 'author', 'thumbnail', 'custom-fields')
		)
	);
}
// Hooking up our function to theme setup
add_action('init', 'create_posttype');
