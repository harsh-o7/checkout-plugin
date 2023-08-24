<?php
$args = array(
    'post_type' => 'product',
    'posts_per_page' => -1
);
$products = get_posts($args);

?>

<div class="added-triggers-cont"></div>
<div class="upsell-create-actions">
    <div class="upsell-desc upsell-edit-actions1">Actions</div>
    <div class="upsell-edit-actions2">
        <button type="button" class="btn btn-primary upsell-edit-triggers-add-btn"
                data-bs-toggle="modal" data-bs-target="#exampleModal">
            Add products
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
                            <?php foreach ($products as $product) : ?>
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
                                        <img width="32" height="32" src="#" alt="">
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
                                class="btn btn-primary add-triggers upsell-create-modal-btn-add"
                                data-bs-dismiss="modal"><i class="fa-solid fa-plus"></i> Add
                            products
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <button class="upsell-edit-button upsell-edit-button-actions2"><i
                    class="fa-solid fa-plus"></i> Add collections
        </button>
    </div>
</div>
</div>