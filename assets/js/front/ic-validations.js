let errorMessages = urls.errors;
let zones = [];
let countriesAdded = false;
let stepTwoShorcut = document.querySelector('span.step-two');
let stepThreeShotrcut = document.querySelector('span.step-three');
let shipToDifferentAddress = document.querySelector('input#ship-to-different-address-checkbox');

function getAvailibleShipping() {
    return jQuery.ajax({
        url: MYajax.ajax_url,
        type: 'GET',
        data: {
            action: 'ic_get_shipping_methods_by_country',
        }
    });
}

let validationForms = document.querySelectorAll('.form-row.validate-required ');
validationForms.forEach(function (validationForm) {
    let validationInput = validationForm.querySelector('input');
    if(validationInput) {
        validationInput.addEventListener('blur', function () {
            var errorSpan = document.createElement('span');
            errorSpan.classList.add('error-message');
            let idForm = validationForm.getAttribute('id');
            let serializedId = idForm.replace('billing_',"").replace("_field", "");
            let errorPerfix = errorMessages[serializedId];
            if (idForm == 'billing_address_1_field'){
             let errorAddressText = document.querySelector('.custom-test-c-address-error');
             let errorAddressTextMS = document.querySelector('.custom-test-c-ms-address-error');

                if (errorAddressText){
                 errorSpan.innerHTML = errorAddressText.innerText + ' ';
             }else if(errorAddressTextMS){
                 errorSpan.innerHTML = errorAddressTextMS.innerText + ' ';
             }else{
                    errorSpan.innerHTML = errorPerfix + ' ';
                }
            }else{
                errorSpan.innerHTML = errorPerfix + ' ';
            }
            if (validationInput.value === '') {
                if(! validationForm.classList.contains('error')){
                    //add class error to form
                    validationForm.classList.add('error');
                    //append error span
                    validationForm.appendChild(errorSpan);
                }

            } else {
                //remove child
                let errorMessage = validationForm.querySelector('.error-message');
                if(errorMessage) {
                    validationForm.querySelector('.error-message').remove();
                }
                //remove class error
                validationForm.classList.remove('error');
            }
        });
    }
})

// let selectedCountries = ['AF', 'BH', 'BI', 'CZ', 'GF', 'GP', 'IM', 'KW', 'LB', 'LU', 'MT', 'MQ', 'YT', 'PT', 'PR', 'RE', 'SG', 'KR', 'LK']

function insertAfter(newNode, existingNode) {
    existingNode.parentNode.insertBefore(newNode, existingNode.nextSibling);
}

