<?php

if ( ! function_exists( 'ic_load_shipping_method_options' ) ) {
    function ic_load_shipping_method_options() {

        $current_screen = get_current_screen();
        $ic_payment_methods_pages = array(
            'admin_page_mcheckout-manage-cod',
        );
        if( ! in_array( $current_screen->id, $ic_payment_methods_pages ) ) {
            return array();
        }

        $data_store = WC_Data_Store::load( 'shipping-zone' );
        $raw_zones  = $data_store->get_zones();

        foreach ( $raw_zones as $raw_zone ) {
            $zones[] = new WC_Shipping_Zone( $raw_zone );
        }

        $zones[] = new WC_Shipping_Zone( 0 );
        $options = array();
        foreach ( WC()->shipping()->load_shipping_methods() as $method ) {

            $options[ $method->get_method_title() ] = array();

            // Translators: %1$s shipping method name.
            $options[ $method->get_method_title() ][ $method->id ] = sprintf( __( 'Any &quot;%1$s&quot; method', 'woocommerce' ), $method->get_method_title() );
            foreach ( $zones as $zone ) {
                $shipping_method_instances = $zone->get_shipping_methods();

                foreach ( $shipping_method_instances as $shipping_method_instance_id => $shipping_method_instance ) {
                    if ( $shipping_method_instance->id !== $method->id ) {
                        continue;
                    }
                    $option_id = $shipping_method_instance->get_rate_id();

                    // Translators: %1$s shipping method title, %2$s shipping method id.
                    $option_instance_title = sprintf( __( '%1$s (#%2$s)', 'woocommerce' ), $shipping_method_instance->get_title(), $shipping_method_instance_id );

                    // Translators: %1$s zone name, %2$s shipping method instance name.
                    $option_title = sprintf( __( '%1$s &ndash; %2$s', 'woocommerce' ), $zone->get_id() ? $zone->get_zone_name() : __( 'Other locations', 'woocommerce' ), $option_instance_title );
                    $options[ $method->get_method_title() ][ $option_id ] = $option_title;
                }
            }
        }

        return $options;
    }
}

if ( ! function_exists( 'ic_update_payment_cod' ) ) {
    function ic_update_payment_cod() {

//        if ( ! wp_verify_nonce( $_POST[ 'nonce' ], 'ic_update_payment_cod' ) ) {
//            die ( 'Wrong nonce!' );
//        }

        $enabled = $_POST[ 'enabled' ];
        $title = $_POST[ 'title' ];
        $description = $_POST[ 'description' ];
        $instructions = $_POST[ 'instructions' ];
        $shippings = $_POST[ 'shippings' ];
        $accept_virtual = $_POST[ 'acceptVirtual' ];

        $cod = ic_get_gateway('cod');
        $cod->update_option( 'enabled', $enabled );
        $cod->update_option( 'title', $title );
        $cod->update_option( 'description', $description );
        $cod->update_option( 'instructions', $instructions );
        $cod->update_option( 'enable_for_methods', $shippings );
        $cod->update_option( 'enable_for_virtual', $accept_virtual );

        echo "success";
        wp_die();
    }
}

if ( ! function_exists( 'ic_update_payment_cp' ) ) {
    function ic_update_payment_cp() {

//        if ( ! wp_verify_nonce( $_POST[ 'nonce' ], 'ic_update_payment_cp' ) ) {
//            die ( 'Wrong nonce!' );
//        }

        $enabled = $_POST[ 'enabled' ];
        $title = $_POST[ 'title' ];
        $description = $_POST[ 'description' ];
        $instructions = $_POST[ 'instructions' ];

        $cp = new WC_Gateway_Cheque();
        $cp->update_option( 'enabled', $enabled );
        $cp->update_option( 'title', $title );
        $cp->update_option( 'description', $description );
        $cp->update_option( 'instructions', $instructions );

        echo "success";
        wp_die();
    }
}

if ( ! function_exists( 'ic_update_payment_bacs' ) ) {
    function ic_update_payment_bacs() {

//        if ( ! wp_verify_nonce( $_POST[ 'nonce' ], 'ic_update_payment_bacs' ) ) {
//            die ( 'Wrong nonce!' );
//        }

        $enabled = $_POST[ 'enabled' ];
        $title = $_POST[ 'title' ];
        $description = $_POST[ 'description' ];
        $instructions = $_POST[ 'instructions' ];

        $bacs = new WC_Gateway_BACS();
        $bacs->update_option( 'enabled', $enabled );
        $bacs->update_option( 'title', $title );
        $bacs->update_option( 'description', $description );
        $bacs->update_option( 'instructions', $instructions );

        echo "success";

        wp_die();
    }
}

