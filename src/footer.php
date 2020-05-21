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
    <p class="copyright">Copyright <i class="far fa-copyright"></i><a href="https://github.com/literallysofia/vou-wordpress">Sofia Silva</a>2020. Todos os direitos reservados.</p>
    <a class="policy" href="<?php echo wp_get_attachment_url((get_theme_mod('footer_policy'))); ?>">Política de Privacidade</a>
</footer>
<?php wp_footer(); ?>
</body>

</html>