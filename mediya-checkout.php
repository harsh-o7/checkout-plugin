<?php

/**
 * Plugin Name:       Mediya Checkout
 * Plugin URI:        https://mediya.nl
 * Description:       Mediya Checkout is an all-in-one CRO & WooCommerce checkout optimization plugin that helps you drive more revenue and increase order value with mobile-first and optimized checkout using personalized upsells, smart coupons, dynamic discounts, mini-cart, and many more.
 * Version:           1.0.0
 * Requires at least: 5.0
 * Requires PHP:      7.2
 * Author:            Mediya
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       mcheckout
 * Domain Path:       /languages
 */

if ( ! defined( 'ABSPATH' ) ) : exit(); endif;

// Defines
if ( ! defined( 'IC_DEV_MODE' ) ) {
    define( 'IC_DEV_MODE', true );
}

if ( ! defined( 'IC_TD' ) ) {
    define( 'IC_TD', 'mcheckout' );
}

if ( ! defined( 'IC_PLUGIN_PATH' ) ) {
    define( 'IC_PLUGIN_PATH', trailingslashit( plugin_dir_path( __FILE__ ) ) );
}

if ( ! defined( 'IC_PLUGIN_URL' ) ) {
    define( 'IC_PLUGIN_URL', trailingslashit( plugins_url( '/', __FILE__ ) ) );
}

if ( ! defined( 'IC_PLUGIN_VERSION' ) ) {
    define( 'IC_PLUGIN_VERSION', '1.0');
}

// Functions
if ( ! function_exists('ic_table_create') ) {
    function ic_table_create() {
        include ( plugin_dir_path( __FILE__ ) . '/inc/custom-tables.php' );
    }
}

if ( ! function_exists( 'ic_change_order_button_text' ) ) {
    function ic_change_order_button_text() {
        apply_filters( 'woocommerce_order_button_text', __( 'Confirm Order', IC_TD ), 1 );
    }
}

function ic_get_custom_logo_url()
{

    $custom_logo_id = get_theme_mod( 'custom_logo' );
    $image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
    return $image;
}

if ( ! function_exists( 'ic_move_coupon' ) ) {
    function ic_move_coupon() {
        $priority = has_action('woocommerce_before_checkout_form', 'woocommerce_checkout_coupon_form');
        remove_action('woocommerce_before_checkout_form', 'woocommerce_checkout_coupon_form', $priority);
        add_action( 'ic_add_coupon', 'woocommerce_checkout_coupon_form', 20 );
    }
}

if (!function_exists('ic_customize_templates')) {
    function ic_customize_templates($template, $template_name, $template_path)
    {
        global $woocommerce;
        $_template = $template;
        if ( ! $template_path )
            $template_path = $woocommerce->template_url;

        $plugin_path  = untrailingslashit( plugin_dir_path( __FILE__ ) )  . '/template/woocommerce/';

        // Look within passed path within the theme - this is priority
        if(file_exists( $plugin_path . $template_name ))
            $template = $plugin_path . $template_name;
        if( ! $template )
            $template = locate_template(
                array(
                    $template_path . $template_name,
                    $template_name
                )
            );

        return $template;
    }
}

// Includes
// require_once IC_PLUGIN_PATH . '/google-api/vendor/autoload.php';
require_once ( plugin_dir_path( __FILE__ ) . '/inc/compability.php' );
require_once ( plugin_dir_path( __FILE__ ) . '/front/enqueue.php' );
require_once ( plugin_dir_path( __FILE__ ) . '/admin/enqueue.php' );
require_once ( plugin_dir_path( __FILE__ ) . '/admin/menus.php' );
require_once ( plugin_dir_path( __FILE__ ) . '/inc/helpers.php' );
require_once ( plugin_dir_path( __FILE__ ) . '/inc/dashboard/orders-tracking.php' );
require_once ( plugin_dir_path( __FILE__ ) . '/inc/dashboard/user-tracking.php' );
require_once ( plugin_dir_path( __FILE__ ) . '/inc/dashboard/coupon-tracking.php' );
require_once ( plugin_dir_path( __FILE__ ) . '/inc/dashboard/ajax.php' );
require_once ( plugin_dir_path( __FILE__ ) . '/inc/settings.php' );
require_once ( plugin_dir_path( __FILE__ ) . '/inc/shortcodes.php' );
require_once ( plugin_dir_path( __FILE__ ) . '/inc/order/ajax.php');
require_once ( plugin_dir_path( __FILE__ ) . '/inc/upsell/upsell-handle.php' );
require_once ( plugin_dir_path( __FILE__ ) . '/inc/upsell/get-upsells.php' );
require_once ( plugin_dir_path( __FILE__ ) . '/inc/payment/get-payment.php' );
require_once ( plugin_dir_path( __FILE__ ) . '/inc/payment/manage-payments.php' );
require_once ( plugin_dir_path( __FILE__ ) . '/front/mini-cart.php' );
require_once ( plugin_dir_path( __FILE__ ) . '/front/styles.php' );

