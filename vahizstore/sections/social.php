<?php
/**
 *
 * Social feed powered by curator.IO
 *
 * @package vahizstore
 */

?>

<?php
  //hardcoded for now, make it parametrizable from WP admin
  $curator_feed_id = "f034ec25-8f3d-4dd1-859c-038360b5bc15"
?>

<!-- Place <div> tag where you want the feed to appear -->
<div id="curator-feed"><a href="https://curator.io" target="_blank" class="crt-logo crt-tag">Powered by Curator.io</a></div>
<!-- The Javascript can be moved to the end of the html page before the </body> tag -->
<script type="text/javascript">
  /* curator-feed */
  (function(){
  var i, e, d = document, s = "script";i = d.createElement("script");i.async = 1;
  i.src = "<?php echo "https://cdn.curator.io/published/" . $curator_feed_id . ".js"; ?>";
  e = d.getElementsByTagName(s)[0];e.parentNode.insertBefore(i, e);
  })();
</script>
