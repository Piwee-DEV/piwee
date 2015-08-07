<?php
/*
Plugin Name: PIWEE ADSENSE
Plugin URI: http://alexandrenguyen.fr
Description: Adsense manager for PIWEE
Version: 1.0
Author: Alexandre Nguyen
Author URI: http://alexandrenguyen.fr
License: Copyright 2015  Alexandre Nguyen  (email : alex.nr@hotmail.co.jp)

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

require_once("phpQuery.php");


add_action("admin_menu", "register_piwee_adsense_page");
add_action("add_meta_boxes", "add_piwee_adsense_metabox");
add_action("save_post", "validate_checkbox_piwee_adsense", 10, 3);
add_filter('the_content', 'filter_content_adsense');

function register_piwee_adsense_page()
{
    add_menu_page('PIWEE ADSENSE', 'PIWEE ADSENSE', 'manage_options', 'piwee_adsense', 'piwee_adsense', plugins_url('images/logo-piwee.jpg', __FILE__), null);
    add_dashboard_page('PIWEE ADSENSE', "PIWEE ADSENSE", 'read', 'piwee_adsense', 'piwee_adsense');
}

function add_piwee_adsense_metabox_markup()
{
    $adsense_below_image = get_post_meta(get_the_ID(), "adsense_below_image", true);
    $adsense_bottom_article = get_post_meta(get_the_ID(), "adsense_bottom_article", true);

    ?>

    <p><input type="checkbox" name="adsense_below_image"
              id="adsense_below_image" <?php if ($adsense_below_image) echo 'checked' ?>/> <label
            for="adsense_below_image">Activer la publicité pour le haut de l'article (en
            bas de la première image)</label></p>

    <p><input type="checkbox" name="adsense_bottom_article"
              id="adsense_bottom_article" <?php if ($adsense_bottom_article) echo 'checked' ?>/> <label
            for="adsense_bottom_article">Activer la publicité pour le bas de
            l'article</label></p>

<?php
}

function add_piwee_adsense_metabox()
{
    add_meta_box("piwee-adsense-meta-box", "PIWEE Adsense Manager", "add_piwee_adsense_metabox_markup", "post", "side", "high", null);
}

function validate_checkbox_piwee_adsense()
{
    $adsense_below_image = $_POST['adsense_below_image'] ? true : false;
    $adsense_bottom_article = $_POST['adsense_bottom_article'] ? true : false;

    add_post_meta(get_the_ID(), 'adsense_below_image', $adsense_below_image, true)
    || update_post_meta(get_the_ID(), 'adsense_below_image', $adsense_below_image);

    add_post_meta(get_the_ID(), 'adsense_bottom_article', $adsense_bottom_article, true)
    || update_post_meta(get_the_ID(), 'adsense_bottom_article', $adsense_bottom_article);
}

function piwee_adsense()
{

    if (isset($_POST['adsense_below_image'])) {

        add_option('adsense_below_image', $_POST['adsense_below_image'])
        || update_option('adsense_below_image', $_POST['adsense_below_image']);

        add_option('adsense_bottom_article', $_POST['adsense_bottom_article'])
        || update_option('adsense_bottom_article', $_POST['adsense_bottom_article']);

        add_option('adsense_below_image_mobile', $_POST['adsense_below_image_mobile'])
        || update_option('adsense_below_image_mobile', $_POST['adsense_below_image_mobile']);

        add_option('adsense_bottom_article_mobile', $_POST['adsense_bottom_article_mobile'])
        || update_option('adsense_bottom_article_mobile', $_POST['adsense_bottom_article_mobile']);

        ?>

        <div class="updated"><p>Mise à jour effectuée !</p></div>

        <?php
    }


    $adsense_below_image = get_option("adsense_below_image");
    $adsense_bottom_article = get_option("adsense_bottom_article");
    $adsense_below_image_mobile = get_option("adsense_below_image_mobile");
    $adsense_bottom_article_mobile = get_option("adsense_bottom_article_mobile");

    ?>

    <br>

    <h1>PIWEE ADSENSE MANAGER</h1>

    <form action="#" method="POST">

        <div>
            <label>Code ADSENSE en dessous de l'image</label>
            <br>
            <textarea name="adsense_below_image" cols="70"
                      rows="8"><?php echo stripslashes($adsense_below_image) ?></textarea>
        </div>

        <div>
            <label>Code ADSENSE en dessous de l'image (mobile)</label>
            <br>
            <textarea name="adsense_below_image_mobile" cols="70"
                      rows="8"><?php echo stripslashes($adsense_below_image_mobile) ?></textarea>
        </div>

        <div>
            <label>Code ADSENSE en bas de l'article</label>
            <br>
            <textarea name="adsense_bottom_article" cols="70"
                      rows="8"><?php echo stripslashes($adsense_bottom_article) ?></textarea>
        </div>

        <div>
            <label>Code ADSENSE en bas de l'article (mobile)</label>
            <br>
            <textarea name="adsense_bottom_article_mobile" cols="70"
                      rows="8"><?php echo stripslashes($adsense_bottom_article_mobile) ?></textarea>
        </div>

        <input type="submit" class="button" value="VALIDER">

    </form>

<?php
}

function filter_content_adsense($content)
{

    if (!strpos($content, 'adsbygoogle')) {

        $adsense_below_image = stripslashes(get_option("adsense_below_image"));
        $adsense_bottom_article = stripslashes(get_option("adsense_bottom_article"));
        $adsense_below_image_mobile = stripslashes(get_option("adsense_below_image_mobile"));
        $adsense_bottom_article_mobile = stripslashes(get_option("adsense_bottom_article_mobile"));

        $do_adsense_below_image = get_post_meta(get_the_ID(), "adsense_below_image", true);
        $do_adsense_bottom_article = get_post_meta(get_the_ID(), "adsense_bottom_article", true);

        //adsense_below_image
        if($do_adsense_below_image) {

            $document = phpQuery::newDocumentHTML($content);

            //if there is an image in the first p, insert adsense after the first <p>
            $firstI = $document->find("p:first img");

            if ($firstI->length > 0) {
                $document->find("p:first")->after('<div id="article-adsense-fimage">' . $adsense_below_image . '</div><div id="article-adsense-fimage-mobile">' . $adsense_below_image_mobile . '</div><br>');
            }

            $content = $document->html();
        }

        //adsense_bottom_article
        if($do_adsense_bottom_article) {
            $content .= '<br><div id="article-adsense-bottom">' . $adsense_bottom_article . '</div><div id="article-adsense-bottom-mobile">' . $adsense_bottom_article_mobile . '</div>';
        }
    }

    return $content;
}