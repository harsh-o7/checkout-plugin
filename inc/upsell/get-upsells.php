<?php

if (!function_exists('ic_get_upsells')) {
    function ic_get_upsells()
    {
        global $wpdb;

        $sql = $wpdb->prepare("SELECT count(*) FROM {$wpdb->prefix}ic_upsells");
        $ic_upsells = $wpdb->get_results($sql)[0];
        return $ic_upsells;
    }
}

if (!function_exists('ic_get_upsells_main_analytics')) {
    function ic_get_upsells_main_analytics()
    {

//        if (!wp_verify_nonce($_GET['nonce'], 'ic_get_upsells_main_analytics')) {
//            die ('Wrong nonce!');
//        }

        global $wpdb;

        $startDate = $_GET['startDate'];
        $endDate = $_GET['endDate'];

        $diffDays = abs(round((strtotime($endDate) - strtotime($startDate)) / 86400)) + 1;

        $beforeStartDate = date('Y-m-d H:i:s', strtotime($startDate . ' - ' . $diffDays . ' days'));
        $beforeEndDate = date('Y-m-d H:i:s', strtotime($endDate . ' - ' . $diffDays . ' days'));

        $sql = $wpdb->prepare("SELECT count(*) as num_shown FROM {$wpdb->prefix}ic_us_shown
                WHERE `created` BETWEEN %s AND %s;", $startDate, $endDate);
        $num_shown = $wpdb->get_results($sql)[0]->num_shown;
        
        $sql = $wpdb->prepare("SELECT count(order_id) as times_purchased, ifnull(sum(product_amount), 0) as amount 
                FROM {$wpdb->prefix}ic_us_purchased 
                WHERE `created` BETWEEN %s AND %s;", $startDate, $endDate);
        $num_of_orders_amount = $wpdb->get_results($sql)[0];

        if ($num_shown == 0) {
            $conversion_rate = 0.0;
        } else {
            $conversion_rate = number_format(($num_of_orders_amount->times_purchased / $num_shown) * 100, 2);
        }

        $sql = $wpdb->prepare("SELECT count(*) as num_shown FROM {$wpdb->prefix}ic_us_shown
                WHERE `created` BETWEEN %s AND %s;", $beforeStartDate, $beforeEndDate);
        $num_shown_before = $wpdb->get_results($sql)[0]->num_shown;


        $sql = $wpdb->prepare("SELECT count(order_id) as times_purchased, ifnull(sum(product_amount), 0) as amount 
                FROM {$wpdb->prefix}ic_us_purchased 
                WHERE `created` BETWEEN %s AND %s;", $beforeStartDate, $beforeEndDate);
        $num_of_orders_amount_before = $wpdb->get_results($sql)[0];

        if ($num_shown_before == 0) {
            $conversion_rate_before = 0.0;
        } else {
            $conversion_rate_before = number_format(($num_of_orders_amount_before->times_purchased / $num_shown_before) * 100, 2);
        }

        //$amountPurchased = number_format($num_of_orders_amount->amount,3);

        $data = [
            'conversionRate' => $conversion_rate,
            'timesShown' => $num_shown,
            'timesPurchased' => $num_of_orders_amount->times_purchased,
            'amount' => $num_of_orders_amount->amount
        ];

        $before_data = [
            'conversionRate' => $conversion_rate_before,
            'timesShown' => $num_shown_before,
            'timesPurchased' => $num_of_orders_amount_before->times_purchased,
            'amount' => $num_of_orders_amount_before->amount
        ];

        $final_data = [
            'data' => $data,
            'dataBefore' => $before_data
        ];
        echo json_encode($final_data);
        wp_die();
    }
}

if (!function_exists('ic_get_single_upsell_main_analytics')) {
    function ic_get_single_upsell_main_analytics()
    {

//        if (!wp_verify_nonce($_GET['nonce'], 'ic_get_single_upsell_main_analytics')) {
//            die ('Wrong nonce!');
//        }

        global $wpdb;

        $startDate = $_GET['startDate'];
        $endDate = $_GET['endDate'];
        $upsell_id = $_GET['upsell_id'];

        $diffDays = abs(round((strtotime($endDate) - strtotime($startDate)) / 86400)) + 1;

        $beforeStartDate = date('Y-m-d H:i:s', strtotime($startDate . ' - ' . $diffDays . ' days'));
        $beforeEndDate = date('Y-m-d H:i:s', strtotime($endDate . ' - ' . $diffDays . ' days'));

        $sql = $wpdb->prepare("SELECT count(*) as num_shown FROM {$wpdb->prefix}ic_us_shown
                WHERE `upsell_id` = %d
                AND `created` BETWEEN %s AND %s", $upsell_id, $startDate, $endDate);
        $num_shown = $wpdb->get_results($sql)[0]->num_shown;

        $sql = $wpdb->prepare("SELECT count(order_id) as times_purchased, ifnull(sum(product_amount), 0) as amount 
                FROM {$wpdb->prefix}ic_us_purchased
                WHERE `upsell_id` = %d
                AND `created` BETWEEN %s AND %s;", $upsell_id, $startDate, $endDate);
        $num_of_orders_amount = $wpdb->get_results($sql)[0];

        if ($num_shown == 0) {
            $conversion_rate = 0.0;
        } else {
            $conversion_rate = number_format(($num_of_orders_amount->times_purchased / $num_shown) * 100, 2);
        }

        $sql = $wpdb->prepare("SELECT count(*) as num_shown FROM {$wpdb->prefix}ic_us_shown
                WHERE `upsell_id` = %d
                AND `created` BETWEEN %s AND %s;", $upsell_id, $beforeStartDate, $beforeEndDate);
        $num_shown_before = $wpdb->get_results($sql)[0]->num_shown;

        $sql = $wpdb->prepare("SELECT count(order_id) as times_purchased, ifnull(sum(product_amount), 0) as amount 
                FROM {$wpdb->prefix}ic_us_purchased
                WHERE `upsell_id` = %d 
                AND `created` BETWEEN %s AND %s;", $upsell_id, $beforeStartDate, $beforeEndDate);
        $num_of_orders_amount_before = $wpdb->get_results($sql)[0];

        if ($num_shown_before == 0) {
            $conversion_rate_before = 0.0;
        } else {
            $conversion_rate_before = number_format(($num_of_orders_amount_before->times_purchased / $num_shown_before) * 100, 2);
        }

        $amountPurchased = $num_of_orders_amount->amount;

        $data = [
            'conversionRate' => $conversion_rate,
            'timesShown' => $num_shown,
            'timesPurchased' => $num_of_orders_amount->times_purchased,
            'amount' =>$amountPurchased
        ];

        $before_data = [
            'conversionRate' => $conversion_rate_before,
            'timesShown' => $num_shown_before,
            'timesPurchased' => $num_of_orders_amount_before->times_purchased,
            'amount' => $num_of_orders_amount_before->amount
        ];

        $final_data = [
            'data' => $data,
            'dataBefore' => $before_data
        ];
        echo json_encode($final_data);
        wp_die();
    }
}

if (!function_exists('ic_get_datatable_upsells_info')) {
    function ic_get_datatable_upsells_info()
    {

//        if (!wp_verify_nonce($_GET['nonce'], 'ic_get_datatable_upsells_info')) {
//            die ('Wrong nonce!');
//        }

        global $wpdb;
        $active = $inactive = $page = $product_ids = $prodCat = $searching = null;
        $checkout_page = $cart_page = $before_ty_page = null;
        $newConversionRate = $newAmountPurchased = $newTimesPurchased = null;
        $filters = $_GET['filters'];

        if ($filters) {
            $page = $product_ids = $prodCat = [];
            foreach ($filters as $key => $value) {
                if ($key == 'active') {
                    $active = true;
                    $active_value = array_keys($value)[0] == 'active' ? 1 : 0;
                    continue;
                }
                if ($key == 'Inactive') {
                    $inactive = true;
                    $inactive_value = 0;
                    continue;
                }

                if ($key == 'checkout') {
                    $page = true;
                    $checkout_page = key_exists('checkout-page', $value) ? 1 : null;
                    $cart_page = key_exists('cart-page', $value) ? 1 : null;
                    $before_ty_page = key_exists('bty-page', $value) ? 1 : null;
                    continue;
                }
                if ($key == 'product') {
                    $product_ids = array_keys($value);
                    continue;
                }
                if ($key == 'product-cat') {
                    $prodCat = array_keys($value);
                    continue;
                }
                if ($key == 'search') {
                    $searching = true;
                    $custom_price = format_search_values([$value['cp-min'], $value['cp-max']]);
                    $conversion_rates = format_search_values([$value['cr-min'], $value['cr-max']]);
                    $times_purchased = format_search_values([$value['tp-min'], $value['tp-max']]);
                    $amount_purchased = format_search_values([$value['ap-min'], $value['ap-max']]);

                    $newConversionRate = format_search_values([$value['cr-min'], $value['cr-max']]);
                    $newTimesPurchased = format_search_values([$value['tp-min'], $value['tp-max']]);
                    $newAmountPurchased = format_search_values([$value['ap-min'], $value['ap-max']]);
                }
            }
        }

        $sQl = "SELECT iu.ID, count(distinct order_id) as num_of_orders, ifnull(sum(iup.product_amount), 0) as amount ";
        $sQl .= "FROM {$wpdb->prefix}ic_upsells as iu ";
        $sQl .= "LEFT JOIN {$wpdb->prefix}ic_us_purchased as iup ON iu.ID = iup.upsell_id ";
        $sQl .= "GROUP BY iu.ID";
        $upsellsForNumericsQuery = $wpdb->get_results($sQl);
        $upsellsForNumerics = [];
        foreach ($upsellsForNumericsQuery as $upsell) {
            $upsellsForNumerics[$upsell->ID] = $upsell;
        }

        $sqlSelect = "SELECT iu.ID, count(distinct order_id) as num_of_orders, ifnull(sum(iup.product_amount), 0) as amount, iu.title, iu.active ";
        $sqlFromJoin = "FROM {$wpdb->prefix}ic_upsells as iu
                        LEFT JOIN {$wpdb->prefix}ic_us_purchased as iup ON iu.ID = iup.upsell_id 
                        JOIN {$wpdb->prefix}ic_us_options iuo ON iu.ID = iuo.upsell_id ";
        $sqlWhere = "";

//        if ($active) {
//            $sqlWhere == "" ? $sqlWhere .= "WHERE " : $sqlWhere .= "AND ";
//            $sqlWhere .= " iu.active = " . $active_value . " ";
//        }

//        if ($inactive){
//            $sqlWhere == "" ? $sqlWhere .= "WHERE " : $sqlWhere .= "OR ";
//            $sqlWhere .= " iu.active = 0 ";
//        }


        if ($active && $inactive){
            $sqlWhere == "" ? $sqlWhere .= "WHERE ( " : $sqlWhere .= "AND ";
            $sqlWhere .= " iu.active = 1 OR iu.active = 0 ) ";
        }else if($active){
            $sqlWhere == "" ? $sqlWhere .= "WHERE " : $sqlWhere .= "AND ";
            $sqlWhere .= " iu.active = 1 ";
        }else if($inactive){
            $sqlWhere == "" ? $sqlWhere .= "WHERE " : $sqlWhere .= "AND ";
            $sqlWhere .= " iu.active = 0 ";
        }

        if ($page) {
            $sqlWhere == "" ? $sqlWhere .= "WHERE (" : $sqlWhere .= "AND ( ";
            $sqlPage = "";
            if ($checkout_page) {
                $sqlPage != "" ? $sqlPage .= ' OR ' : $sqlPage .= '';
                $sqlPage .= " iu.checkout_page = 1 ";
            }
            if ($cart_page) {
                $sqlPage != "" ? $sqlPage .= ' OR ' : $sqlPage .= '';
                $sqlPage .= " iu.cart_page = 1 ";
            }
            if ($before_ty_page) {
                $sqlPage != "" ? $sqlPage .= ' OR ' : $sqlPage .= '';
                $sqlPage .= " iu.before_ty_page = 1 ";
            }

            $sqlWhere .= $sqlPage . ") ";
        }
        if ($product_ids) {
            $sqlFromJoin .= "JOIN {$wpdb->prefix}posts pr ON iuo.option_value = pr.ID ";
            $sqlWhere == "" ? $sqlWhere .= "WHERE " : $sqlWhere .= "AND ";
            $sqlWhere .= "pr.ID IN (" . implode(',', $product_ids) . ") ";
        }
        if ($prodCat) {
            $sqlFromJoin .= "JOIN {$wpdb->prefix}term_relationships tr ON iuo.option_value = tr.object_id ";
            $sqlFromJoin .= "JOIN {$wpdb->prefix}term_taxonomy tt ON tr.term_taxonomy_id = tt.term_taxonomy_id ";
            $sqlFromJoin .= "JOIN {$wpdb->prefix}terms t ON tt.term_id = t.term_id ";
            $sqlWhere == "" ? $sqlWhere .= "WHERE " : $sqlWhere .= "AND ";
            $sqlWhere .= "tt.taxonomy = 'product_cat' AND t.term_id IN (" . implode(',', $prodCat) . ") ";
        }
        if ($searching && $product_ids) {
            $sqlWhere == "" ? $sqlWhere .= "WHERE " : $sqlWhere .= "AND ";
            $sqlWhere .= "iuo.option_name = 'product' AND iuo.custom_price BETWEEN {$custom_price[0]} AND {$custom_price[1]} ";
        }
        $sqlGroup = "GROUP BY iu.ID;";
        $sql = $sqlSelect . $sqlFromJoin . $sqlWhere . $sqlGroup;
        //var_dump($sql);
        $upsells = $wpdb->get_results($sql);

        $sql = $wpdb->prepare("SELECT upsell_id, count(*) as num_shown 
                FROM {$wpdb->prefix}ic_us_shown 
                GROUP BY upsell_id;");
        $upsells_num_shown = $wpdb->get_results($sql);

        $arr_us_ns = array();
        foreach ($upsells_num_shown as $upsell) {
            $arr_us_ns[$upsell->upsell_id] = $upsell->num_shown;
        }

        $data = array();

        foreach ($upsells as $upsell) {
            $numOfOrders = $upsellsForNumerics[$upsell->ID]->num_of_orders;
            if ($arr_us_ns[$upsell->ID]) {
                $conversion_rate = number_format(($numOfOrders / $arr_us_ns[$upsell->ID]) * 100, 2);
                $amount = $upsellsForNumerics[$upsell->ID]->amount;
                $times_shown = $arr_us_ns[$upsell->ID];
            } else {
                $conversion_rate = 0.00;
                $amount = 0;
                $times_shown = 0;
            }

            $times_purchased_ups = $numOfOrders;
            $sql = $wpdb->prepare("SELECT option_value 
                FROM {$wpdb->prefix}ic_us_options
                WHERE option_name = 'trigger' AND upsell_id = %d
                GROUP BY upsell_id;", $upsell->ID);

//            if ($conversion_rates) {
//                if ($conversion_rate < $conversion_rates[0] || $conversion_rate > $conversion_rates[1]) {
//                    continue;
//                }
//                if ($times_purchased_ups < $times_purchased[0] || $times_purchased_ups > $times_purchased[1]) {
//                    continue;
//                }
//
//                if ($amount < $amount_purchased[0] || $amount > $amount_purchased[1]) {
//                    continue;
//                }
//
//            }
            $image = null;
            $product_id = $wpdb->get_results($sql)[0]->option_value;
            if ($product_id){
                $image = wp_get_attachment_image_src(get_post_thumbnail_id($product_id), 'single-post-thumbnail');
                if (!$image){
                    $wcNew = wc_get_product($product_id);
                    $parentId = $wcNew->get_parent_id();
                    $image = wp_get_attachment_image_src(get_post_thumbnail_id($parentId), 'single-post-thumbnail');
                }
            }

            $final_upsell = [
                'upsellId' => $upsell->ID,
                'timesPurchased' => $numOfOrders,
                'amount' => $amount,
                'timesShown' => $times_shown,
                'conversionRate' => $conversion_rate,
                'title' => $upsell->title,
                'active' => $upsell->active,
                'image' => $image[0]
            ];

            array_push($data, $final_upsell);
        }


        $startDateOfUpsells =$_GET['start_date'];
        $endDateOfUpsells = $_GET['end_date'];

        foreach ($data as &$upsellData)
        {
            $sql = $wpdb->prepare("SELECT * FROM {$wpdb->prefix}ic_upsells WHERE ID ='".$upsellData['upsellId']."';");
            $dateOfCreation = $wpdb->get_results($sql)[0]->created;

            if ($dateOfCreation < $endDateOfUpsells){

                $realAmount = 0;
                $realConversion = 0;
                $realTimesPurchased = 0;
                $realTimesShown = 0;

                $sql = $wpdb->prepare("SELECT * FROM {$wpdb->prefix}ic_us_shown WHERE upsell_id = '" . $upsellData['upsellId']. "' and created between '" . $startDateOfUpsells . "' and '" . $endDateOfUpsells . "';");
                $upsellsShown = $wpdb->get_results($sql);
                if ($upsellsShown) {
                    foreach ($upsellsShown as $upsellShown) {
                        $realTimesShown += 1;
                    }
                }

                $sql = $wpdb->prepare("SELECT * FROM {$wpdb->prefix}ic_us_purchased WHERE upsell_id = '" . $upsellData['upsellId'] . "' and created between '" . $startDateOfUpsells . "' and '" . $endDateOfUpsells . "';");
                $upsellsPurchased = $wpdb->get_results($sql);
                if ($upsellsPurchased) {
                    foreach ($upsellsPurchased as $upsellPurchased) {
                        $realAmount += $upsellPurchased->product_amount;
                    }
                }

                $sql = $wpdb->prepare("SELECT count(distinct order_id) as num_of_orders FROM {$wpdb->prefix}ic_us_purchased WHERE upsell_id = '" . $upsellData['upsellId'] . "' and created between '" . $startDateOfUpsells . "' and '" . $endDateOfUpsells . "';");
                $realTimesPurchased = $wpdb->get_results($sql)[0]->num_of_orders;
                $realTimesPurchased = intval($realTimesPurchased);

                $realConversion = $realTimesShown == 0 ? 0 : number_format(($realTimesPurchased / $realTimesShown) * 100, 2);
            }else{
                $realAmount = '-';
                $realConversion = '-';
                $realTimesPurchased = '-';
                $realTimesShown = '-';
            }

            $upsellData['timesPurchased']=$realTimesPurchased;
            $upsellData['amount']=$realAmount;
            $upsellData['timesShown']=$realTimesShown;
            $upsellData['conversionRate']=$realConversion;
        }

        if ($newConversionRate || $newAmountPurchased || $newTimesPurchased){

            $minTimesPurchased  = floatval(str_replace(',', '', number_format($newTimesPurchased[0],2)));
            $maxTimesPurchased  = floatval(str_replace(',', '', number_format($newTimesPurchased[1],2)));

            $minAmountPurchased = floatval(str_replace(',', '', number_format($newAmountPurchased[0],2)));
            $maxAmountPurchased = floatval(str_replace(',', '', number_format($newAmountPurchased[1],2)));

            $minConversionRate  = floatval(str_replace(',', '', number_format($newConversionRate[0],2)));
            $maxConversionRate  = floatval(str_replace(',', '', number_format($newConversionRate[1],2)));

            foreach ($data as $key => $value){

                $upsellTimesPurchased = floatval(str_replace(',', '', number_format($value['timesPurchased'],2)));
                $upsellsAmount = floatval(str_replace(',', '', number_format($value['amount'],2)));
                $upsellConversionRate = floatval(str_replace(',', '', number_format($value['conversionRate'],2)));

                if ($upsellTimesPurchased < $minTimesPurchased || $upsellTimesPurchased > $maxTimesPurchased) {
                    unset($data[$key]);
                    continue;
                }
                if ($upsellsAmount < $minAmountPurchased || $upsellsAmount > $maxAmountPurchased){
                    unset($data[$key]);
                    continue;
                }
                if ($upsellConversionRate < $minConversionRate || $upsellConversionRate > $maxConversionRate){
                    unset($data[$key]);
                    continue;
                }
            }
        }


        $data = array_values($data);

        echo json_encode($data);
        wp_die();
    }
}

if (!function_exists('format_search_values')) {
    function format_search_values($value)
    {
        $value_0 = $value[0] ? ($value[0] == '' ? 0 : $value[0]) : 0;
        $value_1 = $value[1] ? ($value[1] == '' ? 100000000000 : $value[1]) : 100000000000;
        return [$value_0, $value_1];
    }
}

if (!function_exists('ic_get_datatable_discounts_info')) {
    function ic_get_datatable_discounts_info()
    {

//        if (!wp_verify_nonce($_GET['nonce'], 'ic_get_datatable_discounts_info')) {
//            die ('Wrong nonce!');
//        }

        global $wpdb;
        $active = $inactive = $type = $product_ids = $prodCat = $searching = null;
        //$active_value = $inactive_value = null;
        $fixed = $percentage = $buyxy  = $free_shipping = null;
        $amount_purchased = $times_purchased = $conversion_rates = $times_entered = $newAmountPurchased = $newTimesPurchased = $newConversionRate = $newTimesEntered = null;

        $startDate = $_GET['start_date'];
        $endDate = $_GET['end_date'];

        $sql = $wpdb->prepare("SELECT * FROM {$wpdb->prefix}ic_discounts;");
        $discounts = $wpdb->get_results($sql);

        $filters = $_GET['filters'];
        if ($filters) {
            $page = $product_ids = $prodCat = [];

            foreach ($filters as $key => $value) {

                if ($key == 'active') {
                    $active = true;
                    //$active_value = array_keys($value)[0] == 'active' ? 1 : 0;
                    continue;
                }
                if ($key == 'inactive'){
                    $inactive = true;
                    //$inactive_value = 0;
                    continue;
                }

                if ($key == 'type') {
                    $type = true;
                    $fixed = key_exists('fixed', $value) ? 1 : null;
                    $percentage = key_exists('percentage', $value) ? 1 : null;
                    $buyxy = key_exists('buy-xy', $value) ? 1 : null;
                    $free_shipping = key_exists('free-shipping', $value) ? 1 : null;
                    continue;
                }

                if ($key == 'product') {
                    $product_ids = array_keys($value);
                    continue;
                }

                if ($key == 'product-cat') {
                    $prodCat = array_keys($value);
                    continue;
                }

                if ($key == 'search') {
                    $searching = true;
                    $times_entered = format_search_values([$value['te-min'], $value['te-max']]);
                    $conversion_rates = format_search_values([$value['cr-min'], $value['cr-max']]);
                    $times_purchased = format_search_values([$value['tp-min'], $value['tp-max']]);
                    $amount_purchased = format_search_values([$value['ap-min'], $value['ap-max']]);

                    $newTimesEntered = format_search_values([$value['te-min'], $value['te-max']]);
                    $newConversionRate = format_search_values([$value['cr-min'], $value['cr-max']]);
                    $newTimesPurchased = format_search_values([$value['tp-min'], $value['tp-max']]);
                    $newAmountPurchased = format_search_values([$value['ap-min'], $value['ap-max']]);

                }
            }
        }

        $data = array();

       // $sqlSelect = "SELECT d.discount_id, sum(dp.order_amount) as orders_amount, d.start_date as start_date, d.end_date as end_date, da.num_of_times as times_entered, sum(dp.discounted_amount) as discounted_amounts, count(distinct dp.order_id) as times_purchased";
        $sqlSelect = "SELECT d.discount_id, sum(dp.order_amount) as orders_amount, d.dates as json_dates, da.num_of_times as times_entered, sum(dp.discounted_amount) as discounted_amounts, count(distinct dp.order_id) as times_purchased";

        $sqlFromJoin = " FROM {$wpdb->prefix}ic_discounts as d
                        LEFT JOIN {$wpdb->prefix}ic_discounts_purchased as dp ON d.discount_id = dp.discount_id
                        LEFT JOIN {$wpdb->prefix}ic_discounts_applied as da ON d.discount_id = da.discount_id
                        ";
                        //WHERE (dp.created BETWEEN '{$startDate}' AND '{$endDate}')
                        //AND (da.date BETWEEN '{$startDate}' AND '{$endDate}')
        $sqlWhere = "";

//        if($active) {
//            $sqlWhere == "" ? $sqlWhere .= "WHERE " : $sqlWhere .= "AND ";
//            $sqlWhere .= " d.active = " . $active_value . " ";
//        }


        if ($active && $inactive){
            $sqlWhere == "" ? $sqlWhere .= "WHERE ( " : $sqlWhere .= "AND ";
            $sqlWhere .= " d.active = 1 OR d.active = 0 ) ";
        }
        else if($active){
            $sqlWhere == "" ? $sqlWhere .= "WHERE " : $sqlWhere .= "AND ";
            $sqlWhere .= " d.active = 1 ";
        }
        else if($inactive){
            $sqlWhere == "" ? $sqlWhere .= "WHERE " : $sqlWhere .= "AND ";
            $sqlWhere .= " d.active = 0 ";
        }

        if($type) {
            $sqlWhere == "" ? $sqlWhere .= " WHERE (" : $sqlWhere .= "AND ( ";
            $sqlType = "";
            if($fixed) {
                $sqlType != "" ? $sqlType .= " OR " : $sqlType .= "";
                $sqlType .= "d.type = 'disc-fixed' ";
            }
            if($percentage) {
                $sqlType != "" ? $sqlType .= " OR " : $sqlType .= "";
                $sqlType .= "d.type = 'disc-percentage' ";
            }
            if($buyxy) {
                $sqlType != "" ? $sqlType .= " OR " : $sqlType .= "";
                $sqlType .= "d.type = 'disc-buy-x' ";
            }
            if($free_shipping) {
                $sqlType != "" ? $sqlType .= " OR " : $sqlType .= "";
                $sqlType .= "d.type = 'disc-free-shipp' ";
            }
            $sqlWhere .= $sqlType . ") ";
        }

        if($product_ids) {
            $sqlFromJoin .= "JOIN {$wpdb->prefix}wc_order_product_lookup as opl ON dp.order_id = opl.order_id";
            $sqlWhere == "" ? $sqlWhere .= "WHERE " : $sqlWhere .= "AND ";
            $sqlWhere .= "opl.product_id IN (" . implode(',', $product_ids) . ") ";
        }

        if($prodCat) {
            $sqlFromJoin .= " JOIN {$wpdb->prefix}wc_order_product_lookup as pl ON dp.order_id = pl.order_id ";
            $sqlFromJoin .= " JOIN {$wpdb->prefix}term_relationships as re ON pl.product_id = re.object_id ";
            $sqlFromJoin .= " JOIN {$wpdb->prefix}term_taxonomy as tt ON re.term_taxonomy_id = tt.term_id ";
            $sqlFromJoin .= " JOIN {$wpdb->prefix}terms as te ON tt.term_id = te.term_id ";
            $sqlWhere == "" ? $sqlWhere .= "WHERE " : $sqlWhere .= "AND ";
            $sqlWhere .= " tt.taxonomy = 'product_cat' AND tt.term_id in (" . implode(',', $prodCat) . ") ";

        }

        if($searching) {

        }
        $sqlGroup = " GROUP BY d.discount_id;";
        $sql = $sqlSelect . $sqlFromJoin . $sqlWhere . $sqlGroup;
        //select discount_id, sum(order_amount) as orders_amount, count(*) as times_purchased from wp_ic_discounts_purchased group by discount_id;
//        $sql = $wpdb
//            ->prepare("SELECT discount_id, sum(order_amount) as orders_amount,
//                                sum(discounted_amount) as discounted_amounts, count(*) as times_purchased
//                                from {$wpdb->prefix}ic_discounts_purchased
//                                where created BETWEEN %s AND %s
//                                group by discount_id;", $start_date, $end_date);
        $discounts_purchased = $wpdb->get_results($sql);

        $discountsAppliedDict = [];
        $discountsPurchasedDict = array();


        foreach ($discounts_purchased as $discount) {

                $discountsPurchasedDict[$discount->discount_id] = [
                    'orders_amount' => number_format($discount->orders_amount, 2),
                    'discounted_amounts' => number_format($discount->discounted_amounts, 2),
                    'times_purchased' => $discount->times_purchased,
                    'times_entered'=>$discount->times_entered,
                    //  'start_date'=>$discount->start_date,
                    //  'end_date'=>$discount->end_date
                ];


            $discountsAppliedDict[$discount->discount_id] = $discount->numbers;
        }

        //select discount_id, sum(num_of_times) as numbers from wp_ic_discounts_applied where date betwee $sa
        //group by discount_id
//        $sql = $wpdb->prepare("SELECT discount_id, sum(num_of_times) as numbers
//                FROM {$wpdb->prefix}ic_discounts_applied
//                WHERE date BETWEEN %s AND %s
//                GROUP BY discount_id;", $start_date, $end_date);
//        $discounts_applied = $wpdb->get_results($sql);


        foreach ($discounts as $discount) {
            $has_discount = false;
            foreach ($discountsPurchasedDict as $id => $discount_purchase) {
                if($discount->discount_id == $id) {
                    $has_discount = true;
                }
            }
            if(!$has_discount) {
                continue;
            }
            $discountStartTime = json_decode($discount->dates,true);
            $startDateNew = $discountStartTime['start_date'];
            $startTimeNew = $discountStartTime['start_time'];
            $endDateNew = $discountStartTime['end_date'];
            $endTimeNew = $discountStartTime['end_time'];
            if ($endDateNew == '' && $endTimeNew == ''){
                $endDateTimeNew = '0000-00-00 00:00:00';
            }else{
                $endDateTimeNew = $endDateNew .' '.$endTimeNew.':00';
            }
            $startDateTimeNew = $startDateNew .' '. $startTimeNew.':00';

            $discount_data = [
                'discountId' => $discount->discount_id,
                'discountName' => $discount->title,
                'discountTrigger' => $discount->trigger,
                'discountType' => $discount->type,
                'discountValue' => $discount->start_date,
                'discountActive' => $discount->active,
                'start_date'=>$discount->start_date,
                'end_date'=>$discount->end_date,

                'new_start'=>$startDateTimeNew,
                'new_end'=>$endDateTimeNew,

            ];


           // $start_date = $discountsPurchasedDict[$discount->discount_id]['start_date'];
           // $end_date = $discountsPurchasedDict[$discount->discount_id]['end_date'];

            $timesEntered = $discountsPurchasedDict[$discount->discount_id]['times_entered'];
            $timesPurchased = $discountsPurchasedDict[$discount->discount_id]['times_purchased'];
            $amountPurchased = $discountsPurchasedDict[$discount->discount_id]['orders_amount'];
            $discountedAmount = $discountsPurchasedDict[$discount->discount_id]['discounted_amounts'];
            $conversionRate = $timesEntered == 0 ? 0 : number_format(($timesPurchased / $timesEntered) * 100, 2);

            $discount_meta_data = [
                'timesEntered' => $timesEntered ?? 0,
                'timesPurchased' => $timesPurchased ?? 0,
                'amountPurchased' => $amountPurchased ?? 0,
                'discountedAmount' => $discountedAmount ?? 0,
                'conversionRate' => $conversionRate ?? 0
            ];

//            if ($conversion_rates) {
//                if ($discount_meta_data['conversionRate'] < $conversion_rates[0] || $discount_meta_data['conversionRate'] > $conversion_rates[1]) {
//                    continue;
//                }
//                if ($discount_meta_data['timesPurchased'] < $times_purchased[0] || $discount_meta_data['timesPurchased'] > $times_purchased[1]) {
//                    continue;
//                }
//                if ($discount_meta_data['amountPurchased'] < $amount_purchased[0] || $discount_meta_data['amountPurchased'] > $amount_purchased[1]) {
//                    continue;
//                }
//                if ($discount_meta_data['timesEntered'] < $times_entered[0] || $discount_meta_data['timesEntered'] > $times_entered[1]) {
//                    continue;
//                }
//            }



            $discount_tmp_data = [
                'discountData' => $discount_data,
                'discountMetaData' => $discount_meta_data
            ];

            array_push($data, $discount_tmp_data);
        }


        foreach($data as &$discountData) {
            $existedInSelectedTimeFrame = ic_check_if_existed_in_time_frame($startDate, $endDate, $discountData['discountData']['new_start'], $discountData['discountData']['new_end']);

            if ($existedInSelectedTimeFrame == 1) {
                $timesEnteredForDis = 0;
                $timesPurchasedForDis = 0;
                $amountPurchasedForDis = 0;
                $discountedAmountForDis = 0;
                $conversionRateForDis = 0;

                $sql = $wpdb->prepare("SELECT * FROM {$wpdb->prefix}ic_discounts_applied WHERE discount_id = '" . $discountData['discountData']['discountId'] . "' and date between '" . $startDate . "' and '" . $endDate . "';");
                $discountsApplied = $wpdb->get_results($sql);
                $sql = $wpdb->prepare("SELECT * FROM {$wpdb->prefix}ic_discounts_purchased WHERE discount_id = '" . $discountData['discountData']['discountId'] . "' and created between '" . $startDate . "' and '" . $endDate . "';");
                $discountsPurchased = $wpdb->get_results($sql);

                if ($discountsApplied) {
                    foreach ($discountsApplied as $appliedDiscount) {
                        $timesEnteredForDis += $appliedDiscount->num_of_times;
                    }
                }
                if ($discountsPurchased) {
                    foreach ($discountsPurchased as $purchasedDiscount) {
                        $amountPurchasedForDis += $purchasedDiscount->order_amount;
                        $discountedAmountForDis += $purchasedDiscount->discounted_amount;
                        $timesPurchasedForDis += 1;
                    }
                }
            } else {
                $timesEnteredForDis = '-';
                $timesPurchasedForDis = '-';
                $amountPurchasedForDis = '-';
                $discountedAmountForDis = '-';
                $conversionRateForDis = '-';
            }

            $discountData['discountData']['realTimesEntered'] = $timesEnteredForDis;
            $discountData['discountData']['realTimesPurchased'] = $timesPurchasedForDis;
            $discountData['discountData']['realAmountPurchased'] = $amountPurchasedForDis;
            $discountData['discountData']['realDiscountedAmount'] = $discountedAmountForDis;
            if ($timesEnteredForDis != '-'){
                $conversionRateForDis = $timesEnteredForDis == 0 ? 0 : number_format(($timesPurchasedForDis / $timesEnteredForDis) * 100, 2);
            }
            $discountData['discountData']['realConversionRate'] = $conversionRateForDis;

        }

        if ( $newTimesEntered || $newConversionRate || $newTimesPurchased || $newAmountPurchased ){

            $minTimesEntered = floatval(str_replace(',', '', number_format($newTimesEntered[0],2)));
            $maxTimesEntered = floatval(str_replace(',', '', number_format($newTimesEntered[1],2)));

            $minConversionRate  = floatval(str_replace(',', '', number_format($newConversionRate[0],2)));
            $maxConversionRate  = floatval(str_replace(',', '', number_format($newConversionRate[1],2)));

            $minTimesPurchased  = floatval(str_replace(',', '', number_format($newTimesPurchased[0],2)));
            $maxTimesPurchased  = floatval(str_replace(',', '', number_format($newTimesPurchased[1],2)));

            $minAmountPurchased = floatval(str_replace(',', '', number_format($newAmountPurchased[0],2)));
            $maxAmountPurchased = floatval(str_replace(',', '', number_format($newAmountPurchased[1],2)));


            foreach ($data as $key => $value){
                $discountTimesEntered = floatval(str_replace(',', '', number_format($value['discountData']['realTimesEntered'],2)));
                $discountConversionRate = floatval(str_replace(',', '', number_format($value['discountData']['realConversionRate'],2)));
                $discountTimesPurchased = floatval(str_replace(',', '', number_format($value['discountData']['realTimesPurchased'],2)));
                $discountAmountPurchased = floatval(str_replace(',', '', number_format($value['discountData']['realAmountPurchased'],2)));

                if ($discountTimesEntered < $minTimesEntered || $discountTimesEntered > $maxTimesEntered){
                    unset($data[$key]);
                    continue;
                }

                if ($discountConversionRate < $minConversionRate || $discountConversionRate > $maxConversionRate){
                    unset($data[$key]);
                    continue;
                }

                if ($discountTimesPurchased < $minTimesPurchased || $discountTimesPurchased > $maxTimesPurchased){
                    unset($data[$key]);
                    continue;
                }

                if ($discountAmountPurchased < $minAmountPurchased || $discountAmountPurchased > $maxAmountPurchased){
                    unset($data[$key]);
                    continue;
                }
            }
        }

        $data = array_values($data);

        echo json_encode($data);
        wp_die();
    }
}

if (!function_exists('ic_check_if_existed_in_time_frame')) {
    function ic_check_if_existed_in_time_frame($start_date, $end_date,$start_date_of_discount,$end_date_of_discount_real)
    {

        $start_date = new DateTime($start_date);
        $end_date= new DateTime($end_date);
        $start_date_of_discount= new DateTime($start_date_of_discount);
        $end_date_of_discount= new DateTime($end_date_of_discount_real);
        if ($end_date_of_discount_real != '0000-00-00 00:00:00'){
            if ($start_date_of_discount > $end_date || $end_date_of_discount < $start_date){
                return 0;
            }else {
                return 1;
            }
        }else{
            if ($start_date_of_discount <= $end_date){
                return 1;
            }else{
                return 0;
            }
        }

    }
}

if (!function_exists('ic_get_discounts_main_analytics')) {
    function ic_get_discounts_main_analytics()
    {

//        if (!wp_verify_nonce($_GET['nonce'], 'ic_get_discounts_main_analytics')) {
//            die ('Wrong nonce!');
//        }

        //get start date and end date from get request
        $start_date = $_GET['startDate'];
        $end_date = $_GET['endDate'];
        $dataLive = ic_get_discounts_analytics_by_dates($start_date, $end_date);

        $previousDates = ic_get_previous_dates_to_str($start_date, $end_date);

        $previous_start_date = $previousDates['previous_start_date'];
        $previous_end_date = $previousDates['previous_end_date'];

        $dataPrevious = ic_get_discounts_analytics_by_dates($previous_start_date, $previous_end_date);

        $data = [
            'live' => $dataLive,
            'previous' => $dataPrevious
        ];

        echo json_encode($data);
        wp_die();
    }
}

if (!function_exists('ic_get_previous_dates_to_str')) {
    function ic_get_previous_dates_to_str($start_date, $end_date)
    {
        //count the difference of start date and end date
        $date1 = new DateTime($start_date);
        $date2 = new DateTime($end_date);
        $diff = $date2->diff($date1)->format("%a");

        //get the previous dates
        $previous_start_date = date('Y-m-d', strtotime($start_date . ' -' . $diff . ' days'));
        $previous_end_date = date('Y-m-d', strtotime($end_date . ' -' . $diff . ' days'));

        if ($diff  == 1){
            $previous_start_date = date('Y-m-d H:i:s', strtotime($start_date . ' -' . $diff . ' days'));
            $previous_end_date = date('Y-m-d H:i:s', strtotime($end_date . ' -' . $diff . ' days'));
        }

        return [
            'previous_start_date' => $previous_start_date,
            'previous_end_date' => $previous_end_date,
        ];
    }
}

if ( ! function_exists( 'ic_get_single_discount_main_analytics' ) ) {
    function ic_get_single_discount_main_analytics()
    {
        $start_date = $_GET['startDate'];
        $end_date = $_GET['endDate'];
        $discount_id = $_GET['discountId'];
        $dataLive = ic_get_single_discount_analytics_by_dates($start_date, $end_date, $discount_id);

        $previousDates = ic_get_previous_dates_to_str($start_date, $end_date);

        $previous_start_date = $previousDates['previous_start_date'];
        $previous_end_date = $previousDates['previous_end_date'];

        $dataPrevious = ic_get_single_discount_analytics_by_dates($previous_start_date, $previous_end_date, $discount_id);

        $data = [
            'live' => $dataLive,
            'previous' => $dataPrevious
        ];

        echo json_encode($data);
        wp_die();
    }
}

if ( ! function_exists( 'ic_get_single_discount_analytics_by_dates' ) ) {
    function ic_get_single_discount_analytics_by_dates($start_date, $end_date, $discount_id) {

        global $wpdb;
        $sql = $wpdb->prepare("SELECT sum(num_of_times) as times_entered 
                                    from {$wpdb->prefix}ic_discounts_applied 
                                    where discount_id = %d
                                    and date between %s and %s;", $discount_id, $start_date, $end_date);
        $times_entered = $wpdb->get_results($sql)[0]->times_entered ?? 0;

        $sql = $wpdb->prepare("SELECT  count(distinct order_id) as times_purchased,
                                    sum( order_amount) as orders_amount 
                                    from {$wpdb->prefix}ic_discounts_purchased 
                                    where discount_id = %d
                                    and created between %s and %s;",$discount_id, $start_date, $end_date );

        $result = $wpdb->get_results($sql)[0];
        $times_purchased = $result->times_purchased ?? 0;
        $orders_amount = $result->orders_amount ?? 0;

        $sql = $wpdb->prepare("SELECT sum(discounted_amount) as discounted_amount 
                                    from {$wpdb->prefix}ic_discounts_purchased 
                                    where discount_id = %d and created between %s and %s;", $discount_id, $start_date, $end_date);

        $discounted_amount = $wpdb->get_results($sql)[0]->discounted_amount ?? 0;

        $conversionRate = $times_entered == 0 ? 0 : ($times_purchased / $times_entered) * 100;

        return [
            'timesEntered' => $times_entered,
            'timesPurchased' => $times_purchased,
            'amountPurchased' => $orders_amount,
            'conversionRate' => $conversionRate,
            'amountDiscounted' => $discounted_amount
        ];
    }
}

if (!function_exists('ic_get_discounts_analytics_by_dates')) {
    function ic_get_discounts_analytics_by_dates($start_date, $end_date)
    {
        global $wpdb;
        //select sum(num_of_times) from wp_ic_discounts_applied where date between start_date and end_date;
        $sql = $wpdb->prepare("SELECT sum(num_of_times) as times_entered 
                                    from {$wpdb->prefix}ic_discounts_applied 
                                    where date between %s and %s;", $start_date, $end_date);
        $times_entered = $wpdb->get_results($sql)[0]->times_entered ?? 0;


        //select  count(distinct order_id) as times_purchased, sum(distinct order_amount)  from wp_ic_discounts_purchased;
        // where date between start_date and end_date;
        $sql = $wpdb->prepare("SELECT  count(order_id) as times_purchased,
                                    sum( order_amount) as orders_amount 
                                    from {$wpdb->prefix}ic_discounts_purchased 
                                    where created between %s and %s;", $start_date, $end_date);

        $result = $wpdb->get_results($sql)[0];
        $times_purchased = $result->times_purchased ?? 0;
        $orders_amount = $result->orders_amount ?? 0;
        //$orders_amount = number_format($orders_amount,1);

        //select sum(order_amount) from (select distinct order_id, order_amount from wp_ic_discounts_purchased) as a
        //where date between start_date and end_date;
        $sql = $wpdb->prepare("SELECT sum(discounted_amount) as discounted_amount 
                                    from {$wpdb->prefix}ic_discounts_purchased 
                                    where created between %s and %s;", $start_date, $end_date);

        $discounted_amount = $wpdb->get_results($sql)[0]->discounted_amount ?? 0;
        //$discounted_amount = number_format($discounted_amount,1);
        $conversionRate = $times_entered == 0 ? 0 : ($times_purchased / $times_entered) * 100;

        return [
            'timesEntered' => $times_entered,
            'timesPurchased' => $times_purchased,
            'amountPurchased' => $orders_amount,
            'conversionRate' => $conversionRate,
            'amountDiscounted' => $discounted_amount
        ];

    }
}

if(!function_exists('ic_get_us_products')) {
    function ic_get_us_products() {

//        if (!wp_verify_nonce($_GET['nonce'], 'ic_get_us_products')) {
//            die ('Wrong nonce!');
//        }

        $upsell_id = $_GET['upsell'];

        global $wpdb;
        $sql = $wpdb->prepare("SELECT * FROM {$wpdb->prefix}ic_us_options
                                     WHERE upsell_id = %s
                                     AND option_name = 'product';", $upsell_id);
        $products = $wpdb->get_results($sql);

        $sql = $wpdb->prepare("SELECT cart_page, before_ty_page, checkout_page
                                    FROM {$wpdb->prefix}ic_upsells
                                    WHERE ID = %s;", $upsell_id);
        $displayed = $wpdb->get_results($sql);

        $sql = $wpdb->prepare("SELECT * FROM {$wpdb->prefix}ic_us_options
                                    WHERE upsell_id = %s
                                    AND option_name = 'product_cat';", $upsell_id);
        $products_categories = $wpdb->get_results($sql);

        $final_products = array();

        foreach ($products as $product) {
            $wc_product = wc_get_product($product->option_value);
            $image = wp_get_attachment_image_src(get_post_thumbnail_id($product->option_value), 'single-post-thumbnail')[0];
            if (!$image){
                $wcNew = wc_get_product($product->option_value);
                $parentId = $wcNew->get_parent_id();
                $image = wp_get_attachment_image_src(get_post_thumbnail_id($parentId), 'single-post-thumbnail')[0];
            }

            $new_product = [
                'title' => $wc_product->get_name(),
                'image' => $image,
                'regular_price' => $wc_product->get_regular_price(),
                'sale_price' => $wc_product->get_sale_price(),
                'price' => $wc_product->get_price(),
                'cc_price' => $product->custom_compare_price,
                'c_price' => $product->custom_price
            ];
            array_push($final_products, $new_product);
        }

        foreach ($products_categories as $category) {
            $term = get_term_by('id', $category->option_value, 'product_cat', 'ARRAY_A');
            $products_fc = get_posts(array(
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

            foreach ($products_fc as $product_fc) {
                $wc_product = wc_get_product($product_fc->ID);
                $image = wp_get_attachment_image_src(get_post_thumbnail_id($product_fc->ID), 'single-post-thumbnail')[0];
                if (!$image){
                    $wcNew = wc_get_product($product_fc->ID);
                    $parentId = $wcNew->get_parent_id();
                    $image = wp_get_attachment_image_src(get_post_thumbnail_id($parentId), 'single-post-thumbnail')[0];
                }

                $new_product = [
                    'title' => $wc_product->get_name(),
                    'image' => $image,
                    'regular_price' => $wc_product->get_regular_price(),
                    'sale_price' => $wc_product->get_sale_price(),
                    'price' => $wc_product->get_price(),
                    'cc_price' => 0,
                    'c_price' => 0
                ];
                array_push($final_products, $new_product);
            }
        }


        $data = [
            'products' => $final_products,
            'displayed' => $displayed
        ];

        echo json_encode($data);
        wp_die();
    }
}