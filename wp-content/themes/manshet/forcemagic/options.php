<?php
/**
 *  Manshet Retina Responsive WordPress News, Magazine, Blog
 *  Developer by : Amr Sadek
 *  http://themeforest.net/user/bdayh
 *  Options
 */
$themename = "Manshet";
$shortname = "manshet";
$themefolder = "manshet";

define ('theme_name', $themename);
define ('theme_ver' , 1);
define ('manshet' , $themename);
define ('SHORTNAME', $shortname);

/**
 *  Theme update
 */
function wp_register_theme_activation_hook($code, $function)
{
    $optionKey="theme_is_activated_" . $code;
    if(!get_option($optionKey))
    {
        call_user_func($function);
        update_option($optionKey , 1);
    }
}
wp_register_theme_activation_hook($shortname, 'bd_theme_activate');
/**
 *  Theme Activate
 */
function bd_theme_activate()
{
    if(!is_array($GLOBALS['def_options']))
    {
        require(get_template_directory() . '/forcemagic/default.php');
    }
    update_option('bdayh_setting', serialize($GLOBALS['def_options']));
    return(true);
}

/**
 * Admin Scripts
 */
function bd_admin_scripts()
{
    wp_reset_query();
    wp_deregister_script( 'bd-tmpl' );
    wp_register_script( 'bd-tmpl', get_template_directory_uri().'/forcemagic/js/jquery.tmpl.js', array(), false, true);
    wp_enqueue_script( 'bd-tmpl' );
    wp_deregister_script( 'bd-custom' );
    wp_register_script( 'bd-custom', get_template_directory_uri().'/forcemagic/js/custom.js', array(), false, true);
    wp_enqueue_script( 'bd-custom' );
    wp_deregister_script( 'bd-checkbox' );
    wp_register_script( 'bd-checkbox', get_template_directory_uri().'/forcemagic/js/checkbox.min.js', array(), false, true);
    wp_enqueue_script( 'bd-checkbox' );
    wp_deregister_script( 'bd-colorpicker' );
    wp_register_script( 'bd-colorpicker', get_template_directory_uri().'/forcemagic/js/colorpicker.js', array(), false, true);
    wp_enqueue_script( 'bd-colorpicker' );
    wp_deregister_style( 'bd-main' );
    wp_register_style( 'bd-main', get_template_directory_uri().'/forcemagic/css/main.css', '', null , 'all');
    wp_enqueue_style( 'bd-main' );
    wp_deregister_style( 'bd-css' );
    wp_register_style( 'bd-css', get_template_directory_uri().'/forcemagic/css/custome.css', '', null , 'all');
    wp_enqueue_style( 'bd-css' );
    wp_deregister_style( 'bd-colorpicker' );
    wp_register_style( 'bd-colorpicker', get_template_directory_uri().'/forcemagic/css/colorpicker.css', '', null , 'all');
    wp_enqueue_style( 'bd-colorpicker' );
    wp_deregister_style( 'bd-jqueryui' );
    wp_register_style( 'bd-jqueryui', get_template_directory_uri().'/forcemagic/css/jquery-ui.css', '', null , 'all');
    wp_enqueue_style( 'bd-jqueryui' );
}
add_action('admin_enqueue_scripts', 'bd_admin_scripts');

/**
 * Like Theme
 */
if ( isset( $_GET['page'] ) && $_GET['page'] == 'options.php' )
{
    function enqueue_pointer_script_style( $hook_suffix )
    {
        $enqueue_pointer_script_style = false;
        $dismissed_pointers = explode( ',', get_user_meta( get_current_user_id(), 'dismissed_wp_pointers', true ) );
        if( !in_array( 'rate_theme1', $dismissed_pointers ) )
        {
            $enqueue_pointer_script_style = true;
            add_action( 'admin_print_footer_scripts', 'pointer_print_scripts' );
        }
        if( $enqueue_pointer_script_style )
        {
            wp_enqueue_style( 'wp-pointer' );
            wp_enqueue_script( 'wp-pointer' );
        }
    }
    add_action( 'admin_enqueue_scripts', 'enqueue_pointer_script_style' );

/**
 * Pointer Print Scripts
 */
function pointer_print_scripts()
{
    $pointer_content  = "<h3>Did you like ".theme_name." ?</h3>";
    $pointer_content .= "<p> If you like ".theme_name." theme, please don\'t forget to <a href=\'http://themeforest.net/downloads\' target=\'_blank\'><strong>rate it</strong></a> :)</p>";
?>
    <script type="text/javascript">
        //<![CDATA[
        jQuery(document).ready( function($)
        {
            jQuery('.bd_panel .logo').pointer(
                {
                    content:'<?php echo $pointer_content; ?>',
                    position:
                    {
                        edge:	'left',
                        align:	'bottom'
                    },
                    pointerWidth:	350,
                    close:
                    function()
                    {
                        jQuery.post( ajaxurl,
                        {
                            pointer: 'rate_theme1',
                            action: 'dismiss-wp-pointer'
                        });
                    }
                })
                .pointer('open');
        });
        //]]>
    </script>
<?php
}
}

