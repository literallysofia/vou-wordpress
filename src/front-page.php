<?php

/**
 * The front page template file
 *
 * If the user has selected a static page for their homepage, this is what will
 * appear.
 * Learn more: https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage VOU
 * @since VOU 1.0
 * @version 1.0
 */

get_header(); ?>

<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <div class="row d-flex align-items-center">
            <div class="col-sm-12 col-md-6">
                <h1><?php echo get_theme_mod('banner_title_text', 'Vem ser VO.U.'); ?></h1>
                <p class="lead"><?php echo get_theme_mod('banner_description_text', 'Na VO.U. Associação de Voluntariado Universitário acreditamos no conceito de Ensino Superior Solidário!'); ?></p>
                <?php if(get_theme_mod('banner_show_button'))
                    echo '<button type="button" class="btn btn-primary">' . get_theme_mod('banner_button_text', 'Saber Mais') . '</button>';
                ?>
            </div>
            <div class="col-sm-12 col-md-6">
                <img src="<?php header_image(); ?>" class="img-fluid" alt="Header Image">
            </div>
        </div>

    </div>
</div>

<?php
get_footer();