if ( ! function_exists( 'ic_add_custom_checkout_template' ) ) {
    function ic_add_custom_checkout_template( $templates ) {
        $templates[ plugin_dir_path( __FILE__ ) . 'templates/front/mcheckout-checkout.php'] = __( 'mcheckout', IC_TD );
        return $templates;
    }
}

if ( ! function_exists( 'ic_create_custom_checkout' ) ) {
    function ic_create_custom_checkout() {

        if ( ! get_option( 'mcheckout_installed' ) ) {

            $new_page_id = wp_insert_post(array(
                'post_title' => 'mCheckout',
                'post_type' => 'page',
                'post_name' => 'mcheckout',
                'comment_status' => 'closed',
                'ping_status' => 'closed',
                'post_content' => '[woocommerce_checkout]',
                'post_status' => 'publish',
                'post_author' => get_user_by('id', 1)->user_id,
                'menu_order' => 0,
            ));

            update_option('mcheckout_installed', true);
            update_option( 'woocommerce_checkout_page_id', $new_page_id );
            update_post_meta( $new_page_id, '_wp_page_template', 'mcheckout-checkout.php' );
        }
    }
}

if ( ! function_exists( 'ic_template_array' ) ) {
    function ic_template_array() {
        $temps = [];
        $temps['mcheckout-checkout.php'] = 'mCheckout';
        return $temps;
    }
}

if ( ! function_exists( 'ic_checkout_template_register' ) ) {
    function ic_checkout_template_register($page_templates, $theme, $post) {
        $templates = ic_template_array();
        foreach ( $templates as $k => $v ) {
            $page_templates[$k] = $v;
        }
        return $page_templates;
    }
}

if ( ! function_exists( 'ic_checkout_template_select' ) ) {
    function ic_checkout_template_select($template) {
        global $post, $wp_query, $wpdb;
        $page_temp_slug = get_page_template_slug( $post->ID );
        $templates = ic_template_array();

        if( isset( $templates[ $page_temp_slug ] ) ) {
            $template = plugin_dir_path( __FILE__ ) . 'templates/front/mediya-checkout-checkout.php';
        }


        return $template;
    }
}



