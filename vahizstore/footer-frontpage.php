<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package storefront
 */

?>
        <!-- Footer -->
        <footer class="footer-social-links">

            <!-- Footer Links -->
            <div class="container">

              <!-- Grid row -->
              <div class="row">

                <!-- Grid column -->
                <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                  <?php storefront_site_title_or_logo(); ?>

                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4 contact_col">

                  <!-- Links -->
                  <h6 class="text-uppercase font-weight-bold">Contact</h6>
                  <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                  <p>
                    <?php contact_email(); ?>
                  </p>

                </div>

                <!-- Grid column -->

              </div>
              <!-- Grid row -->

            </div>
            <!-- Footer Links -->

            <!-- Social buttons -->
            <ul class="social-nav nav justify-content-center">
<?php
            $social_links = get_theme_mod('social_links', json_encode( array(/*The content from your default parameter or delete this argument if you don't want a default*/)) );
            /*This returns a json so we have to decode it*/
            $social_links_decoded = json_decode($social_links);
            foreach($social_links_decoded as $social_link){
?>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo $social_link->link ?>">
                        <span class="fab <?php echo $social_link->icon_value ?>"></span>
                    </a>
                </li>
<?php
            }
?>
            </ul>
            <!-- Social buttons -->

            <!-- Copyright -->
            <div class="footer-copyright text-center py-3">
                &copy; Gladenfold and the boyz 2019. Some rights reversed.
            </div>
            <!-- Copyright -->

        </footer>
    </div><!-- #page -->
    <?php wp_footer(); ?>

</body>
</html>
