let discountsDataTable = null;
let filterDiscounts = document.querySelector('.filter-discount');
let filterContainerDiscounts = document.querySelector('.filter-container-discounts');
let filterExitDiscounts = document.querySelector('.filter-container-discounts .ic-exit-d-filter');
let filtersDiscounts = {};
let checkedDiscounts = {};
// let filterContainer = document.querySelector('.filter-container');
// let filterBtn = document.querySelector('.filter-discount');
// let discountsTable = jQuery('#discounts-table');
let discountsFilters = {};
let discountsChecked = {};

let startTimeForDatatable = new Date();
let endTimeForDatatable = new Date();

const thousandsFormatterDecimalsD = new Intl.NumberFormat('en-US', {
    minimumFractionDigits: 1,
    maximumFractionDigits: 1
});

const thousandsFormatterD = new Intl.NumberFormat('en-US');

function formatWithFloorD(num) {
    return Math.floor(num * 10) / 10;
}

function getPercentages(liveValues, previousValues) {
    let percentages = {};

    for (let [key, value] of Object.entries(liveValues)) {
        let previousValue = previousValues[key];
        let percentage = getPercentage(parseFloat(value), parseFloat(previousValue));
        percentages[key] = {
            'value': Math.abs(percentage),
            'sign': percentage > 0 ? 'plus' : 'minus'
        }
    }

    return percentages;

}

function getPercentage(liveValue, previousValue) {
    if (previousValue === 0) {
        return 100;
    }
    return (liveValue / previousValue) * 100 - 100;
}


function ajaxGetDiscountsData(startDate, endDate) {
    jQuery.ajax({
        url: urls.ajax_url,
        type: 'get',
        data: {
            action: 'ic_get_discounts_main_analytics',
            nonce: nonces.get_discounts_main_analytics,
            startDate: startDate,
            endDate: endDate,
        },
        success: function (response) {
            response = JSON.parse(response);
            let values = response.live;
            let previousValues = response.previous;
            updateLabel('ds-cr-inner', thousandsFormatterDecimalsD.format(formatWithFloorD(parseFloat(values.conversionRate))) + '%');
            updateLabel('ds-te-inner', thousandsFormatterD.format(values.timesEntered));
            updateLabel('ds-tp-inner', thousandsFormatterD.format(values.timesPurchased));


            let amountPurchased = 0;
            if (values.amountPurchased != 0){
              amountPurchased = parseFloat(Number(values.amountPurchased).toFixed(1));
            }
            updateLabel('ds-ap-inner', info.currency + thousandsFormatterDecimalsD.format(formatWithFloorD(amountPurchased)));

            let amountDiscounted = 0;
            if (values.amountDiscounted != 0){
                amountDiscounted =parseFloat(Number(values.amountDiscounted).toFixed(1));
            }
            updateLabel('ds-da-inner', info.currency + thousandsFormatterDecimalsD.format(formatWithFloorD(amountDiscounted)));

            let percentages = getPercentages(values, previousValues);

            updatePreviousPercentage('.percent.dsc-cr-p', percentages.conversionRate);
            updatePreviousPercentage('.percent.dsc-ta-p', percentages.timesEntered);
            updatePreviousPercentage('.percent.dsc-tp-p', percentages.timesPurchased);
            updatePreviousPercentage('.percent.dsc-ap-p', percentages.amountPurchased);
            updatePreviousPercentage('.percent.dsc-da-p', percentages.amountDiscounted);


        }
    });
}

var discountsTable;

function ajaxGetDatatableDiscountsInfo(filters = null) {
    discountsTable = document.querySelector('#discounts-table');

    if (discountsTable) {
        jQuery.ajax({
            url: urls.ajax_url,
            type: 'get',
            data: {
                action: 'ic_get_datatable_discounts_info',
                nonce: nonces.get_datatable_discounts_info,
                filters: filters,
                start_date: startTimeForDatatable,
                end_date: endTimeForDatatable
            },
            success: function (response) {
                let discounts = JSON.parse(response);
                if (discounts.length === 0 && filters === null){
                    rerenderDiscount();
                }
                else {
                    document.querySelector('#inner-number-discount').innerText = discounts.length;
                    //showHideAnalyticsBtn.querySelector('p').innerText = 'Show Analytics';
                    initdiscountsDataTable(discounts);
                }
            }
        });
    }
}

