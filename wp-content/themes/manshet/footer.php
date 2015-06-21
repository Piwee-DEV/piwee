<?php global $bd_data; ?>
        <?php
        if(array_key_exists('show_footer_ads',$bd_data))
        {
	        if($bd_data['show_footer_ads'] == true)
	        {
	            if($bd_data['footer_ads_code'] != '')
	            {
	                echo '<div class="footer-adv">' ."\n";
	                echo stripslashes( $bd_data['footer_ads_code'] );
	                echo '</div><!-- .footer-adv/-->' ."\n";
	            }
	            else
	            {
	                echo '<div class="clear"></div><div class="footer-adv"><a href="'.$bd_data['footer_ads_img_url'].'" title="'.$bd_data['footer_ads_img_altname'].'"><img src="'.$bd_data['footer_ads_img'].'" alt="'.$bd_data['footer_ads_img_altname'].'" /></a></div><!-- .footer-adv/-->' ."\n";
	            }
	        }
        }
        ?>
        <div class="clear"></div>
    </div><!-- #main/-->
    <div class="clear"></div>


    <?php if($bd_data['footer_widgets']){ ?>
        <footer id="footer-widgets" class="footer-widgets">
            <?php
            global $bd_data;
            $footer_widget = $bd_data['footer_layout'];
            ?>
            <div class="container <?php echo $footer_widget; ?>">
                <?php
                if ($footer_widget == "col1")
                {
                    /**
                     *  Widget 1
                     */
                    if (is_active_sidebar('footer-widget-1')) :
                        echo '<div class="footer-col-1 widget-inner-box last">' ."\n";
                        dynamic_sidebar('footer-widget-1');
                        echo "\n" .'</div><!-- .footer-col-1/-->'. "\n";
                    endif;
                }
                else if($footer_widget == "col2")
                {
                    /**
                     *  Widget 1
                     */
                    if (is_active_sidebar('footer-widget-1')) :
                        echo '<div class="footer-col-1 widget-inner-box">' ."\n";
                        dynamic_sidebar('footer-widget-1');
                        echo "\n" .'</div><!-- .footer-col-1/-->'. "\n";
                    endif;

                    /**
                     *  Widget 2
                     */
                    if (is_active_sidebar('footer-widget-2')) :
                        echo '<div class="footer-col-2 widget-inner-box last">' ."\n";
                        dynamic_sidebar('footer-widget-2');
                        echo "\n" .'</div><!-- .footer-col-2/-->'. "\n";
                    endif;
                }
                else if($footer_widget == "col3")
                {
                    /**
                     *  Widget 1
                     */
                    if (is_active_sidebar('footer-widget-1')) :
                        echo '<div class="footer-col-1 widget-inner-box">' ."\n";
                        dynamic_sidebar('footer-widget-1');
                        echo "\n" .'</div><!-- .footer-col-1/-->'. "\n";
                    endif;

                    /**
                     *  Widget 2
                     */
                    if (is_active_sidebar('footer-widget-2')) :
                        echo '<div class="footer-col-2 widget-inner-box">' ."\n";
                        dynamic_sidebar('footer-widget-2');
                        echo "\n" .'</div><!-- .footer-col-2/-->'. "\n";
                    endif;

                    /**
                     *  Widget 3
                     */
                    if (is_active_sidebar('footer-widget-3')) :
                        echo '<div class="footer-col-3 widget-inner-box last">' ."\n";
                        dynamic_sidebar('footer-widget-3');
                        echo "\n" .'</div><!-- .footer-col-3/-->'. "\n";
                    endif;
                }
                else if($footer_widget == "col4")
                {
                    /**
                     *  Widget 1
                     */
                    if (is_active_sidebar('footer-widget-1')) :
                        echo '<div class="footer-col-1 widget-inner-box">' ."\n";
                        dynamic_sidebar('footer-widget-1');
                        echo "\n" .'</div><!-- .footer-col-1/-->'. "\n";
                    endif;

                    /**
                     *  Widget 2
                     */
                    if (is_active_sidebar('footer-widget-2')) :
                        echo '<div class="footer-col-2 widget-inner-box">' ."\n";
                        dynamic_sidebar('footer-widget-2');
                        echo "\n" .'</div><!-- .footer-col-2/-->'. "\n";
                    endif;

                    /**
                     *  Widget 3
                     */
                    if (is_active_sidebar('footer-widget-3')) :
                        echo '<div class="footer-col-3 widget-inner-box">' ."\n";
                        dynamic_sidebar('footer-widget-3');
                        echo "\n" .'</div><!-- .footer-col-3/-->'. "\n";
                    endif;

                    /**
                     *  Widget 4
                     */
                    if (is_active_sidebar('footer-widget-4')) :
                        echo '<div class="footer-col-4 widget-inner-box last">' ."\n";
                        dynamic_sidebar('footer-widget-4');
                        echo "\n" .'</div><!-- .footer-col-4/-->'. "\n";
                    endif;
                }
                else
                {
                    /**
                     *  Widget 1
                     */
                    if (is_active_sidebar('footer-widget-1')) :
                        echo '<div class="footer-col-1 widget-inner-box">' ."\n";
                        dynamic_sidebar('footer-widget-1');
                        echo "\n" .'</div><!-- .footer-col-1/-->'. "\n";
                    endif;

                    /**
                     *  Widget 2
                     */
                    if (is_active_sidebar('footer-widget-2')) :
                        echo '<div class="footer-col-2 widget-inner-box">' ."\n";
                        dynamic_sidebar('footer-widget-2');
                        echo "\n" .'</div><!-- .footer-col-2/-->'. "\n";
                    endif;

                    /**
                     *  Widget 3
                     */
                    if (is_active_sidebar('footer-widget-3')) :
                        echo '<div class="footer-col-3 widget-inner-box">' ."\n";
                        dynamic_sidebar('footer-widget-3');
                        echo "\n" .'</div><!-- .footer-col-3/-->'. "\n";
                    endif;

                    /**
                     *  Widget 4
                     */
                    if (is_active_sidebar('footer-widget-4')) :
                        echo '<div class="footer-col-4 widget-inner-box last">' ."\n";
                        dynamic_sidebar('footer-widget-4');
                        echo "\n" .'</div><!-- .footer-col-4/-->'. "\n";
                    endif;
                }
                ?>
            </div>
        </footer>
    <?php } ?>

    <footer class="footer">
        <div class="container">
            <?php
                if($bd_data['footer_social'] == 1)
                {
                    echo bd_social('yes', 16, 'ttip');
                }

                if($bd_data['footer_copyright'] == 1)
                {
                    echo stripslashes( bd_footer_copy_rigths() );
                }
            ?>
        </div>
    </footer>
</div><!-- #wrapper/-->

    <?php if(array_key_exists('space_body',$bd_data)){ echo stripslashes( $bd_data['space_body'] ) ."\n"; } echo '<div class="gotop" title="Go Top"><i class="icon-chevron-up"></i></div>'; ?>
    <?php wp_footer(); ?>

    <script type="text/javascript">
      window._taboola = window._taboola || [];
      _taboola.push({flush: true});
    </script>

</body></html>