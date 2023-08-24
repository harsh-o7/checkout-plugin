<?php

$options = get_option( 'ic_design_checkout' );
$layout = $options[ 'ic_checkout_layout' ];

if ( $layout == '1' ) {
    include ( IC_PLUGIN_PATH . '/templates/front/cc-layout1/form-billing-l1.php' );
} else if ( $layout == '3' ) {
    include ( IC_PLUGIN_PATH . '/templates/front/cc-layout3/form-billing-l3.php' );
}