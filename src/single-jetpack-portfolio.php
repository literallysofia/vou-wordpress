<?php

/**
 * The Template for displaying all single portfolio posts
 *
 * @package WordPress
 * @subpackage VOU
 * @since VOU 1.0
 */

get_header(); ?>

<main id="single-project" class="page">
    <div class="container-fluid">
        <div class="heading">
            <?php
            $postid = get_the_ID();
            $terms = get_the_terms($postid, 'jetpack-portfolio-type');
            if (!empty($terms)) {
                $term = array_shift($terms);
                $category = $term->name;
            }
            $color = sanitize_hex_color(get_field('wp_project_color'));
            $style = "box-shadow: -25px -25px 0px 0px " .  $color . ";";

            $icon = get_field('wp_project_icon');
            $email = sanitize_email(get_field('wp_project_email'));
            ?>
            <h2><?php echo $category ?></h2>
            <div class="d-flex align-items-center">
                <h1><?php the_title(); ?></h1>
                <?php if ($icon) : ?>
                    <img src="<?php echo esc_url($icon) ?>" alt="<?php echo get_the_title() . ' icon' ?>" class="project-icon" />
                <?php endif; ?>
            </div>

        </div>
        <div class="row">
            <div class="col-sm-12 col-md-6">
                <?php the_post_thumbnail('post-thumbnail', ['class' => 'img-fluid thumbnail', 'alt' => get_the_title() . ' thumbnail', 'style' => $style]); ?>
            </div>
            <div class="col-sm-12 col-md-6">
                <?php if (have_posts()) : while (have_posts()) : the_post();
                        the_content();
                    endwhile;
                endif; ?>
                <?php if ($email) : ?>
                    <div class="d-flex align-items-center">
                        <i class="fas fa-envelope"></i>
                        <span><?php echo $email ?></span>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</main>
<?php get_footer(); ?>