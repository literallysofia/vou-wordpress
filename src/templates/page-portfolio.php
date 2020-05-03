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
        <div class="content">
            <?php if (have_posts()) : while (have_posts()) : the_post();
                    the_content();
                endwhile;
            else : ?>
                <p>Sorry, no posts matched your criteria.</p>
            <?php endif; ?>
        </div>
        <div id="portfolio">
            <?php foreach (get_terms('jetpack-portfolio-type') as $cat) : ?>
                <div class="row">
                    <div class="col-sm-12 col-md-2">
                        <img src="<?php echo z_taxonomy_image_url($cat->term_id); ?>" class="img-fluid project-type" alt="<?php echo $cat->cat_name; ?>">
                    </div>
                    <?php
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

                    if ($project_query->have_posts()) :
                    ?>
                        <div class="col-sm-12 col-md-10 project-grid">
                            <div class="row">
                                <?php while ($project_query->have_posts()) : $project_query->the_post(); ?>
                                    <div class="col-sm-12 col-md-6 project">
                                        <?php the_post_thumbnail('post-thumbnail', ['class' => 'img-fluid', 'alt' => esc_html(get_the_title())]); ?>
                                        <h2><?php the_title(); ?></h2>
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