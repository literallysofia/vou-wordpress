<?php

/**
 * Template Name: Careers
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

        <div id="news" class="page-content">
            <?php
            foreach (get_field('wp_categories') as $cat) {
                $project_query = new WP_Query(array(
                    'post_type' => 'jetpack-portfolio',
                    'tax_query'      => array(
                        array(
                            'taxonomy' => 'jetpack-portfolio-type',
                            'field'    => 'name',
                            'terms'    => $cat->name
                        )
                    ),
                ));

                if ($project_query->have_posts()) {
                    while ($project_query->have_posts()) {
                        $project_query->the_post();
                        set_query_var('cat', $cat->name);
                        get_template_part('template-parts/career', 'part');
                    }
                    wp_reset_postdata();
                }
            }
            ?>
        </div>
    </div>
</main>

<?php get_footer(); ?>