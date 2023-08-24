


<div class="added-products1-cont"></div>
<div></div>
<button type="button" class="btn btn-primary upsell-edit-triggers-add-btn"
        data-bs-toggle="modal" data-bs-target="#exampleModal2">
    Add products
</button>
<div class="modal fade products1-modal" id="exampleModal2" tabindex="-1"
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
                    <p class="products1-selected"><span>0</span> products1 selected</p>
                    <p class="select-all-products1">Select all
                        <span><?php echo (int)wp_count_posts('product')->publish; ?></span>
                    </p>
                    <input type="text" id="search-us-products1">
                </div>
                <div class="modal-middle-body products1-middle">
                    <?php foreach ($products as $product) : ?>
                        <div class="single-product-product">
                            <input type="checkbox" value="<?php echo $product->ID; ?>">
                            <?php
                            $image = wp_get_attachment_image_src(get_post_thumbnail_id($product->ID), 'single-post-thumbnail');
                            if ($image) :
                                ?>
                                <img width="32" height="32" src="<?php echo $image[0]; ?>"
                                     alt="">
                            <?php else : ?>
                                <img width="32" height="32" src="#" alt="">
                            <?php endif; ?>
                            <p><?php echo $product->post_title; ?></p>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn upsell-create-modal-btn-cancel"
                        data-bs-dismiss="modal">Cancel
                </button>
                <button type="button" class="btn add-products11 upsell-create-modal-btn-add"
                        data-bs-dismiss="modal"><i class="fa-solid fa-plus"></i> Add
                    products
                </button>
            </div>
        </div>
    </div>
</div>
