<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package storefront
 */

?>
        
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
        <footer role="contentinfo" class="footer-social-links">
            <ul class="nav justify-content-center">
                <?php social_links(); ?>
            </ul>
            <div class="text-center">&copy Gladenfold and the boyz 2019. Some rights reversed.<div>
        </footer>

    </div><!-- #page -->
    <?php wp_footer(); ?>

</body>
</html>
