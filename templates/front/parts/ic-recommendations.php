<?php

$recommendations_type = isset($design_mini_cart ['ic_mini_cart_recommendations']) ? $design_mini_cart['ic_mini_cart_recommendations_type'] : null;
$recommendations_title = isset($design_mini_cart ['ic_mini_cart_recommendations']) ? $design_mini_cart['ic_mini_cart_recommendations_title'] : null;

$upsell_products = array();
$custom_products_final = array();
$random_products = array();

if ($recommendations_type == '1') {
    $upsell_products = ic_get_upsells_for_triggers('cart_page');
    //echo json_encode($upsell_products);
    $upsells_rendered = array();
} else if ($recommendations_type == '2') {
    $custom_products = get_option('custom_mini_cart_products');
    foreach ($custom_products as $product) {
        $wc_product = wc_get_product($product);
        array_push($custom_products_final, $wc_product);
    }
} else if ($recommendations_type == '3') {
    $args = array(
        'post_type' => 'product',
        'posts_per_page' => 3,
        'meta_key' => 'total_sales',
        'orderby' => 'meta_value_num',
    );
    $random_products = wc_get_products($args);
}
//$cart = WC()->cart->get_cart();
//foreach ($cart as $as){
//    if ($as['variation_id']>0){
//        echo $as['variation_id'];
//    }
//    else{
//        echo $as['product_id'];
//    }
//    echo '</br></br>';
//
//
//}

$has_final_upsells = false;
foreach ($upsell_products as $upsell_product) {
    $product = wc_get_product($upsell_product['option_value']);
    $product_is_in_stock = ic_check_product_stock($product, $upsell_product['option_value']);
    if($product_is_in_stock) {
        $has_final_upsells = true;
        break;
    }
}

