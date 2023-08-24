let atsTable, sourcesTable;

let CLIENT_ID = '651843957304-ah78k1betucd1c4h7rrtqf8n1jd8f2cv.apps.googleusercontent.com';
let SCOPES = ['https://www.googleapis.com/auth/analytics'];
function authorize(event) {
    // Handles the authorization flow.
    // `immediate` should be false when invoked from the button click.
    var useImmdiate = event ? false : true;
    var authData = {
        client_id: CLIENT_ID,
        scope: SCOPES,
        immediate: useImmdiate,
        plugin_name: 'mCheckout'
    };

    gapi.auth2.authorize(authData, function(response) {
        var authButton = document.getElementById('auth-button');
        if (response.error) {
            authButton.hidden = false;
        }
        else {
            authButton.hidden = true;
            queryAccounts();
        }
    });
}


function queryAccounts() {
    // Load the Google Analytics client library.
    gapi.client.load('analytics', 'v3').then(function() {

        // Get a list of all Google Analytics accounts for this user
        gapi.client.analytics.management.accounts.list().then(handleAccounts);
    });
}


function handleAccounts(response) {
    // Handles the response from the accounts list method.
    if (response.result.items && response.result.items.length) {
        // Get the first Google Analytics account.
        let accounts = response.result.items;
        let accountsCont = document.querySelector('.accounts-container');
        let select = document.createElement('select');
        accounts.forEach((account) => {
           let singleAccountCont = document.createElement('option');
           singleAccountCont.innerText = account.name;
           singleAccountCont.value = account.id;
           select.appendChild(singleAccountCont);
        });
        accountsCont.appendChild(select);
        let saveAccount = document.querySelector('#dashboard #exampleModal button.button-google-analytics-account-choose');
        saveAccount.addEventListener('click', function() {
            let selectGa = document.querySelector('.accounts-container select');
            queryProperties(selectGa.value);
            updateAccountGA(selectGa.value);
            jQuery('#exampleModal').modal('hide');
        });

    } else {
        console.log('No accounts found for this user.');
    }
}

function queryProperties(accountId) {
    // Get a list of all the properties for the account.
    gapi.client.analytics.management.webproperties.list(
        {'accountId': accountId})
        .then(handleProperties)
        .then(null, function(err) {
            // Log any errors.
            console.log(err);
        });
}


function handleProperties(response) {
    // Handles the response from the webproperties list method.
    if (response.result.items && response.result.items.length) {

        // Get the first Google Analytics account
        var firstAccountId = response.result.items[0].accountId;

        // Get the first property ID
        var firstPropertyId = response.result.items[0].id;

        // Query for Views (Profiles).
        queryProfiles(firstAccountId, firstPropertyId);
    } else {
        alert('No UA properties found for this user.');
    }
}


function queryProfiles(accountId, propertyId) {
    // Get a list of all Views (Profiles) for the first property
    // of the first Account.
    gapi.client.analytics.management.profiles.list({
        'accountId': accountId,
        'webPropertyId': propertyId
    })
        .then(handleProfiles)
        .then(null, function(err) {
            // Log any errors.
            console.log(err);
        });
}


function handleProfiles(response) {
    // Handles the response from the profiles list method.
    if (response.result.items && response.result.items.length) {
        // Get the first View (Profile) ID.
        let firstProfileId = response.result.items[0].id;

        // Query the Core Reporting API.
        queryCoreReportingApi(firstProfileId);
    } else {
        console.log('No views (profiles) found for this user.');
    }
}


