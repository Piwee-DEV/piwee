<?php
/**
 *  Manshet Retina Responsive WordPress News, Magazine, Blog
 *  Developer by : Amr Sadek
 *  http://themeforest.net/user/bdayh
 *  Options
 */
/**
 * General Options
 */
$options["general_options"][] = array
(
    "name" 		=> "General Options",
    "type"  	=> "subtitle"
);
$options["general_options"]["bd_general"][] = array
(
    "name" 		=> "Date Format",
    "id"    	=> "date_format",
    "tip"		=> "Date Format .",
    "exp"		=> '<a href="http://codex.wordpress.org/Formatting_Date_and_Time" target="_blank">Formatting Date and Time</a>',
    "type"  	=> "text"
);
$options["general_options"]["bd_general"][] = array
(
    "name" 		=> "Breadcrumbs",
    "id"    	=> "breadcrumbs",
    "tip"		=> "Enable or Disable : breadcrumbs features.",
    "type"  	=> "checkbox"

);
$options["general_options"]["bd_general"][] = array
(
    "name" 		=> "Responsive Design",
    "id"    	=> "responsive",
    "tip"		=> "Enable or Disable : responsive design features.",
    "type"  	=> "checkbox"

);
$options["general_options"]["bd_general"][] = array
(
    "name" 		=> "Notify On Theme Updates",
    "id"    	=> "notify_theme",
    "tip"		=> "Enable or Disable : Notify On Theme Updates",
    "type"  	=> "checkbox"

);
$options["general_options"]["bd_general"][] = array
(
    "name" 		=> "comments on pages",
    "id"    	=> "comments_pages",
    "tip"		=> "Enable or Disable : comments on pages",
    "type"  	=> "checkbox"

);
$options["general_options"][] = array
(
    "name" 		=> "Custom Dashboard Logo",
    "id"    	=> "dashboard_logo",
    "tip"		=> "Custom Dashboard Logo",
    "type"  	=> "upload"

);
$options["general_options"][] = array
(
    "name" 		=> "Favicon Icons",
    "type"  	=> "subtitle"
);
$options["general_options"]["bd_favicon"][] = array
(
    "name" 		=> "Custom Favicon",
    "id"    	=> "favicon",
    "tip"		=> "You can put url of an ico image that will represent your website favicon (16px x 16px)",
    "type"  	=> "upload"

);
$options["general_options"]["bd_favicon"][] = array
(
    "name" 		=> "Apple iPhone Icon Upload",
    "id"    	=> "iphone_icon_upload",
    "tip"		=> "Icon for Apple iPhone (57px x 57px)",
    "type"  	=> "upload"

);
$options["general_options"]["bd_favicon"][] = array
(
    "name" 		=> "Apple iPhone Retina Icon Upload",
    "id"    	=> "iphone_icon_retina_upload",
    "tip"		=> "Icon for Apple iPhone Retina Version (114px x 114px)",
    "type"  	=> "upload"

);
$options["general_options"]["bd_favicon"][] = array
(
    "name" 		=> "Apple iPad Icon Upload",
    "id"    	=> "ipad_icon_upload",
    "tip"		=> "Icon for Apple iPhone (72px x 72px)",
    "type"  	=> "upload"

);
$options["general_options"]["bd_favicon"][] = array
(
    "name" 		=> "Apple iPad Retina Icon Upload",
    "id"    	=> "ipad_icon_retina_upload",
    "tip"		=> "Icon for Apple iPad Retina Version (144px x 144px)",
    "type"  	=> "upload"

);

$options["general_options"][] = array
(
    "name" 		=> "Tracking Code",
    "id"    	=> "google_analytics",
    "tip"		=> "Paste your Google Analytics (or other) tracking code here. This will be added into the footer template of your theme.",
    "exp"		=> "Paste your Google Analytics (or other) tracking code here. This will be added into the footer template of your theme.",
    "type"  	=> "textarea"

);
$options["general_options"][] = array
(
    "name" 		=> "Space before &lt;/head&gt;",
    "id"    	=> "space_head",
    "tip"		=> "Add code before the &lt;/head&gt; tag.",
    "exp"		=> "Add code before the &lt;/head&gt; tag.",
    "type"  	=> "textarea"

);
$options["general_options"][] = array
(
    "name" 		=> "Space before &lt;/body&gt;",
    "id"    	=> "space_body",
    "tip"		=> "Add code before the &lt;/body&gt; tag.",
    "exp"		=> "Add code before the &lt;/body&gt; tag.",
    "type"  	=> "textarea"
);

/**
 * Home page
 */
$options["home_page"][] = array
(
    "name" 		=> "Home Page Displays",
    "type"  	=> "subtitle"
);
$options["home_page"][] = array
(
    "name" 		=> "Header",
    "id" 		=> "home_builder",
    "type"  	=> "home_builder"
);

/**
 * Header Settings
 */

$options["header_settings"][] = array
(
    "name" 		=> "Top bar Settings",
    "type"  	=> "subtitle"
);
$options["header_settings"]["header_topbar"][] = array
(
    "name" 		=> "Top Bar",
    "id"    	=> "show_top_nav",
    "tip"		=> "Enable or Disable : Top Bar.",
    "type"  	=> "checkbox"
);
$options["header_settings"]["header_topbar"][] = array
(
    "name" 		=> "Top Bar Contact Info",
    "id"    	=> "show_top_nav_contactinfo",
    "tip"		=> "Enable or Disable : Top Bar Contact Info.",
    "type"  	=> "checkbox"
);
$options["header_settings"]["header_topbar"][] = array
(
    "name" 		=> "Top Bar Social Links",
    "id"    	=> "show_top_nav_socail_links",
    "tip"		=> "Enable or Disable : Top Bar Social Links.",
    "type"  	=> "checkbox"
);
$options["header_settings"]["header_topbar"][] = array
(
    "name" 		=> "Top Bar Search Box",
    "id"    	=> "show_top_nav_search",
    "tip"		=> "Enable or Disable : Top Bar Search Box.",
    "type"  	=> "checkbox"
);

/**
 * Logo
 */
