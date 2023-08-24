<?php

if ( ! function_exists('ic_ajax_order_info') ) {
    function ic_ajax_order_info() {

//        if (!wp_verify_nonce($_GET['nonce'], 'ic_ajax_order_info')) {
//            die ('Wrong nonce!');
//        }

        $order_id = 0;
        if ( isset($_GET['order_id']) ) {
            $order_id = $_GET['order_id'];
        }

        $options = get_option( 'ic_design_checkout' );
        $layout= 1;
        if ( isset( $options[ 'ic_checkout_layout' ] ) ) {
            $layout = esc_attr( $options[ 'ic_checkout_layout' ] );
        }

        $order = wc_get_order( $order_id );
        $order_data = $order->get_data();
        $shipping = $order->get_shipping_method();
        $shippingRate = $order->get_shipping_total();

        $order_products = $order->get_items();
        $products = [];
        foreach ( $order_products as $order_product ) {
             $id = $order_product->get_product_id();
             if ($order_product->get_variation_id() > 0){
                 $id = $order_product->get_variation_id();
             }
             $product_post = wc_get_product( $id);
             $image = $product_post->get_image();

             if (!$image){
                 $secondId = $order_product->get_product_id();
                 $secondProduct = wc_get_product($secondId);
                 $image=$secondProduct->get_image();
             }
             $title = $product_post->get_name();
             
             $quantity = $order_product->get_quantity();
             $total = $order_product->get_subtotal();

            $price = $total / $quantity;
            $price = number_format($price, 2);

            $product = [
                 'id'=>$id,
               'image'     => $image,
               'title'     => $title,
               'quantity'  => $quantity,
               'total'     => $total,
               'price'     => $price
             ];

             array_push( $products, $product );
        }

        global $wpdb;
        $type = 'disc-free-shipp';
        $sql = $wpdb->prepare("SELECT title FROM {$wpdb->prefix}ic_discounts WHERE type = %s", esc_sql($type));
        $freeShippingDiscountTitles = $wpdb->get_col($sql);

        $appliedDiscounts = [];
        foreach ( $order->get_fees() as $fee ) {

            $feeName = $fee->get_name();
            if (in_array($feeName, $freeShippingDiscountTitles)) {
                continue;
            }

            $appliedDiscount = [
                'amount' => $fee->get_amount(),
                'name' => $fee->get_name()
            ];
            array_push( $appliedDiscounts, $appliedDiscount );
        }

        $coupons = [];
        foreach ( $order->get_coupons() as $coupon ) {
            $appliedCoupon = [
                'name' => $coupon->get_code(),
                'amount' => $coupon->get_discount()
            ];
            array_push( $coupons, $appliedCoupon );
        }

        $data = [
            'order'     => $order_data,
            'products'  => $products,
            'layout'    => $layout,
            'shipping'   => $shipping,
            'shippingRate' => $shippingRate,
            'appliedDiscounts' => $appliedDiscounts,
            'coupons' => $coupons
        ];

        echo json_encode($data);
        wp_die();
    }
}

if ( ! function_exists( 'ic_get_order_review' ) ) {
    function ic_get_order_review() {

//        if (!wp_verify_nonce($_GET['nonce'], 'ic_get_order_review')) {
//            die ('Wrong nonce!');
//        }

        WC()->cart->maybe_set_cart_cookies();
        WC()->cart->calculate_shipping();
        WC()->cart->calculate_fees();
        WC()->cart->calculate_totals();
        do_action( 'woocommerce_checkout_order_review' );

        wp_die();
    }
}

if ( ! function_exists( 'woocommerce_checkout_payment' ) ) {
    function woocommerce_checkout_payment() {
        $customText  = get_option('ic_design_custom_text');
        $buttonLabel = 'Confirm order';
        if (isset($customText['ic_ct_c_confirm_order_button_label']) && $customText['ic_ct_c_confirm_order_button_label'] != ''){
            $buttonLabel = $customText['ic_ct_c_confirm_order_button_label'];
        }
        if ( WC()->cart->needs_payment() ) {
            $available_gateways = WC()->payment_gateways()->get_available_payment_gateways();
            WC()->payment_gateways()->set_current_gateway( $available_gateways );
        } else {
            $available_gateways = array();
        }

        wc_get_template(
            'checkout/payment.php',
            array(
                'checkout'           => WC()->checkout(),
                'available_gateways' => $available_gateways,
                'order_button_text'  => apply_filters( 'woocommerce_order_button_text', __( $buttonLabel , 'woocommerce' ) ),
            )
        );
    }
}