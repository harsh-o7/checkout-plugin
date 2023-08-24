<?php
/**
 * Checkout Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-checkout.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.5.0
 */

if (!defined('ABSPATH')) {
    exit;
}

do_action('woocommerce_before_checkout_form', $checkout);

// If checkout registration is disabled and not logged in, the user cannot checkout.
if (!$checkout->is_registration_enabled() && $checkout->is_registration_required() && !is_user_logged_in()) {
    echo esc_html(apply_filters('woocommerce_checkout_must_be_logged_in_message', __('You must be logged in to checkout.', 'woocommerce')));
    return;
}

$options = get_option('ic_design_general');
$custom_accent_color = $options['custom_accent_color'];
$custom_buttons_color = $options['primary_buttons_background_color'];
$custom_error_color = $options['custom_error_color'];

$custom_text = get_option('ic_design_custom_text');

?>

<form name="checkout" method="post"
      class="checkout woocommerce-checkout ic-cc-layout3 ic-cc-layout3-multistep-checkout ic-multi-step-checkout-page"
      id="ic-checkout"
      action="<?php echo esc_url(wc_get_checkout_url()); ?>" enctype="multipart/form-data">
    <?php if ($checkout->get_checkout_fields()) : ?>

        <?php do_action('woocommerce_checkout_before_customer_details'); ?>