$options["header_settings"][] = array
(
    "name" 		=> "Logo Settings",
    "type"  	=> "subtitle"
);
$options["header_settings"][] = array
(
    "name" 		=> "Logo display",
    "id" 		=> "logo_displays",
    "exp"		=> "choose Logo display .",
    "type"  	=> "radio",
    "options"   => array
    (
        "logo_image"       => "Display Site Title" ,
        "logo_title"       => "Custom Image" ,
    ),
);
$options["header_settings"]["logo_settings"][] = array
(
    "name" 		=> "Logo",
    "id"    	=> "logo_upload",
    "tip"		=> "Please choose an image file for your logo.",
    "type"  	=> "upload"

);
$options["header_settings"]["logo_settings"][] = array
(
    "name" 		=> "Logo (Retina Version @2x)",
    "id"    	=> "logo_retina",
    "tip"		=> "Please choose an image file for the retina version of the logo. It should be 2x the size of main logo.",
    "type"  	=> "upload"

);
$options["header_settings"]["logo_settings"][] = array
(
    "name" 		=> "Standard Logo Width for Retina Logo",
    "id"    	=> "retina_logo_width",
    "tip"       =>  "If retina logo is uploaded, please enter the standard logo (1x) version width, do not enter the retina logo width.",
    "type"  	=> "ui_slider",
    "unit" 		=> "(pixels)",
    "max" 		=> 1000,
    "min" 		=> 0
);
$options["header_settings"]["logo_settings"][] = array
(
    "name" 		=> "Standard Logo Height for Retina Logo",
    "id"    	=> "retina_logo_height",
    "tip"       =>  "If retina logo is uploaded, please enter the standard logo (1x) version height, do not enter the retina logo height.",
    "type"  	=> "ui_slider",
    "unit" 		=> "(pixels)",
    "max" 		=> 1000,
    "min" 		=> 0
);
$options["header_settings"]["logo_settings"][] = array
(
    "name" 		=> "logo Top Margin",
    "id"    	=> "margin_logo_top",
    "type"  	=> "ui_slider",
    "unit" 		=> "(in pixels)",
    "max" 		=> 300,
    "min" 		=> 0

);
$options["header_settings"]["logo_settings"][] = array
(
    "name" 		=> "logo Right Margin",
    "id"    	=> "margin_logo_right",
    "type"  	=> "ui_slider",
    "unit" 		=> "(in pixels)",
    "max" 		=> 300,
    "min" 		=> 0

);
$options["header_settings"]["logo_settings"][] = array
(
    "name" 		=> "logo Bottom Margin",
    "id"    	=> "margin_logo_bottom",
    "type"  	=> "ui_slider",
    "unit" 		=> "(in pixels)",
    "max" 		=> 300,
    "min" 		=> 0

);
$options["header_settings"]["logo_settings"][] = array
(
    "name" 		=> "logo Left Margin",
    "id"    	=> "margin_logo_left",
    "type"  	=> "ui_slider",
    "unit" 		=> "(in pixels)",
    "max" 		=> 300,
    "min" 		=> 0

);
/**
 * Header Adv
 */
$options["header_settings"][] = array
(
    "name" 		=> "Header Advertising",
    "type"  	=> "subtitle"
);
$options["header_settings"]["header_advertising"][] = array
(
    "name" 		=> "Enable or Disable : Header Advertising",
    "id"    	=> "show_header_ads",
    "type"  	=> "checkbox"
);
$options["header_settings"]["header_advertising"][] = array
(
    "name" 		=> "Header Advertising Code html ( Google ads)",
    "tip" 		=> "Header Advertising Code html ( Google ads).",
    "id"    	=> "header_ads_code",
    "type"  	=> "textarea"
);
$options["header_settings"]["header_advertising"][] = array
(
    "name" 		=> "Header Advertising upload image",
    "tip" 		=> "Header Advertising upload image.",
    "id"    	=> "header_ads_img",
    "type"  	=> "upload"
);
$options["header_settings"]["header_advertising"][] = array
(
    "name" 		=> "Header Advertising Url",
    "tip" 		=> "Header Advertising Url.",
    "id"    	=> "header_ads_img_url",
    "type"  	=> "text"
);
$options["header_settings"]["header_advertising"][] = array
(
    "name" 		=> "Header Advertising Alt name",
    "tip" 		=> "Header Advertising Alt name.",
    "id"    	=> "header_ads_img_altname",
    "type"  	=> "text"
);
$options["header_settings"][] = array
(
    "name" 		=> "Header Contact Info",
    "type"  	=> "subtitle"
);
$options["header_settings"]["header_contact_info"][] = array
(
    "name" 		=> "Header Phone Number",
    "id"    	=> "h_contact_number",
    "tip" 		=> "You Can Add Phone Number.",
    "type"  	=> "text"
);
$options["header_settings"]["header_contact_info"][] = array
(
    "name" 		=> "Header Email Address",
    "id"    	=> "h_contact_email",
    "tip" 		=> "You Can Add Header Email Address.",
    "type"  	=> "text"
);

$options["header_settings"][] = array
(
    "name" 		=> "Select a Header Layout",
    "type"  	=> "subtitle"
);
$options["header_settings"][] = array
(
    "name" 		=> "Select a Header Layout",
    "id"    	=> "header_style",
    "tip"		=> "Select a Header Layout.",
    "exp"		=> "Select a Header Layout.",
    "type"  	=> "header_style"

);

/**
 * Footer
 */
$options["footer_settings"][] = array
(
    "name" 		=> "Footer Widgets",
    "id"    	=> "footer_widgets",
    "tip" 		=> "Enable or Disable : footer widgets.",
    "exp" 		=> "Enable or Disable : footer widgets.",
    "type"  	=> "checkbox"
);
$options["footer_settings"][] = array
(
    "name" 		=> "Footer column layout",
    "id"    	=> "footer_column_layout",
    "tip" 		=> "Select the footer column layout .",
    "type"  	=> "footer_layout"
);
$options["footer_settings"][] = array
(
    "name" 		=> "Display social icons on footer of the page",
    "id"    	=> "footer_social",
    "tip" 		=> "Select the checkbox to show social media icons on the footer of the page .",
    "exp" 		=> "Select the checkbox to show social media icons on the footer of the page .",
    "type"  	=> "checkbox"
);
$options["footer_settings"]["footer_copyrights"][] = array
(
    "name" 		=> "Copyright Bar",
    "id"    	=> "footer_copyright",
    "tip" 		=> "Enable or Disable : copyright bar .",
    "type"  	=> "checkbox"
);
$options["footer_settings"]["footer_copyrights"][] = array
(
    "name" 		=> "Copyright Text",
    "id"    	=> "footer_copyright_text",
    "type"  	=> "textarea"
);
/**
 * Header Adv
 */
$options["footer_settings"][] = array
(
    "name" 		=> "Footer Advertising",
    "type"  	=> "subtitle"
);
$options["footer_settings"]["footer_advertising"][] = array
(
    "name" 		=> "Footer Advertising",
    "id"    	=> "show_footer_ads",
    "type"  	=> "checkbox"
);
$options["footer_settings"]["footer_advertising"][] = array
(
    "name" 		=> "Footer Advertising Code html ( Google ads)",
    "tip" 		=> "Footer Advertising Code html ( Google ads).",
    "id"    	=> "footer_ads_code",
    "type"  	=> "textarea"
);
$options["footer_settings"]["footer_advertising"][] = array
(
    "name" 		=> "Footer Advertising upload image",
    "tip" 		=> "Footer Advertising upload image.",
    "id"    	=> "footer_ads_img",
    "type"  	=> "upload"
);
$options["footer_settings"]["footer_advertising"][] = array
(
    "name" 		=> "Footer Advertising Url",
    "tip" 		=> "Footer Advertising Url.",
    "id"    	=> "footer_ads_img_url",
    "type"  	=> "text"
);
$options["footer_settings"]["footer_advertising"][] = array
(
    "name" 		=> "Footer Advertising Alt name",
    "tip" 		=> "Footer Advertising Alt name.",
    "id"    	=> "footer_ads_img_altname",
    "type"  	=> "text"
);
/**
 * Breaking News in pic
 */
