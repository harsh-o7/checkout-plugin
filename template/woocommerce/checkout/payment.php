<?php
/**
 * Checkout Payment Section
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/payment.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.5.3
 */

defined('ABSPATH') || exit;

if (!wp_doing_ajax()) {
    do_action('woocommerce_review_order_before_payment');
}

$options = get_option( 'ic_design_checkout' );
$layout = $options[ 'ic_checkout_layout' ];
$customText = get_option('ic_design_custom_text');

$paymentMethodsLabel = 'Payment methods';
if(isset($customText['ic_ct_c_payment_method_label']) && $customText['ic_ct_c_payment_method_label'] != '') {
    $paymentMethodsLabel = $customText[ 'ic_ct_c_payment_method_label' ];
}
?>
    <div id="payment" class="woocommerce-checkout-payment">
        <h3><?php echo $paymentMethodsLabel; ?></h3>
        <?php if (WC()->cart->needs_payment()) : ?>
            <ul class="wc_payment_methods payment_methods methods">
                <?php
                if (!empty($available_gateways)) {
                    foreach ($available_gateways as $gateway) {
                        wc_get_template('checkout/payment-method.php', array('gateway' => $gateway));
                    }
                } else {
                    echo '<li class="woocommerce-notice woocommerce-notice--info woocommerce-info">' . apply_filters('woocommerce_no_available_payment_methods_message', WC()->customer->get_billing_country() ? esc_html__('Sorry, it seems that there are no available payment methods for your state. Please contact us if you require assistance or wish to make alternate arrangements.', 'woocommerce') : esc_html__('Please fill in your details above to see available payment methods.', 'woocommerce')) . '</li>'; // @codingStandardsIgnoreLine
                }
                ?>
            </ul>
        <?php endif; ?>
        <div class="form-row place-order">
            <noscript>
                <?php
                /* translators: $1 and $2 opening and closing emphasis tags respectively */
                printf(esc_html__('Since your browser does not support JavaScript, or it is disabled, please ensure you click the %1$sUpdate Totals%2$s button before placing your order. You may be charged more than the amount stated above if you fail to do so.', 'woocommerce'), '<em>', '</em>');
                ?>
                <br/>
                <button type="submit" class="button alt" name="woocommerce_checkout_update_totals"
                        value="<?php esc_attr_e('Update totals', 'woocommerce'); ?>"><?php esc_html_e('Update totals', 'woocommerce'); ?></button>
            </noscript>

            <div class="ic-terms-wrapper">
                <?php wc_get_template('checkout/terms.php'); ?>
                <?php

                $terms_page_id = get_option( 'woocommerce_terms_page_id' );
                if ( ! empty( $terms_page_id ) ) {
                    ?>
                    <p id="ic-terms-unique" class="form-row terms">
                        <label  class="checkbox">
                            <input type="checkbox" class="input-checkbox" name="terms" id="terms" />
                            <?php printf( __( 'I have read and accept the <a href="%s" target="_blank">Terms & Conditions</a>', 'woocommerce' ), esc_url( get_permalink( wc_get_page_id( 'terms' ) ) ) ); ?>
                        </label>
                        <input type="hidden" name="terms-field" value="1" />
                    </p>
                <?php } ?>
            </div>

            <?php do_action('woocommerce_review_order_before_submit'); ?>


            <?php echo apply_filters('woocommerce_order_button_html', '<button type="submit" class="button alt" name="woocommerce_checkout_place_order" id="place_order" value="' . esc_attr($order_button_text) . '" data-value="' . esc_attr($order_button_text) . '">' . esc_html($order_button_text) . '</button>'); // @codingStandardsIgnoreLine ?>

            <?php do_action('woocommerce_review_order_after_submit'); ?>

            <?php wp_nonce_field('woocommerce-process_checkout', 'woocommerce-process-checkout-nonce'); ?>
        </div>
    </div>
<?php
if (!wp_doing_ajax()) {
    do_action('woocommerce_review_order_after_payment');
}