function ajaxGetSingleDiscountData(startDate, endDate, discountId) {
    jQuery.ajax({
       url: urls.ajax_url,
       type: 'get',
       data: {
           action: 'ic_get_single_discount_main_analytics',
           startDate: startDate,
           endDate: endDate,
           discountId: discountId
       },
       success: function (response) {
           response = JSON.parse(response);
           let values = response.live;

           let previousValues = response.previous;

           updateLabel('ds-cr-inner', thousandsFormatterDecimalsD.format(formatWithFloorD(parseFloat(values.conversionRate))) + '%');
           updateLabel('ds-te-inner', thousandsFormatterD.format(values.timesEntered));
           updateLabel('ds-tp-inner', thousandsFormatterD.format(values.timesPurchased));
           updateLabel('ds-ap-inner', info.currency + thousandsFormatterDecimalsD.format(formatWithFloorD(parseFloat(values.amountPurchased))));
           updateLabel('ds-da-inner', info.currency + thousandsFormatterDecimalsD.format(formatWithFloorD(parseFloat(values.amountDiscounted))));

           let percentages = getPercentages(values, previousValues);

           updatePreviousPercentage('.percent.dsc-cr-p', percentages.conversionRate);
           updatePreviousPercentage('.percent.dsc-ta-p', percentages.timesEntered);
           updatePreviousPercentage('.percent.dsc-tp-p', percentages.timesPurchased);
           updatePreviousPercentage('.percent.dsc-ap-p', percentages.amountPurchased);
           updatePreviousPercentage('.percent.dsc-da-p', percentages.amountDiscounted);
       }
    });
}

function rerenderDiscount(){
    let mainContainer = document.querySelector('#discounts .app-inner');
    mainContainer.innerHTML='';
    mainContainer.innerHTML=`
                    <div class="page-title">
                    <h5>Home <i class="fa-regular fa-angle-right"></i> Discounts</h5>
                    <h2>Discounts <img src="` + urls.plugin_url + 'assets/images/discountsIcon.svg' + `" alt="discount-icon">
                        </h2>
                    </div>
                     <div class="ic-empty-upsell-page-box">   
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none"><rect width="32" height="32" rx="16" fill="#F2F4F7"/><path fill-rule="evenodd" clip-rule="evenodd" d="M15.7637 10.4413L21.7795 16.4757C22.0735 16.7687 22.0735 17.2437 21.7795 17.5366L17.5205 21.7803C17.2264 22.0732 16.7497 22.0732 16.4557 21.7803L10.4358 15.7417C10.1567 15.4617 10 15.0831 10 14.6884V11.5004C10 10.6717 10.6742 10 11.5058 10H14.6995C15.0991 10 15.4821 10.1588 15.7637 10.4413ZM12.625 13.75C13.2463 13.75 13.75 13.2463 13.75 12.625C13.75 12.0037 13.2463 11.5 12.625 11.5C12.0037 11.5 11.5 12.0037 11.5 12.625C11.5 13.2463 12.0037 13.75 12.625 13.75Z" fill="#667085"/></svg>
                        <p class="ic-empty-upsell-page-box-title">No discounts yet</p>
                        <p class="ic-empty-upsell-page-box-text">Create and manage discounts that apply <br>automatically to a customer’s cart.</p>
                        <div class="ic-empty-upsell-page-box-link"><a href="admin.php?page=mcheckout-discount-add-new"><i class="fa-solid fa-plus"></i> Create Discount</a></div>
                     </div>
                    `;
}

function rerenderDiscountsDatatable() {
    let discountsTable = document.querySelector('#discounts-table');
    if(discountsTable) {


        jQuery.ajax({
            url: urls.ajax_url,
            type: 'get',
            data: {
                action: 'ic_get_datatable_discounts_info',
                nonce: nonces.get_datatable_discounts_info,
                filters: null,
                start_date: startTimeForDatatable,
                end_date: endTimeForDatatable,
            },
            success: function (response) {
                let discounts = JSON.parse(response);
                if (discounts.length === 0){
                    rerenderDiscount()
                }
                else {
                discountsDataTable.clear();
                discountsDataTable.rows.add(discounts);
                discountsDataTable.draw();
                }
            }
        });
    }
}