$options["breaking_news"][] = array
(
    "name" 		=> "Breaking News in pic",
    "type"  	=> "subtitle"
);
$options["breaking_news"]["breaking_news_in_pic_settings"][] = array
(
    "name" 		=> "Breaking News in pic",
    "id"    	=> "breaking_news_in_pic",
    "type"  	=> "checkbox"
);
$options["breaking_news"]["breaking_news_in_pic_settings"][] = array
(
    "name" 		=> "Breaking News in pic Title",
    "id"    	=> "breaking_news_in_pic_title",
    "type"  	=> "text"
);
$options["breaking_news"]["breaking_news_in_pic_settings"][] = array
(
    "name" 		=> "Number of posts",
    "id"    	=> "breaking_news_in_pic_bumber",
    "type"  	=> "ui_slider",
    "unit" 		=> "(in posts)",
    "max" 		=> 50,
    "min" 		=> 5
);
$options["breaking_news"]["breaking_news_in_pic_settings"][] = array
(
    "name" 		=> "Breaking News in pic display",
    "id" 		=> "breaking_news_in_pic_display",
    "type"  	=> "radio",
    "options"   => array
    (
        "lates"     => "Latest posts" ,
        "category"  => "Select Category" ,
        "tag"       => "Tags"
    ),
    "js"		=>
    '
    <script type="text/javascript">
        jQuery(document).ready(function()
        {
            jQuery(".r_breaking_news_in_pic_display").change(function ()
            {
                if(jQuery(this).val() == "lates")
                {
                    jQuery(".get_breaking_news_category").hide();
                    jQuery(".lates").fadeIn();
                    jQuery(".get_breaking_news_tags").hide();
                }
                else if(jQuery(this).val() == "tag")
                {
                    jQuery(".get_breaking_news_category").hide();
                    jQuery(".lates").hide();
                    jQuery(".get_breaking_news_tags").fadeIn();
                }
                else
                {
                    jQuery(".get_breaking_news_category").fadeIn();
                    jQuery(".lates").hide();
                    jQuery(".get_breaking_news_tags").hide();
                }
            });
        });
    </script>
    '
);
$newsticker_display_lates = (bdayh_get_option('breaking_news_in_pic_display') != 'lates') ? 'hidden' : '';
$newsticker_display_category = (bdayh_get_option('breaking_news_in_pic_display') != 'category') ? 'hidden' : '';
$options["breaking_news"]["breaking_news_in_pic_settings"][] = array
(
    "name" 		=> "Breaking News in pic Category",
    "id"		=> "breaking_news_in_pic_category",
    "type"  	=> "select",
    "class" 	=> $newsticker_display_category . " get_breaking_news_category",
    "list"		=> "cats"
);
$newsticker_display_tags = (bdayh_get_option('breaking_news_in_pic_display') != 'tag') ? 'hidden' : '';
$options["breaking_news"]["breaking_news_in_pic_settings"][] = array
(
    "name" 		=> "Breaking News in pic Tags",
    "id"		=> "breaking_news_in_pic_tag",
    "class" 	=> $newsticker_display_tags . " get_breaking_news_tags",
    "type"  	=> "tags"
);


/**
 * Breaking News
 */
$options["breaking_news"][] = array
(
    "name" 		=> "Breaking News",
    "type"  	=> "subtitle"
);
$options["breaking_news"]["breaking_news_settings"][] = array
(
    "name" 		=> "Breaking News",
    "id"    	=> "newsticker",
    "type"  	=> "checkbox"
);
$options["breaking_news"]["breaking_news_settings"][] = array
(
    "name" 		=> "Breaking News Title",
    "id"    	=> "newsticker_title",
    "type"  	=> "text"
);
$options["breaking_news"]["breaking_news_settings"][] = array
(
    "name" 		=> "Number of posts",
    "id"    	=> "newsticker_bumber",
    "type"  	=> "ui_slider",
    "unit" 		=> "(in posts)",
    "max" 		=> 50,
    "min" 		=> 5
);
$options["breaking_news"]["breaking_news_settings"][] = array
(
    "name" 		=> "Breaking News display",
    "id" 		=> "newsticker_display",
    "type"  	=> "radio",
    "options"   => array
    (
        "lates"     => "Latest posts" ,
        "category"  => "Select Category" ,
        "tag"       => "Tags"
    ),
    "js"		=>
    '
    <script type="text/javascript">
        jQuery(document).ready(function()
        {
            jQuery(".r_newsticker_display").change(function ()
            {
                if(jQuery(this).val() == "lates")
                {
                    jQuery(".get_newsticker_category").hide();
                    jQuery(".lates").fadeIn();
                    jQuery(".get_newsticker_tags").hide();
                }
                else if(jQuery(this).val() == "tag")
                {
                    jQuery(".get_newsticker_category").hide();
                    jQuery(".lates").hide();
                    jQuery(".get_newsticker_tags").fadeIn();
                }
                else
                {
                    jQuery(".get_newsticker_category").fadeIn();
                    jQuery(".lates").hide();
                    jQuery(".get_newsticker_tags").hide();
                }
            });
        });
    </script>
    '
);
$newsticker_display_lates = (bdayh_get_option('newsticker_display') != 'lates') ? 'hidden' : '';
$newsticker_display_category = (bdayh_get_option('newsticker_display') != 'category') ? 'hidden' : '';
$options["breaking_news"]["breaking_news_settings"][] = array
(
    "name" 		=> "Breaking News Category",
    "id"		=> "newsticker_category",
    "type"  	=> "select",
    "class" 	=> $newsticker_display_category . " get_newsticker_category",
    "list"		=> "cats"
);
$newsticker_display_tags = (bdayh_get_option('newsticker_display') != 'tag') ? 'hidden' : '';
$options["breaking_news"]["breaking_news_settings"][] = array
(
    "name" 		=> "Breaking News Tags",
    "id"		=> "newsticker_tag",
    "class" 	=> $newsticker_display_tags . " get_newsticker_tags",
    "type"  	=> "tags"
);
/**
 * Slider
 */
$options["sliders_options"]["bd_sliders_options"][] = array
(
    "name" 		=> "Slider",
    "id"    	=> "slider_show",
    "tip"    	=> "Show Slider.",
    "exp"    	=> "Show The Slider",
    "type"  	=> "checkbox"
);
$options["sliders_options"]["bd_sliders_options"][] = array
(
    "name" 		=> "Slider excerpt",
    "id"    	=> "slider_excerpt_show",
    "tip"    	=> "Show excerpt Slider.",
    "exp"    	=> "Show The excerpt Slider",
    "type"  	=> "checkbox"
);

$options["sliders_options"][] = array
(
    "name" 		=> "Slider Speed",
    "id"    	=> "slider_speed",
    "tip"    	=> "Select the Slider speed, 1000 = 1 second.",
    "exp"    	=> "Select the Slider speed, 1000 = 1 second.",
    "type"  	=> "ui_slider",
    "unit" 		=> "(second)",
    "max" 		=> 50000,
    "min" 		=> 0
);

$options["sliders_options"][] = array
(
    "name" 		=> "Slider Animation Speed",
    "id"    	=> "slider_animation",
    "tip"    	=> "Select the animation speed, 1000 = 1 second.",
    "exp"    	=> "Select the animation speed, 1000 = 1 second.",
    "type"  	=> "ui_slider",
    "unit" 		=> "(second)",
    "max" 		=> 5000,
    "min" 		=> 0
);

