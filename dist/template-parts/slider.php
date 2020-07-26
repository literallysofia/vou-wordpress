<?php

/**
 * The template for displaying the project slider if it exists
 *
 * @package WordPress
 * @subpackage VOU
 * @since VOU 1.0
 */

$fields = get_fields();
$slides = [];

foreach ($fields as $name => $value) {
    if (stristr($name, 'wp_project_slide_'))
        array_push($slides, $name);
}

if (count($slides) > 0) :
?>

    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <?php foreach ($slides as $key => $value) : if(get_field($value)) :?>
                <div class="carousel-item <?php if ($key == 1) echo 'active'; ?>">
                    <img src="<?php echo esc_url(get_field($value)); ?>" class="d-block w-100" alt="...">
                </div>
            <?php endif; endforeach; ?>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

<?php else : the_post_thumbnail('post-thumbnail', ['class' => 'img-fluid thumbnail', 'alt' => get_the_title() . ' thumbnail']);
endif; ?>