<?php

$custom_text = get_option('ic_design_custom_text');

$ic_ct_c_page_title = 'Checkout';
$ic_ct_c_error_page_title = 'Error';
//$ic_ct_c_breadcrumb = 'Breadcrumb';
$ic_ct_c_log_in_button_label = 'Log in';
$ic_ct_c_shipping_address_label = 'Shipping address';
$ic_ct_c_already_have_an_account_label = 'Already have an account?';
$ic_ct_c_continue_to_delivery_button_label = 'Continue to delivery';
$ic_ct_c_first_name = 'First name';
$ic_ct_c_last_name = 'Last name';
$ic_ct_c_email = 'Email';
$ic_ct_c_street_address = 'Street address';
$ic_ct_c_apartment_suite = 'Apartment,suit,etc...';
$ic_ct_c_city = 'City';
$ic_ct_c_zip_code = 'Zip code';
$ic_ct_c_country = 'Country';
$ic_ct_c_phone = 'Phone';
$ic_ct_c_company = 'Company';
$ic_ct_c_state_label = 'State';
$ic_ct_c_subscribe_to_newsletter = 'Sign up to our newsletter';
$ic_ct_c_by_placing_your_order_label = 'By placing your order you agree to...';
$ic_ct_c_billing_same_as_shipping_label = 'Billing address is same as shipping';
$ic_ct_c_use_different_delivery_address_label = 'Use different delivery address';
$ic_ct_c_recommendations_title = 'Dont miss the deal';
$ic_ct_c_discount_code_label = 'Discount';
$ic_ct_c_add_to_cart_button_label = 'Add';
$ic_ct_c_apply_button_label = 'Apply';
$ic_ct_c_subtotal_label = 'Subtotal';
$ic_ct_c_taxes_label = 'Taxes';
$ic_ct_c_shipping_label = 'Shipping';
$ic_ct_c_return_to_delivery_label = 'Return to delivery';
$ic_ct_c_return_to_shipping_label = 'Return to shipping';
$ic_ct_c_order_summary_label = 'Order summary';
$ic_ct_c_discount_label = 'Discount';
$ic_ct_c_payment_method_label = 'Payment method';
$ic_ct_c_total_label = 'Total';
$ic_ct_c_confirm_order_button_label = 'Confirm order';
$ic_ct_c_show_more_credit_cards_label = ' more';
$ic_ct_c_delivery_label = 'Continue';
$ic_ct_c_continue_button_label = 'Continue';
$ic_ct_c_first_name_error_label = 'Please enter a valid name';
$ic_ct_c_payment_label = 'Complete payment';
$ic_ct_c_email_error_label = 'Please enter a valid email address';
$ic_ct_c_last_name_error_label = 'Please enter a valid name';
$ic_ct_c_city_error_label = 'Please enter a valid city';
$ic_ct_c_phone_number_error_label = 'Please enter a valid phone number';
$ic_ct_c_zip_code_error_label = 'Please enter a valid zip code';
$ic_ct_c_street_address_error = 'Please enter a valid address';
$ic_ct_c_out_of_stock = 'out of stock';
$ic_ct_c_mobile_show_summary_label = 'Show order summary';
$ic_ct_c_mobile_hide_summary_label = 'Hide order summary';
?>

