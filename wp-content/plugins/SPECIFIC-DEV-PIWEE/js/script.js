var GlobalSpecific = { };

jQuery(document).ready(function() {

    responsiveControl();

    jQuery(window).resize(function() {

        responsiveControl();

    });

    jQuery(".header-article").scrollToFixed({
        preFixed: function() {
            jQuery(".header-article").css('border-bottom', '3px solid #d5ac3c');
            jQuery("#wpadminbar").hide();
        },
        postFixed: function() {
            jQuery(".header-article").css('border-bottom', '3px solid #d5ac3c');
            jQuery("#wpadminbar").show();
        },
        zIndex: 999999
    });

    jQuery(".img-pub-right").scrollToFixed({
        preFixed: function() {

        },
        postFixed: function() {

        },
        zIndex: 999999
    });

});

jQuery.sharedCount = function(url, fn) {
    url = encodeURIComponent(url || location.href);
    var domain = "//free.sharedcount.com/"; /* SET DOMAIN */
    var apikey = "479dfb502221d2b4c4a0433c600e16ba5dc0df4e" /*API KEY HERE*/
    var arg = {
        data: {
            url : url,
            apikey : apikey
        },
        url: domain,
        cache: true,
        dataType: "json"
    };
    if ('withCredentials' in new XMLHttpRequest) {
        arg.success = fn;
    }
    else {
        var cb = "sc_" + url.replace(/\W/g, '');
        window[cb] = fn;
        arg.jsonpCallback = cb;
        arg.dataType += "p";
    }
    return jQuery.ajax(arg);
};

function openSharePanelForID(post_id) {

	jQuery("#post-share-box-" + post_id).show();
    jQuery(".btn-total-share-" + post_id).hide();

    jQuery("#post-share-box-" + post_id).css("width", "190px");
    jQuery("#btn-categ-show-" + post_id).hide();
}

function hideSharePanelForID(post_id) {

    jQuery("#post-share-box-" + post_id).hide();
    jQuery(".btn-total-share-" + post_id).show();

    jQuery("#post-share-box-" + post_id).css("width", "120px");
    jQuery("#btn-categ-show-" + post_id).show();
}

function updateShareCountForPost(post_id, share_count) {

    jQuery.ajax({
        url: "/wp-admin/admin-ajax.php",
        type: "POST",
        data: {
                action : 'update_share_count',
                post_id : post_id,
                share_count : share_count
              },
        success: function(result) {

        }
    });
}

function responsiveControl() {

    if(jQuery(window).width() < 650) {
        jQuery(".total-share-span-single").hide();
        jQuery(".share-single-pinterest").hide();
        jQuery(".share-single-linkedin").hide();
        jQuery(".share-single-gplus").hide();
    }
    else {
        jQuery(".total-share-span-single").show();
        jQuery(".share-single-pinterest").show();
        jQuery(".share-single-linkedin").show();
        jQuery(".share-single-gplus").show();
    }
}