let globalOrderingOfDTDiscounts = 8;
let globalOrderTypeOfDTDiscounts = 'desc';

function initdiscountsDataTable(rows) {

    if (discountsDataTable != null) {
        let orderDiscountsDT =discountsDataTable.order();
        globalOrderingOfDTDiscounts=orderDiscountsDT[0][0];
        globalOrderTypeOfDTDiscounts=orderDiscountsDT[0][1];
    }

    let dataTableOptions = {
        data: rows,
        language: {
            'paginate': {
                'previous': '<i class="fa-solid fa-angle-left"></i>',
                'next': '<i class="fa-solid fa-angle-right"></i>'
            },
            "search": "",
            "searchPlaceholder": "Search for discounts...",
        },
        'searching': true,
        'paging': true,
        //'lengthChange': false,
        'info': false,
        'pagingType': 'simple',
        'pageLength': 5,
        'bLengthChange': true,
        'columnDefs': [{
            'targets': 0,
            'title': 'Discount name',
            'data': 'discountName',
            'render': function (url, type, full) {
                return '<div class="discount-image-table"></div><span>' + full['discountData']['discountName'] + '</span>';

            },
        },
            {
                'targets': 1,
                'title': 'Discount triggers',
                'data': 'discountTrigger',
                render: function (url, type, full) {
                    let trigger = null;
                    if (full['discountData']['discountTrigger'] === 'specificProducts') {
                        trigger = 'Specific products';
                    } else {
                        trigger = 'Entire Order';
                    }
                    return '<span class="discount-trigger">' + trigger + '</span>';
                }

            },
            {
                'targets': 2,
                'title': 'Type of Discount',
                'data': 'discountType',
                render: function (url, type, full) {
                    let discType = {
                        'disc-buy-x': 'Buy X get Y',
                        'disc-percentage': 'Percentage',
                        'disc-fixed': 'Fixed',
                        'disc-free-shipp': 'Free Shipping',
                    }
                    return '<span class="discount-type">' + discType[full['discountData']['discountType']] + '</span>';
                }
            },
            {
                'targets': 3,
                'title': 'Date',
                'data': 'discountValue',
                render: function (url, type, full) {
                    return '<span class="discount-value">' + full['discountData']['discountValue'] + '</span>';
                }
            },
            {
                'targets': 4,
                'data': 'discountActive',
                'title': 'Active',
                'render': function (url, type, full) {
                    // return '<div class="discount-active">' + full['discountActive'] + '</div>';
                    let active = full['discountData']['discountActive'] == '1' ? 'checked' : '';
                    return '<div class="discount-edit-section-table">' +
                        '<label class="switch">' +
                        '<input type="checkbox" data-id="' + full['discountData']['discountId'] + '"' + active + '>' +
                        '<span class="slider round"></span>\n' +
                        '</label>' +
                        '<a href="admin.php?page=mcheckout-discount-edit&id=' + full['discountData']['discountId'] + '">' +
                        '<img src="' + urls.plugin_url + 'assets/images/edit-3.png' + '" alt="edit-discount">' +
                        '</a>' +
                        '<a class="discount-table-delete" data-id="' + full['discountData']['discountId'] + '">' +
                        '<img src="' + urls.plugin_url + 'assets/images/trash-can.png' + '" alt="delete-discount">' +
                        '</a>' +
                        '</div>';
                }
            },
            {
                'targets': 5,
                'data': 'conversionRate',
                'title': 'Conversion Rate',
                'visible': false,
                'render': function (url, type, full) {
                    let icConversionRateDiscount = 0;
                    if(full['discountData']['realConversionRate']==='-'){
                        return '<div class="discount-conversion-rate">-</div>';
                    }
                    if (full['discountData']['realConversionRate'] != 0){
                        return '<div class="discount-conversion-rate">' + thousandsFormatterDecimalsD.format(formatWithFloorD(parseFloat(full['discountData']['realConversionRate'].replace(',','')))) + '%</div>';
                    }else{
                        return '<div class="discount-conversion-rate">' + thousandsFormatterDecimalsD.format(formatWithFloorD(icConversionRateDiscount)) + '%</div>';
                    }
                }
            },
            {
                'targets': 6,
                'data': 'timesEntered',
                'title': 'Times Entered',
                'visible': false,
                'render': function (url, type, full) {
                    if (full['discountData']['realTimesEntered'] !== '-'){
                        return '<div class="discount-times-entered">' + thousandsFormatterD.format(parseInt(full['discountData']['realTimesEntered'])) + '</div>';
                    }else{
                        return '<div class="discount-times-entered">-</div>';
                    }
                }
            },
            {
                'targets': 7,
                'data': 'timesPurchased',
                'title': 'Times Purchased',
                'visible': false,
                'render': function (url, type, full) {
                    if (full['discountData']['realTimesPurchased'] !== '-'){
                        return '<div class="discount-times-purchased">' + thousandsFormatterD.format(parseInt(full['discountData']['realTimesPurchased'])) + '</div>';
                    }else{
                        return '<div class="discount-times-purchased">-</div>';
                    }
                }
            },
            {
                'targets': 8,
                'data': 'amountPurchased',
                'title': 'Amount Purchased',
                'visible': false,
                'render': function (url, type, full) {
                    if (full['discountData']['realAmountPurchased'] != '-'){
                        let amountPurchased =0;
                        if (full['discountData']['realAmountPurchased'] != 0){
                            amountPurchased = parseFloat(Number(full['discountData']['realAmountPurchased']).toFixed(1));
                        }
                        return '<div class="discount-amount-purchased">' + info.currency + thousandsFormatterDecimalsD.format(formatWithFloorD(amountPurchased)) + '</div>';
                    }else{
                        return '<div class="discount-amount-purchased">-</div>';

                    }
                }
            },
            {
                'targets': 9,
                'data': 'amountDiscounted',
                'title': 'Amount Discounted',
                'visible': false,
                'render': function (url, type, full) {
                    if (full['discountData']['realDiscountedAmount'] != '-'){
                        let amountDiscounted = 0;
                        if (full['discountData']['realDiscountedAmount'] != 0){
                            amountDiscounted = parseFloat(Number(full['discountData']['realDiscountedAmount']).toFixed(1));
                        }
                        return '<div class="discount-amount-discounted">' + info.currency + thousandsFormatterDecimalsD.format(formatWithFloorD(amountDiscounted)) + '</div>';
                    }else{
                        return '<div class="discount-amount-discounted">-</div>';

                    }
                }
            }


        ],
        // 'columns': [
        //     {title: 'Conversion Rate'},
        //     {title: 'Times Entered'},
        //     {title: 'Times Purchased'},
        //     {title: 'Amount Purchased'},
        //     {title: 'Discounted Amount'}
        //     ,
        // ],
        'order': [[globalOrderingOfDTDiscounts, globalOrderTypeOfDTDiscounts]],
        'drawCallback': function () {
            let deleteBtns = document.querySelectorAll('.discount-table-delete');
            deleteBtns.forEach((deleteBtn) => {
                let events = deleteBtn.getAttribute('click-listener');
                if (events == null) {
                    deleteBtn.setAttribute('click-listener', 'true');
                    deleteBtn.addEventListener('click', function () {
                        swal({
                            title: "Are you sure?",
                            text: "Do you want to delete selected Discount?",
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
                                        action: 'ic_discount_delete',
                                        nonce: nonces.discount_delete,
                                        discount: id
                                    },
                                    success: function (response) {
                                        rerenderDiscountsDatatable();
                                    }
                                });
                            }
                        });
                    });
                }
            });

            let activeUpdateCheckboxes = document.querySelectorAll('.discount-edit-section-table input[type="checkbox"]');
            activeUpdateCheckboxes.forEach((checkbox) => {
                let events = checkbox.getAttribute('click-listener');
                if (events == null) {
                    checkbox.setAttribute('click-listener', 'true');
                    checkbox.addEventListener('click', function () {
                        let discountActives = [];

                        activeUpdateCheckboxes.forEach((discountInput) => {
                            let id = discountInput.dataset.id;
                            let active = discountInput.checked;

                            let discountCheckbox = {
                                id: id,
                                active: active
                            }

                            discountActives.push(discountCheckbox);
                        });

                        jQuery.ajax({
                            url: urls.ajax_url,
                            type: 'post',
                            data: {
                                action: 'ic_update_discount_active_status',
                                // nonce: nonces.us_publish_hide,
                                discounts: discountActives
                            },
                            success: function (response) {

                            }
                        });
                    });
                }
            });
        }
    };

    if (discountsDataTable != null) {
        discountsDataTable.destroy();
    }

    discountsDataTable = jQuery('#discounts-table').DataTable(dataTableOptions);

    discountsDataTable.draw();


    // let discountsTable = document.querySelector('#discounts-table');


    let showHideDiscountsBtn = document.querySelector('.show-hide-analytics-discounts');
    if (discountsTable.classList.contains('analytics')){
        discountsDataTable.column(1).visible(true);
        discountsDataTable.column(2).visible(true);
        discountsDataTable.column(3).visible(true);
        discountsDataTable.column(4).visible(true);
        discountsDataTable.column(5).visible(false);
        discountsDataTable.column(6).visible(false);
        discountsDataTable.column(7).visible(false);
        discountsDataTable.column(8).visible(false);
        discountsDataTable.column(9).visible(false);
    }else{
        discountsDataTable.column(1).visible(false);
        discountsDataTable.column(2).visible(false);
        discountsDataTable.column(3).visible(false);
        discountsDataTable.column(4).visible(false);
        discountsDataTable.column(5).visible(true);
        discountsDataTable.column(6).visible(true);
        discountsDataTable.column(7).visible(true);
        discountsDataTable.column(8).visible(true);
        discountsDataTable.column(9).visible(true);
    }

    let eventsDiscount = showHideDiscountsBtn.getAttribute('click-listener');
    if (eventsDiscount == null){
        showHideDiscountsBtn.setAttribute('click-listener',true);
        showHideDiscountsBtn.addEventListener('click', function(){
           discountsTable.classList.toggle('analytics');

            discountsDataTable.column(1).visible(!discountsDataTable.column(1).visible());
            discountsDataTable.column(2).visible(!discountsDataTable.column(2).visible());
            discountsDataTable.column(3).visible(!discountsDataTable.column(3).visible());
            discountsDataTable.column(4).visible(!discountsDataTable.column(4).visible());
            discountsDataTable.column(5).visible(!discountsDataTable.column(5).visible());
            discountsDataTable.column(6).visible(!discountsDataTable.column(6).visible());
            discountsDataTable.column(7).visible(!discountsDataTable.column(7).visible());
            discountsDataTable.column(8).visible(!discountsDataTable.column(8).visible());
            discountsDataTable.column(9).visible(!discountsDataTable.column(9).visible());
            if (discountsDataTable.column(1).visible()){
                showHideDiscountsBtn.querySelector('p').innerText = 'Show analytics';
            }else{
                showHideDiscountsBtn.querySelector('p').innerText = 'Hide analytics' ;
            }
        });
    }

}


