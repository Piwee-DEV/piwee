jQuery(document).ready(function(){jQuery("#upload_userphoto_button").click(function(){uploadfield="#userphoto";formfield=jQuery(uploadfield).attr("name");tbframe_interval=setInterval(function(){jQuery("#TB_iframeContent").contents().find(".savesend .button").val(about_the_author_localizing_upload_js.use_this_image)},2e3);tb_show("","media-upload.php?type=image&TB_iframe=true");return false});window.send_to_editor=function(a){imgurl=jQuery("img",a).attr("src");jQuery(uploadfield).val(imgurl);tb_remove()}})