// Hooks
register_activation_hook(__FILE__, 'ic_table_create');
add_action( 'admin_init', 'ic_create_custom_checkout' );
add_filter( 'theme_page_templates', 'ic_checkout_template_register', 10, 3);
add_filter( 'template_include', 'ic_checkout_template_select', 99);
add_action( 'admin_init', 'ic_design_add_custom_options' );
add_action( 'admin_notices', 'ic_admin_notices' );
add_action( 'wp_enqueue_scripts', 'ic_front_enqueue' );
add_action( 'admin_enqueue_scripts', 'ic_admin_enqueue' );
add_action( 'admin_menu', 'ic_settings_pages' );
add_action( 'woocommerce_checkout_order_processed', 'ic_new_order', 1, 1);
add_action( 'woocommerce_new_order', 'ic_add_to_discount_purchased' );
add_action( 'template_redirect', 'ic_template_redirect' );
add_action( 'template_redirect', 'ic_add_mini_cart_icon' );
add_action( 'woocommerce_add_to_cart', 'ic_add_to_cart_user_info' );
add_action( 'wp_ajax_ic_ajax_dashboard_info', 'ic_ajax_dashboard_info' );
add_filter( 'woocommerce_locate_template', 'ic_customize_templates', -10, 3);
add_action( 'plugins_loaded', 'ic_move_coupon' );
add_action( 'plugins_loaded', 'ic_change_order_button_text' );
add_filter( 'woocommerce_enable_order_notes_field', '__return_false', 9999);
add_filter( 'woocommerce_checkout_fields', 'ic_remove_order_notes' );
add_action( 'wp', 'ic_remove_terms_and_conditions' );
add_filter( 'woocommerce_billing_fields', 'ic_handle_checkout_fields', 1, 1);
add_filter( 'woocommerce_shipping_fields', 'ic_handle_checkout_shipping_fields', 10, 1);
add_action( 'wp_ajax_ic_set_coupon', 'ic_set_coupon_ajax', 10);
add_action( 'wp_ajax_nopriv_ic_set_coupon', 'ic_set_coupon_ajax', 10);
add_action( 'the_title', 'ic_hide_entry_title' );
add_action( 'wp_ajax_ic_ajax_order_info', 'ic_ajax_order_info' );
add_action( 'wp_ajax_nopriv_ic_ajax_order_info', 'ic_ajax_order_info' );
add_action( 'wp_ajax_ic_get_required_number', 'ic_get_required_number' );
add_action( 'wp_ajax_nopriv_ic_get_required_number', 'ic_get_required_number' );
//add_action ( 'after_setup_theme', 'ic_change_payment_position' );
add_action( 'wp_ajax_ic_add_new_upsell', 'ic_add_new_upsell' );
add_action( 'wp_ajax_ic_create_discount', 'ic_create_discount' );
add_action( 'wp_ajax_ic_update_discount', 'ic_update_discount' );
add_action( 'wp_ajax_ic_update_upsell', 'ic_update_upsell' );
add_action( 'wp_ajax_ic_us_publish_hide', 'ic_us_publish_hide' );
add_action( 'wp_ajax_ic_update_account_ga', 'ic_update_account_ga' );
add_action( 'wp_ajax_ic_get_account_ga', 'ic_get_account_ga' );
add_action( 'wp_ajax_ic_get_upsells_main_analytics', 'ic_get_upsells_main_analytics' );
add_action( 'wp_ajax_ic_get_single_upsell_main_analytics', 'ic_get_single_upsell_main_analytics' );
add_action( 'wp_ajax_ic_get_datatable_upsells_info', 'ic_get_datatable_upsells_info' );
add_action('wp_ajax_ic_get_datatable_discounts_info', 'ic_get_datatable_discounts_info' );
add_action( 'wp_ajax_ic_get_discounts_main_analytics', 'ic_get_discounts_main_analytics' );
add_action ( 'wp_ajax_ic_upsell_delete', 'ic_upsell_delete' );
add_action ( 'wp_ajax_ic_discount_delete', 'ic_discount_delete' );
add_action ( 'wp_ajax_ic_get_payment_methods', 'ic_get_payment_methods' );
add_action ( 'wp_ajax_ic_update_payment_method', 'ic_update_payment_method' );
add_action ( 'wp_ajax_ic_query_products', 'ic_query_products' );
add_action ( 'wp_ajax_ic_query_product_categories', 'ic_query_product_categories' );
add_action ( 'wp_ajax_ic_update_payment_cod', 'ic_update_payment_cod' );
add_action ( 'wp_ajax_ic_update_payment_cp', 'ic_update_payment_cp' );
add_action ( 'wp_ajax_ic_update_payment_bacs', 'ic_update_payment_bacs' );
add_action ( 'wp_ajax_ic_update_payment_authnet', 'ic_update_payment_authnet' );
add_action ( 'wp_ajax_ic_update_payment_eh_alipay_stripe', 'ic_update_payment_eh_alipay_stripe' );
add_action ( 'wp_ajax_ic_update_payment_eh_affirm_stripe', 'ic_update_payment_eh_affirm_stripe' );
add_action ( 'wp_ajax_ic_update_payment_eh_afterpay_stripe', 'ic_update_payment_eh_afterpay_stripe' );
add_action ( 'wp_ajax_ic_update_payment_eh_stripe_checkout', 'ic_update_payment_eh_stripe_checkout' );
add_action ( 'wp_ajax_ic_update_design_sections', 'ic_update_design_sections' );
add_action ( 'wp_ajax_ic_get_design_sections', 'ic_get_design_sections' );
add_action ( 'wp_ajax_ic_get_active_sections', 'ic_get_active_sections' );
add_action ( 'wp_ajax_ic_update_active_sections', 'ic_update_active_sections' );
add_action ( 'wp_ajax_ic_upsell_get_products_triggers', 'ic_upsell_get_products_triggers' );
add_action ( 'wp_footer', 'ic_display_mini_cart' );
add_action ( 'wp_footer', 'ic_display_mini_cart_floating' );
add_action ( 'wp_ajax_ic_remove_product_from_cart', 'ic_remove_product_from_cart' );
add_action ( 'wp_ajax_nopriv_ic_remove_product_from_cart', 'ic_remove_product_from_cart' );
add_action ( 'wp_ajax_ic_remove_product_update_mini_cart', 'ic_remove_product_update_mini_cart' );
add_action ( 'wp_ajax_nopriv_ic_remove_product_update_mini_cart', 'ic_remove_product_update_mini_cart' );
add_action ( 'wp_ajax_ic_add_product_update_mini_cart', 'ic_add_product_update_mini_cart' );
add_action ( 'wp_ajax_nopriv_ic_add_product_update_mini_cart', 'ic_add_product_update_mini_cart' );
add_action ( 'wp_ajax_ic_get_address_coordinates', 'ic_get_address_coordinates' );
add_action ( 'wp_ajax_ic_update_address_coordinates', 'ic_update_address_coordinates' );
add_action ( 'wp_head', 'ic_apply_styles' );
add_action ( 'admin_head', 'ic_apply_styles' );
add_action ( 'woocommerce_before_calculate_totals', 'ic_set_upsell_product_prices', 10, 1 );
add_action ( 'woocommerce_cart_calculate_fees', 'ic_apply_automatic_discount_to_cart');
add_action ( 'wp_ajax_ic_apply_coupon_code_update_mini_cart', 'ic_apply_coupon_code_update_mini_cart' );
add_action ( 'wp_ajax_nopriv_ic_apply_coupon_code_update_mini_cart', 'ic_apply_coupon_code_update_mini_cart' );
add_action ( 'wp_ajax_ic_remove_coupon_code_update_mini_cart', 'ic_remove_coupon_code_update_mini_cart' );
add_action ( 'wp_ajax_nopriv_ic_remove_coupon_code_update_mini_cart', 'ic_remove_coupon_code_update_mini_cart' );
add_action ( 'wp_ajax_ic_get_custom_mini_cart_products', 'ic_get_custom_mini_cart_products' );
add_action ( 'wp_ajax_ic_update_custom_mini_cart_products', 'ic_update_custom_mini_cart_products' );
add_action ( 'wp_ajax_ic_get_order_review', 'ic_get_order_review' );
add_action ( 'wp_ajax_nopriv_ic_get_order_review', 'ic_get_order_review' );
add_action ( 'ic_before_us_shown', 'ic_upsell_shown' );
add_action ( 'wp_ajax_ic_add_upsells_purchased', 'ic_add_upsells_purchased' );
add_action ( 'wp_ajax_nopriv_ic_add_upsells_purchased', 'ic_add_upsells_purchased' );
add_action ( 'wp_ajax_ic_get_order_addresses', 'ic_get_order_addresses' );
add_action ( 'wp_ajax_ic_get_upsells_ty', 'ic_get_upsells_ty' );
add_action ( 'wp_ajax_nopriv_ic_get_upsells_ty', 'ic_get_upsells_ty' );
add_action ( 'wp_ajax_ic_add_to_cart_back', 'ic_add_to_cart_back' );
add_action ( 'wp_ajax_nopriv_ic_add_to_cart_back', 'ic_add_to_cart_back' );
add_action ( 'wp_ajax_ic_get_refreshed_mini_cart', 'ic_get_refreshed_mini_cart' );
add_action ( 'wp_ajax_nopriv_ic_get_refreshed_mini_cart', 'ic_get_refreshed_mini_cart' );
add_action ( 'wp_ajax_ic_get_ty_options', 'ic_get_ty_options' );
add_action ( 'wp_ajax_nopriv_ic_get_ty_options', 'ic_get_ty_options' );
add_action ( 'wp_ajax_ic_get_product_price', 'ic_get_product_price' );
add_action ( 'wp_ajax_ic_get_us_products', 'ic_get_us_products' );
add_action ( 'wp_ajax_ic_discount_get_products_triggers', 'ic_discount_get_products_triggers' );
add_action ( 'wp_ajax_ic_get_products_by_categories', 'ic_get_products_by_categories' );
add_action ( 'wp_ajax_ic_reduce_product_qty', 'ic_reduce_product_qty' );
add_action ( 'wp_ajax_nopriv_ic_reduce_product_qty', 'ic_reduce_product_qty' );
add_action ( 'wp_ajax_ic_increase_product_qty', 'ic_increase_product_qty' );
add_action ( 'wp_ajax_nopriv_ic_increase_product_qty', 'ic_increase_product_qty' );
add_action ( 'wp_ajax_ic_get_shipping_methods_by_country', 'ic_get_shipping_methods_by_country' );
add_action ( 'wp_ajax_nopriv_ic_get_shipping_methods_by_country', 'ic_get_shipping_methods_by_country' );
add_action ( 'wp_ajax_ic_update_discount_active_status', 'ic_update_discount_active_status' );
add_filter ( 'woocommerce_cart_needs_shipping_address', '__return_true', 1 );
add_action ( 'wp_ajax_ic_reset_styles_to_default', 'ic_reset_styles_to_default' );
add_filter ( 'woocommerce_product_add_to_cart_text', 'woo_custom_cart_button_text', 1, 2 );
add_filter ( 'woocommerce_checkout_fields' , 'ic_checkout_state_placeholder' );
add_action ( 'wp_ajax_ic_get_single_discount_main_analytics', 'ic_get_single_discount_main_analytics' );
add_filter ( 'woocommerce_get_price_html', 'ic_remove_currency_from_price', 10, 2 );
add_action ( 'wp_ajax_ic_get_checkout_upsells','ic_get_checkout_upsells' );
add_action ( 'wp_ajax_nopriv_ic_get_checkout_upsells','ic_get_checkout_upsells' );
add_action ( 'wp_ajax_ic_get_checkout_shipping_methods','ic_get_checkout_shipping_methods' );
add_action ( 'wp_ajax_nopriv_ic_get_checkout_shipping_methods','ic_get_checkout_shipping_methods' );
add_action( 'wp_ajax_ic_change_shipping_if_free_discount','ic_change_shipping_if_free_discount' );
add_action( 'wp_ajax_nopriv_ic_change_shipping_if_free_discount', 'ic_change_shipping_if_free_discount');
add_action( 'wp_ajax_ic_get_cart_quantity','ic_get_cart_quantity' );
add_action( 'wp_ajax_nopriv_ic_get_cart_quantity', 'ic_get_cart_quantity');