/*
var showHideAnalyticsBtn = document.querySelector('.show-hide-analytics-discounts');
if (showHideAnalyticsBtn) {
    showHideAnalyticsBtn.addEventListener('click', function () {
        discountsTable.classList.toggle('analytics');
        // discountsDataTable.column(0).visible(!discountsDataTable.column(0).visible());
        discountsDataTable.column(1).visible(!discountsDataTable.column(1).visible());
        discountsDataTable.column(2).visible(!discountsDataTable.column(2).visible());
        discountsDataTable.column(3).visible(!discountsDataTable.column(3).visible());
        discountsDataTable.column(4).visible(!discountsDataTable.column(4).visible());
        discountsDataTable.column(5).visible(!discountsDataTable.column(5).visible());
        discountsDataTable.column(6).visible(!discountsDataTable.column(6).visible());
        discountsDataTable.column(7).visible(!discountsDataTable.column(7).visible());
        discountsDataTable.column(8).visible(!discountsDataTable.column(8).visible());
        discountsDataTable.column(9).visible(!discountsDataTable.column(9).visible());
        if (!discountsDataTable.column(1).visible()) {
            showHideAnalyticsBtn.querySelector('p').innerText = 'Hide analytics';
        } else {
            showHideAnalyticsBtn.querySelector('p').innerText = 'Show analytics';
        }
    });
}
*/


