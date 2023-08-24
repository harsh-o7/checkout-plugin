<?php
$authnet = new WC_Gateway_Authnet();

$enabled = $authnet->enabled == 'yes' ? 'checked' : '';
$capture = $authnet->capture == 'yes' ? 'checked' : '';
$loggin = $authnet->logging == 'yes' ? 'checked' : '';
$debugging = $authnet->debugging == 'yes' ? 'checked' : '';
$customer_receipt = $authnet->customer_receipt == 'yes' ? 'checked' : '';
$test_mode = $authnet->testmode == 'yes' ? 'checked' : '';

?>

<div id="app" class="authnet">
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
                                <h5>Home<i class="fa-regular fa-angle-right"></i>Payments<i class="fa-regular fa-angle-right"></i>Authorize.Net</h5>
                                <h2><button type="button" class="button-back" onclick="history.go(-1);"><i class="fa-regular fa-angle-left"></i></button>Authorize.Net</h2>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <form action="options.php" id="authnet-manage">
                            <div class="payment-manage-box col-md-7">
                                <div class="payment-manage-box-heading">
                                    <p>Enable Authorize.Net</p>
                                    <div class="form-group payment-switch-button">
                                        <label class="switch">
                                            <input id="authnet-active" name="authnet-active" type="checkbox"
                                                   value="1" <?php echo $enabled; ?>/>
                                            <span class="slider round"></span>
                                        </label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="authnet-title" class="authnet-sub-title">Title</label>
                                    <input id="authnet-title" name="authnet-title" type="text"
                                           value="<?php echo $authnet->title; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="authnet-desc" class="authnet-sub-title">Description</label>
                                    <textarea id="authnet-desc" name="authnet-desc" cols="30"
                                              rows="2"> <?php echo $authnet->description; ?></textarea>
                                </div>
                                <div class="form-group checkbox-inline" id="checkbox-inline">
                                    <input id="authnet-sandbox" type="checkbox" <?php echo $test_mode; ?> >
                                    <label for="authnet-sandbox">Enable Sandbox Mode</label>
                                </div>
                                <div class="form-group">
                                    <label for="authnet-login-id" class="authnet-sub-title">API Loginw ID</label>
                                    <textarea id="authnet-login-id" name="authnet-login-id" type="text"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="authnet-transaction-key" class="authnet-sub-title">Transaction Key</label>
                                    <textarea id="authnet-transaction-key" name="authnet-transaction-key" type="text"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="authnet-statement" class="authnet-sub-title">Statement
                                        Descriptor</label>
                                    <textarea id="authnet-statement" name="authnet-statement" type="text"></textarea>
                                </div>
                                <div class="form-group checkbox-inline" id="checkbox-inline">
                                    <input id="authnet-capture" type="checkbox" <?php echo $capture; ?>>
                                    <label for="authnet-capture">Capture charge immediately</label>
                                </div>
                                <div class="form-group checkbox-inline" id="checkbox-inline">
                                    <input id="authnet-logging" type="checkbox" <?php echo $debugging; ?>>
                                    <label for="authnet-logging">Log debug messages</label>
                                </div>
                                <div class="form-group checkbox-inline" id="checkbox-inline">
                                    <input id="authnet-gateaway-bug" type="checkbox" <?php echo $loggin; ?> >
                                    <label for="authnet-gateaway-bug">Log gateway requests and response to the
                                        WooCommerce System Status log.</label>
                                </div>

                                <div class="form-group">
                                    <label for="authnet-cards" class="authnet-sub-title">Allowed Card types</label>
                                    <select name="cod-shipping-methods" id="cod-shipping-methods" multiple>
                                        <?php
                                        $selected_card_options = array_values($authnet->allowed_card_types);
                                        $payment_options = $authnet->get_form_fields()['allowed_card_types']['options'];
                                        foreach ($payment_options as $key => $option) {
                                            if (in_array($key, $selected_card_options)) {
                                                echo '<option selected  value="' . $option . '" id="'. $key .'">' . $option . '</option>';
                                            } else {
                                                echo '<option value="' . $option . '" id="'. $key .'">'. $option . '</option>';
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group checkbox-inline" id="checkbox-inline">
                                    <input id="authnet-customer-receipt" type="checkbox" <?php echo $customer_receipt; ?>>
                                    <label for="authnet-customer-receipt">Send Gateway Receipt</label>
                                </div>

                            </div>
                            <div class="col-md-7 payment-submit-button-div"><input class="payment-submit-button"
                                                                                   id="authnet-submit" type="submit"
                                                                                   value="Save"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>