<?php

if (!function_exists('ic_template_redirect')) {
    function ic_template_redirect()
    {
        ic_add_new_user();
        ic_reached_checkout();
    }
}

if (!function_exists('ic_get_the_user_ip')) {
    function ic_get_the_user_ip()
    {
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        return $ip;
    }
}

if (!function_exists('ic_add_new_user')) {
    function ic_add_new_user()
    {

        global $wpdb;

        if (!is_admin()) {
            $table_name = $wpdb->prefix . 'ic_users';
            $ip = ic_get_the_user_ip();

            $sql = $wpdb->prepare("SELECT *
                                    FROM {$wpdb->prefix}ic_users
                                    WHERE `user_ip` = \"%s\"
                                    AND `created` > now() - interval 30 minute;
                                ", $ip);

            $ic_user = $wpdb->get_results($sql);
            if (empty($ic_user)) {
                $wpdb->insert($table_name, array(
                    'user_ip'      => $ip,
                    'url_location' => $_SERVER[ 'REQUEST_URI' ]
                ));
            } else if($ic_user[0]->url_location != $_SERVER[ 'REQUEST_URI' ]) {
                $data = [
                    'url_location' => $_SERVER[ 'REQUEST_URI' ],
                    'sessioned'    => true
                ];
                $where = [
                    'user_ip' => $ic_user[0]->user_ip,
                    'created' => $ic_user[0]->created
                ];
                $wpdb->update($table_name, $data, $where);
            }
        }
    }
}

if (!function_exists('ic_add_to_cart_user_info')) {
    function ic_add_to_cart_user_info()
    {

        global $wpdb;

        $table_name = $wpdb->prefix . 'ic_users';
        $ip = ic_get_the_user_ip();

        $sql = $wpdb->prepare("SELECT *
                                    FROM {$wpdb->prefix}ic_users
                                    WHERE `user_ip` = \"%s\"
                                    AND `created` > now() - interval 30 minute;
                                ", $ip);

        $ic_user = $wpdb->get_results($sql);
        $ic_user_added_cart = $ic_user[0]->num_added_to_cart;
        $ic_user_added_cart++;

        $data = ['num_added_to_cart' => $ic_user_added_cart];
        $where = [
            'user_ip' => $ic_user[0]->user_ip,
            'created' => $ic_user[0]->created
        ];
        $wpdb->update($table_name, $data, $where);
    }
}

if (!function_exists('ic_reached_checkout')) {
    function ic_reached_checkout()
    {
        if (is_checkout()) {

            global $wpdb;

            $table_name = $wpdb->prefix . 'ic_users';
            $ip = ic_get_the_user_ip();

            $sql = $wpdb->prepare("SELECT *
                                    FROM {$wpdb->prefix}ic_users
                                    WHERE `user_ip` = \"%s\"
                                    AND `created` > now() - interval 30 minute;
                                ", $ip);

            $ic_user = $wpdb->get_results($sql);
            $ic_user_reached_checkout = $ic_user[0]->reached_checkout + 1;
            $data = ['reached_checkout' => $ic_user_reached_checkout];
            $where = [
                'user_ip' => $ic_user[0]->user_ip,
                'created' => $ic_user[0]->created
            ];
            $wpdb->update($table_name, $data, $where);
        }
    }
}


if ( ! function_exists( 'ic_user_info_track' ) ) {
    function ic_user_info_track()
    {

        global $wpdb;

        $table_name = $wpdb->prefix . 'ic_users';
        $sql = $wpdb->prepare("SELECT *
                                FROM {$wpdb->prefix}ic_users
                                ");

        $ic_users = $wpdb->get_results( $sql );
        $num_of_users = count( $ic_users );

        $sql = $wpdb->prepare("SELECT *
                                FROM {$wpdb->prefix}wc_order_stats
                                RIGHT JOIN {$wpdb->prefix}ic_orders
                                ON {$wpdb->prefix}wc_order_stats.order_id = {$wpdb->prefix}ic_orders.order_id
                                WHERE {$wpdb->prefix}wc_order_stats.status = 'wc-completed';
                            ");
        $ic_orders = $wpdb->get_results( $sql );
        $num_of_orders = count( $ic_orders );

        $conversion_rate = ( $num_of_orders / $num_of_users ) * 100;
        $ic_conversion_rate = number_format(
            $conversion_rate,
            2,
            '.',
            ','
        );

        $ic_users_num_added_to_cart = ic_users_num_added_to_cart( $ic_users );

        $ic_users_clicked_add_to_cart = ic_users_clicked_add_to_cart( $ic_users );
        $add_to_cart_conversion_rate = ( $ic_users_clicked_add_to_cart / $num_of_users ) * 100;
        $ic_add_to_cart_conversion_rate = number_format(
            $add_to_cart_conversion_rate,
            2,
            '.',
            ','
        );

        $ic_users_reached_checkout = ic_users_reached_checkout( $ic_users );

        $reached_checkout_conversion_rate = ( $ic_users_reached_checkout / $num_of_users ) * 100;
        $ic_reached_checkout_conversion_rate = number_format(
            $reached_checkout_conversion_rate,
            2,
            '.',
            ','
        );

        $data = [
            'conversion_rate'                   => $ic_conversion_rate,
            'num_added_to_cart'                 => $ic_users_num_added_to_cart,
            'add_to_cart_conversion_rate'       => $ic_add_to_cart_conversion_rate,
            'checkout_initiated'                => $ic_users_reached_checkout,
            'reached_checkout_conversion_rate'  => $ic_reached_checkout_conversion_rate
        ];

        return $data;
    }
}

if ( ! function_exists( 'ic_get_number_of_visitors' ) ) {
    function ic_get_number_of_visitors() {
        global $wpdb;
        $table_name = $wpdb->prefix . 'ic_users';
        $sql = $wpdb->prepare("SELECT *
                FROM {$wpdb->prefix}ic_users;");
        $users = $wpdb->get_results( $sql );
        $num_of_visitors = count( $users );
        return $num_of_visitors ;
    }
}