function woo_custom_cart_button_text($text, $product) {

    if ('' === $product->get_price() || 0 == $product->get_price()) {
        return $text;
    } else {
        $text = __('Add to cart', 'woocommerce');
    }
    return $text;
}

add_theme_support( 'custom-logo' );

//add_filter('woocommerce_get_cart_item_from_session', 'wdm_get_cart_items_from_session', 1, 3 );
//if(!function_exists('wdm_get_cart_items_from_session'))
//{
//    function wdm_get_cart_items_from_session($item,$values,$key)
//    {
//        if (array_key_exists( 'wdm_user_custom_data_value', $values ) )
//        {
//            $item['wdm_user_custom_data_value'] = 'radi';
//        }
//        return $item;
//    }
//}

if( ! function_exists( 'ic_new_address_one_placeholder' )) {
    function ic_new_address_one_placeholder( $fields ) {
        $fields['address_1']['placeholder'] = 'Street address';

        return $fields;
    }
}
add_filter( 'woocommerce_default_address_fields', 'ic_new_address_one_placeholder' );



//add_filter( 'woocommerce_product_add_to_cart_text', 'woocommerce_custom_product_add_to_cart_text' );
//function woocommerce_custom_product_add_to_cart_text() {
//    return __( 'Buy Now', 'woocommerce' );
//}

