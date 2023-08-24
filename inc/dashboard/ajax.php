<?php

if ( ! function_exists( 'ic_list_of_time' ) ) {
    function ic_list_of_time( $startDate, $endDate ) {
        $oneDayIndicator = 0;
        $startDate = new DateTime($startDate);
        $endDate = new DateTime($endDate);
        $times = [];
        $dayDiffs = $endDate->diff($startDate)->days;
        if ($dayDiffs > 1) {
            while ($dayDiffs >= 0) {
                $times += [$startDate->format('Y-m-d') => 0];
                $startDate->add(new DateInterval('P1D'));
                $dayDiffs--;
            }
        } else {
            $oneDayIndicator = 1;
            $hourDiffs = 24;

            while ($hourDiffs >= 0) {
                $times += [$startDate->format('Y-m-d H') => 0];
                $startDate->add(new DateInterval('PT1H'));
                $hourDiffs--;
            }
        }
        return [$times, $oneDayIndicator];
    }
}

if ( ! function_exists( 'ic_format_month' ) ) {
    function ic_format_month( $month ) {
        switch( $month ) {
            case '01': return 'Jan';
            case '02': return 'Feb';
            case '03': return 'Mar';
            case '04': return 'Apr';
            case '05': return 'May';
            case '06': return 'Jun';
            case '07': return 'Jul';
            case '08': return 'Avg';
            case '09': return 'Sep';
            case '10': return 'Oct';
            case '11': return 'Nov';
            case '12': return 'Dec';
        }
        return null;
    }
}

if ( ! function_exists( 'ic_get_months_from_dates' ) ) {
    function ic_get_months_from_dates($dates) {
        $months = [];
        foreach ( $dates as $kd => $kv ) {
            $month = substr($kd, 0, 7);
            if( !array_key_exists( $month, $months ) ) {
                $months += [$month => 0];
            }
        }
        return $months;
    }
}

