let startTimeForCustomersDatatable = new Date();
let endTimeForCustomersDatatable = new Date();

const thousandsFormatterDecimalsCustomers = new Intl.NumberFormat('en-US', {
    minimumFractionDigits: 1,
    maximumFractionDigits: 1
});

const thousandsFormatterCustomers = new Intl.NumberFormat('en-US');

function formatWithFloorCustomers(num) {
    return Math.floor(num * 10) / 10;
}

function getPercentagesCustomers(liveValues, previousValues) {
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

function getPercentageCustomers(liveValue, previousValue) {
    if (previousValue === 0) {
        return 100;
    }
    return (liveValue / previousValue) * 100 - 100;
}


//defining callback function for dateRangePicker
var callbackFunctionCustomers = function (start, end, label) {
    //formating start and end for our ajax request
    let startTime = start.format('YYYY-MM-DD HH:mm:ss');
    let endTime = end.format('YYYY-MM-DD HH:mm:ss');

    startTimeForCustomersDatatable = startTime;
    endTimeForCustomersDatatable = endTime;

    //label for daterange picker
    let dateRangePickerSpan = document.querySelector('#customers-daterangepicker span');
    if (dateRangePickerSpan) {
        dateRangePickerSpan.innerText = label;
    }

    // let updateCustomers = document.querySelector('input#update-discount-button');
    // if(updateCustomers) {
    //     let discountId = updateDiscount.dataset.discountId;
    //     ajaxGetSingleDiscountData(startTime, endTime, discountId);
    // } else {
    //     ajaxGetDatatableDiscountsInfo(startTime, endTime);
    //     ajaxGetDiscountsData(startTime, endTime);
    // }
}

//call for dateRangePicker
dateRangePicker('customers-date-cont', 'customers-daterangepicker', callbackFunctionCustomers);