$options["sliders_options"][] = array
(
    "name" 		=> "Number of posts Sliders",
    "id"    	=> "slider_bumber",
    "type"  	=> "ui_slider",
    "unit" 		=> "(in posts)",
    "max" 		=> 20,
    "min" 		=> 5
);
$options["sliders_options"][] = array
(
    "name" 		=> "Slider display",
    "id" 		=> "slider_display",
    "type"  	=> "radio",
    "options"   => array
    (
        "lates"     => "Latest posts" ,
        "category"  => "Select Category" ,
        "tag"       => "Tags"
    ),
    "js"		=>
    '
    <script type="text/javascript">
        jQuery(document).ready(function()
        {
            jQuery(".r_slider_display").change(function ()
            {
                if(jQuery(this).val() == "lates")
                {
                    jQuery(".get_slider_category").hide();
                    jQuery(".lates").fadeIn();
                    jQuery(".get_slider_tags").hide();
                }
                else if(jQuery(this).val() == "tag")
                {
                    jQuery(".get_slider_category").hide();
                    jQuery(".lates").hide();
                    jQuery(".get_slider_tags").fadeIn();
                }
                else
                {
                    jQuery(".get_slider_category").fadeIn();
                    jQuery(".lates").hide();
                    jQuery(".get_slider_tags").hide();
                }
            });
        });
    </script>
    '
);
$slider_display_lates = (bdayh_get_option('slider_display') != 'lates') ? 'hidden' : '';
$slider_display_category = (bdayh_get_option('slider_display') != 'category') ? 'hidden' : '';
$options["sliders_options"][] = array
(
    "name" 		=> "Slider Category",
    "id"		=> "slider_category",
    "type"  	=> "select",
    "class" 	=> $slider_display_category . " get_slider_category",
    "list"		=> "cats"
);
$slider_display_tags = (bdayh_get_option('slider_display') != 'tag') ? 'hidden' : '';
$options["sliders_options"][] = array
(
    "name" 		=> "Slider Tags",
    "id"		=> "slider_tag",
    "class" 	=> $slider_display_tags . " get_slider_tags",
    "type"  	=> "tags"
);

/**
 * article
 */
/*
$options["blog_options"][] = array
(
    "name" 		=> "Excerpt Length",
    "id"    	=> "excerpt_length_blog",
    "tip"		=> "Default 60",
    "exp"		=> "Input the number of words you want to cut from the content to be the excerpt of search and archive page .",
    "type"  	=> "ui_slider",
    "unit" 		=> "(Length)",
    "max" 		=> 300,
    "min" 		=> 0
);
*/
$options["blog_options"][] = array
(
    "name" 		=> "Blog display",
    "id" 		=> "blog_displays",
    "exp"		=> "choose Blog display Layout .",
    "type"  	=> "radio",
    "options"   => array
    (
        "view_post_formats_small"       => "Small - Display with post formats" ,
        "view_post_small"               => "Small - Display with Posts Featured Image" ,
        "view_post_formats_big"         => "Wide - Display with post formats",
        "view_post_big"                 => "Wide - Display with Posts Featured Image",
        "view_post_mini"                => "Mini - Display with post Featured Image" ,
        "view_post_mini_formats"        => "Mini - Display with post formats"
    ),
);
$options["blog_options"]["bd_blog_options"][] = array
(
    "name" 		=> "Blogs Social Sharing",
    "id"    	=> "blog_social_sharing_box",
    "exp"		=> "Show Blogs Social Sharing. ",
    "type"  	=> "checkbox",
);

/**
 * article
 */
$options["article_options"][] = array
(
    "name" 		=> "Posts Slideshow Images",
    "id"    	=> "posts_slideshow_number",
    "exp"		=> "Number of images in posts slideshow ( Featured Image 1, 2, 3 ... etc ).",
    "type"  	=> "ui_slider",
    "unit" 		=> "(Featured Image)",
    "max" 		=> 100,
    "min" 		=> 0
);
$options["article_options"][] = array
(
    "name" 		=> "Post Elements",
    "type"  	=> "subtitle"
);
$options["article_options"]["post_meta"][] = array
(
    "name" 		=> "Tags",
    "id"    	=> "post_tags",
    "exp"		=> "Show Tags views on blog posts.",
    "type"  	=> "checkbox",
    "class"  	=> "col50",
);

$options["article_options"]["post_meta"][] = array
(
    "name" 		=> "Pagination",
    "id"    	=> "post_pagination",
    "exp"		=> "Show Pagination views on blog posts.",
    "type"  	=> "checkbox",
    "class"  	=> "col50",
);
$options["article_options"]["post_meta"][] = array
(
    "name" 		=> "Author Box",
    "id"    	=> "post_author_box",
    "exp"		=> "Show Author Box views on blog posts.",
    "type"  	=> "checkbox",
    "class"  	=> "col50",
);
$options["article_options"]["post_meta"][] = array
(
    "name" 		=> "Comments",
    "id"    	=> "post_comments_box",
    "exp"		=> "Show Comments Box views on blog posts.",
    "type"  	=> "checkbox",
    "class"  	=> "col50",
);
$options["article_options"]["post_meta"][] = array
(
    "name" 		=> "fb Comments",
    "id"    	=> "post_fb_comments_box",
    "exp"		=> "Show fb Comments Box views on blog posts.",
    "type"  	=> "checkbox",
    "class"  	=> "col50",
);
$options["article_options"]["post_meta"][] = array
(
    "name" 		=> "Comment Validation",
    "id"    	=> "post_comments_valid",
    "exp"		=> "Enable Comments Validation views on blog posts.",
    "type"  	=> "checkbox",
    "class"  	=> "col50",
);

/**
 * Related Posts
 */
$options["article_options"][] = array
(
    "name" 		=> "Related Posts",
    "type"  	=> "subtitle"
);
$options["article_options"]["related_posts"][] = array
(
    "name" 		=> "Related Posts",
    "id"    	=> "article_related",
    "exp"		=> "Show Related Posts on blog posts.",
    "type"  	=> "checkbox"
);
$options["article_options"]["related_posts"][] = array
(
    "name" 		=> "Number Of related Posts",
    "id"    	=> "article_related_numb",
    "tip"		=> "Number Of related Posts .",
    "type"  	=> "ui_slider",
    "unit" 		=> "(post)",
    "max" 		=> 30,
    "min" 		=> 0
);
$options["article_options"]["related_posts"][] = array
(
    "name" 		=> "Related posts Displays",
    "id" 		=> "related_style",
    "type"  	=> "radio",
    "options"   => array
    (
        "images"       => "Featured Image",
        "list"         => "List" ,
    ),
);



$options["article_options"]["post_meta"][] = array
(
    "name" 		=> "Post Meta",
    "id"    	=> "post_meta",
    "exp"		=> "Show post meta on blog posts.",
    "type"  	=> "checkbox",
    "class"  	=> "col50",
);
$options["article_options"]["post_meta"][] = array
(
    "name" 		=> "Post Meta author",
    "id"    	=> "post_meta_author",
    "exp"		=> "Show post meta author on blog posts.",
    "type"  	=> "checkbox",
    "class"  	=> "col50",
);
$options["article_options"]["post_meta"][] = array
(
    "name" 		=> "Post Meta category",
    "id"    	=> "post_meta_cats",
    "exp"		=> "Show post meta category on blog posts.",
    "type"  	=> "checkbox",
    "class"  	=> "col50",
);
$options["article_options"]["post_meta"][] = array
(
    "name" 		=> "Post Meta date",
    "id"    	=> "post_meta_date",
    "exp"		=> "Show post meta date on blog posts.",
    "type"  	=> "checkbox",
    "class"  	=> "col50",
);
$options["article_options"]["post_meta"][] = array
(
    "name" 		=> "Post Meta comments",
    "id"    	=> "post_meta_comments",
    "exp"		=> "Show post meta comments on blog posts.",
    "type"  	=> "checkbox",
    "class"  	=> "col50",
);
$options["article_options"]["post_meta"][] = array
(
    "name" 		=> "Post Meta views",
    "id"    	=> "post_meta_views",
    "exp"		=> "Show post meta views on blog posts.",
    "type"  	=> "checkbox",
    "class"  	=> "col50",
);


