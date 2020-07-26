<?php

/**
 * Template Name: FAQ
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
        $faq_query = new WP_Query(array(
            'post_type' => 'faq',
            'order'    => 'ASC'
        ));
        if ($faq_query->have_posts()) : ?>
            <div class="accordion page-content" id="accordion">
                <?php while ($faq_query->have_posts()) : $faq_query->the_post(); ?>
                    <div class="card mb-3">
                        <div class="card-header collapsed" id="heading<?php echo get_the_ID() ?>" data-toggle="collapse" data-target="#collapse<?php echo get_the_ID() ?>" aria-expanded="false" aria-controls="collapse<?php echo get_the_ID() ?>">
                            <h3 class="d-flex align-items-center justify-content-between"><?php the_title(); ?></h3>
                        </div>
                        <div id="collapse<?php echo get_the_ID() ?>" class="collapse" aria-labelledby="heading<?php echo get_the_ID() ?>" data-parent="#accordion">
                            <div class="card-body">
                                <?php the_content(); ?>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
            </div>
        <?php endif; ?>
    </div>
</main>

<?php get_footer(); ?>