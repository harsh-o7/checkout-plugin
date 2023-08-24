let allProducts = [];
let customProducts = [];
let tabs = document.querySelectorAll('.section-cont');
let designNavs = document.querySelectorAll('.design-nav span');
let formTables = document.querySelectorAll('#cc-form table.form-table');
let generalTable = formTables[0];
let checkoutTable = formTables[1];
let miniCartTable = formTables[2];
let tyTable = formTables[3];
let saveSections = document.querySelector('#sectionsModal button.btn.btn-primary');
let customProductsChecks = document.querySelectorAll('.single-product-trigger input');
let customProductsSelected = document.querySelector('p.triggers-selected span');
let addCustomProducts = document.querySelector('button.upsell-create-modal-btn-add');
let selectAllCustomProducts = document.querySelector('.select-all-triggers');
let searchCustomProductsInput = document.querySelector('input#search-us-triggers');
let previewButton = document.querySelector('.preview-design');
let previewSliderMiniCart = document.querySelector('.ic-upsell-mini-cart-slider');
let mulistepContainers = document.querySelectorAll('.ic-ly3-preview');
let checkoutSliders = document.querySelectorAll('.ic-checkout-upsell');


//Primary Color section
let designPrimaryColor,designPrimaryBackgroundColor,designPrimaryTextColor;

//Button roundness
let designCornerRadius = 0;

//Background Color section
let designSecondaryBackgroundColor;

//Fonts section
let designFontFamily,designFontWeight,designFontStyle,designFontSubsets;

//Elements Color section
let designCustomAccentColor,designCustomErrorColor,designPrimaryBtnBackgroundColor,designSecondaryBtnBackgroundColor,
    designInputBackgroundColor,designInputTextColor,designBorderColor,designQtyCircleColor,designQtyCircleBackgroundColor,
    designMiniCartMsgColor,designMiniCartMsgBackgroundColor,designInputOutlineColor;

//Text Color section
let designSecondaryTextColor,designTertiaryTextColor,designPrimaryBtnTextColor,designSecondaryBtnTextColor;


let checkerForPreview=0;
function getCurrentColorsForPreview(){
    if (checkerForPreview>0){

        let tableSections = generalTable.querySelectorAll('.table-cont');
        let primaryColorSection = tableSections[0];
        let buttonRoundnessSection = tableSections[1];
        let fontsTableSection = tableSections[2];
        let backgroundColorSection = tableSections[3];
        let elementColorSection = tableSections[4];
        let textColorSection = tableSections[5];


        let primarySection = primaryColorSection.querySelectorAll('.wp-color-result');
        designPrimaryColor = window.getComputedStyle(primarySection[0]).backgroundColor;
        designPrimaryBackgroundColor = window.getComputedStyle(primarySection[1]).backgroundColor;
        designPrimaryTextColor = window.getComputedStyle(primarySection[2]).backgroundColor;

        let backgroundSection = backgroundColorSection.querySelectorAll('.wp-color-result');
        designSecondaryBackgroundColor = window.getComputedStyle(backgroundSection[0]).backgroundColor;

        let elementSection = elementColorSection.querySelectorAll('.wp-color-result');
        designCustomAccentColor = window.getComputedStyle(elementSection[0]).backgroundColor;
        designCustomErrorColor = window.getComputedStyle(elementSection[1]).backgroundColor;
        designPrimaryBtnBackgroundColor = window.getComputedStyle(elementSection[2]).backgroundColor;
        designSecondaryBtnBackgroundColor = window.getComputedStyle(elementSection[3]).backgroundColor;
        designInputBackgroundColor = window.getComputedStyle(elementSection[4]).backgroundColor;
        designInputTextColor = window.getComputedStyle(elementSection[5]).backgroundColor;
        designBorderColor = window.getComputedStyle(elementSection[6]).backgroundColor;
        designQtyCircleColor = window.getComputedStyle(elementSection[7]).backgroundColor;
        designQtyCircleBackgroundColor = window.getComputedStyle(elementSection[8]).backgroundColor;
        designMiniCartMsgColor = window.getComputedStyle(elementSection[9]).backgroundColor;
        designMiniCartMsgBackgroundColor = window.getComputedStyle(elementSection[10]).backgroundColor;
        designInputOutlineColor = window.getComputedStyle(elementSection[11]).backgroundColor;

        let textSection = textColorSection.querySelectorAll('.wp-color-result');
        designSecondaryTextColor = window.getComputedStyle(textSection[0]).backgroundColor;
        designTertiaryTextColor = window.getComputedStyle(textSection[1]).backgroundColor;
        designPrimaryBtnTextColor = window.getComputedStyle(textSection[2]).backgroundColor;
        designSecondaryBtnTextColor = window.getComputedStyle(textSection[3]).backgroundColor;

        let cornerRadius = buttonRoundnessSection.querySelector('.check-toggle-cont');

        if (cornerRadius.classList.contains('active')){
            let radiusInput = cornerRadius.querySelector('input');
            let cornerInput = radiusInput.value;
            // console.log(cornerInput)
            if (cornerInput.endsWith('px')) {
                designCornerRadius = cornerInput;
                // console.log('1 ' + designCornerRadius)
            }
            else if (!isNaN(cornerInput) && cornerInput !='') {
                designCornerRadius = cornerInput+'px';
                // console.log('2 ' + designCornerRadius);
            }
            else {
                designCornerRadius = '8px';
                // console.log('3 ' + designCornerRadius);
            }
        } else{
            designCornerRadius = '8px';
            // console.log('4')
        }

        let fontSection = fontsTableSection.querySelector('.check-toggle-cont');
        let fontRows = fontSection.querySelectorAll('tr');
        if (fontSection.classList.contains('active')){
            designFontFamily = 'Inter';
            designFontWeight = '400';
            designFontStyle = 'normal';
            designFontSubsets = 'normal';
        }else{
            let selectFamily = fontRows[0].querySelector('select');
            let fontFamily = selectFamily.selectedOptions[0].textContent;

            let selectWeightStyle = fontRows[1].querySelector('select');
            let fontWeightAndStyle = selectWeightStyle.selectedOptions[0].textContent;
            let fontWeight=fontWeightAndStyle.match(/\d+/)[0];

            let selectSubsets = fontRows[2].querySelector('select');
            let fontSubsets = selectSubsets.selectedOptions[0].textContent;

            designFontWeight = fontWeight;
            designFontFamily = fontFamily;

            designFontStyle = 'normal';

            if (fontSubsets === "Normal") {
                designFontSubsets = "normal";
            } else if (fontSubsets === "Italic") {
                designFontSubsets = "italic";
            } else if (fontSubsets === "Oblique") {
                designFontSubsets = "oblique";
            }else{
                designFontSubsets = 'normal';
            }
        }
    }
}

