<?php

if ( !function_exists( 'ic_settings_pages' ) ) {
    function ic_settings_pages() {
        ic_main_settings_page();
        ic_sub_settigs_pages();
        ic_pages_without_menu();
    }
}

if ( ! function_exists('ic_main_settings_page') ) {
    function ic_main_settings_page() {
        add_menu_page(
            __( 'Mediya Checkout', IC_TD ),
            __( 'mCheckout', IC_TD ),
            'manage_options',
            'mcheckout',
            'ic_settings_markup'
        );
    }
}

if ( ! function_exists( 'ic_sub_settings_pages ') ) {
    function ic_sub_settigs_pages() {

        global $submenu;


        add_submenu_page(
            'mcheckout',
            __( 'Payments', IC_TD ),
            __( 'Payments', IC_TD ),
            'manage_options',
            'mcheckout-payments',
            'ic_payments_markup'
        );

//        add_submenu_page(
//            'mcheckout',
//            __( 'Shipping', IC_TD ),
//            __( 'Shipping', IC_TD ),
//            'manage_options',
//            'mcheckout-shipping',
//            'ic_shipping_markup'
//        );

        add_submenu_page(
            'mcheckout',
            __( 'Design', IC_TD ),
            __( 'Design', IC_TD ),
            'manage_options',
            'mcheckout-design',
            'ic_design_markup'
        );

        add_submenu_page(
            'mcheckout',
            __( 'Upsells', IC_TD ),
            __( 'Upsells', IC_TD ),
            'manage_options',
            'mcheckout-upsells',
            'ic_upsells_markup'
        );

        add_submenu_page(
            'mcheckout',
            __( 'Discounts', IC_TD ),
            __( 'Discounts', IC_TD ),
            'manage_options',
            'mcheckout-discounts',
            'ic_discounts_markup'
        );

//        add_submenu_page(
//            'mcheckout',
//            __( 'Customers', IC_TD ),
//            __( 'Customers', IC_TD ),
//            'manage_options',
//            'mcheckout-customers',
//            'ic_customers_markup'
//        );

//        add_submenu_page(
//            'mcheckout',
//            __( 'Emails', IC_TD ),
//            __( 'Emails', IC_TD ),
//            'manage_options',
//            'mcheckout-emails',
//            'ic_emails_markup'
//        );

//        add_submenu_page(
//            'mcheckout',
//            __( 'Timer setup', IC_TD ),
//            __( 'Timer setup', IC_TD ),
//            'manage_options',
//            'mcheckout-timer-setup',
//            'ic_timer_setup_markup'
//        );
//
//        add_submenu_page(
//            'mcheckout',
//            __( 'Social proofs', IC_TD ),
//            __( 'Social proofs', IC_TD ),
//            'manage_options',
//            'mcheckout-social-proofs',
//            'ic_social_proofs_markup'
//        );
//
//        add_submenu_page(
//            'mcheckout',
//            __( 'Store connection', IC_TD ),
//            __( 'Store connection', IC_TD ),
//            'manage_options',
//            'mcheckout-store-connection',
//            'ic_store_connection_markup'
//        );
//
//        add_submenu_page(
//            'mcheckout',
//            __( 'Integrations', IC_TD ),
//            __( 'Integrations', IC_TD ),
//            'manage_options',
//            'mcheckout-integrations',
//            'ic_integrations_markup'
//        );

        $submenu['mcheckout'][0][0] = 'Dashboard';
    }
}

