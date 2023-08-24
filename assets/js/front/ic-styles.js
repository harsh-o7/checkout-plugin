if (window.innerWidth > 768){
    function checkParent(elementID, formID, percent) {
        let tmp = document.querySelector(elementID);
        while (tmp && tmp.parentNode && !tmp.parentNode.classList.contains(formID)) {
            tmp.style.setProperty('width', '100%', 'important');
            tmp = tmp.parentNode;
        }
        if (tmp) {
            tmp.style.setProperty('width', percent + '%', 'important');
        }
    }

    checkParent(
        ".ic-multi-step-checkout-page #ic-checkout #customer_details",
        "ic-multi-step-checkout-page",
        60
    );

    checkParent(
        ".ic-multi-step-checkout-page .ic-multi-step-checkout-page-2",
        "ic-multi-step-checkout-page",
        39
    );

    checkParent(
        ".ic-single-step-checkout-page .customer_details-left-section",
        "ic-single-step-checkout-page",
        60
    );

    checkParent(
        ".ic-single-step-checkout-page .ic-single-step-checkout-page-2",
        "ic-single-step-checkout-page",
        39
    );
}
let stripeButtons = document.querySelector('div#wc-stripe-payment-request-wrapper');
let stripeOr = document.querySelector('p#wc-stripe-payment-request-button-separator');
let stripeChild = document.querySelector('div#wc-stripe-payment-request-button')
if (stripeOr){
    stripeOr.innerHTML = '<span></span>OR<span></span>';
}
let firstCol = document.querySelector('div#customer_details .col-1');
let multistepNav = document.querySelector('#multistep-navigation');
let customerDetails = document.querySelector('#customer_details');
let steps = document.querySelector('.ic-cc-steps');
let expressPaymentsCont = document.createElement('div');
expressPaymentsCont.classList.add('express-payment-cont');
let expressCheckoutTextCont = document.createElement('div');
expressCheckoutTextCont.classList.add('express-checkout-text-cont');
let expressCheckoutText = document.createElement('p');
if (expressCheckoutText) {
    expressCheckoutText.innerText = 'Express checkout';
}
if (expressCheckoutTextCont) {
    expressCheckoutTextCont.appendChild(expressCheckoutText);
}
if (expressPaymentsCont) {
    expressPaymentsCont.appendChild(expressCheckoutTextCont);
}
if (expressPaymentsCont && stripeButtons) {
    expressPaymentsCont.appendChild(stripeButtons);
}

let paypalExpressLinks = document.querySelectorAll('a.single_add_to_cart_button.eh_paypal_express_link')
if(paypalExpressLinks) {
    paypalExpressLinks.forEach((paypalLink) => {
        expressPaymentsCont.appendChild(paypalLink);
    });
}

let paypal2Button = document.querySelector('div#wc-ppcp-express-button');
if(paypal2Button) {
    expressPaymentsCont.appendChild(paypal2Button);
}

if(stripeOr) {
    // console.log(stripeOr);
    if(multistepNav) {
        customerDetails.insertBefore(expressPaymentsCont, steps);
        customerDetails.insertBefore(stripeOr, steps);
    } else {
        firstCol.insertBefore(expressPaymentsCont, firstCol.querySelector('.woocommerce-billing-fields'));
        firstCol.insertBefore(stripeOr, firstCol.querySelector('.woocommerce-billing-fields'));
    }
}

let windowWidth = window.innerWidth;

const observer = new MutationObserver(function(mutations) {
    mutations.forEach(function(mutation) {
        if (mutation.attributeName === "style") {
            const newDisplayStyle = window.getComputedStyle(stripeOr).display;
            let checkoutRightSection1 = document.querySelector('.ic-single-step-checkout-page-2');
            let checkoutRightSection2 = document.querySelector('.ic-multi-step-checkout-page-2');
            if(newDisplayStyle !== 'none') {
                expressPaymentsCont.style.display = 'flex';
                if (windowWidth>=570){
                   if (checkoutRightSection1){
                       checkoutRightSection1.style.marginTop = '50px';
                   }
                   else if (checkoutRightSection2) {
                       checkoutRightSection2.style.marginTop = '50px';
                   }
                }
            }
        }
    });
});

if (stripeOr) {
    observer.observe(stripeOr, { attributes: true });
}

// let backButton = document.querySelector('#multistep-navigation .back');
//
// if (backButton.style.opacity === '0') {
//     console.log('The element has an inline style of opacity: 0');
// } else {
//     console.log('The element does not have an inline style of opacity: 0');
// }

// let iframe = document.querySelector('#ic-checkout #payment div.payment_box .form-row div > iframe');
// let otherhead = iframe.getElementsByTagName("head")[0];
// let link = iframe.createElement("link");
// link.setAttribute("rel", "stylesheet");
// link.setAttribute("type", "text/css");
// link.setAttribute("href", "style.css");
//
// let style = 'input{ color: red !important; background-color: orange !important;}';
// if (link.styleSheet) {
//     // For IE8 and earlier
//     link.styleSheet.cssText = style;
// } else {
//     // For all other browsers
//     link.appendChild(iframe.createTextNode(style));
// }
//
// otherhead.appendChild(link);
//
// let idInterval1 = setInterval(fun1234, 1000);
// let k = 0;
//
// function fun1234() {
//     let iframeSubForm = document.querySelectorAll("#ic-checkout .payment_box iframe");
//     k++;
//     console.log("ovo je trenutno i: " + k);
//     console.log('ovo je trenutno iframeSubForm: ' + iframeSubForm[1])
//     if (iframeSubForm.length > 0) {
//         clearInterval(idInterval1);
//      setTimeout(()=> {   iframeSubForm.forEach((iframe) => {
//          console.log('RADI SAD, USAO U FOR')
//          console.log(iframe)
//          let newStyleSubForm = document.createElement("style");
//          newStyleSubForm.textContent = `
//             body {
//                 background-color: orange !important;
//             }
//
//             input {
//                 color: red !important; background-color: orange !important;
//             }
//
//             .InputElement {
//                 color: red !important; background: green !important;
//             }`;
//          console.log(iframe.contentDocument);
//          if(iframe.contentDocument) {
//              iframe.contentDocument.head.appendChild(newStyleSubForm);
//          }
//      });}, 10000)
//     }
// }