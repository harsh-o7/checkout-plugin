let divRows = document.querySelectorAll('.inner-row');
var startDate = moment().utc().format('YYYY-MM-DD');
var endDate = moment().utc().format('YYYY-MM-DD');
var startTime = moment().utc().format('HH:mm');
var endTime = moment().utc().format('HH:mm');
var allProducts = [];
let allCategories = [];
let triggers = [];
var products = [];
var products1 = [];
var products2 = [];
let categoriesTriggers = [];
let categoriesProducts = [];
let categoriesProducts1 = [];
let categoriesProducts2 = [];

//checks
let triggerChecks = document.querySelectorAll('.single-product-trigger input');
let productChecks = document.querySelectorAll('.single-product-product input');
let product1Checks = document.querySelectorAll('.single-product1-product input');
let product2Checks = document.querySelectorAll('.single-product2-product input');
let categoriesTriggersChecks = document.querySelectorAll('.single-category-trigger-product input');
let categoriesProductsChecks = document.querySelectorAll('.single-category-product-product input');
let categoriesProducts1Checks = document.querySelectorAll('.single-category-product1-product input');
let categoriesProducts2Checks = document.querySelectorAll('.single-category-product2-product input');

//selected
let triggersSelected = document.querySelector('p.triggers-selected span');
let productsSelected = document.querySelector('p.products-selected span');
let products1Selected = document.querySelector('p.products1-selected span');
let products2Selected = document.querySelector('p.products2-selected span');
let triggersCategoriesSelected = document.querySelector('.trigger-collection-selected span');
let productsCategoriesSelected = document.querySelector('.products-collection-selected span');
let products1CategoriesSelected = document.querySelector('.products1-collection-selected span');
let products2CategoriesSelected = document.querySelector('.products2-collection-selected span');

//selectAll
let selectAllTriggers = document.querySelector('.select-all-triggers');
let selectAllProducts1 = document.querySelector('.select-all-products1');
let selectAllProducts2 = document.querySelector('.select-all-products2');
let selectAllCategoriesTriggers = document.querySelector('.select-all-trigger-collections');
let selectAllCategoriesProducts = document.querySelector('.select-all-products-collections');
let selectAllCategoriesProducts1 = document.querySelector('.select-all-products1-collections');
let selectAllCategoriesProducts2 = document.querySelector('.select-all-products2-collections');

//searchInput
let searchTriggersInput = document.querySelector('input#search-us-triggers');
let searchProductsInput = document.querySelector('input#search-us-products');
let searchProducts1Input = document.querySelector('input#search-us1-products');
let searchProducts2Input = document.querySelector('input#search-us2-products');
let searchTriggersCategoriesInput = document.querySelector('input#search-us-trigger-categories');
let searchProductsCategoriesInput = document.querySelector('input#search-us-products-categories');
let searchProducts1CategoriesInput = document.querySelector('input#search-us-products1-categories');
let searchProducts2CategoriesInput = document.querySelector('input#search-us-products2-categories');

//cont
let triggersCont = document.querySelector('.triggers-middle');
let productsCont = document.querySelector('.products-middle');
let products1Cont = document.querySelector('.products1-middle');
let products2Cont = document.querySelector('.products2-middle');
let categoryTriggersCont = document.querySelector('.trigger-collections-middle');
let categoryProductsCont = document.querySelector('.products-collections-middle');
let categoryProducts1Cont = document.querySelector('.products1-collections-middle');
let categoryProducts2Cont = document.querySelector('.products2-collections-middle');

//cancelButton
let triggersCancel = document.querySelector('.triggers-modal .btn-secondary');
let products1Cancel = document.querySelector('.products1-modal .btn-secondary');
let products2Cancel = document.querySelector('.products2-modal .btn-secondary');
let categoriesTriggersCancel = document.querySelector('.trigger-categories-modal .btn-secondary');
let categoriesProductsCancel = document.querySelector('.products-categories-modal .btn-secondary');
let categoriesProducts1Cancel = document.querySelector('.products1-categories-modal .btn-secondary');
let categoriesProducts2Cancel = document.querySelector('.products2-categories-modal .btn-secondary');

//add button
let addTriggers = document.querySelector('.triggers-modal .add-triggers');
let addProducts = document.querySelector('.products-modal .add-products');
let addProducts1 = document.querySelector('.products1-modal .add-products1');
let addProducts2 = document.querySelector('.products2-modal .add-products2');
let addTriggersCategories = document.querySelector('.add-collection-trigger');
let addProductsCategories = document.querySelector('.add-collection-products');
let addProducts1Categories = document.querySelector('.add-collection-products1');
let addProducts2Categories = document.querySelector('.add-collection-products2');

//addCont
let addedTriggersCont = document.querySelector('.added-triggers-cont');
let addedProductsCont = document.querySelector('.added-products-cont');
let addedProducts1Cont = document.querySelector('.added-products1-cont');
let addedProducts2Cont = document.querySelector('.added-products2-cont');
let addedTriggersCategoriesCont = document.querySelector('.added-trigger-categories-cont');
let addedProductsCategoriesCont = document.querySelector('.added-products-categories-cont');
let addedProducts1CategoriesCont = document.querySelector('.added-products1-categories-cont');
let addedProducts2CategoriesCont = document.querySelector('.added-products2-categories-cont');


let input = 'input[name="disc-start-date"]';


var startStartDate = jQuery(input).val();
jQuery(input).daterangepicker({
    singleDatePicker: true,
    showDropdowns: true,
    minYear: 1901,
    startDate: startStartDate ? moment(startStartDate) : moment(),
    "autoApply": true,
    maxYear: parseInt(moment().format('YYYY'), 10)
}, function (start, end, label) {
    startDate = start.format('YYYY-MM-DD');
    jQuery('input[name="disc-end-date"]').data('daterangepicker').setStartDate(moment(startDate));
});

// jQuery(input).data('daterangepicker').setStartDate(moment());

var input1 = 'input[name="disc-end-date"]';
var startEndDate = jQuery(input1).val();


jQuery(input1).daterangepicker({
    singleDatePicker: true,
    showDropdowns: true,
    minYear: 1901,
    startDate: startEndDate ? moment(startEndDate) : moment(),
    "autoApply": true,
    maxYear: parseInt(moment().format('YYYY'), 10)
}, function (start, end, label) {
    endDate = start.format('YYYY-MM-DD');
});

// jQuery(input1).data('daterangepicker').setStartDate(moment());

