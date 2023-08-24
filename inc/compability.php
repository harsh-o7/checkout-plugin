<?php

if ( ! function_exists( 'ic_admin_notices') ) {
    function ic_admin_notices() {
        ic_is_minimum_php_version();
        ic_is_minimum_wordpress_version();
        ic_is_woocommerce_activated();
        ic_is_woocommerce_minimum_version();
    }
}

if ( ! function_exists( 'ic_is_minimum_php_version' ) ) {
    function ic_is_minimum_php_version() {
        $is_minimum_version = version_compare( phpversion(), '7', '>=');
        if ( $is_minimum_version ) {
            return true;
        }  else {
            $class = 'notice notice-error';
            $message1 = __( 'Your PHP version is: v', IC_TD );
            $message2 = __( '. To ensure that mCheckout work on your website, you need to set PHP version to 7 minimum!', IC_TD );

            printf( '<div class="%1$s"><p>%2$s%3$s%4$s</p></div>', esc_attr( $class ), esc_html( $message1 ), phpversion(), esc_html( $message2 ) );

            deactivate_plugins( 'mcheckout/mediya-checkout.php' );
        }
    }
}

if ( ! function_exists( 'ic_is_minimum_wordpress_version' ) ) {
    function ic_is_minimum_wordpress_version() {
        $is_minimum_version = version_compare( get_bloginfo( 'version' ), '4.5', '>=' );
        if ( $is_minimum_version ) {
            return true;
        }  else {
            $class = 'notice notice-error';
            $message1 = __( 'Your WP version is: v', IC_TD );
            $message2 = __( '. To ensure that mCheckout work on your website, you need to set WP version to 4.5 minimum!', IC_TD );

            printf( '<div class="%1$s"><p>%2$s%3$s%4$s</p></div>', esc_attr( $class ), esc_html( $message1 ), get_bloginfo( 'version' ), esc_html( $message2 ) );

            deactivate_plugins( 'mcheckout/mediya-checkout.php' );
        }
    }
}

if ( ! function_exists( 'ic_is_woocommerce_activated' ) ) {
    function ic_is_woocommerce_activated() {
        if ( class_exists( 'woocommerce' ) ) {
            return true;
        } else {
            $class = 'notice notice-error';
            $message = __( 'Woocommerce is not installed on your website! In order to use mCheckout plugin, you need first to install Woocommerce!', IC_TD );

            printf( '<div class="%1$s"><p>%2$s</p></div>', esc_attr( $class ), esc_html( $message ) );

            deactivate_plugins( 'mcheckout/mediya-checkout.php' );
        }
    }
}

if ( ! function_exists( 'ic_is_woocommerce_minimum_version' ) ) {
    function ic_is_woocommerce_minimum_version() {
        if ( class_exists( 'woocommerce' ) ) {
            if ( version_compare( WC_VERSION, '4.0', '>=' ) ) {
                return true;
            } else {
                $class = 'notice notice-error';
                $message1 = __( 'Your WC version is: v', IC_TD );
                $message2 = __( '. To ensure that mCheckout work on your website, you need to set WC version to 4.0 minimum!', IC_TD );

                printf( '<div class="%1$s"><p>%2$s%3$s%4$s</p></div>', esc_attr( $class ), esc_html( $message1 ), WC_VERSION, esc_html( $message2 ) );

                deactivate_plugins( 'mcheckout/mediya-checkout.php' );
            }
        }else{
            //nemaju woo
            $class = 'notice notice-error';
            $message = __( 'Woocommerce is not installed on your website! In order to use mCheckout plugin, you need first to install Woocommerce!', IC_TD );

            printf( '<div class="%1$s"><p>%2$s</p></div>', esc_attr( $class ), esc_html( $message ) );

            deactivate_plugins( 'mcheckout/mediya-checkout.php' );
        }
    }
}

if ( ! function_exists( 'ic_beta_version_alert' ) ) {
    function ic_beta_version_alert() {
        printf('<div class="notice notice-warning"><p>You have installed the <strong>BETA VERSION</strong> of mCheckout plugin. There might be some conflicts with you theme and plugins styles.Make sure to contact us here on our <a href="https://discord.com/invite/PVGnMHHRpf" target="_blank"><strong>Discord channel</strong></a> and to send us your feedback so we can solve the bugs you have on your store.</p></div>');
    }
}