/**
 * Social Sharing
 */
$options["article_options"][] = array
(
    "name" 		=> "Social Sharing",
    "type"  	=> "subtitle"
);
$options["article_options"]['social_sharing'][] = array
(
    "name" 		=> "Social Sharing",
    "id"    	=> "social_sharing_box",
    "exp"		=> "Show Social Sharing in posts .",
    "type"  	=> "checkbox"
);
$options["article_options"]['social_sharing'][] = array
(
    "name" 		=> "Social Sharing display",
    "id" 		=> "social_displays",
    "exp"		=> "choose Social display .",
    "type"  	=> "radio",
    "options"   => array
    (
        "sharing_box_v1"       => "Just icon",
        "sharing_box_v2"       => "Vertical",
        "sharing_box_v3"       => "Horizontal"
    ),
);

$options["article_options"]['social_sharing'][] = array
(
    "name" 		=> "Twitter User Name",
    "id"    	=> "share_twitter_username",
    "type"  	=> "text"
);
$options["article_options"]['social_sharing'][] = array
(
    "name" 		=> "Facebook",
    "id"    	=> "sharing_facebook",
    "exp"		=> "Show the facebook sharing option in blog posts .",
    "type"  	=> "checkbox",
    "class"  	=> "col50",
);
$options["article_options"]['social_sharing'][] = array
(
    "name" 		=> "Twitter",
    "id"    	=> "sharing_twitter",
    "exp"		=> "Show the twitter sharing option in blog posts .",
    "type"  	=> "checkbox",
    "class"  	=> "col50",
);
$options["article_options"]['social_sharing'][] = array
(
    "name" 		=> "Linkedin",
    "id"    	=> "sharing_linkedin",
    "exp"		=> "Show the Linkedin sharing option in blog posts .",
    "type"  	=> "checkbox",
    "class"  	=> "col50",
);
$options["article_options"]['social_sharing'][] = array
(
    "name" 		=> "Reddit",
    "id"    	=> "sharing_reddit",
    "exp"		=> "Show the Reddit sharing option in blog posts .",
    "type"  	=> "checkbox",
    "class"  	=> "col50",
);
$options["article_options"]['social_sharing'][] = array
(
    "name" 		=> "Tumblr",
    "id"    	=> "sharing_tumblr",
    "exp"		=> "Show the Tumblr sharing option in blog posts .",
    "type"  	=> "checkbox",
    "class"  	=> "col50",
);
$options["article_options"]['social_sharing'][] = array
(
    "name" 		=> "Google",
    "id"    	=> "sharing_google",
    "exp"		=> "Show the Google sharing option in blog posts .",
    "type"  	=> "checkbox",
    "class"  	=> "col50",
);
$options["article_options"]['social_sharing'][] = array
(
    "name" 		=> "Pinterest",
    "id"    	=> "sharing_pinterest",
    "exp"		=> "Show the Pinterest sharing option in blog posts .",
    "type"  	=> "checkbox",
    "class"  	=> "col50",
);

/**
 * Archive
 */
$options["archive_options"]["bd_archive_options"][] = array
(
    "name" 		=> "Category Description",
    "id"    	=> "category_desc",
    "exp"		=> "Show Category Description",
    "type"  	=> "checkbox"
);
$options["archive_options"]["bd_archive_options"][] = array
(
    "name" 		=> "Category RSS",
    "id"    	=> "cate_rss",
    "exp"		=> "Show RSS Icon",
    "type"  	=> "checkbox"
);


/**
 * article Adv
 */
$options["article_advertising"]["article_adv_above"][] = array
(
    "name" 		=> "Article Above Advertising",
    "id"    	=> "show_article_above_ads",
    "type"  	=> "checkbox"
);
$options["article_advertising"]["article_adv_above"][] = array
(
    "name" 		=> "Article Above Advertising Code html ( Google ads)",
    "tip" 		=> "Article Above Advertising Code html ( Google ads).",
    "id"    	=> "article_above_ads_code",
    "type"  	=> "textarea"
);
$options["article_advertising"]["article_adv_above"][] = array
(
    "name" 		=> "Or : Article Above Advertising image",
    "tip" 		=> "Article Above Advertising upload image.",
    "id"    	=> "article_above_ads_img",
    "type"  	=> "upload"
);
$options["article_advertising"]["article_adv_above"][] = array
(
    "name" 		=> "Article Above Advertising Url",
    "tip" 		=> "Article Above Advertising Url.",
    "id"    	=> "article_above_ads_img_url",
    "type"  	=> "text"
);
$options["article_advertising"]["article_adv_above"][] = array
(
    "name" 		=> "Article Above Advertising Alt name",
    "tip" 		=> "Article Above Advertising Alt name.",
    "id"    	=> "article_above_ads_img_altname",
    "type"  	=> "text"
);


$options["article_advertising"]["article_adv_below"][] = array
(
    "name" 		=> "Article Below Advertising",
    "id"    	=> "show_article_below_ads",
    "type"  	=> "checkbox"
);
$options["article_advertising"]["article_adv_below"][] = array
(
    "name" 		=> "Article Below Advertising Code html ( Google ads)",
    "tip" 		=> "Article Below Advertising Code html ( Google ads).",
    "id"    	=> "article_below_ads_code",
    "type"  	=> "textarea"
);
$options["article_advertising"]["article_adv_below"][] = array
(
    "name" 		=> "Or : Article Below Advertising image",
    "tip" 		=> "Article Below Advertising upload image.",
    "id"    	=> "article_below_ads_img",
    "type"  	=> "upload"
);
$options["article_advertising"]["article_adv_below"][] = array
(
    "name" 		=> "Article Below Advertising Url",
    "tip" 		=> "Article Below Advertising Url.",
    "id"    	=> "article_below_ads_img_url",
    "type"  	=> "text"
);
$options["article_advertising"]["article_adv_below"][] = array
(
    "name" 		=> "Article Below Advertising Alt name",
    "tip" 		=> "Article Below Advertising Alt name.",
    "id"    	=> "article_below_ads_img_altname",
    "type"  	=> "text"
);

/**
 * Seo
 */
$options["seo"][] = array
(
    "name" 		=> "Enable Seo Feature",
    "id"    	=> "enable_seo",
    "tip"		=> "Enable Seo Feature.",
    "type"  	=> "checkbox"

);
$options["seo"][] = array
(
    "name" 		=> "Custom Keywords",
    "id"    	=> "seo_keywords",
    "tip"		=> "Add Custom Your Keywords.",
    "type"  	=> "textarea"

);

