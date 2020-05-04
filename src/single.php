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

            </div>

            <?php if (have_posts()) : while (have_posts()) :  the_post(); ?>

                    <div id="single-news">
                        <?php if (has_post_thumbnail()) : the_post_thumbnail('post-thumbnail', ['class' => 'rounded mx-auto d-block', 'alt' => 'banana', 'style' => 'max-height: 30em; max-width: 70em']); ?> <?php endif; ?>
                        <h1 class="text-center"> <?php echo wp_title(''); ?></h1>
                        <small class="text-muted">Publicado em <?php the_date(); ?></small>

                        <p class="lead"><?php the_content(); ?></p>
                    </div>


                <?php endwhile;
            else : ?>

                <p>There no posts to show</p>
            <?php endif; ?>
            <div id="other-news">
                <h2 class="text-center"> Outras notícias </h2>

                <?php
                $news_query = new WP_Query(array(
                    'posts_per_page' => 3,
                ));

                if ($news_query->have_posts()) : ?>
                    <div class="row">
                        <?php while ($news_query->have_posts()) : $news_query->the_post(); ?>
                            <div class="col-sm-12 col-md-4">
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_post_thumbnail('post-thumbnail', ['class' => 'img-fluid', 'alt' => esc_html(get_the_title())]); ?>
                                </a>
                                <h3>
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_title(); ?>
                                    </a>
                                </h3>
                                <span>Publicado em <?php the_date(); ?></span>
                            </div>
                        <?php endwhile; ?>
                        <?php wp_reset_postdata(); ?>
                    </div>
                <?php else : ?>
                    <h1><?php echo 'No News' ?></h1>
                <?php endif; ?>
            </div>
        </div>
    </div>
</main>
<?php get_footer(); ?>