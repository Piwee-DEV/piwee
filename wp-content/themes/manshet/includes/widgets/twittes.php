<?php
/*
 * Recent Twitter
 */
add_action('widgets_init', 'bd_tweets_load');
function bd_tweets_load(){
    register_widget('bd_tweets_load');
}

class bd_tweets_load extends WP_Widget {

    function bd_tweets_load(){
        $widget_ops = array('classname' => 'tweets', 'description' => '');
        $control_ops = array('id_base' => 'tweets-widget');
        $this->WP_Widget('tweets-widget', theme_name . '- Twitter', $widget_ops, $control_ops);
    }

    function widget($args, $instance){
        extract($args);
        $title                  = apply_filters('widget_title', $instance['title']);
        $consumer_key 			= bdayh_get_option('twitter_consumer_key');
        $consumer_secret 		= bdayh_get_option('twitter_consumer_secret');
        $access_token 			= bdayh_get_option('twitter_access_token');
        $access_token_secret 	= bdayh_get_option('twitter_access_token_secret');
        $twitter_id 			= bdayh_get_option('twitter_username');
        $count                  = (int) $instance['count'];

        echo $before_widget;
        if($title){ echo $before_title.$title.$after_title; }
        if($twitter_id && $consumer_key && $consumer_secret && $access_token && $access_token_secret && $count){

            $transName = 'list_tweets';
            $cacheTime = 10;
            if(false === ($twitterData = get_transient($transName))){

                $token = get_option('cfTwitterToken');
                if(!$token){
                    $credentials = $consumer_key . ':' . $consumer_secret;
                    $toSend = base64_encode($credentials);
                    $args = array( 'method' => 'POST', 'httpversion' => '1.1', 'blocking' => true, 'headers' => array( 'Authorization' => 'Basic ' . $toSend, 'Content-Type' => 'application/x-www-form-urlencoded;charset=UTF-8' ), 'body' => array( 'grant_type' => 'client_credentials' ) );
                    add_filter('https_ssl_verify', '__return_false');
                    $response = wp_remote_post('https://api.twitter.com/oauth2/token', $args);
                    $keys = json_decode(wp_remote_retrieve_body($response));
                    if($keys) {
                        update_option('cfTwitterToken', $keys->access_token);
                        $token = $keys->access_token;
                    }
                }
                $args = array( 'httpversion' => '1.1', 'blocking' => true, 'headers' => array( 'Authorization' => "Bearer $token" ) );
                add_filter('https_ssl_verify', '__return_false');
                $api_url = 'https://api.twitter.com/1.1/statuses/user_timeline.json?screen_name='.$twitter_id.'&count='.$count;
                $response = wp_remote_get($api_url, $args);
                $decoded_json = json_decode(wp_remote_retrieve_body($response), true);
                set_transient($transName, $decoded_json, 60 * $cacheTime);
            }
            $twitter = (array) get_transient($transName);
            if($twitter && is_array($twitter)) {
                ?>
                <a href="https://twitter.com/<?php echo $twitter_id ?>" class="twitter-follow-button" data-show-count="false" data-size="large">Follow @<?php echo $twitter_id ?></a>
                <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
                <div class="clear"></div>

                <div class="bd-twitter-widget" id="tweets_<?php echo $args['widget_id']; ?>">
                    <ul class="tweet_list">
                        <?php foreach($twitter as $tweet): ?>
                            <li class="twitter-item">
                                <p class="twitter-text">
                                    <i class="icon social_icon-twitter"></i>
                                    <?php
                                    $latestTweet = $tweet['text'];;
                                    $latestTweet = preg_replace('/http:\/\/([a-z0-9_\.\-\+\&\!\#\~\/\,]+)/i', '&nbsp;<a href="http://$1" target="_blank">http://$1</a>&nbsp;', $latestTweet);
                                    $latestTweet = preg_replace('/@([a-z0-9_]+)/i', '&nbsp;<a href="http://twitter.com/$1" target="_blank">@$1</a>&nbsp;', $latestTweet);
                                    echo $latestTweet;
                                    ?>
                                </p>
                                <?php
                                $twitterTime = strtotime($tweet['created_at']);
                                $timeAgo = $this->ago($twitterTime);
                                ?>
                                <a href="http://twitter.com/<?php echo $tweet['user']['screen_name']; ?>/statuses/<?php echo $tweet->id_str; ?>" class="jtwt_date"><?php echo $timeAgo; ?></a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php }
        } echo $after_widget;
    }

    function ago($time){
        $periods = array("second", "minute", "hour", "day", "week", "month", "year", "decade");
        $lengths = array("60","60","24","7","4.35","12","10");

        $now = time();
        $difference     = $now - $time;
        $tense         = "ago";

        for($j = 0; $difference >= $lengths[$j] && $j < count($lengths)-1; $j++) { $difference /= $lengths[$j]; }

        $difference = round($difference);
        if($difference != 1){ $periods[$j].= "s"; }
        return "$difference $periods[$j] ago ";
    }

    function update($new_instance, $old_instance){
        $instance                           = $old_instance;
        $instance['title']                  = strip_tags($new_instance['title']);
        $instance['consumer_key']           = $new_instance['consumer_key'];
        $instance['consumer_secret']        = $new_instance['consumer_secret'];
        $instance['access_token']           = $new_instance['access_token'];
        $instance['access_token_secret']    = $new_instance['access_token_secret'];
        $instance['twitter_id']             = $new_instance['twitter_id'];
        $instance['count']                  = $new_instance['count'];
        delete_transient('list_tweets');
        return $instance;
    }

    function form($instance){
        $defaults = array('title' => __('Recent Tweets' , 'bd'),'count' => 4);
        $instance = wp_parse_args((array) $instance, $defaults); ?>
        <?php
        $consumer_key 			= bdayh_get_option('twitter_consumer_key');
        $consumer_secret 		= bdayh_get_option('twitter_consumer_secret');
        $twitter_id 			= bdayh_get_option('twitter_username');
        if( empty($twitter_id) && empty($consumer_key) && empty($consumer_secret) )
            echo '<p style="display:block; padding: 5px; font-weight:bold; clear:both; color: #990000;">Error : Setup Twitter API settings Go to Theme panel > Twitter API</p>';
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title','bd') ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $instance['title']; ?>" />
        </p>
        <label for="<?php echo $this->get_field_id('count'); ?>"><?php _e('Number of Tweets','bd') ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id('count'); ?>" name="<?php echo $this->get_field_name('count'); ?>" value="<?php echo $instance['count']; ?>" />
        </p>

    <?php
    }
}