input = 'input[name="disc-start-time"]';
var startStartTime = jQuery(input).val();

jQuery(input).daterangepicker({
    singleDatePicker: true,
    startTime: startStartTime ? moment(startStartTime) : moment(),
    timePicker: true,
    timePicker24Hour: true,
    timePickerIncrement: 1,
    timePickerSeconds: true,
    locale: {
        format: 'HH:mm:ss'
    }
}, function (start, end, label) {
    startTime = start.format('HH:mm:ss');
}).on('show.daterangepicker', function (ev, picker) {
    picker.container.find(".calendar-table").hide();
});

// jQuery(input).data('daterangepicker').setStartDate(moment());


input = 'input[name="disc-end-time"]';
var startEndTime = jQuery(input).val();
jQuery(input).daterangepicker({
    startTime: moment(startEndTime),
    singleDatePicker: true,
    timePicker: true,
    timePicker24Hour: true,
    timePickerIncrement: 1,
    timePickerSeconds: true,
    locale: {
        format: 'HH:mm:ss'
    }
}, function (start, end, label) {
    endTime = start.format('HH:mm:ss');
}).on('show.daterangepicker', function (ev, picker) {
    picker.container.find(".calendar-table").hide();
});

// jQuery(input).data('daterangepicker').setStartDate(moment());

function toggleTextOption(event) {
    let targetId = event.target.id;
    let target = document.getElementById(targetId + '-text');
    if (target) {
        target.classList.toggle('hidden');
    }
}

function displayDivOption(event) {
    let radioId = event.target.id;
    let radioName = event.target.name;

    if (radioName === 'disc-free-fields-radio') {
        return
    }
    let hideDivClass = '.row.second';
    let showDivClass = '.row.first';
    if (radioId === 'disc-buy-x') {
        hideDivClass = '.row.first';
        showDivClass = '.row.second';
    }
    document.querySelectorAll(showDivClass).forEach((div) => {
        div.removeAttribute('hidden');
    });
    document.querySelectorAll(hideDivClass).forEach((div) => {

        div.setAttribute('hidden', 'hidden');
    });
    if (radioId === 'disc-free-shipp') {
        document.querySelector('.exclude-rates').classList.remove('hidden')
        document.querySelector('.discount-value-row').classList.add('hidden')
    }else {
        document.querySelector('.exclude-rates').classList.add('hidden')
    }

    if (radioId === 'disc-percentage'){
        document.querySelector('.disc-value-input-percent').classList.remove('hidden');
        document.querySelector('.discount-value-row').classList.remove('hidden');
    }
    else {
        document.querySelector('.disc-value-input-percent').classList.add('hidden');
    }

    if (radioId === 'disc-fixed'){
        document.querySelector('.discount-value-row').classList.remove('hidden');
    }

    if (radioId === 'disc-free-shipp'  || radioId === 'disc-fixed'){
        document.querySelector('.disc-value-input-value').classList.remove('hidden')
        document.querySelector('.disc-value-input-value4').classList.remove('hidden')
    }
    else {
        document.querySelector('.disc-value-input-value').classList.add('hidden')
    }
}

//global code
divRows.forEach((divRow) => {
    divRow.addEventListener('change', function (event) {
        let type = event.target.type;
        event.preventDefault();
        if (type === 'checkbox') {
            toggleTextOption(event);
        }
        if (type === 'radio') {
            displayDivOption(event);
        }
    });
});


