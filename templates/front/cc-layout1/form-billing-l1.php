<?php
/**
 * Checkout billing information form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-billing.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 * @global WC_Checkout $checkout
 */

defined( 'ABSPATH' ) || exit;
$custom_text = get_option('ic_design_custom_text');

?>

<?php
//if ( isset( $custom_text[ 'ic_ct_c_breadcrumb' ] ) && $custom_text[ 'ic_ct_c_breadcrumb' ] != '' ) {
//?>
<!--<p class="ic-cc-breadcrumb">-->
<!--    --><?php //esc_html_e( $custom_text[ 'ic_ct_c_breadcrumb' ] ); ?>
<!--</p>-->
<?php
//}
//?>

<div class="ic-checkout-logo ic-checkout-logo-desktop hidden"> <?php ic_get_custom_logo() ?> </div>
<!---->
<!--<h2 class="ic-cc-title">-->
<!--    --><?php
//    if( isset( $custom_text[ 'ic_ct_c_page_title' ] ) && $custom_text[ 'ic_ct_c_page_title' ] != ''  ) {
//        esc_html_e( $custom_text[ 'ic_ct_c_page_title' ] );
//    } else {
//        esc_html_e( 'Checkout', IC_TD );
//    }
//    ?>
<!--</h2>-->

<div class="woocommerce-billing-fields">

    <?php if ( wc_ship_to_billing_address_only() && WC()->cart->needs_shipping() ) : ?>

        <h3><?php esc_html_e( 'Billing &amp; Shipping', 'woocommerce' ); ?></h3>

    <?php else : ?>

        <h3 class="ic-shipping-text">
            <?php
            if( isset( $custom_text[ 'ic_ct_c_shipping_address_label' ] ) && $custom_text[ 'ic_ct_c_shipping_address_label' ] != ''  ) {
                esc_html_e( $custom_text[ 'ic_ct_c_shipping_address_label' ] );
            } else {
                esc_html_e( 'Shipping address', IC_TD );
            }
            ?>
        </h3>
        <?php if ( ! is_user_logged_in() ) : ?>
        <?php
            $alreadyValue = 'Already have an account?';
            if( isset( $custom_text[ 'ic_ct_c_already_have_an_account_label' ] ) && $custom_text[ 'ic_ct_c_already_have_an_account_label' ] != ''  ) {
                $alreadyValue =  $custom_text[ 'ic_ct_c_already_have_an_account_label' ] ;
            }
        ?>
            <p class="already-have-an-account"><?php echo $alreadyValue; ?>
                <span>
                    <a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>">
                        <?php
                        if( isset( $custom_text[ 'ic_ct_c_log_in_button_label' ] ) && $custom_text[ 'ic_ct_c_log_in_button_label' ] != ''  ) {
                            esc_html_e( $custom_text[ 'ic_ct_c_log_in_button_label' ] );
                        } else {
                            esc_html_e( 'Log in', IC_TD );
                        }
                        ?>
                    </a>
                </span>
            </p>
        <?php endif; ?>

    <?php endif; ?>

    <?php do_action( 'woocommerce_before_checkout_billing_form', $checkout ); ?>

    <div class="woocommerce-billing-fields__field-wrapper">
        <?php
        // order the keys for your custom ordering or delete the ones you don't need
        $mybillingfields=array(
            "billing_first_name",
            "billing_last_name",
            "billing_email",
            "billing_phone",
            "billing_company",
            "billing_address_1",
            "billing_address_2",
            "billing_city",
            "billing_state",
            "billing_postcode",
        );
        if ( ! isset( $options[ 'ic_checkout_show_phone_number_field' ] ) ) {
            unset( $mybillingfields[3] );
        }
        if ( ! isset( $options[ 'ic_checkout_show_company_field' ] ) ) {
            unset( $mybillingfields[4] );
        }
        if ( ! isset( $options[ 'ic_checkout_show_apartment_field' ] ) ) {
            unset( $mybillingfields[6] );
        }

        foreach ($mybillingfields as $key) : ?>
        <?php
            $billing_field = $checkout->checkout_fields['billing'][$key];
            switch ($key) {
                case 'billing_first_name':
                    if (isset($custom_text['ic_ct_c_first_name'])){
                        $billing_field['placeholder'] =$custom_text['ic_ct_c_first_name'];
                    }
                    break;
                case 'billing_last_name':
                    if (isset($custom_text['ic_ct_c_last_name'])){
                        $billing_field['placeholder'] =$custom_text['ic_ct_c_last_name'];
                    }
                    break;
                case 'billing_email':
                    if (isset($custom_text['ic_ct_c_email'])){
                        $billing_field['placeholder'] =$custom_text['ic_ct_c_email'];
                    }
                    break;
                case 'billing_phone':
                    if (isset($custom_text['ic_ct_c_phone'])){
                        $billing_field['placeholder'] =$custom_text['ic_ct_c_phone'];
                    }
                    break;
                case 'billing_company':
                    if (isset($custom_text['ic_ct_c_company'])){
                        $billing_field['placeholder'] =$custom_text['ic_ct_c_company'];
                    }
                    break;
                case 'billing_address_1':
                    if (isset($custom_text['ic_ct_c_street_address'])){
                        $billing_field['placeholder'] =$custom_text['ic_ct_c_street_address'];
                    }
                    break;
                case 'billing_address_2':
                    if (isset($custom_text['ic_ct_c_apartment_suite'])){
                        $billing_field['placeholder'] =$custom_text['ic_ct_c_apartment_suite'];
                    }
                    break;
                case 'billing_city':
                    if (isset($custom_text['ic_ct_c_city'])){
                        $billing_field['placeholder'] =$custom_text['ic_ct_c_city'];
                    }
                    break;
                case 'billing_state':
                    if (isset($custom_text['ic_ct_c_state'])){
                        $billing_field['placeholder'] =$custom_text['ic_ct_c_state'];
                    }
                    break;
                case 'billing_postcode':
                    if (isset($custom_text['ic_ct_c_zip_code'])){
                        $billing_field['placeholder'] =$custom_text['ic_ct_c_zip_code'];
                    }
                    break;
            }
            ?>

            <?php     woocommerce_form_field($key, $billing_field, $checkout->get_value($key));
             ?>

        <?php endforeach; ?>
        <p class="form-row form-row-wide address-field" id="billing_country_field">
            <label for="billing_country"><?php esc_html_e( 'Country / Region', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
            <select name="billing_country" id="billing_country" class="country_to_state" required>
                <?php
                foreach ( WC()->countries->get_shipping_countries() as $key => $value ) {
                    echo '<option value="' . esc_attr( $key ) . '"' . selected( WC()->customer->get_billing_country(), esc_attr( $key ), false ) . '>' . esc_html( $value ) . '</option>';
                }
                ?>
            </select>
        </p>
    </div>

    <?php do_action( 'woocommerce_after_checkout_billing_form', $checkout ); ?>
</div>

<?php if ( ! is_user_logged_in() && $checkout->is_registration_enabled() ) : ?>
    <div class="woocommerce-account-fields">
        <?php if ( ! $checkout->is_registration_required() ) : ?>

            <p class="form-row form-row-wide create-account">
                <label class="woocommerce-form__label woocommerce-form__label-for-checkbox checkbox">
                    <input class="woocommerce-form__input woocommerce-form__input-checkbox input-checkbox" id="createaccount" <?php checked( ( true === $checkout->get_value( 'createaccount' ) || ( true === apply_filters( 'woocommerce_create_account_default_checked', false ) ) ), true ); ?> type="checkbox" name="createaccount" value="1" /> <span><?php esc_html_e( 'Create an account?', 'woocommerce' ); ?></span>
                </label>
            </p>

        <?php endif; ?>

        <?php do_action( 'woocommerce_before_checkout_registration_form', $checkout ); ?>

        <?php if ( $checkout->get_checkout_fields( 'account' ) ) : ?>

            <div class="create-account">
                <?php foreach ( $checkout->get_checkout_fields( 'account' ) as $key => $field ) : ?>
                    <?php woocommerce_form_field( $key, $field, $checkout->get_value( $key ) ); ?>
                <?php endforeach; ?>
                <div class="clear"></div>
            </div>

        <?php endif; ?>

        <?php do_action( 'woocommerce_after_checkout_registration_form', $checkout ); ?>
    </div>
<?php endif; ?>
