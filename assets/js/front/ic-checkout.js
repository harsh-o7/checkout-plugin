jQuery(document).ready(function ($) {
    let mainLoader = document.querySelector('.main-checkout-loader');
    setTimeout(function() {
        mainLoader.classList.remove('active');
    }, 1300);
//time out bio 1300, povecan na 1500 da ima vremena za country polje da se dobro implementira na single stepu
    let isMobile = window.innerWidth <= 570;
    if (isMobile) {
        let orderReview = document.querySelector('.ic-order-review');
        let orderReviewWrapper = document.querySelector('.ic-order-review-wrapper');
        let orderReviewHeader = document.querySelector('.order-review-main-header div');
        let showOrderReviewText = 'Show order summary';
        let hideOrderReviewText = 'Hide order summary';

        let additionalSectionsMobile = document.querySelector('.order_review-order-dont-miss-box.mobile-only.ms');
        if (additionalSectionsMobile){
            additionalSectionsMobile.classList.add('hidden');
        }
        let showOrderReviewLabel = document.querySelector('.custom-test-c-show-summary');
        let showOrderReviewLabelMS = document.querySelector('.custom-test-c-ms-show-summary');
        let hideOrderReviewLabel = document.querySelector('.custom-test-c-hide-summary');
        let hideOrderReviewLabelMS = document.querySelector('.custom-test-c-ms-hide-summary');

        if (showOrderReviewLabel){
            showOrderReviewText = showOrderReviewLabel.innerText;
        }else if(showOrderReviewLabelMS){
            showOrderReviewText = showOrderReviewLabelMS.innerText;
        }
        if (hideOrderReviewLabel){
            hideOrderReviewText = hideOrderReviewLabel.innerText;
        }else if(hideOrderReviewLabelMS){
            hideOrderReviewText = hideOrderReviewLabelMS.innerText;
        }
        orderReviewHeader.innerHTML = '<img src="' + urls.plugin_url + 'assets/images/shopping-cart.svg' + '"><span>'+showOrderReviewText+'</span><img class="order-review-arrow" src="' + urls.plugin_url + 'assets/images/chevron-down.svg' + '">';
        let orderSummaryText = document.querySelector('.order-review-main-header span');
        let orderReviewArrow = document.querySelector('.order-review-arrow');
        orderReviewHeader.addEventListener('click', function() {
           if (orderReviewWrapper) {
               orderReviewWrapper.classList.toggle('active');
               if (orderReviewWrapper.classList.contains('active')) {
                   orderSummaryText.innerText = hideOrderReviewText;
                   orderReviewArrow.classList.add('active');

                   let couponFields = orderReviewWrapper.querySelectorAll('.coupon_checkout');
                   couponFields.forEach((couponField)=>{
                       couponField.setAttribute('style','display: table-row !important;');
                   });
                   let newCouponField = document.querySelector('.mobile-coupon-place');
                   newCouponField.setAttribute('style','display: none !important;');

                   let couponCheckout = newCouponField.querySelector('tbody');
                   let rows = couponCheckout.querySelectorAll('tr');
                   let originalCoupon = orderReviewWrapper.querySelector('.coupon_checkout');
                   for (let i=1; i < rows.length; i++){
                       originalCoupon.parentElement.appendChild(rows[i]);
                       //couponCheckout.removeChild(rows[i]);
                   }

               } else {
                   orderSummaryText.innerText = showOrderReviewText;
                   orderReviewArrow.classList.remove('active');

                   setTimeout(function (){
                       let couponFields = document.querySelectorAll('.woocommerce-checkout-review-order-table .coupon_checkout');
                       couponFields.forEach((couponField)=>{
                           couponField.setAttribute('style','display: none !important;');
                       });
                   },500);

                   let mobileField = document.querySelector('.mobile-coupon-place');
                   mobileField.setAttribute('style','display: initial !important;');

                   let originalCouponField = orderReviewWrapper.querySelector('.coupon_checkout');
                   let tbodyOfOriginal = originalCouponField.parentElement;
                   let rowIndex = Array.prototype.indexOf.call(tbodyOfOriginal.children, originalCouponField);
                   let nextRow = tbodyOfOriginal.children[rowIndex + 1];
                   let couponCheckout = document.querySelector('.mobile-coupon-table-place tbody');
                   if(couponCheckout){
                       let rows = couponCheckout.querySelectorAll('tr');
                       for (let i=1; i < rows.length; i++){
                           couponCheckout.removeChild(rows[i]);
                       }
                       if (nextRow){
                           couponCheckout.appendChild(nextRow);
                       }
                   }
               }
           } else {
               orderReview.classList.toggle('active');
               if (orderReview.classList.contains('active')) {
                   orderSummaryText.innerText = hideOrderReviewText;
                   orderReviewArrow.classList.add('active');

                   let couponFields = orderReview.querySelectorAll('.coupon_checkout');
                   couponFields.forEach((couponField)=>{
                       couponField.setAttribute('style','display: table-row !important;');
                   });
                   let newCouponField = document.querySelector('.mobile-coupon-place');
                   newCouponField.setAttribute('style','display: none !important;');

                   let couponCheckout = newCouponField.querySelector('tbody');
                   let rows = couponCheckout.querySelectorAll('tr');
                   let originalCoupon = orderReview.querySelector('.coupon_checkout');
                   for (let i=1; i < rows.length; i++){
                       originalCoupon.parentElement.appendChild(rows[i]);
                       //couponCheckout.removeChild(rows[i]);
                   }

               } else {
                   orderSummaryText.innerText = showOrderReviewText;
                   orderReviewArrow.classList.remove('active');

                   setTimeout(function (){
                       let couponFields = orderReview.querySelectorAll('.woocommerce-checkout-review-order-table .coupon_checkout');
                       couponFields.forEach((couponField)=>{
                           couponField.setAttribute('style','display: none !important;');
                       });
                   },500);

                   let mobileField = document.querySelector('.mobile-coupon-place');
                   mobileField.setAttribute('style','display: initial !important;');

                   let originalCouponField = orderReview.querySelector('.coupon_checkout');
                   let tbodyOfOriginal = originalCouponField.parentElement;
                   let rowIndex = Array.prototype.indexOf.call(tbodyOfOriginal.children, originalCouponField);
                   let nextRow = tbodyOfOriginal.children[rowIndex + 1];
                   let couponCheckout = document.querySelector('.mobile-coupon-table-place tbody');
                   if(couponCheckout){
                       let rows = couponCheckout.querySelectorAll('tr');
                       for (let i=1; i < rows.length; i++){
                           couponCheckout.removeChild(rows[i]);
                       }
                       if (nextRow){
                           couponCheckout.appendChild(nextRow);
                       }
                   }
               }
           }
        });
    } else {
        let singleStepMobReview = document.querySelector('.mob-place-order');
        if(singleStepMobReview) {
            singleStepMobReview.parentElement.removeChild(singleStepMobReview);
        }
    }


    function checkValidationFormInputs() {
        let notFilled = 0;
        let validationForms = document.querySelectorAll('.form-row.validate-required');
        validationForms.forEach(function (validationForm) {
            let validationInput = validationForm.querySelector('input');

            let stateRequired = document.querySelector('#billing_state_field.validate-required');
            if (stateRequired) {
                let stateRequiredSelect = stateRequired.querySelector('select');
                var errorSpan = document.createElement('span');
                errorSpan.classList.add('error-message');
                let idForm = stateRequired.getAttribute('id');
                if (idForm != null) {
                    let serializedId = idForm.replace('billing_',"").replace("_field", "");
                    let errorPerfix = errorMessages[serializedId];
                    errorSpan.innerHTML = errorPerfix + ' ';
                    if (stateRequiredSelect && stateRequiredSelect.value === '') {
                        if (! stateRequired.classList.contains('error')){
                            //add class error to form
                            stateRequired.classList.add('error');
                            //append error span
                            stateRequired.appendChild(errorSpan);
                        }
                        notFilled++;
                        stateRequiredSelect.focus();

                    } else {
                        //remove child
                        let errorMessage = stateRequired.querySelector('.error-message');
                        if (errorMessage) {
                            stateRequired.querySelector('.error-message').remove();
                        }
                        //remove class error
                        stateRequired.classList.remove('error');
                    }
                }
            }

            if (validationInput) {
                var errorSpan = document.createElement('span');
                errorSpan.classList.add('error-message');
                let idForm = validationForm.getAttribute('id');
                if (idForm != null) {
                    let serializedId = idForm.replace('billing_',"").replace("_field", "");
                    let errorPerfix = errorMessages[serializedId];
                    errorSpan.innerHTML = errorPerfix + ' ';
                    if (validationInput.value === '') {
                        if (! validationForm.classList.contains('error')){
                            //add class error to form
                            validationForm.classList.add('error');
                            //append error span
                            validationForm.appendChild(errorSpan);
                        }
                        notFilled++;
                        validationInput.focus();

                    } else {
                        //remove child
                        let errorMessage = validationForm.querySelector('.error-message');
                        if (errorMessage) {
                            validationForm.querySelector('.error-message').remove();
                        }
                        //remove class error
                        validationForm.classList.remove('error');
                    }
                }
            }
        });

        return notFilled === 0;
    }

    function handlePlaceholders() {
        let firstName = 'First name';
        let lastName = 'Last name';
        let email = 'Email';
        let city = 'City';
        let postcode = 'Postcode';
        let country = 'Country';
        let company = 'Company';
        let phone = 'Phone';
        let address = 'Street address';
        let apartment = 'Apartment, suite, unit, etc.';
        let firstNamePlaceholder;
        let lastNamePlaceholder;
        let emailPlaceholder;
        let cityPlaceholder;
        let postcodePlaceholder;
        let countryPlaceholder;
        let companyPlaceholder;
        let phonePlaceholder;
        let addressPlaceholder;
        let apartmentPlaceholder;
        let steps = document.querySelector('.ic-cc-steps');
        if (steps) {
            firstNamePlaceholder = document.querySelector('.custom-test-c-ms-first-name');
            if (firstNamePlaceholder) {
                firstName = firstNamePlaceholder.innerText;
            }
            lastNamePlaceholder = document.querySelector('.custom-test-c-ms-last-name');
            if (lastNamePlaceholder) {
                lastName = lastNamePlaceholder.innerText;
            }
            emailPlaceholder = document.querySelector('.custom-test-c-ms-email');
            if (emailPlaceholder) {
                email = emailPlaceholder.innerText;
            }
            cityPlaceholder = document.querySelector('.custom-test-c-ms-city');
            if (cityPlaceholder) {
                city = cityPlaceholder.innerText;
            }
            postcodePlaceholder = document.querySelector('.custom-test-c-ms-zip-code');
            if (postcodePlaceholder) {
                postcode = postcodePlaceholder.innerText;
            }
            countryPlaceholder = document.querySelector('.custom-test-c-ms-country');
            if (countryPlaceholder) {
                country = countryPlaceholder.innerText;
            }
            companyPlaceholder = document.querySelector('.custom-test-c-ms-company');
            if (companyPlaceholder) {
                company = companyPlaceholder.innerText;
            }
            phonePlaceholder = document.querySelector('.custom-test-c-ms-phone');
            if (phonePlaceholder) {
                phone = phonePlaceholder.innerText;
            }
            addressPlaceholder = document.querySelector('.custom-test-c-ms-address');
            if (addressPlaceholder) {
                address = addressPlaceholder.innerText;
            }
            apartmentPlaceholder = document.querySelector('.custom-test-c-ms-apartment');
            if (apartmentPlaceholder) {
                apartment = apartmentPlaceholder.innerText;
            }
        } else {
            firstNamePlaceholder = document.querySelector('.custom-test-c-first-name');
            if (firstNamePlaceholder) {
                firstName = firstNamePlaceholder.innerText;
            }
            lastNamePlaceholder = document.querySelector('.custom-test-c-last-name');
            if (lastNamePlaceholder) {
                lastName = lastNamePlaceholder.innerText;
            }
            emailPlaceholder = document.querySelector('.custom-test-c-email');
            if (emailPlaceholder) {
                email = emailPlaceholder.innerText;
            }
            cityPlaceholder = document.querySelector('.custom-test-c-city');
            if (cityPlaceholder) {
                city = cityPlaceholder.innerText;
            }
            postcodePlaceholder = document.querySelector('.custom-test-c-zip-code');
            if (postcodePlaceholder) {
                postcode = postcodePlaceholder.innerText;
            }
            countryPlaceholder = document.querySelector('.custom-test-c-country');
            if (countryPlaceholder) {
                country = countryPlaceholder.innerText;
            }
            companyPlaceholder = document.querySelector('.custom-test-c-company');
            if (companyPlaceholder) {
                company = companyPlaceholder.innerText;
            }
            phonePlaceholder = document.querySelector('.custom-test-c-phone');
            if (phonePlaceholder) {
                phone = phonePlaceholder.innerText;
            }
            addressPlaceholder = document.querySelector('.custom-test-c-address');
            if (addressPlaceholder) {
                address = addressPlaceholder.innerText;
            }
            apartmentPlaceholder = document.querySelector('.custom-test-c-apartment');
            if (apartmentPlaceholder) {
                apartment = apartmentPlaceholder.innerText;
            }
        }

            let firstNameInput = document.querySelector('input#billing_first_name');
            if (firstNameInput && firstNameInput.placeholder === '') {
                firstNameInput.placeholder = firstName;
            }
            let lastNameInput = document.querySelector('input#billing_last_name');
            if (lastNameInput && lastNameInput.placeholder === '') {
                lastNameInput.placeholder = lastName;
            }
            let emailInput = document.querySelector('input#billing_email');
            if (emailInput && emailInput.placeholder === '') {
                emailInput.placeholder = email;
            }
            let cityInput = document.querySelector('input#billing_city');
            if (cityInput && cityInput.placeholder === '') {
                cityInput.placeholder = city;
            }
            let postcodeInput = document.querySelector('input#billing_postcode');
            if (postcodeInput && postcodeInput.placeholder === '') {
                postcodeInput.placeholder = postcode;
            }
            let countryInput = document.querySelector('input#billing_country');
            if (countryInput && countryInput.placeholder === '') {
                countryInput.placeholder = country;
            }
            let companyInput = document.querySelector('input#billing_company');
            if (companyInput && companyInput.placeholder === '') {
                companyInput.placeholder = company;
            }
            let phoneInput = document.querySelector('input#billing_phone');
            if (phoneInput && phoneInput.placeholder === '') {
                phoneInput.placeholder = phone;
            }
            let addressOneInput = document.querySelector('input#billing_address_1');
            if ((addressOneInput && addressOneInput.placeholder === '') || (addressOneInput && addressOneInput.placeholder === 'undefined')) {
                addressOneInput.placeholder = address;
            }

            let apartmentInput = document.querySelector('input#billing_address_2');
            if ((apartmentInput && apartmentInput.placeholder === '') || (apartmentInput && apartmentInput.placeholder === 'undefined')) {
                apartmentInput.placeholder = apartment;
            }
    }

    function handleMultistepNavigation() {
        if (!document.getElementById('multistep-navigation')) {
            return;
        }

        let backBtn = document.querySelector('#multistep-navigation span.back');
        let continueBtn = document.querySelector('#multistep-navigation span.continue');

        backBtn.style.display = 'none';

        let billingActive = true;
        let shippingActive = false;
        let paymentActive = false;

        let billingCont1 = document.querySelector('.col-1.ic-cc-l3');
        let billingCont2 = document.querySelector('.col-2.ic-cc-l3');
        let additionalLinks = document.querySelector('.ic-additional.ic-cc-l3');
        let shippingToDiffAddress = document.querySelector('#ship-to-different-address');
        let shippingCont = document.querySelector('.ic-cc-shipping.ic-cc-l3');

        let customerDetails = document.querySelector('.customer_details-right-section');
        let siteLogo = document.querySelector('.ic-checkout-logo-desktop');

        let loader = document.querySelector('.ic-cc-multistep-loader');
        let stepOne = document.querySelector('span.step-one');
        let stepTwo = document.querySelector('span.step-two');
        let stepThree = document.querySelector('span.step-three');

        let steps = document.querySelector('.ic-cc-steps');
        let additionalLinksBox = document.querySelector('#customer_details #ic-additional-links');
        if (additionalLinksBox) {
            additionalLinksBox.classList.add('removingMargin');
        }

        let windowWidth = window.innerWidth;

        continueBtn.addEventListener('click', function() {
            if (billingActive) {  // dodaje se kada se klinke continueButton i prebacuje sa 1. na 2. stranicu
                let filled = checkValidationFormInputs();
                if (filled) { //izvrsava se na mobilnom
                    if (windowWidth<=570) {
                        customerDetails.classList.add('hidden');
                        stepThree.classList.add('hidden');
                        if (additionalLinksBox) {
                            additionalLinksBox.classList.remove('removingMargin');
                        }
                        let additionalSectionsMobile = document.querySelector('.order_review-order-dont-miss-box.mobile-only.ms');
                        if (additionalSectionsMobile){
                            additionalSectionsMobile.classList.add('hidden');
                        }
                        //additionalLinks.classList.add('hidden');
                    }

                    if (windowWidth>=570) {  //izvrsava se na deskopu
                        backBtn.style.opacity = '1';
                        backBtn.style.cursor = 'pointer';
                        backBtn.style.display = 'unset';
                        let backText ='Back to Shipping';

                        let backToShippingCustomText = document.querySelector('.custom-test-c-ms-back-to-shipping-btn');
                        if (backToShippingCustomText){
                            backText = backToShippingCustomText.innerText;
                        }
                        backBtn.innerHTML = '<i class="fas fa-angle-left"></i> '+backText+'';
                    }

                    billingCont1.classList.add('hidden');
                    billingCont2.classList.add('hidden');

                    if (shippingToDiffAddress) {
                        shippingToDiffAddress.classList.add('hidden');
                    }

                    siteLogo.classList.remove('hidden');
                    steps.classList.add('active');

                    shippingCont.classList.remove('hidden');

                    billingActive = false;
                    shippingActive = true;

                    loader.style.width = '66%';
                    let activeStep = document.querySelector('.ic-cc-steps .active');
                    if (activeStep) {
                        activeStep.classList.remove('active');
                    }
                    stepTwo.classList.add('active');

                    let payments = document.querySelectorAll('.ic-cc-last-step #payment .wc_payment_method');
                    if (payments.length === 0) {
                        continueBtn.classList.add('disabled');
                    }
                    let continuePaymentLabel = 'Continue to Payment';
                    let continueToPaymentCustomText = document.querySelector('.custom-test-c-ms-continue-to-payment-btn');
                    if (continueToPaymentCustomText){
                        continuePaymentLabel = continueToPaymentCustomText.innerText;
                    }

                    continueBtn.innerHTML = continuePaymentLabel+' <img width="14" height="14" src="' + urls.plugin_url + '/assets/images/arrow-right.svg' + '" alt="">';
                }
            } else if (shippingActive) { // dodaje se kada se klinke continueButton i prebacuje sa 2. na 3. stranicu
                if (windowWidth<=570){  //izvrsava se na mobilnom
                    stepThree.classList.remove('hidden');
                    if (additionalLinksBox) {
                        additionalLinksBox.classList.remove('removingMargin');
                    }
                    let additionalSectionsMobile = document.querySelector('.order_review-order-dont-miss-box.mobile-only.ms');
                    if (additionalSectionsMobile){
                        additionalSectionsMobile.classList.remove('hidden');
                    }
                }

                if (windowWidth>=570) {  //izvrsava se na deskopu
                    let backBtnLabel = 'Return';
                    let returnBtnCustomText = document.querySelector('.custom-test-c-ms-return-btn');
                    if (returnBtnCustomText){
                        backBtnLabel = returnBtnCustomText.innerText;
                    }
                    backBtn.style.display = 'unset';
                    backBtn.innerHTML = '<i class="fas fa-angle-left"></i> '+backBtnLabel;
                }

                shippingCont.classList.add('hidden');

                siteLogo.classList.remove('hidden');
                steps.classList.add('active');

                let paymentBox = document.querySelector('.ic-cc-last-step');
                paymentBox.classList.add('hidden');
                billingCont2.classList.remove('hidden');

                if (shippingToDiffAddress) {
                    shippingToDiffAddress.classList.add('hidden');
                }

                shippingActive = false;
                paymentActive = true;

                loader.style.width = '100%';

                let activeStep = document.querySelector('.ic-cc-steps .active');

                if (activeStep) {
                    activeStep.classList.remove('active');
                }

                this.style.opacity = '0';
                this.style.cursor = 'auto';

                stepThree.classList.add('active');

                let continueLabel = 'Continue';
                let continueCustomText = document.querySelector('.custom-test-c-ms-continue-btn');
                if (continueCustomText){
                    continueLabel = continueCustomText.innerText;
                }
                continueBtn.innerHTML = continueLabel+'  <img width="14" height="14" src="' + urls.plugin_url + '/assets/images/arrow-right.svg' + '" alt="">';
            }
        });

        if (windowWidth>=570) { //izvrsava se samo na desktopu, uklonjeno je sa moblilne verzije backBtn
            backBtn.addEventListener('click', function() {
                if (shippingActive) { // dodaje se kada se klikne backBtn i prebacuje sa 2. na 1. stranicu
                    if (windowWidth<=570){
                        customerDetails.classList.remove('hidden');
                        //additionalLinksBox.classList.add('removingMargin');
                        if (additionalLinksBox) {
                            additionalLinksBox.classList.add('removingMargin');
                        }
                        stepThree.classList.remove('hidden');
                        additionalLinks.classList.remove('hidden');
                    }

                    shippingCont.classList.add('hidden');

                    siteLogo.classList.add('hidden');
                    steps.classList.remove('active');

                    billingCont1.classList.remove('hidden');

                    if (shippingToDiffAddress) {
                        shippingToDiffAddress.classList.add('hidden');
                    }

                    billingActive = true;
                    shippingActive = false;

                    loader.style.width = '33%';
                    let activeStep = document.querySelector('.ic-cc-steps .active');

                    if (activeStep) {
                        activeStep.classList.remove('active');
                    }

                    stepOne.classList.add('active');

                    continueBtn.classList.remove('disabled');

                    this.style.opacity = '0';
                    this.style.cursor = 'auto';
                    this.style.display = 'none';

                    let continueToDeliveryLabel = 'Continue to Delivery';
                    let continueToDeliveryCustomText = document.querySelector('.custom-test-c-ms-continue-to-delivery-btn');
                    if (continueToDeliveryCustomText){
                        continueToDeliveryLabel = continueToDeliveryCustomText.innerText;
                    }
                    let backButtonLabel = 'Back';
                    let backButtonCustomText = document.querySelector('.custom-test-c-ms-return-btn');
                    if (backButtonCustomText){
                        backButtonLabel = backButtonCustomText.innerText;
                    }
                    continueBtn.innerHTML = continueToDeliveryLabel+'  <img width="14" height="14" src="' + urls.plugin_url + '/assets/images/arrow-right.svg' + '" alt="">';
                    backBtn.innerHTML = '<i class="fas fa-angle-left"></i> '+backButtonLabel;

                } else if (paymentActive) { // dodaje se kada se klinke backBtn i prebacuje sa 3. na 2. stranicu
                    if (windowWidth<=570){
                        stepThree.classList.remove('hidden');
                       // additionalLinksBox.classList.remove('removingMargin');
                        if (additionalLinksBox) {
                            additionalLinksBox.classList.remove('removingMargin');
                        }
                    }

                    shippingCont.classList.remove('hidden');

                    siteLogo.classList.remove('hidden');
                    steps.classList.add('active');

                    let paymentBox = document.querySelector('.ic-cc-last-step');
                    paymentBox.classList.add('hidden');

                    if (shippingToDiffAddress) {
                        shippingToDiffAddress.classList.add('hidden');
                    }

                    paymentActive = false;
                    shippingActive = true;

                    loader.style.width = '66%';
                    let activeStep = document.querySelector('.ic-cc-steps .active');

                    if (activeStep) {
                        activeStep.classList.remove('active');
                    }

                    stepTwo.classList.add('active');

                    continueBtn.style.opacity = '1';
                    continueBtn.style.cursor = 'pointer';

                    backBtn.style.display = 'unset';

                    let continueToPaymentLabel = 'Continue to Payment';
                    let continueToPaymentCustomText = document.querySelector('.custom-test-c-ms-continue-to-payment-btn');
                    if (continueToPaymentCustomText){
                        continueToPaymentLabel = continueToPaymentCustomText.innerText;
                    }
                    let backToShippingButtonLabel = 'Back to Shipping';
                    let backToShippingCustomText = document.querySelector('.custom-test-c-ms-back-to-shipping-btn');
                    if (backToShippingCustomText){
                        backToShippingButtonLabel = backToShippingCustomText.innerText;
                    }

                    continueBtn.innerHTML = continueToPaymentLabel+'  <img width="14" height="14" src="' + urls.plugin_url + '/assets/images/arrow-right.svg' + '" alt="">';
                    backBtn.innerHTML = '<i class="fas fa-angle-left"></i> '+backToShippingButtonLabel;
                }
            });
        }

        stepOne.addEventListener('click', function () { // dodaje se kada se klikne prvi link i prebacuje na isti
            if (windowWidth<=570){ //izvrsava se na mobilnom
                customerDetails.classList.remove('hidden');
                stepThree.classList.remove('hidden');
                //additionalLinksBox.classList.add('removingMargin');
                if (additionalLinksBox) {
                    additionalLinksBox.classList.add('removingMargin');
                }
                additionalLinks.classList.remove('hidden');
                let additionalSectionsMobile = document.querySelector('.order_review-order-dont-miss-box.mobile-only.ms');
                if (additionalSectionsMobile){
                    additionalSectionsMobile.classList.add('hidden');
                }
            }

            if (windowWidth>=570){ //izvrsava se na desktopu
                backBtn.style.opacity = '0';
                backBtn.style.cursor = 'auto';
                backBtn.style.display = 'none';

                let backButtonLabel = 'Back';
                let backButtonCustomText = document.querySelector('.custom-test-c-ms-return-btn');
                if (backButtonCustomText){
                    backButtonLabel = backButtonCustomText.innerText;
                }
                backBtn.innerHTML = '<i class="fas fa-angle-left"></i> '+backButtonLabel;
            }

            shippingCont.classList.add('hidden');
            let paymentBox = document.querySelector('.ic-cc-last-step');
            paymentBox.classList.add('hidden');

            siteLogo.classList.add('hidden');
            steps.classList.remove('active');

            billingCont1.classList.remove('hidden');

            if (shippingToDiffAddress) {
                shippingToDiffAddress.classList.add('hidden');
            }

            billingActive = true;
            shippingActive = false;

            loader.style.width = '33%';
            let activeStep = document.querySelector('.ic-cc-steps .active');

            if (activeStep) {
                activeStep.classList.remove('active');
            }
            stepOne.classList.add('active');

            continueBtn.style.opacity = '1';
            continueBtn.style.cursor = 'pointer';

            continueBtn.classList.remove('disabled');

            let continueToDeliveryLabel = 'Continue to Delivery';
            let continueToDeliveryCustomText = document.querySelector('.custom-test-c-ms-continue-to-delivery-btn');
            if (continueToDeliveryCustomText){
                continueToDeliveryLabel = continueToDeliveryCustomText.innerText;
            }
            continueBtn.innerHTML = continueToDeliveryLabel+'  <img width="14" height="14" src="' + urls.plugin_url + '/assets/images/arrow-right.svg' + '" alt="">';
        });

        stepTwo.addEventListener('click', function() { // dodaje se kada se klikne drugi link i prebacuje na isti
            if (windowWidth<=570) { //izvrsava se na mobilnom
                customerDetails.classList.add('hidden');
                stepThree.classList.add('hidden');
                if (additionalLinksBox) {
                    additionalLinksBox.classList.remove('removingMargin');
                }
                //additionalLinksBox.classList.remove('removingMargin');
                //additionalLinks.classList.add('hidden');
                let additionalSectionsMobile = document.querySelector('.order_review-order-dont-miss-box.mobile-only.ms');
                if (additionalSectionsMobile){
                    additionalSectionsMobile.classList.add('hidden');
                }
            }

            if (windowWidth>=570) { //izvrsava se na desktopu
                backBtn.style.opacity = '1';
                backBtn.style.cursor = 'pointer';
                backBtn.style.display = 'unset';

                let backToShippingButtonLabel = 'Back to Shipping';
                let backToShippingCustomText = document.querySelector('.custom-test-c-ms-back-to-shipping-btn');
                if (backToShippingCustomText){
                    backToShippingButtonLabel = backToShippingCustomText.innerText;
                }
                backBtn.innerHTML = '<i class="fas fa-angle-left"></i> '+backToShippingButtonLabel;
            }

            siteLogo.classList.remove('hidden');
            steps.classList.add('active');

            shippingCont.classList.remove('hidden');
            billingCont1.classList.add('hidden');
            billingCont2.classList.add('hidden');

            if (shippingToDiffAddress) {
                shippingToDiffAddress.classList.add('hidden');
            }

            let paymentBox = document.querySelector('.ic-cc-last-step');
            paymentBox.classList.add('hidden');

            if (shippingToDiffAddress) {
                shippingToDiffAddress.classList.add('hidden');
            }

            paymentActive = false;
            billingActive = false;
            shippingActive = true;

            loader.style.width = '66%';
            let activeStep = document.querySelector('.ic-cc-steps .active');

            if (activeStep) {
                activeStep.classList.remove('active');
            }

            stepTwo.classList.add('active');

            continueBtn.style.opacity = '1';
            continueBtn.style.cursor = 'pointer';

            let continueToPaymentLabel = 'Continue to Payment';
            let continueToPaymentCustomText = document.querySelector('.custom-test-c-ms-continue-to-payment-btn');
            if (continueToPaymentCustomText){
                continueToPaymentLabel = continueToPaymentCustomText.innerText;
            }
            continueBtn.innerHTML = continueToPaymentLabel+'  <img width="14" height="14" src="' + urls.plugin_url + '/assets/images/arrow-right.svg' + '" alt="">';
        });

        stepThree.addEventListener('click', function() { // dodaje se kada se klikne treci link i prebacuje na isti
            if (windowWidth<=570){ //izvrsava se na mobilnom
                stepThree.classList.remove('hidden');
                customerDetails.classList.add('hidden');
                if (additionalLinksBox) {
                    additionalLinksBox.classList.remove('removingMargin');
                }
                //additionalLinksBox.classList.remove('removingMargin');
                //additionalLinks.classList.add('hidden');
                let additionalSectionsMobile = document.querySelector('.order_review-order-dont-miss-box.mobile-only.ms');
                if (additionalSectionsMobile){
                    additionalSectionsMobile.classList.remove('hidden');
                }
            }


            if (windowWidth>=570) {//izvrsava se na desktopu
                backBtn.style.opacity = '1';
                backBtn.style.cursor = 'pointer';
                backBtn.style.display = 'unset';

                let backButtonLabel = 'Return';
                let backButtonCustomText = document.querySelector('.custom-test-c-ms-return-btn');
                if (backButtonCustomText){
                    backButtonLabel = backButtonCustomText.innerText;
                }
                backBtn.innerHTML = '<i class="fas fa-angle-left"></i> '+backButtonLabel;
            }

            shippingCont.classList.add('hidden');
            billingCont1.classList.add('hidden');
            billingCont2.classList.add('hidden');

            if (shippingToDiffAddress) {
                shippingToDiffAddress.classList.add('hidden');
            }

            let paymentBox = document.querySelector('.ic-cc-last-step');
            paymentBox.classList.add('hidden');
            billingCont2.classList.remove('hidden');

            if (shippingToDiffAddress) {
                shippingToDiffAddress.classList.add('hidden');
            }

            shippingActive = false;
            paymentActive = true;
            loader.style.width = '100%';

            let activeStep = document.querySelector('.ic-cc-steps .active');

            if (activeStep) {
                activeStep.classList.remove('active');
            }


            stepThree.classList.add('active');

            continueBtn.style.opacity = '0';
            continueBtn.style.cursor = 'auto';
            let continueButtonLabel = 'Continue';
            let continueCustomText = document.querySelector('.custom-test-c-ms-continue-btn');
            if (continueCustomText){
                continueButtonLabel = continueCustomText.innerText;
            }

            continueBtn.innerHTML = continueButtonLabel+'  <img width="14" height="14" src="' + urls.plugin_url + '/assets/images/arrow-right.svg' + '" alt="">';
        });
    };

    handleMultistepNavigation();
    handlePlaceholders();

    jQuery('.checkout.woocommerce-checkout').submit(function (e) {
        e.preventDefault();
        jQuery(this).ajaxSubmit({
            success: function () {

            }
        });
    });

});

// let reviewTable = document.querySelector('#ic-checkout table.shop_table.woocommerce-checkout-review-order-table tfoot');








