<?php

/**
 * Template Name: Partners
 *
 * @package WordPress
 * @subpackage VOU
 * @since VOU 1.0
 */

get_header(); ?>

<main class="page">
    <div class="container-fluid">
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
                    <div>
                        <?php the_content(); ?>
                    </div>
        <?php endif;
            endwhile;
        endif; ?>

        <?php
        $title = get_field('wp_members_title');
        $partner_query = new WP_Query(array(
            'post_type' => 'partner',
            'order'    => 'ASC'
        ));
        if ($partner_query->have_posts()) : ?>
            <div class="row justify-content-center">
                <?php while ($partner_query->have_posts()) : $partner_query->the_post(); ?>
                    <div class="col-6 col-md-4 col-lg-2">
                        <?php the_post_thumbnail('post-thumbnail', ['class' => 'img-fluid', 'alt' => get_the_title()]); ?>
                    </div>
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
            </div>
        <?php endif; ?>
    </div>
</main>

<?php get_footer(); ?>