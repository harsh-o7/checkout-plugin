let allProducts = [];
let allCategories = [];
let triggers = [];
let products = [];
let categoriesTriggers = [];
let categoriesProducts = [];
let previewUpsell = document.querySelector('.preview-upsell');

let actionMade = false;
let triggerChecks = document.querySelectorAll('.single-product-trigger input');
let productChecks = document.querySelectorAll('.single-product-product input');
let categoriesTriggersChecks = document.querySelectorAll('.single-category-product-trigger input');
let categoriesProductsChecks = document.querySelectorAll('.single-category-product-product input');

let triggersSelected = document.querySelector('p.triggers-selected span');
let productsSelected = document.querySelector('p.products-selected span');
let triggersCategoriesSelected = document.querySelector('p.triggers-collection-selected span');
let productsCategoriesSelected = document.querySelector('p.products-collection-selected span');

let selectAllTriggers = document.querySelector('.select-all-triggers');
let selectAllProducts = document.querySelector('.select-all-products');
let selectAllCategoriesTriggers = document.querySelector('.select-all-triggers-collections');
let selectAllCategoriesProducts = document.querySelector('.select-all-products-collections');

let searchTriggersInput = document.querySelector('input#search-us-triggers');
let searchProductsInput = document.querySelector('input#search-us-products');
let searchTriggersCategoriesInput = document.querySelector('input#search-us-triggers-categories');
let searchProductsCategoriesInput = document.querySelector('input#search-us-products-categories');

let triggersCont = document.querySelector('.triggers-middle');
let productsCont = document.querySelector('.products-middle');
let categoryTriggersCont = document.querySelector('.triggers-collections-middle');
let categoryProductsCont = document.querySelector('.products-collections-middle');

let triggersCancel = document.querySelector('.triggers-modal .btn-secondary');
let productsCancel = document.querySelector('.products-modal .upsell-create-modal-btn-cancel');
let categoriesTriggersCancel = document.querySelector('#collectionTrigger .btn-secondary');
let categoriesProductsCancel = document.querySelector('#collectionProduct .btn-secondary');

let addTriggers = document.querySelector('.triggers-modal .add-triggers')
let addProducts = document.querySelector('.products-modal .add-products');
let addTriggersCategories = document.querySelector('.add-collection-triggers');
let addProductsCategories = document.querySelector('.add-collection-products');

let addedTriggersCont = document.querySelector('.added-triggers-cont');
let addedProductsCont = document.querySelector('.added-products-cont')
let addedTriggersCategoriesCont = document.querySelector('.added-triggers-collections-cont');
let addedProductsCategoriesCont = document.querySelector('.added-products-collections-cont');

let createUpsell = document.querySelector('input#new-upsell-add-btn');
let updateUpsell = document.querySelector('input#edit-upsell-add-btn');


let globalPriorityUpsells,globalCheckboxCheckoutPage,globalCheckboxBeforeTyPage,globalCheckboxCartPage;
let globalTriggerProducts,globalTriggerCategories,globalProductProducts,globalProductCategories;

let upsellForChecking = {
    title:'',
    checkOutPage:'',
    beforeTYPage:'',
    cartPage:'' ,
    priority:''
}

function validateUpsell() {
    let title;
    if(createUpsell) {
        title = document.querySelector('input.upsell-create-my-upsells');
    } else {
        title = document.querySelector('input.upsell-edit-my-upsells');
    }
    if(title.value == '') {
        swal({
            title: "Field 'Title' is required!",
            text: "Please, fill the Upsell title.",
            type: "warning",
            buttons: {
                continue: 'Continue',
            }
        }).then((value) => {
            title.focus();
            title.scrollIntoView();
        });
        return false;
    } else if(triggers.length == 0 && categoriesTriggers == 0) {
        swal({
            title: "Upsell Triggers are empty!",
            text: "Please, select minimum one trigger.",
            type: "warning",
            buttons: {
                continue: 'Continue',
            }
        }).then((value) => {
            document.querySelector('.added-triggers-cont').scrollIntoView();
        })
        return false;
    } else if(products.length == 0 && categoriesProducts == 0) {
        swal({
            title: " Upsell Products are empty!",
            text: "Please, select minimum one product.",
            type: "warning",
            buttons: {
                continue: 'Continue',
            }
        }).then((value) => {
            document.querySelector('.added-products-cont').scrollIntoView();
        });
        return false;
    }
    return true;
}

//The code from 101 to 501 is used to check if the modal for leaving the edit/create page of upsells is okay or not
//Also toggle functionality
function checkIfArraysAreSame(firstArray,secondArray){

    if (firstArray.length === 0 && secondArray.length === 0) {
        return true;
    }

    if (firstArray.length !== secondArray.length) {
        return false;
    }
    firstArray.sort();
    secondArray.sort();

    for (let i = 0; i < firstArray.length; i++) {
        if (firstArray[i] !== secondArray[i]) {
            return false;
        }
    }
    return true;
}

function checkIfUpsellProductsAreSame(firstUSProducts,secondUSProducts){

    if (!Array.isArray(firstUSProducts) || !Array.isArray(secondUSProducts)) {
        return false;
    }

    if (firstUSProducts.length === 0 && secondUSProducts.length === 0) {
        return true;
    }

    if (firstUSProducts.length !== secondUSProducts.length){
        return false;
    }
    const sortFunction = (a, b) => {
        let aValues = Object.values(a);
        let bValues = Object.values(b);
        for (let i = 0; i < aValues.length; i++) {
            if (aValues[i] < bValues[i]) {
                return -1;
            } else if (aValues[i] > bValues[i]) {
                return 1;
            }
        }
        return 0;
    };
    firstUSProducts.sort(sortFunction);
    secondUSProducts.sort(sortFunction);

    let firstObjKeys = Object.keys(firstUSProducts[0]);
    let secondObjKeys = Object.keys(secondUSProducts[0]);
    if (firstObjKeys.length !== secondObjKeys.length || !firstObjKeys.every(key => secondObjKeys.includes(key))) {
        return false;
    }

    for (let i = 0; i < firstUSProducts.length; i++) {
        let firstObj = firstUSProducts[i];
        let secondObj = secondUSProducts[i];
        let objKeys = Object.keys(firstObj);
        for (let j = 0; j < objKeys.length; j++) {
            let key = objKeys[j];
            if (firstObj[key] !== secondObj[key]) {
                return false;
            }
        }
    }
    return true;
}

