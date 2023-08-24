<?php

$custom_text = get_option('ic_design_custom_text');

$ic_ct_mc_page_title = 'Mini cart';
$ic_ct_mc_discount_code_label = 'Discount';
$ic_ct_mc_apply_button_label = 'Apply';
$ic_ct_mc_coupon_label = 'Coupon successful';
$ic_ct_mc_coupon_error_label = 'Coupon is not valid';
$ic_ct_mc_taxes_label = 'Taxes';
$ic_ct_mc_shipping_label = 'Shipping';
$ic_ct_mc_discount_label = 'Coupon';
$ic_ct_mc_subtotal_label = 'Subtotal';
$ic_ct_mc_total_label = 'Total';
$ic_ct_mc_add_to_cart_button = 'Add';
$ic_ct_mc_cart_empty_message = 'Your cart is empty';
$ic_ct_mc_cart_empty_button_label = 'Go to shop';
$ic_ct_ty_subtotal_label = 'Subtotal';
$ic_ct_ty_discount_label = 'Discount';
$ic_ct_ty_shipping_label = 'Shipping';
$ic_ct_ty_total_label = 'Total';
$ic_ct_c_recommendations_title = 'Dont miss the deal';
$ic_ct_c_add_to_cart_button_label = 'Add';

?>


<div class="ic-prw-section-right ic-preview-custom-bc ic-preview-mini-cart-inner ic-preview-custom-pbc" >
    <div class="ic-prw-summary-box ic-preview-custom-cr ic-preview-custom-bc ic-preview-custom-pbc">
        <div class="ic-mini-cart-header ic-preview-custom-ptc ic-preview-custom-sbc">
            <h4 class="ic-my-cart-title ic-preview-custom-ptc">    <?php
                if ( isset( $custom_text[ 'ic_ct_mc_page_title' ] ) && $custom_text[ 'ic_ct_mc_page_title' ] != ''  ) {
                    $ic_ct_mc_page_title = $custom_text[ 'ic_ct_mc_page_title' ];
                    echo $ic_ct_mc_page_title;
                } else {
                    echo $ic_ct_mc_page_title;
                }
                ?> </h4>
            <span class="ic-exit-mini-cart ic-preview-custom-sbtc ic-preview-custom-sbbc">
                        <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M10.5 3.5L3.5 10.5" stroke="#344054" stroke-linecap="round" stroke-linejoin="round"></path>
                            <path d="M3.5 3.5L10.5 10.5" stroke="#344054" stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>
                    </span>
        </div>
        <div class="ic-prw-mini-cart-top-message ic-preview-custom-mcmb ic-preview-custom-mcmc">
            Just 20$ away from free shipping ⚡
        </div>
        <div class="ic-prw-summary-products">
            <div class="ic-prw-summary-single-product ic-preview-custom-stc">
                <div class="ic-prw-summary-single-product-left">
                    <img class="ic-preview-custom-cr"
                         src="<?php echo plugins_url() . '/mediya-checkout/assets/images/theme-plugin-placeholder.webp'; ?>"
                         alt="" class="ic-after-hover-cr ic-preview-custom-cr" />
                    <div class="ic-prw-summary-single-product-name">
                        Product name
                    </div>
                    <div class="ic-prw-summary-single-product-product ic-preview-custom-qcbc ic-preview-custom-qcc">
                        1
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
                    <img class="ic-preview-custom-cr"
                         src="<?php echo plugins_url() . '/mediya-checkout/assets/images/theme-plugin-placeholder.webp'; ?>"
                         alt="" class="ic-after-hover-cr ic-preview-custom-cr" />
                    <div class="ic-prw-summary-single-product-name">Product name</div>
                    <div class="ic-prw-summary-single-product-product ic-preview-custom-qcbc ic-preview-custom-qcc">
                        1
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
                    <img class="ic-preview-custom-cr"
                         src="<?php echo plugins_url() . '/mediya-checkout/assets/images/theme-plugin-placeholder.webp'; ?>"
                         alt="" class="ic-after-hover-cr ic-preview-custom-cr" />
                    <div class="ic-prw-summary-single-product-name">Product name</div>
                    <div class="ic-prw-summary-single-product-product ic-preview-custom-qcbc ic-preview-custom-qcc">
                        1
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
        <div class="ic-prw-coupon ic-preview-custom-bc">
            <input type="text"
                   class="ic-preview-custom-iftc ic-preview-custom-ifbc ic-preview-custom-cr ic-preview-custom-ioc"
                   placeholder="   <?php
                   if ( isset( $custom_text[ 'ic_ct_mc_discount_code_label' ] ) && $custom_text[ 'ic_ct_mc_discount_code_label' ] != ''  ) {
                       $ic_ct_mc_discount_code_label = $custom_text[ 'ic_ct_mc_discount_code_label' ];
                       echo $ic_ct_mc_discount_code_label;
                   } else {
                       echo $ic_ct_mc_discount_code_label;
                   }
                   ?>" />
            <button class="ic-preview-custom-sbtc ic-preview-custom-sbbc ic-preview-custom-cr">
                <?php
                if ( isset( $custom_text[ 'ic_ct_mc_apply_button_label' ] ) && $custom_text[ 'ic_ct_mc_apply_button_label' ] != ''  ) {
                    $ic_ct_mc_apply_button_label = $custom_text[ 'ic_ct_mc_apply_button_label' ];
                    echo $ic_ct_mc_apply_button_label;
                } else {
                    echo $ic_ct_mc_apply_button_label;
                }
                ?>
            </button>
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
    <div class="ic-prw-dont-miss ic-preview-custom-pbc">
        <div class="ic-prw-dont-miss-recomend ic-preview-custom-stc">
            <?php
            if ( isset( $custom_text[ 'ic_ct_c_recommendations_title' ] ) && $custom_text[ 'ic_ct_c_recommendations_title' ] != ''  ) {
                $ic_ct_c_recommendations_title = $custom_text[ 'ic_ct_c_recommendations_title' ];
                echo $ic_ct_c_recommendations_title;
            } else {
                echo $ic_ct_c_recommendations_title;
            }
            ?>
        </div>
        <div class="ic-prw-dont-miss-box-wrapper ic-preview-custom-sbc">
            <div class="ic-prw-dont-miss-box ic-preview-custom-sbc ic-preview-custom-cr">
                <div class="ic-prw-dont-miss-box-left">
                    <img class="ic-preview-custom-cr"
                         src="<?php echo plugins_url() . '/mediya-checkout/assets/images/theme-plugin-placeholder.webp'; ?>"
                         alt="" />
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
                    <a href="#" class="ic-preview-custom-sbtc ic-preview-custom-sbbc ic-preview-custom-cr">
                        <?php
                        if ( isset( $custom_text[ 'ic_ct_c_add_to_cart_button_label' ] ) && $custom_text[ 'ic_ct_c_add_to_cart_button_label' ] != ''  ) {
                            $ic_ct_c_add_to_cart_button_label = $custom_text[ 'ic_ct_c_add_to_cart_button_label' ];
                            echo $ic_ct_c_add_to_cart_button_label;
                        } else {
                            echo $ic_ct_c_add_to_cart_button_label;
                        }
                        ?>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="ic-mini-cart-bottom-box-fixed ic-preview-custom-sbc">
        <div class="ic-mini-cart-buttons">
            <a href="http://localhost/mediya-checkout/shop/" class="ic-mini-cart-shop-link-admin ic-preview-custom-sbtc ic-preview-custom-sbbc">
                Cart                            </a>
            <a href="http://localhost/mediya-checkout/mediya-checkout-checkout/" class="ic-mini-cart-checkout-link-admin ic-preview-custom-pbtc ic-preview-custom-pbbc">
                Checkout                        </a>
        </div>

        <p class="ic-mini-cart-bottom-message ic-preview-custom-ttc">Bottom message <img draggable="false" role="img" class="emoji" alt="🏁" src="https://s.w.org/images/core/emoji/14.0.0/svg/1f3c1.svg"></p>
    </div>
</div>