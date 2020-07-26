<?php

/**
 * The front page template file
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
                <?php if (get_theme_mod('banner_show_button', '1')) : ?>
                    <a class="btn btn-primary" href="<?php echo get_permalink(get_theme_mod('banner_button_url')); ?>" role="button"><?php echo get_theme_mod('banner_button_text', 'Inscrições'); ?></a>
                <?php endif; ?>
            </div>
            <div class="col-sm-12 col-md-6">
                <img src="<?php header_image(); ?>" class="img-fluid" alt="Header Image">
            </div>
        </div>
    </div>
    <?php if (get_theme_mod('banner_show_mouse', '1')) : ?>
        <div class="scroll-downs">
            <div class="mousey">
                <div class="scroller"></div>
            </div>
        </div>
    <?php endif; ?>
</div>

<main id="homepage">
    <div class="about section container-fluid">
        <div class="heading">
            <h2><?php echo get_theme_mod('about_subtitle', 'Os nossos planos'); ?></h2>
            <h1><?php echo get_theme_mod('about_title', 'Quem somos'); ?></h1>
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
    <div class="divider section">
        <div class="row">
            <div class="col-sm-12 col-md-6" style="background-image: url('<?php echo esc_url(get_theme_mod('divider_image', get_template_directory_uri() . '/assets/images/default-divider.png')); ?>');">
            </div>
            <div class="col-sm-12 col-md-6 d-flex flex-column justify-content-center align-items-start">
                <div class="heading">
                    <h2><?php echo get_theme_mod('divider_subtitle', 'Queres mudar o mundo?'); ?></h2>
                    <h1><?php echo get_theme_mod('divider_title', 'Banco de Voluntariado'); ?></h1>
                </div>
                <p><?php echo get_theme_mod('divider_text', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis blandit ante in scelerisque cursus. Integer vel est vel neque condimentum bibendum eget in augue.'); ?></p>
                <?php if (get_theme_mod('divider_show_button', '1')) : ?>
                    <a class="btn btn-primary" href="<?php echo get_permalink(get_theme_mod('divider_button_url')); ?>" role="button"><?php echo get_theme_mod('divider_button_text', 'Inscrições'); ?></a>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="projects section container-fluid">
        <div class="left">
            <div class="row">
                <div class="col-sm-12 col-md-6">
                    <div class="image-container">
                        <img src="<?php echo esc_url(get_theme_mod('projects_image', get_template_directory_uri() . '/assets/images/default-projects.png')); ?>" class="img-fluid" alt="Projects Image">
                    </div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="heading">
                        <h2><?php echo get_theme_mod('projects_subtitle', 'Os nossos projetos'); ?></h2>
                        <h1><?php echo get_theme_mod('projects_title', 'Projetos'); ?></h1>
                    </div>
                    <p><?php echo get_theme_mod('projects_text', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis blandit ante in scelerisque cursus. Integer vel est vel neque condimentum bibendum eget in augue.'); ?></p>
                    <a class="btn btn-primary" href="<?php echo get_permalink(get_theme_mod('projects_button_url')); ?>" role="button"><?php echo get_theme_mod('projects_button_text', 'Ver Todos'); ?></a>
                </div>
            </div>
        </div>
        <div class="right">
            <div class="row">
                <div class="col-sm-12 col-md-6">
                    <div class="heading">
                        <h2><?php echo get_theme_mod('dep_subtitle', 'Os nossos núcleos'); ?></h2>
                        <h1><?php echo get_theme_mod('dep_title', 'Núcleos'); ?></h1>
                    </div>
                    <p><?php echo get_theme_mod('dep_text', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis blandit ante in scelerisque cursus. Integer vel est vel neque condimentum bibendum eget in augue.'); ?></p>
                    <a class="btn btn-primary" href="<?php echo get_permalink(get_theme_mod('dep_button_url')); ?>" role="button"><?php echo get_theme_mod('dep_button_text', 'Ver Todos'); ?></a>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="image-container">
                        <img src="<?php echo esc_url(get_theme_mod('dep_image', get_template_directory_uri() . '/assets/images/default-dep.png')); ?>" class="img-fluid" alt="Departments Image">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="counter section">
        <div class="counter-container">
            <div class="row">
                <div class="col-sm-12 col-md-4">
                    <i class="fas fa-briefcase"></i>
                    <h1 class="counter-number" value="<?php echo get_theme_mod('counter_number_1', '20'); ?>">0</h1>
                    <span><?php echo get_theme_mod('counter_title_1', 'Projetos'); ?></span>
                </div>
                <div class="col-sm-12 col-md-4">
                    <i class="fas fa-hands-helping"></i>
                    <h1 class="counter-number" value="<?php echo get_theme_mod('counter_number_2', '5'); ?>">0</h1>
                    <span><?php echo get_theme_mod('counter_title_2', 'Núcleos'); ?></span>
                </div>
                <div class="col-sm-12 col-md-4">
                    <i class="fas fa-heart"></i>
                    <h1 class="counter-number" value="<?php echo get_theme_mod('counter_number_3', '2000'); ?>">0</h1>
                    <span><?php echo get_theme_mod('counter_title_3', 'Voluntários'); ?></span>
                </div>
            </div>
        </div>
    </div>
    <?php
    $news_query = new WP_Query(array(
        'posts_per_page' => 3,
    ));

    if ($news_query->have_posts()) : ?>
        <div class="news section container-fluid">
            <div class="d-flex justify-content-between align-items-center flex-wrap">
                <div class="heading">
                    <h2><?php echo get_theme_mod('news_subtitle', 'Últimas novidades'); ?></h2>
                    <h1><?php echo get_theme_mod('news_title', 'Notícias'); ?></h1>
                </div>
                <a class="btn btn-primary" href="<?php echo get_permalink(get_option('page_for_posts')); ?>" role="button"><?php echo get_theme_mod('news_button_text', 'Ver Mais'); ?></a>
            </div>
            <div class="row">
                <?php while ($news_query->have_posts()) : $news_query->the_post(); ?>
                    <div class="col-sm-12 col-md-4">
                        <a href="<?php the_permalink(); ?>">
                            <?php the_post_thumbnail('post-thumbnail', ['class' => 'img-fluid', 'alt' => get_the_title()]); ?>
                        </a>
                        <h3>
                            <a href="<?php the_permalink(); ?>">
                                <?php the_title(); ?>
                            </a>
                        </h3>
                        <span><?php echo get_the_date(); ?></span>
                    </div>
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
            </div>
            <div class="news-end"></div>
        </div>
    <?php endif; ?>
    <div class="contact section container-fluid">
        <div class="text-center">
            <img src="<?php echo esc_url(get_theme_mod('contact_image', get_template_directory_uri() . '/assets/images/tsurutransp.png')); ?>" class="img-fluid" alt="Responsive image">
        </div>
        <div class="heading">
            <h2><?php echo get_theme_mod('contact_subtitle', 'Fala Connosco'); ?></h2>
            <h1><?php echo get_theme_mod('contact_title', 'Contactos'); ?></h1>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-6">
                <?php get_template_part('template-parts/contact-form', 'part'); ?>
            </div>
            <div class="col-sm-12 col-md-6">
                <?php if (is_active_sidebar('map-area')) : ?>
                    <?php dynamic_sidebar('map-area'); ?>
                <?php endif; ?>
                <div class="contacts">
                    <?php if (get_theme_mod('contact_address')) : ?>
                        <div class="d-flex align-items-center">
                            <i class="fas fa-map-marker-alt"></i>
                            <p><?php echo get_theme_mod('contact_address'); ?></p>
                        </div>
                    <?php endif; ?>
                    <?php if (get_theme_mod('contact_email')) : ?>
                        <div class="d-flex align-items-center">
                            <i class="fas fa-envelope"></i>
                            <p><?php echo get_theme_mod('contact_email'); ?></p>
                        </div>
                    <?php endif; ?>
                    <?php if (get_theme_mod('contact_phone')) : ?>
                        <div class="d-flex align-items-center">
                            <i class="fas fa-phone"></i>
                            <p><?php echo get_theme_mod('contact_phone'); ?></p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <?php if (get_theme_mod('insta_show_button', '1')) : ?>
        <div id="instagram" class="d-flex flex-column">
            <span><?php echo get_theme_mod('insta_title', 'Segue-nos no Instagram!'); ?></span>
            <?php echo do_shortcode('[instagram-feed]') ?>
        </div>
    <?php endif; ?>
</main>

<?php get_footer(); ?>