function changePreviewStyle(){
    if (checkerForPreview>0){

        //Primary color
            //Primary background color
        let primaryBackgroundColors = document.querySelectorAll('.ic-preview-custom-pbc');
        if (primaryBackgroundColors){
            primaryBackgroundColors.forEach((primaryBackgroundColor)=>{
                primaryBackgroundColor.style.backgroundColor = designPrimaryBackgroundColor;
            });
        }
            //Primary text color
        let primaryTextColors = document.querySelectorAll('.ic-preview-custom-ptc');
        if (primaryTextColors){
            primaryTextColors.forEach((primaryTextColor)=>{
                primaryTextColor.style.color = designPrimaryTextColor;
            });
        }

        //Background colors
            //Secondary background colors
        let secondaryBackgroundColors = document.querySelectorAll('.ic-preview-custom-sbc');
        if (secondaryBackgroundColors){
            secondaryBackgroundColors.forEach((secondaryBackgroundColor)=>{
                secondaryBackgroundColor.style.backgroundColor = designSecondaryBackgroundColor;
            });
        }

        //Elements colors
            //Custom accent color
        let customAccentColors = document.querySelectorAll('.ic-preview-custom-cac');
        if (customAccentColors){
            customAccentColors.forEach((customAccentColor)=>{
                customAccentColor.style.color = designCustomAccentColor;
            });
        }
            // Custom error color
        let customErrorColors = document.querySelectorAll('.ic-preview-custom-cec');
        if (customErrorColors){
            customErrorColors.forEach((customErrorColor)=>{
                customErrorColor.style.color = designCustomErrorColor;
            });
        }
            //Primary buttons background color
        let primaryButtonBackgroundColors = document.querySelectorAll('.ic-preview-custom-pbbc');
        if (primaryButtonBackgroundColors){
            primaryButtonBackgroundColors.forEach((primaryButtonBackgroundColor)=>{
                primaryButtonBackgroundColor.style.backgroundColor = designPrimaryBtnBackgroundColor;
            });
        }
            //Secondary buttons background color
        let secondaryButtonsBackgroundColors = document.querySelectorAll('.ic-preview-custom-sbbc');
        if (secondaryButtonsBackgroundColors){
            secondaryButtonsBackgroundColors.forEach((secondaryButtonsBackgroundColor)=>{
                secondaryButtonsBackgroundColor.style.backgroundColor = designSecondaryBtnBackgroundColor;
            });
        }
            //Input field background color
        let inputFieldBackgroundColors = document.querySelectorAll('.ic-preview-custom-ifbc');
        if (inputFieldBackgroundColors){
            inputFieldBackgroundColors.forEach((inputFieldBackgroundColor)=>{
                inputFieldBackgroundColor.style.backgroundColor = designInputBackgroundColor;
            });
        }
            //Input field text color
        let inputFieldTextColors = document.querySelectorAll('.ic-preview-custom-iftc');
        if (inputFieldTextColors){
            inputFieldTextColors.forEach((inputFieldTextColor)=>{
                inputFieldTextColor.style.color = designInputTextColor;
            });
        }
            //Border color
        let borderColors = document.querySelectorAll('.ic-preview-custom-bc');
        if (borderColors){
            borderColors.forEach((borderColor)=>{
                borderColor.style.borderColor = designBorderColor;
            });
        }
            //Quantity circle color
        let quantityCircleColors = document.querySelectorAll('.ic-preview-custom-qqc');
        if (quantityCircleColors){
            quantityCircleColors.forEach((quantityCircleColor)=>{
                quantityCircleColor.style.color = designQtyCircleColor;
            });
        }
            //Quantity circle background color
        let quantityCircleBackgroundColors = document.querySelectorAll('.ic-preview-custom-qcbc');
        if (quantityCircleBackgroundColors){
            quantityCircleBackgroundColors.forEach((quantityCircleBackgroundColor)=>{
                quantityCircleBackgroundColor.style.backgroundColor = designQtyCircleBackgroundColor;
            });
        }
            //Mini cart message color
        let miniCartMessageColors = document.querySelectorAll('.ic-preview-custom-mcmc');
        if (miniCartMessageColors){
            miniCartMessageColors.forEach((miniCartMessageColor)=>{
                miniCartMessageColor.style.color = designMiniCartMsgColor;
            });
        }
            //Mini cart message background color
        let miniCartMessageBackgroundColors = document.querySelectorAll('.ic-preview-custom-mcmbc');
        if (miniCartMessageBackgroundColors){
            miniCartMessageBackgroundColors.forEach((miniCartMessageBackgroundColor)=>{
                miniCartMessageBackgroundColor.style.backgroundColor = designMiniCartMsgBackgroundColor;
            });
        }
            //Input outline color
        let inputOutlineColors = document.querySelectorAll('.ic-preview-custom-ioc');
        if (inputOutlineColors){
            inputOutlineColors.forEach((inputOutlineColor)=>{
                inputOutlineColor.style.borderColor = designInputOutlineColor;
                //Promenjeno iz outlineColor u borderColor zato sto oni podrazumevaju pod outline border
            });
        }

        //Text color
            //Secondary text color
        let secondaryTextColors = document.querySelectorAll('.ic-preview-custom-stc');
        if (secondaryTextColors){
            secondaryTextColors.forEach((secondaryTextColor)=>{
                secondaryTextColor.style.color = designSecondaryTextColor;
            });
        }
            //Tertiary text color
        let tertiaryTextColors = document.querySelectorAll('.ic-preview-custom-ttc');
        if (tertiaryTextColors){
            tertiaryTextColors.forEach((tertiaryTextColor)=>{
                tertiaryTextColor.style.color = designTertiaryTextColor;
            });
        }
            //Primary buttons text color
        let primaryButtonsTextColors = document.querySelectorAll('.ic-preview-custom-pbtc');
        if (primaryButtonsTextColors){
            primaryButtonsTextColors.forEach((primaryButtonsTextColor)=>{
                primaryButtonsTextColor.style.color = designPrimaryBtnTextColor;
            });
        }
            //Secondary buttons text color
        let secondaryButtonsTextColors = document.querySelectorAll('.ic-preview-custom-sbtc');
        if (secondaryButtonsTextColors){
            secondaryButtonsTextColors.forEach((secondaryButtonsTextColor)=>{
                secondaryButtonsTextColor.style.color = designSecondaryBtnTextColor;
            });
        }

        //Button roundness section
            //Corner radius
        let cornerRadii = document.querySelectorAll('.ic-preview-custom-cr');
        if (cornerRadii) {
            cornerRadii.forEach((cornerRadius) => {
                let newCorner = designCornerRadius;
                cornerRadius.style.borderRadius = newCorner;
                cornerRadius.style.border = '3px solid green !important';
                // console.log('nasao ga je ' + designCornerRadius + ' ' + cornerRadius.style.borderRadius )
            });
        }


        //Font section

        //This part is simply on the whole preview, so it sets the font of whole preview
        let textSection = document.querySelectorAll('.ic-prw-sections');

        textSection.forEach((fontSectios)=>{
            fontSectios.style.fontFamily = designFontFamily;
            fontSectios.style.fontWeight = designFontWeight;
            fontSectios.style.fontStyle = designFontStyle;
            fontSectios.style.fontVariant = designFontSubsets;
        });

        //Set logo of website on preview page, image on preview needs lower width (currently 230, maybe 30px)
        /*
            let websiteLogo = document.querySelector('.ic_checkout_logo');
            let imgTag = websiteLogo.querySelector('img');
            let imgSrcAttribute='';
            if (imgTag){
                if (imgTag.src){
                    imgSrcAttribute = imgTag.src;
                }
            }
            let previewDivForLogo = document.querySelectorAll('.ic-prw-logo');
            console.log(previewDivForLogo);
            if (previewDivForLogo){
                previewDivForLogo.forEach((imgTag)=>{
                   imgTag.querySelector('img').src = imgSrcAttribute;
                });
            }
        */
    }
}

let multiStepImage;
let singleStepImage;


window.onload = function(){
    checkerForPreview=1;

    let tableSections = generalTable.querySelectorAll('.table-cont');

    let buttonRoundnessSection = tableSections[1];
    let cornerRadiusInput = document.querySelector('#ic_design_corner_radius');
    let cornerRadius = buttonRoundnessSection.querySelector('.check-toggle-cont');

    if (!cornerRadiusInput.checked){
        cornerRadius.classList.add('active');
        cornerRadius.style.maxHeight='129px';
        //cornerRadiusInput.click();
    }

    let fontsTableSection = tableSections[2];
    let fontInput = document.querySelector('#ic_design_typography');
    let fontSection = fontsTableSection.querySelector('.check-toggle-cont');
    if (!fontInput.checked){
        fontSection.classList.add('active');
        fontSection.style.maxHeight = '184px';
        //fontInput.click();
    }



    multiStepImage = document.querySelector('.design-box-heading-right-image');
    singleStepImage = document.querySelector('.design-box-heading-left-image');
    getCurrentColorsForPreview();


    multiStepImage.addEventListener('click',function(){
        multiStepImage.querySelector('img').click();
        getCurrentColorsForPreview();
        changePreviewStyle();
    });

    singleStepImage.addEventListener('click',function(){
        singleStepImage.querySelector('img').click();
        getCurrentColorsForPreview();
        changePreviewStyle();
    });
};


customProductsChecks.forEach((customProductCheck) => {
    customProductCheck.addEventListener('change', function () {
        let productId = this.value;
        if (this.checked) {
            customProducts.push(productId);
        } else {
            customProducts = customProducts.filter(product => product != productId);
        }
        customProductsSelected.innerText = customProducts.length;
    });
});

selectAllCustomProducts.addEventListener('click', function () {
    customProductsChecks.forEach((customProductCheck) => {
        if (!customProductCheck.checked) {
            customProductCheck.checked = true;
            customProducts.push(customProductCheck.value);
        }
    });
    customProductsSelected.innerText = triggers.length;
});

previewButton.addEventListener('click', function() {
    getCurrentColorsForPreview();
    changePreviewStyle();


    jQuery("#previewDesign").modal('show');
    let activeDesign = document.querySelector('.design-nav span.active');

    let activateSectionText = (activeDesign.innerText).trim().replace(" ","").toLowerCase();
    let navBorder = document.querySelector('.nav-modal-border');

    if(activateSectionText.startsWith('thankyou')) {
        activateSectionText = 'thankyoupage';
        navBorder.style.left = '212px';
        navBorder.style.width = '109px'
    } else if(activateSectionText.startsWith('mini')) {
        navBorder.style.left = '105px';
        navBorder.style.width = '69px'
    } else {
        navBorder.style.left = '0px';
        navBorder.style.width = '69px'
    }

    let currentlyActiveSection = document.querySelector('.section-modal-cont.active');
    if(currentlyActiveSection) {
        currentlyActiveSection.classList.remove('active');
    }
    let currentlyActiveSectionNav = document.querySelector('.design-modal-nav span.active');
    if(currentlyActiveSectionNav) {
        currentlyActiveSectionNav.classList.remove('active');
    }
    let newlyActiveSection = document.querySelector('#section-modal-' + activateSectionText);

    if(newlyActiveSection) {
        newlyActiveSection.classList.add('active');
    }
    let newlyActiveSectionNav = document.querySelector('#' + activateSectionText);
    if(newlyActiveSectionNav) {
        newlyActiveSectionNav.classList.add('active');
    }

});

