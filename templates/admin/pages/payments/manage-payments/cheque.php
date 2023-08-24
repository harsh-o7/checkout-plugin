<?php

$cp = new WC_Gateway_Cheque();
$enabled = $cp->enabled == 'yes' ? 'checked': '';

?>

<div id="app" class="cod">
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
                                <h5>Home<i class="fa-regular fa-angle-right"></i>Payments<i class="fa-regular fa-angle-right"></i>Check payments</h5>
                                <h2><button type="button" class="button-back" onclick="history.go(-1);"><i class="fa-regular fa-angle-left"></i></button>Check payments</h2>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <form action="options.php" id="cp-manage">
                            <div class="payment-manage-box col-md-7">
                                <div class="payment-manage-box-heading">
                                    <p>Enable Check payments</p>
                                    <div class="form-group payment-switch-button">
                                        <label class="switch">
                                            <input id="cp-active" name="cp-active" type="checkbox" value="1" <?php echo $enabled; ?>/>
                                            <span class="slider round"></span>
                                        </label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="cp-title" class="cod-sub-title">Title</label>
                                    <input id="cp-title" name="cp-title" type="text" value="<?php echo $cp->title; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="cp-desc" class="cod-sub-title">Description</label>
                                    <textarea id="cp-desc" name="cp-desc" cols="30" rows="2">
                                        <?php echo $cp->description; ?>
                                    </textarea>
                                </div>
                                <div class="form-group">
                                    <label for="cp-instructions" class="cod-sub-title">Instructions</label>
                                    <textarea id="cp-instructions" name="cp-instructions" cols="30" rows="2">
                                        <?php echo $cp->instructions; ?>
                                    </textarea>
                                </div>

                            </div>
                            <div class="col-md-7 payment-submit-button-div"><input class="payment-submit-button" id="cp-submit" type="submit" value="Save"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>