function checkChangesForEditingUpsell(editTitleValue){

    let checkoutPage = globalCheckboxCheckoutPage;
    let priority = globalPriorityUpsells;
    let beforeTyPage = globalCheckboxBeforeTyPage;
    let cartPage = globalCheckboxCartPage;

    let triggerProductsBeforeLeaving = [];
    let triggerProductSection = document.querySelectorAll('.single-trigger');
    triggerProductSection.forEach((triggerProduct) => {
        let idString = triggerProduct.getAttribute('id');
        let id = idString.split("-")[1];
        triggerProductsBeforeLeaving.push(id);
    });

    let triggerProductsBeginning = [];
    globalTriggerProducts.forEach((triggerProduct) => {
        triggerProductsBeginning.push(triggerProduct.id);
    });

    let triggerCatsBeforeLeaving = [];
    let triggerCatsSection = document.querySelectorAll('.single-trigger-collection');
    triggerCatsSection.forEach((triggerCats) => {
        let idString = triggerCats.getAttribute('id');
        let id = idString.split("-")[1];
        triggerCatsBeforeLeaving.push(id);
    });

    let triggerCategoriesBeginning = [];
    globalTriggerCategories.forEach((triggerCats) => {
        triggerCategoriesBeginning.push(triggerCats.id);
    });

    let triggerProducts = checkIfArraysAreSame(triggerProductsBeginning,triggerProductsBeforeLeaving);
    let triggerCategories = checkIfArraysAreSame(triggerCategoriesBeginning,triggerCatsBeforeLeaving);

    let productProductsBeforeLeavingArray = [];
    let productProductsBeforeLeaving = document.querySelectorAll('.single-product');
    productProductsBeforeLeaving.forEach((productProduct)=>{
        let idString = productProduct.getAttribute('id');
        let id = idString.split("-")[1];
        let ccp = '0';
        let cp = '0';
        let dq = '0';
        let dsc = '0';
        let customComparePrice = productProduct.querySelector('input.custom-compare-price');
        if (customComparePrice.value != ''){
            ccp = customComparePrice.value;
        }
        let customPrice = productProduct.querySelector('input.custom-price');
        if (customPrice.value != ''){
            cp = customPrice.value;
        }
        let defaultQty = productProduct.querySelector('input.default-quantity');
        if (defaultQty.value != ''){
            dq = defaultQty.value;
        }
        let discount = productProduct.querySelector('input.discount');
        if (discount.value != ''){
            dsc = discount.value;
        }
        let product = {
            id: id,
            ccp:ccp,
            cp:cp,
            dq:dq,
            d:dsc
        };
        productProductsBeforeLeavingArray.push(product);
    });

    let productCatsBeforeLeaving = [];
    let productCategoriesBeforeLeaving = document.querySelectorAll('.single-products-collection');
    productCategoriesBeforeLeaving.forEach((productCats) => {
        let idString = productCats.getAttribute('id');
        let id = idString.split("-")[1];
        productCatsBeforeLeaving.push(id);
    });
    let productProducts = checkIfUpsellProductsAreSame(globalProductProducts,productProductsBeforeLeavingArray);

    let productCategoriesBeginning =[];
    globalProductCategories.forEach((globalProductCategory)=>{
        let id = globalProductCategory.id;
        productCategoriesBeginning.push(id);
    });
    let productCategories = checkIfArraysAreSame(productCategoriesBeginning,productCatsBeforeLeaving);

    return (upsellForChecking.title == editTitleValue) &&
        (upsellForChecking.priority == priority) &&
        (upsellForChecking.checkOutPage == checkoutPage) &&
        (upsellForChecking.beforeTYPage == beforeTyPage) &&
        (upsellForChecking.cartPage == cartPage) &&
        (triggerProducts) &&
        (triggerCategories) &&
        (productProducts) &&
        (productCategories);
}

function checkChangesForCreatingUpsell(createTitleValue){

    let checkoutPage = globalCheckboxCheckoutPage;
    let priority = globalPriorityUpsells;
    let beforeTyPage = globalCheckboxBeforeTyPage;
    let cartPage = globalCheckboxCartPage;
    let triggerProducts = document.querySelectorAll('.single-trigger');
    let triggerCategories = document.querySelectorAll('.single-trigger-collection');

    return (createTitleValue == '') &&
        (checkoutPage == '1') &&
        (beforeTyPage == '1') &&
        (cartPage == '1') &&
        (priority == '0') &&
        (triggerProducts.length === 0) &&
        (triggerCategories.length === 0);
}

function toggleUpsell(){
    let activateUpsellToggle = document.querySelector('input.active-input');
    if (activateUpsellToggle){
        let eventListener = activateUpsellToggle.getAttribute('click-listener');

        if (eventListener == null){

            activateUpsellToggle.setAttribute('click-listener',true);

            activateUpsellToggle.addEventListener('click',function(){
                let upsellId = activateUpsellToggle.parentElement.getAttribute('id');
                let active = activateUpsellToggle.checked;
                let upsells = [];
                let upsell = {
                    id: upsellId,
                    active: active
                }
                upsells.push(upsell);
                jQuery.ajax({
                    url: urls.ajax_url,
                    type: 'post',
                    data: {
                        action: 'ic_us_publish_hide',
                        nonce: nonces.us_publish_hide,
                        upsells: upsells
                    },
                    success: function (response) {
                        swal({
                            title: "Success 🎉",
                            text: "Changes have been successfully saved!",
                        });
                    }
                });

            });
        }
    }
}

function returnButtonChecking(){
    let backButton = document.querySelector('.page-title h2 button');
    if (backButton) {
        let eventListener = backButton.getAttribute('click-listener');
        if (eventListener == null) {
            backButton.setAttribute('click-listener', true);
            backButton.addEventListener('click', function (e) {
                e.preventDefault();

                let editTitle = document.querySelector('input.upsell-edit-my-upsells');
                let createTitle = document.querySelector('input.upsell-create-my-upsells');
                let locationLink = document.querySelector('.nav-link.active');

                if (editTitle) {
                    if (checkChangesForEditingUpsell(editTitle.value)) {
                        window.location = locationLink.getAttribute('href');
                    } else {
                        swal({
                            title: "Are you sure?",
                            text: "Want to continue without saving?",
                            type: "warning",
                            buttons: {
                                cancel: 'Stay',
                                leave: 'Leave'
                            }
                        }).then((value) => {
                            if (value == 'leave') {
                                window.location = locationLink.getAttribute('href');
                            }
                        })
                        return false;
                    }
                } else if (createTitle) {
                    if (checkChangesForCreatingUpsell(createTitle.value)) {
                        window.location = locationLink.getAttribute('href');
                    } else {
                        swal({
                            title: "Are you sure?",
                            text: "Want to continue without saving?",
                            type: "warning",
                            buttons: {
                                cancel: 'Stay',
                                leave: 'Leave'
                            }
                        }).then((value) => {
                            if (value == 'leave') {
                                window.location = locationLink.getAttribute('href');
                            }
                        })
                        return false;
                    }
                } else {
                    window.location = locationLink.getAttribute('href');
                }
            });
        }
    }
}

toggleUpsell();
returnButtonChecking();


