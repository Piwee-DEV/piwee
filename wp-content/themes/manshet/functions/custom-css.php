<?php global $bd_data; ?>
<style type="text/css">
body {
<?php global $bd_data; if($bd_data['background_displays'] == 'bg_cutsom') : ; ?>
<?php $bg =$bd_data['custom_background']; ?>
<?php if( !empty( $bg['color'] ) ){ ?>background-color:<?php echo $bg['color'] ?>; <?php echo "\n"; } ?>
<?php if( !empty( $bg['img'] ) ){ ?>background-image: url('<?php echo $bg['img'] ?>'); <?php echo "\n"; } ?>
<?php if( !empty( $bg['repeat'] ) ){ ?>background-repeat:<?php echo $bg['repeat'] ?>; <?php echo "\n"; } ?>
<?php if( !empty( $bg['attachment'] ) ){ ?>background-attachment:<?php echo $bg['attachment'] ?> ; <?php echo "\n"; } ?>
<?php if( !empty( $bg['hor'] ) || !empty( $bg['ver'] ) ){ ?>background-position:<?php echo $bg['hor'] ?> <?php echo $bg['ver'] ?>; <?php echo "\n"; } ?>
<?php if($bd_data['custom_background_full']): ?>
-webkit-background-size: cover;
-moz-background-size: cover;
-o-background-size: cover;
background-size: cover;
<?php endif; ?>
<?php elseif($bd_data['background_displays'] == 'bg_pattren') : ?>
<?php if(array_key_exists('pattrens_bg',$bd_data)){ if($bd_data['pattrens_bg'] == 'none'){ ?><?php echo "\n"; }} ?>
<?php if(array_key_exists('pattrens_bg',$bd_data)){ if($bd_data['pattrens_bg'] == 'pat1'){ ?><?php if( !empty( $bd_data['custom_pattrens_color'] ) ){ ?>background-color:<?php echo $bd_data['custom_pattrens_color'] ?>; <?php } ?> background-image: url("<?php echo get_template_directory_uri() ?>/images/pattrens/pat-1.png"); background-position: center center; background-repeat: repeat; <?php echo "\n"; }} ?>
<?php if(array_key_exists('pattrens_bg',$bd_data)){ if($bd_data['pattrens_bg'] == 'pat2'){ ?><?php if( !empty( $bd_data['custom_pattrens_color'] ) ){ ?>background-color:<?php echo $bd_data['custom_pattrens_color'] ?>; <?php } ?> background-image: url("<?php echo get_template_directory_uri() ?>/images/pattrens/pat-2.png"); background-position: center center; background-repeat: repeat; <?php echo "\n"; }} ?>
<?php if(array_key_exists('pattrens_bg',$bd_data)){ if($bd_data['pattrens_bg'] == 'pat3'){ ?><?php if( !empty( $bd_data['custom_pattrens_color'] ) ){ ?>background-color:<?php echo $bd_data['custom_pattrens_color'] ?>; <?php } ?> background-image: url("<?php echo get_template_directory_uri() ?>/images/pattrens/pat-3.png"); background-position: center center; background-repeat: repeat; <?php echo "\n"; }} ?>
<?php if(array_key_exists('pattrens_bg',$bd_data)){ if($bd_data['pattrens_bg'] == 'pat4'){ ?><?php if( !empty( $bd_data['custom_pattrens_color'] ) ){ ?>background-color:<?php echo $bd_data['custom_pattrens_color'] ?>; <?php } ?> background-image: url("<?php echo get_template_directory_uri() ?>/images/pattrens/pat-4.png"); background-position: center center; background-repeat: repeat; <?php echo "\n"; }} ?>
<?php if(array_key_exists('pattrens_bg',$bd_data)){ if($bd_data['pattrens_bg'] == 'pat5'){ ?><?php if( !empty( $bd_data['custom_pattrens_color'] ) ){ ?>background-color:<?php echo $bd_data['custom_pattrens_color'] ?>; <?php } ?> background-image: url("<?php echo get_template_directory_uri() ?>/images/pattrens/pat-5.png"); background-position: center center; background-repeat: repeat; <?php echo "\n"; }} ?>
<?php if(array_key_exists('pattrens_bg',$bd_data)){ if($bd_data['pattrens_bg'] == 'pat6'){ ?><?php if( !empty( $bd_data['custom_pattrens_color'] ) ){ ?>background-color:<?php echo $bd_data['custom_pattrens_color'] ?>; <?php } ?> background-image: url("<?php echo get_template_directory_uri() ?>/images/pattrens/pat-6.png"); background-position: center center; background-repeat: repeat; <?php echo "\n"; }} ?>
<?php if(array_key_exists('pattrens_bg',$bd_data)){ if($bd_data['pattrens_bg'] == 'pat7'){ ?><?php if( !empty( $bd_data['custom_pattrens_color'] ) ){ ?>background-color:<?php echo $bd_data['custom_pattrens_color'] ?>; <?php } ?> background-image: url("<?php echo get_template_directory_uri() ?>/images/pattrens/pat-7.png"); background-position: center center; background-repeat: repeat; <?php echo "\n"; }} ?>
<?php if(array_key_exists('pattrens_bg',$bd_data)){ if($bd_data['pattrens_bg'] == 'pat8'){ ?><?php if( !empty( $bd_data['custom_pattrens_color'] ) ){ ?>background-color:<?php echo $bd_data['custom_pattrens_color'] ?>; <?php } ?> background-image: url("<?php echo get_template_directory_uri() ?>/images/pattrens/pat-8.png"); background-position: center center; background-repeat: repeat; <?php echo "\n"; }} ?>
<?php if(array_key_exists('pattrens_bg',$bd_data)){ if($bd_data['pattrens_bg'] == 'pat9'){ ?><?php if( !empty( $bd_data['custom_pattrens_color'] ) ){ ?>background-color:<?php echo $bd_data['custom_pattrens_color'] ?>; <?php } ?> background-image: url("<?php echo get_template_directory_uri() ?>/images/pattrens/pat-9.png"); background-position: center center; background-repeat: repeat; <?php echo "\n"; }} ?>
<?php if(array_key_exists('pattrens_bg',$bd_data)){ if($bd_data['pattrens_bg'] == 'pat10'){ ?><?php if( !empty( $bd_data['custom_pattrens_color'] ) ){ ?>background-color:<?php echo $bd_data['custom_pattrens_color'] ?>; <?php } ?> background-image: url("<?php echo get_template_directory_uri() ?>/images/pattrens/pat-10.png"); background-position: center center; background-repeat: repeat; <?php echo "\n"; }} ?>
<?php if(array_key_exists('pattrens_bg',$bd_data)){ if($bd_data['pattrens_bg'] == 'pat11'){ ?><?php if( !empty( $bd_data['custom_pattrens_color'] ) ){ ?>background-color:<?php echo $bd_data['custom_pattrens_color'] ?>; <?php } ?> background-image: url("<?php echo get_template_directory_uri() ?>/images/pattrens/pat-11.png"); background-position: center center; background-repeat: repeat; <?php echo "\n"; }} ?>
<?php if(array_key_exists('pattrens_bg',$bd_data)){ if($bd_data['pattrens_bg'] == 'pat12'){ ?><?php if( !empty( $bd_data['custom_pattrens_color'] ) ){ ?>background-color:<?php echo $bd_data['custom_pattrens_color'] ?>; <?php } ?> background-image: url("<?php echo get_template_directory_uri() ?>/images/pattrens/pat-12.png"); background-position: center center; background-repeat: repeat; <?php echo "\n"; }} ?>
<?php if(array_key_exists('pattrens_bg',$bd_data)){ if($bd_data['pattrens_bg'] == 'pat13'){ ?><?php if( !empty( $bd_data['custom_pattrens_color'] ) ){ ?>background-color:<?php echo $bd_data['custom_pattrens_color'] ?>; <?php } ?> background-image: url("<?php echo get_template_directory_uri() ?>/images/pattrens/pat-13.png"); background-position: center center; background-repeat: repeat; <?php echo "\n"; }} ?>
<?php if(array_key_exists('pattrens_bg',$bd_data)){ if($bd_data['pattrens_bg'] == 'pat14'){ ?><?php if( !empty( $bd_data['custom_pattrens_color'] ) ){ ?>background-color:<?php echo $bd_data['custom_pattrens_color'] ?>; <?php } ?> background-image: url("<?php echo get_template_directory_uri() ?>/images/pattrens/pat-14.png"); background-position: center center; background-repeat: repeat; <?php echo "\n"; }} ?>
<?php if(array_key_exists('pattrens_bg',$bd_data)){ if($bd_data['pattrens_bg'] == 'pat15'){ ?><?php if( !empty( $bd_data['custom_pattrens_color'] ) ){ ?>background-color:<?php echo $bd_data['custom_pattrens_color'] ?>; <?php } ?> background-image: url("<?php echo get_template_directory_uri() ?>/images/pattrens/pat-15.png"); background-position: center center; background-repeat: repeat; <?php echo "\n"; }} ?>
<?php if(array_key_exists('pattrens_bg',$bd_data)){ if($bd_data['pattrens_bg'] == 'pat16'){ ?><?php if( !empty( $bd_data['custom_pattrens_color'] ) ){ ?>background-color:<?php echo $bd_data['custom_pattrens_color'] ?>; <?php } ?> background-image: url("<?php echo get_template_directory_uri() ?>/images/pattrens/pat-16.png"); background-position: center center; background-repeat: repeat; <?php echo "\n"; }} ?>
<?php if(array_key_exists('pattrens_bg',$bd_data)){ if($bd_data['pattrens_bg'] == 'pat17'){ ?><?php if( !empty( $bd_data['custom_pattrens_color'] ) ){ ?>background-color:<?php echo $bd_data['custom_pattrens_color'] ?>; <?php } ?> background-image: url("<?php echo get_template_directory_uri() ?>/images/pattrens/pat-17.png"); background-position: center center; background-repeat: repeat; <?php echo "\n"; }} ?>
<?php if(array_key_exists('pattrens_bg',$bd_data)){ if($bd_data['pattrens_bg'] == 'pat18'){ ?><?php if( !empty( $bd_data['custom_pattrens_color'] ) ){ ?>background-color:<?php echo $bd_data['custom_pattrens_color'] ?>; <?php } ?> background-image: url("<?php echo get_template_directory_uri() ?>/images/pattrens/pat-18.png"); background-position: center center; background-repeat: repeat; <?php echo "\n"; }} ?>
<?php if(array_key_exists('pattrens_bg',$bd_data)){ if($bd_data['pattrens_bg'] == 'pat19'){ ?><?php if( !empty( $bd_data['custom_pattrens_color'] ) ){ ?>background-color:<?php echo $bd_data['custom_pattrens_color'] ?>; <?php } ?> background-image: url("<?php echo get_template_directory_uri() ?>/images/pattrens/pat-19.png"); background-position: center center; background-repeat: repeat; <?php echo "\n"; }} ?>
<?php if(array_key_exists('pattrens_bg',$bd_data)){ if($bd_data['pattrens_bg'] == 'pat20'){ ?>background-image: url("<?php echo get_template_directory_uri() ?>/images/pattrens/pat-20.png"); background-position: center center; background-repeat: repeat; <?php echo "\n"; }} ?>
<?php endif; ?>
}
<?php if(array_key_exists('custom_css',$bd_data)){ if( !empty( $bd_data['custom_css'] ) ){ ?>/* Custom Css */<?php echo "\n"; }} ?>
<?php if(array_key_exists('custom_css',$bd_data)){ $css_var = $bd_data['custom_css'];}else{$css_var = '';} $css_code =  str_replace("<pre>", "", htmlspecialchars_decode($css_var));  echo $css_code = str_replace("</pre>", "", $css_code )  , "\n";?>
<?php if( !empty( $bd_data['custom_theme_color'] ) ){ ?>
.gotop:hover,
.btn,
.button,
button.button,
.btn[type="submit"],
.button[type="submit"],
input[type="button"],
input[type="reset"],
input[type="submit"],
.top-menu ul ul li:hover > a, .top-menu ul ul :hover > a,
.nav ul ul li:hover > a, .nav ul ul :hover > a,
.nav ul li.current-menu-item ul.sub-menu a, .nav ul li.current-menu-item ul.sub-menu a:hover, .nav ul li.current-menu-parent ul.sub-menu a:hover, .nav ul li.current-page-ancestor ul.sub-menu a, .nav ul li.current-page-ancestor ul.sub-menu a:hover,
.nav ul li.current-menu-item a, .nav ul li.current-menu-item a:hover, .nav ul li.current-menu-parent a, .nav ul li.current-menu-parent a:hover, .nav ul li.current-page-ancestor a, .nav ul li.current-page-ancestor a:hover,
.header-v4 .top-bar-left .breaking-news .breaking-news-title,
.content-wrapper .post-image a,
#breaking-news-in-pic .post-image a,
div.box-title-more .prev:hover,
div.box-title-more .nxt:hover,
div.box-title-more .more-plus:hover,
#calendar_wrap #wp-calendar #today, #calendar_wrap #wp-calendar #today,
#footer-widgets .widget.widget_tabs .tabs_nav li.active,
.widget.flexslider .flex-prev:hover,
.widget.flexslider .flex-next:hover,
#slider.flexslider .flex-prev:hover,
#slider.flexslider .flex-next:hover,
.pagenavi span.pagenavi-current,
.home-blog .flexslider .flex-prev:hover,
.home-blog .flexslider .flex-next:hover,
.article .flexslider .flex-prev:hover,
.article .flexslider .flex-next:hover,
span.bd-criteria-percentage,
div#bd-criteria-final-score,
.tagcloud a:hover,
.home-box-title div.box-title-more .prev:hover,
.home-box-title div.box-title-more .nxt:hover,
.home-box-title div.box-title-more .more-plus:hover,
.header-v5 .breaking-news .breaking-news-title,
.post-gallery,
.gallery-caption
{
    background-color: <?php echo $bd_data['custom_theme_color'] ?> !important;
}
a:hover,
span.required,
.pagenavi a:hover,
span.bd-criteria-percentage,
.post-navigation a:hover,
.breadcrumbs  a,
div.toggle span,
.header-v5 nav#nav ul .current_page_item a, .header-v5 nav#nav ul .current-menu-item  a, .header-v5 nav#nav ul > .current-menu-parent a
{
    color: <?php echo $bd_data['custom_theme_color'] ?> !important;
}
div.box-title h2,
div.box-title-more .prev:hover,
div.box-title-more .nxt:hover,
div.box-title-more .more-plus:hover,
.widget.widget_tabs .tabs_nav li.active a,
.pagenavi span.pagenavi-current,
.pagenavi a:hover,
div.bd-review-summary,
#bd-review-header,
.post-entry blockquote,
.home-box-title h2,
.timeline-list .timeline-item .timeline-link  a,
.header-v5 nav#nav ul .current_page_item a, .header-v5 nav#nav ul .current-menu-item  a, .header-v5 nav#nav ul > .current-menu-parent a,
.header-v5 nav#nav ul ul
{
    border-color: <?php echo $bd_data['custom_theme_color'] ?> !important;
}
<?php echo "\n"; } ?>
<?php if( !empty( $bd_data['main_text_color'] ) ){ ?>
    body {color: <?php echo $bd_data['main_text_color'] ?> !important;}
<?php } ?>
<?php if( !empty( $bd_data['links_color'] ) ){ ?>
    a {color: <?php echo $bd_data['links_color'] ?> !important;}
<?php } ?>
<?php if( !empty( $bd_data['links_decoration'] ) ){ ?>
    a {text-decoration: <?php echo $bd_data['links_decoration'] ?> !important;}
<?php } ?>
<?php if( !empty( $bd_data['links_color_hover'] ) ){ ?>
    a:hover {color: <?php echo $bd_data['links_color_hover'] ?> !important;}
<?php } ?>
<?php if( !empty( $bd_data['links_decoration_hover'] ) ){ ?>
    a:hover {text-decoration: <?php echo $bd_data['links_decoration_hover'] ?> !important;}
<?php } ?>