// Shortcodes
add_shortcode ( 'ic_coupon_field', 'ic_display_coupon_field' );
add_shortcode ( 'ic_display_payment_methods','ic_display_payment_methods' );
add_shortcode ( 'ic_mini_cart', 'ic_mini_cart' );
add_shortcode ( 'ic_add_to_cart', 'ic_add_to_cart' );
add_shortcode ( 'ic_mini_cart_floating', 'ic_mini_cart_floating' );
add_shortcode ( 'custom_shc', 'custom_shc' );
add_shortcode('ic_checkout_upsells','ic_checkout_upsells');
add_shortcode('ic_checkout_shipping_methods','ic_checkout_shipping_methods');

function custom_shc() {
    do_shortcode('[woocommerce_checkout]');
}

function ic_add_to_cart($atts) {
    global $post;

    if ( empty( $atts ) ) {
        return '';
    }

    $atts = shortcode_atts(
        array(
            'id'         => '',
            'class'      => '',
            'quantity'   => '1',
            'sku'        => '',
            'style'      => 'border:4px solid #ccc; padding: 12px;',
            'show_price' => 'true',
        ),
        $atts,
        'product_add_to_cart'
    );

    if ( ! empty( $atts['id'] ) ) {
        $product_data = get_post( $atts['id'] );
    } elseif ( ! empty( $atts['sku'] ) ) {
        $product_id   = wc_get_product_id_by_sku( $atts['sku'] );
        $product_data = get_post( $product_id );
    } else {
        return '';
    }

    $product = is_object( $product_data ) && in_array( $product_data->post_type, array( 'product', 'product_variation' ), true ) ? wc_setup_product_data( $product_data ) : false;

    if ( ! $product ) {
        return '';
    }
    $productAS= $product_data->ID;
    ob_start();

    echo '<p class="product woocommerce add_to_cart_inline ' . esc_attr( $atts['class'] ) . '" style="' . ( empty( $atts['style'] ) ? '' : esc_attr( $atts['style'] ) ) . '">';

    if ( wc_string_to_bool( $atts['show_price'] ) ) {
        // @codingStandardsIgnoreStart
        echo $product->get_price_html();
        // @codingStandardsIgnoreEnd
    }

//    woocommerce_template_loop_add_to_cart(
//        array(
//            'quantity' => $atts['quantity'],
//        )
//    );

    $customUpsellText = get_option('ic_design_custom_text');
    $upsellText = 'Add to cart';
    if (isset($customUpsellText['ic_ct_mc_add_to_cart_button']) && $customUpsellText['ic_ct_mc_add_to_cart_button'] != ''){
        $upsellText = $customUpsellText['ic_ct_mc_add_to_cart_button'];
    }
    echo '<a data-quantity="1" class="button wp-element-button product_type_variation add_to_cart_button" data-product_id="'.$productAS.'" data-product_sku="" rel="nofollow">'.$upsellText.'</a>';
    echo '</p>';

    // Restore Product global in case this is shown inside a product post.
    wc_setup_product_data( $post );

    return ob_get_clean();
}

