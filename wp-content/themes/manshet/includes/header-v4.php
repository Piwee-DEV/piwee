<?php global $bd_data; ?>
<div class="header-v2 header-v4">
    <?php if ( $bd_data['show_top_nav'] ) {?>
        <div class="top-bar">
            <div class="container">
                <?php
                echo '<div class="top-bar-left">'."\n";
                echo bd_breaking_news();
                echo "\n".'</div>'."\n";

                echo '<div class="top-bar-right">'."\n";

                if ( $bd_data['show_top_nav_search'] )
                {
                    echo bd_search();
                }

                if ( $bd_data['show_top_nav_socail_links'] )
                {
                    echo bd_social('yes', 16, 'tooldown');
                }

                echo "\n".'</div>'."\n";
                ?>
                <div class="clear"></div>
            </div>
        </div><!-- .top-bar/-->
    <?php } else { echo '<br class="clear" />' ."\n"; } ?>

    <div class="container header-row">
        <div class="logo header-logo" style="<?php if($bd_data['margin_logo_top']){ ?>margin-top:<?php echo $bd_data['margin_logo_top']; ?>px;<?php } ?><?php if($bd_data['margin_logo_right']){ ?>margin-right:<?php echo $bd_data['margin_logo_right']; ?>px;<?php } ?><?php if($bd_data['margin_logo_bottom']){ ?>margin-bottom:<?php echo $bd_data['margin_logo_bottom']; ?>px;<?php } ?><?php if($bd_data['margin_logo_left']){ ?>margin-left:<?php echo $bd_data['margin_logo_left']; ?>px;<?php } ?>">
            <h1 title="<?php bloginfo('name'); ?>">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home" />
                <?php
                global $bd_data;
                $logo_info          = get_bloginfo('name');
                $logo               = bdayh_get_option('logo_upload');
                $retina             = bdayh_get_option('logo_retina');
                $retina_logo_width  = bdayh_get_option('retina_logo_width');
                $retina_logo_height = bdayh_get_option('retina_logo_height');

                if( array_key_exists( 'logo_displays', $bd_data ) )
                {
                if($bd_data['logo_displays'] != 'logo_image')
                {
                if($bd_data['logo_upload'])
                {
                    echo "<img src='". $logo ."' alt='". $logo_info ."' border='0' />";
                if($retina)
                {
                    ?>
                    <script type="text/javascript">
                        jQuery(document).ready(function($)
                        {
                            var retina = window.devicePixelRatio > 1 ? true : false;
                            if(retina)
                            {
                                jQuery('.header-logo img').attr('src', '<?php echo $retina ?>');
                                jQuery('.header-logo img').attr('width', '<?php echo $retina_logo_width ?>');
                                jQuery('.header-logo img').attr('height', '<?php echo $retina_logo_height ?>');
                            }
                        });
                    </script>
                <?php
                }
                }
                else
                {
                echo "<img src='". BD_IMG ."logo.png' width='194' height='59' alt='". $logo_info ."' border='0' />";
                ?>

                    <script type="text/javascript"> jQuery(document).ready(function($){ var retina = window.devicePixelRatio > 1 ? true : false; if(retina){ jQuery('.header-logo img').attr('src', '<?php echo BD_IMG; ?>logo@2x.png'); jQuery('.header-logo img').attr('width', '194'); jQuery('.header-logo img').attr('height', '59');} });</script>
                <?php echo "\n";
                }
                }
                else
                {
                    echo "<span class='logo-name'>"; bloginfo( 'name' ); echo "</span>\n";
                    echo "<span class='logo-desc'>"; bloginfo( 'description' ); echo "</span>\n";
                }
                }
                else
                {
                if($bd_data['logo_upload'])
                {
                echo "<img src='". $logo ."' alt='". $logo_info ."' border='0' />";
                if($retina)
                {
                ?>
                    <script type="text/javascript">
                        jQuery(document).ready(function($)
                        {
                            var retina = window.devicePixelRatio > 1 ? true : false;
                            if(retina)
                            {
                                jQuery('.header-logo img').attr('src', '<?php echo $retina ?>');
                                jQuery('.header-logo img').attr('width', '<?php echo $retina_logo_width ?>');
                                jQuery('.header-logo img').attr('height', '<?php echo $retina_logo_height ?>');
                            }
                        });
                    </script>
                <?php
                }
                }
                else
                {
                echo "<img src='". BD_IMG ."logo.png' width='194' height='59' alt='". $logo_info ."' border='0' />";
                ?>
                    <script type="text/javascript">
                        jQuery(document).ready(function($)
                        {
                            var retina = window.devicePixelRatio > 1 ? true : false;
                            if(retina)
                            {
                                jQuery('.header-logo img').attr('src', '<?php echo BD_IMG; ?>logo@2x.png');
                                jQuery('.header-logo img').attr('width', '388');
                                jQuery('.header-logo img').attr('height', '118');
                            }
                        });
                    </script>
                    <?php echo "\n";
                }
                }
                ?>
                </a>
            </h1>
        </div><!-- .logo/-->
        <?php
        if($bd_data['show_header_ads'] == true)
        {
            if($bd_data['header_ads_code'] != '')
            {
                echo '<div class="header-adv">' ."\n";
                echo stripslashes( $bd_data['header_ads_code'] );
                echo '</div><!-- .header-adv/-->' ."\n";
            }
            else
            {
                echo '<div class="header-adv"><a href="'.$bd_data['header_ads_img_url'].'" title="'.$bd_data['header_ads_img_altname'].'"><img src="'.$bd_data['header_ads_img'].'" alt="'.$bd_data['header_ads_img_altname'].'" /></a></div><!-- .header-adv/-->' ."\n";
            }
        }
        ?>
        <div class="clear"></div>
    </div>
    <div class="container">
        <nav id="nav" class="bd-nav">
        	<div class="nav">
            <ul id="menu-nav" class="menu">
                <?php wp_nav_menu(array('theme_location' => 'primary', 'depth' => 5, 'container' => false, 'menu_id' => 'menu-nav', 'items_wrap' => '%3$s')); ?>
                <?php global $woocommerce;  ?>
                <?php if(class_exists('Woocommerce')){ ?>
                    <li class="nav-cart">
                        <?php if(!$woocommerce->cart->cart_contents_count): ?>
                            <a class="empty-cart" href="<?php echo get_permalink(get_option('woocommerce_cart_page_id')); ?>">
                                <i class="icon-shopping-cart"></i>
                            </a>
                        <?php else: ?>
                            <a href="<?php echo get_permalink(get_option('woocommerce_cart_page_id')); ?>">
                                <i class="icon-shopping-cart"></i>
                            </a>
                            <div class="cart-contents">
                                <?php foreach($woocommerce->cart->cart_contents as $cart_item): //var_dump($cart_item); ?>
                                    <div class="cart-content">
                                        <a href="<?php echo get_permalink($cart_item['product_id']); ?>">
                                            <?php echo get_the_post_thumbnail($cart_item['product_id'], 'recent-works-thumbnail'); ?>
                                            <div class="cart-desc">
                                                <span class="cart-title"><?php echo $cart_item['data']->post->post_title; ?></span>
                                                <span class="product-quantity"><?php echo $cart_item['quantity']; ?> x <?php echo $woocommerce->cart->get_product_subtotal($cart_item['data'], $cart_item['quantity']); ?></span>
                                            </div>
                                        </a>
                                    </div>
                                <?php endforeach; ?>
                                <div class="cart-checkout">
                                    <div class="cart-link"><a href="<?php echo get_permalink(get_option('woocommerce_cart_page_id')); ?>"><?php _e('View Cart', 'bd'); ?></a></div>
                                    <div class="checkout-link"><a href="<?php echo get_permalink(get_option('woocommerce_checkout_page_id')); ?>"><?php _e('Checkout', 'bd'); ?></a></div>
                                </div>
                            </div>
                        <?php endif; ?>
                    </li>
                <?php } ?>
            </ul>
            <div class="clear"></div>
            </div>
        </nav><!-- #nav/-->
    </div>
</div>