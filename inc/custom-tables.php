<?php

global $wpdb;
$ic_orders_db_version   = '1.0.0';
$charset_collate        = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci';


$table_name = $wpdb->prefix . 'ic_users';
if ( $wpdb->get_var( "SHOW TABLES LIKE '{$table_name}'" ) != $table_name ) {

    $sql = "CREATE TABLE $table_name (
            ID mediumint(9) NOT NULL AUTO_INCREMENT,
            `user_ip` varchar(15) NOT NULL,
            `num_added_to_cart` int NOT NULL DEFAULT 0,
            `reached_checkout` int NOT NULL DEFAULT 0,
            `sessioned` boolean NOT NULL DEFAULT false,
            `url_location` varchar(512) NOT NULL,
            `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
            PRIMARY KEY (ID)
        ) $charset_collate;";

    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    $wpdb->query( $sql );
}

$table_name = $wpdb->prefix . 'ic_upsells';
if ( $wpdb->get_var( "SHOW TABLES LIKE '{$table_name}'" ) != $table_name ) {

    $sql = "CREATE TABLE $table_name (
            ID mediumint(9) NOT NULL AUTO_INCREMENT,
            `title` varchar(128) NOT NULL,
            `active` boolean NOT NULL DEFAULT false,
            `checkout_page` boolean NOT NULL DEFAULT true,
            `cart_page` boolean NOT NULL DEFAULT true,
            `before_ty_page` boolean NOT NULL DEFAULT true,
            `priority` mediumint(1) NOT NULL DEFAULT 0,
            `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
            PRIMARY KEY (ID)
        ) $charset_collate;";

    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    $wpdb->query( $sql );
}

$table_name = $wpdb->prefix . 'ic_us_options';
if ( $wpdb->get_var( "SHOW TABLES LIKE '{$table_name}'" ) != $table_name ) {

    $sql = "CREATE TABLE $table_name (
            us_option_id mediumint(9) NOT NULL AUTO_INCREMENT,
            `upsell_id` mediumint(9) NOT NULL,
            `option_name` varchar(12) NOT NULL,
            `option_value` mediumint(9) NOT NULL,
            `option_amount` float NOT NULL DEFAULT 0,
            `custom_compare_price` float DEFAULT NULL,
            `custom_price` float DEFAULT NULL,
            `default_quantity` int DEFAULT NULL,
            `discount` float DEFAULT NULL,
            PRIMARY KEY (us_option_id)
        ) $charset_collate;";

    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    $wpdb->query( $sql );
}

$table_name = $wpdb->prefix . 'ic_us_shown';
if ( $wpdb->get_var( "SHOW TABLES LIKE '{$table_name}'" ) != $table_name ) {

    $sql = "CREATE TABLE $table_name (
            `upsell_id` mediumint(9) NOT NULL,
            `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
        ) $charset_collate;";

    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    $wpdb->query( $sql );
}

$table_name = $wpdb->prefix . 'ic_us_purchased';
if ( $wpdb->get_var( "SHOW TABLES LIKE '{$table_name}'" ) != $table_name ) {

    $sql = "CREATE TABLE $table_name (
            `upsell_id` mediumint(9) NOT NULL,
            `order_id` mediumint(9) NOT NULL,
            `product_id` mediumint(9) NOT NULL,
            `product_amount` float NOT NULL,
            `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
        ) $charset_collate;";

    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    $wpdb->query( $sql );
}

$table_name = $wpdb->prefix . 'ic_address_coordinates';
if ( $wpdb->get_var( "SHOW TABLES LIKE '{$table_name}'" ) != $table_name ) {

    $charset_collate = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE $table_name (
            `address` varchar(100) NOT NULL,
            `lat` float DEFAULT NULL,
            `lng` float DEFAULT NULL,
            `order_id` int NOT NULL,
            `country` varchar(2) DEFAULT NULL,
            `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
        ) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci $charset_collate;";

    $wpdb->query( $sql );
}

$table_name = $wpdb->prefix . 'ic_discounts';
if ( $wpdb->get_var( "SHOW TABLES LIKE '{$table_name}'" ) != $table_name ) {

    $sql = "CREATE TABLE $table_name (
            `discount_id` mediumint(9) NOT NULL AUTO_INCREMENT,
            `trigger` varchar(32) NOT NULL,
            `title` varchar(128) NOT NULL,
            `code` varchar(32) NOT NULL,
            `type` varchar(32) NOT NULL,
            `start_date` date NOT NULL,
            `end_date` date NOT NULL,
            `active` boolean NOT NULL DEFAULT false,
            `maximum_discount_usage_checked` boolean NOT NULL DEFAULT false, 
            `maximum_discount_usage` int ,
            `end_dates_checked` boolean NOT NULL DEFAULT false,
            `dates` longtext,
            `discount_value` float,
            `minimum_quantity_reached_checked` boolean NOT NULL DEFAULT false,
            `minimum_quantity_reached` float,
            `minimum_amount_reached_checked` boolean NOT NULL DEFAULT false,
            `minimum_amount_reached` float,
            `exclude_shipping_checked` boolean NOT NULL DEFAULT false,
            `exclude_shipping` float,
            `individual_use` boolean default false,
            `exclude_sale_items_checked` boolean NOT NULL DEFAULT false,
            `exclude_sale_items` longtext,
            `exclude_sale_category_items` longtext,
            `entire_order` boolean default false,
            `specific_products_checked` boolean NOT NULL DEFAULT false,
            `specific_products` longtext,
            `specific_categories` longtext,
            `buy_x_get_y` longtext,
            PRIMARY KEY (discount_id)
           ) $charset_collate;";
    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
}

$table_name = $wpdb->prefix . 'ic_discounts_purchased';
if ( $wpdb->get_var( "SHOW TABLES LIKE '{$table_name}'" ) != $table_name ) {

    $sql = "CREATE TABLE $table_name (
            `discount_id` mediumint(9) NOT NULL,
            `order_amount` float ,
            `discounted_amount` float ,
            `order_id` mediumint(9) ,
            `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
        ) $charset_collate;";

    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    $wpdb->query( $sql );
}

$table_name = $wpdb->prefix . 'ic_discounts_applied';
if ( $wpdb->get_var( "SHOW TABLES LIKE '{$table_name}'" ) != $table_name ) {

    $sql = "CREATE TABLE $table_name (
            `discount_id` mediumint(9) NOT NULL,
            `ip` varchar(32) NOT NULL,
            `num_of_times` int NOT NULL,
            `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
        ) $charset_collate;";

    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    $wpdb->query( $sql );
}

$table_name = $wpdb->prefix . 'ic_abandoned_carts';
if ( $wpdb->get_var( "SHOW TABLES LIKE '{$table_name}'" ) != $table_name ) {

    $sql = "CREATE TABLE $table_name (
        `id` mediumint(9) NOT NULL AUTO_INCREMENT,
        `user_id` int(11),
        `cart_content` TEXT,
        `cart_expiry` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        PRIMARY KEY (id)
    ) $charset_collate;";

    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    $wpdb->query( $sql );
}