/**
* Social links
*/
$options["social_networking"]['social'][] = array
(
    "name" 		=> "Custom Feed URL",
    "tip"		=> "e.g. http://feedburner.com/userid",
    "id"    	=> "rss_url",
    "type"  	=> "text"
);
$options["social_networking"]['social'][] = array
(
    "name" 		=> "Facebook URL",
    "id"    	=> "social",
    "tip"		=> "Place the link you want and Facebook icon will appear",
    "key" 		=> "facebook",
    "type"  	=> "txt"
);
$options["social_networking"]['social'][] = array
(
    "name" 		=> "Twitter URL",
    "id"    	=> "social",
    "tip"		=> "Place the link you want and Twitter icon will appear",
    "key" 		=> "twitter",
    "type"  	=> "txt"
);
$options["social_networking"]['social'][] = array
(
    "name" 		=> "Google+ URL",
    "id"    	=> "social",
    "tip"		=> "Place the link you want and Google+ icon will appear",
    "key" 		=> "google_plus",
    "type"  	=> "txt"
);
$options["social_networking"]['social'][] = array
(
    "name" 		=> "dribbble URL",
    "id"    	=> "social",
    "tip"		=> "Place the link you want and dribbble icon will appear",
    "key" 		=> "dribbble",
    "type"  	=> "txt"
);
$options["social_networking"]['social'][] = array
(
    "name" 		=> "MySpace URL",
    "id"    	=> "social",
    "tip"		=> "Place the link you want and MySpace icon will appear",
    "key" 		=> "myspace",
    "type"  	=> "txt"
);
$options["social_networking"]['social'][] = array
(
    "name" 		=> "LinkedIn URL",
    "id"    	=> "social",
    "tip"		=> "Place the link you want and LinkedIn icon will appear",
    "key" 		=> "linkedin",
    "type"  	=> "txt"
);
$options["social_networking"]['social'][] = array
(
    "name" 		=> "evernote URL",
    "id"    	=> "social",
    "tip"		=> "Place the link you want and evernote icon will appear",
    "key" 		=> "evernote",
    "type"  	=> "txt"
);
$options["social_networking"]['social'][] = array
(
    "name" 		=> "Flickr URL",
    "id"    	=> "social",
    "tip"		=> "Place the link you want and Flickr icon will appear",
    "key" 		=> "flickr",
    "type"  	=> "txt"
);
$options["social_networking"]['social'][] = array
(
    "name" 		=> "DeviantArt URL",
    "id"    	=> "social",
    "tip"		=> "Place the link you want and DeviantArt icon will appear",
    "key" 		=> "deviantart",
    "type"  	=> "txt"
);
$options["social_networking"]['social'][] = array
(
    "name" 		=> "YouTube URL",
    "id"    	=> "social",
    "tip"		=> "Place the link you want and YouTube icon will appear",
    "key" 		=> "youtube",
    "type"  	=> "txt"
);
$options["social_networking"]['social'][] = array
(
    "name" 		=> "grooveshark URL",
    "id"    	=> "social",
    "tip"		=> "Place the link you want and grooveshark icon will appear",
    "key" 		=> "grooveshark",
    "type"  	=> "txt"
);
$options["social_networking"]['social'][] = array
(
    "name" 		=> "Vimeo URL",
    "id"    	=> "social",
    "tip"		=> "Place the link you want and Vimeo icon will appear",
    "key" 		=> "vimeo",
    "type"  	=> "txt"
);
$options["social_networking"]['social'][] = array
(
    "name" 		=> "Skype URL",
    "id"    	=> "social",
    "tip"		=> "Place the link you want and Skype icon will appear",
    "key" 		=> "skype",
    "type"  	=> "txt"
);
$options["social_networking"]['social'][] = array
(
    "name" 		=> "Digg URL",
    "id"    	=> "social",
    "tip"		=> "Place the link you want and Digg icon will appear",
    "key" 		=> "digg",
    "type"  	=> "txt"
);
$options["social_networking"]['social'][] = array
(
    "name" 		=> "Reddit URL",
    "id"    	=> "social",
    "tip"		=> "Place the link you want and Reddit icon will appear",
    "key" 		=> "reddit",
    "type"  	=> "txt"
);
$options["social_networking"]['social'][] = array
(
    "name" 		=> "Delicious URL",
    "id"    	=> "social",
    "tip"		=> "Place the link you want and Delicious icon will appear",
    "key" 		=> "delicious",
    "type"  	=> "txt"
);
$options["social_networking"]['social'][] = array
(
    "name" 		=> "StumbleUpon URL",
    "id"    	=> "social",
    "tip"		=> "Place the link you want and StumbleUpon icon will appear",
    "key" 		=> "stumbleupon",
    "type"  	=> "txt"
);
$options["social_networking"]['social'][] = array
(
    "name" 		=> "Tumblr URL",
    "id"    	=> "social",
    "tip"		=> "Place the link you want and Tumblr icon will appear",
    "key" 		=> "tumblr",
    "type"  	=> "txt"
);
$options["social_networking"]['social'][] = array
(
    "name" 		=> "Blogger URL",
    "id"    	=> "social",
    "tip"		=> "Place the link you want and Blogger icon will appear",
    "key" 		=> "blogger",
    "type"  	=> "txt"
);
$options["social_networking"]['social'][] = array
(
    "name" 		=> "Wordpress URL",
    "id"    	=> "social",
    "tip"		=> "Place the link you want and Wordpress icon will appear",
    "key" 		=> "wordpress",
    "type"  	=> "txt"
);
$options["social_networking"]['social'][] = array
(
    "name" 		=> "Yelp URL",
    "id"    	=> "social",
    "tip"		=> "Place the link you want and Yelp icon will appear",
    "key" 		=> "yelp",
    "type"  	=> "txt"
);
$options["social_networking"]['social'][] = array
(
    "name" 		=> "posterous URL",
    "id"    	=> "social",
    "tip"		=> "Place the link you want and posterous icon will appear",
    "key" 		=> "posterous",
    "type"  	=> "txt"
);
$options["social_networking"]['social'][] = array
(
    "name" 		=> "openid URL",
    "id"    	=> "social",
    "tip"		=> "Place the link you want and openid icon will appear",
    "key" 		=> "openid",
    "type"  	=> "txt"
);
$options["social_networking"]['social'][] = array
(
    "name" 		=> "xing.me URL",
    "id"    	=> "social",
    "tip"		=> "Place the link you want and xing.me icon will appear",
    "key" 		=> "xing",
    "type"  	=> "txt"
);
$options["social_networking"]['social'][] = array
(
    "name" 		=> "Google Play URL",
    "id"    	=> "social",
    "tip"		=> "Place the link you want and Google Play icon will appear",
    "key" 		=> "google_play",
    "type"  	=> "txt"
);
$options["social_networking"]['social'][] = array
(
    "name" 		=> "Pinterest URL",
    "id"    	=> "social",
    "tip"		=> "Place the link you want and Pinterest icon will appear",
    "key" 		=> "Pinterest",
    "type"  	=> "txt"
);
$options["social_networking"]['social'][] = array
(
    "name" 		=> "Forrst URL",
    "id"    	=> "social",
    "tip"		=> "Place the link you want and Forrst icon will appear",
    "key" 		=> "forrst",
    "type"  	=> "txt"
);
$options["social_networking"]['social'][] = array
(
    "name" 		=> "Behance URL",
    "id"    	=> "social",
    "tip"		=> "Place the link you want and Behance icon will appear",
    "key" 		=> "behance",
    "type"  	=> "txt"
);
$options["social_networking"]['social'][] = array
(
    "name" 		=> "Viadeo URL",
    "id"    	=> "social",
    "tip"		=> "Place the link you want and Viadeo icon will appear",
    "key" 		=> "viadeo",
    "type"  	=> "txt"
);
$options["social_networking"]['social'][] = array
(
    "name" 		=> "VK.com URL",
    "id"    	=> "social",
    "tip"		=> "Place the link you want and VK.com icon will appear",
    "key" 		=> "vk",
    "type"  	=> "txt"
);
$options["social_networking"]['social'][] = array
(
    "name" 		=> "Last.fm URL",
    "id"    	=> "social",
    "tip"		=> "Place the link you want and Last.fm icon will appear",
    "key" 		=> "lastfm",
    "type"  	=> "txt"
);
$options["social_networking"]['social'][] = array
(
    "name" 		=> "Instagram URL",
    "id"    	=> "social",
    "tip"		=> "Place the link you want and Instagram icon will appear",
    "key" 		=> "instagram",
    "type"  	=> "txt"
);
$options["social_networking"]['social'][] = array
(
    "name" 		=> "Spotify URL",
    "id"    	=> "social",
    "tip"		=> "Place the link you want and Spotify icon will appear",
    "key" 		=> "spotify",
    "type"  	=> "txt"
);
$options["social_networking"]['social'][] = array
(
    "name" 		=> "PayPal URL",
    "id"    	=> "social",
    "tip"		=> "Place the link you want and PayPal icon will appear",
    "key" 		=> "paypal",
    "type"  	=> "txt"
);
$options["social_networking"]['social'][] = array
(
    "name" 		=> "Apple URL",
    "id"    	=> "social",
    "tip"		=> "Place the link you want and Apple icon will appear",
    "key" 		=> "apple",
    "type"  	=> "txt"
);
$options["social_networking"]['social'][] = array
(
    "name" 		=> "Amazon URL",
    "id"    	=> "social",
    "tip"		=> "Place the link you want and Amazon icon will appear",
    "key" 		=> "amazon",
    "type"  	=> "txt"
);
$options["social_networking"]['social'][] = array
(
    "name" 		=> "Soundcloud URL",
    "id"    	=> "social",
    "tip"		=> "Place the link you want and Soundcloud icon will appear",
    "key" 		=> "soundcloud",
    "type"  	=> "txt"
);
$options["theme_styling"]["custom_theme_color_options"][] = array
(
    "name" 		=> "Layout",
    "id"    	=> "layout",
    "tip"		=> "Boxed or wide layout ?",
    "exp"		=> "Boxed or wide layout ?",
    "type"  	=> "layout_type"
);
$options["theme_styling"]["custom_theme_color_options"][] = array
(
    "name" 		=> "Choose Theme Color",
    "id"    	=> "custom_theme_colors",
    "type"  	=> "theme_colors"
);
$options["theme_styling"]["custom_theme_color_options"][] = array
(
    "name" 		=> "Custom Theme Color",
    "id"    	=> "custom_theme_color",
    "type"  	=> "color"
);




