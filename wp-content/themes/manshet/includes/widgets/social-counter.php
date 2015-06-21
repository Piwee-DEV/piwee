<?php
/**
 * Social Counter
 */
add_action( 'widgets_init', 'bd_counter_widget' );
function bd_counter_widget(){
    register_widget( 'bd_counter_widget' );
}
class bd_counter_widget extends WP_Widget
{

    function bd_counter_widget()
    {
        $widget_ops     = array( 'classname' => 'bd-counter-widget', 'description' => '' );
        $control_ops    = array( 'id_base'   => 'bd-counter-widget' );
        $this->WP_Widget( 'bd-counter-widget', theme_name . ' - Social Counter', $widget_ops, $control_ops );
    }

    function widget( $args, $instance )
    {
        extract( $args );
        global $bd_data;
        $title                      = apply_filters('widget_title', $instance['title'] );
        $count                      = new COUNT_CLASS();
        $rssurl                     = $instance['rssurl'];
        $twitter_un                 = $instance['twitterun'];
        $facebookn                  = $instance['facebookn'];
        $gplusn                     = $instance['gplusn'];
        $youtubeun                  = $instance['youtubeun'];
        $vimocn                     = $instance['vimocn'];
        $soundcloudun               = $instance['soundcloudun'];
        $socialstyle                - $instance['socialstyle'];
        $social_count['twitter'] 	= $count->get_twitter_count( $twitter_un );
        $social_count['facebook'] 	= $count->get_facebook_count( $facebookn );
        $social_count['gplus'] 		= $count->get_gplus_count( $gplusn );
        $social_count['youtube'] 	= $count->get_youtube_count( $youtubeun );
        $social_count['vimo'] 		= $count->get_vimo_count( $vimocn );
        $social_count['soundcloud'] = $count->get_soundcloud_count( $soundcloudun );
        $getNew						= getTwitterFollowers();
        $getNewName					= bdayh_get_option('twitter_username');
        $newTwitter					= $instance['twitter'];

        echo $before_widget;
        if($title) {
            echo $before_title.$title.$after_title;
        }

        ?>
        <div id="social-counter-widget" class="<?php echo $instance['socialstyle']; ?>-SC">
            <ul class="social-counter-widget">
                <?php
                /**
                 * Twitter
                 */
                if (trim($newTwitter) != '') {
                    echo '<li class="social-counter-twitter"><a href="http://twitter.com/'.$getNewName.'" target="_blank"><i class="icon social_icon-twitter"></i><span>'. @number_format($getNew) .'</span><small>'. __('Followers' , 'bd' ) .'</small></a></li> ';
                }
                /**
                 * Facebook
                 */
                if (trim($facebookn) != '') {
                    echo '<li class="social-counter-facebook"><a href="http://www.facebook.com/'.$facebookn.'" target="_blank"><i class="icon social_icon-facebook"></i><span>'.$social_count['facebook'].'</span><small>'. __('Fans' , 'bd' ) .'</small></a></li> ';
                }
                /**
                 * Feed
                 */
                if( $rssurl ){
                    echo '<li class="social-counter-rss"><a href="'.$rssurl.'" target="_blank"><i class="icon social_icon-rss"></i><span>'. __('Subscribe' , 'bd' ) .'</span><small>'. __('Rss' , 'bd' ) .'</small></a></li> ';
                }
                /**
                 * Google+
                 */
                if (trim($gplusn) != '') {
                    echo '<li class="social-counter-gplus"><a href="https://plus.google.com/'.$gplusn.'" target="_blank"><i class="icon social_icon-google"></i><span>'.$social_count['gplus'].'</span><small>'. __('Followers' , 'bd' ) .'</small></a></li> ';
                }
                /**
                 * Youtube
                 */
                if (trim($youtubeun) != '') {
                    echo '<li class="social-counter-youtube"><a href="http://www.youtube.com/user/'. $youtubeun .'" target="_blank"><i class="icon social_icon-youtube"></i><span>'.$social_count['youtube'].'</span><small>'. __('Subscribers' , 'bd' ) .'</small></a></li> ';
                }
                /**
                 * Vimeo
                 */
                if (trim($vimocn) != '') {
                    echo '<li class="social-counter-vimo"><a href="http://vimeo.com/channels/'.$vimocn.'" target="_blank"><i class="icon social_icon-vimeo"></i><span>'.$social_count['vimo'].'</span><small>'. __('Subscribers' , 'bd' ) .'</small></a></li> ';
                }
                /**
                 * Souncloud
                 */
                if (trim($soundcloudun) != '') {
                    echo '<li class="social-counter-soundcloud"><a href="http://soundcloud.com/'.$soundcloudun.'" target="_blank"><i class="icon social_icon-soundcloud"></i><span>'.$social_count['soundcloud'].'</span><small>'. __('Followers' , 'bd' ) .'</small></a></li> ';
                }
                ?>
            </ul>
        </div> <!-- End Social Counter/-->
        <?php
        echo $after_widget;
    }

