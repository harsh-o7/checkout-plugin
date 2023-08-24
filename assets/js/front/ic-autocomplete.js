// (function($) {
//
//     $(document).ready(function() {
//         $('#billing_address_1').attr('autocomplete', 'new-password');
//     });
//
// })(jQuery);
//
// var RpCheckoutAutocomplete = RpCheckoutAutocomplete || {};
// var RpCheckoutAutocomplete_shipping = RpCheckoutAutocomplete_shipping || {};
// RpCheckoutAutocomplete.event = {};
// RpCheckoutAutocomplete_shipping.event = {};
// RpCheckoutAutocomplete.method = {
//     placeSearch: "",
//     IdSeparator: "",
//     autocomplete : "",
//     streetNumber : "",
//     formFields : {
//         'billing_address_1': '',
//         'billing_address_2': '',
//         'billing_city': '',
//         'billing_state': '',
//         'billing_postcode': '',
//         'billing_country' : ''
//     },
//     formFieldsValue : {
//         'billing_address_1': '',
//         'billing_address_2': '',
//         'billing_city': '',
//         'billing_state': '',
//         'billing_postcode': '',
//         'billing_country' : ''
//     },
//     component_form : "",
//
//     initialize: function(){
//         this.getIdSeparator();
//         this.initFormFields();
//
//         this.autocomplete = new google.maps.places.Autocomplete(
//             (document.getElementById('billing_address_1')),
//             {
//                 types: ['geocode']
//             });
//
//         google.maps.event.addListener(this.autocomplete, 'place_changed', function( event ) {
//             RpCheckoutAutocomplete.method.fillInAddress()
//         });
//         var billing_address = document.getElementById("billing_address_1");
//         if(billing_address != null){
//             billing_address.addEventListener("focus", function( event ) {
//                 RpCheckoutAutocomplete.method.setAutocompleteCountry()
//             }, true);
//         }
//
//         var billing_country = document.getElementById("billing_country");
//         if(billing_country != null){
//             billing_country.addEventListener("change", function( event ) {
//                 RpCheckoutAutocomplete.method.setAutocompleteCountry()
//             }, true);
//         }
//
//
//     },
//     getIdSeparator : function() {
//         if (!document.getElementById('billing_address_1')) {
//             this.IdSeparator = "_";
//             return "_";
//         }
//         this.IdSeparator = ":";
//         return ":";
//     },
//     initFormFields: function ()
//     {
//         for (var field in this.formFields) {
//             this.formFields[field] = (field);
//         }
//         this.component_form =
//         {
//             'street_number': ['billing_address_1', 'short_name'],
//             'route': ['billing_address_1', 'long_name'],
//             'sublocality_level_2': ['billing_address_2', 'long_name'],
//             'neighborhood' : ['billing_address_2', 'long_name'],
//             'locality': ['billing_city', 'long_name'],
//             'postal_town': ['billing_city', 'long_name'],
//             'sublocality_level_1': ['billing_city', 'long_name'],
//             'administrative_area_level_1': ['billing_state', 'short_name'],
//             'administrative_area_level_2': ['billing_state', 'short_name'],
//             'country': ['billing_country', 'long_name'],
//             'postal_code': ['billing_postcode', 'short_name']
//         };
//     },
//
//     fillInAddress : function () {
//         this.clearFormValues();
//         var place = this.autocomplete.getPlace();
//         this.resetForm();
//         var type = '';
//        //  console.log(place.address_components);
//        //  console.log(this.component_form);
//         for (var field in place.address_components) {
//             for (var t in  place.address_components[field].types)
//             {
//                // console.log(place.address_components[field].types);
//                 for (var f in this.component_form) {
//                     var types = place.address_components[field].types;
//
//                     if(f == types[t])
//                     {
//
//                         if(f == "administrative_area_level_1") {
//                             if(document.getElementById("billing_country").value=="GB" || document.getElementById("billing_country").value=="ES"){
//                                 continue;
//                             }
//                         }
//                         var prop = this.component_form[f][1];
//                         if(place.address_components[field].hasOwnProperty(prop)){
//                             this.formFieldsValue[this.component_form[f][0]] = place.address_components[field][prop];
//                             // console.log(this.component_form[f][0] + " = " + place.address_components[field][prop]);
//                         }
//
//                     }
//                 }
//             }
//         }
//         this.streetNumber = place.name;
//
//         this.appendStreetNumber();
//         this.fillForm();
//
//         //update checkout
//         jQuery("#billing_state").trigger("change");
//         jQuery(document.body).trigger("update_checkout");
//         if(typeof  FireCheckout !== 'undefined')
//         {
//             checkout.update(checkout.urls.billing_address);
//         }
//     },
//
//     clearFormValues: function ()
//     {
//         for (var f in this.formFieldsValue) {
//             this.formFieldsValue[f] = '';
//         }
//     },
//     appendStreetNumber : function ()
//     {
//
//         if(this.streetNumber != '')
//         {
//             this.formFieldsValue['billing_address_1'] =  this.streetNumber
//         }
//     },
//     fillForm : function()
//     {
//         for (var f in this.formFieldsValue) {
//             if(f == 'billing_country' )
//             {
//                 this.selectRegion( f,this.formFieldsValue[f]);
//             }
//             else
//             {
//                 if(document.getElementById((f)) === null){
//                     continue;
//                 }
//                 else
//                 {
//                     document.getElementById((f)).value = this.formFieldsValue[f];
//                 }
//
//             }
//         }
//     },
//     selectRegion:function (id,regionText)
//     {
//         if(document.getElementById((id)) == null){
//             return false;
//         }
//         var el = document.getElementById((id));
//         if(el.tagName == 'select') {
//             for(var i=0; i<el.options.length; i++) {
//                 if ( el.options[i].text == regionText ) {
//                     el.selectedIndex = i;
//                     break;
//                 }
//             }
//         }
//     },
//     resetForm :function ()
//     {
//         if(document.getElementById(('billing_address_2')) !== null){
//             document.getElementById(('billing_address_2')).value = '';
//         }
//     },
//
//
//     setAutocompleteCountry : function () {
//
//         if(document.getElementById('billing_country') === null){
//             country = 'US';
//         }
//         else
//         {
//             var country = document.getElementById('billing_country').value;
//         }
//         this.autocomplete.setComponentRestrictions({
//             'country': country
//         });
//     }
//
//
// }
//
//
// RpCheckoutAutocomplete_shipping.method = {
//     placeSearch: "",
//     IdSeparator: "",
//     autocomplete : "",
//     streetNumber : "",
//     formFields : {
//         'shipping_address_1': '',
//         'shipping_address_2': '',
//         'shipping_city': '',
//         'shipping_state': '',
//         'shipping_postcode': '',
//         'shipping_country' : ''
//     },
//     formFieldsValue : {
//         'shipping_address_1': '',
//         'shipping_address_2': '',
//         'shipping_city': '',
//         'shipping_state': '',
//         'shipping_postcode': '',
//         'shipping_country' : ''
//     },
//     component_form : "",
//
//     initialize: function(){
//         this.getIdSeparator();
//         this.initFormFields();
//
//         this.autocomplete = new google.maps.places.Autocomplete(
//             (document.getElementById('shipping_address_1')),
//             {
//                 types: ['geocode']
//             });
//         google.maps.event.addListener(this.autocomplete, 'place_changed', function( event ) {
//             RpCheckoutAutocomplete_shipping.method.fillInAddress()
//         });
//         var shipping_address = document.getElementById("shipping_address_1");
//         if(shipping_address != null){
//             shipping_address.addEventListener("focus", function( event ) {
//                 RpCheckoutAutocomplete_shipping.method.setAutocompleteCountry()
//             }, true);
//         }
//
//         var shipping_country = document.getElementById("shipping_country");
//         if(shipping_country != null){
//             shipping_country.addEventListener("change", function( event ) {
//                 RpCheckoutAutocomplete_shipping.method.setAutocompleteCountry()
//             }, true);
//         }
//
//
//     },
//     getIdSeparator : function() {
//         if (!document.getElementById('shipping_address_1')) {
//             this.IdSeparator = "_";
//             return "_";
//         }
//         this.IdSeparator = ":";
//         return ":";
//     },
//     initFormFields: function ()
//     {
//         for (var field in this.formFields) {
//             this.formFields[field] = (field);
//         }
//         this.component_form =
//         {
//             'street_number': ['shipping_address_1', 'short_name'],
//             'route': ['shipping_address_1', 'long_name'],
//             'locality': ['shipping_city', 'long_name'],
//             'postal_town': ['shipping_city', 'long_name'],
//             'sublocality_level_1': ['shipping_city', 'long_name'],
//             'administrative_area_level_1': ['shipping_state', 'short_name'],
//             'administrative_area_level_2': ['shipping_state', 'short_name'],
//             'country': ['shipping_country', 'long_name'],
//             'postal_code': ['shipping_postcode', 'short_name']
//         };
//     },
//
//     fillInAddress : function () {
//         this.clearFormValues();
//         var place = this.autocomplete.getPlace();
//         //console.log(place);
//         this.resetForm();
//         var type = '';
//         for (var field in place.address_components) {
//             for (var t in  place.address_components[field].types)
//             {
//                 for (var f in this.component_form) {
//                     var types = place.address_components[field].types;
//                     if(f == types[t])
//                     {
//
//                         if(f == "administrative_area_level_1") {
//                             if(document.getElementById("billing_country").value=="GB" || document.getElementById("billing_country").value=="ES"){
//                                 continue;
//                             }
//                         }
//
//                         var prop = this.component_form[f][1];
//                         if(place.address_components[field].hasOwnProperty(prop)){
//                             this.formFieldsValue[this.component_form[f][0]] = place.address_components[field][prop];
//                         }
//
//                     }
//                 }
//             }
//         }
//
//         this.streetNumber = place.name;
//
//         this.appendStreetNumber();
//         this.fillForm();
//
//
//         //update checkout
//         jQuery("#shipping_state").trigger("change");
//         jQuery(document.body).trigger("update_checkout");
//         if(typeof  FireCheckout !== 'undefined')
//         {
//             checkout.update(checkout.urls.shipping_address);
//         }
//     },
//
//     clearFormValues: function ()
//     {
//         for (var f in this.formFieldsValue) {
//             this.formFieldsValue[f] = '';
//         }
//     },
//     appendStreetNumber : function ()
//     {
//         if(this.streetNumber != '')
//         {
//             this.formFieldsValue['shipping_address_1'] =  this.streetNumber;
//         }
//     },
//     fillForm : function()
//     {
//         for (var f in this.formFieldsValue) {
//             if(f == 'shipping_country' )
//             {
//                 this.selectRegion( f,this.formFieldsValue[f]);
//             }
//             else
//             {
//                 if(document.getElementById((f)) === null){
//                     continue;
//                 }
//                 else
//                 {
//                     document.getElementById((f)).value = this.formFieldsValue[f];
//                 }
//
//             }
//         }
//     },
//     selectRegion:function (id,regionText)
//     {
//         if(document.getElementById((id)) == null){
//             return false;
//         }
//         var el = document.getElementById((id));
//         if(el.tagName == 'select') {
//             for(var i=0; i<el.options.length; i++) {
//                 if ( el.options[i].text == regionText ) {
//                     el.selectedIndex = i;
//                     break;
//                 }
//             }
//         }
//     },
//     resetForm :function ()
//     {
//         if(document.getElementById(('shipping_address_2')) !== null){
//             document.getElementById(('shipping_address_2')).value = '';
//         }
//     },
//
//
//     setAutocompleteCountry : function () {
//
//         if(document.getElementById('shipping_country') === null){
//             country = 'US';
//         }
//         else
//         {
//             var country = document.getElementById('shipping_country').value;
//         }
//         this.autocomplete.setComponentRestrictions({
//             'country': country
//         });
//     }
//
//
// }
//
//
// window.addEventListener('load', function(){
//     if(!(document.getElementById('billing_address_1') === null))
//         RpCheckoutAutocomplete.method.initialize();
//     if(!(document.getElementById('shipping_address_1') === null))
//         RpCheckoutAutocomplete_shipping.method.initialize();
// });
//
// if(!(document.getElementById('billing_address_1') === null)){
//     var billaddr = document.getElementById('billing_address_1');
//     google.maps.event.addDomListener(billaddr, 'keydown', function(e) {
//         if (e.keyCode == 13) {
//             e.preventDefault();
//         }
//     });
// }
//
// if(!(document.getElementById('shipping_address_1') === null)){
//     var shipaddr = document.getElementById('shipping_address_1');
//     google.maps.event.addDomListener(shipaddr, 'keydown', function(e) {
//         if (e.keyCode == 13) {
//             e.preventDefault();
//         }
//     });
// }