function updateLabel(divClass, value) {
    let label = document.querySelector('.' + divClass + ' h4');
    if (label) {
        label.innerText = value;
    }
}

function updatePreviousPercentage(divClass, value) {
    let label = document.querySelector(divClass );
    if (label) {
        let labelSpan = label.querySelector('span');
        if (value['sign'] === 'plus') {
            label.classList.remove('minus');
            labelSpan.innerText = thousandsFormatterDecimalsD.format(formatWithFloorD(value['value'])) + '%';
        } else {
            label.classList.add('minus');
            labelSpan.innerText =' ' + thousandsFormatterDecimalsD.format(formatWithFloorD(value['value'])) + '%';
        }
    }
}



//defining callback function for dateRangePicker
var callbackFunctionDiscounts = function (start, end, label) {
    //formating start and end for our ajax request
    let startTime = start.format('YYYY-MM-DD HH:mm:ss');
    let endTime = end.format('YYYY-MM-DD HH:mm:ss');

    startTimeForDatatable = startTime;
    endTimeForDatatable = endTime;

    //label for daterange picker
    let dateRangePickerSpan = document.querySelector('#discounts-daterangepicker span');
    if (dateRangePickerSpan) {
        dateRangePickerSpan.innerText = label;
    }

    let updateDiscount = document.querySelector('input#update-discount-button');
    if(updateDiscount) {
        let discountId = updateDiscount.dataset.discountId;
        ajaxGetSingleDiscountData(startTime, endTime, discountId);
    } else {
        ajaxGetDatatableDiscountsInfo(startTime, endTime);
        ajaxGetDiscountsData(startTime, endTime);
    }
}

