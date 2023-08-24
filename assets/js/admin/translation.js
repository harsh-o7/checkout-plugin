let searchTitleParagraph = document.querySelector('#ic-cg-form-box-search-text');
let filterContainer = document.querySelector('.filter-container.filter-container-translation');
let filterOverview = document.querySelector('.filter-group-section');
let filterBtn = document.querySelector('.filter-translation');
let filterExitBtn = document.querySelector('.ic-exit-d-filter');
let filterApplyBtn = document.querySelector('.apply-filter-translation');
let filterClearBtn = document.querySelector('.clear-filter-translation');
let searchInput = document.querySelector('.search-input');
let restoreDefaultTextBtn = document.querySelector('.restore-default-translation');
let submitButton = document.querySelector('#submit');
let backBtn = document.querySelector('.button-back-translate');
let searchBox = document.querySelector('.search-box-translation');
let valuesBeginning,valuesBeforeLeaving;
valuesBeginning = {
    'ic_ct_c_page_title': '',
    //'ic_ct_c_error_page_title': '',
    //'ic_ct_c_breadcrumb': '',
    'ic_ct_c_log_in_button_label': '',
    'ic_ct_c_shipping_address_label': '',
    'ic_ct_c_already_have_an_account_label': '',
    'ic_ct_c_continue_to_delivery_button_label': '',
    'ic_ct_c_first_name': '',
    'ic_ct_c_last_name': '',
    'ic_ct_c_email': '',
    'ic_ct_c_street_address': '',
    'ic_ct_c_apartment_suite': '',
    'ic_ct_c_city': '',
    'ic_ct_c_zip_code': '',
    'ic_ct_c_country': '',
    'ic_ct_c_phone' : '',
    'ic_ct_c_company' : '',
    'ic_ct_c_state_label': '',
    'ic_ct_c_out_of_stock':'',
    'ic_ct_c_mobile_show_summary_label' : '',
    'ic_ct_c_mobile_hide_summary_label' : '',
    'ic_ct_c_continue_to_payment_button_label': '',
    //'ic_ct_c_subscribe_to_newsletter': '',
    'ic_ct_c_by_placing_your_order_label': '',
    'ic_ct_c_billing_same_as_shipping_label': '',
    'ic_ct_c_use_different_delivery_address_label': '',
    'ic_ct_c_recommendations_title': '',
    'ic_ct_c_discount_code_label': '',
    'ic_ct_c_add_to_cart_button_label': '',
    'ic_ct_c_apply_button_label': '',
    'ic_ct_c_subtotal_label': '',
    'ic_ct_c_taxes_label': '',
    'ic_ct_c_shipping_label': '',
    'ic_ct_c_return_to_delivery_label': '',
    'ic_ct_c_return_to_shipping_label': '',
    'ic_ct_c_order_summary_label': '',
    'ic_ct_c_discount_label': '',
    'ic_ct_c_payment_method_label': '',
    'ic_ct_c_total_label': '',
    'ic_ct_c_confirm_order_button_label': '',
    'ic_ct_c_complete_order_button_label' : '',
    'ic_ct_c_show_more_credit_cards_label': '',
    'ic_ct_c_delivery_label': '',
    'ic_ct_c_continue_button_label': '',
    'ic_ct_c_return_button_label' : '',
    'ic_ct_c_first_name_error_label': '',
    'ic_ct_c_payment_label': '',
    'ic_ct_c_email_error_label': '',
    'ic_ct_c_last_name_error_label': '',
    'ic_ct_c_city_error_label': '',
    'ic_ct_c_phone_number_error_label': '',
    'ic_ct_c_zip_code_error_label': '',
    'ic_ct_c_street_address_error' : '',
    'ic_ct_c_add_extras_title' : '',
    'ic_ct_c_add_extras_description' : '',
    'ic_ct_c_add_extra_product_title' : '',
    'ic_ct_c_add_extra_product_description' : '',

    'ic_ct_mc_page_title': '',
    //'ic_ct_mc_shipping_message': '',
    'ic_ct_mc_discount_code_label': '',
    'ic_ct_mc_apply_button_label': '',
    'ic_ct_mc_coupon_label': '',
    'ic_ct_mc_coupon_error_label': '',
    'ic_ct_mc_taxes_label': '',
    'ic_ct_mc_shipping_label': '',
    'ic_ct_mc_discount_label': '',
    'ic_ct_mc_subtotal_label': '',
    //'ic_ct_mc_recommendation_title': '',
    'ic_ct_mc_total_label': '',
    //'ic_ct_mc_secondary_button_label': '',
    'ic_ct_mc_add_to_cart_button': '',
    //'ic_ct_mc_bottom_message_label': '',
    //'ic_ct_mc_primary_button_label': '',
    'ic_ct_mc_cart_empty_message' : '',
    'ic_ct_mc_cart_empty_button_label' : '',

    'ic_ct_ty_page_title': '',
    'ic_ct_ty_primary_thank_you_label': '',
    //'ic_ct_ty_secondary_thank_you_label': '',
    //'ic_ct_ty_error_page_title': '',
    'ic_ct_ty_customer_information_label': '',
    'ic_ct_ty_shipping_information_label' : '',
    'ic_ct_ty_shipping_address_label' : '',
    'ic_ct_ty_billing_address_label':'',
    'ic_ct_ty_shipping_method_information_label' : '',
    'ic_ct_ty_payment_information_label' : '',
    'ic_ct_ty_payment_method_label' : '',
    //'ic_ct_ty_save_my_information_for_faster_checkout_label': '',
    //'ic_ct_ty_sign_up_for_newsletter': '',
    //'ic_ct_ty_sign_up_newsletter_description': '',
    'ic_ct_ty_email_address_label': '',
    'ic_ct_ty_sign_up_button_label': '',
    'ic_ct_ty_need_help_label': '',
    'ic_ct_ty_contact_us_button_label': '',
    'ic_ct_ty_continue_shopping_button_label': '',
    'ic_ct_ty_items_in_shipment_label': '',
    'ic_ct_ty_subtotal_label': '',
    'ic_ct_ty_discount_label': '',
    'ic_ct_ty_shipping_label': '',
    'ic_ct_ty_total_label': '',
};
valuesBeforeLeaving = {
    'ic_ct_c_page_title': '',
    //'ic_ct_c_error_page_title': '',
    //'ic_ct_c_breadcrumb': '',
    'ic_ct_c_log_in_button_label': '',
    'ic_ct_c_shipping_address_label': '',
    'ic_ct_c_already_have_an_account_label': '',
    'ic_ct_c_continue_to_delivery_button_label': '',
    'ic_ct_c_continue_to_payment_button_label': '',
    'ic_ct_c_first_name': '',
    'ic_ct_c_last_name': '',
    'ic_ct_c_email': '',
    'ic_ct_c_street_address': '',
    'ic_ct_c_apartment_suite': '',
    'ic_ct_c_city': '',
    'ic_ct_c_zip_code': '',
    'ic_ct_c_country': '',
    'ic_ct_c_phone' : '',
    'ic_ct_c_company' : '',
    'ic_ct_c_state_label': '',
    //'ic_ct_c_subscribe_to_newsletter': '',
    'ic_ct_c_by_placing_your_order_label': '',
    'ic_ct_c_billing_same_as_shipping_label': '',
    'ic_ct_c_use_different_delivery_address_label': '',
    'ic_ct_c_recommendations_title': '',
    'ic_ct_c_discount_code_label': '',
    'ic_ct_c_add_to_cart_button_label': '',
    'ic_ct_c_apply_button_label': '',
    'ic_ct_c_subtotal_label': '',
    'ic_ct_c_taxes_label': '',
    'ic_ct_c_shipping_label': '',
    'ic_ct_c_return_to_delivery_label': '',
    'ic_ct_c_return_to_shipping_label': '',
    'ic_ct_c_order_summary_label': '',
    'ic_ct_c_discount_label': '',
    'ic_ct_c_payment_method_label': '',
    'ic_ct_c_total_label': '',
    'ic_ct_c_confirm_order_button_label': '',
    'ic_ct_c_complete_order_button_label' : '',
    'ic_ct_c_add_extras_title' : '',
    'ic_ct_c_add_extras_description' : '',
    'ic_ct_c_show_more_credit_cards_label': '',
    'ic_ct_c_delivery_label': '',
    'ic_ct_c_continue_button_label': '',
    'ic_ct_c_return_button_label' : '',
    'ic_ct_c_first_name_error_label': '',
    'ic_ct_c_payment_label': '',
    'ic_ct_c_email_error_label': '',
    'ic_ct_c_last_name_error_label': '',
    'ic_ct_c_city_error_label': '',
    'ic_ct_c_phone_number_error_label': '',
    'ic_ct_c_zip_code_error_label': '',
    'ic_ct_c_street_address_error' : '',
    'ic_ct_c_out_of_stock':'',
    'ic_ct_c_mobile_show_summary_label' : '',
    'ic_ct_c_mobile_hide_summary_label' : '',
    'ic_ct_c_add_extra_product_title' : '',
    'ic_ct_c_add_extra_product_description' : '',

    //MINI CART PAGE
    'ic_ct_mc_page_title': '',
    //'ic_ct_mc_shipping_message': '',
    'ic_ct_mc_discount_code_label': '',
    'ic_ct_mc_apply_button_label': '',
    'ic_ct_mc_coupon_label': '',
    'ic_ct_mc_coupon_error_label': '',
    'ic_ct_mc_taxes_label': '',
    'ic_ct_mc_shipping_label': '',
    'ic_ct_mc_discount_label': '',
    'ic_ct_mc_subtotal_label': '',
    //'ic_ct_mc_recommendation_title': '',
    'ic_ct_mc_total_label': '',
    //'ic_ct_mc_secondary_button_label': '',
    'ic_ct_mc_add_to_cart_button': '',
    //'ic_ct_mc_bottom_message_label': '',
    //'ic_ct_mc_primary_button_label': '',
    'ic_ct_mc_cart_empty_message' : '',
    'ic_ct_mc_cart_empty_button_label' : '',

    //THANK YOU PAGE
    'ic_ct_ty_page_title': '',
    //'ic_ct_ty_error_page_title': '',
    //'ic_ct_ty_secondary_thank_you_label': '',
    'ic_ct_ty_primary_thank_you_label': '',
    'ic_ct_ty_customer_information_label': '',
    'ic_ct_ty_shipping_information_label' : '',
    'ic_ct_ty_shipping_address_label' : '',
    'ic_ct_ty_billing_address_label':'',
    'ic_ct_ty_shipping_method_information_label' : '',
    'ic_ct_ty_payment_information_label' : '',
    'ic_ct_ty_payment_method_label' : '',
    //'ic_ct_ty_save_my_information_for_faster_checkout_label': '',
    //'ic_ct_ty_sign_up_for_newsletter': '',
    //'ic_ct_ty_sign_up_newsletter_description': '',
    'ic_ct_ty_email_address_label': '',
    'ic_ct_ty_sign_up_button_label': '',
    'ic_ct_ty_need_help_label': '',
    'ic_ct_ty_contact_us_button_label': '',
    'ic_ct_ty_continue_shopping_button_label': '',
    'ic_ct_ty_items_in_shipment_label': '',
    'ic_ct_ty_subtotal_label': '',
    'ic_ct_ty_discount_label': '',
    'ic_ct_ty_shipping_label': '',
    'ic_ct_ty_total_label': '',
};