<!--        --><?php
//        if (isset($custom_text['ic_ct_c_breadcrumb']) && $custom_text['ic_ct_c_breadcrumb'] != '') {
//            ?>
<!--            <p class="ic-cc-breadcrumb">-->
<!--                --><?php //esc_html_e($custom_text['ic_ct_c_breadcrumb']); ?>
<!--            </p>-->
<!--            --><?php
//        }
//        ?>

        <div class="col2-set customer_details-left-section ic-multi-step-checkout-page-1" id="customer_details">
            <div class="ic-checkout-logo ic-checkout-logo-desktop hidden"> <?php ic_get_custom_logo() ?> </div>
            <div class="ic-custom-texts-wrapper-hidden-multi-step" style="display: none !important; height:0 !important; width:0 !important;">

                <?php if (isset($custom_text['ic_ct_c_continue_to_delivery_button_label'])): ?>
                <p class="custom-test-c-ms-continue-to-delivery-btn"><?php echo $custom_text['ic_ct_c_continue_to_delivery_button_label'] ;?></p>
                <?php endif;?>

                <?php if (isset($custom_text['ic_ct_c_return_to_shipping_label'])): ?>
                <p class="custom-test-c-ms-back-to-shipping-btn"><?php echo $custom_text['ic_ct_c_return_to_shipping_label'] ;?></p>
                <?php endif;?>

                <?php if (isset($custom_text['ic_ct_c_continue_to_payment_button_label'])): ?>
                <p class="custom-test-c-ms-continue-to-payment-btn"><?php echo $custom_text['ic_ct_c_continue_to_payment_button_label'] ;?></p>
                <?php endif;?>

                <?php if (isset($custom_text['ic_ct_c_return_to_delivery_label'])): ?>
                <p class="custom-test-c-ms-back-to-delivery-btn"><?php echo $custom_text['ic_ct_c_return_to_delivery_label'] ;?></p>
                <?php endif;?>

                <?php if (isset($custom_text['ic_ct_c_continue_button_label'])): ?>
                <p class="custom-test-c-ms-continue-btn"><?php echo $custom_text['ic_ct_c_continue_button_label'] ;?></p>
                <?php endif;?>

                <?php if (isset($custom_text['ic_ct_c_return_button_label'])): ?>
                <p class="custom-test-c-ms-return-btn"><?php echo $custom_text['ic_ct_c_return_button_label'] ;?></p>
                <?php endif;?>

                <?php if (isset($custom_text['ic_ct_c_phone'])): ?>
                <p class="custom-test-c-ms-phone" style="display: none !important; height:0 !important; width:0 !important;"><?php echo $custom_text['ic_ct_c_phone'] ;?></p>
                <?php endif;?>

                <?php if (isset($custom_text['ic_ct_c_company'])): ?>
                <p class="custom-test-c-ms-company" style="display: none !important; height:0 !important; width:0 !important;"><?php echo $custom_text['ic_ct_c_company'] ;?></p>
                <?php endif;?>

                <?php if (isset($custom_text['ic_ct_c_country'])): ?>
                <p class="custom-test-c-ms-country" style="display: none !important; height:0 !important; width:0 !important;"><?php echo $custom_text['ic_ct_c_country'] ;?></p>
                <?php endif;?>

                <?php if (isset($custom_text['ic_ct_c_apartment_suite'])): ?>
                <p class="custom-test-c-ms-apartment" style="display: none !important; height:0 !important; width:0 !important;"><?php echo $custom_text['ic_ct_c_apartment_suite'] ;?></p>
                <?php endif;?>

                <?php if (isset($custom_text['ic_ct_c_zip_code'])): ?>
                <p class="custom-test-c-ms-zip-code" style="display: none !important; height:0 !important; width:0 !important;"><?php echo $custom_text['ic_ct_c_zip_code'] ;?></p>
                <?php endif;?>

                <?php if (isset($custom_text['ic_ct_c_city'])): ?>
                <p class="custom-test-c-ms-city" style="display: none !important; height:0 !important; width:0 !important;"><?php echo $custom_text['ic_ct_c_city'] ;?></p>
                <?php endif;?>

                <?php if (isset($custom_text['ic_ct_c_street_address'])): ?>
                <p class="custom-test-c-ms-address" style="display: none !important; height:0 !important; width:0 !important;"><?php echo $custom_text['ic_ct_c_street_address'] ;?></p>
                <?php endif;?>

                <?php if (isset($custom_text['ic_ct_c_email'])): ?>
                <p class="custom-test-c-ms-email" style="display: none !important; height:0 !important; width:0 !important;"><?php echo $custom_text['ic_ct_c_email'] ;?></p>
                <?php endif;?>

                <?php if (isset($custom_text['ic_ct_c_last_name'])): ?>
                <p class="custom-test-c-ms-last-name" style="display: none !important; height:0 !important; width:0 !important;"><?php echo $custom_text['ic_ct_c_last_name'] ;?></p>
                <?php endif;?>

                <?php if (isset($custom_text['ic_ct_c_first_name'])): ?>
                <p class="custom-test-c-ms-first-name" style="display: none !important; height:0 !important; width:0 !important;"><?php echo $custom_text['ic_ct_c_first_name'] ;?></p>
                <?php endif;?>

                <?php if (isset($custom_text['ic_ct_c_delivery_label'])): ?>
                <p class="custom-test-c-ms-shipping-methods" style="display: none !important; height:0 !important; width:0 !important;"><?php echo $custom_text['ic_ct_c_delivery_label'] ;?></p>
                <?php endif;?>

                <?php if (isset($custom_text['ic_ct_c_out_of_stock'])): ?>
                <p class="custom-test-c-ms-out-of-stock" style="display: none !important; height:0 !important; width:0 !important;"><?php echo $custom_text['ic_ct_c_out_of_stock'] ;?></p>
                <?php endif;?>

                <?php if (isset($custom_text['ic_ct_mc_coupon_label'])): ?>
                <p class="custom-test-c-ms-coupon-applied" style="display: none !important; height:0 !important; width:0 !important;"><?php echo $custom_text['ic_ct_mc_coupon_label'] ;?></p>
                <?php endif;?>

                <?php if (isset($custom_text['ic_ct_mc_coupon_error_label'])): ?>
                <p class="custom-test-c-ms-coupon-error" style="display: none !important; height:0 !important; width:0 !important;"><?php echo $custom_text['ic_ct_mc_coupon_error_label'] ;?></p>
                <?php endif;?>

                <?php if (isset($custom_text['ic_ct_c_street_address_error'])): ?>
                <p class="custom-test-c-ms-address-error" style="display: none !important; height:0 !important; width:0 !important;"><?php echo $custom_text['ic_ct_c_street_address_error'] ;?></p>
                <?php endif;?>

                <?php if (isset($custom_text['ic_ct_c_state_label'])): ?>
                <p class="custom-test-c-ms-state-label" style="display: none !important; height:0 !important; width:0 !important;"><?php echo $custom_text['ic_ct_c_state_label'] ;?></p>
                <?php endif;?>

                <?php if (isset($custom_text['ic_ct_c_mobile_show_summary_label'])): ?>
                <p class="custom-test-c-ms-show-summary" style="display: none !important; height:0 !important; width:0 !important;"><?php echo $custom_text['ic_ct_c_mobile_show_summary_label'] ;?></p>
                <?php endif;?>

                <?php if (isset($custom_text['ic_ct_c_mobile_hide_summary_label'])): ?>
                <p class="custom-test-c-ms-hide-summary" style="display: none !important; height:0 !important; width:0 !important;"><?php echo $custom_text['ic_ct_c_mobile_hide_summary_label'] ;?></p>
                <?php endif;?>

                <?php if (isset($custom_text['ic_ct_mc_add_to_cart_button'])): ?>
                <p class="custom-test-c-ms-add-to-cart" style="display: none !important; height:0 !important; width:0 !important;"><?php echo $custom_text['ic_ct_mc_add_to_cart_button'] ;?></p>
                <?php endif;?>

                <?php if (isset($custom_text['ic_ct_c_complete_order_button_label'])): ?>
                <p class="custom-test-c-ms-complete-order" style="display: none !important; height:0 !important; width:0 !important;"><?php echo $custom_text['ic_ct_c_complete_order_button_label'] ;?></p>
                <?php endif;?>

                <?php if (isset($custom_text['ic_ct_c_page_title'])): ?>
                <p class="custom-test-c-ms-page-title" style="display: none !important; height:0 !important; width:0 !important;"><?php echo $custom_text['ic_ct_c_page_title'] ;?></p>
                <?php endif;?>

                <?php if (isset($custom_text['ic_ct_c_add_extras_title'])): ?>
                <p class="custom-test-c-ms-add-extras-title" style="display: none !important; height:0 !important; width:0 !important;"><?php echo $custom_text['ic_ct_c_add_extras_title'] ;?></p>
                <?php endif;?>

                <?php if (isset($custom_text['ic_ct_c_add_extras_description'])): ?>
                <p class="custom-test-c-ms-add-extras-description" style="display: none !important; height:0 !important; width:0 !important;"><?php echo $custom_text['ic_ct_c_add_extras_description'] ;?></p>
                <?php endif;?>

                <?php if (isset($custom_text['ic_ct_c_add_extra_product_title'])): ?>
                <p class="custom-test-c-ms-add-extra-product-title" style="display: none !important; height:0 !important; width:0 !important;"><?php echo $custom_text['ic_ct_c_add_extra_product_title'] ;?></p>
                <?php endif;?>

                <?php if (isset($custom_text['ic_ct_c_add_extra_product_description'])): ?>
                <p class="custom-test-c-ms-add-extra-product-description" style="display: none !important; height:0 !important; width:0 !important;"><?php echo $custom_text['ic_ct_c_add_extra_product_description'] ;?></p>
                <?php endif;?>

            </div>