add_action('wp_ajax_woocommerce_ajax_add_to_cart', 'woocommerce_ajax_add_to_cart');
add_action('wp_ajax_nopriv_woocommerce_ajax_add_to_cart', 'woocommerce_ajax_add_to_cart');

function woocommerce_ajax_add_to_cart() {

    $canBeAdded = ic_can_it_be_added(absint($_POST['product_id']));
    if (!$canBeAdded){
        $data = 0;
        echo json_encode($data);
        wp_die();
    }

    $product_id = apply_filters('woocommerce_add_to_cart_product_id', absint($_POST['product_id']));
    $quantity = empty($_POST['quantity']) ? 1 : wc_stock_amount($_POST['quantity']);


    $variation_id = absint($_POST['variation_id']);
    $passed_validation = apply_filters('woocommerce_add_to_cart_validation', true, $product_id, $quantity);
    $product_status = get_post_status($product_id);

    if ($passed_validation && WC()->cart->add_to_cart($product_id, $quantity, $variation_id) && 'publish' === $product_status) {

        do_action('woocommerce_ajax_added_to_cart', $product_id);

        if ('yes' === get_option('woocommerce_cart_redirect_after_add')) {
            wc_add_to_cart_message(array($product_id => $quantity), true);
        }

        WC_AJAX :: get_refreshed_fragments();
    }
    else {

        $data = array(
            'error' => true,
            'product_url' => apply_filters('woocommerce_cart_redirect_after_error', get_permalink($product_id), $product_id)
        );

        echo wp_send_json($data);
    }
    wp_die();
}
function ic_can_it_be_added($product_id){

    $product = wc_get_product(intval($product_id));
    if (!$product){
        return false;
    }
    $stockManagedBy = $product->get_stock_managed_by_id();
    $stockManager = wc_get_product($stockManagedBy);
    $quantityFR = $stockManager->get_stock_quantity();

    $inCartQty = 0;
    foreach ( WC()->cart->get_cart() as $cart_item ) {
        $quantity = $cart_item['quantity'];
        $cartProduct = wc_get_product($cart_item['product_id']);
        if ($cartProduct->get_stock_managed_by_id() == $stockManagedBy){
            $inCartQty +=$quantity;
        }
    }
    $canAdd = false;
    if ($quantityFR == null || ($quantityFR - $inCartQty)>0){
        $canAdd = true;
    }

    return $canAdd;
}
add_filter( 'woocommerce_update_order_review_fragments', 'ic_can_it_be_added');


