let miniCartToggles = document.querySelectorAll('.ic-mini-cart-toggle');
let miniCartWrapper = document.querySelector('.ic-mini-cart-wrapper');
let miniCartFloating = document.querySelector('.ic-mini-cart-floating');
const errorIconMC ='<svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14" fill="none">\n' +
    '<path fill-rule="evenodd" clip-rule="evenodd" d="M7 14C3.13401 14 0 10.866 0 7C0 3.13401 3.13401 0 7 0C10.866 0 14 3.13401 14 7C14 10.866 10.866 14 7 14ZM7 11.8125C7.72487 11.8125 8.3125 11.2249 8.3125 10.5C8.3125 9.77513 7.72487 9.1875 7 9.1875C6.27513 9.1875 5.6875 9.77513 5.6875 10.5C5.6875 11.2249 6.27513 11.8125 7 11.8125ZM7 1.75C6.51675 1.75 6.125 2.14175 6.125 2.625V7C6.125 7.48325 6.51675 7.875 7 7.875C7.48325 7.875 7.875 7.48325 7.875 7V2.625C7.875 2.14175 7.48325 1.75 7 1.75Z" fill="#F04438"/>\n' +
    '</svg>';
function insertAfterTr(newNode, existingNode) {
   existingNode.parentNode.insertBefore(newNode, existingNode.nextSibling);
}

if(miniCartFloating && miniCartWrapper) {
   miniCartFloating.addEventListener('click', function() {
      miniCartWrapper.classList.add('active');
      jQuery.ajax({
         type: 'GET',
         url: urls.ajax_url,
         data: {
            action: 'ic_get_refreshed_mini_cart',
            nonce: nonces.get_refreshed_mini_cart
         },
         beforeSend: function() {
            document.querySelector('.loader').classList.add('active');
         },
         success: function(response) {
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
            document.querySelector('.loader').classList.remove('active');
         }
      });
   });
}

if(miniCartToggles && miniCartWrapper) {
   miniCartToggles.forEach((singleToggle) => {
      singleToggle.addEventListener('click', function() {
         miniCartWrapper.classList.toggle('active');
         jQuery.ajax({
            type: 'GET',
            url: urls.ajax_url,
            data: {
               action: 'ic_get_refreshed_mini_cart',
               nonce: nonces.get_refreshed_mini_cart
            },
            beforeSend: function() {
               document.querySelector('.loader').classList.add('active');
            },
            success: function(response) {
               document.querySelector('.ic-mini-cart-wrapper').innerHTML = '';
               document.querySelector('.ic-mini-cart-wrapper').innerHTML = response;
               addExitListener();
               addToCartClickListener();
               createSlider();
               addUpsellListener();
               addPlusMinusListeners();
               //addCouponAjax();
               //removeCouponAjax();
               document.querySelector('.loader').classList.remove('active');
            }
         });
      });
   });
}

let contTemp = document.querySelector('ul.wp-block-page-list');
if(contTemp) {
   let miniCartTemp = document.createElement('li');
   miniCartTemp.classList.add('ic-mini-cart-icon');
   miniCartTemp.innerHTML = '<i class="fa-sharp ic-mini-cart-toggle fa-solid fa-cart-shopping"></i>';
   contTemp.appendChild(miniCartTemp);
   miniCartTemp.addEventListener('click', function() {
      miniCartWrapper.classList.toggle('active');
      jQuery.ajax({
         type: 'GET',
         url: urls.ajax_url,
         data: {
            action: 'ic_get_refreshed_mini_cart',
            nonce: nonces.get_refreshed_mini_cart
         },
         beforeSend: function() {
            document.querySelector('.loader').classList.add('active');
         },
         success: function(response) {
            document.querySelector('.ic-mini-cart-wrapper').innerHTML = '';
            document.querySelector('.ic-mini-cart-wrapper').innerHTML = response;
            addExitListener();
            addToCartClickListener();
            createSlider();
            addUpsellListener();
            addPlusMinusListeners()
            //addCouponAjax();
            //removeCouponAjax();
            document.querySelector('.loader').classList.remove('active');
         }
      });
   });
}

