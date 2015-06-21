<?php
//Template Name: Contact Us
get_header(); global $bd_data;

$googlemapsshow             = $bd_data['gmap_show'];
$googlemapswidth            = $bd_data['gmap_width'];
$googlemapsheight           = $bd_data['gmap_height'];
$googlemapssrc              = $bd_data['gmap_url'];
?>

<div class="page-contactus-ajax">
    <?php if($googlemapsshow): ; if($googlemapssrc): ?>
    <div class="page-contactus-ajax-maps bottom40 clear">
        <?php echo"<div class='bd-googlemaps-shortcode'><div class='google-map'><iframe width='".$googlemapswidth."' height='".$googlemapsheight."' frameborder='0' scrolling='no' marginheight='0' marginwidth='0' src='".$googlemapssrc."&amp;output=embed'></iframe></div></div>" ?>
    </div>
    <?php endif; endif; ?>

    <div class="clear">
        <div class="content-wrapper">
            <div class="inner">
                <div class="box-title bottom20"><h2><b><?php _e ('We’d Love to Hear From You, Lets Get In Touch','bd')?></b></h2></div>
                <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
                    <article <?php post_class('article'); ?> id="post-<?php the_ID(); ?>">
                        <div class="post-entry bottom20">
                        <?php
                            the_content();
                            wp_link_pages();
                        ?>
                        </div>
                    </article>
                <?php endwhile; ?>

                <div class="form-box" id="contcatus">
                    <div class="clear form-box-label">
                    <label for="fullname">
                        <input name="fullname" placeholder="<?php _e('Name (required)','bd')?>" class="input-text" id="fullname" type="text" value="" />
                    </label>

                    <label for="email">
                        <input name="email" placeholder="<?php _e('E-Mail (required)','bd')?>" class="input-text" id="email" type="text" value="" />
                    </label>

                    <label for="website">
                        <input class="input-text" placeholder="<?php _e('Subject','bd')?>" name="website" id="website" type="text" value="" />
                    </label>
                    </div>

                    <label for="message">
                        <textarea class="input-text" placeholder="<?php _e('Message','bd')?>" id="message" name="message" cols="39" rows="4"></textarea>
                    </label>

                    <label>
                        <input type="submit" class="btn" id="send_msg" value="<?php _e('Send Message','bd')?>" />
                    </label>

                    <div id="response"></div>
                    <div class="fix"></div>
                    <div class="contact_msg" id="contact_msg"> </div>
                    <?php bd_contact_js(); ?>
                </div>

                <div class="clear"></div>
            </div>
        </div>

        <div class="sidebar">
            <div class="page-contact-info bottom40">
                <div class="box-title bottom20"><h2><b><?php _e ('Contact Info','bd')?></b></h2></div>
                <?php
                    if( !empty( $bd_data['c_info_address'] ) ){ ?><p class="page-contact-info-p bottom40"> <?php echo stripslashes($bd_data['c_info_address']) ?> </p> <?php echo "\n"; }
                ?>
                <ul class="bd_line_list page-contact-info-list">
                <?php
                    if( !empty( $bd_data['c_info_line1'] ) ){ ?><li> <?php echo stripslashes($bd_data['c_info_line1']) ?> </li> <?php echo "\n"; }
                    if( !empty( $bd_data['c_info_line2'] ) ){ ?><li> <?php echo stripslashes($bd_data['c_info_line2']) ?> </li> <?php echo "\n"; }
                    if( !empty( $bd_data['c_info_line3'] ) ){ ?><li> <?php echo stripslashes($bd_data['c_info_line3']) ?> </li> <?php echo "\n"; }
                    if( !empty( $bd_data['c_info_line4'] ) ){ ?><li> <?php echo stripslashes($bd_data['c_info_line4']) ?> </li> <?php echo "\n"; }
                    if( !empty( $bd_data['c_info_line5'] ) ){ ?><li> <?php echo stripslashes($bd_data['c_info_line5']) ?> </li> <?php echo "\n"; }
                ?>
                </ul>
            </div>

            <div>
                <div class="box-title bottom20"><h2><b><?php _e ('Get Social','bd')?></b></h2></div>
                <?php echo bd_social('yes', 32, 'ttip'); ?>
            </div>


            <div class="clear"></div>
        </div>
    </div>

    <br class="clear" />
</div>
<?php get_footer(); ?>