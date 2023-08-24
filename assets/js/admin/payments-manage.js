jQuery('#cod-shipping-methods').selectWoo();
jQuery('#woocommerce_authnet_allowed_card_types').selectWoo();

let buttons = document.querySelectorAll('.payment-submit-button');

function buttonFunctionality(buttonSelector, callback) {
    if (buttonSelector) {
        buttonSelector.addEventListener('click', function (e) {
            e.preventDefault();
            callback();
        });
    }
}

function checkSuccess(success, message, id='#wpbody-content') {
    if (success) {
        jQuery(id).ajaxSubmit({
            success: function () {
                swal({
                    title: 'Success',
                    text: message + ' updated successfully',
                    icon: 'success',
                    button: 'Ok'
                }).then((value) => {
                });
            }
        });
    } else {
        swal({
            title: 'Error',
            text: 'Something went wrong',
            icon: 'error',
            button: 'Ok'
        }).then((value) => {
            location.reload();
        })
    }
}

function updateAuthNet() {
    let authNetEnabled = document.querySelector('#authnet-active').checked;
    let enabled = authNetEnabled ? 'yes' : 'no';


    let title = document.querySelector('#authnet-title').value;
    let description = document.querySelector('#authnet-desc').value;
    let loginId = document.querySelector('#authnet-login-id').value;
    let transactionKey = document.querySelector('#authnet-transaction-key').value;
    let sandbox = document.querySelector('#authnet-sandbox').checked;
    let testMode = sandbox ? 'yes' : 'no';

    let debug = document.querySelector('#authnet-gateaway-bug').checked;
    let debugMode = debug ? 'yes' : 'no';

    let logging = document.querySelector('#authnet-logging').checked;
    let loggingMode = logging ? 'yes' : 'no';

    let capture = document.querySelector('#authnet-capture').checked;
    let captureMode = capture ? 'yes' : 'no';

    let customer_receipt = document.querySelector('#authnet-customer-receipt').checked;
    let customerReceiptMode = customer_receipt ? 'yes' : 'no';

    let cardTypes = document.querySelectorAll('#cod-shipping-methods option');
    let cards = [];
    cardTypes.forEach((card) => {
        if (card.selected) {
            cards.push(card.id);
        }
    });

    jQuery.ajax({
        url: urls.ajax_url,
        type: 'post',
        data: {
            action: 'ic_update_payment_authnet',
            nonce: nonces.update_payment_authnet,
            enabled: enabled,
            title: title,
            description: description,
            api_login_id: loginId,
            transaction_key: transactionKey,
            test: testMode,
            allowed_card_types: cards,
            logging: loggingMode,
            debugging: debugMode,
            capture: captureMode,
            customer_receipt: customerReceiptMode
        },
        success: function (response) {
            let success =  response.trim().replace(" ", "") === "success";
            checkSuccess(success, 'Authorize.Net');
        }
    });
}

function updateCod() {
    let codEnabled = document.querySelector('#cod-active').checked;
    let enabled = 'no';
    if (codEnabled) {
        enabled = 'yes';
    }
    let title = document.querySelector('#cod-title').value.trim();
    let description = document.querySelector('#cod-desc').value.trim();
    let instructions = document.querySelector('#cod-instructions').value.trim();
    let shippingSelected = document.querySelectorAll('#cod-shipping-methods option');
    let shippings = [];
    shippingSelected.forEach((shipping) => {
        if (shipping.selected) {
            shippings.push(shipping.value);
        }
    });
    let virtual = document.querySelector('#cod-virtual').checked;
    let acceptVirtual = 'no';
    if (virtual) {
        acceptVirtual = 'yes';
    }

    jQuery.ajax({
        url: urls.ajax_url,
        type: 'post',
        data: {
            action: 'ic_update_payment_cod',
            nonce: nonces.update_payment_cod,
            enabled: enabled,
            title: title,
            description: description,
            instructions: instructions,
            shippings: shippings,
            acceptVirtual: acceptVirtual
        },
        success: function (response) {
            let success =  response.trim().replace(" ", "") === "success";
            checkSuccess(success, 'Cash on Delivery');
        }
    });
}

function updateCp() {
    let cpEnabled = document.querySelector('#cp-active').checked;
    let enabled = 'no';
    if (cpEnabled) {
        enabled = 'yes';
    }
    let title = document.querySelector('#cp-title').value.trim();
    let description = document.querySelector('#cp-desc').value.trim();
    let instructions = document.querySelector('#cp-instructions').value.trim();

    jQuery.ajax({
        url: urls.ajax_url,
        type: 'post',
        data: {
            action: 'ic_update_payment_cp',
            nonce: nonces.update_payment_cp,
            enabled: enabled,
            title: title,
            description: description,
            instructions: instructions,
        },
        success: function (response) {
            let success =  response.trim().replace(" ", "") === "success";
            checkSuccess(success, 'Cash Payment');
        }
    });
}

function updateBacs() {
    let bacsEnabled = document.querySelector('#bacs-active').checked;
    let enabled = 'no';
    if (bacsEnabled) {
        enabled = 'yes';
    }
    let title = document.querySelector('#bacs-title').value.trim();
    let description = document.querySelector('#bacs-desc').value.trim();
    let instructions = document.querySelector('#bacs-instructions').value.trim();

    jQuery.ajax({
        url: urls.ajax_url,
        type: 'post',
        data: {
            action: 'ic_update_payment_bacs',
            nonce: nonces.update_payment_bacs,
            enabled: enabled,
            title: title,
            description: description,
            instructions: instructions,
        },
        success: function (response) {
            let success =  response.trim().replace(" ", "") === "success";
            checkSuccess(success, 'Direct bank transfer');
        }
    });
}