function addExitListener() {
   let miniCartOverlay = document.querySelector('.ic-mini-cart-overlay');


   miniCartOverlay.addEventListener('click', function () {
      jQuery.ajax({
         type: 'GET',
         url: urls.ajax_url,
         data: {
            action: 'ic_get_cart_quantity',
            nonce: nonces.ic_get_cart_quantity
         },
         success: function(response) {
            let cartQuantity = parseInt(JSON.parse(response));
            let cartQuantityHolder = document.querySelector('.ic-mini-cart-floating-quantity-number');
            if (cartQuantity === 0){
               cartQuantityHolder.classList.remove('active');
               cartQuantityHolder.innerText = cartQuantity;
            }else{
               cartQuantityHolder.classList.add('active');
               cartQuantityHolder.innerText = cartQuantity;
            }
         }
      });
      miniCartWrapper.classList.remove('active');
   });

   //This part is for when user clicks outside of opened cart on a desktop and wants to close the cart
   // document.addEventListener('click', function(event) {
   //    if (event.target.closest('.ic-mini-cart-wrapper') && !event.target.closest('.ic-mini-cart-inner')) {
   //       document.querySelector('.ic-exit-mini-cart').click();
   //    }
   // });

   document.querySelector('.ic-exit-mini-cart').addEventListener('click', function() {
      jQuery.ajax({
         type: 'GET',
         url: urls.ajax_url,
         data: {
            action: 'ic_get_cart_quantity',
            nonce: nonces.ic_get_cart_quantity
         },
         success: function(response) {
            let cartQuantity = parseInt(JSON.parse(response));
            let cartQuantityHolder = document.querySelector('.ic-mini-cart-floating-quantity-number');
            if (cartQuantity === 0){
               cartQuantityHolder.classList.remove('active');
               cartQuantityHolder.innerText = cartQuantity;
            }else{
               cartQuantityHolder.classList.add('active');
               cartQuantityHolder.innerText = cartQuantity;
            }
         }
      });
      let wrapper = document.querySelector('.ic-mini-cart-wrapper');
      wrapper.classList.remove('active');
   });
}
addExitListener();

function addCouponAjax() {
   jQuery(document).on('click', '#apply-coupon', function(e) {
      e.preventDefault()
      var coupon = jQuery( 'input#coupon' ).val();
      var button = ( this );
      var data = {
         action: 'ic_apply_coupon_code_update_mini_cart',
         nonce: nonces.apply_coupon_code_update_mini_cart,
         coupon_code: coupon
      };

      jQuery.ajax({
         type: 'POST',
         dataType: 'html',
         url: wc_add_to_cart_params.ajax_url,
         data: data,
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
            addPlusMinusListeners()
            document.querySelector('.loader').classList.remove('active');
            progressBar();
         },
         error: function (errorThrown) {
            console.log(errorThrown);
         }
      });
   });
}
addCouponAjax();

function removeCouponAjax() {
   jQuery(document).on('click', 'a.woocommerce-remove-coupon', function(e) {
      e.preventDefault()
      var coupon = document.querySelector('.ic-mini-cart-wrapper .cart-discount').id;
      var button = ( this );
      var data = {
         action: 'ic_remove_coupon_code_update_mini_cart',
         nonce: nonces.remove_coupon_code_update_mini_cart,
         coupon_code: coupon
      };

      jQuery.ajax({
         type: 'POST',
         dataType: 'html',
         url: urls.ajax_url,
         data: data,
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
            addPlusMinusListeners()
            document.querySelector('.loader').classList.remove('active');
            progressBar();
         },
         error: function (errorThrown) {
            console.log(errorThrown);
         }
      });
   });
}
removeCouponAjax();