$options["theme_styling"]['custom_background_box'][] = array
(
    "name" 		=> "Background display",
    "id" 		=> "background_displays",
    "exp"		=> "choose Background display",
    "type"  	=> "radio",
    "options"   => array
    (
        "bg_cutsom"       => "Custom Background" ,
        "bg_pattren"      => "Pattern",
    ),
    "js"		=>
    '
    <script type="text/javascript">
        jQuery(document).ready(function()
        {
            jQuery(".r_background_displays").change(function ()
            {
                if(jQuery(this).val() == "bg_cutsom")
                {
                    jQuery(".bd_custom_pattrens_color, .bd_custom_pattrens").hide();
                    jQuery(".bd_custom_background, .bd_custom_background_full").fadeIn();
                }
                else
                {
                    jQuery(".bd_custom_pattrens_color, .bd_custom_pattrens").fadeIn();
                    jQuery(".bd_custom_background, .bd_custom_background_full").hide();
                }
            });
        });
    </script>
    '
);
$options["theme_styling"]['custom_background_box'][] = array
(
    "name" 		=> "&nbsp;",
    "type"  	=> "subtitle"
);


$bg_cus = (bdayh_get_option('background_displays') != 'bg_cutsom') ? 'hidden' : '';
$options["theme_styling"]['custom_background_box'][] = array
(
    "name" 		=> "Custom Background",
    "id"    	=> "custom_background",
    "type"  	=> "bgop",
    "class" 	=> $bg_cus . " bd_custom_background",
);
$bg_cus_full = (bdayh_get_option('background_displays') != 'bg_cutsom') ? 'hidden' : '';
$options["theme_styling"]['custom_background_box'][] = array
(
    "name" 		=> "Full Screen",
    "id"    	=> "custom_background_full",
    "type"  	=> "checkbox",
    "class" 	=> $bg_cus_full . " bd_custom_background_full",
);

$bg_pat_color = (bdayh_get_option('background_displays') != 'bg_pattren') ? 'hidden' : '';
$options["theme_styling"]['custom_background_box'][] = array
(
    "name" 		=> "Background Color",
    "id"    	=> "custom_pattrens_color",
    "type"  	=> "color",
    "class" 	=> $bg_pat_color . " bd_custom_pattrens_color",
);
$bg_pat = (bdayh_get_option('background_displays') != 'bg_pattren') ? 'hidden' : '';
$options["theme_styling"]['custom_background_box'][] = array
(
    "name" 		=> "Choose Pattern",
    "id"    	=> "custom_pattrens",
    "type"  	=> "pattrens_bg",
    "class" 	=> $bg_pat . " bd_custom_pattrens",
);


/**
 *  Custom Css Style
 */
$options["theme_styling"][] = array
(
    "name" 		=> "Custom CSS",
    "id"    	=> "custom_css",
    "tip"       => "Any custom CSS from the user should go in this field, it will override the theme CSS",
    "type"  	=> "textarea",
    "class"     => "textarea-large"
);

/**
 *  Custom Css Style
 */
$options["custom_design"]["global_main_color"][] = array
(
    "name" 		=> "Main",
    "type"  	=> "subtitle"
);
$options["custom_design"]["global_main_color"][] = array
(
    "name" 		=> "Main text Color",
    "id"    	=> "main_text_color",
    "type"  	=> "color"
);
$options["custom_design"]["global_main_color"][] = array
(
    "name" 		=> "Links Color",
    "id"    	=> "links_color",
    "type"  	=> "color"
);
$options["custom_design"]["global_main_color"][] = array
(
    "name" 		=> "Links Decoration",
    "id"    	=> "links_decoration",
    "type"  	=> "sellist",
    "options" 	=>
    array(
        ""=>"Default" ,
        "none"=>"none",
        "underline"=>"underline",
        "overline"=>"overline",
        "line-through"=>"line-through"
    ),
);
$options["custom_design"]["global_main_color"][] = array
(
    "name" 		=> "Links Color on mouse over",
    "id"    	=> "links_color_hover",
    "type"  	=> "color"
);
$options["custom_design"]["global_main_color"][] = array
(
    "name" 		=> "Links Decoration on mouse over",
    "id"    	=> "links_decoration_hover",
    "type"  	=> "sellist",
    "options" 	=>
    array(
        ""=>"Default" ,
        "none"=>"none",
        "underline"=>"underline",
        "overline"=>"overline",
        "line-through"=>"line-through"
    ),
);

/**
 *  wrapper
 */
$options["custom_design"]["bd_wrapper"][] = array
(
    "name" 		=> "Wrapper Backgrounds",
    "type"  	=> "subtitle"
);
$options["custom_design"]['bd_wrapper'][] = array
(
    "name" 		=> "Wrapper",
    "id"    	=> "bd_wrapper_background",
    "type"  	=> "bgop"
);
$options["custom_design"]['bd_wrapper'][] = array
(
    "name" 		=> "Top bar",
    "id"    	=> "bd_topbar_background",
    "type"  	=> "bgop"
);
$options["custom_design"]['bd_wrapper'][] = array
(
    "name" 		=> "Header",
    "id"    	=> "bd_header_background",
    "type"  	=> "bgop"
);
$options["custom_design"]['bd_wrapper'][] = array
(
    "name" 		=> "Footer",
    "id"    	=> "bd_footer_background",
    "type"  	=> "bgop"
);

