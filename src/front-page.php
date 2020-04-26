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
                <?php if (get_theme_mod('banner_show_button', '1'))
                    echo '<a class="btn btn-primary" href="' . get_theme_mod('banner_button_url', '#') . '" role="button">' . get_theme_mod('banner_button_text', 'Saber Mais') . '</a>';
                ?>
            </div>
            <div class="col-sm-12 col-md-6">
                <img src="<?php header_image(); ?>" class="img-fluid" alt="Header Image">
            </div>
        </div>
    </div>
    <div class="scroll-downs">
        <div class="mousey">
            <div class="scroller"></div>
        </div>
    </div>
</div>

<main>
    <div id="about" class="section container-fluid">
        <div class="heading">
            <h2><?php echo get_theme_mod('about_subtitle', 'Os nossos planos') ?></h2>
            <h1><?php echo get_theme_mod('about_title', 'Quem somos') ?></h1>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-4 d-flex flex-column align-items-center">
                <img src="<?php echo esc_url(get_theme_mod('about_image_1', get_template_directory_uri() . '/assets/images/vida.png')); ?>" class="img-fluid" alt="About Image 1">
                <p><?php echo get_theme_mod('about_text_1', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis blandit ante in scelerisque cursus. Integer vel est vel neque condimentum bibendum eget in augue.'); ?></p>
            </div>
            <div class="col-sm-12 col-md-4 d-flex flex-column align-items-center">
                <img src="<?php echo esc_url(get_theme_mod('about_image_2', get_template_directory_uri() . '/assets/images/mundo.png')); ?>" class="img-fluid" alt="About Image 2">
                <p><?php echo get_theme_mod('about_text_2', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis blandit ante in scelerisque cursus. Integer vel est vel neque condimentum bibendum eget in augue.'); ?></p>
            </div>
            <div class="col-sm-12 col-md-4 d-flex flex-column align-items-center">
                <img src="<?php echo esc_url(get_theme_mod('about_image_3', get_template_directory_uri() . '/assets/images/ponte.png')); ?>" class="img-fluid" alt="About Image 3">
                <p><?php echo get_theme_mod('about_text_3', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis blandit ante in scelerisque cursus. Integer vel est vel neque condimentum bibendum eget in augue.'); ?></p>
            </div>
        </div>
    </div>
    <div id="divider" class="section">
        <div class="row">
            <div class="col-sm-12 col-md-6" style="background-image: url('<?php echo esc_url(get_theme_mod('divider_image', get_template_directory_uri() . '/assets/images/default-divider.png')); ?>');">
            </div>
            <div class="col-sm-12 col-md-6 d-flex flex-column justify-content-center align-items-start">
                <div class="heading">
                    <h2><?php echo get_theme_mod('divider_subtitle', 'Queres mudar o mundo?') ?></h2>
                    <h1><?php echo get_theme_mod('divider_title', 'Banco de Voluntariado') ?></h1>
                </div>
                <p><?php echo get_theme_mod('divider_text', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis blandit ante in scelerisque cursus. Integer vel est vel neque condimentum bibendum eget in augue.'); ?></p>
                <?php if (get_theme_mod('divider_show_button', '1'))
                    echo '<a class="btn btn-primary" href="' . get_theme_mod('divider_button_url', '#') . '" role="button">' . get_theme_mod('divider_button_text', 'Inscrições') . '</a>';
                ?>
            </div>
        </div>
    </div>
    <div class="section container-fluid">
        <div id="projects" class="left">
            <div class="row">
                <div class="col-sm-12 col-md-6">
                    <div class="image-container">
                        <img src="<?php echo esc_url(get_theme_mod('projects_image', get_template_directory_uri() . '/assets/images/default-projects.png')); ?>" class="img-fluid" alt="Projects Image">
                    </div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="heading">
                        <h2><?php echo get_theme_mod('projects_subtitle', 'Os nossos projetos') ?></h2>
                        <h1><?php echo get_theme_mod('projects_title', 'Projetos') ?></h1>
                    </div>
                    <p><?php echo get_theme_mod('projects_text', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis blandit ante in scelerisque cursus. Integer vel est vel neque condimentum bibendum eget in augue.'); ?></p>
                    <a class="btn btn-primary" href="<?php echo get_theme_mod('projects_button_url', '#'); ?>" role="button"><?php echo get_theme_mod('projects_button_text', 'Ver Todos'); ?></a>
                </div>
            </div>
        </div>
        <div id="projects" class="right">
            <div class="row">
                <div class="col-sm-12 col-md-6">
                    <div class="heading">
                        <h2><?php echo get_theme_mod('dep_subtitle', 'Os nossos núcleos') ?></h2>
                        <h1><?php echo get_theme_mod('dep_title', 'Núcleos') ?></h1>
                    </div>
                    <p><?php echo get_theme_mod('dep_text', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis blandit ante in scelerisque cursus. Integer vel est vel neque condimentum bibendum eget in augue.'); ?></p>
                    <a class="btn btn-primary" href="<?php echo get_theme_mod('dep_button_url', '#'); ?>" role="button"><?php echo get_theme_mod('dep_button_text', 'Ver Todos'); ?></a>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="image-container">
                        <img src="<?php echo esc_url(get_theme_mod('dep_image', get_template_directory_uri() . '/assets/images/default-dep.png')); ?>" class="img-fluid" alt="Departments Image">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="counter" class="section">
        <div class="counter-container">
            <div class="row">
                <div class="col-sm-12 col-md-4">
                    <i class="fas fa-briefcase"></i>
                    <h1 class="counter-number" value="<?php echo get_theme_mod('counter_number_1', '20') ?>">0</h1>
                    <span><?php echo get_theme_mod('counter_title_1', 'Projetos') ?></span>
                </div>
                <div class="col-sm-12 col-md-4">
                    <i class="fas fa-hands-helping"></i>
                    <h1 class="counter-number" value="<?php echo get_theme_mod('counter_number_2', '5') ?>">0</h1>
                    <span><?php echo get_theme_mod('counter_title_2', 'Núcleos') ?></span>
                </div>
                <div class="col-sm-12 col-md-4">
                    <i class="fas fa-heart"></i>
                    <h1 class="counter-number" value="<?php echo get_theme_mod('counter_number_3', '2000') ?>">0</h1>
                    <span><?php echo get_theme_mod('counter_title_3', 'Voluntários') ?></span>
                </div>
            </div>
        </div>
    </div>
    <div id="news" class="section container-fluid">
        <div class="heading">
            <h2><?php echo get_theme_mod('news_subtitle', 'Últimas novidades') ?></h2>
            <h1><?php echo get_theme_mod('news_title', 'Notícias') ?></h1>
        </div>
    </div>
</main>

<?php
get_footer();
