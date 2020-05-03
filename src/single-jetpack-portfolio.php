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
            $terms = get_the_terms(get_the_ID(), 'jetpack-portfolio-type');
            if (!empty($terms)) {
                $term = array_shift($terms);
                $category = $term->name;
            } ?>
            <h2><?php echo $category ?></h2>
            <h1><?php the_title(); ?></h1>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-6">
                <?php the_post_thumbnail('post-thumbnail', ['class' => 'img-fluid thumbnail', 'alt' => get_the_title()]); ?>
            </div>
            <div class="col-sm-12 col-md-6">
                <?php if (have_posts()) : while (have_posts()) : the_post();
                        the_content();
                    endwhile;
                endif; ?>
            </div>
        </div>
    </div>
</main>
<?php get_footer(); ?>