if(previewSliderMiniCart) {
    let previewSliderMiniCartInstance = new Swiper('.ic-upsell-mini-cart-slider', {
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        pagination: {
            el: '.swiper-pagination',
        },
    });
}

mulistepContainers.forEach((multistepCont) => {
    let backBtn = multistepCont.querySelector('#multistep-navigation span.back');
    let continueBtn = multistepCont.querySelector('#multistep-navigation span.continue');

    let billingActive = true;
    let shippingActive = false;
    let paymentActive = false;

    let billingCont1 = multistepCont.querySelector('.col-1.ic-cc-l3');
    let billingCont2 = multistepCont.querySelector('.col-2.ic-cc-l3');
    let additionalLinks = multistepCont.querySelector('.ic-additional.ic-cc-l3');
    let shippingToDiffAddress = multistepCont.querySelector('#ship-to-different-address');
    let shippingCont = multistepCont.querySelector('.ic-cc-shipping.ic-cc-l3');

    let loader = multistepCont.querySelector('.ic-cc-multistep-loader');
    let stepTwo = multistepCont.querySelector('span.step-two');
    let stepThree = multistepCont.querySelector('span.step-three');

    continueBtn.addEventListener('click', function() {
        if(billingActive) {
            billingCont1.classList.add('hidden');
            billingCont2.classList.add('hidden');
            additionalLinks.classList.add('hidden');
            if(shippingToDiffAddress) {
                shippingToDiffAddress.classList.add('hidden');
            }

            shippingCont.classList.remove('hidden');

            billingActive = false;
            shippingActive = true;

            loader.style.width = '66%';
            stepTwo.style.color = '#222222';

            backBtn.style.opacity = '1';
            backBtn.style.cursor = 'pointer';
        } else if(shippingActive) {
            shippingCont.classList.add('hidden');

            let paymentBox = multistepCont.querySelector('.ic-cc-last-step');
            paymentBox.classList.add('hidden');
            billingCont2.classList.remove('hidden');
            if(shippingToDiffAddress) {
                shippingToDiffAddress.classList.add('hidden');
            }
            shippingActive = false;
            paymentActive = true;

            loader.style.width = '100%';
            stepThree.style.color = '#222222';

            this.style.opacity = '0.6';
            this.style.cursor = 'auto';
        }
    });

    backBtn.addEventListener('click', function() {
        if(shippingActive) {
            shippingCont.classList.add('hidden');

            billingCont1.classList.remove('hidden');
            //billingCont2.classList.remove('hidden');
            additionalLinks.classList.remove('hidden');
            if(shippingToDiffAddress) {
                shippingToDiffAddress.classList.add('hidden');
            }
            billingActive = true;
            shippingActive = false;

            loader.style.width = '33%';
            stepTwo.style.color = '#68696B';

            this.style.opacity = '0.6';
            this.style.cursor = 'auto';
        } else if(paymentActive) {
            shippingCont.classList.remove('hidden');

            let paymentBox = multistepCont.querySelector('.ic-cc-last-step');
            paymentBox.classList.add('hidden');
            //billingCont2.classList.remove('hidden');
            if(shippingToDiffAddress) {
                shippingToDiffAddress.classList.add('hidden');
            }
            paymentActive = false;
            shippingActive = true;

            loader.style.width = '66%';
            stepThree.style.color = '#68696B';

            continueBtn.style.opacity = '1';
            continueBtn.style.cursor = 'pointer';
        }
    });
});

checkoutSliders.forEach((checkoutSlider) => {
    checkoutSlider = new Swiper('.ic-checkout-upsell', {
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        pagination: {
            el: '.swiper-pagination',
        },
    });
});

function prepopulateCustomProducts() {
    jQuery.ajax({
        url: urls.ajax_url,
        type: 'get',
        data: {
            action: 'ic_query_products',
            nonce: nonces.query_products,
            query: ''
        },
        success: function (response) {
            allProducts = JSON.parse(response);

            addCustomProductsHTML();

        }
    });
}

function addCustomProductsHTML() {
    let customProductsCont = document.querySelector('#custom-products .custom-products-wrapper');

    addCustomProducts.addEventListener('click', function() {
       let customProductsHtml = '';
       customProducts.forEach((customProduct) => {
           let product = allProducts.find(e => e.ID == customProduct);
           customProductsHtml += '<div class="single-trigger" id="id-' + product.ID + '">';
           customProductsHtml += '<div class="single-trigger-left-col">';
           customProductsHtml += '<img src="' + product.image + '" width="32" height="32" />';
           customProductsHtml += '<div class="single-trigger-title">' + product.title + '</div>';
           customProductsHtml += '</div>';
           customProductsHtml += '<div class="single-trigger-right-col">';
           customProductsHtml += '<img class="single-trigger-delete" width="14" height="14" src="' + urls.plugin_url + '/assets/images/trash-can.png">';
           customProductsHtml += '</div>';
           customProductsHtml += '</div>';
       });
        customProductsCont.innerHTML = customProductsHtml;
        let deleteBtns = customProductsCont.querySelectorAll('.single-trigger-delete');
        deleteBtns.forEach((deleteBtn) => {
            deleteBtn.addEventListener('click', function() {
                let id = deleteBtn.parentElement.parentElement.id.slice(3);
                customProducts = customProducts.filter(product => product != id);
                let checks = document.querySelectorAll('.single-product-trigger input');
                let check = Array.from(checks).find(e => e.value == id);
                check.click();
                customProductsCont.removeChild(deleteBtn.parentElement.parentElement);
            });
        });
    });

    searchCustomProductsInput.addEventListener('input', function() {
        jQuery.ajax({
            url: urls.ajax_url,
            type: 'get',
            data: {
                action: 'ic_query_products',
                nonce: nonces.query_products,
                exclude: [],
                query: searchCustomProductsInput.value
            },
            success: function (response) {
                let searchProducts = JSON.parse(response);
                let newHtml = '';
                searchProducts.forEach((product) => {
                    newHtml += '<div class="single-product-trigger">';
                    newHtml += '<input type="checkbox" value="' + product.ID + '"';

                    if(triggers.includes(product.ID)) {
                        newHtml += ' checked />';
                    } else {
                        newHtml += ' />';
                    }

                    if(product.image == null) {
                        newHtml += '<img width="32" height="32" src="' + urls.plugin_url + '/assets/images/woocommerce-placeholder.png' + '" alt="">';
                    } else {
                        newHtml += '<img width="32" height="32" src="' + product.image + '" alt="" >';
                    }

                    newHtml += '<p>' + product.title + '</p></div>';
                });

                customProductsCont.innerHTML = '';
                customProductsCont.innerHTML = newHtml;

                document.querySelectorAll('.single-product-trigger input').forEach((triggerCheck) => {
                    triggerCheck.addEventListener('change', function () {
                        let triggerId = this.value;
                        if (this.checked) {
                            triggers.push(triggerId);
                        } else {
                            triggers = triggers.filter(trigger => trigger != triggerId);
                        }
                        triggersSelected.innerText = triggers.length;
                    });
                });
            }
        });
    });

    let customProductsSaved = getCustomProducts();
    if(customProductsSaved) {
        customProductsSaved.forEach((customProduct) => {
            document.querySelector('.single-product-trigger input[value="' + customProduct + '"]').click();
        });
        addCustomProducts.click();
    }
}

