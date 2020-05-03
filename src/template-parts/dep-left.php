<?php

/**
 * The template for displaying a department aligned left
 *
 * @package WordPress
 * @subpackage VOU
 * @since VOU 1.0
 */

$color = sanitize_hex_color(get_field('wp_project_color'));
$style = "box-shadow: -25px -25px 0px 0px " .  $color . ";";
$email = sanitize_email(get_field('wp_project_email'));
$icon = get_field('wp_project_icon');
?>

<div class="single-dep left">
    <div class="row">
        <div class="col-sm-12 col-md-6">
            <div class="image-container">
                <?php the_post_thumbnail('post-thumbnail', ['class' => 'img-fluid', 'alt' => get_the_title(), 'style' => $style]); ?>
            </div>
        </div>
        <div class="col-sm-12 col-md-6">
            <div class="heading d-flex align-items-center">
                <?php if ($icon) : ?>
                    <h3><?php the_title(); ?></h3>
                    <img src="<?php echo esc_url($icon) ?>" alt="<?php echo get_the_title() . ' icon' ?>" class="dep-icon" />
                <?php endif; ?>
            </div>
            <div class="content">
                <?php the_content(); ?>
            </div>
            <?php if ($email) : ?>
                <div class="email d-flex align-items-center">
                    <i class="fas fa-envelope"></i>
                    <span><?php echo $email ?></span>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>