//call for dateRangePicker
dateRangePicker('discounts-date-cont', 'discounts-daterangepicker', callbackFunctionDiscounts);

if(filterDiscounts) {
    filterDiscounts.addEventListener('click', function() {
       filterContainerDiscounts.classList.toggle('active');
    });

    filterExitDiscounts.addEventListener('click', function() {
       filterContainerDiscounts.classList.remove('active');
    });

    function uncheckOneButton(upperClass, name, id) {
        document.querySelector(upperClass + ' #' + id).checked = false;
        delete filtersDiscounts[name][id];
    }

    let filterGroup = filterContainerDiscounts.querySelectorAll('.filter-group');
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

                if (!Object.keys(filtersDiscounts).includes(name)) {
                    filtersDiscounts[name] = {};
                    checkedDiscounts[name] = {};
                }

                if (target.checked || value !== true) {
                    // if (name === 'active') {
                    //     filtersDiscounts[name] ?? (filtersDiscounts[name] = {});
                    //     uncheckId = id === 'active' ? 'inactive' : 'active';
                    //     uncheckOneButton('.form-group', name, uncheckId);
                    // }
                    filtersDiscounts[name][id] = value;
                    checkedDiscounts[name][id] = afilter;

                } else {
                    delete filtersDiscounts[name][id];
                    delete checkedDiscounts[name][id];

                    if (Object.keys(filtersDiscounts[name]).length === 0) {
                        delete filtersDiscounts[name];
                        delete checkedDiscounts[name];
                    }

                }
            });
        });
    });

    let clearFiltersBtnDiscounts = document.querySelector('.clear-filter-discounts');
    let applyFiltersBtnDiscounts = document.querySelector('.apply-filter-discounts');

    applyFiltersBtnDiscounts.addEventListener('click', function (event) {
        event.preventDefault();
        filterContainerDiscounts.classList.remove('active');

        //if filters is empty
        if (Object.keys(filtersDiscounts).length === 0) {
            return;
        }
        ajaxGetDatatableDiscountsInfo(filtersDiscounts);
    });

    function uncheckAllInputDiscounts() {
        //for each key in checked object keys
        Object.keys(checkedDiscounts).forEach((key) => {
            //if checked[key] is an object
            Object.keys(checkedDiscounts[key]).forEach((subKey) => {
                checkedDiscounts[key][subKey].querySelector('input').checked = false;
            });

        });
        let inputs = filterContainerDiscounts.querySelectorAll('input[type="number"]');
        inputs.forEach((input) => {
            input.value = '';
        });
        ajaxGetDatatableDiscountsInfo();
    }

    clearFiltersBtnDiscounts.addEventListener('click', function (event) {
        event.preventDefault();
        filtersDiscounts = {};
        uncheckAllInputDiscounts();
        ajaxGetDatatableDiscountsInfo(filtersDiscounts);
    });
}