if ( ! function_exists( 'ic_get_orders_visitors_chart_info' ) ) {
    function ic_get_orders_visitors_chart_info( array $array, $orders, $visitors, $refunds, $champions ) {
        [ $times_revenue, $oneDayIndic ] = ic_list_of_time( $array[0], $array[1] );
        $times_num_orders = $times_revenue;
        $times_visitors = $times_revenue;
        $times_conversion_rate = $times_revenue;
        $times_new_customers = $times_revenue;
        $times_returning_customers = $times_revenue;

        $added_to_cart = 0;
        $countries = [];
        $products_sold = 0;
        $num_of_sessioned = 0;
        $num_checkout_initiated = 0;
        $refunds_revenue = 0;

        foreach ( $refunds as $refund ) {
            $refunds_revenue += $refund->refund_amount;
        }

        if ( $oneDayIndic == 0 ) {
            foreach ( $orders as $order ) {
                $time = strtotime( $order->date_created );
                $formated_date = date( 'Y-m-d', $time );

                $times_revenue[ $formated_date ] += $order->net_total;
                $times_num_orders[ $formated_date ]++;

                $countries[ $order->country ] += $order->net_total;

                $products_sold += $order->num_items_sold;

                if ( $order->returning_customer == 0 ) {
                    $times_new_customers[ $formated_date ]++;
                } else {
                    $times_returning_customers[ $formated_date ]++;
                }
            }

            foreach ( $visitors as $visitor ) {
                $time = strtotime( $visitor->created );
                $formated_date = date( 'Y-m-d', $time );

                $times_visitors[ $formated_date ]++;
                $num_of_sessioned += $visitor->sessioned;
                $num_checkout_initiated += $visitor->reached_checkout;

                if ( $visitor->num_added_to_cart > 0 ) {
                    $added_to_cart++;
                }
            }

        } else {
            foreach ( $orders as $order ) {
                $time = strtotime( $order->date_created );
                $formated_date = date( 'Y-m-d H', $time );

                $times_revenue[ $formated_date ] += $order->net_total;
                $times_num_orders[ $formated_date ]++;

                $countries[ $order->country ] += $order->net_total;

                $products_sold += $order->num_items_sold;

                if ( $order->returning_customer == 0 ) {
                    $times_new_customers[ $formated_date ]++;
                } else {
                    $times_returning_customers[ $formated_date ]++;
                }
            }

            foreach ( $visitors as $visitor ) {
                $time = strtotime( $visitor->created );
                $formated_date = date( 'Y-m-d H', $time );

                $times_visitors[ $formated_date ]++;
                $num_of_sessioned += $visitor->sessioned;
                $num_checkout_initiated += $visitor->reached_checkout;

                if ( $visitor->num_added_to_cart > 0 ) {
                    $added_to_cart++;
                }
            }

        }

        $revenue = 0;
        $num_of_orders = 0;
        $num_of_visitors = 0;
        $conversion_rate = 0;

        foreach ( $times_num_orders as $key => $row ) {
            $num_of_orders += $row;
            $num_of_visitors += $times_visitors[ $key ];
            $revenue += $times_revenue[ $key ];

            if ( $num_of_visitors == 0 ) {
                $conversion_rate = 0.00;
                $times_conversion_rate[ $key ] = $conversion_rate;
            } else {
                $conversion_rate = number_format( ( $num_of_orders / $num_of_visitors ) * 100, 2 );
                $times_conversion_rate[ $key ] = $conversion_rate;
            }
        }

        if ( $num_of_orders == 0 ) {
            $avg = 0.00;
        } else {
            $avg = number_format( $revenue / $num_of_orders, 2 );
        }

        if ( $num_of_visitors == 0 ) {
            $atc = 0.00;
        } else {
            $atc = number_format( ( $added_to_cart / $num_of_visitors ) * 100, 2 );
        }

        if ( $num_checkout_initiated == 0 ) {
            $ci = 0.00;
        } else {
            $ci = number_format( ( $num_of_orders / $num_checkout_initiated ) * 100, 2 );
        }

        if ( $num_of_sessioned == 0 ) {
            $bounceRate = 100;
        } else {
            $bounceRate = number_format( 100 - ( $num_of_sessioned / $num_of_visitors ) * 100, 0);
        }

        $num_of_new_customers = 0;
        $num_of_returning_customers = 0;

        foreach ( $champions as $champion ) {
            if ( $champion->returning == 0 ) {
                $num_of_new_customers++;
            } else {
                $num_of_returning_customers++;
            }
        }

        $months_revenue = ic_get_months_from_dates($times_revenue);
        $months_num_orders = $months_revenue;
        $months_visitors = $months_revenue;
        $months_conversion_rate = $months_revenue;
        $months_new_customers = $months_revenue;
        $months_returning_customers = $months_revenue;
        foreach ( $orders as $order ) {
            $time = strtotime($order->date_created);
            $formated_date = date('Y-m', $time);

            $months_revenue[$formated_date] += $order->net_total;
            $months_num_orders[$formated_date]++;

            if ( $order->returning_customer == 0 ) {
                $months_new_customers[ $formated_date ]++;
            } else {
                $months_returning_customers[ $formated_date ]++;
            }
        }

        foreach ( $visitors as $visitor ) {
            $time = strtotime( $visitor->created );
            $formated_date = date( 'Y-m', $time );

            $months_visitors[ $formated_date ]++;
        }

        $local_conversion_rate = 0;
        $months_num_of_orders = 0;
        $months_num_of_visitors = 0;
        $months_local_revenue = 0;

        foreach ( $months_num_orders as $key => $row ) {
            $months_num_of_orders += $row;
            $months_num_of_visitors += $months_visitors[ $key ];
            $months_local_revenue += $months_revenue[ $key ];

            if ( $months_num_of_visitors == 0 ) {
                $local_conversion_rate = 0.00;
                $months_conversion_rate[ $key ] = $local_conversion_rate;
            } else {
                $local_conversion_rate = number_format( ( $months_num_of_orders / $months_num_of_visitors ) * 100, 2 );
                $months_conversion_rate[ $key ] = $local_conversion_rate;
            }
        }

        $num_of_days = count($times_revenue);
        $months_representation = 0;
        if( $num_of_days >= 90 ) {
            $times_revenue = $months_revenue;
            $times_num_orders = $months_num_orders;
            $times_conversion_rate = $months_conversion_rate;
            $times_visitors = $months_visitors;
            $times_new_customers = $months_new_customers;
            $times_returning_customers = $months_returning_customers;
            $months_representation = 1;
        }

        return [
            'oneDayIndicator'               => $oneDayIndic,
            'timesRevenue'                  => $times_revenue,
            'timesNumOfOrders'              => $times_num_orders,
            'timesConversionRate'           => $times_conversion_rate,
            'timesVisitors'                 => $times_visitors,
            'titleAvg'                      => $avg,
            'titleRevenue'                  => $revenue,
            'titleNumOfOrders'              => $num_of_orders,
            'titleAtcPercent'               => $atc,
            'titleProductsSold'             => $products_sold,
            'countries'                     => $countries,
            'titleSessioned'                => $num_of_sessioned,
            'titleBounceRate'               => $bounceRate,
            'titleAtc'                      => $added_to_cart,
            'titleRefunds'                  => $refunds_revenue,
            'titleConversionRate'           => $conversion_rate,
            'titleNumOfVisitors'            => $num_of_visitors,
            'timesNewCustomers'             => $times_new_customers,
            'timesReturningCustomers'       => $times_returning_customers,
            'titleNumOfNewCustomers'        => $num_of_new_customers,
            'titleNumOfReturningCustomers'  => $num_of_returning_customers,
            'titleNumCheckoutInitiated'     => $num_checkout_initiated,
            'titleCheckoutInitiatedCR'      => $ci,
            'monthsRepresentation'          => $months_representation
        ];
    }
}