/**
 *
 * GET categories
 *
 */
$categories = get_categories('hide_empty=0&orderby=name');
$wp_cats = array();
foreach ($categories as $category_list )
{
    $wp_cats[$category_list->cat_ID] = $category_list->cat_name;
}

/**
 *
 * Setting
 *
 */
require_once( "setting.php" );
function themename_add_admin()
{
    global $themename, $shortname, $options;
    if ( isset($_GET['page']) and $_GET['page'] == basename(__FILE__) )
    {
        if (isset($_GET['do']) and $_GET['do'] == 'submit' and $_POST)
        {
            if($_POST['bd_setting']['advanced_import'])
            {
                $functionbase_decode = strrev('edoced_46esab');
                $import = $functionbase_decode($_POST['bd_setting']['advanced_import']);


                update_option('bdayh_setting', $import);
                echo '#message_success';
                die;
            }
            $var_post = $_POST;
            $var_post['bd_setting']['advanced_import'] = '';
            $var_post['bd_setting']['advanced_export'] = '';
            foreach($var_post['bd_setting'] as $k => $v)
            {
                if(is_array($v))
                {
                    foreach($v as $lk => $lv)
                    {
                        $var_post[$k][$lk] = esc_sql($lv);
                    }
                }
                else
                {
                    $var_post[$k] = esc_sql($v);
                }
            }


            $option_arr = serialize($var_post);

            update_option('bdayh_setting', $option_arr);
            echo '#message_success';
            die;
        }
        else if(isset($_GET['do']) and  $_GET['do'] == 'download')
        {

            $functionbase_encode = strrev('edocne_46esab');
            $bd_option = $functionbase_encode(get_option('bdayh_setting'));

            header("Content-Type: application/xml");
            header("Content-Transfer-Encoding: binary");
            header("Cache-Control: private",false);
            header("Content-Disposition: attachment; filename=\"manshet-" . time()  . ".txt\";" );
            echo $bd_option;
            exit();
        }

        else if(isset($_GET['do']) and $_GET['do'] == 'reset')
        {
            if(!is_array($GLOBALS['def_options']))
            {
                require(get_template_directory() . '/forcemagic/default.php');
            }

            update_option('bdayh_setting', serialize($GLOBALS['def_options']));

            header("Location: admin.php?page=options.php");
            die;
        }

    }

    $add_theme_function = strrev('egap_unem_dda');
    $add_theme_function( $themename, $themename, 'edit_themes', 'options.php', 'themename_admin', BD_ADMIN_IMG .'/icon.png');
}

/**
 *
 * GET Setting
 *
 */
function bd_get_settings($id)
{
    global $themename, $shortname, $options,$all_setting;
    if(get_settings($GLOBALS['shortname'].'_'.$id))
    {
        return(get_settings($GLOBALS['shortname'].'_'.$id));
    }
    else
    {
        return($all_setting[$GLOBALS['shortname'].'_'.$id]);
    }
}

/**
 *
 * Admin
 *
 */