let counter = 0;
function checkIsOdd() {
    // let stateField = document.querySelector('#billing_state');
    // let stateFieldP = document.querySelector('p#billing_state_field');
    // let stateHasValue = true;
    //
    // if(stateFieldP.classList.contains('validate-required')) {
    //     console.log(stateField + '---' + stateField.value + '---' + stateFieldP.style.display);
    //     if(stateField && stateField.value === '' && stateFieldP.style.display !== 'none') {
    //         stateHasValue = false;
    //         let errorMessage = stateFieldP.querySelector('.error-message');
    //         if(!errorMessage) {
    //             stateFieldP.classList.remove('error');
    //             let errorSpan = document.createElement('span');
    //             errorSpan.innerText = 'State is required';
    //             errorSpan.classList.add('error-message');
    //             stateFieldP.appendChild(errorSpan);
    //             stateFieldP.classList.add('error');
    //         }
    //     } else {
    //         //remove child
    //         let errorMessage = stateFieldP.querySelector('.error-message');
    //         if(errorMessage) {
    //             stateFieldP.querySelector('.error-message').remove();
    //         }
    //         //remove class error
    //         stateFieldP.classList.remove('error');
    //     }
    // } else {
    //     let errorMessage = stateFieldP.querySelector('.error-message');
    //     if(errorMessage) {
    //         stateFieldP.querySelector('.error-message').remove();
    //     }
    //     //remove class error
    //     stateFieldP.classList.remove('error');
    // }


    let inputs = document.querySelectorAll('.woocommerce-billing-fields .form-row')
    setTimeout(function () {

        let countryField = document.querySelector('#billing_country_field');
        countryField.parentElement.appendChild(countryField);

        for ( const input of inputs ){
            if (input.style.display == 'none'){
                counter++;
            }
        }

        let windowWidth = window.innerWidth;

        if (windowWidth >= 570){

            let rows = document.querySelectorAll('#ic-checkout .woocommerce-billing-fields .form-row');
            let visibleRows = [];
            for (let i = 0; i < rows.length; i++) {
                if (window.getComputedStyle(rows[i]).display !== 'none') {
                    visibleRows.push(rows[i]);
                }
            }
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
                        row.classList.add('lastLine-billing');
                    }
                }
            }

            let leftLineBillingRows = document.querySelectorAll('.leftLine-billing')
            let rightLineBillingRows = document.querySelectorAll('.rightLine-billing')
            let lastRow = document.querySelector('.lastLine-billing');

            if (leftLineBillingRows && rightLineBillingRows){
                leftLineBillingRows.forEach((leftLineRow)=>{
                    leftLineRow.style = 'width: 48% !important; margin-left: 0% !important;';
                });
                rightLineBillingRows.forEach((rightLineRow)=>{
                    rightLineRow.style = 'width: 48% !important; margin-left: 4% !important;';
                });
                if (lastRow){
                    lastRow.style= 'width: 100% !important; margin-left: 0% !important;';
                }
            }




            /*
            let i = 1;
            let inputRows = document.querySelectorAll('.woocommerce-billing-fields .form-row');
            inputRows.forEach((input) => {
                if(input.style.display != 'none') {
                    if(i % 2 === 1) {
                        input.style = 'width: 48% !important; margin-left: 0% !important;'
                    } else {
                        input.style = 'width: 48% !important; margin-left: 4% !important;'
                    }
                    i++;
                }
            });

            if (i % 2 === 0){
                inputRows[inputRows.length-1].style='width: 100% !important; margin-left: 0 !important;'
            }
            else {
                inputRows[inputRows.length-1].style='width: 48% !important; margin-left: 4% !important;'
            }
            */
            counter = 0;
        }

    //     let continueBtn = document.querySelector('span.continue');
    //     let placeOrderButton = document.querySelector('button#place_order');
    //
    //     let selectedCountry = jQuery('#billing_country').val();
    //     let countryHaveShipping = false;
    //     if(!zones.includes(selectedCountry)) {
    //         countryHaveShipping = false;
    //     } else {
    //         countryHaveShipping = true;
    //     }
    //
    //     let inputsFilled = true;
    //     validationInputs.forEach((validationInput) => {
    //         if(validationInput.value == '') {
    //             inputsFilled = false;
    //         }
    //     });
    //     let billingStateField = document.querySelector('#billing_state_field');
    //     if(jQuery('#billing_state').val() === '' && billingStateField.classList.contains('validate-required') && billingStateField.style.display !== 'none') {
    //         inputsFilled = false;
    //     }
    //
    //     if(shipToDifferentAddress) {
    //         if(!shipToDifferentAddress.checked) {
    //             if(continueBtn) {
    //                 if(countryHaveShipping && inputsFilled && stateHasValue) {
    //                     continueBtn.classList.remove('disabled');
    //                     stepTwoShorcut.classList.remove('disabled');
    //                     stepThreeShotrcut.classList.remove('disabled');
    //                 } else {
    //                     continueBtn.classList.add('disabled');
    //                     stepTwoShorcut.classList.add('disabled');
    //                     stepThreeShotrcut.classList.add('disabled');
    //                 }
    //             } else {
    //                 if(countryHaveShipping && inputsFilled && stateHasValue) {
    //                     placeOrderButton.classList.remove('disabled');
    //                 } else {
    //                     placeOrderButton.classList.add('disabled');
    //                 }
    //             }
    //         }
    //     } else {
    //         if(continueBtn) {
    //             if(countryHaveShipping && inputsFilled && stateHasValue) {
    //                 continueBtn.classList.remove('disabled');
    //                 stepTwoShorcut.classList.remove('disabled');
    //                 stepThreeShotrcut.classList.remove('disabled');
    //             } else {
    //                 continueBtn.classList.add('disabled');
    //                 stepTwoShorcut.classList.add('disabled');
    //                 stepThreeShotrcut.classList.add('disabled');
    //             }
    //         } else {
    //             if(countryHaveShipping && inputsFilled && stateHasValue) {
    //                 placeOrderButton.classList.remove('disabled');
    //             } else {
    //                 placeOrderButton.classList.add('disabled');
    //             }
    //         }
    //     }
    //     document.querySelector('#billing_state').onchange = checkIsOdd;
    //     console.log(countryHaveShipping + '--' + inputsFilled + '--' + stateHasValue)
    //
    }, 100)
}

