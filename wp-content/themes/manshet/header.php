<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <?php global $bd_data; ?>
    <meta charset="<?php bloginfo('charset'); ?>">
    <title><?php wp_title('|', true, 'right'); ?></title>
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
    <meta name="author" content="<?php echo home_url(); ?>">

	<meta name="verification" content="4e5303eb3ab14ea6be9263a851904982" />

    <?php wp_head(); ?>

    <script type="text/javascript" src="http://ads.ayads.co/ajs.php?zid=3405"></script>

    <script type="text/javascript">
        window._taboola = window._taboola || [];
        _taboola.push({article: 'auto'});
        !function (e, f, u) {
            e.async = 1;
            e.src = u;
            f.parentNode.insertBefore(e, f);
        }(document.createElement('script'),
            document.getElementsByTagName('script')[0],
            'http://cdn.taboola.com/libtrc/piwee/loader.js');
    </script>

    <script type="text/javascript">
		(function() {
		    window.MzPub = window.MzPub|| {};
		    MzPub.pub = MzPub.pub || {};
		    MzPub.pub.id = '4558421';
		    MzPub.pub.size = '320x50';
		    MzPub.pub.pub_size = ['320x480','300x250','100x320','320x100'];
		    MzPub.pub.ref = 'piwee.net';
		    MzPub.pub.tab_size = ['728x90','1024x150','150x500','1024x768','768x1024'];
		    MzPub.pub.mob_page = true;      
		    MzPub.pub.publisher_click = '';
		    MzPub.pub.age = '18-64';
		    MzPub.pub.gender = 'm';      
		    var elem = document.createElement('SCRIPT');
		    elem.src = 'http://storage.mozoo.com/publisher_scripts/mz_pubscript.js';
		    if(document.body) {
		        document.body.appendChild(elem);
		    }
		    else {
		        window.addEventListener('DOMContentLoaded', function() {
		            document.body.appendChild(elem);
		        });
		    }
		})();
    </script>

</head>
<?php
$body_styles = null;
if (is_singular()) {
    $body_styles = "style='";

    if (get_post_meta(get_the_ID(), 'bd_post_background_color', true) && get_post_meta(get_the_ID(), 'bd_post_background_color', true) != '#') {
        $body_styles .= "background:" . get_post_meta(get_the_ID(), 'bd_post_background_color', true) . " !important;";
    }

    if (get_post_meta(get_the_ID(), 'bd_post_background_custom', true)) {
        $att_id = get_post_meta(get_the_ID(), 'bd_post_background_custom', true);
        $attachment = wp_get_attachment_image_src($att_id, 'full');

        $body_styles .= "background: " . get_post_meta(get_the_ID(), 'bd_post_background_color', true) . " url(" . $attachment[0] . ")" . get_post_meta(get_the_ID(), 'bd_post_background_repeat', true) . " " . get_post_meta(get_the_ID(), 'bd_post_background_attachment', true) . " " . get_post_meta(get_the_ID(), 'bd_post_background_x', true) . " " . get_post_meta(get_the_ID(), 'bd_post_background_y', true) . " !important;";
    } else {
    }
    $body_styles .= "'";
}
?>

<?php

$fullsite_campain_bg_image = get_option("campain_bg_image");
$fullsite_campain_mobile_header = get_option("campain_mobile_header");
$fullsite_campain_margin_top = get_option("campain_margin_top");
$fullsite_campain_url = get_option("campain_url");
$fullsite_campain_injected_code = get_option("campain_injected_code");
$fullsite_campain_background_color = get_option("campain_background_color");

$campain_bg_image = get_post_meta(get_the_ID(), "campain_bg_image", true);
$campain_mobile_header = get_post_meta(get_the_ID(), "campain_mobile_header", true);
$campain_margin_top = get_post_meta(get_the_ID(), "campain_margin_top", true);
$campain_url = get_post_meta(get_the_ID(), "campain_url", true);
$campain_injected_code = get_post_meta(get_the_ID(), "campain_injected_code", true);
$campain_background_color = get_post_meta(get_the_ID(), "campain_background_color", true);

//article
if (!is_home() && is_single(get_the_ID()) && strlen($campain_bg_image) > 0 && strlen($campain_margin_top) > 0) {
    $isCampain = true;
    $display_video = false;
} 
//fullsite
else if ((is_home() || is_single(get_the_ID())) && strlen($fullsite_campain_bg_image) > 0 && strlen($fullsite_campain_margin_top) > 0) {
    $isCampain = true;
    $display_video = true;

    $campain_bg_image = $fullsite_campain_bg_image;
    $campain_mobile_header = $fullsite_campain_mobile_header;
    $campain_margin_top = $fullsite_campain_margin_top;
    $campain_url = $fullsite_campain_url;
    $campain_injected_code = $fullsite_campain_injected_code;
    $campain_background_color = $fullsite_campain_background_color;
} else {
    $isCampain = false;
}