function alignSectionTitles(){
    let titles = document.querySelectorAll('.translation-title');
    titles.forEach((title)=>{
        title.remove();
    });
}

function changeTitleOfTable(checkedFilters){
    let newTitle;

    if (checkedFilters.size === 1){
        let filterTitle = checkedFilters.values().next().value;

        switch (filterTitle) {
            case 'checkout':
                newTitle = 'Checkout page';
                break;
            case 'minicart':
                newTitle = 'Mini cart';
                break;
            case 'typage':
                newTitle = 'Thank you page';
                break;
            default:
                newTitle = 'Translate';
                break;
        }
        searchTitleParagraph.innerHTML = newTitle;
    }else{
        searchTitleParagraph.innerHTML = 'Translate';
    }
}

function uncheckAllTranslationFilters(){
    let checkboxes = document.querySelectorAll('.filter-group-section input');
    checkboxes.forEach((checkbox)=>{
        checkbox.checked = false;
    });
}

function filterCustomTextTable(checkedFilters,searchValue){

    let mapTableFields = {
        'checkout' : 'c',
        'minicart' : 'mc',
        'typage' : 'ty'
    }

    let isSimilar = false;
    let updatedRows = [];
    let allRows = document.querySelectorAll('#cc-ct-form tr');
    searchValue = searchValue.toLowerCase();

    changeTitleOfTable(checkedFilters);

    allRows.forEach((row) => {
        row.style.display = 'none';
        row.classList.remove('leftLine');
        row.classList.remove('rightLine');
    });

    if (checkedFilters.size !== 0){

        if (searchValue !== '')
        {
            checkedFilters.forEach((key) => {
                let classString = 'ic_ct_' + mapTableFields[key];
                let filteredTableRows = document.querySelectorAll('.' + classString);
                filteredTableRows.forEach((filteredRow)=>{
                    filteredRow.parentElement.parentElement.parentElement.style.display = 'inline-block';

                    updatedRows.push(filteredRow.parentElement.parentElement.parentElement);
                });
            });
            updatedRows.forEach((filteredRow)=>{
                let rowHeader = filteredRow.querySelector('th');
                let nameOfRow = rowHeader.innerHTML.toLowerCase();
                let userWords = searchValue.split(' ');
                isSimilar = userWords.some(word => nameOfRow.includes(word));
                if (!isSimilar){
                    filteredRow.style.display = 'none';
                }

            });
        }
        else{
            checkedFilters.forEach((key) => {
                let classString = 'ic_ct_' + mapTableFields[key];
                let filteredTableRows = document.querySelectorAll('.' + classString);
                filteredTableRows.forEach((filteredRow)=>{
                    filteredRow.parentElement.parentElement.parentElement.style.display = 'inline-block';
                });
            });
        }
    }
    else{
        if (searchValue !== ''){
            allRows.forEach((searchRow)=>{
                let rowHeader = searchRow.querySelector('th');
                let nameOfRow = rowHeader.innerHTML.toLowerCase();
                let userWords = searchValue.split(' ');
                isSimilar = userWords.some(word => nameOfRow.includes(word));
                if (isSimilar){
                    searchRow.style.display = 'inline-block';
                }
            });
        }else{
            allRows.forEach((row) => {
                row.style.display = 'inline-block';
            });
        }
    }

    resetStylingOfTable();
}

