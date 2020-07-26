<?php

/**
 * Template Name: Contact
 *
 * @package WordPress
 * @subpackage VOU
 * @since VOU 1.0
 */

get_header(); ?>

<main class="page">
    <div class="contact container-fluid">
        <div class="heading">
            <?php do_action('plugins/wp_subtitle/the_subtitle', array(
                'before'        => '<h2>',
                'after'         => '</h2>',
                'post_id'       => get_the_ID(),
                'default_value' => ''
            )); ?>
            <h1><?php echo wp_title(''); ?></h1>
        </div>
        <?php if (have_posts()) : while (have_posts()) : the_post();
                if ($post->post_content) : ?>
                    <div class="content">
                        <?php the_content(); ?>
                    </div>
        <?php endif;
            endwhile;
        endif; ?>
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
</main>

<?php get_footer(); ?>