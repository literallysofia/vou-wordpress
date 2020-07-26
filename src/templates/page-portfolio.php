<?php

/**
 * Template Name: Portfolio
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
        <div id="portfolio" class="page-content">
            <?php
            $taxonomy = 'jetpack-portfolio-type';
            $parent_term = get_term_by('slug', $post->post_name,  $taxonomy);

            foreach (get_terms(array(
                'order' => 'DES',
                'taxonomy'      => $taxonomy,
                'parent'        => $parent_term->term_id
            )) as $cat) : ?>
                <div class="row">
                    <div class="col-sm-12 col-md-2">
                        <img src="<?php echo z_taxonomy_image_url($cat->term_id); ?>" class="img-fluid project-type" alt="<?php echo $cat->name; ?>">
                    </div>
                    <?php
                    $project_query = new WP_Query(array(
                        'post_type' => 'jetpack-portfolio',
                        'orderby' => 'ID',
                        'order' => 'ASC',
                        'tax_query'      => array(
                            array(
                                'taxonomy' => 'jetpack-portfolio-type',
                                'field'    => 'name',
                                'terms'    => $cat->name
                            )
                        ),
                    ));

                    if ($project_query->have_posts()) :
                    ?>
                        <div class="col-sm-12 col-md-10 project-grid">
                            <div class="row">
                                <?php while ($project_query->have_posts()) : $project_query->the_post(); ?>
                                    <div class="col-sm-12 col-md-6 project">
                                        <?php
                                        $color = sanitize_hex_color(get_field('wp_project_color'));
                                        $style = "box-shadow: -25px -25px 0px 0px " .  $color . ";";
                                        the_post_thumbnail('post-thumbnail', ['class' => 'img-fluid', 'alt' => get_the_title(), 'style' => $style]);
                                        ?>
                                        <h3><?php the_title(); ?></h3>
                                        <a class="btn btn-primary" href="<?php the_permalink(); ?>" role="button">Saber Mais</a>
                                    </div>
                                <?php endwhile; ?>
                            </div>
                        </div>
                        <?php wp_reset_postdata(); ?>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</main>

<?php get_footer(); ?>