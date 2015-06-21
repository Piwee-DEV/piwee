<?php
//Template Name: Authors
get_header();
global $bd_data;
?>

    <div class="content-wrapper">
        <div class="inner">

            <?php bd_breadcrumb(); ?>
            <?php echo bd_post_above_ads() ?>
            <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
                <article <?php post_class('article'); ?> id="post-<?php the_ID(); ?>">
                    <div class="post-entry bottom40">

                    <?php
                        the_content();
                        ?>
                        <ul class="authors-wrap post-author-box">
                        <?php
                            $users = get_users('blog_id=1&orderby=post_count&order=DESC');
                            global $user_ID, $user_identity, $user_level;
                            foreach ($users as $user)
                            {
                                ?>
                                <li class="post-warpper clear">
                                    <div class="box-title">
                                        <h2>
                                            <b><a href="<?php echo get_author_posts_url( $user->ID ); ?>"><?php echo $user->display_name ?> </a></b>
                                        </h2>
                                    </div>

                                    <div class="post-image">
                                        <?php echo get_avatar( get_the_author_meta( 'user_email' , $user->ID ), apply_filters( 'MFW_author_bio_avatar_size', 80 ) ); ?>
                                    </div>

                                    <div class="post-caption">

                                        <p class="bio-author-desc">
                                            <?php the_author_meta( 'description'  , $user->ID ); ?>
                                        </p>

                                    <?php
                                        echo '<div class="social-icons icon-12 bio-author-social">'. "\n";
                                        if( get_the_author_meta('url' , $user->ID)) :
                                            echo'<a href="'. get_the_author_meta( 'url' , $user->ID ) .'" title="'. $user->display_name .'"><i class="icon-home"></i></a>'."\n";
                                        endif;

                                        if( get_the_author_meta('facebook' , $user->ID)) :
                                            echo'<a href="'. get_the_author_meta( 'facebook', $user->ID ) .'" title="'. $user->display_name .' '. __('on Facebook','bd').' "><i class="social_icon-facebook"></i></a>'."\n";
                                        endif;

                                        if( get_the_author_meta('twitter' , $user->ID)) :
                                            echo'<a href="http://twitter.com/'. get_the_author_meta( 'twitter', $user->ID ) .'" title="'. $user->display_name .' '. __('on twitter','bd').' "><i class="social_icon-twitter"></i></a>'."\n";
                                        endif;

                                        if( get_the_author_meta('google' , $user->ID)) :
                                            echo'<a href="'. get_the_author_meta( 'google' , $user->ID ) .'" title="'. $user->display_name .' '. __('on google','bd').' "><i class="social_icon-google"></i></a>'."\n";
                                        endif;

                                        if( get_the_author_meta('linkedin' , $user->ID)) :
                                            echo'<a href="'. get_the_author_meta( 'linkedin' , $user->ID ) .'" title="'. $user->display_name .' '. __('on linkedin','bd').' "><i class="social_icon-linkedin"></i></a>'."\n";
                                        endif;

                                        if( get_the_author_meta('pinterest' , $user->ID)) :
                                            echo'<a href="'. get_the_author_meta( 'pinterest' , $user->ID ) .'" title="'. $user->display_name .' '. __('on pinterest','bd').' "><i class="social_icon-pinterest"></i></a>'."\n";
                                        endif;

                                        if( get_the_author_meta('youtube' , $user->ID)) :
                                            echo'<a href="'. get_the_author_meta( 'youtube' , $user->ID ) .'" title="'. $user->display_name .' '. __('on youtube','bd').' "><i class="social_icon-youtube"></i></a>'."\n";
                                        endif;

                                        if( get_the_author_meta('flickr' , $user->ID)) :
                                            echo'<a href="'. get_the_author_meta( 'flickr' , $user->ID ) .'" title="'. $user->display_name .' '. __('on flickr','bd').' "><i class="social_icon-flickr"></i></a>'."\n";
                                        endif;
                                        echo "\n" .'</div>'. "\n";
                                    ?>
                                    </div>
                                    <div class="divider"></div>
                                </li>
                            <?php } ?>
                        </ul>
                        <?php
                        wp_link_pages();
                    ?>

                    </div>
                </article>
            <?php endwhile; ?>
            <?php echo bd_post_below_ads() ?>
            <?php comments_template( '', true ); ?>
        </div>
    </div>
<?php get_sidebar(); get_footer(); ?>