if ($isCampain) {

    ?>

    <style type="text/css">
        .campain_bg {
	    position: fixed;
	    top: 0;
	    left: 0;
	    height: 100%;
	    width: 100%;
	    cursor: pointer;
            z-index: 1;
        }

        #campain_mobile_header {
            display: none;
        }

        .wrapperVideo {
            width: 1020px;
            position: relative;
        }

        @media (min-width: 480px) {
            body {
                padding-top: <?php echo $campain_margin_top ?>px;
            }

            .top-bar {
                display: block;
            }
        }

        @media only screen and (min-width: 480px) and (max-width: 1224px) {
            body {
                padding-top: 0;
            }

            .top-bar {
                display: none;
            }

            .header-row {
                padding-top: 10px;
            }

            #campain_mobile_header {
                display: block;
            }

            .wrapperVideo {
                display: none;
            }
        }

        @media (max-width: 480px) {
            .top-bar {
                display: none;
            }

            .header-row {
                padding-top: 10px;
            }

            #campain_mobile_header {
                display: block;
            }

            .wrapperVideo {
                display: none;
            }
        }
    </style>

    <?php

    $campain_onclick_script = '
        <script>

        jQuery(document).ready(function() {

            jQuery(\'#campain_bg\').click(function(e){
                window.open("' . $campain_url . '");
                TrackClick(\'' . $campain_url . '\', \'' . $campain_url . '\');
            });

        });

        </script>';
}

?>

<?php echo $campain_onclick_script; ?>

<?php echo stripslashes($campain_injected_code); ?>

<?php
if($isCampain):
?>
<body style="background-image:url('<?php echo $campain_bg_image ?>'); background-repeat: no-repeat; background-position: 50% 0;background-color: <?php echo $campain_background_color ?>">

<?php else: ?>

<body>

<?php endif ?>



<div id="campain_bg" class="campain_bg"></div>

<?php if($display_video): ?>

	<?php //HELPER TO DISPLAY VIDEO ! ?>

<?php endif; ?>

<div id="wrapper"
     class="<?php if ($bd_data['layout_type'] == 'layout_boxed') echo 'boxed'; ?> wrapper-responsive-control">

    <?php if ($isCampain): ?>

        <a href="<?php echo $campain_url ?>" target="_blank">
            <img src="<?php echo $campain_mobile_header ?>" id="campain_mobile_header">
        </a>

    <?php endif; ?>

    <?php

    global $bd_data, $post;
    if (class_exists('Woocommerce')) {
        if (is_shop()) {
            $pageID = get_option('woocommerce_shop_page_id');
        } else {
            $pageID = $post->ID;
        }

        if (get_post_meta($pageID, 'new_bd_full_width', true) == 'yes') {
            $bd_side = ' woo-full-width';
        } elseif (get_post_meta($pageID, 'new_bd_sidebar_position', true) == 'left') {
            $bd_side = ' woo-pro-side-left';
        } elseif (get_post_meta($pageID, 'new_bd_sidebar_position', true) == 'right') {
            $bd_side = ' woo-pro-side-right';
        } elseif (get_post_meta($pageID, 'new_bd_sidebar_position', true) == 'default') {
            $bd_side = '';
        }
    }

    ob_start();
    bd_in('header-' . $bd_data['header_style'] . '');
    $headerContent = ob_get_contents();
    ob_end_clean();

    if(mt_rand(0,1) == 0) {
        $headerContent = str_replace("ca-pub-9594201080211682", "ca-pub-0031647560032028", $headerContent);
        $headerContent = str_replace("1797432652", "1508098128", $headerContent);
    }

    echo $headerContent;

    /*
    if ($bd_data['header_style']) {
        if (is_page('bd-2')) {
            bd_in('header-v2');
        } elseif (is_page('header-3')) {
            bd_in('header-v3');
        } elseif (is_page('header-4')) {
            bd_in('header-v4');
        } elseif (is_page('header-6')) {
            bd_in('header-v6');
        } else {
        }
    } else {
        if (is_page('bd-2')) {
            bd_in('header-v2');
        } elseif (is_page('header-3')) {
            bd_in('header-v3');
        } elseif (is_page('header-4')) {
            bd_in('header-v4');
        } elseif (is_page('header-6')) {
            bd_in('header-v6');
        } else {
            bd_in('header-v1');
        }
    }
    */

    ?>

    <div id="main" class="container<?php echo $bd_side; ?>">