<div class="ic-prw-main ic-prw-main-multistep ic-preview-custom-pbc">
    <div class="ic-after-hover-pbc ic-after-hover-circle">
        <div class="ic-after-hover-circle-modal">Primary background color</div>
    </div>
    <div class="ic-prw-logo">
        <img src="<?php echo plugins_url() . '/mediya-checkout/assets/images/mediya-checkout-logo-colors.png'; ?>" alt="" />
    </div>
    <div class="ic-prw-sections">
        <div class="ic-prw-section-left">
            <div class="ic-cc-steps">
        <span class="step-one active ic-preview-custom-ptc"><span class="ic-cc-steps-number-span ic-preview-custom-ptc">1.</span>
          Shipping
        </span><span class="step-two">
          <span class="ic-cc-steps-number-span ic-preview-custom-stc">2.</span>
          Delivery
        </span>
                <span class="step-three">
          <span class="ic-cc-steps-number-span ic-preview-custom-stc">3.</span>
          Payment</span>
                <div class="ic-cc-multistep-loader-cont">
                    <div class="ic-cc-multistep-loader"></div>
                </div>
            </div>
            <div class="ic-prw-header ic-preview-custom-ptc ic-preview-custom-bc">
                <?php
                if ( isset( $custom_text[ 'ic_ct_c_shipping_address_label' ] ) && $custom_text[ 'ic_ct_c_shipping_address_label' ] != ''  ) {
                    $ic_ct_c_shipping_address_label = $custom_text[ 'ic_ct_c_shipping_address_label' ];
                    echo $ic_ct_c_shipping_address_label;
                } else {
                    echo $ic_ct_c_shipping_address_label;
                }
                ?>
            </div>
            <div class="ic-after-hover-ptc ic-after-hover-circle">
                <div class="ic-after-hover-circle-modal">Primary text color</div>
            </div>
            <div class="ic-after-hover-bc ic-after-hover-circle">
                <div class="ic-after-hover-circle-modal">Border color</div>
            </div>
            <div class="ic-prw-section-left-box">
                <div class="ic-prw-labels">
                    <input type="text" placeholder="<?php
                    if ( isset( $custom_text[ 'ic_ct_c_first_name' ] ) && $custom_text[ 'ic_ct_c_first_name' ] != ''  ) {
                        $ic_ct_c_first_name = $custom_text[ 'ic_ct_c_first_name' ];
                        echo $ic_ct_c_first_name;
                    } else {
                        echo $ic_ct_c_first_name;
                    }
                    ?>" class="ic-preview-custom-cr ic-preview-custom-iftc ic-preview-custom-ifbc ic-preview-custom-ioc" />
                    <input type="text" placeholder="<?php
                    if ( isset( $custom_text[ 'ic_ct_c_last_name' ] ) && $custom_text[ 'ic_ct_c_last_name' ] != ''  ) {
                        $ic_ct_c_last_name = $custom_text[ 'ic_ct_c_last_name' ];
                        echo $ic_ct_c_last_name;
                    } else {
                        echo $ic_ct_c_last_name;
                    }
                    ?>" class="ic-preview-custom-cr ic-preview-custom-iftc ic-preview-custom-ifbc ic-preview-custom-ioc" />
                    <input type="text" placeholder="<?php
                    if ( isset( $custom_text[ 'ic_ct_c_email' ] ) && $custom_text[ 'ic_ct_c_email' ] != ''  ) {
                        $ic_ct_c_email = $custom_text[ 'ic_ct_c_email' ];
                        echo $ic_ct_c_email;
                    } else {
                        echo $ic_ct_c_email;
                    }
                    ?>" class="ic-preview-custom-cr ic-preview-custom-iftc ic-preview-custom-ifbc ic-preview-custom-ioc" />
                    <input type="text" placeholder="<?php
                    if ( isset( $custom_text[ 'ic_ct_c_phone' ] ) && $custom_text[ 'ic_ct_c_phone' ] != ''  ) {
                        $ic_ct_c_phone = $custom_text[ 'ic_ct_c_phone' ];
                        echo $ic_ct_c_phone;
                    } else {
                        echo $ic_ct_c_phone;
                    }
                    ?>" class="ic-preview-custom-cr ic-preview-custom-iftc ic-preview-custom-ifbc ic-preview-custom-ioc" />
                    <input type="text" placeholder="<?php
                    if ( isset( $custom_text[ 'ic_ct_c_company' ] ) && $custom_text[ 'ic_ct_c_company' ] != ''  ) {
                        $ic_ct_c_company = $custom_text[ 'ic_ct_c_company' ];
                        echo $ic_ct_c_company;
                    } else {
                        echo $ic_ct_c_company;
                    }
                    ?>" class="ic-preview-custom-cr ic-preview-custom-iftc ic-preview-custom-ifbc ic-preview-custom-ioc" />
                    <input type="text" placeholder="<?php
                    if ( isset( $custom_text[ 'ic_ct_c_street_address' ] ) && $custom_text[ 'ic_ct_c_street_address' ] != ''  ) {
                        $ic_ct_c_street_address = $custom_text[ 'ic_ct_c_street_address' ];
                        echo $ic_ct_c_street_address;
                    } else {
                        echo $ic_ct_c_street_address;
                    }
                    ?>" class="ic-preview-custom-cr ic-preview-custom-iftc ic-preview-custom-ifbc ic-preview-custom-ioc" />
                    <input type="text" placeholder="<?php
                    if ( isset( $custom_text[ 'ic_ct_c_city' ] ) && $custom_text[ 'ic_ct_c_city' ] != ''  ) {
                        $ic_ct_c_city = $custom_text[ 'ic_ct_c_city' ];
                        echo $ic_ct_c_city;
                    } else {
                        echo $ic_ct_c_city;
                    }
                    ?>" class="ic-preview-custom-cr ic-preview-custom-iftc ic-preview-custom-ifbc ic-preview-custom-ioc" />
                    <input type="text" placeholder="<?php
                    if ( isset( $custom_text[ 'ic_ct_c_zip_code' ] ) && $custom_text[ 'ic_ct_c_zip_code' ] != ''  ) {
                        $ic_ct_c_zip_code = $custom_text[ 'ic_ct_c_zip_code' ];
                        echo $ic_ct_c_zip_code;
                    } else {
                        echo $ic_ct_c_zip_code;
                    }
                    ?>" class="ic-preview-custom-cr ic-preview-custom-iftc ic-preview-custom-ifbc ic-preview-custom-ioc" />
                    <input type="text" placeholder="<?php
                    if ( isset( $custom_text[ 'ic_ct_c_country' ] ) && $custom_text[ 'ic_ct_c_country' ] != ''  ) {
                        $ic_ct_c_country = $custom_text[ 'ic_ct_c_country' ];
                        echo $ic_ct_c_country;
                    } else {
                        echo $ic_ct_c_country;
                    }
                    ?>" class="ic-preview-custom-cr ic-preview-custom-iftc ic-preview-custom-ifbc ic-preview-custom-ioc" />
                </div>
                <div class="ic-after-hover-cr ic-preview-custom-cr ic-after-hover-circle">
                    <div class="ic-after-hover-circle-modal">Corner radius</div>
                </div>
                <div class="ic-after-hover-ifbc ic-after-hover-circle">
                    <div class="ic-after-hover-circle-modal">
                        Input field background color
                    </div>
                </div>
                <div class="ic-after-hover-iftc ic-after-hover-circle">
                    <div class="ic-after-hover-circle-modal">Input field text color</div>
                </div>
                <div class="ic-after-hover-ioc ic-after-hover-circle">
                    <div class="ic-after-hover-circle-modal">Input outline color</div>
                </div>
            </div>
            <div class="ic-prw-section-left-continue-to-box">
                <button class="ic-prw-section-left-continue-to ic-after-hover-cr ic-preview-custom-cr ic-preview-custom-pbbc ic-preview-custom-pbtc ic-preview-custom-pbtc">
                    <?php
                    if ( isset( $custom_text[ 'ic_ct_c_continue_to_delivery_button_label' ] ) && $custom_text[ 'ic_ct_c_continue_to_delivery_button_label' ] != ''  ) {
                        $ic_ct_c_continue_to_delivery_button_label = $custom_text[ 'ic_ct_c_continue_to_delivery_button_label' ];
                        echo $ic_ct_c_continue_to_delivery_button_label;
                    } else {
                        echo $ic_ct_c_continue_to_delivery_button_label;
                    }
                    ?>
                </button>
                <div class="ic-after-hover-pbbc ic-after-hover-circle">
                    <div class="ic-after-hover-circle-modal">
                        Primary buttons background color
                    </div>
                </div>
                <div class="ic-after-hover-pbtc ic-after-hover-circle">
                    <div class="ic-after-hover-circle-modal">
                        Primary buttons text color
                    </div>
                </div>
            </div>
        </div>
        <div class="ic-prw-section-right ic-preview-custom-bc">
            <div class="ic-prw-summary-box ic-preview-custom-cr ic-preview-custom-bc">
                <div class="ic-prw-summary-header ic-preview-custom-sbc ic-preview-custom-ptc ic-preview-custom-cr">
                    <?php
                    if ( isset( $custom_text[ 'ic_ct_c_order_summary_label' ] ) && $custom_text[ 'ic_ct_c_order_summary_label' ] != ''  ) {
                        $ic_ct_c_order_summary_label = $custom_text[ 'ic_ct_c_order_summary_label' ];
                        echo $ic_ct_c_order_summary_label;
                    } else {
                        echo $ic_ct_c_order_summary_label;
                    }
                    ?>
                </div>
                <div class="ic-after-hover-sbc ic-after-hover-circle">
                    <div class="ic-after-hover-circle-modal">
                        Secondary background color
                    </div>
                </div>
                <div class="ic-prw-summary-products">
                    <div class="ic-prw-summary-single-product ic-preview-custom-stc">
                        <div class="ic-prw-summary-single-product-left">
                            <img class="ic-after-hover-cr ic-preview-custom-cr"
                                 src="<?php echo plugins_url() . '/mediya-checkout/assets/images/theme-plugin-placeholder.webp'; ?>" alt="" />
                            <div class="ic-prw-summary-single-product-name">
                                Product name
                                <div class="ic-after-hover-stc ic-after-hover-circle">
                                    <div class="ic-after-hover-circle-modal">
                                        Secondary text color
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="ic-prw-summary-single-product-adding-button ic-preview-custom-cr ic-preview-custom-sbbc ic-preview-custom-bc ic-preview-custom-sbtc">
                            <span>-</span>
                            <div>1</div>
                            <span>+</span>
                        </div>
                        <div class="ic-prw-summary-single-product-price">$20.00</div>
                        <div class="ic-prw-summary-single-product-remove">×</div>
                    </div>
                    <div class="ic-prw-summary-single-product ic-preview-custom-stc">
                        <div class="ic-prw-summary-single-product-left">
                            <img class="ic-after-hover-cr ic-preview-custom-cr"
                                 src="<?php echo plugins_url() . '/mediya-checkout/assets/images/theme-plugin-placeholder.webp'; ?>" alt="" />
                            <div class="ic-prw-summary-single-product-name">Product name</div>
                        </div>
                        <div
                                class="ic-prw-summary-single-product-adding-button ic-preview-custom-cr ic-preview-custom-sbbc ic-preview-custom-bc ic-preview-custom-sbtc">
                            <span>-</span>
                            <div>1</div>
                            <span>+</span>
                        </div>
                        <div class="ic-prw-summary-single-product-price">$20.00</div>
                        <div class="ic-prw-summary-single-product-remove">×</div>
                    </div>
                    <div class="ic-prw-summary-single-product ic-preview-custom-stc">
                        <div class="ic-prw-summary-single-product-left">
                            <img class="ic-after-hover-cr ic-preview-custom-cr"
                                 src="<?php echo plugins_url() . '/mediya-checkout/assets/images/theme-plugin-placeholder.webp'; ?>" alt="" />
                            <div class="ic-prw-summary-single-product-name">Product name</div>
                        </div>
                        <div
                                class="ic-prw-summary-single-product-adding-button ic-preview-custom-cr ic-preview-custom-sbbc ic-preview-custom-bc ic-preview-custom-sbtc">
                            <span>-</span>
                            <div>1</div>
                            <span>+</span>
                        </div>
                        <div class="ic-prw-summary-single-product-price">$20.00</div>
                        <div class="ic-prw-summary-single-product-remove">×</div>
                    </div>
                </div>
                <div class="ic-prw-coupon ic-preview-custom-bc">
                    <input type="text"
                           class="ic-preview-custom-iftc ic-preview-custom-ifbc ic-preview-custom-cr ic-preview-custom-ioc"
                           placeholder=" <?php
                           if ( isset( $custom_text[ 'ic_ct_c_discount_code_label' ] ) && $custom_text[ 'ic_ct_c_discount_code_label' ] != ''  ) {
                               $ic_ct_c_discount_code_label = $custom_text[ 'ic_ct_c_discount_code_label' ];
                               echo $ic_ct_c_discount_code_label;
                           } else {
                               echo $ic_ct_c_discount_code_label;
                           }
                           ?>" />
                    <button class="ic-preview-custom-sbtc ic-preview-custom-sbbc ic-preview-custom-bc ic-after-hover-cr ic-preview-custom-cr">
                        <?php
                        if ( isset( $custom_text[ 'ic_ct_c_apply_button_label' ] ) && $custom_text[ 'ic_ct_c_apply_button_label' ] != ''  ) {
                            $ic_ct_c_apply_button_label = $custom_text[ 'ic_ct_c_apply_button_label' ];
                            echo $ic_ct_c_apply_button_label;
                        } else {
                            echo $ic_ct_c_apply_button_label;
                        }
                        ?>
                    </button>
                    <div class="ic-after-hover-sbbc ic-after-hover-circle">
                        <div class="ic-after-hover-circle-modal">
                            Secondary buttons background color
                        </div>
                    </div>
                    <div class="ic-after-hover-sbtc ic-after-hover-circle">
                        <div class="ic-after-hover-circle-modal">
                            Secondary buttons text color
                        </div>
                    </div>
                </div>
                <div class="ic-prw-total">
                    <div class="ic-prw-total-row ic-preview-custom-stc">
                        <span><?php
                            if ( isset( $custom_text[ 'ic_ct_c_subtotal_label' ] ) && $custom_text[ 'ic_ct_c_subtotal_label' ] != ''  ) {
                                $ic_ct_c_subtotal_label = $custom_text[ 'ic_ct_c_subtotal_label' ];
                                echo $ic_ct_c_subtotal_label;
                            } else {
                                echo $ic_ct_c_subtotal_label;
                            }
                            ?></span><span>$36.00</span>
                    </div>
                    <div class="ic-prw-total-row ic-preview-custom-stc">
                        <span><?php
                            if ( isset( $custom_text[ 'ic_ct_c_shipping_label' ] ) && $custom_text[ 'ic_ct_c_shipping_label' ] != ''  ) {
                                $ic_ct_c_shipping_label = $custom_text[ 'ic_ct_c_shipping_label' ];
                                echo $ic_ct_c_shipping_label;
                            } else {
                                echo $ic_ct_c_shipping_label;
                            }
                            ?></span><span>$20.00</span>
                    </div>
                    <div class="ic-prw-total-row ic-preview-custom-stc">
                        <span><?php
                            if ( isset( $custom_text[ 'ic_ct_c_discount_label' ] ) && $custom_text[ 'ic_ct_c_discount_label' ] != ''  ) {
                                $ic_ct_c_discount_label = $custom_text[ 'ic_ct_c_discount_label' ];
                                echo $ic_ct_c_discount_label;
                            } else {
                                echo $ic_ct_c_discount_label;
                            }
                            ?></span><span>-$10.00</span>
                    </div>
                    <div class="ic-prw-total-row-final ic-preview-custom-ptc">
                        <span><?php
                            if ( isset( $custom_text[ 'ic_ct_c_subtotal_label' ] ) && $custom_text[ 'ic_ct_c_subtotal_label' ] != ''  ) {
                                $ic_ct_c_subtotal_label = $custom_text[ 'ic_ct_c_subtotal_label' ];
                                echo $ic_ct_c_subtotal_label;
                            } else {
                                echo $ic_ct_c_subtotal_label;
                            }
                            ?></span><span>$46.00</span>
                    </div>
                </div>
            </div>
            <div class="ic-prw-dont-miss ic-after-hover-cr ic-preview-custom-cr ic-preview-custom-bc">
                <div class="ic-prw-dont-miss-text ic-after-hover-cr ic-preview-custom-cr ic-preview-custom-ptc ic-preview-custom-sbc">
                    <?php
                    if ( isset( $custom_text[ 'ic_ct_c_recommendations_title' ] ) && $custom_text[ 'ic_ct_c_recommendations_title' ] != ''  ) {
                        $ic_ct_c_recommendations_title = $custom_text[ 'ic_ct_c_recommendations_title' ];
                        echo $ic_ct_c_recommendations_title;
                    } else {
                        echo $ic_ct_c_recommendations_title;
                    }
                    ?>
                </div>
                <div class="ic-prw-dont-miss-box">
                    <div class="ic-prw-dont-miss-box-left">
                        <img class="ic-after-hover-cr ic-preview-custom-cr"
                             src="<?php echo plugins_url() . '/mediya-checkout/assets/images/theme-plugin-placeholder.webp'; ?>" alt="" />
                        <div>
                            <div class="ic-prw-dont-miss-box-text ic-preview-custom-ptc">
                                Product name
                            </div>
                            <div class="ic-prw-dont-miss-box-price ic-preview-custom-stc">
                                Price
                            </div>
                        </div>
                    </div>
                    <div class="ic-prw-dont-miss-box-right">
                        <a class="ic-after-hover-cr ic-preview-custom-cr ic-preview-custom-sbbc ic-preview-custom-sbtc ic-preview-custom-bc"
                           href="#"><?php
                            if ( isset( $custom_text[ 'ic_ct_c_add_to_cart_button_label' ] ) && $custom_text[ 'ic_ct_c_add_to_cart_button_label' ] != ''  ) {
                                $ic_ct_c_add_to_cart_button_label = $custom_text[ 'ic_ct_c_add_to_cart_button_label' ];
                                echo $ic_ct_c_add_to_cart_button_label;
                            } else {
                                echo $ic_ct_c_add_to_cart_button_label;
                            }
                            ?></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="ic-prw-privacy-policy ic-preview-custom-bc">
        <div class="ic-prw-privacy-policy-text">
            <?php
            if ( isset( $custom_text[ 'ic_ct_c_by_placing_your_order_label' ] ) && $custom_text[ 'ic_ct_c_order_summary_label' ] != ''  ) {
                $ic_ct_c_by_placing_your_order_label = $custom_text[ 'ic_ct_c_by_placing_your_order_label' ];
                echo $ic_ct_c_by_placing_your_order_label;
            } else {
                echo $ic_ct_c_by_placing_your_order_label;
            }
            ?>
        </div>
    </div>
</div>