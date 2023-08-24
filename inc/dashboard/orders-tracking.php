<?php

if ( ! function_exists( 'ic_new_order' ) ) {
    function ic_new_order( $order_id )
    {

        global $wpdb;

        $table_name = $wpdb->prefix . 'ic_orders';
        $wpdb->insert( $table_name, array(
            'order_id' => $order_id
        ));

        $order = new WC_Order( $order_id );
        $billing_address = $order->get_billing_address_1() . ', ' . $order->get_billing_city() . ', ' . WC()->countries->countries[ $order->get_billing_country() ];

        $table_name = $wpdb->prefix . 'ic_address_coordinates';
        $wpdb->insert( $table_name, array(
            'address' => $billing_address,
            'order_id' => $order_id,
            'country' => strtolower( $order->get_billing_country() )
        ));
    }
}

if ( ! function_exists(  'ic_info_order_output' ) ) {
    function ic_info_order_output( $class, $heading, $number )
    {
        printf(
            '<div class="%1$s"><h5>%2$s<span>%3$s</span></h5></div>',
            esc_attr( $class ),
            esc_html( $heading ),
            esc_html( $number )
        );
    }
}

if ( ! function_exists( 'ic_order_info_track' ) ) {
    function ic_order_info_track()
    {

        global $wpdb;

        $sql = $wpdb->prepare("SELECT *
                                FROM {$wpdb->prefix}wc_order_stats
                                RIGHT JOIN {$wpdb->prefix}ic_orders
                                ON {$wpdb->prefix}wc_order_stats.order_id = {$wpdb->prefix}ic_orders.order_id
                                WHERE {$wpdb->prefix}wc_order_stats.status = 'wc-completed';
                            ");
        $ic_orders = $wpdb->get_results( $sql );

        $ic_total_revenue = 0;
        foreach ( $ic_orders as $ic_order ) {
            $ic_total_revenue += $ic_order->total_sales;
        }

        $ic_num_of_sales            = count( $ic_orders );

        $ic_average_order_value         = 0;
        if ( $ic_num_of_sales != 0 ) {
            $ic_average_order_value     = $ic_total_revenue / $ic_num_of_sales;
        }
        $ic_average_order_value         = number_format(
            $ic_average_order_value,
            2,
            '.',
            ','
        );

        $data = [
            'total_revenue'         => $ic_total_revenue,
            'num_of_sales'          => $ic_num_of_sales,
            'average_order_value'   => $ic_average_order_value
        ];

        return $data;
    }
}

if ( ! function_exists( 'ic_get_best_sellers' ) ) {
    function ic_get_best_sellers() {

        global $wpdb;
        $sql                = $wpdb->preapare("SELECT SUM(opl.product_qty) AS qty, SUM(opl.product_net_revenue) AS sum, opl.product_id  
                                FROM {$wpdb->prefix}wc_order_product_lookup AS opl
                                JOIN {$wpdb->prefix}wc_order_stats AS os ON opl.order_id = os.order_id AND os.status = 'wc-completed'
                                GROUP BY opl.product_id
                                ORDER BY sum DESC;
                            ");

        $ic_products        = $wpdb->get_results( $sql );

        return $ic_products;
    }
}