//Iskoristio sam da napravim delay na input event od pola sekunde, da se ne nagomilavaju callovi
function debounce(func, delay) {
    let timeoutId;
    return function() {
        const context = this;
        const args = arguments;
        clearTimeout(timeoutId);
        timeoutId = setTimeout(() => {
            func.apply(context, args);
        }, delay);
    };
}

function addressAutocomplete(containerElement, callback, options) {
    if (containerElement){
        // create input element
        var inputElement = containerElement.querySelector("input");
        inputElement.setAttribute("type", "text");
        inputElement.setAttribute("placeholder", options.placeholder);

        /* Current autocomplete items data (GeoJSON.Feature) */
        var currentItems;

        /* Active request promise reject function. To be able to cancel the promise when a new request comes */
        var currentPromiseReject;

        /* Focused item in the autocomplete list. This variable is used to navigate with buttons */
        var focusedItemIndex;

        /* Execute a function when someone writes in the text field: */
        inputElement.addEventListener("input",debounce(function(e) {

            var currentValue = this.value;

            /* Close any already open dropdown list */
            closeDropDownList();

            // Cancel previous request promise
            if (currentPromiseReject) {
                currentPromiseReject({
                    canceled: true
                });
            }

            /* Create a new promise and send geocoding request */
            var promise = new Promise((resolve, reject) => {
                currentPromiseReject = reject;

                var apiKey = "93ba9fcf109245fa80b3a5f201d2d828";
                var url = `https://api.geoapify.com/v1/geocode/autocomplete?text=${encodeURIComponent(currentValue)}&limit=5&apiKey=${apiKey}`;

                if (options.type) {
                    url += `&type=${options.type}`;
                }

                fetch(url)
                    .then(response => {
                        // check if the call was successful
                        if (response.ok) {
                            response.json().then(data => resolve(data));
                        } else {
                            response.json().then(data => reject(data));
                        }
                    });
            });

            promise.then((data) => {
                currentItems = data.features;

                /*create a DIV element that will contain the items (values):*/
                var autocompleteItemsElement = document.createElement("div");
                autocompleteItemsElement.setAttribute("class", "autocomplete-items");
                containerElement.appendChild(autocompleteItemsElement);

                /* For each item in the results */
                data.features.forEach((feature, index) => {
                    /* Create a DIV element for each element: */
                    var itemElement = document.createElement("DIV");
                    /* Set formatted address as item value */
                    itemElement.innerHTML = feature.properties.formatted;

                    /* Set the value for the autocomplete text field and notify: */
                    itemElement.addEventListener("click", function(e) {
                        inputElement.value = currentItems[index].properties.formatted;

                        callback(currentItems[index]);

                        /* Close the list of autocompleted values: */
                        closeDropDownList();
                    });

                    autocompleteItemsElement.appendChild(itemElement);
                });
            }, (err) => {
                if (!err.canceled) {
                    console.log(err);
                }
            });

        },500) );

        /* Add support for keyboard navigation */
        inputElement.addEventListener("keydown", function(e) {
            var autocompleteItemsElement = containerElement.querySelector(".autocomplete-items");
            if (autocompleteItemsElement) {
                var itemElements = autocompleteItemsElement.getElementsByTagName("div");
                if (e.keyCode == 40) {
                    e.preventDefault();
                    /*If the arrow DOWN key is pressed, increase the focusedItemIndex variable:*/
                    focusedItemIndex = focusedItemIndex !== itemElements.length - 1 ? focusedItemIndex + 1 : 0;
                    /*and and make the current item more visible:*/
                    setActive(itemElements, focusedItemIndex);
                } else if (e.keyCode == 38) {
                    e.preventDefault();

                    /*If the arrow UP key is pressed, decrease the focusedItemIndex variable:*/
                    focusedItemIndex = focusedItemIndex !== 0 ? focusedItemIndex - 1 : focusedItemIndex = (itemElements.length - 1);
                    /*and and make the current item more visible:*/
                    setActive(itemElements, focusedItemIndex);
                } else if (e.keyCode == 13) {
                    /* If the ENTER key is pressed and value as selected, close the list*/
                    e.preventDefault();
                    if (focusedItemIndex > -1) {
                        closeDropDownList();
                    }
                }
            } else {
                if (e.keyCode == 40) {
                    /* Open dropdown list again */
                    var event = document.createEvent('Event');
                    event.initEvent('input', true, true);
                    inputElement.dispatchEvent(event);
                }
            }
        });

        function setActive(items, index) {
            if (!items || !items.length) return false;

            for (var i = 0; i < items.length; i++) {
                items[i].classList.remove("autocomplete-active");
            }

            /* Add class "autocomplete-active" to the active element*/
            items[index].classList.add("autocomplete-active");

            // Change input value and notify
            inputElement.value = currentItems[index].properties.formatted;
            callback(currentItems[index]);
        }

        function closeDropDownList() {
            var autocompleteItemsElement = containerElement.querySelector(".autocomplete-items");
            if (autocompleteItemsElement) {
                containerElement.removeChild(autocompleteItemsElement);
            }

            focusedItemIndex = -1;
        }

        function addIcon(buttonElement) {
            var svgElement = document.createElementNS("http://www.w3.org/2000/svg", 'svg');
            svgElement.setAttribute('viewBox', "0 0 24 24");
            svgElement.setAttribute('height', "24");

            var iconElement = document.createElementNS("http://www.w3.org/2000/svg", 'path');
            iconElement.setAttribute("d", "M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z");
            iconElement.setAttribute('fill', 'currentColor');
            svgElement.appendChild(iconElement);
            buttonElement.appendChild(svgElement);
        }

        /* Close the autocomplete dropdown when the document is clicked.
          Skip, when a user clicks on the input field */
        document.addEventListener("click", function(e) {
            if (e.target !== inputElement) {
                closeDropDownList();
            } else if (!containerElement.querySelector(".autocomplete-items")) {
                // open dropdown list again
                var event = document.createEvent('Event');
                event.initEvent('input', true, true);
                inputElement.dispatchEvent(event);
            }
        });

    }else{
       // console.log('Error: No element with this id');
    }

}

