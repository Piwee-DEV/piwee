<?php
/**
 *  Wonderful Personal Minimalist Wordpress Blog Theme
 *  Developer by : Amr Sadek
 *  http://themeforest.net/user/bdayh
 *  Extra Options
 */

function bd_extra_scripts_styles()
{
    wp_deregister_script( 'jquery.extra' );
    wp_register_script( 'jquery.extra', get_template_directory_uri() . '/forcemagic/extra-options/js/extra-options.js', array( 'jquery' ), false, true);
    wp_enqueue_script( 'jquery.extra' );

    wp_register_style( 'bd-woocommerce', get_template_directory_uri().'/css/woocommerce.css' , array(), '', 'all' );
    if (class_exists('Woocommerce'))
        wp_enqueue_style( 'bd-woocommerce' );
}
add_action( 'wp_enqueue_scripts', 'bd_extra_scripts_styles' );

// Woocommerce Support
add_theme_support('woocommerce');
define('WOOCOMMERCE_USE_CSS', false);

function tf_addURLParameter($url, $paramName, $paramValue)
{
    $url_data = parse_url($url);
    if(!isset($url_data["query"]))
        $url_data["query"]="";

    $params = array();
    parse_str($url_data['query'], $params);
    $params[$paramName] = $paramValue;
    $url_data['query'] = http_build_query($params);
    return tf_build_url($url_data);
}

function tf_build_url($url_data)
{
    $url="";
    if(isset($url_data['host']))
    {
        $url .= $url_data['scheme'] . '://';
        if (isset($url_data['user'])) {
            $url .= $url_data['user'];
            if (isset($url_data['pass'])) {
                $url .= ':' . $url_data['pass'];
            }
            $url .= '@';
        }
        $url .= $url_data['host'];
        if (isset($url_data['port'])) {
            $url .= ':' . $url_data['port'];
        }
    }
    if (isset($url_data['path'])) {
        $url .= $url_data['path'];
    }
    if (isset($url_data['query'])) {
        $url .= '?' . $url_data['query'];
    }
    if (isset($url_data['fragment'])) {
        $url .= '#' . $url_data['fragment'];
    }
    return $url;
}