function updateEhAlipayStripe() {
    let aliEnabled = document.querySelector('#eh_alipay_stripe-active').checked;
    let enabled = 'no';
    if (aliEnabled) {
        enabled = 'yes';
    }


    let title = document.querySelector('#eh_alipay_stripe-title').value.trim();
    let description = document.querySelector('#eh_alipay_stripe-desc').value.trim();
    let orderButtonText = document.querySelector('#eh_alipay_stripe-ord-button-text').value.trim();

    jQuery.ajax({
        url: urls.ajax_url,
        type: 'post',
        data: {
            action: 'ic_update_payment_eh_alipay_stripe',
            nonce: nonces.update_payment_eh_alipay_stripe,
            enabled: enabled,
            title: title,
            description: description,
            order_button_text: orderButtonText,
        },
        success: function (response) {
            let success =  response.trim().replace(" ", "") === "success";
            checkSuccess(success, 'Alipay ');
        }
    });
}

function updateEhAffirmStripe() {
    let aliEnabled = document.querySelector('#eh_affirm_stripe-active').checked;
    let enabled = 'no';
    if (aliEnabled) {
        enabled = 'yes';
    }


    let title = document.querySelector('#eh_affirm_stripe-title').value.trim();
    let description = document.querySelector('#eh_affirm_stripe-desc').value.trim();
    let orderButtonText = document.querySelector('#eh_affirm_stripe-ord-button-text').value.trim();

    jQuery.ajax({
        url: urls.ajax_url,
        type: 'post',
        data: {
            action: 'ic_update_payment_eh_affirm_stripe',
            nonce: nonces.update_payment_eh_affirm_stripe,
            enabled: enabled,
            title: title,
            description: description,
            order_button_text: orderButtonText,
        },
        success: function (response) {
            let success =  response.trim().replace(" ", "") === "success";
            checkSuccess(success, 'Affirm ');
        }
    });
}

function updateEhAfterpayStripe() {
    let aliEnabled = document.querySelector('#eh_afterpay_stripe-active').checked;
    let enabled = 'no';
    if (aliEnabled) {
        enabled = 'yes';
    }


    let title = document.querySelector('#eh_afterpay_stripe-title').value.trim();
    let description = document.querySelector('#eh_afterpay_stripe-desc').value.trim();
    let orderButtonText = document.querySelector('#eh_afterpay_stripe-ord-button-text').value.trim();

    jQuery.ajax({
        url: urls.ajax_url,
        type: 'post',
        data: {
            action: 'ic_update_payment_eh_afterpay_stripe',
            nonce: nonces.update_payment_eh_afterpay_stripe,
            enabled: enabled,
            title: title,
            description: description,
            order_button_text: orderButtonText,
        },
        success: function (response) {
            let success =  response.trim().replace(" ", "") === "success";
            checkSuccess(success, 'Afterpay');
        }
    });
}

function updateEhCheckoutStripe() {
    let eh_checkout_stripeEnabled = document.querySelector('#eh_checkout_stripe-active').checked;
    let enabled = eh_checkout_stripeEnabled ? 'yes' : 'no';


    let title = document.querySelector('#eh_checkout_stripe-title').value;
    let description = document.querySelector('#eh_checkout_stripe-desc').value;
    let orderButtonText = document.querySelector('#eh_checkout_stripe-ord-button-text').value;

    let sendLinesCheckBox = document.querySelector('#eh_checkout_stripe-line-items').checked;
    let sendLinesMode = sendLinesCheckBox ? 'yes' : 'no';

    let billing = document.querySelector('#eh_checkout_stripe-billing').checked;
    let billingMode = billing ? 'yes' : 'no';

    let shipping = document.querySelector('#eh_checkout_stripe-shipping').checked;
    let shippingMode = shipping ? 'yes' : 'no';


    let locales = jQuery('#eh_checkout_stripe-locales option:selected').attr('id');


    let cardTypes = document.querySelectorAll('#cod-shipping-methods option');

    jQuery.ajax({
        url: urls.ajax_url,
        type: 'post',
        data: {
            action: 'ic_update_payment_eh_stripe_checkout',
            nonce: nonces.update_payment_eh_stripe_checkout,
            enabled: enabled,
            title: title,
            description: description,
            order_button_text: orderButtonText,
            send_lines: sendLinesMode,
            billing: billingMode,
            shipping: shippingMode,
            locales: locales,
        },
        success: function (response) {

            let success =  response.trim().replace(" ", "") === "success";
            checkSuccess(success, 'Checkout Stripe');
        }
    });
}


buttons.forEach((button) => {
    let id = button.id;
    let splitted = id.split('-');
    let buttonId = splitted[0].split('_');
    let functionSuffix = "";
    buttonId.forEach((part) => {
        functionSuffix += part.charAt(0).toUpperCase() + part.slice(1);
    })
    let buttonCallback = 'update' + functionSuffix;

    buttonFunctionality(button, window[buttonCallback]);
});






