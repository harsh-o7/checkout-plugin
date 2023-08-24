<?php

if ( ! function_exists( 'ic_add_new_upsell' ) ) {
    function ic_add_new_upsell()
    {
        global $wpdb;
        $table_name = $wpdb->prefix . 'ic_upsells';

        $upsell = $_POST['upsell'];
        $products = $upsell['products'];
        $triggers = $upsell['triggers'];
        $categories_triggers = $upsell['categoriesTriggers'];
        $categories_products = $upsell['categoriesProducts'];

        $wpdb->insert($table_name, array(
            'title' => $upsell['title'],
            'active' => true,
            'checkout_page' => $upsell['checkoutPage'] == 'true',
            'cart_page' => $upsell['cartPage'] == 'true',
            'before_ty_page' => $upsell['beforeTyPage'] == 'true',
            'priority' => $upsell['priority']
        ));

        $upsell_id = $wpdb->insert_id;
        $table_name = $wpdb->prefix . 'ic_us_options';
        foreach ($products as $product) {
            $id = intval($product['id']);
            $wpdb->insert($table_name, array(
                'upsell_id' => $upsell_id,
                'option_name' => 'product',
                'option_value' => $id,
                'custom_compare_price' => $product['ccPrice'],
                'custom_price' => $product['cPrice'],
                'default_quantity' => $product['defaultQuantity'],
                'discount' => $product['discount']
            ));
        }

        foreach ($triggers as $trigger) {
            $id = intval($trigger);
            $wpdb->insert($table_name, array(
                'upsell_id' => $upsell_id,
                'option_name' => 'trigger',
                'option_value' => $id
            ));
        }

        foreach ( $categories_triggers as $category_trigger ) {
            $id = intval( $category_trigger );
            $wpdb->insert($table_name, array(
                'upsell_id' => $upsell_id,
                'option_name' => 'trigger_cat',
                'option_value' => $id
            ));
        }

        foreach ( $categories_products as $category_product ) {
            $id = intval( $category_product );
            $wpdb->insert($table_name, array(
                'upsell_id' => $upsell_id,
                'option_name' => 'product_cat',
                'option_value' => $id
            ));
        }

        wp_die();
    }
}

if (!function_exists('ic_update_upsell')) {
    function ic_update_upsell()
    {

//        if (!wp_verify_nonce($_POST['nonce'], 'ic_update_upsell')) {
//            die ('Wrong nonce!');
//        }

        global $wpdb;
        $table_name = $wpdb->prefix . 'ic_upsells';

        $upsell = $_POST['upsell'];
        $products = $upsell['products'];
        $triggers = $upsell['triggers'];
        $categories_triggers = $upsell['categoriesTriggers'];
        $categories_products = $upsell['categoriesProducts'];

        $wpdb->update(
            $table_name,
            array(
                'title' => $upsell['title'],
                'active' => $upsell['active'] == 'true',
                'checkout_page' => $upsell['checkoutPage'] == 'true',
                'cart_page' => $upsell['cartPage'] == 'true',
                'before_ty_page' => $upsell['beforeTyPage'] == 'true',
                'priority' => $upsell['priority']
            ),
            array(
                'ID' => $upsell['id']
            )
        );

        $table_name = $wpdb->prefix . 'ic_us_options';
        $wpdb->delete(
            $table_name,
            array(
                'upsell_id' => $upsell['id']
            )
        );

        foreach ($products as $product) {
            $id = intval($product['id']);
            $wpdb->insert($table_name, array(
                'upsell_id' => $upsell['id'],
                'option_name' => 'product',
                'option_value' => $id,
                'custom_compare_price' => $product['ccPrice'],
                'custom_price' => $product['cPrice'],
                'default_quantity' => $product['defaultQuantity'],
                'discount' => $product['discount']
            ));
        }

        foreach ($triggers as $trigger) {
            $id = intval($trigger);
            $wpdb->insert($table_name, array(
                'upsell_id' => $upsell['id'],
                'option_name' => 'trigger',
                'option_value' => $id
            ));
        }

        foreach ( $categories_triggers as $category_trigger ) {
            $id = intval( $category_trigger );
            $wpdb->insert($table_name, array(
                'upsell_id' => $upsell['id'],
                'option_name' => 'trigger_cat',
                'option_value' => $id
            ));
        }

        foreach ( $categories_products as $category_product ) {
            $id = intval( $category_product );
            $wpdb->insert($table_name, array(
                'upsell_id' => $upsell['id'],
                'option_name' => 'product_cat',
                'option_value' => $id
            ));
        }

        wp_die();
    }
}