if ( ! function_exists('ic_ajax_dashboard_info') ) {
    function ic_ajax_dashboard_info() {

//        if ( ! wp_verify_nonce( $_GET[ 'nonce' ], 'ic_dashboard_info' ) ) {
//            die ( 'Wrong nonce!' );
//        }

        global $wpdb;

        $startDate = $_GET[ 'startDate' ];
        $endDate = $_GET[ 'endDate' ];

        $diffDays = abs( round( ( strtotime( $endDate ) - strtotime( $startDate ) ) / 86400 ) ) + 1;

        $beforeStartDate = date( 'Y-m-d H:i:s', strtotime( $startDate . ' - ' . $diffDays . ' days' ) );
        $beforeEndDate = date( 'Y-m-d H:i:s', strtotime( $endDate . ' - ' . $diffDays . ' days' ) );

        $sql                = $wpdb->prepare("SELECT order_id, date_created, num_items_sold, net_total, customer_id, returning_customer, p1.meta_value first_name, p2.meta_value last_name, p3.meta_value country
                                FROM {$wpdb->prefix}wc_order_stats
                                LEFT JOIN {$wpdb->prefix}postmeta p1
                                ON {$wpdb->prefix}wc_order_stats.order_id = p1.post_id and p1.meta_key = '_billing_first_name'
                                LEFT JOIN {$wpdb->prefix}postmeta p2
                                ON {$wpdb->prefix}wc_order_stats.order_id = p2.post_id and p2.meta_key = '_billing_last_name'
                                LEFT JOIN {$wpdb->prefix}postmeta p3
                                ON {$wpdb->prefix}wc_order_stats.order_id = p3.post_id and p3.meta_key = '_billing_country'
                                WHERE `date_created` BETWEEN %s AND %s
                                AND parent_id = 0
                                ORDER BY `date_created` ASC;
                            ", $startDate, $endDate);
        $ic_orders = $wpdb->get_results($sql);
        $sql                = $wpdb->prepare("SELECT *
                                FROM {$wpdb->prefix}ic_users
                                WHERE `created` BETWEEN %s AND %s
                                ORDER BY `created` ASC
                                ", $startDate, $endDate);
        $ic_visitors = $wpdb->get_results($sql);

        $sql = $wpdb->prepare("SELECT p.ID as refund_id, p.post_date as date_created, p.post_parent as order_id, pm1.meta_value as currency, pm2.meta_value as refund_amount
                FROM {$wpdb->prefix}posts as p
                JOIN {$wpdb->prefix}postmeta AS pm1 on p.ID = pm1.post_id AND pm1.meta_key = '_order_currency'
                JOIN {$wpdb->prefix}postmeta AS pm2 on p.ID = pm2.post_id AND pm2.meta_key = '_refund_amount'
                WHERE `post_date` BETWEEN %s AND %s
                ORDER BY `post_date` ASC;", $startDate, $endDate);
        $ic_refunds = $wpdb->get_results($sql);

        $sql                = $wpdb->prepare("SELECT p1.meta_value first_name, p2.meta_value last_name, sum(net_total) as net_total, customer_id, sum(returning_customer) as returning, count(*) as num
                                FROM {$wpdb->prefix}wc_order_stats
                                LEFT JOIN {$wpdb->prefix}postmeta p1
                                ON {$wpdb->prefix}wc_order_stats.order_id = p1.post_id and p1.meta_key = '_billing_first_name'
                                LEFT JOIN {$wpdb->prefix}postmeta p2
                                ON {$wpdb->prefix}wc_order_stats.order_id = p2.post_id and p2.meta_key = '_billing_last_name'
                                WHERE `date_created` BETWEEN %s AND %s
                                GROUP BY customer_id
                                ORDER BY `net_total` DESC;", $startDate, $endDate);
        $ic_champions = $wpdb->get_results($sql);

        $sql                = $wpdb->prepare("SELECT order_id, date_created, num_items_sold, net_total, customer_id, returning_customer, p1.meta_value first_name, p2.meta_value last_name, p3.meta_value country
                                FROM {$wpdb->prefix}wc_order_stats
                                LEFT JOIN {$wpdb->prefix}postmeta p1
                                ON {$wpdb->prefix}wc_order_stats.order_id = p1.post_id and p1.meta_key = '_billing_first_name'
                                LEFT JOIN {$wpdb->prefix}postmeta p2
                                ON {$wpdb->prefix}wc_order_stats.order_id = p2.post_id and p2.meta_key = '_billing_last_name'
                                LEFT JOIN {$wpdb->prefix}postmeta p3
                                ON {$wpdb->prefix}wc_order_stats.order_id = p3.post_id and p3.meta_key = '_billing_country'
                                WHERE `date_created` BETWEEN %s AND %s
                                AND parent_id = 0
                                ORDER BY `date_created` ASC;
                            ", $beforeStartDate, $beforeEndDate);
        $ic_orders_before = $wpdb->get_results($sql);
        $sql                = $wpdb->prepare("SELECT *
                                FROM {$wpdb->prefix}ic_users
                                WHERE `created` BETWEEN %s AND %s
                                ORDER BY `created` ASC
                                ", $beforeStartDate, $beforeEndDate);
        $ic_visitors_before = $wpdb->get_results($sql);

        $sql = $wpdb->prepare("SELECT p.ID as refund_id, p.post_date as date_created, p.post_parent as order_id, pm1.meta_value as currency, pm2.meta_value as refund_amount
                FROM {$wpdb->prefix}posts as p
                JOIN {$wpdb->prefix}postmeta AS pm1 on p.ID = pm1.post_id AND pm1.meta_key = '_order_currency'
                JOIN {$wpdb->prefix}postmeta AS pm2 on p.ID = pm2.post_id AND pm2.meta_key = '_refund_amount'
                WHERE `post_date` BETWEEN %s AND %s
                ORDER BY `post_date` ASC;", $beforeStartDate, $beforeEndDate);
        $ic_refunds_before = $wpdb->get_results($sql);

        $sql                = $wpdb->prepare("SELECT p1.meta_value first_name, p2.meta_value last_name, sum(net_total) as net_total, customer_id, sum(returning_customer) as returning, count(*) as num
                                FROM {$wpdb->prefix}wc_order_stats
                                LEFT JOIN {$wpdb->prefix}postmeta p1
                                ON {$wpdb->prefix}wc_order_stats.order_id = p1.post_id and p1.meta_key = '_billing_first_name'
                                LEFT JOIN {$wpdb->prefix}postmeta p2
                                ON {$wpdb->prefix}wc_order_stats.order_id = p2.post_id and p2.meta_key = '_billing_last_name'
                                WHERE `date_created` BETWEEN %s AND %s
                                GROUP BY customer_id
                                ORDER BY `net_total` DESC;", $beforeStartDate, $beforeEndDate);
        $ic_champions_before = $wpdb->get_results($sql);



        $orders_visitors_chart_info = ic_get_orders_visitors_chart_info( [ $startDate, $endDate ], $ic_orders, $ic_visitors, $ic_refunds, $ic_champions );
        $orders_visitors_chart_info_before = ic_get_orders_visitors_chart_info( [ $beforeStartDate, $beforeEndDate ], $ic_orders_before, $ic_visitors_before, $ic_refunds_before, $ic_champions_before );

        $sql                = $wpdb->prepare("SELECT opl.product_id, opl.date_created, sum(opl.product_qty) as product_qty, format(sum(opl.product_net_revenue), 'N2') as product_net_revenue, p.guid, p2.post_title
                                FROM {$wpdb->prefix}wc_order_product_lookup AS opl
                                LEFT JOIN {$wpdb->prefix}postmeta AS pm ON pm.meta_key = '_thumbnail_id' AND pm.post_id = opl.product_id
                                LEFT JOIN {$wpdb->prefix}posts AS p ON pm.meta_value = p.ID
                                JOIN {$wpdb->prefix}posts AS p2 ON opl.product_id = p2.ID
                                AND `date_created` BETWEEN %s AND %s
                                GROUP BY opl.product_id
                                ORDER BY product_net_revenue DESC;", $startDate, $endDate);

        $ic_bestsellers = $wpdb->get_results($sql);

        $data = [
            'chartsInfo'        => $orders_visitors_chart_info,
            'champions'         => $ic_champions,
            'bestSellers'       => $ic_bestsellers,
            'chartsInfoBefore'  => $orders_visitors_chart_info_before
        ];
        echo json_encode($data);

        //echo json_encode( $orders_visitors_chart_info );

//        $sql                = $wpdb->prepare("SELECT p.post_title, ocl.coupon_id, ocl.date_created, pm1.meta_value AS discount_type, pm2.meta_value AS coupon_amount, ocl.discount_amount
//                                FROM {$wpdb->prefix}wc_order_coupon_lookup AS ocl
//                                JOIN {$wpdb->prefix}posts AS p ON ocl.coupon_id = p.ID
//                                JOIN {$wpdb->prefix}postmeta AS pm1 ON ocl.coupon_id = pm1.post_id AND pm1.meta_key = 'discount_type'
//                                JOIN {$wpdb->prefix}postmeta AS pm2 ON ocl.coupon_id = pm2.post_id AND pm2.meta_key = 'coupon_amount'
//                                ORDER BY ocl.date_created;");
//
//        $ic_coupons = $wpdb->get_results($sql);

        //echo json_encode($data);
        wp_die();
    }
}