function queryCoreReportingApi(profileId) {
    // Query the Core Reporting API for the number sessions for
    // the past seven days.

    let startDate = localStorage.getItem('startDate');
    let endDate = localStorage.getItem('endDate');

    initiated = true;
    let connectGABtns = document.querySelectorAll('.connect-ga-wrapper');
    connectGABtns[0].style.display = 'none';
    connectGABtns[1].style.display = 'none';

    gapi.client.analytics.data.ga.get({
        'ids': 'ga:' + profileId,
        'start-date': startDate,
        'end-date': endDate,
        'metrics': 'ga:avgTimeOnPage',
        'dimensions': 'ga:pagePath',
    })
        .then(function (response) {
            let rows = response.result.rows;
            rows.forEach((row) => {
                row[1] = parseFloat(row[1]).toFixed(2);
            });
            updateDataAtsTable(rows);
        })
        .then(null, function (err) {
            // Log any errors.
            console.log(err);
        });

    gapi.client.analytics.data.ga.get({
        'ids': 'ga:' + profileId,
        'start-date': startDate,
        'end-date': endDate,
        'metrics': 'ga:organicSearches',
        'dimensions': 'ga:source',
    })
        .then(function (response) {
            let rows = response.result.rows;
            let newRows = [
                ['direct', 0],
                ['bing', 0],
                ['facebook', 0],
                ['google', 0],
                ['gmail', 0],
                ['instagram', 0],
                ['other', 0]
            ];
            rows.forEach((row) => {
                switch (row[0]) {
                    case '(direct)': newRows[0][1] += parseInt(row[1]); break;
                    case 'bing': newRows[1][1] += parseInt(row[1]); break;
                    case 'facebook': case 'l.facebook.com': case 'm.facebook.com':
                    case 'lm.facebook.com': newRows[2][1] += parseInt(row[1]); break;
                    case 'google': newRows[3][1] += parseInt(row[1]); break;
                    case 'mail.google.com': newRows[4][1] += parseInt(row[1]); break;
                    case 'instagram.com': case 'l.instagram.com': case 'm.instagram.com':
                    case 'lm.instagram.com': newRows[5][1] += parseInt(row[1]); break;
                    default: newRows[6][1] += parseInt(row[1]); break;
                }
            });

            updateDataSourceTable(newRows);
            document.querySelector('#ats-table tbody tr:nth-child(1) td:nth-child(1)').classList.add('active');
        })
        .then(null, function (err) {
            // Log any errors.
            console.log(err);
        });
}

// Add an event listener to the 'auth-button'.
document.getElementById('auth-button').addEventListener('click', authorize);

function updateAccountGA(id) {
    jQuery.ajax({
        url: urls.ajax_url,
        method: 'post',
        data: {
            action: 'ic_update_account_ga',
            nonce: nonces.update_account_ga,
            gaId: id
        }, success: function (result) {
        }
    });
}

function getAccountGA() {
    jQuery.ajax({
        url: urls.ajax_url,
        method: 'get',
        data: {
            action: 'ic_get_account_ga',
            nonce: nonces.get_account_ga,
        }, success: function (result) {
            localStorage.setItem('accountId', result);
        }
    });
}

function addGAEventOnCalendar(startDate, endDate) {
    let accountId = localStorage.getItem('accountId');
    startDate = new Date(startDate).toISOString().split('T')[0];
    endDate = new Date(endDate).toISOString().split('T')[0];
    localStorage.setItem('startDate', startDate);
    localStorage.setItem('endDate', endDate);
    queryProperties(accountId.trim());
}

function initGADataTables() {
    atsTable = jQuery('#ats-table').DataTable({
        language: {
            'paginate': {
                'previous': '<span class="fa-solid fa-angle-left"></span>',
                'next': '<span class="fa-solid fa-angle-right"></span>'
            }
        },
        'paging': true,
        'info': false,
        'pagingType': 'simple',
        'pageLength': 5,
        'bFilter': false,
        'bLengthChange': false,
        'columns': [
            { title: 'Name' },
            { title: 'Time' }
        ],
        'order': [[1, 'desc']]
    });

    sourcesTable = jQuery('#sources-table').DataTable({
        language: {
            'paginate': {
                'previous': '<span class="fa-solid fa-angle-left"></span>',
                'next': '<span class="fa-solid fa-angle-right"></span>'
            }
        },
        'paging': true,
        'info': false,
        'pagingType': 'simple',
        'pageLength': 5,
        'bFilter': false,
        'bLengthChange': false,
        'columns': [
            { title: 'Name' },
            { title: 'Visitors' }
        ],
        'order': [[1, 'desc']],
        'columnDefs': [{
            'targets': 0,
            'data': 'div',
            'render': function (url, type, full) {
                let icon = urls.plugin_url + '/assets/images/' + full[0] + '.svg';
                return '<img class="souce-image" src="' + icon + '" width="32" style="margin-right: 5px;" />' +
                    '<span>' + full[0] + '</span>';
            }
        }]
    });
}

function updateDataAtsTable(data) {
    atsTable.clear();
    atsTable.rows.add(data);
    atsTable.draw();
}

function updateDataSourceTable(data) {
    sourcesTable.clear();
    sourcesTable.rows.add(data);
    sourcesTable.draw();
}

let initiated = false;
// window.onload = function() {
    getAccountGA();
    initGADataTables();
    dateRangePicker('dashboard-date-cont', 'dashboard-daterangepicker', callbackFunctionGoogle);
// }

let callbackFunctionGoogle = function (start, end, label) {
    //formating start and end for our ajax request
    let startTime = start.format('YYYY-MM-DD HH:mm:ss');
    let endTime = end.format('YYYY-MM-DD HH:mm:ss');

    //label for daterange picker
    document.querySelector('#dashboard-daterangepicker span').innerText = label;

    if(initiated) {
        addGAEventOnCalendar(startTime, endTime);
    }
}