function resetStylingOfTable(){

    let rows = document.querySelectorAll('#cc-ct-form tr');
    let visibleRows = [];

    for (let i = 0; i < rows.length; i++) {
        if (window.getComputedStyle(rows[i]).display !== 'none') {
            visibleRows.push(rows[i]);
        }
    }

    for (let j = 0; j < visibleRows.length; j++) {
        let row = visibleRows[j];

        if (j % 2 === 0) {
            row.classList.add('leftLine');
        } else {
            row.classList.add('rightLine');
        }
    }
    let table = document.querySelector('#cc-ct-form table');
    if(visibleRows.length >4){
        //default table display
        table.style.display = 'block';
    }else{
        //when only 2 inputs or fewer, its inline-grid
        table.style.display = 'inline-grid';
    }
}

function pickUpInputValuesBeginning(){
    let inputs = document.querySelectorAll('input[type=text]');
    for (let i=0; i<inputs.length; i++){
        let input = inputs[i];

        let name = input.getAttribute("name");
        let keyOfInput = name.match(/\[(.*?)\]/)[1];

        if (valuesBeginning.hasOwnProperty(keyOfInput)){
            valuesBeginning[keyOfInput] = input.value;
        }
    }
    return true;
}

function pickUpInputValuesLeaving(){
    let inputs = document.querySelectorAll('input[type=text]');
    for (let i=0; i<inputs.length; i++){
        let input = inputs[i];

        let name = input.getAttribute("name");
        let keyOfInput = name.match(/\[(.*?)\]/)[1];

        if (valuesBeforeLeaving.hasOwnProperty(keyOfInput)){
            valuesBeforeLeaving[keyOfInput] = input.value;
        }
    }
    return true;
}

