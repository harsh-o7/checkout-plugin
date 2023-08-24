<?php

if ( ! function_exists( 'ic_get_payment_methods' ) ) {
    function ic_get_payment_methods() {

//        if ( ! wp_verify_nonce( $_GET[ 'nonce' ], 'ic_get_payment_methods' ) ) {
//            die ( 'Wrong nonce!' );
//        }

        $payment_gateways_first = WC()->payment_gateways();
//        $gateways = $payment_getaways->payment_gateways();


        $payment_gateways = $payment_gateways_first->payment_gateways;
        $gateway_list = [];
        foreach ( $payment_gateways as $tmp ) {
            $gateway_list += [$tmp->id => $tmp];
        }

        $payments = [];
        foreach ( $gateway_list as  $id => $gateway ) {
            $url = 'admin.php?page=';
            $url .= 'mcheckout-manage-'.$id;
//            switch ($id) {
//                case 'bacs': $url .= 'mcheckout-manage-dbt'; break;
//                case 'cheque': $url .= 'mcheckout-manage-cp'; break;
//                case 'cod': $url .= 'mcheckout-manage-cod'; break;
//                case 'authnet': $url .= 'mcheckout-manage-authnet'; break;
//                case 'eh_alipay_stripe': $url .= 'mcheckout-manage-eh_alipay_stripe'; break;
//                case 'eh_affirm_stripe': $url .= 'mcheckout-manage-eh_affirm_stripe'; break;
//                case 'eh_afterpay_stripe': $url .= 'mcheckout-manage-eh_afterpay_stripe'; break;
//                case 'eh_stripe_checkout': $url .= 'mcheckout-manage-eh_stripe_checkout'; break;
//                case 'ppcp-gateway' : $url .= 'mcheckout-manage-ppcp-gateway'; break;
//                default: break;
//            }
            $payment = [
                $gateway->title,
                $gateway->get_option( 'enabled' ),
                $url,
                $id,
                file_exists( WP_PLUGIN_DIR . '/mediya-checkout/templates/admin/pages/payments/manage-payments/' . $id . '.php' ),
                $gateway
            ];
            array_push( $payments, $payment );
        }
       echo json_encode( $payments );

        wp_die();
    }
}


if(! function_exists('ic_get_gateway')) {
    function ic_get_gateway($id) {
        $payment_gateways_first = WC()->payment_gateways();
        $payment_gateways = $payment_gateways_first->payment_gateways;
        $gateway_list = [];
        foreach ( $payment_gateways as $tmp ) {
            $gateway_list += [$tmp->id => $tmp];
        }

        return $gateway_list[$id];
    }
}

if (! function_exists('ic_update_payment_method')) {
    function ic_update_payment_method(){

//        if ( ! wp_verify_nonce( $_POST[ 'nonce' ], 'ic_update_payment_method' ) ) {
//            die ( 'Wrong nonce!' );
//        }

        $id = $_POST['id'];
        $enabled = $_POST['enabled'];
        $gateway = ic_get_gateway($id);
        $enabled = $enabled > 0  ? 'yes' : 'no';
        $gateway->update_option('enabled', $enabled);

        wp_die();

    }
}