if ( ! function_exists( 'ic_pages_without_menu' ) ) {
    function ic_pages_without_menu() {
        add_submenu_page(
            null,
            __( 'Add new Upsell', IC_TD ),
            __( 'Add new Upsell', IC_TD ),
            'manage_options',
            'mcheckout-upsell-add-new',
            'ic_add_new_upsell_markup'
        );

        add_submenu_page(
            null,
            __( 'Edit Upsell', IC_TD ),
            __( 'Edit Upsell', IC_TD ),
            'manage_options',
            'mcheckout-upsell-edit',
            'ic_edit_upsell_markup'
        );

        add_submenu_page(
            null,
            __( 'Custom Text', IC_TD ),
            __( 'Custom Text', IC_TD ),
            'manage_options',
            'mcheckout-custom-text',
            'ic_custom_text_markup'
        );

        add_submenu_page(
            null,
            __( 'Add new Discount', IC_TD ),
            __( 'Add new Discount', IC_TD ),
            'manage_options',
            'mcheckout-discount-add-new',
            'ic_add_new_discount_markup'
        );

        add_submenu_page(
            null,
            __( 'Edit Discount', IC_TD ),
            __( 'Edit Discount', IC_TD ),
            'manage_options',
            'mcheckout-discount-edit',
            'ic_discount_edit_markup'
        );

        add_submenu_page(
            null,
            __( 'Manage Direct Bank Transfer', IC_TD ),
            __( 'Manage Direct Bank Transfer', IC_TD ),
            'manage_options',
            'mcheckout-manage-bacs',
            'ic_manage_bacs_markup'
        );

        add_submenu_page(
            null,
            __( 'Manage Check payments', IC_TD ),
            __( 'Manage Check payments', IC_TD ),
            'manage_options',
            'mcheckout-manage-cheque',
            'ic_manage_cheque_markup'
        );

        add_submenu_page(
            null,
            __( 'Manage Cash on Delivery', IC_TD ),
            __( 'Manage Cash on Delivery', IC_TD ),
            'manage_options',
            'mcheckout-manage-cod',
            'ic_manage_cod_markup'
        );

        add_submenu_page(
            null,
            __( 'Manage Authorize.Net', IC_TD ),
            __( 'Manage Authorize.Net', IC_TD ),
            'manage_options',
            'mcheckout-manage-authnet',
            'ic_manage_authnet_markup'
        );

        add_submenu_page(
            null,
            __( 'Manage Alipay', IC_TD ),
            __( 'Manage Alipay', IC_TD ),
            'manage_options',
            'mcheckout-manage-eh_alipay_stripe',
            'ic_manage_eh_alipay_stripe_markup'
        );

        add_submenu_page(
            null,
            __( 'Manage Affirm', IC_TD ),
            __( 'Manage Affirm', IC_TD ),
            'manage_options',
            'mcheckout-manage-eh_affirm_stripe',
            'ic_manage_eh_affirm_stripe_markup'
        );

        add_submenu_page(
            null,
            __( 'Manage Afterpay', IC_TD ),
            __( 'Manage Afterpay', IC_TD ),
            'manage_options',
            'mcheckout-manage-eh_afterpay_stripe',
            'ic_manage_eh_afterpay_stripe_markup'
        );

        add_submenu_page(
            null,
            __( 'Manage Stripe Checkout', IC_TD ),
            __( 'Manage Stripe Checkout', IC_TD ),
            'manage_options',
            'mcheckout-manage-eh_stripe_checkout',
            'ic_manage_eh_stripe_checkout_markup'
        );

        add_submenu_page(
            null,
            __( 'Manage PayPal', IC_TD ),
            __( 'Manage PayPal', IC_TD ),
            'manage_options',
            'mcheckout-manage-ppcp-gateway',
            'ic_manage_ppcp_gateway_markup'
        );
    }
}

if ( ! function_exists( 'ic_settings_markup' ) ) {
    function ic_settings_markup() {
        if ( ! current_user_can( 'manage_options' ) ) {
            return;
        }
        $id = 'dashboard';
        include( WP_PLUGIN_DIR  . '/mediya-checkout/templates/admin/navigation.php' );
    }
}

if ( ! function_exists( 'ic_design_markup' ) ) {
    function ic_design_markup() {
        if ( ! current_user_can( 'manage_options' ) ) {
            return;
        }
        $id = 'design';
        include( WP_PLUGIN_DIR  . '/mediya-checkout/templates/admin/navigation.php' );
    }
}

if ( ! function_exists( 'ic_upsells_markup' ) ) {
    function ic_upsells_markup() {
        if ( ! current_user_can( 'manage_options' ) ) {
            return;
        }
        $id = 'upsells';
        include( WP_PLUGIN_DIR  . '/mediya-checkout/templates/admin/navigation.php' );
    }
}

