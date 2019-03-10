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
        <!-- Footer -->
        <footer role="contentinfo" class="footer-social-links">

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
                <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">

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
            <ul class="list-unstyled list-inline text-center">
              <?php social_links(); ?>
            </ul>
            <!-- Social buttons -->

            <!-- Copyright -->
            <div class="footer-copyright text-center py-3">
              &copy Gladenfold and the boyz 2019. Some rights reversed.
            </div>
            <!-- Copyright -->

        </footer>
    </div><!-- #page -->
    <?php wp_footer(); ?>

</body>
</html>
