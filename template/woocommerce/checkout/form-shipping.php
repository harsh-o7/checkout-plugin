<?php
/**
 * Checkout shipping information form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-shipping.php.
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
<div class="woocommerce-shipping-fields">

        <div id="ship-to-different-address">
           <div class="ship-to-different-address-box">
               <input type="checkbox" class="mobile-checkbox-different-address">
               <span>
                <?php
                if( isset( $custom_text[ 'ic_ct_c_use_different_delivery_address_label' ] ) && $custom_text[ 'ic_ct_c_use_different_delivery_address_label' ] != ''  ) {
                    esc_html_e( $custom_text[ 'ic_ct_c_use_different_delivery_address_label' ] );
                } else {
                    esc_html_e( 'Use different delivery address', IC_TD );
                }
                ?>
                </span>
           </div>
            <label class="switch woocommerce-form__label woocommerce-form__label-for-checkbox checkbox" id="different-address-switch">
                <input id="ship-to-different-address-checkbox" class="woocommerce-form__input woocommerce-form__input-checkbox input-checkbox" <?php checked( apply_filters( 'woocommerce_ship_to_different_address_checked', 'shipping' === get_option( 'woocommerce_ship_to_destination' ) ? 1 : 0 ), 1 ); ?> type="checkbox" name="ship_to_different_address" value="1" />
                <span class="slider round"></span>
            </label>
        </div>

		<div class="shipping_address">

            <?php
            // order the keys for your custom ordering or delete the ones you don't need
            $my_shipping_fields=array(
                "shipping_first_name",
                "shipping_last_name",
                "shipping_email",
                "shipping_phone",
                "shipping_address_1",
                "shipping_address_2",
                "shipping_city",
                "shipping_postcode",
            );

            if ( ! isset( $options[ 'ic_checkout_show_phone_number_field' ] ) ) {
                unset( $my_shipping_fields[3] );
            }

            if ( ! isset( $options[ 'ic_checkout_show_apartment_field' ] ) ) {
                unset( $my_shipping_fields[5] );
            }

            foreach ($my_shipping_fields as $key) : ?>
                <?php woocommerce_form_field( $key, $checkout->checkout_fields['shipping'][$key], $checkout->get_value( $key ) ); ?>
            <?php endforeach; ?>
            <p class="form-row form-row-wide address-field" id="shipping_country_field">
                <select name="shipping_country" id="shipping_country" class="country_to_state" required>
                    <?php
                    foreach ( WC()->countries->get_shipping_countries() as $key => $value ) {
                        echo '<option value="' . esc_attr( $key ) . '"' . selected( WC()->customer->get_shipping_country(), esc_attr( $key ), false ) . '>' . esc_html( $value ) . '</option>';
                    }
                    ?>
                </select>
            </p>

<!--			--><?php //do_action( 'woocommerce_before_checkout_shipping_form', $checkout ); ?>
<!---->
<!--			<div class="woocommerce-shipping-fields__field-wrapper">-->
<!--				--><?php
//				$fields = $checkout->get_checkout_fields( 'shipping' );
//
//				foreach ( $fields as $key => $field ) {
//					woocommerce_form_field( $key, $field, $checkout->get_value( $key ) );
//				}
//				?>
<!--			</div>-->

			<?php do_action( 'woocommerce_after_checkout_shipping_form', $checkout ); ?>

		</div>

</div>
<div class="woocommerce-additional-fields">
	<?php do_action( 'woocommerce_before_order_notes', $checkout ); ?>

	<?php if ( apply_filters( 'woocommerce_enable_order_notes_field', 'yes' === get_option( 'woocommerce_enable_order_comments', 'yes' ) ) ) : ?>

		<?php if ( ! WC()->cart->needs_shipping() || wc_ship_to_billing_address_only() ) : ?>

			<h3><?php esc_html_e( 'Additional information', 'woocommerce' ); ?></h3>

		<?php endif; ?>

		<div class="woocommerce-additional-fields__field-wrapper">
			<?php foreach ( $checkout->get_checkout_fields( 'order' ) as $key => $field ) : ?>
				<?php woocommerce_form_field( $key, $field, $checkout->get_value( $key ) ); ?>
			<?php endforeach; ?>
		</div>

	<?php endif; ?>

	<?php do_action( 'woocommerce_after_order_notes', $checkout ); ?>
</div>
