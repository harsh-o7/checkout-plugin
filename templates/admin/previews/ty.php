<?php

$options = get_option('ic_design_checkout');
$layout = $options['ic_checkout_layout'];

$custom_text = get_option('ic_design_custom_text');

$ic_ct_ty_page_title = 'Thank you page';
$ic_ct_ty_primary_thank_you_label = 'Thank you, ';
$ic_ct_ty_customer_information_label = 'Customer information';
$ic_ct_ty_shipping_information_label = 'Shipping';
$ic_ct_ty_shipping_address_label = 'Shipping address';
$ic_ct_ty_billing_address_label = 'Billing address';
$ic_ct_ty_shipping_method_information_label = 'Shipping method';
$ic_ct_ty_payment_information_label = 'Payment';
$ic_ct_ty_payment_method_label = 'Payment method';
$ic_ct_ty_save_my_information_for_faster_checkout_label = 'Save my information for a faster checkout';
$ic_ct_ty_sign_up_for_newsletter = 'Sign up';
$ic_ct_ty_sign_up_newsletter_description = 'Sign up to our updates and get 15% off your nex order...';
$ic_ct_ty_email_address_label = 'Your email address';
$ic_ct_ty_sign_up_button_label = 'Sign up';
$ic_ct_ty_need_help_label = 'Need help';
$ic_ct_ty_contact_us_button_label = 'Contact us';
$ic_ct_ty_continue_shopping_button_label = 'Continue shopping';
$ic_ct_ty_items_in_shipment_labe = 'Items in shipment';
$ic_ct_ty_subtotal_label = 'Subtotal';
$ic_ct_ty_discount_label = 'Discount';
$ic_ct_ty_shipping_label = 'Shipping';
$ic_ct_ty_total_label = 'Total';


    ?>
