<footer>
    <ul class="d-flex justify-content-center">
        <?php if (get_theme_mod('footer_facebook', '') !== "")
            echo '<li><a <a href="' . get_theme_mod('footer_facebook') . '"><i class="fab fa-facebook-f"></i></a></li>';
        ?>
        <?php if (get_theme_mod('footer_instagram', '') !== "")
            echo '<li><a <a href="' . get_theme_mod('footer_facebook') . '"><i class="fab fa-instagram"></i></a></li>';
        ?>
        <?php if (get_theme_mod('footer_twitter', '') !== "")
            echo '<li><a <a href="' . get_theme_mod('footer_facebook') . '"><i class="fab fa-twitter"></i></a></li>';
        ?>
        <?php if (get_theme_mod('footer_linkedin', '') !== "")
            echo '<li><a <a href="' . get_theme_mod('footer_facebook') . '"><i class="fab fa-linkedin-in"></i></a></li>';
        ?>
        <?php if (get_theme_mod('footer_youtube', '') !== "")
            echo '<li><a <a href="' . get_theme_mod('footer_facebook') . '"><i class="fab fa-youtube"></i></a></li>';
        ?>
    </ul>
    <span><?php echo get_theme_mod('footer_text'); ?></span>
</footer>
<?php wp_footer(); ?>
</body>

</html>