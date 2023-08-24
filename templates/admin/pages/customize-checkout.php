<?php

$args = array(
    'post_type' => 'product',
    'posts_per_page' => -1
);
$products = get_posts($args);

?>
<div class="app-inner">

    <div class="row first-row">
        <div class="page-title">
            <h5>Home<i class="fa-regular fa-angle-right"></i>Design</h5>
            <h2>Design</h2>
        </div>

        <div class="popup-test"></div>

        <form id="cc-form" method="post" action="options.php">
            <?php

            echo '<div class="row">';
            do_settings_sections('mcheckout-design');
            settings_fields('ic_design');
            echo '</div><div class="design-buttons"><p class="preview-design">Preview <i class="fa-solid fa-arrow-up-right-from-square"></i></p>';
            submit_button('Save');
            echo '</div></div></div>'

            ?>
        </form>

        <div class="modal fade triggers-modal" id="customProductsModal" tabindex="-1"
             aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Select product for your upsell offer</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="modal-top-body">
                            <p class="triggers-selected"><span>0</span> products selected</p>
                            <p class="select-all-triggers">Select all
                                <span><?php echo (int)wp_count_posts('product')->publish; ?></span></p>
                            <input type="text" id="search-us-triggers" placeholder="Search for products">
                        </div>
                        <div class="modal-middle-body triggers-middle">
                            <?php foreach ($products as $product) : ?>
                                <div class="single-product-trigger">
                                    <input type="checkbox" value="<?php echo $product->ID; ?>">
                                    <?php
                                    $image = wp_get_attachment_image_src(get_post_thumbnail_id($product->ID), 'single-post-thumbnail');
                                    if ($image) :
                                        ?>
                                        <img width="32" height="32" src="<?php echo $image[0]; ?>" alt="">
                                    <?php else : ?>
                                        <img width="32" height="32"
                                             src="' + urls.plugin_url + '/assets/images/woocommerce-placeholder.png' + '"
                                             alt="">
                                    <?php endif; ?>
                                    <p><?php echo $product->post_title; ?></p>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary upsell-create-modal-btn-cancel"
                                data-bs-dismiss="modal">Cancel
                        </button>
                        <button type="button"
                                class="btn btn-primary add-triggers add-custom-products upsell-create-modal-btn-add"
                                data-bs-dismiss="modal"><i class="fa-solid fa-plus"></i> Add products
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="sectionsModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"> Section</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" id="design-modal-body-content">
                    </div>
                    <div class="modal-footer" id="design-modal-body-footer">
                        <a class="btn" data-bs-dismiss="modal">Close</a>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="previewCheckout1Modal" tabindex="-1" aria-labelledby="previewCheckout1Modal"
             aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Preview <img data-bs-toggle="modal" data-bs-target="#previewCheckout1Modal" src="<?php echo plugins_url() . '/mediya-checkout/assets/images/review.svg'; ?>" alt="review checkout" width="12"></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" id="design-modal-body-content">
                        <?php include( WP_PLUGIN_DIR . '/mediya-checkout/templates/admin/previews/checkouts/c1.php' ); ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="previewCheckout2Modal" tabindex="-1" aria-labelledby="previewCheckout2Modal"
             aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Preview <img data-bs-toggle="modal" data-bs-target="#previewCheckout1Modal" src="<?php echo plugins_url() . '/mediya-checkout/assets/images/review.svg'; ?>" alt="review checkout" width="12"></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" id="design-modal-body-content">
                        <?php include( WP_PLUGIN_DIR . '/mediya-checkout/templates/admin/previews/checkouts/c3.php' ); ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="previewDesign" tabindex="-1" aria-labelledby="previewMiniCart" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Preview <img data-bs-toggle="modal" data-bs-target="#previewCheckout1Modal" src="<?php echo plugins_url() . '/mediya-checkout/assets/images/review.svg'; ?>" alt="review checkout" width="12"></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" id="design-modal-body-content">
                        <div class="col-md-12">
                            <div class="design-modal-nav">
                                <span id="checkout">Checkout</span>
                                <span class="active" id="minicart">Mini cart</span>
                                <span id="thankyoupage" >Thank you page</span>
                                <div class="nav-modal-border"></div>
                            </div>
                            <div class="section-modal-cont" id="section-modal-checkout">
                                <?php include(WP_PLUGIN_DIR . '/mediya-checkout/templates/admin/previews/checkout.php'); ?>
                            </div>
                            <div class="section-modal-cont active" id="section-modal-minicart">
                                <?php include(WP_PLUGIN_DIR . '/mediya-checkout/templates/admin/previews/mini-cart.php'); ?>
                            </div>
                            <div class="section-modal-cont" id="section-modal-thankyoupage">
                                <?php include(WP_PLUGIN_DIR . '/mediya-checkout/templates/admin/previews/ty.php'); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