window.onload=function(){
    let title = document.querySelector('input.upsell-edit-my-upsells');
    let titleValue;
    if (title){
        if (title.value != null){
            titleValue = title.value;
        }else{
            titleValue = '';
        }
    }else{
        titleValue = '';
    }

    let checkoutPage = document.querySelector('input#checkout-page').checked ? '1' : '0';
    let beforeTyPage = document.querySelector('input#before-ty-page').checked ? '1' : '0';
    let cartPage = document.querySelector('input#cart-page').checked ? '1' : '0';
    let priority = document.querySelector('select#select-priority').value;

    upsellForChecking.title = titleValue;
    upsellForChecking.checkOutPage = checkoutPage;
    upsellForChecking.beforeTYPage = beforeTyPage;
    upsellForChecking.cartPage = cartPage;
    upsellForChecking.priority = priority;

    globalPriorityUpsells = priority;
    globalCheckboxCheckoutPage = checkoutPage;
    globalCheckboxBeforeTyPage = beforeTyPage;
    globalCheckboxCartPage = cartPage;

    let selectPriority = document.querySelector('select#select-priority');
    selectPriority.addEventListener('change', (event) => {
        globalPriorityUpsells = event.target.value;
    });
    let checkboxCheckoutPage = document.querySelector('input#checkout-page');
    let checkboxBeforeTY = document.querySelector('input#before-ty-page');
    let checkboxCartPage = document.querySelector('input#cart-page');

    checkboxCheckoutPage.addEventListener('click',function(){
       if (checkboxCheckoutPage.checked){
           globalCheckboxCheckoutPage = '1';
       }else{
           globalCheckboxCheckoutPage = '0';
       }
    });

    checkboxBeforeTY.addEventListener('click',function(){
        if (checkboxBeforeTY.checked){
            globalCheckboxBeforeTyPage = '1';
        }else{
            globalCheckboxBeforeTyPage = '0';
        }
    });

    checkboxCartPage.addEventListener('click',function(){
        if (checkboxCartPage.checked){
            globalCheckboxCartPage = '1';
        }else{
            globalCheckboxCartPage = '0';
        }
    });
}

jQuery(document).click(function (e) {
        if (jQuery(e.target).is('a')) {
            // Prevent default behavior
            e.preventDefault();

            let editTitle = document.querySelector('input.upsell-edit-my-upsells');
            let createTitle = document.querySelector('input.upsell-create-my-upsells');

            if (editTitle) {
                if (checkChangesForEditingUpsell(editTitle.value)){
                    window.location = jQuery(e.target).attr("href");
                }else{
                    swal({
                        title: "Are you sure?",
                        text: "Want to continue without saving?",
                        type: "warning",
                        buttons: {
                            cancel: 'Stay',
                            leave: 'Leave'
                        }
                    }).then((value) => {
                        if (value == 'leave') {
                            window.location = jQuery(e.target).attr("href");
                        }
                    })
                    return false;
                }
            }
            else if (createTitle) {
                if(checkChangesForCreatingUpsell(createTitle.value)){
                    window.location = jQuery(e.target).attr("href");
                }else{
                    swal({
                        title: "Are you sure?",
                        text: "Want to continue without saving?",
                        type: "warning",
                        buttons: {
                            cancel: 'Stay',
                            leave: 'Leave'
                        }
                    }).then((value) => {
                        if (value == 'leave') {
                            window.location = jQuery(e.target).attr("href");
                        }
                    })
                    return false;
                }
            }else{
                window.location = jQuery(e.target).attr("href");
            }
        }
});

triggerChecks.forEach((triggerCheck) => {
    triggerCheck.addEventListener('change', function () {
        let triggerId = this.value;
        if (this.checked) {
            triggers.push(triggerId);

            triggerChecks.forEach(function(triggerChild){
               let checkParent =  triggerChild.parentElement.classList.contains('variation-of-product-'+triggerId);
                if (checkParent){
                    if (triggerChild.checked != true){
                        triggerChild.checked = true;
                        triggers.push(triggerChild.value);
                    }
                }
            });

        } else {
            triggers = triggers.filter(trigger => trigger != triggerId);

            triggerChecks.forEach(function(triggerChild){
                let checkParent =  triggerChild.parentElement.classList.contains('variation-of-product-'+triggerId);
                if (checkParent){
                    if (triggerChild.checked){
                        triggerChild.checked = false;
                        triggers = triggers.filter(triggerCP => triggerCP != triggerChild.value);
                    }
                }
            });

        }
        triggersSelected.innerText = triggers.length;
    });
});

productChecks.forEach((productCheck) => {
    productCheck.addEventListener('change', function () {
        let productId = this.value;
        if (this.checked) {
            products.push(productId);
        } else {
            products = products.filter(product => product != productId);
        }
        productsSelected.innerText = products.length;
    });
});

categoriesTriggersChecks.forEach((categoryTriggerCheck) => {
    categoryTriggerCheck.addEventListener('change', function () {
        let categoryId = this.value;
        if (this.checked) {
            categoriesTriggers.push(categoryId);
        } else {
            categoriesTriggers = categoriesTriggers.filter(categoryTrigger => categoryTrigger != categoryId);
        }
        triggersCategoriesSelected.innerText = categoriesTriggers.length;
    });
});

categoriesProductsChecks.forEach((categoryProductCheck) => {
    categoryProductCheck.addEventListener('change', function () {
        let categoryId = this.value;
        if (this.checked) {
            categoriesProducts.push(categoryId);
        } else {
            categoriesProducts = categoriesProducts.filter(categoryProduct => categoryProduct != categoryId);
        }
        productsCategoriesSelected.innerText = categoriesProducts.length;
    });
});

selectAllTriggers.addEventListener('click', function () {
    triggerChecks.forEach((triggerCheck) => {
        if (!triggerCheck.checked) {
            triggerCheck.checked = true;
            triggers.push(triggerCheck.value);
        }
    });
    triggersSelected.innerText = triggers.length;
});

selectAllProducts.addEventListener('click', function () {
    productChecks.forEach((productCheck) => {
        if (!productCheck.checked) {
            productCheck.checked = true;
            products.push(productCheck.value);
        }
    });
    productsSelected.innerText = products.length;
});

selectAllCategoriesTriggers.addEventListener('click', function () {
    categoriesTriggersChecks.forEach((categoryTriggerCheck) => {
        if (!categoryTriggerCheck.checked) {
            categoryTriggerCheck.checked = true;
            categoriesTriggers.push(categoryTriggerCheck.value);
        }
    });
    triggersCategoriesSelected.innerText = categoriesTriggers.length;
});

selectAllCategoriesProducts.addEventListener('click', function () {
    categoriesProductsChecks.forEach((categoryProductCheck) => {
        if (!categoryProductCheck.checked) {
            categoryProductCheck.checked = true;
            categoriesProducts.push(categoryProductCheck.value);
        }
    });
    productsCategoriesSelected.innerText = categoriesProducts.length;
});

triggersCancel.addEventListener('click', function () {
    triggers = [];
    triggerChecks.forEach((triggerCheck) => {
        triggerCheck.checked = false;
    });
    triggersSelected.innerText = triggers.length;
});

productsCancel.addEventListener('click', function () {
    products = [];
    productChecks.forEach((productCheck) => {
        productCheck.checked = false;
    });
    productsSelected.innerText = products.length;
});

categoriesTriggersCancel.addEventListener('click', function () {
    categoriesTriggers = [];
    categoriesTriggersChecks.forEach((categoryTriggerCheck) => {
        categoryTriggerCheck.checked = false;
    });
    triggersCategoriesSelected.innerText = categoriesTriggers.length;
});