if ( ! function_exists( 'ic_payments_markup' ) ) {
    function ic_payments_markup() {
        if ( ! current_user_can( 'manage_options' ) ) {
            return;
        }
        $id = 'payments';
        include( WP_PLUGIN_DIR  . '/mediya-checkout/templates/admin/navigation.php' );
    }
}

if ( ! function_exists( 'ic_discounts_markup' ) ) {
    function ic_discounts_markup() {
        if ( ! current_user_can( 'manage_options' ) ) {
            return;
        }
        $id = 'discounts';
        include( WP_PLUGIN_DIR  . '/mediya-checkout/templates/admin/navigation.php' );
    }
}

if ( ! function_exists( 'ic_customers_markup' ) ) {
    function ic_customers_markup() {
        if ( ! current_user_can( 'manage_options' ) ) {
            return;
        }
        $id = 'customers';
        include( WP_PLUGIN_DIR  . '/mediya-checkout/templates/admin/navigation.php' );
    }
}

//if ( ! function_exists( 'ic_emails_markup' ) ) {
//    function ic_emails_markup() {
//        if ( ! current_user_can( 'manage_options' ) ) {
//            return;
//        }
//        $id = 'emails';
//        include( WP_PLUGIN_DIR  . '/mediya-checkout/templates/admin/navigation.php' );
//    }
//}
//
//if ( ! function_exists( 'ic_shipping_markup' ) ) {
//    function ic_shipping_markup() {
//        if ( ! current_user_can( 'manage_options' ) ) {
//            return;
//        }
//        $id = 'shipping';
//        include( WP_PLUGIN_DIR  . '/mediya-checkout/templates/admin/navigation.php' );
//    }
//}

//if ( ! function_exists( 'ic_buy_link_markup' ) ) {
//    function ic_buy_link_markup() {
//        if ( ! current_user_can( 'manage_options' ) ) {
//            return;
//        }
//        $id = 'buy-link';
//        include( WP_PLUGIN_DIR  . '/mediya-checkout/templates/admin/navigation.php' );
//    }
//}
//
//if ( ! function_exists( 'ic_timer_setup_markup' ) ) {
//    function ic_timer_setup_markup() {
//        if ( ! current_user_can( 'manage_options' ) ) {
//            return;
//        }
//        $id = 'timer-setup';
//        include( WP_PLUGIN_DIR  . '/mediya-checkout/templates/admin/navigation.php' );
//    }
//}
//
//if ( ! function_exists( 'ic_social_proofs_markup' ) ) {
//    function ic_social_proofs_markup() {
//        if ( ! current_user_can( 'manage_options' ) ) {
//            return;
//        }
//        $id = 'social-proofs';
//        include( WP_PLUGIN_DIR  . '/mediya-checkout/templates/admin/navigation.php' );
//    }
//}
//
//if ( ! function_exists( 'ic_store_connection_markup' ) ) {
//    function ic_store_connection_markup() {
//        if ( ! current_user_can( 'manage_options' ) ) {
//            return;
//        }
//        $id = 'store-connection';
//        include( WP_PLUGIN_DIR  . '/mediya-checkout/templates/admin/navigation.php' );
//    }
//}
//
//if ( ! function_exists( 'ic_integrations_markup' ) ) {
//    function ic_integrations_markup() {
//        if ( ! current_user_can( 'manage_options' ) ) {
//            return;
//        }
//        $id = 'integrations';
//        include( WP_PLUGIN_DIR  . '/mediya-checkout/templates/admin/navigation.php' );
//    }
//}

if(! function_exists('ic_add_new_discount_markup')) {
    function ic_add_new_discount_markup() {
        if ( ! current_user_can( 'manage_options' ) ) {
            return;
        }
        include( WP_PLUGIN_DIR  . '/mediya-checkout/templates/admin/pages/discounts/create-discount.php' );
    }
}

if ( ! function_exists( 'ic_add_new_upsell_markup' ) ) {
    function ic_add_new_upsell_markup() {
        if ( ! current_user_can( 'manage_options' ) ) {
            return;
        }
        include( WP_PLUGIN_DIR  . '/mediya-checkout/templates/admin/pages/upsell/add-new-upsell.php' );
    }
}