function addGeneralToggles() {
    let generalTableRows = generalTable.querySelectorAll('tr');

    let cont1 = document.createElement('div');
    cont1.classList.add('table-cont');
    let toggle1 = document.createElement('div');
    toggle1.classList.add('table-toggle');
    toggle1.innerHTML = '<i class="fa-solid fa-angle-down"></i><p>Primary color</p>';
    let rows1Cont = document.createElement('div');
    rows1Cont.classList.add('rows-cont');
    cont1.appendChild(toggle1);
    rows1Cont.appendChild(generalTableRows[0]);
    rows1Cont.appendChild(generalTableRows[1]);
    rows1Cont.appendChild(generalTableRows[2]);
    cont1.appendChild(rows1Cont);

    let cont2 = document.createElement('div');
    cont2.classList.add('table-cont');
    let toggle2 = document.createElement('div');
    toggle2.classList.add('table-toggle');
    toggle2.innerHTML = '<i class="fa-solid fa-angle-down"></i><p>Button roundness</p>';
    let rows2Cont = document.createElement('div');
    rows2Cont.classList.add('rows-cont');
    let checkToggleCont1 = document.createElement('div');
    checkToggleCont1.classList.add('check-toggle-cont');
    cont2.appendChild(toggle2);
    rows2Cont.appendChild(generalTableRows[3]);
    checkToggleCont1.appendChild(generalTableRows[4]);
    rows2Cont.appendChild(checkToggleCont1);
    cont2.appendChild(rows2Cont);

    let cont3 = document.createElement('div');
    cont3.classList.add('table-cont');
    let toggle3 = document.createElement('div');
    toggle3.classList.add('table-toggle');
    toggle3.innerHTML = '<i class="fa-solid fa-angle-down"></i><p>Fonts</p>';
    let rows3Cont = document.createElement('div');
    rows3Cont.classList.add('rows-cont');
    let checkToggleCont2 = document.createElement('div');
    checkToggleCont2.classList.add('check-toggle-cont');
    cont3.appendChild(toggle3);
    rows3Cont.appendChild(generalTableRows[5]);
    checkToggleCont2.appendChild(generalTableRows[6]);
    checkToggleCont2.appendChild(generalTableRows[7]);
    checkToggleCont2.appendChild(generalTableRows[8]);
    rows3Cont.appendChild(checkToggleCont2);
    cont3.appendChild(rows3Cont);

    let cont4 = document.createElement('div');
    cont4.classList.add('table-cont');
    let customColorsCont = document.createElement('div');
    customColorsCont.classList.add('custom-colors-cont');
    let customColorsHeading = document.createElement('h4');
    customColorsHeading.innerText = 'Custom colors';
    let toggle4 = document.createElement('div');
    toggle4.classList.add('table-toggle');
    toggle4.innerHTML = '<i class="fa-solid fa-angle-down"></i><p>Background color</p>';
    let rows4Cont = document.createElement('div');
    rows4Cont.classList.add('rows-cont');
    rows4Cont.appendChild(generalTableRows[9]);
    customColorsCont.appendChild(customColorsHeading);
    cont4.appendChild(customColorsCont);
    cont4.appendChild(toggle4);
    cont4.appendChild(rows4Cont);

    let cont5 = document.createElement('div');
    cont5.classList.add('table-cont');
    let toggle5 = document.createElement('div');
    toggle5.classList.add('table-toggle');
    toggle5.innerHTML = '<i class="fa-solid fa-angle-down"></i><p>Elements color</p>';
    let rows5Cont = document.createElement('div');
    rows5Cont.classList.add('rows-cont');
    cont5.appendChild(toggle5);
    rows5Cont.appendChild(generalTableRows[10]);
    rows5Cont.appendChild(generalTableRows[11]);
    rows5Cont.appendChild(generalTableRows[12]);
    rows5Cont.appendChild(generalTableRows[13]);
    rows5Cont.appendChild(generalTableRows[14]);
    rows5Cont.appendChild(generalTableRows[15]);
    rows5Cont.appendChild(generalTableRows[16]);
    rows5Cont.appendChild(generalTableRows[17]);
    rows5Cont.appendChild(generalTableRows[18]);
    rows5Cont.appendChild(generalTableRows[19]);
    rows5Cont.appendChild(generalTableRows[20]);
    rows5Cont.appendChild(generalTableRows[21]);
    cont5.appendChild(rows5Cont);

    let cont6 = document.createElement('div');
    cont6.classList.add('table-cont');
    let toggle6 = document.createElement('div');
    toggle6.classList.add('table-toggle');
    toggle6.innerHTML = '<i class="fa-solid fa-angle-down"></i><p>Text color</p>';
    let rows6Cont = document.createElement('div');
    rows6Cont.classList.add('rows-cont');
    cont6.appendChild(toggle6);
    rows6Cont.appendChild(generalTableRows[22]);
    rows6Cont.appendChild(generalTableRows[23]);
    rows6Cont.appendChild(generalTableRows[24]);
    rows6Cont.appendChild(generalTableRows[25]);
    cont6.appendChild(rows6Cont);

    let resetStylesBtn = document.createElement('button');
    resetStylesBtn.classList.add('reset-styles-btn');
    resetStylesBtn.innerText = 'Restore to default';
    resetStylesBtn.addEventListener('click', function() {
        jQuery('.primary-color').val('#000000');
        document.querySelector('.primary-color')
            .parentElement
            .parentElement
            .parentElement
            .querySelector('.wp-color-result').style.backgroundColor = '#000000';
        jQuery('.primary-background-color').val('#ffffff');
        document.querySelector('.primary-background-color')
            .parentElement
            .parentElement
            .parentElement
            .querySelector('.wp-color-result').style.backgroundColor = '#ffffff';
        jQuery('.primary-text-color').val('#101828');
        document.querySelector('.primary-text-color')
            .parentElement
            .parentElement
            .parentElement
            .querySelector('.wp-color-result').style.backgroundColor = '#101828';
        jQuery('.secondary-background-color').val('#F9FAFBCC');
        document.querySelector('.secondary-background-color')
            .parentElement
            .parentElement
            .parentElement
            .querySelector('.wp-color-result').style.backgroundColor = '#F9FAFBCC';
        jQuery('.custom-accent-color').val('#0a8bfe');
        document.querySelector('.custom-accent-color')
            .parentElement
            .parentElement
            .parentElement
            .querySelector('.wp-color-result').style.backgroundColor = '#0a8bfe';
        jQuery('.primary-buttons-background-color').val('#101828');
        document.querySelector('.primary-buttons-background-color')
            .parentElement
            .parentElement
            .parentElement
            .querySelector('.wp-color-result').style.backgroundColor = '#101828';
        jQuery('.secondary-buttons-background-color').val('#ffffff');
        document.querySelector('.secondary-buttons-background-color')
            .parentElement
            .parentElement
            .parentElement
            .querySelector('.wp-color-result').style.backgroundColor = '#ffffff';
        jQuery('.custom-error-color').val('#F04438');
        document.querySelector('.custom-error-color')
            .parentElement
            .parentElement
            .parentElement
            .querySelector('.wp-color-result').style.backgroundColor = '#F04438';
        jQuery('.input-field-background-color').val('#ffffff');
        document.querySelector('.input-field-background-color')
            .parentElement
            .parentElement
            .parentElement
            .querySelector('.wp-color-result').style.backgroundColor = '#ffffff';
        jQuery('.input-field-text-color').val('#344054');
        document.querySelector('.input-field-text-color')
            .parentElement
            .parentElement
            .parentElement
            .querySelector('.wp-color-result').style.backgroundColor = '#344054';
        jQuery('.secondary-text-color').val('#344054');
        document.querySelector('.secondary-text-color')
            .parentElement
            .parentElement
            .parentElement
            .querySelector('.wp-color-result').style.backgroundColor = '#344054';
        jQuery('.tertiary-text-color').val('#667085');
        document.querySelector('.tertiary-text-color')
            .parentElement
            .parentElement
            .parentElement
            .querySelector('.wp-color-result').style.backgroundColor = '#667085';
        jQuery('.primary-buttons-text-color').val('#ffffff');
        document.querySelector('.primary-buttons-text-color')
            .parentElement
            .parentElement
            .parentElement
            .querySelector('.wp-color-result').style.backgroundColor = '#ffffff';
        jQuery('.secondary-buttons-text-color').val('#101828');
        document.querySelector('.secondary-buttons-text-color')
            .parentElement
            .parentElement
            .parentElement
            .querySelector('.wp-color-result').style.backgroundColor = '#101828';
        jQuery('.border-color').val('#EAECF0');
        document.querySelector('.border-color')
            .parentElement
            .parentElement
            .parentElement
            .querySelector('.wp-color-result').style.backgroundColor = '#EAECF0';
        jQuery('.input-outline-color').val('#D0D5DD');
        document.querySelector('.input-outline-color')
            .parentElement
            .parentElement
            .parentElement
            .querySelector('.wp-color-result').style.backgroundColor = '#D0D5DD';
        jQuery('.quantity-circle-background-color').val('#667085 ');
        document.querySelector('.quantity-circle-background-color')
            .parentElement
            .parentElement
            .parentElement
            .querySelector('.wp-color-result').style.backgroundColor = '#667085';
        jQuery('.quantity-circle-color').val('#FFFFFF');
        document.querySelector('.quantity-circle-color')
            .parentElement
            .parentElement
            .parentElement
            .querySelector('.wp-color-result').style.backgroundColor = '#FFFFFF';
        jQuery('.minicart-message-background-color').val('#f9fafbcc');
        document.querySelector('.minicart-message-background-color')
            .parentElement
            .parentElement
            .parentElement
            .querySelector('.wp-color-result').style.backgroundColor = '#f9fafbcc';
        jQuery('.minicart-message-color').val('#667085');
        document.querySelector('.minicart-message-color')
            .parentElement
            .parentElement
            .parentElement
            .querySelector('.wp-color-result').style.backgroundColor = '#667085';

      //  document.querySelector('input#ic_design_corner_radius').checked = false;
      //  document.querySelector('input#ic_design_typography').checked = false;
        document.querySelector('input.corner-radius-px').value = '8px';
        document.querySelector('.ic-font option[value="Inter"]').selected = true;
        document.querySelector('.ic-font-weight option[value="3"]').selected = true;
        document.querySelector('.ic-font-subset option[value="0"]').selected = true;

        if (document.querySelector('input#ic_design_corner_radius').checked === false){
            document.querySelector('input#ic_design_corner_radius').click();
        }
        if (document.querySelector('input#ic_design_typography').checked === false){
            document.querySelector('input#ic_design_typography').click();
        }

    });

    let generalTbody = generalTable.querySelector('tbody');
    generalTbody.appendChild(cont1);
    generalTbody.appendChild(cont2);
    generalTbody.appendChild(cont3);
    generalTbody.appendChild(cont4);
    generalTbody.appendChild(cont5);
    generalTbody.appendChild(cont6);
    generalTbody.appendChild(resetStylesBtn);

    toggle1.addEventListener('click', function () {
        rows1Cont.classList.toggle('active');
        this.classList.toggle('active');
        if (rows1Cont.style.maxHeight) {
            rows1Cont.style.maxHeight = null;
        } else {
            rows1Cont.style.maxHeight = rows1Cont.scrollHeight + 'px';
        }
    });

    toggle2.addEventListener('click', function () {
        rows2Cont.classList.toggle('active');
        this.classList.toggle('active');
        if (rows2Cont.style.maxHeight) {
            rows2Cont.style.maxHeight = null;
        } else {
            rows2Cont.style.maxHeight = rows2Cont.scrollHeight + 'px';
        }
    });

    toggle3.addEventListener('click', function () {
        rows3Cont.classList.toggle('active');
        this.classList.toggle('active');
        if (rows3Cont.style.maxHeight) {
            rows3Cont.style.maxHeight = null;
        } else {
            rows3Cont.style.maxHeight = rows3Cont.scrollHeight + 'px';
        }
    });

    toggle4.addEventListener('click', function () {
        rows4Cont.classList.toggle('active');
        this.classList.toggle('active');
        if (rows4Cont.style.maxHeight) {
            rows4Cont.style.maxHeight = null;
        } else {
            rows4Cont.style.maxHeight = rows4Cont.scrollHeight + 'px';
        }
    });

    toggle5.addEventListener('click', function () {
        rows5Cont.classList.toggle('active');
        this.classList.toggle('active');
        if (rows5Cont.style.maxHeight) {
            rows5Cont.style.maxHeight = null;
        } else {
            rows5Cont.style.maxHeight = rows5Cont.scrollHeight + 'px';
        }
    });

    toggle6.addEventListener('click', function () {
        rows6Cont.classList.toggle('active');
        this.classList.toggle('active');
        if (rows6Cont.style.maxHeight) {
            rows6Cont.style.maxHeight = null;
        } else {
            rows6Cont.style.maxHeight = rows6Cont.scrollHeight + 'px';
        }
    });

    let cornerRadiusInput = document.querySelector('input#ic_design_corner_radius');
    if (!cornerRadiusInput.checked) {
        checkToggleCont1.style.maxHeight = checkToggleCont1.scrollHeight + 'px';
    }
    cornerRadiusInput.addEventListener('change', function () {
        checkToggleCont1.classList.toggle('active');
        if (checkToggleCont1.style.maxHeight) {
            checkToggleCont1.style.maxHeight = null;
        } else {
            checkToggleCont1.style.maxHeight = checkToggleCont1.scrollHeight + 'px';
            rows2Cont.style.maxHeight = rows2Cont.scrollHeight + checkToggleCont1.scrollHeight + 'px';
        }
    });

    let typographyInput = document.querySelector('input#ic_design_typography');
    if (!typographyInput.checked) {
        checkToggleCont2.style.maxHeight = checkToggleCont2.scrollHeight + 'px';
    }
    typographyInput.addEventListener('change', function () {
        checkToggleCont2.classList.toggle('active');
        if (checkToggleCont2.style.maxHeight) {
            checkToggleCont2.style.maxHeight = null;
        } else {
            checkToggleCont2.style.maxHeight = checkToggleCont2.scrollHeight + 'px';
            rows3Cont.style.maxHeight = rows3Cont.scrollHeight + checkToggleCont2.scrollHeight + 'px';
        }
    });

}

