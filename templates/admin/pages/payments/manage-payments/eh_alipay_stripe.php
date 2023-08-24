<?php
$alipay = new EH_Alipay_Stripe_Gateway();

$enabled = $alipay->enabled == 'yes' ? 'checked' : '';

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
                                            <input id="eh_alipay_stripe-active" name="eh_alipay_stripe-active" type="checkbox"
                                                   value="1" <?php echo $enabled; ?>/>
                                            <span class="slider round"></span>
                                        </label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="eh_alipay_stripe-title" class="eh_alipay_stripe-sub-title">Title</label>
                                    <input id="eh_alipay_stripe-title" name="eh_alipay_stripe-title" type="text"
                                           value="<?php echo $alipay->title; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="eh_alipay_stripe-desc" class="eh_alipay_stripe-sub-title">Description</label>
                                    <textarea id="eh_alipay_stripe-desc" name="eh_alipay_stripe-desc" cols="30"
                                              rows="2"> <?php echo $alipay->description; ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="eh_alipay_stripe-ord-button-text" class="eh_alipay_stripe-ord-sub-title">Order button text</label>
                                    <textarea id="eh_alipay_stripe-ord-button-text" name="eh_alipay_stripe-ord-button-text" cols="30"
                                              rows="2"> <?php echo $alipay->order_button_text; ?></textarea>
                                </div>

                            </div>
                            <div class="col-md-7 payment-submit-button-div"><input class="payment-submit-button"
                                                                                   id="eh_alipay_stripe-submit" type="submit"
                                                                                   value="Save changes"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>