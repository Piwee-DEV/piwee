<aside class="sidebar">
<?php

    wp_reset_query();
    global $post;

    if(is_shop())
    {
        $pageID     = get_option('woocommerce_shop_page_id');
    } else {
        $pageID     = $post->ID;
    }


    if ( function_exists('is_product') && is_product() )
    {
        if(get_post_meta($pageID, 'new_bd_full_width', true) == 'yes')
        {

        }
        else
        {
            $name = get_post_meta($post->ID, 'sbg_selected_sidebar_replacement', true);
            if($name[0])
            {
                generated_dynamic_sidebar($name[0]);
            }
            elseif (is_active_sidebar('single-pro-widget'))
            {
                dynamic_sidebar('single-pro-widget');
            }
            else
            {
                dynamic_sidebar('primary-widget');
            }
        }
    }
    elseif ( function_exists('is_cart') && is_cart() )
    {
        if (is_active_sidebar('cart-widget'))
        {
            dynamic_sidebar('cart-widget');
        }
        else
        {
            dynamic_sidebar('primary-widget');
        }
    }
    elseif ( function_exists('is_product_category') && is_product_category() )
    {
        if (is_active_sidebar('shop-archive-widget'))
        {
            dynamic_sidebar('shop-archive-widget');
        }
        else
        {
            dynamic_sidebar('primary-widget');
        }
    }
    elseif ( function_exists('is_product_tag') && is_product_tag() )
    {
        if (is_active_sidebar('shop-archive-widget'))
        {
            dynamic_sidebar('shop-archive-widget');
        }
        else
        {
            dynamic_sidebar('primary-widget');
        }
    }
    elseif ( function_exists('is_shop') && is_shop() )
    {
        if (is_active_sidebar('woocommerce-widget'))
        {
            dynamic_sidebar('woocommerce-widget');
        }
        else
        {
            dynamic_sidebar('primary-widget');
        }
    }
    elseif ( function_exists('is_account_page') && is_account_page() )
    {
        if (is_active_sidebar('woocommerce-widget'))
        {
            dynamic_sidebar('woocommerce-widget');
        }
        else
        {
            dynamic_sidebar('primary-widget');
        }
    }
    elseif ( function_exists('is_checkout') && is_checkout() )
    {
        if (is_active_sidebar('woocommerce-widget'))
        {
            dynamic_sidebar('woocommerce-widget');
        }
        else
        {
            dynamic_sidebar('primary-widget');
        }
    }
    else
    {
        if (is_active_sidebar('primary-widget')) :
            dynamic_sidebar('primary-widget');
        endif;
    }
    wp_reset_query();
?>
</aside><!-- sidebar/-->