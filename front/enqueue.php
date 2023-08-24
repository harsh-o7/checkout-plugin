<?php

if( ! function_exists( 'ic_front_enqueue' ) ) {
    function ic_front_enqueue() {
        $ver = IC_DEV_MODE ? time() : false;

        wp_register_style( 'ic_bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css', [], $ver );
        wp_register_style( 'ic_front', plugins_url() . '/mediya-checkout/assets/css/front.css', [], $ver );
        wp_register_style( 'ic_font_awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css', [], $ver );
        wp_register_style( 'ic_swiper', 'https://cdnjs.cloudflare.com/ajax/libs/Swiper/8.4.2/swiper-bundle.css', [], $ver );

        if ( is_checkout() ) {
            wp_enqueue_style( 'ic_bootstrap');
        }

        wp_enqueue_style( 'ic_front' );
        wp_enqueue_style( 'ic_font_awesome' );
        wp_enqueue_style('ic_swiper' );

        wp_register_script( 'ic_bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js', [], $ver, false );
        wp_register_script( 'ic_swiper', 'https://cdnjs.cloudflare.com/ajax/libs/Swiper/8.4.2/swiper-bundle.min.js', [ 'jquery' ], $ver, false );
        wp_register_script( 'ic_vue', 'https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js' );
        wp_register_script( 'ic_main', plugins_url() . '/mediya-checkout/assets/js/main.js', [], $ver, true );
        wp_register_script( 'ic_checkout', plugins_url() . '/mediya-checkout/assets/js/front/ic-checkout.js', [ 'jquery', 'jquery-form' ], $ver, true );
        wp_register_script( 'ic_styles', plugins_url() . '/mediya-checkout/assets/js/front/ic-styles.js', [ 'jquery', 'jquery-form' ], $ver, true );
        wp_register_script( 'ic_coupon_ajax', plugins_url() . '/mediya-checkout/assets/js/coupon.js', [ 'jquery', 'jquery-form', 'woocommerce', 'wc-country-select', 'wc-address-i18n' ], $ver, true );
        wp_register_script( 'ic_autocomplete', plugins_url() . '/mediya-checkout/assets/js/front/ic-autocomplete.js', [ 'jquery' ], $ver, true );
        wp_register_script( 'ic_mini_cart', plugins_url() . '/mediya-checkout/assets/js/front/ic-mini-cart.js', [ 'jquery', 'ic_swiper', 'ic_products' ], $ver, true );
        wp_register_script( 'ic_products', plugins_url() . '/mediya-checkout/assets/js/front/ic-products.js', [ 'jquery', 'ic_swiper' ], $ver, true );
        wp_register_script( 'ic_upsell', plugins_url() . '/mediya-checkout/assets/js/front/ic-upsells.js', [ 'jquery', 'ic_swiper' ], $ver, true );
        wp_register_script( 'ic_validation', plugins_url() . '/mediya-checkout/assets/js/front/ic-validations.js', ['jquery'], $ver, true);

        wp_localize_script( 'ic_mini_cart',
            'urls',
            array(
                'ajax_url' => admin_url( 'admin-ajax.php' ),
                'upsells_url' => admin_url( '/admin.php?page=mcheckout-upsells' ),
                'plugin_url' => plugins_url() . '/mediya-checkout/',
                'currency' => get_woocommerce_currency_symbol(),
                'shop_url' => get_permalink( wc_get_page_id( 'shop' ) )
            )
        );

        wp_localize_script( 'ic_mini_cart',
            'nonces',
            array(
                'apply_coupon_code_update_mini_cart' => wp_create_nonce( 'ic_apply_coupon_code_update_mini_cart' ),
                'remove_product_update_mini_cart' => wp_create_nonce( 'ic_remove_product_update_mini_cart' ),
                'remove_coupon_code_update_mini_cart' => wp_create_nonce( 'ic_remove_coupon_code_update_mini_cart' ),
                'get_refreshed_mini_cart' => wp_create_nonce( 'ic_get_refreshed_mini_cart' ),
                'reduce_product_qty' => wp_create_nonce( 'ic_reduce_product_qty' ),
                'increase_product_qty' => wp_create_nonce( 'ic_increase_product_qty' ),
                'add_product_update_mini_cart' => wp_create_nonce( 'ic_add_product_update_mini_cart' ),
                'ic_get_cart_quantity' => wp_create_nonce('ic_get_cart_quantity'),
            )
        );

        wp_localize_script( 'ic_coupon_ajax', 'my_ajax_object', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );
        wp_localize_script( 'ic_checkout', 'MYajax', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );

        wp_deregister_script( 'wc-checkout' );

        $errors = ic_get_error_messages();

        wp_enqueue_script( 'jquery' );
        wp_enqueue_script( 'jquery-form' );
        wp_enqueue_script( 'ic_bootstrap' );
        wp_enqueue_script( 'ic_swiper' );
        wp_enqueue_script( 'ic_vue' );
        wp_enqueue_script( 'ic_main' );
        wp_localize_script('ic_validation',
            'urls',
            array(
                'ajax_url' => admin_url( 'admin-ajax.php' ),
                'upsells_url' => admin_url( '/admin.php?page=mcheckout-upsells' ),
                'plugin_url' => plugins_url() . '/mediya-checkout/',
                'currency' => get_woocommerce_currency_symbol(),
                'shop_url' => get_permalink( wc_get_page_id( 'shop' ) ),
                'errors' => $errors
            )
        );

        wp_localize_script( 'ic_validation',
            'nonces',
            array(
                'apply_coupon_code_update_mini_cart' => wp_create_nonce( 'ic_apply_coupon_code_update_mini_cart' ),
                'get_order_review' => wp_create_nonce( 'ic_get_order_review' ),
                'get_upsells_ty' => wp_create_nonce( 'ic_get_upsells_ty' ),
                'ajax_order_info' => wp_create_nonce( 'ic_ajax_order_info' ),
                'add_upsells_purchased' => wp_create_nonce( 'ic_add_upsells_purchased' ),
                'get_ty_options' => wp_create_nonce( 'ic_get_ty_options' ),
                'add_to_cart_back' => wp_create_nonce( 'ic_add_to_cart_back' ),
                'reduce_product_qty' => wp_create_nonce( 'ic_reduce_product_qty' ),
                'increase_product_qty' => wp_create_nonce( 'ic_increase_product_qty' ),
            )
        );

        if( is_checkout() ) {
            wp_enqueue_script( 'ic_checkout' );
            wp_enqueue_script( 'ic_styles' );
            wp_enqueue_script( 'wc-checkout', plugins_url() . '/mediya-checkout/assets/js/checkout.js', [ 'jquery', 'jquery-form', 'woocommerce', 'wc-country-select', 'wc-address-i18n', 'ic_bootstrap' ], $ver, true );
            wp_enqueue_script( 'ic_validation');
            wp_enqueue_script( 'ic_sweetalert', 'https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js', [ 'jquery' ], $ver, false );
            wp_enqueue_script( 'ic_select2', 'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js', [ 'jquery' ], $ver, false );

        }
        wp_enqueue_script( 'ic_coupon_ajax' );
//        wp_enqueue_script( 'google-autocomplete', 'https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyDRHx9kTuHPtpGuHwt5KOnJ03PKqzLFfk8');
        wp_enqueue_script( 'ic_autocomplete' );
        if ( !is_checkout() ) {
            wp_enqueue_script( 'ic_mini_cart' );
            wp_enqueue_script( 'ic_products' );
        }
        wp_enqueue_script( 'ic_upsell' );
    }
}