function addCheckoutContainers() {
    let checkoutTableRows = checkoutTable.querySelectorAll('tr');
    checkoutTableRows[0].classList.add('ic-templates-row');
    document.querySelector('.ic-templates-row th').innerHTML += '<span> - Choose a checkout theme</span>';

    let templatesCont = document.createElement('div');
    templatesCont.classList.add('ic-checkout-templates-cont');
    let layout1Box = document.createElement('div');
    layout1Box.classList.add('design-box', 'ic-cc-layout-box' , 'ic-cc-layout-box-layout1');
    let layout2Box = document.createElement('div');
    layout2Box.classList.add('design-box', 'ic-cc-layout-box' , 'ic-cc-layout-box-layout2');
    let layout1Heading = document.createElement('div');
    layout1Heading.classList.add('design-box-heading');
    let layout2Heading = document.createElement('div');
    layout2Heading.classList.add('design-box-heading');
    let layout1Cont = document.createElement('div');
    layout1Cont.classList.add('design-box-inner');
    layout1Cont.setAttribute('style', 'background-image: url(\'' +  urls.plugin_url + '/assets/images/Checkout v1.png' + '\')');
    let layout2Cont = document.createElement('div');
    layout2Cont.classList.add('design-box-inner');
    layout2Cont.setAttribute('style', 'background-image: url(\'' +  urls.plugin_url + '/assets/images/Checkout v2.png' + '\')');

    // layout2Heading.innerHTML = '<p>Checkout v2</p>';

    let options = document.querySelectorAll('.ic-cc-layout-select option');
    layout1Heading.innerHTML = '<div class="design-box-heading-left"><p>Checkout v1</p><span class="ic-layout-active">Active</span></div><div class="design-box-heading-left"><div class="design-box-heading-left-image"><img data-bs-toggle="modal" data-bs-target="#previewCheckout1Modal" src="' + urls.plugin_url + '/assets/images/review.svg" alt="review checkout" width="12"></div><button class="layout-activate layout-activate-one">Activate</button></div>';
    layout2Heading.innerHTML = '<div class="design-box-heading-left"><p>Checkout v2</p><span class="ic-layout-active">Active</span></div><div class="design-box-heading-right"><div class="design-box-heading-right-image"><img data-bs-toggle="modal" data-bs-target="#previewCheckout2Modal" src="' + urls.plugin_url + '/assets/images/review.svg" alt="review checkout" width="12"></div><button class="layout-activate layout-activate-two">Activate</button></div>';
    let layout1Active = layout1Heading.querySelector('.ic-layout-active');
    let layout1Activate = layout1Heading.querySelector('button');
    let layout2Active = layout2Heading.querySelector('.ic-layout-active');
    let layout2Activate = layout2Heading.querySelector('button');
    // let layout1ActiveBox =  document.querySelector('.ic-checkout-templates-cont .ic-cc-layout-box-layout1');
    // let layout2ActiveBox =  document.querySelector('.ic-checkout-templates-cont .ic-cc-layout-box-layout2');

    if (options[0].selected) {
        layout1Active.classList.add('active')
        layout2Active.classList.remove('active');
        layout1Activate.classList.remove('active');
        layout2Activate.classList.add('active');
        // layout1ActiveBox.classList.add('active');
        // layout2ActiveBox.classList.remove('active');
    } else {
        layout1Active.classList.remove('active')
        layout2Active.classList.add('active');
        layout1Activate.classList.add('active');
        layout2Activate.classList.remove('active');
        // layout2ActiveBox.classList.add('active');
        // layout1ActiveBox.classList.remove('active');
    }

    layout1Activate.addEventListener('click', function () {
        options[0].selected = true;
        options[1].selected = false;
        layout1Active.classList.add('active')
        layout2Active.classList.remove('active');
        layout1Activate.classList.remove('active');
        layout2Activate.classList.add('active');
    });

    layout2Activate.addEventListener('click', function () {
        options[1].selected = true;
        options[0].selected = false;
        layout1Active.classList.remove('active')
        layout2Active.classList.add('active');
        layout1Activate.classList.add('active');
        layout2Activate.classList.remove('active');
    });

    layout1Box.appendChild(layout1Heading);
    layout2Box.appendChild(layout2Heading);
    layout1Box.appendChild(layout1Cont);
    layout2Box.appendChild(layout2Cont);

    templatesCont.appendChild(layout1Box);
    templatesCont.appendChild(layout2Box);

    let logoCont = document.createElement('div');
    logoCont.classList.add('design-box', 'logo-cont');
    let logoHeading = document.createElement('div');
    logoHeading.classList.add('design-box-heading');
    logoHeading.innerHTML = '<p>Logo</p>';
    logoCont.appendChild(logoHeading);
    logoCont.appendChild(checkoutTableRows[1]);
    logoCont.appendChild(checkoutTableRows[2]);
    logoCont.appendChild(checkoutTableRows[3]);

    let cont1 = document.createElement('div');
    cont1.classList.add('design-box');
    let contHeading1 = document.createElement('div');
    contHeading1.classList.add('design-box-heading');
    contHeading1.innerHTML = '<p>Policy</p>';
    cont1.appendChild(contHeading1);
    cont1.appendChild(checkoutTableRows[4]);
    cont1.appendChild(checkoutTableRows[5]);
    cont1.appendChild(checkoutTableRows[6]);

    let cont2 = document.createElement('div');
    cont2.classList.add('design-box');
    cont2.classList.add('checkmarks');
    let contHeading2 = document.createElement('div');
    contHeading2.classList.add('design-box-heading');
    contHeading2.innerHTML = '<p>Checkout fields</p>';
    cont2.appendChild(contHeading2);
    cont2.appendChild(checkoutTableRows[7]);
    cont2.appendChild(checkoutTableRows[8]);
    cont2.appendChild(checkoutTableRows[9]);
    cont2.appendChild(checkoutTableRows[10]);
    cont2.appendChild(checkoutTableRows[11]);
    cont2.appendChild(checkoutTableRows[12]);
    cont2.appendChild(checkoutTableRows[13]);
    cont2.appendChild(checkoutTableRows[14]);

    let cont3 = document.createElement('div');
    cont3.classList.add('design-box');
    let contHeading3 = document.createElement('div');
    contHeading3.classList.add('design-box-heading');
    contHeading3.innerHTML = '<p>Sections</p>';
    let addSections = document.createElement('div');
    addSections.innerHTML = '<div class="design-add-sections"><div>Add Sections</div><button type="button" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#sectionsModal">Edit Sections</button></div>';
    // addSections.innerHTML += '<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#sectionsModal">Add Sections</button></div>';
    let sectionsList = document.createElement('div');
    sectionsList.classList.add('sections-list');
    addSections.appendChild(sectionsList);
    let sections = getActiveSections();
    let sectionsModalBody = document.querySelector('#sectionsModal .modal-body');
    if(sections.length > 0) {
        sections.forEach((section) => {
            sectionsList.innerHTML += '<div class="single-section design-single-section">' +
                '<div class="single-section-image-holder">' +
                '<img src="' + section.section_icon + '" />' +
                '</div>' +
                '<div class="single-section-title">' + section.section_title + '</div>' +
                '</div>';
            sectionsModalBody.innerHTML += '<div class="single-section">' +
                '<div class="single-section-product-section">' +
                '<div class="single-section-product-left-section">' +
                '<div class="single-section-image-holder">' +
                '<img src="' + section.section_icon + '" />' +
                '</div>' +
                '<div class="single-section-title">' + section.section_title + '</div>' +
                '</div>' +
                '<div class="single-section-product-right-section">' +
                '<i class="fa-solid fa-angle-up"></i>' +
                '<img src="' + urls.plugin_url + '/assets/images/trash-can.png' + '" widtth="32" />' +
                '</div>' +
                '</div>' +
                '<div class="single-section-overview">' +
                '<div class="form-group">' +
                '<label for="section-title">Section Title</label>' +
                '<input type="text" id="section-title" name="section-title" class="section-title" value="' + section.section_title + '">' +
                '</div>' +
                '<div class="form-group">' +
                '<label for="section-icon">Section Icon</label>' +
                '<input type="text" id="section-icon" name="section-icon" class="section-icon" value="' + section.section_icon + '">' +
                '</div>' +
                '<div class="form-group">' +
                '<label for="section-text">Section Text</label>' +
                '<textarea name="section-text" id="section-text" class="section-text" cols="30" rows="1" value="' + section.section_text + '">' + section.section_text + '</textarea>' +
                '</div>' +
                '</div>';
        });
    }
    sectionsModalBody.innerHTML += '<div class="new-section">\n' +
        '                            <div class="form-group">\n' +
        '                                <label for="section-title">Section Title</label>\n' +
        '                                <input type="text" id="section-title" name="section-title" class="section-title">\n' +
        '                            </div>\n' +
        '                            <div class="form-group">\n' +
        '                                <label for="section-icon">Section Icon</label>\n' +
        '                                <input type="text" id="section-icon" name="section-icon" class="section-icon">\n' +
        '                            </div>\n' +
        '                            <div class="form-group">\n' +
        '                                <label for="section-text">Section Text</label>\n' +
        '                                <textarea name="section-text" id="section-text" cols="30" rows="1" class="section-text"></textarea>\n' +
        '                            </div>\n' +
        '                            <div class="form-group design-add-new-section">\n' +
        '                            <div>Add action</div>\n' +
        '                            <a class="add-section">Add section</a>\n' +
        '                            </div>\n' +
        '                        </div>';

    cont3.appendChild(contHeading3);
    cont3.appendChild(addSections);

    let cont4 = document.createElement('div');
    cont4.classList.add('design-box', 'custom-text-box', 'design-box-language');
    let contHeading4 = document.createElement('div');
    contHeading4.classList.add('design-box-heading');
    contHeading4.innerHTML = '<p>Checkout language</p>';
    cont4.appendChild(contHeading4);
    let translationsRow = document.createElement('tr');
    translationsRow.innerHTML = '<th><div class="ic-translations-design-box">Translations <div class="ic-info-box-design ic-translation-info-box">\n' +
        '                            <svg class="ic-info-button-design-checkout-translation" width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">\n' +
        '                                 <g clip-path="url(#clip0_710_19499)">\n' +
        '                                     <path d="M4.545 4.5C4.66255 4.16583 4.89458 3.88405 5.19998 3.70457C5.50538 3.52508 5.86445 3.45947 6.21359 3.51936C6.56273 3.57924 6.87941 3.76076 7.10754 4.03176C7.33567 4.30277 7.46053 4.64576 7.46 5C7.46 6 5.96 6.5 5.96 6.5M6 8.5H6.005M11 6C11 8.76142 8.76142 11 6 11C3.23858 11 1 8.76142 1 6C1 3.23858 3.23858 1 6 1C8.76142 1 11 3.23858 11 6Z" stroke="#98A2B3" stroke-linecap="round" stroke-linejoin="round"/>\n' +
        '                                 </g>\n' +
        '                                 <defs>\n' +
        '                                      <clipPath id="clip0_710_19499">\n' +
        '                                             <rect width="12" height="12" fill="white"/>\n' +
        '                                      </clipPath>\n' +
        '                                 </defs>\n' +
        '                            </svg>\n' +
        '                            <div class="ic-info-text-design-checkout-translation">\n' +
        '                            Here you can translate your checkout page fields and text to adapt it to your language.\n' +
        '                            </div></div></div></th><td><a id="translationCheckoutPage" href="' + urls.translations_url + '">Configure translations</a></td>';
    cont4.appendChild(translationsRow);


    let checkoutTbody = checkoutTable.querySelector('tbody');
    checkoutTbody.appendChild(templatesCont);
    checkoutTbody.appendChild(logoCont);
    checkoutTbody.appendChild(cont1);
    checkoutTbody.appendChild(cont2);
    checkoutTbody.appendChild(cont3);
    checkoutTbody.appendChild(cont4);

    let sectionsHtml = document.querySelectorAll('.modal-body .single-section');
    sectionsHtml.forEach((section) => {
        let arrow = section.querySelector('.single-section-product-right-section i');
        arrow.addEventListener('click', function () {
            let overview = section.querySelector('.single-section-overview');
            arrow.classList.toggle('active');
            if (overview.style.maxHeight) {
                overview.style.maxHeight = null;
            } else {
                overview.style.maxHeight = overview.scrollHeight + 'px';
            }
        });

        let titleInput = section.querySelector('input#section-title');
        titleInput.addEventListener('input', function () {
            let title = section.querySelector('.single-section-title');
            title.innerHTML = titleInput.value;
        });

        let iconInput = section.querySelector('input#section-icon');
        iconInput.addEventListener('input', function () {
            let icon = section.querySelector('.single-section-image-holder img');
            icon.src = iconInput.value;
        });

        let deleteBtn = section.querySelector('.single-section-product-right-section img');
        deleteBtn.addEventListener('click', function () {
            section.parentElement.removeChild(section);
        });
    });

    let addSection = document.querySelector('#sectionsModal .add-section');
    addSection.addEventListener('click', function () {
        let newSectionForm = document.querySelector('#sectionsModal .new-section');
        let title = newSectionForm.querySelector('#section-title').value;
        let icon = newSectionForm.querySelector('#section-icon').value;
        let text = newSectionForm.querySelector('#section-text').value;
        newSectionForm.insertAdjacentHTML('beforebegin', '<div class="single-section single-section-new">' +
            '<div class="single-section-product-section">' +
            '<div class="single-section-product-left-section">' +
            '<div class="single-section-image-holder">' +
            '<img src="' + icon + '" />' +
            '</div>' +
            '<div class="single-section-title">' + title + '</div>' +
            '</div>' +
            '<div class="single-section-product-right-section">' +
            '<i class="fa-solid fa-angle-up"></i>' +
            '<img src="' + urls.plugin_url + '/assets/images/trash-can.png' + '" widtth="32" />' +
            '</div>' +
            '</div>' +
            '<div class="single-section-overview">' +
            '<div class="form-group">' +
            '<label for="section-title">Section Title</label>' +
            '<input type="text" id="section-title" name="section-title" class="section-title" value="' + title + '">' +
            '</div>' +
            '<div class="form-group">' +
            '<label for="section-icon">Section Icon</label>' +
            '<input type="text" id="section-icon" name="section-icon" class="section-icon" value="' + icon + '">' +
            '</div>' +
            '<div class="form-group">' +
            '<label for="section-text">Section Text</label>' +
            '<textarea name="section-text" id="section-text" class="section-text" cols="30" rows="1" value="' + text + '">' + text + '</textarea>' +
            '</div>' +
            '</div>');

        let newSections = document.querySelectorAll('#sectionsModal .single-section-new');
        let newSection = newSections[newSections.length - 1];

        let arrow = newSection.querySelector('.single-section-product-right-section i');
        arrow.addEventListener('click', function () {
            let overview = newSection.querySelector('.single-section-overview');
            arrow.classList.toggle('active');
            if (overview.style.maxHeight) {
                overview.style.maxHeight = null;
            } else {
                overview.style.maxHeight = overview.scrollHeight + 'px';
            }
        });

        let titleInput = newSection.querySelector('input#section-title');
        titleInput.addEventListener('input', function () {
            let title = newSection.querySelector('.single-section-title');
            title.innerHTML = titleInput.value;
        });

        let iconInput = newSection.querySelector('input#section-icon');
        iconInput.addEventListener('input', function () {
            let icon = newSection.querySelector('.single-section-image-holder img');
            icon.src = iconInput.value;
        });

        let deleteBtn = newSection.querySelector('.single-section-product-right-section img');
        deleteBtn.addEventListener('click', function () {
            newSection.parentElement.removeChild(newSection);
        });
    });

    let showPhoneNumberFieldInput = document.querySelector('input#ic_checkout_show_phone_number_field');
    let requirePhoneNumberFieldInput = document.querySelector('input#ic_checkout_phone');

    requirePhoneNumberFieldInput.addEventListener('click', function() {
       if(this.checked) {
           showPhoneNumberFieldInput.checked = true;
       }
    });

    showPhoneNumberFieldInput.addEventListener('click', function() {
        if(!this.checked) {
            requirePhoneNumberFieldInput.checked = false;
        }
    });

    let checkoutPageTranslation = document.getElementById('translationCheckoutPage');
    if (checkoutPageTranslation){
        checkoutPageTranslation.addEventListener('click',function(){
            localStorage.setItem('translationPage','c');
        });
    }

}