function checkIsOddShipping() {
    // let stateField = document.querySelector('#billing_state');
    // let stateFieldP = document.querySelector('p#billing_state_field');
    // let stateHasValue = true;
    //
    // if(stateFieldP.classList.contains('validate-required')) {
    //     if(stateField && stateField.value === '' && stateFieldP.style.display !== 'none') {
    //         stateHasValue = false;
    //         let errorMessage = stateFieldP.querySelector('.error-message');
    //         if(!errorMessage) {
    //             stateFieldP.classList.remove('error');
    //             let errorSpan = document.createElement('span');
    //             errorSpan.innerText = 'State is required';
    //             errorSpan.classList.add('error-message');
    //             stateFieldP.appendChild(errorSpan);
    //             stateFieldP.classList.add('error');
    //         }
    //     } else {
    //         //remove child
    //         let errorMessage = stateFieldP.querySelector('.error-message');
    //         if(errorMessage) {
    //             stateFieldP.querySelector('.error-message').remove();
    //         }
    //         //remove class error
    //         stateFieldP.classList.remove('error');
    //     }
    // } else {
    //     let errorMessage = stateFieldP.querySelector('.error-message');
    //     if(errorMessage) {
    //         stateFieldP.querySelector('.error-message').remove();
    //     }
    //     //remove class error
    //     stateFieldP.classList.remove('error');
    // }

    let inputs = document.querySelectorAll('.woocommerce-shipping-fields .form-row')
    setTimeout(function () {

        let countryField = document.querySelector('#shipping_country_field');
        if (countryField){
            countryField.parentElement.appendChild(countryField);
        }

        for ( const input of inputs ){
            if (input.style.display == 'none'){
                counter++;
            }
        }

        let windowWidth = window.innerWidth;

        if (windowWidth >= 570){
            let i = 1;
            let inputRows = document.querySelectorAll('.woocommerce-shipping-fields .form-row');
            inputRows.forEach((input) => {
                if(input.style.display != 'none') {
                    if(i % 2 === 1) {
                        input.style = 'width: 48% !important; margin-left: 0% !important;'
                    } else {
                        input.style = 'width: 48% !important; margin-left: 3% !important;'
                    }
                    i++;
                }
            });

            if (i % 2 === 0){
                inputRows[inputRows.length-1].style='width: 100% !important; margin-left: 0 !important;'
            }
            else {
                inputRows[inputRows.length-1].style='width: 48% !important; margin-left: 3% !important;'
            }
            counter = 0;
        }

        // let continueBtn = document.querySelector('span.continue');
        // let placeOrderButton = document.querySelector('button#place_order');
        //
        // let selectedCountry = jQuery('#shipping_country').val();
        // let countryHaveShipping = false;
        // if(!zones.includes(selectedCountry)) {
        //     countryHaveShipping = false;
        // } else {
        //     countryHaveShipping = true;
        // }
        //
        // let inputsFilled = true;
        // validationInputs.forEach((validationInput) => {
        //     if(validationInput.value == '') {
        //         inputsFilled = false;
        //     }
        // });
        // let billingStateField = document.querySelector('#billing_state_field');
        // if(jQuery('#billing_state').val() === '' && billingStateField.classList.contains('validate-required') && billingStateField.style.display !== 'none') {
        //     inputsFilled = false;
        // }
        //
        // if(shipToDifferentAddress) {
        //     if(shipToDifferentAddress.checked) {
        //         if(continueBtn) {
        //             if(countryHaveShipping && inputsFilled && stateHasValue) {
        //                 continueBtn.classList.remove('disabled');
        //                 stepTwoShorcut.classList.remove('disabled');
        //                 stepThreeShotrcut.classList.remove('disabled');
        //             } else {
        //                 continueBtn.classList.add('disabled');
        //                 stepTwoShorcut.classList.add('disabled');
        //                 stepThreeShotrcut.classList.add('disabled');
        //             }
        //         } else {
        //             if(countryHaveShipping && inputsFilled && stateHasValue) {
        //                 placeOrderButton.classList.remove('disabled');
        //             } else {
        //                 placeOrderButton.classList.add('disabled');
        //             }
        //         }
        //     }
        // } else {
        //     if(continueBtn) {
        //         if(countryHaveShipping && inputsFilled && stateHasValue) {
        //             continueBtn.classList.remove('disabled');
        //             stepTwoShorcut.classList.remove('disabled');
        //             stepThreeShotrcut.classList.remove('disabled');
        //         } else {
        //             continueBtn.classList.add('disabled');
        //             stepTwoShorcut.classList.add('disabled');
        //             stepThreeShotrcut.classList.add('disabled');
        //         }
        //     } else {
        //         if(countryHaveShipping && inputsFilled && stateHasValue) {
        //             placeOrderButton.classList.remove('disabled');
        //         } else {
        //             placeOrderButton.classList.add('disabled');
        //         }
        //     }
        // }
        // console.log(countryHaveShipping + '--' + inputsFilled + '--' + stateHasValue)

    }, 100)
}