function checkForChangesOnLeave(){

    pickUpInputValuesLeaving();

    if (Object.keys(valuesBeginning).length !== Object.keys(valuesBeforeLeaving).length) {
        return false;
    }
    for (let key in valuesBeginning) {
        if (valuesBeginning[key] !== valuesBeforeLeaving[key]) {
            return false;
        }
    }
    return true;
}

alignSectionTitles();

if (filterBtn) {

    let searchValue = "";
    let checked = new Set();

    filterBtn.addEventListener('click', function (e) {
        e.preventDefault();
        filterContainer.classList.add('active');
        filterOverview.classList.add('active');
    });

    filterExitBtn.addEventListener('click',function(e){
        e.preventDefault();
        filterContainer.classList.remove('active');
        filterOverview.classList.remove('active');
    });

    filterClearBtn.addEventListener('click',function(e){
        e.preventDefault();
        uncheckAllTranslationFilters();
        checked.clear();
        filterExitBtn.click();
        filterCustomTextTable(checked,searchValue);
    });

    filterApplyBtn.addEventListener('click',function(e){
        e.preventDefault();
        let checkboxes = document.querySelectorAll('.filter-group-section input');
        checkboxes.forEach((checkbox)=>{
            if (checkbox.checked){
                checked.add(checkbox.id);
            }else{
                checked.delete(checkbox.id);
            }
        });
        filterExitBtn.click();
        filterCustomTextTable(checked,searchValue);
    });

    let typingDelay = 700;
    let timerId = null;
    searchInput.addEventListener('input', function (event) {
        searchValue = searchInput.value;
        clearTimeout(timerId);
        timerId = setTimeout(function(){
            filterCustomTextTable(checked,searchValue);
        },typingDelay);
    });
}

