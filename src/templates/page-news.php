<?php get_header(); ?>
<main class="page">
    <div>
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

            <?php if (have_posts()) : while (have_posts()) :  the_post(); ?>

                    <div class="card mb-3" style="height: 20em; max-width: 1020px;">
                        <div class="row no-gutters">
                            <div class="col-md-6">
                                <?php if (has_post_thumbnail()) : the_post_thumbnail('post-thumbnail', ['class' => 'card-img-top', 'alt' => 'banana', 'style' => 'height: 20em;']); ?> <?php endif; ?>
                            </div>
                            <div class="card col-md-6" style="height: 20em;">
                                <div class="card-body">
                                    <h4 class="card-title">
                                        <?php the_title(); ?>
                                    </h4>
                                    <p class="card-text"><?php the_excerpt(); ?></p>
                                    <a href="<?php the_permalink() ?>" class="btn btn-primary">Ver mais</a>
                                </div>
                                <div class="card-footer">
                                    <small class="text-muted">Publicado em <?php the_date(); ?></small>
                                </div>
                            </div>
                        </div>
                    </div>




                <?php endwhile;
            else : ?>
                <p>There no posts to show</p>
            <?php endif; ?>
        </div>
    </div>
</main>
<?php get_footer(); ?>