// Woocommerce Hooks
remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);
remove_action('woocommerce_before_shop_loop', 'woocommerce_result_count', 20);
remove_action('woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30);

add_action('woocommerce_before_shop_loop', 'bd_woocommerce_catalog_ordering', 30);
function bd_woocommerce_catalog_ordering()
{
    global $bd_data;

    parse_str($_SERVER['QUERY_STRING'], $params);

    $query_string = '?'.$_SERVER['QUERY_STRING'];

    if($bd_data['woo_items'])
    {
        $per_page = $bd_data['woo_items'];
    } else {
        $per_page = 12;
    }

    $pob = !empty($params['product_orderby']) ? $params['product_orderby'] : 'default';
    $pc = !empty($params['product_count']) ? $params['product_count'] : $per_page;

    $html = '';
    $html .= '<div class="catalog-ordering clearfix">';
    $html .= '<div class="orderby-order-container">';
    $html .= '<ul class="orderby order-dropdown">';
    $html .= '<li>';
    $html .= '<span class="current-li"><a>'.__('Sort by', 'bd').' <strong>'.__('Default Order', 'bd').'</strong></a></span>';
    $html .= '<ul>';
    $html .= '<li class="'.(($pob == 'default') ? 'current': '').'"><a href="'.tf_addURLParameter($query_string, 'product_orderby', 'default').'">'.__('Sort by', 'bd').' <strong>'.__('Default Order', 'bd').'</strong></a></li>';
    $html .= '<li class="'.(($pob == 'name') ? 'current': '').'"><a href="'.tf_addURLParameter($query_string, 'product_orderby', 'name').'">'.__('Sort by', 'bd').' <strong>'.__('Name', 'bd').'</strong></a></li>';
    $html .= '<li class="'.(($pob == 'price') ? 'current': '').'"><a href="'.tf_addURLParameter($query_string, 'product_orderby', 'price').'">'.__('Sort by', 'bd').' <strong>'.__('Price', 'bd').'</strong></a></li>';
    $html .= '<li class="'.(($pob == 'date') ? 'current': '').'"><a href="'.tf_addURLParameter($query_string, 'product_orderby', 'date').'">'.__('Sort by', 'bd').' <strong>'.__('Date', 'bd').'</strong></a></li>';
    $html .= '<li class="'.(($pob == 'rating') ? 'current': '').'"><a href="'.tf_addURLParameter($query_string, 'product_orderby', 'rating').'">'.__('Sort by', 'bd').' <strong>'.__('Rating', 'bd').'</strong></a></li>';
    $html .= '</ul>';
    $html .= '</li>';
    $html .= '</ul>';
    $html .= '</div>';

    $html .= '<ul class="sort-count order-dropdown">';
    $html .= '<li>';
    $html .= '<span class="current-li"><a>'.__('Show', 'bd').' <strong>'.$per_page.' '.__(' Products', 'bd').'</strong></a></span>';
    $html .= '<ul>';
    $html .= '<li class="'.(($pob == 'default') ? 'current': '').'"><a href="'.tf_addURLParameter($query_string, 'product_count', 'default').'">'.__('Sort by', 'bd').' <strong>'.__('Products Count', 'bd').'</strong></a></li>';
    $html .= '<li class="'.(($pc == $per_page) ? 'current': '').'"><a href="'.tf_addURLParameter($query_string, 'product_count', $per_page).'">'.__('Show', 'bd').' <strong>'.$per_page.' '.__('Products', 'bd').'</strong></a></li>';
    $html .= '<li class="'.(($pc == $per_page*2) ? 'current': '').'"><a href="'.tf_addURLParameter($query_string, 'product_count', $per_page*2).'">'.__('Show', 'bd').' <strong>'.($per_page*2).' '.__('Products', 'bd').'</strong></a></li>';
    $html .= '<li class="'.(($pc == $per_page*3) ? 'current': '').'"><a href="'.tf_addURLParameter($query_string, 'product_count', $per_page*3).'">'.__('Show', 'bd').' <strong>'.($per_page*3).' '.__('Products', 'bd').'</strong></a></li>';
    $html .= '</ul>';
    $html .= '</li>';
    $html .= '</ul>';

    $html .= '</div>';

    echo $html;
}

add_action('woocommerce_get_catalog_ordering_args', 'bd_woocommerce_get_catalog_ordering_args', 20);
function bd_woocommerce_get_catalog_ordering_args($args)
{
    parse_str($_SERVER['QUERY_STRING'], $params);

    $pob = !empty($params['product_orderby']) ? $params['product_orderby'] : 'default';
    $po = !empty($params['product_order'])  ? $params['product_order'] : 'asc';

    switch($pob)
    {
        case 'date':
            $orderby = 'date';
            $order = 'desc';
            $meta_key = '';
            break;
        case 'price':
            $orderby = 'meta_value_num';
            $order = 'asc';
            $meta_key = '_price';
            break;
        case 'popularity':
            $orderby = 'meta_value_num';
            $order = 'desc';
            $meta_key = 'total_sales';
            break;
        case 'title':
            $orderby = 'title';
            $order = 'asc';
            $meta_key = '';
            break;
        case 'default':
        default:
            $orderby = 'menu_order title';
            $order = 'asc';
            $meta_key = '';
            break;
    }

    switch($po)
    {
        case 'desc':
            $order = 'desc';
            break;
        case 'asc':
            $order = 'asc';
            break;
        default:
            $order = 'asc';
            break;
    }

    $args['orderby'] = $orderby;
    $args['order'] = $order;
    $args['meta_key'] = $meta_key;

    return $args;
}

add_filter('loop_shop_per_page', 'bd_loop_shop_per_page');
function bd_loop_shop_per_page()
{
    global $bd_data;

    parse_str($_SERVER['QUERY_STRING'], $params);

    if($bd_data['woo_items']) {
        $per_page = $bd_data['woo_items'];
    } else {
        $per_page = 6;
    }

    $pc = !empty($params['product_count']) ? $params['product_count'] : $per_page;

    return $pc;
}

// Register default function when plugin not activated
add_action('wp_head', 'bd_plugins_loaded');
function bd_plugins_loaded()
{
    if(!function_exists('is_woocommerce'))
    {
        function is_woocommerce() { return false; }
    }

    if(!function_exists('is_bbpress'))
    {
        function is_bbpress() { return false; }
    }
}

remove_action('woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10);
add_action('woocommerce_before_shop_loop_item_title', 'bd_wp_woocommerce_thumbnail', 10);
function bd_wp_woocommerce_thumbnail()
{
    global $product, $woocommerce;

    $items_in_cart = array();
    if($woocommerce->cart->get_cart() && is_array($woocommerce->cart->get_cart()))
    {
        foreach($woocommerce->cart->get_cart() as $cart)
        {
            $items_in_cart[] = $cart['product_id'];
        }
    }

    $id = get_the_ID();
    $in_cart = in_array($id, $items_in_cart);
    $size = 'full';
    $gallery = get_post_meta($id, '_product_image_gallery', true);
    $attachment_image = '';

    if(!empty($gallery))
    {
        $gallery = explode(',', $gallery);
        $first_image_id = $gallery[0];
        $attachment_image = wp_get_attachment_image($first_image_id , $size, false, array('class' => 'hover-image'));
        $large_image_url_2    = wp_get_attachment_image_src($first_image_id, 'full');
        $bd_img_2             = aq_resize( $large_image_url_2[0], 240, 240, true );
    }

    $thumb_image = get_the_post_thumbnail($id , $size);

    $large_image_url    = wp_get_attachment_image_src( get_post_thumbnail_id($id), 'full');
    $bd_img             = aq_resize( $large_image_url[0], 240, 240, true );


    if($attachment_image)
    {
        $classes = 'crossfade-images';
    } else {
        $classes = '';
    }

    echo '<span class="'.$classes.'">';
    echo '<img src="'.$bd_img_2.'" alt="" border="0" class="hover-image" />';
    echo '<img src="'.$bd_img.'" alt="" border="0" />';

    if($in_cart)
    {
        echo '<span class="cart-loading"><i class="icon-check"></i></span>';
    }
    else
    {
        echo '<span class="cart-loading"><i class="icon-spinner"></i></span>';
    }
    echo '</span>';
}

add_filter('add_to_cart_fragments', 'bd_wp_woocommerce_header_add_to_cart_fragment');
function bd_wp_woocommerce_header_add_to_cart_fragment( $fragments )
{
    global $woocommerce;

    ob_start();
    ?>

    <li class="cart">

        <?php if(!$woocommerce->cart->cart_contents_count){ ?>

            <a href="<?php echo get_permalink(get_option('woocommerce_cart_page_id')); ?>"><?php _e('Cart', 'bd'); ?></a>

        <?php }else{ ?>

            <a href="<?php echo get_permalink(get_option('woocommerce_cart_page_id')); ?>"><?php echo $woocommerce->cart->cart_contents_count; ?> <?php _e('Item(s)', 'bd'); ?> - <?php echo woocommerce_price($woocommerce->cart->subtotal); ?></a>

            <div class="cart-contents">
                <?php foreach($woocommerce->cart->cart_contents as $cart_item): ?>
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
        <?php }  ?>

    </li>

    <?php $fragments['.top-menu .cart'] = ob_get_clean(); ob_start(); ?>

    <li class="cart">

        <?php if(!$woocommerce->cart->cart_contents_count){ ?>

            <a class="my-cart-link" href="<?php echo get_permalink(get_option('woocommerce_cart_page_id')); ?>"></a>

        <?php }else{ ?>

            <a class="my-cart-link my-cart-link-active" href="<?php echo get_permalink(get_option('woocommerce_cart_page_id')); ?>"></a>

            <div class="cart-contents">
                <?php foreach($woocommerce->cart->cart_contents as $cart_item): ?>
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
        <?php } ?>

    </li>
<?php
    $fragments['#header .cart'] = ob_get_clean();
    return $fragments;
}


/**
 *  New Metaboxes
 */
class bd_metaboxes
{
    public function __construct()
    {
        global $bd_data;
        $this->data = $bd_data;

        add_action('add_meta_boxes', array($this, 'add_meta_boxes'));
        add_action('save_post', array($this, 'save_meta_boxes'));
        add_action('admin_enqueue_scripts', array($this, 'admin_script_loader'));
    }

    function admin_script_loader() {
        global $pagenow;
        if (is_admin() && ($pagenow=='post-new.php' || $pagenow=='post.php')) {
            wp_register_script('bd_wp_upload', get_bloginfo('template_directory').'/js/upload.js');
            wp_enqueue_script('bd_wp_upload');
            wp_enqueue_script('media-upload');
            wp_enqueue_script('thickbox');
            wp_enqueue_style('thickbox');
        }
    }

    public function add_meta_boxes()
    {
        $this->add_meta_box('woocommerce_options', 'Product Options', 'product');
        //$this->add_meta_box('portfolio_options', 'Portfolio Options', 'portfolio');
    }

    public function add_meta_box($id, $label, $post_type)
    {
        add_meta_box(
            'bd_' . $id,
            $label,
            array($this, $id),
            $post_type
        );
    }

    public function save_meta_boxes($post_id)
    {
        if(defined( 'DOING_AUTOSAVE') && DOING_AUTOSAVE) {
            return;
        }

        foreach($_POST as $key => $value) {
            if(strstr($key, 'new_bd_')) {
                update_post_meta($post_id, $key, $value);
            }
        }
    }

    public function portfolio_options()
    {

    }

    public function woocommerce_options()
    {
        $this->select(	'full_width',
            'Product Full Width',
            array('no' => 'No', 'yes' => 'Yes'),
            ''
        );

        $this->select(	'sidebar_position',
            'Product Sidebar Position',
            array('default' => 'Default', 'right' => 'Right', 'left' => 'Left'),
            ''
        );
    }

    public function text($id, $label, $desc = '')
    {
        global $post;

        $html = '';
        $html .= '<div class="new_bd_metabox_field">';
        $html .= '<p><label for="new_bd_' . $id . '">';
        $html .= $label;
        $html .= '</label></p>';
        $html .= '<div class="field">';
        $html .= '<input type="text" id="new_bd_' . $id . '" name="new_bd_' . $id . '" value="' . get_post_meta($post->ID, 'new_bd_' . $id, true) . '" />';
        if($desc) {
            $html .= '<p>' . $desc . '</p>';
        }
        $html .= '</div>';
        $html .= '</div>';

        echo $html;
    }

    public function select($id, $label, $options, $desc = '')
    {
        global $post;

        $html = '';
        $html .= '<div class="new_bd_metabox_field">';
        $html .= '<p><label for="new_bd_' . $id . '">';
        $html .= $label;
        $html .= '</label></p>';
        $html .= '<div class="field">';
        $html .= '<select id="new_bd_' . $id . '" name="new_bd_' . $id . '">';
        foreach($options as $key => $option) {
            if(get_post_meta($post->ID, 'new_bd_' . $id, true) == $key) {
                $selected = 'selected="selected"';
            } else {
                $selected = '';
            }

            $html .= '<option ' . $selected . 'value="' . $key . '">' . $option . '</option>';
        }
        $html .= '</select>';
        if($desc) {
            $html .= '<p>' . $desc . '</p>';
        }
        $html .= '</div>';
        $html .= '</div>';

        echo $html;
    }

    public function multiple($id, $label, $options, $desc = '')
    {
        global $post;

        $html = '';
        $html .= '<div class="new_bd_metabox_field">';
        $html .= '<p><label for="new_bd_' . $id . '">';
        $html .= $label;
        $html .= '</label></p>';
        $html .= '<div class="field">';
        $html .= '<select multiple="multiple" id="new_bd_' . $id . '" name="new_bd_' . $id . '[]">';
        foreach($options as $key => $option) {
            if(is_array(get_post_meta($post->ID, 'new_bd_' . $id, true)) && in_array($key, get_post_meta($post->ID, 'new_bd_' . $id, true))) {
                $selected = 'selected="selected"';
            } else {
                $selected = '';
            }

            $html .= '<option ' . $selected . 'value="' . $key . '">' . $option . '</option>';
        }
        $html .= '</select>';
        if($desc) {
            $html .= '<p>' . $desc . '</p>';
        }
        $html .= '</div>';
        $html .= '</div>';

        echo $html;
    }

    public function textarea($id, $label, $desc = '')
    {
        global $post;

        $html = '';
        $html = '';
        $html .= '<div class="new_bd_metabox_field">';
        $html .= '<p><label for="new_bd_' . $id . '">';
        $html .= $label;
        $html .= '</label></p>';
        $html .= '<div class="field">';
        $html .= '<textarea cols="120" rows="10" id="new_bd_' . $id . '" name="new_bd_' . $id . '">' . get_post_meta($post->ID, 'new_bd_' . $id, true) . '</textarea>';
        if($desc) {
            $html .= '<p>' . $desc . '</p>';
        }
        $html .= '</div>';
        $html .= '</div>';

        echo $html;
    }

    public function upload($id, $label, $desc = '')
    {
        global $post;

        $html = '';
        $html = '';
        $html .= '<div class="new_bd_metabox_field">';
        $html .= '<p><label for="new_bd_' . $id . '">';
        $html .= $label;
        $html .= '</label></p>';
        $html .= '<div class="field">';
        $html .= '<input name="new_bd_' . $id . '" class="upload_field" id="new_bd_' . $id . '" type="text" value="' . get_post_meta($post->ID, 'new_bd_' . $id, true) . '" />';
        $html .= '<input class="bd_upload_button" type="button" value="Browse" />';
        if($desc) {
            $html .= '<p>' . $desc . '</p>';
        }
        $html .= '</div>';
        $html .= '</div>';

        echo $html;
    }
}
$metaboxes = new bd_metaboxes;