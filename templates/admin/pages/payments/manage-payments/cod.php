<?php
$cod = ic_get_gateway('cod');
$enabled = $cod->enabled == 'yes' ? 'checked': '';
$virtual = $cod->enable_for_virtual == 'yes' ? 'checked': '';
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
                                <h5>Home<i class="fa-regular fa-angle-right"></i>Payments<i class="fa-regular fa-angle-right"></i>Cash on delivery</h5>
                                <h2><button type="button" class="button-back" onclick="history.go(-1);"><i class="fa-regular fa-angle-left"></i></button>Cash on delivery</h2>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <form action="options.php" id="cod-manage">
                            <div class="payment-manage-box col-md-7">
                                <div class="payment-manage-box-heading">
                                    <p>Enable Cach on delivery</p>
                                    <div class="form-group payment-switch-button">
                                        <label class="switch">
                                            <input id="cod-active" name="cod-active" type="checkbox" value="1" <?php echo $enabled; ?>/>
                                            <span class="slider round"></span>
                                        </label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="cod-title" class="cod-sub-title">Title</label>
                                    <input id="cod-title" name="cod-title" type="text" value="<?php echo $cod->title; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="cod-desc" class="cod-sub-title">Description</label>
                                    <textarea id="cod-desc" name="cod-desc" cols="30" rows="2"><?php echo $cod->description; ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="cod-instructions" class="cod-sub-title">Instructions</label>
                                    <textarea id="cod-instructions" name="cod-instructions" cols="30" rows="2"><?php echo $cod->instructions; ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="cod-shipping" class="cod-sub-title">Enable for shipping methods</label>
                                    <select name="cod-shipping-methods" id="cod-shipping-methods" multiple>
                                        <?php
                                        $shipping_options = ic_load_shipping_method_options();
                                        foreach ($shipping_options as $key => $option) {
                                            ?>
                                            <optgroup label="<?php echo $key; ?>">
                                                <?php
                                                foreach ($option as $key2 => $method) {
                                                    if (in_array($key2, $cod->enable_for_methods)) {
                                                        ?>
                                                        <option selected id="<?php echo $key2; ?>"
                                                                value="<?php echo $key2; ?>">
                                                            <?php echo $method ?>
                                                        </option>
                                                        <?php
                                                    } else {
                                                        ?>
                                                        <option id="<?php echo $key2; ?>" value="<?php echo $key2; ?>">
                                                            <?php echo $method ?>
                                                        </option>
                                                        <?php
                                                    }
                                                }
                                                ?>
                                            </optgroup>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group checkbox-inline" id="checkbox-inline">
                                    <input id="cod-virtual" type="checkbox"  <?php echo $enabled; ?>>
                                    <label for="cod-virtual">Accept COD if the order is virtual</label>
                                </div>

                            </div>
                            <div class="col-md-7 payment-submit-button-div"><input class="payment-submit-button" id="cod-submit" type="submit" value="Save"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>