function addCustomProductsField() {
    let recType = document.querySelector('#recommendations-type');
    let cont = recType.parentElement.parentElement.parentElement;
    let customProductsCont = document.createElement('div');
    customProductsCont.id = 'custom-products';
    customProductsCont.innerHTML = `<div class="custom-products-wrapper"></div>
                                    <button type="button" class="btn btn-primary upsell-edit-triggers-add-btn" data-bs-toggle="modal" data-bs-target="#customProductsModal">
                                        Add products
                                    </button>`;

    recType.addEventListener('change', function() {
        if(recType.value == '2') {
            customProductsCont.classList.add('active');
        } else {
            customProductsCont.classList.remove('active');
        }
    });
    cont.appendChild(customProductsCont);
}

function addMiniCartContainers() {
    let miniCartTableRows = miniCartTable.querySelectorAll('tr');

    let cont = document.createElement('div');
    cont.classList.add('design-box', 'enable-box');
    let contHeading = document.createElement('div');
    contHeading.classList.add('design-box-heading');
    contHeading.innerHTML = '<p>Enabled</p>';
    cont.appendChild(contHeading);
    cont.appendChild(miniCartTableRows[0]);

    let contFloating = document.createElement('div');
    contFloating.classList.add('design-box', 'enable-box');
    let contFloatingHeading = document.createElement('div');
    contFloatingHeading.classList.add('design-box-heading');
    contFloatingHeading.innerHTML = '<p>Floating Enabled</p>';
    contFloating.appendChild(contFloatingHeading);
    contFloating.appendChild(miniCartTableRows[1]);

    let contProgressbar = document.createElement('div');
    contProgressbar.classList.add('design-box', 'progress-bar-enable-box');
    let contProgressbarHeading = document.createElement('div');
    contProgressbarHeading.classList.add('design-box-heading');
    contProgressbarHeading.innerHTML = '<p>Cart Progressbar</p>';
    contProgressbar.appendChild(contProgressbarHeading);
    contProgressbar.appendChild(miniCartTableRows[12]);
    contProgressbar.appendChild(miniCartTableRows[13]);

    let cont1 = document.createElement('div');
    cont1.classList.add('design-box', 'messages-box');
    let contHeading1 = document.createElement('div');
    contHeading1.classList.add('design-box-heading');
    contHeading1.innerHTML = '<p>Messages</p>';
    cont1.appendChild(contHeading1);
    cont1.appendChild(miniCartTableRows[2]);
    cont1.appendChild(miniCartTableRows[3]);
    cont1.appendChild(miniCartTableRows[4]);

    let cont5 = document.createElement('div');
    cont5.classList.add('design-box', 'messages-box');
    let contHeading5 = document.createElement('div');
    contHeading5.classList.add('design-box-heading');
    contHeading5.innerHTML = '<p>Coupons</p>';
    cont5.appendChild(contHeading5);
    cont5.appendChild(miniCartTableRows[5]);

    let cont2 = document.createElement('div');
    cont2.classList.add('design-box', 'recommendations-box');
    let contHeading2 = document.createElement('div');
    contHeading2.classList.add('design-box-heading');
    contHeading2.innerHTML = '<p>Recommendations</p>';
    cont2.appendChild(contHeading2);
    cont2.appendChild(miniCartTableRows[6]);
    cont2.appendChild(miniCartTableRows[7]);
    cont2.appendChild(miniCartTableRows[8]);

    let cont3 = document.createElement('div');
    cont3.classList.add('design-box', 'buttons-box');
    let contHeading3 = document.createElement('div');
    contHeading3.classList.add('design-box-heading');
    contHeading3.innerHTML = '<p>Buttons</p>';
    cont3.appendChild(contHeading3);
    cont3.appendChild(miniCartTableRows[9]);
    cont3.appendChild(miniCartTableRows[10]);
    cont3.appendChild(miniCartTableRows[11]);

    let cont4 = document.createElement('div');
    cont4.classList.add('design-box', 'custom-text-box', 'design-box-language');
    let contHeading4 = document.createElement('div');
    contHeading4.classList.add('design-box-heading');
    contHeading4.innerHTML = '<p>Checkout language</p>';
    cont4.appendChild(contHeading4);
    let translationsRow = document.createElement('tr');
    translationsRow.innerHTML = '<th><div class="ic-translations-design-box">Translations <div class="ic-info-box-design ic-translation-info-box">\n' +
        '                            <svg class="ic-info-button-design-minicart-translation" width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">\n' +
        '                                 <g clip-path="url(#clip0_710_19499)">\n' +
        '                                     <path d="M4.545 4.5C4.66255 4.16583 4.89458 3.88405 5.19998 3.70457C5.50538 3.52508 5.86445 3.45947 6.21359 3.51936C6.56273 3.57924 6.87941 3.76076 7.10754 4.03176C7.33567 4.30277 7.46053 4.64576 7.46 5C7.46 6 5.96 6.5 5.96 6.5M6 8.5H6.005M11 6C11 8.76142 8.76142 11 6 11C3.23858 11 1 8.76142 1 6C1 3.23858 3.23858 1 6 1C8.76142 1 11 3.23858 11 6Z" stroke="#98A2B3" stroke-linecap="round" stroke-linejoin="round"/>\n' +
        '                                 </g>\n' +
        '                                 <defs>\n' +
        '                                      <clipPath id="clip0_710_19499">\n' +
        '                                             <rect width="12" height="12" fill="white"/>\n' +
        '                                      </clipPath>\n' +
        '                                 </defs>\n' +
        '                            </svg>\n' +
        '                            <div class="ic-info-text-design-minicart-translation">\n' +
        '                            Here you can translate your mini cart fields and text to adapt it to your language.\n' +
        '                            </div></div></div></th><td><a id="translationMiniCartPage" href="' + urls.translations_url + '">Configure translations</a></td>';
    cont4.appendChild(translationsRow);

    let miniCartTbody = miniCartTable.querySelector('tbody');
    miniCartTbody.appendChild(cont);
    miniCartTbody.appendChild(contFloating);
    miniCartTbody.appendChild(cont1);
    miniCartTbody.appendChild(cont5);
    miniCartTbody.appendChild(cont2);
    miniCartTbody.appendChild(cont3);
    miniCartTbody.appendChild(cont4);
    miniCartTbody.appendChild(contProgressbar);

    addCustomProductsField();

    let miniCartPageTranslation = document.getElementById('translationMiniCartPage');
    if (miniCartPageTranslation){
        miniCartPageTranslation.addEventListener('click',function(){
            localStorage.setItem('translationPage','mc');
        });
    }
}

