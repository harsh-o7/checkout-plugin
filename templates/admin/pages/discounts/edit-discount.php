<?php
$args = array(
    'post_type' => 'product',
    'posts_per_page' => -1
);
$products = get_posts($args);

$categories = get_terms(['taxonomy' => 'product_cat']);

$discount_id = '';
if (isset($_GET['id'])) {
    $discount_id = $_GET['id'];
}
global $wpdb;

$sql = $wpdb->prepare("SELECT * FROM {$wpdb->prefix}ic_discounts 
        WHERE `discount_id` = %d;", $discount_id);
$result = $wpdb->get_results($sql);
$ic_discount = $result[0];

$number_items_customer_gets = $maximum_discount_usage_checked = $maximum_discount_usage_hidden = $maximum_discount_usage
    = $buyX_minimum_quantity_checked = $buyX_minimum_quantity = $buyX_maximum_amount_reached_checked = $buyX_minimum_amount_reached
    = $buyX_maximum_usage_checked = $buyX_maximum_usage = $buyX_minimum_quantity_hidden = $buyX_minimum_amount_reached_checked = "";

$buyX_minimum_quantity_checked = 'checked';

//$maximum_discount_usage_checked = $ic_discount->maximum_discount_usage ?  '' : 'checked';

$maximum_discount_usage_checked = $ic_discount->maximum_discount_usage == '' ? '' : 'checked';
$maximum_discount_usage_hidden = $ic_discount->maximum_discount_usage == '' ? 'hidden' : '';

$maximum_discount_usage_html = '';
if ($maximum_discount_usage_checked == 'checked') {
    $maximum_discount_usage_html = 'Maximum discount usage: <strong>' . $ic_discount->maximum_discount_usage . '</strong>';
}

$type = $ic_discount->type;
$typeText = '';
$discounted_html = '';

$radio = [
    'disc-buy-x' => "",
    'disc-percentage' => "",
    'disc-fixed' => "",
    'disc-free-shipp' => "",
];

$radio[$type] = "checked";

$hidden_value = '';
if ($type == 'disc-free-shipp') {
    $hidden_value = 'hidden';
}

$hidden = [
    'second' => "hidden",
    'first' => "",
];
if ($type == 'disc-buy-x') {
    $hidden['second'] = "";
    $hidden['first'] = "hidden";
}

$discount_value = $ic_discount->discount_value;

switch ($type) {
    case 'disc-buy-x':
        $typeText = 'Buy X Get Y';
        break;
    case 'disc-fixed':
        $typeText = 'Fixed';
        $discounted_html = 'Discounted <strong>' . $discount_value . get_woocommerce_currency_symbol() . '</strong>';
        break;
    case 'disc-percentage':
        $typeText = 'Percentage';
        $discounted_html = 'Discounted <strong>' . $discount_value . '%</strong>';
        break;
    case 'disc-free-shipp':
        $typeText = 'Free Shipping';
        break;
    default:
        break;
}


$dates = json_decode($ic_discount->dates, true);

$start_date = $dates['start_date'];
$start_time = $dates['start_time'];
$end_date_checked = $ic_discount->end_dates_checked ? 'checked' : '';
$end_date_hidden = $ic_discount->end_dates_checked ? '' : 'hidden';
$end_date = $end_date_checked ? $dates['end_date'] : '';
$end_time = $dates['end_time'] ?? '';

$end_date_html = '';
if ($end_date_checked) {
    $end_date_html = ' to <strong>' . $end_date . '</strong>';
}

$minimum_quantity_reached_checked = $ic_discount->minimum_quantity_reached_checked ? 'checked' : '';
$minimum_quantity_reached = $ic_discount->minimum_quantity_reached_checked ? $ic_discount->minimum_quantity_reached : '';
$minimum_quantity_reached_hidden = $minimum_quantity_reached == '' ? 'hidden' : '';

$minimum_amount_reached_checked = $ic_discount->minimum_amount_reached_checked ? 'checked' : '';
$minimum_amount_reached = $ic_discount->minimum_amount_reached_checked ? $ic_discount->minimum_amount_reached : '';
$minimum_amount_reached_hidden = $minimum_amount_reached == '' ? 'hidden' : '';

$min_amount_quantity_text = '';
if ($ic_discount->minimum_quantity_reached_checked) {
    $min_amount_quantity_text = 'Minimum quantity reached in cart of <strong>' . $minimum_quantity_reached . '</strong> items';
} else if ($ic_discount->minimum_amount_reached_checked) {
    $min_amount_quantity_text = 'Minimum amount reached in cart of <strong>' . $minimum_amount_reached . get_woocommerce_currency_symbol() . '</strong>';
}

$exclude_shipping_checked = $ic_discount->exclude_shipping_checked ? 'checked' : '';
$exclude_shipping = $ic_discount->exclude_shipping_checked ? $ic_discount->exclude_shipping : '';

$individual_use = $ic_discount->individual_use ? 'checked' : '';
$individual_use_display = $ic_discount->individual_use ? 'block' : 'none';

$exclude_sale_items = $ic_discount->exclude_sale_items;
$exclude_sale_items_checked = $ic_discount->exclude_sale_items_checked ? 'checked' : '';
$exclude_sale_items_hidden = $ic_discount->exclude_sale_items_checked ? '' : 'hidden';
$exclude_sale_items_html = '';
if ($ic_discount->exclude_sale_items_checked) {
    $exclude_sale_items_html = 'Exclude sale items';
}

$entire_order = $ic_discount->entire_order;
$entire_order_checked = $ic_discount->entire_order ? 'checked' : '';

$specific_products_checked = $ic_discount->specific_products_checked ? 'checked' : '';
$specific_products_hidden = $ic_discount->specific_products_checked ? '' : 'hidden';

$disc_applies_on = 'Entire order';
if ($ic_discount->specific_products_checked) {
    $disc_applies_on = 'Specific products and collections';
}

$buy_x_get_y = json_decode($ic_discount->buy_x_get_y);
$buyX_maximum_usage_hidden = $customer_gets_percentage = 'hidden';
$customer_gets_radio = [
    'free' => "",
    'percentage' => "",
];
$buy_x_get_y_type = null;

if ($buy_x_get_y) {
    $number_items_customer_gets = $buy_x_get_y->how_many_items_customer_gets ?? "";

    $maximum_discount_usage_checked = $ic_discount->maximum_discount_usage_checked ? 'checked' : '';
    $maximum_discount_usage_hidden = $ic_discount->maximum_discount_usage_checked ? '' : 'hidden';
    $maximum_discount_usage = $ic_discount->maximum_discount_usage_checked ? $ic_discount->maximum_discount_usage : '';

    $customer_gets_radio[$buy_x_get_y->customer_gets] = "checked";

    $buyX_minimum_quantity_checked = $buy_x_get_y->maximum_usage_per_customer_checked ? 'checked' : '';
    $buyX_minimum_quantity = $buy_x_get_y->maximum_usage_per_customer ?? "";
    $buyX_minimum_quantity_hidden = $buy_x_get_y->maximum_usage_per_customer_checked ? '' : 'hidden';

    $buyX_minimum_amount_reached_checked = $buy_x_get_y->minimum_amount_reached_checked ? 'checked' : '';
    $buyX_minimum_amount_reached = $buy_x_get_y->minimum_amount_reached ?? "";

    $buyX_maximum_usage_checked = $buy_x_get_y->minimum_amount_reached_checked ? 'checked' : '';
    $buyX_maximum_usage_hidden = $buy_x_get_y->minimum_amount_reached_checked ? '' : 'hidden';
    $buyX_maximum_usage = $buy_x_get_y->maximum_usage ?? "";

    if (isset($buy_x_get_y->type)) {
        if ($buy_x_get_y->type != 'free') {
            $buy_x_get_y_type = $buy_x_get_y->type;
            $customer_gets_percentage = '';
        }
    }
}

$max_usage_per_order_html = '';
if ($buy_x_get_y && $buy_x_get_y->minimum_amount_reached_checked) {
    $max_usage_per_order_html = 'Maximum discount usage per order: <strong>' . $buy_x_get_y->maximum_usage . '</strong>';
}

if( $ic_discount->active != 0 ) {
    ?>
    <input type="hidden" class="active-status">
<?php
}

?>

<div id="app" class="create-discount-box">
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
                        <a class="nav-link" href="<?php menu_page_url('mcheckout-payments'); ?>">Payments</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php menu_page_url('mcheckout-design'); ?>">Design</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php menu_page_url('mcheckout-upsells'); ?>">Upsells</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="<?php menu_page_url('mcheckout-discounts'); ?>">Discounts</a>
                    </li>
                </ul>
            </div>
            <div class="tab-content py-3 col-md-10">
                <div class="app-inner" id="app-inner-edit-discount">
                    <div class="row first-row">
                        <div class="col-md-6">
                            <div class="page-title">
                                <h5>Home<i class="fa-regular fa-angle-right"></i>Discounts<i class="fa-regular fa-angle-right"></i>Edit discount</h5>
                                <h2>
                                    <button type="button" class="button-back" onclick="history.go(-1);"><i
                                                class="fa-regular fa-angle-left"></i></button>
                                    Edit discount
                                </h2>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="col-md-6 date-cont" id="discounts-date-cont">
                                <div class="date-ranges specified">
                                    <ul>
                                        <li data-range="day">1d</li>
                                        <li data-range="week" class="active">1w</li>
                                        <li data-range="month">1m</li>
                                        <li data-range="three-month">3m</li>
                                        <li data-range="half-year">6m</li>
                                    </ul>
                                </div>
                                <div class="datepicker ic-datepicker">
                                    <div type="text" name="discounts-daterangepicker" id="discounts-daterangepicker">
                                        <span>Last 7 days</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="upsell-analytic">
                            <div class="row">
                                <div class="col ds-cr-inner">
                                    <div class="analytics-box">
                                        <div class="main-info">
                                            <div class="box-title">
                                                <p>Conversion Rate
                                                    <div class="ic-info-box-discounts-conversion-rate">
                                                        <svg class="ic-info-button-discounts-conversion-rate" width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <g clip-path="url(#clip0_710_19499)">
                                                                <path d="M4.545 4.5C4.66255 4.16583 4.89458 3.88405 5.19998 3.70457C5.50538 3.52508 5.86445 3.45947 6.21359 3.51936C6.56273 3.57924 6.87941 3.76076 7.10754 4.03176C7.33567 4.30277 7.46053 4.64576 7.46 5C7.46 6 5.96 6.5 5.96 6.5M6 8.5H6.005M11 6C11 8.76142 8.76142 11 6 11C3.23858 11 1 8.76142 1 6C1 3.23858 3.23858 1 6 1C8.76142 1 11 3.23858 11 6Z" stroke="#98A2B3" stroke-linecap="round" stroke-linejoin="round"/>
                                                            </g>
                                                            <defs>
                                                                <clipPath id="clip0_710_19499">
                                                                    <rect width="12" height="12" fill="white"/>
                                                                </clipPath>
                                                            </defs>
                                                        </svg>
                                                        <div class="ic-info-text-discounts-conversion-rate">
                                                            Percentage of sessions that resulted in online store orders out of the total number of sessions.<br><b>Conversion rate = [ converted sessions / all sessions ] * 100.</b> <span onclick="window.open('https://mediya-checkout.io/','_blank')">Learn more</span>
                                                        </div>
                                                    </div>
                                                </p>
                                            </div>
                                            <h4></h4>
                                            <div class="percent dsc-cr-p">
                                                <i class="fa-solid fa-arrow-down"></i>
                                                <span></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col ds-te-inner">
                                    <div class="analytics-box">
                                        <div class="main-info">
                                            <div class="box-title">
                                                <p>Times Entered
                                                    <div class="ic-info-box-discounts-times-entered">
                                                        <svg class="ic-info-button-discounts-times-entered" width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <g clip-path="url(#clip0_710_19499)">
                                                                <path d="M4.545 4.5C4.66255 4.16583 4.89458 3.88405 5.19998 3.70457C5.50538 3.52508 5.86445 3.45947 6.21359 3.51936C6.56273 3.57924 6.87941 3.76076 7.10754 4.03176C7.33567 4.30277 7.46053 4.64576 7.46 5C7.46 6 5.96 6.5 5.96 6.5M6 8.5H6.005M11 6C11 8.76142 8.76142 11 6 11C3.23858 11 1 8.76142 1 6C1 3.23858 3.23858 1 6 1C8.76142 1 11 3.23858 11 6Z" stroke="#98A2B3" stroke-linecap="round" stroke-linejoin="round"/>
                                                            </g>
                                                            <defs>
                                                                <clipPath id="clip0_710_19499">
                                                                    <rect width="12" height="12" fill="white"/>
                                                                </clipPath>
                                                            </defs>
                                                        </svg>
                                                        <div class="ic-info-text-discounts-times-entered">
                                                            Number of times where the discount was entered and applied. <span onclick="window.open('https://mediya-checkout.io/','_blank')">Learn more</span>
                                                        </div>
                                                    </div>
                                                </p>
                                            </div>
                                            <h4></h4>
                                            <div class="percent dsc-ta-p">
                                                <i class="fa-solid fa-arrow-down"></i>
                                                <span></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col ds-tp-inner">
                                    <div class="analytics-box">
                                        <div class="main-info">
                                            <div class="box-title">
                                                <p>Times Purchased
                                                    <div class="ic-info-box-discounts-times-purchased">
                                                        <svg class="ic-info-button-discounts-times-purchased" width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <g clip-path="url(#clip0_710_19499)">
                                                                <path d="M4.545 4.5C4.66255 4.16583 4.89458 3.88405 5.19998 3.70457C5.50538 3.52508 5.86445 3.45947 6.21359 3.51936C6.56273 3.57924 6.87941 3.76076 7.10754 4.03176C7.33567 4.30277 7.46053 4.64576 7.46 5C7.46 6 5.96 6.5 5.96 6.5M6 8.5H6.005M11 6C11 8.76142 8.76142 11 6 11C3.23858 11 1 8.76142 1 6C1 3.23858 3.23858 1 6 1C8.76142 1 11 3.23858 11 6Z" stroke="#98A2B3" stroke-linecap="round" stroke-linejoin="round"/>
                                                            </g>
                                                            <defs>
                                                                <clipPath id="clip0_710_19499">
                                                                    <rect width="12" height="12" fill="white"/>
                                                                </clipPath>
                                                            </defs>
                                                        </svg>
                                                        <div class="ic-info-text-discounts-times-purchased">
                                                            Number of sessions where customers entered, applied the discount, and finished the purchase. <span onclick="window.open('https://mediya-checkout.io/','_blank')">Learn more</span>
                                                        </div>
                                                    </div>
                                                </p>
                                            </div>
                                            <h4></h4>
                                            <div class="percent dsc-tp-p">
                                                <i class="fa-solid fa-arrow-down"></i>
                                                <span></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col ds-ap-inner">
                                    <div class="analytics-box">
                                        <div class="main-info">
                                            <div class="box-title">
                                                <p>Amount Purchased
                                                    <div class="ic-info-box-discounts-amount-purchased">
                                                        <svg class="ic-info-button-discounts-amount-purchased" width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <g clip-path="url(#clip0_710_19499)">
                                                                <path d="M4.545 4.5C4.66255 4.16583 4.89458 3.88405 5.19998 3.70457C5.50538 3.52508 5.86445 3.45947 6.21359 3.51936C6.56273 3.57924 6.87941 3.76076 7.10754 4.03176C7.33567 4.30277 7.46053 4.64576 7.46 5C7.46 6 5.96 6.5 5.96 6.5M6 8.5H6.005M11 6C11 8.76142 8.76142 11 6 11C3.23858 11 1 8.76142 1 6C1 3.23858 3.23858 1 6 1C8.76142 1 11 3.23858 11 6Z" stroke="#98A2B3" stroke-linecap="round" stroke-linejoin="round"/>
                                                            </g>
                                                            <defs>
                                                                <clipPath id="clip0_710_19499">
                                                                    <rect width="12" height="12" fill="white"/>
                                                                </clipPath>
                                                            </defs>
                                                        </svg>
                                                        <div class="ic-info-text-discounts-amount-purchased">
                                                            Total amount of money you’ve made when your customers applied the discount on your store and finished their purchase. <span onclick="window.open('https://mediya-checkout.io/','_blank')">Learn more</span>
                                                        </div>
                                                    </div>
                                                </p>
                                            </div>
                                            <h4></h4>
                                            <div class="percent dsc-ap-p">
                                                <i class="fa-solid fa-arrow-down"></i>
                                                <span></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col ds-da-inner">
                                    <div class="analytics-box">
                                        <div class="main-info">
                                            <div class="box-title">
                                                <p>Discounted Amount
                                                    <div class="ic-info-box-discounts-amount-discounted">
                                                        <svg class="ic-info-button-discounts-amount-discounted" width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <g clip-path="url(#clip0_710_19499)">
                                                                <path d="M4.545 4.5C4.66255 4.16583 4.89458 3.88405 5.19998 3.70457C5.50538 3.52508 5.86445 3.45947 6.21359 3.51936C6.56273 3.57924 6.87941 3.76076 7.10754 4.03176C7.33567 4.30277 7.46053 4.64576 7.46 5C7.46 6 5.96 6.5 5.96 6.5M6 8.5H6.005M11 6C11 8.76142 8.76142 11 6 11C3.23858 11 1 8.76142 1 6C1 3.23858 3.23858 1 6 1C8.76142 1 11 3.23858 11 6Z" stroke="#98A2B3" stroke-linecap="round" stroke-linejoin="round"/>
                                                            </g>
                                                            <defs>
                                                                <clipPath id="clip0_710_19499">
                                                                    <rect width="12" height="12" fill="white"/>
                                                                </clipPath>
                                                            </defs>
                                                        </svg>
                                                        <div class="ic-info-text-discounts-amount-discounted">
                                                            Total amount of money your customers saved through discounts. This is the SUM of all discounts where your customers applied the discount on your store and finished their purchase. <span onclick="window.open('https://mediya-checkout.io/','_blank')">Learn more</span>
                                                        </div>
                                                    </div>
                                                </p>
                                            </div>
                                            <h4></h4>
                                            <div class="percent dsc-da-p">
                                                <i class="fa-solid fa-arrow-down"></i>
                                                <span></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <form id="disc-form" method="post" action="discounts">
                            <div class="row ">
                                <div class="col-md-7 automatic-disc-inner inner-row">
                                    <div class="edit-disc-form-box">
                                        <div class="row card-row-header">
                                            <h3>Automatic Discounts</h3>
                                        </div>
                                        <div class="inner-automatic-disc">
                                            <div class="row">
                                                <div class="box-title">
                                                    <p>Discount Title</p>
                                                </div>
                                                <div class="box-body">
                                                    <div class="disc-title-input">
                                                        <input type="text" name="disc-title" id="disc-title"
                                                               value="<?php echo $ic_discount->title ?> ">
                                                    </div>
                                                    <div class="disc-max-disc-usage">
                                                        <input type="checkbox" name="disc-max-usage"
                                                               id="disc-max-usage" <?php echo $maximum_discount_usage_checked ?> >
                                                        <label>Set
                                                            a
                                                            maximum
                                                            discount usage</label>
                                                        </br>
                                                        <input type="text" id="disc-max-usage-text"
                                                               class="<?php echo $maximum_discount_usage_hidden; ?>"
                                                               value="<?php echo $ic_discount->maximum_discount_usage; ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="box-title">
                                                    <p>Active Dates</p>
                                                </div>
                                            </div>
                                            <div class="box-body">
                                                <div class="disc-active-dates">
                                                    <input type="text" name="disc-start-date" id="disc-start-date"
                                                           value="<?php echo $start_date ?>">
                                                    <input type="text" name="disc-start-time" id="disc-start-time"
                                                           value="<?php echo $start_time ?>">
                                                </div>
                                                <div class="disc-set-end-date">
                                                    <input type="checkbox" name="disc-set-end"
                                                           id="disc-set-end" <?php echo $end_date_checked ?>> <label>Set
                                                        end date and
                                                        time</label>
                                                    </br>
                                                    <div id="disc-set-end-text" class="<?php echo $end_date_hidden; ?>">
                                                        <input type="text" id="disc-set-end-date-text"
                                                               name="disc-end-date"
                                                               value="<?php echo $end_date ?>">
                                                        <input type="text" id="disc-set-end-time-text"
                                                               name="disc-end-time"
                                                               value="<?php echo $end_time ?>">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="type-disc-inner inner-row">
                                        <div class="edit-disc-form-box">
                                            <div class="row card-row-header">
                                                <h3>Discount Type</h3>
                                            </div>
                                            <div class="inner-type-disc">
                                                <div class="row">
                                                    <div class="disc-buy-x">
                                                        <input type="radio" name="disc-radio" id="disc-buy-x" <?php echo
                                                        $radio["disc-buy-x"] ?>><label>Buy X Get Y</label>
                                                    </div>

                                                    <div class="disc-percentage">
                                                        <input type="radio" name="disc-radio" id="disc-percentage"
                                                            <?php echo $radio["disc-percentage"] ?>>
                                                        <label>Percentage</label>
                                                    </div>

                                                    <div class="disc-fixed">
                                                        <input type="radio" name="disc-radio" id="disc-fixed"
                                                            <?php echo $radio["disc-fixed"] ?>> <label>Fixed</label>
                                                    </div>
                                                    <div class="disc-free-shipping">
                                                        <input type="radio" name="disc-radio" id="disc-free-shipp"
                                                            <?php echo $radio["disc-free-shipp"] ?>> <label>Free
                                                            Shipping</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-5 summary-disc-inner">
                                    <div class=" edit-disc-form-box">
                                        <div class="row card-row-header">
                                            <h3>Summary</h3>
                                        </div>
                                        <div class="inner-summary-disc">
                                            <div class="row summary" id="summary-title">
                                                <span><strong><?php echo $ic_discount->title; ?></strong></span>
                                            </div>
                                            <div class="row summary" id="summary-percentage">
                                                <span><strong><?php echo $typeText; ?></strong></span>
                                            </div>
                                            <div class="row summary" id="summary-discounted">
                                                <span><?php echo $discounted_html; ?></span>
                                            </div>
                                            <div class="row summary" id="summary-type-order">
                                                <span><strong><?php echo $disc_applies_on; ?></strong></span>
                                            </div>
                                            <div class="row summary" id="summary-minmax">
                                                <span><?php echo $min_amount_quantity_text; ?></span>
                                            </div>
                                            <div class="row summary" id="summary-date">
                                                <span>Active from <strong><?php echo $start_date; ?></strong><?php echo $end_date_html; ?></span>
                                            </div>
                                            <div class="row summary" id="discount-max-usage">
                                                <span><?php echo $maximum_discount_usage_html; ?></span>
                                            </div>
                                            <div class="row summary" id="summary-exclude-sale-items">
                                                <span><strong><?php echo $exclude_sale_items_html; ?></strong></span>
                                            </div>
                                            <div class="row summary" id="summary-specific-products-collections">
                                                <span></span>
                                            </div>
                                            <div class="row summary" id="summary-discount-max-usage-per-order">
                                                <span><?php echo $max_usage_per_order_html; ?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="disc-form-box individual-box"
                                         style="display: <?php echo $individual_use_display; ?>;"
                                    ">
                                    <div class="row card-row-header">
                                        <h3>Can’t combine with other discounts</h3>
                                    </div>
                                    <div class="row summary inner-cant-combinate-disc">
                                        <p>Customers will be able to override the automatic discount
                                            with their discount code.</p>
                                        <p>If two automatic discounts are applicable, the one with the
                                            best value for the customer will be activated</p>
                                        <a href="#">Read more about automatic discounts</a>
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="row first " <?php echo $hidden['first'] ?>>
                        <div class="col-md-7 setup-disc-inner inner-row ">
                            <div class="edit-disc-form-box">
                                <div class="row card-row-header">
                                    <h3>Discount setup</h3>
                                </div>
                                <div class="inner-setup-disc">
                                    <div class="row discount-value-row <?php echo $hidden_value; ?>">
                                        <div class="box-title">
                                            <p>Discount Value</p>
                                        </div>
                                        <div class="box-body">
                                            <div class="disc-value-input">
                                                <span class="disc-value-input-percent">%</span>
                                                <span class="disc-value-input-value hidden"><?php echo get_woocommerce_currency() ?></span>
                                                <input type="text" name="disc-value" id="disc-value"
                                                       value=" <?php echo $discount_value ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="box-title">
                                            <p>Discount application criteria</p>
                                        </div>
                                    </div>
                                    <div class="box-body">
                                        <div class="max-discount-fields">
                                            <div class="disc-min-quantity-reached">
                                                <input type="checkbox" name="disc-min-quantity-amount-reached"
                                                       id="disc-min-quantity-reached"
                                                    <?php echo $minimum_quantity_reached_checked ?> >
                                                <label>Minimum quantity reached in cart</label>
                                            </div>
                                            <div class="disc-min-quantity-reached-text <?php echo $minimum_quantity_reached_hidden; ?>"
                                                 id="disc-min-quantity-reached-text">
                                                <input type="text" name="disc-min-quantity-reached-text"
                                                       id="disc-min-quantity-reached-input"
                                                       value="<?php echo $minimum_quantity_reached ?>">
                                            </div>
                                        </div>
                                        <div class="minimum-discount-fields">
                                            <div class="disc-min-amount-reached">
                                                <input type="checkbox" name="disc-min-quantity-amount-reached"
                                                       id="disc-min-amount-reached"
                                                    <?php echo $minimum_amount_reached_checked ?>>
                                                <label>Minimum amount reached in cart</label>
                                            </div>
                                            <div class="disc-min-amount-reached-text <?php echo $minimum_amount_reached_hidden; ?>"
                                                 id="disc-min-amount-reached-text">
                                                <span class="disc-value-input-value5"><?php echo get_woocommerce_currency() ?></span>
                                                <input type="text" name="disc-min-amount-reached-text"
                                                       id="disc-min-amount-reached-input"
                                                       value="<?php echo $minimum_amount_reached ?>">
                                            </div>
                                        </div>
                                        <div class="exclude-rates hidden">
                                            <div class="disc-exclude-shipping-rates">
                                                <input type="checkbox" name="disc-exclude-shipping"
                                                       id="disc-exclude-shipping" <?php echo $exclude_shipping_checked ?>>
                                                <label>Exclude shipping rates over a certain amount</label>
                                            </div>
                                            <div class="disc-exclude-shipping-text"
                                                 id="disc-exclude-shipping-text">
                                                <span class="disc-value-input-value5"><?php echo get_woocommerce_currency() ?></span>
                                                <input type="text" name="disc-disc-exclude-shipping-text"
                                                       id="disc-disc-exclude-shipping-input"
                                                       value="<?php echo $exclude_shipping ?>">
                                            </div>
                                        </div>
                                        <div class="discount-individual-use">
                                            <input type="checkbox" name="disc-individual-use"
                                                   id="disc-individual-use"
                                                <?php echo $individual_use ?>>
                                            <label>Individual use only</label>
                                        </div>
                                        <div class="discount-exclude-items">
                                            <div class="disc-exclude-items">
                                                <input type="checkbox" name="disc-exclude-items"
                                                       id="disc-exclude-items" <?php echo $exclude_sale_items_checked ?>
                                                <label>Exclude sale items</label>
                                            </div>
                                            <div class="disc-exclude-items-text <?php echo $exclude_sale_items_hidden ?>"
                                                 id="disc-exclude-items-text">
                                                <div class="buttons">
                                                    <div class="added-products1-cont"></div>
                                                    <div class="added-products1-categories-cont"></div>
                                                    <div class="upsell-create-actions">
                                                        <div class="upsell-desc upsell-edit-actions1">Actions</div>
                                                        <div class="upsell-edit-actions2">
                                                            <button type="button"
                                                                    class="btn btn-primary upsell-edit-products1-add-btn"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#exampleModal3">
                                                                Add products
                                                            </button>
                                                            <div class="modal fade products1-modal"
                                                                 id="exampleModal3"
                                                                 tabindex="-1"
                                                                 aria-labelledby="exampleModalLabel"
                                                                 aria-hidden="true">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title"
                                                                                id="exampleModalLabel">
                                                                                Select product for your discount</h5>
                                                                            <button type="button"
                                                                                    class="btn-close"
                                                                                    data-bs-dismiss="modal"
                                                                                    aria-label="Close"></button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <div class="modal-top-body">
                                                                                <div class="modal-top-body-products2-selected">
                                                                                    <p class="products1-selected">
                                                                                        <span>0</span> products selected
                                                                                    </p>
                                                                                    <p class="select-all-products1">
                                                                                        Select all
                                                                                        <span><?php echo (int)wp_count_posts('product')->publish; ?></span>
                                                                                    </p>
                                                                                </div>
                                                                                <input type="text"
                                                                                       id="search-us1-products">
                                                                            </div>
                                                                            <div class="modal-middle-body products1-middle">
                                                                                <?php foreach ($products as $product) : ?>
                                                                                    <div class="single-product1-product">
                                                                                        <input type="checkbox"
                                                                                               value="<?php echo $product->ID; ?>">
                                                                                        <?php
                                                                                        $image = wp_get_attachment_image_src(get_post_thumbnail_id($product->ID), 'single-post-thumbnail');
                                                                                        if ($image) :
                                                                                            ?>
                                                                                            <img width="32"
                                                                                                 height="32"
                                                                                                 src="<?php echo $image[0]; ?>"
                                                                                                 alt="">
                                                                                        <?php else : ?>
                                                                                            <img width="32"
                                                                                                 height="32"
                                                                                                 src="#"
                                                                                                 alt="">
                                                                                        <?php endif; ?>
                                                                                        <p><?php echo $product->post_title; ?></p>
                                                                                    </div>
                                                                                <?php endforeach; ?>
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button"
                                                                                    class="btn btn-secondary upsell-create-modal-btn-cancel"
                                                                                    data-bs-dismiss="modal">
                                                                                Cancel
                                                                            </button>
                                                                            <button type="button"
                                                                                    class="btn btn-primary add-products1 upsell-create-modal-btn-add"
                                                                                    data-bs-dismiss="modal"><i
                                                                                        class="fa-solid fa-plus"></i>
                                                                                Add
                                                                                products
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <button type="button"
                                                                    class="upsell-edit-button upsell-edit-button-actions2"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#collectionProduct"><i
                                                                        class="fa-solid fa-plus"></i> Add collections
                                                            </button>
                                                            <div class="modal fade products1-categories-modal"
                                                                 id="collectionProduct" tabindex="-1"
                                                                 aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title"
                                                                                id="exampleModalLabel">Select category
                                                                                for
                                                                                your upsell offer</h5>
                                                                            <button type="button" class="btn-close"
                                                                                    data-bs-dismiss="modal"
                                                                                    aria-label="Close"></button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <div class="modal-top-body">
                                                                                <div class="modal-top-body-products2-selected">
                                                                                    <p class="products1-collection-selected">
                                                                                        <span>0</span> categories
                                                                                        selected
                                                                                    </p>
                                                                                    <p class="select-all-products1-collections">
                                                                                        Select all
                                                                                        <span><?php echo count($categories); ?></span>
                                                                                    </p>
                                                                                </div>
                                                                                <input type="text"
                                                                                       id="search-us-products1-categories"
                                                                                       placeholder="Search for categories">
                                                                            </div>
                                                                            <div class="modal-middle-body products1-collections-middle">
                                                                                <?php foreach ($categories as $category) : ?>
                                                                                    <div class="single-category-product1-product">
                                                                                        <input type="checkbox"
                                                                                               value="<?php echo $category->term_id; ?>">
                                                                                        <?php
                                                                                        //                                                                $image = wp_get_attachment_image_src(get_post_thumbnail_id($product->ID), 'single-post-thumbnail');
                                                                                        //                                                                if ($image) :
                                                                                        //                                                                    ?>
                                                                                        <!--                                                                    <img width="32" height="32"-->
                                                                                        <!--                                                                         src="-->
                                                                                        <?php //echo $image[0]; ?><!--" alt="">-->
                                                                                        <!--                                                                --><?php //else : ?>
                                                                                        <!--                                                                    <img width="32" height="32" src="' + urls.plugin_url + '/assets/images/woocommerce-placeholder.png' + '" alt="">-->
                                                                                        <!--                                                                --><?php //endif; ?>
                                                                                        <p><?php echo $category->name; ?></p>
                                                                                    </div>
                                                                                <?php endforeach; ?>
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button"
                                                                                    class="btn btn-secondary upsell-create-modal-btn-cancel"
                                                                                    data-bs-dismiss="modal">Cancel
                                                                            </button>
                                                                            <button type="button"
                                                                                    class="btn btn-primary add-collection-products1 upsell-create-modal-btn-add"
                                                                                    data-bs-dismiss="modal"><i
                                                                                        class="fa-solid fa-plus"></i>
                                                                                Add
                                                                                collections
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row first " <?php echo $hidden['first'] ?>>
                        <div class="col-md-7 apllies-on-disc-inner inner-row ">
                            <div class="edit-disc-form-box">
                                <div class="row card-row-header">
                                    <h3>Discount applies on </h3>
                                </div>
                                <div class="inner-apllies-on-disc">
                                    <div class="disc-entire-order">
                                        <input type="checkbox" name="disc-entire-order" id="disc-entire-order"
                                            <?php echo $entire_order_checked ?>
                                               class="chkbtn">
                                        <label>Entire order</label>
                                    </div>
                                    <div class="disc-specific-products">
                                        <input type="checkbox" name="disc-specific-products"
                                               id="disc-specific-products"
                                            <?php echo $specific_products_checked ?>
                                               class="chkbtn">
                                        <label>Specific products and collections</label>
                                    </div>
                                    <div class="disc-specific-products-text <?php echo $specific_products_hidden ?>"
                                         id="disc-specific-products-text">
                                        <div class="buttons">
                                            <label>Customers gets any of the selected items
                                                with discount</label>

                                            <div class="added-products2-cont"></div>
                                            <div class="added-products2-categories-cont"></div>
                                            <div class="upsell-create-actions">
                                                <div class="upsell-desc upsell-edit-actions1">Actions</div>
                                                <div class="upsell-edit-actions2">
                                                    <button type="button"
                                                            class="btn btn-primary upsell-edit-products2-add-btn"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#exampleModal4">
                                                        Add products
                                                    </button>
                                                    <div class="modal fade products2-modal" id="exampleModal4"
                                                         tabindex="-1"
                                                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title"
                                                                        id="exampleModalLabel">Select
                                                                        product
                                                                        for
                                                                        your discount offer</h5>
                                                                    <button type="button" class="btn-close"
                                                                            data-bs-dismiss="modal"
                                                                            aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="modal-top-body">
                                                                        <div class="modal-top-body-products2-selected">
                                                                            <p class="products2-selected">
                                                                                <span>0</span> products selected
                                                                            </p>
                                                                            <p class="select-all-products2">Select all
                                                                                <span><?php echo (int)wp_count_posts('product')->publish; ?></span>
                                                                            </p>
                                                                        </div>
                                                                        <input type="text"
                                                                               id="search-us2-products">
                                                                    </div>
                                                                    <div class="modal-middle-body products2-middle">
                                                                        <?php foreach ($products as $product) : ?>
                                                                            <div class="single-product2-product">
                                                                                <input type="checkbox"
                                                                                       value="<?php echo $product->ID; ?>">
                                                                                <?php
                                                                                $image = wp_get_attachment_image_src(get_post_thumbnail_id($product->ID), 'single-post-thumbnail');
                                                                                if ($image) :
                                                                                    ?>
                                                                                    <img width="32" height="32"
                                                                                         src="<?php echo $image[0]; ?>"
                                                                                         alt="">
                                                                                <?php else : ?>
                                                                                    <img width="32" height="32"
                                                                                         src="#" alt="">
                                                                                <?php endif; ?>
                                                                                <p><?php echo $product->post_title; ?></p>
                                                                            </div>
                                                                        <?php endforeach; ?>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button"
                                                                            class="btn btn-secondary upsell-create-modal-btn-cancel"
                                                                            data-bs-dismiss="modal">Cancel
                                                                    </button>
                                                                    <button type="button"
                                                                            class="btn btn-primary add-products2 upsell-create-modal-btn-add"
                                                                            data-bs-dismiss="modal"><i
                                                                                class="fa-solid fa-plus"></i>
                                                                        Add
                                                                        products
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <button type="button"
                                                            class="upsell-edit-button upsell-edit-button-actions2"
                                                            data-bs-toggle="modal" data-bs-target="#collectionProduct2">
                                                        <i
                                                                class="fa-solid fa-plus"></i> Add collections
                                                    </button>
                                                    <div class="modal fade products2-categories-modal"
                                                         id="collectionProduct2" tabindex="-1"
                                                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">
                                                                        Select category for
                                                                        your upsell offer</h5>
                                                                    <button type="button" class="btn-close"
                                                                            data-bs-dismiss="modal"
                                                                            aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="modal-top-body">
                                                                        <div class="modal-top-body-products2-selected">
                                                                            <p class="products2-collection-selected">
                                                                                <span>0</span> categories selected
                                                                            </p>
                                                                            <p class="select-all-products2-collections">
                                                                                Select all
                                                                                <span><?php echo count($categories); ?></span>
                                                                            </p>
                                                                        </div>
                                                                        <input type="text"
                                                                               id="search-us-products2-categories"
                                                                               placeholder="Search for categories">
                                                                    </div>
                                                                    <div class="modal-middle-body products2-collections-middle">
                                                                        <?php foreach ($categories as $category) : ?>
                                                                            <div class="single-category-product2-product">
                                                                                <input type="checkbox"
                                                                                       value="<?php echo $category->term_id; ?>">
                                                                                <?php
                                                                                //                                                                $image = wp_get_attachment_image_src(get_post_thumbnail_id($product->ID), 'single-post-thumbnail');
                                                                                //                                                                if ($image) :
                                                                                //                                                                    ?>
                                                                                <!--                                                                    <img width="32" height="32"-->
                                                                                <!--                                                                         src="-->
                                                                                <?php //echo $image[0]; ?><!--" alt="">-->
                                                                                <!--                                                                --><?php //else : ?>
                                                                                <!--                                                                    <img width="32" height="32" src="' + urls.plugin_url + '/assets/images/woocommerce-placeholder.png' + '" alt="">-->
                                                                                <!--                                                                --><?php //endif; ?>
                                                                                <p><?php echo $category->name; ?></p>
                                                                            </div>
                                                                        <?php endforeach; ?>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button"
                                                                            class="btn btn-secondary upsell-create-modal-btn-cancel"
                                                                            data-bs-dismiss="modal">Cancel
                                                                    </button>
                                                                    <button type="button"
                                                                            class="btn btn-primary add-collection-products2 upsell-create-modal-btn-add"
                                                                            data-bs-dismiss="modal"><i
                                                                                class="fa-solid fa-plus"></i> Add
                                                                        collections
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row second " <?php echo $hidden['second'] ?>>
                        <div class="col-md-7 when-applies-disc-inner inner-row ">
                            <div class="edit-disc-form-box">
                                <div class="row card-row-header">
                                    <h3>Discount Applies When</h3>
                                    <p class="ic-dics-subtitle-bottom">Customer buys any of the following products. You
                                        can add both collection and products</p>
                                </div>
                                <div class="inner-when-applies-disc">
                                    <div class="row">
                                        <div class="box-title">
                                            <p>When customer buys</p>
                                        </div>
                                        <div class="box-body">
                                            <div class="max-discount-fields">
                                                <div class="disc-min-quantity-reached">
                                                    <input type="checkbox" name="disc-min-quantity-reached"
                                                           id="disc-applies-min-quantity-reached"
                                                           class="disc-applies-min-quantity-xy-reached"
                                                        <?php echo $buyX_minimum_quantity_checked ?>>
                                                    <label>Minimum quantity reached in cart</label>
                                                </div>
                                                <div class="disc-min-quantity-reached-input <?php echo $buyX_minimum_quantity_hidden; ?>"
                                                     id="disc-applies-min-quantity-reached-text">
                                                    <input type="text" name="disc-min-quantity-input"
                                                           id="disc-min-quantity-reached-input"
                                                           class="disc-min-quantity-xy-reached-input"
                                                           value="<?php echo $buyX_minimum_quantity ?>">
                                                </div>
                                            </div>
                                            <div class="minimum-discount-fields">
                                                <div class="disc-min-amount-reached">
                                                    <input type="checkbox" name="disc-min-amount-reached"
                                                           id="disc-applies-min-amount-reached"
                                                           class="disc-applies-min-amount-xy-reached"
                                                        <?php echo $buyX_minimum_amount_reached_checked ?>>
                                                    <label>Minimum amount reached in cart</label>
                                                </div>
                                                <div class="disc-min-amount-xy-reached-input hidden"
                                                     id="disc-applies-min-amount-reached-text">
                                                    <span class="disc-value-input-value5"><?php echo get_woocommerce_currency() ?></span>
                                                    <input type="text" name="disc-min-amount-input"
                                                           id="disc-min-amount-reached-input"
                                                           class="disc-min-amount-xy-reached-input"
                                                           value="<?php echo $buyX_minimum_amount_reached ?>">
                                                </div>
                                            </div>
                                            <div class="discount-selection-items">
                                                <div class="row" id="products-collections-applies">
                                                    <div class="title">
                                                        <span>Any of the selected items</span>
                                                    </div>
                                                    <div class="buttons">
                                                        <div class="added-triggers-cont"></div>
                                                        <div class="added-trigger-categories-cont"></div>
                                                        <div class="upsell-create-actions">
                                                            <div class="upsell-desc upsell-edit-actions1"> Actions</div>
                                                            <div class="upsell-edit-actions2">
                                                                <button type="button"
                                                                        class="btn btn-primary upsell-edit-triggers-add-btn"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#exampleModal">
                                                                    Add products
                                                                </button>
                                                                <div class="modal fade triggers-modal"
                                                                     id="exampleModal"
                                                                     tabindex="-1"
                                                                     aria-labelledby="exampleModalLabel"
                                                                     aria-hidden="true">
                                                                    <div class="modal-dialog">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title"
                                                                                    id="exampleModalLabel">
                                                                                    Select product for
                                                                                    your discount offer</h5>
                                                                                <button type="button"
                                                                                        class="btn-close"
                                                                                        data-bs-dismiss="modal"
                                                                                        aria-label="Close"></button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <div class="modal-top-body">
                                                                                    <div class="modal-top-body-products2-selected">
                                                                                        <p class="triggers-selected">
                                                                                            <span>0</span> products
                                                                                            selected
                                                                                        </p>
                                                                                        <p class="select-all-triggers">
                                                                                            Select all
                                                                                            <span><?php echo (int)wp_count_posts('product')->publish; ?></span>
                                                                                        </p>
                                                                                    </div>
                                                                                    <input type="text"
                                                                                           id="search-us-triggers"
                                                                                           placeholder="Search for products">
                                                                                </div>
                                                                                <div class="modal-middle-body triggers-middle">
                                                                                    <?php foreach ($products as $product) : ?>
                                                                                        <div class="single-product-trigger">
                                                                                            <input type="checkbox"
                                                                                                   value="<?php echo $product->ID; ?>">
                                                                                            <?php
                                                                                            $image = wp_get_attachment_image_src(get_post_thumbnail_id($product->ID), 'single-post-thumbnail');
                                                                                            if ($image) :
                                                                                                ?>
                                                                                                <img width="32"
                                                                                                     height="32"
                                                                                                     src="<?php echo $image[0]; ?>"
                                                                                                     alt="">
                                                                                            <?php else : ?>
                                                                                                <img width="32"
                                                                                                     height="32"
                                                                                                     src="#"
                                                                                                     alt="">
                                                                                            <?php endif; ?>
                                                                                            <p><?php echo $product->post_title; ?></p>
                                                                                        </div>
                                                                                    <?php endforeach; ?>
                                                                                </div>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button"
                                                                                        class="btn btn-secondary upsell-create-modal-btn-cancel"
                                                                                        data-bs-dismiss="modal">
                                                                                    Cancel
                                                                                </button>
                                                                                <button type="button"
                                                                                        class="btn btn-primary add-triggers upsell-create-modal-btn-add"
                                                                                        data-bs-dismiss="modal">
                                                                                    <i
                                                                                            class="fa-solid fa-plus"></i>
                                                                                    Add
                                                                                    products
                                                                                </button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <button type="button"
                                                                        class="upsell-edit-button upsell-edit-button-actions2"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#collectionTrigger"><i
                                                                            class="fa-solid fa-plus"></i> Add
                                                                    collections
                                                                </button>
                                                                <div class="modal fade trigger-categories-modal"
                                                                     id="collectionTrigger" tabindex="-1"
                                                                     aria-labelledby="exampleModalLabel"
                                                                     aria-hidden="true">
                                                                    <div class="modal-dialog">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title"
                                                                                    id="exampleModalLabel">Select
                                                                                    category for
                                                                                    your upsell offer</h5>
                                                                                <button type="button" class="btn-close"
                                                                                        data-bs-dismiss="modal"
                                                                                        aria-label="Close"></button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <div class="modal-top-body">
                                                                                    <div class="modal-top-body-products2-selected">
                                                                                        <p class="trigger-collection-selected">
                                                                                            <span>0</span> categories
                                                                                            selected
                                                                                        </p>
                                                                                        <p class="select-all-trigger-collections">
                                                                                            Select all
                                                                                            <span><?php echo count($categories); ?></span>
                                                                                        </p>
                                                                                    </div>
                                                                                    <input type="text"
                                                                                           id="search-us-trigger-categories"
                                                                                           placeholder="Search for categories">
                                                                                </div>
                                                                                <div class="modal-middle-body trigger-collections-middle">
                                                                                    <?php foreach ($categories as $category) : ?>
                                                                                        <div class="single-category-trigger-product">
                                                                                            <input type="checkbox"
                                                                                                   value="<?php echo $category->term_id; ?>">
                                                                                            <?php
                                                                                            //                                                                $image = wp_get_attachment_image_src(get_post_thumbnail_id($product->ID), 'single-post-thumbnail');
                                                                                            //                                                                if ($image) :
                                                                                            //                                                                    ?>
                                                                                            <!--                                                                    <img width="32" height="32"-->
                                                                                            <!--                                                                         src="-->
                                                                                            <?php //echo $image[0]; ?><!--" alt="">-->
                                                                                            <!--                                                                --><?php //else : ?>
                                                                                            <!--                                                                    <img width="32" height="32" src="' + urls.plugin_url + '/assets/images/woocommerce-placeholder.png' + '" alt="">-->
                                                                                            <!--                                                                --><?php //endif; ?>
                                                                                            <p><?php echo $category->name; ?></p>
                                                                                        </div>
                                                                                    <?php endforeach; ?>
                                                                                </div>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button"
                                                                                        class="btn btn-secondary upsell-create-modal-btn-cancel"
                                                                                        data-bs-dismiss="modal">Cancel
                                                                                </button>
                                                                                <button type="button"
                                                                                        class="btn btn-primary add-collection-trigger upsell-create-modal-btn-add"
                                                                                        data-bs-dismiss="modal"><i
                                                                                            class="fa-solid fa-plus"></i>
                                                                                    Add
                                                                                    collections
                                                                                </button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row second " <?php echo $hidden['second'] ?>>
                        <div class="col-md-7 customer-gets-disc-inner inner-row">
                            <div class=" edit-disc-form-box">
                                <div class="row card-row-header">
                                    <h3>Customer will get</h3>
                                    <p class="ic-dics-subtitle-bottom">Customer needs to add any of the following items
                                        in their shopping cart to take...</p>
                                </div>
                                <div class="inner-customer-gets-disc">
                                    <div class="row">
                                        <div class="box-body">
                                            <div class="free-percentage-fields">
                                                <div class="free-field">
                                                    <input type="radio" name="disc-free-fields-radio"
                                                           id="disc-free-field-checkbox"
                                                           <?php echo $customer_gets_radio["free"] ?>>
                                                    <label>Free</label>
                                                </div>
                                                <div class="percentage-field">
                                                    <input type="radio" name="disc-free-fields-radio"
                                                           id="disc-percentage-field-checkbox"
                                                           <?php echo $customer_gets_radio["percentage"] ?>>
                                                    <label>Percentage</label>
                                                    <span class="buyxy-percentage-value-input-percent hidden" >%</span>
                                                    <input type="text" value="<?php echo $buy_x_get_y_type; ?>"
                                                           id="buyxy-percentage" class="<?php echo $customer_gets_percentage; ?>">
                                                </div>
                                            </div>
                                            <div class="num-of-items">
                                                <label>For how many items the discount applies</label>
                                                <input type="text" id="disc-num-of-items"
                                                       value="<?php echo $number_items_customer_gets ?>">
                                            </div>

                                            <div class="discount-selection-items">
                                                <div class="row" id="products-collections-customer">
                                                    <div class="buttons">
                                                        <div class="added-products-cont"></div>
                                                        <div class="added-products-categories-cont"></div>
                                                        <div class="upsell-create-actions">
                                                            <div class="upsell-desc upsell-edit-actions1">
                                                                Customers gets any of the selected items
                                                                with discount
                                                            </div>
                                                            <div class="upsell-edit-actions2">
                                                                <button type="button"
                                                                        class="btn btn-primary upsell-edit-triggers-add-btn"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#exampleModal2">
                                                                    Add products
                                                                </button>
                                                                <button type="button"
                                                                        class="upsell-edit-button upsell-edit-button-actions2"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#collectionProductA"><i
                                                                            class="fa-solid fa-plus"></i> Add
                                                                    collections
                                                                </button>
                                                                <div class="modal fade products-modal"
                                                                     id="exampleModal2" tabindex="-1"
                                                                     aria-labelledby="exampleModalLabel"
                                                                     aria-hidden="true">
                                                                    <div class="modal-dialog">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title"
                                                                                    id="exampleModalLabel">Select
                                                                                    product for your
                                                                                    discount offer</h5>
                                                                                <button type="button"
                                                                                        class="btn-close"
                                                                                        data-bs-dismiss="modal"
                                                                                        aria-label="Close"></button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <div class="modal-top-body">
                                                                                    <div class="modal-top-body-products2-selected">
                                                                                        <p class="products-selected">
                                                                                            <span>0</span> products
                                                                                            selected</p>
                                                                                        <p class="select-all-products">
                                                                                            Select all
                                                                                            <span><?php echo (int)wp_count_posts('product')->publish; ?></span>
                                                                                        </p>
                                                                                    </div>
                                                                                    <input type="text"
                                                                                           id="search-us-products"
                                                                                           placeholder="Search for products">
                                                                                </div>
                                                                                <div class="modal-middle-body products-middle">
                                                                                    <?php foreach ($products as $product) : ?>
                                                                                        <div class="single-product-product">
                                                                                            <input type="checkbox"
                                                                                                   value="<?php echo $product->ID; ?>">
                                                                                            <?php
                                                                                            $image = wp_get_attachment_image_src(get_post_thumbnail_id($product->ID), 'single-post-thumbnail');
                                                                                            if ($image) :
                                                                                                ?>
                                                                                                <img width="32"
                                                                                                     height="32"
                                                                                                     src="<?php echo $image[0]; ?>"
                                                                                                     alt="">
                                                                                            <?php else : ?>
                                                                                                <img width="32"
                                                                                                     height="32"
                                                                                                     src="#"
                                                                                                     alt="">
                                                                                            <?php endif; ?>
                                                                                            <p><?php echo $product->post_title; ?></p>
                                                                                        </div>
                                                                                    <?php endforeach; ?>
                                                                                </div>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button"
                                                                                        class="btn upsell-create-modal-btn-cancel"
                                                                                        data-bs-dismiss="modal">
                                                                                    Cancel
                                                                                </button>
                                                                                <button type="button"
                                                                                        class="btn add-products upsell-create-modal-btn-add"
                                                                                        data-bs-dismiss="modal"><i
                                                                                            class="fa-solid fa-plus"></i>
                                                                                    Add
                                                                                    products
                                                                                </button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="modal fade products-categories-modal"
                                                             id="collectionProductA" tabindex="-1"
                                                             aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabel">
                                                                            Select category for
                                                                            your upsell offer</h5>
                                                                        <button type="button" class="btn-close"
                                                                                data-bs-dismiss="modal"
                                                                                aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="modal-top-body">
                                                                            <div class="modal-top-body-products2-selected">
                                                                                <p class="products-collection-selected">
                                                                                    <span>0</span> categories selected
                                                                                </p>
                                                                                <p class="select-all-products-collections">
                                                                                    Select all
                                                                                    <span><?php echo count($categories); ?></span>
                                                                                </p>
                                                                            </div>
                                                                            <input type="text"
                                                                                   id="search-us-products-categories"
                                                                                   placeholder="Search for categories">
                                                                        </div>
                                                                        <div class="modal-middle-body products-collections-middle">
                                                                            <?php foreach ($categories as $category) : ?>
                                                                                <div class="single-category-product-product">
                                                                                    <input type="checkbox"
                                                                                           value="<?php echo $category->term_id; ?>">
                                                                                    <?php
                                                                                    //                                                                $image = wp_get_attachment_image_src(get_post_thumbnail_id($product->ID), 'single-post-thumbnail');
                                                                                    //                                                                if ($image) :
                                                                                    //                                                                    ?>
                                                                                    <!--                                                                    <img width="32" height="32"-->
                                                                                    <!--                                                                         src="-->
                                                                                    <?php //echo $image[0]; ?><!--" alt="">-->
                                                                                    <!--                                                                --><?php //else : ?>
                                                                                    <!--                                                                    <img width="32" height="32" src="' + urls.plugin_url + '/assets/images/woocommerce-placeholder.png' + '" alt="">-->
                                                                                    <!--                                                                --><?php //endif; ?>
                                                                                    <p><?php echo $category->name; ?></p>
                                                                                </div>
                                                                            <?php endforeach; ?>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button"
                                                                                class="btn btn-secondary upsell-create-modal-btn-cancel"
                                                                                data-bs-dismiss="modal">Cancel
                                                                        </button>
                                                                        <button type="button"
                                                                                class="btn btn-primary add-collection-products upsell-create-modal-btn-add"
                                                                                data-bs-dismiss="modal"><i
                                                                                    class="fa-solid fa-plus"></i> Add
                                                                            collections
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row second " <?php echo $hidden['second'] ?>>
                            <div class="col-md-7 additional-disc-inner inner-row">
                                <div class="edit-disc-form-box">
                                    <div class="row card-row-header">
                                        <h3>Additional options</h3>
                                    </div>
                                    <div class="inner-additional-disc">
                                        <div class="row">
                                            <div class="box-body">
                                                <div class="free-percentage-fields">
                                                    <div class="maximum-checkbox">
                                                        <input type="checkbox" name="disc-maximum-checkbox"
                                                               id="disc-maximum-usage-set"
                                                            <?php echo $buyX_maximum_usage_checked ?>>
                                                        <label>Set a maximum discount usage per order</label>
                                                    </div>
                                                    <div class="disc-max-amount-reached-text <?php echo $buyX_maximum_usage_hidden ?>"
                                                         id="disc-maximum-usage-set-text">
                                                        <input type="text" name="disc-max-amount-reached-text"
                                                               id="disc-max-amount-reached-input"
                                                               value="<?php echo $buyX_maximum_usage ?>">
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-7">
                            <input type="submit" id="update-discount-button" value="Save"
                                   data-discount-id="<?php echo $discount_id; ?>">
                        </div>
                    </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
