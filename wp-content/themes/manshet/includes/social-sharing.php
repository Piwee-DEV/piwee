<?php global $bd_data; global $post; $thumb = bd_post_image('full'); ?>
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
        load('//platform.twitter.com/widgets.js', 'tweetjs');
    }
    if (w.addEventListener) { w.addEventListener("load", go, false); }
    else if (w.attachEvent) { w.attachEvent("onload",go); }
}(window, document, 'script'));
</script>
<script type="text/javascript" src="//assets.pinterest.com/js/pinit.js"></script>

<?php if(array_key_exists('social_sharing_box',$bd_data)) { ?>
    <div class="post-share-box" id="post-share-box-<?php the_ID(); ?>" style="display:none;overflow:visible;">
        <h4 class="post-share-title" style="display: none">
            <?php _e('Share :','bd') ?>
        </h4>

        <?php if($bd_data['social_displays'] == 'sharing_box_v1'){ ?>
            <ul class="post-share-box-social-networks social-icons">
                <?php if($bd_data['sharing_facebook']): ?>
                    <li class="facebook">
                        <a class="ttip" title="facebook" href="http://www.facebook.com/sharer.php?u=<?php the_permalink(); ?>&amp;t=<?php the_title(); ?>">
                            <i class="social_icon-facebook"></i>
                        </a>
                    </li>
                <?php endif; ?>
                <?php if($bd_data['sharing_twitter']): ?>
                    <li class="twitter">
                        <a class="ttip" title="twitter" href="http://twitter.com/home?status=<?php the_title(); ?> <?php the_permalink(); ?>">
                            <i class="social_icon-twitter"></i>
                        </a>
                    </li>
                <?php endif; ?>
                <?php if($bd_data['sharing_linkedin']): ?>
                    <li class="linkedin">
                        <a class="ttip" title="linkedin" href="http://linkedin.com/shareArticle?mini=true&amp;url=<?php the_permalink(); ?>&amp;title=<?php the_title(); ?>">
                            <i class="social_icon-linkedin"></i>
                        </a>
                    </li>
                <?php endif; ?>
                <?php if($bd_data['sharing_reddit']): ?>
                    <li class="reddit">
                        <a class="ttip" title="reddit" href="http://reddit.com/submit?url=<?php the_permalink(); ?>&amp;title=<?php the_title(); ?>">
                            <i class="social_icon-reddit"></i>
                        </a>
                    </li>
                <?php endif; ?>
                <?php if($bd_data['sharing_tumblr']): ?>
                    <li class="tumblr">
                        <a class="ttip" title="tumblr" href="http://www.tumblr.com/share/link?url=<?php echo urlencode(get_permalink()); ?>&amp;name=<?php echo urlencode($post->post_title); ?>&amp;description=<?php echo urlencode(get_the_excerpt()); ?>">
                            <i class="social_icon-tumblr"></i>
                        </a>
                    </li>
                <?php endif; ?>
                <?php if($bd_data['sharing_google']): ?>
                    <li class="google">
                        <a class="ttip" title="google" href="http://google.com/bookmarks/mark?op=edit&amp;bkmk=<?php the_permalink(); ?>&amp;title=<?php the_title(); ?>">
                            <i class="social_icon-google"></i>
                        </a>
                    </li>
                <?php endif; ?>
            </ul>

        <?php } elseif($bd_data['social_displays'] == 'sharing_box_v2'){ ?>

            <ul class="social_sharing_box_large">

                <?php if($bd_data['sharing_facebook']): ?>
                    <li class="facebook">
                        <div id="fb-root"></div>
                        <div class="fb-like" data-href="<?php the_permalink(); ?>" data-width="70" data-height="70" data-colorscheme="light" data-layout="box_count" data-action="like" data-show-faces="true" data-send="false"></div>
                    </li>
                <?php endif; ?>

                <?php if($bd_data['sharing_twitter']): ?>
                    <li class="twitter">
                        <a href="https://twitter.com/share" class="twitter-share-button" data-width="70" data-height="70" data-url="<?php the_permalink(); ?>" data-text="<?php the_title(); ?>" data-via="<?php echo $bd_data['share_twitter_username'] ?>" data-lang="en" data-count="vertical">tweet</a>
                    </li>
                <?php endif; ?>

                <?php if($bd_data['sharing_google']): ?>
                    <li class="google">
                        <div class="g-plusone" data-size="tall" data-href="<?php the_permalink(); ?>">
                    </li>
                <?php endif; ?>

                <?php if($bd_data['sharing_linkedin']): ?>
                    <li class="linkedin">
                        <script src="//platform.linkedin.com/in.js" type="text/javascript">
                            lang: en_US
                        </script>
                        <script type="IN/Share" data-url="<?php the_permalink(); ?>" data-counter="top"></script>
                    </li>
                <?php endif; ?>

                <?php if($bd_data['sharing_pinterest']): ?>
                    <li class="pinterest">
                        <a href="http://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&amp;media=<?php echo $thumb ?>" data-pin-do="buttonPin" data-pin-config="above"><img src="//assets.pinterest.com/images/pidgets/pin_it_button.png" /></a>
                    </li>
                <?php endif; ?>

            </ul>

        <?php } elseif($bd_data['social_displays'] == 'sharing_box_v3'){ ?>

            <ul class="social-box-shares">

                <?php if($bd_data['sharing_facebook']): ?>
                    <li class="facebook">
                        <div id="fb-root"></div>
                        <div class="fb-like" data-href="<?php the_permalink(); ?>" data-width="70" data-height="30" data-colorscheme="light" data-layout="button_count" data-action="like" data-show-faces="true" data-send="false"></div>
                    </li>
                <?php endif; ?>

                <?php if($bd_data['sharing_twitter']): ?>
                    <li class="twitter">
                        <a href="https://twitter.com/share" class="twitter-share-button" data-url="<?php the_permalink(); ?>" data-text="<?php the_title(); ?>" data-via="<?php echo $bd_data['share_twitter_username'] ?>" data-lang="en">tweet</a>
                    </li>
                <?php endif; ?>

                <?php if($bd_data['sharing_google']): ?>
                    <li class="google">
                        <div class="g-plusone" data-size="medium" data-href="<?php the_permalink(); ?>">
                    </li>
                <?php endif; ?>

                <?php if($bd_data['sharing_linkedin']): ?>
                    <li class="linkedin">
                        <script src="http://platform.linkedin.com/in.js" type="text/javascript"></script><script type="IN/Share" data-url="<?php the_permalink(); ?>" data-counter="right"></script>
                    </li>
                <?php endif; ?>

                <?php if($bd_data['sharing_pinterest']): ?>
                    <li class="pinterest">
                        <a href="http://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&amp;media=<?php echo $thumb ?>" data-pin-do="buttonPin" data-pin-config="beside"><img src="//assets.pinterest.com/images/pidgets/pin_it_button.png" /></a>
                    </li>
                <?php endif; ?>

            </ul>

        <?php } ?>

    </div><!-- .post-share/-->
<?php } ?>