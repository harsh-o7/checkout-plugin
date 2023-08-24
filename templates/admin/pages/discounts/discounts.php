<?php

$taxonomy = 'product_cat';
$orderby = 'name';
$show_count = 0;      // 1 for yes, 0 for no
$pad_counts = 0;      // 1 for yes, 0 for no
$hierarchical = 1;      // 1 for yes, 0 for no
$title = '';
$empty = 0;

$args = array(
    'taxonomy' => $taxonomy,
    'orderby' => $orderby,
    'show_count' => $show_count,
    'pad_counts' => $pad_counts,
    'hierarchical' => $hierarchical,
    'title_li' => $title,
    'hide_empty' => $empty
);
$all_categories = get_categories($args);

$args = array(
    'post_type' => 'product',
    'posts_per_page' => -1
);
$products = get_posts($args);

?>

    <div class="app-inner">

        <div class="row first-row">
            <div class="col-md-6">
                <div class="page-title">
                    <h5>Home<i class="fa-regular fa-angle-right"></i>Discounts</h5>
                    <h2>Discounts <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24" height="25" viewBox="0 0 24 25" fill="none">
                            <path d="M0 24.68H24V0.68H0V24.68Z" fill="url(#pattern0)"/>
                            <defs>
                                <pattern id="pattern0" patternContentUnits="objectBoundingBox" width="1" height="1">
                                    <use xlink:href="#image0_4039_28762" transform="scale(0.00625)"/>
                                </pattern>
                                <image id="image0_4039_28762" width="160" height="160" xlink:href="data:image/png;base64,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"/>
                            </defs>
                        </svg></h2>
                </div>
            </div>
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

        <form action="POST" id="upsells">

            <div class="row upsells-table-header discounts-table-header-new">
                <h3>My discounts <span id='inner-number-discount'></span></h3>
                <div id="ic-discount-table-header-i-fas-search"><img src="<?php echo plugins_url() . '/mediya-checkout/assets/images/search.svg'; ?>" alt=""></div>
                <div class="header-actions">

                    <div class="new-discount" onclick="window.location.href=this.querySelector('a').href;">
                        <a href="admin.php?page=mcheckout-discount-add-new"><i class="fa-solid fa-plus"></i> Create new</a>
                    </div>

                    <div class="filter-discount">
                        <img src="<?php echo plugins_url() . '/mediya-checkout/assets/images/filter.png'; ?>" alt="filter">
                        <p>Filter</p>
                    </div>

                    <div class="show-hide-analytics-discounts">
                        <img src="<?php echo plugins_url() . '/mediya-checkout/assets/images/bar-chart-2.png'; ?>"
                             alt="show-hide-analytics">
                        <p>Show analytics</p>
                    </div>

                </div>

                <div class="filter-container filter-container-discounts">
                    <div class="filter-header">
                        <p>Filter by</p>
                        <span class="ic-exit-d-filter"><img src="<?php echo plugins_url() . '/mediya-checkout/assets/images/x.svg' ?>" alt=""></span>
                    </div>
                    <div class="filter-group">
                        <div class="filter-group-heading-text"><i
                                    class="fa-solid fa-angle-down filter-group-show-more"></i> Status
                        </div>
                        <div class="filter-group-section">
                            <div class="form-group ">
                                <input type="checkbox" name="active" id="active">
                                <label for="active">Active</label>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="inactive" id="inactive">
                                <label for="active">Inactive</label>
                            </div>
                        </div>
                    </div>
                    <div class="filter-group">
                        <div class="filter-group-heading-text"><i
                                    class="fa-solid fa-angle-down filter-group-show-more"></i> Type of Discount
                        </div>
                        <div class="filter-group-section">
                            <div class="form-group">
                                <input type="checkbox" name="type" id="fixed">
                                <label for="fixed">Fixed</label>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="type" id="percentage">
                                <label for="percentage">Percentage</label>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="type" id="buy-xy">
                                <label for="buy-xy">Buy X get Y</label>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="type" id="free-shipping">
                                <label for="free-shipping">Free shipping</label>
                            </div>
                        </div>
                    </div>
                    <div class="filter-group">
                        <div class="filter-group-heading-text"><i
                                    class="fa-solid fa-angle-down filter-group-show-more"></i> Collection
                        </div>
                        <div class="filter-group-section">
                            <?php
                            foreach ($all_categories as $cat) {
                                ?>
                                <div class="form-group">
                                    <input type="checkbox" name="product-cat[]"
                                           id="cat-id-<?php echo $cat->term_id; ?>">
                                    <label for="cat-id-<?php echo $cat->term_id; ?>"><?php echo $cat->name ?></label>
                                </div>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                    <div class="filter-group">
                        <div class="filter-group-heading-text"><i
                                    class="fa-solid fa-angle-down filter-group-show-more"></i> Products
                        </div>
                        <div class="filter-group-section">
                            <?php
                            foreach ($products as $product) {
                                ?>
                                <div class="form-group">
                                    <input type="checkbox" name="product[]" id="product-id-<?php echo $product->ID; ?>">
                                    <label for="product-id-<?php echo $product->ID; ?>"><?php echo $product->post_title; ?></label>
                                </div>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                    <div class="filter-group">
                        <div class="filter-group-heading-text"><i
                                    class="fa-solid fa-angle-down filter-group-show-more"></i> Times Entered
                        </div>
                        <div class="filter-group-section filter-group-sectio5">
                            <div class="form-group">
                                <input type="number" name="search" id="te-min" placeholder="Min">
                            </div>
                            <div class="form-group">
                                <input type="number" name="search" id="te-max" placeholder="Max">
                            </div>
                        </div>
                    </div>
                    <div class="filter-group">
                        <div class="filter-group-heading-text"><i
                                    class="fa-solid fa-angle-down filter-group-show-more"></i> Conversion Rate
                        </div>
                        <div class="filter-group-section filter-group-sectio6">
                            <div class="form-group">
                                <input type="number" name="search" id="cr-min" placeholder="Min">
                            </div>
                            <div class="form-group">
                                <input type="number" name="search" id="cr-max" placeholder="Max">
                            </div>
                        </div>
                    </div>
                    <div class="filter-group">
                        <div class="filter-group-heading-text"><i
                                    class="fa-solid fa-angle-down filter-group-show-more"></i> Times Purchased
                        </div>
                        <div class="filter-group-section filter-group-sectio7">
                            <div class="form-group">
                                <input type="number" name="search" id="tp-min" placeholder="Min">
                            </div>
                            <div class="form-group">
                                <input type="number" name="search" id="tp-max" placeholder="Max">
                            </div>
                        </div>
                    </div>
                    <div class="filter-group">
                        <div class="filter-group-heading-text"><i
                                    class="fa-solid fa-angle-down filter-group-show-more"></i> Amount Purchased
                        </div>
                        <div class="filter-group-section filter-group-sectio8">
                            <div class="form-group">
                                <input type="number" name="search" id="ap-min" placeholder="Min">
                            </div>
                            <div class="form-group">
                                <input type="number" name="search" id="ap-max" placeholder="Max">
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="buttons-bottom">
                            <button class="clear-filter clear-filter-discounts">Clear all</button>
                            <button class="apply-filter apply-filter-discounts">Apply filter</button>
                        </div>
                    </div>
                </div>
            </div>

            <table id="discounts-table" class="analytics">
                <thead></thead>
                <tbody></tbody>
            </table>

        </form>

    </div>


<?php