<!--            <h2 class="ic-cc-title">-->
<!--                --><?php
//                if (isset($custom_text['ic_ct_c_page_title']) && $custom_text['ic_ct_c_page_title'] != '') {
//                    esc_html_e($custom_text['ic_ct_c_page_title']);
//                } else {
//                    esc_html_e('Checkout', IC_TD);
//                }
//                ?>
<!--            </h2>-->

            <div class="ic-cc-steps">
                <?php
                $customShippingLabel = 'Shipping';
                if (isset($custom_text['ic_ct_c_shipping_label']) && $custom_text['ic_ct_c_shipping_label'] != ''){
                    $customShippingLabel = $custom_text['ic_ct_c_shipping_label'];
                }
                ?>
                <span class="step-one active"><span class="ic-cc-steps-number-span">1.</span> <?php echo $customShippingLabel; ?> </span>
                <span class="step-two"><span class="ic-cc-steps-arrow-span"><i class="fa-solid fa-angle-right"></i></span> <span class="ic-cc-steps-number-span">2.</span>
                <?php
                if (isset($custom_text['ic_ct_c_delivery_label']) && $custom_text['ic_ct_c_delivery_label'] != '') {
                    esc_html_e($custom_text['ic_ct_c_delivery_label']);
                } else {
                    esc_html_e('Delivery', IC_TD);
                }
                ?>
                </span>
                <?php
                $customPaymentLabel = 'Payment';
                if (isset($custom_text['ic_ct_c_payment_label']) && $custom_text['ic_ct_c_payment_label'] != ''){
                    $customPaymentLabel = $custom_text['ic_ct_c_payment_label'];
                }
                ?>
                <span class="step-three"><span class="ic-cc-steps-arrow-span"><i class="fa-solid fa-angle-right"></i></span> <span class="ic-cc-steps-number-span">3.</span> <?php echo $customPaymentLabel;?></span>
                <div class="ic-cc-multistep-loader-cont">
                    <div class="ic-cc-multistep-loader"></div>
                </div>
            </div>
            <div class="col-1 ic-cc-l3">
                <?php do_action('woocommerce_checkout_billing'); ?>
            </div>

            <div class="col-2 ic-cc-l3 ic-cc-last-step ic-cc-last-step-ic-cc-l3 hidden">
                <?php do_action('woocommerce_checkout_order_review'); ?>
            </div>

            <div class="ic-cc-shipping ic-cc-l3 hidden my-custom-shipping-table-ic-cc-shipping">
                <?php if (WC()->cart->needs_shipping() && WC()->cart->show_shipping()) : ?>
                    <?php do_action('woocommerce_review_order_before_shipping'); ?>
                    <table class="my-custom-shipping-table">
                        <tbody>
                        <?php wc_cart_totals_shipping_html(); ?>
                        </tbody>
                    </table>
                    <?php do_action('woocommerce_review_order_after_shipping'); ?>
                <?php endif; ?>
            </div>

            <?php if (isset($options['display_powered_by'])) : ?>
                <div id="ic-additional-links" class="ic-additional ic-cc-l3">
    <!--                <div>-->
    <!--                    <input type="checkbox" id="scales"-->
    <!--                           name="scales" --><?php //echo checked(isset($options['ic_checkout_email']), true, false); ?><!-- >-->
    <!--                    <label for="scales">-->
    <!--                        --><?php
    //                        if (isset($custom_text['ic_ct_c_subscribe_to_newsletter']) && $custom_text['ic_ct_c_subscribe_to_newsletter'] != '') {
    //                            esc_html_e($custom_text['ic_ct_c_subscribe_to_newsletter']);
    //                        } else {
    //                            esc_html_e('Subscribe to newsletter', IC_TD);
    //                        }
    //                        ?>
    <!--                    </label>-->
    <!--                </div>-->


                        <p>Powered by mCheckout</p>
                </div>
            <?php endif; ?>
            <?php
            $returnButton = 'Back';
            if (isset($custom_text['ic_ct_c_return_button_label']) && $custom_text['ic_ct_c_return_button_label'] != ''){
                $returnButton = $custom_text['ic_ct_c_return_button_label'];
            }
            ?>
            <div id="multistep-navigation">
                <span class="back" style="opacity: 0;"><i class="fas fa-angle-left"></i> <?php echo $returnButton; ?></span>
                <span class="continue">
                    <?php
                    if (isset($custom_text['ic_ct_c_continue_to_delivery_button_label']) && $custom_text['ic_ct_c_continue_to_delivery_button_label'] != '') {
                        esc_html_e($custom_text['ic_ct_c_continue_to_delivery_button_label']);
                    } else {
                        esc_html_e('Continue to Delivery', IC_TD);
                    }
                    ?>
                    <img src="<?php echo plugins_url() . '/mediya-checkout/assets/images/arrow-right.svg'; ?>" alt="">
                </span>
            </div>


        </div>

        <?php do_action('woocommerce_checkout_after_customer_details'); ?>

    <?php endif; ?>

    <!--    --><?php //do_action('woocommerce_checkout_before_order_review_heading'); ?>
    <!---->
    <!--    --><?php //do_action('woocommerce_checkout_before_order_review'); ?>
    <div class="col2-set customer_details-right-section ic-multi-step-checkout-page-2">
        <div id="order_review" class="woocommerce-checkout-review-order">
            <div class="order_review-order-summary-box">
                <div class="ic-checkout-logo ic-checkout-logo-mobile"> <?php ic_get_custom_logo() ?> </div>
                <div class="order-review-main-header" style="font-weight:500;">
                    <div>
                    <?php
                    if (isset($custom_text['ic_ct_c_order_summary_label']) && $custom_text['ic_ct_c_order_summary_label'] != '') {
                        esc_html_e($custom_text['ic_ct_c_order_summary_label']);
                    } else {
                        esc_html_e('Order summary', IC_TD);
                    }
                    ?>
                    </div>
                    <span class="total-header"><?php wc_cart_totals_order_total_html(); ?></span>
                </div>
                <div class="ic-order-review">
                    <?php do_action('woocommerce_checkout_order_review'); ?>
                </div>
                <div class="mobile-coupon-place">
                    <table style="margin-left: 23px !important; margin-right: 23px !important; width:calc(100% - 46px) !important; margin-bottom: 15px !important;" class="mobile-coupon-table-place">
                        <tbody>
                        <tr class="coupon_checkout mobile-coupon-table-row">
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <?php

        $upsell_products = ic_get_upsells_for_triggers('checkout_page');
        $has_final_upsells = false;
        foreach ($upsell_products as $upsell_product) {
            $product = wc_get_product($upsell_product['option_value']);
            $product_is_in_stock = ic_check_product_stock($product, $upsell_product['option_value']);
            if($product_is_in_stock) {
                $has_final_upsells = true;
                break;
            }
        }
        if ($has_final_upsells) {
            ?>
            <div class="order_review-order-dont-miss-box dont-miss-upsells-box">
                <div class="ic-upsell-info">
                    <h6>
                        <?php
                        if (isset($custom_text['ic_ct_c_recommendations_title']) && $custom_text['ic_ct_c_recommendations_title'] != '') {
                            esc_html_e($custom_text['ic_ct_c_recommendations_title']);
                        } else {
                            esc_html_e('Don’t miss the deal 👍', IC_TD);
                        }
                        ?>
                    </h6>
                </div>
                <div class="ic-cc-slider-cont">
                    <?php
                    $class = '';
                    if (count($upsell_products) <= 1){
                        $class = 'ic-without-dot ';
                    }
                    ?>
                    <div id="ic-upsell" class="ic-checkout-upsell swiper <?php echo $class; ?>">
                    <div class="swiper-wrapper">
                            <?php

//                            $upsell_products = ic_get_upsells_for_triggers('checkout_page');
                            $upsells_rendered = array();
                            if (count($upsell_products) > 0) {
                                $us_shown = array();
                                foreach ($upsell_products as $upsell_product) {
                                    $regular_price = null;
                                    $product = wc_get_product($upsell_product['option_value']);
                                    $product_is_in_stock = ic_check_product_stock($product, $upsell_product['option_value']);
                                    if(!$product_is_in_stock) {
                                       continue;
                                    }
                                    if (!in_array($upsell_product['option_value'], $upsells_rendered)) {
                                        if (!in_array($upsell_product['upsell_id'], $us_shown)) {
                                            do_action('ic_before_us_shown', $upsell_product['upsell_id']);
                                        }
                                        $price = $upsell_product['price'];
                                        if ($upsell_product['custom_compare_price'] != 0 && $upsell_product['custom_price'] == 0) {
                                            $price = $upsell_product['custom_compare_price'];
                                        } else if ($upsell_product['custom_compare_price'] != 0 && $upsell_product['custom_price']) {
                                            $regular_price = $upsell_product['custom_compare_price'];
                                            $price = $upsell_product['custom_price'];
                                        } else if ($product->is_on_sale()) {
                                            $regular_price = $product->get_regular_price();
                                        }

                                        if ($upsell_product['default_quantity'] != 0 && $upsell_product['discount']) {
                                            $quantityNeeded = intval($upsell_product['default_quantity']) -1;
                                            $cart = WC()->cart->get_cart();
                                            $productInCart = false;
                                            foreach ($cart as $cart_item_key => $cart_item) {
                                                if ($cart_item['product_id'] === $product->get_id() && $cart_item['quantity'] >= $quantityNeeded) {
                                                    $productInCart = true;
                                                    break;
                                                }
                                            }
                                            if ($productInCart) {
                                                $price = $price * ((100 - $upsell_product['discount']) / 100);
                                            }

                                            //$price = $price * ((100 - $upsell_product['discount']) / 100);
                                        }
                                        array_push($us_shown, intval($upsell_product['upsell_id']));
                                        array_push($upsells_rendered, intval($upsell_product['option_value']));

                                        ?>
                                        <div class="swiper-slide us-slide"
                                             data-us_id="<?php echo $upsell_product['upsell_id']; ?>">
                                            <img class="mini-cart-single-loader" src="<?php echo plugins_url() . '/mediya-checkout/assets/images/single-loader.svg' ?>" alt="single-loader">

                                            <div class="us-slide-left">
                                                <div class="us-slide-left-box">
                                                    <?php if ($upsell_product['image']) : ?>
                                                        <img width="32" height="32"
                                                             src="<?php echo $upsell_product['image'][0]; ?>"
                                                             alt="">
                                                    <?php else : ?>
                                                        <img width="32" height="32"
                                                             src="<?php echo plugins_url() . '/mediya-checkout/assets/images/woocommerce-placeholder.png'; ?>"
                                                             alt="">
                                                    <?php endif; ?>
                                                    <div class="us-slide-title-price">
                                                        <h6><?php echo $upsell_product['title']; ?></h6>
                                                        <p>
                                                            <?php
                                                            if ($regular_price != null) {
                                                                echo '<span data-price="' . $price . '" class="sale-price">' . get_woocommerce_currency_symbol() . $regular_price . '</span>';
                                                            }
                                                            echo get_woocommerce_currency_symbol();
                                                            echo $price;
                                                            ?>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php
                                            echo do_shortcode('[ic_add_to_cart id=' . $upsell_product['option_value'] . ' show_price="FALSE" ]');
                                            ?>
                                        </div>
                                        <?php
                                    }
                                }
                            }
                            ?>
                        </div>
                        <div class="swiper-pagination"></div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>
                </div>
            </div>

        <?php } ?>

        <?php
        $design_sections = get_option('design_sections');
        if (isset($design_sections) && count($design_sections) > 0) { ?>
            <div class="order_review-order-dont-miss-box sec">
                <!--                <div class="ic-upsell-info">-->
                <!--                    <h6>Sections</h6>-->
                <!--                </div>-->
                <?php
                if (count($design_sections) > 0) {
                    foreach ($design_sections as $section) {
                        ?>
                        <div class="ic-cc-single-section">
                            <img src="<?php echo $section['section_icon']; ?>" alt="">
                            <div>
                                <h3><?php echo $section['section_title']; ?></h3>
                                <p><?php echo $section['section_text']; ?></p>
                            </div>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>
        <?php } ?>

        <?php do_action('woocommerce_checkout_after_order_review'); ?>
    </div>

</form>

<div class="main-checkout-loader active">
    <img src="<?php echo plugins_url() . '/mediya-checkout/assets/images/loading.svg' ?>" alt="">
</div>

<?php
$design_sections = get_option('design_sections');
if (isset($design_sections) && count($design_sections) > 0) { ?>
    <div class="order_review-order-dont-miss-box sec mobile-only ms" id="dont-miss-secondary-mobile-only">
        <!--                <div class="ic-upsell-info">-->
        <!--                    <h6>Sections</h6>-->
        <!--                </div>-->
        <?php
        if (count($design_sections) > 0) {
            foreach ($design_sections as $section) {
                ?>
                <div class="ic-cc-single-section">
                    <img src="<?php echo $section['section_icon']; ?>" alt="">
                    <div>
                        <h3><?php echo $section['section_title']; ?></h3>
                        <p><?php echo $section['section_text']; ?></p>
                    </div>
                </div>
                <?php
            }
        }
        ?>
    </div>
<?php } ?>


<?php if (isset($options['ic_checkout_powered'])) : ?>
    <p class="powered-by-ic">Powered by mCheckout</p>
<?php endif; ?>

<?php //do_action( 'ic_add_coupon' ); ?>

<?php do_action('woocommerce_after_checkout_form', $checkout); ?>

<div id="ic-additional-links" class="ic-additional ic-cc-l3 ic-additional-links-multistep">
    <span>
        <?php
        $num_links = ic_num_checkout_links_set();
        if ($num_links != 0) {
            if (isset($custom_text['ic_ct_c_by_placing_your_order_label']) && $custom_text['ic_ct_c_by_placing_your_order_label'] != '') {
                esc_html_e($custom_text['ic_ct_c_by_placing_your_order_label']);
            } else {
                esc_html_e('By placing your order you agree to our', IC_TD);
            }
        }

        $links = ic_checkout_links();
        if ($num_links == 1) {
            echo ' ' . $links[0] . '.';
        } else if ($num_links == 2) {
            echo ' ' . $links[0] . ' & ' . $links[1] . '.';
        } else if ($num_links == 3) {
            echo ' ' . $links[0] . ', ' . $links[1] . ' & ' . $links[2] . '.';
        }
        ?>
    </span>
</div>
