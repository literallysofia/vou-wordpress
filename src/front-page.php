<?php

/**
 * The front page template file
 *
 * If the user has selected a static page for their homepage, this is what will
 * appear.
 * Learn more: https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage VOU
 * @since VOU 1.0
 * @version 1.0
 */

get_header(); ?>

<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <div class="row d-flex align-items-center">
            <div class="col-sm-12 col-md-6">
                <h1><?php echo get_theme_mod('banner_title_text', 'Vem ser VO.U.'); ?></h1>
                <p class="lead"><?php echo get_theme_mod('banner_description_text', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis blandit ante in scelerisque cursus. Integer vel est vel neque condimentum bibendum eget in augue. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Integer imperdiet venenatis nisi id vestibulum. Integer gravida ut ipsum vitae tristique.'); ?></p>
                <?php if (get_theme_mod('banner_show_button'))
                    echo '<button type="button" class="btn btn-primary">' . get_theme_mod('banner_button_text', 'Saber Mais') . '</button>';
                ?>
            </div>
            <div class="col-sm-12 col-md-6">
                <img src="<?php header_image(); ?>" class="img-fluid" alt="Header Image">
            </div>
        </div>
    </div>
</div>

<main class="container-fluid">
    <div id="about" class="section">
        <div class="heading">
            <h2><?php echo get_theme_mod('about_subtitle', 'Os nossos planos') ?></h2>
            <h1><?php echo get_theme_mod('about_title', 'Quem somos') ?></h1>
        </div>

        <div class="row">
            <div class="col-4 d-flex flex-column align-items-center">
                <img src="<?php echo esc_url(get_theme_mod('about_image_1', get_template_directory_uri() . '/assets/images/vida.png')); ?>" class="img-fluid" alt="About Image 1">
                <p><?php echo get_theme_mod('about_text_1', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis blandit ante in scelerisque cursus. Integer vel est vel neque condimentum bibendum eget in augue.'); ?></p>
            </div>
            <div class="col-4 d-flex flex-column align-items-center">
                <img src="<?php echo esc_url(get_theme_mod('about_image_2', get_template_directory_uri() . '/assets/images/mundo.png')); ?>" class="img-fluid" alt="Header Image">
                <p><?php echo get_theme_mod('about_text_2', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis blandit ante in scelerisque cursus. Integer vel est vel neque condimentum bibendum eget in augue.'); ?></p>
            </div>
            <div class="col-4 d-flex flex-column align-items-center">
                <img src="<?php echo esc_url(get_theme_mod('about_image_3', get_template_directory_uri() . '/assets/images/ponte.png')); ?>" class="img-fluid" alt="Header Image">
                <p><?php echo get_theme_mod('about_text_3', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis blandit ante in scelerisque cursus. Integer vel est vel neque condimentum bibendum eget in augue.'); ?></p>
            </div>

        </div>
    </div>
</main>

<?php
get_footer();
