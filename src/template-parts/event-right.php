<?php

/**
 * The template for displaying an event aligned right
 *
 * @package WordPress
 * @subpackage VOU
 * @since VOU 1.0
 */
?>

<div class="single-event text-right right">
    <div class="row">
        <div class="col-sm-12 col-md-6 d-flex flex-column align-items-end">
            <h3><?php the_title(); ?></h3>
            <div class="content">
                <?php the_excerpt(); ?>
            </div>
            <a class="btn btn-primary mt-auto" href="<?php the_permalink(); ?>" role="button">Saber Mais</a>
        </div>
        <div class="col-sm-12 col-md-6">
            <?php the_post_thumbnail('post-thumbnail', ['class' => 'img-fluid', 'alt' => get_the_title()]); ?>
        </div>
    </div>
</div>