<?php

if ( ! function_exists( 'ic_design_add_custom_options' ) ) {
    function ic_design_add_custom_options() {

        if ( ! get_option( 'ic_design_general' ) ) {
            add_option( 'ic_design_general' );
            $defaults = array(
                'primary_color' => '#000000',
                'primary_background_color' => '#ffffff',
                'primary_text_color' => '#101828',
                'ic_design_font_weight' => '3',
                'ic_design_font_subsets' => '0',
                'ic_design_font' => 'Inter',
                'ic_design_corner_radius' => '1',
                'ic_design_corner_radius_px' => '8px',
                'input_field_background_color' => '#ffffff',
                'input_field_text_color' => '#344054',
                'secondary_text_color' => '#344054',
                'tertiary_text_color' => '#667085',
                'secondary_background_color' => '#F9FAFBCC',
                'custom_error_color' => '#F04438',
            );
            update_option('ic_design_general', $defaults);
        }

        if ( ! get_option( 'ic_design_checkout' ) ) {
            add_option( 'ic_design_checkout' );
            $defaults = array(
                'ic_checkout_address' => '1',
                'ic_checkout_powered' => '1',
                'ic_checkout_discount' => '1',
                'ic_checkout_layout' => '1',
                'ic_mini_cart_recommendations_title' => 'Recommendations Title',
                'ic_mini_cart_recommendations_type' => '1',
                'ic_mini_cart_primary_button' => 'Checkout',
                'ic_mini_cart_secondary_button' => 'Cart'
            );
            update_option('ic_design_checkout', $defaults);
        }

        if ( ! get_option(' ic_design_mini_cart ') ) {
            add_option( 'ic_design_mini_cart' );
            $defaults = array(
                'ic_mini_cart_recommendations' => '1',
                'ic_mini_cart_recommendations_type' => '1',
                'ic_mini_cart_primary_button' => 'Checkout',
                'ic_mini_cart_secondary_button' => 'Keep Shopping',
                'ic_mini_cart_bottom_message' => 'Secured by mCheckout',
                'ic_mini_cart_enable_progress' => 'true',
                'ic_mini_cart_enable_progressbar_value' => '250',
            );
            update_option('ic_design_mini_cart', $defaults);
        }

        if ( ! get_option( 'ic_design_ty' ) ) {
            add_option( 'ic_design_ty' );
            $defaults = array(
                'ic_ty_purchase_note' => '',
                'ic_ty_redirect_page' => ''
            );
            update_option('ic_design_ty', $defaults);
        }

        if ( ! get_option( 'ic_design_custom_text' ) ) {
            add_option( 'ic_design_custom_text' );
            $defaultsCustomText = array(

                    //CHECKOUT SECTION
                      'ic_ct_c_page_title' => 'Checkout',
                      //'ic_ct_c_error_page_title' => 'Error',
                      //'ic_ct_c_breadcrumb' => 'Breadcrumb',
                      'ic_ct_c_out_of_stock'=> ' out of stock',
                      'ic_ct_c_log_in_button_label' => 'Log in',
                      'ic_ct_c_shipping_address_label' => 'Shipping address',
                      'ic_ct_c_already_have_an_account_label' => 'Already have an account?',
                      'ic_ct_c_continue_to_delivery_button_label' => 'Continue to delivery',
                      'ic_ct_c_continue_to_payment_button_label'=> 'Continue to payment',
                      'ic_ct_c_mobile_show_summary_label' => 'Show order summary',
                      'ic_ct_c_mobile_hide_summary_label' => 'Hide order summary',
                      'ic_ct_c_first_name' => 'First name',
                      'ic_ct_c_last_name' => 'Last name',
                      'ic_ct_c_email' => 'Email',
                      'ic_ct_c_phone' => 'Phone',
                      'ic_ct_c_company' => 'Company',
                      'ic_ct_c_street_address' => 'Street address',
                      'ic_ct_c_apartment_suite' => 'Apartment,suit,etc...',
                      'ic_ct_c_city' => 'City',
                      'ic_ct_c_zip_code' => 'Zip code',
                      'ic_ct_c_country' => 'Country',
                      'ic_ct_c_state_label' => 'State',
                      //'ic_ct_c_subscribe_to_newsletter' =>'Sign up to our newsletter',
                      'ic_ct_c_by_placing_your_order_label' => 'By placing your order you agree to...',
                      'ic_ct_c_billing_same_as_shipping_label' => 'Billing address is same as shipping',
                      'ic_ct_c_use_different_delivery_address_label' =>'Use different delivery address',
                      'ic_ct_c_recommendations_title' => 'Don’t miss the deal',
                      'ic_ct_c_discount_code_label' => 'Discount',
                      'ic_ct_c_add_to_cart_button_label' => 'Add',
                      'ic_ct_c_apply_button_label' => 'Apply',
                      'ic_ct_c_subtotal_label' => 'Subtotal',
                      'ic_ct_c_taxes_label' => 'Taxes',
                      'ic_ct_c_shipping_label' => 'Shipping',
                      'ic_ct_c_return_to_delivery_label' => 'Return to delivery',
                      'ic_ct_c_return_to_shipping_label' => 'Return to shipping',
                      'ic_ct_c_order_summary_label' => 'Order summary',
                      'ic_ct_c_discount_label' =>'Discount',
                      'ic_ct_c_payment_method_label' => 'Payment method',
                      'ic_ct_c_total_label' => 'Total',
                      'ic_ct_c_confirm_order_button_label' => 'Confirm order',
                      'ic_ct_c_complete_order_button_label' => 'Complete order',
                      'ic_ct_c_show_more_credit_cards_label' => '& more',
                      'ic_ct_c_delivery_label' => 'Delivery',
                      'ic_ct_c_continue_button_label' => 'Continue',
                      'ic_ct_c_return_button_label' => 'Return',
                      'ic_ct_c_first_name_error_label' => 'Please enter a valid name',
                      'ic_ct_c_payment_label' => 'Complete payment',
                      'ic_ct_c_add_extras_title' => 'Add extras to your order',
                      'ic_ct_c_add_extras_description' => 'Thank you! Your order is confirmed, but you can add following item(s).',
                      'ic_ct_c_add_extra_product_title' => 'Success',
                      'ic_ct_c_add_extra_product_description' => 'You successfully added product to cart!',
                      'ic_ct_c_email_error_label' => 'Please enter a valid email address',
                      'ic_ct_c_last_name_error_label' => 'Please enter a valid name',
                      'ic_ct_c_street_address_error' => 'Please enter a valid address',
                      'ic_ct_c_city_error_label' => 'Please enter a valid city',
                      'ic_ct_c_phone_number_error_label' => 'Please enter a valid phone number',
                      'ic_ct_c_zip_code_error_label' => 'Please enter a valid zip code',


                      //MINI-CART SECTION
                      'ic_ct_mc_page_title' => 'Mini cart',
                      //'ic_ct_mc_shipping_message' => 'Just 20$ away from free shipping',
                      'ic_ct_mc_discount_code_label' => 'Discount',
                      'ic_ct_mc_apply_button_label' => 'Apply',
                      'ic_ct_mc_coupon_label' =>'Coupon successful',
                      'ic_ct_mc_coupon_error_label' => 'Coupon is not valid',
                      'ic_ct_mc_taxes_label' =>'Taxes',
                      'ic_ct_mc_shipping_label' => 'Shipping',
                      'ic_ct_mc_discount_label' => 'Coupon',
                      'ic_ct_mc_subtotal_label' => 'Subtotal',
                      //'ic_ct_mc_recommendation_title' => 'You might also like',
                      'ic_ct_mc_total_label' => 'Total',
                      //'ic_ct_mc_secondary_button_label' => 'Keep shopping',
                      'ic_ct_mc_add_to_cart_button' => 'Add',
                      //'ic_ct_mc_bottom_message_label' => 'Free shipping on orders over $50',
                      //'ic_ct_mc_primary_button_label' => 'Checkout',
                      'ic_ct_mc_cart_empty_message' => 'Your cart is empty',
                      'ic_ct_mc_cart_empty_button_label' => 'Go to shop',

                      //THANK YOU SECTION
                      'ic_ct_ty_page_title' => 'Thank you page',
                      //'ic_ct_ty_error_page_title' => 'Error',
                      'ic_ct_ty_primary_thank_you_label' =>'Thank you',
                     //'ic_ct_ty_secondary_thank_you_label' => 'Thank you for purchasing product. Expect it tomorrow during the day.',
                      'ic_ct_ty_customer_information_label' => 'Customer information',
                      'ic_ct_ty_shipping_information_label' => 'Shipping',
                      'ic_ct_ty_shipping_address_label' => 'Shipping address',
                      'ic_ct_ty_billing_address_label' => 'Billing address',
                      'ic_ct_ty_shipping_method_information_label' => 'Shipping method',
                      'ic_ct_ty_payment_information_label' => 'Payment',
                      'ic_ct_ty_payment_method_label' => 'Payment method',
                      //'ic_ct_ty_save_my_information_for_faster_checkout_label' => 'Save my information for a faster checkout',
                      //'ic_ct_ty_sign_up_for_newsletter' => 'Sign up',
                      //'ic_ct_ty_sign_up_newsletter_description' => 'Sign up to our updates and get 15% off your nex order...',
                      'ic_ct_ty_email_address_label' => 'Your email address',
                      'ic_ct_ty_sign_up_button_label' => 'Sign up',
                      'ic_ct_ty_need_help_label' => 'Need help',
                      'ic_ct_ty_contact_us_button_label' => 'Contact us',
                      'ic_ct_ty_continue_shopping_button_label' => 'Continue shopping',
                      'ic_ct_ty_items_in_shipment_label' => 'Items in shipment',
                      'ic_ct_ty_subtotal_label' => 'Subtotal',
                      'ic_ct_ty_discount_label' => 'Discount',
                      'ic_ct_ty_shipping_label' => 'Shipping',
                      'ic_ct_ty_total_label' => 'Total'

            );
            update_option('ic_design_custom_text', $defaultsCustomText);
        }

        if ( ! get_option( 'ga_id' ) ) {
            add_option( 'ga_id' );
        }

        if ( ! get_option( 'design_sections' ) ) {
            add_option( 'design_sections' );
            update_option('design_sections', []);
        }

        if ( ! get_option( 'custom_mini_cart_products' ) ) {
            add_option( 'custom_mini_cart_products' );
            update_option('custom_mini_cart_products', []);
        }

        // Design General
        add_settings_section(
            'ic_design_general_section',
            __( '', IC_TD ),
            'ic_design_general_section_callback',
            'mcheckout-design'
        );

        add_settings_field(
            'ic_design_primary_color',
            __( 'Primary color' ),
            'ic_design_primary_color_callback',
            'mcheckout-design',
            'ic_design_general_section'
        );

        add_settings_field(
            'ic_design_primary_background_color',
            __( 'Primary background color' ),
            'ic_design_primary_background_color_callback',
            'mcheckout-design',
            'ic_design_general_section'
        );

        add_settings_field(
            'ic_design_primary_text_color',
            __( 'Primary text color' ),
            'ic_design_primary_text_color_callback',
            'mcheckout-design',
            'ic_design_general_section'
        );

        add_settings_field(
            'ic_design_corner_radius',
            __( 'Corner radius' ),
            'ic_design_corner_radius_callback',
            'mcheckout-design',
            'ic_design_general_section'
        );

        add_settings_field(
          'ic_design_corner_radius_px',
          __( '' ),
          'ic_checkout_corner_radius_px_callback',
          'mcheckout-design',
            'ic_design_general_section'
        );

        add_settings_field(
            'ic_design_typography',
            __( 'Typography' ),
            'ic_design_typography_callback',
            'mcheckout-design',
            'ic_design_general_section'
        );

        add_settings_field(
            'ic_design_font',
            __( 'Font family' ),
            'ic_design_font_callback',
            'mcheckout-design',
            'ic_design_general_section'
        );

        add_settings_field(
            'ic_design_font_weight',
            __( 'Font weight & style' ),
            'ic_design_font_weight_callback',
            'mcheckout-design',
            'ic_design_general_section'
        );

        add_settings_field(
            'ic_design_font_subsets',
            __( 'Font subsets' ),
            'ic_design_font_subsets_callback',
            'mcheckout-design',
            'ic_design_general_section'
        );

        add_settings_field(
            'ic_design_secondary_background_color',
            __( 'Secondary background color' ),
            'ic_design_secondary_background_color_callback',
            'mcheckout-design',
            'ic_design_general_section'
        );

        add_settings_field(
            'ic_design_custom_accent_color',
            __( 'Custom accent color' ),
            'ic_design_custom_accent_color_callback',
            'mcheckout-design',
            'ic_design_general_section'
        );

        add_settings_field(
            'ic_design_custom_error_color',
            __( 'Custom error color' ),
            'ic_design_custom_error_color_callback',
            'mcheckout-design',
            'ic_design_general_section'
        );

        add_settings_field(
            'ic_design_primary_buttons_background_color',
            __( 'Primary buttons background color' ),
            'ic_design_primary_buttons_background_color_callback',
            'mcheckout-design',
            'ic_design_general_section'
        );

        add_settings_field(
            'ic_design_secondary_buttons_background_color',
            __( 'Secondary buttons background Color' ),
            'ic_design_secondary_buttons_background_color_callback',
            'mcheckout-design',
            'ic_design_general_section'
        );

        add_settings_field(
            'ic_design_input_field_background_color',
            __( 'Input field background color' ),
            'ic_design_input_field_background_color_callback',
            'mcheckout-design',
            'ic_design_general_section'
        );

        add_settings_field(
            'ic_design_input_field_text_color',
            __( 'Input field text color' ),
            'ic_design_input_field_text_color_callback',
            'mcheckout-design',
            'ic_design_general_section'
        );

        add_settings_field(
            'ic_design_border_color',
            __( 'Border color' ),
            'ic_design_border_color_callback',
            'mcheckout-design',
            'ic_design_general_section'
        );

        add_settings_field(
            'ic_quantity_circle_color',
            __( 'Quantity circle color' ),
            'ic_quantity_circle_color_callback',
            'mcheckout-design',
            'ic_design_general_section'
        );

        add_settings_field(
            'ic_quantity_circle_background_color',
            __( 'Quantity circle background color' ),
            'ic_quantity_circle_background_color_callback',
            'mcheckout-design',
            'ic_design_general_section'
        );

        add_settings_field(
            'ic_minicart_message_color',
            __( 'Mini cart message color' ),
            'ic_minicart_message_color_callback',
            'mcheckout-design',
            'ic_design_general_section'
        );

        add_settings_field(
            'ic_minicart_message_background_color',
            __( 'Mini cart message background color' ),
            'ic_minicart_message_background_color_callback',
            'mcheckout-design',
            'ic_design_general_section'
        );

        add_settings_field(
            'ic_input_outline_color',
            __( 'Input outline color' ),
            'ic_input_outline_color_callback',
            'mcheckout-design',
            'ic_design_general_section'
        );

        add_settings_field(
            'ic_secondary_text_color',
            __( 'Secondary text color' ),
            'ic_design_secondary_text_color_callback',
            'mcheckout-design',
            'ic_design_general_section'
        );

        add_settings_field(
            'ic_design_tertiary_text_color',
            __( 'Tertiary text color' ),
            'ic_design_tertiary_text_color_callback',
            'mcheckout-design',
            'ic_design_general_section'
        );

        add_settings_field(
            'ic_design_primary_buttons_text_color',
            __( 'Primary buttons text color' ),
            'ic_design_primary_buttons_text_color_callback',
            'mcheckout-design',
            'ic_design_general_section'
        );

        add_settings_field(
            'ic_design_secondary_buttons_text_color',
            __( 'Secondary buttons text color' ),
            'ic_design_secondary_buttons_text_color_callback',
            'mcheckout-design',
            'ic_design_general_section'
        );

        // Design Checkout
        add_settings_section(
            'ic_design_checkout_section',
            __( '', IC_TD ),
            'ic_design_checkout_section_callback',
            'mcheckout-design'
        );

        add_settings_field(
            'ic_checkout_layout',
            __( 'Templates', IC_TD ),
            'ic_checkout_layout_callback',
            'mcheckout-design',
            'ic_design_checkout_section'
        );

        add_settings_field(
            'ic_checkout_logo',
            __( 'Website Logo
                        <div class="ic-info-box-design">
                            <svg class="ic-info-button-design-logo" width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                 <g clip-path="url(#clip0_710_19499)">
                                     <path d="M4.545 4.5C4.66255 4.16583 4.89458 3.88405 5.19998 3.70457C5.50538 3.52508 5.86445 3.45947 6.21359 3.51936C6.56273 3.57924 6.87941 3.76076 7.10754 4.03176C7.33567 4.30277 7.46053 4.64576 7.46 5C7.46 6 5.96 6.5 5.96 6.5M6 8.5H6.005M11 6C11 8.76142 8.76142 11 6 11C3.23858 11 1 8.76142 1 6C1 3.23858 3.23858 1 6 1C8.76142 1 11 3.23858 11 6Z" stroke="#98A2B3" stroke-linecap="round" stroke-linejoin="round"/>
                                 </g>
                                 <defs>
                                      <clipPath id="clip0_710_19499">
                                             <rect width="12" height="12" fill="white"/>
                                      </clipPath>
                                 </defs>
                            </svg>
                            <div class="ic-info-text-design-logo">
                            Upload the logo that you want to display on your checkout page.
                            </div>
                        </div>' ),
            'ic_checkout_logo_callback',
            'mcheckout-design',
            'ic_design_checkout_section'
        );

        add_settings_field(
            'ic_checkout_logo_height_desktop',
            __( 'Logo Height
            <div class="ic-info-box-design">
                            <svg class="ic-info-button-design-logo-height" width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                 <g clip-path="url(#clip0_710_19499)">
                                     <path d="M4.545 4.5C4.66255 4.16583 4.89458 3.88405 5.19998 3.70457C5.50538 3.52508 5.86445 3.45947 6.21359 3.51936C6.56273 3.57924 6.87941 3.76076 7.10754 4.03176C7.33567 4.30277 7.46053 4.64576 7.46 5C7.46 6 5.96 6.5 5.96 6.5M6 8.5H6.005M11 6C11 8.76142 8.76142 11 6 11C3.23858 11 1 8.76142 1 6C1 3.23858 3.23858 1 6 1C8.76142 1 11 3.23858 11 6Z" stroke="#98A2B3" stroke-linecap="round" stroke-linejoin="round"/>
                                 </g>
                                 <defs>
                                      <clipPath id="clip0_710_19499">
                                             <rect width="12" height="12" fill="white"/>
                                      </clipPath>
                                 </defs>
                            </svg>
                            <div class="ic-info-text-design-logo-height">
                            Here, you can customize your website logo height. We suggest keeping it by default and checking if it needs optimization in real-time on your checkout page.
                            </div>
                        </div>' ),
            'ic_checkout_logo_height_desktop_callback',
            'mcheckout-design',
            'ic_design_checkout_section'
        );

        add_settings_field(
            'ic_checkout_logo_height_mobile',
            __( 'Mobile Logo Height
            <div class="ic-info-box-design">
                            <svg class="ic-info-button-design-logo-height-mobile" width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                 <g clip-path="url(#clip0_710_19499)">
                                     <path d="M4.545 4.5C4.66255 4.16583 4.89458 3.88405 5.19998 3.70457C5.50538 3.52508 5.86445 3.45947 6.21359 3.51936C6.56273 3.57924 6.87941 3.76076 7.10754 4.03176C7.33567 4.30277 7.46053 4.64576 7.46 5C7.46 6 5.96 6.5 5.96 6.5M6 8.5H6.005M11 6C11 8.76142 8.76142 11 6 11C3.23858 11 1 8.76142 1 6C1 3.23858 3.23858 1 6 1C8.76142 1 11 3.23858 11 6Z" stroke="#98A2B3" stroke-linecap="round" stroke-linejoin="round"/>
                                 </g>
                                 <defs>
                                      <clipPath id="clip0_710_19499">
                                             <rect width="12" height="12" fill="white"/>
                                      </clipPath>
                                 </defs>
                            </svg>
                            <div class="ic-info-text-design-logo-height-mobile">
                            Here, you can customize your website logo height. We suggest keeping it by default and checking if it needs optimization in real-time on your checkout page.
                            </div>
                        </div>' ),
            'ic_checkout_logo_height_mobile_callback',
            'mcheckout-design',
            'ic_design_checkout_section'
        );

        add_settings_field(
            'ic_checkout_rp',
            __( 'Returns Policy URL
            <div class="ic-info-box-design">
                            <svg class="ic-info-button-design-return-policy-url" width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                 <g clip-path="url(#clip0_710_19499)">
                                     <path d="M4.545 4.5C4.66255 4.16583 4.89458 3.88405 5.19998 3.70457C5.50538 3.52508 5.86445 3.45947 6.21359 3.51936C6.56273 3.57924 6.87941 3.76076 7.10754 4.03176C7.33567 4.30277 7.46053 4.64576 7.46 5C7.46 6 5.96 6.5 5.96 6.5M6 8.5H6.005M11 6C11 8.76142 8.76142 11 6 11C3.23858 11 1 8.76142 1 6C1 3.23858 3.23858 1 6 1C8.76142 1 11 3.23858 11 6Z" stroke="#98A2B3" stroke-linecap="round" stroke-linejoin="round"/>
                                 </g>
                                 <defs>
                                      <clipPath id="clip0_710_19499">
                                             <rect width="12" height="12" fill="white"/>
                                      </clipPath>
                                 </defs>
                            </svg>
                            <div class="ic-info-text-design-return-policy-url">
                            Include the URL of the Returns Policy page that will be linked on your checkout page.
                            </div>
                        </div>' ),
            'ic_checkout_rp_callback',
            'mcheckout-design',
            'ic_design_checkout_section'
        );

        add_settings_field(
            'ic_checkout_pp',
            __( 'Privacy Policy
            <div class="ic-info-box-design">
                            <svg class="ic-info-button-design-privacy-policy-url" width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                 <g clip-path="url(#clip0_710_19499)">
                                     <path d="M4.545 4.5C4.66255 4.16583 4.89458 3.88405 5.19998 3.70457C5.50538 3.52508 5.86445 3.45947 6.21359 3.51936C6.56273 3.57924 6.87941 3.76076 7.10754 4.03176C7.33567 4.30277 7.46053 4.64576 7.46 5C7.46 6 5.96 6.5 5.96 6.5M6 8.5H6.005M11 6C11 8.76142 8.76142 11 6 11C3.23858 11 1 8.76142 1 6C1 3.23858 3.23858 1 6 1C8.76142 1 11 3.23858 11 6Z" stroke="#98A2B3" stroke-linecap="round" stroke-linejoin="round"/>
                                 </g>
                                 <defs>
                                      <clipPath id="clip0_710_19499">
                                             <rect width="12" height="12" fill="white"/>
                                      </clipPath>
                                 </defs>
                            </svg>
                            <div class="ic-info-text-design-privacy-policy-url">
                            Include the URL of the Privacy Policy page that will be linked on your checkout page.                            
                            </div>
                        </div>' ),
            'ic_checkout_pp_callback',
            'mcheckout-design',
            'ic_design_checkout_section'
        );

        add_settings_field(
            'ic_checkout_tac',
            __( 'Terms and Conditions URL
            <div class="ic-info-box-design">
                            <svg class="ic-info-button-design-terms-conditions-url" width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                 <g clip-path="url(#clip0_710_19499)">
                                     <path d="M4.545 4.5C4.66255 4.16583 4.89458 3.88405 5.19998 3.70457C5.50538 3.52508 5.86445 3.45947 6.21359 3.51936C6.56273 3.57924 6.87941 3.76076 7.10754 4.03176C7.33567 4.30277 7.46053 4.64576 7.46 5C7.46 6 5.96 6.5 5.96 6.5M6 8.5H6.005M11 6C11 8.76142 8.76142 11 6 11C3.23858 11 1 8.76142 1 6C1 3.23858 3.23858 1 6 1C8.76142 1 11 3.23858 11 6Z" stroke="#98A2B3" stroke-linecap="round" stroke-linejoin="round"/>
                                 </g>
                                 <defs>
                                      <clipPath id="clip0_710_19499">
                                             <rect width="12" height="12" fill="white"/>
                                      </clipPath>
                                 </defs>
                            </svg>
                            <div class="ic-info-text-design-terms-conditions-url">
                            Include the URL of the Terms and Conditions page that will be linked on your checkout page.
                            </div>
            </div>' ),
            'ic_checkout_tac_callback',
            'mcheckout-design',
            'ic_design_checkout_section'
        );

        add_settings_field(
            'ic_checkout_phone',
            __( 'Require a phone number at checkout
            <div class="ic-info-box-design">
                            <svg class="ic-info-button-design-require-phone-checkout" width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                 <g clip-path="url(#clip0_710_19499)">
                                     <path d="M4.545 4.5C4.66255 4.16583 4.89458 3.88405 5.19998 3.70457C5.50538 3.52508 5.86445 3.45947 6.21359 3.51936C6.56273 3.57924 6.87941 3.76076 7.10754 4.03176C7.33567 4.30277 7.46053 4.64576 7.46 5C7.46 6 5.96 6.5 5.96 6.5M6 8.5H6.005M11 6C11 8.76142 8.76142 11 6 11C3.23858 11 1 8.76142 1 6C1 3.23858 3.23858 1 6 1C8.76142 1 11 3.23858 11 6Z" stroke="#98A2B3" stroke-linecap="round" stroke-linejoin="round"/>
                                 </g>
                                 <defs>
                                      <clipPath id="clip0_710_19499">
                                             <rect width="12" height="12" fill="white"/>
                                      </clipPath>
                                 </defs>
                            </svg>
                            <div class="ic-info-text-design-require-phone-checkout">
                            Choose if you wish to require a phone number during checkout. If you select this field, the “Show phone number field at checkout” will switch ON automatically in order to be shown on the checkout page.
                            </div>
            </div>' ),
            'ic_checkout_phone_callback',
            'mcheckout-design',
            'ic_design_checkout_section'
        );

        add_settings_field(
            'ic_checkout_address',
            __( 'Require an address number in the address field
            <div class="ic-info-box-design">
                            <svg class="ic-info-button-design-require-address-number" width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                 <g clip-path="url(#clip0_710_19499)">
                                     <path d="M4.545 4.5C4.66255 4.16583 4.89458 3.88405 5.19998 3.70457C5.50538 3.52508 5.86445 3.45947 6.21359 3.51936C6.56273 3.57924 6.87941 3.76076 7.10754 4.03176C7.33567 4.30277 7.46053 4.64576 7.46 5C7.46 6 5.96 6.5 5.96 6.5M6 8.5H6.005M11 6C11 8.76142 8.76142 11 6 11C3.23858 11 1 8.76142 1 6C1 3.23858 3.23858 1 6 1C8.76142 1 11 3.23858 11 6Z" stroke="#98A2B3" stroke-linecap="round" stroke-linejoin="round"/>
                                 </g>
                                 <defs>
                                      <clipPath id="clip0_710_19499">
                                             <rect width="12" height="12" fill="white"/>
                                      </clipPath>
                                 </defs>
                            </svg>
                            <div class="ic-info-text-design-require-address-number">
                            Choose if you wish to require an address number in the address field during checkout. If this button is switched OFF, the customers won’t need to enter their apartment numbers, and vice versa.
                            </div>
            </div>' ),
            'ic_checkout_address_callback',
            'mcheckout-design',
            'ic_design_checkout_section'
        );

        add_settings_field(
            'ic_checkout_email',
            __( 'Pre-check email marketing checkbox
            <div class="ic-info-box-design">
                            <svg class="ic-info-button-design-precheck-email-marketing" width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                 <g clip-path="url(#clip0_710_19499)">
                                     <path d="M4.545 4.5C4.66255 4.16583 4.89458 3.88405 5.19998 3.70457C5.50538 3.52508 5.86445 3.45947 6.21359 3.51936C6.56273 3.57924 6.87941 3.76076 7.10754 4.03176C7.33567 4.30277 7.46053 4.64576 7.46 5C7.46 6 5.96 6.5 5.96 6.5M6 8.5H6.005M11 6C11 8.76142 8.76142 11 6 11C3.23858 11 1 8.76142 1 6C1 3.23858 3.23858 1 6 1C8.76142 1 11 3.23858 11 6Z" stroke="#98A2B3" stroke-linecap="round" stroke-linejoin="round"/>
                                 </g>
                                 <defs>
                                      <clipPath id="clip0_710_19499">
                                             <rect width="12" height="12" fill="white"/>
                                      </clipPath>
                                 </defs>
                            </svg>
                            <div class="ic-info-text-design-precheck-email-marketing">
                            Choose if you wish to pre-check an email marketing checkbox during checkout.
                            </div>
            </div>' ),
            'ic_checkout_email_callback',
            'mcheckout-design',
            'ic_design_checkout_section'
        );

        add_settings_field(
            'ic_checkout_powered',
            __( 'Display "Powered by mCheckout" on the checkout page
            <div class="ic-info-box-design">
                            <svg class="ic-info-button-design-display-powered-by" width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                 <g clip-path="url(#clip0_710_19499)">
                                     <path d="M4.545 4.5C4.66255 4.16583 4.89458 3.88405 5.19998 3.70457C5.50538 3.52508 5.86445 3.45947 6.21359 3.51936C6.56273 3.57924 6.87941 3.76076 7.10754 4.03176C7.33567 4.30277 7.46053 4.64576 7.46 5C7.46 6 5.96 6.5 5.96 6.5M6 8.5H6.005M11 6C11 8.76142 8.76142 11 6 11C3.23858 11 1 8.76142 1 6C1 3.23858 3.23858 1 6 1C8.76142 1 11 3.23858 11 6Z" stroke="#98A2B3" stroke-linecap="round" stroke-linejoin="round"/>
                                 </g>
                                 <defs>
                                      <clipPath id="clip0_710_19499">
                                             <rect width="12" height="12" fill="white"/>
                                      </clipPath>
                                 </defs>
                            </svg>
                            <div class="ic-info-text-design-display-powered-by">
                            Choose if you wish to display “Powered by mCheckout” at the bottom of your checkout page. The core functionality of mCheckout will be free forever. You can support ongoing development and new updates by showing “Powered by mCheckout” on your checkout page.
                            </div>
            </div>' ),
            'ic_checkout_powered_callback',
            'mcheckout-design',
            'ic_design_checkout_section'
        );

        add_settings_field(
            'ic_checkout_show_phone_number_field',
            __( 'Show phone number field at checkout
            <div class="ic-info-box-design">
                            <svg class="ic-info-button-design-show-phone-checkout" width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                 <g clip-path="url(#clip0_710_19499)">
                                     <path d="M4.545 4.5C4.66255 4.16583 4.89458 3.88405 5.19998 3.70457C5.50538 3.52508 5.86445 3.45947 6.21359 3.51936C6.56273 3.57924 6.87941 3.76076 7.10754 4.03176C7.33567 4.30277 7.46053 4.64576 7.46 5C7.46 6 5.96 6.5 5.96 6.5M6 8.5H6.005M11 6C11 8.76142 8.76142 11 6 11C3.23858 11 1 8.76142 1 6C1 3.23858 3.23858 1 6 1C8.76142 1 11 3.23858 11 6Z" stroke="#98A2B3" stroke-linecap="round" stroke-linejoin="round"/>
                                 </g>
                                 <defs>
                                      <clipPath id="clip0_710_19499">
                                             <rect width="12" height="12" fill="white"/>
                                      </clipPath>
                                 </defs>
                            </svg>
                            <div class="ic-info-text-design-show-phone-checkout">
                            Choose if you wish to show a phone number field during checkout. If you want to make this field required, you’ll also need to switch the <b>“Require a phone number at checkout”</b> button.
                            </div>
            </div>' ),
            'ic_checkout_show_phone_number_field_callback',
            'mcheckout-design',
            'ic_design_checkout_section'
        );

        add_settings_field(
            'ic_checkout_show_company_field',
            __( 'Show company field at checkout
            <div class="ic-info-box-design">
                            <svg class="ic-info-button-design-show-company" width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                 <g clip-path="url(#clip0_710_19499)">
                                     <path d="M4.545 4.5C4.66255 4.16583 4.89458 3.88405 5.19998 3.70457C5.50538 3.52508 5.86445 3.45947 6.21359 3.51936C6.56273 3.57924 6.87941 3.76076 7.10754 4.03176C7.33567 4.30277 7.46053 4.64576 7.46 5C7.46 6 5.96 6.5 5.96 6.5M6 8.5H6.005M11 6C11 8.76142 8.76142 11 6 11C3.23858 11 1 8.76142 1 6C1 3.23858 3.23858 1 6 1C8.76142 1 11 3.23858 11 6Z" stroke="#98A2B3" stroke-linecap="round" stroke-linejoin="round"/>
                                 </g>
                                 <defs>
                                      <clipPath id="clip0_710_19499">
                                             <rect width="12" height="12" fill="white"/>
                                      </clipPath>
                                 </defs>
                            </svg>
                            <div class="ic-info-text-design-show-company">
                            Choose if you wish to show a company field during checkout.
                            </div>
            </div>' ),
            'ic_checkout_show_company_field_callback',
            'mcheckout-design',
            'ic_design_checkout_section'
        );

        add_settings_field(
            'ic_checkout_show_apartment_field',
            __( 'Show apartment, suite, unit field at checkout
            <div class="ic-info-box-design">
                            <svg class="ic-info-button-design-show-apartment" width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                 <g clip-path="url(#clip0_710_19499)">
                                     <path d="M4.545 4.5C4.66255 4.16583 4.89458 3.88405 5.19998 3.70457C5.50538 3.52508 5.86445 3.45947 6.21359 3.51936C6.56273 3.57924 6.87941 3.76076 7.10754 4.03176C7.33567 4.30277 7.46053 4.64576 7.46 5C7.46 6 5.96 6.5 5.96 6.5M6 8.5H6.005M11 6C11 8.76142 8.76142 11 6 11C3.23858 11 1 8.76142 1 6C1 3.23858 3.23858 1 6 1C8.76142 1 11 3.23858 11 6Z" stroke="#98A2B3" stroke-linecap="round" stroke-linejoin="round"/>
                                 </g>
                                 <defs>
                                      <clipPath id="clip0_710_19499">
                                             <rect width="12" height="12" fill="white"/>
                                      </clipPath>
                                 </defs>
                            </svg>
                            <div class="ic-info-text-design-show-apartment">
                            Choose if you wish to show the “apartment, suite, and unit” field during checkout.
                            </div>
            </div>' ),
            'ic_checkout_show_apartment_field_callback',
            'mcheckout-design',
            'ic_design_checkout_section'
        );

        add_settings_field(
            'ic_checkout_discount',
            __( 'Display discount code field outside the shopping card on mobile' ),
            'ic_checkout_discount_callback',
            'mcheckout-design',
            'ic_design_checkout_section'
        );

        // Design Mini Cart
        add_settings_section(
            'ic_design_mini_cart_section',
            __( '', IC_TD ),
            'ic_design_mini_cart_section_callback',
            'mcheckout-design'
        );

        add_settings_field(
            'ic_mini_cart_enable',
            __( 'Enable Mini cart
            <div class="ic-info-box-design">
                            <svg class="ic-info-button-enable-mc" width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                 <g clip-path="url(#clip0_710_19499)">
                                     <path d="M4.545 4.5C4.66255 4.16583 4.89458 3.88405 5.19998 3.70457C5.50538 3.52508 5.86445 3.45947 6.21359 3.51936C6.56273 3.57924 6.87941 3.76076 7.10754 4.03176C7.33567 4.30277 7.46053 4.64576 7.46 5C7.46 6 5.96 6.5 5.96 6.5M6 8.5H6.005M11 6C11 8.76142 8.76142 11 6 11C3.23858 11 1 8.76142 1 6C1 3.23858 3.23858 1 6 1C8.76142 1 11 3.23858 11 6Z" stroke="#98A2B3" stroke-linecap="round" stroke-linejoin="round"/>
                                 </g>
                                 <defs>
                                      <clipPath id="clip0_710_19499">
                                             <rect width="12" height="12" fill="white"/>
                                      </clipPath>
                                 </defs>
                            </svg>
                            <div class="ic-info-text-design-enable-mc">
                            Switch this option ON to enable the mCheckout’s Mini Cart option. If you disable this, the mini-cart option will stop working on the front end of your website, and none of the changes within the “Mini cart” section will be visible.<b> Note:</b> <i>Ensure you disable all the other mini-cart plugins or sections within your website theme before you activate this option, as it may cause conflicts on the front end.</i>
                            </div>
            </div>' ),
            'ic_mini_cart_enable_callback',
            'mcheckout-design',
            'ic_design_mini_cart_section'
        );

        add_settings_field(
            'ic_mini_cart_floating_enable',
            __( 'Enable Floating Mini cart
            <div class="ic-info-box-design">
                            <svg class="ic-info-button-enable-floating-mc" width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                 <g clip-path="url(#clip0_710_19499)">
                                     <path d="M4.545 4.5C4.66255 4.16583 4.89458 3.88405 5.19998 3.70457C5.50538 3.52508 5.86445 3.45947 6.21359 3.51936C6.56273 3.57924 6.87941 3.76076 7.10754 4.03176C7.33567 4.30277 7.46053 4.64576 7.46 5C7.46 6 5.96 6.5 5.96 6.5M6 8.5H6.005M11 6C11 8.76142 8.76142 11 6 11C3.23858 11 1 8.76142 1 6C1 3.23858 3.23858 1 6 1C8.76142 1 11 3.23858 11 6Z" stroke="#98A2B3" stroke-linecap="round" stroke-linejoin="round"/>
                                 </g>
                                 <defs>
                                      <clipPath id="clip0_710_19499">
                                             <rect width="12" height="12" fill="white"/>
                                      </clipPath>
                                 </defs>
                            </svg>
                            <div class="ic-info-text-design-enable-floating-mc">
                            Switch this option ON to enable the mCheckout’s Floating Mini Cart. If you disable this and leave the mini-cart active, the mini-cart option will work on the front end of your website, but you won’t have a floating mini-cart. This can help potential customers navigate easier and faster through the buying process. <b>Note:</b> <i>Ensure it’s not intertwined with your flying chat or help center option.</i>
                            </div>
            </div>' ),
            'ic_mini_cart_floating_enable_callback',
            'mcheckout-design',
            'ic_design_mini_cart_section'
        );

        add_settings_field(
            'ic_mini_cart_messages',
            __( 'Enable messages
            <div class="ic-info-box-design">
                            <svg class="ic-info-button-enable-messages" width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                 <g clip-path="url(#clip0_710_19499)">
                                     <path d="M4.545 4.5C4.66255 4.16583 4.89458 3.88405 5.19998 3.70457C5.50538 3.52508 5.86445 3.45947 6.21359 3.51936C6.56273 3.57924 6.87941 3.76076 7.10754 4.03176C7.33567 4.30277 7.46053 4.64576 7.46 5C7.46 6 5.96 6.5 5.96 6.5M6 8.5H6.005M11 6C11 8.76142 8.76142 11 6 11C3.23858 11 1 8.76142 1 6C1 3.23858 3.23858 1 6 1C8.76142 1 11 3.23858 11 6Z" stroke="#98A2B3" stroke-linecap="round" stroke-linejoin="round"/>
                                 </g>
                                 <defs>
                                      <clipPath id="clip0_710_19499">
                                             <rect width="12" height="12" fill="white"/>
                                      </clipPath>
                                 </defs>
                            </svg>
                            <div class="ic-info-text-design-enable-messages">
                            Switch this option ON to enable messages on the mCheckout’s Mini Cart. If you disable this option, none of the messages below will be visible on your Mini-cart.
                            </div>
            </div>' ),
            'ic_mini_cart_messages_callback',
            'mcheckout-design',
            'ic_design_mini_cart_section'
        );

        add_settings_field(
            'ic_mini_cart_shipping_message',
            __( 'Shipping Message
            <div class="ic-info-box-design">
                            <svg class="ic-info-button-shipping-message" width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                 <g clip-path="url(#clip0_710_19499)">
                                     <path d="M4.545 4.5C4.66255 4.16583 4.89458 3.88405 5.19998 3.70457C5.50538 3.52508 5.86445 3.45947 6.21359 3.51936C6.56273 3.57924 6.87941 3.76076 7.10754 4.03176C7.33567 4.30277 7.46053 4.64576 7.46 5C7.46 6 5.96 6.5 5.96 6.5M6 8.5H6.005M11 6C11 8.76142 8.76142 11 6 11C3.23858 11 1 8.76142 1 6C1 3.23858 3.23858 1 6 1C8.76142 1 11 3.23858 11 6Z" stroke="#98A2B3" stroke-linecap="round" stroke-linejoin="round"/>
                                 </g>
                                 <defs>
                                      <clipPath id="clip0_710_19499">
                                             <rect width="12" height="12" fill="white"/>
                                      </clipPath>
                                 </defs>
                            </svg>
                            <div class="ic-info-text-design-shipping-message">
                            The text you want to display at the top of the mini-cart. You can use this section to motivate customers to increase their cart value to get free shipping or motivate them to finish the purchase.<i> E.g. 20% discount on all orders over $99!</i> 🎉
                            </div>
            </div>' ),
            'ic_mini_cart_shipping_message_callback',
            'mcheckout-design',
            'ic_design_mini_cart_section'
        );

        add_settings_field(
            'ic_mini_cart_bottom_message',
            __( 'Bottom Message
            <div class="ic-info-box-design">
                            <svg class="ic-info-button-bottom-message" width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                 <g clip-path="url(#clip0_710_19499)">
                                     <path d="M4.545 4.5C4.66255 4.16583 4.89458 3.88405 5.19998 3.70457C5.50538 3.52508 5.86445 3.45947 6.21359 3.51936C6.56273 3.57924 6.87941 3.76076 7.10754 4.03176C7.33567 4.30277 7.46053 4.64576 7.46 5C7.46 6 5.96 6.5 5.96 6.5M6 8.5H6.005M11 6C11 8.76142 8.76142 11 6 11C3.23858 11 1 8.76142 1 6C1 3.23858 3.23858 1 6 1C8.76142 1 11 3.23858 11 6Z" stroke="#98A2B3" stroke-linecap="round" stroke-linejoin="round"/>
                                 </g>
                                 <defs>
                                      <clipPath id="clip0_710_19499">
                                             <rect width="12" height="12" fill="white"/>
                                      </clipPath>
                                 </defs>
                            </svg>
                            <div class="ic-info-text-design-bottom-message">
                            The text you want to display at the bottom of the mini-cart.
                            </div>
            </div>' ),
            'ic_mini_cart_bottom_message_callback',
            'mcheckout-design',
            'ic_design_mini_cart_section'
        );

        add_settings_field(
            'ic_mini_cart_enable_coupons',
            __( 'Enable Coupons
            <div class="ic-info-box-design">
                            <svg class="ic-info-button-enable-coupons" width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                 <g clip-path="url(#clip0_710_19499)">
                                     <path d="M4.545 4.5C4.66255 4.16583 4.89458 3.88405 5.19998 3.70457C5.50538 3.52508 5.86445 3.45947 6.21359 3.51936C6.56273 3.57924 6.87941 3.76076 7.10754 4.03176C7.33567 4.30277 7.46053 4.64576 7.46 5C7.46 6 5.96 6.5 5.96 6.5M6 8.5H6.005M11 6C11 8.76142 8.76142 11 6 11C3.23858 11 1 8.76142 1 6C1 3.23858 3.23858 1 6 1C8.76142 1 11 3.23858 11 6Z" stroke="#98A2B3" stroke-linecap="round" stroke-linejoin="round"/>
                                 </g>
                                 <defs>
                                      <clipPath id="clip0_710_19499">
                                             <rect width="12" height="12" fill="white"/>
                                      </clipPath>
                                 </defs>
                            </svg>
                            <div class="ic-info-text-design-enable-coupons">
                            Switch this option ON to enable the Coupon code field within your Mini Cart section. Switch OFF to deactivate it.
                            </div>
            </div>' ),
            'ic_mini_cart_enable_coupons_callback',
            'mcheckout-design',
            'ic_design_mini_cart_section'
        );

        add_settings_field(
            'ic_mini_cart_recommendations',
            __( 'Enable Recommendations on Mini Cart
            <div class="ic-info-box-design">
                            <svg class="ic-info-button-enable-recommendations" width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                 <g clip-path="url(#clip0_710_19499)">
                                     <path d="M4.545 4.5C4.66255 4.16583 4.89458 3.88405 5.19998 3.70457C5.50538 3.52508 5.86445 3.45947 6.21359 3.51936C6.56273 3.57924 6.87941 3.76076 7.10754 4.03176C7.33567 4.30277 7.46053 4.64576 7.46 5C7.46 6 5.96 6.5 5.96 6.5M6 8.5H6.005M11 6C11 8.76142 8.76142 11 6 11C3.23858 11 1 8.76142 1 6C1 3.23858 3.23858 1 6 1C8.76142 1 11 3.23858 11 6Z" stroke="#98A2B3" stroke-linecap="round" stroke-linejoin="round"/>
                                 </g>
                                 <defs>
                                      <clipPath id="clip0_710_19499">
                                             <rect width="12" height="12" fill="white"/>
                                      </clipPath>
                                 </defs>
                            </svg>
                            <div class="ic-info-text-design-enable-recommendations">
                            Switch this option ON to enable the Product Recommendations on your Mini Cart. Switch OFF to deactivate it.
                            </div>
            </div>' ),
            'ic_mini_cart_recommendations_callback',
            'mcheckout-design',
            'ic_design_mini_cart_section'
        );

        add_settings_field(
            'ic_mini_cart_recommendations_title',
            __( 'Recommendations Title
            <div class="ic-info-box-design">
                            <svg class="ic-info-button-recommendation-title" width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                 <g clip-path="url(#clip0_710_19499)">
                                     <path d="M4.545 4.5C4.66255 4.16583 4.89458 3.88405 5.19998 3.70457C5.50538 3.52508 5.86445 3.45947 6.21359 3.51936C6.56273 3.57924 6.87941 3.76076 7.10754 4.03176C7.33567 4.30277 7.46053 4.64576 7.46 5C7.46 6 5.96 6.5 5.96 6.5M6 8.5H6.005M11 6C11 8.76142 8.76142 11 6 11C3.23858 11 1 8.76142 1 6C1 3.23858 3.23858 1 6 1C8.76142 1 11 3.23858 11 6Z" stroke="#98A2B3" stroke-linecap="round" stroke-linejoin="round"/>
                                 </g>
                                 <defs>
                                      <clipPath id="clip0_710_19499">
                                             <rect width="12" height="12" fill="white"/>
                                      </clipPath>
                                 </defs>
                            </svg>
                            <div class="ic-info-text-design-recommendation-title">
                            The text you want to display as a recommendations title within the mini cart.
                            </div>
            </div>' ),
            'ic_mini_cart_recommendations_title_callback',
            'mcheckout-design',
            'ic_design_mini_cart_section'
        );

        add_settings_field(
                'ic_mini_cart_recommendations_type',
            __( 'Recommendations Type
            <div class="ic-info-box-design">
                            <svg class="ic-info-button-recommendation-type" width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                 <g clip-path="url(#clip0_710_19499)">
                                     <path d="M4.545 4.5C4.66255 4.16583 4.89458 3.88405 5.19998 3.70457C5.50538 3.52508 5.86445 3.45947 6.21359 3.51936C6.56273 3.57924 6.87941 3.76076 7.10754 4.03176C7.33567 4.30277 7.46053 4.64576 7.46 5C7.46 6 5.96 6.5 5.96 6.5M6 8.5H6.005M11 6C11 8.76142 8.76142 11 6 11C3.23858 11 1 8.76142 1 6C1 3.23858 3.23858 1 6 1C8.76142 1 11 3.23858 11 6Z" stroke="#98A2B3" stroke-linecap="round" stroke-linejoin="round"/>
                                 </g>
                                 <defs>
                                      <clipPath id="clip0_710_19499">
                                             <rect width="12" height="12" fill="white"/>
                                      </clipPath>
                                 </defs>
                            </svg>
                            <div class="ic-info-text-design-recommendation-type">
                            Select a product or a group of products that you want to recommend. You can choose between three options:
                            <ul>
                                <li><strong>Upsells</strong> - will trigger the upsells that you have created within the "Upsells" section based on the customer\'s cart.</li>
                                <li><strong>Custom product</strong> - will display the specific product of your choice (if you want to offer only one specific product, e.g., digital product or guarantee paper).</li>
                                <li><strong>Show random products</strong> - will display a random product within the recommendation section.</li>
                            </ul>
                           </div>
            </div>' ),
            'ic_mini_cart_recommendations_type_callback',
            'mcheckout-design',
            'ic_design_mini_cart_section'
        );

        add_settings_field(
            'ic_mini_cart_primary_button',
            __( 'Primary Button
            <div class="ic-info-box-design">
                            <svg class="ic-info-button-primary-button" width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                 <g clip-path="url(#clip0_710_19499)">
                                     <path d="M4.545 4.5C4.66255 4.16583 4.89458 3.88405 5.19998 3.70457C5.50538 3.52508 5.86445 3.45947 6.21359 3.51936C6.56273 3.57924 6.87941 3.76076 7.10754 4.03176C7.33567 4.30277 7.46053 4.64576 7.46 5C7.46 6 5.96 6.5 5.96 6.5M6 8.5H6.005M11 6C11 8.76142 8.76142 11 6 11C3.23858 11 1 8.76142 1 6C1 3.23858 3.23858 1 6 1C8.76142 1 11 3.23858 11 6Z" stroke="#98A2B3" stroke-linecap="round" stroke-linejoin="round"/>
                                 </g>
                                 <defs>
                                      <clipPath id="clip0_710_19499">
                                             <rect width="12" height="12" fill="white"/>
                                      </clipPath>
                                 </defs>
                            </svg>
                            <div class="ic-info-text-design-primary-button">
                            The text you want to display within the primary “Purchase” button within the mini cart.
                            </div>
            </div>' ),
            'ic_mini_cart_primary_button_callback',
            'mcheckout-design',
            'ic_design_mini_cart_section'
        );

        add_settings_field(
            'ic_mini_cart_enable_secondary_button',
            __( 'Enable Secondary Button
            <div class="ic-info-box-design">
                            <svg class="ic-info-button-enable-secondary-button" width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                 <g clip-path="url(#clip0_710_19499)">
                                     <path d="M4.545 4.5C4.66255 4.16583 4.89458 3.88405 5.19998 3.70457C5.50538 3.52508 5.86445 3.45947 6.21359 3.51936C6.56273 3.57924 6.87941 3.76076 7.10754 4.03176C7.33567 4.30277 7.46053 4.64576 7.46 5C7.46 6 5.96 6.5 5.96 6.5M6 8.5H6.005M11 6C11 8.76142 8.76142 11 6 11C3.23858 11 1 8.76142 1 6C1 3.23858 3.23858 1 6 1C8.76142 1 11 3.23858 11 6Z" stroke="#98A2B3" stroke-linecap="round" stroke-linejoin="round"/>
                                 </g>
                                 <defs>
                                      <clipPath id="clip0_710_19499">
                                             <rect width="12" height="12" fill="white"/>
                                      </clipPath>
                                 </defs>
                            </svg>
                            <div class="ic-info-text-design-enable-secondary-button">
                            Switch this option ON to enable the Secondary Button on your Mini Cart. Switch OFF to deactivate it.
                            </div>
            </div>' ),
            'ic_mini_cart_enable_secondary_button_callback',
            'mcheckout-design',
            'ic_design_mini_cart_section'
        );

        add_settings_field(
            'ic_mini_cart_secondary_button',
            __( 'Secondary Button
            <div class="ic-info-box-design">
                            <svg class="ic-info-button-secondary-button" width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                 <g clip-path="url(#clip0_710_19499)">
                                     <path d="M4.545 4.5C4.66255 4.16583 4.89458 3.88405 5.19998 3.70457C5.50538 3.52508 5.86445 3.45947 6.21359 3.51936C6.56273 3.57924 6.87941 3.76076 7.10754 4.03176C7.33567 4.30277 7.46053 4.64576 7.46 5C7.46 6 5.96 6.5 5.96 6.5M6 8.5H6.005M11 6C11 8.76142 8.76142 11 6 11C3.23858 11 1 8.76142 1 6C1 3.23858 3.23858 1 6 1C8.76142 1 11 3.23858 11 6Z" stroke="#98A2B3" stroke-linecap="round" stroke-linejoin="round"/>
                                 </g>
                                 <defs>
                                      <clipPath id="clip0_710_19499">
                                             <rect width="12" height="12" fill="white"/>
                                      </clipPath>
                                 </defs>
                            </svg>
                            <div class="ic-info-text-design-secondary-button">
                            The text you want to display within the secondary “Shop” button within the mini cart.
                            </div>
            </div>' ),
            'ic_mini_cart_secondary_button_callback',
            'mcheckout-design',
            'ic_design_mini_cart_section'
        );

        add_settings_field(
            'ic_mini_cart_enable_progress',
            __( 'Enable Progressbar
            <div class="ic-info-box-design">
                            <svg class="ic-info-button-enable-coupons" width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                 <g clip-path="url(#clip0_710_19499)">
                                     <path d="M4.545 4.5C4.66255 4.16583 4.89458 3.88405 5.19998 3.70457C5.50538 3.52508 5.86445 3.45947 6.21359 3.51936C6.56273 3.57924 6.87941 3.76076 7.10754 4.03176C7.33567 4.30277 7.46053 4.64576 7.46 5C7.46 6 5.96 6.5 5.96 6.5M6 8.5H6.005M11 6C11 8.76142 8.76142 11 6 11C3.23858 11 1 8.76142 1 6C1 3.23858 3.23858 1 6 1C8.76142 1 11 3.23858 11 6Z" stroke="#98A2B3" stroke-linecap="round" stroke-linejoin="round"/>
                                 </g>
                                 <defs>
                                      <clipPath id="clip0_710_19499">
                                             <rect width="12" height="12" fill="white"/>
                                      </clipPath>
                                 </defs>
                            </svg>
                            <div class="ic-info-text-design-enable-coupons">
                            Switch this option ON to enable the Progress within your Mini Cart section. Switch OFF to deactivate it.
                            </div>
            </div>' ),
            'ic_mini_cart_enable_progressbar_callback',
            'mcheckout-design',
            'ic_design_mini_cart_section'
        );

        add_settings_field(
            'ic_mini_cart_progress_value',
            __( 'Cart Progressbar Value
            <div class="ic-info-box-design">
                            <svg class="ic-info-button-primary-button" width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                 <g clip-path="url(#clip0_710_19499)">
                                     <path d="M4.545 4.5C4.66255 4.16583 4.89458 3.88405 5.19998 3.70457C5.50538 3.52508 5.86445 3.45947 6.21359 3.51936C6.56273 3.57924 6.87941 3.76076 7.10754 4.03176C7.33567 4.30277 7.46053 4.64576 7.46 5C7.46 6 5.96 6.5 5.96 6.5M6 8.5H6.005M11 6C11 8.76142 8.76142 11 6 11C3.23858 11 1 8.76142 1 6C1 3.23858 3.23858 1 6 1C8.76142 1 11 3.23858 11 6Z" stroke="#98A2B3" stroke-linecap="round" stroke-linejoin="round"/>
                                 </g>
                                 <defs>
                                      <clipPath id="clip0_710_19499">
                                             <rect width="12" height="12" fill="white"/>
                                      </clipPath>
                                 </defs>
                            </svg>
                            <div class="ic-info-text-design-primary-button">
                            The value you want to set for free shipping method.
                            </div>
            </div>' ),
            'ic_mini_cart_progress_value_callback',
            'mcheckout-design',
            'ic_design_mini_cart_section'
        );

        // Design Thank You
        add_settings_section(
            'ic_design_ty_section',
            __( '', IC_TD ),
            'ic_design_ty_section_callback',
            'mcheckout-design'
        );

//        add_settings_field(
//            'ic_ty_enable_reviews',
//            __( 'Enable reviews' ),
//            'ic_ty_enable_reviews_callback',
//            'mcheckout-design',
//            'ic_design_ty_section'
//        );

        add_settings_field(
            'ic_ty_enable_nl',
            __( 'Enable signup to newsletter field
            <div class="ic-info-box-design">
                            <svg class="ic-info-button-enable-newsletter-signup" width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                 <g clip-path="url(#clip0_710_19499)">
                                     <path d="M4.545 4.5C4.66255 4.16583 4.89458 3.88405 5.19998 3.70457C5.50538 3.52508 5.86445 3.45947 6.21359 3.51936C6.56273 3.57924 6.87941 3.76076 7.10754 4.03176C7.33567 4.30277 7.46053 4.64576 7.46 5C7.46 6 5.96 6.5 5.96 6.5M6 8.5H6.005M11 6C11 8.76142 8.76142 11 6 11C3.23858 11 1 8.76142 1 6C1 3.23858 3.23858 1 6 1C8.76142 1 11 3.23858 11 6Z" stroke="#98A2B3" stroke-linecap="round" stroke-linejoin="round"/>
                                 </g>
                                 <defs>
                                      <clipPath id="clip0_710_19499">
                                             <rect width="12" height="12" fill="white"/>
                                      </clipPath>
                                 </defs>
                            </svg>
                            <div class="ic-info-text-design-enable-newsletter-signup">
                            Switch this option ON to show the field and enable customers to signup to your newsletter list on your “Thank you” page. Switch OFF to deactivate it.
                            </div>
            </div>' ),
            'ic_ty_enable_nl_callback',
            'mcheckout-design',
            'ic_design_ty_section'
        );

        add_settings_field(
            'ic_ty_purchase_note',
            __( 'Purchase note
            <div class="ic-info-box-design">
                            <svg class="ic-info-button-purchase-note" width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                 <g clip-path="url(#clip0_710_19499)">
                                     <path d="M4.545 4.5C4.66255 4.16583 4.89458 3.88405 5.19998 3.70457C5.50538 3.52508 5.86445 3.45947 6.21359 3.51936C6.56273 3.57924 6.87941 3.76076 7.10754 4.03176C7.33567 4.30277 7.46053 4.64576 7.46 5C7.46 6 5.96 6.5 5.96 6.5M6 8.5H6.005M11 6C11 8.76142 8.76142 11 6 11C3.23858 11 1 8.76142 1 6C1 3.23858 3.23858 1 6 1C8.76142 1 11 3.23858 11 6Z" stroke="#98A2B3" stroke-linecap="round" stroke-linejoin="round"/>
                                 </g>
                                 <defs>
                                      <clipPath id="clip0_710_19499">
                                             <rect width="12" height="12" fill="white"/>
                                      </clipPath>
                                 </defs>
                            </svg>
                            <div class="ic-info-text-design-purchase-note">
                            The text you want to display below the order number on your “Thank you” page once the customers finish their purchase. (<b>e.g.</b> <i>Thanks for purchase!</i>)
                             </div>
            </div>' ),
            'ic_ty_purchase_note_callback',
            'mcheckout-design',
            'ic_design_ty_section'
        );

        add_settings_field(
            'ic_ty_redirect_page',
            __( 'Redirect page
            <div class="ic-info-box-design">
                            <svg class="ic-info-button-redirect-page" width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                 <g clip-path="url(#clip0_710_19499)">
                                     <path d="M4.545 4.5C4.66255 4.16583 4.89458 3.88405 5.19998 3.70457C5.50538 3.52508 5.86445 3.45947 6.21359 3.51936C6.56273 3.57924 6.87941 3.76076 7.10754 4.03176C7.33567 4.30277 7.46053 4.64576 7.46 5C7.46 6 5.96 6.5 5.96 6.5M6 8.5H6.005M11 6C11 8.76142 8.76142 11 6 11C3.23858 11 1 8.76142 1 6C1 3.23858 3.23858 1 6 1C8.76142 1 11 3.23858 11 6Z" stroke="#98A2B3" stroke-linecap="round" stroke-linejoin="round"/>
                                 </g>
                                 <defs>
                                      <clipPath id="clip0_710_19499">
                                             <rect width="12" height="12" fill="white"/>
                                      </clipPath>
                                 </defs>
                            </svg>
                            <div class="ic-info-text-design-redirect-page">
                            Here you should enter the redirect page URL where you want to redirect the customers once they click the “Continue shopping” button on your thank you page.
                             </div>
            </div>' ),
            'ic_ty_redirect_page_callback',
            'mcheckout-design',
            'ic_design_ty_section'
        );

        add_settings_field(
            'ic_ty_contact_us_link',
            __( 'Contact us link
            <div class="ic-info-box-design">
                            <svg class="ic-info-button-contact-us-link" width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                 <g clip-path="url(#clip0_710_19499)">
                                     <path d="M4.545 4.5C4.66255 4.16583 4.89458 3.88405 5.19998 3.70457C5.50538 3.52508 5.86445 3.45947 6.21359 3.51936C6.56273 3.57924 6.87941 3.76076 7.10754 4.03176C7.33567 4.30277 7.46053 4.64576 7.46 5C7.46 6 5.96 6.5 5.96 6.5M6 8.5H6.005M11 6C11 8.76142 8.76142 11 6 11C3.23858 11 1 8.76142 1 6C1 3.23858 3.23858 1 6 1C8.76142 1 11 3.23858 11 6Z" stroke="#98A2B3" stroke-linecap="round" stroke-linejoin="round"/>
                                 </g>
                                 <defs>
                                      <clipPath id="clip0_710_19499">
                                             <rect width="12" height="12" fill="white"/>
                                      </clipPath>
                                 </defs>
                            </svg>
                            <div class="ic-info-text-design-contact-us-link">
                            Here you should enter the “Contact us” page URL where you want to redirect the customers once they click the “Contact us” button on your thank you page.
                             </div>
            </div>' ),
            'ic_ty_contact_us_link_callback',
            'mcheckout-design',
            'ic_design_ty_section'
        );

        // Custom Text
        add_settings_section(
            'ic_design_ct_section',
            __( 'Checkout general', IC_TD ),
            'ic_design_ct_section_callback',
            'mcheckout-custom-text'
        );

        add_settings_field(
            'ic_ct_c_page_title',
            __( 'Page Title' ),
            'ic_ct_c_page_title_callback',
            'mcheckout-custom-text',
            'ic_design_ct_section'
        );
//
//        add_settings_field(
//            'ic_ct_c_error_page_title',
//            __( 'Error Page Title' ),
//            'ic_ct_c_error_page_title_callback',
//            'mcheckout-custom-text',
//            'ic_design_ct_section'
//        );

//        add_settings_field(
//            'ic_ct_c_breadcrumb',
//            __( 'Breadcrumb' ),
//            'ic_ct_c_breadcrumb_callback',
//            'mcheckout-custom-text',
//            'ic_design_ct_section'
//        );

        add_settings_field(
            'ic_ct_c_out_of_stock',
            __( 'Product out of stock error' ),
            'ic_ct_c_out_of_stock_callback',
            'mcheckout-custom-text',
            'ic_design_ct_section'
        );

        add_settings_field(
            'ic_ct_c_log_in_button_label',
            __( 'Log in button label' ),
            'ic_ct_c_log_in_button_label_callback',
            'mcheckout-custom-text',
            'ic_design_ct_section'
        );

        add_settings_field(
            'ic_ct_c_shipping_address_label',
            __( 'Shipping address label' ),
            'ic_ct_c_shipping_address_label_callback',
            'mcheckout-custom-text',
            'ic_design_ct_section'
        );

        add_settings_field(
            'ic_ct_c_already_have_an_account_label',
            __( 'Already have an account label' ),
            'ic_ct_c_already_have_an_account_label_callback',
            'mcheckout-custom-text',
            'ic_design_ct_section'
        );

        add_settings_field(
             'ic_ct_c_continue_to_delivery_button_label' ,
            __( 'Continue to delivery label' ),
            'ic_ct_c_continue_to_delivery_button_label_callback',
            'mcheckout-custom-text',
            'ic_design_ct_section'
        );

        add_settings_field(
             'ic_ct_c_continue_to_payment_button_label' ,
            __( 'Continue to payment label' ),
            'ic_ct_c_continue_to_payment_button_label_callback',
            'mcheckout-custom-text',
            'ic_design_ct_section'
        );

        add_settings_field(
             'ic_ct_c_mobile_show_summary_label' ,
            __( 'Show order summary label' ),
            'ic_ct_c_mobile_show_summary_label_callback',
            'mcheckout-custom-text',
            'ic_design_ct_section'
        );
        add_settings_field(
             'ic_ct_c_mobile_hide_summary_label' ,
            __( 'Hide order summary label' ),
            'ic_ct_c_mobile_hide_summary_label_callback',
            'mcheckout-custom-text',
            'ic_design_ct_section'
        );
        add_settings_field(
            'ic_ct_c_first_name',
            __( 'First name' ),
            'ic_ct_c_first_name_callback',
            'mcheckout-custom-text',
            'ic_design_ct_section'
        );

        add_settings_field(
            'ic_ct_c_last_name',
            __( 'Last name' ),
            'ic_ct_c_last_name_callback',
            'mcheckout-custom-text',
            'ic_design_ct_section'
        );

        add_settings_field(
            'ic_ct_c_email',
            __( 'Email' ),
            'ic_ct_c_email_callback',
            'mcheckout-custom-text',
            'ic_design_ct_section'
        );

        add_settings_field(
            'ic_ct_c_phone',
            __( 'Phone' ),
            'ic_ct_c_phone_callback',
            'mcheckout-custom-text',
            'ic_design_ct_section'
        );

        add_settings_field(
            'ic_ct_c_company',
            __( 'Company' ),
            'ic_ct_c_company_callback',
            'mcheckout-custom-text',
            'ic_design_ct_section'
        );

        add_settings_field(
            'ic_ct_c_street_address',
            __( 'Street address' ),
            'ic_ct_c_street_address_callback',
            'mcheckout-custom-text',
            'ic_design_ct_section'
        );

        add_settings_field(
            'ic_ct_c_apartment_suite',
            __( 'Apartment, suite, etc...' ),
            'ic_ct_c_apartment_suite_callback',
            'mcheckout-custom-text',
            'ic_design_ct_section'
        );

        add_settings_field(
            'ic_ct_c_city',
            __( 'City' ),
            'ic_ct_c_city_callback',
            'mcheckout-custom-text',
            'ic_design_ct_section'
        );

        add_settings_field(
            'ic_ct_c_zip_code',
            __( 'Zip code' ),
            'ic_ct_c_zip_code_callback',
            'mcheckout-custom-text',
            'ic_design_ct_section'
        );

        add_settings_field(
            'ic_ct_c_country',
            __( 'Country' ),
            'ic_ct_c_country_callback',
            'mcheckout-custom-text',
            'ic_design_ct_section'
        );

        add_settings_field(
            'ic_ct_c_state_label',
            __( 'State' ),
            'ic_ct_c_state_label_callback',
            'mcheckout-custom-text',
            'ic_design_ct_section'
        );

//        add_settings_field(
//            'ic_ct_c_subscribe_to_newsletter',
//            __( 'Subscribe to newsletter' ),
//            'ic_ct_c_subscribe_to_newsletter_callback',
//            'mcheckout-custom-text',
//            'ic_design_ct_section'
//        );

        add_settings_field(
            'ic_ct_c_by_placing_your_order_label',
            __( 'By placing your order label' ),
            'ic_ct_c_by_placing_your_order_label_callback',
            'mcheckout-custom-text',
            'ic_design_ct_section'
        );


        add_settings_field(
            ' ',
            __( 'Billing address is same as shipping label' ),
            'ic_ct_c_billing_same_as_shipping_label_callback',
            'mcheckout-custom-text',
            'ic_design_ct_section'
        );

        add_settings_field(
            'ic_ct_c_use_different_delivery_address_label',
            __( 'Use different delivery address label' ),
            'ic_ct_c_use_different_delivery_address_label_callback',
            'mcheckout-custom-text',
            'ic_design_ct_section'
        );

        add_settings_field(
            'ic_ct_c_recommendations_title',
            __( 'Recommendations Title' ),
            'ic_ct_c_recommendations_title_callback',
            'mcheckout-custom-text',
            'ic_design_ct_section'
        );

        add_settings_field(
            'ic_ct_c_discount_code_label',
            __( 'Discount code label' ),
            'ic_ct_c_discount_code_label_callback',
            'mcheckout-custom-text',
            'ic_design_ct_section'
        );

        add_settings_field(
            'ic_ct_c_add_to_cart_button_label',
            __( 'Add to cart button label' ),
            'ic_ct_c_add_to_cart_button_label_callback',
            'mcheckout-custom-text',
            'ic_design_ct_section'
        );

        add_settings_field(
            'ic_ct_c_apply_button_label',
            __( 'Apply button label' ),
            'ic_ct_c_apply_button_label_callback',
            'mcheckout-custom-text',
            'ic_design_ct_section'
        );

        add_settings_field(
            'ic_ct_c_subtotal_label',
            __( 'Subtotal label' ),
            'ic_ct_c_subtotal_label_callback',
            'mcheckout-custom-text',
            'ic_design_ct_section'
        );

        add_settings_field(
                'ic_ct_c_taxes_label',
                __( 'Taxes label' ),
                'ic_ct_c_taxes_label_callback',
                'mcheckout-custom-text',
                'ic_design_ct_section'
        );

        add_settings_field(
            'ic_ct_c_shipping_label',
            __( 'Shipping label' ),
            'ic_ct_c_shipping_label_callback',
            'mcheckout-custom-text',
            'ic_design_ct_section'
        );

        add_settings_field(
            'ic_ct_c_return_to_delivery_label',
            __( 'Return to delivery label' ),
            'ic_ct_c_return_to_delivery_label_callback',
            'mcheckout-custom-text',
            'ic_design_ct_section'
        );

        add_settings_field(
            'ic_ct_c_return_to_shipping_label',
            __( 'Return to shipping label' ),
            'ic_ct_c_return_to_shipping_label_callback',
            'mcheckout-custom-text',
            'ic_design_ct_section'
        );

        add_settings_field(
            'ic_ct_c_order_summary_label',
            __( 'Order summary label' ),
            'ic_ct_c_order_summary_label_callback',
            'mcheckout-custom-text',
            'ic_design_ct_section'
        );

        add_settings_field(
            'ic_ct_c_discount_label',
            __( 'Discount label' ),
            'ic_ct_c_discount_label_callback',
            'mcheckout-custom-text',
            'ic_design_ct_section'
        );

        add_settings_field(
            'ic_ct_c_payment_method_label',
            __( 'Payment method label' ),
            'ic_ct_c_payment_method_label_callback',
            'mcheckout-custom-text',
            'ic_design_ct_section'
        );

        add_settings_field(
            'ic_ct_c_total_label',
            __( 'Total label' ),
            'ic_ct_c_total_label_callback',
            'mcheckout-custom-text',
            'ic_design_ct_section'
        );

        add_settings_field(
            'ic_ct_c_confirm_order_button_label',
            __( 'Confirm order button label' ),
            'ic_ct_c_confirm_order_button_label_callback',
            'mcheckout-custom-text',
            'ic_design_ct_section'
        );

        add_settings_field(
            'ic_ct_c_complete_order_button_label',
            __( 'Complete order button label' ),
            'ic_ct_c_complete_order_button_label_callback',
            'mcheckout-custom-text',
            'ic_design_ct_section'
        );
        add_settings_field(
            'ic_ct_c_show_more_credit_cards_label',
            __( 'Show more credit cards' ),
            'ic_ct_c_show_more_credit_cards_label_callback',
            'mcheckout-custom-text',
            'ic_design_ct_section'
        );

        add_settings_field(
            'ic_ct_c_delivery_label',
            __( 'Delivery label' ),
            'ic_ct_c_delivery_label_callback',
            'mcheckout-custom-text',
            'ic_design_ct_section'
        );

        add_settings_field(
            'ic_ct_c_continue_button_label',
            __( 'Continue button label' ),
            'ic_ct_c_continue_button_label_callback',
            'mcheckout-custom-text',
            'ic_design_ct_section'
        );

        add_settings_field(
            'ic_ct_c_return_button_label',
            __( 'Return button label' ),
            'ic_ct_c_return_button_label_callback',
            'mcheckout-custom-text',
            'ic_design_ct_section'
        );

        add_settings_field(
            'ic_ct_c_first_name_error_label',
            __( 'First name error label' ),
            'ic_ct_c_first_name_error_label_callback',
            'mcheckout-custom-text',
            'ic_design_ct_section'
        );
        add_settings_field(
            'ic_ct_c_payment_label',
            __( 'Payment label' ),
            'ic_ct_c_payment_label_callback',
            'mcheckout-custom-text',
            'ic_design_ct_section'
        );

        add_settings_field(
            'ic_ct_c_add_extras_title',
            __( 'Add extras title' ),
            'ic_ct_c_add_extras_title_callback',
            'mcheckout-custom-text',
            'ic_design_ct_section'
        );

        add_settings_field(
            'ic_ct_c_add_extras_description',
            __( 'Add extras description' ),
            'ic_ct_c_add_extras_description_callback',
            'mcheckout-custom-text',
            'ic_design_ct_section'
        );

        add_settings_field(
            'ic_ct_c_add_extra_product_title',
            __( 'Product added message title' ),
            'ic_ct_c_add_extra_product_title_callback',
            'mcheckout-custom-text',
            'ic_design_ct_section'
        );

        add_settings_field(
            'ic_ct_c_add_extra_product_description',
            __( 'Product added description' ),
            'ic_ct_c_add_extra_product_description_callback',
            'mcheckout-custom-text',
            'ic_design_ct_section'
        );

        add_settings_field(
            'ic_ct_c_email_error_label',
            __( 'Email error label' ),
            'ic_ct_c_email_error_label_callback',
            'mcheckout-custom-text',
            'ic_design_ct_section'
        );

        add_settings_field(
            'ic_ct_c_last_name_error_label',
            __( 'Last name error label' ),
            'ic_ct_c_last_name_error_label_callback',
            'mcheckout-custom-text',
            'ic_design_ct_section'
        );
        add_settings_field(
            'ic_ct_c_street_address_error',
            __( 'Street address error label' ),
            'ic_ct_c_street_address_error_callback',
            'mcheckout-custom-text',
            'ic_design_ct_section'
        );


        add_settings_field(
            'ic_ct_c_city_error_label',
            __( 'City error label' ),
            'ic_ct_c_city_error_label_callback',
            'mcheckout-custom-text',
            'ic_design_ct_section'
        );

        add_settings_field(
            'ic_ct_c_phone_number_error_label',
            __( 'Phone number error label' ),
            'ic_ct_c_phone_number_error_label_callback',
            'mcheckout-custom-text',
            'ic_design_ct_section'
        );

        add_settings_field(
            'ic_ct_c_zip_code_error_label',
            __( 'Zip code error label' ),
            'ic_ct_c_zip_code_error_label_callback',
            'mcheckout-custom-text',
            'ic_design_ct_section'
        );

        add_settings_field(
            'ic_ct_mc_page_title',
            __( 'Page title' ),
            'ic_ct_mc_page_title_callback',
            'mcheckout-custom-text',
            'ic_design_ct_section'
        );

//        add_settings_field(
//            'ic_ct_mc_shipping_message',
//            __( 'Shipping message' ),
//            'ic_ct_mc_shipping_message_callback',
//            'mcheckout-custom-text',
//            'ic_design_ct_section'
//        );


        add_settings_field(
            'ic_ct_mc_discount_code_label',
            __( 'Discount code label' ),
            'ic_ct_mc_discount_code_label_callback',
            'mcheckout-custom-text',
            'ic_design_ct_section'
        );

        add_settings_field(
            'ic_ct_mc_apply_button_label',
            __( 'Apply button label' ),
            'ic_ct_mc_apply_button_label_callback',
            'mcheckout-custom-text',
            'ic_design_ct_section'
        );

        add_settings_field(
            'ic_ct_mc_coupon_label',
            __( 'Coupon applied label' ),
            'ic_ct_mc_coupon_label_callback',
            'mcheckout-custom-text',
            'ic_design_ct_section'
        );

        add_settings_field(
            'ic_ct_mc_coupon_error_label',
            __( 'Coupon error label' ),
            'ic_ct_mc_coupon_error_label_callback',
            'mcheckout-custom-text',
            'ic_design_ct_section'
        );

        add_settings_field(
            'ic_ct_mc_taxes_label',
            __( 'Taxes label' ),
            'ic_ct_mc_taxes_label_callback',
            'mcheckout-custom-text',
            'ic_design_ct_section'
        );

        add_settings_field(
            'ic_ct_mc_shipping_label',
            __( 'Shipping label' ),
            'ic_ct_mc_shipping_label_callback',
            'mcheckout-custom-text',
            'ic_design_ct_section'
        );

        add_settings_field(
            'ic_ct_mc_discount_label',
            __( 'Coupon label' ),
            'ic_ct_mc_discount_label_callback',
            'mcheckout-custom-text',
            'ic_design_ct_section'
        );

        add_settings_field(
            'ic_ct_mc_subtotal_label',
            __( 'Subtotal label' ),
            'ic_ct_mc_subtotal_label_callback',
            'mcheckout-custom-text',
            'ic_design_ct_section'
        );

//        add_settings_field(
//            'ic_ct_mc_recommendation_title',
//            __( 'Recommendations Title' ),
//            'ic_ct_mc_recommendation_title_callback',
//            'mcheckout-custom-text',
//            'ic_design_ct_section'
//        );

        add_settings_field(
            'ic_ct_mc_total_label',
            __( 'Total label' ),
            'ic_ct_mc_total_label_callback',
            'mcheckout-custom-text',
            'ic_design_ct_section'
        );

//        add_settings_field(
//            'ic_ct_mc_secondary_button_label',
//            __( 'Secondary button label' ),
//            'ic_ct_mc_secondary_button_label_callback',
//            'mcheckout-custom-text',
//            'ic_design_ct_section'
//        );

        add_settings_field(
            'ic_ct_mc_add_to_cart_button',
            __( 'Add to cart button' ),
            'ic_ct_mc_add_to_cart_button_callback',
            'mcheckout-custom-text',
            'ic_design_ct_section'
        );

//        add_settings_field(
//            'ic_ct_mc_bottom_message_label',
//            __( 'Bottom message label' ),
//            'ic_ct_mc_bottom_message_label_callback',
//            'mcheckout-custom-text',
//            'ic_design_ct_section'
//        );

//        add_settings_field(
//            'ic_ct_mc_primary_button_label',
//            __( 'Primary button label' ),
//            'ic_ct_mc_primary_button_label_callback',
//            'mcheckout-custom-text',
//            'ic_design_ct_section'
//        );

        add_settings_field(
            'ic_ct_mc_cart_empty_message',
            __( 'Cart empty message' ),
            'ic_ct_mc_cart_empty_message_callback',
            'mcheckout-custom-text',
            'ic_design_ct_section'
        );


        add_settings_field(
            'ic_ct_mc_cart_empty_button_label',
            __( 'Cart empty button label' ),
            'ic_ct_mc_cart_empty_button_label_callback',
            'mcheckout-custom-text',
            'ic_design_ct_section'
        );


        add_settings_field(
            'ic_ct_ty_page_title',
            __( 'Page title' ),
            'ic_ct_ty_page_title_callback',
            'mcheckout-custom-text',
            'ic_design_ct_section'
        );

//        add_settings_field(
//            'ic_ct_ty_error_page_title',
//            __( 'Error page title' ),
//            'ic_ct_ty_error_page_title_callback',
//            'mcheckout-custom-text',
//            'ic_design_ct_section'
//        );

        add_settings_field(
            'ic_ct_ty_primary_thank_you_label',
            __( 'Primary thank you label' ),
            'ic_ct_ty_primary_thank_you_label_callback',
            'mcheckout-custom-text',
            'ic_design_ct_section'
        );

//        add_settings_field(
//            'ic_ct_ty_secondary_thank_you_label',
//            __( 'Secondary thank you label' ),
//            'ic_ct_ty_secondary_thank_you_label_callback',
//            'mcheckout-custom-text',
//            'ic_design_ct_section'
//        );

        add_settings_field(
            'ic_ct_ty_customer_information_label',
            __( 'Customer information label' ),
            'ic_ct_ty_customer_information_label_callback',
            'mcheckout-custom-text',
            'ic_design_ct_section'
        );

        add_settings_field(
            'ic_ct_ty_shipping_information_label',
            __( 'Shipping information label' ),
            'ic_ct_ty_shipping_information_label_callback',
            'mcheckout-custom-text',
            'ic_design_ct_section'
        );

        add_settings_field(
            'ic_ct_ty_shipping_address_label',
            __( 'Shipping address label' ),
            'ic_ct_ty_shipping_address_label_callback',
            'mcheckout-custom-text',
            'ic_design_ct_section'
        );

        add_settings_field(
            'ic_ct_ty_billing_address_label',
            __( 'Billing address label' ),
            'ic_ct_ty_billing_address_label_callback',
            'mcheckout-custom-text',
            'ic_design_ct_section'
        );

        add_settings_field(
            'ic_ct_ty_shipping_method_information_label',
            __( 'Shipping method information label' ),
            'ic_ct_ty_shipping_method_information_label_callback',
            'mcheckout-custom-text',
            'ic_design_ct_section'
        );

        add_settings_field(
            'ic_ct_ty_payment_information_label',
            __( 'Payment information label' ),
            'ic_ct_ty_payment_information_label_callback',
            'mcheckout-custom-text',
            'ic_design_ct_section'
        );

        add_settings_field(
            'ic_ct_ty_payment_method_label',
            __( 'Payment method label' ),
            'ic_ct_ty_payment_method_label_callback',
            'mcheckout-custom-text',
            'ic_design_ct_section'
        );

//        add_settings_field(
//            'ic_ct_ty_save_my_information_for_faster_checkout_label',
//            __( 'Save my information for a faster checkout label' ),
//            'ic_ct_ty_save_my_information_for_faster_checkout_label_callback',
//            'mcheckout-custom-text',
//            'ic_design_ct_section'
//        );
//
//        add_settings_field(
//            'ic_ct_ty_sign_up_for_newsletter',
//            __( 'Sign up to our newsletter' ),
//            'ic_ct_ty_sign_up_for_newsletter_callback' ,
//            'mcheckout-custom-text',
//            'ic_design_ct_section'
//        );

//        add_settings_field(
//            'ic_ct_ty_sign_up_newsletter_description',
//            __( 'Sign up to our newsletter description' ),
//            'ic_ct_ty_sign_up_newsletter_description_callback' ,
//            'mcheckout-custom-text',
//            'ic_design_ct_section'
//        );

        add_settings_field(
            'ic_ct_ty_email_address_label',
            __( 'Email address label' ),
            'ic_ct_ty_email_address_label_callback',
            'mcheckout-custom-text',
            'ic_design_ct_section'
        );

        add_settings_field(
            'ic_ct_ty_sign_up_button_label',
            __( 'Sign up button label' ),
            'ic_ct_ty_sign_up_button_label_callback',
            'mcheckout-custom-text',
            'ic_design_ct_section'
        );

        add_settings_field(
            'ic_ct_ty_need_help_label',
            __( 'Need help label' ),
            'ic_ct_ty_need_help_label_callback',
            'mcheckout-custom-text',
            'ic_design_ct_section'
        );

        add_settings_field(
            'ic_ct_ty_contact_us_button_label',
            __( 'Contact us button label' ),
            'ic_ct_ty_contact_us_button_label_callback',
            'mcheckout-custom-text',
            'ic_design_ct_section'
        );

        add_settings_field(
            'ic_ct_ty_continue_shopping_button_label',
            __( 'Continue shopping button label' ),
            'ic_ct_ty_continue_shopping_button_label_callback',
            'mcheckout-custom-text',
            'ic_design_ct_section'
        );

        add_settings_field(
            'ic_ct_ty_items_in_shipment_label',
            __( 'Items in shipment label' ),
            'ic_ct_ty_items_in_shipment_label_callback',
            'mcheckout-custom-text',
            'ic_design_ct_section'
        );

        add_settings_field(
            'ic_ct_ty_subtotal_label',
            __( 'Subtotal label' ),
            'ic_ct_ty_subtotal_label_callback',
            'mcheckout-custom-text',
            'ic_design_ct_section'
        );

        add_settings_field(
            'ic_ct_ty_discount_label',
            __( 'Discount label' ),
            'ic_ct_ty_discount_label_callback',
            'mcheckout-custom-text',
            'ic_design_ct_section'
        );

        add_settings_field(
            'ic_ct_ty_shipping_label',
            __( 'Shipping label' ),
            'ic_ct_ty_shipping_label_callback',
            'mcheckout-custom-text',
            'ic_design_ct_section'
        );

        add_settings_field(
            'ic_ct_ty_total_label',
            __( 'Total label' ),
            'ic_ct_ty_total_label_callback',
            'mcheckout-custom-text',
            'ic_design_ct_section'
        );

        // Register Settings
        register_setting(
            'ic_design',
            'ic_design_general'
        );

        register_setting(
            'ic_design',
            'ic_design_checkout'
        );

        register_setting(
            'ic_design',
            'ic_design_mini_cart'
        );

        register_setting(
            'ic_design',
            'ic_design_ty'
        );

        register_setting(
            'ic_design_ct',
            'ic_design_custom_text'
        );

    }
}

if ( ! function_exists( 'ic_us_add_custom_options' ) ) {
    function ic_us_add_custom_options() {
        if ( ! get_option( 'ic_us_settings' ) ) {
            add_option( 'ic_us_settings' );
        }

        // Upsell General
        add_settings_section(
            'ic_us_settings_section',
            __( 'General', IC_TD ),
            'ic_us_general_settings_section_callback',
            'mcheckout-upsell'
        );

    }
}

if ( ! function_exists( 'ic_design_general_section_callback' ) ) {
    function ic_design_general_section_callback() {
        ?>
            <h4 class="ic-design-header-general-settings">General settings</h4><br/>
            <div class="col-md-4">


        <?php
    }
}

if ( ! function_exists( 'ic_design_checkout_section_callback' ) ) {
    function ic_design_checkout_section_callback() {
        ?>
            </div>
            <div class="col-md-8">
                <div class="design-nav">
                    <span class="active">Checkout</span>
                    <span>Mini cart</span>
                    <span>Thank you page</span>
                    <div class="nav-border"></div>
                </div>
                <div class="section-cont active" id="section-cont-checkout">

        <?php
    }
}

if ( ! function_exists( 'ic_design_mini_cart_section_callback' ) ) {
    function ic_design_mini_cart_section_callback() {
        ?>
            </div>
            <div class="section-cont" id="section-cont-mini-cart">

        <?php
    }
}

if ( ! function_exists( 'ic_design_ty_section_callback' ) ) {
    function ic_design_ty_section_callback() {
        ?>
        </div>
        <div class="section-cont" id="section-cont-ty-side">

        <?php
    }
}

if ( ! function_exists( 'ic_design_primary_color_callback' ) ) {
    function ic_design_primary_color_callback() {
        $options = get_option( 'ic_design_general' );

        $primary_color = '';
        if ( isset( $options[ 'primary_color' ] ) ) {
            $primary_color = esc_attr( $options[ 'primary_color' ] );
        }

        echo '<div class="form-group">
                <input class="primary-color" name="ic_design_general[primary_color]" type="text" value="' . $primary_color .'" data-default-color="#000000" />
              </div>';
    }
}

if ( ! function_exists( 'ic_design_primary_background_color_callback' ) ) {
    function ic_design_primary_background_color_callback() {
        $options = get_option( 'ic_design_general' );

        $primary_background_color = '';
        if ( isset( $options[ 'primary_background_color' ] ) ) {
            $primary_background_color = esc_attr( $options[ 'primary_background_color' ] );
        }

        echo '<div class="form-group">
                <input class="primary-background-color" name="ic_design_general[primary_background_color]" type="text" value="' . $primary_background_color .'" data-default-color="#ffffff" />
              </div>';
    }
}

if ( ! function_exists( 'ic_design_primary_text_color_callback' ) ) {
    function ic_design_primary_text_color_callback() {
        $options = get_option( 'ic_design_general' );

        $primary_text_color = '';
        if ( isset( $options[ 'primary_text_color' ] ) ) {
            $primary_text_color = esc_attr( $options[ 'primary_text_color' ] );
        }

        echo '<div class="form-group"> 
                <input class="primary-text-color" name="ic_design_general[primary_text_color]" type="text" value="' . $primary_text_color .'" data-default-color="#101828" />
              </div>
              </div>';
    }
}

if ( ! function_exists( 'ic_design_corner_radius_callback' ) ) {
    function ic_design_corner_radius_callback() {
        $options = get_option( 'ic_design_general' );

        echo '<div class="form-group same-as-theme">
                <span>Default</span>
                <label class="switch">
                <input id="ic_design_corner_radius" name="ic_design_general[ic_design_corner_radius]" type="checkbox" value="1" ' . checked( isset( $options['ic_design_corner_radius'] ), true, false ) . ' />
                <span class="slider round"></span>
              </label>
              </div>';
    }
}

if ( ! function_exists( 'ic_checkout_corner_radius_px_callback' ) ) {
    function ic_checkout_corner_radius_px_callback() {
        $options = get_option( 'ic_design_general' );

        $corner_radius_px = '';
        if ( isset( $options[ 'ic_design_corner_radius_px' ] ) ) {
            $corner_radius_px = esc_attr( $options[ 'ic_design_corner_radius_px' ] );
        }

        echo '<div class="form-group"> 
                <input class="corner-radius-px" name="ic_design_general[ic_design_corner_radius_px]" type="text" value="' . $corner_radius_px .'" />
              </div>';
    }
}

if ( ! function_exists( 'ic_design_typography_callback' ) ) {
    function ic_design_typography_callback() {
        $options = get_option( 'ic_design_general' );

        echo '<div class="form-group same-as-theme">
                <span>Same as theme</span>
                <label class="switch">
                <input id="ic_design_typography" name="ic_design_general[ic_design_typography]" type="checkbox" value="1" ' . checked( isset( $options['ic_design_typography'] ), true, false ) . ' />
                <span class="slider round"></span>
              </label>';
    }
}

if ( ! function_exists( 'ic_design_font_callback' ) ) {
    function ic_design_font_callback() {

        $options = get_option( 'ic_design_general' );

        $font = '';
        if ( isset( $options[ 'ic_design_font' ] ) ) {
            $font = esc_attr( $options[ 'ic_design_font' ] );
        }

        $fonts_json = file_get_contents( plugins_url() . '/mediya-checkout/assets/fonts/gfonts.json' );
        $fonts = json_decode( $fonts_json );
        echo '<div class="form-group">
                <select class="ic-font" name="ic_design_general[ic_design_font]">';
        foreach ( $fonts as $singleFont ) {
            echo '<option value="' . $singleFont . '" ';
            if( $font == $singleFont ) {
                echo 'selected >' . $singleFont . '</option>';
            } else {
                echo '>' . $singleFont . '</option>';
            }
        }
        echo '</select>
            </div>';
    }
}

if ( ! function_exists( 'ic_design_font_weight_callback' ) ) {
    function ic_design_font_weight_callback() {
        $options = get_option( 'ic_design_general' );
        $font_weights = [
            'Thin 100',
            'Ultra Light 200',
            'Light 300',
            'Regular 400',
            'Medium 500',
            'Semi Bold 600',
            'Bold 700',
            'Ultra Bold 800',
            'Black 900',
            'Ultra Black 950'
        ];

        $font_weight = '3';
        if ( isset( $options[ 'ic_design_font_weight' ] ) ) {
            $font_weight = esc_attr( $options[ 'ic_design_font_weight' ] );
        }

        echo '<div class="form-group">
                <select class="ic-font-weight" name="ic_design_general[ic_design_font_weight]">';
        for ( $i = 0; $i <= 9; $i++ ) {
            echo '<option value="' . $i . '" ';
            if ( strval( $i ) == $font_weight ) {
                echo 'selected >' . $font_weights[$i] . '</option>';
            } else {
                echo '>' . $font_weights[$i] . '</option>';
            }
        }
        echo '</select>
            </div>';
    }
}

if ( ! function_exists( 'ic_design_font_subsets_callback' ) ) {
    function ic_design_font_subsets_callback() {
        $options = get_option( 'ic_design_general' );
        $font_subsets = [
            'Normal',
            'Italic',
            'Oblique'
        ];

        $font_subset = '0';
        if ( isset( $options[ 'ic_design_font_subsets' ] ) ) {
            $font_subset = esc_attr( $options[ 'ic_design_font_subsets' ] );
        }

        echo '<div class="form-group">
                <select class="ic-font-subset" name="ic_design_general[ic_design_font_subsets]">';
        for ( $i = 0; $i <= 2; $i++ ) {
            echo '<option value="' . $i . '" ';
            if ( strval( $i ) == $font_subset ) {
                echo 'selected >' . $font_subsets[$i] . '</option>';
            } else {
                echo '>' . $font_subsets[$i] . '</option>';
            }
        }
        echo '</select>
            </div>';
    }
}

if ( ! function_exists( 'ic_design_secondary_background_color_callback' ) ) {
    function ic_design_secondary_background_color_callback() {
        $options = get_option( 'ic_design_general' );

        $secondary_background_color = '';
        if ( isset( $options[ 'secondary_background_color' ] ) ) {
            $secondary_background_color = esc_attr( $options[ 'secondary_background_color' ] );
        }

        echo '<div class="form-group">
                <input class="secondary-background-color" name="ic_design_general[secondary_background_color]" type="text" value="' . $secondary_background_color .'" data-default-color="#F9FAFBCC" />
              </div>';
    }
}

if ( ! function_exists( 'ic_design_custom_accent_color_callback' ) ) {
    function ic_design_custom_accent_color_callback() {
        $options = get_option( 'ic_design_general' );

        $custom_accent_color = '';
        if ( isset( $options[ 'custom_accent_color' ] ) ) {
            $custom_accent_color = esc_attr( $options[ 'custom_accent_color' ] );
        }

        echo '<div class="form-group">
                <input class="custom-accent-color" name="ic_design_general[custom_accent_color]" type="text" value="' . $custom_accent_color .'" data-default-color="#0a8bfe" />
              </div>';
    }
}

if ( ! function_exists( 'ic_design_primary_buttons_background_color_callback' ) ) {
    function ic_design_primary_buttons_background_color_callback() {
        $options = get_option( 'ic_design_general' );

        $primary_buttons_background_color = '';
        if ( isset( $options[ 'primary_buttons_background_color' ] ) ) {
            $primary_buttons_background_color = esc_attr( $options[ 'primary_buttons_background_color' ] );
        }

        echo '<div class="form-group">
                <input class="primary-buttons-background-color" name="ic_design_general[primary_buttons_background_color]" type="text" value="' . $primary_buttons_background_color .'" data-default-color="#101828" />
              </div>';
    }
}

if ( ! function_exists( 'ic_design_secondary_buttons_background_color_callback' ) ) {
    function ic_design_secondary_buttons_background_color_callback() {
        $options = get_option( 'ic_design_general' );

        $secondary_buttons_background_color = '';
        if ( isset( $options[ 'secondary_buttons_background_color' ] ) ) {
            $secondary_buttons_background_color = esc_attr( $options[ 'secondary_buttons_background_color' ] );
        }

        echo '<div class="form-group">
                <input class="secondary-buttons-background-color" name="ic_design_general[secondary_buttons_background_color]" type="text" value="' . $secondary_buttons_background_color .'" data-default-color="#ffffff" />
              </div>';
    }
}

if ( ! function_exists( 'ic_design_custom_error_color_callback' ) ) {
    function ic_design_custom_error_color_callback() {
        $options = get_option( 'ic_design_general' );

        $custom_error_color = '';
        if ( isset( $options[ 'custom_error_color' ] ) ) {
            $custom_error_color = esc_attr( $options[ 'custom_error_color' ] );
        }

        echo '<div class="form-group">
                <input class="custom-error-color" name="ic_design_general[custom_error_color]" type="text" value="' . $custom_error_color .'" data-default-color="#F04438" />
              </div>';
    }
}

if ( ! function_exists( 'ic_design_input_field_background_color_callback' ) ) {
    function ic_design_input_field_background_color_callback() {
        $options = get_option( 'ic_design_general' );

        $input_field_background_color = '';
        if ( isset( $options[ 'input_field_background_color' ] ) ) {
            $input_field_background_color = esc_attr( $options[ 'input_field_background_color' ] );
        }

        echo '<div class="form-group">
                <input class="input-field-background-color" name="ic_design_general[input_field_background_color]" type="text" value="' . $input_field_background_color .'" data-default-color="#ffffff" />
              </div>';
    }
}

if ( ! function_exists( 'ic_design_input_field_text_color_callback' ) ) {
    function ic_design_input_field_text_color_callback() {
        $options = get_option( 'ic_design_general' );

        $input_field_text_color = '';
        if ( isset( $options[ 'input_field_text_color' ] ) ) {
            $input_field_text_color = esc_attr( $options[ 'input_field_text_color' ] );
        }

        echo '<div class="form-group">
                <input class="input-field-text-color" name="ic_design_general[input_field_text_color]" type="text" value="' . $input_field_text_color .'" data-default-color="#344054" />
              </div>';
    }
}

if ( ! function_exists( 'ic_design_border_color_callback' ) ) {
    function ic_design_border_color_callback() {
        $options = get_option( 'ic_design_general' );

        $border_color = '';
        if ( isset( $options[ 'border_color' ] ) ) {
            $border_color = esc_attr( $options[ 'border_color' ] );
        }

        echo '<div class="form-group">
                <input class="border-color" name="ic_design_general[border_color]" type="text" value="' . $border_color .'" data-default-color="#EAECF0" />
              </div>';
    }
}

if ( ! function_exists( 'ic_quantity_circle_color_callback' ) ) {
    function ic_quantity_circle_color_callback() {
        $options = get_option( 'ic_design_general' );

        $quantity_circle_color = '';
        if ( isset( $options[ 'quantity_circle_color' ] ) ) {
            $quantity_circle_color = esc_attr( $options[ 'quantity_circle_color' ] );
        }

        echo '<div class="form-group">
                <input class="quantity-circle-color" name="ic_design_general[quantity_circle_color]" type="text" value="' . $quantity_circle_color .'" data-default-color="#FFFFFF" />
              </div>';
    }
}

if ( ! function_exists( 'ic_quantity_circle_background_color_callback' ) ) {
    function ic_quantity_circle_background_color_callback() {
        $options = get_option( 'ic_design_general' );

        $quantity_circle_background_color = '';
        if ( isset( $options[ 'quantity_circle_background_color' ] ) ) {
            $quantity_circle_background_color = esc_attr( $options[ 'quantity_circle_background_color' ] );
        }

        echo '<div class="form-group">
                <input class="quantity-circle-background-color" name="ic_design_general[quantity_circle_background_color]" type="text" value="' . $quantity_circle_background_color .'" data-default-color="#667085" />
              </div>';
    }
}

if ( ! function_exists( 'ic_minicart_message_color_callback' ) ) {
    function ic_minicart_message_color_callback() {
        $options = get_option( 'ic_design_general' );

        $minicart_message_color = '';
        if ( isset( $options[ 'minicart_message_color' ] ) ) {
            $minicart_message_color = esc_attr( $options[ 'minicart_message_color' ] );
        }

        echo '<div class="form-group">
                <input class="minicart-message-color" name="ic_design_general[minicart_message_color]" type="text" value="' . $minicart_message_color .'" data-default-color="#667085" />
              </div>';
    }
}

if ( ! function_exists( 'ic_minicart_message_background_color_callback' ) ) {
    function ic_minicart_message_background_color_callback() {
        $options = get_option( 'ic_design_general' );

        $minicart_message_background_color = '';
        if ( isset( $options[ 'minicart_message_background_color' ] ) ) {
            $minicart_message_background_color = esc_attr( $options[ 'minicart_message_background_color' ] );
        }

        echo '<div class="form-group">
                <input class="minicart-message-background-color" name="ic_design_general[minicart_message_background_color]" type="text" value="' . $minicart_message_background_color .'" data-default-color="#f9fafbcc" />
              </div>';
    }
}

if ( ! function_exists( 'ic_input_outline_color_callback' ) ) {
    function ic_input_outline_color_callback() {
        $options = get_option( 'ic_design_general' );

        $input_outline_color = '';
        if ( isset( $options[ 'input_outline_color' ] ) ) {
            $input_outline_color = esc_attr( $options[ 'input_outline_color' ] );
        }

        echo '<div class="form-group">
                <input class="input-outline-color" name="ic_design_general[input_outline_color]" type="text" value="' . $input_outline_color .'" data-default-color="#D0D5DD" />
              </div>';
    }
}

if ( ! function_exists( 'ic_design_secondary_text_color_callback' ) ) {
    function ic_design_secondary_text_color_callback() {
        $options = get_option( 'ic_design_general' );

        $secondary_text_color = '';
        if ( isset( $options[ 'secondary_text_color' ] ) ) {
            $secondary_text_color = esc_attr( $options[ 'secondary_text_color' ] );
        }

        echo '<div class="form-group">
                <input class="secondary-text-color" name="ic_design_general[secondary_text_color]" type="text" value="' . $secondary_text_color .'" data-default-color="#344054" />
              </div>';
    }
}

if ( ! function_exists( 'ic_design_tertiary_text_color_callback' ) ) {
    function ic_design_tertiary_text_color_callback() {
        $options = get_option( 'ic_design_general' );

        $tertiary_text_color = '';
        if ( isset( $options[ 'tertiary_text_color' ] ) ) {
            $tertiary_text_color = esc_attr( $options[ 'tertiary_text_color' ] );
        }

        echo '<div class="form-group">
                <input class="tertiary-text-color" name="ic_design_general[tertiary_text_color]" type="text" value="' . $tertiary_text_color .'" data-default-color="#effeff" />
              </div>';
    }
}

if ( ! function_exists( 'ic_design_primary_buttons_text_color_callback' ) ) {
    function ic_design_primary_buttons_text_color_callback() {
        $options = get_option( 'ic_design_general' );

        $primary_buttons_text_color = '';
        if ( isset( $options[ 'primary_buttons_text_color' ] ) ) {
            $primary_buttons_text_color = esc_attr( $options[ 'primary_buttons_text_color' ] );
        }

        echo '<div class="form-group">
                <input class="primary-buttons-text-color" name="ic_design_general[primary_buttons_text_color]" type="text" value="' . $primary_buttons_text_color .'" data-default-color="#ffffff" />
              </div>';
    }
}

if ( ! function_exists( 'ic_design_secondary_buttons_text_color_callback' ) ) {
    function ic_design_secondary_buttons_text_color_callback() {
        $options = get_option( 'ic_design_general' );

        $secondary_buttons_text_color = '';
        if ( isset( $options[ 'secondary_buttons_text_color' ] ) ) {
            $secondary_buttons_text_color = esc_attr( $options[ 'secondary_buttons_text_color' ] );
        }

        echo '<div class="form-group">
                <input class="secondary-buttons-text-color" name="ic_design_general[secondary_buttons_text_color]" type="text" value="' . $secondary_buttons_text_color .'" data-default-color="#101828" />
              </div>';
    }
}

if ( ! function_exists( 'ic_checkout_pp_callback' ) ) {
    function ic_checkout_pp_callback() {
        $options = get_option( 'ic_design_checkout' );

        $pp = '';
        if ( isset( $options[ 'ic_checkout_pp' ] ) ) {
            $pp = esc_attr( $options[ 'ic_checkout_pp' ] );
        }

        echo '<div class="form-group"> 
                <input class="pp" name="ic_design_checkout[ic_checkout_pp]" type="text" value="' . $pp .'" />
              </div>';
    }
}

if ( ! function_exists( 'ic_checkout_layout_callback' ) ) {
    function ic_checkout_layout_callback() {
        $options = get_option( 'ic_design_checkout' );

        $layout = '1';
        if ( isset( $options[ 'ic_checkout_layout' ] ) ) {
            $layout = esc_attr( $options[ 'ic_checkout_layout' ] );
        }
        $select1 = '';
        $select2 = '';
        switch ( $layout ) {
            case '1': $select1 = 'selected'; break;
            case '3': $select2 = 'selected'; break;
            default: break;
        }
        echo '<select name="ic_design_checkout[ic_checkout_layout]" class="ic-cc-layout-select">
                <option ' . $select1 . ' value="1"></option>
                <option ' . $select2 . ' value="3"></option>
              </select>';
    }
}

if ( ! function_exists( 'ic_checkout_logo_callback' ) ) {
    function ic_checkout_logo_callback() {
        $options = get_option( 'ic_design_checkout' );

        $logo = '';
        if ( isset( $options[ 'ic_checkout_logo' ] ) ) {
            $logo = esc_attr( $options[ 'ic_checkout_logo' ] );
        }

        echo '<div class="form-group">
                <div class="ic_checkout_logo">
                    <img src="' . $logo . '" alt="">
                </div>
                <input type="button" id="upload-logo-btn" value="Upload logo">
                <input type="hidden" name="ic_design_checkout[ic_checkout_logo]" id="ic_checkout_logo" value="' . $logo . '" >
            </div>';
    }
}

if ( ! function_exists( 'ic_checkout_logo_height_desktop_callback' ) ) {
    function ic_checkout_logo_height_desktop_callback() {
        $options = get_option( 'ic_design_checkout' );

        $logo_height_desktop = '';
        if ( isset( $options[ 'ic_checkout_logo_height_desktop' ] ) ) {
            $logo_height_desktop = esc_attr( $options[ 'ic_checkout_logo_height_desktop' ] );
        }

        echo '<div class="form-group"> 
                <input class="ic_checkout_logo_height_desktop" name="ic_design_checkout[ic_checkout_logo_height_desktop]" type="number" value="' . $logo_height_desktop .'" />
              </div>';
    }
}

if ( ! function_exists( 'ic_checkout_logo_height_mobile_callback' ) ) {
    function ic_checkout_logo_height_mobile_callback() {
        $options = get_option( 'ic_design_checkout' );

        $logo_height_mobile = '';
        if ( isset( $options[ 'ic_checkout_logo_height_mobile' ] ) ) {
            $logo_height_mobile = esc_attr( $options[ 'ic_checkout_logo_height_mobile' ] );
        }

        echo '<div class="form-group"> 
                <input class="ic_checkout_logo_height_mobile" name="ic_design_checkout[ic_checkout_logo_height_mobile]" type="number" value="' . $logo_height_mobile .'" />
              </div>';
    }
}

if ( ! function_exists( 'ic_checkout_rp_callback' ) ) {
    function ic_checkout_rp_callback() {
        $options = get_option( 'ic_design_checkout' );

        $rp = '';
        if ( isset( $options[ 'ic_checkout_rp' ] ) ) {
            $rp = esc_attr( $options[ 'ic_checkout_rp' ] );
        }

        echo '<div class="form-group"> 
                <input class="rp" name="ic_design_checkout[ic_checkout_rp]" type="text" value="' . $rp .'" />
              </div>';
    }
}

if ( ! function_exists( 'ic_checkout_tac_callback' ) ) {
    function ic_checkout_tac_callback() {
        $options = get_option( 'ic_design_checkout' );

        $tac = '';
        if ( isset( $options[ 'ic_checkout_tac' ] ) ) {
            $tac = esc_attr( $options[ 'ic_checkout_tac' ] );
        }

        echo '<div class="form-group">
                <input class="tac" name="ic_design_checkout[ic_checkout_tac]" type="text" value="' . $tac .'" />
              </div>';
    }
}

if ( ! function_exists( 'ic_checkout_phone_callback' ) ) {
    function ic_checkout_phone_callback() {
        $options = get_option( 'ic_design_checkout' );

        echo '<div class="form-group">
                <label class="switch">
                <input id="ic_checkout_phone" name="ic_design_checkout[ic_checkout_phone]" type="checkbox" value="1" ' . checked( isset( $options['ic_checkout_phone'] ), true, false ) . ' />
                <span class="slider round"></span>
              </label>';
    }
}

if ( ! function_exists( 'ic_checkout_address_callback' ) ) {
    function ic_checkout_address_callback() {
        $options = get_option( 'ic_design_checkout' );

        echo '<div class="form-group">
                <label class="switch">
                <input id="ic_checkout_address" name="ic_design_checkout[ic_checkout_address]" type="checkbox" value="1" ' . checked( isset( $options['ic_checkout_address'] ), true, false ) . ' />
                <span class="slider round"></span>
              </label>';
    }
}

if ( ! function_exists( 'ic_checkout_email_callback' ) ) {
    function ic_checkout_email_callback() {
        $options = get_option( 'ic_design_checkout' );

        echo '<div class="form-group">
                <label class="switch">
                <input id="ic_checkout_email" name="ic_design_checkout[ic_checkout_email]" type="checkbox" value="1" ' . checked( isset( $options['ic_checkout_email'] ), true, false ) . ' />
                <span class="slider round"></span>
              </label>';
    }
}

if ( ! function_exists( 'ic_checkout_powered_callback' ) ) {
    function ic_checkout_powered_callback() {
        $options = get_option( 'ic_design_checkout' );

        echo '<div class="form-group">
                <label class="switch">
                <input id="ic_checkout_powered" name="ic_design_checkout[ic_checkout_powered]" type="checkbox" value="1" ' . checked( isset( $options['ic_checkout_powered'] ), true, false ) . ' />
                <span class="slider round"></span>
              </label>';
    }
}

if ( ! function_exists( 'ic_checkout_show_phone_number_field_callback' ) ) {
    function ic_checkout_show_phone_number_field_callback() {
        $options = get_option( 'ic_design_checkout' );

        echo '<div class="form-group">
                <label class="switch">
                <input id="ic_checkout_show_phone_number_field" name="ic_design_checkout[ic_checkout_show_phone_number_field]" type="checkbox" value="1" ' . checked( isset( $options['ic_checkout_show_phone_number_field'] ), true, false ) . ' />
                <span class="slider round"></span>
              </label>';
    }
}

if ( ! function_exists( 'ic_checkout_show_company_field_callback' ) ) {
    function ic_checkout_show_company_field_callback() {
        $options = get_option( 'ic_design_checkout' );

        echo '<div class="form-group">
                <label class="switch">
                <input id="ic_checkout_show_company_field" name="ic_design_checkout[ic_checkout_show_company_field]" type="checkbox" value="1" ' . checked( isset( $options['ic_checkout_show_company_field'] ), true, false ) . ' />
                <span class="slider round"></span>
              </label>';
    }
}

if ( ! function_exists( 'ic_checkout_show_apartment_field_callback' ) ) {
    function ic_checkout_show_apartment_field_callback() {
        $options = get_option( 'ic_design_checkout' );

        echo '<div class="form-group">
                <label class="switch">
                <input id="ic_checkout_show_apartment_field" name="ic_design_checkout[ic_checkout_show_apartment_field]" type="checkbox" value="1" ' . checked( isset( $options['ic_checkout_show_apartment_field'] ), true, false ) . ' />
                <span class="slider round"></span>
              </label>';
    }
}

if ( ! function_exists( 'ic_checkout_discount_callback' ) ) {
    function ic_checkout_discount_callback() {
        $options = get_option( 'ic_design_checkout' );

        echo '<div class="form-group">
                <label class="switch">
                <input id="ic_checkout_discount" name="ic_design_checkout[ic_checkout_discount]" type="checkbox" value="1" ' . checked( isset( $options['ic_checkout_discount'] ), true, false ) . ' />
                <span class="slider round"></span>
              </label>';
    }
}

if ( ! function_exists( 'ic_mini_cart_enable_callback' ) ) {
    function ic_mini_cart_enable_callback() {
        $options = get_option( 'ic_design_mini_cart' );

        echo '<div class="form-group">
                <label class="switch">
                <input id="ic_mini_cart_enabled" name="ic_design_mini_cart[ic_mini_cart_enabled]" type="checkbox" value="1" ' . checked( isset( $options['ic_mini_cart_enabled'] ), true, false ) . ' />
                <span class="slider round"></span>
              </label>';
    }
}

if ( ! function_exists( 'ic_mini_cart_floating_enable_callback' ) ) {
    function ic_mini_cart_floating_enable_callback() {
        $options = get_option( 'ic_design_mini_cart' );

        echo '<div class="form-group">
                <label class="switch">
                <input id="ic_mini_cart_floating_enabled" name="ic_design_mini_cart[ic_mini_cart_floating_enabled]" type="checkbox" value="1" ' . checked( isset( $options['ic_mini_cart_floating_enabled'] ), true, false ) . ' />
                <span class="slider round"></span>
              </label>';
    }
}

if ( ! function_exists( 'ic_mini_cart_messages_callback' ) ) {
    function ic_mini_cart_messages_callback() {
        $options = get_option( 'ic_design_mini_cart' );

        echo '<div class="form-group">
                <label class="switch">
                <input id="ic_mini_cart_messages" name="ic_design_mini_cart[ic_mini_cart_messages]" type="checkbox" value="1" ' . checked( isset( $options['ic_mini_cart_messages'] ), true, false ) . ' />
                <span class="slider round"></span>
              </label>';
    }
}

if ( ! function_exists( 'ic_mini_cart_shipping_message_callback' ) ) {
    function ic_mini_cart_shipping_message_callback() {
        $options = get_option( 'ic_design_mini_cart' );

        $shipping_message = '';
        if ( isset( $options[ 'ic_mini_cart_shipping_message' ] ) ) {
            $shipping_message = esc_attr( $options[ 'ic_mini_cart_shipping_message' ] );
        }

        echo '<div class="form-group shipping-message-cont"> 
                <input class="shipping-message" name="ic_design_mini_cart[ic_mini_cart_shipping_message]" type="text" value="' . $shipping_message .'" />
              </div>';
    }
}

if ( ! function_exists( 'ic_mini_cart_bottom_message_callback' ) ) {
    function ic_mini_cart_bottom_message_callback() {
        $options = get_option( 'ic_design_mini_cart' );

        $bottom_message = '';
        if ( isset( $options[ 'ic_mini_cart_bottom_message' ] ) ) {
            $bottom_message = esc_attr( $options[ 'ic_mini_cart_bottom_message' ] );
        }

        echo '<div class="form-group"> 
                <input class="bottom-message" name="ic_design_mini_cart[ic_mini_cart_bottom_message]" type="text" value="' . $bottom_message .'" />
              </div>';
    }
}

if ( ! function_exists( 'ic_mini_cart_enable_coupons_callback' ) ) {
    function ic_mini_cart_enable_coupons_callback() {
        $options = get_option( 'ic_design_mini_cart' );

        echo '<div class="form-group">
                <label class="switch">
                <input id="ic_mini_cart_enable_coupons" name="ic_design_mini_cart[ic_mini_cart_enable_coupons]" type="checkbox" value="1" ' . checked( isset( $options['ic_mini_cart_enable_coupons'] ), true, false ) . ' />
                <span class="slider round"></span>
              </label>';
    }
}

if ( ! function_exists( 'ic_mini_cart_enable_progressbar_callback' ) ) {
    function ic_mini_cart_enable_progressbar_callback() {
        $options = get_option( 'ic_design_mini_cart' );

        $ic_mini_cart_enable_progressbar = '';
        if ( isset( $options[ 'ic_mini_cart_enable_progressbar' ] ) ) {
            $ic_mini_cart_enable_progressbar = esc_attr( $options[ 'ic_mini_cart_enable_progressbar' ] );
        }

        echo '<div class="form-group">
                <label class="switch">
                <input id="ic_mini_cart_enable_progressbar" name="ic_design_mini_cart[ic_mini_cart_enable_progressbar]" type="checkbox" value="1" ' . checked( isset( $ic_mini_cart_enable_progressbar ), true, false ) . ' />
                <span class="slider round"></span>
              </label></div>';
    }
}

if ( ! function_exists( 'ic_mini_cart_progress_value_callback' ) ) {
    function ic_mini_cart_progress_value_callback() {
        $options = get_option( 'ic_design_mini_cart' );

        $cart_progress_value = '';
        if ( isset( $options[ 'ic_mini_cart_progress_value' ] ) ) {
            $cart_progress_value = esc_attr( $options[ 'ic_mini_cart_progress_value' ] );
        }
        echo '<div class="form-group"> 
                <input class="cartprogress-value" name="ic_design_mini_cart[ic_mini_cart_progress_value]" type="number" value="' . $cart_progress_value .'" />
              </div>';
    }
}

if ( ! function_exists( 'ic_mini_cart_recommendations_callback' ) ) {
    function ic_mini_cart_recommendations_callback() {
        $options = get_option( 'ic_design_mini_cart' );

        echo '<div class="form-group">
                <label class="switch">
                <input id="ic_mini_cart_recommendations" name="ic_design_mini_cart[ic_mini_cart_recommendations]" type="checkbox" value="1" ' . checked( isset( $options['ic_mini_cart_recommendations'] ), true, false ) . ' />
                <span class="slider round"></span>
              </label>';
    }
}

if ( ! function_exists( 'ic_mini_cart_recommendations_title_callback' ) ) {
    function ic_mini_cart_recommendations_title_callback() {
        $options = get_option( 'ic_design_mini_cart' );

        $recommendations_title = '';
        if ( isset( $options[ 'ic_mini_cart_recommendations_title' ] ) ) {
            $recommendations_title = esc_attr( $options[ 'ic_mini_cart_recommendations_title' ] );
        }

        echo '<div class="form-group"> 
                <input class="recommendations-title" name="ic_design_mini_cart[ic_mini_cart_recommendations_title]" type="text" value="' . $recommendations_title .'" />
              </div>';
    }
}

if ( ! function_exists( 'ic_mini_cart_recommendations_type_callback' ) ) {
    function ic_mini_cart_recommendations_type_callback() {
        $options = get_option( 'ic_design_mini_cart' );

        $recommendations_type = '';
        if ( isset( $options[ 'ic_mini_cart_recommendations_type' ] ) ) {
            $recommendations_type = esc_attr( $options[ 'ic_mini_cart_recommendations_type' ] );
        }

        $selected1 = '';
        $selected2 = '';
        $selected3 = '';

        switch( $recommendations_type ) {
            case '1': $selected1 = 'selected'; break;
            case '2': $selected2 = 'selected'; break;
            case '3': $selected3 = 'selected'; break;
            default : $selected1 = 'selected'; break;
        }

        echo '  <select id="recommendations-type" name="ic_design_mini_cart[ic_mini_cart_recommendations_type]">
                  <option value="1" ' . $selected1 . ' >Upsells</option>
                  <option value="2" ' . $selected2 . ' >Custom Product</option>
                  <option value="3" ' . $selected3 . ' >Show random products</option>
                </select>
              </div>
              <div class="form-group">';

    }
}

if ( ! function_exists( 'ic_mini_cart_primary_button_callback' ) ) {
    function ic_mini_cart_primary_button_callback() {
        $options = get_option( 'ic_design_mini_cart' );

        $primary_button = '';
        if ( isset( $options[ 'ic_mini_cart_primary_button' ] ) ) {
            $primary_button = esc_attr( $options[ 'ic_mini_cart_primary_button' ] );
        }

        echo '<div class="form-group"> 
                <input class="primary-button" name="ic_design_mini_cart[ic_mini_cart_primary_button]" type="text" value="' . $primary_button .'" />
              </div>';
    }
}

if ( ! function_exists( 'ic_mini_cart_enable_secondary_button_callback' ) ) {
    function ic_mini_cart_enable_secondary_button_callback() {
        $options = get_option( 'ic_design_mini_cart' );

        echo '<div class="form-group">
                <label class="switch">
                <input id="ic_mini_cart_enable_secondary_button" name="ic_design_mini_cart[ic_mini_cart_enable_secondary_button]" type="checkbox" value="1" ' . checked( isset( $options['ic_mini_cart_enable_secondary_button'] ), true, false ) . ' />
                <span class="slider round"></span>
              </label>';
    }
}

if ( ! function_exists( 'ic_mini_cart_secondary_button_callback' ) ) {
    function ic_mini_cart_secondary_button_callback() {
        $options = get_option( 'ic_design_mini_cart' );

        $secondary_button = '';
        if ( isset( $options[ 'ic_mini_cart_secondary_button' ] ) ) {
            $secondary_button = esc_attr( $options[ 'ic_mini_cart_secondary_button' ] );
        }

        echo '<div class="form-group"> 
                <input class="secondary-button" name="ic_design_mini_cart[ic_mini_cart_secondary_button]" type="text" value="' . $secondary_button .'" />
              </div>';
    }
}

//if ( ! function_exists( 'ic_ty_enable_reviews_callback' ) ) {
//    function ic_ty_enable_reviews_callback() {
//        $options = get_option( 'ic_design_ty' );
//
//        echo '<div class="form-group">
//                <label class="switch">
//                <input id="ic_ty_enable_reviews" name="ic_design_ty[ic_ty_enable_reviews]" type="checkbox" value="1" ' . checked( isset( $options['ic_ty_enable_reviews'] ), true, false ) . ' />
//                <span class="slider round"></span>
//              </label>';
//    }
//}

if ( ! function_exists( 'ic_ty_enable_nl_callback' ) ) {
    function ic_ty_enable_nl_callback() {
        $options = get_option( 'ic_design_ty' );

        echo '<div class="form-group">
                <label class="switch">
                <input id="ic_ty_enable_nl" name="ic_design_ty[ic_ty_enable_nl]" type="checkbox" value="1" ' . checked( isset( $options['ic_ty_enable_nl'] ), true, false ) . ' />
                <span class="slider round"></span>
              </label>';
    }
}

if ( ! function_exists( 'ic_ty_purchase_note_callback' ) ) {
    function ic_ty_purchase_note_callback() {
        $options = get_option( 'ic_design_ty' );

        $purchase_note = '';
        if ( isset( $options[ 'ic_ty_purchase_note' ] ) ) {
            $purchase_note = esc_attr( $options[ 'ic_ty_purchase_note' ] );
        }

        echo '<div class="form-group"> 
                <input class="ic_ty_purchase_note" name="ic_design_ty[ic_ty_purchase_note]" type="text" value="' . $purchase_note .'" />
              </div>';
    }
}

if ( ! function_exists( 'ic_ty_redirect_page_callback' ) ) {
    function ic_ty_redirect_page_callback() {
        $options = get_option( 'ic_design_ty' );

        $redirect_page = '';
        if ( isset( $options[ 'ic_ty_redirect_page' ] ) ) {
            $redirect_page = esc_attr( $options[ 'ic_ty_redirect_page' ] );
        }

        echo '<div class="form-group"> 
                <input class="ic_ty_redirect_page" name="ic_design_ty[ic_ty_redirect_page]" type="text" value="' . $redirect_page .'" />
              </div>';
    }
}

if ( ! function_exists( 'ic_ty_contact_us_link_callback' ) ) {
    function ic_ty_contact_us_link_callback() {
        $options = get_option( 'ic_design_ty' );

        $contact_us_link = '';
        if ( isset( $options[ 'ic_ty_contact_us_link' ] ) ) {
            $contact_us_link = esc_attr( $options[ 'ic_ty_contact_us_link' ] );
        }

        echo '<div class="form-group"> 
                <input class="ic_ty_contact_us_link" name="ic_design_ty[ic_ty_contact_us_link]" type="text" value="' . $contact_us_link .'" />
              </div>';
    }
}





















if ( ! function_exists( 'ic_design_ct_section_callback' ) ) {
    function ic_design_ct_section_callback() {
        ?>
            <div class="translation-title"><h3>Checkout</h3></div>
        <?php
    }
}


if ( ! function_exists( 'ic_ct_c_page_title_callback' ) ) {
    function ic_ct_c_page_title_callback() {
        $options = get_option( 'ic_design_custom_text' );

        $value = '';
        if ( isset( $options[ 'ic_ct_c_page_title' ] ) ) {
            $value = esc_attr( $options[ 'ic_ct_c_page_title' ] );
        }

        echo '
                <div class="form-group"> 
                <input class="ic_ct_c" name="ic_design_custom_text[ic_ct_c_page_title]" type="text" value="' . $value .'" />
              </div>';
    }
}

//if ( ! function_exists( 'ic_ct_c_error_page_title_callback' ) ) {
//    function ic_ct_c_error_page_title_callback() {
//        $options = get_option( 'ic_design_custom_text' );
//
//        $value = '';
//        if ( isset( $options[ 'ic_ct_c_error_page_title' ] ) ) {
//            $value = esc_attr( $options[ 'ic_ct_c_error_page_title' ] );
//        }
//
//        echo '<div class="form-group">
//                <input class="ic_ct_c" name="ic_design_custom_text[ic_ct_c_error_page_title]" type="text" value="' . $value .'" />
//              </div>';
//    }
//}

//if ( ! function_exists( 'ic_ct_c_breadcrumb_callback' ) ) {
//    function ic_ct_c_breadcrumb_callback() {
//        $options = get_option( 'ic_design_custom_text' );
//
//        $value = '';
//        if ( isset( $options[ 'ic_ct_c_breadcrumb' ] ) ) {
//            $value = esc_attr( $options[ 'ic_ct_c_breadcrumb' ] );
//        }
//
//        echo '<div class="form-group">
//                <input class="ic_ct_c" name="ic_design_custom_text[ic_ct_c_breadcrumb]" type="text" value="' . $value .'" />
//              </div>';
//    }
//}

if ( ! function_exists( 'ic_ct_c_out_of_stock_callback' ) ) {
    function ic_ct_c_out_of_stock_callback() {
        $options = get_option( 'ic_design_custom_text' );

        $value = '';
        if ( isset( $options[ 'ic_ct_c_out_of_stock' ] ) ) {
            $value = esc_attr( $options[ 'ic_ct_c_out_of_stock' ] );
        }

        echo '<div class="form-group">
                <input class="ic_ct_c" name="ic_design_custom_text[ic_ct_c_out_of_stock]" type="text" value="' . $value .'" />
              </div>';
    }
}

if ( ! function_exists( 'ic_ct_c_log_in_button_label_callback' ) ) {
    function ic_ct_c_log_in_button_label_callback() {
        $options = get_option( 'ic_design_custom_text' );

        $value = '';
        if ( isset( $options[ 'ic_ct_c_log_in_button_label' ] ) ) {
            $value = esc_attr( $options[ 'ic_ct_c_log_in_button_label' ] );
        }

        echo '<div class="form-group"> 
                <input class="ic_ct_c" name="ic_design_custom_text[ic_ct_c_log_in_button_label]" type="text" value="' . $value .'" />
              </div>';
    }
}

if ( ! function_exists( 'ic_ct_c_shipping_address_label_callback' ) ) {
    function ic_ct_c_shipping_address_label_callback() {
        $options = get_option( 'ic_design_custom_text' );

        $value = '';
        if ( isset( $options[ 'ic_ct_c_shipping_address_label' ] ) ) {
            $value = esc_attr( $options[ 'ic_ct_c_shipping_address_label' ] );
        }

        echo '<div class="form-group"> 
                <input class="ic_ct_c" name="ic_design_custom_text[ic_ct_c_shipping_address_label]" type="text" value="' . $value .'" />
              </div>';
    }
}

if ( ! function_exists( 'ic_ct_c_already_have_an_account_label_callback' ) ) {
    function ic_ct_c_already_have_an_account_label_callback() {
        $options = get_option( 'ic_design_custom_text' );

        $value = '';
        if ( isset( $options[ 'ic_ct_c_already_have_an_account_label' ] ) ) {
            $value = esc_attr( $options[ 'ic_ct_c_already_have_an_account_label' ] );
        }

        echo '<div class="form-group"> 
                <input class="ic_ct_c" name="ic_design_custom_text[ic_ct_c_already_have_an_account_label]" type="text" value="' . $value .'" />
              </div>';
    }
}

if ( ! function_exists( 'ic_ct_c_continue_to_delivery_button_label_callback' ) ) {
    function ic_ct_c_continue_to_delivery_button_label_callback() {
        $options = get_option( 'ic_design_custom_text' );

        $value = '';
        if ( isset( $options[ 'ic_ct_c_continue_to_delivery_button_label' ] ) ) {
            $value = esc_attr( $options[ 'ic_ct_c_continue_to_delivery_button_label' ] );
        }

        echo '<div class="form-group"> 
                <input class="ic_ct_c" name="ic_design_custom_text[ic_ct_c_continue_to_delivery_button_label]" type="text" value="' . $value .'" />
              </div>';
    }
}

if ( ! function_exists( 'ic_ct_c_continue_to_payment_button_label_callback' ) ) {
    function ic_ct_c_continue_to_payment_button_label_callback() {
        $options = get_option( 'ic_design_custom_text' );

        $value = '';
        if ( isset( $options[ 'ic_ct_c_continue_to_payment_button_label' ] ) ) {
            $value = esc_attr( $options[ 'ic_ct_c_continue_to_payment_button_label' ] );
        }

        echo '<div class="form-group"> 
                <input class="ic_ct_c" name="ic_design_custom_text[ic_ct_c_continue_to_payment_button_label]" type="text" value="' . $value .'" />
              </div>';
    }
}

if ( ! function_exists( 'ic_ct_c_mobile_show_summary_label_callback' ) ) {
    function ic_ct_c_mobile_show_summary_label_callback() {
        $options = get_option( 'ic_design_custom_text' );

        $value = '';
        if ( isset( $options[ 'ic_ct_c_mobile_show_summary_label' ] ) ) {
            $value = esc_attr( $options[ 'ic_ct_c_mobile_show_summary_label' ] );
        }

        echo '<div class="form-group"> 
                <input class="ic_ct_c" name="ic_design_custom_text[ic_ct_c_mobile_show_summary_label]" type="text" value="' . $value .'" />
              </div>';
    }
}

if ( ! function_exists( 'ic_ct_c_mobile_hide_summary_label_callback' ) ) {
    function ic_ct_c_mobile_hide_summary_label_callback() {
        $options = get_option( 'ic_design_custom_text' );

        $value = '';
        if ( isset( $options[ 'ic_ct_c_mobile_hide_summary_label' ] ) ) {
            $value = esc_attr( $options[ 'ic_ct_c_mobile_hide_summary_label' ] );
        }

        echo '<div class="form-group"> 
                <input class="ic_ct_c" name="ic_design_custom_text[ic_ct_c_mobile_hide_summary_label]" type="text" value="' . $value .'" />
              </div>';
    }
}

if ( ! function_exists( 'ic_ct_c_first_name_callback' ) ) {
    function ic_ct_c_first_name_callback() {
        $options = get_option( 'ic_design_custom_text' );

        $value = '';
        if ( isset( $options[ 'ic_ct_c_first_name' ] ) ) {
            $value = esc_attr( $options[ 'ic_ct_c_first_name' ] );
        }

        echo '<div class="form-group"> 
                <input class="ic_ct_c" name="ic_design_custom_text[ic_ct_c_first_name]" type="text" value="' . $value .'" />
              </div>';
    }
}

if ( ! function_exists( 'ic_ct_c_last_name_callback' ) ) {
    function ic_ct_c_last_name_callback() {
        $options = get_option( 'ic_design_custom_text' );

        $value = '';
        if ( isset( $options[ 'ic_ct_c_last_name' ] ) ) {
            $value = esc_attr( $options[ 'ic_ct_c_last_name' ] );
        }

        echo '<div class="form-group"> 
                <input class="ic_ct_c" name="ic_design_custom_text[ic_ct_c_last_name]" type="text" value="' . $value .'" />
              </div>';
    }
}

if ( ! function_exists( 'ic_ct_c_email_callback' ) ) {
    function ic_ct_c_email_callback() {
        $options = get_option( 'ic_design_custom_text' );

        $value = '';
        if ( isset( $options[ 'ic_ct_c_email' ] ) ) {
            $value = esc_attr( $options[ 'ic_ct_c_email' ] );
        }

        echo '<div class="form-group"> 
                <input class="ic_ct_c" name="ic_design_custom_text[ic_ct_c_email]" type="text" value="' . $value .'" />
              </div>';
    }
}

if ( ! function_exists( 'ic_ct_c_phone_callback' ) ) {
    function ic_ct_c_phone_callback() {
        $options = get_option( 'ic_design_custom_text' );

        $value = '';
        if ( isset( $options[ 'ic_ct_c_phone' ] ) ) {
            $value = esc_attr( $options[ 'ic_ct_c_phone' ] );
        }

        echo '<div class="form-group"> 
                <input class="ic_ct_c" name="ic_design_custom_text[ic_ct_c_phone]" type="text" value="' . $value .'" />
              </div>';
    }
}

if ( ! function_exists( 'ic_ct_c_company_callback' ) ) {
    function ic_ct_c_company_callback() {
        $options = get_option( 'ic_design_custom_text' );

        $value = '';
        if ( isset( $options[ 'ic_ct_c_company' ] ) ) {
            $value = esc_attr( $options[ 'ic_ct_c_company' ] );
        }

        echo '<div class="form-group"> 
                <input class="ic_ct_c" name="ic_design_custom_text[ic_ct_c_company]" type="text" value="' . $value .'" />
              </div>';
    }
}
if ( ! function_exists( 'ic_ct_c_street_address_callback' ) ) {
    function ic_ct_c_street_address_callback() {
        $options = get_option( 'ic_design_custom_text' );

        $value = '';
        if ( isset( $options[ 'ic_ct_c_street_address' ] ) ) {
            $value = esc_attr( $options[ 'ic_ct_c_street_address' ] );
        }

        echo '<div class="form-group"> 
                <input class="ic_ct_c" name="ic_design_custom_text[ic_ct_c_street_address]" type="text" value="' . $value .'" />
              </div>';
    }
}

if ( ! function_exists( 'ic_ct_c_apartment_suite_callback' ) ) {
    function ic_ct_c_apartment_suite_callback() {
        $options = get_option( 'ic_design_custom_text' );

        $value = '';
        if ( isset( $options[ 'ic_ct_c_apartment_suite' ] ) ) {
            $value = esc_attr( $options[ 'ic_ct_c_apartment_suite' ] );
        }

        echo '<div class="form-group"> 
                <input class="ic_ct_c" name="ic_design_custom_text[ic_ct_c_apartment_suite]" type="text" value="' . $value .'" />
              </div>';
    }
}

if ( ! function_exists( 'ic_ct_c_city_callback' ) ) {
    function ic_ct_c_city_callback() {
        $options = get_option( 'ic_design_custom_text' );

        $value = '';
        if ( isset( $options[ 'ic_ct_c_city' ] ) ) {
            $value = esc_attr( $options[ 'ic_ct_c_city' ] );
        }

        echo '<div class="form-group"> 
                <input class="ic_ct_c" name="ic_design_custom_text[ic_ct_c_city]" type="text" value="' . $value .'" />
              </div>';
    }
}

if ( ! function_exists( 'ic_ct_c_zip_code_callback' ) ) {
    function ic_ct_c_zip_code_callback() {
        $options = get_option( 'ic_design_custom_text' );

        $value = '';
        if ( isset( $options[ 'ic_ct_c_zip_code' ] ) ) {
            $value = esc_attr( $options[ 'ic_ct_c_zip_code' ] );
        }

        echo '<div class="form-group"> 
                <input class="ic_ct_c" name="ic_design_custom_text[ic_ct_c_zip_code]" type="text" value="' . $value .'" />
              </div>';
    }
}

if ( ! function_exists( 'ic_ct_c_country_callback' ) ) {
    function ic_ct_c_country_callback() {
        $options = get_option( 'ic_design_custom_text' );

        $value = '';
        if ( isset( $options[ 'ic_ct_c_country' ] ) ) {
            $value = esc_attr( $options[ 'ic_ct_c_country' ] );
        }

        echo '<div class="form-group"> 
                <input class="ic_ct_c" name="ic_design_custom_text[ic_ct_c_country]" type="text" value="' . $value .'" />
              </div>';
    }
}

if ( ! function_exists( 'ic_ct_c_state_label_callback' ) ) {
    function ic_ct_c_state_label_callback() {
        $options = get_option( 'ic_design_custom_text' );

        $value = '';
        if ( isset( $options[ 'ic_ct_c_state_label' ] ) ) {
            $value = esc_attr( $options[ 'ic_ct_c_state_label' ] );
        }

        echo '<div class="form-group"> 
                <input class="ic_ct_c" name="ic_design_custom_text[ic_ct_c_state_label]" type="text" value="' . $value .'" />
              </div>';
    }
}

//if ( ! function_exists( 'ic_ct_c_subscribe_to_newsletter_callback' ) ) {
//    function ic_ct_c_subscribe_to_newsletter_callback() {
//        $options = get_option( 'ic_design_custom_text' );
//
//        $value = '';
//        if ( isset( $options[ 'ic_ct_c_subscribe_to_newsletter' ] ) ) {
//            $value = esc_attr( $options[ 'ic_ct_c_subscribe_to_newsletter' ] );
//        }
//
//        echo '<div class="form-group">
//                <input class="ic_ct_c" name="ic_design_custom_text[ic_ct_c_subscribe_to_newsletter]" type="text" value="' . $value .'" />
//              </div>';
//    }
//}

if ( ! function_exists( 'ic_ct_c_by_placing_your_order_label_callback' ) ) {
    function ic_ct_c_by_placing_your_order_label_callback() {
        $options = get_option( 'ic_design_custom_text' );

        $value = '';
        if ( isset( $options[ 'ic_ct_c_by_placing_your_order_label' ] ) ) {
            $value = esc_attr( $options[ 'ic_ct_c_by_placing_your_order_label' ] );
        }

        echo '<div class="form-group"> 
                <input class="ic_ct_c" name="ic_design_custom_text[ic_ct_c_by_placing_your_order_label]" type="text" value="' . $value .'" />
              </div>';
    }
}

if ( ! function_exists( 'ic_ct_c_billing_same_as_shipping_label_callback' ) ) {
    function ic_ct_c_billing_same_as_shipping_label_callback() {
        $options = get_option( 'ic_design_custom_text' );

        $value = '';
        if ( isset( $options[ 'ic_ct_c_billing_same_as_shipping_label' ] ) ) {
            $value = esc_attr( $options[ 'ic_ct_c_billing_same_as_shipping_label' ] );
        }

        echo '<div class="form-group"> 
                <input class="ic_ct_c" name="ic_design_custom_text[ic_ct_c_billing_same_as_shipping_label]" type="text" value="' . $value .'" />
              </div>';
    }
}

if ( ! function_exists( 'ic_ct_c_use_different_delivery_address_label_callback' ) ) {
    function ic_ct_c_use_different_delivery_address_label_callback() {
        $options = get_option( 'ic_design_custom_text' );

        $value = '';
        if ( isset( $options[ 'ic_ct_c_use_different_delivery_address_label' ] ) ) {
            $value = esc_attr( $options[ 'ic_ct_c_use_different_delivery_address_label' ] );
        }

        echo '<div class="form-group"> 
                <input class="ic_ct_c" name="ic_design_custom_text[ic_ct_c_use_different_delivery_address_label]" type="text" value="' . $value .'" />
              </div>';
    }
}

if ( ! function_exists( 'ic_ct_c_recommendations_title_callback' ) ) {
    function ic_ct_c_recommendations_title_callback() {
        $options = get_option( 'ic_design_custom_text' );

        $value = '';
        if ( isset( $options[ 'ic_ct_c_recommendations_title' ] ) ) {
            $value = esc_attr( $options[ 'ic_ct_c_recommendations_title' ] );
        }

        echo '<div class="form-group"> 
                <input class="ic_ct_c" name="ic_design_custom_text[ic_ct_c_recommendations_title]" type="text" value="' . $value .'" />
              </div>';
    }
}

if ( ! function_exists( 'ic_ct_c_discount_code_label_callback' ) ) {
    function ic_ct_c_discount_code_label_callback() {
        $options = get_option( 'ic_design_custom_text' );

        $value = '';
        if ( isset( $options[ 'ic_ct_c_discount_code_label' ] ) ) {
            $value = esc_attr( $options[ 'ic_ct_c_discount_code_label' ] );
        }

        echo '<div class="form-group"> 
                <input class="ic_ct_c" name="ic_design_custom_text[ic_ct_c_discount_code_label]" type="text" value="' . $value .'" />
              </div>';
    }
}

if ( ! function_exists( 'ic_ct_c_add_to_cart_button_label_callback' ) ) {
    function ic_ct_c_add_to_cart_button_label_callback() {
        $options = get_option( 'ic_design_custom_text' );

        $value = '';
        if ( isset( $options[ 'ic_ct_c_add_to_cart_button_label' ] ) ) {
            $value = esc_attr( $options[ 'ic_ct_c_add_to_cart_button_label' ] );
        }

        echo '<div class="form-group"> 
                <input class="ic_ct_c" name="ic_design_custom_text[ic_ct_c_add_to_cart_button_label]" type="text" value="' . $value .'" />
              </div>';
    }
}

if ( ! function_exists( 'ic_ct_c_apply_button_label_callback' ) ) {
    function ic_ct_c_apply_button_label_callback() {
        $options = get_option( 'ic_design_custom_text' );

        $value = '';
        if ( isset( $options[ 'ic_ct_c_apply_button_label' ] ) ) {
            $value = esc_attr( $options[ 'ic_ct_c_apply_button_label' ] );
        }

        echo '<div class="form-group"> 
                <input class="ic_ct_c" name="ic_design_custom_text[ic_ct_c_apply_button_label]" type="text" value="' . $value .'" />
              </div>';
    }
}

if ( ! function_exists( 'ic_ct_c_subtotal_label_callback' ) ) {
    function ic_ct_c_subtotal_label_callback() {
        $options = get_option( 'ic_design_custom_text' );

        $value = '';
        if ( isset( $options[ 'ic_ct_c_subtotal_label' ] ) ) {
            $value = esc_attr( $options[ 'ic_ct_c_subtotal_label' ] );
        }

        echo '<div class="form-group"> 
                <input class="ic_ct_c" name="ic_design_custom_text[ic_ct_c_subtotal_label]" type="text" value="' . $value .'" />
              </div>';
    }
}

if ( ! function_exists( 'ic_ct_c_taxes_label_callback' ) ) {
    function ic_ct_c_taxes_label_callback() {
        $options = get_option( 'ic_design_custom_text' );

        $value = '';
        if ( isset( $options[ 'ic_ct_c_taxes_label' ] ) ) {
            $value = esc_attr( $options[ 'ic_ct_c_taxes_label' ] );
        }

        echo '<div class="form-group"> 
                <input class="ic_ct_c" name="ic_design_custom_text[ic_ct_c_taxes_label]" type="text" value="' . $value .'" />
              </div>';
    }
}

if ( ! function_exists( 'ic_ct_c_shipping_label_callback' ) ) {
    function ic_ct_c_shipping_label_callback() {
        $options = get_option( 'ic_design_custom_text' );

        $value = '';
        if ( isset( $options[ 'ic_ct_c_shipping_label' ] ) ) {
            $value = esc_attr( $options[ 'ic_ct_c_shipping_label' ] );
        }

        echo '<div class="form-group"> 
                <input class="ic_ct_c" name="ic_design_custom_text[ic_ct_c_shipping_label]" type="text" value="' . $value .'" />
              </div>';
    }
}

if ( ! function_exists( 'ic_ct_c_return_to_delivery_label_callback' ) ) {
    function ic_ct_c_return_to_delivery_label_callback() {
        $options = get_option( 'ic_design_custom_text' );

        $value = '';
        if ( isset( $options[ 'ic_ct_c_return_to_delivery_label' ] ) ) {
            $value = esc_attr( $options[ 'ic_ct_c_return_to_delivery_label' ] );
        }

        echo '<div class="form-group"> 
                <input class="ic_ct_c" name="ic_design_custom_text[ic_ct_c_return_to_delivery_label]" type="text" value="' . $value .'" />
              </div>';
    }
}

if ( ! function_exists( 'ic_ct_c_return_to_shipping_label_callback' ) ) {
    function ic_ct_c_return_to_shipping_label_callback() {
        $options = get_option( 'ic_design_custom_text' );

        $value = '';
        if ( isset( $options[ 'ic_ct_c_return_to_shipping_label' ] ) ) {
            $value = esc_attr( $options[ 'ic_ct_c_return_to_shipping_label' ] );
        }

        echo '<div class="form-group"> 
                <input class="ic_ct_c" name="ic_design_custom_text[ic_ct_c_return_to_shipping_label]" type="text" value="' . $value .'" />
              </div>';
    }
}

if ( ! function_exists( 'ic_ct_c_order_summary_label_callback' ) ) {
    function ic_ct_c_order_summary_label_callback() {
        $options = get_option( 'ic_design_custom_text' );

        $value = '';
        if ( isset( $options[ 'ic_ct_c_order_summary_label' ] ) ) {
            $value = esc_attr( $options[ 'ic_ct_c_order_summary_label' ] );
        }

        echo '<div class="form-group"> 
                <input class="ic_ct_c" name="ic_design_custom_text[ic_ct_c_order_summary_label]" type="text" value="' . $value .'" />
              </div>';
    }
}

if ( ! function_exists( 'ic_ct_c_discount_label_callback' ) ) {
    function ic_ct_c_discount_label_callback() {
        $options = get_option( 'ic_design_custom_text' );

        $value = '';
        if ( isset( $options[ 'ic_ct_c_discount_label' ] ) ) {
            $value = esc_attr( $options[ 'ic_ct_c_discount_label' ] );
        }

        echo '<div class="form-group"> 
                <input class="ic_ct_c" name="ic_design_custom_text[ic_ct_c_discount_label]" type="text" value="' . $value .'" />
              </div>';
    }
}

if ( ! function_exists( 'ic_ct_c_payment_method_label_callback' ) ) {
    function ic_ct_c_payment_method_label_callback() {
        $options = get_option( 'ic_design_custom_text' );

        $value = '';
        if ( isset( $options[ 'ic_ct_c_payment_method_label' ] ) ) {
            $value = esc_attr( $options[ 'ic_ct_c_payment_method_label' ] );
        }

        echo '<div class="form-group"> 
                <input class="ic_ct_c" name="ic_design_custom_text[ic_ct_c_payment_method_label]" type="text" value="' . $value .'" />
              </div>';
    }
}

if ( ! function_exists( 'ic_ct_c_total_label_callback' ) ) {
    function ic_ct_c_total_label_callback() {
        $options = get_option( 'ic_design_custom_text' );

        $value = '';
        if ( isset( $options[ 'ic_ct_c_total_label' ] ) ) {
            $value = esc_attr( $options[ 'ic_ct_c_total_label' ] );
        }

        echo '<div class="form-group"> 
                <input class="ic_ct_c" name="ic_design_custom_text[ic_ct_c_total_label]" type="text" value="' . $value .'" />
              </div>';
    }
}

if ( ! function_exists( 'ic_ct_c_confirm_order_button_label_callback' ) ) {
    function ic_ct_c_confirm_order_button_label_callback() {
        $options = get_option( 'ic_design_custom_text' );

        $value = '';
        if ( isset( $options[ 'ic_ct_c_confirm_order_button_label' ] ) ) {
            $value = esc_attr( $options[ 'ic_ct_c_confirm_order_button_label' ] );
        }

        echo '<div class="form-group"> 
                <input class="ic_ct_c" name="ic_design_custom_text[ic_ct_c_confirm_order_button_label]" type="text" value="' . $value .'" />
              </div>';
    }
}

if ( ! function_exists( 'ic_ct_c_complete_order_button_label_callback' ) ) {
    function ic_ct_c_complete_order_button_label_callback() {
        $options = get_option( 'ic_design_custom_text' );

        $value = '';
        if ( isset( $options[ 'ic_ct_c_complete_order_button_label' ] ) ) {
            $value = esc_attr( $options[ 'ic_ct_c_complete_order_button_label' ] );
        }

        echo '<div class="form-group"> 
                <input class="ic_ct_c" name="ic_design_custom_text[ic_ct_c_complete_order_button_label]" type="text" value="' . $value .'" />
              </div>';
    }
}

if ( ! function_exists( 'ic_ct_c_show_more_credit_cards_label_callback' ) ) {
    function ic_ct_c_show_more_credit_cards_label_callback() {
        $options = get_option( 'ic_design_custom_text' );

        $value = '';
        if ( isset( $options[ 'ic_ct_c_show_more_credit_cards_label' ] ) ) {
            $value = esc_attr( $options[ 'ic_ct_c_show_more_credit_cards_label' ] );
        }

        echo '<div class="form-group"> 
                <input class="ic_ct_c" name="ic_design_custom_text[ic_ct_c_show_more_credit_cards_label]" type="text" value="' . $value .'" />
              </div>';
    }
}

if ( ! function_exists( 'ic_ct_c_delivery_label_callback' ) ) {
    function ic_ct_c_delivery_label_callback() {
        $options = get_option( 'ic_design_custom_text' );

        $value = '';
        if ( isset( $options[ 'ic_ct_c_delivery_label' ] ) ) {
            $value = esc_attr( $options[ 'ic_ct_c_delivery_label' ] );
        }

        echo '<div class="form-group"> 
                <input class="ic_ct_c" name="ic_design_custom_text[ic_ct_c_delivery_label]" type="text" value="' . $value .'" />
              </div>';
    }
}

if ( ! function_exists( 'ic_ct_c_continue_button_label_callback' ) ) {
    function ic_ct_c_continue_button_label_callback() {
        $options = get_option( 'ic_design_custom_text' );

        $value = '';
        if ( isset( $options[ 'ic_ct_c_continue_button_label' ] ) ) {
            $value = esc_attr( $options[ 'ic_ct_c_continue_button_label' ] );
        }

        echo '<div class="form-group"> 
                <input class="ic_ct_c" name="ic_design_custom_text[ic_ct_c_continue_button_label]" type="text" value="' . $value .'" />
              </div>';
    }
}

if ( ! function_exists( 'ic_ct_c_return_button_label_callback' ) ) {
    function ic_ct_c_return_button_label_callback() {
        $options = get_option( 'ic_design_custom_text' );

        $value = '';
        if ( isset( $options[ 'ic_ct_c_return_button_label' ] ) ) {
            $value = esc_attr( $options[ 'ic_ct_c_return_button_label' ] );
        }

        echo '<div class="form-group"> 
                <input class="ic_ct_c" name="ic_design_custom_text[ic_ct_c_return_button_label]" type="text" value="' . $value .'" />
              </div>';
    }
}

if ( ! function_exists( 'ic_ct_c_first_name_error_label_callback' ) ) {
    function ic_ct_c_first_name_error_label_callback() {
        $options = get_option( 'ic_design_custom_text' );

        $value = '';
        if ( isset( $options[ 'ic_ct_c_first_name_error_label' ] ) ) {
            $value = esc_attr( $options[ 'ic_ct_c_first_name_error_label' ] );
        }

        echo '<div class="form-group"> 
                <input class="ic_ct_c" name="ic_design_custom_text[ic_ct_c_first_name_error_label]" type="text" value="' . $value .'" />
              </div>';
    }
}

if ( ! function_exists( 'ic_ct_c_payment_label_callback' ) ) {
    function ic_ct_c_payment_label_callback() {
        $options = get_option( 'ic_design_custom_text' );

        $value = '';
        if ( isset( $options[ 'ic_ct_c_payment_label' ] ) ) {
            $value = esc_attr( $options[ 'ic_ct_c_payment_label' ] );
        }

        echo '<div class="form-group"> 
                <input class="ic_ct_c" name="ic_design_custom_text[ic_ct_c_payment_label]" type="text" value="' . $value .'" />
              </div>';
    }
}

//add extras t
if ( ! function_exists( 'ic_ct_c_add_extras_title_callback' ) ) {
    function ic_ct_c_add_extras_title_callback() {
        $options = get_option( 'ic_design_custom_text' );

        $value = '';
        if ( isset( $options[ 'ic_ct_c_add_extras_title' ] ) ) {
            $value = esc_attr( $options[ 'ic_ct_c_add_extras_title' ] );
        }

        echo '<div class="form-group"> 
                <input class="ic_ct_c" name="ic_design_custom_text[ic_ct_c_add_extras_title]" type="text" value="' . $value .'" />
              </div>';
    }
}

if ( ! function_exists( 'ic_ct_c_add_extras_description_callback' ) ) {
    function ic_ct_c_add_extras_description_callback() {
        $options = get_option( 'ic_design_custom_text' );

        $value = '';
        if ( isset( $options[ 'ic_ct_c_add_extras_description' ] ) ) {
            $value = esc_attr( $options[ 'ic_ct_c_add_extras_description' ] );
        }

        echo '<div class="form-group"> 
                <input class="ic_ct_c" name="ic_design_custom_text[ic_ct_c_add_extras_description]" type="text" value="' . $value .'" />
              </div>';
    }
}

if ( ! function_exists( 'ic_ct_c_add_extra_product_title_callback' ) ) {
    function ic_ct_c_add_extra_product_title_callback() {
        $options = get_option( 'ic_design_custom_text' );

        $value = '';
        if ( isset( $options[ 'ic_ct_c_add_extra_product_title' ] ) ) {
            $value = esc_attr( $options[ 'ic_ct_c_add_extra_product_title' ] );
        }

        echo '<div class="form-group"> 
                <input class="ic_ct_c" name="ic_design_custom_text[ic_ct_c_add_extra_product_title]" type="text" value="' . $value .'" />
              </div>';
    }
}

if ( ! function_exists( 'ic_ct_c_add_extra_product_description_callback' ) ) {
    function ic_ct_c_add_extra_product_description_callback() {
        $options = get_option( 'ic_design_custom_text' );

        $value = '';
        if ( isset( $options[ 'ic_ct_c_add_extra_product_description' ] ) ) {
            $value = esc_attr( $options[ 'ic_ct_c_add_extra_product_description' ] );
        }

        echo '<div class="form-group"> 
                <input class="ic_ct_c" name="ic_design_custom_text[ic_ct_c_add_extra_product_description]" type="text" value="' . $value .'" />
              </div>';
    }
}

if ( ! function_exists( 'ic_ct_c_email_error_label_callback' ) ) {
    function ic_ct_c_email_error_label_callback() {
        $options = get_option( 'ic_design_custom_text' );

        $value = '';
        if ( isset( $options[ 'ic_ct_c_email_error_label' ] ) ) {
            $value = esc_attr( $options[ 'ic_ct_c_email_error_label' ] );
        }

        echo '<div class="form-group"> 
                <input class="ic_ct_c" name="ic_design_custom_text[ic_ct_c_email_error_label]" type="text" value="' . $value .'" />
              </div>';
    }
}

if ( ! function_exists( 'ic_ct_c_last_name_error_label_callback' ) ) {
    function ic_ct_c_last_name_error_label_callback() {
        $options = get_option( 'ic_design_custom_text' );

        $value = '';
        if ( isset( $options[ 'ic_ct_c_last_name_error_label' ] ) ) {
            $value = esc_attr( $options[ 'ic_ct_c_last_name_error_label' ] );
        }

        echo '<div class="form-group"> 
                <input class="ic_ct_c" name="ic_design_custom_text[ic_ct_c_last_name_error_label]" type="text" value="' . $value .'" />
              </div>';
    }
}

if ( ! function_exists( 'ic_ct_c_street_address_error_callback' ) ) {
    function ic_ct_c_street_address_error_callback() {
        $options = get_option( 'ic_design_custom_text' );

        $value = '';
        if ( isset( $options[ 'ic_ct_c_street_address_error' ] ) ) {
            $value = esc_attr( $options[ 'ic_ct_c_street_address_error' ] );
        }

        echo '<div class="form-group"> 
                <input class="ic_ct_c" name="ic_design_custom_text[ic_ct_c_street_address_error]" type="text" value="' . $value .'" />
              </div>';
    }
}

if ( ! function_exists( 'ic_ct_c_city_error_label_callback' ) ) {
    function ic_ct_c_city_error_label_callback() {
        $options = get_option( 'ic_design_custom_text' );

        $value = '';
        if ( isset( $options[ 'ic_ct_c_city_error_label' ] ) ) {
            $value = esc_attr( $options[ 'ic_ct_c_city_error_label' ] );
        }

        echo '<div class="form-group"> 
                <input class="ic_ct_c" name="ic_design_custom_text[ic_ct_c_city_error_label]" type="text" value="' . $value .'" />
              </div>';
    }
}

if ( ! function_exists( 'ic_ct_c_phone_number_error_label_callback' ) ) {
    function ic_ct_c_phone_number_error_label_callback() {
        $options = get_option( 'ic_design_custom_text' );

        $value = '';
        if ( isset( $options[ 'ic_ct_c_phone_number_error_label' ] ) ) {
            $value = esc_attr( $options[ 'ic_ct_c_phone_number_error_label' ] );
        }

        echo '<div class="form-group"> 
                <input class="ic_ct_c" name="ic_design_custom_text[ic_ct_c_phone_number_error_label]" type="text" value="' . $value .'" />
              </div>';
    }
}

if ( ! function_exists( 'ic_ct_c_zip_code_error_label_callback' ) ) {
    function ic_ct_c_zip_code_error_label_callback() {
        $options = get_option( 'ic_design_custom_text' );

        $value = '';
        if ( isset( $options[ 'ic_ct_c_zip_code_error_label' ] ) ) {
            $value = esc_attr( $options[ 'ic_ct_c_zip_code_error_label' ] );
        }

        echo '<div class="form-group"> 
                <input class="ic_ct_c" name="ic_design_custom_text[ic_ct_c_zip_code_error_label]" type="text" value="' . $value .'" />
              </div>
              <div class="translation-title"><h3>Mini cart</h3></div>';
    }
}



if ( ! function_exists( 'ic_ct_mc_page_title_callback' ) ) {
    function ic_ct_mc_page_title_callback() {
        $options = get_option( 'ic_design_custom_text' );

        $value = '';
        if ( isset( $options[ 'ic_ct_mc_page_title' ] ) ) {
            $value = esc_attr( $options[ 'ic_ct_mc_page_title' ] );
        }

        echo '
                <div class="form-group"> 
                <input class="ic_ct_mc" name="ic_design_custom_text[ic_ct_mc_page_title]" type="text" value="' . $value .'" />
              </div>';
    }
}

//if ( ! function_exists( 'ic_ct_mc_shipping_message_callback' ) ) {
//    function ic_ct_mc_shipping_message_callback() {
//        $options = get_option( 'ic_design_custom_text' );
//
//        $value = '';
//        if ( isset( $options[ 'ic_ct_mc_shipping_message' ] ) ) {
//            $value = esc_attr( $options[ 'ic_ct_mc_shipping_message' ] );
//        }
//
//        echo '
//                <div class="form-group">
//                <input class="ic_ct_mc" name="ic_design_custom_text[ic_ct_mc_shipping_message]" type="text" value="' . $value .'" />
//              </div>';
//    }
//}

if ( ! function_exists( 'ic_ct_mc_discount_code_label_callback' ) ) {
    function ic_ct_mc_discount_code_label_callback() {
        $options = get_option( 'ic_design_custom_text' );

        $value = '';
        if ( isset( $options[ 'ic_ct_mc_discount_code_label' ] ) ) {
            $value = esc_attr( $options[ 'ic_ct_mc_discount_code_label' ] );
        }

        echo '<div class="form-group"> 
                <input class="ic_ct_mc" name="ic_design_custom_text[ic_ct_mc_discount_code_label]" type="text" value="' . $value .'" />
              </div>';
    }
}

if ( ! function_exists( 'ic_ct_mc_apply_button_label_callback' ) ) {
    function ic_ct_mc_apply_button_label_callback() {
        $options = get_option( 'ic_design_custom_text' );

        $value = '';
        if ( isset( $options[ 'ic_ct_mc_apply_button_label' ] ) ) {
            $value = esc_attr( $options[ 'ic_ct_mc_apply_button_label' ] );
        }

        echo '<div class="form-group"> 
                <input class="ic_ct_mc" name="ic_design_custom_text[ic_ct_mc_apply_button_label]" type="text" value="' . $value .'" />
              </div>';
    }
}

if ( ! function_exists( 'ic_ct_mc_coupon_label_callback' ) ) {
    function ic_ct_mc_coupon_label_callback() {
        $options = get_option( 'ic_design_custom_text' );

        $value = '';
        if ( isset( $options[ 'ic_ct_mc_coupon_label' ] ) ) {
            $value = esc_attr( $options[ 'ic_ct_mc_coupon_label' ] );
        }

        echo '<div class="form-group"> 
                <input class="ic_ct_mc" name="ic_design_custom_text[ic_ct_mc_coupon_label]" type="text" value="' . $value .'" />
              </div>';
    }
}

if ( ! function_exists( 'ic_ct_mc_coupon_error_label_callback' ) ) {
    function ic_ct_mc_coupon_error_label_callback() {
        $options = get_option( 'ic_design_custom_text' );

        $value = '';
        if ( isset( $options[ 'ic_ct_mc_coupon_error_label' ] ) ) {
            $value = esc_attr( $options[ 'ic_ct_mc_coupon_error_label' ] );
        }

        echo '<div class="form-group"> 
                <input class="ic_ct_mc" name="ic_design_custom_text[ic_ct_mc_coupon_error_label]" type="text" value="' . $value .'" />
              </div>';
    }
}

if ( ! function_exists( 'ic_ct_mc_taxes_label_callback' ) ) {
    function ic_ct_mc_taxes_label_callback() {
        $options = get_option( 'ic_design_custom_text' );

        $value = '';
        if ( isset( $options[ 'ic_ct_mc_taxes_label' ] ) ) {
            $value = esc_attr( $options[ 'ic_ct_mc_taxes_label' ] );
        }

        echo '<div class="form-group"> 
                <input class="ic_ct_mc" name="ic_design_custom_text[ic_ct_mc_taxes_label]" type="text" value="' . $value .'" />
              </div>';
    }
}

if ( ! function_exists( 'ic_ct_mc_shipping_label_callback' ) ) {
    function ic_ct_mc_shipping_label_callback() {
        $options = get_option( 'ic_design_custom_text' );

        $value = '';
        if ( isset( $options[ 'ic_ct_mc_shipping_label' ] ) ) {
            $value = esc_attr( $options[ 'ic_ct_mc_shipping_label' ] );
        }

        echo '<div class="form-group"> 
                <input class="ic_ct_mc" name="ic_design_custom_text[ic_ct_mc_shipping_label]" type="text" value="' . $value .'" />
              </div>';
    }
}

if ( ! function_exists( 'ic_ct_mc_discount_label_callback' ) ) {
    function ic_ct_mc_discount_label_callback() {
        $options = get_option( 'ic_design_custom_text' );

        $value = '';
        if ( isset( $options[ 'ic_ct_mc_discount_label' ] ) ) {
            $value = esc_attr( $options[ 'ic_ct_mc_discount_label' ] );
        }

        echo '<div class="form-group"> 
                <input class="ic_ct_mc" name="ic_design_custom_text[ic_ct_mc_discount_label]" type="text" value="' . $value .'" />
              </div>';
    }
}

if ( ! function_exists( 'ic_ct_mc_subtotal_label_callback' ) ) {
    function ic_ct_mc_subtotal_label_callback() {
        $options = get_option( 'ic_design_custom_text' );

        $value = '';
        if ( isset( $options[ 'ic_ct_mc_subtotal_label' ] ) ) {
            $value = esc_attr( $options[ 'ic_ct_mc_subtotal_label' ] );
        }

        echo '<div class="form-group"> 
                <input class="ic_ct_mc" name="ic_design_custom_text[ic_ct_mc_subtotal_label]" type="text" value="' . $value .'" />
              </div>
              ';
    }
}

//if ( ! function_exists( 'ic_ct_mc_recommendation_title_callback' ) ) {
//    function ic_ct_mc_recommendation_title_callback() {
//        $options = get_option( 'ic_design_custom_text' );
//
//        $value = '';
//        if ( isset( $options[ 'ic_ct_mc_recommendation_title' ] ) ) {
//            $value = esc_attr( $options[ 'ic_ct_mc_recommendation_title' ] );
//        }
//
//        echo '<div class="form-group">
//                <input class="ic_ct_mc" name="ic_design_custom_text[ic_ct_mc_recommendation_title]" type="text" value="' . $value .'" />
//              </div>
//              ';
//    }
//}

if ( ! function_exists( 'ic_ct_mc_total_label_callback' ) ) {
    function ic_ct_mc_total_label_callback() {
        $options = get_option( 'ic_design_custom_text' );

        $value = '';
        if ( isset( $options[ 'ic_ct_mc_total_label' ] ) ) {
            $value = esc_attr( $options[ 'ic_ct_mc_total_label' ] );
        }

        echo '<div class="form-group"> 
                <input class="ic_ct_mc" name="ic_design_custom_text[ic_ct_mc_total_label]" type="text" value="' . $value .'" />
              </div>';
    }
}

//if ( ! function_exists( 'ic_ct_mc_secondary_button_label_callback' ) ) {
//    function ic_ct_mc_secondary_button_label_callback() {
//        $options = get_option( 'ic_design_custom_text' );
//
//        $value = '';
//        if ( isset( $options[ 'ic_ct_mc_secondary_button_label' ] ) ) {
//            $value = esc_attr( $options[ 'ic_ct_mc_secondary_button_label' ] );
//        }
//
//        echo '<div class="form-group">
//                <input class="ic_ct_mc" name="ic_design_custom_text[ic_ct_mc_secondary_button_label]" type="text" value="' . $value .'" />
//              </div>';
//    }
//}

if ( ! function_exists( 'ic_ct_mc_add_to_cart_button_callback' ) ) {
    function ic_ct_mc_add_to_cart_button_callback() {
        $options = get_option( 'ic_design_custom_text' );

        $value = '';
        if ( isset( $options[ 'ic_ct_mc_add_to_cart_button' ] ) ) {
            $value = esc_attr( $options[ 'ic_ct_mc_add_to_cart_button' ] );
        }

        echo '<div class="form-group"> 
                <input class="ic_ct_mc" name="ic_design_custom_text[ic_ct_mc_add_to_cart_button]" type="text" value="' . $value .'" />
              </div>';
    }
}

//if ( ! function_exists( 'ic_ct_mc_bottom_message_label_callback' ) ) {
//    function ic_ct_mc_bottom_message_label_callback() {
//        $options = get_option( 'ic_design_custom_text' );
//
//        $value = '';
//        if ( isset( $options[ 'ic_ct_mc_bottom_message_label' ] ) ) {
//            $value = esc_attr( $options[ 'ic_ct_mc_bottom_message_label' ] );
//        }
//
//        echo '<div class="form-group">
//                <input class="ic_ct_mc" name="ic_design_custom_text[ic_ct_mc_bottom_message_label]" type="text" value="' . $value .'" />
//              </div>';
//    }
//}

//if ( ! function_exists( 'ic_ct_mc_primary_button_label_callback' ) ) {
//    function ic_ct_mc_primary_button_label_callback() {
//        $options = get_option( 'ic_design_custom_text' );
//
//        $value = '';
//        if ( isset( $options[ 'ic_ct_mc_primary_button_label' ] ) ) {
//            $value = esc_attr( $options[ 'ic_ct_mc_primary_button_label' ] );
//        }
//
//        echo '<div class="form-group">
//                <input class="ic_ct_mc" name="ic_design_custom_text[ic_ct_mc_primary_button_label]" type="text" value="' . $value .'" />
//              </div>';
//    }
//}

if ( ! function_exists( 'ic_ct_mc_cart_empty_message_callback' ) ) {
    function ic_ct_mc_cart_empty_message_callback() {
        $options = get_option( 'ic_design_custom_text' );

        $value = '';
        if ( isset( $options[ 'ic_ct_mc_cart_empty_message' ] ) ) {
            $value = esc_attr( $options[ 'ic_ct_mc_cart_empty_message' ] );
        }

        echo '<div class="form-group">
                <input class="ic_ct_mc" name="ic_design_custom_text[ic_ct_mc_cart_empty_message]" type="text" value="' . $value .'" />
              </div>';
    }
}

if ( ! function_exists( 'ic_ct_mc_cart_empty_button_label_callback' ) ) {
    function ic_ct_mc_cart_empty_button_label_callback() {
        $options = get_option( 'ic_design_custom_text' );

        $value = '';
        if ( isset( $options[ 'ic_ct_mc_cart_empty_button_label' ] ) ) {
            $value = esc_attr( $options[ 'ic_ct_mc_cart_empty_button_label' ] );
        }

        echo '<div class="form-group">
                <input class="ic_ct_mc" name="ic_design_custom_text[ic_ct_mc_cart_empty_button_label]" type="text" value="' . $value .'" />
              </div>';
    }
}

if ( ! function_exists( 'ic_ct_ty_page_title_callback' ) ) {
    function ic_ct_ty_page_title_callback() {
        $options = get_option( 'ic_design_custom_text' );

        $value = '';
        if ( isset( $options[ 'ic_ct_ty_page_title' ] ) ) {
            $value = esc_attr( $options[ 'ic_ct_ty_page_title' ] );
        }

        echo '
                <div class="form-group"> 
                <input class="ic_ct_ty" name="ic_design_custom_text[ic_ct_ty_page_title]" type="text" value="' . $value .'" />
              </div>';
    }
}

//if ( ! function_exists( 'ic_ct_ty_error_page_title_callback' ) ) {
//    function ic_ct_ty_error_page_title_callback() {
//        $options = get_option( 'ic_design_custom_text' );
//
//        $value = '';
//        if ( isset( $options[ 'ic_ct_ty_error_page_title' ] ) ) {
//            $value = esc_attr( $options[ 'ic_ct_ty_error_page_title' ] );
//        }
//
//        echo '
//                <div class="form-group">
//                <input class="ic_ct_ty" name="ic_design_custom_text[ic_ct_ty_error_page_title]" type="text" value="' . $value .'" />
//              </div>';
//    }
//}

if ( ! function_exists( 'ic_ct_ty_primary_thank_you_label_callback' ) ) {
    function ic_ct_ty_primary_thank_you_label_callback() {
        $options = get_option( 'ic_design_custom_text' );

        $value = '';
        if ( isset( $options[ 'ic_ct_ty_primary_thank_you_label' ] ) ) {
            $value = esc_attr( $options[ 'ic_ct_ty_primary_thank_you_label' ] );
        }

        echo '<div class="form-group"> 
                <input class="ic_ct_ty" name="ic_design_custom_text[ic_ct_ty_primary_thank_you_label]" type="text" value="' . $value .'" />
              </div>';
    }
}

//if ( ! function_exists( 'ic_ct_ty_secondary_thank_you_label_callback' ) ) {
//    function ic_ct_ty_secondary_thank_you_label_callback() {
//        $options = get_option( 'ic_design_custom_text' );
//
//        $value = '';
//        if ( isset( $options[ 'ic_ct_ty_secondary_thank_you_label' ] ) ) {
//            $value = esc_attr( $options[ 'ic_ct_ty_secondary_thank_you_label' ] );
//        }
//
//        echo '<div class="form-group">
//                <input class="ic_ct_ty" name="ic_design_custom_text[ic_ct_ty_secondary_thank_you_label]" type="text" value="' . $value .'" />
//              </div>';
//    }
//}

if ( ! function_exists( 'ic_ct_ty_customer_information_label_callback' ) ) {
    function ic_ct_ty_customer_information_label_callback() {
        $options = get_option( 'ic_design_custom_text' );

        $value = '';
        if ( isset( $options[ 'ic_ct_ty_customer_information_label' ] ) ) {
            $value = esc_attr( $options[ 'ic_ct_ty_customer_information_label' ] );
        }

        echo '<div class="form-group"> 
                <input class="ic_ct_ty" name="ic_design_custom_text[ic_ct_ty_customer_information_label]" type="text" value="' . $value .'" />
              </div>';
    }
}

if ( ! function_exists( 'ic_ct_ty_shipping_information_label_callback' ) ) {
    function ic_ct_ty_shipping_information_label_callback() {
        $options = get_option( 'ic_design_custom_text' );

        $value = '';
        if ( isset( $options[ 'ic_ct_ty_shipping_information_label' ] ) ) {
            $value = esc_attr( $options[ 'ic_ct_ty_shipping_information_label' ] );
        }

        echo '<div class="form-group"> 
                <input class="ic_ct_ty" name="ic_design_custom_text[ic_ct_ty_shipping_information_label]" type="text" value="' . $value .'" />
              </div>';
    }
}

if ( ! function_exists( 'ic_ct_ty_shipping_address_label_callback' ) ) {
    function ic_ct_ty_shipping_address_label_callback() {
        $options = get_option( 'ic_design_custom_text' );

        $value = '';
        if ( isset( $options[ 'ic_ct_ty_shipping_address_label' ] ) ) {
            $value = esc_attr( $options[ 'ic_ct_ty_shipping_address_label' ] );
        }

        echo '<div class="form-group"> 
                <input class="ic_ct_ty" name="ic_design_custom_text[ic_ct_ty_shipping_address_label]" type="text" value="' . $value .'" />
              </div>';
    }
}

if ( ! function_exists( 'ic_ct_ty_billing_address_label_callback' ) ) {
    function ic_ct_ty_billing_address_label_callback() {
        $options = get_option( 'ic_design_custom_text' );

        $value = '';
        if ( isset( $options[ 'ic_ct_ty_billing_address_label' ] ) ) {
            $value = esc_attr( $options[ 'ic_ct_ty_billing_address_label' ] );
        }

        echo '<div class="form-group"> 
                <input class="ic_ct_ty" name="ic_design_custom_text[ic_ct_ty_billing_address_label]" type="text" value="' . $value .'" />
              </div>';
    }
}

if ( ! function_exists( 'ic_ct_ty_shipping_method_information_label_callback' ) ) {
    function ic_ct_ty_shipping_method_information_label_callback() {
        $options = get_option( 'ic_design_custom_text' );

        $value = '';
        if ( isset( $options[ 'ic_ct_ty_shipping_method_information_label' ] ) ) {
            $value = esc_attr( $options[ 'ic_ct_ty_shipping_method_information_label' ] );
        }

        echo '<div class="form-group"> 
                <input class="ic_ct_ty" name="ic_design_custom_text[ic_ct_ty_shipping_method_information_label]" type="text" value="' . $value .'" />
              </div>';
    }
}

if ( ! function_exists( 'ic_ct_ty_payment_information_label_callback' ) ) {
    function ic_ct_ty_payment_information_label_callback() {
        $options = get_option( 'ic_design_custom_text' );

        $value = '';
        if ( isset( $options[ 'ic_ct_ty_payment_information_label' ] ) ) {
            $value = esc_attr( $options[ 'ic_ct_ty_payment_information_label' ] );
        }

        echo '<div class="form-group"> 
                <input class="ic_ct_ty" name="ic_design_custom_text[ic_ct_ty_payment_information_label]" type="text" value="' . $value .'" />
              </div>';
    }
}

if ( ! function_exists( 'ic_ct_ty_payment_method_label_callback' ) ) {
    function ic_ct_ty_payment_method_label_callback() {
        $options = get_option( 'ic_design_custom_text' );

        $value = '';
        if ( isset( $options[ 'ic_ct_ty_payment_method_label' ] ) ) {
            $value = esc_attr( $options[ 'ic_ct_ty_payment_method_label' ] );
        }

        echo '<div class="form-group"> 
                <input class="ic_ct_ty" name="ic_design_custom_text[ic_ct_ty_payment_method_label]" type="text" value="' . $value .'" />
              </div>';
    }
}

//if ( ! function_exists( 'ic_ct_ty_save_my_information_for_faster_checkout_label_callback' ) ) {
//    function ic_ct_ty_save_my_information_for_faster_checkout_label_callback() {
//        $options = get_option( 'ic_design_custom_text' );
//
//        $value = '';
//        if ( isset( $options[ 'ic_ct_ty_save_my_information_for_faster_checkout_label' ] ) ) {
//            $value = esc_attr( $options[ 'ic_ct_ty_save_my_information_for_faster_checkout_label' ] );
//        }
//
//        echo '<div class="form-group">
//                <input class="ic_ct_ty" name="ic_design_custom_text[ic_ct_ty_save_my_information_for_faster_checkout_label]" type="text" value="' . $value .'" />
//              </div>';
//    }
//}

//if ( ! function_exists( 'ic_ct_ty_sign_up_for_newsletter_callback' ) ) {
//    function ic_ct_ty_sign_up_for_newsletter_callback() {
//        $options = get_option( 'ic_design_custom_text' );
//
//        $value = '';
//        if ( isset( $options[ 'ic_ct_ty_sign_up_for_newsletter' ] ) ) {
//            $value = esc_attr( $options[ 'ic_ct_ty_sign_up_for_newsletter' ] );
//        }
//
//        echo '<div class="form-group">
//                <input class="ic_ct_ty" name="ic_design_custom_text[ic_ct_ty_sign_up_for_newsletter]" type="text" value="' . $value .'" />
//              </div>';
//    }
//}

//if ( ! function_exists( 'ic_ct_ty_sign_up_newsletter_description_callback' ) ) {
//    function ic_ct_ty_sign_up_newsletter_description_callback() {
//        $options = get_option( 'ic_design_custom_text' );
//
//        $value = '';
//        if ( isset( $options[ 'ic_ct_ty_sign_up_newsletter_description' ] ) ) {
//            $value = esc_attr( $options[ 'ic_ct_ty_sign_up_newsletter_description' ] );
//        }
//
//        echo '<div class="form-group">
//                <input class="ic_ct_ty" name="ic_design_custom_text[ic_ct_ty_sign_up_newsletter_description]" type="text" value="' . $value .'" />
//              </div>';
//    }
//}

if ( ! function_exists( 'ic_ct_ty_email_address_label_callback' ) ) {
    function ic_ct_ty_email_address_label_callback() {
        $options = get_option( 'ic_design_custom_text' );

        $value = '';
        if ( isset( $options[ 'ic_ct_ty_email_address_label' ] ) ) {
            $value = esc_attr( $options[ 'ic_ct_ty_email_address_label' ] );
        }

        echo '<div class="form-group"> 
                <input class="ic_ct_ty" name="ic_design_custom_text[ic_ct_ty_email_address_label]" type="text" value="' . $value .'" />
              </div>';
    }
}

if ( ! function_exists( 'ic_ct_ty_sign_up_button_label_callback' ) ) {
    function ic_ct_ty_sign_up_button_label_callback() {
        $options = get_option( 'ic_design_custom_text' );

        $value = '';
        if ( isset( $options[ 'ic_ct_ty_sign_up_button_label' ] ) ) {
            $value = esc_attr( $options[ 'ic_ct_ty_sign_up_button_label' ] );
        }

        echo '<div class="form-group"> 
                <input class="ic_ct_ty" name="ic_design_custom_text[ic_ct_ty_sign_up_button_label]" type="text" value="' . $value .'" />
              </div>';
    }
}

if ( ! function_exists( 'ic_ct_ty_need_help_label_callback' ) ) {
    function ic_ct_ty_need_help_label_callback() {
        $options = get_option( 'ic_design_custom_text' );

        $value = '';
        if ( isset( $options[ 'ic_ct_ty_need_help_label' ] ) ) {
            $value = esc_attr( $options[ 'ic_ct_ty_need_help_label' ] );
        }

        echo '<div class="form-group"> 
                <input class="ic_ct_ty" name="ic_design_custom_text[ic_ct_ty_need_help_label]" type="text" value="' . $value .'" />
              </div>';
    }
}

if ( ! function_exists( 'ic_ct_ty_contact_us_button_label_callback' ) ) {
    function ic_ct_ty_contact_us_button_label_callback() {
        $options = get_option( 'ic_design_custom_text' );

        $value = '';
        if ( isset( $options[ 'ic_ct_ty_contact_us_button_label' ] ) ) {
            $value = esc_attr( $options[ 'ic_ct_ty_contact_us_button_label' ] );
        }

        echo '<div class="form-group"> 
                <input class="ic_ct_ty" name="ic_design_custom_text[ic_ct_ty_contact_us_button_label]" type="text" value="' . $value .'" />
              </div>';
    }
}

if ( ! function_exists( 'ic_ct_ty_continue_shopping_button_label_callback' ) ) {
    function ic_ct_ty_continue_shopping_button_label_callback() {
        $options = get_option( 'ic_design_custom_text' );

        $value = '';
        if ( isset( $options[ 'ic_ct_ty_continue_shopping_button_label' ] ) ) {
            $value = esc_attr( $options[ 'ic_ct_ty_continue_shopping_button_label' ] );
        }

        echo '<div class="form-group"> 
                <input class="ic_ct_ty" name="ic_design_custom_text[ic_ct_ty_continue_shopping_button_label]" type="text" value="' . $value .'" />
              </div>';
    }
}

if ( ! function_exists( 'ic_ct_ty_items_in_shipment_label_callback' ) ) {
    function ic_ct_ty_items_in_shipment_label_callback() {
        $options = get_option( 'ic_design_custom_text' );

        $value = '';
        if ( isset( $options[ 'ic_ct_ty_items_in_shipment_label' ] ) ) {
            $value = esc_attr( $options[ 'ic_ct_ty_items_in_shipment_label' ] );
        }

        echo '<div class="form-group"> 
                <input class="ic_ct_ty" name="ic_design_custom_text[ic_ct_ty_items_in_shipment_label]" type="text" value="' . $value .'" />
              </div>';
    }
}

if ( ! function_exists( 'ic_ct_ty_subtotal_label_callback' ) ) {
    function ic_ct_ty_subtotal_label_callback() {
        $options = get_option( 'ic_design_custom_text' );

        $value = '';
        if ( isset( $options[ 'ic_ct_ty_subtotal_label' ] ) ) {
            $value = esc_attr( $options[ 'ic_ct_ty_subtotal_label' ] );
        }

        echo '<div class="form-group"> 
                <input class="ic_ct_ty" name="ic_design_custom_text[ic_ct_ty_subtotal_label]" type="text" value="' . $value .'" />
              </div>';
    }
}

if ( ! function_exists( 'ic_ct_ty_discount_label_callback' ) ) {
    function ic_ct_ty_discount_label_callback() {
        $options = get_option( 'ic_design_custom_text' );

        $value = '';
        if ( isset( $options[ 'ic_ct_ty_discount_label' ] ) ) {
            $value = esc_attr( $options[ 'ic_ct_ty_discount_label' ] );
        }

        echo '<div class="form-group"> 
                <input class="ic_ct_ty" name="ic_design_custom_text[ic_ct_ty_discount_label]" type="text" value="' . $value .'" />
              </div>';
    }
}

if ( ! function_exists( 'ic_ct_ty_shipping_label_callback' ) ) {
    function ic_ct_ty_shipping_label_callback() {
        $options = get_option( 'ic_design_custom_text' );

        $value = '';
        if ( isset( $options[ 'ic_ct_ty_shipping_label' ] ) ) {
            $value = esc_attr( $options[ 'ic_ct_ty_shipping_label' ] );
        }

        echo '<div class="form-group"> 
                <input class="ic_ct_ty" name="ic_design_custom_text[ic_ct_ty_shipping_label]" type="text" value="' . $value .'" />
              </div>';
    }
}

if ( ! function_exists( 'ic_ct_ty_total_label_callback' ) ) {
    function ic_ct_ty_total_label_callback() {
        $options = get_option( 'ic_design_custom_text' );

        $value = '';
        if ( isset( $options[ 'ic_ct_ty_total_label' ] ) ) {
            $value = esc_attr( $options[ 'ic_ct_ty_total_label' ] );
        }

        echo '<div class="form-group"> 
                <input class="ic_ct_ty" name="ic_design_custom_text[ic_ct_ty_total_label]" type="text" value="' . $value .'" />
              </div>';
    }
}
