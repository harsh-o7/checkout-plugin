const errorIconICProd ='<svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14" fill="none">\n' +
    '<path fill-rule="evenodd" clip-rule="evenodd" d="M7 14C3.13401 14 0 10.866 0 7C0 3.13401 3.13401 0 7 0C10.866 0 14 3.13401 14 7C14 10.866 10.866 14 7 14ZM7 11.8125C7.72487 11.8125 8.3125 11.2249 8.3125 10.5C8.3125 9.77513 7.72487 9.1875 7 9.1875C6.27513 9.1875 5.6875 9.77513 5.6875 10.5C5.6875 11.2249 6.27513 11.8125 7 11.8125ZM7 1.75C6.51675 1.75 6.125 2.14175 6.125 2.625V7C6.125 7.48325 6.51675 7.875 7 7.875C7.48325 7.875 7.875 7.48325 7.875 7V2.625C7.875 2.14175 7.48325 1.75 7 1.75Z" fill="#F04438"/>\n' +
    '</svg>';

function createSlider() {
    let slider = new Swiper('.ic-upsell-mini-cart-slider', {
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true
        },
    });
}

function addToCartClickListener() {
    let addToCart = document.querySelectorAll('.add_to_cart_button');
    addToCart.forEach((btn) => {
        let events = btn.getAttribute('click-listener');
        if (events == null) {
            btn.setAttribute('click-listener', 'true');
            btn.addEventListener('click', function (e) {
                e.preventDefault();
                let product_qty = btn.dataset.quantity || 1;
                let product_id = btn.dataset.product_id || null;
                let variation_id = 0;
                let data = {
                    action: 'woocommerce_ajax_add_to_cart',
                    product_id: product_id,
                    product_sku: '',
                    quantity: product_qty,
                    variation_id: variation_id,
                };
                
                let productExists = false;
                let placeOfProductInList;
                jQuery.ajax({
                    type: 'post',
                    url: wc_add_to_cart_params.ajax_url,
                    dataType: 'json',
                    data: data,
                    beforeSend: function() {
                        // return;
                        if(btn.parentElement.parentElement.classList.contains('swiper-slide')) {
                            let existingProduct = document.querySelector('.ic-mini-cart-wrapper .mini_cart_item a.remove[data-product_id="' + data.product_id + '"]');
                            let existingVariation = document.querySelector('.ic-mini-cart-wrapper .mini_cart_item a.remove[data-variation_id="' + data.product_id + '"]');
                            if (existingVariation){
                                productExists = true;
                                let liCont = existingVariation.parentElement;
                                placeOfProductInList = liCont;
                                let num = liCont.querySelector('.qty-qty-cont');
                                num.innerText = parseInt(num.innerText) + 1;
                                let singleLoader = liCont.querySelector('.mini-cart-single-loader');
                                let circleNum = liCont.querySelector('.quantity');
                                circleNum.innerText = parseInt(circleNum.innerText) + 1;
                                singleLoader.classList.add('active');
                                liCont.classList.add('loading');
                                document.querySelector('.ic-mini-cart-inner').classList.add('loading');

                            }else if(existingProduct) {
                                productExists = true;
                                let liCont = existingProduct.parentElement;
                                placeOfProductInList = liCont;
                                let num = liCont.querySelector('.qty-qty-cont');
                                num.innerText = parseInt(num.innerText) + 1;
                                let singleLoader = liCont.querySelector('.mini-cart-single-loader');
                                let circleNum = liCont.querySelector('.quantity');
                                circleNum.innerText = parseInt(circleNum.innerText) + 1;
                                singleLoader.classList.add('active');
                                liCont.classList.add('loading');
                                document.querySelector('.ic-mini-cart-inner').classList.add('loading');
                            } else {
                                let swiperSlideLoader = btn.parentElement.parentElement.querySelector('.mini-cart-single-loader');
                                let swiperSlide = btn.parentElement.parentElement;
                                swiperSlideLoader.classList.add('active');
                                swiperSlide.classList.add('loading');
                            }
                        } else {
                            document.querySelector('.loader').classList.add('active');
                            if (!miniCartWrapper.classList.contains('active')) {
                                miniCartWrapper.classList.add('active');
                            }
                        }
                    },
                    success: function (response) {
                        if (response==0){
                            if (productExists){
                                let num = placeOfProductInList.querySelector('.qty-qty-cont');
                                num.innerText = parseInt(num.innerText) - 1;
                                let circleNum = placeOfProductInList.querySelector('.quantity');
                                circleNum.innerText = parseInt(circleNum.innerText) - 1;

                                let singleLoader = placeOfProductInList.querySelector('.mini-cart-single-loader');
                                singleLoader.classList.remove('active');
                                placeOfProductInList.classList.remove('loading');

                                let errorLi = document.createElement('li');

                                let productName = placeOfProductInList.querySelector('.ic-mini-cart-product-name').innerHTML;
                                errorLi.innerHTML = '<p style="padding:0; margin-top: 10px; color: #F04438; font-size:14px; font-weight: 400">There are no more <span style="font-weight: 500;">' + productName + '</span> in stock. '+errorIconICProd+'</p>';
                                insertAfterTr(errorLi, placeOfProductInList);

                                document.querySelector('.ic-mini-cart-inner').classList.remove('loading');
                                btn.classList.add('disabled');

                                let spanPlusBtn = placeOfProductInList.querySelector('.plus-qty');
                                spanPlusBtn.classList.add('disabled');
                            }else{
                                document.querySelector('.loader').classList.remove('active');
                                btn.classList.add('disabled');

                                let swiperSlideLoader = btn.parentElement.parentElement.querySelector('.mini-cart-single-loader');
                                let swiperSlide = btn.parentElement.parentElement;
                                swiperSlideLoader.classList.remove('active');
                                swiperSlide.classList.remove('loading');
                            }
                        }else{
                            jQuery.ajax({
                                type: 'GET',
                                url: urls.ajax_url,
                                data: {
                                    action: 'ic_add_product_update_mini_cart',
                                    nonce: nonces.add_product_update_mini_cart
                                },
                                success: function (response) {
                                    document.querySelector('.ic-mini-cart-wrapper').innerHTML = '';
                                    document.querySelector('.ic-mini-cart-wrapper').innerHTML = response;
                                    addExitListener();
                                    addToCartClickListener();
                                    createSlider();
                                    addUpsellListener();
                                    addPlusMinusListeners()
                                    //addCouponAjax();
                                    //removeCouponAjax();
                                    if (!miniCartWrapper.classList.contains('active')) {
                                        miniCartWrapper.classList.add('active');
                                    }
                                    document.querySelector('.loader').classList.remove('active');
                                    progressBar();
                                    // if(productExists) {
                                    //     document.querySelector('.mini-cart-single-loader.active').classList.remove('active');
                                    //     document.querySelector('.ic-mini-cart-wrapper .woocommerce-mini-cart-item.loading').classList.remove('loading');
                                    // } else {
                                    //     document.querySelector('.loader').classList.remove('active');
                                    // }
                                    
                                }
                            });
                        }
                    },
                });
            });
        }
    });
}

