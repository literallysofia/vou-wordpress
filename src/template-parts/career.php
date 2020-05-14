<?php

/**
 * The template for displaying a career
 *
 * @package WordPress
 * @subpackage VOU
 * @since VOU 1.0
 */

$cat = get_query_var('cat');
$res = get_field('wp_project_registration');
?>

<article class="row no-gutters h-100">
    <div class="col-md-12 col-lg-4">
        <?php the_post_thumbnail('post-thumbnail', ['class' => 'img-fluid', 'alt' => get_the_title()]); ?>
    </div>
    <div class="col-md-12 col-lg-8 content d-flex flex-column align-items-start">
        <div class="d-flex align-items-start justify-content-between w-100">
            <div>
                <h3><?php the_title(); ?></h3>
                <span><?php echo $cat; ?></span>
            </div>
            <a href="<?php echo $res['wp_form_url']; ?>" class="btn btn-primary<?php if(!$res['wp_open']) echo ' disabled'; ?>">Inscrever</a>
        </div>

        <p><?php the_excerpt(); ?></p>
        <a href="<?php the_permalink(); ?>" class="btn btn-primary mt-auto">Saber Mais</a>
    </div>
</article>