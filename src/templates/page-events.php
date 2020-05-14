<?php

/**
 * Template Name: Events
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
        <div id="events" class="page-content">
            <?php
            $taxonomy = 'jetpack-portfolio-type';
            $term = get_term_by('slug', $post->post_name,  $taxonomy);

            $dep_query = new WP_Query(array(
                'post_type' => 'jetpack-portfolio',
                'orderby' => 'title',
                'order' => 'ASC',
                'tax_query'      => array(
                    array(
                        'taxonomy' => 'jetpack-portfolio-type',
                        'field'    => 'id',
                        'terms'    => $term->term_id
                    )
                ),
            ));
            if ($dep_query->have_posts()) {
                $align = 1;
                while ($dep_query->have_posts()) : $dep_query->the_post();
                    if ($align % 2 != 0)
                        get_template_part('template-parts/event-left', 'part');
                    else get_template_part('template-parts/event-right', 'part');
                    $align++;
                endwhile;
                wp_reset_postdata();
            }
            ?>
        </div>
    </div>
</main>

<?php get_footer(); ?>