categoriesProductsCancel.addEventListener('click', function () {
    categoriesProducts = [];
    categoriesProductsChecks.forEach((categoryProductCheck) => {
        categoryProductCheck.checked = false;
    });
    productsCategoriesSelected.innerText = categoriesProducts.length;
})




function addUpsell() {
    let title = document.querySelector('input.upsell-create-my-upsells').value;
    let checkoutPage = document.querySelector('input#checkout-page').checked ? 'true' : 'false';
    let beforeTyPage = document.querySelector('input#before-ty-page').checked ? 'true' : 'false';
    let cartPage = document.querySelector('input#cart-page').checked ? 'true' : 'false';
    let priority = document.querySelector('select#select-priority').value;
    let productsFinal = [];
    products.forEach((product) => {
        let productContainer = document.querySelector('.single-product#id-' + product);
        //let productContainer = productsWithId.find(e => e.classList.contains('single-product'));

        let ccPrice = productContainer.querySelector('input.custom-compare-price').value;
        let cPrice = productContainer.querySelector('input.custom-price').value;


        let defaultQuantity = productContainer.querySelector('input.default-quantity').value;
        let discount = productContainer.querySelector('input.discount').value;
        let productFinal = {
            id: product,
            ccPrice: ccPrice,
            cPrice: cPrice,
            defaultQuantity: defaultQuantity,
            discount: discount
        };
        productsFinal.push(productFinal);
    });

    let upsell = {
        triggers: triggers,
        products: productsFinal,
        title: title,
        checkoutPage: checkoutPage,
        beforeTyPage: beforeTyPage,
        cartPage: cartPage,
        priority: priority,
        categoriesTriggers: categoriesTriggers,
        categoriesProducts: categoriesProducts
    }


    jQuery.ajax({
        url: urls.ajax_url,
        type: 'post',
        data: {
            action: 'ic_add_new_upsell',
            nonce: nonces.add_new_upsell,
            upsell: upsell
        },
        success: function (response) {
            actionMade = true;
            swal({
                title: "Success 🎉",
                text: "Changes have been successfully saved!",
            }).then((value) => {
                if (value) {
                    window.location.replace(urls.upsells_url);
                }
            });
        }
    });
}

function updateUpsellF() {
    let id = document.querySelector('input#upsell-id').value;
    let title = document.querySelector('input.upsell-edit-my-upsells').value;
    let checkoutPage = document.querySelector('input#checkout-page').checked ? 'true' : 'false';
    let beforeTyPage = document.querySelector('input#before-ty-page').checked ? 'true' : 'false';
    let cartPage = document.querySelector('input#cart-page').checked ? 'true' : 'false';
    let priority = document.querySelector('select#select-priority').value;
    let active = document.querySelector('input#active').checked ? 'true' : 'false';
    let productsFinal = [];
    products.forEach((product) => {
        let productContainer = document.querySelector('.single-product#id-' + product);
        //let productContainer = productsWithId.find(e => e.classList.contains('single-product'));

        let ccPrice = productContainer.querySelector('input.custom-compare-price').value;
        let cPrice = productContainer.querySelector('input.custom-price').value;
        let defaultQuantity = productContainer.querySelector('input.default-quantity').value;
        let discount = productContainer.querySelector('input.discount').value;
        let productFinal = {
            id: product,
            ccPrice: ccPrice,
            cPrice: cPrice,
            defaultQuantity: defaultQuantity,
            discount: discount
        };
        productsFinal.push(productFinal);
    });

    let upsell = {
        triggers: triggers,
        products: productsFinal,
        title: title,
        checkoutPage: checkoutPage,
        beforeTyPage: beforeTyPage,
        cartPage: cartPage,
        priority: priority,
        active: active,
        id: id,
        categoriesTriggers: categoriesTriggers,
        categoriesProducts: categoriesProducts
    }

    jQuery.ajax({
        url: urls.ajax_url,
        type: 'post',
        data: {
            action: 'ic_update_upsell',
            nonce: nonces.update_upsell,
            upsell: upsell
        },
        success: function (response) {
            actionMade = true;
            swal({
                title: "Success 🎉",
                text: "Changes have been succesfully saved!",
            }).then((value) => {
                if (value) {
                    window.location.replace(urls.upsells_url);
                }
            });
        }
    });
}

function prepopulateProductsTriggers() {
    if (createUpsell) {
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
                jQuery.ajax({
                    url: urls.ajax_url,
                    type: 'get',
                    data: {
                        action: 'ic_query_product_categories',
                        nonce: nonces.query_product_categories,
                        query_categories: ''
                    },
                    success: function (response) {
                        allCategories = JSON.parse(response);
                        addTriggersAndProductsHTML();

                    }
                });

            }
        });

    } else {

        let id = document.querySelector('input#upsell-id').value;
        jQuery.ajax({
            url: urls.ajax_url,
            type: 'get',
            data: {
                action: 'ic_upsell_get_products_triggers',
                nonce: nonces.upsell_get_products_triggers,
                id: id
            },

            success: function (response) {
                let data = JSON.parse(response);
                let triggers = data.triggers;
                let productsUs = data.products;
                let triggersCats = data.triggers_cats;
                let productsCats = data.products_cats;

                globalTriggerProducts = triggers;
                globalTriggerCategories = triggersCats;
                globalProductProducts = productsUs;
                globalProductCategories = productsCats;

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
                        jQuery.ajax({
                            url: urls.ajax_url,
                            type: 'get',
                            data: {
                                action: 'ic_query_product_categories',
                                nonce: nonces.query_product_categories,
                                query_categories: ''
                            },
                            success: function (response) {
                                allCategories = JSON.parse(response);
                                addTriggersAndProductsHTML();
                                triggers.forEach((trigger) => {
                                    document.querySelector('.single-product-trigger input[value="' + trigger.id + '"]').click();
                                });
                                addTriggers.click();
                                productsUs.forEach((product) => {
                                    document.querySelector('.single-product-product input[value="' + product.id + '"]').click();
                                });
                                addProducts.click();
                                triggersCats.forEach((triggerCat) => {
                                    document.querySelector('.single-category-product-trigger input[value="' + triggerCat.id + '"]').click();
                                });
                                addTriggersCategories.click();
                                productsCats.forEach((productCat) => {
                                    document.querySelector('.single-category-product-product input[value="' + productCat.id + '"]').click();
                                });
                                addProductsCategories.click();

                                productsUs.forEach((product) => {
                                    let productContainer = document.querySelector('.single-product#id-' + product.id);
                                    productContainer.querySelector('input.custom-compare-price').value = product.ccp;
                                    productContainer.querySelector('input.custom-price').value = product.cp;
                                    productContainer.querySelector('input.default-quantity').value = product.dq;
                                    productContainer.querySelector('input.discount').value = product.d;
                                });
                            }
                        });

                    }
                });
            }
        });

    }
}