if (!function_exists('ic_us_publish_hide')) {
    function ic_us_publish_hide()
    {

//        if (!wp_verify_nonce($_POST['nonce'], 'ic_us_publish_hide')) {
//            die ('Wrong nonce!');
//        }

        $upsells = [];
        if (isset($_POST['upsells'])) {
            $upsells = $_POST['upsells'];
        }

        global $wpdb;
        $table_name = $wpdb->prefix . 'ic_upsells';
        foreach ($upsells as $upsell) {
            $wpdb->update(
                $table_name,
                array(
                    'active' => $upsell['active'] == 'true',
                ),
                array(
                    'ID' => $upsell['id']
                )
            );
        }

        wp_die();
    }
}

if (!function_exists('ic_upsell_delete')) {
    function ic_upsell_delete()
    {

//        if (!wp_verify_nonce($_POST['nonce'], 'ic_upsell_delete')) {
//            die ('Wrong nonce!');
//        }

        if (isset($_POST['upsell'])) {
            $upsell = $_POST['upsell'];
        }

        global $wpdb;
        $table_name = $wpdb->prefix . 'ic_upsells';
        $wpdb->delete(
            $table_name,
            array(
                'ID' => $upsell
            )
        );

        $table_name = $wpdb->prefix . 'ic_us_options';
        $wpdb->delete(
            $table_name,
            array(
                'upsell_id' => $upsell
            )
        );

        $table_name = $wpdb->prefix . 'ic_us_shown';
        $wpdb->delete(
            $table_name,
            array(
                'upsell_id' => $upsell
            )
        );

        $table_name = $wpdb->prefix . 'ic_us_purchased';
        $wpdb->delete(
            $table_name,
            array(
                'upsell_id' => $upsell
            )
        );


        wp_die();
    }
}

