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

        <!-- Modal -->
        <div class="modal fade" id="upsellPreview" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Preview <img data-bs-toggle="modal"
                                                                                    data-bs-target="#previewCheckout1Modal"
                                                                                    src="<?php echo plugins_url() . '/mediya-checkout/assets/images/review.svg'; ?>"
                                                                                    alt="review checkout" width="12">
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <button class="nav-link active" id="cart-checkout-tab" data-bs-toggle="tab"
                                        data-bs-target="#cart-checkout" type="button" role="tab"
                                        aria-controls="cart-checkout" aria-selected="true">Mini cart & Checkout
                                </button>
                                <button class="nav-link" id="post-purchase-tab" data-bs-toggle="tab"
                                        data-bs-target="#post-purchase" type="button" role="tab"
                                        aria-controls="post-purchase" aria-selected="false">Post-purchase
                                </button>
                            </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="cart-checkout" role="tabpanel"
                                 aria-labelledby="cart-checkout-tab">
                                <div class="upsell-preview"></div>
                            </div>
                            <div class="tab-pane fade" id="post-purchase" role="tabpanel"
                                 aria-labelledby="post-purchase-tab">
                                <div class="pp-preview"></div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="row first-row">
            <div class="col-md-6">
                <div class="page-title">
                    <h5>Home<i class="fa-regular fa-angle-right"></i>Upsells</h5>
                    <h2>Upsells <img
                                src="<?php echo plugins_url() . '/mediya-checkout/assets/images/chart-increasing-messenger.png' ?>"
                                width="24" alt="increasing-graph"></h2>
                </div>
            </div>
            <div class="col-md-6 date-cont" id="upsells-date-cont">
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
                    <div type="text" name="upsells-daterangepicker" id="upsells-daterangepicker">
                        <span>Last 7 days</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="upsell-analytic">
            <div class="row">
                <div class="col-md-3 us-cr-inner">
                    <div class="analytics-box">
                        <div class="main-info">
                            <div class="box-title">
                                <p>Conversion Rate
                                    <div class="ic-info-box-upsells-conversion-rate">
                                        <svg class="ic-info-button-upsells-conversion-rate" width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <g clip-path="url(#clip0_710_19499)">
                                                <path d="M4.545 4.5C4.66255 4.16583 4.89458 3.88405 5.19998 3.70457C5.50538 3.52508 5.86445 3.45947 6.21359 3.51936C6.56273 3.57924 6.87941 3.76076 7.10754 4.03176C7.33567 4.30277 7.46053 4.64576 7.46 5C7.46 6 5.96 6.5 5.96 6.5M6 8.5H6.005M11 6C11 8.76142 8.76142 11 6 11C3.23858 11 1 8.76142 1 6C1 3.23858 3.23858 1 6 1C8.76142 1 11 3.23858 11 6Z" stroke="#98A2B3" stroke-linecap="round" stroke-linejoin="round"/>
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_710_19499">
                                                    <rect width="12" height="12" fill="white"/>
                                                </clipPath>
                                            </defs>
                                        </svg>
                                        <div class="ic-info-text-upsells-conversion-rate">
                                            Percentage of sessions that resulted in online store orders out of the total number of sessions.<br><b>Conversion rate = [ converted sessions / all sessions ] * 100.</b> <span onclick="window.open('https://mediya-checkout.io/','_blank')">Learn more</span>
                                        </div>
                                    </div>
                                </p>
                            </div>
                            <h4></h4>
                            <div class="percent us-cr-p">
                                <i class="fa-solid fa-arrow-down"></i>
                                <span></span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 us-ts-inner">
                    <div class="analytics-box">
                        <div class="main-info">
                            <div class="box-title">
                                <p>Times Shown
                                    <div class="ic-info-box-upsells-times-shown">
                                        <svg class="ic-info-button-upsells-times-shown" width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <g clip-path="url(#clip0_710_19499)">
                                                <path d="M4.545 4.5C4.66255 4.16583 4.89458 3.88405 5.19998 3.70457C5.50538 3.52508 5.86445 3.45947 6.21359 3.51936C6.56273 3.57924 6.87941 3.76076 7.10754 4.03176C7.33567 4.30277 7.46053 4.64576 7.46 5C7.46 6 5.96 6.5 5.96 6.5M6 8.5H6.005M11 6C11 8.76142 8.76142 11 6 11C3.23858 11 1 8.76142 1 6C1 3.23858 3.23858 1 6 1C8.76142 1 11 3.23858 11 6Z" stroke="#98A2B3" stroke-linecap="round" stroke-linejoin="round"/>
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_710_19499">
                                                    <rect width="12" height="12" fill="white"/>
                                                </clipPath>
                                            </defs>
                                        </svg>
                                        <div class="ic-info-text-upsells-times-shown">
                                            Number of sessions where the upsells were triggered and displayed. <span onclick="window.open('https://mediya-checkout.io/','_blank')">Learn more</span>
                                        </div>
                                    </div>
                                </p>
                            </div>
                            <h4></h4>
                            <div class="percent us-ts-p">
                                <i class="fa-solid fa-arrow-down"></i>
                                <span></span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 us-tp-inner">
                    <div class="analytics-box">
                        <div class="main-info">
                            <div class="box-title">
                                <p>Times Purchased
                                    <div class="ic-info-box-upsells-times-purchased">
                                        <svg class="ic-info-button-upsells-times-purchased" width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <g clip-path="url(#clip0_710_19499)">
                                                <path d="M4.545 4.5C4.66255 4.16583 4.89458 3.88405 5.19998 3.70457C5.50538 3.52508 5.86445 3.45947 6.21359 3.51936C6.56273 3.57924 6.87941 3.76076 7.10754 4.03176C7.33567 4.30277 7.46053 4.64576 7.46 5C7.46 6 5.96 6.5 5.96 6.5M6 8.5H6.005M11 6C11 8.76142 8.76142 11 6 11C3.23858 11 1 8.76142 1 6C1 3.23858 3.23858 1 6 1C8.76142 1 11 3.23858 11 6Z" stroke="#98A2B3" stroke-linecap="round" stroke-linejoin="round"/>
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_710_19499">
                                                    <rect width="12" height="12" fill="white"/>
                                                </clipPath>
                                            </defs>
                                        </svg>
                                        <div class="ic-info-text-upsells-times-purchased">
                                            Number of sessions where customers put the upsell in their cart and finished the purchase. <span onclick="window.open('https://mediya-checkout.io/','_blank')">Learn more</span>
                                        </div>
                                    </div>
                                </p>
                            </div>
                            <h4></h4>
                            <div class="percent us-tp-p">
                                <i class="fa-solid fa-arrow-down"></i>
                                <span></span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 us-ap-inner">
                    <div class="analytics-box">
                        <div class="main-info">
                            <div class="box-title">
                                <p>Amount Purchased
                                    <div class="ic-info-box-upsells-amount-purchased">
                                        <svg class="ic-info-button-upsells-amount-purchased" width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <g clip-path="url(#clip0_710_19499)">
                                                <path d="M4.545 4.5C4.66255 4.16583 4.89458 3.88405 5.19998 3.70457C5.50538 3.52508 5.86445 3.45947 6.21359 3.51936C6.56273 3.57924 6.87941 3.76076 7.10754 4.03176C7.33567 4.30277 7.46053 4.64576 7.46 5C7.46 6 5.96 6.5 5.96 6.5M6 8.5H6.005M11 6C11 8.76142 8.76142 11 6 11C3.23858 11 1 8.76142 1 6C1 3.23858 3.23858 1 6 1C8.76142 1 11 3.23858 11 6Z" stroke="#98A2B3" stroke-linecap="round" stroke-linejoin="round"/>
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_710_19499">
                                                    <rect width="12" height="12" fill="white"/>
                                                </clipPath>
                                            </defs>
                                        </svg>
                                        <div class="ic-info-text-upsells-amount-purchased">
                                            Total amount of money you’ve made when your customers added upsell to their cart and finished their purchase. <span onclick="window.open('https://mediya-checkout.io/','_blank')">Learn more</span>
                                        </div>
                                    </div>
                                </p>
                            </div>
                            <h4></h4>
                            <div class="percent us-ap-p">
                                <i class="fa-solid fa-arrow-down"></i>
                                <span></span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <form action="POST" id="upsells">

            <div class="row upsells-table-header upsells-table-header-new">
                <h3>My upsells <span></span></h3>
                <div id="ic-upsells-table-header-i-fas-search"><img src="<?php echo plugins_url() . '/mediya-checkout/assets/images/search.svg'; ?>" alt=""></div>
                <div class="header-actions">

                    <div class="new-upsell" onclick="window.location.href=this.querySelector('a').href;">
                        <a href="admin.php?page=mcheckout-upsell-add-new"><i class="fa-solid fa-plus"></i> Add new</a>
                    </div>

                    <div class="filter-upsell">
                        <img src="<?php echo plugins_url() . '/mediya-checkout/assets/images/filter.png'; ?>" alt="filter">
                        <p>Filter</p>
                    </div>

                    <div class="show-hide-analytics">
                        <img src="<?php echo plugins_url() . '/mediya-checkout/assets/images/bar-chart-2.png'; ?>"
                             alt="show-hide-analytics">
                        <p>Show analytics</p>
                    </div>

                </div>

                <div class="filter-container filter-container-us">
                    <div class="filter-header">
                        <p>Filter by</p>
                        <span class="ic-exit-us-filter"><img src="<?php echo plugins_url() . '/mediya-checkout/assets/images/x.svg' ?>" alt=""></span>
                    </div>
                    <div class="filter-group">
                        <div class="filter-group-heading-text"><i
                                    class="fa-solid fa-angle-down filter-group-show-more"></i> Status
                        </div>
                        <div class="filter-group-section filter-group-sectio1">
                            <div class="form-group ">
                                <input type="checkbox" name="active" id="active">
                                <label for="active">Active</label>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="Inactive" id="inactive">
                                <label for="Inactive">Inactive</label>
                            </div>
                        </div>
                    </div>
                    <div class="filter-group">
                        <div class="filter-group-heading-text"><i
                                    class="fa-solid fa-angle-down filter-group-show-more"></i> Collection
                        </div>
                        <div class="filter-group-section filter-group-sectio2">
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
                                    class="fa-solid fa-angle-down filter-group-show-more"></i> Display
                        </div>
                        <div class="filter-group-section filter-group-sectio3">
                            <div class="form-group">
                                <input type="checkbox" name="checkout" id="checkout-page">
                                <label for="checkout-page">Checkout page</label>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="checkout" id="cart-page">
                                <label for="cart-page">Cart page</label>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="checkout" id="bty-page">
                                <label for="bty-page">Before Thank you page</label>
                            </div>
                        </div>
                    </div>
                    <div class="filter-group">
                        <div class="filter-group-heading-text"><i
                                    class="fa-solid fa-angle-down filter-group-show-more"></i> Upsell Product Offer
                        </div>
                        <div class="filter-group-section filter-group-sectio4">
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
                                    class="fa-solid fa-angle-down filter-group-show-more"></i> Custom Price
                        </div>
                        <div class="filter-group-section filter-group-sectio5">
                            <div class="form-group">
                                <input type="number" name="search" id="cp-min" placeholder="Min">
                            </div>
                            <div class="form-group">
                                <input type="number" name="search" id="cp-max" placeholder="Max">
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
                            <button class="clear-filter">Clear all</button>
                            <button class="apply-filter">Apply filter</button>
                        </div>
                    </div>
                </div>

            </div>

            <table id="upsells-table" class="analytics">
                <thead></thead>
                <tbody></tbody>
            </table>

        </form>

    </div>


<?php
