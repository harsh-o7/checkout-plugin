<?php
$checkout = new Eh_Stripe_Checkout();

$enabled = $checkout->enabled == 'yes' ? 'checked' : '';
$send_lines = $checkout->stripe_checkout_send_line_items == 'yes' ? 'checked' : '';
$billing_address = $checkout->collect_billing;
$shipping_address = $checkout->collect_shipping;


$form_fields = $checkout->form_fields;
$locale = $form_fields['eh_stripe_checkout_page_locale'];
?>

<div id="app" class="stripe-checkout">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2 navigation">
                <div class="logo-cont">
                    <img src="<?php echo plugins_url() . '/mediya-checkout/assets/images/main-logo.svg'; ?>" alt=""
                         id="logo">
                </div>
                <ul class="nav nav-tabs nav-justified admin-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="<?php menu_page_url('mcheckout'); ?>">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="<?php menu_page_url('mcheckout-payments'); ?>"">Payments</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php menu_page_url('mcheckout-design'); ?>"">Design</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php menu_page_url('mcheckout-upsells'); ?>"">Upsells</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php menu_page_url('mcheckout-discounts'); ?>"">Discounts</a>
                    </li>
                </ul>
            </div>
            <div class="tab-content py-3 col-md-10">

                <div class="app-inner">

                    <div class="row first-row">
                        <div class="col-md-6">
                            <div class="page-title">
                                <h5>Home<i class="fa-regular fa-angle-right"></i>Payments<i class="fa-regular fa-angle-right"></i>Stripe Checkout</h5>
                                <h2><button type="button" class="button-back" onclick="history.go(-1);"><i class="fa-regular fa-angle-left"></i></button>Stripe Checkout</h2>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <form action="options.php" id="authnet-manage">
                            <div class="payment-manage-box col-md-7">
                                <div class="payment-manage-box-heading">
                                    <p>Enable checkout</p>
                                    <div class="form-group payment-switch-button">
                                        <label class="switch">
                                            <input id="eh_checkout_stripe-active" name="eh_checkout_stripe-active"
                                                   type="checkbox"
                                                   value="1" <?php echo $enabled; ?>/>
                                            <span class="slider round"></span>
                                        </label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="eh_checkout_stripe-title"
                                           class="eh_checkout_stripe-sub-title">Title</label>
                                    <input id="eh_checkout_stripe-title" name="eh_checkout_stripe-title" type="text"
                                           value="<?php echo $checkout->title; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="eh_checkout_stripe-desc" class="eh_checkout_stripe-sub-title">Description</label>
                                    <textarea id="eh_checkout_stripe-desc" name="eh_checkout_stripe-desc" cols="30"
                                              rows="2"> <?php echo $checkout->description; ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="eh_checkout_stripe-ord-button-text"
                                           class="eh_checkout_stripe-ord-sub-title">Order button text</label>
                                    <textarea id="eh_checkout_stripe-ord-button-text"
                                              name="eh_checkout_stripe-ord-button-text" cols="30"
                                              rows="2"> <?php echo $checkout->order_button_text; ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="eh_checkout_stripe-locale"
                                           class="eh_checkout_stripe-locale">Locale</label>
                                    <select name="eh_checkout_stripe-locales" id="eh_checkout_stripe-locales">
                                        <?php
                                        $selected_card_options = $locale['options'];
                                        $default_key = $checkout->stripe_checkout_page_locale;
                                        $default_val = $selected_card_options[$default_key];
                                        echo '<option   value="' . $default_val . '" id="' . $default_key . '">' . $default_val . '</option>';
                                        foreach ($selected_card_options as $key => $option) {
                                            if ($key == $default_key or $key == 'auto') {
                                                continue;
                                            }
                                            echo '<option   value="' . $option . '" id="' . $key . '">' . $option . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group checkbox-inline" id="checkbox-inline">
                                    <input id="eh_checkout_stripe-line-items"
                                           type="checkbox" <?php echo $send_lines; ?>>
                                    <label for="eh_checkout_stripe-line-items">Send line items to stripe</label>
                                </div>
                                <div class="form-group checkbox-inline" id="checkbox-inline">
                                    <label>Ask for address details from the stripe hosted page</label>
                                    <input id="eh_checkout_stripe-billing"
                                           type="checkbox" <?php echo $billing_address; ?>>
                                    <label for="eh_checkout_stripe-billing">Billing address</label>
                                    </br>
                                    <input id="eh_checkout_stripe-shipping"
                                           type="checkbox" <?php echo $shipping_address; ?>>
                                    <label for="eh_checkout_stripe-shipping">Shipping address</label>
                                </div>


                            </div>
                            <div class="col-md-7 payment-submit-button-div"><input class="payment-submit-button"
                                                                                   id="eh_checkout_stripe-submit"
                                                                                   type="submit"
                                                                                   value="Save changes"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>