function addUpsellListener() {
   let addButtons = document.querySelectorAll('.mini-cart-single-product .add_to_cart_button');
   addButtons.forEach((addButton) => {
      addButton.addEventListener('click', function () {

         let productId = addButton.dataset.product_id;
         let salePrice = addButton.parentElement.parentElement.querySelector('.us-slide-title-price .sale-price');
         let price;
         if(salePrice) {
            price = salePrice.dataset.price;
         } else {
            price = addButton.parentElement.parentElement.querySelector('.us-slide-title-price p').innerText;
            price = price.trim().substring(1);
         }
         let upsellId = addButton.parentElement.parentElement.dataset.us_id;

         let upsell = {
            upsell_id: upsellId,
            price: price,
            product_id: productId,
            qty:1
         }
         let upsells = JSON.parse(localStorage.getItem('upsells'));
         if(upsells !== null && upsells.length > 0) {
            if (upsells.some(e=>e.upsell_id === upsellId)){
               let upsellExisting = upsells.find(el=>el.upsell_id===upsellId);
               upsellExisting.qty+=1;
            }else{
               upsells.push(upsell);
            }
         } else {
            upsells = [upsell];
         }
         localStorage.setItem('upsells', JSON.stringify(upsells));
      });
   });
}
addUpsellListener();

jQuery(document).on('click', '.mini_cart_item a.remove', function (e)
{
   e.preventDefault();

   var product_id = jQuery(this).attr("data-product_id"),
       cart_item_key = jQuery(this).attr("data-cart_item_key"),
       liCont = this.parentElement;
   let variation_id = jQuery(this).attr("data-variation_id");

   let upsells = JSON.parse(localStorage.getItem('upsells'));
   if(upsells != null && upsells.length > 0) {
      if (parseInt(variation_id) > 0 ) {
         upsells = upsells.filter(us => us.product_id != parseInt(variation_id));
      }else
      {
         upsells = upsells.filter(us => us.product_id != parseInt(product_id));
      }
         localStorage.setItem('upsells', JSON.stringify(upsells));
   }

   jQuery.ajax({
      type: 'POST',
      url: urls.ajax_url,
      data: {
         action: 'ic_remove_product_update_mini_cart',
         nonce: nonces.remove_product_update_mini_cart,
         product_id: product_id,
         cart_item_key: cart_item_key
      },
      beforeSend: function() {
         let num = liCont.querySelector('.qty-qty-cont');
         num.innerText = 0;
         let singleLoader = liCont.querySelector('.mini-cart-single-loader');
         let circleNum = liCont.querySelector('.quantity');
         circleNum.innerText = 0;
         singleLoader.classList.add('active');
         liCont.classList.add('loading');
         document.querySelector('.ic-mini-cart-inner').classList.add('loading');
      },
      success: function(response) {
         document.querySelector('.ic-mini-cart-wrapper').innerHTML = '';
         document.querySelector('.ic-mini-cart-wrapper').innerHTML = response;
         addExitListener();
         addToCartClickListener();
         progressBar();
         createSlider();
         addUpsellListener();
         addPlusMinusListeners();
         //addCouponAjax();
         //removeCouponAjax();
         // document.querySelector('.mini-cart-single-loader.active').classList.remove('active');
         // document.querySelector('.ic-mini-cart-wrapper .woocommerce-mini-cart-item.loading').classList.remove('loading');
      }
   });
});



