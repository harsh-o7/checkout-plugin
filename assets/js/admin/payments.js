let paymentsDataTable;

function ajaxGetPaymentMethods() {
    jQuery.ajax({
        url: urls.ajax_url,
        type: 'get',
        data: {
            action: 'ic_get_payment_methods',
            nonce: nonces.get_payment_methods
        },
        success: function (response) {
            let payments = JSON.parse(response);
            initPaymentsDataTable(payments);
            initSwitchers();
            document.querySelector('#payments h3 span').innerText = payments.length;
        }
    });
}

function initPaymentsDataTable(rows) {
    paymentsDataTable = jQuery('#payments-table').DataTable({
        data: rows,
        language: {
            'paginate': {
                'previous': '<i class="fa-solid fa-angle-left"></i>',
                'next': '<i class="fa-solid fa-angle-right"></i>'
            }
        },
        lengthMenu: [
            [10, 25, 50, -1],
            [10, 25, 50, 'All'],
        ],
        'searching': false,
        'ordering': true,
        'paging': true,
        'info': false,
        'pagingType': 'simple',
        'pageLength': 10,
        'bLengthChange': true,
        'columnDefs': [{
            'targets': 0,
            'data': 'div',
            'render': function (url, type, full) {
                if (full[3].includes('klarna')) {
                    return '<div class="payment-image-table"><img src="' + urls.plugin_url + '/assets/images/klarna.png' + '" /></div><span class="payment-title">' + full[0] + '</span>';
                } else if(full[3].includes('bacs')) {
                    return '<div class="payment-image-table"><img src="' + urls.plugin_url + '/assets/images/Direct bank transfer.png' + '" /></div><span class="payment-title">' + full[0] + '</span>';
                } else if(full[3].includes('2check')) {
                    return '<div class="payment-image-table"><img src="' + urls.plugin_url + '/assets/images/2C.png' + '" /></div><span class="payment-title">' + full[0] + '</span>';
                } else if(full[3].includes('affirm')) {
                    return '<div class="payment-image-table"><img src="' + urls.plugin_url + '/assets/images/Affirm.png' + '" /></div><span class="payment-title">' + full[0] + '</span>';
                } else if(full[3].includes('bluesnap')) {
                    return '<div class="payment-image-table"><img src="' + urls.plugin_url + '/assets/images/BlueSnap.png' + '" /></div><span class="payment-title">' + full[0] + '</span>';
                } else if(full[3].includes('afterpay')) {
                    return '<div class="payment-image-table"><img src="' + urls.plugin_url + '/assets/images/Afterpay.png' + '" /></div><span class="payment-title">' + full[0] + '</span>';
                } else if(full[3].includes('stripe')) {
                    return '<div class="payment-image-table"><img src="' + urls.plugin_url + '/assets/images/stripe.png' + '" /></div><span class="payment-title">' + full[0] + '</span>';
                } else if(full[3] == 'cod') {
                    return '<div class="payment-image-table"><img src="' + urls.plugin_url + '/assets/images/cod.png' + '" /></div><span class="payment-title">' + full[0] + '</span>';
                } else if(full[3].includes('ppcp')) {
                    return '<div class="payment-image-table"><img src="' + urls.plugin_url + '/assets/images/paypal.png' + '" /></div><span class="payment-title">' + full[0] + '</span>';
                }
                return '<div class="payment-image-table"><img src="' + urls.plugin_url + '/assets/images/woocommerce-placeholder.png' + '" /></div><span class="payment-title">' + full[0] + '</span>';
            },
        },
            {
                'targets': 1,
                'data': 'div',
                'render': function (url, type, full) {
                    let active = full[1] == 'yes' ? 'checked' : '';
                    let returnValue = '<div class="payment-edit-section-table">' +
                        '<label class="switch">' +
                        '<input type="checkbox" data-id="' + full[3] + '"' + active + '>' +
                        '<span class="slider round"></span>\n' +
                        '</label>'
                    if (full[4]) {
                        returnValue += '<a href="' + full[2] + '">Manage</a>';
                    }

                    returnValue += '</div>';

                    return returnValue;
                }
            }, {
                'targets': 2,
                'visible': false,
                'searchable': false,
                'render': function (url, type, full) {
                    return full[1] === 'yes' ? 1 : 0;
                }
            },],
        'columns': [
            {title: 'Title'},
            {title: 'Active'}
        ],
        'order': [[2, 'desc']],
        'drawCallback': function () {
            initSwitchers();
        }
    });


}

function initSwitchers() {
    let switchers = document.querySelectorAll('.payment-edit-section-table');
    switchers.forEach(function (switcher) {
        let events = switcher.getAttribute('click-listener');
        if (events == null) {
            switcher.setAttribute('click-listener', 'true');
            switcher.addEventListener('change', function (e) {
                let id = e.target.getAttribute('data-id');
                let active = e.target.checked;
                let enabled = active ? 1 : 0;
                jQuery.ajax({
                    url: urls.ajax_url,
                    type: 'post',
                    data: {
                        action: 'ic_update_payment_method',
                        nonce: nonces.update_payment_method,
                        id: id,
                        enabled: enabled,
                    },
                    success: function (response) {
                        console.log(response);
                    }
                });
            });
        }
    });
}

ajaxGetPaymentMethods();