if ( ! function_exists( 'ic_edit_upsell_markup' ) ) {
    function ic_edit_upsell_markup() {
        if ( ! current_user_can( 'manage_options' ) ) {
            return;
        }
        include( WP_PLUGIN_DIR . '/mediya-checkout/templates/admin/pages/upsell/edit-upsell.php' );
    }
}

if( ! function_exists('ic_discount_edit_markup')) {
    function ic_discount_edit_markup() {
        if ( ! current_user_can( 'manage_options' ) ) {
            return;
        }
        include( WP_PLUGIN_DIR  . '/mediya-checkout/templates/admin/pages/discounts/edit-discount.php' );
    }
}

if ( ! function_exists( 'ic_manage_bacs_markup' ) ) {
    function ic_manage_bacs_markup() {
        if ( ! current_user_can( 'manage_options' ) ) {
            return;
        }
        include(WP_PLUGIN_DIR . '/mediya-checkout/templates/admin/pages/payments/manage-payments/bacs.php');
    }
}

if ( ! function_exists( 'ic_manage_cheque_markup' ) ) {
    function ic_manage_cheque_markup() {
        if ( ! current_user_can( 'manage_options' ) ) {
            return;
        }
        include(WP_PLUGIN_DIR . '/mediya-checkout/templates/admin/pages/payments/manage-payments/cheque.php');
    }
}

if ( ! function_exists( 'ic_manage_cod_markup' ) ) {
    function ic_manage_cod_markup() {
        if ( ! current_user_can( 'manage_options' ) ) {
            return;
        }
        include( WP_PLUGIN_DIR . '/mediya-checkout/templates/admin/pages/payments/manage-payments/cod.php' );
    }
}

if ( ! function_exists( 'ic_manage_authnet_markup' ) ) {
    function ic_manage_authnet_markup() {
        if ( ! current_user_can( 'manage_options' ) ) {
            return;
        }
        include( WP_PLUGIN_DIR . '/mediya-checkout/templates/admin/pages/payments/manage-payments/authnet.php' );
    }
}

if ( ! function_exists( 'ic_manage_eh_alipay_stripe_markup' ) ) {
    function ic_manage_eh_alipay_stripe_markup() {
        if ( ! current_user_can( 'manage_options' ) ) {
            return;
        }
        include( WP_PLUGIN_DIR . '/mediya-checkout/templates/admin/pages/payments/manage-payments/eh_alipay_stripe.php' );
    }
}

if ( ! function_exists( 'ic_manage_eh_affirm_stripe_markup' ) ) {
    function ic_manage_eh_affirm_stripe_markup() {
        if ( ! current_user_can( 'manage_options' ) ) {
            return;
        }
        include( WP_PLUGIN_DIR . '/mediya-checkout/templates/admin/pages/payments/manage-payments/eh_affirm_stripe.php' );
    }
}

if ( ! function_exists( 'ic_manage_eh_afterpay_stripe_markup' ) ) {
    function ic_manage_eh_afterpay_stripe_markup() {
        if ( ! current_user_can( 'manage_options' ) ) {
            return;
        }
        include( WP_PLUGIN_DIR . '/mediya-checkout/templates/admin/pages/payments/manage-payments/eh_afterpay_stripe.php' );
    }
}

if ( ! function_exists( 'ic_manage_eh_stripe_checkout_markup' ) ) {
    function ic_manage_eh_stripe_checkout_markup() {
        if ( ! current_user_can( 'manage_options' ) ) {
            return;
        }
        include(WP_PLUGIN_DIR . '/mediya-checkout/templates/admin/pages/payments/manage-payments/eh_stripe_checkout.php');
    }
}

if ( ! function_exists( 'ic_manage_ppcp_gateway_markup' ) ) {
    function ic_manage_ppcp_gateway_markup() {
        if ( ! current_user_can( 'manage_options' ) ) {
            return;
        }
        include(WP_PLUGIN_DIR . '/mediya-checkout/templates/admin/pages/payments/manage-payments/ppc_gateway.php');
    }
}

if ( ! function_exists( 'ic_custom_text_markup' ) ) {
    function ic_custom_text_markup() {
        if ( ! current_user_can( 'manage_options' ) ) {
            return;
        }
        include(WP_PLUGIN_DIR . '/mediya-checkout/templates/admin/pages/design/custom-text.php');
    }
}