<?php
/**
 * Custom Js
 */
?>
<script type="text/javascript">
    jQuery(document).ready(function($)
    {
        jQuery(".gallery dl.gallery-item .gallery-icon a").addClass("lightbox");
        jQuery(".gallery dl.gallery-item .gallery-icon a").attr('rel', 'lightbox_<?php echo get_the_ID(); ?>');
        jQuery(".gallery dl.gallery-item .gallery-icon a[href*='attachment']").removeClass("lightbox").attr('href');
    });
</script>