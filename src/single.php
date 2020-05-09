<?php

/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage VOU
 * @since VOU 1.0
 */

get_header();
?>

<main id="single-article" class="page">
    <div class="container-fluid">
        <?php if (have_posts()) : while (have_posts()) :  the_post(); ?>
                <article>
                    <div class="heading">
                        <h2><?php echo get_the_date(); ?></h2>
                        <h1><?php the_title(); ?></h1>
                    </div>

                    <?php the_post_thumbnail('post-thumbnail', ['class' => 'img-fluid', 'alt' => get_the_title()]); ?>
                    <div class="content">
                        <?php the_content(); ?>
                    </div>
                </article>
                <?php
                $news_query = new WP_Query(array(
                    'post_type' => 'post',
                    'posts_per_page' => 3,
                    'post__not_in' => array(get_the_ID())
                ));

                if ($news_query->have_posts()) : ?>
                    <div id="other-news">
                        <h2>Related Articles</h2>
                        <div class="row">
                            <?php while ($news_query->have_posts()) : $news_query->the_post(); ?>
                                <div class="col-sm-12 col-md-4">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_post_thumbnail('post-thumbnail', ['class' => 'img-fluid', 'alt' => get_the_title()]); ?>
                                    </a>
                                    <h3>
                                        <a href="<?php the_permalink(); ?>">
                                            <?php the_title(); ?>
                                        </a>
                                    </h3>
                                    <span><?php echo get_the_date(); ?></span>
                                </div>
                            <?php endwhile; ?>
                            <?php wp_reset_postdata(); ?>
                        </div>
                    </div>
        <?php endif;
            endwhile;
        endif; ?>
    </div>

</main>

<?php get_footer(); ?>