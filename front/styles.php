<?php

if ( ! function_exists( 'ic_apply_styles' ) ) {
        function ic_apply_styles() {
        $design = get_option( 'ic_design_general' );
        $checkout_design = get_option( 'ic_design_checkout' );
        $mini_cart_design = get_option('ic_design_mini_cart');
        $mini_cart_enabled = isset( $mini_cart_design[ 'ic_mini_cart_enabled' ] ) ? $mini_cart_design[ 'ic_mini_cart_enabled' ] : false;
        $mini_cart_floating_enabled = isset( $mini_cart_design[ 'ic_mini_cart_floating_enabled' ] ) ? $mini_cart_design[ 'ic_mini_cart_floating_enabled' ] : false;
        ?>
            <style>
                <?php
                    if ( $mini_cart_enabled != '1' ) {
                        ?>
                        .ic-mini-cart-icon, body .ic-mini-cart-wrapper.active {
                            display: none !important;
                        }
                        <?php
                    }
                ?>

                <?php
                    if ( $mini_cart_floating_enabled != '1' ) {
                        ?>
                        .ic-mini-cart-floating {
                            display: none !important;
                        }
                        <?php
                    } else {
                        ?>
                        .ic-mini-cart-icon {
                            display: none !important;
                        }
                        <?php
                    }
                ?>

                <?php
                    if ( ! isset( $design[ 'ic_design_typography' ] ) ) {
                        $font = $design[ 'ic_design_font' ];
                        str_replace( $font, ' ', '+' );
                        $font_url = 'https://fonts.googleapis.com/css2?family=' . $font . ':ital,wght@0,200;0,300;0,400;0,600;0,700;0,900;1,200;1,300;1,400;1,600;1,700;1,900&display=swap';
                        $font_weight = $design[ 'ic_design_font_weight' ];
                        $font_weight = ( intval( $font_weight ) + 1 ) * 100;
                        $font_style = $design[ 'ic_design_font_subsets' ];
                        switch ( $font_style ) {
                            case '0': $font_style = 'normal'; break;
                            case '1': $font_style = 'italic'; break;
                            case '2': $font_style = 'oblique'; break;
                            default: break;
                        }
                ?>

                @import url('<?php echo $font_url; ?>');

                #ic-checkout p, #ic-checkout a, #ic-checkout span, #ic-checkout li, #ic-checkout td, #ic-checkout h1,
                #ic-checkout h2, #ic-checkout h3, #ic-checkout h4, #ic-checkout h5, #ic-checkout h6, #ic-checkout div,
                .ic-mini-cart-wrapper p,  .ic-mini-cart-wrapper a, .ic-mini-cart-wrapper span, .ic-mini-cart-wrapper li,
                .ic-mini-cart-wrapper td, .ic-mini-cart-wrapper h1, .ic-mini-cart-wrapper h2, .ic-mini-cart-wrapper h3,
                .ic-mini-cart-wrapper h4, .ic-mini-cart-wrapper h5, .ic-mini-cart-wrapper h6, .ic-mini-cart-wrapper div,
                .ic-ty-cont p, .ic-ty-cont a, .ic-ty-cont span, .ic-ty-cont li, .ic-ty-cont td, .ic-ty-cont h1,
                .ic-ty-cont h2, .ic-ty-cont h3, .ic-ty-cont h4, .ic-ty-cont h5, .ic-ty-cont h6, .ic-ty-cont div,
                .ic-checkout-site-name, .ic-mini-cart-wrapper p input, .ic-cc-single-section p, .ic-cc-single-section h1,
                .ic-cc-single-section h2, .ic-cc-single-section h3, .ic-cc-single-section h4, .ic-cc-single-section h5,
                .ic-cc-single-section h6, .ic-cc-single-section div, .ic-cc-single-section span, .ic-cc-single-section li,
                .ic-cc-single-section td, .ic-additional-links-single-box span, .ic-additional-links-single-box p,
                .ic-additional-links-single-box a, .select2-container span, .select2-container li, .select2-container li span,
                #ic-additional-links span, #ic-additional-links a, #ic-additional-links span a, button#place_order,
                input#coupon_code, button[name='apply_coupon'] , .woocommerce-billing-fields input,
                .woocommerce-shipping-fields input, .upsellModal-close-btn, #ic-checkout .swal-title ,
                #ic-checkout .swal-text,#ic-checkout .swal-button, .ic-checkout-terms-and-conditions-error {
                    font-family: '<?php echo $font; ?>' !important;
                    font-weight: <?php echo $font_weight; ?> !important;
                    font-style: <?php echo $font_style; ?> !important;
                }

                .ic-mini-cart-inner h4.ic-my-cart-title {
                    font-family: '<?php echo $font; ?>' !important;
                    font-weight: <?php echo $font_weight; ?> !important;
                    font-style: <?php echo $font_style; ?> !important;
                }
                <?php } ?>

                <?php if ( ! isset( $design[ 'ic_design_corner_radius' ] ) ) : ?>

                button#place_order, #multistep-navigation .continue, span.select2-selection.select2-selection--single,
                .select2-container .select2-dropdown, form#ic-checkout input,
                #order_review .order_review-order-summary-box, ul.wc_payment_methods.payment_methods.methods,
                #order_review .order_review-order-dont-miss-box, .order_review-order-dont-miss-box,
                .ic-mini-cart-buttons a, .select2-container .select2-dropdown .select2-search__field,
                .select2-container--default .select2-results__option--highlighted[aria-selected],
                #order_review .ic-order-review table .cart_item .quantity-cont .quantity-counter,
                form#ic-checkout #shipping_last_name, form#ic-checkout #shipping_first_name,
                form#ic-checkout #shipping_company, form#ic-checkout #shipping_address_1,
                form#ic-checkout #select2-shipping_country-container, form#ic-checkout #shipping_address_2,
                form#ic-checkout #shipping_city, form#ic-checkout #bselect2-shipping_state-container,
                form#ic-checkout #shipping_postcode, .ic-cc-layout3 .contact-info, .ic-cc-layout3 .items-in-shipment,
                .page-template-mcheckout-checkout .swal-overlay--show-modal .swal-modal,
                .page-template-mcheckout-checkout .swal-modal .swal-content ul.woocommerce-error,
                .page-template-mcheckout-checkout .swal-modal .swal-button-container .swal-button,
                .ic-cc-layout1 .items-in-shipment, .ic-ty-con-box-section .contact-us, .ic-ty-con-box-section .continue,
                .ic-cc-layout1 .contact-info h5, .ic-cc-layout3 .col-md-5 h5, .ic-cc-layout1 .items-in-shipment h5,
                .ic-mini-cart-wrapper p.product.woocommerce.add_to_cart_inline a,
                div#ic-upsell p.product.woocommerce.add_to_cart_inline a, #ic-upsell .us-slide-left img,
                .ic-mini-cart-wrapper form#coupon-redeem input#apply-coupon, .ic-mini-cart-wrapper form input,
                .ic-mini-cart-wrapper #coupon-redeem input#apply-coupon,
                .ic-mini-cart-wrapper #coupon-redeem #apply-coupon,
                .ic-mini-cart-wrapper form#coupon-redeem #apply-coupon, #ic-checkout .express-payment-cont,
                .ic-mini-cart-wrapper form#coupon-redeem input#coupon,
                #ic-checkout .select2-search__field {
                    -webkit-border-radius: <?php echo $design[ 'ic_design_corner_radius_px' ]; ?> !important;
                    -moz-border-radius: <?php echo $design[ 'ic_design_corner_radius_px' ]; ?> !important;
                    -ms-border-radius: <?php echo $design[ 'ic_design_corner_radius_px' ]; ?> !important;
                    -o-border-radius: <?php echo $design[ 'ic_design_corner_radius_px' ]; ?> !important;
                    border-radius: <?php echo $design[ 'ic_design_corner_radius_px' ]; ?> !important;
                }

                #order_review .order_review-order-dont-miss-box .ic-upsell-info,
                .order_review-order-dont-miss-box .ic-upsell-info,
                .ic-cc-layout3 .contact-info h5,
                #order_review .order_review-order-summary-box .order-review-main-header,
                #order_review .order_review-order-summary-box .ic-order-review-heading,
                .ic-cc-layout3-desktop .items-in-shipment .ic-cc-layout3-items-in-shipment {
                    -webkit-border-radius: <?php echo $design[ 'ic_design_corner_radius_px' ]; ?> <?php echo $design[ 'ic_design_corner_radius_px' ]; ?> 0 0 !important;
                    -moz-border-radius: <?php echo $design[ 'ic_design_corner_radius_px' ]; ?> <?php echo $design[ 'ic_design_corner_radius_px' ]; ?> 0 0 !important;
                    -ms-border-radius: <?php echo $design[ 'ic_design_corner_radius_px' ]; ?> <?php echo $design[ 'ic_design_corner_radius_px' ]; ?> 0 0 !important;
                    -o-border-radius: <?php echo $design[ 'ic_design_corner_radius_px' ]; ?> <?php echo $design[ 'ic_design_corner_radius_px' ]; ?> 0 0 !important;
                    border-radius: <?php echo $design[ 'ic_design_corner_radius_px' ]; ?> <?php echo $design[ 'ic_design_corner_radius_px' ]; ?> 0 0 !important;
                }
                .select2-container .select2-dropdown .select2-search__field {
                    -webkit-border-radius: <?php echo $design[ 'ic_design_corner_radius_px' ]; ?> !important;
                    -moz-border-radius: <?php echo $design[ 'ic_design_corner_radius_px' ]; ?> !important;
                    -ms-border-radius: <?php echo $design[ 'ic_design_corner_radius_px' ]; ?> !important;
                    -o-border-radius: <?php echo $design[ 'ic_design_corner_radius_px' ]; ?> !important;
                    border-radius: <?php echo $design[ 'ic_design_corner_radius_px' ]; ?> !important;
                }


                <?php else: ?>


                button#place_order, #multistep-navigation .continue, span.select2-selection.select2-selection--single,
                .select2-container .select2-dropdown, form#ic-checkout input,
                #order_review .order_review-order-summary-box, ul.wc_payment_methods.payment_methods.methods,
                #order_review .order_review-order-dont-miss-box, .order_review-order-dont-miss-box,
                .ic-mini-cart-buttons a, .select2-container .select2-dropdown .select2-search__field,
                .select2-container--default .select2-results__option--highlighted[aria-selected],
                #order_review .ic-order-review table .cart_item .quantity-cont .quantity-counter,
                form#ic-checkout #shipping_last_name, form#ic-checkout #shipping_first_name,
                form#ic-checkout #shipping_company, form#ic-checkout #shipping_address_1,
                form#ic-checkout #select2-shipping_country-container, form#ic-checkout #shipping_address_2,
                form#ic-checkout #shipping_city, form#ic-checkout #bselect2-shipping_state-container,
                form#ic-checkout #shipping_postcode, .ic-cc-layout3 .contact-info, .ic-cc-layout3 .items-in-shipment,
                .page-template-mcheckout-checkout .swal-overlay--show-modal .swal-modal,
                .page-template-mcheckout-checkout .swal-modal .swal-content ul.woocommerce-error,
                .page-template-mcheckout-checkout .swal-modal .swal-button-container .swal-button,
                .ic-cc-layout1 .items-in-shipment, .ic-ty-con-box-section .contact-us, .ic-ty-con-box-section .continue,
                .ic-cc-layout1 .contact-info h5, .ic-cc-layout3 .col-md-5 h5, .ic-cc-layout1 .items-in-shipment h5,
                .ic-mini-cart-wrapper p.product.woocommerce.add_to_cart_inline a,
                div#ic-upsell p.product.woocommerce.add_to_cart_inline a, #ic-upsell .us-slide-left img,
                .ic-mini-cart-wrapper form#coupon-redeem input#apply-coupon, .ic-mini-cart-wrapper form input,
                .ic-mini-cart-wrapper #coupon-redeem input#apply-coupon,
                .ic-mini-cart-wrapper #coupon-redeem #apply-coupon,
                .ic-mini-cart-wrapper form#coupon-redeem #apply-coupon, #ic-checkout .express-payment-cont,
                .ic-mini-cart-wrapper form#coupon-redeem input#coupon,
                #ic-checkout .select2-search__field{
                    -webkit-border-radius: 8px !important;
                    -moz-border-radius: 8px !important;
                    -ms-border-radius: 8px !important;
                    -o-border-radius: 8px !important;
                    border-radius: 8px !important;
                }

                #order_review .order_review-order-dont-miss-box .ic-upsell-info,
                .order_review-order-dont-miss-box .ic-upsell-info,
                .ic-cc-layout3 .contact-info h5,
                #order_review .order_review-order-summary-box .order-review-main-header,
                #order_review .order_review-order-summary-box .ic-order-review-heading,
                .ic-cc-layout3-desktop .items-in-shipment .ic-cc-layout3-items-in-shipment {
                    -webkit-border-radius:  8px  8px 0 0 !important;
                    -moz-border-radius:  8px  8px 0 0 !important;
                    -ms-border-radius:  8px  8px 0 0 !important;
                    -o-border-radius:  8px  8px 0 0 !important;
                    border-radius:  8px  8px 0 0 !important;
                }

                .select2-container .select2-dropdown .select2-search__field {
                    -webkit-border-radius: 8px !important;
                    -moz-border-radius: 8px !important;
                    -ms-border-radius: 8px !important;
                    -o-border-radius: 8px !important;
                    border-radius: 8px !important;
                }

                <?php endif; ?>

                <?php if ( isset( $design[ 'primary_background_color' ] ) ) : ?>

                #ic-checkout #order_review, form#ic-checkout, #ic-checkout div#customer_details,
                #ic-checkout div#order_review, #ic-checkout .order_review-order-dont-miss-box,
                #ic-checkout .order_review-order-summary-box, #upsellModal .modal-content, .ic-cc-layout3-desktop,
                #ic-checkout table.shop_table.woocommerce-checkout-review-order-table,
                #ic-checkout table.shop_table.woocommerce-checkout-review-order-table th,
                #ic-checkout table.shop_table.woocommerce-checkout-review-order-table form,
                p.powered-by-ic, .page-template-mcheckout-checkout > .woocommerce, .ic-additional-links-multistep,
                .select2-container .select2-dropdown, .select2-container .select2-selection,
                .ic-cc-layout3-desktop .ic-cc-layout3,  .ic-cc-layout3-desktop .ic-cc-layout1,
                .ic-cc-layout3-mobile .ic-cc-layout3,.ic-cc-layout3-mobile .ic-cc-layout1,
                .ic-mini-cart-inner, .ic-mini-cart-header, .ic-mini-cart-empty-total, .ic-mini-cart-bottom-box-fixed,
                #upsellModal .modal-header, #upsellModal .modal-footer, .upsellModal-order-thank-you,
                .page-template-mcheckout-checkout .swal-overlay--show-modal .swal-modal, div#ic-additional-links,
                div#dont-miss-secondary-mobile-only,div#dont-miss-secondary-mobile-only .ic-cc-single-section {
                    background: <?php echo $design[ 'primary_background_color' ]; ?> !important;
                }
                <?php endif; ?>

                <?php if ( isset( $design[ 'primary_text_color' ] ) ) : ?>

                h4.ic-my-cart-title, #ic-checkout h2.ic-cc-title, #ic-checkout #payment h3, .ic-upsell-info h6,
                .select2-results__option[aria-selected], .select2-results__option[data-selected],
                .ic-order-review-heading h3,#ic-checkout table.shop_table.woocommerce-checkout-review-order-table tr.order-total th,
                #ic-checkout table.shop_table.woocommerce-checkout-review-order-table tr.order-total td,
                .ic-multi-step-checkout-page-2 .order_review-order-summary-box .order-review-main-header,
                #order_review .order_review-order-summary-box .ic-order-review-heading,
                .ic-cc-layout3 .contact-info h6, .ic-ty-total td, h3.ic-ty-heading-text, .ic-cc-layout3 .contact-info h5,
                .ic-cc-layout1 .contact-info h5, .ic-cc-layout3-desktop .items-in-shipment .ic-cc-layout3-items-in-shipment,
                .ic-ty-con-box-content h6, .ic-mini-cart-wrapper span.sale-price, div#ic-upsell span.sale-price,
                .ic-cc-layout3 .contact-info i, .ic-cc-layout1 .contact-info i,
                #ic-checkout .ic-cc-shipping .woocommerce-shipping-totals th, #ic-checkout .col-1 .ic-shipping-text,
                #order_review .order_review-order-dont-miss-box .ic-upsell-info,
                #order_review .order_review-order-summary-box .order-review-main-header, .order-review-main-header,
                .ic-checkout-site-name, .select2-search--dropdown .select2-search__field,
                .ic-cc-layout1 .items-in-shipment table .ic-ty-total td:nth-child(2), .ic-ty-total td:first-child,
                .page-template-mcheckout-checkout .swal-overlay--show-modal .swal-modal .swal-title,
                #ic-checkout #order_review .ic-order-review-wrapper #payment .place-order .terms label a {
                    color: <?php echo $design[ 'primary_text_color' ]; ?> !important;
                }
                <?php endif; ?>

                <?php if ( isset( $design[ 'secondary_background_color' ] ) ) : ?>

                .order_review-order-dont-miss-box .ic-upsell-info, .ic-upsell-mini-cart-slider .swiper-slide,
                #order_review .order_review-order-dont-miss-box .ic-upsell-info,
                #order_review .order_review-order-summary-box .order-review-main-header,
                #order_review .order_review-order-summary-box .ic-order-review-heading,
                .ic-cc-layout3-items-in-shipment,  #ic-checkout .payment_box, #ic-checkout .swiper-slide
                .select2-container--default .select2-results__option--highlighted[aria-selected],
                .ic-cc-layout1 .contact-info h5, .ic-cc-layout3 .contact-info h5,
                .page-template-mcheckout-checkout .swal-modal .swal-content .woocommerce-error {
                    background: <?php echo $design[ 'secondary_background_color' ]; ?> !important;
                }
                <?php endif; ?>

                <?php if ( isset( $design[ 'secondary_text_color' ] ) ) : ?>

                span.ic-mini-cart-product-name, #ic-checkout input, p.powered-by-ic,
                #ic-checkout .select2-container--default .select2-selection--single .select2-selection__rendered ,
                #ic-checkout #ship-to-different-address span, #ic-checkout .ic-cc-shipping,
                .product-name, .ic-order-review-wrapper .cart_item .product-total, td.product-total,
                #ic-checkout li.wc_payment_method label, .ic-cc-single-section h3, .wc_payment_method .payment_box,
                #ic-checkout table.shop_table.woocommerce-checkout-review-order-table tfoot td,
                #ic-checkout table.shop_table.woocommerce-checkout-review-order-table th,
                #ic-checkout table.shop_table.woocommerce-checkout-review-order-table tr.cart-subtotal td bdi,
                .select2-container--default .select2-selection--single .select2-selection__placeholder,
                .ic-mini-cart-wrapper .us-slide-left h6, #ic-upsell .us-slide-left h6,
                .ic-order-review-wrapper .checkout_coupon button, .ic-cc-steps span,
                #ic-checkout ul#shipping_method label, #upsellModal .single-us-ty-title, #upsellModal .modal-header,
                #upsellModal .modal-footer, .upsellModal-order-thank-you, p.ic-mini-cart-recommendations-title,
                .ic-cc-layout3 .contact-info .row .col-md-6 p, div#ic-upsell .swiper-button-next:after,
                .ic-cc-layout3 .contact-info ul li, .ic-cc-layout1 .contact-info ul li,
                .row-4-ic-cc-layout3 label, .row-4-ic-cc-layout3 input, .ic-ty-product-inner span,
                .ic-ty-subtotal td, .ic-ty-shipping td, .ic-mini-cart-wrapper .order-total bdi,
                .ic-ty-heading-text-thank-you, .ic-ty-heading-text-confirmation,
                .ic-ty-con-box-heading, .ic-cc-layout3 .contact-info h5, .ic-cc-layout3 .col-md-5 h5,
                .ic-cc-layout1 .items-in-shipment h5, .ic-coupon-added-minicart-coupon,
                #ic-checkout ul#shipping_method label span, div#ic-additional-links span,
                form#ic-checkout input#coupon_code, tr.coupon_checkout input#coupon_code,
                #multistep-navigation span.back, .ic-cc-layout1 .contact-info ul li span,
                .ic-upsell-mini-cart-slider .swiper-button-next:after, div#ic-upsell .swiper-button-prev:after,
                #select2-billing_country-results .select2-results__message,
                #ic-checkout .ic-cc-shipping .woocommerce-shipping-totals td,
                .ic-mini-cart-inner .cart-subtotal p, .ic-mini-cart-inner .cart-discount p,
                .ic-mini-cart-inner .order-total p, .ic-mini-cart-inner .shipping-selected p, .ic-mini-cart-inner .fee p,
                .ic-mini-cart-wrapper span.woocommerce-Price-amount.amount,
                .ic-mini-cart-wrapper ul.woocommerce-mini-cart.cart_list.product_list_widget a.remove,
                .ic-mini-cart-wrapper form#coupon-redeem input#coupon, #ic-checkout .payment_box div p a,
                #ic-checkout #order_review #payment>ul>li>div>p, #ic-checkout .payment_box div p,
                .ic-cc-layout3-desktop .ic-cc-layout1 .items-in-shipment .ic-ty-product-inner .ic-ty-title,
                .ic-cc-layout3-desktop .ic-cc-layout1 .items-in-shipment .ic-ty-product-inner .ic-ty-total,
                .page-template-mcheckout-checkout .swal-modal .swal-content,
                .page-template-mcheckout-checkout .swal-modal .swal-content ul.woocommerce-error, .ic-cc-steps.active,
                #customer_details .ic-cc-last-step-ic-cc-l3 .wc_payment_method .payment_box label,
                #customer_details .ic-cc-last-step-ic-cc-l3 .wc_payment_method .payment_box p,
                #ic-checkout #order_review .ic-order-review-wrapper #payment .place-order .terms label,
                #ic-checkout #order_review .ic-order-review-wrapper #payment .place-order span,
                #ic-checkout #order_review .ic-order-review-wrapper #payment .place-order label  {
                    color: <?php echo $design[ 'secondary_text_color' ]; ?> !important;
                }

                .select2-container--default .select2-selection--single .select2-selection__arrow b {
                    border-color:  <?php echo $design[ 'secondary_text_color' ]; ?> !important;
                }
                <?php endif; ?>

                <?php if ( isset( $design[ 'input_field_background_color' ] ) ) : ?>

                .ic-mini-cart-wrapper input#coupon, #ic-checkout input, #ic-checkout select,
                #ic-checkout .select2-container--default .select2-selection--single,
                .select2-container .select2-dropdown .select2-search__field, #wc-bluesnap-cc-form .bluesnap-input-div {
                    background: <?php echo $design[ 'input_field_background_color' ]; ?> !important;
                }

                #ic-checkout input:-webkit-autofill, #ic-checkout input:-webkit-autofill:hover,
                #ic-checkout input:-webkit-autofill:focus, #ic-checkout input:-webkit-autofill:active {
                    -webkit-box-shadow: 0 0 0 30px <?php echo $design[ 'input_field_background_color' ]; ?> inset !important;
                }
                <?php endif; ?>

                <?php if ( isset( $design[ 'primary_buttons_background_color' ] ) ) : ?>

                #multistep-navigation .continue, .swiper-pagination-bullet, .ic-order-review-wrapper .checkout_coupon button,
                #customer_details .place-order .button.alt, .ic-mini-cart-empty a,
                #upsellModal .upsellModal-close-btn, .ic-ty-con-box-section .continue,
                .page-template-mcheckout-checkout .swal-button, .ic-coupon-added-minicart-coupon-name,
                .page-template-mcheckout-checkout .swal-modal .swal-button-container .swal-button,
                a.ic-mini-cart-checkout-link, #ic-checkout #order_review .ic-order-review-wrapper #place_order {
                    background: <?php echo $design[ 'primary_buttons_background_color' ]; ?> !important;
                }
                <?php endif; ?>

                <?php if ( isset( $design[ 'primary_buttons_text_color' ] ) ) : ?>

                #upsellModal .upsellModal-close-btn, .ic-ty-con-box-section .continue,
                .ic-ty-con-box-section .continue i, .ic-mini-cart-empty a,  a.ic-mini-cart-checkout-link,
                .coupon_checkout .button, .ic-coupon-added-minicart-coupon-name span,
                .ic-coupon-added-minicart-coupon-name a i,
                .page-template-mcheckout-checkout .swal-modal .swal-button-container .swal-button,
                div#ic-upsell p.product.woocommerce.add_to_cart_inline a, span.continue,
                #ic-checkout button#place_order, #ic-checkout #order_review .ic-order-review-wrapper #place_order {
                    color: <?php echo $design[ 'primary_buttons_text_color' ]; ?> !important;
                }
                <?php endif; ?>

                <?php if ( isset( $design[ 'secondary_buttons_background_color' ] ) ) : ?>

                .ic-mini-cart-wrapper .quantity-counter,.ic-mini-cart-wrapper form#coupon-redeem input#apply-coupon,
                a.ic-mini-cart-shop-link, .ic-mini-cart-header .ic-exit-mini-cart,
                div#ic-upsell p.product.woocommerce.add_to_cart_inline a, .single-us-ty-right span,
                .ic-cc-layout3 #order_review .ic-order-review table .cart_item .quantity-cont .quantity-counter,
                #ic-checkout .quantity-counter, #order_review .coupon_checkout button, .coupon_checkout .button,
                .ic-mini-cart-wrapper p.product.woocommerce.add_to_cart_inline a span,
                .ic-mini-cart-wrapper p.product.woocommerce.add_to_cart_inline a, .ic-ty-con-box-section .contact-us {
                    background: <?php echo $design[ 'secondary_buttons_background_color' ]; ?> !important;
                }
                <?php endif; ?>

                <?php if ( isset( $design[ 'secondary_buttons_text_color' ] ) ) : ?>

                a.ic-mini-cart-shop-link, .ic-mini-cart-wrapper .quantity-counter span,
                .ic-mini-cart-wrapper form#coupon-redeem input#apply-coupon,
                div#ic-upsell p.product.woocommerce.add_to_cart_inline a, .ic-ty-con-box-section .contact-us,
                #order_review .ic-order-review table .cart_item .quantity-cont .quantity-counter,
                #order_review .coupon_checkout button, .single-us-ty-right span,
                .ic-mini-cart-wrapper p.product.woocommerce.add_to_cart_inline a,
                .ic-mini-cart-wrapper p.product.woocommerce.add_to_cart_inline a span {
                    color: <?php echo $design[ 'secondary_buttons_text_color' ]; ?> !important;
                }

                span.minus-qty svg path, span.plus-qty svg path, .ic-exit-mini-cart svg path {
                    stroke: <?php echo $design[ 'secondary_buttons_text_color' ]; ?> !important;
                }
                <?php endif; ?>

                <?php if ( isset( $design[ 'border_color' ] ) ) : ?>

                .ic-cc-layout3 .contact-info, .ic-cc-layout3 .items-in-shipment, .ic-cc-layout1 .items-in-shipment,
                .ic-cc-layout3 .contact-info .row, .ic-cc-layout3 .col-md-5, div#ic-upsell .swiper-button-prev,
                a.ic-mini-cart-shop-link, a.ic-mini-cart-checkout-link, .ic-mini-cart-wrapper .quantity-counter,
                .ic-mini-cart-wrapper li.woocommerce-mini-cart-item.mini_cart_item:last-child,
                .ic-exit-mini-cart, .ic-mini-cart-header, .ic-mini-cart-totals,
                .ic-single-step-checkout-page-2, .woocommerce-shipping-, #ic-checkout .ic-order-review-wrapper #payment,
                .woocommerce-shipping-fields, .ic-mini-cart-empty a, .ic-cc-layout3 table, .ic-cc-layout1 table,
                .ic-mini-cart-wrapper form#coupon-redeem input#apply-coupon, #upsellModal .modal-footer,
                .ic-cc-shipping .my-custom-shipping-table #shipping_method li,
                .ic-cc-shipping .my-custom-shipping-table td, .ic-mini-cart-bottom-box-fixed,
                #ic-checkout .ic-cc-shipping .woocommerce-shipping-totals td ul#shipping_method,
                span.select2-selection.select2-selection--single, #ic-checkout #payment h3, .ic-additional-links-single,
                #order_review .ic-order-review table .cart_item .quantity-cont .quantity-counter,
                .select2-container .select2-selection--single #select2-billing_country-container span,
                .woocommerce-page.woocommerce-order-pay #order_review .shop_table tbody,
                .woocommerce-page.woocommerce-order-pay .woocommerce-checkout-review-order-table tbody,
                .woocommerce-page .woocommerce-checkout #order_review .shop_table tbody,
                .woocommerce-page .woocommerce-checkout .woocommerce-checkout-review-order-table tbody,
                .ic-coupon-added-minicart .ic-coupon-added-minicart-coupon, .ic-ty-cont .col-md-5,
                .ic-mini-cart-buttons, .select2-container .select2-selection--single #select2-shipping,
                .select2-container .select2-selection--single #select2-shipping_country-container span,
                .ic-additional-links-single span, .ic-checkout-site-name,
                #ic-checkout .ic-cc-shipping .woocommerce-shipping-totals th, #ic-checkout .payment_box,
                .ic-cc-layout3-desktop .ic-cc-layout1 .items-in-shipment .ic-ty-product-inner,
                #order_review .order_review-order-summary-box, #order_review .order_review-order-dont-miss-box,
                #ic-checkout .woocommerce-billing-fields__field-wrapper, #ic-additional-links div,
                .order_review-order-dont-miss-box.sec .ic-cc-single-section:nth-child(1), .ic-cc-single-section,
                .ic-mini-cart-wrapper p.product.woocommerce.add_to_cart_inline a,
                div#ic-upsell p.product.woocommerce.add_to_cart_inline a,
                .ic-order-review-wrapper .checkout_coupon button, #order_review .coupon_checkout button,
                .coupon_checkout .button, #ic-checkout form.checkout_coupon.woocommerce-form-coupon,
                #ic-checkout .swiper-slide, .ic-multi-step-checkout-page-2,
                .order_review-order-dont-miss-box, .ic-additional-links-multistep, #ic-checkout .wc_payment_method,
                ul.wc_payment_methods.payment_methods.methods, .single-us-ty-right span, .single-us-ty,
                .page-template-mcheckout-checkout .modal-header, #upsellModal .upsellModal-close-btn, .modal-content,
                .ic-mini-cart-wrapper ul.woocommerce-mini-cart.cart_list.product_list_widget,
                .order-review-main-header, .order_review-order-dont-miss-box .ic-upsell-info,
                p.ic-mini-cart-shipping-message, #ic-checkout .ic-upsell-info, #ic-checkout .ic-cc-slider-cont,
                .ic-single-step-checkout-page#ic-checkout #order_review .ic-order-review-wrapper.active,
                .ic-multi-step-checkout-page#ic-checkout #order_review .ic-order-review.active {
                    border-color: <?php echo $design[ 'border_color' ]; ?> !important;
                }

                .ic-cc-steps .ic-cc-multistep-loader-cont {
                    background-color: <?php echo $design[ 'border_color' ]; ?> !important;
                }

                <?php endif; ?>

                <?php if ( isset( $design[ 'custom_accent_color' ] ) ) : ?>

                #ic-checkout input[type=radio].shipping_method:checked+label::before,
                #ic-checkout input[type=radio][name=payment_method]:checked+label::before {
                    background: radial-gradient(circle at center, <?php echo $design[ 'custom_accent_color' ]; ?>  45%,#fff 0) !important ;
                    border-color: <?php echo $design[ 'custom_accent_color' ]; ?> !important;
                }

                .ic-cc-multistep-loader {
                    background-color: <?php echo $design[ 'custom_accent_color' ]; ?> !important;
                }

                #ic-checkout .wc_payment_method input.input-radio[name=payment_method] + label::before {
                    border-color: <?php echo $design[ 'custom_accent_color' ]; ?> !important;
                }

                #ic-checkout .wc_payment_method input.input-radio[name=payment_method]:checked + label::before {
                    background: radial-gradient(circle at center, <?php echo $design[ 'custom_accent_color' ]; ?> 45%,#fff 0) !important;
                    border-color: <?php echo $design[ 'custom_accent_color' ]; ?> !important;
                }

                .product-remove i {
                    color: <?php echo $design[ 'custom_accent_color' ]; ?> !important;
                }

                <?php endif; ?>

                <?php if ( isset( $design[ 'tertiary_text_color' ] ) ) : ?>

                #ic-checkout div#ic-additional-links span, p.ic-mini-cart-bottom-message,
                div#ic-additional-links span a, .ic-cc-single-section p, #ic-additional-links div,
                .us-slide-title-price p, .ic-ty-con-box-continue-shopping .ic-ty-con-box-section span {
                    color: <?php echo $design[ 'tertiary_text_color' ]; ?> !important;
                }

                .ic-upsell-mini-cart-slider span.swiper-pagination-bullet.swiper-pagination-bullet-active,
                div#ic-upsell span.swiper-pagination-bullet.swiper-pagination-bullet-active{
                    background-color:  <?php echo $design[ 'tertiary_text_color' ]; ?> !important;
                }

                <?php endif; ?>

                <?php if ( isset( $design[ 'custom_error_color' ] ) ) : ?>
                .error-message, .ic-invalid-coupon, .ic-invalid-coupon-checkout,
                .ic-checkout-terms-and-conditions-error{
                    color: <?php echo $design[ 'custom_error_color' ]; ?> !important;
                }

                .ic-invalid-coupon path, .ic-invalid-coupon-checkout path {
                    fill: <?php echo $design[ 'custom_error_color' ]; ?> !important;
                }

                form#ic-checkout .error span.select2-selection.select2-selection--single,
                form#ic-checkout .error #billing_state, form#ic-checkout .error #billing_last_name,
                form#ic-checkout .error #billing_first_name, form#ic-checkout .error #billing_company,
                form#ic-checkout .error #select2-billing_country-container, form#ic-checkout .error #billing_address_1,
                form#ic-checkout .error #billing_address_2, form#ic-checkout .error #billing_city,
                form#ic-checkout .error #billing_postcode, form#ic-checkout .error #billing_phone,
                form#ic-checkout .error #billing_email, form#ic-checkout .error input,
                .page-template-mcheckout-checkout .swal-modal .swal-content ul.woocommerce-error {
                    border-color:  <?php echo $design[ 'custom_error_color' ]; ?> !important;
                }

                <?php endif; ?>

                <?php if ( isset( $checkout_design[ 'ic_checkout_logo_height_desktop' ] ) && $checkout_design[ 'ic_checkout_logo_height_desktop' ] != '' ) : ?>

                .ic-single-step-checkout-page a img,
                .ic-multi-step-checkout-page a img,
                .ic-cc-layout1 .col-md-7 .shop-logo img {
                    height: <?php echo $checkout_design[ 'ic_checkout_logo_height_desktop' ]; ?>px !important;
                }

                <?php endif; ?>

                <?php if ( isset( $design[ 'quantity_circle_color' ] ) ) : ?>
                .ic-mini-cart-wrapper span.quantity,
                .ic-cc-layout3-desktop .ic-cc-layout1 .items-in-shipment .ic-ty-product-inner .ic-ty-quantity,
                .ic-cc-layout3-desktop .ic-cc-layout1 .items-in-shipment .ic-ty-product-inner .ic-ty-quantity span {
                    color:  <?php echo $design[ 'quantity_circle_color' ]; ?> !important;
                }
                <?php endif; ?>

                <?php if ( isset( $design[ 'quantity_circle_background_color' ] ) ) : ?>
                .ic-mini-cart-wrapper span.quantity,
                .ic-cc-layout3-desktop .ic-cc-layout1 .items-in-shipment .ic-ty-product-inner .ic-ty-quantity {
                    background-color:  <?php echo $design[ 'quantity_circle_background_color' ]; ?> !important;
                }
                <?php endif; ?>

                <?php if ( isset( $design[ 'minicart_message_color' ] ) ) : ?>
                p.ic-mini-cart-shipping-message {
                    color:  <?php echo $design[ 'minicart_message_color' ]; ?> !important;
                }
                <?php endif; ?>

                <?php if ( isset( $design[ 'minicart_message_background_color' ] ) ) : ?>
                p.ic-mini-cart-shipping-message {
                    background-color:  <?php echo $design[ 'minicart_message_background_color' ]; ?> !important;
                }
                <?php endif; ?>

                <?php if ( isset( $design[ 'input_outline_color' ] ) ) : ?>
                form#ic-checkout span.select2-selection.select2-selection--single, form#ic-checkout #billing_state,
                form#ic-checkout #billing_last_name, form#ic-checkout #billing_first_name,
                form#ic-checkout #billing_company, form#ic-checkout input,
                form#ic-checkout #select2-billing_country-container, form#ic-checkout #billing_address_1,
                form#ic-checkout #billing_address_2, form#ic-checkout #billing_city,
                form#ic-checkout #billing_postcode, form#ic-checkout #billing_phone, form#ic-checkout #billing_email,
                .ic-mini-cart-wrapper form#coupon-redeem input#coupon,
                .woocommerce-page form .input-text, form#ic-checkout input {
                    border-color:  <?php echo $design[ 'input_outline_color' ]; ?> !important;
                }
                <?php endif; ?>

                <?php if ( isset( $checkout_design[ 'ic_checkout_logo_height_mobile' ] ) && $checkout_design[ 'ic_checkout_logo_height_mobile' ] != '' ) : ?>

                @media only screen and (max-width: 570px) {
                    #ic-checkout.ic-single-step-checkout-page a .ic-checkout-site-custom-logo,
                    #ic-checkout .ic-multi-step-checkout-page a .ic-checkout-site-custom-logo,
                    .ic-cc-layout1 .col-md-7 .shop-logo img {
                        height: <?php echo $checkout_design[ 'ic_checkout_logo_height_mobile' ]; ?>px !important;
                    }
                }

                <?php else : ?>

                @media only screen and (max-width: 570px) {
                    #ic-checkout.ic-single-step-checkout-page a .ic-checkout-site-custom-logo,
                    #ic-checkout .ic-multi-step-checkout-page a .ic-checkout-site-custom-logo,
                    .ic-cc-layout1 .col-md-7 .shop-logo img {
                        height: 40px !important;
                    }
                }

                <?php endif; ?>

                <?php if ( isset( $design[ 'border_color' ] ) ) : ?>
                @media only screen and (max-width: 570px) {
                    #ic-checkout .ic-upsell-info,
                    #ic-checkout .ic-cc-slider-cont,
                    #ic-checkout #order_review .order-review-main-header {
                        border-color: <?php echo $design[ 'border_color' ]; ?> !important;
                    }
                }
                <?php endif; ?>
            </style>
        <?php
    }
}