function addPlusMinusListeners() {
   let spansMinusQty = document.querySelectorAll('.ic-mini-cart-wrapper .quantity-counter .minus-qty');
   spansMinusQty.forEach((spanMinusQty) => {
      spanMinusQty.addEventListener('click', function() {
         let productId = spanMinusQty.parentElement.parentElement.querySelector('a.remove').dataset.product_id;
         let variationId = spanMinusQty.parentElement.parentElement.querySelector('a.remove').dataset.variation_id;

         let qty = spanMinusQty.parentElement.querySelector('.qty-qty-cont').innerText;
         if(parseInt(qty) == 1) {
            spanMinusQty.parentElement.parentElement.querySelector('a.remove').click();
         } else {
            let upsells = JSON.parse(localStorage.getItem('upsells'));
            if(upsells != null && upsells.length > 0) {
               if (parseInt(variationId) > 0) {
                  if (upsells.some(e=>e.product_id === variationId)){
                     let upsellExisting = upsells.find(el=>el.product_id===variationId);
                     upsellExisting.qty-=1;
                  }
               } else if(upsells.some(e=>e.product_id === productId)) {
                  let upsellExisting = upsells.find(el=>el.product_id===productId);
                  upsellExisting.qty-=1;
               }
               localStorage.setItem('upsells', JSON.stringify(upsells));
            }
            jQuery.ajax({
               type: 'POST',
               url: urls.ajax_url,
               data: {
                  action: 'ic_reduce_product_qty',
                  nonce: nonces.reduce_product_qty,
                  productId: productId,
                  variationId: variationId
               },
               beforeSend: function() {
                  let num = spanMinusQty.parentElement.querySelector('.qty-qty-cont');
                  num.innerText = parseInt(num.innerText) - 1;
                  let liCont = spanMinusQty.parentElement.parentElement;
                  let singleLoader = liCont.querySelector('.mini-cart-single-loader');
                  let circleNum = liCont.querySelector('.quantity');
                  circleNum.innerText = parseInt(circleNum.innerText) - 1;
                  singleLoader.classList.add('active');
                  liCont.classList.add('loading');
                  document.querySelector('.ic-mini-cart-inner').classList.add('loading');
               },
               success: function (response) {
                  document.querySelector('.ic-mini-cart-wrapper').innerHTML = '';
                  document.querySelector('.ic-mini-cart-wrapper').innerHTML = response;
                  addExitListener();
                  addToCartClickListener();
                  createSlider();
                  addUpsellListener();
                  addPlusMinusListeners();
                  // document.querySelector('.mini-cart-single-loader.active').classList.remove('active');
                  document.addEventListener('DOMContentLoaded', function() {
                     let element = document.querySelector('.mini-cart-single-loader.active');
                     if(element) {
                         element.classList.remove('active');
                     }
                  });
                  document.addEventListener('DOMContentLoaded', function() {
                  let element = document.querySelector('.ic-mini-cart-wrapper .woocommerce-mini-cart-item.loading');
                  if(element) {
                      element.classList.remove('loading');
                  }
                  });
                  // document.querySelector('.ic-mini-cart-wrapper .woocommerce-mini-cart-item.loading').classList.remove('loading');
                  progressBar();
               }
            });
         }
      });
   });

   let spansPlusQty = document.querySelectorAll('.ic-mini-cart-wrapper .quantity-counter .plus-qty');
   spansPlusQty.forEach((spanPlusQty) => {
      spanPlusQty.addEventListener('click', function() {
         let productId = spanPlusQty.parentElement.parentElement.querySelector('a.remove').dataset.product_id;
         let variationId = spanPlusQty.parentElement.parentElement.querySelector('a.remove').dataset.variation_id;

         jQuery.ajax({
            type: 'POST',
            url: urls.ajax_url,
            data: {
               action: 'ic_increase_product_qty',
               nonce: nonces.increase_product_qty,
               productId: productId,
               variationId: variationId
            },
            beforeSend: function() {
               let num = spanPlusQty.parentElement.querySelector('.qty-qty-cont');
               num.innerText = parseInt(num.innerText) + 1;
               let liCont = spanPlusQty.parentElement.parentElement;
               let singleLoader = liCont.querySelector('.mini-cart-single-loader');
               let circleNum = liCont.querySelector('.quantity');
               circleNum.innerText = parseInt(circleNum.innerText) + 1;
               singleLoader.classList.add('active');
               liCont.classList.add('loading');
               document.querySelector('.ic-mini-cart-inner').classList.add('loading');
            },
            success: function (response) {
               progressBar();
               if (response ==0){

                  let num = spanPlusQty.parentElement.querySelector('.qty-qty-cont');
                  num.innerText = parseInt(num.innerText) - 1;
                  let liCont = spanPlusQty.parentElement.parentElement;
                  let singleLoader = liCont.querySelector('.mini-cart-single-loader');
                  let circleNum = liCont.querySelector('.quantity');
                  circleNum.innerText = parseInt(circleNum.innerText) - 1;
                  singleLoader.classList.remove('active');
                  liCont.classList.remove('loading');
                  document.querySelector('.ic-mini-cart-inner').classList.remove('loading');


                  let errorLi = document.createElement('li');
                  let productName = spanPlusQty.parentElement.parentElement.querySelector('.ic-mini-cart-product-name').innerHTML;
                  let outOfStockMsg = 'is out of stock';
                  let outOfStockLabel = document.querySelector('.custom-text-out-of-stock-msg');
                  if (outOfStockLabel){
                     outOfStockMsg = outOfStockLabel.innerText;
                  }
                  errorLi.innerHTML = '<p style="padding:0; margin-top: 10px; color: #F04438; font-size:14px; font-weight: 400"><span style="font-weight: 500;">' + productName + ' </span>'+outOfStockMsg +' '+errorIconMC+'</p>';
                  insertAfterTr(errorLi, spanPlusQty.parentElement.parentElement);
                  spanPlusQty.classList.add('disabled');

               }else{

                  let upsells = JSON.parse(localStorage.getItem('upsells'));
                  if(upsells != null && upsells.length > 0) {
                     if (parseInt(variationId) > 0) {
                        if (upsells.some(e=>e.product_id === variationId)){
                           let upsellExisting = upsells.find(el=>el.product_id===variationId);
                           upsellExisting.qty+=1;
                        }
                     } else if(upsells.some(e=>e.product_id === productId)) {
                        let upsellExisting = upsells.find(el=>el.product_id===productId);
                        upsellExisting.qty+=1;
                     }
                     localStorage.setItem('upsells', JSON.stringify(upsells));
                  }
                  document.querySelector('.ic-mini-cart-wrapper').innerHTML = '';
                  document.querySelector('.ic-mini-cart-wrapper').innerHTML = response;
                  addExitListener();
                  addToCartClickListener();
                  createSlider();
                  addUpsellListener();
                  addPlusMinusListeners();
                  // document.querySelector('.mini-cart-single-loader.active').classList.remove('active');
                  document.addEventListener('DOMContentLoaded', function() {
                     let element = document.querySelector('.mini-cart-single-loader.active');
                     if(element) {
                         element.classList.remove('active');
                     }
                  });
                  document.addEventListener('DOMContentLoaded', function() {
                     let element = document.querySelector('.ic-mini-cart-wrapper .woocommerce-mini-cart-item.loading');
                     if(element) {
                         element.classList.remove('loading');
                     }
                  });
                  // document.querySelector('.ic-mini-cart-wrapper .woocommerce-mini-cart-item.loading').classList.remove('loading');
               }
            }
         });
      });
   });
}
addPlusMinusListeners()


// const progress = document.querySelector(".progress-done");
// progress.style.width = progress.getAttribute("data-done") + "%";
// progress.style.opacity = 1;


function progressBar() {
   var notice = document.querySelector(".progress-notice");
   jQuery.ajax({
      type: "POST",
      url: urls.ajax_url,
      data: {
         action: "cart_progressbar"
      },
      success: function (response) {
         if(response.empty_cart == false){

            var progress = document.querySelector(".progress-done");
            var notice = document.querySelector(".progress-notice");
            if (notice) {
              if (response && response.hasOwnProperty('percentage_filled') && response.hasOwnProperty('notice')) {
                progress.setAttribute("data-done", response.percentage_filled);
                progress.style.width = progress.getAttribute("data-done") + "%";
                notice.innerHTML = String(response.notice);
              } else {
               //  console.error('Invalid response structure:', response);
              }
            } else {
            //   console.error('Element .progress-notice not found');
            }
         }
      },
      error: function (xhr, status, error) {
         var errorMessage = xhr.status + ': ' + xhr.statusText
         alert('Error - ' + errorMessage);
      }
   });
}