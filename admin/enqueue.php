<?php

if( ! function_exists( 'ic_admin_enqueue' ) ) {
    function ic_admin_enqueue() {

        $current_screen = get_current_screen();
        $ver = IC_DEV_MODE ? time() : false;

        // echo $current_screen->id;

        $ic_all_pages = array(
            'toplevel_page_mcheckout',
            'mcheckout_page_mcheckout-payments',
            'mcheckout_page_mcheckout-shipping',
            'mcheckout_page_mcheckout-design',
            'mcheckout_page_mcheckout-upsells',
            'mcheckout_page_mcheckout-discounts',
            'mcheckout_page_mcheckout-emails',
            'mcheckout_page_mcheckout-customers',
            'admin_page_mcheckout-discount-add-new',
            'admin_page_mcheckout-discount-edit',
            'admin_page_mcheckout-upsell-add-new',
            'admin_page_mcheckout-upsell-edit',
            'admin_page_mcheckout-manage-bacs',
            'admin_page_mcheckout-manage-cheque',
            'admin_page_mcheckout-manage-cod',
            'admin_page_mcheckout-manage-authnet',
            'admin_page_mcheckout-manage-eh_alipay_stripe',
            'admin_page_mcheckout-manage-eh_affirm_stripe',
            'admin_page_mcheckout-manage-eh_afterpay_stripe',
            'admin_page_mcheckout-manage-eh_stripe_checkout',
            'admin_page_mcheckout-custom-text'
        );

        $ic_top_pages = array(
            'toplevel_page_mcheckout',
            'mcheckout_page_mcheckout-payments',
            'mcheckout_page_mcheckout-shipping',
            'mcheckout_page_mcheckout-design',
            'mcheckout_page_mcheckout-upsells',
            'mcheckout_page_mcheckout-discounts',
            'mcheckout_page_mcheckout-emails',
            'mcheckout_page_mcheckout-customers'
        );

        $ic_upsell_pages = array(
            'admin_page_mcheckout-upsell-add-new',
            'admin_page_mcheckout-upsell-edit',
        );

        $ic_payment_pages = array(
            'admin_page_mcheckout-manage-bacs',
            'admin_page_mcheckout-manage-cheque',
            'admin_page_mcheckout-manage-cod',
            'admin_page_mcheckout-manage-authnet',
            'admin_page_mcheckout-manage-eh_alipay_stripe',
            'admin_page_mcheckout-manage-eh_affirm_stripe',
            'admin_page_mcheckout-manage-eh_afterpay_stripe',
            'admin_page_mcheckout-manage-eh_stripe_checkout',
        );

        $ic_discount_pages = array(
            'admin_page_mcheckout-discount-add-new',
            'admin_page_mcheckout-discount-edit',
        );

        $ic_translation_pages = array(
            'admin_page_mcheckout-custom-text'
        );


        if ( in_array( $current_screen->id, $ic_all_pages ) ) {
            wp_register_style( 'ic_bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css', [], $ver );
            wp_register_style( 'ic_admin', plugins_url() . '/mediya-checkout/assets/css/admin.css', [], $ver );
            wp_register_style( 'ic_font_awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css', [], $ver );

            wp_enqueue_style( 'ic_bootstrap' );
            wp_enqueue_style( 'ic_admin' );
            wp_enqueue_style( 'ic_font_awesome' );

            wp_register_script( 'ic_bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js', [], $ver, false );
            wp_register_script( 'ic_cc_form', plugins_url() . '/mediya-checkout/assets/js/admin/ic-cc-form.js', [ 'jquery', 'jquery-form' ], $ver, true );
            wp_register_script( 'ic_sweetalert', 'https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js', [ 'jquery' ], $ver, false );

            wp_enqueue_media();
            wp_enqueue_script( 'jquery' );
            wp_enqueue_script( 'jquery-form' );
            wp_enqueue_script( 'ic_bootstrap' );
            wp_enqueue_script( 'ic_cc_form' );
            wp_enqueue_script( 'ic_sweetalert' );
        }

        if ( in_array( $current_screen->id, $ic_top_pages ) ) {

            wp_register_style( 'ic_datepicker', 'https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css', [], $ver );
            wp_register_style( 'ic_datatables', 'https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css', [], $ver );
            wp_register_style( 'ic_leaflet', 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/leaflet.css', [], $ver );
            wp_register_style( 'ic_swiper', 'https://cdnjs.cloudflare.com/ajax/libs/Swiper/8.4.2/swiper-bundle.css', [], $ver );

            wp_enqueue_style( 'ic_datepicker' );
            wp_enqueue_style( 'wp-color-picker' );
            wp_enqueue_style( 'ic_datatables' );
            wp_enqueue_style( 'ic_leaflet' );
            wp_enqueue_style( 'ic_swiper' );

            wp_register_script( 'ic_vue', 'https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js' );
            wp_register_script( 'ic_chart', 'https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js', [ 'ic_vue', 'jquery' ], $ver, false );
            wp_register_script( 'ic_moment', 'https://cdn.jsdelivr.net/momentjs/latest/moment.min.js', [ 'jquery' ], $ver, false );
            wp_register_script( 'ic_datepicker', 'https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js', [ 'jquery', 'ic_moment' ], $ver, false );
            wp_register_script( 'ic_swiper', 'https://cdnjs.cloudflare.com/ajax/libs/Swiper/8.4.2/swiper-bundle.min.js', [ 'jquery' ], $ver, false );
            wp_register_script( 'ic_custom_daterangepicker', plugins_url() . '/mediya-checkout/assets/js/admin/daterangepicker.js', [ 'jquery', 'ic_moment', 'ic_datepicker' ], $ver, true );
            wp_register_script( 'ic_leaflet', 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/leaflet.js', [ 'jquery' ], $ver, false );
            wp_register_script( 'ic_google_analytics', plugins_url() . '/mediya-checkout/assets/js/admin/google.js', [ 'jquery' ], $ver, true );
            wp_register_script( 'ic_google', 'https://apis.google.com/js/client.js', [ 'jquery', 'ic_moment', 'ic_datepicker', 'ic_custom_daterangepicker', 'ic_google_analytics' ] , $ver, true );
            wp_register_script( 'ic_dashboard', plugins_url() . '/mediya-checkout/assets/js/admin/dashboard.js', [ 'jquery', 'ic_moment', 'ic_datepicker', 'ic_custom_daterangepicker', 'ic_leaflet', 'ic_google' ], $ver, true );
            wp_register_script( 'ic_upsells', plugins_url() . '/mediya-checkout/assets/js/admin/upsells.js', [ 'jquery', 'ic_moment', 'ic_datepicker', 'ic_custom_daterangepicker', 'ic_swiper' ], $ver, true );
            wp_register_script( 'ic_discounts', plugins_url() . '/mediya-checkout/assets/js/admin/discounts.js', [ 'jquery', ], $ver, true);
            wp_register_script( 'ic_customers', plugins_url() . '/mediya-checkout/assets/js/admin/customers.js', [ 'jquery', ], $ver, true);
            wp_register_script( 'ic_payments', plugins_url() . '/mediya-checkout/assets/js/admin/payments.js', [ 'jquery' ], $ver, true );
            wp_register_script( 'ic_design', plugins_url() . '/mediya-checkout/assets/js/admin/design.js', [ 'jquery', 'jquery-form', 'ic_sweetalert' ], $ver, true );
            wp_register_script( 'ic_upload', plugins_url() . '/mediya-checkout/assets/js/admin/upload.js', [ 'jquery' ], $ver, true );
            wp_register_script( 'ic_colors', plugins_url() . '/mediya-checkout/assets/js/admin/colors.js', [ 'jquery', 'wp-color-picker' ], $ver, true );
            wp_register_script( 'ic_geocharts', 'https://www.gstatic.com/charts/loader.js', [ 'jquery' ], $ver, false );
            wp_register_script( 'ic_datatables', 'https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js', [ 'jquery' ], $ver, false );

            wp_localize_script( 'ic_dashboard',
                'urls',
                array(
                    'ajax_url' => admin_url( 'admin-ajax.php' ),
                    'upsells_url' => admin_url( '/admin.php?page=mcheckout-upsells' ),
                    'plugin_url' => plugins_url() . '/mediya-checkout/',
                    'translations_url' => admin_url( '/admin.php?page=mcheckout-custom-text' )
                )
            );

            wp_localize_script( 'ic_google_analytics',
                'urls',
                array(
                    'ajax_url' => admin_url( 'admin-ajax.php' ),
                    'upsells_url' => admin_url( '/admin.php?page=mcheckout-upsells' ),
                    'plugin_url' => plugins_url() . '/mediya-checkout/',
                    'translations_url' => admin_url( '/admin.php?page=mcheckout-custom-text' )
                )
            );

            wp_localize_script( 'ic_google_analytics',
                'nonces',
                array(
                    'dashboard_info' => wp_create_nonce( 'ic_dashboard_info' ),
                    'update_address_coordinates' => wp_create_nonce( 'ic_update_address_coordinates' ),
                    'get_address_coordinates' => wp_create_nonce( 'ic_get_address_coordinates' ),
                    'get_active_sections' => wp_create_nonce( 'ic_get_active_sections' ),
                    'update_active_sections' => wp_create_nonce( 'ic_update_active_sections' ),
                    'update_account_ga' => wp_create_nonce( 'ic_update_account_ga' ),
                    'get_account_ga' => wp_create_nonce( 'ic_get_account_ga' ),
                    'us_publish_hide' => wp_create_nonce( 'ic_us_publish_hide' ),
                    'get_payment_methods' => wp_create_nonce( 'ic_get_payment_methods' ),
                    'get_custom_mini_cart_products' => wp_create_nonce( 'ic_get_custom_mini_cart_products' ),
                    'update_custom_mini_cart_products' => wp_create_nonce( 'ic_update_custom_mini_cart_products' ),
                    'get_discounts_main_analytics' => wp_create_nonce( 'ic_get_discounts_main_analytics' ),
                    'get_datatable_discounts_info' => wp_create_nonce( 'ic_get_datatable_discounts_info' ),
                    'discount_delete' => wp_create_nonce( 'ic_discount_delete' ),
                    'update_payment_method' => wp_create_nonce( 'ic_update_payment_method' ),
                    'get_upsells_main_analytics' => wp_create_nonce( 'ic_get_upsells_main_analytics' ),
                    'get_single_upsell_main_analytics' => wp_create_nonce( 'ic_get_single_upsell_main_analytics' ),
                    'get_datatable_upsells_info' => wp_create_nonce( 'ic_get_datatable_upsells_info' ),
                    'upsell_delete' => wp_create_nonce( 'ic_upsell_delete' ),
                    'get_us_products' => wp_create_nonce( 'ic_get_us_products' ),
                )
            );

            wp_localize_script( 'ic_dashboard',
            'nonces',
                array(
                    'dashboard_info' => wp_create_nonce( 'ic_dashboard_info' ),
                    'update_address_coordinates' => wp_create_nonce( 'ic_update_address_coordinates' ),
                    'get_address_coordinates' => wp_create_nonce( 'ic_get_address_coordinates' ),
                    'get_active_sections' => wp_create_nonce( 'ic_get_active_sections' ),
                    'update_active_sections' => wp_create_nonce( 'ic_update_active_sections' ),
                    'update_account_ga' => wp_create_nonce( 'ic_update_account_ga' ),
                    'get_account_ga' => wp_create_nonce( 'ic_get_account_ga' ),
                    'us_publish_hide' => wp_create_nonce( 'ic_us_publish_hide' ),
                    'get_payment_methods' => wp_create_nonce( 'ic_get_payment_methods' ),
                    'get_custom_mini_cart_products' => wp_create_nonce( 'ic_get_custom_mini_cart_products' ),
                    'update_custom_mini_cart_products' => wp_create_nonce( 'ic_update_custom_mini_cart_products' ),
                    'get_discounts_main_analytics' => wp_create_nonce( 'ic_get_discounts_main_analytics' ),
                    'get_datatable_discounts_info' => wp_create_nonce( 'ic_get_datatable_discounts_info' ),
                    'discount_delete' => wp_create_nonce( 'ic_discount_delete' ),
                    'update_payment_method' => wp_create_nonce( 'ic_update_payment_method' ),
                    'get_upsells_main_analytics' => wp_create_nonce( 'ic_get_upsells_main_analytics' ),
                    'get_single_upsell_main_analytics' => wp_create_nonce( 'ic_get_single_upsell_main_analytics' ),
                    'get_datatable_upsells_info' => wp_create_nonce( 'ic_get_datatable_upsells_info' ),
                    'upsell_delete' => wp_create_nonce( 'ic_upsell_delete' ),
                    'get_us_products' => wp_create_nonce( 'ic_get_us_products' ),
                )
            );

            wp_localize_script( 'ic_dashboard',
                'info',
                array(
                    'currency' => get_woocommerce_currency_symbol()
                )
            );

            wp_enqueue_script( 'ic_vue' );
            wp_enqueue_script( 'ic_chart' );
            wp_enqueue_script( 'ic_moment' );
            wp_enqueue_script( 'ic_datepicker' );
            wp_enqueue_script( 'ic_custom_daterangepicker' );
            wp_enqueue_script( 'ic_leaflet' );
            wp_enqueue_script( 'ic_google_analytics' );
            wp_enqueue_script( 'ic_google' );
            wp_enqueue_script( 'ic_dashboard' );
            wp_enqueue_script( 'ic_swiper' );
            wp_enqueue_script( 'ic_upsells' );
            wp_enqueue_script( 'ic_discounts');
            wp_enqueue_script( 'ic_customers');
            wp_enqueue_script( 'ic_payments' );
            wp_enqueue_script( 'ic_design' );
            wp_enqueue_script( 'ic_upload' );
            wp_enqueue_script( 'ic_colors' );
            wp_enqueue_script( 'ic_geocharts' );
            wp_enqueue_script( 'ic_datatables' );

            wp_register_script( 'wp-color-picker-alpha', plugins_url() . '/mediya-checkout/assets/js/admin/wp-color-picker-alpha.js', [ 'jQuery' ], $ver, true );

            $color_picker_strings = array(
                'clear'            => __( 'Clear', IC_TD ),
                'clearAriaLabel'   => __( 'Clear color', IC_TD ),
                'defaultString'    => __( 'Default', IC_TD ),
                'defaultAriaLabel' => __( 'Select default color', IC_TD ),
                'pick'             => __( 'Select Color', IC_TD ),
                'defaultLabel'     => __( 'Color value', IC_TD ),
            );
            wp_localize_script( 'wp-color-picker-alpha', 'wpColorPickerL10n', $color_picker_strings );
            wp_enqueue_script( 'wp-color-picker-alpha' );
        }

        if ( in_array( $current_screen->id, $ic_upsell_pages ) ) {
            wp_register_style( 'ic_datepicker', 'https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css', [], $ver );
            wp_register_style( 'ic_swiper', 'https://cdnjs.cloudflare.com/ajax/libs/Swiper/8.4.2/swiper-bundle.css', [], $ver );

            wp_enqueue_style( 'ic_datepicker' );
            wp_enqueue_style( 'ic_swiper' );

            wp_register_script( 'ic_moment', 'https://cdn.jsdelivr.net/momentjs/latest/moment.min.js', [ 'jquery' ], $ver, false );
            wp_register_script( 'ic_datepicker', 'https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js', [ 'jquery', 'ic_moment' ], $ver, false );
            wp_register_script( 'ic_custom_daterangepicker', plugins_url() . '/mediya-checkout/assets/js/admin/daterangepicker.js', [ 'jquery', 'ic_moment', 'ic_datepicker' ], $ver, true );
            wp_register_script( 'ic_swiper', 'https://cdnjs.cloudflare.com/ajax/libs/Swiper/8.4.2/swiper-bundle.min.js', [ 'jquery' ], $ver, false );
            wp_register_script( 'ic_upsells', plugins_url() . '/mediya-checkout/assets/js/admin/upsells.js', [ 'jquery', 'ic_moment', 'ic_datepicker', 'ic_custom_daterangepicker' ], $ver, true );
            wp_register_script( 'ic_upload', plugins_url() . '/mediya-checkout/assets/js/admin/upload.js', [ 'jquery' ], $ver, true );
            wp_register_script( 'ic_upsell_handle', plugins_url() . '/mediya-checkout/assets/js/admin/upsell-handle.js', [ 'jquery', 'ic_sweetalert', 'ic_swiper' ], $ver, true );

            wp_localize_script( 'ic_upsells',
                'urls',
                array(
                    'ajax_url' => admin_url( 'admin-ajax.php' ),
                    'upsells_url' => admin_url( '/admin.php?page=mcheckout-upsells' ),
                    'plugin_url' => plugins_url() . '/mediya-checkout/'
                )
            );

            wp_localize_script( 'ic_upsells',
                'nonces',
                array(
                    'add_new_upsell' => wp_create_nonce( 'ic_add_new_upsell' ),
                    'update_upsell' => wp_create_nonce( 'ic_update_upsell' ),
                    'upsell_get_products_triggers' => wp_create_nonce( 'ic_upsell_get_products_triggers' ),
                    'query_products' => wp_create_nonce( 'ic_query_products' ),
                    'query_product_categories' => wp_create_nonce( 'ic_query_product_categories' ),
                    'get_products_by_categories' => wp_create_nonce( 'ic_get_products_by_categories' ),
                    'get_single_upsell_main_analytics' => wp_create_nonce( 'ic_get_single_upsell_main_analytics' )
                )
            );

            wp_localize_script( 'ic_upsell_handle',
                'info',
                array(
                    'currency' => get_woocommerce_currency_symbol()
                )
            );

            wp_enqueue_script( 'ic_moment' );
            wp_enqueue_script( 'ic_datepicker' );
            wp_enqueue_script( 'ic_custom_daterangepicker' );
            wp_enqueue_script( 'ic_swiper' );
            wp_enqueue_script( 'ic_upload' );
            wp_enqueue_script( 'ic_upsells' );
            wp_enqueue_script( 'ic_upsell_handle' );
        }

        if (in_array($current_screen->id, $ic_discount_pages ) ) {
            wp_register_style( 'ic_datepicker', 'https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css', [], $ver );
            wp_enqueue_style( 'ic_datepicker' );

            wp_register_script( 'ic_moment', 'https://cdn.jsdelivr.net/momentjs/latest/moment.min.js', [ 'jquery' ], $ver, false );
            wp_register_script( 'ic_moment_timezone', 'https://momentjs.com/downloads/moment-timezone-with-data.min.js', [ 'jquery' ], $ver, false );
            wp_register_script( 'ic_datepicker', 'https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js', [ 'jquery', 'ic_moment' ], $ver, false );
            wp_register_script( 'ic_custom_daterangepicker', plugins_url() . '/mediya-checkout/assets/js/admin/daterangepicker.js', [ 'jquery', 'ic_moment', 'ic_datepicker' ], $ver, true );
            wp_register_script( 'ic_discounts', plugins_url() . '/mediya-checkout/assets/js/admin/discounts.js', [ 'jquery', 'ic_moment', 'ic_datepicker', 'ic_custom_daterangepicker', 'ic_moment_timezone' ], $ver, true);
            wp_register_script( 'ic_new_discount', plugins_url() . '/mediya-checkout/assets/js/admin/new_discounts.js', [ 'jquery', 'ic_moment_timezone' ], $ver, true );



            wp_localize_script( 'ic_discounts',
                'urls',
                array(
                    'ajax_url' => admin_url( 'admin-ajax.php' ),
                    'discounts_url' => admin_url( '/admin.php?page=mcheckout-discounts' ),
                    'plugin_url' => plugins_url() . '/mediya-checkout/',
                )
            );

            wp_localize_script( 'ic_discounts',
                'nonces',
                array(
                    'dashboard_info' => wp_create_nonce( 'ic_dashboard_info' ),
                    'update_address_coordinates' => wp_create_nonce( 'ic_update_address_coordinates' ),
                    'get_address_coordinates' => wp_create_nonce( 'ic_get_address_coordinates' ),
                    'get_active_sections' => wp_create_nonce( 'ic_get_active_sections' ),
                    'update_active_sections' => wp_create_nonce( 'ic_update_active_sections' ),
                    'update_account_ga' => wp_create_nonce( 'ic_update_account_ga' ),
                    'get_account_ga' => wp_create_nonce( 'ic_get_account_ga' ),
                    'us_publish_hide' => wp_create_nonce( 'ic_us_publish_hide' ),
                    'get_payment_methods' => wp_create_nonce( 'ic_get_payment_methods' ),
                    'get_custom_mini_cart_products' => wp_create_nonce( 'ic_get_custom_mini_cart_products' ),
                    'update_custom_mini_cart_products' => wp_create_nonce( 'ic_update_custom_mini_cart_products' ),
                    'get_discounts_main_analytics' => wp_create_nonce( 'ic_get_discounts_main_analytics' ),
                    'get_datatable_discounts_info' => wp_create_nonce( 'ic_get_datatable_discounts_info' ),
                    'discount_delete' => wp_create_nonce( 'ic_discount_delete' ),
                    'update_payment_method' => wp_create_nonce( 'ic_update_payment_method' ),
                    'get_upsells_main_analytics' => wp_create_nonce( 'ic_get_upsells_main_analytics' ),
                    'get_single_upsell_main_analytics' => wp_create_nonce( 'ic_get_single_upsell_main_analytics' ),
                    'get_datatable_upsells_info' => wp_create_nonce( 'ic_get_datatable_upsells_info' ),
                    'upsell_delete' => wp_create_nonce( 'ic_upsell_delete' ),
                    'get_us_products' => wp_create_nonce( 'ic_get_us_products' ),
                )
            );

            wp_localize_script( 'ic_new_discount',
                'nonces',
                array(
                    'create_discount' => wp_create_nonce( 'ic_create_discount' ),
                    'add_new_upsell' => wp_create_nonce( 'ic_add_new_upsell' ),
                    'update_upsell' => wp_create_nonce( 'ic_update_upsell' ),
                    'upsell_get_products_triggers' => wp_create_nonce( 'ic_upsell_get_products_triggers' ),
                    'query_products' => wp_create_nonce( 'ic_query_products' ),
                    'query_product_categories' => wp_create_nonce( 'ic_query_product_categories' ),

                )
            );

            wp_localize_script( 'ic_new_discount',
                'info',
                array(
                    'currency' => get_woocommerce_currency_symbol(),
                    'timezone' => wp_timezone_string()
                )
            );

            wp_enqueue_script( 'ic_moment' );
            wp_enqueue_script( 'ic_moment_timezone' );
            wp_enqueue_script( 'ic_datepicker' );
            wp_enqueue_script( 'ic_custom_daterangepicker' );
            wp_enqueue_script( 'ic_discounts' );
            wp_enqueue_script( 'ic_new_discount' );

        }

        if ( in_array( $current_screen->id, $ic_payment_pages ) ) {
            wp_register_script( 'ic_payments_manage', plugins_url() . '/mediya-checkout/assets/js/admin/payments-manage.js', [ 'jquery', 'selectWoo' ], $ver, true );

            wp_localize_script( 'ic_payments_manage',
                'urls',
                array(
                    'ajax_url' => admin_url( 'admin-ajax.php' ),
                    'upsells_url' => admin_url( '/admin.php?page=mcheckout-upsells' ),
                    'plugin_url' => plugins_url() . '/mediya-checkout/'
                )
            );

            wp_localize_script( 'ic_payments_manage',
                'nonces',
                array(
                    'update_payment_authnet' => wp_create_nonce( 'ic_update_payment_authnet' ),
                    'update_payment_cod' => wp_create_nonce( 'ic_update_payment_cod' ),
                    'update_payment_cp' => wp_create_nonce( 'ic_update_payment_cp' ),
                    'update_payment_bacs' => wp_create_nonce( 'ic_update_payment_bacs' ),
                    'update_payment_eh_alipay_stripe' => wp_create_nonce( 'ic_update_payment_eh_alipay_stripe' ),
                    'update_payment_eh_affirm_stripe' => wp_create_nonce( 'ic_update_payment_eh_affirm_stripe' ),
                    'update_payment_eh_amazon_stripe' => wp_create_nonce( 'ic_update_payment_eh_amazon_stripe' ),
                    'update_payment_eh_stripe_checkout' => wp_create_nonce( 'ic_update_payment_eh_stripe_checkout' ),
                    )
            );

            wp_localize_script( 'ic_payments_manage',
                'info',
                array(
                    'currency' => get_woocommerce_currency_symbol()
                )
            );

            wp_enqueue_script('selectWoo');
            wp_enqueue_script( 'ic_payments_manage' );
        }

        if(in_array($current_screen->id, $ic_translation_pages)) {
            wp_register_script( 'ic_translation', plugins_url() . '/mediya-checkout/assets/js/admin/translation.js', [ 'jquery' ], $ver, true );
            wp_localize_script( 'ic_translation',
                'urls',
                array(
                    'ajax_url' => admin_url( 'admin-ajax.php' ),
                    'design_url' => admin_url( '/admin.php?page=mcheckout-design' ),
                    'plugin_url' => plugins_url() . '/mediya-checkout/'
                )
            );
            wp_enqueue_script( 'ic_translation' );
        }

    }
}