jQuery(document).on('click', '.single_add_to_cart_button', function (e) {
    e.preventDefault();
    let thisbutton = jQuery(this);
    let form = thisbutton.closest('form.cart');
    let id = thisbutton.val();
    let product_qty = form.find('input[name=quantity]').val() || 1;
    let product_id = form.find('input[name=product_id]').val() || id;
    let variation_id = form.find('input[name=variation_id]').val() || 0;
    let data = {
        action: 'woocommerce_ajax_add_to_cart',
        product_id: product_id,
        product_sku: '',
        quantity: product_qty,
        variation_id: variation_id,
    };
    jQuery(document.body).trigger('adding_to_cart', [thisbutton, data]);

    jQuery.ajax({
        type: 'post',
        url: wc_add_to_cart_params.ajax_url,
        dataType: 'json',
        data: data,
        beforeSend: function (response) {
            thisbutton.removeClass('added').addClass('loading');
        },
        complete: function (response) {
            thisbutton.addClass('added').removeClass('loading');
        },
        success: function (response) {
            if (response.error && response.product_url) {
                window.location = response.product_url;
                return;
            } else {
                jQuery(document.body).trigger('added_to_cart', [response.fragments, response.cart_hash, thisbutton]);
            }

            jQuery.ajax({
                type: 'GET',
                url: urls.ajax_url,
                data: {
                    action: 'ic_add_product_update_mini_cart',
                    nonce: nonces.add_product_update_mini_cart
                },
                beforeSend: function() {
                    document.querySelector('.loader').classList.add('active');
                },
                success: function (response) {
                    document.querySelector('.ic-mini-cart-wrapper').innerHTML = '';
                    document.querySelector('.ic-mini-cart-wrapper').innerHTML = response;
                    addExitListener();
                    addToCartClickListener();
                    createSlider();
                    addUpsellListener();
                    addPlusMinusListeners();
                    progressBar();
                    //addCouponAjax();
                    //removeCouponAjax();
                    if (!miniCartWrapper.classList.contains('active')) {
                        miniCartWrapper.classList.add('active');
                    }
                    document.querySelector('.loader').classList.remove('active');
                    progressBar();
                }
            });
        },
    });
});

addToCartClickListener();
createSlider();