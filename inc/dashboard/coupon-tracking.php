<?php

if ( ! function_exists( 'ic_coupon_info_track' ) ) {
    function ic_coupon_info_track() {
        global $wpdb;
        $sql                = "SELECT p.post_title, COUNT(ocl.order_id) AS num, pm1.meta_value AS discount_type, pm2.meta_value AS coupon_amount, SUM(ocl.discount_amount) AS total
                                FROM {$wpdb->prefix}wc_order_coupon_lookup AS ocl
                                JOIN {$wpdb->prefix}posts AS p ON ocl.coupon_id = p.ID
                                JOIN {$wpdb->prefix}postmeta AS pm1 ON ocl.coupon_id = pm1.post_id AND pm1.meta_key = 'discount_type'
                                JOIN {$wpdb->prefix}postmeta AS pm2 ON ocl.coupon_id = pm2.post_id AND pm2.meta_key = 'coupon_amount'
                                JOIN {$wpdb->prefix}wc_order_stats AS os ON ocl.order_id = os.order_id AND os.status = 'wc-completed'
                                GROUP BY ocl.coupon_id;";

        $ic_coupons = $wpdb->get_results($sql);

        return $ic_coupons;
    }
}