function addTyContainers() {
    let tyTableRows = tyTable.querySelectorAll('tr');

    let cont1 = document.createElement('div');
    cont1.classList.add('design-box', 'messages-box');
    let contHeading1 = document.createElement('div');
    contHeading1.classList.add('design-box-heading');
    contHeading1.innerHTML = '<p>Thank you page</p>';
    cont1.appendChild(contHeading1);
    cont1.appendChild(tyTableRows[0]);
    cont1.appendChild(tyTableRows[1]);
    cont1.appendChild(tyTableRows[2]);
    cont1.appendChild(tyTableRows[3]);
    //cont1.appendChild(tyTableRows[4]);
    tyTableRows[0].classList.add('section-cont-ty-row2')
    tyTableRows[1].classList.add('section-cont-ty-row3')
    tyTableRows[2].classList.add('section-cont-ty-row4')
    tyTableRows[3].classList.add('section-cont-ty-row5')
    //tyTableRows[4].classList.add('section-cont-ty-row5')

    let cont2 = document.createElement('div');
    cont2.classList.add('design-box', 'custom-text-box', 'design-box-language');
    let contHeading4 = document.createElement('div');
    contHeading4.classList.add('design-box-heading');
    contHeading4.innerHTML = '<p>Checkout language</p>';
    cont2.appendChild(contHeading4);
    let translationsRow = document.createElement('tr');
    translationsRow.innerHTML = '<th><div class="ic-translations-design-box">Translations <div class="ic-info-box-design ic-translation-info-box">\n' +
        '                            <svg class="ic-info-button-design-ty-translation" width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">\n' +
        '                                 <g clip-path="url(#clip0_710_19499)">\n' +
        '                                     <path d="M4.545 4.5C4.66255 4.16583 4.89458 3.88405 5.19998 3.70457C5.50538 3.52508 5.86445 3.45947 6.21359 3.51936C6.56273 3.57924 6.87941 3.76076 7.10754 4.03176C7.33567 4.30277 7.46053 4.64576 7.46 5C7.46 6 5.96 6.5 5.96 6.5M6 8.5H6.005M11 6C11 8.76142 8.76142 11 6 11C3.23858 11 1 8.76142 1 6C1 3.23858 3.23858 1 6 1C8.76142 1 11 3.23858 11 6Z" stroke="#98A2B3" stroke-linecap="round" stroke-linejoin="round"/>\n' +
        '                                 </g>\n' +
        '                                 <defs>\n' +
        '                                      <clipPath id="clip0_710_19499">\n' +
        '                                             <rect width="12" height="12" fill="white"/>\n' +
        '                                      </clipPath>\n' +
        '                                 </defs>\n' +
        '                            </svg>\n' +
        '                            <div class="ic-info-text-design-ty-translation">\n' +
        '                            Here you can translate your “Thank you” page fields and text to adapt it to your language.\n' +
        '                            </div></div></div></th><td><a id="translationPageThankYou" href="' + urls.translations_url + '">Configure translations</a></td>';
    cont2.appendChild(translationsRow);

    let tyTbody = tyTable.querySelector('tbody');
    tyTbody.appendChild(cont1);
    tyTbody.appendChild(cont2);

    let innerLoader = document.querySelector('#main-loader .main-loader-inner-line');
    innerLoader.style.width = '100%';
    setTimeout(function() {
        document.querySelector('#main-loader').classList.remove('active');
    }, 800);
    clearInterval(loaderInterval);

    let thankYouTranslation = document.getElementById('translationPageThankYou');
    if (thankYouTranslation){
        thankYouTranslation.addEventListener('click',function(){
            localStorage.setItem('translationPage','ty');
        });
    }
}