function my_custom_shipping_table_update( $fragments ) {
    ob_start();
    ?>
    <table class="my-custom-shipping-table">
        <tbody>
        <?php wc_cart_totals_shipping_html(); ?>
        </tbody>
    </table>
    <?php
    $woocommerce_shipping_methods = ob_get_clean();
    $fragments['.my-custom-shipping-table'] = $woocommerce_shipping_methods;
    return $fragments;
}
add_filter( 'woocommerce_update_order_review_fragments', 'my_custom_shipping_table_update');






function track_abandoned_cart($cart_item_key, $product_id, $quantity, $variation_id, $variation, $cart_item_data) {
    global $wpdb;

    $user_id = get_current_user_id();

    if(!$user_id) return;

    $table_name = $wpdb->prefix . 'ic_abandoned_carts';
    $cart_contents = WC()->cart->get_cart_contents();

    $cart_content_string = json_encode($cart_contents);

    // Set the cart_expiry time to 5 minutes from the current time
    $five_minutes_later = date('Y-m-d H:i:s', strtotime('+5 minutes', current_time('timestamp')));

    $data = array(
        'user_id' => $user_id,
        'cart_content' => $cart_content_string,
        'cart_expiry' => $five_minutes_later
    );

    $existing_entry = $wpdb->get_row($wpdb->prepare("SELECT * FROM $table_name WHERE user_id = %d", $user_id));
    if($existing_entry) {
        $wpdb->update($table_name, $data, array('user_id' => $user_id));
    } else {
        $wpdb->insert($table_name, $data);
    }
}
add_action('woocommerce_add_to_cart', 'track_abandoned_cart', 10, 6);


add_action('woocommerce_cart_item_removed', 'update_abandoned_cart_after_remove', 10, 2);

function update_abandoned_cart_after_remove($cart_item_key, $instance) {
    global $wpdb;

    $user_id = get_current_user_id();

    $table_name = $wpdb->prefix . 'ic_abandoned_carts';

    if (WC()->cart->is_empty()) {
        // If the cart is empty after removing an item, delete the row from the database
        $wpdb->delete($table_name, array('user_id' => $user_id));
    } else {
        // If there are still items in the cart, update the row
        $updated_cart_content = json_encode(WC()->cart->get_cart());
        $wpdb->update(
            $table_name,
            array('cart_content' => $updated_cart_content),
            array('user_id' => $user_id)
        );
    }
}


