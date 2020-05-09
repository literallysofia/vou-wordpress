<?php

/**
 * Template Name: About
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
        $members_query = new WP_Query(array(
            'post_type' => 'member',
            'order'    => 'ASC'
        ));
        if ($members_query->have_posts()) : ?>
            <div id="members" class="page-content">
                <h3><?php echo $title ?></h3>
                <div class="row justify-content-center">
                    <?php while ($members_query->have_posts()) : $members_query->the_post(); ?>
                        <div class="member col-sm-12 col-md-6 col-lg-4 col-xl-3">
                            <?php the_post_thumbnail('post-thumbnail', ['class' => 'rounded-circle img-fluid', 'alt' => get_the_title()]); ?>
                            <h4><?php the_title(); ?></h4>
                            <span><?php echo get_field('wp_member_role'); ?></span>
                        </div>
                    <?php endwhile; ?>
                    <?php wp_reset_postdata(); ?>
                </div>
            </div>
        <?php endif; ?>
    </div>
</main>

<?php get_footer(); ?>