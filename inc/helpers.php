<?php

use Stripe\StripeClient;

if (!function_exists('ic_get_last_week_date')) {
    function ic_get_last_week_date()
    {
        echo date('m/d/Y', strtotime('-6 days')) . ' - ' . date('m/d/Y');
    }
}


if (!function_exists('ic_did_user_added_to_cart')) {
    function ic_did_user_added_to_cart($user)
    {
        return $user->num_added_to_cart > 0 ? true : false;
    }
}

if (!function_exists('ic_get_user_num_added_to_cart')) {
    function ic_get_user_num_added_to_cart($user)
    {
        return $user->num_added_to_cart;
    }
}

if (!function_exists('ic_did_user_reached_checkout')) {
    function ic_did_user_reached_checkout($user)
    {
        return $user->reached_checkout;
    }
}

if (!function_exists('ic_users_num_added_to_cart')) {
    function ic_users_num_added_to_cart($users)
    {
        $num = 0;
        foreach ($users as $user) {
            $num += $user->num_added_to_cart;
        }
        return $num;
    }
}

if (!function_exists('ic_users_clicked_add_to_cart')) {
    function ic_users_clicked_add_to_cart($users)
    {
        $num = 0;
        foreach ($users as $user) {
            if (ic_did_user_added_to_cart($user)) {
                $num++;
            }
        }
        return $num;
    }
}

if (!function_exists('ic_users_reached_checkout')) {
    function ic_users_reached_checkout($users)
    {
        $num = 0;
        foreach ($users as $user) {
            if (ic_did_user_reached_checkout($user)) {
                $num++;
            }
        }
        return $num;
    }
}

if (!function_exists('ic_hide_coupon_field_on_checkout')) {
    function ic_hide_coupon_field_on_checkout($enabled)
    {
        if (is_checkout()) {
            $enabled = false;
        }
        return $enabled;
    }
}

if (!function_exists('ic_hide_entry_title')) {
    function ic_hide_entry_title($enabled)
    {
        if (is_checkout()) {
            $enabled = false;
        }
        return $enabled;
    }
}

if (!function_exists('ic_remove_order_notes')) {
    function ic_remove_order_notes($fields)
    {
        unset($fields['order']['order_comments']);
        return $fields;
    }
}

if (!function_exists('ic_remove_terms_and_conditions')) {
    function ic_remove_terms_and_conditions()
    {
        remove_action('woocommerce_checkout_terms_and_conditions', 'wc_checkout_privacy_policy_text', 20);
        remove_action('woocommerce_checkout_terms_and_conditions', 'wc_terms_and_conditions_page_content', 30);
    }
}

if (!function_exists('ic_handle_checkout_fields')) {
    function ic_handle_checkout_fields($fields)
    {

        $options = get_option('ic_design_checkout');
        $custom_text = get_option('ic_design_custom_text');

        if (isset($options['ic_checkout_phone'])) {
            $fields['billing_phone']['required'] = true;
        } else {
            $fields['billing_phone']['required'] = false;
        }

        if ( isset( $custom_text[ 'ic_ct_c_first_name' ] ) && $custom_text[ 'ic_ct_c_first_name' ] != '' ) {
            $fields['billing_first_name']['placeholder'] = $custom_text[ 'ic_ct_c_first_name' ];
        } else {
            $fields['billing_first_name']['placeholder'] = 'First name';
        }

        if ( isset( $custom_text[ 'ic_ct_c_last_name' ] ) && $custom_text[ 'ic_ct_c_last_name' ] != '' ) {
            $fields['billing_last_name']['placeholder'] = $custom_text[ 'ic_ct_c_last_name' ];
        } else {
            $fields['billing_last_name']['placeholder'] = 'Last name';
        }

        if ( isset( $custom_text[ 'ic_ct_c_email' ] ) && $custom_text[ 'ic_ct_c_email' ] != '' ) {
            $fields['billing_email']['placeholder'] = $custom_text[ 'ic_ct_c_email' ];
        } else {
            $fields['billing_email']['placeholder'] = 'Email';
        }

        if ( isset( $custom_text[ 'ic_ct_c_city' ] ) && $custom_text[ 'ic_ct_c_city' ] != '' ) {
            $fields['billing_city']['placeholder'] = $custom_text[ 'ic_ct_c_city' ];
        } else {
            $fields['billing_city']['placeholder'] = 'City';
        }

        if ( isset( $custom_text[ 'ic_ct_c_zip_code' ] ) && $custom_text[ 'ic_ct_c_zip_code' ] != '' ) {
            $fields['billing_postcode']['placeholder'] = $custom_text[ 'ic_ct_c_zip_code' ];
        } else {
            $fields['billing_postcode']['placeholder'] = 'Postcode';
        }

        if ( isset( $custom_text[ 'ic_ct_c_country' ] ) && $custom_text[ 'ic_ct_c_country' ] != '' ) {
            $fields['billing_country']['placeholder'] = $custom_text[ 'ic_ct_c_country' ];
        } else {
            $fields['billing_country']['placeholder'] = 'Country';
        }

        $fields['billing_company']['placeholder'] = 'Company';
        $fields['billing_phone']['placeholder'] = 'Phone';
        $fields['billing_address_1']['placeholder'] = 'Street address';
        $fields['billing_state']['placeholder'] = 'State';

        $fields['billing_first_name']['priority'] = 1;
        $fields['billing_last_name']['priority'] = 2;
        $fields['billing_email']['priority'] = 3;
        $fields['billing_phone']['priority'] = 4;
        $fields['billing_address_1']['priority'] = 5;
        $fields['billing_address_2']['priority'] = 6;
        $fields['billing_city']['priority'] = 7;
        $fields['billing_postcode']['priority'] = 8;
        $fields['billing_country']['priority'] = 100;


        return $fields;
    }
}

if (!function_exists('ic_handle_checkout_shipping_fields')) {
    function ic_handle_checkout_shipping_fields()
    {

        $options = get_option('ic_design_checkout');
        if (isset($options['ic_checkout_phone'])) {
            $fields['shipping_phone']['required'] = true;
        } else {
            $fields['shipping_phone']['required'] = false;
        }

        $fields['shipping_first_name']['placeholder'] = 'First name';
        $fields['shipping_last_name']['placeholder'] = 'Last name';
        $fields['shipping_city']['placeholder'] = 'City';
        $fields['shipping_country']['placeholder'] = 'Country';
        $fields['shipping_company']['placeholder'] = 'Company';
        $fields['shipping_postcode']['placeholder'] = 'Postcode';
        $fields['shipping_phone']['placeholder'] = 'Phone';
        $fields['shipping_email']['placeholder'] = 'Email';
        $fields['shipping_address_1']['placeholder'] = 'Street address';

        $fields['shipping_first_name']['priority'] = 1;
        $fields['shipping_last_name']['priority'] = 2;
        $fields['shipping_email']['priority'] = 3;
        $fields['shipping_phone']['priority'] = 4;
        $fields['shipping_address_1']['priority'] = 5;
        $fields['shipping_address_2']['priority'] = 6;
        $fields['shipping_city']['priority'] = 7;
        $fields['shipping_postcode']['priority'] = 8;
        $fields['shipping_country']['priority'] = 100;

        $fields['shipping_email']['priority'] = 3;

        $fields['shipping_first_name']['custom_attributes'] = array("pattern" => "(?=.*\d)");

        unset($fields['shipping_company']);
        unset($fields['shipping_state']);

        return $fields;
    }
}

if ( ! function_exists( 'ic_checkout_state_placeholder' ) ) {
    function ic_checkout_state_placeholder( $fields ) {
        $fields['billing']['billing_state']['placeholder'] = 'State';
        $fields['shipping']['shipping_state']['placeholder'] = 'State';

        return $fields;
    }
}

if (!function_exists('ic_set_coupon_ajax')) {
    function ic_set_coupon_ajax()
    {
        check_ajax_referer('ic_set_coupon', 'security');
        if (!isset($_POST['ms_relationship_id'])) {
            $return = array(
                'success' => false,
                'content' => "Parameters are missing"
            );
            wp_send_json($return);
        }

        $code = filter_input(INPUT_POST, 'coupon_code', FILTER_DEFAULT);
        $data = array();
        $subscription = null;
        $member = MS_Model_Member::get_current_member();
        $membership_id = 0;

        if (empty($code)) {
            $return = array(
                'success' => false,
                'content' => '<p class="ms-alert-box ms-alert-error"> Coupon code not found.</p>'
            );
            wp_send_json($return);
        }

        $coupon = MS_Addon_Coupon_Model::load_by_code($code);

        if (!$coupon || !$coupon->is_valid($member->id)) {
            $return = array(
                'success' => false,
                'content' => '<p class="ms-alert-box ms-alert-error"> Coupon code not found.</p>'
            );
            wp_send_json($return);
        }

        $coupon_addon = new MS_Addon_Coupon();
        $subscription = MS_Factory::load(
            'MS_Model_Relationship',
            absint(intval($_POST['ms_relationship_id']))
        );

        $membership = $subscription->get_membership();
        $membership_id = $membership->id;
        $invoice = $subscription->get_current_invoice();

        if ($_invoice = $coupon_addon->apply_discount($invoice, $subscription)) {
            $_invoice->save();
            ob_start();
            ?>

            <tr class="ms-invitation-code">
                <td colspan="2">
                    <div class="membership-coupon">
                        <div class="membership_coupon_form couponbar">
                            <form method="post">
                                <div class="coupon-entry">
                                    <input class="wpmui-field-input wpmui-hidden " type="hidden" id="coupon_code"
                                           name="coupon_code" value="<?php echo $coupon->code; ?>">
                                    <label for="remove_coupon_code"
                                           class="wpmui-field-label wpmui-label-remove_coupon_code inline-label">
                                        Coupon applied: <?php echo $coupon->code; ?>
                                    </label>
                                    <button class="wpmui-field-input button wpmui-submit button-primary" type="submit"
                                            id="remove_coupon_code" name="remove_coupon_code" value="1">
                                        Remove
                                    </button>
                                    <input class="wpmui-field-input wpmui-hidden " type="hidden" id="membership_id"
                                           name="membership_id" value="<?php echo $membership_id; ?>">
                                    <input class="wpmui-field-input wpmui-hidden " type="hidden" id="move_from_id"
                                           name="move_from_id" value="0">
                                    <input class="wpmui-field-input wpmui-hidden " type="hidden" id="step" name="step"
                                           value="payment_table">
                                </div>
                            </form>
                        </div>
                    </div>
                </td>
            </tr>

            <?php
            $remove_button = ob_get_clean();
            ob_start();
            ?>

            <tr>
                <td class="ms-title-column"> Price</td>
                <td class="ms-details-column"><span
                            class="price"> <?php echo MS_Helper_Billing::format_price($invoice->total); ?> </span></td>
            </tr>
            <tr>
                <td class="ms-title-column"> Coupon Discount</td>
                <td class="ms-price-column"> <?php echo MS_Helper_Billing::format_price($_invoice->discount); ?></td>
            </tr>

            <?php
            $discount_row = ob_get_clean();
            $return = array(
                'success' => true,
                'content' => "Coupon set",
                'invoice_total' => MS_Helper_Billing::format_price($_invoice->total),
                'invoice_discount' => $_invoice->discount,
                'remove_button' => $remove_button,
                'discount_row' => $discount_row
            );
            wp_send_json($return);
        }
    }
}

if (!function_exists('ic_get_required_number')) {
    function ic_get_required_number()
    {
        $options = get_option('ic_cc_settings');
        $data = false;
        if (isset($options['require_address_number'])) {
            $data = true;
        }
        echo json_encode($data);
        wp_die();
    }
}

//if ( ! function_exists( 'ic_change_payment_position' ) ) {
//    function ic_change_payment_position() {
//        $options = get_option('ic_cc_settings');
//        $layout = $options[ 'layout_style' ];
//        if ( $layout == '3' || $layout == '4' ) {
//            remove_action( 'woocommerce_checkout_order_review', 'woocommerce_checkout_payment', 20 );
//            add_action( 'woocommerce_after_order_notes', 'woocommerce_checkout_payment', 20 );
//        } else if ( $layout == '1' || $layout == '2' ) {
//            remove_action( 'woocommerce_checkout_order_review', 'woocommerce_checkout_payment', 20 );
//            add_action( 'woocommerce_checkout_order_review', 'woocommerce_checkout_payment', 20 );
//        }
//    }
//}