if (restoreDefaultTextBtn){
    restoreDefaultTextBtn.addEventListener('click',function(e){
        e.preventDefault();
        let defaultValues = {
            'ic_ct_c_page_title': 'Checkout',
            //'ic_ct_c_error_page_title': 'Error',
            //'ic_ct_c_breadcrumb': 'Breadcrumb',
            'ic_ct_c_log_in_button_label': 'Log in',
            'ic_ct_c_shipping_address_label': 'Shipping address',
            'ic_ct_c_already_have_an_account_label': 'Already have an account?',
            'ic_ct_c_first_name': 'First name',
            'ic_ct_c_last_name': 'Last name',
            'ic_ct_c_email': 'Email',
            'ic_ct_c_street_address': 'Street address',
            'ic_ct_c_apartment_suite': 'Apartment,suit,etc..',
            'ic_ct_c_city': 'City',
            'ic_ct_c_zip_code': 'Zip code',
            'ic_ct_c_country': 'Country',
            'ic_ct_c_phone' : 'Phone',
            'ic_ct_c_company' : 'Company',
            'ic_ct_c_state_label': 'State',
            //'ic_ct_c_subscribe_to_newsletter': 'Sign up to our newsletter',
            'ic_ct_c_by_placing_your_order_label': 'By placing your order you agree to...',
            'ic_ct_c_billing_same_as_shipping_label': 'Billing address is same as shipping',
            'ic_ct_c_use_different_delivery_address_label': 'Use different delivery address',
            'ic_ct_c_recommendations_title': 'Don’t miss the deal',
            'ic_ct_c_discount_code_label': 'Discount',
            'ic_ct_c_add_to_cart_button_label': 'Add',
            'ic_ct_c_apply_button_label': 'Apply',
            'ic_ct_c_subtotal_label': 'Subtotal',
            'ic_ct_c_taxes_label': 'Taxes',
            'ic_ct_c_shipping_label': 'Shipping',
            'ic_ct_c_return_to_delivery_label': 'Return to delivery',
            'ic_ct_c_return_to_shipping_label': 'Return to shipping',
            'ic_ct_c_order_summary_label': 'Order summary',
            'ic_ct_c_discount_label': 'Discount',
            'ic_ct_c_payment_method_label': 'Payment method',
            'ic_ct_c_total_label': 'Total',
            'ic_ct_c_confirm_order_button_label': 'Confirm order',
            'ic_ct_c_complete_order_button_label' : 'Complete order',
            'ic_ct_c_add_extras_title' : 'Add extras to your order',
            'ic_ct_c_add_extras_description' : 'Thank you! Your order is confirmed, but you can add following item(s).',
            'ic_ct_c_show_more_credit_cards_label': '& more',
            'ic_ct_c_delivery_label': 'Delivery',
            'ic_ct_c_continue_to_delivery_button_label': 'Continue to delivery',
            'ic_ct_c_continue_to_payment_button_label': 'Continue to payment',
            'ic_ct_c_continue_button_label': 'Continue',
            'ic_ct_c_return_button_label' : 'Return',
            'ic_ct_c_first_name_error_label': 'Please enter a valid name',
            'ic_ct_c_payment_label': 'Complete payment',
            'ic_ct_c_email_error_label': 'Please enter a valid email address',
            'ic_ct_c_last_name_error_label': 'Please enter a valid name',
            'ic_ct_c_city_error_label': 'Please enter a valid city',
            'ic_ct_c_phone_number_error_label': 'Please enter a valid phone number',
            'ic_ct_c_zip_code_error_label': 'Please enter a valid zip code',
            'ic_ct_c_street_address_error' : 'Please enter a valid address',
            'ic_ct_c_out_of_stock':'out of stock.',
            'ic_ct_c_mobile_show_summary_label' : 'Show order summary',
            'ic_ct_c_mobile_hide_summary_label' : 'Hide order summary',
            'ic_ct_c_add_extra_product_title' : 'Success',
            'ic_ct_c_add_extra_product_description' : 'You successfully added product to cart!',

            'ic_ct_mc_page_title': 'Mini cart',
            //'ic_ct_mc_shipping_message': 'Just 20$ away from free shipping',
            'ic_ct_mc_discount_code_label': 'Discount',
            'ic_ct_mc_apply_button_label': 'Apply',
            'ic_ct_mc_coupon_label': 'Coupon successful',
            'ic_ct_mc_coupon_error_label': 'Coupon is not valid',
            'ic_ct_mc_taxes_label': 'Taxes',
            'ic_ct_mc_shipping_label': 'Shipping',
            'ic_ct_mc_discount_label': 'Coupon',
            'ic_ct_mc_subtotal_label': 'Subtotal',
            //'ic_ct_mc_recommendation_title': 'You might also like',
            'ic_ct_mc_total_label': 'Total',
            //'ic_ct_mc_secondary_button_label': 'Keep shopping',
            'ic_ct_mc_add_to_cart_button': 'Add to cart',
            //'ic_ct_mc_bottom_message_label': 'Free shipping on orders over $50',
            //'ic_ct_mc_primary_button_label': 'Checkout',
            'ic_ct_mc_cart_empty_message' : 'Your cart is empty',
            'ic_ct_mc_cart_empty_button_label' : 'Go to shop',

            'ic_ct_ty_page_title': 'Thank you page',
            //'ic_ct_ty_error_page_title': 'Error',
            'ic_ct_ty_primary_thank_you_label': 'Thank you, ',
            //'ic_ct_ty_secondary_thank_you_label': 'Thank you for purchasing product. Expect it tomorrow during the day.',
            'ic_ct_ty_customer_information_label': 'Customer information',
            'ic_ct_ty_shipping_information_label' : 'Shipping',
            'ic_ct_ty_shipping_address_label' : 'Shipping address',
            'ic_ct_ty_billing_address_label':'Billing address',
            'ic_ct_ty_shipping_method_information_label':'Shipping method',
            'ic_ct_ty_payment_information_label':'Payment',
            'ic_ct_ty_payment_method_label':'Payment method',
            //'ic_ct_ty_save_my_information_for_faster_checkout_label': 'Save my information for a faster checkout',
            //'ic_ct_ty_sign_up_for_newsletter': 'Sign up',
            //'ic_ct_ty_sign_up_newsletter_description': 'Sign up to our updates and get 15% off your nex order...',
            'ic_ct_ty_email_address_label': 'Your email address',
            'ic_ct_ty_sign_up_button_label': 'Sign up',
            'ic_ct_ty_need_help_label': 'Need help',
            'ic_ct_ty_contact_us_button_label': 'Contact us',
            'ic_ct_ty_continue_shopping_button_label': 'Continue shopping',
            'ic_ct_ty_items_in_shipment_label': 'Items in shipment',
            'ic_ct_ty_subtotal_label': 'Subtotal',
            'ic_ct_ty_discount_label': 'Discount',
            'ic_ct_ty_shipping_label': 'Shipping',
            'ic_ct_ty_total_label': 'Total'
        };
        let inputs = document.querySelectorAll('input[type=text]');

        swal({
            title: "Are you sure?  🤔",
            text: "Want to restore to default values?",
            type: "warning",
            buttons: {
                save: 'Yes',
                leave: 'No'
            }
        }).then((value) => {
            if (value == 'save') {
                for (let i=0; i<inputs.length; i++){
                    let input = inputs[i];
                    let name = input.getAttribute("name");
                    let keyOfInput = name.match(/\[(.*?)\]/)[1];

                    if (defaultValues.hasOwnProperty(keyOfInput)){
                        input.value = defaultValues[keyOfInput];
                    }
                }
                submitButton.click();
            }
        })
        return false;
    });
}