if (!function_exists('ic_query_products')) {
    function ic_query_products()
    {
        $query = '';
        if (isset($_GET['query'])) {
            $query = $_GET['query'];
        }

        global $wpdb;
        $products = $wpdb->get_results(
            $wpdb->prepare(
                "SELECT ID, post_title FROM $wpdb->posts WHERE post_title LIKE '%$query%'
                        AND post_type = 'product'
                        AND post_status = 'publish';"
            )
        );

        $final_products = [];
        foreach ( $products as $product ) {
            $wc_product = wc_get_product($product->ID);
            $variations = $wc_product->get_children();
            if ($variations) {
                $image = wp_get_attachment_image_src(get_post_thumbnail_id($product->ID), 'single-post-thumbnail');
                $wc_product = wc_get_product($product->ID);
                if ($image) {
                    array_push(
                        $final_products,
                        array(
                            'ID' => $product->ID,
                            'title' => $product->post_title,
                            'image' => $image[0],
                            'price' => $wc_product->get_price(),
                            'regular_price' => $wc_product->get_regular_price(),
                            'sale_price' => $wc_product->get_sale_price()
                        )
                    );
                } else {
                    array_push(
                        $final_products,
                        array(
                            'ID' => $product->ID,
                            'title' => $product->post_title,
                            'image' => null,
                            'price' => $wc_product->get_price(),
                            'regular_price' => $wc_product->get_regular_price(),
                            'sale_price' => $wc_product->get_sale_price()
                        )
                    );
                }
                foreach ($variations as $variation) {

                    $singleVar = wc_get_product(intval($variation));
                    $image = wp_get_attachment_image_src(get_post_thumbnail_id($singleVar->get_id()), 'single-post-thumbnail');
                    if (!$image){
                        $image = wp_get_attachment_image_src(get_post_thumbnail_id($product->ID), 'single-post-thumbnail');
                    }
                    if ($image) {
                        array_push(
                            $final_products,
                            array(
                                'ID' => $singleVar->get_id(),
                                'title' => $singleVar->get_name(),
                                'image' => $image[0],
                                'price' => $singleVar->get_price(),
                                'regular_price' => $singleVar->get_regular_price(),
                                'sale_price' => $singleVar->get_sale_price()
                            )
                        );
                    } else {
                        array_push(
                            $final_products,
                            array(
                                'ID' => $singleVar->get_id(),
                                'title' => $singleVar->get_name(),
                                'image' => null,
                                'price' => $singleVar->get_price(),
                                'regular_price' => $singleVar->get_regular_price(),
                                'sale_price' => $singleVar->get_sale_price()
                            )
                        );
                    }
                }
            } else {
                $image = wp_get_attachment_image_src(get_post_thumbnail_id($product->ID), 'single-post-thumbnail');
                $wc_product = wc_get_product($product->ID);
                if ($image) {
                    array_push(
                        $final_products,
                        array(
                            'ID' => $product->ID,
                            'title' => $product->post_title,
                            'image' => $image[0],
                            'price' => $wc_product->get_price(),
                            'regular_price' => $wc_product->get_regular_price(),
                            'sale_price' => $wc_product->get_sale_price()
                        )
                    );
                } else {
                    array_push(
                        $final_products,
                        array(
                            'ID' => $product->ID,
                            'title' => $product->post_title,
                            'image' => null,
                            'price' => $wc_product->get_price(),
                            'regular_price' => $wc_product->get_regular_price(),
                            'sale_price' => $wc_product->get_sale_price()
                        )
                    );
                }
            }
        }

        echo json_encode($final_products);

        wp_die();
    }
}

if (!function_exists('ic_query_product_categories')) {
    function ic_query_product_categories()
    {

//        if (!wp_verify_nonce($_GET['nonce'], 'ic_query_product_categories')) {
//            die ('Wrong nonce!');
//        }

        $query = '';
        if (isset($_GET['query_categories'])) {
            $query = $_GET['query_categories'];
        }

        global $wpdb;
        $categories = $wpdb->get_results(
            $wpdb->prepare(
                "SELECT {$wpdb->prefix}term_taxonomy.term_id, {$wpdb->prefix}terms.name
                        FROM {$wpdb->prefix}term_taxonomy
                        JOIN {$wpdb->prefix}terms ON {$wpdb->prefix}term_taxonomy.term_id = {$wpdb->prefix}terms.term_id
                        WHERE {$wpdb->prefix}term_taxonomy.taxonomy = 'product_cat' AND {$wpdb->prefix}terms.name LIKE '%$query%'
                        GROUP BY term_id;"
            )
        );

        echo json_encode($categories);

        wp_die();
    }
}

if (!function_exists('ic_discount_get_products_triggers')) {
    function ic_discount_get_products_triggers() {
        $discountId = $_GET['discountId'];
        global $wpdb;

        //get the discount with id = $discountId
        $discount = $wpdb->get_row(
            $wpdb->prepare(
                "SELECT * FROM {$wpdb->prefix}ic_discounts WHERE discount_id = $discountId;"
            )
        );

        $buyXgetY = json_decode($discount->buy_x_get_y);

        $excludeSaleItems = json_decode($discount->exclude_sale_items) ?? [];
        $excludeSaleCategoryItems = json_decode($discount->exclude_sale_category_items) ?? [];
        $specificProducts = json_decode($discount->specific_products) ?? [];
        $specificCategories = json_decode($discount->specific_categories) ?? [];

        $buyXgetYSelected = $buyXgetY->selected_products ?? [];
        $buyXgetYSelectedCategories = $buyXgetY->selected_categories ?? [];
        $buyXgetYCustomerGets = $buyXgetY->products_customer_gets ?? [];
        $buyXgetYCustomerGetsCategories = $buyXgetY->categories_customer_gets ?? [];
        $data = [
            'exculdeSaleItems' => $excludeSaleItems,
            'excludeSaleCategoryItems' => $excludeSaleCategoryItems,
            'specificProducts' => $specificProducts,
            'specificCategories' => $specificCategories,
            'buyXgetYSelectedProducts' => $buyXgetYSelected,
            'buyXgetYSelectedCategories' => $buyXgetYSelectedCategories,
            'buyXgetYCustomerGets' => $buyXgetYCustomerGets,
            'buyXgetYCustomerGetsCategories' => $buyXgetYCustomerGetsCategories
        ];

        echo json_encode($data);

        wp_die();

    }
}