<?php if( !empty( $bd_data['links_decoration_hover'] ) ){ ?>
a:hover {text-decoration: <?php echo $bd_data['links_decoration_hover'] ?> !important;}
<?php } ?>
<?php
/* wrapper */
if(array_key_exists('bd_wrapper_background',$bd_data))
{
	$wrapper = $bd_data['bd_wrapper_background'];
}
if( !empty($wrapper['color']) || !empty($wrapper['img']) ) :
?>
#wrapper
{
<?php if( !empty( $wrapper['color'] ) ){ ?>background-color:<?php echo $wrapper['color'] ?> !important; <?php echo "\n"; } ?>
<?php if( !empty( $wrapper['img'] ) ){ ?>background-image: url('<?php echo $wrapper['img'] ?>') !important; <?php echo "\n"; } ?>
<?php if( !empty( $wrapper['repeat'] ) ){ ?>background-repeat:<?php echo $wrapper['repeat'] ?> !important; <?php echo "\n"; } ?>
<?php if( !empty( $wrapper['attachment'] ) ){ ?>background-attachment:<?php echo $wrapper['attachment'] ?> !important; <?php echo "\n"; } ?>
<?php if( !empty( $wrapper['hor'] ) || !empty( $wrapper['ver'] ) ){ ?>background-position:<?php echo $wrapper['hor'] ?> <?php echo $wrapper['ver'] ?> !important; <?php echo "\n"; } ?>
}
<?php endif; ?>
<?php
/* topbar */
if(array_key_exists('bd_topbar_background',$bd_data))
{
	$topbar =$bd_data['bd_topbar_background'];
}
if( !empty($topbar['color']) || !empty($topbar['img']) ) :
?>
.top-bar
{
<?php if( !empty( $topbar['color'] ) ){ ?>background-color:<?php echo $topbar['color'] ?> !important; <?php echo "\n"; } ?>
<?php if( !empty( $topbar['img'] ) ){ ?>background-image: url('<?php echo $topbar['img'] ?>') !important; <?php echo "\n"; } ?>
<?php if( !empty( $topbar['repeat'] ) ){ ?>background-repeat:<?php echo $topbar['repeat'] ?> !important; <?php echo "\n"; } ?>
<?php if( !empty( $topbar['attachment'] ) ){ ?>background-attachment:<?php echo $topbar['attachment'] ?> !important; <?php echo "\n"; } ?>
<?php if( !empty( $topbar['hor'] ) || !empty( $topbar['ver'] ) ){ ?>background-position:<?php echo $topbar['hor'] ?> <?php echo $topbar['ver'] ?> !important; <?php echo "\n"; } ?>
}
<?php endif; ?>
<?php
/* header */
if(array_key_exists('bd_header_background',$bd_data))
{
	$header =$bd_data['bd_header_background'];
}
if( !empty($header['color']) || !empty($header['img']) ) :
?>
.header-v1, .header-v2, .header-v3, .header-v4, .header-v5
{
<?php if( !empty( $header['color'] ) ){ ?>background-color:<?php echo $header['color'] ?> !important; <?php echo "\n"; } ?>
<?php if( !empty( $header['img'] ) ){ ?>background-image: url('<?php echo $header['img'] ?>') !important; <?php echo "\n"; } ?>
<?php if( !empty( $header['repeat'] ) ){ ?>background-repeat:<?php echo $header['repeat'] ?> !important; <?php echo "\n"; } ?>
<?php if( !empty( $header['attachment'] ) ){ ?>background-attachment:<?php echo $header['attachment'] ?> !important; <?php echo "\n"; } ?>
<?php if( !empty( $header['hor'] ) || !empty( $header['ver'] ) ){ ?>background-position:<?php echo $header['hor'] ?> <?php echo $header['ver'] ?> !important; <?php echo "\n"; } ?>
}
<?php endif; ?>
<?php
/* Footer */
if(array_key_exists('bd_footer_background',$bd_data))
{
	$footer =$bd_data['bd_footer_background'];
}
if( !empty($footer['color']) || !empty($footer['img']) ) :
?>
#footer-widgets, .footer
{
<?php if( !empty( $footer['color'] ) ){ ?>background-color:<?php echo $footer['color'] ?> !important; <?php echo "\n"; } ?>
<?php if( !empty( $footer['img'] ) ){ ?>background-image: url('<?php echo $footer['img'] ?>') !important; <?php echo "\n"; } ?>
<?php if( !empty( $footer['repeat'] ) ){ ?>background-repeat:<?php echo $footer['repeat'] ?> !important; <?php echo "\n"; } ?>
<?php if( !empty( $footer['attachment'] ) ){ ?>background-attachment:<?php echo $footer['attachment'] ?> !important; <?php echo "\n"; } ?>
<?php if( !empty( $footer['hor'] ) || !empty( $footer['ver'] ) ){ ?>background-position:<?php echo $footer['hor'] ?> <?php echo $footer['ver'] ?> !important; <?php echo "\n"; } ?>
}
<?php if( !empty( $footer['color'] ) ){ ?>#footer-widgets .widget .post-warpper{ border-color: <?php echo $footer['color'] ?> !important; }<?php echo "\n"; } ?>
<?php endif; ?>
<?php
global $custom_typography;
foreach( $custom_typography as $selector => $input)
{
$option = bdayh_get_option( $input );
if( $option['font'] || $option['color'] || $option['size'] || $option['weight'] || $option['style'] ):
echo "\n".$selector."{\n"; ?>
<?php if($option['font'] )
	echo "	font-family: ". stripslashes(bd_get_font($option['font'])).";\n"?>
<?php if($option['color'] )
	echo "	color :". $option['color'].";\n"?>
<?php if($option['size'] )
	echo "	font-size : ".$option['size']."px;\n"?>
<?php if($option['weight'] )
	echo "	font-weight: ".$option['weight'].";\n"?>
<?php if($option['style'] )
	echo "	font-style: ". $option['style'].";\n"?>
    }
<?php endif; } ?></style>