//general navigation logic having desingNavs and other tabs
function navigationLogic(designNavsClass, tabsClass, navBorderClass) {
    let designNavs = document.querySelectorAll(designNavsClass + ' span');
    let tabs = document.querySelectorAll(tabsClass);
    designNavs.forEach((nav, i) => {
        nav.addEventListener('click', function () {
            let activeTab = document.querySelector(tabsClass + '.active');
            if (activeTab) {
                activeTab.classList.remove('active');
            }
            tabs[i].classList.add('active');

            let activeNav = document.querySelector(designNavsClass + ' span.active');
            if (activeNav) {
                activeNav.classList.remove('active');
            }
            nav.classList.add('active');

            let navBorder = document.querySelector(navBorderClass);
            if (i == 0) {
                navBorder.style.left = '0px';
                navBorder.style.width = '69px'
            } else if (i == 1) {
                navBorder.style.left = '105px';
                navBorder.style.width = '69px'
            } else {
                navBorder.style.left = '212px';
                navBorder.style.width = '109px'
            }
        });
    });
}
//calling a function for design page
navigationLogic('.design-nav',
                '.section-cont',
                '.nav-border');

//calling a function for preview modal
navigationLogic('.design-modal-nav',
                '.section-modal-cont',
                '.nav-modal-border');

jQuery('#cc-form').submit(function (e) {
    e.preventDefault();
    jQuery(this).ajaxSubmit({
        success: function () {
            swal({
                title: "Success 🎉",
                text: "Changes have been successfully saved!",
            });
        },
    });
    let sections = [];
    let sectionsListModal = document.querySelectorAll('#sectionsModal .single-section');
    sectionsListModal.forEach((section) => {
        let singleSection = {
            'section_title': section.querySelector('input#section-title').value,
            'section_icon': section.querySelector('input#section-icon').value,
            'section_text': section.querySelector('textarea#section-text').value
        };
        sections.push(singleSection);
    });
    let newSections = document.querySelectorAll('#sectionsModal .new-section');
    newSections.forEach((section) => {
        let singleSection = {
            'section_title': section.querySelector('input#section-title').value,
            'section_icon': section.querySelector('input#section-icon').value,
            'section_text': section.querySelector('textarea#section-text').value
        };
        if (singleSection.section_title != '' && singleSection.section_image != '') {
            sections.push(singleSection);
        }
    });
    jQuery.ajax({
        async: false,
        url: urls.ajax_url,
        type: 'post',
        data: {
            action: 'ic_update_active_sections',
            nonce: nonces.update_active_sections,
            sections: sections
        },
        success: function (response) {
        }
    });

    jQuery.ajax({
        async: false,
        url: urls.ajax_url,
        type: 'post',
        data: {
            action: 'ic_update_custom_mini_cart_products',
            nonce: nonces.update_custom_mini_cart_products,
            custom_products: customProducts
        },
        success: function (response) {
        }
    });
});

function getActiveSections() {
    let sections;
    jQuery.ajax({
        async: false,
        url: urls.ajax_url,
        type: 'get',
        data: {
            action: 'ic_get_active_sections',
            nonce: nonces.get_active_sections
        },
        success: function (response) {
            sections = JSON.parse(response);
        }
    });
    return sections;
}

function getCustomProducts() {
    let products;
    jQuery.ajax({
        async: false,
        url: urls.ajax_url,
        type: 'get',
        data: {
            action: 'ic_get_custom_mini_cart_products',
            nonce: nonces.get_custom_mini_cart_products
        },
        success: function (response) {
            products = JSON.parse(response);
        }
    });
    return products;
}

saveSections.addEventListener('click', function () {
    let singleModalSections = document.querySelectorAll('.modal-body .single-section .single-section-overview');
    let sectionsList = document.querySelector('.sections-list');
    let sectionsArray = [];
    singleModalSections.forEach((section) => {
        let singleSection = {
            section_title: section.querySelector('.section-title').value,
            section_image: section.querySelector('.section-icon').value,
            section_text: section.querySelector('.section-text').value
        };
        sectionsArray.push(singleSection);
    });

    // let newSections = document.querySelectorAll('.modal-body .new-section')
    // newSections.forEach((section) => {
    //     let singleSection = {
    //         section_title: section.querySelector('.section-title').value,
    //         section_image: section.querySelector('.section-icon').value,
    //         section_text: section.querySelector('.section-text').value
    //     };
    //     if(singleSection.section_title != '' && singleSection.section_image != '') {
    //         sectionsArray.push(singleSection);
    //         console.log(singleSection);
    //     }
    // });

    sectionsList.innerHTML = '';
    sectionsArray.forEach((section) => {
        sectionsList.innerHTML += '<div class="single-section design-single-section">' +
            '<div class="single-section-image-holder">' +
            '<img src="' + section.section_image + '" />' +
            '</div>' +
            '<p class="single-section-title">' + section.section_title + '</p>' +
            '</div>';
    });

    jQuery('#sectionsModal').modal('hide');
});

prepopulateCustomProducts()
addGeneralToggles();
addCheckoutContainers();
addMiniCartContainers();
addTyContainers();


function icToggleModal(selectorMain) {
    let main = document.querySelectorAll(selectorMain);
    if (main) {
        main.forEach(function (mainBox) {
            let modal = mainBox.querySelector(".ic-after-hover-circle-modal");
            if (modal) {
                mainBox.querySelectorAll("*").forEach((element) => {
                    element.style.pointerEvents = "none";
                });

                mainBox.addEventListener("mouseenter", (event) => {
                    if (event.target === mainBox) {
                        modal.style.opacity = "1";
                    }
                });

                mainBox.addEventListener("mouseleave", () => {
                    modal.style.opacity = "0";
                });
            }
        });
    }
}

icToggleModal(".ic-after-hover-pbc");
icToggleModal(".ic-after-hover-ptc");
icToggleModal(".ic-after-hover-cr");
icToggleModal(".ic-after-hover-sbc");
icToggleModal(".ic-after-hover-pbbc");
icToggleModal(".ic-after-hover-sbbc");
icToggleModal(".ic-after-hover-ifbc");
icToggleModal(".ic-after-hover-iftc");
icToggleModal(".ic-after-hover-bc");
icToggleModal(".ic-after-hover-ioc");
icToggleModal(".ic-after-hover-stc");
icToggleModal(".ic-after-hover-pbtc");
icToggleModal(".ic-after-hover-sbtc");