addressAutocomplete(document.getElementById("billing_address_1_field"), (data) => {
    let selectedCity = data.properties.city;
    let selectedCountry = data.properties.country_code;
    let selectedPostcode = data.properties.postcode;

    if(selectedCity) {
        document.querySelector('input#billing_city').value = selectedCity;
        jQuery('#billing_state').val(selectedCity);
            jQuery('#billing_state').trigger('change');

    }
    if(selectedPostcode) {
        document.querySelector('input#billing_postcode').value = selectedPostcode;
    }
    if(selectedCountry) {
        jQuery('#billing_country').val(selectedCountry.toUpperCase());
        jQuery('#billing_country').trigger('change');
    }
}, {
});

addressAutocomplete(document.getElementById("shipping_address_1_field"), (data) => {
    if (document.getElementById("shipping_address_1_field")){
        let selectedCity = data.properties.city;
        let selectedCountry = data.properties.country_code;
        let selectedPostcode = data.properties.postcode;
        console.log(selectedCountry);
        if(selectedCity) {
            document.querySelector('input#shipping_city').value = selectedCity;
        }
        if(selectedPostcode) {
            document.querySelector('input#shipping_postcode').value = selectedPostcode;
        }
        if(selectedCountry) {
            jQuery('#shipping_country').val(selectedCountry.toUpperCase());
            jQuery('#shipping_country').trigger('change');
        }
    }else{
        console.log('There is no shipping address element to be found');
    }

}, {
});