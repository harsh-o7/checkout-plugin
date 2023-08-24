
// let triggerChecks = document.querySelectorAll('.single-product-trigger input');
// let productChecks = document.querySelectorAll('.single-product-product input');
// let triggersSelected = document.querySelector('p.triggers-selected span');
// let productsSelected = document.querySelector('p.products-selected span');
// let selectAllTriggers = document.querySelector('.select-all-triggers');
// let searchTriggersInput = document.querySelector('input#search-us-triggers');
// let searchProductsInput = document.querySelector('input#search-us-products');
let triggersCont = document.querySelector('.triggers-middle');
let productsCont = document.querySelector('.products-middle');
// let triggersCancel = document.querySelector('.triggers-modal .btn-secondary');
let addTriggers = document.querySelector('.triggers-modal .add-triggers')
let addProducts = document.querySelector('.products-modal .add-products');
let addedTriggersCont = document.querySelector('.added-triggers-cont');
let addedProductsCont = document.querySelector('.added-products-cont');

function searchInputMode(searchClass, action, nonce , exclude, urls) {
    let searchTriggersInput = document.querySelector(searchClass);
    searchTriggersInput.addEventListener('input', function () {
        jQuery.ajax({
            url: urls.ajax_url,
            type: 'get',
            data: {
                action:  action,
                nonce: nonce,
                exclude: exclude,
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
                        newHtml += '<img width="32" height="32" src="#" alt="">';
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
}

function addTriggersAndProductsHTML(page, modalAllProducts, argArray) {
    addTriggers.addEventListener('click', function () {
        triggers = argArray;
        let triggersHtml = '';
        triggers.forEach((trigger) => {
            let product = modalAllProducts.find(e => e.ID == trigger);
            triggersHtml += '<div class="single-trigger" id="id-' + product.ID + '">';
            triggersHtml += '<div class="single-trigger-left-col">';
            triggersHtml += '<img src="' + product.image + '" width="32" height="32" />';
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
        let productsHtml = '';
        products.forEach((product) => {
            let pr = modalAllProducts.find(e => e.ID == product);
            productsHtml += '<div class="single-product" id="id-' + pr.ID + '">';
            productsHtml += '<div class="sigle-product-inner">';
            productsHtml += '<div class="sigle-product-inner-side1">'
            productsHtml += '<img src="' + pr.image + '" width="32" height="32" />';
            productsHtml += '<div class="single-product-title">' + pr.title + '</div>';
            productsHtml += '</div>';
            productsHtml += '<div class="sigle-product-inner-side2">'
            productsHtml += '<img class="single-product-delete" width="14" height="14" src="' + urls.plugin_url + '/assets/images/trash-can.png">';
            productsHtml += '</div>';
            productsHtml += '</div>';
            if (page === 'upsell') {
                productsHtml += '<div class="single-product-custom">';
                productsHtml += '<div class="custom-compare-price upsell-create-btn-price" id="upsell-create-btn-price-inp1">  <img src="' + urls.plugin_url + '/assets/images/subtract.png' + '" alt="" id="logo"><input class="custom-compare-price" type="text" placeholder="Custom Compare Price"></div>';
                productsHtml += '<div class="custom-price upsell-create-btn-price" id="upsell-create-btn-price-inp2">  <img src="' + urls.plugin_url + '/assets/images/subtract.png' + '" alt="" id="logo"><input class="custom-price"  type="text" placeholder="Custom Price"></div>';
                productsHtml += '<div class="default-quantity upsell-create-btn-price" id="upsell-create-btn-price-inp3">  <img src="' + urls.plugin_url + '/assets/images/plus.png' + '" alt="" id="logo"><input class="default-quantity" type="text" placeholder="Default Quantity"></div>';
                productsHtml += '<div class="discount upsell-create-btn-price" id="upsell-create-btn-price-inp4">  <img src="' + urls.plugin_url + '/assets/images/coupon.png' + '" alt="" id="logo"><input class="discount" type="text" placeholder="Discount"></div>';
            }
            productsHtml += '</div>';
            productsHtml += '</div>';
        });
        addedProductsCont.innerHTML = productsHtml;

        let deleteBtns = addedProductsCont.querySelectorAll('.single-product-delete');
        deleteBtns.forEach((deleteBtn) => {
            deleteBtn.addEventListener('click', function () {
                let id = deleteBtn.parentElement.parentElement.parentElement.id.slice(3);
                console.log(id);
                products = products.filter(product => product != id);
                let checks = document.querySelectorAll('.single-product-product input');
                let check = Array.from(checks).find(e => e.value == id);
                check.click();
                addedProductsCont.removeChild(deleteBtn.parentElement.parentElement.parentElement);
            });
        });
    });
}

function addCollectionsHTML() {

}

function prepopulateProductsTriggers(type, urls, nonces, page, argArray) {
    let modalAllProducts = [];
    if (type === 'product') {
        jQuery.ajax({
            url: urls.ajax_url,
            type: 'get',
            data: {
                action: 'ic_query_products',
                nonce: nonces.query_products,
                query: ''
            },
            success: function (response) {
                modalAllProducts = JSON.parse(response);
                if (type === 'collection') {
                    addCollectionsHTML();
                } else {
                    console.log('wtf');
                    addTriggersAndProductsHTML(page, modalAllProducts, argArray);
                }
            }
        });
    } else if (type === 'trigger') {
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

                jQuery.ajax({
                    url: urls.ajax_url,
                    type: 'get',
                    data: {
                        action: 'ic_query_products',
                        nonce: nonces.query_products,
                        query: ''
                    },
                    success: function (response) {
                        modalAllProducts = JSON.parse(response);

                        addTriggersAndProductsHTML(page, modalAllProducts, argArray);
                        triggers.forEach((trigger) => {
                            document.querySelector('.single-product-trigger input[value="' + trigger.id + '"]').click();
                        });
                        addTriggers.click();
                        productsUs.forEach((product) => {
                            document.querySelector('.single-product-product input[value="' + product.id + '"]').click();
                        });
                        addProducts.click();
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
}

//adds event listener to all checks and returns list of everything pushed
function addCheckEventListeners(checkClass, selectedClass) {
    let checks = document.querySelectorAll(checkClass);
    let selected = document.querySelector(selectedClass);
    let triggers = [];
    checks.forEach((triggerCheck) => {
        triggerCheck.addEventListener('change', function () {
            let triggerId = this.value;
            if (this.checked) {
                triggers.push(triggerId);
            } else {
                triggers = triggers.filter(trigger => trigger != triggerId);
            }
            selected.innerText = triggers.length;
        });
    });
    return triggers;
}

function getUrlsFromModal() {
    return urls;
}



function addCancelEventListeners(cancelClass, checkClass, selectedClass) {
    let triggersCancel = document.querySelectorAll(cancelClass);
    let triggerChecks = document.querySelectorAll(checkClass);
    let triggersSelected = document.querySelector(selectedClass);
    triggersCancel.addEventListener('click', function () {
        triggers = [];
        triggerChecks.forEach((triggerCheck) => {
            triggerCheck.checked = false;
        });
        triggersSelected.innerText = triggers.length;
    });
}

function addSelectAllEventListeners(selectAllClass, checkClass, selectedClass) {
    let selectAllTriggers = document.querySelector(selectAllClass);
    let triggerChecks = document.querySelectorAll(checkClass);
    let triggersSelected = document.querySelector(selectedClass);
    selectAllTriggers.addEventListener('click', function () {
        triggerChecks.forEach((triggerCheck) => {
            if (!triggerCheck.checked) {
                triggerCheck.checked = true;
                triggers.push(triggerCheck.value);
            }
        });
        triggersSelected.innerText = triggers.length;
    });
}
