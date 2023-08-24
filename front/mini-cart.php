<?php

if ( ! function_exists( 'ic_display_mini_cart' ) ) {
    function ic_display_mini_cart() {
        if ( !is_checkout() ) {
            sleep(2);
            $top = 0;
//            if ( is_user_logged_in() ) {
//                $top = '32px';
//            }
            ?>
            <div class="ic-mini-cart-wrapper" style="margin-top: <?php echo $top; ?>;">
                <?php do_shortcode( '[ic_mini_cart]' ); ?>
            </div>
        <?php
        }
    }
}

if ( ! function_exists( 'ic_display_mini_cart_floating' ) ) {
    function ic_display_mini_cart_floating() {
        if ( !is_checkout() ) {
            do_shortcode( '[ic_mini_cart_floating]' );
        }
    }
}