if (backBtn){
    backBtn.addEventListener('click',function(e){
        e.preventDefault();
        let activeLink = document.querySelector('.nav-link.active');
        if (checkForChangesOnLeave()) {
            if (activeLink){
                window.location = activeLink.getAttribute("href");
            }else{
                history.go(-1);
            }
        }else{
            swal({
                title: "Leaving page 🤔",
                text: "Do you want to save changes?",
                type: "warning",
                buttons: {
                    save: 'Save',
                    leave: 'Don’t save'
                }
            }).then((value) => {
                if (value == 'save') {
                    submitButton.click();
                    if (activeLink){
                        window.location = activeLink.getAttribute("href");
                    }else{
                        history.go(-1);
                    }
                }else if(value == 'leave'){
                    if (activeLink){
                        window.location = activeLink.getAttribute("href");
                    }else{
                        history.go(-1);
                    }
                }
            })
            return false;
        }
    });
}

jQuery(document).click(function (e) {
    if (jQuery(e.target).is('a')) {
        e.preventDefault();
        if (checkForChangesOnLeave()) {
            window.location = jQuery(e.target).attr("href");
        }else{
            swal({
                title: "Leaving page 🤔",
                text: "Do you want to save changes?",
                type: "warning",
                buttons: {
                    save: 'Save',
                    leave: 'Don’t save'
                }
            }).then((value) => {
                if (value == 'save') {
                    submitButton.click();
                    window.location = jQuery(e.target).attr("href");
                }else if(value == 'leave'){
                    window.location = jQuery(e.target).attr("href");
                }
            })
            return false;
        }
    }
});