if( ! function_exists('ic_update_payment_authnet')) {
    function ic_update_payment_authnet() {
        $enabled = $_POST['enabled'];
        $title = $_POST['title'];
        $description = $_POST['description'];
        $api_login_id = $_POST['api_login_id'];
        $transaction_key = $_POST['transaction_key'];
        $debugging = $_POST['debugging'];
        $statement_descriptor = $_POST['statement_descriptor'];
        $allowed_card_types = $_POST['allowed_card_types'];
        $capture = $_POST['capture'];
        $logging = $_POST['logging'];
        $custom_receipt = $_POST['customer_receipt'];
        $test_mode = $_POST['test'];

        $authnet = new WC_Gateway_Authnet();
        $authnet->update_option('enabled', $enabled);
        $authnet->update_option('title', $title);
        $authnet->update_option('description', $description);
        $authnet->update_option('login_id', $api_login_id);
        $authnet->update_option('transaction_key', $transaction_key);
        $authnet->update_option('debugging', $debugging);
        $authnet->update_option('statement_descriptor', $statement_descriptor);
        $authnet->update_option('allowed_card_types', $allowed_card_types);
        $authnet->update_option('capture', $capture);
        $authnet->update_option('logging', $logging);
        $authnet->update_option('custom_receipt', $custom_receipt);
        $authnet->update_option('testmode', $test_mode);


        echo "success";
        wp_die();
    }
}

if( ! function_exists('ic_update_payment_eh_alipay_stripe')) {
    function ic_update_payment_eh_alipay_stripe() {
        $enabled = $_POST['enabled'];
        $title = $_POST['title'];
        $description = $_POST['description'];
        $order_button_text = $_POST['order_button_text'];

        $alipay = new EH_Alipay_Stripe_Gateway();
        $alipay->update_option('enabled', $enabled);
        $alipay->update_option('eh_stripe_alipay_title', $title);
        $alipay->update_option('eh_stripe_alipay_description', $description);
        $alipay->update_option('eh_stripe_alipay_order_button', $order_button_text);


        echo "success";
        wp_die();
    }
}

if( ! function_exists('ic_update_payment_eh_affirm_stripe')) {
    function ic_update_payment_eh_affirm_stripe() {
        $enabled = $_POST['enabled'];
        $title = $_POST['title'];
        $description = $_POST['description'];
        $order_button_text = $_POST['order_button_text'];

        $affirm = new EH_Affirm();
        $affirm->update_option('enabled', $enabled);
        $affirm->update_option('eh_stripe_affirm_title', $title);
        $affirm->update_option('eh_stripe_affirm_description', $description);
        $affirm->update_option('eh_stripe_affirm_order_button', $order_button_text);

        echo "success";
        wp_die();
    }
}

if( ! function_exists('ic_update_payment_eh_afterpay_stripe')) {

    function ic_update_payment_eh_afterpay_stripe() {
        $enabled = $_POST['enabled'];
        $title = $_POST['title'];
        $description = $_POST['description'];
        $order_button_text = $_POST['order_button_text'];

        $afterpay = new EH_Afterpay();
        $afterpay->update_option('enabled', $enabled);
        $afterpay->update_option('eh_stripe_afterpay_title', $title);
        $afterpay->update_option('eh_stripe_afterpay_description', $description);
        $afterpay->update_option('eh_stripe_afterpay_order_button', $order_button_text);

        echo "success";

        wp_die();
    }
}

if( ! function_exists('ic_update_payment_eh_stripe_checkout')) {

    function ic_update_payment_eh_stripe_checkout() {
        $enabled = $_POST['enabled'];
        $title = $_POST['title'];
        $description = $_POST['description'];
        $order_button_text = $_POST['order_button_text'];
        $send_lines = $_POST['send_lines'];
        $billing = $_POST['billing'];
        $shipping = $_POST['shipping'];
        $locales = $_POST['locales'];

        $eh_checkout_stripe = new Eh_Stripe_Checkout();
        $eh_checkout_stripe->update_option('enabled', $enabled);
        $eh_checkout_stripe->update_option('eh_stripe_checkout_title', $title);
        $eh_checkout_stripe->update_option('eh_stripe_checkout_description', $description);
        $eh_checkout_stripe->update_option('eh_stripe_checkout_order_button', $order_button_text);
        $eh_checkout_stripe->update_option('eh_send_line_items', $send_lines);
        $eh_checkout_stripe->update_option('eh_collect_billing', $billing);
        $eh_checkout_stripe->update_option('eh_collect_shipping', $shipping);
        $eh_checkout_stripe->update_option('eh_stripe_checkout_page_locale', $locales);

        echo "success";
        wp_die();
    }
}