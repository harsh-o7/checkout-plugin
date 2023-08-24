let upsellsDataTable = null;
let filterContainer = document.querySelector('.filter-container');
let filterBtn = document.querySelector('.filter-upsell');
let filterExit = document.querySelector('.ic-exit-us-filter');
const table = jQuery('#upsells-table');
let filters = {};
let checked = {};


let startTimeForDatatableUpsells = new Date();
let endTimeForDatatableUpsells = new Date();

const thousandsFormatterUsDecimalsUs = new Intl.NumberFormat('en-US', {
    minimumFractionDigits: 1,
    maximumFractionDigits: 1
});

const thousandsFormatterUs = new Intl.NumberFormat('en-US');

function formatWithFloorUs(num) {
    return Math.floor(num * 10) / 10;
}

function updateMainInfoUs(queryClass, innerText) {
    document.querySelector(`.upsell-analytic ${queryClass} h4`).innerText = innerText;
}

function updateAnalyticsLabels(data) {
    updateMainInfoUs('.us-cr-inner', thousandsFormatterUsDecimalsUs.format(formatWithFloorUs(parseFloat(data.conversionRate))) + '%');
    updateMainInfoUs('.us-ts-inner', thousandsFormatterUs.format(data.timesShown));
    updateMainInfoUs('.us-tp-inner', thousandsFormatterUs.format(data.timesPurchased));
    let amount = 0;
    if (data.amount != 0){
        amount = parseFloat(Number(data.amount).toFixed(1));
    }
    updateMainInfoUs('.us-ap-inner', info.currency + thousandsFormatterUsDecimalsUs.format(formatWithFloorUs(amount)));
}

function updatePercentageUs(queryClass, data, dataPrev) {
    let percentage = dataPrev == 0 ? 100 : data / dataPrev * 100 - 100;
    let percentageDiv = document.querySelector('.percent.' + queryClass);
    if (percentage < 0) {
        percentageDiv.classList.add('minus');
        percentage = Math.abs(percentage);
        percentageDiv.querySelector('span').innerText =' ' + thousandsFormatterUsDecimalsUs.format(formatWithFloorUs(percentage)) + '%';
    } else {
        percentageDiv.classList.remove('minus');
        percentageDiv.querySelector('span').innerText = thousandsFormatterUsDecimalsUs.format(formatWithFloorUs(percentage)) + '%';
    }
}

function updatePercentagesUs(data, dataBefore) {
    data.amount = parseFloat(data.amount);
    data.conversionRate = parseFloat(data.conversionRate);
    data.timesPurchased = parseInt(data.timesPurchased);
    data.timesShown = parseInt(data.timesShown);
    dataBefore.amount = parseFloat(dataBefore.amount);
    dataBefore.conversionRate = parseFloat(dataBefore.conversionRate);
    dataBefore.timesPurchased = parseInt(dataBefore.timesPurchased);
    dataBefore.timesShown = parseInt(dataBefore.timesShown);

    updatePercentageUs('us-cr-p', data.conversionRate, dataBefore.conversionRate);
    updatePercentageUs('us-ts-p', data.timesShown, dataBefore.timesShown);
    updatePercentageUs('us-tp-p', data.timesPurchased, dataBefore.timesPurchased);
    updatePercentageUs('us-ap-p', data.amount, dataBefore.amount);
}


function ajaxGetUpsellsData(startDate, endDate) {
    jQuery.ajax({
        url: urls.ajax_url,
        type: 'get',
        data: {
            action: 'ic_get_upsells_main_analytics',
            nonce: nonces.get_upsells_main_analytics,
            startDate: startDate,
            endDate: endDate
        },
        success: function (response) {
            response = JSON.parse(response);
            let data = response.data;
            let dataBefore = response.dataBefore;
            updateAnalyticsLabels(data);
            updatePercentagesUs(data, dataBefore);
        }
    });
}

function ajaxGetSingleUpsellData(startDate, endDate) {
    jQuery.ajax({
        url: urls.ajax_url,
        type: 'get',
        data: {
            action: 'ic_get_single_upsell_main_analytics',
            nonce: nonces.get_single_upsell_main_analytics,
            startDate: startDate,
            endDate: endDate,
            upsell_id: document.querySelector('input#upsell-id').value
        },
        success: function (response) {
            response = JSON.parse(response);

            let data = response.data;
            let dataBefore = response.dataBefore;

            updateAnalyticsLabels(data);
            updatePercentagesUs(data, dataBefore);
        }
    });
}