//checks
triggerChecks.forEach((triggerCheck) => {
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

product1Checks.forEach((productCheck) => {
    productCheck.addEventListener('change', function () {
        let productId = this.value;
        if (this.checked) {
            products1.push(productId);
        } else {
            products1 = products1.filter(product => product != productId);
        }
        products1Selected.innerText = products1.length;
    });
});

product2Checks.forEach((productCheck) => {
    productCheck.addEventListener('change', function () {
        let productId = this.value;
        if (this.checked) {
            products2.push(productId);
        } else {
            products2 = products2.filter(product => product != productId);
        }
        products2Selected.innerText = products2.length;
    });
});

categoriesTriggersChecks.forEach((categoryProductCheck) => {
    categoryProductCheck.addEventListener('change', function () {
        let categoryId = this.value;
        if (this.checked) {
            categoriesTriggers.push(categoryId);
        } else {
            categoriesTriggers = categoriesTriggers.filter(categoryProduct => categoryProduct != categoryId);
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

categoriesProducts1Checks.forEach((categoryProductCheck) => {
    categoryProductCheck.addEventListener('change', function () {
        let categoryId = this.value;
        if (this.checked) {
            categoriesProducts1.push(categoryId);
        } else {
            categoriesProducts1 = categoriesProducts1.filter(categoryProduct => categoryProduct != categoryId);
        }
        products1CategoriesSelected.innerText = categoriesProducts1.length;
    });
});

categoriesProducts2Checks.forEach((categoryProductCheck) => {
    categoryProductCheck.addEventListener('change', function () {
        let categoryId = this.value;
        if (this.checked) {
            categoriesProducts2.push(categoryId);
        } else {
            categoriesProducts2 = categoriesProducts2.filter(categoryProduct => categoryProduct != categoryId);
        }
        products2CategoriesSelected.innerText = categoriesProducts2.length;
    });
});

//selectAll
selectAllProducts1.addEventListener('click', function () {
    product1Checks.forEach((triggerCheck) => {
        if (!triggerCheck.checked) {
            triggerCheck.checked = true;
            products1.push(triggerCheck.value);
        }
    });
    products1Selected.innerText = products1.length;
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

selectAllProducts2.addEventListener('click', function () {
    product2Checks.forEach((triggerCheck) => {
        if (!triggerCheck.checked) {
            triggerCheck.checked = true;
            products2.push(triggerCheck.value);
        }
    });
    products2Selected.innerText = products2.length;
});

selectAllCategoriesTriggers.addEventListener('click', function () {
    categoriesTriggersChecks.forEach((categoryProductCheck) => {
        if (!categoryProductCheck.checked) {
            categoryProductCheck.checked = true;
            categoriesTriggers.push(categoryProductCheck.value);
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

selectAllCategoriesProducts1.addEventListener('click', function () {
    categoriesProducts1Checks.forEach((categoryProductCheck) => {
        if (!categoryProductCheck.checked) {
            categoryProductCheck.checked = true;
            categoriesProducts1.push(categoryProductCheck.value);
        }
    });
    products1CategoriesSelected.innerText = categoriesProducts1.length;
});

selectAllCategoriesProducts2.addEventListener('click', function () {
    categoriesProducts2Checks.forEach((categoryProductCheck) => {
        if (!categoryProductCheck.checked) {
            categoryProductCheck.checked = true;
            categoriesProducts2.push(categoryProductCheck.value);
        }
    });
    products2CategoriesSelected.innerText = categoriesProducts2.length;
});

//cancel
triggersCancel.addEventListener('click', function () {
    triggers = [];
    triggerChecks.forEach((triggerCheck) => {
        triggerCheck.checked = false;
    });
    triggersSelected.innerText = triggers.length;
});

products1Cancel.addEventListener('click', function () {
    products1 = [];
    product1Checks.forEach((triggerCheck) => {
        triggerCheck.checked = false;
    });
    products1Selected.innerText = products1.length;
});

products2Cancel.addEventListener('click', function () {
    products2 = [];
    product2Checks.forEach((triggerCheck) => {
        triggerCheck.checked = false;
    });
    products1Selected.innerText = products1.length;
});

categoriesTriggersCancel.addEventListener('click', function () {
    categoriesTriggers = [];
    categoriesTriggersChecks.forEach((categoryProductCheck) => {
        categoryProductCheck.checked = false;
    });
    triggersCategoriesSelected.innerText = categoriesTriggers.length;
})

categoriesProductsCancel.addEventListener('click', function () {
    categoriesProducts = [];
    categoriesProductsChecks.forEach((categoryProductCheck) => {
        categoryProductCheck.checked = false;
    });
    products1CategoriesSelected.innerText = categoriesProducts.length;
})

categoriesProducts1Cancel.addEventListener('click', function () {
    categoriesProducts1 = [];
    categoriesProducts1Checks.forEach((categoryProductCheck) => {
        categoryProductCheck.checked = false;
    });
    products1CategoriesSelected.innerText = categoriesProducts1.length;
})

categoriesProducts2Cancel.addEventListener('click', function () {
    categoriesProducts2 = [];
    categoriesProducts2Checks.forEach((categoryProductCheck) => {
        categoryProductCheck.checked = false;
    });
    products2CategoriesSelected.innerText = categoriesProducts2.length;
})

function prepopulateProductsTriggers() {
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

}

function addTriggersAndProductsHTML() {
    //products
    addTriggers.addEventListener('click', function () {
        let triggersHtml = '';
        triggers.forEach((trigger) => {
            let product = allProducts.find(e => e.ID == trigger);
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
            let pr = allProducts.find(e => e.ID == product);
            productsHtml += '<div class="single-product" id="id-' + pr.ID + '">';
            productsHtml += '<div class="single-product-inner">';
            productsHtml += '<div class="single-product-inner-side1">'
            productsHtml += '<img src="' + pr.image + '" width="32" height="32" />';
            productsHtml += '<div class="single-product-title">' + pr.title + '</div>';
            productsHtml += '</div>';
            productsHtml += '<div class="single-product-inner-side2">'
            productsHtml += '<img class="single-product-delete" width="14" height="14" src="' + urls.plugin_url + '/assets/images/trash-can.png">';
            productsHtml += '</div>';
            productsHtml += '</div>';
            productsHtml += '</div>';
        });
        addedProductsCont.innerHTML = productsHtml;

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


    //products1
    addProducts1.addEventListener('click', function () {
        let products1Html = '';
        products1.forEach((product) => {
            let pr = allProducts.find(e => e.ID == product);
            products1Html += '<div class="single-product1" id="id-' + pr.ID + '">';
            products1Html += '<div class="single-product1-inner">';
            products1Html += '<div class="single-product1-inner-side1">'
            products1Html += '<img src="' + pr.image + '" width="32" height="32" />';
            products1Html += '<div class="single-product1-title">' + pr.title + '</div>';
            products1Html += '</div>';
            products1Html += '<div class="single-product1-inner-side2">'
            products1Html += '<img class="single-product1-delete" width="14" height="14" src="' + urls.plugin_url + '/assets/images/trash-can.png">';
            products1Html += '</div>';
            products1Html += '</div>';
            products1Html += '</div>';
        });
        addedProducts1Cont.innerHTML = "";
        addedProducts1Cont.innerHTML = products1Html;

        let deleteBtns = addedProducts1Cont.querySelectorAll('.single-product1-delete');
        deleteBtns.forEach((deleteBtn) => {
            deleteBtn.addEventListener('click', function () {
                let id = deleteBtn.parentElement.parentElement.parentElement.id.slice(3);
                products1 = products1.filter(product => product != id);
                let checks = document.querySelectorAll('.single-product1-product input');
                let check = Array.from(checks).find(e => e.value == id);
                check.click();
                addedProducts1Cont.removeChild(deleteBtn.parentElement.parentElement.parentElement);
            });
        });
    });


    //products2
    addProducts2.addEventListener('click', function () {
        let products2Html = '';
        products2.forEach((product) => {
            let pr = allProducts.find(e => e.ID == product);
            products2Html += '<div class="single-product2" id="id-' + pr.ID + '">';
            products2Html += '<div class="single-product2-inner">';
            products2Html += '<div class="single-product2-inner-side1">'
            products2Html += '<img src="' + pr.image + '" width="32" height="32" />';
            products2Html += '<div class="single-product2-title">' + pr.title + '</div>';
            products2Html += '</div>';
            products2Html += '<div class="single-product2-inner-side2">'
            products2Html += '<img class="single-product2-delete" width="14" height="14" src="' + urls.plugin_url + '/assets/images/trash-can.png">';
            products2Html += '</div>';
            products2Html += '</div>';
            products2Html += '</div>';
        });
        addedProducts2Cont.innerHTML = "";
        addedProducts2Cont.innerHTML = products2Html;

        let deleteBtns = addedProducts2Cont.querySelectorAll('.single-product2-delete');
        deleteBtns.forEach((deleteBtn) => {
            deleteBtn.addEventListener('click', function () {
                let id = deleteBtn.parentElement.parentElement.parentElement.id.slice(3);
                products2 = products2.filter(product => product != id);
                let checks = document.querySelectorAll('.single-product2-product input');
                let check = Array.from(checks).find(e => e.value == id);
                check.click();
                addedProducts2Cont.removeChild(deleteBtn.parentElement.parentElement.parentElement);
            });
        });
    });

    addTriggersCategories.addEventListener('click', function () {
        let productsCategoriesHtml = '';
        categoriesTriggers.forEach((categoryProduct) => {
            let ct = allCategories.find(e => e.term_id == categoryProduct);
            productsCategoriesHtml += '<div class="single-trigger-collection" id="id-' + ct.term_id + '">';
            productsCategoriesHtml += '<div class="single-trigger-collection-left-col">';
            productsCategoriesHtml += '<img src="' + urls.plugin_url + '/assets/images/woocommerce-placeholder.png' + '" width="32" height="32" />';
            productsCategoriesHtml += '<div class="single-trigger-collection-title">' + ct.name + '</div>';
            productsCategoriesHtml += '</div>';
            productsCategoriesHtml += '<div class="single-trigger-collection-right-col">';
            productsCategoriesHtml += '<img class="single-trigger-collection-delete" width="14" height="14" src="' + urls.plugin_url + '/assets/images/trash-can.png">';
            productsCategoriesHtml += '</div>';
            productsCategoriesHtml += '</div>';
        });
        addedTriggersCategoriesCont.innerHTML = productsCategoriesHtml;

        let deleteBtns = addedTriggersCategoriesCont.querySelectorAll('.single-trigger-collection-delete');
        deleteBtns.forEach((deleteBtn) => {
            deleteBtn.addEventListener('click', function () {
                let id = deleteBtn.parentElement.parentElement.id.slice(3);
                categoriesTriggers = categoriesTriggers.filter(categoryProduct => categoryProduct != id);
                let checks = document.querySelectorAll('.single-category-trigger-product input');
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

    addProducts1Categories.addEventListener('click', function () {
        let productsCategoriesHtml = '';
        categoriesProducts1.forEach((categoryProduct) => {
            let ct = allCategories.find(e => e.term_id == categoryProduct);
            productsCategoriesHtml += '<div class="single-products1-collection" id="id-' + ct.term_id + '">';
            productsCategoriesHtml += '<div class="single-products1-collection-left-col">';
            productsCategoriesHtml += '<img src="' + urls.plugin_url + '/assets/images/woocommerce-placeholder.png' + '" width="32" height="32" />';
            productsCategoriesHtml += '<div class="single-products1-collection-title">' + ct.name + '</div>';
            productsCategoriesHtml += '</div>';
            productsCategoriesHtml += '<div class="single-products1-collection-right-col">';
            productsCategoriesHtml += '<img class="single-products1-collection-delete" width="14" height="14" src="' + urls.plugin_url + '/assets/images/trash-can.png">';
            productsCategoriesHtml += '</div>';
            productsCategoriesHtml += '</div>';
        });
        addedProducts1CategoriesCont.innerHTML = productsCategoriesHtml;

        let deleteBtns = addedProducts1CategoriesCont.querySelectorAll('.single-products1-collection-delete');
        deleteBtns.forEach((deleteBtn) => {
            deleteBtn.addEventListener('click', function () {
                let id = deleteBtn.parentElement.parentElement.id.slice(3);
                categoriesProducts1 = categoriesProducts1.filter(categoryProduct => categoryProduct != id);
                let checks = document.querySelectorAll('.single-category-product1-product input');
                let check = Array.from(checks).find(e => e.value == id);
                check.click();
                addedProducts1CategoriesCont.removeChild(deleteBtn.parentElement.parentElement);
            });
        });
    });

    addProducts2Categories.addEventListener('click', function () {
        let productsCategoriesHtml = '';
        categoriesProducts2.forEach((categoryProduct) => {
            let ct = allCategories.find(e => e.term_id == categoryProduct);
            productsCategoriesHtml += '<div class="single-products2-collection" id="id-' + ct.term_id + '">';
            productsCategoriesHtml += '<div class="single-products2-collection-left-col">';
            productsCategoriesHtml += '<img src="' + urls.plugin_url + '/assets/images/woocommerce-placeholder.png' + '" width="32" height="32" />';
            productsCategoriesHtml += '<div class="single-products2-collection-title">' + ct.name + '</div>';
            productsCategoriesHtml += '</div>';
            productsCategoriesHtml += '<div class="single-products2-collection-right-col">';
            productsCategoriesHtml += '<img class="single-products2-collection-delete" width="14" height="14" src="' + urls.plugin_url + '/assets/images/trash-can.png">';
            productsCategoriesHtml += '</div>';
            productsCategoriesHtml += '</div>';
        });
        addedProducts2CategoriesCont.innerHTML = productsCategoriesHtml;

        let deleteBtns = addedProducts2CategoriesCont.querySelectorAll('.single-products2-collection-delete');
        deleteBtns.forEach((deleteBtn) => {
            deleteBtn.addEventListener('click', function () {
                let id = deleteBtn.parentElement.parentElement.id.slice(3);
                categoriesProducts2 = categoriesProducts2.filter(categoryProduct => categoryProduct != id);
                let checks = document.querySelectorAll('.single-category-product2-product input');
                let check = Array.from(checks).find(e => e.value == id);
                check.click();
                addedProducts2CategoriesCont.removeChild(deleteBtn.parentElement.parentElement);
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
                        newHtml += '<img width="32" height="32" src="#" alt="">';
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

//products1
    searchProducts1Input.addEventListener('input', function () {
        jQuery.ajax({
            url: urls.ajax_url,
            type: 'get',
            data: {
                action: 'ic_query_products',
                nonce: nonces.query_products,
                exclude: [],
                query: searchProducts1Input.value
            },
            success: function (response) {
                let searchProducts1 = JSON.parse(response);
                let newHtml = '';
                searchProducts1.forEach((product) => {
                    newHtml += '<div class="single-product1-product">';
                    newHtml += '<input type="checkbox" value="' + product.ID + '"';

                    if (products1.includes(product.ID)) {
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

                products1Cont.innerHTML = '';
                products1Cont.innerHTML = newHtml;

                document.querySelectorAll('.single-product1-product input').forEach((productCheck) => {
                    productCheck.addEventListener('change', function () {
                        let productId = this.value;
                        if (this.checked) {
                            products1.push(productId);
                        } else {
                            products1 = products1.filter(product => product != productId);
                        }
                        products1Selected.innerText = products1.length;
                    });
                });
            }
        });
    });

//products2

    searchProducts2Input.addEventListener('input', function () {
        jQuery.ajax({
            url: urls.ajax_url,
            type: 'get',
            data: {
                action: 'ic_query_products',
                nonce: nonces.query_products,
                exclude: [],
                query: searchProducts1Input.value
            },
            success: function (response) {
                let searchProducts2 = JSON.parse(response);
                let newHtml = '';
                searchProducts2.forEach((product) => {
                    newHtml += '<div class="single-product2-product">';
                    newHtml += '<input type="checkbox" value="' + product.ID + '"';

                    if (products2.includes(product.ID)) {
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

                products2Cont.innerHTML = '';
                products2Cont.innerHTML = newHtml;

                document.querySelectorAll('.single-product2-product input').forEach((productCheck) => {
                    productCheck.addEventListener('change', function () {
                        let productId = this.value;
                        if (this.checked) {
                            products2.push(productId);
                        } else {
                            products2 = products2.filter(product => product != productId);
                        }
                        products2Selected.innerText = products2.length;
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
                    newHtml += '<div class="single-category-trigger-product">';
                    newHtml += '<input type="checkbox" value="' + category.term_id + '"';
                    if (categoriesTriggers.includes(category.term_id)) {
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

                document.querySelectorAll('.single-category-trigger-product input').forEach((productCategoryCheck) => {
                    productCategoryCheck.addEventListener('change', function () {
                        let categoryId = this.value;
                        if (this.checked) {
                            categoriesTriggers.push(categoryId);
                        } else {
                            categoriesTriggers = categoriesTriggers.filter(categoryProduct => categoryProduct != categoryId);
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
                    if (categoriesProducts.includes(category.term_id)) {
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

    searchProducts1CategoriesInput.addEventListener('input', function () {
        jQuery.ajax({
            url: urls.ajax_url,
            type: 'get',
            data: {
                action: 'ic_query_product_categories',
                nonce: nonces.query_product_categories,
                query_categories: searchProducts1CategoriesInput.value
            },
            success: function (response) {
                let searchCategories = JSON.parse(response);
                let newHtml = '';
                searchCategories.forEach((category) => {
                    newHtml += '<div class="single-category-product1-product">';
                    newHtml += '<input type="checkbox" value="' + category.term_id + '"';
                    if (categoriesProducts1.includes(category.term_id)) {
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

                categoryProducts1Cont.innerHTML = '';
                categoryProducts1Cont.innerHTML = newHtml;

                document.querySelectorAll('.single-category-product1-product input').forEach((productCategoryCheck) => {
                    productCategoryCheck.addEventListener('change', function () {
                        let categoryId = this.value;
                        if (this.checked) {
                            categoriesProducts1.push(categoryId);
                        } else {
                            categoriesProducts1 = categoriesProducts1.filter(categoryProduct => categoryProduct != categoryId);
                        }
                        products1CategoriesSelected.innerText = categoriesProducts1.length;
                    });
                });
            }
        });
    });

    searchProducts2CategoriesInput.addEventListener('input', function () {
        jQuery.ajax({
            url: urls.ajax_url,
            type: 'get',
            data: {
                action: 'ic_query_product_categories',
                nonce: nonces.query_product_categories,
                query_categories: searchProducts2CategoriesInput.value
            },
            success: function (response) {
                let searchCategories = JSON.parse(response);
                let newHtml = '';
                searchCategories.forEach((category) => {
                    newHtml += '<div class="single-category-product2-product">';
                    newHtml += '<input type="checkbox" value="' + category.term_id + '"';
                    if (categoriesProducts2.includes(category.term_id)) {
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

                categoryProducts2Cont.innerHTML = '';
                categoryProducts2Cont.innerHTML = newHtml;

                document.querySelectorAll('.single-category-product2-product input').forEach((productCategoryCheck) => {
                    productCategoryCheck.addEventListener('change', function () {
                        let categoryId = this.value;
                        if (this.checked) {
                            categoriesProducts2.push(categoryId);
                        } else {
                            categoriesProducts2 = categoriesProducts2.filter(categoryProduct => categoryProduct != categoryId);
                        }
                        products2CategoriesSelected.innerText = categoriesProducts2.length;
                    });
                });
            }
        });
    });

}

prepopulateProductsTriggers();


jQuery(".chkbtn").change(function () {
    if (this.checked) {
        jQuery(".chkbtn").not(this).prop('checked', false);
    }
});


function gatherData() {
    let title = document.querySelector('#disc-title').value;
    let maximumDiscountUsageChecked = document.querySelector('#disc-max-usage').checked ? 1 : 0;
    let maximumDiscountUsage = document.querySelector('#disc-max-usage').checked ? document.querySelector('#disc-max-usage-text').value : null;
    //startDate and startTime already in correct format

    // var startDateInput = moment().utc().format('YYYY-MM-DD');
    // var endDate = moment().utc().format('YYYY-MM-DD');
    // var startTime = moment().utc().format('HH:mm');
    // var endTime = moment().utc().format('HH:mm');

    let endDatesChecked = document.querySelector('#disc-set-end').checked ? 1 : 0;
    if (! endDatesChecked) {
        endDate = null;
        endTime = null;
    }
    let dates = {
        'start_date': startDate,
        'start_time': startTime,
        'end_date': endDate,
        'end_time': endTime
    };

    let discountTypeRadios = document.getElementsByName('disc-radio');
    let discountType = null;
    discountTypeRadios.forEach((radio) => {
        if (radio.checked) {
            discountType = radio.id;
        }
    });

    if (discountType === 'disc-buy-x') {
        var selectedProducts = triggers;
        var selectedCategories = categoriesTriggers;
        var radioButtonsCustomerGets = document.getElementsByName('disc-free-fields-radio');
        var customerGets = null;
        radioButtonsCustomerGets.forEach((radio) => {
            if (radio.checked) {
                customerGets = radio.id.split('-')[1];
            }
        });
        var howManyItemsCustomerGets = document.querySelector('#disc-num-of-items').value;
        var productsCustomerGets = products;
        var categoriesCustomerGets = categoriesProducts;
        var minQuantityPerCustomerChecked = document.querySelector('#disc-applies-min-quantity-reached').checked ? 1 : 0;
        var minQuantityPerCustomer = document.querySelector('#disc-applies-min-quantity-reached').checked ? document.querySelector('.disc-min-quantity-xy-reached-input').value : null;

        var minimumAmountReachedAppliedChecked = document.querySelector('#disc-applies-min-amount-reached').checked ? 1 : 0;
        var minimumAmountReachedApplied = document.querySelector('#disc-min-amount-reached-input').value;
        var maximumDiscountUsageAppliesChecked = document.querySelector('#disc-maximum-usage-set').checked ? 1 : 0;
        var maximumDiscountUsageApplies = document.querySelector('#disc-max-amount-reached-input').value;
        var buyXgetYType = null;
        if(document.querySelector('input#disc-free-field-checkbox').checked) {
            buyXgetYType = 'free';
        } else if(document.querySelector('input#disc-percentage-field-checkbox').checked) {
            buyXgetYType = document.querySelector('input#buyxy-percentage').value;
        }
    }

    let buyXgetYdata = {
        'selected_products': selectedProducts,
        'selected_categories': selectedCategories,
        'customer_gets': customerGets,
        'categories_customer_gets': categoriesCustomerGets,
        'how_many_items_customer_gets': howManyItemsCustomerGets,
        'products_customer_gets': productsCustomerGets,
        //change it to minimumQuantityPerCustomer
        'maximum_usage_per_customer_checked': minQuantityPerCustomerChecked,
        'maximum_usage_per_customer': minQuantityPerCustomer,
        'minimum_amount_reached_checked': minimumAmountReachedAppliedChecked,
        'minimum_amount_reached': minimumAmountReachedApplied,
        'maximum_usage_checked': maximumDiscountUsageAppliesChecked,
        'maximum_usage': maximumDiscountUsageApplies,
        'type': buyXgetYType
    };
    let discountValue = document.querySelector('#disc-value').value;

    var minimumQuantityReachedChecked = document.querySelector('#disc-min-quantity-reached').checked ? 1 : 0;
    var minimumQuantityReached = document.querySelector('#disc-min-quantity-reached').checked ? document.querySelector('#disc-min-quantity-reached-input').value : null;
    var minimumAmountReachedChecked = document.querySelector('#disc-min-amount-reached').checked ? 1 : 0 ;
    let minimumAmmountReached = document.querySelector('#disc-min-amount-reached').checked ? document.querySelector('#disc-min-amount-reached-input').value : null;
    let individualUse = document.querySelector('#disc-individual-use').checked ? 1 : 0;
    var excludeSaleItemsChecked = document.querySelector('#disc-exclude-items').checked ? 1 : 0;
    let excludeSaleItems = document.querySelector('#disc-exclude-items').checked ? products1 : null;
    let excludeSaleCategoryItems = document.querySelector('#disc-exclude-items').checked ? categoriesProducts1 : null;
    let enitreOrder = document.querySelector('#disc-entire-order').checked ? 1 : 0;
    var specificProductsChecked = document.querySelector('#disc-specific-products').checked ? 1 : 0;
    let specificProducts = document.querySelector('#disc-specific-products').checked ? products2 : null;
    let specificCategories = document.querySelector('#disc-specific-products').checked ? categoriesProducts2 : null;
    var excludeShippingChecked = document.querySelector('#disc-exclude-shipping').checked ? 1 : 0;
    var excludeShipping = document.querySelector('#disc-exclude-shipping').checked ? document.querySelector('#disc-exclude-shipping-text input').value : null;
    let activeInput = document.querySelector('.active-status');
    let active = false;
    if(activeInput) {
        active = true;
    }
    return {
        'title': title,
        'maximumDiscountUsageChecked': maximumDiscountUsageChecked,
        'maximumDiscountUsage': maximumDiscountUsage,
        'endDatesChecked': endDatesChecked,
        'dates': dates,
        'discountType': discountType,
        'discountValue': discountValue,
        'minimumQuantityReachedChecked': minimumQuantityReachedChecked,
        'minimumQuantityReached': minimumQuantityReached,
        'minimumAmountReachedChecked': minimumAmountReachedChecked,
        'minimumAmountReached': minimumAmmountReached,
        'excludeShippingChecked': excludeShippingChecked,
        'excludeShipping': excludeShipping,
        'individualUse': individualUse,
        'excludeSaleItemsChecked': excludeSaleItemsChecked,
        'excludeSaleItems': excludeSaleItems,
        'excludeSaleCategoryItems': excludeSaleCategoryItems,
        'entireOrder': enitreOrder,
        'specificProductsChecked': specificProductsChecked,
        'specificProducts': specificProducts,
        'specificCategories': specificCategories,
        'buyXgetYdata': buyXgetYdata,
        'active': active

    };
}


let createDiscountButton = document.querySelector('#create-discount-button');

if (createDiscountButton) {
    createDiscountButton.addEventListener('click', function (event) {
        event.preventDefault();
        let data = gatherData();
        jQuery.ajax({
            url: urls.ajax_url,
            type: 'post',
            data: {
                action: 'ic_create_discount',
                nonce: nonces.create_discount,
                data: data
            },
            success: function (response) {
                let success =  response.trim().replace(" ", "") === "success";
                let successMessage = 'Discount created successfully!';
                let failureMessage = 'Discount creation failed!';
                swalCaller(success, successMessage, failureMessage, '#wpbody-content');
            }
        });
    });
}

function checkElementsAndApply(elements, classDiv, applyQueryElement) {
    if (elements.length === 0) {
        return;
    }
    elements.forEach((el) => {
        document.querySelector(classDiv + ' input[value="' + el + '"]').click();
    });
    if (applyQueryElement) {
        applyQueryElement.click();
    }
}

//having updateButton we will have different funcionalitys
let updateDiscountButton = document.querySelector('#update-discount-button');
if (updateDiscountButton) {
    let discountId = updateDiscountButton.dataset.discountId;
    jQuery.ajax({
        url: urls.ajax_url,
        type: 'get',
        data: {
            action: 'ic_discount_get_products_triggers',
            nonce: nonces.get_products_triggers,
            discountId: discountId
        },
        success: function (response) {
            let data = JSON.parse(response);
            let excludeSaleItems = data.exculdeSaleItems;
            let excludeSaleCategoryItems = data.excludeSaleCategoryItems;
            let specificProducts = data.specificProducts;
            let specificCategories = data.specificCategories;
            let selectedProducts = data.buyXgetYSelectedProducts;
            let buyXgetYSelectedCategories = data.buyXgetYSelectedCategories;
            let productsCustomerGets = data.buyXgetYCustomerGets;
            let buyXgetYCustomerGetsCategories = data.buyXgetYCustomerGetsCategories;

            setTimeout(function() {
                checkElementsAndApply(excludeSaleItems,
                    '.single-product1-product',
                    document.querySelector('.add-products1.upsell-create-modal-btn-add'));

                checkElementsAndApply(specificProducts,
                    '.single-product2-product',
                    document.querySelector('.add-products2.upsell-create-modal-btn-add'));

                checkElementsAndApply(selectedProducts,
                    '.single-product-trigger',
                    document.querySelector('.add-triggers.upsell-create-modal-btn-add'));

                checkElementsAndApply(productsCustomerGets,
                    '.single-product-product',
                    document.querySelector('.add-products.upsell-create-modal-btn-add'));

                checkElementsAndApply(excludeSaleCategoryItems,
                    '.single-category-product1-product',
                    document.querySelector('.add-collection-products1.upsell-create-modal-btn-add'));

                checkElementsAndApply(specificCategories,
                    '.single-category-product2-product',
                    document.querySelector('.add-collection-products2.upsell-create-modal-btn-add'));

                checkElementsAndApply(buyXgetYSelectedCategories,
                    '.single-category-trigger-product',
                    document.querySelector('.add-collection-trigger.upsell-create-modal-btn-add'));

                checkElementsAndApply(buyXgetYCustomerGetsCategories,
                    '.single-category-product-product',
                    document.querySelector('.add-collection-products.upsell-create-modal-btn-add'));
            }, 1000);


        }
    })

    updateDiscountButton.addEventListener('click', function (event) {
        event.preventDefault();
        let data = gatherData();
        jQuery.ajax({
            url: urls.ajax_url,
            type: 'post',
            data: {
                action: 'ic_update_discount',
                nonce: nonces.update_discount,
                data: data,
                discountId: discountId
            },
            success: function (response) {
                let success =  response.trim().replace(" ", "") === "success";
                let successMessage = 'Discount updated successfully!';
                let failureMessage = 'Discount update failed!';
                swalCaller(success, successMessage, failureMessage, '#wpbody-content');
            }
        });
    });
}


function swalCaller(success, sucMessage, failMessage, id='#wpbody-content') {
    if (success) {
        jQuery(id).ajaxSubmit({
            success: function () {
                swal({
                    title: 'Success',
                    text: sucMessage,
                    icon: 'success',
                    button: 'OK'
                }).then((value) => {
                    window.location.replace(urls.discounts_url);
                });
            }
        });
    } else {
        swal({
            title: 'Error',
            text: failMessage,
            icon: 'error',
            button: 'Ok'
        }).then((value) => {
            location.reload();
        })
    }
}

let minimumQuantityInput = document.querySelector('input#disc-min-quantity-reached');
let minimumAmountInput = document.querySelector('input#disc-min-amount-reached');
minimumQuantityInput.addEventListener('click', function() {
    if(minimumAmountInput.checked) {
        minimumAmountInput.checked = false;
        document.querySelector('div#disc-min-amount-reached-text').classList.add('hidden');
        document.querySelector('div#summary-minmax span').innerHTML = 'Minimum quantity reached in cart of <strong>' + document.querySelector('input#disc-min-quantity-reached-input').value + '</strong> items';
    } else {
        this.click();
    }
    if(minimumQuantityInput.checked) {
        document.querySelector('div#summary-minmax span').innerHTML = 'Minimum quantity reached in cart of <strong>' + document.querySelector('input#disc-min-quantity-reached-input').value + '</strong> items';
    }
    if(!minimumAmountInput.checked && !minimumQuantityInput.checked) {
        document.querySelector('div#summary-minmax span').innerHTML = '';
    }
});

let minQuantityReachedInput = document.querySelector('input#disc-min-quantity-reached-input');
minQuantityReachedInput.addEventListener('input', function() {
    document.querySelector('div#summary-minmax span').innerHTML = 'Minimum quantity reached in cart of <strong>' + this.value + '</strong> items';
});

minimumAmountInput.addEventListener('click', function() {
    if(minimumQuantityInput.checked) {
        minimumQuantityInput.checked = false;
        document.querySelector('div#disc-min-quantity-reached-text').classList.add('hidden');
        document.querySelector('div#summary-minmax span').innerHTML = 'Minimum amount reached in cart of <strong>' + document.querySelector('input#disc-min-amount-reached-input').value + info.currency + '</strong>';
    } else {
        this.click();
    }
    if(minimumAmountInput.checked) {
        document.querySelector('div#summary-minmax span').innerHTML = 'Minimum amount reached in cart of <strong>' + document.querySelector('input#disc-min-amount-reached-input').value + info.currency + '</strong>';
    }
    if(!minimumAmountInput.checked && !minimumQuantityInput.checked) {
        document.querySelector('div#summary-minmax span').innerHTML = '';
    }
});

let minAmountReachedInput = document.querySelector('input#disc-min-amount-reached-input');
minAmountReachedInput.addEventListener('input', function() {
    document.querySelector('div#summary-minmax span').innerHTML = 'Minimum amount reached in cart of <strong>' + this.value + info.currency + '</strong>';
});

let minimumQuantityInputXY = document.querySelector('input.disc-applies-min-quantity-xy-reached');
let minimumAmountInputXY = document.querySelector('input.disc-applies-min-amount-xy-reached');
minimumQuantityInputXY.addEventListener('click', function() {
    if(minimumAmountInputXY.checked) {
        minimumAmountInputXY.checked = false;
        document.querySelector('.disc-min-amount-xy-reached-input').classList.add('hidden');
        document.querySelector('div#summary-minmax span').innerHTML = 'Minimum quantity reached in cart of ' + document.querySelector('input.disc-min-quantity-xy-reached-input').value + ' items';
    } else {
        this.click();
    }
});

minimumAmountInputXY.addEventListener('click', function() {
    if(minimumQuantityInputXY.checked) {
        minimumQuantityInputXY.checked = false;
        document.querySelector('div.disc-min-quantity-reached-input').classList.add('hidden');
        document.querySelector('div#summary-minmax span').innerHTML = 'Minimum amount reached in cart of ' + document.querySelector('input.disc-min-amount-xy-reached-input').value + info.currency;
    } else {
        this.click();
    }
});

let types = document.querySelectorAll('.inner-type-disc input');
types.forEach((type) => {
   type.addEventListener('click', function() {
       let value = document.querySelector('input#disc-value').value;
       if(type.id == 'disc-percentage') {
           document.querySelector('div#summary-discounted span').innerHTML = 'Discounted <strong>' + value + '% </strong>';
       } else if(type.id == 'disc-fixed') {
           document.querySelector('div#summary-discounted span').innerHTML = 'Discounted <strong>' + value + info.currency + '</strong>';
       } else {
           document.querySelector('div#summary-discounted span').innerHTML = '';
       }
       document.querySelector('div#summary-percentage span').innerHTML = '<strong>' + type.parentElement.querySelector('label').innerText + '</strong>';
   });
});

jQuery('input[name="disc-start-date"]').on('apply.daterangepicker', function(ev, picker) {
    let activeFrom = picker.startDate._d.toLocaleDateString('en-US');
    let setEndDate = document.querySelector('.disc-set-end-date input').checked;
    if(!setEndDate) {
        document.querySelector('div#summary-date span').innerHTML = 'Active from <strong>' + activeFrom + '</strong>';
    } else {
        let activeTo = jQuery('input[name="disc-end-date"]').data('daterangepicker').startDate._i;
        document.querySelector('div#summary-date span').innerHTML = 'Active from <strong>' + activeFrom + '</strong> to <strong>' + activeTo + '</strong>';
    }
});

jQuery('input[name="disc-end-date"]').on('apply.daterangepicker', function(ev, picker) {
    let activeFrom = jQuery('input[name="disc-start-date"]').data('daterangepicker').startDate._d.toLocaleDateString('en-US');
    let activeTo = picker.startDate._d.toLocaleDateString('en-US');
    document.querySelector('div#summary-date span').innerHTML = 'Active from <strong>' + activeFrom + '</strong> to <strong>' + activeTo + '</strong>';
});

let setEndDateInput = document.querySelector('input#disc-set-end');
setEndDateInput.addEventListener('click', function() {
    let activeFrom = jQuery('input[name="disc-start-date"]').data('daterangepicker').startDate._d.toLocaleDateString('en-US');
    let activeTo = jQuery('input[name="disc-end-date"]').data('daterangepicker').startDate._i;

    if(this.checked) {
        document.querySelector('div#summary-date span').innerHTML = 'Active from <strong>' + activeFrom + '</strong> to <strong>' + activeTo + '</strong>';
    } else {
        document.querySelector('div#summary-date span').innerHTML = 'Active from <strong>' + activeFrom + '</strong>';
    }
});

function getTypeId(types) {
    let id = '';
    types.forEach((type) => {
        if(type.checked) {
            id = type.id;
        }
    });
    return id;
}

let discValueInput = document.querySelector('input#disc-value');
discValueInput.addEventListener('input', function() {
    let typeId = getTypeId(types);
    if(typeId == 'disc-percentage') {
        document.querySelector('div#summary-discounted span').innerHTML = 'Discounted <strong>' + this.value + '%</strong>';
    } else if(typeId == 'disc-fixed') {
        document.querySelector('div#summary-discounted span').innerHTML = 'Discounted <strong>' + this.value + info.currency + '</strong>';
    } else {
        document.querySelector('div#summary-discounted span').innerHTML = '';
    }
});

let specificProductsAndCollections = document.querySelector('input#disc-specific-products');
let entireOrderInput = document.querySelector('input#disc-entire-order');
entireOrderInput.addEventListener('click', function() {
    if(this.checked) {
        document.querySelector('div#summary-type-order span').innerHTML = '<strong>Entire order</strong>';
    } else {
        document.querySelector('div#summary-type-order span').innerText = ''
        this.click();
    }
    if(specificProductsAndCollections.checked) {
        document.querySelector('.disc-specific-products-text').classList.add('hidden');
    }
});

let individualUseInput = document.querySelector('input#disc-individual-use');
individualUseInput.addEventListener('click', function() {
    if(this.checked) {
        document.querySelector('.individual-box').style.display = 'block';
    } else {
        document.querySelector('.individual-box').style.display = 'none';
    }
});

let excludeSaleItemsInput = document.querySelector('input#disc-exclude-items');
excludeSaleItemsInput.addEventListener('click', function () {
    if(this.checked) {
        document.querySelector('div#summary-exclude-sale-items span').innerHTML = '<strong>Exclude sale items</strong>';
    } else {
        document.querySelector('div#summary-exclude-sale-items span').innerHTML = '';
    }
});

specificProductsAndCollections.addEventListener('click', function() {
    if(this.checked) {
        document.querySelector('div#summary-type-order span').innerHTML = '<strong>Specific products and collections</strong>';
    } else {
        document.querySelector('div#summary-type-order span').innerHTML = '';
        this.click();
    }
});

let discountMaximumUsage = document.querySelector('.disc-max-disc-usage input');
discountMaximumUsage.addEventListener('click', function() {
   if(this.checked) {
       let maxDiscUsageNum = document.querySelector('input#disc-max-usage-text').value;
       document.querySelector('#discount-max-usage span').innerHTML = 'Maximum discount usage: <strong>' + maxDiscUsageNum + '</strong>';
   } else {
       document.querySelector('#discount-max-usage span').innerHTML = '';
   }
});

let discountMaximumUsageInput = document.querySelector('input#disc-max-usage-text');
discountMaximumUsageInput.addEventListener('input', function() {
    document.querySelector('#discount-max-usage span strong').innerText = this.value;
});

let discountTitleInput = document.querySelector('input#disc-title');
discountTitleInput.addEventListener('input', function() {
    document.querySelector('#summary-title span strong').innerText = this.value;
});

let discountMaximumUsagePerOrder = document.querySelector('input#disc-maximum-usage-set');
discountMaximumUsagePerOrder.addEventListener('click', function() {
    if(this.checked) {
        let maxDiscUsageNum = document.querySelector('input#disc-max-amount-reached-input').value;
        document.querySelector('#summary-discount-max-usage-per-order span').innerHTML = 'Maximum discount usage per order: <strong>' + maxDiscUsageNum + '</strong>';
    } else {
        document.querySelector('#summary-discount-max-usage-per-order span').innerHTML = '';
    }
});

let discountMaximumUsagePerOrderInput = document.querySelector('input#disc-max-amount-reached-input');
discountMaximumUsagePerOrderInput.addEventListener('input', function() {
    document.querySelector('#summary-discount-max-usage-per-order span strong').innerText = this.value;
});

let customerWillGetFreeInput = document.querySelector('input#disc-free-field-checkbox');
let customerWillGetPercentageText = document.querySelector('input#buyxy-percentage');
let customerWillGetPercentagePercent = document.querySelector('.buyxy-percentage-value-input-percent');
customerWillGetFreeInput.addEventListener('click', function() {
    customerWillGetPercentageText.classList.add('hidden');
    customerWillGetPercentagePercent.classList.add('hidden');
});

let customerWillGetPercentageInput = document.querySelector('input#disc-percentage-field-checkbox');
customerWillGetPercentageInput.addEventListener('click', function() {
    customerWillGetPercentageText.classList.remove('hidden');
    customerWillGetPercentagePercent.classList.remove('hidden');
});