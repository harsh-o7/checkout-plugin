<?php

if ( ! function_exists( 'ic_display_coupon_field' ) ) {
    function ic_display_coupon_field() {
        if( isset($_GET['coupon']) && isset($_GET['redeem-coupon']) ){
            if( $coupon = esc_attr($_GET['coupon']) ) {
                $applied = WC()->cart->apply_coupon($coupon);
            } else {
                $coupon = false;
            }

            $success = sprintf( __('Coupon "%s" Applied successfully.'), $coupon );
            $error   = __("This Coupon can't be applied");

            $message = isset($applied) && $applied ? $success : $error;
        }

        $output  = '<div class="redeem-coupon"><form id="coupon-redeem">
        <p><input type="text" name="coupon" id="coupon"/>
        <input type="submit" name="redeem-coupon" value="'.__('Redeem Offer').'" /></p>';

        $output .= isset($coupon) ? '<p class="result">'.$message.'</p>' : '';

        return $output . '</form></div>';
    }
}


if ( ! function_exists( 'ic_display_payment_methods' ) ) {
    function ic_display_payment_methods(){
        global $woocommerce;

        $available_gatewayz = WC()->payment_gateways->get_available_payment_gateways();


        if ( $available_gatewayz ) { ?>
            <form id="add_payment_method" method="post">
            <div id="payment" class="woocommerce-Payment">
            <ul class="woocommerce-PaymentMethods payment_methods methods">
            <?php

            // Chosen Method.
            if ( count( $available_gatewayz ) ) {
                current( $available_gatewayz )->set_current();
            }

            foreach ( $available_gatewayz as $gatewayz ) {

                ?>
                <li class="woocommerce-PaymentMethod woocommerce-PaymentMethod--<?php echo esc_attr( $gatewayz->id ); ?> payment_method_<?php echo esc_attr( $gatewayz->id ); ?>">
                    <input id="payment_method_<?php echo esc_attr( $gatewayz->id ); ?>" type="radio" class="input-radio" name="payment_method" value="<?php echo esc_attr( $gatewayz->id ); ?>" <?php checked( $gatewayz->chosen, true ); ?> />
                    <label for="payment_method_<?php echo esc_attr( $gatewayz->id ); ?>"><?php echo wp_kses_post( $gatewayz->get_title() ); ?> <?php echo wp_kses_post( $gatewayz->get_icon() ); ?></label>
                    <?php

                    if ( $gatewayz->has_fields() || $gatewayz->get_description() ) {
                        echo '<div class="woocommerce-PaymentBox woocommerce-PaymentBox--' . esc_attr( $gatewayz->id ) . ' payment_box payment_method_' . esc_attr( $gatewayz->id ) . '" style="display: none;">';
                        $gatewayz->payment_fields();
                        echo '</div>';
                    }
                    ?>
                </li>
                <?php

            }}
        ?>
        </ul>
        <?php

    }
}