jQuery.when(getAvailibleShipping()).done(function(response) {
    zones = JSON.parse(response);
    setTimeout(checkIsOdd, 1300);
    setTimeout(checkIsOddShipping, 1300);

    document.querySelector('#billing_country').onchange = checkIsOdd;
    document.querySelector('#billing_state').onchange = checkIsOdd;
    if(shipToDifferentAddress) {
        document.querySelector('#shipping_country').onchange = checkIsOddShipping;
        shipToDifferentAddress.onchange = function () {
            checkIsOdd();
            checkIsOddShipping();
        }
    }
});

let validationInputs = document.querySelectorAll('.form-row.validate-required input');
validationInputs.forEach((input) => {
    input.addEventListener('blur', function() {
        checkIsOdd();
        checkIsOddShipping();

    });
});

setTimeout(function () {
    jQuery('#billing_country').select2({
        placeholder: 'Select a country',
        templateResult: function (option) {
            if (option.element) {
                var baseUrl = urls.plugin_url + '/assets/images/flags';
                var imageUrl = baseUrl + '/' + option.element.value.toLowerCase() + '.svg';
                if (imageUrl) {
                    return jQuery('<img src="' + imageUrl + '">').add(jQuery('<span>' + option.text + '</span>'));
                }
            }
        },
        templateSelection: function(option) {
            if (option.element) {
                var baseUrl = urls.plugin_url + '/assets/images/flags';
                var imageUrl = baseUrl + '/' + option.element.value.toLowerCase() + '.svg';
                if (imageUrl) {
                    let element = jQuery('<img src="' + imageUrl + '">').add(jQuery('<span>' + option.text + '</span>'));
                    return jQuery('<img src="' + imageUrl + '">').add(jQuery('<span>' + option.text + '</span>'));
                }
            }
        }
    });

    jQuery('#shipping_country').select2({
        placeholder: 'Select a country',
        templateResult: function (option) {
            if (option.element) {
                var baseUrl = urls.plugin_url + '/assets/images/flags';
                var imageUrl = baseUrl + '/' + option.element.value.toLowerCase() + '.svg';
                if (imageUrl) {
                    return jQuery('<img src="' + imageUrl + '">').add(jQuery('<span>' + option.text + '</span>'));
                }
            }
        },
        templateSelection: function(option) {
            if (option.element) {
                var baseUrl = urls.plugin_url + '/assets/images/flags';
                var imageUrl = baseUrl + '/' + option.element.value.toLowerCase() + '.svg';
                if (imageUrl) {
                    let element = jQuery('<img src="' + imageUrl + '">').add(jQuery('<span>' + option.text + '</span>'));
                    return jQuery('<img src="' + imageUrl + '">').add(jQuery('<span>' + option.text + '</span>'));
                }
            }
        }
    });
}, 1000)

