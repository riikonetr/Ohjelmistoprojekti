<?php
/**
 *
 * Social feed powered by curator.IO
 *
 * @package vahizstore
 */

?>

<h3><center>The Latest Buzz</center></h3>

<!-- Place <div> tag where you want the feed to appear -->
<div id="curator-feed"><a href="https://curator.io" target="_blank" class="crt-logo crt-tag">Powered by Curator.io</a></div>
<!-- The Javascript can be moved to the end of the html page before the </body> tag -->
<script type="text/javascript">
    /* curator-feed (declare function and run it) */
    (function(){
        var i, e, d = document, s = "script";i = d.createElement("script");i.async = 1;
        i.src = "<?php curator(); ?>";
        e = d.getElementsByTagName(s)[0];e.parentNode.insertBefore(i, e);
    })();
</script>