if (!function_exists('ic_upsell_get_products_triggers')) {
    function ic_upsell_get_products_triggers()
    {
        $upsell_id = $_GET['id'];
        global $wpdb;
        $sql = $wpdb->prepare("SELECT option_value AS id FROM {$wpdb->prefix}ic_us_options
                WHERE option_name = 'trigger'
                AND upsell_id = %d", $upsell_id);
        $triggers = $wpdb->get_results($sql);

        $sql = $wpdb->prepare("SELECT option_value AS id, custom_compare_price AS ccp, custom_price AS cp, default_quantity AS dq, discount AS d
                FROM {$wpdb->prefix}ic_us_options
                WHERE option_name = 'product'
                AND upsell_id = %d", $upsell_id);
        $products = $wpdb->get_results($sql);

        $sql = $wpdb->prepare("SELECT option_value AS id FROM {$wpdb->prefix}ic_us_options
                WHERE option_name = 'trigger_cat'
                AND upsell_id = %d", $upsell_id);
        $triggers_cats = $wpdb->get_results($sql);

        $sql = $wpdb->prepare("SELECT option_value AS id, custom_compare_price AS ccp, custom_price AS cp, default_quantity AS dq, discount AS d
                FROM {$wpdb->prefix}ic_us_options
                WHERE option_name = 'product_cat'
                AND upsell_id = %d", $upsell_id);
        $products_cats = $wpdb->get_results($sql);

        $data = [
            'triggers' => $triggers,
            'products' => $products,
            'triggers_cats' => $triggers_cats,
            'products_cats' => $products_cats
        ];

        echo json_encode($data);
        wp_die();
    }
}

if (!function_exists('ic_create_discount')) {
    function ic_create_discount()
    {

        global $wpdb;
        $table_name = $wpdb->prefix . 'ic_discounts';
        $data = $_POST['data'];

        $data = ic_processing_discount_data($data);
        $wpdb->insert($table_name, array(
            'trigger' => $data['trigger'],
            'title' => $data['title'],
            'code' => $data['code'],
            'type' => $data['type'],
            'start_date' => $data['start_date'],
            'end_date' => $data['end_date'],
            'active' => true,
            'maximum_discount_usage_checked' => $data['maximum_discount_usage_checked'],
            'maximum_discount_usage' => $data['maximum_discount_usage'],
            'dates' => $data['dates'],
            'minimum_quantity_reached_checked' => $data['minimum_quantity_reached_checked'],
            'minimum_quantity_reached' => $data['minimum_quantity_reached'],
            'minimum_amount_reached_checked' => $data['minimum_amount_reached_checked'],
            'minimum_amount_reached' => $data['minimum_amount_reached'],
            'individual_use' => $data['individual_use'],
            'exclude_sale_items_checked' => $data['exclude_sale_items_checked'],
            'exclude_sale_items' => $data['exclude_sale_items'],
            'exclude_sale_category_items' => $data['exclude_sale_category_items'],
            'entire_order' => $data['entire_order'],
            'specific_products_checked' => $data['specific_products_checked'],
            'specific_products' => $data['specific_products'],
            'specific_categories' => $data['specific_categories'],
            'buy_x_get_y' => "",
            'end_dates_checked' => $data['end_dates_checked'],
            'discount_value' => $data['discount_value'],
            'exclude_shipping' => $data['exclude_shipping'],
            'exclude_shipping_checked' => $data['exclude_shipping_checked'],
        ));

        $wpdb->update($table_name,
            array(
                'buy_x_get_y' => $data['buy_x_get_y']
            ),
            array(
                'discount_id' => $wpdb->insert_id
            )
        );

        echo 'success';
        wp_die();
    }
}

if (!function_exists('ic_processing_discount_data')) {
    function ic_processing_discount_data($data)
    {
        $trigger = $data['entireOrder'] ? 'entireOrder' : 'specificProducts';
        $code = 'GIFT' . rand(10000, 99999);
        $startDate = date('Y-m-d H:i:s', strtotime($data['dates']['start_date'] . ' ' . $data['dates']['start_time']));
        $today = date('Y-m-d H:i:s');
        $active = $data['active'];
        $maximumDiscountUsage = $data['maximumDiscountUsage'] === "" ? null : $data['maximumDiscountUsage'];
        $minimumQuantityReached = $data['minimumQuantityReachedChecked'] === "" ? null : $data['minimumQuantityReached'];
        $minimumAmountReached = $data['minimumAmountReached'] === "" ? null : $data['minimumAmountReached'];;
        if ($data['end_date'] != null) {
            $endDate = date('Y-m-d H:i:s', strtotime($data['dates']['end_date'] . ' ' . $data['dates']['end_time']));
        }

        $excludeSaleItems = json_encode($data['excludeSaleItems']);
        $excludeSaleCategoryItems = json_encode($data['excludeSaleCategoryItems']);
        $specificProducts = json_encode($data['specificProducts']);
        $specificCategories = json_encode($data['specificCategories']);
        $buyXgetY = json_encode($data['buyXgetYdata']);

        $endDatesChecked = $data['endDatesChecked'];

        return [
            'trigger' => $trigger,
            'title' => $data['title'],
            'code' => $code,
            'type' => $data['discountType'],
            'start_date' => $data['dates']['start_date'],
            'end_date' => $data['dates']['end_date'],
            'active' => $active,
            'maximum_discount_usage_checked' => $data['maximumDiscountUsageChecked'],
            'maximum_discount_usage' => $maximumDiscountUsage,
            'dates' => json_encode($data['dates']),
            'minimum_quantity_reached_checked' => $data['minimumQuantityReachedChecked'],
            'minimum_quantity_reached' => $minimumQuantityReached,
            'minimum_amount_reached_checked' => $data['minimumAmountReachedChecked'],
            'minimum_amount_reached' => $minimumAmountReached,
            'individual_use' => $data['individualUse'],
            'exclude_sale_items_checked' => $data['excludeSaleItemsChecked'],
            'exclude_sale_items' => $excludeSaleItems,
            'exclude_sale_category_items' => $excludeSaleCategoryItems,
            'entire_order' => $data['entireOrder'],
            'specific_products_checked' => $data['specificProductsChecked'],
            'specific_products' => $specificProducts,
            'specific_categories' => $specificCategories,
            'buy_x_get_y' => $buyXgetY ,
            'end_dates_checked' => $endDatesChecked ,
            'discount_value' => $data['discountValue'],
            'exclude_shipping' => $data['excludeShipping'],
            'exclude_shipping_checked' => $data['excludeShippingChecked'],

        ];
    }
}

//update discount
if (!function_exists('ic_update_discount')) {
    function ic_update_discount()
    {
        global $wpdb;
        $data = $_POST['data'];
        $discount_id = $_POST['discountId'];
        $table_name = $wpdb->prefix . 'ic_discounts';
        $data = ic_processing_discount_data($data);

        //var_dump($data);

        //update discount with dicount_id as id
        $wpdb->update(
            $table_name,
            array(
                'trigger' => $data['trigger'],
                'title' => $data['title'],
                'code' => $data['code'],
                'type' => $data['type'],
                'start_date' => $data['start_date'],
                'end_date' => $data['end_date'],
                'active' => (bool)$data['active'],
                'maximum_discount_usage_checked' => $data['maximum_discount_usage_checked'],
                'maximum_discount_usage' => $data['maximum_discount_usage'],
                'dates' => $data['dates'],
                'minimum_quantity_reached_checked' => $data['minimum_quantity_reached_checked'],
                'minimum_quantity_reached' => $data['minimum_quantity_reached'],
                'minimum_amount_reached_checked' => $data['minimum_amount_reached_checked'],
                'minimum_amount_reached' => $data['minimum_amount_reached'],
                'individual_use' => $data['individual_use'],
                'exclude_sale_items_checked' => $data['exclude_sale_items_checked'],
                'exclude_sale_items' => $data['exclude_sale_items'],
                'exclude_sale_category_items' => $data['exclude_sale_category_items'],
                'entire_order' => $data['entire_order'],
                'specific_products_checked' => $data['specific_products_checked'],
                'specific_products' => $data['specific_products'],
                'specific_categories' => $data['specific_categories'],
                'buy_x_get_y' =>  $data['buy_x_get_y'],
                'end_dates_checked' => $data['end_dates_checked'],
                'discount_value' => $data['discount_value'],
                'exclude_shipping' => $data['exclude_shipping'],
                'exclude_shipping_checked' => $data['exclude_shipping_checked'],
            ),
            array('discount_id' => $discount_id)
        );

        echo 'success';
        wp_die();
    }
}


if (!function_exists('ic_discount_delete')) {
    function ic_discount_delete()
    {
//        if (!wp_verify_nonce($_POST['nonce'], 'ic_discount_delete')) {
//            die ('Wrong nonce!');
//        }

        $id = $_POST['discount'];
        global $wpdb;
        $table_name = $wpdb->prefix . 'ic_discounts';
        $wpdb->delete($table_name, array(
            'discount_id' => $id
        ));

        wp_die();
    }
}

if (!function_exists('ic_add_upsells_purchased')) {
    function ic_add_upsells_purchased()
    {

//        if (!wp_verify_nonce($_POST['nonce'], 'ic_add_upsells_purchased')) {
//            die ('Wrong nonce!');
//        }

        global $wpdb;
        $table_name = $wpdb->prefix . 'ic_us_purchased';

        $upsells = $_POST['upsells'];
        $order_id = $_POST['order'];
        $products = $_POST['prod'];
        foreach ($upsells as $upsell) {
            $quantity = intval($upsell['qty']);
            foreach ($products as $product){
                $productId = $product['id'];
                if (intval($upsell['product_id'])===intval($productId)){
                    $quantity=intval($product['quantity']);
                }
            }
            $amount = floatval($upsell['price']);
            $productTotalAmount = $amount * $quantity;

            $wpdb->insert($table_name, array(
                'upsell_id' => $upsell['upsell_id'],
                'order_id' => $order_id,
                'product_id' => $upsell['product_id'],
                'product_amount' => $productTotalAmount
            ));
        }

        wp_die();
    }
}

if ( ! function_exists( 'ic_get_products_by_categories' ) ) {
    function ic_get_products_by_categories() {

//        if (!wp_verify_nonce($_GET['nonce'], 'ic_get_products_by_categories')) {
//            die ('Wrong nonce!');
//        }

        $categories = $_GET[ 'categories' ];

        $final_products = array();
        foreach ( $categories as $category ) {
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

            foreach ($products as $product) {
                $wc_product = wc_get_product($product->ID);
                $new_product = [
                    'title' => $wc_product->get_name(),
                    'image' => wp_get_attachment_image_src(get_post_thumbnail_id($product->ID), 'single-post-thumbnail')[0],
                    'regular_price' => $wc_product->get_regular_price(),
                    'sale_price' => $wc_product->get_sale_price(),
                    'price' => $wc_product->get_price(),
                    'cc_price' => 0,
                    'c_price' => 0,
                ];
                array_push($final_products, $new_product);
            }
        }

        echo json_encode( $final_products );

        wp_die();
    }
}