window.onload = function(){
    pickUpInputValuesBeginning();
    let paramValue = localStorage.getItem('translationPage');
    if (paramValue){
        switch (paramValue) {
            case 'c':
                document.querySelector('input#checkout.filter-checkbox').click();
                filterApplyBtn.click();
                break;
            case 'mc':
                document.querySelector('input#minicart.filter-checkbox').click();
                filterApplyBtn.click();
                break;
            case 'ty':
                document.querySelector('input#typage.filter-checkbox').click();
                filterApplyBtn.click();
                break;
            default:
                break;
        }
    }
    localStorage.removeItem('translationPage');
};

jQuery('#cc-ct-form').submit(function (e) {
    e.preventDefault();
    jQuery(this).ajaxSubmit({
        success: function () {
            swal({
                title: "Success 🎉",
                text: "Changes have been successfully saved!",
                button: 'OK'
            });

            let checkedFinal = new Set();
            let checkboxes = document.querySelectorAll('.filter-group-section input');
            checkboxes.forEach((checkbox)=>{
                if (checkbox.checked){
                    checkedFinal.add(checkbox.id);
                }else{
                    checkedFinal.delete(checkbox.id);
                }
            });
            searchInput.value = "";
            filterCustomTextTable(checkedFinal,searchInput.value);

            pickUpInputValuesBeginning();
        }
    });
});