if ( ! function_exists( 'ic_mini_cart' ) ) {
    function ic_mini_cart($attrs) {

        extract(shortcode_atts(array(
            'coupon_par' => '',
          ), $attrs));

        $design_general = get_option( 'ic_design_general' );
        $design_mini_cart = get_option( 'ic_design_mini_cart' );
        $custom_text = get_option('ic_design_custom_text');

        $checkout_page_id = wc_get_page_id( 'checkout' );
        $checkout_page_url = $checkout_page_id ? get_permalink( $checkout_page_id ) : '';

        do_action( 'woocommerce_before_mini_cart' );

        ic_apply_automatic_discount_to_cart();

        ic_change_shipping_if_free_discount();

        $cart_empty = '';
        if (  WC()->cart->is_empty() ) {
            $cart_empty = 'empty';
        }


        ?>
            <div class="loader">
                <img src="<?php echo plugins_url() . '/mediya-checkout/assets/images/loading.svg' ?>" alt="">
            </div>

            <div class="ic-mini-cart-overlay"></div>

            <div class="ic-mini-cart-inner <?php echo $cart_empty; ?>">

                <div class="ic-mini-cart-header">
                    <h4 class="ic-my-cart-title">
                    <?php

                        if( isset( $custom_text[ 'ic_ct_mc_page_title' ] ) && $custom_text[ 'ic_ct_mc_page_title' ] != ''  ) {
                            esc_html_e( $custom_text[ 'ic_ct_mc_page_title' ] );
                        } else {
                            esc_html_e( 'My Cart', IC_TD );
                        }
                    ?>
                    </h4>
                    <span class="ic-exit-mini-cart">
                        <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M10.5 3.5L3.5 10.5" stroke="#344054" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M3.5 3.5L10.5 10.5" stroke="#344054" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </span>
                </div>

                <?php if ( ! WC()->cart->is_empty() ) : ?>

                    <?php

                        if ( isset( $design_mini_cart[ 'ic_mini_cart_shipping_message' ] ) ) {
                            ?>
                                <p class="ic-mini-cart-shipping-message"><?php echo $design_mini_cart[ 'ic_mini_cart_shipping_message' ]; ?></p>
                            <?php

                        }
                    ?>

                    <div class="ic-mini-cart-dynamic">
                    <p class="custom-text-out-of-stock-msg" style="display:none !important; height: 0 !important; width: 0 !important;"><?php echo $custom_text['ic_ct_c_out_of_stock']?></p>
                        <ul class="woocommerce-mini-cart cart_list product_list_widget">
                            <?php

                            do_action( 'woocommerce_before_mini_cart_contents' );

                            foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
                                $_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
                                $product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

                                $product = wc_get_product($cart_item['product_id']);
                                $variation_id = 0;
                                if ($product->is_type('variable')) {
                                    $variation_id = $cart_item['variation_id'];
                                }

                                if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_widget_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
                                    $product_name      = apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key );
                                    $thumbnail         = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );
                                    $product_price     = apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key );
                                    $product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
                                    ?>
                                    <li class="woocommerce-mini-cart-item <?php echo esc_attr( apply_filters( 'woocommerce_mini_cart_item_class', 'mini_cart_item', $cart_item, $cart_item_key ) ); ?>">
                                        <img class="mini-cart-single-loader" src="<?php echo plugins_url() . '/mediya-checkout/assets/images/single-loader.svg' ?>" alt="single-loader">
                                        <?php

                                        echo apply_filters( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

                                            'woocommerce_cart_item_remove_link',
                                            sprintf(
                                                '<a href="%s" class="remove" aria-label="%s" data-product_id="%s" data-cart_item_key="%s" data-product_sku="%s" data-variation_id="%s"><svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M10.5 3.5L3.5 10.5" stroke="#344054" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M3.5 3.5L10.5 10.5" stroke="#344054" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg></a>',
                                                esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
                                                esc_attr__( 'Remove this item', 'woocommerce' ),
                                                esc_attr( $product_id ),
                                                esc_attr( $cart_item_key ),
                                                esc_attr( $_product->get_sku() ),
                                                esc_attr( $variation_id )
                                            ),
                                            $cart_item_key

                                        );
                                        ?>

                                        <div class="quantity-counter">
                                            <span class="minus-qty">
                                                <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M2.91699 7H11.0837" stroke="#344054" stroke-linecap="round" stroke-linejoin="round"/>
                                                </svg>
                                            </span>
                                            <span class="qty-qty-cont"><?php echo $cart_item['quantity']; ?></span>
                                            <span class="plus-qty">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14" fill="none">
                                                <path d="M7 2.91666V11.0833" stroke="#344054" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path d="M2.91699 7H11.0837" stroke="#344054" stroke-linecap="round" stroke-linejoin="round"/>
                                                </svg>
                                            </span>
                                        </div>

                                        <?php if ( empty( $product_permalink ) ) : ?>
                                            <?php echo $thumbnail . wp_kses_post( '<span class="ic-mini-cart-product-name">' . $product_name . '</span>' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                                        <?php else : ?>
                                            <a href="<?php echo esc_url( $product_permalink ); ?>">
                                                <?php echo $thumbnail . wp_kses_post( '<span class="ic-mini-cart-product-name">' . $product_name . '</span>' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                                            </a>
                                        <?php endif; ?>
                                        <?php echo wc_get_formatted_cart_item_data( $cart_item ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                                        <?php echo apply_filters( 'woocommerce_widget_cart_item_quantity', '<span class="quantity">' . sprintf( '%s', $cart_item['quantity'] ) . '</span>', $cart_item, $cart_item_key ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                                        <?php echo $product_price; ?>
                                    </li>
                                    <?php

                                }
                            }

                            do_action( 'woocommerce_mini_cart_contents' );
                            ?>
                        </ul>

                        <?php

                        if(  isset( $design_mini_cart['ic_mini_cart_enable_coupons'] ) ) {
                            if( isset($_GET['coupon']) && isset($_GET['redeem-coupon']) ){
                                if( $coupon = esc_attr($_GET['coupon']) ) {
                                    $applied = WC()->cart->apply_coupon($coupon);
                                } else {
                                    $coupon = false;
                                }

                                $success = sprintf( __('Coupon "%s" Applied successfully.'), $coupon );
                                $error   = __("This Coupon can't be applied");

                                $message = isset($applied) && $applied ? $success : $error;
                            }

                            $coupon_text = 'Discount code';
                            $coupon_apply = 'Apply';
                            if(isset($custom_text['ic_ct_mc_discount_code_label']) && $custom_text['ic_ct_mc_discount_code_label'] != '') {
                                $coupon_text = $custom_text[ 'ic_ct_mc_discount_code_label' ];
                            }

                            if(isset($custom_text['ic_ct_mc_apply_button_label']) && $custom_text['ic_ct_mc_apply_button_label'] != '') {
                                $coupon_apply = $custom_text['ic_ct_mc_apply_button_label'];
                            }


                            $borderRadius = $design_general[ 'ic_design_corner_radius_px' ];
                            if ($borderRadius){
                                $borderRadius .= ' !important';
                            }else{
                                $borderRadius .= '8px !important';
                            }

                            $output  ='<div class="redeem-coupon" style="-webkit-appearance: none !important;"><form id="coupon-redeem" style="-webkit-appearance: none !important;">
                            <p style="-webkit-appearance: none !important;"><input style="-webkit-appearance: none !important;" class="ic-coupon-input" type="text" name="coupon" id="coupon" placeholder="' . $coupon_text . '" />
                            <input 
                            style="-webkit-appearance: none !important; border-radius: ' . $borderRadius . '; -webkit-border-radius:  ' . $borderRadius . '; -moz-border-radius:  ' . $borderRadius . '; -ms-border-radius:  ' . $borderRadius . '; -o-border-radius:  ' . $borderRadius . '; " id="apply-coupon" type="submit" name="redeem-coupon" value="' . $coupon_apply . '" /></p>';

                            $output .= isset($coupon) ? '<p class="result">'.$message.'</p>' : '';

                            echo $output . '</form></div>';
                            }
                        $customCouponText = '';
                            if($coupon_par == 'invalid') {
                                if(isset($custom_text['ic_ct_mc_coupon_error_label']) && $custom_text['ic_ct_mc_coupon_error_label'] != '') {
                                $customCouponText = $custom_text['ic_ct_mc_coupon_error_label'];
                                }
                                echo '<p class="invalid-coupon ic-invalid-coupon"> '.$customCouponText.' <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14" fill="none"> <path fill-rule="evenodd" clip-rule="evenodd" d="M7 14C3.13401 14 0 10.866 0 7C0 3.13401 3.13401 0 7 0C10.866 0 14 3.13401 14 7C14 10.866 10.866 14 7 14ZM7 11.8125C7.72487 11.8125 8.3125 11.2249 8.3125 10.5C8.3125 9.77513 7.72487 9.1875 7 9.1875C6.27513 9.1875 5.6875 9.77513 5.6875 10.5C5.6875 11.2249 6.27513 11.8125 7 11.8125ZM7 1.75C6.51675 1.75 6.125 2.14175 6.125 2.625V7C6.125 7.48325 6.51675 7.875 7 7.875C7.48325 7.875 7.875 7.48325 7.875 7V2.625C7.875 2.14175 7.48325 1.75 7 1.75Z" fill="#F04438"/> </svg></p>';
                            }else if($coupon_par == 'valid') {
                                if(isset($custom_text['ic_ct_mc_coupon_label']) && $custom_text['ic_ct_mc_coupon_label'] != '') {
                                $customCouponText = $custom_text['ic_ct_mc_coupon_label'];
                                }
                                echo '<p class="valid-coupon ic-valid-coupon">'.$customCouponText.'</p>';
                            }
                        ?>
                        <?php if(isset($design_mini_cart['ic_mini_cart_enable_progressbar']) && $design_mini_cart['ic_mini_cart_enable_progressbar'] == 1){ ?>
                        <div class="progress-bar-wrapper">
                            <img class="mini-cart-progress-loader" src="<?php echo plugins_url() . '/mediya-checkout/assets/images/single-loader.svg' ?>" alt="single-loader">
                            <div class="progress-notice"></div>
                            <div class="progress">
                                <div class="progress-done" data-done="0"></div>
                            </div>
                        </div>
                        <?php } ?>
                        <div class="ic-mini-cart-totals">
                            <div class="cart-subtotal">
                                <p>
                                <?php

                                    if( isset( $custom_text[ 'ic_ct_mc_subtotal_label' ] ) && $custom_text[ 'ic_ct_mc_subtotal_label' ] != ''  ) {
                                        esc_html_e( $custom_text[ 'ic_ct_mc_subtotal_label' ] );
                                    } else {
                                        esc_html_e( 'Subtotal', IC_TD );
                                    }
                                ?>
                                </p>
                                <p><?php wc_cart_totals_subtotal_html(); ?></p>
                            </div>
                            <div class="shipping-selected">
                                <p>
                                <?php

                                    if( isset( $custom_text[ 'ic_ct_mc_shipping_label' ] ) && $custom_text[ 'ic_ct_mc_shipping_label' ] != ''  ) {
                                        esc_html_e( $custom_text[ 'ic_ct_mc_shipping_label' ] );
                                    } else {
                                        esc_html_e( 'Shipping', IC_TD );
                                    }
                                ?>
                                </p>
                                <?php

                                    $shipping_total = WC()->cart->get_cart_shipping_total();
                                    $free_class = '';
                                    if($shipping_total == 'Free!') {
                                        $free_class = 'ic-free-shipping';
                                    }
                                 ?>
                                <p class="ic_ct_mc_shipping_label_price <?php echo $free_class; ?>"><?php echo WC()->cart->get_cart_shipping_total(); ?></p>
                            </div>
                            <?php foreach ( WC()->cart->get_coupons() as $code => $coupon ) : ?>
                                <div class="cart-discount coupon-<?php echo esc_attr( sanitize_title( $code ) ); ?>" id="<?php echo esc_attr( sanitize_title( $code ) ); ?>">
                                    <p><?php ic_wc_cart_totals_coupon_label( $coupon ); ?></p>
                                    <p><?php ic_wc_cart_totals_coupon_html( $coupon ); ?></p>
                                </div>
                            <?php endforeach; ?>

                            <?php if ( ic_fee_bigger_than_zero() ) : ?>
                                <?php foreach ( WC()->cart->get_fees() as $fee ) : ?>
                                <?php if (ic_single_fee_bigger_than_zero_minicart($fee) ) : ?>
                                    <div class="fee">
                                        <p><?php echo esc_html( $fee->name ); ?></p>
                                        <p><?php wc_cart_totals_fee_html( $fee ); ?></p>
                                    </div>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            <?php endif; ?>

                            <?php if ( wc_tax_enabled() && ! WC()->cart->display_prices_including_tax() ) : ?>
                                <?php if ( 'itemized' === get_option( 'woocommerce_tax_total_display' ) ) : ?>
                                    <?php foreach ( WC()->cart->get_tax_totals() as $code => $tax ) : // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited ?>
                                        <div class="tax-rate tax-rate-<?php echo esc_attr( sanitize_title( $code ) ); ?>">
                                            <p>
                                            <?php

                                                if( isset( $custom_text[ 'ic_ct_mc_taxes_label' ] ) && $custom_text[ 'ic_ct_mc_taxes_label' ] != ''  ) {
                                                    esc_html_e( $custom_text[ 'ic_ct_mc_taxes_label' ] );
                                                } else {
                                                    esc_html_e( 'Tax', IC_TD );
                                                }
                                            ?>
                                            </p>
                                            <p><?php echo wp_kses_post( $tax->formatted_amount ); ?></p>
                                        </div>
                                    <?php endforeach; ?>
                                <?php else : ?>
                                    <div class="tax-total">
                                        <p><?php echo esc_html( WC()->countries->tax_or_vat() ); ?></p>
                                        <p><?php wc_cart_totals_taxes_total_html(); ?></p>
                                    </div>
                                <?php endif; ?>
                            <?php endif; ?>

                            <?php do_action( 'woocommerce_review_order_before_order_total' ); ?>

                            <div class="order-total">
                                <p>
                                <?php

                                    if( isset( $custom_text[ 'ic_ct_mc_total_label' ] ) && $custom_text[ 'ic_ct_mc_total_label' ] != ''  ) {
                                        esc_html_e( $custom_text[ 'ic_ct_mc_total_label' ] );
                                    } else {
                                        esc_html_e( 'Total', IC_TD );
                                    }
                                ?>
                                </p>
                                <p><?php ic_wc_cart_totals_order_total_html(); ?></p>
                            </div>
                        </div>
                    </div>


                    <?php

                     $recommendations_type = isset( $design_mini_cart [ 'ic_mini_cart_recommendations' ]  ) ? $design_mini_cart[ 'ic_mini_cart_recommendations_type' ] : null;
                     if ( $recommendations_type != null ) {
                          include( WP_PLUGIN_DIR . '/mediya-checkout/templates/front/parts/ic-recommendations.php' );
                     }
                     ?>

                   <div class="ic-mini-cart-bottom-box-fixed">
                    <div class="ic-mini-cart-buttons">
                        <?php

                        $one_button = 'one-button';
                        if ( isset( $design_mini_cart[ 'ic_mini_cart_enable_secondary_button' ] ) ) :
                            $one_button = '';
                        ?>
                            <a href="<?php echo get_permalink( wc_get_page_id( 'shop' ) ); ?>" class="ic-mini-cart-shop-link">
                                <?php

                                    if ( isset( $design_mini_cart[ 'ic_mini_cart_secondary_button' ] ) ) {
                                        echo $design_mini_cart[ 'ic_mini_cart_secondary_button' ];
                                    } else {
                                        echo __( 'Keep Shopping' );
                                    }
                                ?>
                            </a>
                        <?php endif; ?>
                        <a href="<?php echo $checkout_page_url; ?>" class="ic-mini-cart-checkout-link <?php echo $one_button; ?>">
                            <?php

                                if ( isset( $design_mini_cart[ 'ic_mini_cart_primary_button' ] ) ) {
                                    echo $design_mini_cart[ 'ic_mini_cart_primary_button' ];
                                } else {
                                    echo __( 'Checkout' );
                                }
                            ?>
                        </a>
                    </div>

                    <?php

                     if ( isset( $design_mini_cart[ 'ic_mini_cart_bottom_message' ] ) ) {
                         ?>
                         <p class="ic-mini-cart-bottom-message"><?php echo esc_attr( $design_mini_cart[ 'ic_mini_cart_bottom_message' ] );  ?></p>
                         <?php

                     }
                     ?>
                </div>
                <?php else : ?>
                <?php

                   $cartEmptyMessage = 'Your cart is empty';
                   $cartEmptyButtonLabel = 'Go to shop';
                   $totalLabel = 'Total';
                   if ( isset( $custom_text[ 'ic_ct_mc_total_label' ] ) && $custom_text[''] != 'ic_ct_mc_total_label' ) {
                       $totalLabel = $custom_text['ic_ct_mc_total_label'];
                   }
                   if ( isset( $custom_text[ 'ic_ct_mc_cart_empty_message' ] ) && $custom_text['ic_ct_mc_cart_empty_message'] != '' ) {
                       $cartEmptyMessage = $custom_text['ic_ct_mc_cart_empty_message'];
                   }
                   if ( isset( $custom_text[ 'ic_ct_mc_cart_empty_button_label' ] ) && $custom_text['ic_ct_mc_cart_empty_button_label'] != '' ) {
                       $cartEmptyButtonLabel = $custom_text['ic_ct_mc_cart_empty_button_label'];
                   }

                ?>

                    <div class="ic-mini-cart-empty">
                        <p><?php echo $cartEmptyMessage; ?></p>
                        <a href="<?php echo get_permalink( wc_get_page_id( 'shop' ) ); ?>"><?php echo $cartEmptyButtonLabel; ?></a>
                    </div>

                    <div class="ic-mini-cart-bottom-box-fixed">
                         <div class="ic-mini-cart-empty-total">
                            <p class="title"><?php echo $totalLabel; ?></p>
                            <p class="zero"><?php echo get_woocommerce_currency_symbol(); ?>0</p>
                        </div>
                        <div class="ic-mini-cart-buttons empty">
                              <?php

                        $one_button = 'one-button';
                        if ( isset( $design_mini_cart[ 'ic_mini_cart_enable_secondary_button' ] ) ) :
                            $one_button = '';
                        ?>
                            <a href="<?php echo get_permalink( wc_get_page_id( 'shop' ) ); ?>" class="ic-mini-cart-shop-link">
                                <?php

                                    if ( isset( $design_mini_cart[ 'ic_mini_cart_secondary_button' ] ) ) {
                                        echo $design_mini_cart[ 'ic_mini_cart_secondary_button' ];
                                    } else {
                                        echo __( 'Keep Shopping' );
                                    }
                                ?>
                            </a>
                        <?php endif; ?>
                        <a href="<?php echo $checkout_page_url; ?>" class="ic-mini-cart-checkout-link disabled <?php echo $one_button; ?>">
                            <?php

                                if ( isset( $design_mini_cart[ 'ic_mini_cart_primary_button' ] ) ) {
                                    echo $design_mini_cart[ 'ic_mini_cart_primary_button' ];
                                } else {
                                    echo __( 'Checkout' );
                                }
                            ?>
                        </a>
                        </div>

                    <?php

                     if ( isset( $design_mini_cart[ 'ic_mini_cart_bottom_message' ] ) ) {
                         ?>
                         <p class="ic-mini-cart-bottom-message"><?php echo esc_attr( $design_mini_cart[ 'ic_mini_cart_bottom_message' ] );  ?></p>
                         <?php

                     }
                     ?>

                <?php endif; ?>

                   </div>
                <?php do_action( 'woocommerce_after_mini_cart' ); ?>

            </div>
        <?php

    }
}