function ajaxGetDatatableUpsellsInfo(filters = null) {

    let upsellsTable = document.querySelector('#upsells-table');
    if (upsellsTable) {
        jQuery.ajax({
            url: urls.ajax_url,
            type: 'get',
            data: {
                action: 'ic_get_datatable_upsells_info',
                nonce: nonces.get_datatable_upsells_info,
                filters: filters,
                start_date: startTimeForDatatableUpsells,
                end_date: endTimeForDatatableUpsells
            },
            success: function (response) {
                let upsells = JSON.parse(response);
                if (upsells.length === 0 && filters === null){
                    rerenderUpsell();
                }
                else {
                    document.querySelector('.upsells-table-header span').innerText = upsells.length;
                    let upsellsRows = [];
                    upsells.forEach((upsell) => {
                        let image;
                        if (upsell.image == null) {
                            image = urls.plugin_url + '/assets/images/woocommerce-placeholder.png';
                        } else {
                            image = upsell.image;
                        }
                        let upsellRow = [];
                        upsellRow.push(upsell.title);
                        if (upsell.conversionRate !== '-'){
                            upsellRow.push(thousandsFormatterUsDecimalsUs.format(formatWithFloorUs(parseFloat(upsell.conversionRate))));
                        }else{
                            upsellRow.push(upsell.conversionRate);
                        }
                        if (upsell.timesShown !== '-') {
                            upsellRow.push(thousandsFormatterUs.format(upsell.timesShown));
                        }else{
                            upsellRow.push(upsell.timesShown);
                        }
                        if (upsell.timesPurchased !== '-'){
                            upsellRow.push(thousandsFormatterUs.format(upsell.timesPurchased));
                        }else{
                            upsellRow.push(upsell.timesPurchased);
                        }
                        if (upsell.amount !=='-'){
                            upsellRow.push(thousandsFormatterUsDecimalsUs.format(formatWithFloorUs(parseFloat(upsell.amount))));
                        }else{
                            upsellRow.push(upsell.amount);
                        }
                        upsellRow.push(upsell.active);
                        upsellRow.push(image);
                        upsellRow.push(upsell.upsellId);

                        upsellsRows.push(upsellRow);
                    });

                    initUpsellsDataTable(upsellsRows);


                }
            }
        });
    }
}

function rerenderUpsell (){
    let mainContainer = document.querySelector('#upsells .app-inner');
    mainContainer.innerHTML='';
    mainContainer.innerHTML=`
                     <div class="page-title">
                        <h5>Home <i class="fa-regular fa-angle-right"></i> Upsells</h5>
                        <h2>Upsells 
                           <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <rect width="24" height="24" fill="url(#pattern0)"/>
                            <defs>
                            <pattern id="pattern0" patternContentUnits="objectBoundingBox" width="1" height="1">
                            <use xlink:href="#image0_2857_29450" transform="scale(0.00416667)"/>
                            </pattern>
                            <image id="image0_2857_29450" width="240" height="240" xlink:href="data:image/png;base64,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"/>
                            </defs>
                            </svg>
                         </h2>
                     </div>
                     <div class="ic-empty-upsell-page-box">   
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none"><rect width="32" height="32" rx="16" fill="#F2F4F7"/><path d="M21.5 13L16.75 17.75L14.25 15.25L10.5 19" stroke="#667085" stroke-linecap="round" stroke-linejoin="round"/><path d="M18.5 13H21.5V16" stroke="#667085" stroke-linecap="round" stroke-linejoin="round"/></svg>
                        <p class="ic-empty-upsell-page-box-title">No upsells yet</p>
                        <p class="ic-empty-upsell-page-box-text">Activate automatic post-purchase upsells<br> to boost your AOV using data.</p>
                        <div class="ic-empty-upsell-page-box-link"><a href="admin.php?page=mcheckout-upsell-add-new"><i class="fa-solid fa-plus"></i> Create Upsell</a></div>
                     </div>
                    `;
}