/**
 *  Custom Css Style
 */
$options["typography"]["bd_tybo"][] = array
(
    "name" 		=> "General Typography",
    "id"    	=> "tybo_general",
    "type"  	=> "tybo"
);
$options["typography"]["bd_tybo"][] = array
(
    "name" 		=> "Top bar Typography",
    "id"    	=> "tybo_topbar",
    "type"  	=> "tybo"
);
$options["typography"]["bd_tybo"][] = array
(
    "name" 		=> "Navigation Typography",
    "id"    	=> "tybo_nav",
    "type"  	=> "tybo"
);
$options["typography"]["bd_tybo"][] = array
(
    "name" 		=> "Boxs Title",
    "id"    	=> "tybo_boxtitle",
    "type"  	=> "tybo"
);
$options["typography"]["bd_tybo"][] = array
(
    "name" 		=> "Box Post Title",
    "id"    	=> "tybo_boxposttitle",
    "type"  	=> "tybo"
);
$options["typography"]["bd_tybo"][] = array
(
    "name" 		=> "Article Title",
    "id"    	=> "tybo_article_post_title",
    "type"  	=> "tybo"
);
$options["typography"]["bd_tybo"][] = array
(
    "name" 		=> "Article Entry",
    "id"    	=> "tybo_article_post_entry",
    "type"  	=> "tybo"
);
$options["typography"]["bd_tybo"][] = array
(
    "name" 		=> "Article Paragraph",
    "id"    	=> "tybo_p_p",
    "type"  	=> "tybo"
);
$options["typography"]["bd_tybo"][] = array
(
    "name" 		=> "H1",
    "id"    	=> "tybo_p_h1",
    "type"  	=> "tybo"
);
$options["typography"]["bd_tybo"][] = array
(
    "name" 		=> "H2",
    "id"    	=> "tybo_p_h2",
    "type"  	=> "tybo"
);
$options["typography"]["bd_tybo"][] = array
(
    "name" 		=> "H3",
    "id"    	=> "tybo_p_h3",
    "type"  	=> "tybo"
);
$options["typography"]["bd_tybo"][] = array
(
    "name" 		=> "H4",
    "id"    	=> "tybo_p_h4",
    "type"  	=> "tybo"
);
$options["typography"]["bd_tybo"][] = array
(
    "name" 		=> "H5",
    "id"    	=> "tybo_p_h5",
    "type"  	=> "tybo"
);
$options["typography"]["bd_tybo"][] = array
(
    "name" 		=> "H6",
    "id"    	=> "tybo_p_h6",
    "type"  	=> "tybo"
);

/**
 *  Contact Options
 */
$options["contact_options"][] = array
(
    "name" 		=> "Email Address",
    "id"    	=> "contact_email_address",
    "type"  	=> "text"
);
$options["contact_options"]["gmap"][] = array
(
    "name" 		=> "Google Map",
    "id"    	=> "gmap_show",
    "exp"		=> "Show Google Map In Contact us page",
    "type"  	=> "checkbox"
);
$options["contact_options"]["gmap"][] = array
(
    "name" 		=> "Google Map Width",
    "id"    	=> "gmap_width",
    "exp"		=> "(in pixels or percentage, e.g.:100% or 100px)",
    "type"  	=> "text"
);
$options["contact_options"]["gmap"][] = array
(
    "name" 		=> "Google Map Height",
    "id"    	=> "gmap_height",
    "exp"		=> "(in pixels, e.g.: 100px)",
    "type"  	=> "text"
);
$options["contact_options"]["gmap"][] = array
(
    "name" 		=> "Google Map URL",
    "id"    	=> "gmap_url",
    "exp"		=> "Google Map URL",
    "type"  	=> "text"
);

$options["contact_options"]["c_info"][] = array
(
    "name" 		=> "Contact info Address",
    "id"    	=> "c_info_address",
    "type"  	=> "textarea"
);
$options["contact_options"]["c_info"][] = array
(
    "name" 		=> "Contact info line 1",
    "id"    	=> "c_info_line1",
    "type"  	=> "text"
);
$options["contact_options"]["c_info"][] = array
(
    "name" 		=> "Contact info line 2",
    "id"    	=> "c_info_line2",
    "type"  	=> "text"
);
$options["contact_options"]["c_info"][] = array
(
    "name" 		=> "Contact info line 3",
    "id"    	=> "c_info_line3",
    "type"  	=> "text"
);
$options["contact_options"]["c_info"][] = array
(
    "name" 		=> "Contact info line 4",
    "id"    	=> "c_info_line4",
    "type"  	=> "text"
);
$options["contact_options"]["c_info"][] = array
(
    "name" 		=> "Contact info line 5",
    "id"    	=> "c_info_line5",
    "type"  	=> "text"
);

/**
 *  Twitter API
 */
$options["twitter_API"][] = array
(
    "name" 		=> "Twitter Username",
    "id"    	=> "twitter_username",
    "tip"		=> "Twitter Username without @",
    "exp"       => 'You need to create <a href="https://dev.twitter.com/apps" target="_blank">Twitter APP</a>',
    "type"  	=> "text"
);
$options["twitter_API"][] = array
(
    "name" 		=> "Twitter Consumer Key",
    "id"    	=> "twitter_consumer_key",
    "tip"		=> "Twitter Consumer Key",
    "type"  	=> "text"
);
$options["twitter_API"][] = array
(
    "name" 		=> "Twitter Consumer Secret",
    "id"    	=> "twitter_consumer_secret",
    "tip"		=> "Twitter Consumer Secret",
    "type"  	=> "text"
);
$options["twitter_API"][] = array
(
    "name" 		=> "Twitter Access Token",
    "id"    	=> "twitter_access_token",
    "tip"		=> "Twitter Access Token",
    "type"  	=> "text"
);
$options["twitter_API"][] = array
(
    "name" 		=> "Twitter Access Token Secret",
    "id"    	=> "twitter_access_token_secret",
    "tip"		=> "Twitter Access Token Secret",
    "type"  	=> "text"
);

/**
 *  Theme Backup
 */
$options["backup_options"][] = array
(
    "name" 		=> "Backup Import Options",
    "id"    	=> "advanced_import",
    "exp"       => "You can transfer the saved options data between different installs by copying the text inside the text box.",
    "type"  	=> "textarea"
);
$options["backup_options"][] = array
(
    "name" 		=> "Backup Export Options",
    "id"    	=> "advanced_export",
    "type"  	=> "textarea"
);

/**
$options["custom_style"][] = array
(
    "name" 		=> "Background",
    "id"    	=> "wr_style",
    "type"  	=> "bgop"
);

$options["custom_style"][] = array
(
    "name" 		=> "Typography",
    "id"    	=> "tybo_style",
    "type"  	=> "tybo"
);

$options["custom_style"][] = array
(
    "name" 		=> "Color Style",
    "id"    	=> "color_style",
    "type"  	=> "color"
);
$options["custom_style"][] = array
(
    "name" 		=> "Text Decoration",
    "id"    	=> "text_decoration",
    "type"  	=> "sellist",
    "options" 	=>
    array
    (
        ""              => "Default" ,
        "none"          => "none",
        "underline"     => "underline",
        "overline"      => "overline",
        "line-through"  => "line-through"
    ),
);
*/