if ( ! function_exists( 'ic_mini_cart_floating' ) ) {
    function ic_mini_cart_floating() {

        $cart_quantity = WC()->cart->get_cart_contents_count();
        ?>

          <div class="ic-mini-cart-floating">
              <i class="fa-sharp ic-mini-cart-toggle fa-solid fa-cart-shopping"></i>
              <?php  if ($cart_quantity > 0): ?>
              <p class="ic-mini-cart-floating-quantity-number active"><?php echo $cart_quantity?></p>
              <?php else: ?>
              <p class="ic-mini-cart-floating-quantity-number"></p>
                <?php endif; ?>
          </div>
        <?php

    }
}


if ( ! function_exists( 'ic_checkout_upsells' ) ) {
    function ic_checkout_upsells() {
        ?>
          <?php

        $upsell_products = ic_get_upsells_for_triggers('checkout_page');
        $custom_text = get_option('ic_design_custom_text');
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
                <div class="ic-upsell-info">
                    <h6>
                        <?php

                        if( isset( $custom_text[ 'ic_ct_c_recommendations_title' ] ) && $custom_text[ 'ic_ct_c_recommendations_title' ] != ''  ) {
                            esc_html_e( $custom_text[ 'ic_ct_c_recommendations_title' ] );
                        } else {
                            esc_html_e( 'Don’t miss the deal 👍', IC_TD );
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
                    <div id="ic-upsell" class="ic-checkout-upsell swiper <?php echo $class; ?> ">
                        <div class="swiper-wrapper">
                            <?php

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
        <?php

        }

    }
}


if ( ! function_exists( 'ic_checkout_shipping_methods' ) ) {
    function ic_checkout_shipping_methods() {
        ?>
        <p>Testing out,this shortcode is not used anywhere</p>
        <?php

    }
}