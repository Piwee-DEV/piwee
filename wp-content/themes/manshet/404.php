<?php
header("HTTP/1.0 404 Not Found");
die();
get_header();
global $bd_data;
?>

                <article>
                    <div class="post-entry">
                        <div class="oops"><?php _e('oops!','bd') ?></div>
                        <div class="text-aligncenter oops-meta">
                            <?php _e('Sorry. but you are looking for something that isn\'t here, back to', 'bd'); ?>
                            <a href="index.php"><?php _e('Homepage','bd') ?></a>
                            <div class="clear"></div>
                            <b><?php _e('Or Time Line','bd') ?></b>
                        </div>
                            <div id="post-<?php the_ID(); ?>">
                                <div class="post-entry bottom40">
                                    <?php
                                    $where          = apply_filters( 'getarchives_where', "WHERE post_type = 'post' AND post_status = 'publish'" );
                                    $join           = apply_filters( 'getarchives_join', '' );
                                    $query          = "SELECT YEAR(post_date) AS `year`, count(ID) as posts FROM $wpdb->posts $join $where GROUP BY YEAR(post_date) ORDER BY post_date DESC";
                                    $key            = md5($query);
                                    $cache          = wp_cache_get( 'wp_get_archives' , 'general');

                                    if ( !isset( $cache[ $key ] ) )
                                    {
                                        $arcresults         = $wpdb->get_results($query);
                                        $cache[ $key ]      = $arcresults;
                                        wp_cache_set( 'wp_get_archives', $cache, 'general' );
                                    }
                                    else
                                    {
                                        $arcresults         = $cache[ $key ];
                                    }

                                    if ($arcresults)
                                    {
                                        foreach ( (array) $arcresults as $arcresult)
                                        {
                                            ?>
                                            <h2 class="timeline-title"><b class="btn"><?php echo $arcresult->year ?></b></h2>
                                            <?php $query = new WP_Query( array( 'year' => $arcresult->year , 'posts_per_page' => -1 ) ); ?>
                                            <ul class="timeline-list">
                                                <?php while ( $query->have_posts() ) : $query->the_post()?>
                                                    <li class="timeline-item">
                                                        <div class="timeline-date"><span><?php the_time(get_option('date_format')); ?></span></div>
                                                        <div class="timeline-link"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( '%s', 'bd' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><b><?php the_title(); ?></b></a></div>
                                                    </li>
                                                <?php endwhile; ?>
                                            </ul>
                                        <?php
                                        }
                                    }
                                    wp_link_pages();
                                    ?>
                                </div>
                            </div>
                    </div>
                </article>

<?php get_footer(); ?>