function rerenderDatatable(filters = null) {


    let upsellsTable = document.querySelector('#upsells-table');
    if (upsellsTable) {
        jQuery.ajax({
            url: urls.ajax_url,
            type: 'get',
            data: {
                action: 'ic_get_datatable_upsells_info',
                nonce: nonces.get_datatable_upsells_info,
                filters: filters,
                start_date: startTimeForDatatableUpsells,
                end_date: endTimeForDatatableUpsells
            },
            success: function (response) {
                let upsells = JSON.parse(response);
                if (upsells.length === 0 && filters === null){
                    rerenderUpsell();
                }
                else{
                    document.querySelector('.upsells-table-header span').innerText = upsells.length;
                    let upsellsRows = [];
                    upsells.forEach((upsell) => {
                        let image;
                        if (upsell.image == null) {
                            image = urls.plugin_url + '/assets/images/woocommerce-placeholder.png';
                        } else {
                            image = upsell.image;
                        }
                        let upsellRow = [];
                        upsellRow.push(upsell.title);
                        if (upsell.conversionRate !== '-'){
                            upsellRow.push(thousandsFormatterUsDecimalsUs.format(formatWithFloorUs(parseFloat(upsell.conversionRate))));
                        }else{
                            upsellRow.push(upsell.conversionRate);
                        }
                        if (upsell.timesShown !== '-') {
                            upsellRow.push(thousandsFormatterUs.format(upsell.timesShown));
                        }else{
                            upsellRow.push(upsell.timesShown);
                        }
                        if (upsell.timesPurchased !== '-'){
                            upsellRow.push(thousandsFormatterUs.format(upsell.timesPurchased));
                        }else{
                            upsellRow.push(upsell.timesPurchased);
                        }
                        if (upsell.amount !=='-'){
                            upsellRow.push(thousandsFormatterUsDecimalsUs.format(formatWithFloorUs(parseFloat(upsell.amount))));
                        }else{
                            upsellRow.push(upsell.amount);
                        }
                        upsellRow.push(upsell.active);
                        upsellRow.push(image);
                        upsellRow.push(upsell.upsellId);

                        upsellsRows.push(upsellRow);
                    });

                    upsellsDataTable.clear();
                    upsellsDataTable.rows.add(upsellsRows);
                    upsellsDataTable.draw();

                }
            }
        });
    }
}


let globalOrderingOfDT = 0;
let globalOrderTypeOfDT = 'desc';