function addTriggersAndProductsHTML() {
    addTriggers.addEventListener('click', function () {
        let triggersHtml = '';
        triggers.forEach((trigger) => {
            let product = allProducts.find(e => e.ID == trigger);
            triggersHtml += '<div class="single-trigger" id="id-' + product.ID + '">';
            triggersHtml += '<div class="single-trigger-left-col">';
            if (product.image == null) {
                triggersHtml += '<img src="' + urls.plugin_url + '/assets/images/woocommerce-placeholder.png' + '" width="32" height="32" />';
            } else {
                triggersHtml += '<img src="' + product.image + '" width="32" height="32" />';
            }
            triggersHtml += '<div class="single-trigger-title">' + product.title + '</div>';
            triggersHtml += '</div>';
            triggersHtml += '<div class="single-trigger-right-col">';
            triggersHtml += '<img class="single-trigger-delete" width="14" height="14" src="' + urls.plugin_url + '/assets/images/trash-can.png">';
            triggersHtml += '</div>';
            triggersHtml += '</div>';
        });
        addedTriggersCont.innerHTML = triggersHtml;

        let deleteBtns = addedTriggersCont.querySelectorAll('.single-trigger-delete');
        deleteBtns.forEach((deleteBtn) => {
            deleteBtn.addEventListener('click', function () {
                let id = deleteBtn.parentElement.parentElement.id.slice(3);
                triggers = triggers.filter(trigger => trigger != id);
                let checks = document.querySelectorAll('.single-product-trigger input');
                let check = Array.from(checks).find(e => e.value == id);
                check.click();
                addedTriggersCont.removeChild(deleteBtn.parentElement.parentElement);
            });
        });
    });

    addProducts.addEventListener('click', function () {
        let insertedProducts = document.querySelectorAll('.added-products-cont .single-product');
        let insertedData = [];
        if(insertedProducts) {
            insertedProducts.forEach((insertedProduct) => {
                let singleInserted = {
                    productId: parseInt(insertedProduct.id.slice(3)),
                    ccPrice: insertedProduct.querySelector('input.custom-compare-price').value,
                    cPrice: insertedProduct.querySelector('input.custom-price').value,
                    qty: insertedProduct.querySelector('input.default-quantity').value,
                    discount: insertedProduct.querySelector('input.discount').value
                }
                insertedData.push(singleInserted);
            });
        }
        let productsHtml = '';
        addedProductsCont.innerHTML = '';
        products.forEach((product) => {
            let pr = allProducts.find(e => e.ID == product);
            let insertedPrevious = insertedData.find(e => e.productId == product);
            let ccPriceFinal = insertedPrevious === undefined ? '': insertedPrevious.ccPrice;
            let cPriceFinal = insertedPrevious === undefined ? '': insertedPrevious.cPrice;
            let qty = insertedPrevious === undefined ? '': insertedPrevious.qty;
            let discount = insertedPrevious === undefined ? '': insertedPrevious.discount;

            productsHtml += '<div class="single-product" id="id-' + pr.ID + '">';
            productsHtml += '<div class="sigle-product-inner">';
            productsHtml += '<div class="sigle-product-inner-side1">'
            if (pr.image == null) {
                productsHtml += '<img src="' + urls.plugin_url + '/assets/images/woocommerce-placeholder.png' + '" width="32" height="32" />';
            } else {
                productsHtml += '<img src="' + pr.image + '" width="32" height="32" />';
            }
            productsHtml += '<div class="single-product-title">' + pr.title + '</div>';
            productsHtml += '</div>';
            productsHtml += '<div class="sigle-product-inner-side2">'
            productsHtml += '<img class="single-product-delete" width="14" height="14" src="' + urls.plugin_url + '/assets/images/trash-can.png">';
            productsHtml += '</div>';
            productsHtml += '</div>';
            productsHtml += '<div class="single-product-custom">';
            productsHtml += '<div class="custom-compare-price upsell-create-btn-price" id="upsell-create-btn-price-inp1">  <img src="' + urls.plugin_url + '/assets/images/subtract.png' + '" alt="" id="logo"><input class="custom-compare-price" type="text" placeholder="Custom Compare Price" value="' + ccPriceFinal + '"><div class="ic-info-text-upsell-products">If you want to show two prices for the specific upsell(base price and discounted one), here you can set the specific base price of your product that differentiates from the real one. You can use this strategy to show specific products as cheaper or more expensive before providing a discount to make more users add this upsell to their cart.</div></div>';
            productsHtml += '<div class="custom-price upsell-create-btn-price" id="upsell-create-btn-price-inp2">  <img src="' + urls.plugin_url + '/assets/images/subtract.png' + '" alt="" id="logo"><input class="custom-price"  type="text" placeholder="Custom Price" value="' + cPriceFinal + '"><div class="ic-info-text-upsell-products">This price is the discounted price based on the Custom Compare price that will be shown within the upsell section.</div></div>';
            productsHtml += '<div class="default-quantity upsell-create-btn-price" id="upsell-create-btn-price-inp3">  <img src="' + urls.plugin_url + '/assets/images/plus.png' + '" alt="" id="logo"><input class="default-quantity" type="text" placeholder="Default Quantity" value="' + qty + '"><div class="ic-info-text-upsell-products">Default Quantity is a field connected with the Discount field. For example, let’s say you want to provide 2 upsell products at a specific price(Custom price) or the product’s default one, and you want to offer the 3rd upsell product to be at a discounted price. Default Quantity shows the number of upsells that will be discounted.  <i>e.g. Quantity = 3(3rd product will be discounted)</i>.</div></div>';
            productsHtml += '<div class="discount upsell-create-btn-price" id="upsell-create-btn-price-inp4">  <img src="' + urls.plugin_url + '/assets/images/coupon.png' + '" alt="" id="logo"><input class="discount" type="text" placeholder="Discount" value="' + discount + '"><div class="ic-info-text-upsell-products">Within this field, you can set the percentage discount of the specific upsell product(3rd one, for example) that is connected with the Default Quantity field.</div></div>';
            productsHtml += '</div>';
            productsHtml += '</div>';

            addedProductsCont.innerHTML += productsHtml;
            productsHtml = "";
            let ccPriceContainer = document.querySelector('.added-products-cont #id-' + pr.ID).querySelector('.custom-compare-price');
            let cPriceContainer = document.querySelector('.added-products-cont #id-' + pr.ID).querySelector('.custom-price');
            let ccPriceInput = ccPriceContainer.querySelector('input');
            let cPriceInput = cPriceContainer.querySelector('input');

            ccPriceInput.addEventListener('input', function () {
                ccPrice = ccPriceInput.value;
                if (cPrice) {
                    if (cPrice > ccPrice) {
                        ccPriceContainer.setAttribute('style', 'border-color: red !important;');
                    } else {
                        ccPriceContainer.removeAttribute('style');
                    }
                }
            });

            cPriceInput.addEventListener('input', function () {
                cPrice = cPriceInput.value;
                if (ccPrice) {
                    if (cPrice > ccPrice) {
                        cPriceContainer.setAttribute('style', 'border-color :red !important;');
                    } else {
                        cPriceContainer.removeAttribute('style');
                    }
                }
            });

            var ccPrice = null;
            var cPrice = null;
        });


        let deleteBtns = addedProductsCont.querySelectorAll('.single-product-delete');
        deleteBtns.forEach((deleteBtn) => {
            deleteBtn.addEventListener('click', function () {
                let id = deleteBtn.parentElement.parentElement.parentElement.id.slice(3);
                products = products.filter(product => product != id);
                let checks = document.querySelectorAll('.single-product-product input');
                let check = Array.from(checks).find(e => e.value == id);
                check.click();
                addedProductsCont.removeChild(deleteBtn.parentElement.parentElement.parentElement);
            });
        });


    });

    addTriggersCategories.addEventListener('click', function () {
        let triggersCategoriesHtml = '';
        categoriesTriggers.forEach((categoryTrigger) => {
            let ct = allCategories.find(e => e.term_id == categoryTrigger);
            triggersCategoriesHtml += '<div class="single-trigger-collection" id="id-' + ct.term_id + '">';
            triggersCategoriesHtml += '<div class="single-trigger-collection-left-col">';
            triggersCategoriesHtml += '<img src="' + urls.plugin_url + '/assets/images/woocommerce-placeholder.png' + '" width="32" height="32" />';
            triggersCategoriesHtml += '<div class="single-trigger-collection-title">' + ct.name + '</div>';
            triggersCategoriesHtml += '</div>';
            triggersCategoriesHtml += '<div class="single-trigger-collection-right-col">';
            triggersCategoriesHtml += '<img class="single-trigger-collection-delete" width="14" height="14" src="' + urls.plugin_url + '/assets/images/trash-can.png">';
            triggersCategoriesHtml += '</div>';
            triggersCategoriesHtml += '</div>';
        });
        addedTriggersCategoriesCont.innerHTML = triggersCategoriesHtml;

        let deleteBtns = addedTriggersCategoriesCont.querySelectorAll('.single-trigger-collection-delete');
        deleteBtns.forEach((deleteBtn) => {
            deleteBtn.addEventListener('click', function () {
                let id = deleteBtn.parentElement.parentElement.id.slice(3);
                categoriesTriggers = categoriesTriggers.filter(categoryTrigger => categoryTrigger != id);
                let checks = document.querySelectorAll('.single-category-product-trigger input');
                let check = Array.from(checks).find(e => e.value == id);
                check.click();
                addedTriggersCategoriesCont.removeChild(deleteBtn.parentElement.parentElement);
            });
        });
    });

    addProductsCategories.addEventListener('click', function () {
        let productsCategoriesHtml = '';
        categoriesProducts.forEach((categoryProduct) => {
            let ct = allCategories.find(e => e.term_id == categoryProduct);
            productsCategoriesHtml += '<div class="single-products-collection" id="id-' + ct.term_id + '">';
            productsCategoriesHtml += '<div class="single-products-collection-left-col">';
            productsCategoriesHtml += '<img src="' + urls.plugin_url + '/assets/images/woocommerce-placeholder.png' + '" width="32" height="32" />';
            productsCategoriesHtml += '<div class="single-products-collection-title">' + ct.name + '</div>';
            productsCategoriesHtml += '</div>';
            productsCategoriesHtml += '<div class="single-products-collection-right-col">';
            productsCategoriesHtml += '<img class="single-products-collection-delete" width="14" height="14" src="' + urls.plugin_url + '/assets/images/trash-can.png">';
            productsCategoriesHtml += '</div>';
            productsCategoriesHtml += '</div>';
        });
        addedProductsCategoriesCont.innerHTML = productsCategoriesHtml;

        let deleteBtns = addedProductsCategoriesCont.querySelectorAll('.single-products-collection-delete');
        deleteBtns.forEach((deleteBtn) => {
            deleteBtn.addEventListener('click', function () {
                let id = deleteBtn.parentElement.parentElement.id.slice(3);
                categoriesProducts = categoriesProducts.filter(categoryProduct => categoryProduct != id);
                let checks = document.querySelectorAll('.single-category-product-product input');
                let check = Array.from(checks).find(e => e.value == id);
                check.click();
                addedProductsCategoriesCont.removeChild(deleteBtn.parentElement.parentElement);
            });
        });
    });

    searchTriggersInput.addEventListener('input', function () {
        jQuery.ajax({
            url: urls.ajax_url,
            type: 'get',
            data: {
                action: 'ic_query_products',
                nonce: nonces.query_products,
                exclude: products,
                query: searchTriggersInput.value
            },
            success: function (response) {
                let searchProducts = JSON.parse(response);
                let newHtml = '';
                searchProducts.forEach((product) => {
                    newHtml += '<div class="single-product-trigger">';
                    newHtml += '<input type="checkbox" value="' + product.ID + '"';

                    if (triggers.includes(product.ID)) {
                        newHtml += ' checked />';
                    } else {
                        newHtml += ' />';
                    }

                    if (product.image == null) {
                        newHtml += '<img width="32" height="32" src="' + urls.plugin_url + '/assets/images/woocommerce-placeholder.png' + '" alt="">';
                    } else {
                        newHtml += '<img width="32" height="32" src="' + product.image + '" alt="" >';
                    }

                    newHtml += '<p>' + product.title + '</p></div>';
                });

                triggersCont.innerHTML = '';
                triggersCont.innerHTML = newHtml;

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

    searchProductsInput.addEventListener('input', function () {
        jQuery.ajax({
            url: urls.ajax_url,
            type: 'get',
            data: {
                action: 'ic_query_products',
                nonce: nonces.query_products,
                exclude: triggers,
                query: searchProductsInput.value
            },
            success: function (response) {
                let searchProducts = JSON.parse(response);
                let newHtml = '';
                searchProducts.forEach((product) => {
                    newHtml += '<div class="single-product-product">';
                    newHtml += '<input type="checkbox" value="' + product.ID + '"';

                    if (products.includes(product.ID)) {
                        newHtml += ' checked />';
                    } else {
                        newHtml += ' />';
                    }

                    if (product.image == null) {
                        newHtml += '<img width="32" height="32" src="' + urls.plugin_url + '/assets/images/woocommerce-placeholder.png' + '" alt="">';
                    } else {
                        newHtml += '<img width="32" height="32" src="' + product.image + '" alt="" >';
                    }

                    newHtml += '<p>' + product.title + '</p></div>';
                });

                productsCont.innerHTML = '';
                productsCont.innerHTML = newHtml;

                document.querySelectorAll('.single-product-product input').forEach((productCheck) => {
                    productCheck.addEventListener('change', function () {
                        let productId = this.value;
                        if (this.checked) {
                            products.push(productId);
                        } else {
                            products = products.filter(product => product != productId);
                        }
                        productsSelected.innerText = products.length;
                    });
                });
            }
        });
    });

    searchTriggersCategoriesInput.addEventListener('input', function () {
        jQuery.ajax({
            url: urls.ajax_url,
            type: 'get',
            data: {
                action: 'ic_query_product_categories',
                nonce: nonces.query_product_categories,
                query_categories: searchTriggersCategoriesInput.value
            },
            success: function (response) {
                let searchCategories = JSON.parse(response);
                let newHtml = '';
                searchCategories.forEach((category) => {
                    newHtml += '<div class="single-category-product-trigger">';
                    newHtml += '<input type="checkbox" value="' + category.term_id + '"';

                    if (categoriesTriggers.includes(category.ID)) {
                        newHtml += ' checked />';
                    } else {
                        newHtml += ' />';
                    }

                    // if(product.image == null) {
                    //     newHtml += '<img width="32" height="32" src="' + urls.plugin_url + '/assets/images/woocommerce-placeholder.png' + '" alt="">';
                    // } else {
                    //     newHtml += '<img width="32" height="32" src="' + product.image + '" alt="" >';
                    // }

                    newHtml += '<p>' + category.name + '</p></div>';
                });

                categoryTriggersCont.innerHTML = '';
                categoryTriggersCont.innerHTML = newHtml;

                document.querySelectorAll('.single-category-product-trigger input').forEach((triggerCategoryCheck) => {
                    triggerCategoryCheck.addEventListener('change', function () {
                        let categoryId = this.value;
                        if (this.checked) {
                            categoriesTriggers.push(categoryId);
                        } else {
                            categoriesTriggers = categoriesTriggers.filter(categoryTrigger => categoryTrigger != categoryId);
                        }
                        triggersCategoriesSelected.innerText = categoriesTriggers.length;
                    });
                });
            }
        });
    });

    searchProductsCategoriesInput.addEventListener('input', function () {
        jQuery.ajax({
            url: urls.ajax_url,
            type: 'get',
            data: {
                action: 'ic_query_product_categories',
                nonce: nonces.query_product_categories,
                query_categories: searchProductsCategoriesInput.value
            },
            success: function (response) {
                let searchCategories = JSON.parse(response);
                let newHtml = '';
                searchCategories.forEach((category) => {
                    newHtml += '<div class="single-category-product-product">';
                    newHtml += '<input type="checkbox" value="' + category.term_id + '"';

                    if (categoriesProducts.includes(category.ID)) {
                        newHtml += ' checked />';
                    } else {
                        newHtml += ' />';
                    }

                    // if(product.image == null) {
                    //     newHtml += '<img width="32" height="32" src="' + urls.plugin_url + '/assets/images/woocommerce-placeholder.png' + '" alt="">';
                    // } else {
                    //     newHtml += '<img width="32" height="32" src="' + product.image + '" alt="" >';
                    // }

                    newHtml += '<p>' + category.name + '</p></div>';
                });

                categoryProductsCont.innerHTML = '';
                categoryProductsCont.innerHTML = newHtml;

                document.querySelectorAll('.single-category-product-product input').forEach((productCategoryCheck) => {
                    productCategoryCheck.addEventListener('change', function () {
                        let categoryId = this.value;
                        if (this.checked) {
                            categoriesProducts.push(categoryId);
                        } else {
                            categoriesProducts = categoriesProducts.filter(categoryProduct => categoryProduct != categoryId);
                        }
                        productsCategoriesSelected.innerText = categoriesProducts.length;
                    });
                });
            }
        });
    });
}

previewUpsell.addEventListener('click', function () {
    let upsellPreviewCont = document.querySelector('#upsellPreview .modal-body .upsell-preview');
    let ppPreviewCont = document.querySelector('#upsellPreview .modal-body .pp-preview');

    let addedProductsForPreview = document.querySelectorAll('.added-products-cont .single-product');
    let addedCategoriesForPreview = document.querySelectorAll('.single-products-collection')

    let checkoutPageChecked = document.querySelector('#checkout-page').checked;
    let cartPageChecked = document.querySelector('#cart-page').checked;
    let postPurchaseChecked = document.querySelector('#before-ty-page').checked;

    let previewContSliderHtml = '';
    let previewContPPHtml = '';
    if (checkoutPageChecked || cartPageChecked) {
        document.querySelector('#cart-checkout-tab').style.display = 'block';
        document.querySelector('#cart-checkout-tab').classList.add('active');
        document.querySelector('#cart-checkout').classList.add('active');
        document.querySelector('#cart-checkout').classList.add('show');
        previewContSliderHtml = '<div id="ic-upsell" class="ic-checkout-upsell swiper"><div class="swiper-wrapper">';
        let upsellsRendered = [];
        addedProductsForPreview.forEach((productPreview) => {
            let title = productPreview.querySelector('.sigle-product-inner-side1 .single-product-title').innerText;
            if (!upsellsRendered.includes(title)) {
                let productId = productPreview.id.slice(3);
                let src = productPreview.querySelector('.sigle-product-inner-side1 img').src;
                previewContSliderHtml += '<div class="swiper-slide us-slide">' +
                    '<div class="us-slide-left">' +
                        '<div  class="us-slide-left-box">' +
                            '<img width="32" height="32" src="' + src + '" >' +
                            '<div class="us-slide-title-price">' +
                                '<h6>' + title + '</h6>';
                let product = allProducts.filter(p => p.ID == productId)[0];
                let regularPrice = null;
                let price = product.price;
                let ccPrice = parseInt(productPreview.querySelector('input.custom-compare-price').value);
                let cPrice = parseInt(productPreview.querySelector('input.custom-price').value);

                if (ccPrice != 0 && cPrice == 0) {
                    price = product.cc_price;
                } else if (ccPrice != 0 && cPrice != 0) {
                    regularPrice = ccPrice;
                    price = cPrice;
                } else if (product.sale_price != '') {
                    regularPrice = product.regular_price;
                }
                if (regularPrice != null) {
                    previewContSliderHtml += '<p>' +
                        '<span class="sale-price">' + info.currency + regularPrice + '</span>' +
                        info.currency + price +
                        '</p>';
                } else {
                    previewContSliderHtml += '<p>' + info.currency + price + '</p>';
                }
                previewContSliderHtml += '</div></div></div><p class="product woocommerce add_to_cart_inline mini-cart-single-product" style="border:4px solid #ccc; padding: 12px;"><a href="?add-to-cart=16" data-quantity="1" class="button product_type_simple add_to_cart_button ajax_add_to_cart" data-product_id="16" data-product_sku="" aria-label="Add “Et maxime et nihil enim rerum iure” to your cart" rel="nofollow">Add to cart +</a></p></div>';
                upsellsRendered.push(title);
            }
        });

        let categories = [];
        addedCategoriesForPreview.forEach((categoryPreview) => {
            categories.push(categoryPreview.id.slice(3));
        });

        jQuery.ajax({
            url: urls.ajax_url,
            type: 'get',
            data: {
                action: 'ic_get_products_by_categories',
                nonce: nonces.get_products_by_categories,
                categories: categories
            },
            success: function (response) {
                let categoryProducts = JSON.parse(response);
                categoryProducts.forEach((productPreview) => {
                    if (!upsellsRendered.includes(productPreview.title)) {
                        let src = productPreview.image;
                        if (src == null) {
                            src = urls.plugin_url + '/assets/images/woocommerce-placeholder.png';
                        }
                        let title = productPreview.title;
                        previewContSliderHtml += '<div class="swiper-slide us-slide">' +
                            '<div class="us-slide-left">' +
                            '<img width="32" height="32" src="' + src + '" >' +
                            '<div class="us-slide-title-price">' +
                            '<h6>' + title + '</h6>';
                        let regularPrice = null;
                        let price = productPreview.price;
                        let ccPrice = productPreview.cc_price;
                        let cPrice = productPreview.c_price;

                        if (ccPrice != 0 && cPrice == 0) {
                            price = productPreview.cc_price;
                        } else if (ccPrice != 0 && cPrice != 0) {
                            regularPrice = ccPrice;
                            price = cPrice;
                        } else if (productPreview.sale_price != '') {
                            regularPrice = productPreview.regular_price;
                        }
                        if (regularPrice != null) {
                            previewContSliderHtml += '<p>' +
                                '<span class="sale-price">' + info.currency + regularPrice + '</span>' +
                                info.currency + price +
                                '</p>';
                        } else {
                            previewContSliderHtml += '<p>' + info.currency + price + '</p>';
                        }
                        previewContSliderHtml += '</div></div><p class="product woocommerce add_to_cart_inline mini-cart-single-product" style="border:4px solid #ccc; padding: 12px;"><a href="?add-to-cart=16" data-quantity="1" class="button product_type_simple add_to_cart_button ajax_add_to_cart" data-product_id="16" data-product_sku="" aria-label="Add “Et maxime et nihil enim rerum iure” to your cart" rel="nofollow">Add to cart +</a></p></div>';
                        upsellsRendered.push(productPreview.title);
                    }
                });

                previewContSliderHtml += '</div>' +
                    '<div class="swiper-pagination"></div>\n' +
                    '<div class="swiper-button-next"></div>\n' +
                    '<div class="swiper-button-prev"></div></div>';
                upsellPreviewCont.innerHTML = previewContSliderHtml;

                let upsellSlider = new Swiper('.ic-checkout-upsell', {
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
        });

    } else {
        document.querySelector('#cart-checkout-tab').style.display = 'none';
        document.querySelector('#cart-checkout-tab').classList.remove('active');
        document.querySelector('#cart-checkout').classList.remove('active');
        document.querySelector('#cart-checkout').classList.remove('show');
    }

    if (postPurchaseChecked) {
        document.querySelector('#post-purchase-tab').style.display = 'block';
        if (!(cartPageChecked || checkoutPageChecked)) {
            document.querySelector('#post-purchase-tab').classList.add('active');
            document.querySelector('#post-purchase').classList.add('active');
            document.querySelector('#post-purchase').classList.add('show');
        } else {
            document.querySelector('#post-purchase-tab').classList.remove('active');
            document.querySelector('#post-purchase').classList.remove('active');
            document.querySelector('#post-purchase').classList.remove('show');
        }

        let upsellsRendered = [];
        addedProductsForPreview.forEach((productPreview) => {
            let title = productPreview.querySelector('.sigle-product-inner-side1 .single-product-title').innerText;
            if (!upsellsRendered.includes(title)) {
                let productId = productPreview.id.slice(3);
                let src = productPreview.querySelector('.sigle-product-inner-side1 img').src;
                previewContPPHtml += '<div class="single-us-ty">' +
                    '<div class="single-us-ty-left">' +
                    '<img src ="' + src + '" width="48" height="48" />' +
                    '<div class="single-us-ty-name-box">' +
                    '<p class="single-us-ty-title">' + title + '</p>';
                let product = allProducts.filter(p => p.ID == productId)[0];
                let regularPrice = null;
                let price = product.price;
                let ccPrice = parseInt(productPreview.querySelector('input.custom-compare-price').value);
                let cPrice = parseInt(productPreview.querySelector('input.custom-price').value);

                if (ccPrice != 0 && cPrice == 0) {
                    price = product.cc_price;
                } else if (ccPrice != 0 && cPrice != 0) {
                    regularPrice = ccPrice;
                    price = cPrice;
                } else if (product.sale_price != '') {
                    regularPrice = product.regular_price;
                }
                if (regularPrice != null) {
                    previewContPPHtml += '<p>' +
                        '<span class="sale-price">' + info.currency + regularPrice + '</span>' +
                        info.currency + price +
                        '</p>';
                } else {
                    previewContPPHtml += '<p>' + info.currency + price + '</p>';
                }
                previewContPPHtml += '</div></div>';
                previewContPPHtml += '<div class="single-us-ty-right">' +
                    '<span><i class="fa-solid fa-plus"></i> Add product</span>' +
                    '</div></div>';
                upsellsRendered.push(title);
            }
        });

        let categories = [];
        addedCategoriesForPreview.forEach((categoryPreview) => {
            categories.push(categoryPreview.id.slice(3));
        });

        jQuery.ajax({
            url: urls.ajax_url,
            type: 'get',
            data: {
                action: 'ic_get_products_by_categories',
                nonce: nonces.get_products_by_categories,
                categories: categories
            },
            success: function (response) {
                let categoryProducts = JSON.parse(response);
                categoryProducts.forEach((productPreview) => {
                    if (!upsellsRendered.includes(productPreview.title)) {
                        let src = productPreview.image;
                        if (src == null) {
                            src = urls.plugin_url + '/assets/images/woocommerce-placeholder.png';
                        }
                        let title = productPreview.title;
                        previewContPPHtml += '<div class="single-us-ty">' +
                            '<div class="single-us-ty-left">' +
                            '<img src ="' + src + '" width="48" height="48" />' +
                            '<div class="single-us-ty-name-box">' +
                            '<p class="single-us-ty-title">' + title + '</p>';
                        let regularPrice = null;
                        let price = productPreview.price;
                        let ccPrice = productPreview.cc_price;
                        let cPrice = productPreview.c_price;

                        if (ccPrice != 0 && cPrice == 0) {
                            price = productPreview.cc_price;
                        } else if (ccPrice != 0 && cPrice != 0) {
                            regularPrice = ccPrice;
                            price = cPrice;
                        } else if (productPreview.sale_price != '') {
                            regularPrice = productPreview.regular_price;
                        }
                        if (regularPrice != null) {
                            previewContPPHtml += '<p>' +
                                '<span class="sale-price">' + info.currency + regularPrice + '</span>' +
                                info.currency + price +
                                '</p>';
                        } else {
                            previewContPPHtml += '<p>' + info.currency + price + '</p>';
                        }
                        previewContPPHtml += '</div></div>';
                        previewContPPHtml += '<div class="single-us-ty-right">' +
                            '<span><i class="fa-solid fa-plus"></i> Add product</span>' +
                            '</div></div>';
                        upsellsRendered.push(productPreview.title);
                    }
                });

                ppPreviewCont.innerHTML = previewContPPHtml;
            }
        });

    } else {
        document.querySelector('#post-purchase-tab').style.display = 'none';
        document.querySelector('#post-purchase-tab').classList.remove('active');
        document.querySelector('#post-purchase').classList.remove('active');
        document.querySelector('#post-purchase').classList.remove('show');
    }

});

if (createUpsell) {
    prepopulateProductsTriggers();
    createUpsell.addEventListener('click', function (e) {
        e.preventDefault();
        if(validateUpsell()) {
            addUpsell();
        }
    });
}

if (updateUpsell) {
    prepopulateProductsTriggers();
    updateUpsell.addEventListener('click', function (e) {
        e.preventDefault();
        if(validateUpsell()) {
            updateUpsellF();
        }
    });
}