add_action('woocommerce_after_cart_item_quantity_update', 'update_abandoned_cart_after_quantity_change', 10, 3);
function update_abandoned_cart_after_quantity_change($cart_item_key, $quantity, $old_quantity) {
    global $wpdb;

    $user_id = get_current_user_id();

    $table_name = $wpdb->prefix . 'ic_abandoned_carts';

    if (WC()->cart->is_empty()) {
        // If the cart is empty after changing the quantity, delete the row from the database
        $wpdb->delete($table_name, array('user_id' => $user_id));
    } else {
        // If there are still items in the cart, update the row
        $updated_cart_content = json_encode(WC()->cart->get_cart());
        $wpdb->update(
            $table_name,
            array('cart_content' => $updated_cart_content),
            array('user_id' => $user_id)
        );
    }
}



// if (!wp_next_scheduled('check_abandoned_carts')) {
//     wp_schedule_event(time(), 'hourly', 'check_abandoned_carts');
// }

add_action('init', 'send_abandoned_cart_emails');
function send_abandoned_cart_emails() {
    global $wpdb;

    $abandoned_carts = $wpdb->get_results("SELECT * FROM " . $wpdb->prefix . "ic_abandoned_carts WHERE cart_expiry < NOW()");

    foreach ($abandoned_carts as $cart) {
        $user_info = get_userdata($cart->user_id);
        $to = $user_info->user_email;
        $subject = "You left something in your cart!";
        $cart_contents = json_decode($cart->cart_content, true);
        
        // Get product details from the cart
        $product_list = "";
        foreach ($cart_contents as $item) {
            $product = wc_get_product($item['product_id']);
            $product_name = $product->get_name();
            $product_image = get_the_post_thumbnail_url($item['product_id'], 'shop_thumbnail'); // get the thumbnail size image
            $product_price = wc_price($product->get_price()); // formats the price with currency symbol
            $product_list .= "<div style='margin-bottom: 15px;'>
                                <img src='{$product_image}' alt='{$product_name}' style='width: 60px; height: auto; margin-right: 10px;'>
                                <span>{$product_name} - {$product_price}</span>
                              </div>";
        }

        // Construct the email content using WooCommerce templates
        ob_start();
        wc_get_template('emails/email-header.php', array('email_heading' => $subject));
        echo "Hello " . $user_info->display_name . ",<br><br>Looks like you left something in your cart:<br>";
        echo $product_list;
        echo "Click <a href='" . wc_get_cart_url() . "'>here</a> to complete your purchase!";
        wc_get_template('emails/email-footer.php');
        $message = ob_get_clean();
        
        // Send the email
        $headers = array('Content-Type: text/html; charset=UTF-8');
        $mail = wp_mail($to, $subject, $message, $headers);
    }
}


// Handle the AJAX request.
function cart_progressbar() {

    if ( WC()->cart->is_empty() ) {
        wp_send_json( array(
            'remaining' => 0,
            'percentage_filled' => 0,
            'notice' => 'Your cart is empty.',
            'empty_cart' => true
            ) );
            return; // Exit early.
        }
        
    $notice = '';
    $cart_total = WC()->cart->cart_contents_total;
    $options = get_option( 'ic_design_mini_cart' );
    
    if(isset($options['ic_mini_cart_progress_value']) && $options['ic_mini_cart_progress_value'] != ''){
        $required_amount = $options['ic_mini_cart_progress_value'];
    }else{
        $required_amount = 250;
    }

    $percentage_filled = number_format((($cart_total / $required_amount) * 100) , 2);

    // Ensuring the percentage doesn't go above 100%.
    if($percentage_filled > 100) {
        $percentage_filled = 100;
    }

    $remaining = $required_amount - $cart_total;

    if($remaining >= 0){
        $img = plugins_url().'/mediya-checkout/assets/images/box.svg';
        $notice = '<img src="'.$img.'"><span>spend <b>'.get_woocommerce_currency_symbol() . $remaining . '</b> more to <b>Free NL shopping.</b></span>' ;
    }else{
        $img = plugins_url().'/mediya-checkout/assets/images/confetti.svg';
        $notice = '<img src="'.$img.'"><span>Congratulations, you have activated <b>Free NL shipping !</b></span>';
    }

    wp_send_json(array(
        'remaining' => $remaining,
        'percentage_filled' => $percentage_filled,
        'notice' => $notice,
        'empty_cart' => false
    ));
}
add_action('wp_ajax_cart_progressbar', 'cart_progressbar');
add_action('wp_ajax_nopriv_cart_progressbar', 'cart_progressbar');