if (!function_exists('ic_update_account_ga')) {
    function ic_update_account_ga()
    {

//        if (!wp_verify_nonce($_POST['nonce'], 'ic_update_account_ga')) {
//            die ('Wrong nonce!');
//        }

        $ga_id = $_POST['gaId'];
        update_option('ga_id', $ga_id);
        wp_die();
    }
}

if (!function_exists('ic_get_account_ga')) {
    function ic_get_account_ga()
    {

//        if (!wp_verify_nonce($_GET['nonce'], 'ic_get_account_ga')) {
//            die ('Wrong nonce!');
//        }

        echo get_option('ga_id');
        wp_die();
    }
}

if (!function_exists('ic_get_active_sections')) {
    function ic_get_active_sections()
    {

//        if (!wp_verify_nonce($_GET['nonce'], 'ic_get_active_sections')) {
//            die ('Wrong nonce!');
//        }

        $sections = get_option('design_sections');
        echo json_encode($sections);
        wp_die();
    }
}

if (!function_exists('ic_update_active_sections')) {
    function ic_update_active_sections()
    {

//        if (!wp_verify_nonce($_POST['nonce'], 'ic_update_active_sections')) {
//            die ('Wrong nonce!');
//        }

        $sections = $_POST['sections'];
        update_option('design_sections', $sections);
        wp_die();
    }
}

if (!function_exists('ic_remove_product_from_cart')) {
    function ic_remove_product_from_cart()
    {
        $product_id = $_POST['productId'];
        $variation_id = $_POST['variationId'];

        $cart = WC()->cart->get_cart();
        foreach ( $cart as $cart_item_key => $cart_item ) {
            $cart_product_id = $cart_item[ 'data' ]->get_id();
            $cart_variation_id = $cart_item['variation_id'];
           // echo $product_id . '---' . $cart_product_id . '-------' . $variation_id . '---' . $cart_variation_id;
            if ( $product_id == $cart_product_id ) {
                WC()->cart->remove_cart_item( $cart_item_key );
            }
        }

        if (isset($_POST['upsells'])){

            $upsells = $_POST['upsells'];
            $data=array();
            foreach ($upsells as $upsellId){
                $managedBy = wc_get_product(absint($upsellId))->get_stock_managed_by_id();
                $prodManagedBy = wc_get_product(absint($product_id))->get_stock_managed_by_id();
                if ($managedBy == $prodManagedBy){
                    array_push($data,intval($upsellId));
                }
            }
           echo json_encode($data);
        }
        wp_die();
    }
}

if (!function_exists('ic_remove_product_update_mini_cart')) {
    function ic_remove_product_update_mini_cart()
    {

        foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item) {
            if ($cart_item['product_id'] == $_POST['product_id'] && $cart_item_key == $_POST['cart_item_key']) {
                WC()->cart->remove_cart_item($cart_item_key);
            }
        }
        WC()->cart->maybe_set_cart_cookies();
        WC()->cart->calculate_shipping();
        WC()->cart->calculate_fees();
        WC()->cart->calculate_totals();


        $mini_cart = do_shortcode('[ic_mini_cart]');

        echo json_encode($mini_cart);

        wp_die();
    }
}

if (!function_exists('ic_add_product_update_mini_cart')) {
    function ic_add_product_update_mini_cart()
    {

//        if (!wp_verify_nonce($_GET['nonce'], 'ic_add_product_update_mini_cart')) {
//            die ('Wrong nonce!');
//        }

        if (isset($_GET['productId'])) {
            $product_id = $_GET['productId'];
            $variation_id = (isset($_GET['variationId'])) ? $_GET['variationId'] : '';
            $variation = (isset($_GET['variationId'])) ? array('variation_id' => $variation_id) : array();
            WC()->cart->add_to_cart($product_id, 1, $variation_id, $variation);
        }

        if (isset($_GET['productId'])) {
            $product_id = $_GET['productId'];
            WC()->cart->add_to_cart($product_id);
        }

        WC()->cart->maybe_set_cart_cookies();
        WC()->cart->calculate_shipping();
        WC()->cart->calculate_fees();
        WC()->cart->calculate_totals();


        $mini_cart = do_shortcode('[ic_mini_cart]');

        echo json_encode($mini_cart);

        wp_die();
    }
}

