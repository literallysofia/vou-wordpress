<?php

/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage VOU
 * @since VOU 1.0
 */

get_header();
?>

<main class="page">
    <div class="container-fluid">
        <div class="heading">
            <?php do_action('plugins/wp_subtitle/the_subtitle', array(
                'before'        => '<h2>',
                'after'         => '</h2>',
                'post_id'       => get_option('page_for_posts'),
                'default_value' => ''
            )); ?>
            <h1><?php echo wp_title(''); ?></h1>
        </div>

        <div id="news" class="page-content">
            <?php if (have_posts()) : while (have_posts()) :  the_post(); ?>
                    <article class="row no-gutters h-100">
                        <div class="col-md-12 col-lg-4">
                            <?php the_post_thumbnail('post-thumbnail', ['class' => 'img-fluid', 'alt' => get_the_title()]); ?>
                        </div>
                        <div class="col-md-12 col-lg-8 content d-flex flex-column align-items-start">
                            <h3><?php the_title(); ?></h3>
                            <span><?php the_date(); ?></span>
                            <p><?php the_excerpt(); ?></p>
                            <a href="<?php the_permalink(); ?>" class="btn btn-primary mt-auto">Ler Mais</a>
                        </div>
                    </article>
                <?php endwhile;
            else : ?>
                <p>There no posts to show</p>
            <?php endif; ?>
        </div>
    </div>
</main>

<?php get_footer(); ?>