if ($recommendations_type != null) {
    if ($recommendations_title != null && ($has_final_upsells || count($custom_products_final) != 0 || count($random_products) != 0)) { ?>
        <div class="ic-mini-cart-recommendations-title-cont">
            <p class="ic-mini-cart-recommendations-title"><?php echo $recommendations_title; ?></p>
        </div>
    <?php } ?>
    <?php if ($recommendations_type == '1' && count($upsell_products) > 0) { ?>
        <div class="ic-mini-cart-slider-cont">
            <div class="swiper ic-upsell-mini-cart-slider">
                <div class="swiper-wrapper">

                    <?php foreach ($upsell_products as $upsell_product) {
                        $regular_price = null;
                        $product = wc_get_product($upsell_product['option_value']);
                        $product_is_in_stock = ic_check_product_stock($product, $upsell_product['option_value']);
                        if(!$product_is_in_stock) {
                            continue;
                        }
                        if (!in_array($upsell_product['option_value'], $upsells_rendered) && !ic_in_cart($upsell_product['upsell_id'])) {
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
                            ?>
                            <div class="swiper-slide us-slide" data-us_id="<?php echo $upsell_product['upsell_id']; ?>">
                                <img class="mini-cart-single-loader" src="<?php echo plugins_url() . '/mediya-checkout/assets/images/single-loader.svg' ?>" alt="single-loader">
                                <div class="us-slide-left">
                                    <div class="us-slide-left-box">
                                        <?php if ($upsell_product['image']) : ?>
                                            <img width="32" height="32" src="<?php echo $upsell_product['image'][0]; ?>"
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
                                echo do_shortcode('[ic_add_to_cart class="mini-cart-single-product" id=' . $upsell_product['option_value'] . ' show_price="FALSE" ]');
                                array_push($upsells_rendered, $upsell_product['option_value']);
                                ?>
                            </div>
                            <?php
                        }
                    } ?>
                </div>
                <div class="swiper-pagination"></div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </div>
    <?php } else if ($recommendations_type == '2' && count($custom_products_final) > 0) { ?>
        <div class="ic-mini-cart-slider-cont">
            <div class="swiper ic-upsell-mini-cart-slider">
                <div class="swiper-wrapper">
                    <?php foreach ($custom_products_final as $custom_product) {
                        if (!ic_in_cart($custom_product->get_id())) {
                            $regular_price = null;
                            $price = $custom_product->get_price();
                            if ($custom_product->is_on_sale()) {
                                $regular_price = $custom_product->get_regular_price();
                                $price = $custom_product->get_sale_price();
                            }
                            $product_is_in_stock = ic_check_product_stock($custom_product, $custom_product->get_id());
                            if(!$product_is_in_stock) {
                                continue;
                            }
                            ?>
                            <div class="swiper-slide">
                                <img class="mini-cart-single-loader" src="<?php echo plugins_url() . '/mediya-checkout/assets/images/single-loader.svg' ?>" alt="single-loader">
                                <div class="us-slide-left">
                                    <div class="us-slide-left-box">
                                        <?php
                                        $image = wp_get_attachment_image_src(get_post_thumbnail_id($custom_product->get_id()), 'single-post-thumbnail');
                                        if ($image) {
                                            ?>
                                            <img width="32" height="32" src="<?php echo $image[0]; ?>" alt="">
                                        <?php } else { ?>
                                            <img width="32" heiht="32"
                                                 src="<?php echo plugins_url() . '/mediya-checkout/assets/images/woocommerce-placeholder.png'; ?>"
                                                 alt="">
                                        <?php } ?>
                                        <div class="us-slide-title-price">
                                            <h6><?php echo $custom_product->get_name(); ?></h6>
                                            <p>
                                                <?php
                                                if ($regular_price != null) {
                                                    echo '<span class="sale-price">' . get_woocommerce_currency_symbol() . $regular_price . '</span>';
                                                }
                                                echo get_woocommerce_currency_symbol();
                                                echo $price;
                                                ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <?php echo do_shortcode('[add_to_cart class="mini-cart-single-product" id=' . $custom_product->get_id() . ' show_price="FALSE" ]'); ?>
                            </div>
                            <?php
                        }
                    }
                    ?>
                </div>
                <div class="swiper-pagination"></div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </div>
    <?php } else if ($recommendations_type == '3' && count($random_products) > 0) { ?>
        <div class="ic-mini-cart-slider-cont">
            <div class="swiper ic-upsell-mini-cart-slider">
                <div class="swiper-wrapper">
                    <?php foreach ($random_products as $random_product) {
                        if (ic_in_cart($random_product->get_id())) {
                            $product_is_in_stock = ic_check_product_stock($random_product, $random_product->get_id());
                            if(!$product_is_in_stock) {
                                continue;
                            }
                            ?>
                            <div class="swiper-slide">
                                <img class="mini-cart-single-loader" src="<?php echo plugins_url() . '/mediya-checkout/assets/images/single-loader.svg' ?>" alt="single-loader">
                                <div class="us-slide-left">
                                    <div class="us-slide-left-box">
                                        <?php
                                        $image = wp_get_attachment_image_src(get_post_thumbnail_id($random_product->get_id()), 'single-post-thumbnail');
                                        if ($image) {
                                            ?>
                                            <img width="32" height="32" src="<?php echo $image[0]; ?>" alt="">
                                        <?php } else { ?>
                                            <img width="32" heiht="32"
                                                 src="<?php echo plugins_url() . '/mediya-checkout/assets/images/woocommerce-placeholder.png'; ?>"
                                                 alt="">
                                        <?php } ?>
                                        <div class="us-slide-title-price">
                                            <h6><?php echo $random_product->get_name(); ?></h6>
                                            <p>
                                                <?php
                                                echo get_woocommerce_currency_symbol();
                                                echo $random_product->get_price();
                                                ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <?php echo do_shortcode('[add_to_cart class="mini-cart-single-product" id=' . $random_product->get_id() . ' show_price="FALSE" ]'); ?>
                            </div>
                            <?php
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
?>