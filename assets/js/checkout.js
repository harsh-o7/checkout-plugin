/* global wc_checkout_params */
const errorIcon ='<svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14" fill="none">\n' +
    '<path fill-rule="evenodd" clip-rule="evenodd" d="M7 14C3.13401 14 0 10.866 0 7C0 3.13401 3.13401 0 7 0C10.866 0 14 3.13401 14 7C14 10.866 10.866 14 7 14ZM7 11.8125C7.72487 11.8125 8.3125 11.2249 8.3125 10.5C8.3125 9.77513 7.72487 9.1875 7 9.1875C6.27513 9.1875 5.6875 9.77513 5.6875 10.5C5.6875 11.2249 6.27513 11.8125 7 11.8125ZM7 1.75C6.51675 1.75 6.125 2.14175 6.125 2.625V7C6.125 7.48325 6.51675 7.875 7 7.875C7.48325 7.875 7.875 7.48325 7.875 7V2.625C7.875 2.14175 7.48325 1.75 7 1.75Z" fill="#F04438"/>\n' +
    '</svg>';

let firstNamePlaceholder = 'First name';
let lastNamePlaceholder = 'Last name';
let emailPlaceholder = 'Email';
let streetAddressPlaceholder = 'Street address';
let cityPlaceholder = 'City';
let zipCodePlaceholder = 'Zip code';
let shippingMethodsLabel = 'Shipping';
let couponAppliedMsg = 'Coupon successful';
let couponErrorMsg = 'This coupon code can\'t be applied';
let outOfStockMsg = 'is out of stock';
let apartmentPlaceholder = 'Apartment,suit,etc...';
let stateLabel = 'State';
let addToCartUpsellModal = 'Add to cart';
let completeOrderUpsellModal = 'Complete order';
let addExtrasTitle = 'Add extras to your order';
let addExtrasDescription = 'Thank you! Your order is confirmed, but you can add following item(s).';
let pageTitle;
jQuery(function ($) {

    function changeCustomTexts(){
        let steps  = document.querySelector('.ic-cc-steps');
        if (steps){
            pageTitle = document.querySelector('.custom-test-c-ms-page-title');
            firstNamePlaceholder = document.querySelector('.custom-test-c-ms-first-name');
            lastNamePlaceholder = document.querySelector('.custom-test-c-ms-last-name');
            emailPlaceholder = document.querySelector('.custom-test-c-ms-email');
            streetAddressPlaceholder = document.querySelector('.custom-test-c-ms-address');
            cityPlaceholder = document.querySelector('.custom-test-c-ms-city');
            zipCodePlaceholder = document.querySelector('.custom-test-c-ms-zip-code');
            apartmentPlaceholder = document.querySelector('.custom-test-c-ms-apartment');
            stateLabel = document.querySelector('.custom-test-c-ms-state-label');

            if (document.querySelector('.custom-test-c-ms-out-of-stock')) {
                outOfStockMsg = document.querySelector('.custom-test-c-ms-out-of-stock').innerText;
            }

            if (document.querySelector('.custom-test-c-ms-coupon-applied')) {
                couponAppliedMsg = document.querySelector('.custom-test-c-ms-coupon-applied').innerText;
            }

            if (document.querySelector('.custom-test-c-ms-coupon-error')) {
                couponErrorMsg = document.querySelector('.custom-test-c-ms-coupon-error').innerText;
            }

            if (document.querySelector('.custom-test-c-ms-add-to-cart')) {
                addToCartUpsellModal = document.querySelector('.custom-test-c-ms-add-to-cart').innerText;
            }

            if (document.querySelector('.custom-test-c-ms-complete-order')) {
                completeOrderUpsellModal = document.querySelector('.custom-test-c-ms-complete-order').innerText;
            }

            if (document.querySelector('.custom-test-c-ms-add-extras-title')) {
                addExtrasTitle = document.querySelector('.custom-test-c-ms-add-extras-title').innerText;
            }

            if (document.querySelector('.custom-test-c-ms-add-extras-description')) {
                addExtrasDescription = document.querySelector('.custom-test-c-ms-add-extras-description').innerText;
            }
        } else{
            pageTitle = document.querySelector('.custom-test-c-page-title');
            firstNamePlaceholder = document.querySelector('.custom-test-c-first-name');
            lastNamePlaceholder = document.querySelector('.custom-test-c-last-name');
            emailPlaceholder = document.querySelector('.custom-test-c-email');
            streetAddressPlaceholder = document.querySelector('.custom-test-c-address');
            cityPlaceholder = document.querySelector('.custom-test-c-city');
            zipCodePlaceholder = document.querySelector('.custom-test-c-zip-code');
            apartmentPlaceholder = document.querySelector('.custom-test-c-apartment');
            stateLabel = document.querySelector('.custom-test-c-state-label');

            if (document.querySelector('.custom-test-c-add-extras-title')) {
                addExtrasTitle = document.querySelector('.custom-test-c-add-extras-title').innerText;
            }

            if (document.querySelector('.custom-test-c-complete-order')) {
                completeOrderUpsellModal = document.querySelector('.custom-test-c-complete-order').innerText;
            }

            if (document.querySelector('.custom-test-c-add-to-cart')) {
                addToCartUpsellModal = document.querySelector('.custom-test-c-add-to-cart').innerText;
            }

            if (document.querySelector('.custom-test-c-coupon-error')) {
                couponErrorMsg = document.querySelector('.custom-test-c-coupon-error').innerText;
            }

            if (document.querySelector('.custom-test-c-coupon-applied')) {
                couponAppliedMsg = document.querySelector('.custom-test-c-coupon-applied').innerText;
            }

            if (document.querySelector('.custom-test-c-out-of-stock')) {
                outOfStockMsg = document.querySelector('.custom-test-c-out-of-stock').innerText;
            }

            if (document.querySelector('.custom-test-c-add-extras-description')) {
                addExtrasDescription = document.querySelector('.custom-test-c-add-extras-description').innerText;
            }
        }

        if (pageTitle != null){
            document.title = pageTitle.innerText;
        }

        let firstName = document.querySelector('#shipping_first_name');
        if (firstName && firstNamePlaceholder){
            firstName.placeholder = firstNamePlaceholder.innerText;
        }

        let lastName = document.querySelector('#shipping_last_name');
        if (lastName && lastNamePlaceholder){
            lastName.placeholder = lastNamePlaceholder.innerText;
        }

        let email = document.querySelector('#shipping_email');
        if (email && emailPlaceholder){
            email.placeholder = emailPlaceholder.innerText;
        }

        let shippingAddress = document.querySelector('#shipping_address_1');
        if (shippingAddress && streetAddressPlaceholder){
            shippingAddress.placeholder = streetAddressPlaceholder.innerText;
        }

        let billingAddress = document.querySelector('#billing_address_1');
        if (billingAddress && streetAddressPlaceholder){
            billingAddress.placeholder = streetAddressPlaceholder.innerText;
        }

        let cityInput = document.querySelector('#shipping_city');
        if (cityInput && cityPlaceholder){
            cityInput.placeholder = cityPlaceholder.innerText;
        }

        let zipCodeInput = document.querySelector('#shipping_postcode');
        if (zipCodeInput && zipCodePlaceholder){
            zipCodeInput.placeholder = zipCodePlaceholder.innerText;
        }

        let statePlaceholder = document.querySelector('.select2-selection__placeholder');
        if (statePlaceholder && stateLabel){
            statePlaceholder.innerText = stateLabel.innerText;
        }

        let apartmentInput = document.querySelector('#billing_address_2');
        if (apartmentInput && apartmentPlaceholder){
            apartmentInput.placeholder = apartmentPlaceholder.innerText;

        }
    }
    changeCustomTexts();

    function additionalLinksMobileFix(){
        if (window.innerWidth <= 570){

            let form = document.querySelector('#ic-checkout');
            let woocommerceDiv;
            let mainCheckoutLoader;
            let dontMissBoxSecond;
            let additionalLinks;
            if (form){
                woocommerceDiv = form.parentElement;
                mainCheckoutLoader = form.querySelector('.main-checkout-loader');
                dontMissBoxSecond = form.querySelector('.order_review-order-dont-miss-box.sec.mobile-only');
                additionalLinks = form.querySelector('#ic-additional-links');

                if (mainCheckoutLoader){
                    form.removeChild(mainCheckoutLoader);
                }
                if (dontMissBoxSecond){
                    form.removeChild(dontMissBoxSecond);
                }
                if (additionalLinks){
                    form.removeChild(additionalLinks);
                }

                if (additionalLinks) {
                    woocommerceDiv.insertAdjacentElement('afterend', additionalLinks);
                }
                if (dontMissBoxSecond) {
                    woocommerceDiv.insertAdjacentElement('afterend', dontMissBoxSecond);
                }
                if (mainCheckoutLoader) {
                    woocommerceDiv.insertAdjacentElement('afterend', mainCheckoutLoader);
                }
            }
        }
    }
    additionalLinksMobileFix();

    function changeShippingTitleAndPrices(){

        let steps = document.querySelector('.ic-cc-steps');
        if (steps){
            shippingMethodsLabel = document.querySelector('.custom-test-c-ms-shipping-methods');
        }else{
            shippingMethodsLabel = document.querySelector('.custom-test-c-shipping-methods');
        }

        let shippingMethod = document.querySelector('.ic-cc-shipping');
        if (shippingMethod && shippingMethodsLabel){
            let shippingHeader = shippingMethod.querySelector('th');
            if (shippingHeader){
                shippingHeader.innerText = shippingMethodsLabel.innerText;
            }
        }
            // let orderReviewTabs = document.querySelectorAll('.cart_item');
            // if (orderReviewTabs){
            //     orderReviewTabs.forEach((tab)=>{
            //         if (!tab.classList.contains('ic-price-changed-checkout')){
            //             tab.classList.add('ic-price-changed-checkout');
            //             let price = tab.querySelector('.product-total bdi');
            //             if (!price){
            //                 let withoutBDI = tab.querySelector('.product-total');
            //                 if (withoutBDI){
            //                     price = withoutBDI.querySelector('.woocommerce-Price-amount');
            //                 }else{
            //                    return;
            //                 }
            //             }
            //             let spanEndIndex = price.innerHTML.indexOf('</span>');
            //             let stringAfterSpan = price.innerHTML.substring(spanEndIndex + 7);
            //             stringAfterSpan = stringAfterSpan.replace(/,/g, '');
            //             let totalPrice = parseFloat(stringAfterSpan);
            //             let quantity = Math.floor(tab.querySelector('.qty-qty-cont').innerText);
            //             let numberRegex = /<\/span>(\d{1,3}(,\d{3})*(\.\d{1,2})?)/i;
            //             let newPrice = (totalPrice/quantity).toFixed(2);
            //             price.innerHTML= price.innerHTML.replace(numberRegex, `</span>${newPrice}`);
            //         }
            //     });
            // }
    }
    changeShippingTitleAndPrices();

    function differentAddressMobileCheck() {
        let differentAddressLabel;
        let differentAddressCheckbox = document.querySelector('.mobile-checkbox-different-address');
        let differentAddress = document.querySelector('#ship-to-different-address-checkbox');
        if (differentAddress){
            differentAddressLabel = differentAddress.parentElement;
        }
        let windowWidth = window.innerWidth;
        if (windowWidth<=570){
            let labelSwitch = document.querySelector('#different-address-switch');
            if (labelSwitch){
                labelSwitch.setAttribute('style','display: none !important;');
            }
        }
        //Added so that the user can click on the text of different delivery as well
        if(differentAddressCheckbox){
            let differentAddressSpan = differentAddressCheckbox.parentElement.querySelector('span');
            if (differentAddressSpan){
                differentAddressSpan.style.cursor = 'pointer';
                differentAddressSpan.addEventListener('click',function(){
                    differentAddressCheckbox.click();
                });
            }
        }

        if (differentAddressCheckbox && differentAddressLabel){
            differentAddressCheckbox.addEventListener('change',function(){
                if (differentAddressLabel){
                    differentAddressLabel.click();
                }
            });
        }
    }
    differentAddressMobileCheck();

    function couponFieldOutsideOnMobile(){
        if (window.innerWidth <=570){
            //single-step
            let orderReviewWrapper = document.querySelector('.ic-order-review-wrapper');
            //multi-step
            let orderReview = document.querySelector('.ic-order-review');

            if (orderReviewWrapper){
                if(orderReviewWrapper.classList.contains('active')){
                    let couponField = orderReviewWrapper.querySelector('.coupon_checkout');
                    couponField.setAttribute('style','display: table-row !important;');

                    let newCouponField = document.querySelector('.mobile-coupon-place');
                    newCouponField.setAttribute('style','display: none !important;');
                }
                else{
                    let couponField = orderReviewWrapper.querySelector('.coupon_checkout');
                    couponField.setAttribute('style','display: none !important;');

                    let newCouponField = document.querySelector('.mobile-coupon-table-row');
                    let mobileField = document.querySelector('.mobile-coupon-place');
                    mobileField.setAttribute('style','display: initial !important;');
                    newCouponField.innerHTML = couponField.innerHTML;
                    let buttonOfNew = newCouponField.querySelector('.button');
                    buttonOfNew.addEventListener('click',function(e){
                        e.preventDefault();
                        let inputValue = newCouponField.querySelector('.input-text.ic-coupon-input');
                        let inputCouponReal = document.querySelectorAll('.ic-order-review .coupon_checkout input#coupon_code');
                        inputCouponReal.forEach((inputReal)=>{
                            inputReal.value = inputValue.value;
                        });
                        let applyCoupon = document.querySelector('.ic-order-review .coupon_checkout button');
                        if (applyCoupon) {
                            applyCoupon.click();
                        }
                    });
                }
            }
            else if(orderReview){
                if (orderReview.classList.contains('active')){
                    let couponFields = orderReview.querySelector('.coupon_checkout');
                    couponFields.setAttribute('style','display: table-row !important;');

                    let newCouponField = document.querySelector('.mobile-coupon-place');
                    newCouponField.setAttribute('style','display: none !important;');
                }else{
                    let couponField = orderReview.querySelector('.coupon_checkout');
                    couponField.setAttribute('style','display: table-row !important;');

                    let newCouponField = document.querySelector('.mobile-coupon-table-row');
                    let mobileField = document.querySelector('.mobile-coupon-place');
                    mobileField.setAttribute('style','display: initial !important;');
                    newCouponField.innerHTML = couponField.innerHTML;
                    let buttonOfNew = newCouponField.querySelector('.button');
                    buttonOfNew.addEventListener('click',function(e){
                        e.preventDefault();
                        let inputValue = newCouponField.querySelector('.input-text.ic-coupon-input');
                        let inputCouponReal = document.querySelectorAll('.ic-order-review .coupon_checkout input#coupon_code');
                        inputCouponReal.forEach((inputReal)=>{
                            inputReal.value = inputValue.value;
                        });
                        let applyCoupon = document.querySelector('.ic-order-review .coupon_checkout button');
                        if (applyCoupon) {
                            applyCoupon.click();
                        }
                    });

                }
            }
        }
    }
    couponFieldOutsideOnMobile();

    /* This function is used in ic-validations.js and replaced previous function there
    function restyleShippingAndBillingRows(){
        let rows = document.querySelectorAll('#ic-checkout .woocommerce-billing-fields .form-row');
        let visibleRows = [];

        for (let i = 0; i < rows.length; i++) {
            if (window.getComputedStyle(rows[i]).display !== 'none') {
                visibleRows.push(rows[i]);
            }
        }

        //left line je margina levo 0%
        //right line je margina levo 4%
        //last row je margina levo 0% i width 100%
        for (let j = 0; j < visibleRows.length; j++) {
            let row = visibleRows[j];
            if (visibleRows.length % 2 === 0){
                if (j % 2 === 0) {
                    row.classList.add('leftLine-billing');
                } else {
                    row.classList.add('rightLine-billing');
                }
            }else{
                if (j !== (visibleRows.length-1)){
                    if (j % 2 === 0) {
                        row.classList.add('leftLine-billing');
                    } else {
                        row.classList.add('rightLine-billing');
                    }
                }else{
                    //ovo je za zadnji red (zemlja) kada ih ima neparan broj
                    row.classList.add('lastLine-billing');
                }
            }
        }

        let leftLineBillingRows = document.querySelectorAll('.leftLine-billing')
        let rightLineBillingRows = document.querySelectorAll('.rightLine-billing')
        let lastRow = document.querySelector('.lastLine-billing');

        if (leftLineBillingRows && rightLineBillingRows){
            console.log('postoje left i right line');
            leftLineBillingRows.forEach((leftLineRow)=>{
                console.log(leftLineRow);
                leftLineRow.style.marginLeft = '1% !important';
            });
            rightLineBillingRows.forEach((rightLineRow)=>{
                rightLineRow.style.marginLeft = '2% !important';
            });
            if (lastRow){
                console.log('postoji zadnji red');
                lastRow.style.marginLeft = '0% !important';
                lastRow.style.width = '3% !important';
            }
        }
    }
    */
    function checkTermsAndConditions(){
        let termsCheckbox = document.querySelector('#ic-terms-unique input[type="checkbox"][id="terms"]');
        if(termsCheckbox){
            termsCheckbox.addEventListener('change',function(){
                if(termsCheckbox.checked){
                    let termsErrorDiv = document.querySelectorAll('.ic-checkout-terms-and-conditions-error');
                    if (termsErrorDiv.length > 0){
                        termsErrorDiv.forEach((term)=>{
                            term.remove();
                        });
                    }
                }
            });
            if (termsCheckbox.checked){
                let termsErrorDiv = document.querySelectorAll('.ic-checkout-terms-and-conditions-error');
                if (termsErrorDiv.length > 0){
                    termsErrorDiv.forEach((term)=>{
                        term.remove();
                    });
                }
                return true;
            }else{
                let termsWrapper = document.querySelector('.ic-terms-wrapper');
                let errorDiv = document.createElement('div');
                errorDiv.classList.add('ic-checkout-terms-and-conditions-error');
                errorDiv.innerHTML = '<p class="form-row terms-error-message">Please read and accept the terms and conditions to proceed with your order.</div>';
                let termsErrorDiv = document.querySelectorAll('.ic-checkout-terms-and-conditions-error');
                if (termsErrorDiv.length > 0 ){
                    termsErrorDiv.forEach(function(term) {
                        term.remove();
                    });
                }
                insertAfterTr(errorDiv,termsWrapper);
                return false;
            }
        }else{
            return true;
        }
    }

    let couponListenerAdded = false;

    const thousandsFormatterDecimals = new Intl.NumberFormat('en-US', {
        minimumFractionDigits: 1,
        maximumFractionDigits: 1
    });

    const thousandsFormatter = new Intl.NumberFormat('en-US');

    function formatWithFloor(num) {
        return Math.floor(num * 10) / 10;
    }

    let slider = new Swiper('.ic-checkout-upsell', {
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true
        },
    });

    function insertAfterTr(newNode, existingNode) {
        existingNode.parentNode.insertBefore(newNode, existingNode.nextSibling);
    }

    let upsellOffers = document.querySelectorAll('.us-slide');
    let addToCartBtns = document.querySelectorAll('.add_to_cart_button');

    let previousCheckedItem;
    let counter = 0;
    function changeShippingMethodCheckout(){
        let shippingMethodParts = document.querySelector('#shipping_method');
        if (shippingMethodParts){
            let items = shippingMethodParts.querySelectorAll("input[type=radio]");
            if (items){
                if (items.length>0){
                    items.forEach(function(item) {
                        if (item!==previousCheckedItem && item.checked && counter===1){
                            previousCheckedItem=item;
                            counter = 0;
                            changingShippingCallbackFunction(item.value);
                            return;
                        }
                        let eventsShipping = item.getAttribute('click-listener');
                        if (eventsShipping == null) {
                            item.setAttribute('click-listener', true);
                                item.addEventListener('change', function () {
                                    previousCheckedItem = null;
                                    counter = 0;
                                    changingShippingCallbackFunction(item.value);
                                });
                        }
                    });
                }else{
                    let singleInput = shippingMethodParts.querySelector("input[type=hidden]");
                    if (singleInput){
                        let eventShippingSingle = singleInput.getAttribute('click-listener');
                        if (eventShippingSingle == null){
                            singleInput.setAttribute('click-listener',true);
                            let valueOfInput = singleInput.value;
                            if (singleInput!==previousCheckedItem && counter===1){
                                previousCheckedItem=singleInput;
                                counter = 0;
                                changingShippingCallbackFunction(valueOfInput);
                            }
                        }
                    }
                }
            }
        }
    }

    function checkShippingOnChange(){
        const targetNode = document.querySelector('.ic-cc-shipping');
        const config = { childList: true };
        const callback = function(mutationsList, observer) {
            for(let mutation of mutationsList) {
                if (mutation.type === 'childList') {
                    let billingField = document.getElementById('billing_address_1');
                    if (billingField){
                        if (document.activeElement !== billingField) {
                            let shippingField = document.getElementById('shipping_address_1');
                            if (shippingField){
                                if (document.activeElement !== shippingField){
                                    let shippingMethodParts = document.querySelector('#shipping_method');
                                    if (shippingMethodParts){
                                        let items = shippingMethodParts.querySelectorAll("input[type=radio]");
                                        if (items){
                                            if (items.length>0){
                                                items.forEach(function(item) {
                                                    if (item.checked){
                                                        previousCheckedItem=item;
                                                        counter =1;
                                                    }
                                                });
                                            }else{
                                                previousCheckedItem=null;
                                                counter =1;
                                            }
                                        }
                                    }
                                    changeShippingMethodCheckout();
                                }
                            }else{
                                let shippingMethodParts = document.querySelector('#shipping_method');
                                if (shippingMethodParts){
                                    let items = shippingMethodParts.querySelectorAll("input[type=radio]");
                                    if (items){
                                        if (items.length>0){
                                            items.forEach(function(item) {
                                                if (item.checked){
                                                    counter =1;
                                                    previousCheckedItem=item;
                                                }
                                            });
                                        }else{
                                            previousCheckedItem=null;
                                            counter =1;
                                        }
                                    }
                                }
                                changeShippingMethodCheckout();
                            }
                        }
                    }
                }
            }
        };
        const observer = new MutationObserver(callback);
        observer.observe(targetNode, config);
    }
    checkShippingOnChange();

    function changingShippingCallbackFunction(selectedValue){
        let activeDiscounts = [];
        let onPage = document.querySelectorAll('.fee th');
        onPage.forEach((discount)=>{
            activeDiscounts.push(discount.innerHTML);
        });

        jQuery.ajax({
            url: urls.ajax_url,
            type: 'get',
            data: {
                action: 'ic_get_checkout_shipping_methods',
                shipping_method:selectedValue,
                active_discounts: activeDiscounts
            },
            beforeSend: function () {
                document.querySelector('.ic-order-review .checkout-loader').classList.add('active');
            },
            success: function (response) {
                // let values = JSON.parse(response);
                // let discountedShipping = values.discountedForFree;
                // console.log(discountedShipping);
                // if (discountedShipping === 1){
                //     document.querySelector('.ic-order-review .checkout-loader').classList.remove('active');
                //     return;
                // }
                jQuery.ajax({
                    async: false,
                    url: urls.ajax_url,
                    type: 'get',
                    data: {
                        action: 'ic_get_order_review',
                        nonce: nonces.get_order_review
                    },
                    success: function (response) {
                        let steps = document.querySelector('.ic-cc-steps');
                        if (steps) {
                            document.querySelector('.ic-order-review').innerHTML = '';
                            document.querySelector('.ic-order-review').innerHTML = response;
                            let orderTotal = document.querySelector('.ic-order-review .order-total td');
                            document.querySelector('.order-review-main-header span.total-header').innerHTML = orderTotal.innerHTML;
                            addRemoveProductAjax();
                            removeCouponAjax();
                            addPlusMinusListeners();
                            regulatePostPurchaseUpsell();
                            let selectedPayment = document.querySelector('.ic-order-review #payment input[checked="checked"]').id;
                            document.querySelector('.ic-cc-last-step #payment input#' + selectedPayment).click();
                            addCouponAjax();
                            //removeCouponAjax();
                            changeShippingTitleAndPrices();
                            let couponCheckoutForRemoving = document.querySelector('.mobile-coupon-table-place tbody');
                            let rowsToRemove = couponCheckoutForRemoving.querySelectorAll('tr');
                            for (let i=1; i < rowsToRemove.length; i++){
                                couponCheckoutForRemoving.removeChild(rowsToRemove[i]);
                            }
                            couponFieldOutsideOnMobile();
                        } else {

                            if (window.innerWidth >570){
                                let paymentMethodSelected = document.querySelector('.woocommerce-checkout input[name="payment_method"]:checked');

                                let hiddenWrapper = document.querySelector('.ic-order-review-wrapper-hidden');
                                hiddenWrapper.innerHTML = '';
                                hiddenWrapper.innerHTML = response;

                                let hiddenTable = hiddenWrapper.querySelector('table');
                                let visibleTable = document.querySelector('.ic-order-review-wrapper table');
                                visibleTable.innerHTML = '';
                                visibleTable.innerHTML = hiddenTable.innerHTML;

                                hiddenTable.innerHTML='';

                                let singleLoader = document.querySelector('.checkout-single-loader');
                                let fullLoader = document.querySelector('.ic-order-review .checkout-loader');
                                if (singleLoader){
                                    singleLoader.classList.remove('active');
                                }
                                if (fullLoader){
                                    fullLoader.classList.remove('active');
                                }

                                visibleTable.classList.remove('loading');
                                paymentMethodSelected.click();
                            }else{
                                let paymentSection = document.querySelector('.mob-place-order');
                                let mobilePayments = paymentSection.querySelector('#payment');
                                let checkedPaymentMethod = mobilePayments.querySelector('input[name="payment_method"]:checked');
                                document.querySelector('.ic-order-review-wrapper').innerHTML = '';
                                document.querySelector('.ic-order-review-wrapper').innerHTML = response;
                                checkedPaymentMethod.click();
                            }
                            let orderTotal = document.querySelector('.ic-order-review .order-total td');
                            document.querySelector('.order-review-main-header span.total-header').innerHTML = orderTotal.innerHTML;

                            let couponCheckoutForRemoving = document.querySelector('.mobile-coupon-table-place tbody');
                            let rowsToRemove = couponCheckoutForRemoving.querySelectorAll('tr');
                            for (let i=1; i < rowsToRemove.length; i++){
                                couponCheckoutForRemoving.removeChild(rowsToRemove[i]);
                            }
                            couponFieldOutsideOnMobile();
                            addRemoveProductAjax();
                            removeCouponAjax();
                            addPlusMinusListeners();
                            regulatePostPurchaseUpsell();
                            addCouponAjax();
                            //removeCouponAjax();
                            changeShippingTitleAndPrices();
                        }
                    }
                });
            }
        });
    }

    function addToCartUpsells(){
        upsellOffers = document.querySelectorAll('.us-slide');
        addToCartBtns = document.querySelectorAll('.add_to_cart_button');
        addToCartBtns.forEach((btn) => {
            let eventsMarkUS = btn.getAttribute('click-listener');
            if (eventsMarkUS == null) {
                btn.setAttribute('click-listener', true);
                btn.addEventListener('click', function (e) {
                    e.preventDefault();
                    let thisbutton = jQuery(this);
                    let productId = btn.dataset.product_id;
                    let salePrice = btn.parentElement.parentElement.querySelector('.us-slide-title-price .sale-price');
                    let price;
                    if (salePrice) {
                        price = salePrice.dataset.price;
                    } else {
                        price = btn.parentElement.parentElement.querySelector('.us-slide-title-price p').innerText;
                        price = price.trim().substring(1);
                    }
                    let upsellId = btn.parentElement.parentElement.dataset.us_id;
                    let upsell = {
                        upsell_id: upsellId,
                        price: price,
                        product_id: productId,
                        qty: 1
                    }
                    let existsInCart = false;
                    let quantity = 1;
                    let variation_id = 0;
                    let stockProductName ='';
                    let data = {
                        action: 'woocommerce_ajax_add_to_cart',
                        product_id: productId,
                        product_sku: '',
                        quantity: quantity,
                        variation_id: variation_id,
                    };
                    jQuery(document.body).trigger('adding_to_cart', [thisbutton, data]);
                    let rowForProduct = '';
                    jQuery.ajax({
                        type: 'post',
                        url: wc_add_to_cart_params.ajax_url,
                        dataType: 'json',
                        data: data,
                        beforeSend: function (response) {
                            let tableOfProducts = document.querySelectorAll('#order_review .woocommerce-checkout-review-order-table .product-remove img');
                            tableOfProducts.forEach(function (img) {
                                if (data.product_id === img.dataset.productId) {
                                    existsInCart = true;
                                    let tableRowOfProduct = img.parentElement.parentElement;
                                    rowForProduct = tableRowOfProduct;
                                    stockProductName = tableRowOfProduct.querySelector('.product-name').innerText;
                                    let loadingImage = document.querySelector('#order_review .checkout-single-loader');
                                    let offsetTop = jQuery(tableRowOfProduct).offset().top - jQuery('.customer_details-right-section tbody').offset().top;
                                    loadingImage.style.top = (offsetTop + 9) + 'px';
                                    //loadingImage.style.top = ((tableRowOfProduct.rowIndex - 1) * tableRowOfProduct.clientHeight + 9) + 'px';
                                    tableRowOfProduct.classList.add('blur');
                                    loadingImage.classList.add('active');
                                    let qtyHtml = tableRowOfProduct.querySelector('.qty-qty-cont');
                                    let numQty = qtyHtml.innerHTML;
                                    qtyHtml.innerHTML = +numQty + 1;
                                    tableRowOfProduct.parentElement.parentElement.classList.add('loading');
                                    let dealsSection = btn.parentElement.parentElement;
                                    dealsSection.parentElement.parentElement.classList.add('loading');
                                }
                            });
                            if (!existsInCart) {
                                let dealsSection = btn.parentElement.parentElement;
                                let imgLoading = dealsSection.querySelector('.mini-cart-single-loader');
                                imgLoading.classList.add('active');
                                dealsSection.classList.add('loading');
                                dealsSection.parentElement.parentElement.classList.add('loading');
                            }
                        },
                        complete: function (response) {
                            thisbutton.addClass('added').removeClass('loading');
                            btn.classList.remove('loading');
                        },
                        success: function (response) {
                            if (response == 0) {
                                if (existsInCart){
                                    let loadingImage = document.querySelector('#order_review .checkout-single-loader');
                                    rowForProduct.classList.remove('blur');
                                    loadingImage.classList.remove('active');
                                    let qtyHtml = rowForProduct.querySelector('.qty-qty-cont');
                                    let numQty = qtyHtml.innerHTML;
                                    qtyHtml.innerHTML = +numQty - 1;
                                    rowForProduct.parentElement.parentElement.classList.remove('loading');

                                    let plusBtn =  rowForProduct.querySelector('.quantity-counter .plus-qty');
                                    plusBtn.classList.add('disabled');
                                    let errorTr = document.createElement('tr');
                                    errorTr.classList.add('error_tr_checkout');
                                    errorTr.innerHTML = '<td colspan="5"> <span>' + stockProductName + '</span>' + outOfStockMsg +' '+errorIcon+'</td>';
                                    insertAfterTr(errorTr, rowForProduct);
                                }
                                let dealsSection = btn.parentElement.parentElement;
                                dealsSection.parentElement.parentElement.classList.remove('loading');
                                let imgLoading = dealsSection.querySelector('.mini-cart-single-loader');
                                imgLoading.classList.remove('active');
                                dealsSection.classList.remove('loading');
                                thisbutton.addClass('added').removeClass('loading');
                                btn.classList.remove('loading');

                            } else{
                                let upsells = JSON.parse(localStorage.getItem('upsells'));
                                if (upsells !== null && upsells.length > 0) {
                                    if (upsells.some(e => e.upsell_id === upsellId)) {
                                        let upsellExisting = upsells.find(el => el.upsell_id === upsellId);
                                        upsellExisting.qty += 1;
                                    } else {
                                        upsells.push(upsell);
                                    }
                                } else {
                                    upsells = [upsell];
                                }
                                localStorage.setItem('upsells', JSON.stringify(upsells));
                                jQuery.ajax({
                                    async: false,
                                    url: urls.ajax_url,
                                    type: 'get',
                                    data: {
                                        action: 'ic_get_order_review',
                                        nonce: nonces.get_order_review
                                    },
                                    complete: function (response) {
                                        thisbutton.addClass('added').removeClass('loading');
                                        btn.classList.remove('loading');
                                    },
                                    success: function (response) {
                                        //jQuery(document.body).trigger('update_checkout');
                                        let steps = document.querySelector('.ic-cc-steps');
                                        if (steps) {
                                            document.querySelector('.ic-order-review').innerHTML = '';
                                            document.querySelector('.ic-order-review').innerHTML = response;
                                            let orderTotal = document.querySelector('.ic-order-review .order-total td');
                                            document.querySelector('.order-review-main-header span.total-header').innerHTML = orderTotal.innerHTML;
                                            addRemoveProductAjax();
                                            addPlusMinusListeners();
                                            changeShippingMethodCheckout();
                                            regulatePostPurchaseUpsell();
                                            let selectedPayment = document.querySelector('.ic-order-review #payment input[checked="checked"]').id;
                                            document.querySelector('.ic-cc-last-step #payment input#' + selectedPayment).click();
                                            let dealsSection = btn.parentElement.parentElement;
                                            let imgLoading = dealsSection.querySelector('.mini-cart-single-loader');
                                            dealsSection.classList.remove('loading');
                                            imgLoading.classList.remove('active');
                                            dealsSection.parentElement.parentElement.classList.remove('loading');
                                            addCouponAjax();
                                            removeCouponAjax();
                                            changeShippingTitleAndPrices();
                                            let couponCheckoutForRemoving = document.querySelector('.mobile-coupon-table-place tbody');
                                            let rowsToRemove = couponCheckoutForRemoving.querySelectorAll('tr');
                                            for (let i=1; i < rowsToRemove.length; i++){
                                                couponCheckoutForRemoving.removeChild(rowsToRemove[i]);
                                            }
                                            couponFieldOutsideOnMobile();
                                        } else {

                                            if (window.innerWidth >570){
                                                let paymentMethodSelected = document.querySelector('.woocommerce-checkout input[name="payment_method"]:checked');

                                                let hiddenWrapper = document.querySelector('.ic-order-review-wrapper-hidden');
                                                hiddenWrapper.innerHTML = '';
                                                hiddenWrapper.innerHTML = response;

                                                let hiddenTable = hiddenWrapper.querySelector('table');
                                                let visibleTable = document.querySelector('.ic-order-review-wrapper table');
                                                visibleTable.innerHTML = '';
                                                visibleTable.innerHTML = hiddenTable.innerHTML;

                                                hiddenTable.innerHTML='';

                                                let singleLoader = document.querySelector('.checkout-single-loader');
                                                let fullLoader = document.querySelector('.ic-order-review .checkout-loader');
                                                if (singleLoader){
                                                    singleLoader.classList.remove('active');
                                                }
                                                if (fullLoader){
                                                    fullLoader.classList.remove('active');
                                                }
                                                visibleTable.classList.remove('loading');
                                                paymentMethodSelected.click();
                                            }else{
                                                let paymentSection = document.querySelector('.mob-place-order');
                                                let mobilePayments = paymentSection.querySelector('#payment');
                                                let checkedPaymentMethod = mobilePayments.querySelector('input[name="payment_method"]:checked');
                                                document.querySelector('.ic-order-review-wrapper').innerHTML = '';
                                                document.querySelector('.ic-order-review-wrapper').innerHTML = response;
                                                checkedPaymentMethod.click();
                                            }


                                            let orderTotal = document.querySelector('.ic-order-review .order-total td');
                                            document.querySelector('.order-review-main-header span.total-header').innerHTML = orderTotal.innerHTML;
                                            addRemoveProductAjax();
                                            addPlusMinusListeners();
                                            changeShippingMethodCheckout();
                                            regulatePostPurchaseUpsell();
                                            let dealsSection = btn.parentElement.parentElement;
                                            let imgLoading = dealsSection.querySelector('.mini-cart-single-loader');
                                            dealsSection.classList.remove('loading');
                                            imgLoading.classList.remove('active');
                                            dealsSection.parentElement.parentElement.classList.remove('loading');
                                            addCouponAjax();
                                            removeCouponAjax();
                                            changeShippingTitleAndPrices();
                                            couponFieldOutsideOnMobile();
                                            let couponCheckoutForRemoving = document.querySelector('.mobile-coupon-table-place tbody');
                                            let rowsToRemove = couponCheckoutForRemoving.querySelectorAll('tr');
                                            for (let i=1; i < rowsToRemove.length; i++){
                                                couponCheckoutForRemoving.removeChild(rowsToRemove[i]);
                                            }
                                        }
                                    }
                                });
                            }
                        }
                    });
                });
            }
        });
    }
    addToCartUpsells();

    function checkValidationFormInputs() {
        let notFilled = 0;
        let validationForms = document.querySelectorAll('.woocommerce-billing-fields .form-row.validate-required');
        validationForms.forEach(function (validationForm) {
            let validationInput = validationForm.querySelector('input');

            let stateRequired = document.querySelector('#billing_state_field.validate-required');
            if(stateRequired) {
                let stateRequiredSelect = stateRequired.querySelector('select');
                var errorSpan = document.createElement('span');
                errorSpan.classList.add('error-message');
                let idForm = stateRequired.getAttribute('id');
                if(idForm != null) {
                    let serializedId = idForm.replace('billing_',"").replace("_field", "");
                    let errorPerfix = errorMessages[serializedId];
                    errorSpan.innerHTML = errorPerfix + ' ';
                    if (stateRequiredSelect && stateRequiredSelect.value === '') {
                        if(! stateRequired.classList.contains('error')){
                            //add class error to form
                            stateRequired.classList.add('error');
                            //append error span
                            stateRequired.appendChild(errorSpan);
                        }
                        notFilled++;
                        stateRequiredSelect.focus();
                        // console.log(notFilled);

                    } else {
                        //remove child
                        let errorMessage = stateRequired.querySelector('.error-message');
                        if(errorMessage) {
                            stateRequired.querySelector('.error-message').remove();
                        }
                        //remove class error
                        stateRequired.classList.remove('error');
                        // console.log(notFilled);

                    }
                }
            }

            if(validationInput) {
                var errorSpan = document.createElement('span');
                errorSpan.classList.add('error-message');
                let idForm = validationForm.getAttribute('id');
                if(idForm != null) {
                    let serializedId = idForm.replace('billing_',"").replace("_field", "");
                    let errorPerfix = errorMessages[serializedId];
                    errorSpan.innerHTML = errorPerfix + ' ';
                    if (validationInput.value === '') {
                        if(! validationForm.classList.contains('error')){
                            //add class error to form
                            validationForm.classList.add('error');
                            //append error span
                            validationForm.appendChild(errorSpan);
                        }
                        notFilled++;
                        validationInput.focus();
                        // console.log(notFilled);


                    } else {
                        //remove child
                        let errorMessage = validationForm.querySelector('.error-message');
                        if(errorMessage) {
                            validationForm.querySelector('.error-message').remove();
                        }
                        //remove class error
                        validationForm.classList.remove('error');
                        // console.log(notFilled);

                    }
                }
            }
        });

        // console.log(notFilled);

        return notFilled === 0;
    }

    function regulatePostPurchaseUpsell() {
        let modalShown = false;
        if (jQuery('#upsellModal').is(':visible')) {
            modalShown = true;
        }
         //upsellOffers = document.querySelectorAll('.us-slide');
        let placeOrderButton;
        let formLayout = document.querySelector('#ic-checkout');

        jQuery.ajax({
            //  async:false,
            url: urls.ajax_url,
            type: 'get',
            data: {
                action: 'ic_get_checkout_upsells',
            },
            success: function (response) {
                let dontMissElement = document.querySelector('.order_review-order-dont-miss-box.dont-miss-upsells-box');
                if (dontMissElement){
                    dontMissElement.innerHTML='';
                    dontMissElement.innerHTML = response;
                    if(dontMissElement.childNodes.length <=1){
                        dontMissElement.remove();
                    }
                }else{
                    let orderReviewElement = document.querySelector('#order_review');
                    let newDontMiss = document.createElement('div');
                    newDontMiss.classList.add('order_review-order-dont-miss-box');
                    newDontMiss.classList.add('dont-miss-upsells-box');
                    newDontMiss.innerHTML = response;
                    insertAfterTr(newDontMiss,orderReviewElement);
                    if(newDontMiss.childNodes.length <=1){
                        newDontMiss.remove();
                    }
                }
                let slider = new Swiper('.ic-checkout-upsell', {
                    navigation: {
                        nextEl: '.swiper-button-next',
                        prevEl: '.swiper-button-prev',
                    },
                    pagination: {
                        el: '.swiper-pagination',
                        clickable: true
                    },
                });
                upsellOffers = document.querySelectorAll('.us-slide');
                addToCartUpsells();
                if (upsellOffers.length > 0) {
                    jQuery.ajax({
                        url: MYajax.ajax_url,
                        type: 'GET',
                        data: {
                            action: 'ic_get_upsells_ty',
                            nonce: nonces.get_upsells_ty
                        },
                        success: function (response) {
                            upsellProductsTy = JSON.parse(response);
                            if(upsellProductsTy.length > 0) {
                                if(formLayout.classList.contains('ic-single-step-checkout-page')) {
                                    if(window.innerWidth <= 570) {
                                        placeOrderButton = document.querySelector('.mob-place-order button#place_order');
                                    } else {
                                        placeOrderButton = document.querySelector('#order_review button#place_order');
                                    }
                                } else {
                                    placeOrderButton = document.querySelector('button#place_order');
                                }
                                if (placeOrderButton){
                                    placeOrderButton.type = 'button';
                                    let events = placeOrderButton.getAttribute('click-listener');
                                    if (events == null) {
                                        placeOrderButton.setAttribute('click-listener', true);
                                        placeOrderButton.addEventListener('click', function (e) {
                                            e.preventDefault();
                                            let filled = checkValidationFormInputs();
                                            if(filled) {
                                                jQuery("#upsellModal").modal('show');
                                            }
                                        });
                                    }
                                }
                                let upsellsHtml = '';
                                let upsellsRendered = [];
                                upsellProductsTy.forEach((upsell) => {
                                    if (!upsellsRendered.includes(upsell.title)) {
                                        let usPrice = upsell.price;
                                        let regularPrice = null;
                                        if (upsell.custom_compare_price != 0 && upsell.custom_price == 0) {
                                            usPrice = upsell.custom_compare_price;
                                        } else if (upsell.custom_compare_price != 0 && upsell.custom_price) {
                                            regularPrice = upsell.custom_compare_price;
                                            usPrice = upsell.custom_price;
                                        }
                                        let usImage = urls.plugin_url + '/assets/images/woocommerce-placeholder.png';
                                        if (upsell.image != false) {
                                            usImage = upsell.image[0];
                                        }
                                        upsellsHtml += '<div class="single-us-ty"><div class="single-us-ty-left">';
                                        upsellsHtml += '<img src="' + usImage + '" />';
                                        upsellsHtml += '<div class="single-us-ty-name-box"><p class="single-us-ty-title">' + upsell.title + '</p>';
                                        if (regularPrice == null) {
                                            upsellsHtml += '<p class="single-us-ty-price">' + thousandsFormatterDecimals.format(formatWithFloor(parseFloat(usPrice))) + urls.currency + '</p></div>';
                                        } else {
                                            upsellsHtml += '<p class="single-us-ty-price"><span class="single-us-regular-price">' + thousandsFormatterDecimals.format(formatWithFloor(parseFloat(regularPrice))) + urls.currency + '</span> ' + thousandsFormatterDecimals.format(formatWithFloor(parseFloat(usPrice))) + urls.currency + '</p></div>';
                                        }
                                        upsellsHtml += '</div><div class="single-us-ty-right"><span data-product-id="' + upsell.option_value + '"><i class="fa-solid fa-plus"></i> '+addToCartUpsellModal+'</span></div></div>';
                                        upsellsRendered.push(upsell.title);
                                    }
                                });

                                let containerExists = document.querySelector('.post-purchase-container');
                                if(containerExists) {
                                    containerExists.innerHTML = '<div class="modal fade ic-modal-add-extras" id="upsellModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">\n' +
                                        '  <div class="modal-dialog">\n' +
                                        '    <div class="modal-content">\n' +
                                        '      <div class="modal-header">\n' +
                                        '        <h5 class="modal-title" id="exampleModalLabel">'+addExtrasTitle+'</h5>\n' +
                                        '      </div>\n' +
                                        '       <div class="upsellModal-order-thank-you">'+addExtrasDescription+'</div>' +
                                        '      <div class="modal-body">\n' +
                                        '        ...\n' +
                                        '      </div>\n' +
                                        '      <div class="modal-footer">\n' +
                                        '        <button type="submit" class="btn upsellModal-close-btn" data-bs-dismiss="modal">'+ completeOrderUpsellModal+'</button>\n' +
                                        '      </div>\n' +
                                        '    </div>\n' +
                                        '  </div>\n' +
                                        '</div>';
                                    let upsellModal = document.querySelector('#upsellModal .modal-body');
                                    upsellModal.innerHTML = upsellsHtml;
                                    if(modalShown) {
                                        jQuery("#upsellModal").modal('hide');
                                        let bodySelect = jQuery('body');
                                        bodySelect.removeClass('modal-open');
                                        bodySelect.css('overflow','visible');
                                        bodySelect.css('padding-right','0px');
                                        jQuery('.modal-backdrop').remove();
                                    }
                                } else {
                                    let container = document.createElement('div');
                                    container.classList.add('post-purchase-container');
                                    container.innerHTML = '<div class="modal fade ic-modal-add-extras" id="upsellModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">\n' +
                                        '  <div class="modal-dialog">\n' +
                                        '    <div class="modal-content">\n' +
                                        '      <div class="modal-header">\n' +
                                        '        <h5 class="modal-title" id="exampleModalLabel">'+addExtrasTitle+'</h5>\n' +
                                        '      </div>\n' +
                                        '       <div class="upsellModal-order-thank-you">'+addExtrasDescription+'</div>' +
                                        '      <div class="modal-body">\n' +
                                        '        ...\n' +
                                        '      </div>\n' +
                                        '      <div class="modal-footer">\n' +
                                        '        <button type="submit" class="btn upsellModal-close-btn" data-bs-dismiss="modal">'+ completeOrderUpsellModal+'</button>\n' +
                                        '      </div>\n' +
                                        '    </div>\n' +
                                        '  </div>\n' +
                                        '</div>';
                                    let form = document.querySelector('form#ic-checkout');
                                    form.appendChild(container);
                                    let upsellModal = document.querySelector('#upsellModal .modal-body');
                                    upsellModal.innerHTML = upsellsHtml;
                                    if(modalShown) {
                                        jQuery("#upsellModal").modal('hide');
                                        let bodySelectModal = jQuery('body');
                                        bodySelectModal.removeClass('modal-open');
                                        bodySelectModal.css('overflow','visible');
                                        bodySelectModal.css('padding-right','0px');
                                        jQuery('.modal-backdrop').remove();
                                    }
                                }

                                let addUpsellBtns = document.querySelectorAll('.single-us-ty-right span');
                                addUpsellBtns.forEach((addUpsellBtn) => {
                                    addUpsellBtn.addEventListener('click', function () {
                                        let productId = this.dataset.productId;

                                        let upsells = JSON.parse(localStorage.getItem('upsells'));
                                        if(upsells !== null && upsells.length > 0) {
                                            if (upsells.some(e=>e.product_id === productId)){
                                                let upsellExisting = upsells.find(el=>el.product_id===productId);
                                                upsellExisting.qty+=1;
                                            }else{
                                                let dealsSection = document.getElementById('ic-upsell');
                                                let specialDeals = dealsSection.querySelectorAll('.swiper-slide');
                                                specialDeals.forEach(function(specialDeal){
                                                    let addButtonDeal = specialDeal.querySelector('.add_to_cart_button');
                                                    let productIdOfDeal = addButtonDeal.dataset.product_id;

                                                    if (parseInt(productId) === parseInt(productIdOfDeal)){
                                                        let upsellId = specialDeal.dataset.us_id;
                                                        let salePrice = specialDeal.querySelector('.us-slide-title-price .sale-price');
                                                        let price;
                                                        if(salePrice) {
                                                            price = salePrice.dataset.price;
                                                        } else {
                                                            price = specialDeal.querySelector('.us-slide-title-price p').innerText;
                                                            price = price.trim().substring(1);
                                                        }
                                                        let upsell = {
                                                            upsell_id: upsellId,
                                                            price: price,
                                                            product_id: productIdOfDeal,
                                                            qty:1
                                                        }
                                                        upsells.push(upsell);
                                                    }
                                                });
                                            }
                                        } else {
                                            let dealsSection = document.getElementById('ic-upsell');
                                            let specialDeals = dealsSection.querySelectorAll('.swiper-slide');
                                            specialDeals.forEach(function(specialDeal){
                                                let addButtonDeal = specialDeal.querySelector('.add_to_cart_button');
                                                let productIdOfDeal = addButtonDeal.dataset.product_id;

                                                if (parseInt(productId) === parseInt(productIdOfDeal)){
                                                    let upsellId = specialDeal.dataset.us_id;
                                                    let salePrice = specialDeal.querySelector('.us-slide-title-price .sale-price');
                                                    let price;
                                                    if(salePrice) {
                                                        price = salePrice.dataset.price;
                                                    } else {
                                                        price = specialDeal.querySelector('.us-slide-title-price p').innerText;
                                                        price = price.trim().substring(1);
                                                    }
                                                    let upsell = {
                                                        upsell_id: upsellId,
                                                        price: price,
                                                        product_id: productIdOfDeal,
                                                        qty:1
                                                    }

                                                    upsells = [upsell];
                                                }
                                            });
                                        }
                                        localStorage.setItem('upsells', JSON.stringify(upsells));

                                        jQuery.ajax({
                                            async: false,
                                            url: urls.ajax_url,
                                            type: 'post',
                                            data: {
                                                action: 'ic_add_to_cart_back',
                                                nonce: nonces.add_to_cart_back,
                                                productId: productId
                                            },
                                            success: function (response) {
                                                let steps = document.querySelector('.ic-cc-steps');
                                                let notificationTitle = 'Success 🎉';
                                                let notificationDescription = 'You successfully added product to cart!';
                                                if (steps){
                                                    let notificationTitleLabel = document.querySelector('.custom-test-c-ms-add-extra-product-title');
                                                    if (notificationTitleLabel){
                                                        notificationTitle = notificationTitleLabel.innerText;
                                                    }
                                                    let notificationDescriptionLabel = document.querySelector('.custom-test-c-ms-add-extra-product-description');
                                                    if (notificationDescriptionLabel){
                                                        notificationDescription = notificationDescriptionLabel.innerText;
                                                    }
                                                }else{
                                                    let notificationTitleLabel = document.querySelector('.custom-test-c-add-extra-product-title');
                                                    if (notificationTitleLabel){
                                                        notificationTitle = notificationTitleLabel.innerText;
                                                    }
                                                    let notificationDescriptionLabel = document.querySelector('.custom-test-c-add-extra-product-description');
                                                    if (notificationDescriptionLabel){
                                                        notificationDescription = notificationDescriptionLabel.innerText;
                                                    }
                                                }
                                               swal({
                                                    title: ""+notificationTitle,
                                                    text: ""+notificationDescription,
                                                });
                                                jQuery.ajax({
                                                    async: false,
                                                    url: urls.ajax_url,
                                                    type: 'get',
                                                    data: {
                                                        action: 'ic_get_order_review',
                                                        nonce: nonces.get_order_review
                                                    },
                                                    beforeSend: function () {
                                                        document.querySelector('.ic-order-review .checkout-loader').classList.add('active');
                                                    },
                                                    success: function (response) {
                                                        let steps = document.querySelector('.ic-cc-steps');
                                                        if (steps) {
                                                            document.querySelector('.ic-order-review').innerHTML = '';
                                                            document.querySelector('.ic-order-review').innerHTML = response;
                                                            let orderTotal = document.querySelector('.ic-order-review .order-total td');
                                                            document.querySelector('.order-review-main-header span.total-header').innerHTML = orderTotal.innerHTML;

                                                            addRemoveProductAjax();
                                                            addPlusMinusListeners();

                                                            changeShippingMethodCheckout();
                                                            regulatePostPurchaseUpsell();
                                                            let selectedPayment = document.querySelector('.ic-order-review #payment input[checked="checked"]').id;
                                                            document.querySelector('.ic-cc-last-step #payment input#' + selectedPayment).click();
                                                            addCouponAjax();
                                                            removeCouponAjax();
                                                            changeShippingTitleAndPrices();
                                                            let couponCheckoutForRemoving = document.querySelector('.mobile-coupon-table-place tbody');
                                                            let rowsToRemove = couponCheckoutForRemoving.querySelectorAll('tr');
                                                            for (let i=1; i < rowsToRemove.length; i++){
                                                                couponCheckoutForRemoving.removeChild(rowsToRemove[i]);
                                                            }
                                                            couponFieldOutsideOnMobile();
                                                        } else {
                                                            if (window.innerWidth >570){
                                                                let paymentMethodSelected = document.querySelector('.woocommerce-checkout input[name="payment_method"]:checked');

                                                                let hiddenWrapper = document.querySelector('.ic-order-review-wrapper-hidden');
                                                                hiddenWrapper.innerHTML = '';
                                                                hiddenWrapper.innerHTML = response;

                                                                let hiddenTable = hiddenWrapper.querySelector('table');
                                                                let visibleTable = document.querySelector('.ic-order-review-wrapper table');
                                                                visibleTable.innerHTML = '';
                                                                visibleTable.innerHTML = hiddenTable.innerHTML;

                                                                hiddenTable.innerHTML='';

                                                                let singleLoader = document.querySelector('.checkout-single-loader');
                                                                let fullLoader = document.querySelector('.ic-order-review .checkout-loader');
                                                                if (singleLoader){
                                                                    singleLoader.classList.remove('active');
                                                                }
                                                                if (fullLoader){
                                                                    fullLoader.classList.remove('active');
                                                                }
                                                                visibleTable.classList.remove('loading');
                                                                paymentMethodSelected.click();
                                                            }else{
                                                                let paymentSection = document.querySelector('.mob-place-order');
                                                                let mobilePayments = paymentSection.querySelector('#payment');
                                                                let checkedPaymentMethod = mobilePayments.querySelector('input[name="payment_method"]:checked');
                                                                document.querySelector('.ic-order-review-wrapper').innerHTML = '';
                                                                document.querySelector('.ic-order-review-wrapper').innerHTML = response;
                                                                checkedPaymentMethod.click();
                                                            }

                                                            let orderTotal = document.querySelector('.ic-order-review .order-total td');
                                                            document.querySelector('.order-review-main-header span.total-header').innerHTML = orderTotal.innerHTML;

                                                            addRemoveProductAjax();
                                                            addPlusMinusListeners();

                                                            changeShippingMethodCheckout();
                                                            regulatePostPurchaseUpsell();
                                                            addCouponAjax();
                                                            removeCouponAjax();
                                                            changeShippingTitleAndPrices();
                                                            couponFieldOutsideOnMobile();
                                                            let couponCheckoutForRemoving = document.querySelector('.mobile-coupon-table-place tbody');
                                                            let rowsToRemove = couponCheckoutForRemoving.querySelectorAll('tr');
                                                            for (let i=1; i < rowsToRemove.length; i++){
                                                                couponCheckoutForRemoving.removeChild(rowsToRemove[i]);
                                                            }
                                                        }
                                                    }
                                                });
                                            }
                                        });
                                    });
                                });
                            }
                        }
                    });
                }
                else {
                    if(formLayout.classList.contains('ic-single-step-checkout-page')) {
                        if(window.innerWidth <= 570) {
                            placeOrderButton = document.querySelector('.mob-place-order button#place_order');
                        } else {
                            placeOrderButton = document.querySelector('#order_review button#place_order');
                        }
                    } else {
                        placeOrderButton = document.querySelector('button#place_order');
                    }
                    let events = placeOrderButton.getAttribute('click-listener');
                    if (events == null) {
                        placeOrderButton.setAttribute('click-listener', true);
                        placeOrderButton.addEventListener('click', function (e) {
                            let filled = checkValidationFormInputs();
                            if(!filled) {
                                e.preventDefault();
                            }
                        });
                    }
                }

            }
        });
    }

    function removeCouponAjax() {
        let removeCoupon = document.querySelector('a.woocommerce-remove-coupon');
        if (removeCoupon) {
            let events = removeCoupon.getAttribute('click-listener');
            if (events == null) {
                removeCoupon.setAttribute('click-listener', 'true');
                removeCoupon.addEventListener('click', function(e) {
                    e.preventDefault()
                    var coupon = document.querySelector('a.woocommerce-remove-coupon').dataset.coupon;
                    var button = (this);
                    var data = {
                        action: 'ic_remove_coupon_code_update_mini_cart',
                        nonce: nonces.remove_coupon_code_update_mini_cart,
                        coupon_code: coupon
                    };
                    jQuery.ajax({
                        type: 'POST',
                        dataType: 'html',
                        url: wc_add_to_cart_params.ajax_url,
                        data: data,
                        beforeSend: function () {
                            document.querySelector('.ic-order-review .checkout-loader').classList.add('active');
                        },
                        success: function (response) {
                            jQuery.ajax({
                                async: false,
                                url: urls.ajax_url,
                                type: 'get',
                                data: {
                                    action: 'ic_get_order_review',
                                    nonce: nonces.get_order_review
                                },
                                beforeSend: function () {
                                    document.querySelector('.ic-order-review .checkout-loader').classList.add('active');
                                },
                                success: function (response) {
                                    let steps = document.querySelector('.ic-cc-steps');
                                    if (steps) {
                                        document.querySelector('.ic-order-review').innerHTML = '';
                                        document.querySelector('.ic-order-review').innerHTML = response;
                                        let orderTotal = document.querySelector('.ic-order-review .order-total td');
                                        document.querySelector('.order-review-main-header span.total-header').innerHTML = orderTotal.innerHTML;
                                        addRemoveProductAjax();
                                        addPlusMinusListeners();
                                        changeShippingMethodCheckout();
                                        regulatePostPurchaseUpsell();
                                        let selectedPayment = document.querySelector('.ic-order-review #payment input[checked="checked"]').id;
                                        document.querySelector('.ic-cc-last-step #payment input#' + selectedPayment).click();
                                        addCouponAjax();
                                        removeCouponAjax();
                                        let couponCheckoutForRemoving = document.querySelector('.mobile-coupon-table-place tbody');
                                        let rowsToRemove = couponCheckoutForRemoving.querySelectorAll('tr');
                                        for (let i=1; i < rowsToRemove.length; i++){
                                            couponCheckoutForRemoving.removeChild(rowsToRemove[i]);
                                        }
                                        couponFieldOutsideOnMobile();
                                    } else {
                                        if (window.innerWidth >570){
                                            let paymentMethodSelected = document.querySelector('.woocommerce-checkout input[name="payment_method"]:checked');

                                            let hiddenWrapper = document.querySelector('.ic-order-review-wrapper-hidden');
                                            hiddenWrapper.innerHTML = '';
                                            hiddenWrapper.innerHTML = response;

                                            let hiddenTable = hiddenWrapper.querySelector('table');
                                            let visibleTable = document.querySelector('.ic-order-review-wrapper table');
                                            visibleTable.innerHTML = '';
                                            visibleTable.innerHTML = hiddenTable.innerHTML;

                                            hiddenTable.innerHTML='';
                                            let singleLoader = document.querySelector('.checkout-single-loader');
                                            let fullLoader = document.querySelector('.ic-order-review .checkout-loader');
                                            if (singleLoader){
                                                singleLoader.classList.remove('active');
                                            }
                                            if (fullLoader){
                                                fullLoader.classList.remove('active');
                                            }
                                            visibleTable.classList.remove('loading');
                                            paymentMethodSelected.click();
                                        }else{
                                            let paymentSection = document.querySelector('.mob-place-order');
                                            let mobilePayments = paymentSection.querySelector('#payment');
                                            let checkedPaymentMethod = mobilePayments.querySelector('input[name="payment_method"]:checked');
                                            document.querySelector('.ic-order-review-wrapper').innerHTML = '';
                                            document.querySelector('.ic-order-review-wrapper').innerHTML = response;
                                            checkedPaymentMethod.click();
                                        }
                                        let orderTotal = document.querySelector('.ic-order-review .order-total td');
                                        document.querySelector('.order-review-main-header span.total-header').innerHTML = orderTotal.innerHTML;
                                        addRemoveProductAjax();
                                        addPlusMinusListeners();
                                        changeShippingMethodCheckout();
                                        regulatePostPurchaseUpsell();
                                        addCouponAjax();
                                        removeCouponAjax();
                                        changeShippingTitleAndPrices();
                                        couponFieldOutsideOnMobile();
                                        let couponCheckoutForRemoving = document.querySelector('.mobile-coupon-table-place tbody');
                                        let rowsToRemove = couponCheckoutForRemoving.querySelectorAll('tr');
                                        for (let i=1; i < rowsToRemove.length; i++){
                                            couponCheckoutForRemoving.removeChild(rowsToRemove[i]);
                                        }
                                    }
                                }
                            });
                        },
                        error: function (errorThrown) {
                            console.log(errorThrown);
                        }
                    });
                });
                couponListenerAdded = true;
            }
        }
    }

    function addCouponAjax() {
        let applyCoupon = document.querySelector('.ic-order-review .coupon_checkout button');
        if (applyCoupon) {
            let events = applyCoupon.getAttribute('click-listener');
            if (events == null) {
                applyCoupon.setAttribute('click-listener', 'true');
                applyCoupon.addEventListener('click', function(e) {
                    e.preventDefault()
                    var coupon = jQuery('.ic-order-review .coupon_checkout input#coupon_code').val();
                    var button = (this);
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
                        beforeSend: function () {
                            document.querySelector('.ic-order-review .checkout-loader').classList.add('active');
                        },
                        success: function (response) {
                            let divHtml = document.createElement('div');
                            divHtml.innerHTML = response;
                            let invalidCoupon = divHtml.querySelector('.ic-invalid-coupon');
                            let validCoupon = divHtml.querySelector('.ic-valid-coupon');
                            jQuery.ajax({
                                async: false,
                                url: urls.ajax_url,
                                type: 'get',
                                data: {
                                    action: 'ic_get_order_review',
                                    nonce: nonces.get_order_review
                                },
                                success: function (response) {
                                    let steps = document.querySelector('.ic-cc-steps');
                                    if (steps) {
                                        document.querySelector('.ic-order-review').innerHTML = '';
                                        document.querySelector('.ic-order-review').innerHTML = response;
                                        let orderTotal = document.querySelector('.ic-order-review .order-total td');
                                        document.querySelector('.order-review-main-header span.total-header').innerHTML = orderTotal.innerHTML;


                                        if(window.innerWidth<=570){
                                            let orderReview = document.querySelector('.ic-order-review');
                                            if (orderReview){
                                                if (orderReview.classList.contains('active')){
                                                    if (invalidCoupon) {
                                                        let couponCheckout = document.querySelector('.ic-order-review tbody');
                                                        let trCouponInvalid = document.createElement('tr');
                                                        trCouponInvalid.innerHTML = '<td class="invalid-coupon ic-invalid-coupon-checkout" colspan="5">'+couponErrorMsg+' <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14" fill="none">\n' +
                                                            '<path fill-rule="evenodd" clip-rule="evenodd" d="M7 14C3.13401 14 0 10.866 0 7C0 3.13401 3.13401 0 7 0C10.866 0 14 3.13401 14 7C14 10.866 10.866 14 7 14ZM7 11.8125C7.72487 11.8125 8.3125 11.2249 8.3125 10.5C8.3125 9.77513 7.72487 9.1875 7 9.1875C6.27513 9.1875 5.6875 9.77513 5.6875 10.5C5.6875 11.2249 6.27513 11.8125 7 11.8125ZM7 1.75C6.51675 1.75 6.125 2.14175 6.125 2.625V7C6.125 7.48325 6.51675 7.875 7 7.875C7.48325 7.875 7.875 7.48325 7.875 7V2.625C7.875 2.14175 7.48325 1.75 7 1.75Z" fill="#F04438"/>\n' +
                                                            '</svg></td>';
                                                        couponCheckout.appendChild(trCouponInvalid);
                                                    } else if (validCoupon) {
                                                        let couponCheckout = document.querySelector('.ic-order-review tbody');
                                                        let trCouponValid = document.createElement('tr');
                                                        trCouponValid.innerHTML = '<td class="valid-coupon ic-valid-coupon-checkout" colspan="5">'+couponAppliedMsg+' </td>';
                                                        couponCheckout.appendChild(trCouponValid);
                                                    }
                                                    couponFieldOutsideOnMobile();
                                                }else{
                                                    if (invalidCoupon) {
                                                        let couponCheckout = document.querySelector('.mobile-coupon-table-place tbody');
                                                        let trCouponInvalid = document.createElement('tr');
                                                        trCouponInvalid.innerHTML = '<td class="invalid-coupon ic-invalid-coupon-checkout" colspan="5">'+couponErrorMsg+' <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14" fill="none">\n' +
                                                            '<path fill-rule="evenodd" clip-rule="evenodd" d="M7 14C3.13401 14 0 10.866 0 7C0 3.13401 3.13401 0 7 0C10.866 0 14 3.13401 14 7C14 10.866 10.866 14 7 14ZM7 11.8125C7.72487 11.8125 8.3125 11.2249 8.3125 10.5C8.3125 9.77513 7.72487 9.1875 7 9.1875C6.27513 9.1875 5.6875 9.77513 5.6875 10.5C5.6875 11.2249 6.27513 11.8125 7 11.8125ZM7 1.75C6.51675 1.75 6.125 2.14175 6.125 2.625V7C6.125 7.48325 6.51675 7.875 7 7.875C7.48325 7.875 7.875 7.48325 7.875 7V2.625C7.875 2.14175 7.48325 1.75 7 1.75Z" fill="#F04438"/>\n' +
                                                            '</svg></td>';
                                                        let rows = couponCheckout.querySelectorAll('tr');
                                                        for (let i=1; i < rows.length; i++){
                                                            couponCheckout.removeChild(rows[i]);
                                                        }
                                                        if(couponCheckout){
                                                            couponCheckout.appendChild(trCouponInvalid);
                                                        }
                                                        couponFieldOutsideOnMobile();
                                                    } else if (validCoupon) {
                                                        let couponCheckout = document.querySelector('.mobile-coupon-table-place tbody');
                                                        let trCouponValid = document.createElement('tr');
                                                        trCouponValid.innerHTML = '<td class="valid-coupon ic-valid-coupon-checkout" colspan="5">'+couponAppliedMsg+' </td>';
                                                        let rows = couponCheckout.querySelectorAll('tr');
                                                        for (let i=1; i < rows.length; i++){
                                                            couponCheckout.removeChild(rows[i]);
                                                        }
                                                        if(couponCheckout){
                                                            couponCheckout.appendChild(trCouponValid);
                                                        }
                                                        couponFieldOutsideOnMobile();
                                                    }
                                                }
                                            }

                                        }else{
                                            if (invalidCoupon) {
                                                let couponCheckout = document.querySelector('.ic-order-review tbody');
                                                let trCouponInvalid = document.createElement('tr');
                                                trCouponInvalid.innerHTML = '<td class="invalid-coupon ic-invalid-coupon-checkout" colspan="5">'+couponErrorMsg+' <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14" fill="none">\n' +
                                                    '<path fill-rule="evenodd" clip-rule="evenodd" d="M7 14C3.13401 14 0 10.866 0 7C0 3.13401 3.13401 0 7 0C10.866 0 14 3.13401 14 7C14 10.866 10.866 14 7 14ZM7 11.8125C7.72487 11.8125 8.3125 11.2249 8.3125 10.5C8.3125 9.77513 7.72487 9.1875 7 9.1875C6.27513 9.1875 5.6875 9.77513 5.6875 10.5C5.6875 11.2249 6.27513 11.8125 7 11.8125ZM7 1.75C6.51675 1.75 6.125 2.14175 6.125 2.625V7C6.125 7.48325 6.51675 7.875 7 7.875C7.48325 7.875 7.875 7.48325 7.875 7V2.625C7.875 2.14175 7.48325 1.75 7 1.75Z" fill="#F04438"/>\n' +
                                                    '</svg></td>';
                                                couponCheckout.appendChild(trCouponInvalid);
                                            } else if (validCoupon) {
                                                let couponCheckout = document.querySelector('.ic-order-review tbody');
                                                let trCouponValid = document.createElement('tr');
                                                trCouponValid.innerHTML = '<td class="valid-coupon ic-valid-coupon-checkout" colspan="5">'+couponAppliedMsg+'</td>';
                                                couponCheckout.appendChild(trCouponValid);
                                            }
                                        }

                                        addRemoveProductAjax();
                                        removeCouponAjax();
                                        addPlusMinusListeners();
                                        changeShippingMethodCheckout();
                                        regulatePostPurchaseUpsell();
                                        let selectedPayment = document.querySelector('.ic-order-review #payment input[checked="checked"]').id;
                                        document.querySelector('.ic-cc-last-step #payment input#' + selectedPayment).click();
                                        addCouponAjax();
                                        removeCouponAjax();
                                        changeShippingTitleAndPrices();

                                    } else {
                                        if (window.innerWidth >570){
                                            let paymentMethodSelected = document.querySelector('.woocommerce-checkout input[name="payment_method"]:checked');

                                            let hiddenWrapper = document.querySelector('.ic-order-review-wrapper-hidden');
                                            hiddenWrapper.innerHTML = '';
                                            hiddenWrapper.innerHTML = response;

                                            let hiddenTable = hiddenWrapper.querySelector('table');
                                            let visibleTable = document.querySelector('.ic-order-review-wrapper table');
                                            visibleTable.innerHTML = '';
                                            visibleTable.innerHTML = hiddenTable.innerHTML;

                                            hiddenTable.innerHTML='';

                                            let singleLoader = document.querySelector('.checkout-single-loader');
                                            let fullLoader = document.querySelector('.ic-order-review .checkout-loader');
                                            if (singleLoader){
                                                singleLoader.classList.remove('active');
                                            }
                                            if (fullLoader){
                                                fullLoader.classList.remove('active');
                                            }
                                            visibleTable.classList.remove('loading');
                                            paymentMethodSelected.click();
                                        }else{
                                            let paymentSection = document.querySelector('.mob-place-order');
                                            let mobilePayments = paymentSection.querySelector('#payment');
                                            let checkedPaymentMethod = mobilePayments.querySelector('input[name="payment_method"]:checked');
                                            document.querySelector('.ic-order-review-wrapper').innerHTML = '';
                                            document.querySelector('.ic-order-review-wrapper').innerHTML = response;
                                            checkedPaymentMethod.click();
                                        }
                                        let orderTotal = document.querySelector('.ic-order-review .order-total td');
                                        document.querySelector('.order-review-main-header span.total-header').innerHTML = orderTotal.innerHTML;

                                        if(window.innerWidth<=570){
                                            let orderReviewWrapper = document.querySelector('.ic-order-review-wrapper');
                                            if (orderReviewWrapper){
                                                if (orderReviewWrapper.classList.contains('active')){
                                                    if (invalidCoupon) {
                                                        let couponCheckout = document.querySelector('.ic-order-review tbody');
                                                        let trCouponInvalid = document.createElement('tr');
                                                        trCouponInvalid.innerHTML = '<td class="invalid-coupon ic-invalid-coupon-checkout" colspan="5">'+couponErrorMsg+' <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14" fill="none">\n' +
                                                            '<path fill-rule="evenodd" clip-rule="evenodd" d="M7 14C3.13401 14 0 10.866 0 7C0 3.13401 3.13401 0 7 0C10.866 0 14 3.13401 14 7C14 10.866 10.866 14 7 14ZM7 11.8125C7.72487 11.8125 8.3125 11.2249 8.3125 10.5C8.3125 9.77513 7.72487 9.1875 7 9.1875C6.27513 9.1875 5.6875 9.77513 5.6875 10.5C5.6875 11.2249 6.27513 11.8125 7 11.8125ZM7 1.75C6.51675 1.75 6.125 2.14175 6.125 2.625V7C6.125 7.48325 6.51675 7.875 7 7.875C7.48325 7.875 7.875 7.48325 7.875 7V2.625C7.875 2.14175 7.48325 1.75 7 1.75Z" fill="#F04438"/>\n' +
                                                            '</svg></td>';
                                                        couponCheckout.appendChild(trCouponInvalid);
                                                    } else if (validCoupon) {
                                                        let couponCheckout = document.querySelector('.ic-order-review tbody');
                                                        let trCouponValid = document.createElement('tr');
                                                        trCouponValid.innerHTML = '<td class="valid-coupon ic-valid-coupon-checkout" colspan="5">'+couponAppliedMsg+' </td>';
                                                        couponCheckout.appendChild(trCouponValid);
                                                    }
                                                    couponFieldOutsideOnMobile();
                                                }else{

                                                    if (invalidCoupon) {
                                                        let couponCheckout = document.querySelector('.mobile-coupon-table-place tbody');
                                                        let trCouponInvalid = document.createElement('tr');
                                                        trCouponInvalid.innerHTML = '<td class="invalid-coupon ic-invalid-coupon-checkout" colspan="5">'+couponErrorMsg+' <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14" fill="none">\n' +
                                                            '<path fill-rule="evenodd" clip-rule="evenodd" d="M7 14C3.13401 14 0 10.866 0 7C0 3.13401 3.13401 0 7 0C10.866 0 14 3.13401 14 7C14 10.866 10.866 14 7 14ZM7 11.8125C7.72487 11.8125 8.3125 11.2249 8.3125 10.5C8.3125 9.77513 7.72487 9.1875 7 9.1875C6.27513 9.1875 5.6875 9.77513 5.6875 10.5C5.6875 11.2249 6.27513 11.8125 7 11.8125ZM7 1.75C6.51675 1.75 6.125 2.14175 6.125 2.625V7C6.125 7.48325 6.51675 7.875 7 7.875C7.48325 7.875 7.875 7.48325 7.875 7V2.625C7.875 2.14175 7.48325 1.75 7 1.75Z" fill="#F04438"/>\n' +
                                                            '</svg></td>';
                                                        let rows = couponCheckout.querySelectorAll('tr');
                                                        for (let i=1; i < rows.length; i++){
                                                            couponCheckout.removeChild(rows[i]);
                                                        }
                                                        if(couponCheckout){
                                                            couponCheckout.appendChild(trCouponInvalid);
                                                        }
                                                        couponFieldOutsideOnMobile();
                                                    } else if (validCoupon) {
                                                        let couponCheckout = document.querySelector('.mobile-coupon-table-place tbody');
                                                        let trCouponValid = document.createElement('tr');
                                                        trCouponValid.innerHTML = '<td class="valid-coupon ic-valid-coupon-checkout" colspan="5">'+couponAppliedMsg+' </td>';
                                                        let rows = couponCheckout.querySelectorAll('tr');
                                                        for (let i=1; i < rows.length; i++){
                                                            couponCheckout.removeChild(rows[i]);
                                                        }
                                                        if(couponCheckout){
                                                            couponCheckout.appendChild(trCouponValid);
                                                        }
                                                        couponFieldOutsideOnMobile();
                                                    }
                                                }
                                            }

                                        }else{
                                            if (invalidCoupon) {
                                                let couponCheckout = document.querySelector('.ic-order-review tbody');
                                                let trCouponInvalid = document.createElement('tr');
                                                trCouponInvalid.innerHTML = '<td class="invalid-coupon ic-invalid-coupon-checkout" colspan="5">'+couponErrorMsg+' <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14" fill="none">\n' +
                                                    '<path fill-rule="evenodd" clip-rule="evenodd" d="M7 14C3.13401 14 0 10.866 0 7C0 3.13401 3.13401 0 7 0C10.866 0 14 3.13401 14 7C14 10.866 10.866 14 7 14ZM7 11.8125C7.72487 11.8125 8.3125 11.2249 8.3125 10.5C8.3125 9.77513 7.72487 9.1875 7 9.1875C6.27513 9.1875 5.6875 9.77513 5.6875 10.5C5.6875 11.2249 6.27513 11.8125 7 11.8125ZM7 1.75C6.51675 1.75 6.125 2.14175 6.125 2.625V7C6.125 7.48325 6.51675 7.875 7 7.875C7.48325 7.875 7.875 7.48325 7.875 7V2.625C7.875 2.14175 7.48325 1.75 7 1.75Z" fill="#F04438"/>\n' +
                                                    '</svg></td>';
                                                couponCheckout.appendChild(trCouponInvalid);
                                            } else if (validCoupon) {
                                                let couponCheckout = document.querySelector('.ic-order-review tbody');
                                                let trCouponValid = document.createElement('tr');
                                                trCouponValid.innerHTML = '<td class="valid-coupon ic-valid-coupon-checkout" colspan="5">'+couponAppliedMsg+' </td>';
                                                couponCheckout.appendChild(trCouponValid);
                                            }
                                        }
                                        addRemoveProductAjax();
                                        removeCouponAjax();
                                        addPlusMinusListeners();
                                        changeShippingMethodCheckout();
                                        regulatePostPurchaseUpsell();
                                        addCouponAjax();
                                        removeCouponAjax();
                                        changeShippingTitleAndPrices();
                                    }
                                }
                            });
                        },
                        error: function (errorThrown) {
                            console.log(errorThrown);
                        }
                    });
                })
            }
        }
    }

    function addRemoveProductAjax() {
        let xMarks = document.querySelectorAll('.product-remove img');
        xMarks.forEach((xMark) => {
            let eventsMark = xMark.getAttribute('click-listener');
            if (eventsMark == null) {
                xMark.setAttribute('click-listener', true);
                xMark.addEventListener('click', function () {
                    let productId = xMark.dataset.productId;
                    let variationId = xMark.dataset.variationId;
                    var data = {
                        action: 'ic_remove_product_from_cart',
                        productId: productId,
                        variationId: variationId,
                    };
                    let upsells = JSON.parse(localStorage.getItem('upsells'));
                    if(upsells != null && upsells.length > 0) {
                        if (parseInt(variationId) > 0 ) {
                            upsells = upsells.filter(us => us.product_id != parseInt(variationId));
                        }else{
                            upsells = upsells.filter(us => us.product_id != parseInt(productId));
                        }
                        localStorage.setItem('upsells', JSON.stringify(upsells));
                    }
                    jQuery.ajax({
                        type: 'POST',
                        dataType: 'html',
                        url: wc_add_to_cart_params.ajax_url,
                        data: data,
                        beforeSend: function () {
                            let loadingImage = document.querySelector('#order_review .checkout-single-loader');
                            let tableRowOfProduct = xMark.parentElement.parentElement;
                            let offsetTop = jQuery(tableRowOfProduct).offset().top - jQuery('.customer_details-right-section tbody').offset().top;
                            loadingImage.style.top = (offsetTop + 9) + 'px';
                            let qtyHtml = tableRowOfProduct.querySelector('.qty-qty-cont');
                            qtyHtml.innerText = '0';
                            tableRowOfProduct.classList.add('blur');
                            loadingImage.classList.add('active');
                            tableRowOfProduct.parentElement.parentElement.classList.add('loading');
                            let dealsSection = document.getElementById('ic-upsell');
                            if (dealsSection){
                                dealsSection.classList.add('loading');
                            }
                        }, complete: function (response) {
                            let dealsSection = document.getElementById('ic-upsell');
                            if (dealsSection) {
                                dealsSection.classList.remove('loading');
                            }
                        },
                        success: function (response) {
                            jQuery.ajax({
                                async: false,
                                url: urls.ajax_url,
                                type: 'get',
                                data: {
                                    action: 'ic_get_order_review',
                                    nonce: nonces.get_order_review
                                },
                                success: function (response) {
                                    //jQuery(document.body).trigger('update_checkout');
                                    let steps = document.querySelector('.ic-cc-steps');
                                    if (steps) {
                                        document.querySelector('.ic-order-review').innerHTML = '';
                                        document.querySelector('.ic-order-review').innerHTML = response;
                                        let orderTotal = document.querySelector('.ic-order-review .order-total td');
                                        document.querySelector('.order-review-main-header span.total-header').innerHTML = orderTotal.innerHTML;
                                        addRemoveProductAjax();
                                        addPlusMinusListeners();
                                        changeShippingMethodCheckout();
                                        regulatePostPurchaseUpsell();
                                        let products = document.querySelectorAll('.ic-order-review tr.cart_item');
                                        if (products.length == 0) {
                                            window.location.href = urls.shop_url;
                                        }
                                        let selectedPayment = document.querySelector('.ic-order-review #payment input[checked="checked"]').id;
                                        document.querySelector('.ic-cc-last-step #payment input#' + selectedPayment).click();
                                        addCouponAjax();
                                        removeCouponAjax();
                                        changeShippingTitleAndPrices();
                                        couponFieldOutsideOnMobile();
                                        let couponCheckoutForRemoving = document.querySelector('.mobile-coupon-table-place tbody');
                                        let rowsToRemove = couponCheckoutForRemoving.querySelectorAll('tr');
                                        for (let i=1; i < rowsToRemove.length; i++){
                                            couponCheckoutForRemoving.removeChild(rowsToRemove[i]);
                                        }
                                    } else {
                                        if (window.innerWidth >570){
                                            let paymentMethodSelected = document.querySelector('.woocommerce-checkout input[name="payment_method"]:checked');

                                            let hiddenWrapper = document.querySelector('.ic-order-review-wrapper-hidden');
                                            hiddenWrapper.innerHTML = '';
                                            hiddenWrapper.innerHTML = response;

                                            let hiddenTable = hiddenWrapper.querySelector('table');
                                            let visibleTable = document.querySelector('.ic-order-review-wrapper table');
                                            visibleTable.innerHTML = '';
                                            visibleTable.innerHTML = hiddenTable.innerHTML;

                                            hiddenTable.innerHTML='';

                                            visibleTable.classList.remove('loading');

                                            let singleLoader = document.querySelector('.checkout-single-loader');
                                            let fullLoader = document.querySelector('.ic-order-review .checkout-loader');
                                            if (singleLoader){
                                                singleLoader.classList.remove('active');
                                            }
                                            if (fullLoader){
                                                fullLoader.classList.remove('active');
                                            }
                                            paymentMethodSelected.click();
                                        }else{
                                            let paymentSection = document.querySelector('.mob-place-order');
                                            let mobilePayments = paymentSection.querySelector('#payment');
                                            let checkedPaymentMethod = mobilePayments.querySelector('input[name="payment_method"]:checked');
                                            document.querySelector('.ic-order-review-wrapper').innerHTML = '';
                                            document.querySelector('.ic-order-review-wrapper').innerHTML = response;
                                            checkedPaymentMethod.click();
                                        }
                                        let orderTotal = document.querySelector('.ic-order-review .order-total td');
                                        document.querySelector('.order-review-main-header span.total-header').innerHTML = orderTotal.innerHTML;
                                        addRemoveProductAjax();
                                        addPlusMinusListeners();
                                        changeShippingMethodCheckout();
                                        regulatePostPurchaseUpsell();
                                        let products = document.querySelectorAll('.ic-order-review tr.cart_item');
                                        if (products.length == 0) {
                                            window.location.href = urls.shop_url;
                                        }
                                        addCouponAjax();
                                        removeCouponAjax();
                                        changeShippingTitleAndPrices();
                                        couponFieldOutsideOnMobile();
                                        let couponCheckoutForRemoving = document.querySelector('.mobile-coupon-table-place tbody');
                                        let rowsToRemove = couponCheckoutForRemoving.querySelectorAll('tr');
                                        for (let i=1; i < rowsToRemove.length; i++){
                                            couponCheckoutForRemoving.removeChild(rowsToRemove[i]);
                                        }
                                    }
                                }
                            });
                        },
                        error: function (errorThrown) {
                            console.log(errorThrown);
                        }
                    });
                });
            }
        });
    }

    function regulateCouponOnV2() {
        setTimeout(function () {
            let couponButton = document.querySelector('.coupon_checkout button');
            let parent = couponButton.parentElement;
            parent.removeChild(couponButton);
            let newButton = document.createElement('a');
            newButton.innerText = 'Apply coupon';
            newButton.classList.add('button');
            parent.appendChild(newButton);
            newButton.addEventListener('click', function () {
                var coupon = jQuery('.coupon_checkout input#coupon_code').val();
                var button = (this);
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
                    beforeSend: function () {
                        document.querySelector('.ic-order-review .checkout-loader').classList.add('active');
                    },
                    success: function (response) {
                        jQuery.ajax({
                            async: false,
                            url: urls.ajax_url,
                            type: 'get',
                            data: {
                                action: 'ic_get_order_review',
                                nonce: nonces.get_order_review
                            },
                            success: function (response) {
                                let steps = document.querySelector('.ic-cc-steps');
                                if (steps) {
                                    document.querySelector('.ic-order-review').innerHTML = '';
                                    document.querySelector('.ic-order-review').innerHTML = response;
                                    let orderTotal = document.querySelector('.ic-order-review .order-total td');
                                    document.querySelector('.order-review-main-header span.total-header').innerHTML = orderTotal.innerHTML;
                                    addRemoveProductAjax();
                                    addPlusMinusListeners();
                                    changeShippingMethodCheckout();
                                    regulatePostPurchaseUpsell();
                                    let selectedPayment = document.querySelector('.ic-order-review #payment input[checked="checked"]').id;
                                    document.querySelector('.ic-cc-last-step #payment input#' + selectedPayment).click();
                                    addCouponAjax();
                                    removeCouponAjax();
                                    couponFieldOutsideOnMobile();
                                    let couponCheckoutForRemoving = document.querySelector('.mobile-coupon-table-place tbody');
                                    let rowsToRemove = couponCheckoutForRemoving.querySelectorAll('tr');
                                    for (let i=1; i < rowsToRemove.length; i++){
                                        couponCheckoutForRemoving.removeChild(rowsToRemove[i]);
                                    }
                                } else {
                                    if (window.innerWidth >570){
                                        let paymentMethodSelected = document.querySelector('.woocommerce-checkout input[name="payment_method"]:checked');

                                        let hiddenWrapper = document.querySelector('.ic-order-review-wrapper-hidden');
                                        hiddenWrapper.innerHTML = '';
                                        hiddenWrapper.innerHTML = response;

                                        let hiddenTable = hiddenWrapper.querySelector('table');
                                        let visibleTable = document.querySelector('.ic-order-review-wrapper table');
                                        visibleTable.innerHTML = '';
                                        visibleTable.innerHTML = hiddenTable.innerHTML;

                                        hiddenTable.innerHTML='';

                                        visibleTable.classList.remove('loading');
                                        let singleLoader = document.querySelector('.checkout-single-loader');
                                        let fullLoader = document.querySelector('.ic-order-review .checkout-loader');
                                        if (singleLoader){
                                            singleLoader.classList.remove('active');
                                        }
                                        if (fullLoader){
                                            fullLoader.classList.remove('active');
                                        }
                                        paymentMethodSelected.click();
                                    }else{
                                        let paymentSection = document.querySelector('.mob-place-order');
                                        let mobilePayments = paymentSection.querySelector('#payment');
                                        let checkedPaymentMethod = mobilePayments.querySelector('input[name="payment_method"]:checked');
                                        document.querySelector('.ic-order-review-wrapper').innerHTML = '';
                                        document.querySelector('.ic-order-review-wrapper').innerHTML = response;
                                        checkedPaymentMethod.click();
                                    }
                                    let orderTotal = document.querySelector('.ic-order-review .order-total td');
                                    document.querySelector('.order-review-main-header span.total-header').innerHTML = orderTotal.innerHTML;
                                    addRemoveProductAjax();
                                    addPlusMinusListeners();
                                    changeShippingMethodCheckout();
                                    regulatePostPurchaseUpsell();
                                    addCouponAjax();
                                    removeCouponAjax();
                                    changeShippingTitleAndPrices();
                                    couponFieldOutsideOnMobile();
                                    let couponCheckoutForRemoving = document.querySelector('.mobile-coupon-table-place tbody');
                                    let rowsToRemove = couponCheckoutForRemoving.querySelectorAll('tr');
                                    for (let i=1; i < rowsToRemove.length; i++){
                                        couponCheckoutForRemoving.removeChild(rowsToRemove[i]);
                                    }
                                }
                            }
                        });
                    },
                    error: function (errorThrown) {
                        console.log(errorThrown);
                    }
                });
            });
        }, 3000);
    }

    function addPlusMinusListeners() {
        let loadingImage = document.querySelector('#order_review .checkout-single-loader');
        let spansMinusQty = document.querySelectorAll('#ic-checkout .quantity-counter .minus-qty');
        let spansPlusQty = document.querySelectorAll('#ic-checkout .quantity-counter .plus-qty');

        spansMinusQty.forEach((spanMinusQty) => {
            let eventsMinus = spanMinusQty.getAttribute('click-listener');
            if (eventsMinus == null) {
                spanMinusQty.setAttribute('click-listener', true);
                spanMinusQty.addEventListener('click', function () {
                    let productId = spanMinusQty.parentElement.parentElement.parentElement.querySelector('.product-remove img').dataset.productId;
                    let variationId = spanMinusQty.parentElement.parentElement.parentElement.querySelector('.product-remove img').dataset.variationId;
                    let qty = spanMinusQty.parentElement.querySelector('.qty-qty-cont').innerText;
                    if (parseInt(qty) == 1) {
                        spanMinusQty.parentElement.parentElement.parentElement.querySelector('.product-remove img').click();
                    } else{
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
                                variationId: variationId,
                            },
                            beforeSend: function () {
                                let tableRowOfProduct = spanMinusQty.parentElement.parentElement.parentElement;
                                let offsetTop = jQuery(tableRowOfProduct).offset().top - jQuery('.customer_details-right-section tbody').offset().top;
                                loadingImage.style.top = (offsetTop + 9) + 'px';
                                tableRowOfProduct.classList.add('blur');
                                loadingImage.classList.add('active');
                                let qtyHtml = tableRowOfProduct.querySelector('.qty-qty-cont');
                                let numQty = qtyHtml.innerHTML;
                                qtyHtml.innerHTML = +numQty - 1;
                                tableRowOfProduct.parentElement.parentElement.classList.add('loading');
                                let dealsSection = document.getElementById('ic-upsell');
                                if (dealsSection){
                                    dealsSection.classList.add('loading');
                                }
                            }, complete: function (response) {
                                let dealsSection = document.getElementById('ic-upsell');
                                if (dealsSection){
                                    dealsSection.classList.remove('loading');
                                }
                            },
                            success: function (response) {
                                jQuery.ajax({
                                    async: false,
                                    url: urls.ajax_url,
                                    type: 'get',
                                    data: {
                                        action: 'ic_get_order_review',
                                        nonce: nonces.get_order_review
                                    },
                                    success: function (response) {
                                        //jQuery(document.body).trigger('update_checkout');

                                        let steps = document.querySelector('.ic-cc-steps');
                                        if (steps) {
                                            document.querySelector('.ic-order-review').innerHTML = '';
                                            document.querySelector('.ic-order-review').innerHTML = response;
                                            let orderTotal = document.querySelector('.ic-order-review .order-total td');
                                            document.querySelector('.order-review-main-header span.total-header').innerHTML = orderTotal.innerHTML;
                                            addRemoveProductAjax();
                                            addPlusMinusListeners();
                                            changeShippingMethodCheckout();
                                            regulatePostPurchaseUpsell();
                                            let selectedPayment = document.querySelector('.ic-order-review #payment input[checked="checked"]').id;
                                            document.querySelector('.ic-cc-last-step #payment input#' + selectedPayment).click();
                                            addCouponAjax();
                                            removeCouponAjax();
                                            couponFieldOutsideOnMobile();
                                            let couponCheckoutForRemoving = document.querySelector('.mobile-coupon-table-place tbody');
                                            let rowsToRemove = couponCheckoutForRemoving.querySelectorAll('tr');
                                            for (let i=1; i < rowsToRemove.length; i++){
                                                couponCheckoutForRemoving.removeChild(rowsToRemove[i]);
                                            }
                                        } else {
                                            if (window.innerWidth >570){
                                                let paymentMethodSelected = document.querySelector('.woocommerce-checkout input[name="payment_method"]:checked');

                                                let hiddenWrapper = document.querySelector('.ic-order-review-wrapper-hidden');
                                                hiddenWrapper.innerHTML = '';
                                                hiddenWrapper.innerHTML = response;

                                                let hiddenTable = hiddenWrapper.querySelector('table');
                                                let visibleTable = document.querySelector('.ic-order-review-wrapper table');
                                                visibleTable.innerHTML = '';
                                                visibleTable.innerHTML = hiddenTable.innerHTML;

                                                hiddenTable.innerHTML='';

                                                visibleTable.classList.remove('loading');

                                                let singleLoader = document.querySelector('.checkout-single-loader');
                                                let fullLoader = document.querySelector('.ic-order-review .checkout-loader');
                                                if (singleLoader){
                                                    singleLoader.classList.remove('active');
                                                }
                                                if (fullLoader){
                                                    fullLoader.classList.remove('active');
                                                }

                                                paymentMethodSelected.click();
                                            }else{
                                                let paymentSection = document.querySelector('.mob-place-order');
                                                let mobilePayments = paymentSection.querySelector('#payment');
                                                let checkedPaymentMethod = mobilePayments.querySelector('input[name="payment_method"]:checked');
                                                document.querySelector('.ic-order-review-wrapper').innerHTML = '';
                                                document.querySelector('.ic-order-review-wrapper').innerHTML = response;
                                                checkedPaymentMethod.click();
                                            }
                                            let orderTotal = document.querySelector('.ic-order-review .order-total td');
                                            document.querySelector('.order-review-main-header span.total-header').innerHTML = orderTotal.innerHTML;
                                            addRemoveProductAjax();
                                            addPlusMinusListeners();
                                            changeShippingMethodCheckout();
                                            regulatePostPurchaseUpsell();
                                            addCouponAjax();
                                            removeCouponAjax();
                                            changeShippingTitleAndPrices();
                                            couponFieldOutsideOnMobile();
                                            let couponCheckoutForRemoving = document.querySelector('.mobile-coupon-table-place tbody');
                                            let rowsToRemove = couponCheckoutForRemoving.querySelectorAll('tr');
                                            for (let i=1; i < rowsToRemove.length; i++){
                                                couponCheckoutForRemoving.removeChild(rowsToRemove[i]);
                                            }
                                        }
                                        // let orderReviewTabs = document.querySelectorAll('.cart_item');
                                        // if (orderReviewTabs){
                                        //     orderReviewTabs.forEach((tab)=>{
                                        //         if (!tab.classList.contains('ic-price-changed-checkout')){
                                        //             tab.classList.add('ic-price-changed-checkout');
                                        //             let price = tab.querySelector('.product-total bdi');
                                        //             let spanEndIndex = price.innerHTML.indexOf('</span>');
                                        //             let stringAfterSpan = price.innerHTML.substring(spanEndIndex + 7);
                                        //             stringAfterSpan = stringAfterSpan.replace(/,/g, '');
                                        //             let totalPrice = parseFloat(stringAfterSpan);
                                        //             let quantity = Math.floor(tab.querySelector('.qty-qty-cont').innerText);
                                        //             let numberRegex = /<\/span>(\d{1,3}(,\d{3})*(\.\d{1,2})?)/i;
                                        //             let newPrice = (totalPrice/quantity).toFixed(2);
                                        //             price.innerHTML= price.innerHTML.replace(numberRegex, `</span>${newPrice}`);
                                        //         }
                                        //     });
                                        // }
                                    }
                                });
                            }
                        });
                    }
                });
            }
        });

        spansPlusQty.forEach((spanPlusQty) => {
            let events = spanPlusQty.getAttribute('click-listener');
            if (events == null) {
                spanPlusQty.setAttribute('click-listener', true);
                spanPlusQty.addEventListener('click', function () {
                    let productId = spanPlusQty.parentElement.parentElement.parentElement.querySelector('.product-remove img').dataset.productId;
                    jQuery.ajax({
                            type: 'POST',
                            url: urls.ajax_url,
                            data: {
                                action: 'ic_increase_product_qty',
                                nonce: nonces.increase_product_qty,
                                productId: productId,
                            },
                            beforeSend: function () {
                                let tableRowOfProduct = spanPlusQty.parentElement.parentElement.parentElement;
                                let offsetTop = jQuery(tableRowOfProduct).offset().top - jQuery('.customer_details-right-section tbody').offset().top;
                                loadingImage.style.top = (offsetTop + 9) + 'px';
                                tableRowOfProduct.classList.add('blur')
                                loadingImage.classList.add('active');
                                let qtyHtml = tableRowOfProduct.querySelector('.qty-qty-cont');
                                let numQty = qtyHtml.innerHTML;
                                qtyHtml.innerHTML = +numQty + 1;
                                tableRowOfProduct.parentElement.parentElement.classList.add('loading');
                                let dealsSection = document.getElementById('ic-upsell');
                                if (dealsSection){
                                    dealsSection.classList.add('loading');
                                }

                            }, complete: function (response) {
                                let dealsSection = document.getElementById('ic-upsell');
                                if (dealsSection) {
                                    dealsSection.classList.remove('loading');
                                }
                            },
                            success: function (response) {
                                if (response == 0){
                                    let dealsSection = document.getElementById('ic-upsell');
                                    if (dealsSection){
                                        dealsSection.classList.remove('loading');
                                    }
                                    let tableRowOfProduct = spanPlusQty.parentElement.parentElement.parentElement;
                                    tableRowOfProduct.classList.remove('blur');
                                    let stockProductName = tableRowOfProduct.querySelector('.product-name').innerText;
                                    tableRowOfProduct.parentElement.parentElement.classList.remove('loading');
                                    loadingImage.classList.remove('active');
                                    let qtyHtml = tableRowOfProduct.querySelector('.qty-qty-cont');
                                    let numQty = qtyHtml.innerHTML;
                                    qtyHtml.innerHTML = +numQty - 1;
                                    let errorTr = document.createElement('tr');
                                    errorTr.classList.add('error_tr_checkout');
                                    errorTr.innerHTML = '<td colspan="5"> <span>' + stockProductName + '</span>' + outOfStockMsg +' '+errorIcon+'</td>';
                                    insertAfterTr(errorTr, tableRowOfProduct);
                                    spanPlusQty.classList.add('disabled');
                                }
                                else{
                                    let upsells = JSON.parse(localStorage.getItem('upsells'));
                                    if (upsells != null && upsells.length > 0) {
                                        if (upsells.some(e => e.product_id === productId)) {
                                            let upsellExisting = upsells.find(el => el.product_id === productId);
                                            upsellExisting.qty += 1;
                                        }
                                        localStorage.setItem('upsells', JSON.stringify(upsells));
                                    }
                                    jQuery.ajax({
                                        async: false,
                                        url: urls.ajax_url,
                                        type: 'get',
                                        data: {
                                            action: 'ic_get_order_review',
                                            nonce: nonces.get_order_review
                                        },
                                        success: function (response) {
                                            //jQuery(document.body).trigger('update_checkout');
                                            let steps = document.querySelector('.ic-cc-steps');
                                            if (steps) {
                                                document.querySelector('.ic-order-review').innerHTML = '';
                                                document.querySelector('.ic-order-review').innerHTML = response;
                                                let orderTotal = document.querySelector('.ic-order-review .order-total td');
                                                document.querySelector('.order-review-main-header span.total-header').innerHTML = orderTotal.innerHTML;
                                                addRemoveProductAjax();
                                                addPlusMinusListeners();
                                                changeShippingMethodCheckout();
                                                regulatePostPurchaseUpsell();
                                                let selectedPayment = document.querySelector('.ic-order-review #payment input[checked="checked"]').id;
                                                document.querySelector('.ic-cc-last-step #payment input#' + selectedPayment).click();
                                                addCouponAjax();
                                                removeCouponAjax();
                                                couponFieldOutsideOnMobile();
                                                let couponCheckoutForRemoving = document.querySelector('.mobile-coupon-table-place tbody');
                                                let rowsToRemove = couponCheckoutForRemoving.querySelectorAll('tr');
                                                for (let i=1; i < rowsToRemove.length; i++){
                                                    couponCheckoutForRemoving.removeChild(rowsToRemove[i]);
                                                }
                                            } else {
                                                if (window.innerWidth >570){
                                                    let paymentMethodSelected = document.querySelector('.woocommerce-checkout input[name="payment_method"]:checked');

                                                    let hiddenWrapper = document.querySelector('.ic-order-review-wrapper-hidden');
                                                    hiddenWrapper.innerHTML = '';
                                                    hiddenWrapper.innerHTML = response;

                                                    let hiddenTable = hiddenWrapper.querySelector('table');
                                                    let visibleTable = document.querySelector('.ic-order-review-wrapper table');
                                                    visibleTable.innerHTML = '';
                                                    visibleTable.innerHTML = hiddenTable.innerHTML;

                                                    hiddenTable.innerHTML='';

                                                    visibleTable.classList.remove('loading');

                                                    let singleLoader = document.querySelector('.checkout-single-loader');
                                                    let fullLoader = document.querySelector('.ic-order-review .checkout-loader');
                                                    if (singleLoader){
                                                        singleLoader.classList.remove('active');
                                                    }
                                                    if (fullLoader){
                                                        fullLoader.classList.remove('active');
                                                    }

                                                    paymentMethodSelected.click();
                                                }else{
                                                    let paymentSection = document.querySelector('.mob-place-order');
                                                    let mobilePayments = paymentSection.querySelector('#payment');
                                                    let checkedPaymentMethod = mobilePayments.querySelector('input[name="payment_method"]:checked');
                                                    document.querySelector('.ic-order-review-wrapper').innerHTML = '';
                                                    document.querySelector('.ic-order-review-wrapper').innerHTML = response;
                                                    checkedPaymentMethod.click();
                                                }
                                                let orderTotal = document.querySelector('.ic-order-review .order-total td');
                                                document.querySelector('.order-review-main-header span.total-header').innerHTML = orderTotal.innerHTML;
                                                addRemoveProductAjax();
                                                addPlusMinusListeners();
                                                changeShippingMethodCheckout();
                                                regulatePostPurchaseUpsell();
                                                addCouponAjax();
                                                removeCouponAjax();
                                                changeShippingTitleAndPrices();
                                                couponFieldOutsideOnMobile();
                                                let couponCheckoutForRemoving = document.querySelector('.mobile-coupon-table-place tbody');
                                                let rowsToRemove = couponCheckoutForRemoving.querySelectorAll('tr');
                                                for (let i=1; i < rowsToRemove.length; i++){
                                                    couponCheckoutForRemoving.removeChild(rowsToRemove[i]);
                                                }
                                            }
                                            // let orderReviewTabs = document.querySelectorAll('.cart_item');
                                            // if (orderReviewTabs){
                                            //     orderReviewTabs.forEach((tab)=>{
                                            //         if (!tab.classList.contains('ic-price-changed-checkout')){
                                            //             tab.classList.add('ic-price-changed-checkout');
                                            //             let price = tab.querySelector('.product-total bdi');
                                            //             let spanEndIndex = price.innerHTML.indexOf('</span>');
                                            //             let stringAfterSpan = price.innerHTML.substring(spanEndIndex + 7);
                                            //             stringAfterSpan = stringAfterSpan.replace(/,/g, '');
                                            //             let totalPrice = parseFloat(stringAfterSpan);
                                            //             let quantity = Math.floor(tab.querySelector('.qty-qty-cont').innerText);
                                            //             let numberRegex = /<\/span>(\d{1,3}(,\d{3})*(\.\d{1,2})?)/i;
                                            //             let newPrice = (totalPrice/quantity).toFixed(2);
                                            //             price.innerHTML= price.innerHTML.replace(numberRegex, `</span>${newPrice}`);
                                            //         }
                                            //     });
                                            // }
                                        }
                                    });
                                }
                            }
                        });
                });
            }
        });
    }
    addPlusMinusListeners();

    // wc_checkout_params is required to continue, ensure the object exists
    if (typeof wc_checkout_params === 'undefined') {
        return false;
    }

    $.blockUI.defaults.overlayCSS.cursor = 'default';

    var wc_checkout_form = {
        updateTimer: false,
        dirtyInput: false,
        selectedPaymentMethod: false,
        xhr: false,
        $order_review: $('#order_review'),
        $checkout_form: $('form.checkout'),
        init: function () {
            $(document.body).on('update_checkout', this.update_checkout);
            $(document.body).on('init_checkout', this.init_checkout);

            // Payment methods
            this.$checkout_form.on('click', 'input[name="payment_method"]', this.payment_method_selected);

            if ($(document.body).hasClass('woocommerce-order-pay')) {
                this.$order_review.on('click', 'input[name="payment_method"]', this.payment_method_selected);
                this.$order_review.on('submit', this.submitOrder);
                this.$order_review.attr('novalidate', 'novalidate');
            }

            // Prevent HTML5 validation which can conflict.
            this.$checkout_form.attr('novalidate', 'novalidate');

            // Form submission
            this.$checkout_form.on('submit', this.submit);

            // Inline validation
            this.$checkout_form.on('input validate change', '.input-text, select, input:checkbox', this.validate_field);

            // Manual trigger
            this.$checkout_form.on('update', this.trigger_update_checkout);

            // Inputs/selects which update totals
            this.$checkout_form.on('change', 'select.shipping_method, input[name^="shipping_method"], #ship-to-different-address input, .update_totals_on_change select, .update_totals_on_change input[type="radio"], .update_totals_on_change input[type="checkbox"]', this.trigger_update_checkout); // eslint-disable-line max-len
            this.$checkout_form.on('change', '.address-field select', this.input_changed);
            this.$checkout_form.on('change', '.address-field input.input-text, .update_totals_on_change input.input-text', this.maybe_input_changed); // eslint-disable-line max-len
            this.$checkout_form.on('keydown', '.address-field input.input-text, .update_totals_on_change input.input-text', this.queue_update_checkout); // eslint-disable-line max-len

            // Address fields
            this.$checkout_form.on('change', '#ship-to-different-address input', this.ship_to_different_address);

            // Trigger events
            this.$checkout_form.find('#ship-to-different-address input').trigger('change');
            this.init_payment_methods();

            // Update on page load
            if (wc_checkout_params.is_checkout === '1') {
                $(document.body).trigger('init_checkout');
            }
            if (wc_checkout_params.option_guest_checkout === 'yes') {
                $('input#createaccount').on('change', this.toggle_create_account).trigger('change');
            }
        },
        init_payment_methods: function () {
            var $payment_methods = $('.woocommerce-checkout').find('input[name="payment_method"]');

            // If there is one method, we can hide the radio input
            if (1 === $payment_methods.length) {
                $payment_methods.eq(0).hide();
            }

            // If there was a previously selected method, check that one.
            if (wc_checkout_form.selectedPaymentMethod) {
                $('#' + wc_checkout_form.selectedPaymentMethod).prop('checked', true);
            }

            // If there are none selected, select the first.
            if (0 === $payment_methods.filter(':checked').length) {
                $payment_methods.eq(0).prop('checked', true);
            }

            // Get name of new selected method.
            var checkedPaymentMethod = $payment_methods.filter(':checked').eq(0).prop('id');

            if ($payment_methods.length > 1) {
                // Hide open descriptions.
                $('div.payment_box:not(".' + checkedPaymentMethod + '")').filter(':visible').slideUp(0);
            }

            // Trigger click event for selected method
            $payment_methods.filter(':checked').eq(0).trigger('click');
        },
        get_payment_method: function () {
            return wc_checkout_form.$checkout_form.find('input[name="payment_method"]:checked').val();
        },
        payment_method_selected: function (e) {
            e.stopPropagation();
            if ($('.payment_methods input.input-radio').length > 1) {
                var target_payment_box = $('div.payment_box.' + $(this).attr('ID')),
                    is_checked = $(this).is(':checked');

                if (is_checked && !target_payment_box.is(':visible')) {
                    $('div.payment_box').filter(':visible').slideUp(230);

                    if (is_checked) {
                        target_payment_box.slideDown(230);
                    }
                }
            } else {
                $('div.payment_box').show();
            }

            if ($(this).data('order_button_text')) {
                $('#place_order').text($(this).data('order_button_text'));
            } else {
                $('#place_order').text($('#place_order').data('value'));
            }

            var selectedPaymentMethod = $('.woocommerce-checkout input[name="payment_method"]:checked').attr('id');

            if (selectedPaymentMethod !== wc_checkout_form.selectedPaymentMethod) {
                $(document.body).trigger('payment_method_selected');
            }

            wc_checkout_form.selectedPaymentMethod = selectedPaymentMethod;
        },
        toggle_create_account: function () {
            $('div.create-account').hide();

            if ($(this).is(':checked')) {
                // Ensure password is not pre-populated.
                $('#account_password').val('').trigger('change');
                $('div.create-account').slideDown();
            }
        },
        init_checkout: function () {
            $(document.body).trigger('update_checkout');
        },
        maybe_input_changed: function (e) {
            if (wc_checkout_form.dirtyInput) {
                wc_checkout_form.input_changed(e);
            }
        },
        input_changed: function (e) {
            wc_checkout_form.dirtyInput = e.target;
            wc_checkout_form.maybe_update_checkout();
        },
        queue_update_checkout: function (e) {
            var code = e.keyCode || e.which || 0;

            if (code === 9) {
                return true;
            }

            wc_checkout_form.dirtyInput = this;
            wc_checkout_form.reset_update_checkout_timer();
            wc_checkout_form.updateTimer = setTimeout(wc_checkout_form.maybe_update_checkout, '1000');
        },
        trigger_update_checkout: function () {
            wc_checkout_form.reset_update_checkout_timer();
            wc_checkout_form.dirtyInput = false;
            $(document.body).trigger('update_checkout');
        },
        maybe_update_checkout: function () {
            var update_totals = true;

            if ($(wc_checkout_form.dirtyInput).length) {
                var $required_inputs = $(wc_checkout_form.dirtyInput).closest('div').find('.address-field.validate-required');

                if ($required_inputs.length) {
                    $required_inputs.each(function () {
                        if ($(this).find('input.input-text').val() === '') {
                            update_totals = false;
                        }
                    });
                }
            }
            if (update_totals) {
                wc_checkout_form.trigger_update_checkout();
            }
        },
        ship_to_different_address: function () {
            $('div.shipping_address').hide();
            if ($(this).is(':checked')) {
                $('div.shipping_address').slideDown();
            }
        },
        reset_update_checkout_timer: function () {
            clearTimeout(wc_checkout_form.updateTimer);
        },
        is_valid_json: function (raw_json) {
            try {
                var json = JSON.parse(raw_json);

                return (json && 'object' === typeof json);
            } catch (e) {
                return false;
            }
        },
        validate_field: function (e) {
            var $this = $(this),
                $parent = $this.closest('.form-row'),
                validated = true,
                validate_required = $parent.is('.validate-required'),
                validate_email = $parent.is('.validate-email'),
                validate_phone = $parent.is('.validate-phone'),
                pattern = '',
                event_type = e.type;

            if ('input' === event_type) {
                $parent.removeClass('woocommerce-invalid woocommerce-invalid-required-field woocommerce-invalid-email woocommerce-invalid-phone woocommerce-validated'); // eslint-disable-line max-len
            }

            if ('validate' === event_type || 'change' === event_type) {

                if (validate_required) {
                    if ('checkbox' === $this.attr('type') && !$this.is(':checked')) {
                        $parent.removeClass('woocommerce-validated').addClass('woocommerce-invalid woocommerce-invalid-required-field');
                        validated = false;
                    } else if ($this.val() === '') {
                        $parent.removeClass('woocommerce-validated').addClass('woocommerce-invalid woocommerce-invalid-required-field');
                        validated = false;
                    }
                }

                if (validate_email) {
                    if ($this.val()) {
                        /* https://stackoverflow.com/questions/2855865/jquery-validate-e-mail-address-regex */
                        pattern = new RegExp(/^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*post-purchase)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[0-9a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i); // eslint-disable-line max-len

                        if (!pattern.test($this.val())) {
                            $parent.removeClass('woocommerce-validated').addClass('woocommerce-invalid woocommerce-invalid-email woocommerce-invalid-phone'); // eslint-disable-line max-len
                            validated = false;
                        }
                    }
                }

                if (validate_phone) {
                    pattern = new RegExp(/[\s\#0-9_\-\+\/\(\)\.]/g);

                    if (0 < $this.val().replace(pattern, '').length) {
                        $parent.removeClass('woocommerce-validated').addClass('woocommerce-invalid woocommerce-invalid-phone');
                        validated = false;
                    }
                }

                if (validated) {
                    $parent.removeClass('woocommerce-invalid woocommerce-invalid-required-field woocommerce-invalid-email woocommerce-invalid-phone').addClass('woocommerce-validated'); // eslint-disable-line max-len
                }
            }
        },
        update_checkout: function (event, args) {
            addRemoveProductAjax();
            addPlusMinusListeners();
            changeShippingMethodCheckout();
            regulatePostPurchaseUpsell();
            addCouponAjax();
            removeCouponAjax();
            changeShippingTitleAndPrices();
            // Small timeout to prevent multiple requests when several fields update at the same time
            wc_checkout_form.reset_update_checkout_timer();
            wc_checkout_form.updateTimer = setTimeout(wc_checkout_form.update_checkout_action, '5', args);

        },
        update_checkout_action: function (args) {
            if (wc_checkout_form.xhr) {
                wc_checkout_form.xhr.abort();
            }

            if ($('form.checkout').length === 0) {
                return;
            }

            args = typeof args !== 'undefined' ? args : {
                update_shipping_method: true
            };

            var country = $('#billing_country').val(),
                state = $('#billing_state').val(),
                postcode = $(':input#billing_postcode').val(),
                city = $('#billing_city').val(),
                address = $(':input#billing_address_1').val(),
                address_2 = $(':input#billing_address_2').val(),
                s_country = country,
                s_state = state,
                s_postcode = postcode,
                s_city = city,
                s_address = address,
                s_address_2 = address_2,
                $required_inputs = $(wc_checkout_form.$checkout_form).find('.address-field.validate-required:visible'),
                has_full_address = true;

            if ($required_inputs.length) {
                $required_inputs.each(function () {
                    if ($(this).find(':input').val() === '') {
                        has_full_address = false;
                    }
                });
            }

            if ($('#ship-to-different-address').find('input').is(':checked')) {
                s_country = $('#shipping_country').val();
                s_state = $('#shipping_state').val();
                s_postcode = $(':input#shipping_postcode').val();
                s_city = $('#shipping_city').val();
                s_address = $(':input#shipping_address_1').val();
                s_address_2 = $(':input#shipping_address_2').val();
            }

            var data = {
                security: wc_checkout_params.update_order_review_nonce,
                payment_method: wc_checkout_form.get_payment_method(),
                country: country,
                state: state,
                postcode: postcode,
                city: city,
                address: address,
                address_2: address_2,
                s_country: s_country,
                s_state: s_state,
                s_postcode: s_postcode,
                s_city: s_city,
                s_address: s_address,
                s_address_2: s_address_2,
                has_full_address: has_full_address,
                post_data: $('form.checkout').serialize()
            };

            if (false !== args.update_shipping_method) {
                var shipping_methods = {};

                // eslint-disable-next-line max-len
                $('select.shipping_method, input[name^="shipping_method"][type="radio"]:checked, input[name^="shipping_method"][type="hidden"]').each(function () {
                    shipping_methods[$(this).data('index')] = $(this).val();
                });

                data.shipping_method = shipping_methods;
            }

            // $('.woocommerce-checkout-payment, .woocommerce-checkout-review-order-table').block({
            //     message: null,
            //     overlayCSS: {
            //         background: '#fff',
            //         opacity: 0.6
            //     }
            // });

            wc_checkout_form.xhr = $.ajax({
                type: 'POST',
                url: wc_checkout_params.wc_ajax_url.toString().replace('%%endpoint%%', 'update_order_review'),
                data: data,
                success: function (data) {

                    // Reload the page if requested
                    if (data && true === data.reload) {
                        window.location.reload();
                        addRemoveProductAjax();
                        if (!couponListenerAdded) {
                            addCouponAjax();
                        }
                        removeCouponAjax();
                        addRemoveProductAjax();
                        addPlusMinusListeners();
                        changeShippingMethodCheckout();
                        regulatePostPurchaseUpsell();
                        changeShippingTitleAndPrices();
                        // regulateCouponOnV2();
                        return;
                    }

                    // Remove any notices added previously
                    $('.woocommerce-NoticeGroup-updateOrderReview').remove();

                    var termsCheckBoxChecked = $('#terms').prop('checked');

                    // Save payment details to a temporary object
                    var paymentDetails = {};
                    $('.payment_box :input').each(function () {
                        var ID = $(this).attr('id');

                        if (ID) {
                            if ($.inArray($(this).attr('type'), ['checkbox', 'radio']) !== -1) {
                                paymentDetails[ID] = $(this).prop('checked');
                            } else {
                                paymentDetails[ID] = $(this).val();
                            }
                        }
                    });

                    // Always update the fragments
                    if (data && data.fragments) {
                        $.each(data.fragments, function (key, value) {
                            if (!wc_checkout_form.fragments || wc_checkout_form.fragments[key] !== value) {
                                $(key).replaceWith(value);
                            }
                            $(key).unblock();
                        });
                        wc_checkout_form.fragments = data.fragments;
                    }

                    // Recheck the terms and conditions box, if needed
                    if (termsCheckBoxChecked) {
                        $('#terms').prop('checked', true);
                    }

                    // Fill in the payment details if possible without overwriting data if set.
                    if (!$.isEmptyObject(paymentDetails)) {
                        $('.payment_box :input').each(function () {
                            var ID = $(this).attr('id');
                            if (ID) {
                                if ($.inArray($(this).attr('type'), ['checkbox', 'radio']) !== -1) {
                                    $(this).prop('checked', paymentDetails[ID]).trigger('change');
                                } else if ($.inArray($(this).attr('type'), ['select']) !== -1) {
                                    $(this).val(paymentDetails[ID]).trigger('change');
                                } else if (null !== $(this).val() && 0 === $(this).val().length) {
                                    $(this).val(paymentDetails[ID]).trigger('change');
                                }
                            }
                        });
                    }

                    // Check for error
                    if (data && 'failure' === data.result) {

                        var $form = $('form.checkout');

                        // Remove notices from all sources
                        $('.woocommerce-error, .woocommerce-message').remove();

                        // Add new errors returned by this event
                        if (data.messages) {
                            // swal({
                            //     title: "Error",
                            //     content: {
                            //         element: 'div',
                            //         attributes: {
                            //             innerHTML: data.messages
                            //         }
                            //     },
                            // });
                            // $form.prepend('<div class="woocommerce-NoticeGroup woocommerce-NoticeGroup-updateOrderReview">' + data.messages + '</div>'); // eslint-disable-line max-len
                        } else {
                            // $form.prepend(data);
                        }

                        // Lose focus for all fields
                        // $form.find('.input-text, select, input:checkbox').trigger('validate').trigger('blur');

                        // wc_checkout_form.scroll_to_notices();
                    }

                    // Re-init methods
                    wc_checkout_form.init_payment_methods();

                    // Fire updated_checkout event.
                    $(document.body).trigger('updated_checkout', [data]);

                    addRemoveProductAjax();
                    if (!couponListenerAdded) {
                        addCouponAjax();
                    }
                    removeCouponAjax();
                    addRemoveProductAjax();
                    addPlusMinusListeners();
                    changeShippingMethodCheckout();
                    regulatePostPurchaseUpsell();
                    changeShippingTitleAndPrices();
                    // regulateCouponOnV2();
                }
            });
        },
        handleUnloadEvent: function (e) {
            // Modern browsers have their own standard generic messages that they will display.
            // Confirm, alert, prompt or custom message are not allowed during the unload event
            // Browsers will display their own standard messages

            // Check if the browser is Internet Explorer
            if ((navigator.userAgent.indexOf('MSIE') !== -1) || (!!document.documentMode)) {
                // IE handles unload events differently than modern browsers
                e.preventDefault();
                return undefined;
            }
            return true;
        },
        attachUnloadEventsOnSubmit: function () {
            $(window).on('beforeunload', this.handleUnloadEvent);
        },
        detachUnloadEventsOnSubmit: function () {
            $(window).off('beforeunload', this.handleUnloadEvent);
        },
        blockOnSubmit: function ($form) {
            var isBlocked = $form.data('blockUI.isBlocked');

            // if (1 !== isBlocked) {
            //     $form.block({
            //         message: null,
            //         overlayCSS: {
            //             background: '#fff',
            //             opacity: 0.6
            //         }
            //     });
            // }
        },
        submitOrder: function () {
            wc_checkout_form.blockOnSubmit($(this));
        },
        submit: function () {
                if( checkTermsAndConditions() )
                {
                    wc_checkout_form.reset_update_checkout_timer();
                    var $form = $(this);

                    if ($form.is('.processing')) {
                        return false;
                    }

                    // Trigger a handler to let gateways manipulate the checkout if needed
                    // eslint-disable-next-line max-len
                    if ($form.triggerHandler('checkout_place_order') !== false && $form.triggerHandler('checkout_place_order_' + wc_checkout_form.get_payment_method()) !== false) {

                        $form.addClass('processing');

                        wc_checkout_form.blockOnSubmit($form);

                        // Attach event to block reloading the page when the form has been submitted
                        wc_checkout_form.attachUnloadEventsOnSubmit();

                        // ajaxSetup is global, but we use it to ensure JSON is valid once returned.
                        $.ajaxSetup({
                            dataFilter: function (raw_response, dataType) {
                                // We only want to work with JSON
                                if ('json' !== dataType) {
                                    return raw_response;
                                }

                                if (wc_checkout_form.is_valid_json(raw_response)) {
                                    return raw_response;
                                } else {
                                    // Attempt to fix the malformed JSON
                                    var maybe_valid_json = raw_response.match(/{"result.*}/);

                                    if (null === maybe_valid_json) {
                                        console.log('Unable to fix malformed JSON');
                                    } else if (wc_checkout_form.is_valid_json(maybe_valid_json[0])) {
                                        console.log('Fixed malformed JSON. Original:');
                                        console.log(raw_response);
                                        raw_response = maybe_valid_json[0];
                                    } else {
                                        console.log('Unable to fix malformed JSON');
                                    }
                                }

                                return raw_response;
                            }
                        });

                        let upsellProductsTy;
                        jQuery.ajax({
                            url: MYajax.ajax_url,
                            type: 'GET',
                            data: {
                                action: 'ic_get_upsells_ty',
                                nonce: nonces.get_upsells_ty
                            },
                            success: function (response) {
                                upsellProductsTy = JSON.parse(response);
                                $.ajax({
                                    type: 'POST',
                                    url: wc_checkout_params.checkout_url,
                                    data: $form.serialize(),
                                    dataType: 'json',
                                    beforeSend: function () {
                                        document.querySelector('.main-checkout-loader').classList.add('active');
                                    },
                                    success: function (result) {
                                        // Detach the unload handler that prevents a reload / redirect
                                        wc_checkout_form.detachUnloadEventsOnSubmit();
                                        try {
                                            if ('success' === result.result && $form.triggerHandler('checkout_place_order_success', result) !== false) {
                                                if (-1 === result.redirect.indexOf('https://') || -1 === result.redirect.indexOf('http://')) {
                                                    jQuery.ajax({
                                                        url: MYajax.ajax_url,
                                                        type: 'GET',
                                                        data: {
                                                            action: '' +
                                                                'ic_ajax_order_info',
                                                            nonce: nonces.ajax_order_info,
                                                            'order_id': result.order_id
                                                        },
                                                        success: function (response) {
                                                            let data = JSON.parse(response);
                                                            let order = data.order;
                                                            let products = data.products;
                                                            let layout = data.layout;
                                                            let shippingName = data.shipping;
                                                            let shippingRate = data.shippingRate;
                                                            let appliedDiscounts = data.appliedDiscounts;
                                                            let coupons = data.coupons;
                                                            let upsells = JSON.parse(localStorage.getItem('upsells'));
                                                            jQuery.ajax({
                                                                type: 'POST',
                                                                url: urls.ajax_url,
                                                                data: {
                                                                    action: 'ic_add_upsells_purchased',
                                                                    nonce: nonces.add_upsells_purchased,
                                                                    upsells: upsells,
                                                                    order: order.id,
                                                                    prod: products
                                                                },
                                                                success: function (response) {
                                                                    localStorage.removeItem('upsells');
                                                                }
                                                            });

                                                            let container = document.querySelector('.woocommerce');


                                                            jQuery.ajax({
                                                                url: MYajax.ajax_url,
                                                                type: 'GET',
                                                                data: {
                                                                    action: 'ic_get_ty_options',
                                                                    nonce: nonces.get_ty_options
                                                                },
                                                                success: function (response) {
                                                                    let tyOptions = JSON.parse(response);

                                                                    let pageTitleCT = 'Thank you page';
                                                                    if (tyOptions.customTexts.pageTitle != null && tyOptions.customTexts.pageTitle != '') {
                                                                        pageTitleCT = tyOptions.customTexts.pageTitle;
                                                                    }

                                                                    // let errorPageTitleCT = 'Error';
                                                                    // if (tyOptions.customTexts.errorPageTitle != null && tyOptions.customTexts.errorPageTitle != '') {
                                                                    //     errorPageTitleCT = tyOptions.customTexts.errorPageTitle;
                                                                    // }

                                                                    let primaryTYLabelCT = 'Thank you, ';
                                                                    if (tyOptions.customTexts.primaryThankYouLabel != null && tyOptions.customTexts.primaryThankYouLabel != '') {
                                                                        primaryTYLabelCT = tyOptions.customTexts.primaryThankYouLabel;
                                                                    }

                                                                    // let secondaryTYLabelCT = 'Thank you for purchasing product. Expect it tomorrow during the day.';
                                                                    // if (tyOptions.customTexts.secondaryThankYouLabel != null && tyOptions.customTexts.secondaryThankYouLabel != '') {
                                                                    //     secondaryTYLabelCT = tyOptions.customTexts.secondaryThankYouLabel;
                                                                    // }

                                                                    let shippingInformationLabelCT = 'Shipping';
                                                                    if (tyOptions.customTexts.shippingInformationLabel != null && tyOptions.customTexts.shippingInformationLabel != '') {
                                                                        shippingInformationLabelCT = tyOptions.customTexts.shippingInformationLabel;
                                                                    }

                                                                    let shippingAddressLabelCT = 'Shipping address';
                                                                    if (tyOptions.customTexts.shippingAddressLabel != null && tyOptions.customTexts.shippingAddressLabel != '') {
                                                                        shippingAddressLabelCT = tyOptions.customTexts.shippingAddressLabel;
                                                                    }

                                                                    let billingAddressLabelCT = 'Billing address';
                                                                    if (tyOptions.customTexts.billingAddressLabel != null && tyOptions.customTexts.billingAddressLabel != '') {
                                                                        billingAddressLabelCT = tyOptions.customTexts.billingAddressLabel;
                                                                    }

                                                                    let shippingMethodInformationLabelCT = 'Shipping method';
                                                                    if (tyOptions.customTexts.shippingMethodInformationLabel != null && tyOptions.customTexts.shippingMethodInformationLabel != '') {
                                                                        shippingMethodInformationLabelCT = tyOptions.customTexts.shippingMethodInformationLabel;
                                                                    }

                                                                    let paymentInformationLabelCT = 'Payment';
                                                                    if (tyOptions.customTexts.paymentInformationLabel != null && tyOptions.customTexts.paymentInformationLabel != '') {
                                                                        paymentInformationLabelCT = tyOptions.customTexts.paymentInformationLabel;
                                                                    }

                                                                    let paymentMethodLabelCT = 'Payment method';
                                                                    if (tyOptions.customTexts.paymentMethodLabel != null && tyOptions.customTexts.paymentMethodLabel != '') {
                                                                        paymentMethodLabelCT = tyOptions.customTexts.paymentMethodLabel;
                                                                    }

                                                                    let customerInformationLabelCT = 'Customer information';
                                                                    if (tyOptions.customTexts.customerInformationLabel != null && tyOptions.customTexts.customerInformationLabel != '') {
                                                                        customerInformationLabelCT = tyOptions.customTexts.customerInformationLabel;
                                                                    }

                                                                    let saveInfoFasterCheckoutLabelCT = 'Save my information for a faster checkout';
                                                                    if (tyOptions.customTexts.saveInformationForFasterCheckoutLabel != null && tyOptions.customTexts.saveInformationForFasterCheckoutLabel != '') {
                                                                        saveInfoFasterCheckoutLabelCT = tyOptions.customTexts.saveInformationForFasterCheckoutLabel;
                                                                    }

                                                                    let signUpNewsletterLabelCT = 'Sign up';
                                                                    if (tyOptions.customTexts.signUpForNewsletterLabel != null && tyOptions.customTexts.signUpForNewsletterLabel != '') {
                                                                        signUpNewsletterLabelCT = tyOptions.customTexts.signUpForNewsletterLabel;
                                                                    }

                                                                    let signUpNewsletterDescriptionCT = 'Sign up to our updates and get 15% off your nex order...';
                                                                    if (tyOptions.customTexts.signUpNewsletterDescription != null && tyOptions.customTexts.signUpNewsletterDescription != '') {
                                                                        signUpNewsletterDescriptionCT = tyOptions.customTexts.signUpNewsletterDescription;
                                                                    }

                                                                    let emailLabelCT = 'Your email address';
                                                                    if (tyOptions.customTexts.emailLabel != null && tyOptions.customTexts.emailLabel != '') {
                                                                        emailLabelCT = tyOptions.customTexts.emailLabel;
                                                                    }

                                                                    let signUpButtonLabelCT = 'Sign up';
                                                                    if (tyOptions.customTexts.signUpButtonLabel != null && tyOptions.customTexts.signUpButtonLabel != '') {
                                                                        signUpButtonLabelCT = tyOptions.customTexts.signUpButtonLabel;
                                                                    }

                                                                    let needHelpLabelCT = 'Need help?';
                                                                    if (tyOptions.customTexts.needHelpLabel != null && tyOptions.customTexts.needHelpLabel != '') {
                                                                        needHelpLabelCT = tyOptions.customTexts.needHelpLabel;
                                                                    }

                                                                    let contactUsBtnLabelCT = 'Contact us';
                                                                    if (tyOptions.customTexts.contactUsButtonLabel != null && tyOptions.customTexts.contactUsButtonLabel != '') {
                                                                        contactUsBtnLabelCT = tyOptions.customTexts.contactUsButtonLabel;
                                                                    }

                                                                    let continueShoppingBtnLabelCT = 'Continue shopping';
                                                                    if (tyOptions.customTexts.continueShoppingButtonLabel != null && tyOptions.customTexts.continueShoppingButtonLabel != '') {
                                                                        continueShoppingBtnLabelCT = tyOptions.customTexts.continueShoppingButtonLabel;
                                                                    }

                                                                    let itemsInShippingLabelCT = 'Items in shipment';
                                                                    if (tyOptions.customTexts.itemsInShippingLabel != null && tyOptions.customTexts.itemsInShippingLabel != '') {
                                                                        itemsInShippingLabelCT = tyOptions.customTexts.itemsInShippingLabel;
                                                                    }

                                                                    let subtotalLabelCT = 'Subtotal';
                                                                    if (tyOptions.customTexts.subtotalLabel != null && tyOptions.customTexts.subtotalLabel != '') {
                                                                        subtotalLabelCT = tyOptions.customTexts.subtotalLabel;
                                                                    }

                                                                    let discountLabelCT = 'Discount';
                                                                    if (tyOptions.customTexts.discountLabel != null && tyOptions.customTexts.discountLabel != '') {
                                                                        discountLabelCT = tyOptions.customTexts.discountLabel;
                                                                    }

                                                                    let shippingLabelCT = 'Shipping';
                                                                    if (tyOptions.customTexts.shippingLabel != null && tyOptions.customTexts.shippingLabel != '') {
                                                                        shippingLabelCT = tyOptions.customTexts.shippingLabel;
                                                                    }

                                                                    let totalLabelCT = 'Total';
                                                                    if (tyOptions.customTexts.totalLabelCT != null && tyOptions.customTexts.totalLabelCT != '') {
                                                                        totalLabelCT = tyOptions.customTexts.totalLabelCT;
                                                                    }


                                                                    let primaryTyLabel = 'Thank you';
                                                                    if (tyOptions.primary_ty_label != null && tyOptions.primary_ty_label != '') {
                                                                        primaryTyLabel = tyOptions.primary_ty_label;
                                                                    }
                                                                    let secondaryTyLabel = 'Thank you for you order!';
                                                                    if (tyOptions.secondary_ty_label != null && tyOptions.secondary_ty_label != '') {
                                                                        secondaryTyLabel = tyOptions.secondary_ty_label;
                                                                    }
                                                                    let customerInformation = 'Customer Information';
                                                                    if (tyOptions.customer_information != null && tyOptions.customer_information != '') {
                                                                        customerInformation = tyOptions.customer_information;
                                                                    }
                                                                    let emailAddress = 'Email Address';
                                                                    if (tyOptions.email_address != null && tyOptions.email_address != '') {
                                                                        emailAddress = tyOptions.email_address;
                                                                    }


                                                                    let needHelp = 'Need help?'
                                                                    if (tyOptions.need_help != null && tyOptions.need_help != '') {
                                                                        needHelp = tyOptions.need_help;
                                                                    }
                                                                    let contactUsButton = 'Contact us';
                                                                    if (tyOptions.contact_us_button != null && tyOptions.contact_us_button != '') {
                                                                        contactUsButton = tyOptions.contact_us_button;
                                                                    }
                                                                    let contactUsLink = '#';
                                                                    if (tyOptions.contact_us_link != null && tyOptions.contact_us_link != '') {
                                                                        contactUsLink = tyOptions.contact_us_link;
                                                                    }


                                                                    let continueShopping = 'Continue Shopping';
                                                                    if (tyOptions.continue_shopping != null && tyOptions.continue_shopping != '') {
                                                                        continueShopping = tyOptions.continue_shopping;
                                                                    }



                                                                    let itemsInShipment = 'Items in shipment';
                                                                    if (tyOptions.items_in_shipment != null && tyOptions.items_in_shipment != '') {
                                                                        itemsInShipment = tyOptions.items_in_shipment;
                                                                    }
                                                                    let subtotal = 'Subtotal';
                                                                    if (tyOptions.subtotal != null && tyOptions.subtotal != '') {
                                                                        subtotal = tyOptions.subtotal;
                                                                    }
                                                                    let discount = 'Discount';
                                                                    if (tyOptions.discount != null && tyOptions.discount != '') {
                                                                        discount = tyOptions.discount;
                                                                    }
                                                                    let shipping = 'Shipping';
                                                                    if (tyOptions.shipping != null && tyOptions.shipping != '') {
                                                                        shipping = tyOptions.shipping;
                                                                    }
                                                                    let total = 'Total';
                                                                    if (tyOptions.total != null && tyOptions.total != '') {
                                                                        total = tyOptions.total;
                                                                    }


                                                                    let shopLogo = tyOptions.shop_logo;
                                                                    let shopLogoDisplay = shopLogo != null ? 'block' : 'none';

                                                                    // Render Thank You
                                                                    function sliceTitle(title) {
                                                                        if( title.length >= 20 ){
                                                                            return title.slice(0, 20).trim() + '...';
                                                                        }
                                                                        else {
                                                                            return title
                                                                        }
                                                                    }

                                                                    let buttons = document.querySelectorAll('.ic-cc-upsell-buttons span');
                                                                    const regionNames = new Intl.DisplayNames(
                                                                        ['en'], {type: 'region'}
                                                                    );


                                                                    let orderTotal = 0;
                                                                    let thankYouPage;
                                                                    let displayPhone = 'block';
                                                                    if (order.billing.phone === '') {
                                                                        displayPhone = 'none';
                                                                    }

                                                                    thankYouPage = '<div class="ic-cc-layout3-desktop">' +
                                                                        '<div class="row ic-ty-cont ic-cc-layout1">' +
                                                                        '<div class="col-md-7">' +
                                                                        '<div class="shop-logo" style="display: ' + shopLogoDisplay + '"><a href="' + window.location.origin + '"><img src="' + shopLogo + '"></a></div>' +
                                                                        '<h3 class="ic-ty-heading-text">' + primaryTYLabelCT + ', ' + order.billing.first_name + '! 🎉</h3>' +
                                                                        '<p class="ic-ty-heading-text-thank-you">' + tyOptions.purchase_note + '</p>' +
                                                                        '<p class="ic-ty-heading-text-confirmation">Order #' + order.id + ' ✅</p>' +
                                                                        '<div class="contact-info">' +
                                                                        '<div class="ic-ty-con-box ic-ty-con-box-action">' +
                                                                        '<div class="ic-ty-con-box-heading ic-ty-con-box-heading-action"><i class="fa-solid fa-angle-down filter-group-show-more active"></i> '+customerInformationLabelCT+'</div>' +
                                                                        '<div class="ic-ty-con-box-content active">' +
                                                                        '<ul>' +
                                                                        '<li><i class="fas fa-user"></i> ' + order.billing.first_name + ' ' + order.billing.last_name + '</li>' +
                                                                        '<li style="display: ' + displayPhone + '"><i class="fas fa-phone-alt"></i> ' + order.billing.phone + '</li>' +
                                                                        '<li><i class="fas fa-envelope"></i> ' + order.billing.email + '</li>' +
                                                                        '</ul>' +
                                                                        '</div>' +
                                                                        '</div>' +
                                                                        '<div class="ic-ty-con-box ic-ty-con-box-action">' +
                                                                        '<div class="ic-ty-con-box-heading ic-ty-con-box-heading-action"><i class="fa-solid fa-angle-down filter-group-show-more"></i> '+shippingInformationLabelCT+'</div>' +
                                                                        '<div class="row ic-ty-con-box-content">' +
                                                                        '<div class="col-md-6">' +
                                                                        '<h6>'+shippingAddressLabelCT+'</h6>' +
                                                                        '<ul>' +
                                                                        '<li>' + order.shipping.first_name + ' ' + order.shipping.last_name + '</li>' +
                                                                        '<li>' + order.shipping.company + '</li>' +
                                                                        '<li>' + order.shipping.address_2 + '</li>' +
                                                                        '<li>' + order.shipping.address_1 + '</li>' +
                                                                        '<li>' + regionNames.of(order.shipping.country) + '</li>' +
                                                                        '</ul>' +
                                                                        '</div>' +
                                                                        '<div class="col-md-6">' +
                                                                        '<h6>'+billingAddressLabelCT+'</h6>' +
                                                                        '<ul>' +
                                                                        '<li>' + order.billing.first_name + ' ' + order.shipping.last_name + '</li>' +
                                                                        '<li>' + order.billing.company + '</li>' +
                                                                        '<li>' + order.billing.address_2 + '</li>' +
                                                                        '<li>' + order.billing.address_1 + '</li>' +
                                                                        '<li>' + regionNames.of(order.billing.country) + '</li>' +
                                                                        '</ul>' +
                                                                        '</div>' +
                                                                        '</div>' +
                                                                        '</div>' +
                                                                        '<div class="ic-ty-con-box ic-ty-con-box-action">' +
                                                                        '<div class="ic-ty-con-box-heading ic-ty-con-box-heading-action"><i class="fa-solid fa-angle-down filter-group-show-more"></i> '+shippingMethodInformationLabelCT+'</div>' +
                                                                        '<div class="ic-ty-con-box-content">' +
                                                                        '<ul>' +
                                                                        '<li>' + shippingName + '<span> - ' + urls.currency + parseFloat(shippingRate).toFixed(2) + '</span></li>' +
                                                                        '</ul>' +
                                                                        '</div>' +
                                                                        '</div>' +
                                                                        '<div class="ic-ty-con-box ic-ty-con-box-action">' +
                                                                        '<div class="ic-ty-con-box-heading ic-ty-con-box-heading-action"><i class="fa-solid fa-angle-down filter-group-show-more"></i> '+paymentInformationLabelCT+'</div>' +
                                                                        '<div class="ic-ty-con-box-content ic-ty-con-box-content-payment-metod">' +
                                                                        '<h6>'+paymentMethodLabelCT+'</h6>' +
                                                                        '<ul>' +
                                                                        '<li>' + order.payment_method_title + '</li>' +
                                                                        '</ul>' +
                                                                        '</div>' +
                                                                        '</div>' +
                                                                        '<div class="ic-ty-con-box ic-ty-con-box-continue-shopping">' +
                                                                        '<div class="ic-ty-con-box-section">' +
                                                                        '<span>' + needHelpLabelCT + ' <a href="' + contactUsLink + '" class="contact-us"> ' + contactUsBtnLabelCT + '</a></span>' +
                                                                        '</div>' +
                                                                        '<div class="ic-ty-con-box-section">' +
                                                                        '<a href="' + urls.shop_url + '" class="continue">' + continueShoppingBtnLabelCT + '  <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">\n' +
                                                                        '<path d="M2.91797 7H11.0846" stroke="white" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"/>\n' +
                                                                        '<path d="M7 2.91666L11.0833 6.99999L7 11.0833" stroke="white" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"/>\n' +
                                                                        '</svg></a>' +
                                                                        '</div>' +
                                                                        '</div>' +
                                                                        '</div>' +
                                                                        '</div>' +
                                                                        '<div class="col-md-5">' +
                                                                        '<div class="items-in-shipment">' +
                                                                        '<div class="items-in-shipment">' +
                                                                        '<h5 class="ic-cc-layout3-items-in-shipment">' + itemsInShippingLabelCT + '</h5>';
                                                                    products.forEach((product) => {
                                                                        thankYouPage += '<div class="ic-ty-product-inner">'
                                                                        thankYouPage += '<div class="ic-ty-product-inner-box">'
                                                                        thankYouPage += product.image;
                                                                        thankYouPage += '<div class="ic-ty-title"><span>' + sliceTitle(product.title) + '</span></div>';
                                                                        thankYouPage += '<div class="ic-ty-quantity"><span>' + product.quantity + '</span></div></div>';
                                                                        thankYouPage += '<div class="ic-ty-total"><span>' + urls.currency + parseFloat(product.price).toFixed(2) + '</span></div>';
                                                                        thankYouPage += '</div>';
                                                                        orderTotal += parseFloat(product.total);
                                                                    });

                                                                    let subTotalReal = 0;
                                                                    products.forEach(function(productPrice){
                                                                        subTotalReal+=parseFloat(productPrice.total);
                                                                    });

                                                                    thankYouPage += '<table>' +
                                                                        '<tr class="ic-ty-subtotal">' +
                                                                        '<td>' + subtotalLabelCT + '</td>' +
                                                                        '<td>' + urls.currency + subTotalReal.toFixed(2) + '</td>' +
                                                                        '</tr>';
                                                                    if(shippingRate === '0') {
                                                                        thankYouPage += '<tr class="ic-ty-shipping ic-ty-free-shipping">' +
                                                                            '<td>' + shippingLabelCT + '</td>' +
                                                                            '<td>Free!</td>' +
                                                                            '</tr>';
                                                                    } else {
                                                                        thankYouPage += '<tr class="ic-ty-shipping">' +
                                                                            '<td>' + shippingLabelCT + '</td>' +
                                                                            '<td>' + urls.currency + parseFloat(shippingRate).toFixed(2) + '</td>' +
                                                                            '</tr>';
                                                                        orderTotal += parseFloat(shippingRate);
                                                                    }


                                                                    if (coupons.length > 0) {
                                                                        coupons.forEach((coupon) => {
                                                                            orderTotal -= parseFloat(coupon.amount);
                                                                            thankYouPage += '<tr class="ic-ty-discount"><td>' + coupon.name + '</td>' + '<td>-' + urls.currency + coupon.amount + '</td></tr>';
                                                                        });
                                                                    }

                                                                    if (appliedDiscounts.length > 0) {
                                                                        appliedDiscounts.forEach((appliedDiscount) => {
                                                                            if(parseFloat(appliedDiscount.amount) != 0) {
                                                                                orderTotal += parseFloat(appliedDiscount.amount);
                                                                                thankYouPage += '<tr class="ic-ty-discount"><td>' + appliedDiscount.name + '</td>' + '<td>-' + urls.currency + Math.abs(parseFloat(appliedDiscount.amount)).toFixed(2) + '</td></tr>';
                                                                            }
                                                                        });
                                                                    }

                                                                    thankYouPage += '<tr class="ic-ty-total">' +
                                                                        '<td>' + totalLabelCT + '</td>' +
                                                                        '<td>' + urls.currency + orderTotal.toFixed(2) + '</td>' +
                                                                        '</tr>' +
                                                                        '</table>' +
                                                                        '</div>';

                                                                    thankYouPage += '</div></div></div></div>';
                                                                    products.forEach(() => {
                                                                        orderTotal = 0;
                                                                    });

                                                                    thankYouPage += '<div class="ic-cc-layout3-mobile">' +
                                                                        '<div class="row ic-ty-cont ic-cc-layout1">' +
                                                                        '<div class="col-md-7">' +
                                                                        '<div class="shop-logo" style="display: ' + shopLogoDisplay + '"><a href="' + window.location.origin + '"><img src="' + shopLogo + '"></a></div>' +
                                                                        '<h3 class="ic-ty-heading-text">'+primaryTYLabelCT+' ' + order.billing.first_name + '! 🎉</h3>' +
                                                                        '<p class="ic-ty-heading-text-thank-you">' + tyOptions.purchase_note + '</p>' +
                                                                        '<p class="ic-ty-heading-text-confirmation">Order #' + order.id + ' ✅</p>' +
                                                                        '<div class="contact-info">' +
                                                                        '<div class="ic-ty-con-box ic-ty-con-box-action">' +
                                                                        '<div class="ic-ty-con-box-heading ic-ty-con-box-heading-action"><i class="fa-solid fa-angle-down filter-group-show-more"></i>  '+customerInformationLabelCT+'</div>' +
                                                                        '<div class="ic-ty-con-box-content">' +
                                                                        '<ul>' +
                                                                        '<li><i class="fas fa-user"></i> ' + order.billing.first_name + ' ' + order.billing.last_name + '</li>' +
                                                                        '<li><i class="fas fa-phone-alt"></i> ' + order.billing.phone + '</li>' +
                                                                        '<li><i class="fas fa-envelope"></i> ' + order.billing.email + '</li>' +
                                                                        '</ul>' +
                                                                        '</div>' +
                                                                        '</div>' +
                                                                        '<div class="ic-ty-con-box ic-ty-con-box-action">' +
                                                                        '<div class="ic-ty-con-box-heading ic-ty-con-box-heading-action"><i class="fa-solid fa-angle-down filter-group-show-more"></i> '+shippingInformationLabelCT+'</div>' +
                                                                        '<div class="row ic-ty-con-box-content">' +
                                                                        '<div class="col-md-6">' +
                                                                        '<h6>'+shippingAddressLabelCT+'</h6>' +
                                                                        '<ul>' +
                                                                        '<li>' + order.shipping.first_name + ' ' + order.shipping.last_name + '</li>' +
                                                                        '<li>' + order.shipping.company + '</li>' +
                                                                        '<li>' + order.shipping.address_2 + '</li>' +
                                                                        '<li>' + order.shipping.address_1 + '</li>' +
                                                                        '<li>' + regionNames.of(order.shipping.country) + '</li>' +
                                                                        '</ul>' +
                                                                        '</div>' +
                                                                        '<div class="col-md-6">' +
                                                                        '<h6>'+billingAddressLabelCT+'</h6>' +
                                                                        '<ul>' +
                                                                        '<li>' + order.billing.first_name + ' ' + order.shipping.last_name + '</li>' +
                                                                        '<li>' + order.billing.company + '</li>' +
                                                                        '<li>' + order.billing.address_2 + '</li>' +
                                                                        '<li>' + order.billing.address_1 + '</li>' +
                                                                        '<li>' + regionNames.of(order.billing.country) + '</li>' +
                                                                        '</ul>' +
                                                                        '</div>' +
                                                                        '</div>' +
                                                                        '</div>' +
                                                                        '<div class="ic-ty-con-box ic-ty-con-box-action">' +
                                                                        '<div class="ic-ty-con-box-heading ic-ty-con-box-heading-action"><i class="fa-solid fa-angle-down filter-group-show-more"></i> '+shippingMethodInformationLabelCT+'</div>' +
                                                                        '<div class="ic-ty-con-box-content">' +
                                                                        '<ul>' +
                                                                        '<li>' + shippingName + '<span> - ' + urls.currency + parseFloat(shippingRate).toFixed(2) + '</span></li>' +
                                                                        '</ul>' +
                                                                        '</div>' +
                                                                        '</div>' +
                                                                        '<div class="ic-ty-con-box ic-ty-con-box-action">' +
                                                                        '<div class="ic-ty-con-box-heading ic-ty-con-box-heading-action"><i class="fa-solid fa-angle-down filter-group-show-more"></i> '+paymentInformationLabelCT+'</div>' +
                                                                        '<div class="ic-ty-con-box-content ic-ty-con-box-content-payment-metod">' +
                                                                        '<h6>'+paymentMethodLabelCT+'</h6>' +
                                                                        '<ul>' +
                                                                        '<li>' + order.payment_method_title + '</li>' +
                                                                        '</ul>' +
                                                                        '</div>' +
                                                                        '</div>' +

                                                                        '</div>' +
                                                                        '</div>' +
                                                                        '<div class="col-md-5">' +
                                                                        '<div class="items-in-shipment">' +
                                                                        '<div class="items-in-shipment">' +
                                                                        '<h5 class="ic-cc-layout3-items-in-shipment">' + itemsInShippingLabelCT + '</h5>';
                                                                    products.forEach((product) => {
                                                                        thankYouPage += '<div class="ic-ty-product-inner">'
                                                                        thankYouPage += '<div class="ic-ty-product-inner-box">'
                                                                        thankYouPage += product.image;
                                                                        thankYouPage += '<div class="ic-ty-title"><span>' + sliceTitle(product.title) + '</span></div>';
                                                                        thankYouPage += '<div class="ic-ty-quantity"><span>' + product.quantity + '</span></div></div>';
                                                                        thankYouPage += '<div class="ic-ty-total"><span>' + urls.currency + parseFloat(product.total).toFixed(2) + '</span></div>';
                                                                        thankYouPage += '</div>';
                                                                        orderTotal += parseFloat(product.total);
                                                                    });

                                                                    thankYouPage += '<table>' +
                                                                        '<tr class="ic-ty-subtotal">' +
                                                                        '<td>' + subtotalLabelCT + '</td>' +
                                                                        '<td>' + urls.currency + subTotalReal.toFixed(2) + '</td>' +
                                                                        '</tr>';
                                                                    if(shippingRate === '0') {
                                                                        thankYouPage += '<tr class="ic-ty-shipping ic-ty-free-shipping">' +
                                                                            '<td>' + shippingLabelCT + '</td>' +
                                                                            '<td>Free!</td>' +
                                                                            '</tr>';
                                                                    } else {
                                                                        thankYouPage += '<tr class="ic-ty-shipping">' +
                                                                            '<td>' + shippingLabelCT + '</td>' +
                                                                            '<td>' + urls.currency + parseFloat(shippingRate).toFixed(2) + '</td>' +
                                                                            '</tr>';
                                                                        orderTotal += parseFloat(shippingRate);
                                                                    }

                                                                    if (coupons.length > 0) {
                                                                        coupons.forEach((coupon) => {
                                                                            orderTotal -= parseFloat(coupon.amount);
                                                                            thankYouPage += '<tr class="ic-ty-discount"><td>' + coupon.name + '</td>' + '<td>-' + urls.currency + coupon.amount + '</td></tr>';
                                                                        });
                                                                    }

                                                                    if (appliedDiscounts.length > 0) {
                                                                        appliedDiscounts.forEach((appliedDiscount) => {
                                                                            if(parseFloat(appliedDiscount.amount) != 0) {
                                                                                orderTotal += parseFloat(appliedDiscount.amount);
                                                                                thankYouPage += '<tr class="ic-ty-discount"><td>' + appliedDiscount.name + '</td>' + '<td>-' + urls.currency + Math.abs(parseFloat(appliedDiscount.amount)).toFixed(2) + '</td></tr>';
                                                                            }
                                                                        });
                                                                    }

                                                                    thankYouPage += '<tr class="ic-ty-total">' +
                                                                        '<td>' + totalLabelCT + '</td>' +
                                                                        '<td>' + urls.currency + orderTotal.toFixed(2) + '</td>' +
                                                                        '</tr>' +
                                                                        '</table>' +
                                                                        '</div></div></div>' +
                                                                        '<div class="ic-ty-con-box ic-ty-con-box-continue-shopping">' +
                                                                        '<div class="ic-ty-con-box-section">' +
                                                                        '<span>' + needHelpLabelCT + ' <a href="' + contactUsLink + '" class="contact-us">' + contactUsBtnLabelCT + '</a></span>' +
                                                                        '</div>' +
                                                                        '<div class="ic-ty-con-box-section">' +
                                                                        '<a href="' + urls.shop_url + '" class="continue">' + continueShoppingBtnLabelCT + '  <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">\n' +
                                                                        '<path d="M2.91797 7H11.0846" stroke="white" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"/>\n' +
                                                                        '<path d="M7 2.91666L11.0833 6.99999L7 11.0833" stroke="white" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"/>\n' +
                                                                        '</svg></a>' +
                                                                        '</div>' +
                                                                        '</div>';

                                                                    thankYouPage += '</div></div>';
                                                                    // }

                                                                    // let usContinueBtn = document.querySelector('.upsellModal-close-btn');
                                                                    // usContinueBtn.addEventListener('click', function() {
                                                                    container.innerHTML = thankYouPage;
                                                                    document.body.classList.add('ic-ty-page-main-container');
                                                                    document.body.scrollTop = document.documentElement.scrollTop = 0;
                                                                    document.title = pageTitleCT;
                                                                    let sectionsDown = document.querySelectorAll('.contact-info .ic-ty-con-box-action');
                                                                    sectionsDown.forEach((section) => {
                                                                        let heading = section.querySelector('.ic-ty-con-box-heading-action');
                                                                        let arrow = section.querySelector('.filter-group-show-more');
                                                                        heading.addEventListener('click', function () {
                                                                                let box = section.querySelector('.ic-ty-con-box-content');
                                                                                arrow.classList.toggle('active');
                                                                                box.classList.toggle('active');
                                                                            }
                                                                        )
                                                                    });
                                                                    if(document.querySelector('.main-checkout-loader')){
                                                                        document.querySelector('.main-checkout-loader').classList.remove('active');
                                                                    }
                                                                }
                                                            });

                                                        }

                                                    });

                                                } else {
                                                    //window.location = decodeURI( result.redirect );
                                                }
                                            } else if ('failure' === result.result) {
                                                throw 'Result failure';
                                            } else {
                                                throw 'Invalid response';
                                            }
                                        } catch (err) {
                                            // Reload page
                                            if (true === result.reload) {
                                                //window.location.reload();
                                                return;
                                            }

                                            // Trigger update in case we need a fresh nonce
                                            if (true === result.refresh) {
                                                $(document.body).trigger('update_checkout');
                                            }

                                            // Add new errors
                                            if (result.messages) {
                                                wc_checkout_form.submit_error(result.messages);
                                            } else {
                                                wc_checkout_form.submit_error('<div class="woocommerce-error">' + wc_checkout_params.i18n_checkout_error + '</div>'); // eslint-disable-line max-len
                                            }
                                        }
                                        //document.querySelector('.main-checkout-loader').classList.remove('active');

                                    },
                                    error: function (jqXHR, textStatus, errorThrown) {
                                        // Detach the unload handler that prevents a reload / redirect
                                        wc_checkout_form.detachUnloadEventsOnSubmit();

                                        wc_checkout_form.submit_error('<div class="woocommerce-error">' + errorThrown + '</div>');
                                        document.querySelector('.main-checkout-loader').classList.remove('active');

                                    }
                                });
                            }
                        });
                    }

                }else{
                    return false;
                }
                return false;
        },
        submit_error: function (error_message) {
            $('.woocommerce-NoticeGroup-checkout, .woocommerce-error, .woocommerce-message').remove();
            wc_checkout_form.$checkout_form.prepend('<div class="woocommerce-NoticeGroup woocommerce-NoticeGroup-checkout">' + error_message + '</div>'); // eslint-disable-line max-len
            wc_checkout_form.$checkout_form.removeClass('processing').unblock();
            wc_checkout_form.$checkout_form.find('.input-text, select, input:checkbox').trigger('validate').trigger('blur');
            wc_checkout_form.scroll_to_notices();
            swal({
                title: "Error",
                content: {
                    element: 'div',
                    attributes: {
                        innerHTML: error_message
                    }
                },
            }).then((value) => {
                document.querySelector('.main-checkout-loader').classList.remove('active');
            });
            $(document.body).trigger('checkout_error', [error_message]);
        },
        scroll_to_notices: function () {
            var scrollElement = $('.woocommerce-NoticeGroup-updateOrderReview, .woocommerce-NoticeGroup-checkout');

            if (!scrollElement.length) {
                scrollElement = $('.form.checkout');
            }
            $.scroll_to_notices(scrollElement);
        }
    };

    var wc_checkout_coupons = {
        init: function () {
            $(document.body).on('click', 'a.showcoupon', this.show_coupon_form);
            $(document.body).on('click', '.woocommerce-remove-coupon', this.remove_coupon);
            $('form.checkout_coupon').hide().on('submit', this.submit);
        },
        show_coupon_form: function () {
            $('.checkout_coupon').slideToggle(400, function () {
                $('.checkout_coupon').find(':input:eq(0)').trigger('focus');
            });
            return false;
        },
        submit: function () {
            var $form = $(this);

            if ($form.is('.processing')) {
                return false;
            }

            // $form.addClass('processing').block({
            //     message: null,
            //     overlayCSS: {
            //         background: '#fff',
            //         opacity: 0.6
            //     }
            // });

            var data = {
                security: wc_checkout_params.apply_coupon_nonce,
                coupon_code: $form.find('input[name="coupon_code"]').val()
            };

            $.ajax({
                type: 'POST',
                url: wc_checkout_params.wc_ajax_url.toString().replace('%%endpoint%%', 'apply_coupon'),
                data: data,
                success: function (code) {
                    $('.woocommerce-error, .woocommerce-message').remove();
                    $form.removeClass('processing').unblock();

                    if (code) {
                        $form.before(code);
                        $form.slideUp();

                        $(document.body).trigger('applied_coupon_in_checkout', [data.coupon_code]);
                        $(document.body).trigger('update_checkout', {update_shipping_method: false});
                    }

                },
                dataType: 'html'
            });

            return false;
        },
        remove_coupon: function (e) {
            e.preventDefault();

            var container = $(this).parents('.woocommerce-checkout-review-order'),
                coupon = $(this).data('coupon');

            // container.addClass('processing').block({
            //     message: null,
            //     overlayCSS: {
            //         background: '#fff',
            //         opacity: 0.6
            //     }
            // });

            var data = {
                security: wc_checkout_params.remove_coupon_nonce,
                coupon: coupon
            };

            $.ajax({
                type: 'POST',
                url: wc_checkout_params.wc_ajax_url.toString().replace('%%endpoint%%', 'remove_coupon'),
                data: data,
                success: function (code) {
                    $('.woocommerce-error, .woocommerce-message').remove();
                    container.removeClass('processing').unblock();

                    if (code) {
                        $('form.woocommerce-checkout').before(code);

                        $(document.body).trigger('removed_coupon_in_checkout', [data.coupon_code]);
                        $(document.body).trigger('update_checkout', {update_shipping_method: true});

                        // Remove coupon code from coupon field
                        $('form.checkout_coupon').find('input[name="coupon_code"]').val('');
                    }
                },
                error: function (jqXHR) {
                    if (wc_checkout_params.debug_mode) {
                        /* jshint devel: true */
                    }
                },
                dataType: 'html'
            });
        }
    };

    var wc_checkout_login_form = {
        init: function () {
            $(document.body).on('click', 'a.showlogin', this.show_login_form);
        },
        show_login_form: function () {
            $('form.login, form.woocommerce-form--login').slideToggle();
            return false;
        }
    };

    var wc_terms_toggle = {
        init: function () {
            $(document.body).on('click', 'a.woocommerce-terms-and-conditions-link', this.toggle_terms);
        },

        toggle_terms: function () {
            if ($('.woocommerce-terms-and-conditions').length) {
                $('.woocommerce-terms-and-conditions').slideToggle(function () {
                    var link_toggle = $('.woocommerce-terms-and-conditions-link');

                    if ($('.woocommerce-terms-and-conditions').is(':visible')) {
                        link_toggle.addClass('woocommerce-terms-and-conditions-link--open');
                        link_toggle.removeClass('woocommerce-terms-and-conditions-link--closed');
                    } else {
                        link_toggle.removeClass('woocommerce-terms-and-conditions-link--open');
                        link_toggle.addClass('woocommerce-terms-and-conditions-link--closed');
                    }
                });

                return false;
            }
        }
    };

    wc_checkout_form.init();
    wc_checkout_coupons.init();
    wc_checkout_login_form.init();
    wc_terms_toggle.init();

});