if (!function_exists('ic_get_address_coordinates')) {
    function ic_get_address_coordinates()
    {

//        if (!wp_verify_nonce($_GET['nonce'], 'ic_get_address_coordinates')) {
//            die ('Wrong nonce!');
//        }

        $start_date = $_GET['startDate'];
        $end_date = $_GET['endDate'];

        global $wpdb;

        $sql = $wpdb->prepare("SELECT iac.address, iac.lat, iac.lng, iac.country, wos.net_total 
                FROM {$wpdb->prefix}ic_address_coordinates AS iac
                JOIN {$wpdb->prefix}wc_order_stats AS wos
                WHERE wos.order_id = iac.order_id
                AND iac.created BETWEEN %s AND %s;", $start_date, $end_date);
        $addresses = $wpdb->get_results($sql);

        echo json_encode($addresses);

        wp_die();
    }
}

if (!function_exists('ic_update_address_coordinates')) {
    function ic_update_address_coordinates()
    {

//        if (!wp_verify_nonce($_POST['nonce'], 'ic_update_address_coordinates')) {
//            die ('Wrong nonce!');
//        }

        $address = $_POST['address'];
        $lat = $_POST['lat'];
        $lng = $_POST['lng'];

        global $wpdb;

        $table_name = $wpdb->prefix . 'ic_address_coordinates';
        $data = [
            'lat' => $lat,
            'lng' => $lng
        ];
        $where = [
            'address' => $address
        ];

        $wpdb->update($table_name, $data, $where);
        wp_die();
    }
}

if (!function_exists('ic_set_upsell_product_prices')) {
    function ic_set_upsell_product_prices($cart)
    {
        $design_mini_cart = get_option('ic_design_mini_cart');

        $recommendations_type = isset($design_mini_cart ['ic_mini_cart_recommendations']) ? $design_mini_cart['ic_mini_cart_recommendations_type'] : null;

        if ($recommendations_type == '1') {
            $cart = WC()->cart->get_cart();
            $triggers = array();
            foreach ($cart as $item) {
                array_push($triggers, $item['product_id']);
            }
            $upsell_products = ic_get_upsells_for_triggers('cart_page');
            foreach ($cart as $cart_item) {
                foreach ($upsell_products as $upsell_product) {
                    if ($cart_item['data']->get_id() == $upsell_product['option_value']) {
                        if ($upsell_product['custom_compare_price'] != 0 && $upsell_product['custom_price'] == 0) {
                            $cart_item['data']->set_price($upsell_product['custom_compare_price']);
                        } else if ($upsell_product['custom_compare_price'] != 0 && $upsell_product['custom_price']) {
                            $cart_item['data']->set_price($upsell_product['custom_price']);
                        }

                        if ($upsell_product['default_quantity'] != 0 && $upsell_product['discount'] && ic_is_product_in_cart_quantity($upsell_product['option_value'], $upsell_product['default_quantity'])) {
                            $new_price = $cart_item['data']->get_price() * ((100 - $upsell_product['discount']) / 100);
                            $cart_item['data']->set_price($new_price);
                        }
                    }
                }
            }
        }
    }
}

if ( ! function_exists( 'ic_get_discounts_purchased' ) ) {
    function ic_get_discounts_purchased() {
        global $wpdb;

        $sql = "SELECT discount_id, count(discount_id) as num FROM {$wpdb->prefix}ic_discounts_purchased
                GROUP BY discount_id";
        $discounts_purchased = $wpdb->get_results($sql);

        $discounts_purchased_array = array_map(function ($discount_purchased) {
            $discount_purchased->discount_id = (int)$discount_purchased->discount_id;
            $discount_purchased->num = (int)$discount_purchased->num;
            return $discount_purchased;
        }, $discounts_purchased);

        return $discounts_purchased_array;
    }
}

if ( ! function_exists( 'ic_is_discount_maximum_used' ) ) {
    function ic_is_discount_maximum_used($discounts_purchased, $discount_id, $maximum_usage) {
        foreach ($discounts_purchased as $discount) {
            if($discount->discount_id == $discount_id && $discount->num >= $maximum_usage ) {
                return true;
            }
        }
        return false;
    }
}

if (!function_exists('ic_apply_automatic_discount_to_cart')) {
    function ic_apply_automatic_discount_to_cart()
    {
        $discounts_purchased = ic_get_discounts_purchased();
        WC()->cart->set_fee_total(0);
        $cart = WC()->cart->get_cart();

        $discounts = ic_get_discounts('cart_page');
        $subTotal = WC()->cart->get_subtotal();

        $contentsCount = WC()->cart->get_cart_contents_count();
        $discountsCount = 0;
        $individualDiscounts = [];
        $discountFinal = 0;
        $currentIp = ic_get_the_user_ip();
        $appliedDiscounts = array();
        $freeShipping = false;
        $specificProducts = null;
        $specificCategories = null;
        $excludeSaleItems = null;
        $discountsReached = [];
        foreach ($discounts as $discount) {

            $discountTotal = 0;
            $today = date('Y-m-d H:i:s');
            $startDateDiscount = $discount->dates->start_date;
            $startTimeDiscount = $discount->dates->start_time;
            $notInDate = false;
            if ($discount->end_dates_checked) {
                $endDateDiscount = $discount->dates->end_date;
                $endTimeDiscount = $discount->dates->end_time;
                $finishDateDiscount = date('Y-m-d H:i:s', strtotime("$endDateDiscount $endTimeDiscount"));
                $notInDate = $today > $finishDateDiscount;
            }
            $beginDateDiscount = date('Y-m-d H:i:s', strtotime("$startDateDiscount $startTimeDiscount"));


            $notInDate = $today < $beginDateDiscount || $notInDate;

            if(!$discount->active) {
                continue;
            }

            if ($notInDate) {
                continue;
            }

            $maximumUsage = $discount->maximum_discount_usage_checked ? (float)$discount->maximum_discount_usage : 'INF';
            if ($maximumUsage != 'INF' && ic_is_discount_maximum_used($discounts_purchased, $discount->discount_id, $maximumUsage)) {
                continue;
            }

            if ($discount->specific_products_checked && $discount->specific_products) {
                $productsForCheck = array();
                if ($discount->specific_products_checked && $discount->specific_products) {
                    $specificProducts = array_map('intval', $discount->specific_products);
                    foreach ($specificProducts as $specificProduct) {
                        array_push($productsForCheck, $specificProduct);
                    }
                }
                if ($discount->specific_products_checked && $discount->specific_categories != 'null') {
                    $specificCategories = array_map('intval', json_decode($discount->specific_categories, true));
                    foreach ($specificCategories as $specificCategory) {
                        $products = ic_get_products_from_category($specificCategory);
                        foreach ($products as $product) {
                            array_push($productsForCheck, $product);
                        }
                    }
                }
                $minimumQuantity = $discount->minimum_quantity_reached_checked ? (float)$discount->minimum_quantity_reached : 0;
                if(!ic_is_minimum_amount_quantity_applied($productsForCheck, $minimumQuantity, 'qty')) {
                    continue;
                }

            } else {
                $minimumQuantity = $discount->minimum_quantity_reached_checked ? (float)$discount->minimum_quantity_reached : 0;
                if ($minimumQuantity > $contentsCount) {
                    continue;
                }
            }

            if ($discount->buy_x_get_y) {
                $minimumQuantity = $discount->buy_x_get_y->maximum_usage_per_customer_checked ? (float)$discount->buy_x_get_y->maximum_usage_per_customer : 0;
                if ($minimumQuantity > $contentsCount) {
                    continue;
                }
            }

            if ($discount->specific_products_checked && $discount->specific_products) {
                $productsForCheck = array();
                if ($discount->specific_products_checked && $discount->specific_products) {
                    $specificProducts = array_map('intval', $discount->specific_products);
                    foreach ($specificProducts as $specificProduct) {
                        array_push($productsForCheck, $specificProduct);
                    }
                }
                if ($discount->specific_products_checked && $discount->specific_categories != 'null') {
                    $specificCategories = array_map('intval', json_decode($discount->specific_categories, true));
                    foreach ($specificCategories as $specificCategory) {
                        $products = ic_get_products_from_category($specificCategory);
                        foreach ($products as $product) {
                            array_push($productsForCheck, $product);
                        }
                    }
                }
                $minimumAmountReached = $discount->minimum_amount_reached_checked ? (float)$discount->minimum_amount_reached : 0;
                if(!ic_is_minimum_amount_quantity_applied($productsForCheck, $minimumAmountReached, 'amount')) {
                    continue;
                }

            } else {
                $minimumAmountReached = $discount->minimum_amount_reached_checked ? (float)$discount->minimum_amount_reached : 0;
                if ($minimumAmountReached >= $subTotal) {
                    continue;
                }
            }


            if ($discount->individual_use) {
                array_push($individualDiscounts, $discount);
                continue;
            }

            $excludeSaleItems = array();
            if ($discount->exclude_sale_items_checked) {

                //every element of $discount->exclude_sales_items convert to int
                if($discount->exclude_sale_items) {
                    $excludeSaleItems = array_map('intval', $discount->exclude_sale_items);
                    foreach ($excludeSaleItems as $item) {
                        $wc_product = wc_get_product($item);
                        if($wc_product->is_on_sale() && !in_array($item, $excludeSaleItems)) {
                            array_push($excludeSaleItems, $item);
                        }
                    }
                }

                if($discount->exclude_sale_category_items != 'null') {
                    $excludeSaleCategoryItems = array_map('intval', json_decode($discount->exclude_sale_category_items, true));
                    foreach ($excludeSaleCategoryItems as $categoryItem) {
                        $excludeSaleItemsFromCat = ic_get_products_from_category($categoryItem);
                        foreach ($excludeSaleItemsFromCat as $item) {
                            $wc_product = wc_get_product($item);
                            if($wc_product->is_on_sale() && !in_array($item, $excludeSaleItems)) {
                                array_push($excludeSaleItems, $item);
                            }
                        }
                    }
                }
            }

            if ($discount->specific_products_checked && $discount->specific_products) {
                $specificProducts = array_map('intval', $discount->specific_products);
            }
            if ($discount->specific_products_checked && $discount->specific_categories != 'null') {
                $specificCategories = array_map('intval', json_decode($discount->specific_categories, true));
            }

            $data = ic_get_discount_total($discount, $specificProducts, $specificCategories, $discountsCount
                , $subTotal, $cart, $freeShipping, $excludeSaleItems);

            $discountsCount = $data['discountsCount'];
            $discountFinal += $data['discountTotal'];
            $freeShipping = $data['freeShipping'];


            //if user gets to this point, discount is valid
            if (is_checkout()) {
                if (!array_key_exists($discount->id, $appliedDiscounts)) {
                    $appliedDiscounts[] = [
                        'id' => $discount->id,
                        'amount' => $data['discountTotal'],
                    ];
                }
            }

//            if( count( WC()->cart->get_applied_coupons() ) > 0 && $discount->individual_use == 1 ) {
//                foreach(WC()->cart->get_applied_coupons() as $coupon) {
//                    $cart_coupon = WC()->cart->get_coupon_discount_amount( $coupon );
//                    echo $cart_coupon . '---' . $discountFinal;
//                    if($cart_coupon > $discountFinal) {
//                        continue 2;
//                    } else {
//                        WC()->cart->remove_coupon( $coupon );
//                    }
//                }
//            }

            $singleDiscount = [
                'id' => $discount->id,
                'amount' => $data['discountTotal'],
                'title' => $discount->title,
                'individual' => false,
                'freeShipping'=>$freeShipping
            ];
            array_push($discountsReached, $singleDiscount);
        }

        if (count($individualDiscounts)) {
            $discountFinal = 0;
            $freeShipping = false;
            foreach ($individualDiscounts as $individualDiscount) {
                $data = ic_get_discount_total($individualDiscount, $specificProducts, $specificCategories,
                    $discountsCount, $subTotal, $cart, $freeShipping, $excludeSaleItems);
                if( count( WC()->cart->get_applied_coupons() ) > 0) {
                    foreach(WC()->cart->get_applied_coupons() as $coupon) {
                        $cart_coupon = WC()->cart->get_coupon_discount_amount( $coupon );
                        if($cart_coupon > $data['discountTotal']) {
                            continue 2;
                        } else {
                            WC()->cart->remove_coupon( $coupon );
                        }
                    }
                }
                if($data['discountTotal'] > $discountFinal) {
                    $discountFinal = $data['discountTotal'];
                    $discountsCount = $data['discountsCount'];
                    $freeShipping = $data['freeShipping'];

                    $singleDiscount = [
                        'id' => $individualDiscount->id,
                        'amount' => $data['discountTotal'],
                        'title' => $individualDiscount->title,
                        'individual' => true,
                        'freeShipping'=>$freeShipping
                    ];
                    array_push($discountsReached, $singleDiscount);
                }
            }
        }

        if ($freeShipping) {
            WC()->cart->shipping_total = 0;

        }

        if (count($discounts) > 0) {
            $hasIndividual = false;
            foreach ($discountsReached as $discountReached) {
                if($discountReached['individual']) {
                    $hasIndividual = true;
                    break;
                }
            }

            if($hasIndividual) {
                $max = ic_get_max_discount($discountsReached);
//                $fees = WC()->cart->get_fees();
//                foreach ($fees as $key => $fee) {
//                    unset($fees[$key]);
//                }
//                WC()->cart->fees_api()->set_fees($fees);
                if($max['individual']) {
                    WC()->cart->add_fee($max['title'], -$max['amount'], true, '');
                } else {
                    foreach ($discountsReached as $discountReached) {
                        if(!$discountReached['individual']) {
                            WC()->cart->add_fee($discountReached['title'], -$discountReached['amount'], true, '');
                        }
                    }
                }
            } else {
                foreach ($discounts as $discount) {
                    foreach ($discountsReached as $discountReached) {
                        if($discount->id == $discountReached['id']) {
                            WC()->cart->add_fee($discount->title, -$discountReached['amount'], true, '');
                        }
                    }
                }
            }

        }

        foreach ($appliedDiscounts as $appliedDiscount) {
            ic_add_applied_disc($appliedDiscount['id'], $currentIp);
        }

        ic_add_to_session($appliedDiscounts, 'applied_discounts');

    }
}

if ( ! function_exists( 'ic_get_max_discount' ) ) {
    function ic_get_max_discount($discounts) {
        $max = $discounts[0];
        foreach ($discounts as $discount) {
            if($max['amount'] < $discount['amount']) {
                $max = $discount;
            }
        }

        return $max;
    }
}

if (!function_exists('ic_add_to_discount_purchased')) {
    function ic_add_to_discount_purchased($orderId)
    {
        $appliedDiscounts = ic_get_from_session('applied_discounts');
        if (!$appliedDiscounts) {
            return;
        }


        global $wpdb;
        $table = $wpdb->prefix . 'ic_discounts_purchased';

        $order = wc_get_order($orderId);
        foreach ($appliedDiscounts as $appliedDiscount) {
            $wpdb->insert($table, array(
                'discount_id' => $appliedDiscount->id,
                'order_id' => $orderId,
                'discounted_amount' => $appliedDiscount->amount,
                'order_amount' => $order->get_total(),
                'created' => date('Y-m-d H:i:s')
            ));
        }
    }
}

if (!function_exists('ic_add_to_session')) {
    function ic_add_to_session($appliedDiscounts, $key)
    {
        global $wp_session;
        $wp_session[$key] = json_encode($appliedDiscounts);

    }
}

if (!function_exists('ic_get_from_session')) {
    function ic_get_from_session($key)
    {
        global $wp_session;
        if (isset($wp_session[$key])) {
            return json_decode($wp_session[$key]);
        }

        return [];
    }
}

if (!function_exists('ic_add_applied_disc')) {
    function ic_add_applied_disc($discountId, $ip)
    {
        global $wpdb;
        $table_name = $wpdb->prefix . 'ic_discounts_applied';
        //if disc id and ip exists, update count

        /*
        $wpdb->insert($table_name, array(
            'discount_id' => $discountId,
            'ip' => $ip,
            'num_of_times' => 1,
            'date' => date('Y-m-d H:i:s')
        ));
        */

        $row = $wpdb->get_row("SELECT * FROM $table_name WHERE discount_id = $discountId AND ip = '$ip'");
        if ($row) {
            $date = new DateTime(date($row->date));
            $now = new DateTime(date('Y-m-d H:i:s'));
            $diff = $date->diff($now);
            $hours = $diff->h;
            if ($hours > 0) {
                $num_of_times = $row->num_of_times + 1;
                $wpdb->update($table_name, array('num_of_times' => $num_of_times, 'date' => date('Y-m-d H:i:s')), array('discount_id' => $discountId, 'ip' => $ip));
            }

        } else {
            $wpdb->insert($table_name, array(
                'discount_id' => $discountId,
                'ip' => $ip,
                'num_of_times' => 1,
                'date' => date('Y-m-d H:i:s')
            ));
        }


    }
}

if (!function_exists('ic_get_discount_total')) {
    function ic_get_discount_total($discount, $specificProducts, $specificCategories,
                                   $discountsCount, $subTotal, $cart, $freeShipping, $excludeItems)
    {
        $typeDict = [
            'disc-percentage' => 'percentage',
            'disc-buy-x' => 'buy_x_get_y',
            'disc-fixed' => 'fixed',
            'disc-free-shipp' => 'free_shipping',
        ];
        $discountTotal = 0;
        switch ($typeDict[$discount->type]) {
            case 'percentage':
                $percentage = $discount->value;
                if ($specificProducts || $specificCategories) {
                    $specificApplied = array();
                    if($specificCategories) {
                        foreach ($specificCategories as $specificCategory) {
                            $categoryProducts = ic_get_products_from_category($specificCategory);
                            foreach ($categoryProducts as $specificProduct) {
                                foreach ($cart as $item) {
                                    if($item['product_id'] == $specificProduct && !in_array($item['product_id'], $specificApplied) && !in_array($item['product_id'], $excludeItems)) {
                                        $wc_product = wc_get_product($specificProduct);
                                        $discountTotal += ($wc_product->get_price() * $item['quantity']) * ($percentage / 100);
                                        array_push($specificApplied, $item['product_id']);
                                    }
                                }
                            }
                        }
                    }
                    if($specificProducts) {
                        foreach ($specificProducts as $specificProduct) {
                            foreach ($cart as $item) {
                                if($item['product_id'] == $specificProduct && !in_array($item['product_id'], $specificApplied) && !in_array($item['product_id'], $excludeItems)) {
                                    $wc_product = wc_get_product($specificProduct);
                                    $discountTotal += ($wc_product->get_price() * $item['quantity']) * ($percentage / 100);
                                    array_push($specificApplied, $item['product_id']);
                                }
                            }
                        }
                    }
                    $discountsCount++;
                    break;
                }
                $discountTotal = $subTotal * ($percentage / 100);
                $discountsCount++;
                break;
            case 'buy_x_get_y':

                $buyXGetY = $discount->buy_x_get_y;
                if(!$buyXGetY) {
                    break;
                }

                $selectedProducts = $customerGetsProducts = $selectedCategories = $customerGetsCategories = array();
                if(isset($buyXGetY->selected_products)) {
                    $selectedProducts =  $buyXGetY->selected_products ?
                        array_map('intval', $buyXGetY->selected_products) : [];
                }

                if(isset($buyXGetY->products_customer_gets)) {
                    $customerGetsProducts = $buyXGetY->products_customer_gets ?
                        array_map('intval', $buyXGetY->products_customer_gets) : [] ;
                }

                if(isset($buyXGetY->selected_categories)) {
                    $selectedCategories = $buyXGetY->selected_categories ?
                        array_map('intval', $buyXGetY->selected_categories) : [];
                    foreach ($selectedCategories as $selectedCategory) {
                        $productsFromCat = ic_get_products_from_category($selectedCategory);
                        foreach ($productsFromCat as $productFromCat) {
                            if(!in_array($productFromCat, $selectedProducts)) {
                                array_push($selectedProducts, $productFromCat);
                            }
                        }
                    }
                }

                if(isset($buyXGetY->categories_customer_gets)) {
                    $customerGetsCategories = $buyXGetY->categories_customer_gets ?
                        array_map('intval', $buyXGetY->categories_customer_gets) : [];
                    foreach ($customerGetsCategories as $customerGetCategory) {
                        $productsFromCat = ic_get_products_from_category($customerGetCategory);
                        foreach ($productsFromCat as $productFromCat) {
                            if(!in_array($productFromCat, $selectedProducts)) {
                                array_push($customerGetsProducts, $productFromCat);
                            }
                        }
                    }
                }

                $numOfItems = (float)($buyXGetY->how_many_items_customer_gets ? $buyXGetY->how_many_items_customer_gets : 100);

                $customerGets = $buyXGetY->customer_gets ? $buyXGetY->customer_gets : 'free';
                //if any of selected products and any of customer gets products is in cart at the same time


                $ids = array_column($cart, 'product_id');
                $countedValues = array_count_values($ids);

                $num = array_sum($selectedProducts);
                if ($num == 0) {
                    break;
                }

                $active = false;
                foreach ($selectedProducts as $selectedProduct) {
                    $product_cart_id = WC()->cart->generate_cart_id($selectedProduct);
                    $cart_item_key = WC()->cart->find_product_in_cart($product_cart_id);
                    if ($cart_item_key) {
                        $active = true;
                    }
                }

                if (!$active) {
                    break;
                }

                $numTaken = 0;
                $productsTaken = array();
                foreach ($customerGetsProducts as  $cus) {

                    $product = wc_get_product($cus);
                    $current_count = 0;
                    foreach ($cart as $item) {
                        $current_qty = $item['quantity'];
                        $i = 0;
                        $product_added = false;
                        while ($i <= $current_qty) {
                            if($numOfItems <= $numTaken || $current_qty <= $current_count) {
                                break;
                            }
                            if($item['product_id'] == $cus) {
                                if($buyXGetY->type == 'free') {
                                    $discountTotal += $product->get_price();
                                } else {
                                    $discountTotal += $product->get_price() / 100 * intval($buyXGetY->type);
                                }
                                $current_count++;
                                $numTaken++;
                                $product_added = true;
                            }
                            $i++;
                        }
                    }

                }
                $discountsCount++;
                break;
            case 'fixed':
                $fixed = $discount->value;
                if ($specificProducts || $specificCategories) {
                    $specificApplied = array();
                    if($specificCategories) {
                        foreach ($specificCategories as $specificCategory) {
                            $categoryProducts = ic_get_products_from_category($specificCategory);
                            foreach ($categoryProducts as $specificProduct) {
                                foreach ($cart as $item) {
                                    if($item['product_id'] == $specificProduct && !in_array($item['product_id'], $specificApplied) && !in_array($item['product_id'], $excludeItems)) {
                                        $discountTotal += $item['quantity'] * $fixed;
                                        array_push($specificApplied, $item['product_id']);
                                    }
                                }
                            }
                        }
                    }
                    if($specificProducts) {
                        foreach ($specificProducts as $specificProduct) {
                            foreach ($cart as $item) {
                                if($item['product_id'] == $specificProduct && !in_array($item['product_id'], $specificApplied) && !in_array($item['product_id'], $excludeItems)) {
                                    $discountTotal += $item['quantity'] * $fixed;
                                    array_push($specificApplied, $item['product_id']);
                                }
                            }
                        }
                    }
                    $discountsCount++;
                    break;
                }
                $discountTotal = min($discount->value, $subTotal);
                $discountsCount++;
                break;
            case 'free_shipping':
                $discountTotal  = WC()->cart->get_shipping_total();
                $freeShipping = true;
                break;
        }

        return [
            'discountTotal' => $discountTotal,
            'discountsCount' => $discountsCount,
            'freeShipping' => $freeShipping];
    }
}

if (!function_exists('ic_update_discount_active_status')) {
    function ic_update_discount_active_status()
    {
        $discounts = [];
        if (isset($_POST['discounts'])) {
            $discounts = $_POST['discounts'];
        }

        global $wpdb;
        $table_name = $wpdb->prefix . 'ic_discounts';
        foreach ($discounts as $discount) {
            $wpdb->update(
                $table_name,
                array(
                    'active' => $discount['active'] == 'true',
                ),
                array (
                    'discount_id' => $discount['id']
                )
            );
        }

        wp_die();
    }
}

if (!function_exists('ic_cmp_upsell_priority')) {
    function ic_cmp_upsell_priority($a, $b)
    {
        return $a['priority'] > $b['priority'];
    }
}

if (!function_exists('ic_get_discounts')) {
    function ic_get_discounts($page)
    {
        global $wpdb;

        $sql = "SELECT * FROM {$wpdb->prefix}ic_discounts";
        $discounts = $wpdb->get_results($sql);
        //for each discount add to discount array all the arguments
        $discounts_array = array_map(function ($discount) {
            $discount->dates = json_decode($discount->dates);
            $discount->exclude_sale_items_checked = (bool)$discount->exclude_sale_items_checked;
            $discount->exclude_sale_items = json_decode($discount->exclude_sale_items);
            $discount->individual_use = (bool)$discount->individual_use;
            $discount->end_dates_checked = (bool)$discount->end_dates_checked;
            $discount->maximum_discount_usage_checked = (bool)$discount->maximum_discount_usage_checked;
            $discount->maximum_discount_usage = (float)$discount->maximum_discount_usage;
            $discount->minimum_amount_reached_checked = (bool)$discount->minimum_amount_reached_checked;
            $discount->minimum_amount_reached = (float)$discount->minimum_amount_reached;
            $discount->minimum_quantity_reached_checked = (bool)$discount->minimum_quantity_reached_checked;
            $discount->minimum_quantity_reached = (float)$discount->minimum_quantity_reached;
            $discount->value = (float)$discount->discount_value;
            $discount->type = $discount->type;
            $discount->id = (int)$discount->discount_id;
            $discount->active = (bool)$discount->active;
            $discount->title = (string)$discount->title;
            $discount->specific_products_checked = (bool)$discount->specific_products_checked;
            $discount->specific_products = json_decode($discount->specific_products);
            $discount->buy_x_get_y = json_decode($discount->buy_x_get_y);
            $discount->exclude_shipping_checked = (bool)$discount->exclude_shipping_checked;
            $discount->exclude_shipping = (float)$discount->exclude_shipping;
            return $discount;
        }, $discounts);

        return $discounts_array;
    }
}

if (!function_exists('ic_get_upsells_for_triggers')) {
    function ic_get_upsells_for_triggers($page)
    {
        global $wpdb;
        $cart = WC()->cart->get_cart();
        $triggers = array();
        $trigger_categories = array();
        foreach ($cart as $item) {
            if ($item['variation_id']>0){
                array_push($triggers, $item['variation_id']);
            }else{
                array_push($triggers, $item['product_id']);
            }
            $terms = get_the_terms($item['product_id'], 'product_cat');
            foreach ($terms as $term) {
                if (!in_array($term->term_id, $trigger_categories)) {
                    array_push($trigger_categories, $term->term_id);
                }
            }
        }

        $upsells = array();
        foreach ($triggers as $trigger) {
            $sql = $wpdb->prepare("SELECT upsell_id FROM {$wpdb->prefix}ic_us_options
                    WHERE option_name = 'trigger'
                    AND option_value = %s;", $trigger);
            $upsell = $wpdb->get_results($sql);
            foreach ($upsell as $us) {
                if (!in_array($us->upsell_id, $upsells)) {
                    array_push($upsells, $us->upsell_id);
                }
            }
        }

        $upsells_cats = array();
        foreach ($trigger_categories as $category) {
            $sql = $wpdb->prepare("SELECT upsell_id FROM {$wpdb->prefix}ic_us_options
                    WHERE option_name = 'trigger_cat'
                    AND option_value = %s;", $category);
            $upsell = $wpdb->get_results($sql);
            foreach ($upsell as $us) {
                if (!in_array($us->upsell_id, $upsells_cats)) {
                    array_push($upsells_cats, $us->upsell_id);
                }
            }
        }

        $products_info = array();
        foreach ($upsells as $us) {
            $sql = $wpdb->prepare("SELECT *, iu.priority
                    FROM {$wpdb->prefix}ic_us_options AS ius
                    JOIN {$wpdb->prefix}ic_upsells AS iu
                    ON ius.upsell_id = iu.ID
                    WHERE option_name = 'product'
                    AND upsell_id = %d
                    AND iu.{$page} = '1';", $us);
            $products = $wpdb->get_results($sql);
            foreach ($products as $product) {
                $wc_product = wc_get_product($product->option_value);
                $image = wp_get_attachment_image_src(get_post_thumbnail_id($product->option_value), 'single-post-thumbnail');
                if (!$image){
                    $parentId = $wc_product->get_parent_id();
                    $image = wp_get_attachment_image_src(get_post_thumbnail_id($parentId), 'single-post-thumbnail');
                }
                if ($product->active == '1') {
                    $single_info = [
                        'us_option_id' => $product->us_option_id,
                        'upsell_id' => $product->upsell_id,
                        'option_name' => $product->option_name,
                        'option_value' => $product->option_value,
                        'option_amount' => $product->option_amount,
                        'custom_compare_price' => $product->custom_compare_price,
                        'custom_price' => $product->custom_price,
                        'default_quantity' => $product->default_quantity,
                        'discount' => $product->discount,
                        'checkout_page' => $product->checkout_page,
                        'cart_page' => $product->cart_page,
                        'before_ty_page' => $product->before_ty_page,
                        'priority' => $product->priority,
                        'image' => $image,
                        'price' => $wc_product->get_price(),
                        'title' => $wc_product->get_name(),
                    ];
                    array_push($products_info, $single_info);
                }
            }


            $sql = $wpdb->prepare("SELECT *, iu.priority
                    FROM {$wpdb->prefix}ic_us_options AS ius
                    JOIN {$wpdb->prefix}ic_upsells AS iu
                    ON ius.upsell_id = iu.ID
                    WHERE option_name = 'product_cat'
                    AND upsell_id = %d
                    AND iu.{$page} = '1';", $us);
            $products_categories = $wpdb->get_results($sql);
            foreach ($products_categories as $category) {
                if ($category->active == '1') {
                    $term = get_term_by('id', $category->option_value, 'product_cat', 'ARRAY_A');
                    $products = get_posts(array(
                        'post_type' => 'product',
                        'numberposts' => -1,
                        'post_status' => 'publish',
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'product_cat',
                                'terms' => $term['term_id'],
                                'operator' => 'IN',
                            )
                        ),
                    ));

                    foreach ($products as $product) {
                        $wc_product = wc_get_product($product->ID);
                        $single_info = [
                            'us_option_id' => $category->us_option_id,
                            'upsell_id' => $category->upsell_id,
                            'option_name' => $category->option_name,
                            'option_value' => $wc_product->get_id(),
                            'option_amount' => 0,
                            'custom_compare_price' => 0,
                            'custom_price' => 0,
                            'default_quantity' => 0,
                            'discount' => 0,
                            'checkout_page' => $category->checkout_page,
                            'cart_page' => $category->cart_page,
                            'before_ty_page' => $category->before_ty_page,
                            'priority' => $category->priority,
                            'image' => wp_get_attachment_image_src(get_post_thumbnail_id($wc_product->get_id()), 'single-post-thumbnail'),
                            'price' => $wc_product->get_price(),
                            'title' => $wc_product->get_name(),
                        ];
                        array_push($products_info, $single_info);
                    }
                }
            }
        }

        foreach ($upsells_cats as $us) {
            $sql = $wpdb->prepare("SELECT *, iu.priority
                    FROM {$wpdb->prefix}ic_us_options AS ius
                    JOIN {$wpdb->prefix}ic_upsells AS iu
                    ON ius.upsell_id = iu.ID
                    WHERE option_name = 'product'
                    AND upsell_id = %d
                    AND iu.{$page} = '1';", $us);
            $products = $wpdb->get_results($sql);
            foreach ($products as $product) {
                $wc_product = wc_get_product($product->option_value);
                if ($product->active == '1') {
                    $image = wp_get_attachment_image_src(get_post_thumbnail_id($wc_product->get_id()), 'single-post-thumbnail');
                    if (!$image){
                        $parentId = $wc_product->get_parent_id();
                        $image = wp_get_attachment_image_src(get_post_thumbnail_id($parentId), 'single-post-thumbnail');
                    }
                    $single_info = [
                        'us_option_id' => $product->us_option_id,
                        'upsell_id' => $product->upsell_id,
                        'option_name' => $product->option_name,
                        'option_value' => $product->option_value,
                        'option_amount' => $product->option_amount,
                        'custom_compare_price' => $product->custom_compare_price,
                        'custom_price' => $product->custom_price,
                        'default_quantity' => $product->default_quantity,
                        'discount' => $product->discount,
                        'checkout_page' => $product->checkout_page,
                        'cart_page' => $product->cart_page,
                        'before_ty_page' => $product->before_ty_page,
                        'priority' => $product->priority,
                        'image' =>$image,
                        'price' => $wc_product->get_price(),
                        'title' => $wc_product->get_name(),
                    ];
                    array_push($products_info, $single_info);
                }
            }

            $sql = $wpdb->prepare("SELECT *, iu.priority
                    FROM {$wpdb->prefix}ic_us_options AS ius
                    JOIN {$wpdb->prefix}ic_upsells AS iu
                    ON ius.upsell_id = iu.ID
                    WHERE option_name = 'product_cat'
                    AND upsell_id = %d
                    AND iu.{$page} = '1';", $us);
            $products_categories = $wpdb->get_results($sql);
            foreach ($products_categories as $category) {
                if ($category->active == '1') {
                    $term = get_term_by('id', $category->option_value, 'product_cat', 'ARRAY_A');
                    $products = get_posts(array(
                        'post_type' => 'product',
                        'numberposts' => -1,
                        'post_status' => 'publish',
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'product_cat',
                                'terms' => $term['term_id'],
                                'operator' => 'IN',
                            )
                        ),
                    ));

                    foreach ($products as $product) {
                        $wc_product = wc_get_product($product->ID);
                        $image = wp_get_attachment_image_src(get_post_thumbnail_id($wc_product->get_id()), 'single-post-thumbnail');
                        if (!$image){
                            $parentId = $wc_product->get_parent_id();
                            $image = wp_get_attachment_image_src(get_post_thumbnail_id($parentId), 'single-post-thumbnail');
                        }

                        $single_info = [
                            'us_option_id' => $category->us_option_id,
                            'upsell_id' => $category->upsell_id,
                            'option_name' => $category->option_name,
                            'option_value' => $wc_product->get_id(),
                            'option_amount' => 0,
                            'custom_compare_price' => 0,
                            'custom_price' => 0,
                            'default_quantity' => 0,
                            'discount' => 0,
                            'checkout_page' => $category->checkout_page,
                            'cart_page' => $category->cart_page,
                            'before_ty_page' => $category->before_ty_page,
                            'priority' => $category->priority,
                            'image' => $image,
                            'price' => $wc_product->get_price(),
                            'title' => $wc_product->get_name(),
                        ];
                        array_push($products_info, $single_info);
                    }
                }
            }
        }

        usort($products_info, 'ic_cmp_upsell_priority');
        return $products_info;
    }
}

if(!function_exists('ic_get_upsells_for_triggers_preview')) {
    function ic_get_upsells_for_triggers_preview($page) {
        global $wpdb;
        $args = array(
            'post_type' => 'product',
            'posts_per_page' => -1
        );
        $products = get_posts($args);
        $triggers = array();
        $vars =[
            'post_type' => 'product_variation',
            'posts_per_page' => -1
        ];
        $allChildren = get_posts($vars);
        foreach ($products as $product) {
            array_push($triggers, $product->ID);

            foreach ($allChildren as $child){
                if ($child->post_parent == $product->ID){
                    array_push($triggers,$child->ID);
                }
            }
        }

        $upsells = array();
        foreach ($triggers as $trigger) {
            $sql = $wpdb->prepare("SELECT upsell_id FROM {$wpdb->prefix}ic_us_options
                    WHERE option_name = 'trigger'
                    AND option_value = %s;", $trigger);
            $upsell = $wpdb->get_results($sql);
            foreach ($upsell as $us) {
                if (!in_array($us->upsell_id, $upsells)) {
                    array_push($upsells, $us->upsell_id);
                }
            }
        }

        $products_info = array();
        foreach ($upsells as $us) {
            $sql = $wpdb->prepare("SELECT *, iu.priority
                    FROM {$wpdb->prefix}ic_us_options AS ius
                    JOIN {$wpdb->prefix}ic_upsells AS iu
                    ON ius.upsell_id = iu.ID
                    WHERE option_name = 'product'
                    AND upsell_id = %d
                    AND iu.{$page} = '1';", $us);
            $products = $wpdb->get_results($sql);
            foreach ($products as $product) {
                $wc_product = wc_get_product($product->option_value);
                if ($product->active == '1') {
                    $image = wp_get_attachment_image_src(get_post_thumbnail_id($product->option_value), 'single-post-thumbnail');
                    if (!$image){
                        $parentId = $wc_product->get_parent_id();
                        $image = wp_get_attachment_image_src(get_post_thumbnail_id($parentId), 'single-post-thumbnail');
                    }
                    $single_info = [
                        'us_option_id' => $product->us_option_id,
                        'upsell_id' => $product->upsell_id,
                        'option_name' => $product->option_name,
                        'option_value' => $product->option_value,
                        'option_amount' => $product->option_amount,
                        'custom_compare_price' => $product->custom_compare_price,
                        'custom_price' => $product->custom_price,
                        'default_quantity' => $product->default_quantity,
                        'discount' => $product->discount,
                        'checkout_page' => $product->checkout_page,
                        'cart_page' => $product->cart_page,
                        'before_ty_page' => $product->before_ty_page,
                        'priority' => $product->priority,
                        'image' =>$image,
                        'price' => $wc_product->get_price(),
                        'title' => $wc_product->get_name(),
                    ];
                    array_push($products_info, $single_info);
                }
            }
        }

        usort($products_info, 'ic_cmp_upsell_priority');
        return $products_info;

    }
}

if (!function_exists('ic_apply_coupon_code_update_mini_cart')) {
    function ic_apply_coupon_code_update_mini_cart()
    {

//        if (!wp_verify_nonce($_POST['nonce'], 'ic_apply_coupon_code_update_mini_cart')) {
//            die ('Wrong nonce!');
//        }

        $coupon_code = isset($_POST["coupon_code"]) ? $_POST["coupon_code"] : '';
        $mini_cart = '';
        WC()->cart->apply_coupon($coupon_code);
        foreach(WC()->cart->get_applied_coupons() as $coupon_cart) {
            echo json_encode($coupon_cart);
            if( $coupon_cart == $coupon_code ) {
                $mini_cart = do_shortcode('[ic_mini_cart coupon_par="valid"]');
                echo json_encode($mini_cart);
                WC()->cart->maybe_set_cart_cookies();
                WC()->cart->calculate_shipping();
                WC()->cart->calculate_fees();
                WC()->cart->calculate_totals();
                wp_die();
            }
        }

        WC()->cart->maybe_set_cart_cookies();
        WC()->cart->calculate_shipping();
        WC()->cart->calculate_fees();
        WC()->cart->calculate_totals();

        $mini_cart = do_shortcode('[ic_mini_cart coupon_par="invalid"]');

        echo json_encode($mini_cart);
        wp_die();
    }
}

if (!function_exists('ic_remove_coupon_code_update_mini_cart')) {
    function ic_remove_coupon_code_update_mini_cart()
    {

//        if (!wp_verify_nonce($_POST['nonce'], 'ic_remove_coupon_code_update_mini_cart')) {
//            die ('Wrong nonce!');
//        }

        $coupon_code = isset($_POST["coupon_code"]) ? $_POST["coupon_code"] : '';
        WC()->cart->remove_coupon($coupon_code);
        WC()->cart->maybe_set_cart_cookies();
        WC()->cart->calculate_shipping();
        WC()->cart->calculate_fees();
        WC()->cart->calculate_totals();

        $mini_cart = do_shortcode('[ic_mini_cart]');

        echo json_encode($mini_cart);
        wp_die();
    }
}

if (!function_exists('ic_get_refreshed_mini_cart')) {
    function ic_get_refreshed_mini_cart()
    {

//        if (!wp_verify_nonce($_GET['nonce'], 'ic_get_refreshed_mini_cart')) {
//            die ('Wrong nonce!');
//        }

        WC()->cart->maybe_set_cart_cookies();
        WC()->cart->calculate_shipping();
        WC()->cart->calculate_fees();
        WC()->cart->calculate_totals();

        $mini_cart = do_shortcode('[ic_mini_cart]');

        echo json_encode($mini_cart);
        wp_die();
    }
}

if (!function_exists('ic_wc_cart_totals_coupon_label')) {
    function ic_wc_cart_totals_coupon_label($coupon, $echo = true)
    {
        if (is_string($coupon)) {
            $coupon = new WC_Coupon($coupon);
        }
        $customText = get_option('ic_design_custom_text');
        $couponText = 'Coupon';
        if (isset($customText['ic_ct_mc_discount_label']) && $customText['ic_ct_mc_discount_label'] != ''){
            $couponText = $customText['ic_ct_mc_discount_label'];
        }

        /* translators: %s: coupon code */
        $label = apply_filters('woocommerce_cart_totals_coupon_label', sprintf('<div class="ic-coupon-added-minicart"><p class="ic-coupon-added-minicart-coupon">'.$couponText.' </p><div class="ic-coupon-added-minicart-coupon-name"> <span>%s</span>', $coupon->get_code()), $coupon);
        $finalHtml = $label . '<a href="' . esc_url(add_query_arg('remove_coupon', rawurlencode($coupon->get_code()), wc_get_checkout_url())) . '" class="woocommerce-remove-coupon" data-coupon="' . esc_attr($coupon->get_code()) . '"><i class="fa-solid fa-xmark"></i></a> </div> </div>';

        if ($echo) {
            echo $finalHtml; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
        } else {
            return $finalHtml;
        }
    }
}

if (!function_exists('ic_wc_cart_totals_coupon_html')) {
    function ic_wc_cart_totals_coupon_html($coupon)
    {
        if (is_string($coupon)) {
            $coupon = new WC_Coupon($coupon);
        }

        $discount_amount_html = '';

        $amount = WC()->cart->get_coupon_discount_amount($coupon->get_code(), WC()->cart->display_cart_ex_tax);
        $discount_amount_html = '-' . wc_price($amount);

        if ($coupon->get_free_shipping() && empty($amount)) {
            $discount_amount_html = __('Free shipping coupon', 'woocommerce');
        }

        $discount_amount_html = apply_filters('woocommerce_coupon_discount_amount_html', $discount_amount_html, $coupon);
        $coupon_html = '<span> ' . $discount_amount_html . ' </span>';

        echo wp_kses(apply_filters('woocommerce_cart_totals_coupon_html', $coupon_html, $coupon, $discount_amount_html), array_replace_recursive(wp_kses_allowed_html('post'), array('a' => array('data-coupon' => true)))); // phpcs:ignore PHPCompatibility.PHP.NewFunctions.array_replace_recursiveFound
    }
}

if (!function_exists('ic_get_custom_mini_cart_products')) {
    function ic_get_custom_mini_cart_products()
    {

//        if (!wp_verify_nonce($_GET['nonce'], 'ic_get_custom_mini_cart_products')) {
//            die ('Wrong nonce!');
//        }

        $products = get_option('custom_mini_cart_products');
        echo json_encode($products);
        wp_die();
    }
}

if (!function_exists('ic_update_custom_mini_cart_products')) {
    function ic_update_custom_mini_cart_products()
    {

//        if (!wp_verify_nonce($_POST['nonce'], 'ic_update_custom_mini_cart_products')) {
//            die ('Wrong nonce!');
//        }

        $products = $_POST['custom_products'];
        update_option('custom_mini_cart_products', $products);
        wp_die();
    }
}

if (!function_exists('ic_upsell_shown')) {
    function ic_upsell_shown($upsell_id)
    {

        global $wpdb;
        $table_name = $wpdb->prefix . 'ic_us_shown';

        $wpdb->insert($table_name, array(
            'upsell_id' => $upsell_id,
        ));

    }
}

if (!function_exists('ic_in_cart')) {
    function ic_in_cart($product_id)
    {
        foreach (WC()->cart->get_cart() as $cart_item) {
            if ($cart_item['product_id'] === $product_id) {
                return true;
            }
        }
        return false;
    }
}

if (!function_exists('ic_get_order_addresses')) {
    function ic_get_order_addresses()
    {
        global $wpdb;

        $sql = $wpdb->prepare("SELECT net_total, returning_customer, p1.meta_value address, p3.meta_value country
                                    FROM {$wpdb->prefix}wc_order_stats
                                    LEFT JOIN {$wpdb->prefix}postmeta p1
                                    ON {$wpdb->prefix}wc_order_stats.order_id = p1.post_id and p1.meta_key = '_billing_address_1'
                                    LEFT JOIN {$wpdb->prefix}postmeta p3
                                    ON {$wpdb->prefix}wc_order_stats.order_id = p3.post_id and p3.meta_key = '_billing_country'
                                    AND parent_id = 0
                                    ORDER BY `date_created` ASC;
                            ");
        $order_addresses = $wpdb->get_results($sql);

        echo json_encode($order_addresses);

        wp_die();

    }
}

if (!function_exists('ic_add_mini_cart')) {
    function ic_add_mini_cart($menu)
    {
//        $items = wp_get_nav_menu_items('main');
//        $menuString = '<nav class="mp__menu">';
//        if (!empty($items)) {
//            foreach ($items as $item) {
//
//                $menuString .= '<a class="mp__menu__i" href="' . $item->url . '">' . $item->post_title . '</a>';
//
//            }
//
//            $menuString .= '<a href="' . $cartUrl . '">' . __('Cart', 'woocommerce') . '</a>';
//            $menuString .= '</nav>';
//        }
//        var_dump($menu);

        $menu .= '<li class="ic-mini-cart-icon menu-item menu-item-type-post_type menu-item-object-page menu-item-2"><i class="fa-sharp ic-mini-cart-toggle fa-solid fa-cart-shopping"></i></li>';
        return $menu;
    }
}

if (!function_exists('ic_add_mini_cart_icon')) {
    function ic_add_mini_cart_icon()
    {
        if (!is_checkout()) {
            add_filter('wp_nav_menu_items', 'ic_add_mini_cart');
        }
    }
}

if (!function_exists('ic_get_upsells_ty')) {
    function ic_get_upsells_ty()
    {

//        if (!wp_verify_nonce($_GET['nonce'], 'ic_get_upsells_ty')) {
//            die ('Wrong nonce!');
//        }

        $products = ic_get_upsells_for_triggers('before_ty_page');


        foreach ($products as $productKey => &$product){
            if ($product['option_name']==='product'){
                $wc_product = wc_get_product(absint($product['option_value']));
                if ($wc_product){
                    $stockManager = $wc_product->get_stock_managed_by_id();

                     $stockManagerProduct = wc_get_product(absint($stockManager));
                     $stockQuantity = $stockManagerProduct->get_stock_quantity();

                    $stockStatus = $wc_product->get_stock_status();
                    if ($stockStatus == 'outofstock'){
                        unset($products[$productKey]);
                        continue;
                    }

                    $inCartQty = 0;
                    foreach ( WC()->cart->get_cart() as $cart_item ) {
                        $quantity = $cart_item['quantity'];
                        $cartProduct = wc_get_product($cart_item['product_id']);
                        if ($cartProduct->get_stock_managed_by_id() == $stockManager){
                            $inCartQty +=$quantity;
                        }
                    }
                    if ($product['default_quantity'] != 0 && $product['discount']) {
                        $quantityNeeded = intval($product['default_quantity']) - 1;
                        if ( $inCartQty >= $quantityNeeded) {
                          $product['custom_price'] =  $product['custom_price'] * ((100 - $product['discount']) / 100);
                        }
                    }

                    if ($stockQuantity == null || ($stockQuantity - $inCartQty)>0){
                        continue;
                    }else{
                        unset($products[$productKey]);
                    }
                }
            }
        }

        $products = array_values($products);

        echo json_encode($products);
        wp_die();
    }
}

if (!function_exists('ic_no_all_products_in_cart')) {
    function ic_no_all_products_in_cart($products)
    {
        $cart = WC()->cart->get_cart();
        $ids = array();
        foreach ($products as $product) {
            array_push($ids, $product['option_value']);
        }

        $cart_ids = array();
        foreach ($cart as $cart_item) {
            array_push($cart_ids, $cart_item['product_id']);
        }

        foreach ($ids as $id) {
            if (!in_array($id, $cart_ids)) {
                return true;
            }
        }
        return false;
    }
}

if (!function_exists('ic_add_to_cart_back')) {
    function ic_add_to_cart_back()
    {

//        if (!wp_verify_nonce($_POST['nonce'], 'ic_add_to_cart_back')) {
//            die ('Wrong nonce!');
//        }

        $product_id = $_POST['productId'];
        WC()->cart->add_to_cart(intval($product_id));
        wp_die();
    }
}

if (!function_exists('ic_get_ty_options')) {
    function ic_get_ty_options()
    {

//        if (!wp_verify_nonce($_GET['nonce'], 'ic_get_ty_options')) {
//            die ('Wrong nonce!');
//        }

        $options = get_option('ic_design_ty');
        $custom_text = get_option('ic_design_custom_text');
        $checkout_options = get_option('ic_design_checkout');
        $customTextTY = get_option('ic_design_custom_text');

        $newsLetterEnabled = '0-f';
        if (isset($options['ic_ty_enable_nl'])){
            $newsLetterEnabled = $options['ic_ty_enable_nl'];
        }

        $primary_ty_label = null;

        $customer_information = null;
        if (isset($custom_text['ic_ct_ty_customer_information_label'])) {
            $customer_information = $custom_text['ic_ct_ty_customer_information_label'];
        }
        $email_address = null;
        if (isset($custom_text['ic_ct_ty_email_address_label'])) {
            $email_address = $custom_text['ic_ct_ty_email_address_label'];
        }
        $need_help = null;
        if (isset($custom_text['ic_ct_ty_need_help_label'])) {
            $need_help = $custom_text['ic_ct_ty_need_help_label'];
        }
        $contact_us_button = null;
        if (isset($custom_text['ic_ct_ty_contact_us_button_label'])) {
            $contact_us_button = $custom_text['ic_ct_ty_contact_us_button_label'];
        }
        $continue_shopping = null;
        if (isset($custom_text['ic_ct_ty_continue_shopping_button_label'])) {
            $contact_us_button = $custom_text['ic_ct_ty_continue_shopping_button_label'];
        }
        $items_in_shipment = null;
        if (isset($custom_text['ic_ct_ty_items_in_shipment_label'])) {
            $items_in_shipment = $custom_text['ic_ct_ty_items_in_shipment_label'];
        }
        $subtotal = null;
        if (isset($custom_text['ic_ct_ty_subtotal_label'])) {
            $subtotal = $custom_text['ic_ct_ty_subtotal_label'];
        }
        $discount = null;
        if (isset($custom_text['ic_ct_ty_discount_label'])) {
            $discount = $custom_text['ic_ct_ty_discount_label'];
        }
        $shipping = null;
        if (isset($custom_text['ic_ct_ty_shipping_label'])) {
            $shipping = $custom_text['ic_ct_ty_shipping_label'];
        }
        $total = null;
        if (isset($custom_text['ic_ct_ty_total_label'])) {
            $total = $custom_text['ic_ct_ty_total_label'];
        }





        $purchase_note = null;
        if (isset($options['ic_ty_purchase_note'])) {
            $purchase_note = $options['ic_ty_purchase_note'];
        }

        $redirect_page = null;
        if (isset($options['ic_ty_redirect_page'])) {
            $redirect_page = $options['ic_ty_redirect_page'];
        }

        $contact_us_link = null;
        if (isset($options['ic_ty_contact_us_link'])) {
            $contact_us_link = $options['ic_ty_contact_us_link'];
        }

        $shop_logo = null;
        if (isset($checkout_options['ic_checkout_logo'])) {
            $shop_logo = $checkout_options['ic_checkout_logo'];
        }



        $ty_page_title = null;
        if (isset($customTextTY['ic_ct_ty_page_title'])) {
            $ty_page_title = $customTextTY['ic_ct_ty_page_title'];
        }

//        $ty_error_page_title = null;
//        if (isset($customTextTY['ic_ct_ty_error_page_title'])) {
//            $ty_error_page_title = $customTextTY['ic_ct_ty_error_page_title'];
//        }

        $ty_primary_thank_you_label = null;
        if (isset($customTextTY['ic_ct_ty_primary_thank_you_label'])) {
            $ty_primary_thank_you_label = $customTextTY['ic_ct_ty_primary_thank_you_label'];
        }

//        $ty_secondary_thank_you_label = null;
//        if (isset($customTextTY['ic_ct_ty_secondary_thank_you_label'])) {
//            $ty_secondary_thank_you_label = $customTextTY['ic_ct_ty_secondary_thank_you_label'];
//        }

        $ty_customer_information_label = null;
        if (isset($customTextTY['ic_ct_ty_customer_information_label'])) {
            $ty_customer_information_label = $customTextTY['ic_ct_ty_customer_information_label'];
        }

//        $ty_save_my_information_for_faster_checkout_label = null;
//        if (isset($customTextTY['ic_ct_ty_save_my_information_for_faster_checkout_label'])) {
//            $ty_save_my_information_for_faster_checkout_label = $customTextTY['ic_ct_ty_save_my_information_for_faster_checkout_label'];
//        }

//        $ty_sign_up_for_newsletter = null;
//        if (isset($customTextTY['ic_ct_ty_sign_up_for_newsletter'])) {
//            $ty_sign_up_for_newsletter = $customTextTY['ic_ct_ty_sign_up_for_newsletter'];
//        }

//        $ty_sign_up_newsletter_description = null;
//        if (isset($customTextTY['ic_ct_ty_sign_up_newsletter_description'])) {
//            $ty_sign_up_newsletter_description = $customTextTY['ic_ct_ty_sign_up_newsletter_description'];
//        }

        $ty_email_address_label = null;
        if (isset($customTextTY['ic_ct_ty_email_address_label'])) {
            $ty_email_address_label = $customTextTY['ic_ct_ty_email_address_label'];
        }

        $ty_sign_up_button_label = null;
        if (isset($customTextTY['ic_ct_ty_sign_up_button_label'])) {
            $ty_sign_up_button_label = $customTextTY['ic_ct_ty_sign_up_button_label'];
        }

        $ty_need_help_label = null;
        if (isset($customTextTY['ic_ct_ty_need_help_label'])) {
            $ty_need_help_label = $customTextTY['ic_ct_ty_need_help_label'];
        }

        $ty_contact_us_button_label = null;
        if (isset($customTextTY['ic_ct_ty_contact_us_button_label'])) {
            $ty_contact_us_button_label = $customTextTY['ic_ct_ty_contact_us_button_label'];
        }

        $ty_continue_shopping_button_label = null;
        if (isset($customTextTY['ic_ct_ty_continue_shopping_button_label'])) {
            $ty_continue_shopping_button_label = $customTextTY['ic_ct_ty_continue_shopping_button_label'];
        }

        $ty_items_in_shipment_label = null;
        if (isset($customTextTY['ic_ct_ty_items_in_shipment_label'])) {
            $ty_items_in_shipment_label = $customTextTY['ic_ct_ty_items_in_shipment_label'];
        }

        $ty_subtotal_label = null;
        if (isset($customTextTY['ic_ct_ty_subtotal_label'])) {
            $ty_subtotal_label = $customTextTY['ic_ct_ty_subtotal_label'];
        }

        $ty_discount_label = null;
        if (isset($customTextTY['ic_ct_ty_discount_label'])) {
            $ty_discount_label = $customTextTY['ic_ct_ty_discount_label'];
        }

        $ty_shipping_label = null;
        if (isset($customTextTY['ic_ct_ty_shipping_label'])) {
            $ty_shipping_label= $customTextTY['ic_ct_ty_shipping_label'];
        }

        $ty_total_label = null;
        if (isset($customTextTY['ic_ct_ty_total_label'])) {
            $ty_total_label = $customTextTY['ic_ct_ty_total_label'];
        }


        $ty_shipping_information_label = null;
        if (isset($customTextTY['ic_ct_ty_shipping_information_label'])) {
            $ty_shipping_information_label = $customTextTY['ic_ct_ty_shipping_information_label'];
        }
        $ty_shipping_address_label = null;
        if (isset($customTextTY['ic_ct_ty_shipping_address_label'])) {
            $ty_shipping_address_label = $customTextTY['ic_ct_ty_shipping_address_label'];
        }
        $ty_billing_address_label = null;
        if (isset($customTextTY['ic_ct_ty_billing_address_label'])) {
            $ty_billing_address_label = $customTextTY['ic_ct_ty_billing_address_label'];
        }
        $ty_shipping_method_information_label = null;
        if (isset($customTextTY['ic_ct_ty_shipping_method_information_label'])) {
            $ty_shipping_method_information_label = $customTextTY['ic_ct_ty_shipping_method_information_label'];
        }
        $ty_payment_information_label = null;
        if (isset($customTextTY['ic_ct_ty_payment_information_label'])) {
            $ty_payment_information_label = $customTextTY['ic_ct_ty_payment_information_label'];
        }
        $ty_payment_method_label = null;
        if (isset($customTextTY['ic_ct_ty_payment_method_label'])) {
            $ty_payment_method_label = $customTextTY['ic_ct_ty_payment_method_label'];
        }


        $customTextsData = [
            'pageTitle' => $ty_page_title,
            //'errorPageTitle' => $ty_error_page_title,
            'primaryThankYouLabel' => $ty_primary_thank_you_label,
            //'secondaryThankYouLabel' => $ty_secondary_thank_you_label,
            'customerInformationLabel' => $ty_customer_information_label,
            'shippingInformationLabel' => $ty_shipping_information_label,
            'shippingAddressLabel' => $ty_shipping_address_label,
            'billingAddressLabel' => $ty_billing_address_label,
            'shippingMethodInformationLabel' => $ty_shipping_method_information_label,
            'paymentInformationLabel' => $ty_payment_information_label,
            'paymentMethodLabel' => $ty_payment_method_label,
            //'saveInformationForFasterCheckoutLabel' => $ty_save_my_information_for_faster_checkout_label,
            //'signUpForNewsletterLabel' => $ty_sign_up_for_newsletter,
            //'signUpNewsletterDescription' => $ty_sign_up_newsletter_description,
            'emailLabel' => $ty_email_address_label,
            'signUpButtonLabel' => $ty_sign_up_button_label,
            'needHelpLabel' => $ty_need_help_label,
            'contactUsButtonLabel' => $ty_contact_us_button_label,
            'continueShoppingButtonLabel' => $ty_continue_shopping_button_label,
            'itemsInShippingLabel' => $ty_items_in_shipment_label,
            'subtotalLabel' => $ty_subtotal_label,
            'discountLabel' => $ty_discount_label,
            'shippingLabel' => $ty_shipping_label,
            'totalLabelCT' => $ty_total_label,
        ];

        $ty_options = [
            'purchase_note' => $purchase_note,
            'redirect_page' => $redirect_page,
            'primary_ty_label' => $primary_ty_label,
            'contact_us_link' => $contact_us_link,
            'customer_information' => $customer_information,
            'email_address' => $email_address,
            'need_help' => $need_help,
            'contact_us_button' => $contact_us_button,
            'continue_shopping' => $continue_shopping,
            'items_in_shipment' => $items_in_shipment,
            'subtotal' => $subtotal,
            'discount' => $discount,
            'shipping' => $shipping,
            'total' => $total,
            'shop_logo' => $shop_logo,
            'newsLetterEnabled'=> $newsLetterEnabled,
            'customTexts' => $customTextsData
        ];



        echo json_encode($ty_options);
        wp_die();
    }
}

if (!function_exists('ic_get_product_price')) {
    function ic_get_product_price() {
        $product_id = $_GET['productId'];
        $product = wc_get_product($product_id);
        $price = $product->get_regular_price();
        $sale_price = $product->get_sale_price();
        $prices = [
            'price' => $price,
            'sale_price' => $sale_price
        ];
        echo json_encode($prices);
        wp_die();
    }
}

if( !function_exists('ic_get_error_messages')) {
    function ic_get_error_messages(){
        $custom_text = get_option('ic_design_custom_text');
        $first_name = 'First name';
        $last_name = 'Last name';
        $email = 'Email';
        $street_address = 'Street address';
        $city = 'City';
        $zip = 'Postcode';
        $country = 'Country';
        $phone = 'Phone';
        $state = 'State';

        if ( isset( $custom_text[ 'ic_ct_c_first_name_error_label' ] ) && $custom_text[ 'ic_ct_c_first_name_error_label' ] != '' ) {
            $first_name = $custom_text[ 'ic_ct_c_first_name_error_label' ];
        }
        if ( isset( $custom_text[ 'ic_ct_c_last_name_error_label' ] ) && $custom_text[ 'ic_ct_c_last_name_error_label' ] != '' ) {
            $last_name = $custom_text[ 'ic_ct_c_last_name_error_label' ];
        }
        if ( isset( $custom_text[ 'ic_ct_c_email_error_label' ] ) && $custom_text[ 'ic_ct_c_email_error_label' ] != '' ) {
            $email = $custom_text[ 'ic_ct_c_email_error_label' ];
        }
        if ( isset( $custom_text[ 'ic_ct_c_city_error_label' ] ) && $custom_text[ 'ic_ct_c_city_error_label' ] != '' ) {
            $city = $custom_text[ 'ic_ct_c_city_error_label' ];
        }
        if ( isset( $custom_text[ 'ic_ct_c_zip_code_error_label' ] ) && $custom_text[ 'ic_ct_c_zip_code_error_label' ] != '' ) {
            $zip = $custom_text[ 'ic_ct_c_zip_code_error_label' ];
        }
        if ( isset( $custom_text[ 'ic_ct_c_phone_number_error_label' ] ) && $custom_text[ 'ic_ct_c_phone_number_error_label' ] != '' ) {
            $phone = $custom_text[ 'ic_ct_c_phone_number_error_label' ];
        }
        $error_messages = [
            'first_name' => $first_name,
            'last_name' => $last_name,
            'email' => $email,
            'address_1' => $street_address,
            'city' => $city,
            'postcode' => $zip,
            'country' => $country,
            'phone' => $phone,
            'state' => $state
        ];

        return $error_messages;

    }
}

if ( ! function_exists('ic_is_product_in_cart_quantity') ) {
    function ic_is_product_in_cart_quantity($product_id, $quantity) {
        foreach ( WC()->cart->get_cart() as $cart_item ) {
            if( in_array( $product_id, array($cart_item['product_id'], $cart_item['variation_id']) )){
                $quantity_cart =  $cart_item['quantity'];
                if( $quantity_cart >= $quantity ) {
                    return true;
                }
            }
        }
        return false;
    }
}

if ( ! function_exists( 'ic_reduce_product_qty' ) ) {
    function ic_reduce_product_qty() {

//        if (!wp_verify_nonce($_POST['nonce'], 'ic_reduce_product_qty')) {
//            die ('Wrong nonce!');
//        }

        $product_id = $_POST['productId'];
        $variation_id = (isset($_POST['variationId'])) ? $_POST['variationId'] : 0;
        $cart = WC()->cart->get_cart();

        foreach ( $cart as $cart_item_key => $cart_item ) {
            $cart_product_id = $cart_item[ 'data' ]->get_id();
            if ( $variation_id == $cart_product_id && $variation_id != 0 ) {
                if ( $cart_item[ 'data' ]->is_type( 'variable' ) ) {
                    $cart_variation_id = $cart_item[ 'variation_id' ];
                    if ( $variation_id == $cart_variation_id ) {
                        $cart_item_key_to_update = $cart_item_key;
                        WC()->cart->set_quantity( $cart_item_key_to_update, $cart_item[ 'quantity' ] - 1 );
                        break;
                    }
                } else {
                    $cart_item_key_to_update = $cart_item_key;
                    WC()->cart->set_quantity( $cart_item_key_to_update, $cart_item[ 'quantity' ] - 1 );
                    break;
                }
            } else if ( $product_id == $cart_product_id ) {
                $cart_item_key_to_update = $cart_item_key;
                WC()->cart->set_quantity($cart_item_key_to_update, $cart_item['quantity'] - 1);
                break;
            }
        }

        WC()->cart->maybe_set_cart_cookies();
        WC()->cart->calculate_shipping();
        WC()->cart->calculate_fees();
        WC()->cart->calculate_totals();

        if (isset($_POST['upsellIds'])){
            $upsells = $_POST['upsellIds'];
            $data=array();
            if (sizeof($upsells)>0){
                foreach ($upsells as $upsellId){
                    $managedBy = wc_get_product(absint($upsellId))->get_stock_managed_by_id();
                    $prodManagedBy = wc_get_product(absint($product_id))->get_stock_managed_by_id();
                    if ($managedBy == $prodManagedBy){
                        array_push($data,intval($upsellId));
                    }
                }
                echo $data;
                wp_die();
            }else{
                $mini_cart = do_shortcode('[ic_mini_cart]');
                echo json_encode($mini_cart);
                wp_die();
            }
        }

        $mini_cart = do_shortcode('[ic_mini_cart]');


        echo json_encode($mini_cart);

        wp_die();
    }
}

if ( ! function_exists( 'ic_increase_product_qty' ) ) {
    function ic_increase_product_qty() {

//        if (!wp_verify_nonce($_POST['nonce'], 'ic_increase_product_qty')) {
//            die ('Wrong nonce!');
//        }

        $product_id = $_POST['productId'];
        $variation_id = (isset($_POST['variationId'])) ? $_POST['variationId'] : '';
        $variation = (!empty($variation_id)) ? array('variation_id' => $variation_id) : array();
        $cart = WC()->cart->get_cart();

        $dataOfStock = 0;

        $product = wc_get_product(intval($product_id));

        $stockManagedBy = $product->get_stock_managed_by_id();
        $stockManager = wc_get_product($stockManagedBy);
        $quantityFR = $stockManager->get_stock_quantity();

        $inCartQty = 0;
        foreach ( WC()->cart->get_cart() as $cart_item ) {
            $quantity = $cart_item['quantity'];
            $cartProduct = wc_get_product($cart_item['product_id']);
            if ($cartProduct->get_stock_managed_by_id() == $stockManagedBy){
                $inCartQty +=$quantity;
            }
        }
        $canAdd = false;
        if ($quantityFR == null || ($quantityFR - $inCartQty)>0){
            $canAdd = true;
        }
        if (!$canAdd){
           echo json_encode($dataOfStock);
            wp_die();
        }


        if (!empty($variation_id)) {
            $cart_item_key = WC()->cart->generate_cart_id($product_id, $variation_id, $variation);
            if (isset($cart[$cart_item_key])) {
                WC()->cart->set_quantity($cart_item_key, $cart[$cart_item_key]['quantity'] + 1);
            } else {
                WC()->cart->add_to_cart($product_id, 1, $variation_id, $variation);
            }
        } else {
            if (isset($cart[$product_id])) {
                WC()->cart->set_quantity($product_id, $cart[$product_id]['quantity'] + 1);
            } else {
                WC()->cart->add_to_cart($product_id, 1);
            }
        }

//        $product_id = $_POST['productId'];
//        $cart = WC()->cart->get_cart();
//        foreach ( $cart as $cart_item_key => $cart_item ) {
//            $cart_product_id = $cart_item[ 'data' ]->get_id();
//            if ( $product_id == $cart_product_id ) {
//                WC()->cart->set_quantity( $cart_item_key, $cart_item[ 'quantity' ] + 1 );
//            }
//        }
        WC()->cart->maybe_set_cart_cookies();
        WC()->cart->calculate_shipping();
        WC()->cart->calculate_fees();
        WC()->cart->calculate_totals();

        $mini_cart = do_shortcode('[ic_mini_cart]');

        echo json_encode($mini_cart);

        wp_die();
    }
}

if ( ! function_exists('ic_get_checkout_upsells' ) ){
    function ic_get_checkout_upsells(){

        $upsells = do_shortcode('[ic_checkout_upsells]');

        echo $upsells;

        wp_die();

    }
}

if ( ! function_exists('ic_get_cart_quantity' ) ){
    function ic_get_cart_quantity(){

//        if (!wp_verify_nonce($_POST['nonce'], 'ic_get_cart_quantity')) {
//            die ('Wrong nonce!');
//        }
        if (  WC()->cart->is_empty() ) {

            echo json_encode(0);
            wp_die();
        }

        $quantity =  WC()->cart->get_cart_contents_count();

        echo json_encode($quantity);

        wp_die();

    }
}

if ( ! function_exists('ic_change_shipping_if_free_discount' ) ){
    function ic_change_shipping_if_free_discount(){

        $discountNames = array();

        if (  WC()->cart->is_empty() ) {
            return $discountNames;
        }

        $discountsOnFront = WC()->cart->get_fees();
        $activeDiscounts = array();
        foreach ($discountsOnFront as $discountOnFront){
            array_push($activeDiscounts,$discountOnFront->name);
        }

        $discountNames = array();

        if (sizeof($activeDiscounts) > 0) {
            global $wpdb;
            $type = 'disc-free-shipp';
            $sql = $wpdb->prepare("SELECT title FROM {$wpdb->prefix}ic_discounts WHERE type = %s", esc_sql($type));
            $freeShippingDiscounts = $wpdb->get_results($sql);

            foreach ($freeShippingDiscounts as $discount) {
                $discountName = $discount->title;
                if (in_array($discountName, $activeDiscounts)) {
                    array_push($discountNames, $discountName);
                }
            }
        }

        if(sizeof($discountNames) > 0)
        {
            WC()->session->set('chosen_shipping_methods', array('free_shipping'));
            WC()->cart->maybe_set_cart_cookies();
            WC()->cart->calculate_shipping();
            WC()->cart->calculate_fees();
            WC()->cart->calculate_totals();

            return 1;

        }else{
            return 0;
        }
    }
}

if ( ! function_exists('ic_get_checkout_shipping_methods' ) ) {
    function ic_get_checkout_shipping_methods()
    {

        $selectedShippingMethod = $_GET['shipping_method'];
        $activeDiscounts = $_GET['active_discounts'];
        global $wpdb;
        $sql = $wpdb->prepare("SELECT title FROM {$wpdb->prefix}ic_discounts WHERE type = 'disc-free-shipp';");
        $freeShippingDiscounts = $wpdb->get_results($sql);
        $discountNames = array();

        foreach ($freeShippingDiscounts as $discount) {
            $discountName = $discount->title;
            foreach ($activeDiscounts as $frontDiscount) {
                if ($discountName === $frontDiscount) {
                    array_push($discountNames, $discountName);
                    break;
                }
            }
        }

            $sessionShipping = WC()->session->get('chosen_shipping_methods');
            $sessionShipping[0] = $selectedShippingMethod;
            WC()->session->set('chosen_shipping_methods', $sessionShipping);
            WC()->cart->maybe_set_cart_cookies();
            WC()->cart->calculate_shipping();
            WC()->cart->calculate_fees();
            WC()->cart->calculate_totals();

            $value = 0;
            if (!empty($discountNames)){
                $value = 1;
            }
            $data = [
                'selected_on_front' => $selectedShippingMethod,
                'session_shipping' => $sessionShipping[0],
                'discountedForFree'=>$value,
            ];
            echo json_encode($data);
            wp_die();


//        $shippingMethods = do_shortcode('[ic_checkout_shipping_methods]');
//        echo $shippingMethods;
//        wp_die();

    }
}


if ( ! function_exists( 'ic_num_checkout_links_set' ) ) {
    function ic_num_checkout_links_set() {
        $num = 0;
        $options = get_option( 'ic_design_checkout' );
        if( isset( $options[ 'ic_checkout_pp' ] ) && $options[ 'ic_checkout_pp' ] != '' ) {
            $num++;
        }
        if( isset( $options[ 'ic_checkout_rp' ] ) && $options[ 'ic_checkout_rp' ] != '' ) {
            $num++;
        }
        if( isset( $options[ 'ic_checkout_tac' ] ) && $options[ 'ic_checkout_tac' ] != '' ) {
            $num++;
        }

        return $num;
    }
}

if ( ! function_exists( 'ic_checkout_links' ) ) {
    function ic_checkout_links() {
        $options = get_option( 'ic_design_checkout' );
        $checkout_links = [];
        if( isset( $options[ 'ic_checkout_pp' ] ) && $options[ 'ic_checkout_pp' ] != '' ) {
            array_push( $checkout_links, '<a href="' .  $options['ic_checkout_pp'] . '">Privacy Policy</a>' );
        }
        if( isset( $options[ 'ic_checkout_rp' ] ) && $options[ 'ic_checkout_rp' ] != '' ) {
            array_push( $checkout_links, '<a href="' .  $options['ic_checkout_rp'] . '">Return Policy</a>' );
        }
        if( isset( $options[ 'ic_checkout_tac' ] ) && $options[ 'ic_checkout_tac' ] != '' ) {
            array_push( $checkout_links, '<a href="' .  $options['ic_checkout_rp'] . '">Terms & Conditions</a>' );
        }

        return $checkout_links;
    }
}

if ( ! function_exists( 'ic_get_custom_logo' ) ) {
    function ic_get_custom_logo() {
        $options = get_option( 'ic_design_checkout' );
        if ( isset( $options[ 'ic_checkout_logo' ] ) && $options[ 'ic_checkout_logo' ] != '' ) {
            $logo = $options[ 'ic_checkout_logo' ];
            echo '<a href="' . get_home_url() . '" ><img class="ic-checkout-site-custom-logo" src="' . esc_url( $logo ) . '" alt="' . get_bloginfo( 'name' ) . '"></a>';
        } else {
            $custom_logo_id = get_theme_mod( 'custom_logo' );
            $logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
            echo $logo;
            if ( has_custom_logo() ) {
                echo '<a href="' . get_home_url() . '" ><img class="ic-checkout-site-custom-logo" src="' . esc_url( $logo[0] ) . '" alt="' . get_bloginfo( 'name' ) . '"></a>';
            } else {
                echo '<a class="ic-checkout-site-name" href="' . get_home_url() . '" >' . get_bloginfo( 'name' ) . '</a>';
            }
        }
    }
}

if ( ! function_exists( 'ic_fee_bigger_than_zero' ) ) {
    function ic_fee_bigger_than_zero() {
        foreach ( WC()->cart->get_fees() as $fee ) {
            if( $fee->amount != 0 ) {
                return true;
            }
//            if( $fee->amount != null ) {
//                return true;
//            }
        }
        return false;
    }
}

if ( ! function_exists( 'ic_single_fee_bigger_than_zero' ) ) {
    function ic_single_fee_bigger_than_zero($fee) {
        $discountName = $fee->name;

        global $wpdb;
        $type = 'disc-free-shipp';
        $sql = $wpdb->prepare("SELECT title FROM {$wpdb->prefix}ic_discounts WHERE type = %s", esc_sql($type));
        $freeShippingDiscounts = $wpdb->get_results($sql);

        foreach ($freeShippingDiscounts as $discount) {
            if ($discountName === $discount->title){
                return false;
            }
        }

        if( $fee->amount != 0 ) {
            return true;
        }
        return false;
    }
}

if ( ! function_exists( 'ic_single_fee_bigger_than_zero_minicart' ) ) {
    function ic_single_fee_bigger_than_zero_minicart($fee) {

        $discountName = $fee->name;

        global $wpdb;
        $type = 'disc-free-shipp';
        $sql = $wpdb->prepare("SELECT title FROM {$wpdb->prefix}ic_discounts WHERE type = %s", esc_sql($type));
        $freeShippingDiscounts = $wpdb->get_results($sql);

        foreach ($freeShippingDiscounts as $discount) {
            if ($discountName === $discount->title){
                return false;
            }
        }

        if( $fee->amount != 0 ) {
            return true;
        }
        return false;
    }
}

if ( ! function_exists ( 'ic_get_shipping_methods_by_country' ) ) {
    function ic_get_shipping_methods_by_country() {
        $zones = [];

        if (class_exists('WC_Shipping_Zones')) {
            $all_zones = WC_Shipping_Zones::get_zones();

                foreach ($all_zones as $zone) {
                    if (!empty($zone['zone_locations'])) {
                        foreach ($zone['zone_locations'] as $location) {
                            array_push($zones, $location->code);
                        }
                    }
                }
        }

        echo json_encode($zones);
        wp_die();
    }
}

if ( ! function_exists( 'ic_get_products_from_category' ) ) {
    function ic_get_products_from_category($category) {
        $term = get_term_by('id', $category, 'product_cat', 'ARRAY_A');
        $products = get_posts(array(
            'post_type' => 'product',
            'numberposts' => -1,
            'post_status' => 'publish',
            'tax_query' => array(
                array(
                    'taxonomy' => 'product_cat',
                    'terms' => $term['term_id'],
                    'operator' => 'IN',
                )
            ),
        ));

        $products_id = array();
        foreach ($products as $product) {
            array_push($products_id, $product->ID);
        }
        return $products_id;
    }
}

if ( ! function_exists( 'ic_is_minimum_amount_quantity_applied' ) ) {
    function ic_is_minimum_amount_quantity_applied($products, $num, $type) {
        $cart = WC()->cart;
        $quantities = $cart->get_cart_item_quantities();

        if($type == 'qty') {
            $qty = 0;
            foreach ($products as $product) {
                foreach ($quantities as $product_id => $quantity) {
                    if($product == $product_id) {
                        $qty += $quantity;
                    }
                }
            }
            if($num > $qty) {
                return false;
            }
            return true;
        } else {
            $amount = 0;
            $cart_items = $cart->get_cart();

            foreach ($products as $product) {
                foreach ($cart_items as $item) {
                    if($product == $item['product_id']) {
                        $wc_product = wc_get_product($item['product_id']);
                        $amount += $wc_product->get_price() * $item['quantity'];
                    }
                }
            }
            if($num > $amount) {
                return false;
            }
            return true;
        }
    }
}

if ( ! function_exists( 'ic_reset_styles_to_default' ) ) {
    function ic_reset_styles_to_default()
    {
        $defaults = array(
            'primary_color' => '#000000',
            'primary_background_color' => '#ffffff',
            'primary_text_color' => '#101828',
            'input_field_background_color' => '#ffffff',
            'input_field_text_color' => '#344054',
            'secondary_text_color' => '#344054',
            'tertiary_text_color' => '#667085',
            'secondary_background_color' => '#F9FAFBCC',
            'custom_error_color' => '#F04438',
            'custom_accent_color' => '#0a8bfe',
            'primary_buttons_background_color' => '#101828',
            'secondary_buttons_background_color' => '#ffffff',
            'border_color' => '#EAECF0',
            'primary_buttons_text_color' => '#ffffff',
            'secondary_buttons_text_color' => '#101828',
            'ic_design_font_weight' => '3',
            'ic_design_font_subsets' => '0',
            'ic_design_font' => 'Inter',
            'ic_design_corner_radius_px' => '8px',
            'ic_design_corner_radius' => '1',
        );
        update_option('ic_design_general', $defaults);
    }
}

if ( ! function_exists( 'ic_wc_cart_totals_order_total_html' ) ) {
    function ic_wc_cart_totals_order_total_html() {
        $value = '<strong>' . WC()->cart->get_total() . '</strong> ';

        // If prices are tax inclusive, show taxes here.
        if ( wc_tax_enabled() && WC()->cart->display_prices_including_tax() ) {
            $tax_string_array = array();
            $cart_tax_totals  = WC()->cart->get_tax_totals();

            if ( get_option( 'woocommerce_tax_total_display' ) === 'itemized' ) {
                foreach ( $cart_tax_totals as $code => $tax ) {
                    $tax_string_array[] = sprintf( '%s %s', $tax->formatted_amount, $tax->label );
                }
            } elseif ( ! empty( $cart_tax_totals ) ) {
                $tax_string_array[] = sprintf( '%s %s', wc_price( WC()->cart->get_taxes_total( true, true ) ), WC()->countries->tax_or_vat() );
            }

            if ( ! empty( $tax_string_array ) ) {
                $taxable_address = WC()->customer->get_taxable_address();
                if ( WC()->customer->is_customer_outside_base() && ! WC()->customer->has_calculated_shipping() ) {
                    $country = WC()->countries->estimated_for_prefix( $taxable_address[0] ) . WC()->countries->countries[ $taxable_address[0] ];
                    /* translators: 1: tax amount 2: country name */
                    $tax_text = wp_kses_post( sprintf( __( '(includes %1$s estimated for %2$s)', 'woocommerce' ), implode( ', ', $tax_string_array ), $country ) );
                } else {
                    /* translators: %s: tax amount */
                    $tax_text = wp_kses_post( sprintf( __( '(includes %s)', 'woocommerce' ), implode( ', ', $tax_string_array ) ) );
                }

                $value .= '<small class="includes_tax">' . $tax_text . '</small>';
            }
        }

        $doc = new DOMDocument();
        libxml_use_internal_errors(true);
        $doc->loadHTML($value);
        libxml_clear_errors();
        $span_html = $doc->getElementsByTagName('span')->item(0)->ownerDocument->saveHTML($doc->getElementsByTagName('span')->item(0));

        echo apply_filters( 'woocommerce_cart_totals_order_total_html', $span_html ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
    }
}

if ( ! function_exists( 'ic_remove_currency_from_price' ) ) {
    function ic_remove_currency_from_price($price, $product) {
        if (is_cart()) {
            $price = strip_tags(html_entity_decode($price));
        }
        return $price;
    }
}

if ( ! function_exists( 'ic_check_product_stock' ) ) {
    function ic_check_product_stock($product, $product_id) {
        $stock_status = $product->get_stock_status();
        if($stock_status == 'outofstock') {
            return false;
        }

        $stock_quantity = $product->get_stock_quantity();

        $stockManagedBy = $product->get_stock_managed_by_id();
        $stockManager = wc_get_product($stockManagedBy);
        $stock_quantity = $stockManager->get_stock_quantity();



        if($stock_quantity == null) {
            return true;
        }

        if($stock_quantity == 0) {
            return false;
        }

        $cart_item_quantities = WC()->cart->get_cart_item_quantities();
        if ( array_key_exists( $product_id, $cart_item_quantities ) ) {
            $product_quantity = $cart_item_quantities[$product_id];
            if( $stock_quantity - $product_quantity <= 0 ) {
                return false;
            }
        }

        $inCartQty = 0;
        foreach ( WC()->cart->get_cart() as $cart_item ) {
            $quantity = $cart_item['quantity'];
            $cartProduct = wc_get_product($cart_item['product_id']);
            if ($cartProduct->get_stock_managed_by_id() == $stockManagedBy){
                $inCartQty +=$quantity;
            }
        }

        if ($stock_quantity - $inCartQty <= 0){
            return false;
        }

        return true;
    }
}