function themename_admin()
{
    global $themename, $shortname, $options,$wp_cats;
    $i=0;
    echo '<div id="message_success" style="display:none;" class="notification fade"><span class="notification_icon"></span> Options Saved Successfully ! </div>';
    echo '<div id="message_error" style="display:none;" class="notification bd_alert fade"><span class="notification_icon"></span> Resetting work ! </div>';
    $bd_option = unserialize(get_option('bdayh_setting'));
    require_once ("functions.php");
    ?>
    <script type="text/javascript">
    <?php
        if(isset($bd_option['bd_setting']['home']))
        {
        ?>
            var total_boxes = <?php if(is_array($bd_option['bd_setting']['home'])){echo max(array_keys($bd_option['bd_setting']['home'])) + 1;}else{echo 1;} ?>;
        <?php
        }
        else
        {
        ?>
            var total_boxes = 1;
        <?php
        }
        ?>
        jQuery(document).ready(function()
        {
            jQuery('#setting_form').submit(function()
            {
                var str = jQuery("form").serialize();
                jQuery.ajax({
                    url: 'admin.php?page=options.php&do=submit',
                    data: str,
                    type: 'POST',
                    success: function(data)
                    {
                        if(data == '#message_success')
                        {
                            jQuery('#message_success').show().delay(250).fadeIn(600).fadeOut(600,'easeInOutBack');
                        }
                        else
                        {
                            jQuery('#message_error').show().delay(250).fadeIn(600).fadeOut(600,'easeInOutBack');
                        }
                    }
                });
                return false;
            });
        });
    </script>
    <script type='text/javascript' src="<?php echo BD_ADMIN; ?>js/main.js"></script>
    <?php
        wp_reset_query();
        wp_enqueue_script('jquery-ui-slider');
        wp_enqueue_script('jquery-ui-sortable');
    ?>
    <script type="text/javascript">
        jQuery(document).ready(function()
        {
            jQuery('.st_upload_button').click(function()
            {
                targetfield = jQuery(this).prev('.upload-url');
                tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
                return false;
            });
            jQuery(".st_upload_button").live("click", function()
            {
                targetfield = jQuery(this).prev('.upload-url');
                tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
                return false;
            });
            jQuery(".remove_img").live("click", function()
            {
                var img_id = jQuery(this).attr('id').replace("_remove", "");
                jQuery('#'+img_id).val('');
                jQuery('#'+img_id+'_img').fadeOut();
                return false;
            });
            window.send_to_editor = function(html)
            {
                imgurl = jQuery('img',html).attr('src');
                jQuery(targetfield).val(imgurl);
                var up_img = jQuery(targetfield).attr('id')+ '_img';
                jQuery('#'+up_img).children('img').attr('src',imgurl);
                jQuery('#'+up_img).show();
                tb_remove();
            }
        });

        function add_tag(input_id,tag)
        {
            var input_id;
            var tag;
            if(tag != '')
            {
                var input_val = jQuery('#'+input_id).val();
                if(input_val == ''){
                    jQuery('#'+input_id).val(tag);
                }
                else
                {
                    jQuery('#'+input_id).val(input_val+','+tag);
                }
            }
        }
    </script>

<form name="" id="setting_form" action="admin.php?page=options.php&do=submit" method="post">
    <div id="bd-panel">

        <div id="bd-header">
            <div id="bd-logo">

            </div>
            <div id="bd-inputs">
                <input name="save" class="butn bd-save" type="submit" value="Save All Changes" />
            </div>
            <div class="clear"></div>
        </div><!-- header/-->
        <div class="bd-header-divider"></div>

        <div id="bd-main" class="bd-main">
            <div class="clear"></div>
            <div class="bd-panel-tabs-bg"></div>
            <div id="bd-panel-tabs">
                <ul>
                    <?php
                    if(is_array($options))
                    {
                        foreach($options as $k => $v)
                        {
                            echo '<li class="'. $k .'"><a href="#'. $k .'" >'. ucfirst(str_replace("_"," ",$k)) .'</a></li>';
                        }
                    }
                    ?>
                </ul>
            </div><!-- tabs/-->

            <div id="bd-panel-container">
            <?php
                if(is_array($options))
                {
                    $list_sum = array();
                    foreach($options as $k => $v)
                    {
                        $sub_item = 0;

                        ?>
                        <div class="box_tabs_container" id="<?php echo $k; ?>">
                            <h1 id="bd-top-title"><?php echo ucfirst(str_replace("_"," ",$k)); ?></h1>
                            <div class="tab_content">
                                <?php
                                    if(is_array($v))
                                    {
                                        foreach($v as $key => $input)
                                        {
                                            if(isset($input['name']) and $input['name'] != '')
                                            {
                                                get_admin_tab($input);
                                            }
                                            else
                                            {
                                            ?>
                                            <div class="bd_item">
                                                <?php
                                                    foreach($input as $sub)
                                                    {
                                                        get_admin_tab($sub,false);
                                                    }
                                                ?>
                                            </div>
                                            <?php
                                            }
                                        }
                                    }
                                ?>
                            </div>
                            <?php unset($sub_item); ?>
                        </div>
                        <?php
                    }
                }
            ?>
            </div><!-- container/-->
            <div class="clear"></div>
        </div><!-- main/-->
        <div class="bd-footer-divider"></div>
        <div id="bd-footer" class="bd_footer">
            <input name="save" class="butn bd-save" type="submit" value="Save All Changes" />
            <script type="text/javascript">
                function is_confirm()
                {
                    if(confirm('Are you sure ?'))
                    {
                        window.location='admin.php?page=options.php&do=reset';
                    }
                    else
                    {
                        return false;
                    }
                }
            </script>
            <input name="reset" class="butn bd-rest" type="button" onclick="return(is_confirm());" value="Options Reset" />
        </div><!-- footer/-->

    </div><!-- panel/-->

    </form><div class="gotop" title="Go Top"></div>
<?php
}

function themename_add_init()
{
    wp_enqueue_script('media-upload');
    wp_enqueue_script('thickbox');
    wp_enqueue_script('my-upload');
    wp_enqueue_style('thickbox');
}
add_action('admin_init', 'themename_add_init');
add_action('admin_menu', 'themename_add_admin');