function initUpsellsDataTable(rows) {

    if (upsellsDataTable != null) {
        let orderUpsellsDT =upsellsDataTable.order();
        globalOrderingOfDT=orderUpsellsDT[0][0];
        globalOrderTypeOfDT=orderUpsellsDT[0][1];
    }

    let dataTableOptions = {
        data: rows,
        language: {
            'paginate': {
                'previous': '<i class="fa-solid fa-angle-left"></i>',
                'next': '<i class="fa-solid fa-angle-right"></i>'
            },
            "search": "",
            "searchPlaceholder": "Search for upsells...",
        },
        'searching': true,
        'paging': true,
        'info': false,
        'pagingType': 'simple',
        'pageLength': 5,
        'bLengthChange': true,
        'columnDefs': [{
            'targets': 0,
            'data': 'div',
            'render': function (url, type, full) {
                return '<div class="upsell-image-table"><img src="' + full[6] + '" /></div><span>' + full[0] + '</span><span class="ver-div">     |</span>'
                    + '<a data-bs-toggle="modal" data-bs-target="#upsellPreview" class="upsell-preview" data-us-id="' + full[7] + '" >     View   <i class="fa-solid fa-arrow-up-right-from-square"></i></a>';
            },
        },
            {
                'targets': 5,
                'data': 'div',
                'render': function (url, type, full) {
                    let active = full[5] == '1' ? 'checked' : '';
                    return '<div class="upsell-edit-section-table">' +
                        '<label class="switch">' +
                        '<input type="checkbox" class="active-input" data-id="' + full[7] + '"' + active + '>' +
                        '<span class="slider round"></span>\n' +
                        '</label>' +
                        '<a href="admin.php?page=mcheckout-upsell-edit&id=' + full[7] + '">' +
                        '<img src="' + urls.plugin_url + 'assets/images/edit-3.png' + '" alt="edit-upsell">' +
                        '</a>' +
                        '<a class="upsell-table-delete" data-id="' + full[7] + '">' +
                        '<img src="' + urls.plugin_url + 'assets/images/trash-can.png' + '" alt="delete-upsell">' +
                        '</a>' +
                        '</div>';
                }
            },
            {
                'targets': 1,
                'render': function (url, type, full) {
                    if (full[1]==='-'){
                        return full[1];
                    }else{
                        return full[1] + '%';
                    }
                }
            },
            {
                'targets': 4,
                'render': function (url, type, full) {
                    if (full[4]==='-'){
                        return full[4];
                    }else{
                        return info.currency + full[4];
                    }
                }
            }
        ],
        'columns': [
            {title: 'Product name'},
            {title: 'Conversion Rate'},
            {title: 'Times Shown'},
            {title: 'Times Purchased'},
            {title: 'Amount Purchased'},
            {title: 'Active'}
        ],
        'order': [[globalOrderingOfDT, globalOrderTypeOfDT]],
        'drawCallback': function () {
            let deleteBtns = document.querySelectorAll('.upsell-table-delete');
            deleteBtns.forEach((deleteBtn) => {
                let events = deleteBtn.getAttribute('click-listener');
                if (events == null) {
                    deleteBtn.setAttribute('click-listener', 'true');
                    deleteBtn.addEventListener('click', function () {
                        swal({
                            title: "Are you sure?",
                            text: "Do you want to delete selected Upsell?",
                            type: "warning",
                            buttons: {
                                cancel: 'No',
                                delete: 'Delete'
                            }
                        }).then((value) => {
                            if (value == 'delete') {
                                let id = this.dataset.id;
                                jQuery.ajax({
                                    url: urls.ajax_url,
                                    type: 'post',
                                    data: {
                                        action: 'ic_upsell_delete',
                                        nonce: nonces.upsell_delete,
                                        upsell: id
                                    },
                                    success: function (response) {
                                        rerenderDatatable();
                                    }
                                });
                            }
                        })
                    });
                }

                let viewBtns = document.querySelectorAll('a.upsell-preview');
                viewBtns.forEach((viewBtn) => {
                    let events = viewBtn.getAttribute('click-listener');
                    if (events == null) {
                        viewBtn.setAttribute('click-listener', 'true');
                        let usId = viewBtn.dataset.usId;
                        viewBtn.addEventListener('click', function () {
                            jQuery.ajax({
                                url: urls.ajax_url,
                                type: 'get',
                                data: {
                                    action: 'ic_get_us_products',
                                    nonce: nonces.get_us_products,
                                    upsell: usId
                                },
                                success: function (response) {
                                    let data = JSON.parse(response);
                                    let products = data.products;
                                    let displayed = data.displayed[0];

                                    let upsellPreviewCont = document.querySelector('#upsellPreview .modal-body .upsell-preview');
                                    let ppPreviewCont = document.querySelector('#upsellPreview .modal-body .pp-preview');

                                    let checkoutPageChecked = displayed.checkout_page == '1' ? true : false;
                                    let cartPageChecked = displayed.cart_page == '1' ? true : false;
                                    let postPurchaseChecked = displayed.before_ty_page == '1' ? true : false;

                                    let previewContSliderHtml = '';
                                    let previewContPPHtml = '';

                                    // let singleCheck = document.querySelector('#ic-checkout div#ic-upsell');

                                    if (checkoutPageChecked || cartPageChecked) {
                                        document.querySelector('#cart-checkout-tab').style.display = 'block';
                                        document.querySelector('#cart-checkout-tab').classList.add('active');
                                        document.querySelector('#cart-checkout').classList.add('active');
                                        document.querySelector('#cart-checkout').classList.add('show');
                                        previewContSliderHtml = '<div id="ic-upsell" class="ic-checkout-upsell swiper"><div class="swiper-wrapper">';

                                        let upsellsRendered = [];
                                        products.forEach((productPreview) => {
                                            if (!upsellsRendered.includes(productPreview.title)) {
                                                let src = productPreview.image;
                                                if(src == null) {
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
                                                if (productPreview.cc_price != 0 && productPreview.c_price == 0) {
                                                    price = productPreview.cc_price;
                                                } else if (productPreview.cc_price != 0 && productPreview.c_price != 0) {
                                                    regularPrice = productPreview.cc_price;
                                                    price = productPreview.c_price;
                                                } else if (productPreview.sale_price != '') {
                                                    regularPrice = productPreview.regular_price;
                                                }
                                                if(regularPrice != null) {
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

                                        // singleCheck.classList.remove('ic-without-dot');
                                        // console.log('radi dot +');

                                    } else {
                                        document.querySelector('#cart-checkout-tab').style.display = 'none';
                                        document.querySelector('#cart-checkout-tab').classList.remove('active');
                                        document.querySelector('#cart-checkout').classList.remove('active');
                                        document.querySelector('#cart-checkout').classList.remove('show');

                                        // singleCheck.classList.add('ic-without-dot');
                                        // console.log('radi dot -');
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
                                        products.forEach((productPreview) => {
                                            if (!upsellsRendered.includes(productPreview.title)) {
                                                let src = productPreview.image;
                                                if(src == null) {
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
                                                if (productPreview.cc_price != 0 && productPreview.c_price == 0) {
                                                    price = productPreview.cc_price;
                                                } else if (productPreview.cc_price != 0 && productPreview.c_price != 0) {
                                                    regularPrice = productPreview.cc_price;
                                                    price = productPreview.c_price;
                                                } else if (productPreview.sale_price != '') {
                                                    regularPrice = productPreview.regular_price;
                                                }
                                                if(regularPrice != null) {
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
                                    } else {
                                        document.querySelector('#post-purchase-tab').style.display = 'none';
                                        document.querySelector('#post-purchase-tab').classList.remove('active');
                                        document.querySelector('#post-purchase').classList.remove('active');
                                        document.querySelector('#post-purchase').classList.remove('show');
                                    }
                                }
                            });
                        });
                    }

                });
            });

            let activeUpdateCheckboxes = document.querySelectorAll('.upsell-edit-section-table input.active-input');
            activeUpdateCheckboxes.forEach((checkbox) => {
                let events = checkbox.getAttribute('click-listener');
                if (events == null) {
                    checkbox.setAttribute('click-listener', 'true');
                    checkbox.addEventListener('click', function () {
                        let upsells = [];

                        activeUpdateCheckboxes.forEach((upsellInput) => {
                            let id = upsellInput.dataset.id;
                            let active = upsellInput.checked;

                            let upsell = {
                                id: id,
                                active: active
                            }

                            upsells.push(upsell);
                        });

                        jQuery.ajax({
                            url: urls.ajax_url,
                            type: 'post',
                            data: {
                                action: 'ic_us_publish_hide',
                                nonce: nonces.us_publish_hide,
                                upsells: upsells
                            },
                            success: function (response) {

                            }
                        });
                    });
                }
            });

        }
    };

    if (upsellsDataTable != null) {
        upsellsDataTable.destroy();
    }

    upsellsDataTable = table.DataTable(dataTableOptions);

    upsellsDataTable.draw();

    let upsellsTable = document.querySelector('#upsells-table');

    let showHideAnalyticsBtn = document.querySelector('.show-hide-analytics');
    if(upsellsTable.classList.contains('analytics')) {
        upsellsDataTable.column(1).visible(false);
        upsellsDataTable.column(2).visible(false);
        upsellsDataTable.column(3).visible(false);
        upsellsDataTable.column(4).visible(false);
        upsellsDataTable.column(5).visible(true);
    } else {
        upsellsDataTable.column(1).visible(true);
        upsellsDataTable.column(2).visible(true);
        upsellsDataTable.column(3).visible(true);
        upsellsDataTable.column(4).visible(true);
        upsellsDataTable.column(5).visible(false);
    }

    let events = showHideAnalyticsBtn.getAttribute('click-listener');
    if (events == null) {
        showHideAnalyticsBtn.setAttribute('click-listener', true);
        showHideAnalyticsBtn.addEventListener('click', function () {
            upsellsTable.classList.toggle('analytics');
            upsellsDataTable.column(1).visible(!upsellsDataTable.column(1).visible());
            upsellsDataTable.column(2).visible(!upsellsDataTable.column(2).visible());
            upsellsDataTable.column(3).visible(!upsellsDataTable.column(3).visible());
            upsellsDataTable.column(4).visible(!upsellsDataTable.column(4).visible());
            upsellsDataTable.column(5).visible(!upsellsDataTable.column(5).visible());
            if (upsellsDataTable.column(1).visible()) {
                showHideAnalyticsBtn.querySelector('p').innerText = 'Hide analytics';
            } else {
                showHideAnalyticsBtn.querySelector('p').innerText = 'Show analytics';
            }
        });
    }
}

let callbackFunctionUpsells = function (start, end, label) {
    //formating start and end for our ajax request
    let startTime = start.format('YYYY-MM-DD HH:mm:ss');
    let endTime = end.format('YYYY-MM-DD HH:mm:ss');

    startTimeForDatatableUpsells = startTime;
    endTimeForDatatableUpsells = endTime;



    //label for daterange picker
    document.querySelector('#upsells-daterangepicker span').innerText = label;

    let upsellEdit = document.querySelector('input#upsell-id');
    let upsellsTable = document.querySelector('#upsells-table');
    if (upsellEdit) {
        ajaxGetSingleUpsellData(startTime, endTime);
    } else if (upsellsTable) {
        ajaxGetDatatableUpsellsInfo();
        ajaxGetUpsellsData(startTime, endTime);
    }
}

if (filterBtn) {
    filterBtn.addEventListener('click', function () {
        filterContainer.classList.toggle('active');
    });

    filterExit.addEventListener('click', function() {
       filterContainer.classList.remove('active');
    });

    function uncheckOneButton(upperClass, name, id) {
        document.querySelector(upperClass + ' #' + id).checked = false;
        delete filters[name][id];
    }


    let filterGroup = filterContainer.querySelectorAll('.filter-container-us .filter-group');

    filterGroup.forEach((group) => {
        let filterForms = group.querySelectorAll('.form-group');
        filterForms.forEach((afilter) => {
            afilter.addEventListener('change', function (event) {
                let target = event.target;
                let name = target.name;
                let id = target.id;
                let value = true;
                if (name.includes('[]')) {
                    //if name key doesn't exist in filters object keys list , we add it
                    name = name.replace('[]', '');
                    //check if name key exists in filters object
                    id = (id.split('-')[2]);
                } else if (name === 'search') {
                    value = target.value;
                }

                if (!Object.keys(filters).includes(name)) {
                    filters[name] = {};
                    checked[name] = {};
                }

                if (target.checked || value !== true) {
                    // if (name === 'active') {
                    //     filters[name] ?? (filters[name] = {});
                    //     uncheckId = id === 'active' ? 'inactive' : 'active';
                    //     uncheckOneButton('.form-group', name, uncheckId);
                    // }else if (name === 'Inactive'){
                    //     filters[name] ?? (filters[name] = {});
                    //     uncheckId = id === 'inactive' ? 'active' : 'inactive';
                    //     uncheckOneButton('.form-group',name , uncheckId);
                    // }
                    filters[name][id] = value;
                    checked[name][id] = afilter;

                } else {
                    delete filters[name][id];
                    delete checked[name][id];

                    if (Object.keys(filters[name]).length === 0) {
                        delete filters[name];
                        delete checked[name];
                    }
                }
            });
        });
    });

    let clearFiltersBtn = document.querySelector('.clear-filter');
    let applyFiltersBtn = document.querySelector('.apply-filter');

    applyFiltersBtn.addEventListener('click', function (event) {
        event.preventDefault();
        filterContainer.classList.remove('active');

        //if filters is empty
        if (Object.keys(filters).length === 0) {
            return;
        }

        ajaxGetDatatableUpsellsInfo(filters);
    });

    function uncheckAllInput() {
        //for each key in checked object keys
        Object.keys(checked).forEach((key) => {
            //if checked[key] is an object
            Object.keys(checked[key]).forEach((subKey) => {
                checked[key][subKey].querySelector('input').checked = false;
            });

        });
        let inputs = filterContainer.querySelectorAll('input[type="text"]');
        inputs.forEach((input) => {
            input.value = '';
        });
        ajaxGetDatatableUpsellsInfo();
    }

    function clearAllInputFields(){
        let filterInputs = document.querySelectorAll('.filter-group input[type="number"]');
        filterInputs.forEach((inputField)=>{
           inputField.value = '';
        });
    }

    clearFiltersBtn.addEventListener('click', function (event) {
        event.preventDefault();
        filters = {};
        uncheckAllInput();
        clearAllInputFields();
        ajaxGetDatatableUpsellsInfo(filters);
    });
}

//call for dateRangePicker
dateRangePicker('upsells-date-cont', 'upsells-daterangepicker', callbackFunctionUpsells);
ajaxGetDatatableUpsellsInfo();

let sectionsHtml = document.querySelectorAll('.filter-container .filter-group');
sectionsHtml.forEach((section) => {
    let heading = section.querySelector('.filter-group-heading-text');
    let arrow = section.querySelector('.filter-group-show-more');
    heading.addEventListener('click', function () {
            let overview = section.querySelector('.filter-group-section');
            arrow.classList.toggle('active');
            overview.classList.toggle('active')
        }
    )
});