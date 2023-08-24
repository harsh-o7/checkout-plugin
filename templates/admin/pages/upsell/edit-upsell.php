<?php

$upsell_id = '';
if (isset($_GET['id'])) {
    $upsell_id = $_GET['id'];
}

global $wpdb;

$args = array(
    'post_type' => 'product',
    'posts_per_page' => -1
);
$products = get_posts($args);

$categories = get_terms( ['taxonomy' => 'product_cat'] );

$sql = $wpdb->prepare("SELECT * FROM {$wpdb->prefix}ic_upsells
        WHERE `ID` = %d;", $upsell_id);
$result = $wpdb->get_results($sql);
$ic_upsell = $result[0];

//$sql = $wpdb->prepare("SELECT `option_value` FROM {$wpdb->prefix}ic_us_options
//        WHERE `option_name` = 'product'
//        AND `upsell_id` = %d;", $upsell_id);
//$products_upsell = $wpdb->get_results($sql);
//
//$sql = $wpdb->prepare("SELECT `option_value` FROM {$wpdb->prefix}ic_us_options
//        WHERE `option_name` = 'trigger'
//        AND `upsell_id` = %d;", $upsell_id);
//$triggers = $wpdb->get_results($sql);

//$sql = $wpdb->prepare("SELECT `option_value` FROM {$wpdb->prefix}ic_us_options
//        WHERE `option_name` = 'product_cat'
//        AND `upsell_id` = %d;", $upsell_id);
//$products_cats_upsell = $wpdb->get_results($sql);
//
//$sql = $wpdb->prepare("SELECT `option_value` FROM {$wpdb->prefix}ic_us_options
//        WHERE `option_name` = 'trigger_cat'
//        AND `upsell_id` = %d;", $upsell_id);
//$triggers_cats = $wpdb->get_results($sql);

$priority0 = '';
$priority1 = '';
$priority2 = '';
switch ($ic_upsell->priority) {
    case '0': $priority0 = 'selected'; break;
    case '1': $priority1 = 'selected'; break;
    case '2': $priority2 = 'selected'; break;
    default: break;
}

?>
<div id="app">
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
                        <a class="nav-link" href="<?php menu_page_url('mcheckout-payments'); ?>"">Payments</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php menu_page_url('mcheckout-design'); ?>"">Design</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="<?php menu_page_url('mcheckout-upsells'); ?>"">Upsells</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php menu_page_url('mcheckout-discounts'); ?>"">Discounts</a>
                    </li>
                </ul>
            </div>
            <div class="tab-content py-3 col-md-10">

                <form id="edit-upsell" method="POST" action="<?php echo admin_url('admin.php'); ?>">

                    <div class="row first-row">
                        <div class="col-md-6">
                            <div class="page-title">
                                <h5>Home<i class="fa-regular fa-angle-right"></i>Upsells<i class="fa-regular fa-angle-right"></i><?php echo esc_attr($ic_upsell->title); ?></h5>
                                <h2><button type="button" class="button-back"><i class="fa-regular fa-angle-left"></i></button> <?php echo esc_attr($ic_upsell->title); ?>
                                            <label for="active" class="switch upsell-switch" id="<?php echo $upsell_id; ?>">
                                                <input class="active-input" type="checkbox" id="active" name="active" <?php echo ($ic_upsell->active == '1') ? 'checked' : ''; ?>>
                                                <span class="slider round"></span>
                                            </label></h2>
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

                    <input type="hidden" id="upsell-id" name="upsell-id" value="<?php echo esc_attr($upsell_id); ?>">

                    <div class="row upsell-edit-row1 form-group upsell-form-group">
                        <div class="col-7">
                            <h3 class="upsell-head">Upsell Properties</h3>
                            <div class="upsell-desc">
                                In the case that two or more upsells are present, the
                                system will chose the upsell with the highest priority.
                            </div>

                            <!-- Button trigger modal -->
                            <button type="button" class="upsell-edit-button preview-upsell" data-bs-toggle="modal" data-bs-target="#upsellPreview">
                                Preview upsell
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="upsellPreview" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <nav>
                                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                                    <button class="nav-link active" id="cart-checkout-tab" data-bs-toggle="tab" data-bs-target="#cart-checkout" type="button" role="tab" aria-controls="cart-checkout" aria-selected="true">Mini cart & Checkout</button>
                                                    <button class="nav-link" id="post-purchase-tab" data-bs-toggle="tab" data-bs-target="#post-purchase" type="button" role="tab" aria-controls="post-purchase" aria-selected="false">Post-purchase</button>
                                                </div>
                                            </nav>
                                            <div class="tab-content" id="nav-tabContent">
                                                <div class="tab-pane fade show active" id="cart-checkout" role="tabpanel" aria-labelledby="cart-checkout-tab">
                                                    <div class="upsell-preview"></div>
                                                </div>
                                                <div class="tab-pane fade" id="post-purchase" role="tabpanel" aria-labelledby="post-purchase-tab">
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

                        </div>
                        <div class="col-5 upsell-edit-left-box">
                            <div class="upsell-box">
                                <div class="upsell-box-text">
                                    My upsells
                                </div>
                                <input type="text" name="title" placeholder="<?php echo esc_attr($ic_upsell->title); ?>"
                                       value="<?php echo esc_attr($ic_upsell->title); ?>"
                                       class="upsell-edit-my-upsells">
                                <label for="Priority"></label>
                                <select name="priority" id="select-priority">
                                    <option value="0" <?php echo $priority0; ?>>High Priority Upsell</option>
                                    <option value="1" <?php echo $priority1; ?>>Medium Priority Upsell</option>
                                    <option value="2" <?php echo $priority2; ?>>Low Priority Upsell</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row upsell-edit-row2 form-group upsell-form-group">
                        <div class="col-7">
                            <h3 class="upsell-head">Upsell Triggers</h3>
                            <div class="upsell-desc">
                                The triggers are the items that need to be part of the
                                order, for the post purchase upsells to show.
                            </div>
                        </div>
                        <div class="col-5 upsell-edit-left-box">
                            <div class="added-triggers-cont"></div>
                            <div class="added-triggers-collections-cont"></div>
                            <div class="upsell-edit-actions">
                                <div class="upsell-desc upsell-edit-actions1">Actions</div>
                                <div class="upsell-edit-actions2">
                                    <button type="button" class="btn btn-primary upsell-edit-triggers-add-btn"
                                            data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        <i class="fa-solid fa-plus"></i> Add products
                                    </button>
                                    <div class="modal fade triggers-modal" id="exampleModal" tabindex="-1"
                                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Select product for
                                                        your upsell offer</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="modal-top-body">
                                                        <p class="triggers-selected"><span>0</span> products selected
                                                        </p>
                                                        <p class="select-all-triggers">Select all
                                                            <span><?php echo (int)wp_count_posts('product')->publish; ?></span>
                                                        </p>
                                                        <input type="text" id="search-us-triggers"  placeholder="Search for products">
                                                    </div>
                                                    <div class="modal-middle-body triggers-middle">
                                                        <?php foreach ($products as $product) :
                                                            $wc_product=wc_get_product($product->ID);
                                                           // echo $wc_product;
                                                            $variations = $wc_product->get_children();

                                                            if ($variations):
                                                                ?>
                                                                <div class="single-product-trigger">
                                                                    <input type="checkbox"
                                                                           value="<?php echo $product->ID; ?>">
                                                                    <?php
                                                                    $image = wp_get_attachment_image_src(get_post_thumbnail_id($product->ID), 'single-post-thumbnail');
                                                                    if ($image) :
                                                                        ?>
                                                                        <img width="32" height="32"
                                                                             src="<?php echo $image[0]; ?>" alt="">
                                                                    <?php else : ?>
                                                                        <img width="32" height="32" src="<?php echo plugins_url() . '/mediya-checkout/assets/images/woocommerce-placeholder.png'; ?>" alt="">
                                                                    <?php endif; ?>
                                                                    <p><?php echo $product->post_title; ?></p>
                                                                </div>
                                                                <?php
                                                                foreach ($variations as $variation):
                                                                    $singleVar = wc_get_product(intval($variation));
                                                                    $varName = $singleVar->get_name();
                                                                    $varId = $singleVar->get_id();
                                                                    ?>
                                                                    <div class="single-product-trigger">
                                                                        <input type="checkbox" value="<?php echo $varId; ?>">
                                                                        <?php
                                                                        $image = wp_get_attachment_image_src(get_post_thumbnail_id($varId), 'single-post-thumbnail');
                                                                        ?>

                                                                        <?php
                                                                        if (!$image):
                                                                            $image = wp_get_attachment_image_src(get_post_thumbnail_id($product->ID), 'single-post-thumbnail');
                                                                        ?>
                                                                        <?php endif; ?>
                                                                        <?php
                                                                        if ($image) :
                                                                            ?>
                                                                            <img width="32" height="32"
                                                                                 src="<?php echo $image[0]; ?>" alt="">
                                                                        <?php else : ?>
                                                                            <img width="32" height="32" src="<?php echo plugins_url() . '/mediya-checkout/assets/images/woocommerce-placeholder.png'; ?>" alt="">
                                                                        <?php endif; ?>
                                                                        <p><?php echo $varName; ?></p>
                                                                    </div>
                                                                <?php endforeach; ?>
                                                            <?php else :  ?>
                                                                <div class="single-product-trigger">
                                                                    <input type="checkbox"
                                                                           value="<?php echo $product->ID; ?>">
                                                                    <?php
                                                                    $image = wp_get_attachment_image_src(get_post_thumbnail_id($product->ID), 'single-post-thumbnail');
                                                                    if ($image) :
                                                                        ?>
                                                                        <img width="32" height="32"
                                                                             src="<?php echo $image[0]; ?>" alt="">
                                                                    <?php else : ?>
                                                                        <img width="32" height="32" src="<?php echo plugins_url() . '/mediya-checkout/assets/images/woocommerce-placeholder.png'; ?>" alt="">
                                                                    <?php endif; ?>
                                                                    <p><?php echo $product->post_title; ?></p>
                                                                </div>
                                                            <?php endif; ?>
                                                        <?php endforeach; ?>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button"
                                                            class="btn btn-secondary upsell-create-modal-btn-cancel"
                                                            data-bs-dismiss="modal">Cancel
                                                    </button>
                                                    <button type="button"
                                                            class="btn btn-primary add-triggers upsell-create-modal-btn-add"
                                                            data-bs-dismiss="modal"><i class="fa-solid fa-plus"></i> Add
                                                        products
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="button" class="upsell-edit-button upsell-edit-button-actions2" data-bs-toggle="modal" data-bs-target="#collectionTrigger"><i
                                                class="fa-solid fa-plus"></i> Add collections
                                    </button>
                                    <div class="modal fade triggers-modal" id="collectionTrigger" tabindex="-1"
                                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Select categories for
                                                        your upsell offer</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="modal-top-body">
                                                        <p class="triggers-collection-selected"><span>0</span> categories selected
                                                        </p>
                                                        <p class="select-all-triggers-collections">Select all
                                                            <span><?php echo count($categories); ?></span>
                                                        </p>
                                                        <input type="text" id="search-us-triggers-categories" placeholder="Search for categories">
                                                    </div>
                                                    <div class="modal-middle-body triggers-collections-middle">
                                                        <?php foreach ($categories as $category) : ?>
                                                            <div class="single-category-product-trigger">
                                                                <input type="checkbox"
                                                                       value="<?php echo $category->term_id; ?>">
                                                                <?php
                                                                //                                                                $image = wp_get_attachment_image_src(get_post_thumbnail_id($product->ID), 'single-post-thumbnail');
                                                                //                                                                if ($image) :
                                                                //                                                                    ?>
                                                                <!--                                                                    <img width="32" height="32"-->
                                                                <!--                                                                         src="--><?php //echo $image[0]; ?><!--" alt="">-->
                                                                <!--                                                                --><?php //else : ?>
                                                                <!--                                                                    <img width="32" height="32" src="#" alt="">-->
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
                                                            class="btn btn-primary add-collection-triggers upsell-create-modal-btn-add"
                                                            data-bs-dismiss="modal"><i class="fa-solid fa-plus"></i> Add
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
                    <div class="row upsell-edit-row3 form-group upsell-form-group">
                        <div class="col-7">
                            <h3 class="upsell-head">Upsell Products</h3>
                            <div class="upsell-desc">
                                After payment, the app will build a funnel and show every item one by one, asking if the
                                customer wants to purchase it directly.
                            </div>
                        </div>
                        <div class="col-5 upsell-edit-left-box">
                            <div class="added-products-cont"></div>
                            <div class="added-products-collections-cont"></div>
                            <div class="upsell-edit-actions">
                                <div class="upsell-desc upsell-edit-actions1">Actions</div>
                                <button type="button" class="btn btn-primary upsell-edit-triggers-add-btn"
                                        data-bs-toggle="modal" data-bs-target="#exampleModal2">
                                    <i class="fa-solid fa-plus"></i> Add products
                                </button>
                                <div class="modal fade products-modal" id="exampleModal2" tabindex="-1"
                                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Select product for your
                                                    upsell offer</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="modal-top-body">
                                                    <p class="products-selected"><span>0</span> products selected</p>
                                                    <p class="select-all-products">Select all
                                                        <span><?php echo (int)wp_count_posts('product')->publish; ?></span>
                                                    </p>
                                                    <input type="text" id="search-us-products" placeholder="Search for products">
                                                </div>
                                                <div class="modal-middle-body products-middle">
                                                    <?php foreach ($products as $product) :
                                                        $wc_product=wc_get_product($product->ID);
                                                        $variations = $wc_product->get_children();
                                                        if ($variations):
                                                            foreach ($variations as $variation):
                                                                $singleVar = wc_get_product(intval($variation));
                                                                $varName = $singleVar->get_name();
                                                                $varId = $singleVar->get_id();
                                                                ?>
                                                                <div class="single-product-product">
                                                                    <input type="checkbox" value="<?php echo $varId; ?>">
                                                                    <?php
                                                                    $image = wp_get_attachment_image_src(get_post_thumbnail_id($varId), 'single-post-thumbnail');
                                                                    if (!$image){
                                                                        $image = wp_get_attachment_image_src(get_post_thumbnail_id($product->ID), 'single-post-thumbnail');
                                                                    }
                                                                    if ($image) :
                                                                        ?>
                                                                        <img width="32" height="32" src="<?php echo $image[0]; ?>"
                                                                             alt="">
                                                                    <?php else : ?>
                                                                        <img width="32" height="32" src="<?php echo plugins_url() . '/mediya-checkout/assets/images/woocommerce-placeholder.png'; ?>" alt="">
                                                                    <?php endif; ?>
                                                                    <p><?php echo $varName; ?></p>
                                                                </div>
                                                            <?php endforeach;?>
                                                        <?php else:  ?>
                                                            <div class="single-product-product">
                                                                <input type="checkbox" value="<?php echo $product->ID; ?>">
                                                                <?php
                                                                $image = wp_get_attachment_image_src(get_post_thumbnail_id($product->ID), 'single-post-thumbnail');
                                                                if ($image) :
                                                                    ?>
                                                                    <img width="32" height="32" src="<?php echo $image[0]; ?>"
                                                                         alt="">
                                                                <?php else : ?>
                                                                    <img width="32" height="32" src="<?php echo plugins_url() . '/mediya-checkout/assets/images/woocommerce-placeholder.png'; ?>" alt="">
                                                                <?php endif; ?>
                                                                <p><?php echo $product->post_title; ?></p>
                                                            </div>
                                                        <?php endif; ?>
                                                    <?php endforeach; ?>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn upsell-create-modal-btn-cancel"
                                                        data-bs-dismiss="modal">Cancel
                                                </button>
                                                <button type="button" class="btn add-products upsell-create-modal-btn-add"
                                                        data-bs-dismiss="modal"><i class="fa-solid fa-plus"></i> Add
                                                    products
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button type="button" class="upsell-edit-button upsell-edit-button-actions2" data-bs-toggle="modal" data-bs-target="#collectionProduct"><i
                                            class="fa-solid fa-plus"></i> Add collections
                                </button>
                                <div class="modal fade triggers-modal" id="collectionProduct" tabindex="-1"
                                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Select categories for
                                                    your upsell offer</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="modal-top-body">
                                                    <p class="products-collection-selected"><span>0</span> categories selected
                                                    </p>
                                                    <p class="select-all-products-collections">Select all
                                                        <span><?php echo count($categories); ?></span>
                                                    </p>
                                                    <input type="text" id="search-us-products-categories"  placeholder="Search for products">
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
                                                            <!--                                                                         src="--><?php //echo $image[0]; ?><!--" alt="">-->
                                                            <!--                                                                --><?php //else : ?>
                                                            <!--                                                                    <img width="32" height="32" src="#" alt="">-->
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
                                                        data-bs-dismiss="modal"><i class="fa-solid fa-plus"></i> Add
                                                    collections
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row upsell-edit-row4 form-group upsell-form-group">
                        <div class="col-7">
                            <h3 class="upsell-head">Upsell Placing</h3>
                            <div class="upsell-desc">
                                Choose the segments where you want this upsell offer to appear.
                            </div>
                        </div>
                        <div class="col-5 upsell-edit-left-box">
                            <div class="upsell-edit-checkbox">
                                <input type="checkbox" id="checkout-page"
                                       name="checkout-page" <?php echo ($ic_upsell->checkout_page == '1') ? 'checked' : ''; ?>>
                                <label for="checkout-page">Checkout Page</label>
                            </div>
                            <div class="upsell-edit-checkbox">
                                <input type="checkbox" id="cart-page"
                                       name="cart-page" <?php echo ($ic_upsell->cart_page == '1') ? 'checked' : ''; ?>>
                                <label for="cart-page">Cart Page</label>
                            </div>
                            <div class="upsell-edit-checkbox">
                                <input type="checkbox" id="before-ty-page"
                                       name="before-ty-page" <?php echo ($ic_upsell->before_ty_page == '1') ? 'checked' : ''; ?>>
                                <label for="before-ty-page">Post-purchase</label>
                            </div>
                        </div>
                    </div>

                    <input id="edit-upsell-add-btn" type="button" value="Save" class="upsell-edit-button edit-upsell-admin-page"/>
                </form>
            </div>
        </div>
    </div>
</div>