<div class="ic-cc-layout3-desktop">
    <div class="row ic-ty-cont ic-cc-layout1-admin">
        <div class="col-md-7 ic-preview-custom-pbc">
            <h3 class="ic-ty-heading-text-admin ic-preview-custom-ptc"><?php
                if ( isset( $custom_text[ 'ic_ct_ty_page_title' ] ) && $custom_text[ 'ic_ct_ty_page_title' ] != ''  ) {
                    $ic_ct_ty_page_title = $custom_text[ 'ic_ct_ty_page_title' ];
                    echo $ic_ct_ty_page_title;
                } else {
                    echo $ic_ct_ty_page_title;
                }
                ?></h3>
            <p class="ic-ty-heading-text-thank-you-admin ic-preview-custom-stc">
                Thank you for purchasing product. Expect it tomorrow during the day.
            </p>
            <p class="ic-ty-heading-text-confirmation-admin ic-preview-custom-stc">
                Order #125
            </p>
            <div class="contact-info">
                <div class="ic-ty-con-box ic-ty-con-box-action">
                    <div class="ic-ty-con-box-heading-admin ic-ty-con-box-heading-action ic-preview-custom-stc">
                        <i class="fa-solid fa-angle-down filter-group-show-more active ic-preview-custom-stc"></i>
                        <?php
                        if ( isset( $custom_text[ 'ic_ct_ty_customer_information_label' ] ) && $custom_text[ 'ic_ct_ty_customer_information_label' ] != ''  ) {
                            $ic_ct_ty_customer_information_label = $custom_text[ 'ic_ct_ty_customer_information_label' ];
                            echo $ic_ct_ty_customer_information_label;
                        } else {
                            echo $ic_ct_ty_customer_information_label;
                        }
                        ?>
                    </div>
                    <div class="ic-ty-con-box-content active ic-preview-custom-stc">
                        <ul class="ic-preview-custom-stc">
                            <li class="ic-preview-custom-stc">
                                <i class="fas fa-user"></i>Name
                            </li>
                            <li class="ic-preview-custom-stc">
                                <i class="fas fa-phone-alt"></i> 12345
                            </li>
                            <li class="ic-preview-custom-stc">
                                <i class="fas fa-envelope"></i> email@mail.com
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="ic-ty-con-box ic-ty-con-box-action">
                    <div class="ic-ty-con-box-heading-admin ic-ty-con-box-heading-action ic-preview-custom-stc">
                        <i class="fa-solid fa-angle-down filter-group-show-more ic-preview-custom-stc"></i>
                        <?php
                        if ( isset( $custom_text[ 'ic_ct_ty_shipping_information_label' ] ) && $custom_text[ 'ic_ct_ty_shipping_information_label' ] != ''  ) {
                            $ic_ct_ty_shipping_information_label = $custom_text[ 'ic_ct_ty_shipping_information_label' ];
                            echo $ic_ct_ty_shipping_information_label;
                        } else {
                            echo $ic_ct_ty_shipping_information_label;
                        }
                        ?>
                    </div>
                    <div class="row ic-ty-con-box-content">
                        <div class="col-md-6 ic-preview-custom-stc">
                            <h6 class="ic-preview-custom-stc"><?php
                                if ( isset( $custom_text[ 'ic_ct_ty_shipping_address_label' ] ) && $custom_text[ 'ic_ct_ty_shipping_address_label' ] != ''  ) {
                                    $ic_ct_ty_shipping_address_label = $custom_text[ 'ic_ct_ty_shipping_address_label' ];
                                    echo $ic_ct_ty_shipping_address_label;
                                } else {
                                    echo $ic_ct_ty_shipping_address_label;
                                }
                                ?></h6>
                            <ul>
                                <li class="ic-preview-custom-stc">Name</li>
                                <li>Street</li>
                                <li>Country</li>
                            </ul>
                        </div>
                        <div class="col-md-6 ic-preview-custom-stc">
                            <h6><?php
                                if ( isset( $custom_text[ 'ic_ct_ty_billing_address_label' ] ) && $custom_text[ 'ic_ct_ty_billing_address_label' ] != ''  ) {
                                    $ic_ct_ty_billing_address_label = $custom_text[ 'ic_ct_ty_billing_address_label' ];
                                    echo $ic_ct_ty_billing_address_label;
                                } else {
                                    echo $ic_ct_ty_billing_address_label;
                                }
                                ?></h6>
                            <ul>
                                <li>Name</li>
                                <li>Street</li>
                                <li>Country</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="ic-ty-con-box ic-ty-con-box-action">
                    <div class="ic-ty-con-box-heading-admin ic-ty-con-box-heading-action ic-preview-custom-stc">
                        <i class="fa-solid fa-angle-down filter-group-show-more ic-preview-custom-stc"></i>
                        <?php
                        if ( isset( $custom_text[ 'ic_ct_ty_shipping_method_information_label' ] ) && $custom_text[ 'ic_ct_ty_shipping_method_information_label' ] != ''  ) {
                            $ic_ct_ty_shipping_method_information_label = $custom_text[ 'ic_ct_ty_shipping_method_information_label' ];
                            echo $ic_ct_ty_shipping_method_information_label;
                        } else {
                            echo $ic_ct_ty_shipping_method_information_label;
                        }
                        ?>
                    </div>
                    <div class="ic-ty-con-box-content ic-preview-custom-stc">
                        <ul>
                            <li>Standard delivery <span>- 5-7 business days</span></li>
                        </ul>
                    </div>
                </div>
                <div class="ic-ty-con-box ic-ty-con-box-action">
                    <div class="ic-ty-con-box-heading-admin ic-ty-con-box-heading-action ic-preview-custom-stc">
                        <i class="fa-solid fa-angle-down filter-group-show-more  ic-preview-custom-stc"></i>
                        <?php
                        if ( isset( $custom_text[ 'ic_ct_ty_payment_information_label' ] ) && $custom_text[ 'ic_ct_ty_payment_information_label' ] != ''  ) {
                            $ic_ct_ty_payment_information_label = $custom_text[ 'ic_ct_ty_payment_information_label' ];
                            echo $ic_ct_ty_payment_information_label;
                        } else {
                            echo $ic_ct_ty_payment_information_label;
                        }
                        ?>
                    </div>
                    <div class="ic-ty-con-box-content ic-preview-custom-stc">
                        <h6><?php
                            if ( isset( $custom_text[ 'ic_ct_ty_payment_method_label' ] ) && $custom_text[ 'ic_ct_ty_payment_method_label' ] != ''  ) {
                                $ic_ct_ty_payment_method_label = $custom_text[ 'ic_ct_ty_payment_method_label' ];
                                echo $ic_ct_ty_payment_method_label;
                            } else {
                                echo $ic_ct_ty_payment_method_label;
                            }
                            ?></h6>
                        <ul>
                            <li>Check payments</li>
                        </ul>
                    </div>
                </div>
                <div class="ic-ty-con-box ic-ty-con-box-continue-shopping ic-preview-custom-stc">
                    <div class="ic-ty-con-box-section ic-preview-custom-stc">
            <span><?php
                if ( isset( $custom_text[ 'ic_ct_ty_need_help_label' ] ) && $custom_text[ 'ic_ct_ty_need_help_label' ] != ''  ) {
                    $ic_ct_ty_need_help_label = $custom_text[ 'ic_ct_ty_need_help_label' ];
                    echo $ic_ct_ty_need_help_label;
                } else {
                    echo $ic_ct_ty_need_help_label;
                }
                ?>
              <a href="#" class="contact-us ic-preview-custom-sbbc ic-preview-custom-sbtc">
                 <?php
                 if ( isset( $custom_text[ 'ic_ct_ty_contact_us_button_label' ] ) && $custom_text[ 'ic_ct_ty_contact_us_button_label' ] != ''  ) {
                     $ic_ct_ty_contact_us_button_label = $custom_text[ 'ic_ct_ty_contact_us_button_label' ];
                     echo $ic_ct_ty_contact_us_button_label;
                 } else {
                     echo $ic_ct_ty_contact_us_button_label;
                 }
                 ?></a></span>
                    </div>
                    <div class="ic-ty-con-box-section">
                        <a href="http://localhost/wordpress/shop/"
                           class="continue ic-preview-custom-pbbc ic-preview-custom-pbtc"><?php
                            if ( isset( $custom_text[ 'ic_ct_ty_continue_shopping_button_label' ] ) && $custom_text[ 'ic_ct_ty_continue_shopping_button_label' ] != ''  ) {
                                $ic_ct_ty_continue_shopping_button_label = $custom_text[ 'ic_ct_ty_continue_shopping_button_label' ];
                                echo $ic_ct_ty_continue_shopping_button_label;
                            } else {
                                echo $ic_ct_ty_continue_shopping_button_label;
                            }
                            ?>
                            <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M2.91797 7H11.0846" stroke="white" stroke-width="1.3" stroke-linecap="round"
                                      stroke-linejoin="round" />
                                <path d="M7 2.91666L11.0833 6.99999L7 11.0833" stroke="white" stroke-width="1.3" stroke-linecap="round"
                                      stroke-linejoin="round" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-5 ic-preview-custom-pbc">
            <div class="ic-prw-summary-box ic-preview-custom-cr ic-preview-custom-bc ic-preview-custom-pbc">
                <div class="ic-prw-summary-header ic-preview-custom-sbc ic-preview-custom-ptc ic-preview-custom-cr">
                    <?php
                    if ( isset( $custom_text[ 'ic_ct_ty_page_title' ] ) && $custom_text[ 'ic_ct_ty_page_title' ] != ''  ) {
                        $ic_ct_ty_page_title = $custom_text[ 'ic_ct_ty_page_title' ];
                        echo $ic_ct_ty_page_title;
                    } else {
                        echo $ic_ct_ty_page_title;
                    }
                    ?>Order summary
                </div>
                <div class="ic-prw-summary-products">
                    <div class="ic-prw-summary-single-product ic-preview-custom-stc">
                        <div class="ic-prw-summary-single-product-left">
                            <img class="ic-after-hover-cr ic-preview-custom-cr" src="<?php echo plugins_url() . '/mediya-checkout/assets/images/theme-plugin-placeholder.webp'; ?>"
                                 alt="" />
                            <div class="ic-prw-summary-single-product-name">
                                Product name
                            </div>
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
                            <img class="ic-after-hover-cr ic-preview-custom-cr" src="<?php echo plugins_url() . '/mediya-checkout/assets/images/theme-plugin-placeholder.webp'; ?>"
                                 alt="" />
                            <div class="ic-prw-summary-single-product-name">
                                Product name
                            </div>
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
                            <img class="ic-after-hover-cr ic-preview-custom-cr" src="<?php echo plugins_url() . '/mediya-checkout/assets/images/theme-plugin-placeholder.webp'; ?>"
                                 alt="" />
                            <div class="ic-prw-summary-single-product-name">
                                Product name
                            </div>
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
                <div class="ic-prw-total">
                    <div class="ic-prw-total-row ic-preview-custom-stc">
                        <span><?php
                            if ( isset( $custom_text[ 'ic_ct_ty_subtotal_label' ] ) && $custom_text[ 'ic_ct_ty_subtotal_label' ] != ''  ) {
                                $ic_ct_ty_subtotal_label = $custom_text[ 'ic_ct_ty_subtotal_label' ];
                                echo $ic_ct_ty_subtotal_label;
                            } else {
                                echo $ic_ct_ty_subtotal_label;
                            }
                            ?></span><span>$36.00</span>
                    </div>
                    <div class="ic-prw-total-row ic-preview-custom-stc">
                        <span><?php
                            if ( isset( $custom_text[ 'ic_ct_ty_shipping_label' ] ) && $custom_text[ 'ic_ct_ty_shipping_label' ] != ''  ) {
                                $ic_ct_ty_shipping_label = $custom_text[ 'ic_ct_ty_shipping_label' ];
                                echo $ic_ct_ty_shipping_label;
                            } else {
                                echo $ic_ct_ty_shipping_label;
                            }
                            ?></span><span>$20.00</span>
                    </div>
                    <div class="ic-prw-total-row ic-preview-custom-stc">
                        <span><?php
                            if ( isset( $custom_text[ 'ic_ct_ty_discount_label' ] ) && $custom_text[ 'ic_ct_ty_discount_label' ] != ''  ) {
                                $ic_ct_ty_discount_label = $custom_text[ 'ic_ct_ty_discount_label' ];
                                echo $ic_ct_ty_discount_label;
                            } else {
                                echo $ic_ct_ty_discount_label;
                            }
                            ?>Discount</span><span>-$10.00</span>
                    </div>
                    <div class="ic-prw-total-row-final ic-preview-custom-ptc">
                        <span><?php
                            if ( isset( $custom_text[ 'ic_ct_ty_page_title' ] ) && $custom_text[ 'ic_ct_ty_page_title' ] != ''  ) {
                                $ic_ct_ty_total_label = $custom_text[ 'ic_ct_ty_page_title' ];
                                echo $ic_ct_ty_total_label;
                            } else {
                                echo $ic_ct_ty_total_label;
                            }
                            ?></span><span>$50.00</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