    function update( $new_instance, $old_instance )
    {
        $instance 						= $old_instance;
        $instance['title']              = strip_tags( $new_instance['title']);
        $instance['rssurl']             = $new_instance['rssurl'] ;
        $instance['twitterun']          = $new_instance['twitterun'] ;
        $instance['facebookn']          = $new_instance['facebookn'] ;
        $instance['gplusn']             = $new_instance['gplusn'] ;
        $instance['youtubeun']          = $new_instance['youtubeun'] ;
        $instance['vimocn']             = $new_instance['vimocn'] ;
        $instance['soundcloudun']       = $new_instance['soundcloudun'] ;
        $instance['socialstyle']        = $new_instance['socialstyle'] ;
        $instance['twitter']        	= strip_tags($new_instance['twitter']);
        delete_transient('bdTwitterFollowers');
        delete_transient('bdayh_soical_soundcloud');
        delete_transient('bdayh_soical_vimo');
        delete_transient('bdayh_soical_youtube');
        delete_transient('bdayh_soical_gplus');
        delete_transient('bdayh_soical_facebook');
        return $instance;
    }

    function form( $instance )
    {
        $defaults = array('title' =>__( 'Follow Me' , 'bd'));
        $instance = wp_parse_args((array) $instance, $defaults);
        ?>
        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title : ','bd')?></label>
            <input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" class="widefat" type="text" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'rssurl' ); ?>"><?php _e('Feed URL : ','bd') ?></label>
            <input id="<?php echo $this->get_field_id( 'rssurl' ); ?>" name="<?php echo $this->get_field_name( 'rssurl' ); ?>" value="<?php echo $instance['rssurl']; ?>" class="widefat" type="text" />
        </p>

        <?php
        global $bd_data;
        $consumer_key 			= $bd_data['twitter_consumer_key'];
        $consumer_secret 		= $bd_data['twitter_consumer_secret'];
        $twitter_id 			= $bd_data['twitter_username'];
        if( empty($twitter_id) && empty($consumer_key) && empty($consumer_secret) )
            echo '<p style="display:block; padding: 5px; font-weight:bold; clear:both; color: #990000;">Error : Setup Twitter API settings Go to Theme panel > Twitter API</p>';
        ?>
        <p>
            <label for="<?php echo $this->get_field_id( 'twitter' ); ?>"><?php _e('Twitter : ','bd') ?></label>
            <input id="<?php echo $this->get_field_id( 'twitter' ); ?>" name="<?php echo $this->get_field_name( 'twitter' ); ?>"  value="true" <?php if( $instance['twitter'] ) echo 'checked="checked"'; ?> type="checkbox"  />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'facebookn' ); ?>"><?php _e('Facebook Page ID/Name : ','bd') ?></label>
            <input id="<?php echo $this->get_field_id( 'facebookn' ); ?>" name="<?php echo $this->get_field_name( 'facebookn' ); ?>" value="<?php echo $instance['facebookn']; ?>" class="widefat" type="text" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'gplusn' ); ?>"><?php _e('Google+ Page ID/Name : ','bd') ?></label>
            <input id="<?php echo $this->get_field_id( 'gplusn' ); ?>" name="<?php echo $this->get_field_name( 'gplusn' ); ?>" value="<?php echo $instance['gplusn']; ?>" class="widefat" type="text" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'youtubeun' ); ?>"><?php _e('Youtube User ID : ','bd') ?></label>
            <input id="<?php echo $this->get_field_id( 'youtubeun' ); ?>" name="<?php echo $this->get_field_name( 'youtubeun' ); ?>" value="<?php echo $instance['youtubeun']; ?>" class="widefat" type="text" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'vimocn' ); ?>"><?php _e('Vimeo Channel Name : ','bd') ?></label>
            <input id="<?php echo $this->get_field_id( 'vimocn' ); ?>" name="<?php echo $this->get_field_name( 'vimocn' ); ?>" value="<?php echo $instance['vimocn']; ?>" class="widefat" type="text" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'soundcloudun' ); ?>"><?php _e('Soundcloud User Name : ','bd') ?></label>
            <input id="<?php echo $this->get_field_id( 'soundcloudun' ); ?>" name="<?php echo $this->get_field_name( 'soundcloudun' ); ?>" value="<?php echo $instance['soundcloudun']; ?>" class="widefat" type="text" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'socialstyle' ); ?>"><?php _e('Design Style : ','bd') ?></label>
            <select id="<?php echo $this->get_field_id( 'socialstyle' ); ?>" name="<?php echo $this->get_field_name( 'socialstyle' ); ?>" class="widefat">
                <option <?php if ( 'style1' == $instance['socialstyle'] ) echo 'selected="selected"'; ?>>style1</option>
                <option <?php if ( 'style2' == $instance['socialstyle'] ) echo 'selected="selected"'; ?>>style2</option>
                <option <?php if ( 'style3' == $instance['socialstyle'] ) echo 'selected="selected"'; ?>>style3</option>
                <option <?php if ( 'style4' == $instance['socialstyle'] ) echo 'selected="selected"'; ?>>style4</option>
            </select>
        </p>
    <?php
    }
}