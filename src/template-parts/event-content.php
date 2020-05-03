<?php

/**
 * The template for displaying regular content
 *
 * @package WordPress
 * @subpackage VOU
 * @since VOU 1.0
 */

$postid = get_the_ID();
$terms = get_the_terms($postid, 'jetpack-portfolio-type');

if (!empty($terms)) {
    $term = array_shift($terms);
    $category = $term->name;
}

?>

<main class="page">
    <div class="container-fluid">
        <div class="heading">
            <h2><?php echo $category ?></h2>
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
    </div>
</main>