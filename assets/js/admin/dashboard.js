let championsDataTable, bestSellersDataTable, countriesDataTable;

const chartDateOptions = {
    month: 'short',
    day: 'numeric'
}

const chartDateMonthsOptions = {
    month: 'short'
}

const thousandsFormatterDecimals = new Intl.NumberFormat('en-US', {
    minimumFractionDigits: 1,
    maximumFractionDigits: 1
});

const thousandsFormatter = new Intl.NumberFormat('en-US');

function formatWithFloor(num) {
    return Math.floor(num * 10) / 10;
}

function getMaxRotation() {

    if (window.innerWidth < 1700) {
        if (window.innerWidth < 1280){
            return 90;
        }
        return 60;
    }
    return 0;
}

// Chart Total Revenue
const ctxTotalRevenue = document.getElementById('chart-revenue').getContext('2d');
const chartConfigTotalRevenue = {
    type: 'line',
    data: {
        labels: ['one', 'two'],
        datasets: [{
            data: [1, 2],
            fill: true,
            borderColor: '#0A8BFE',
            backgroundColor: 'transparent',
            borderWidth: 2,
            tension: 0,
            radius: 0,
            hoverRadius: 3,
            hitRadius: 6,
            cubicInterpolationMode: 'monotone',
            pointBackgroundColor: '#0A8BFE'
        }]
    },
    options: {
        tooltips: {
            displayColors: false,
            callbacks: {
                title: function () {
                },
                label: function (context) {
                    return info.currency + thousandsFormatterDecimals.format(formatWithFloor(context.yLabel));
                }
            }
        },
        responsive: true,
        maintainAspectRatio: false,
        scales: {
            y: {
                beginAtZero: true,
            },
        },
        legend: {
            display: false
        },
        scales: {
            xAxes: [{
                ticks: {
                    display: true,
                    fontColor: '#98A2B3',
                    fontSize: 10,
                    padding: 10,
                    maxTicksLimit: 6,
                    maxRotation: getMaxRotation(),


                },
                gridLines: {
                    display: true,
                    color: '#F2F4F7',
                    borderDash: [5, 5]
                },
            }],
            yAxes: [{
                ticks: {
                    fontColor: '#98A2B3',
                    fontSize: 10,
                    display: true,
                    padding: 10,
                    min: 0,
                    callback: function(value, index, values) {
                        return info.currency + thousandsFormatter.format(value);
                    }
                },
                gridLines: {
                    display: true,
                    color: '#F2F4F7'
                },
            }]
        },
        layout: {
            padding: 0
        },
    }
};

const chartTotalRevenue = new Chart(ctxTotalRevenue, chartConfigTotalRevenue);

// Chart Num of Orders
const ctxNumOfOrders = document.getElementById('chart-num-of-orders').getContext('2d');
const chartConfigNumOfOrders = {
    type: 'line',
    data: {
        labels: ['one', 'two'],
        datasets: [{
            data: [1, 2],
            fill: true,
            borderColor: '#0A8BFE',
            backgroundColor: 'transparent',
            borderWidth: 2,
            tension: 0,
            radius: 0,
            hoverRadius: 3,
            hitRadius: 6,
            cubicInterpolationMode: 'monotone',
            pointBackgroundColor: '#0A8BFE'
        }]
    },
    options: {
        tooltips: {
            displayColors: false,
            callbacks: {
                title: function () {
                },
                label: function (context) {
                    return thousandsFormatter.format(context.yLabel);
                }
            }
        },
        responsive: true,
        maintainAspectRatio: false,
        scales: {
            y: {
                beginAtZero: true,
            }
        },
        legend: {
            display: false
        },
        scales: {
            xAxes: [{
                ticks: {
                    display: true,
                    fontColor: '#98A2B3',
                    fontSize: 10,
                    padding: 10,
                    maxTicksLimit: 6,
                    maxRotation: getMaxRotation(),
                },
                gridLines: {
                    display: true,
                    color: '#F2F4F7',
                    borderDash: [5, 5]
                },
            }],
            yAxes: [{
                ticks: {
                    fontColor: '#98A2B3',
                    fontSize: 10,
                    display: true,
                    padding: 10,
                    min: 0,
                    callback: function(value, index, values) {
                        return thousandsFormatter.format(value);
                    }
                },
                gridLines: {
                    display: true,
                    color: '#F2F4F7'
                },
            }]
        },
        layout: {
            padding: 0
        }
    }
};
const chartNumOfOrders = new Chart(ctxNumOfOrders, chartConfigNumOfOrders);

// Chart Num of Visitors
const ctxNumOfVisitors = document.getElementById('chart-num-of-visitors').getContext('2d');
const chartConfigNumOfVisitors = {
    type: 'line',
    data: {
        labels: ['one', 'two'],
        datasets: [{
            data: [1, 2],
            fill: true,
            borderColor: '#0A8BFE',
            backgroundColor: 'transparent',
            borderWidth: 2,
            tension: 0,
            radius: 0,
            hoverRadius: 3,
            hitRadius: 6,
            cubicInterpolationMode: 'monotone',
            pointBackgroundColor: '#0A8BFE'
        }]
    },
    options: {
        tooltips: {
            displayColors: false,
            callbacks: {
                title: function () {
                },
                label: function (context) {
                    return thousandsFormatter.format(context.yLabel);
                }
            }
        },
        responsive: true,
        maintainAspectRatio: false,
        scales: {
            y: {
                beginAtZero: true,
            }
        },
        legend: {
            display: false
        },
        scales: {
            xAxes: [{
                ticks: {
                    display: true,
                    fontColor: '#98A2B3',
                    fontSize: 10,
                    padding: 10,
                    maxTicksLimit: 6,
                    maxRotation: getMaxRotation(),
                },
                gridLines: {
                    display: true,
                    color: '#F2F4F7',
                    borderDash: [5, 5]
                },
            }],
            yAxes: [{
                ticks: {
                    fontColor: '#98A2B3',
                    fontSize: 10,
                    display: true,
                    padding: 10,
                    min: 0,
                    callback: function(value, index, values) {
                        return thousandsFormatter.format(value);
                    }
                },
                gridLines: {
                    display: true,
                    color: '#F2F4F7'
                },
            }]
        },
        layout: {
            padding: 0
        }
    }
};
const chartNumOfVisitors = new Chart(ctxNumOfVisitors, chartConfigNumOfVisitors);

// Chart Conversion Rate
const ctxConversionRate = document.getElementById('chart-conversion-rate').getContext('2d');
const chartConfigConversionRate = {
    type: 'line',
    data: {
        labels: ['one', 'two'],
        datasets: [{
            data: [1, 2],
            fill: true,
            borderColor: '#0A8BFE',
            backgroundColor: 'transparent',
            borderWidth: 2,
            tension: 0,
            radius: 0,
            hoverRadius: 3,
            hitRadius: 6,
            cubicInterpolationMode: 'monotone',
            pointBackgroundColor: '#0A8BFE'
        }]
    },
    options: {
        tooltips: {
            displayColors: false,
            callbacks: {
                title: function () {
                },
                label: function (context) {
                    return thousandsFormatterDecimals.format(formatWithFloor(context.yLabel)) + '%';
                }
            }
        },
        responsive: true,
        maintainAspectRatio: false,
        scales: {
            y: {
                beginAtZero: true,
            }
        },
        legend: {
            display: false
        },
        scales: {
            xAxes: [{
                ticks: {
                    display: true,
                    fontColor: '#98A2B3',
                    fontSize: 10,
                    padding: 10,
                    maxTicksLimit: 6,
                    maxRotation: getMaxRotation(),
                },
                gridLines: {
                    display: true,
                    color: '#F2F4F7',
                    borderDash: [5, 5]
                },
            }],
            yAxes: [{
                ticks: {
                    fontColor: '#98A2B3',
                    fontSize: 10,
                    display: true,
                    padding: 10,
                    min: 0,
                    callback: function(value, index, values) {
                        return thousandsFormatter.format(value);
                    }
                },
                gridLines: {
                    display: true,
                    color: '#F2F4F7'
                },
            }],
        },
        layout: {
            padding: 0
        }
    }
};
const chartConversionRate = new Chart(ctxConversionRate, chartConfigConversionRate);

// Chart New Returning
const ctxNr = document.getElementById('chart-new-returning').getContext('2d');
const chartConfigNr = {
    type: 'line',
    data: {
        labels: ['one', 'two'],
        datasets: [{
            data: [1, 2],
            fill: true,
            borderColor: '#EAECF0',
            backgroundColor: '#EAECF0',
            borderWidth: 2,
            tension: 0,
            radius: 0,
            hoverRadius: 3,
            hitRadius: 6,
            cubicInterpolationMode: 'monotone',
            pointBackgroundColor: '#EAECF0'
        },
            {
                data: [1, 2],
                fill: true,
                borderColor: '#0A8BFE',
                backgroundColor: '#0A8BFE',
                borderWidth: 2,
                tension: 0,
                radius: 0,
                hoverRadius: 3,
                hitRadius: 6,
                cubicInterpolationMode: 'monotone',
                pointBackgroundColor: '#0A8BFE'
            }]
    },
    options: {
        tooltips: {
            displayColors: false,
            callbacks: {
                title: function () {
                },
                callback: function(context) {
                    return thousandsFormatter.format(context.value);
                }
            }
        },
        responsive: true,
        maintainAspectRatio: false,
        scales: {
            y: {
                beginAtZero: true,
            }
        },
        legend: {
            display: false
        },
        scales: {
            xAxes: [{
                ticks: {
                    display: true,
                    fontColor: '#98A2B3',
                    fontSize: 10,
                    padding: 10,
                    maxTicksLimit: 6,
                    maxRotation: getMaxRotation(),
                },
                gridLines: {
                    display: true,
                    color: '#F2F4F7',
                    borderDash: [5, 5]
                },
            }],
            yAxes: [{
                ticks: {
                    fontColor: '#98A2B3',
                    fontSize: 10,
                    display: true,
                    padding: 10,
                    min: 0,
                    callback: function(value, index, values) {
                        return thousandsFormatter.format(value);
                    }
                },
                gridLines: {
                    display: true,
                    color: '#F2F4F7'
                },
            }]
        },
        layout: {
            padding: 0
        }
    }
};
const chartNr = new Chart(ctxNr, chartConfigNr);

function updateChart(chart, labels, data) {
    chart.data.labels = labels;
    chart.data.datasets[0].data = data;
    chart.update();
}

function updateChartWithTwoData(chart, labels, data1, data2) {
    chart.data.labels = labels;
    chart.data.datasets[0].data = data1;
    chart.data.datasets[1].data = data2;
    chart.update();
}

function updateLabelsFormat(labels, options, oneDayIndicator, monthsRepresentation, optionsMonths) {
    let newLabels = [];
    let newLabel;
    if(oneDayIndicator > 0) {
        labels.forEach((label) => {
           newLabel = label.slice(-2);
           newLabels.push(newLabel);
        });
    } else {
        if(monthsRepresentation > 0) {
            labels.forEach((label) => {
                label = new Date(label);
                newLabel = label.toLocaleDateString('en-US', optionsMonths);
                newLabels.push(newLabel);
            });
        } else {
            labels.forEach((label) => {
                label = new Date(label);
                newLabel = label.toLocaleDateString('en-US', options);
                newLabels.push(newLabel);
            });
        }
    }

    return newLabels;
}

function updateMainInfo(queryClass, innerText) {
    document.querySelector(`${queryClass}` + ' h4').innerText = innerText;
}

function updateTablesInfo(queryClass, innerText, innerText2) {
    document.querySelector(`${queryClass}` + ' .table-info td.first-value').innerText = innerText;
    document.querySelector(`${queryClass}` + ' .table-info td.second-value').innerText = innerText2;
}

function updatePercentage(queryClass, data, dataPrev) {
    let percentage = dataPrev == 0 ? 100 : data / dataPrev * 100 - 100;
    let percentageDiv = document.querySelector('.percent.' + queryClass);
    if(percentage < 0) {
        percentageDiv.classList.add('minus');
        percentage = Math.abs(percentage);
        percentageDiv.querySelector('span').innerText =' ' + thousandsFormatterDecimals.format(formatWithFloor(percentage)) + '%';
    } else {
        percentageDiv.classList.remove('minus');
        percentageDiv.querySelector('span').innerText = thousandsFormatterDecimals.format(formatWithFloor(percentage)) + '%';
    }
}

function updatePercentages(data, dataBefore) {
    let dataAovNew = 0;
    let dataAovBefore=0;
    if (dataBefore.titleAvg != 0){
        dataAovBefore = parseFloat(dataBefore.titleAvg.replace(',',''));
    }
    if (data.titleAvg != 0){
        dataAovNew = parseFloat(data.titleAvg.replace(',',''));
    }


    updatePercentage('revenue-p', data.titleRevenue, dataBefore.titleRevenue);
    updatePercentage('revenue2-p', data.titleRevenue, dataBefore.titleRevenue)
    updatePercentage('refunds-p', data.titleRefunds, dataBefore.titleRefunds);
    updatePercentage('orders-p', data.titleNumOfOrders, dataBefore.titleNumOfOrders);

    updatePercentage('aov-p',dataAovNew,dataAovBefore);

    updatePercentage('cr-p', data.titleConversionRate, dataBefore.titleConversionRate);
    updatePercentage('ps-p', data.titleProductsSold, dataBefore.titleProductsSold);
    updatePercentage('atc-p', data.titleAtcPercent, dataBefore.titleAtcPercent);
    updatePercentage('ic-p', data.titleCheckoutInitiatedCR, dataBefore.titleCheckoutInitiatedCR);
    updatePercentage('visitors-p', data.titleNumOfVisitors, dataBefore.titleNumOfVisitors);
    updatePercentage('sessions-p', data.titleSessioned, dataBefore.titleSessioned);
    updatePercentage('br-p', data.titleBounceRate, dataBefore.titleBounceRate);
    updatePercentage('customers-p', data.titleNumOfNewCustomers + data.titleNumOfReturningCustomers, dataBefore.titleNumOfNewCustomers + dataBefore.titleNumOfReturningCustomers)
    updatePercentage('new-p', data.titleNumOfNewCustomers, dataBefore.titleNumOfNewCustomers);
    updatePercentage('returning-p', data.titleNumOfReturningCustomers, dataBefore.titleNumOfReturningCustomers);
}

function ajaxGetChartData(startDate, endDate) {
    jQuery.ajax({
        url: urls.ajax_url,
        type: 'get',
        data: {
            action: 'ic_ajax_dashboard_info',
            nonce: nonces.dashboard_info,
            startDate: startDate,
            endDate: endDate
        },
        success: function (response) {
            let data = JSON.parse(response);
            let chartsInfo = data.chartsInfo;
            let chartsInfoBefore = data.chartsInfoBefore;
            let labels = Object.keys(chartsInfo.timesRevenue);
            let oneDayIndicator = chartsInfo.oneDayIndicator;
            let monthsRepresentation = chartsInfo.monthsRepresentation;
            labels = updateLabelsFormat(labels, chartDateOptions, oneDayIndicator, monthsRepresentation, chartDateMonthsOptions);
            let dataTotalRevenue = Object.values(chartsInfo.timesRevenue);
            let dataNumOfOrders = Object.values(chartsInfo.timesNumOfOrders);
            let dataNumOfVisitors = Object.values(chartsInfo.timesVisitors);
            let dataConversionRate = Object.values(chartsInfo.timesConversionRate);
            let dataNumOfNewCustomers = Object.values(chartsInfo.timesNewCustomers);
            let dataNumOfReturningCustomers = Object.values(chartsInfo.timesReturningCustomers);

            let formatedData = formatData(data.champions, data.bestSellers);
            let champions = formatedData.champions;
            let bestSellers = formatedData.bestSellers;

            updateChart(chartTotalRevenue, labels, dataTotalRevenue);
            updateChart(chartNumOfOrders, labels, dataNumOfOrders);
            updateChart(chartNumOfVisitors, labels, dataNumOfVisitors);
            updateChart(chartConversionRate, labels, dataConversionRate)
            updateChartWithTwoData(chartNr, labels, dataNumOfNewCustomers, dataNumOfReturningCustomers);

            document.querySelector('.conversion-rate-inner .first-span').innerText = '(' + chartsInfo.titleAtc + ' sessions)';
            document.querySelector('.conversion-rate-inner .second-span').innerText = '(' + chartsInfo.titleNumCheckoutInitiated + ' sessions)';

            updateDataTables(champions, bestSellers);
            updateLabelsData(chartsInfo, bestSellers);

            updatePercentages(chartsInfo, chartsInfoBefore);
        }
    });
}

function initDataTables() {
    championsDataTable = jQuery('#champions-table').DataTable({
        language: {
            'paginate': {
                'previous': '<i class="fa-solid fa-angle-left"></i>',
                'next': '<i class="fa-solid fa-angle-right"></i>'
            }
        },
        'searching': false,
        'paging': true,
        'info': false,
        'pagingType': 'simple',
        'pageLength': 4,
        'bLengthChange': false,
        'columnDefs' : [{
            'targets' : 0 ,
            'data': 'div',
            'render' : function ( url, type, full, meta ) {
                if(meta.row == 0) {
                    return '<div class="champion-initial">' + full[0][0] + '</div>' +
                            '<span>' + full[0] + '</span>' +
                            '<img src="' + urls.plugin_url + 'assets/images/fire.svg" width="13" />';
                }
                return '<div class="champion-initial">' + full[0][0] + '</div><span>' + full[0] + '</span>';
            }
        }],
        'columns': [
            { title: 'Name' },
            { title: 'Orders' },
            { title: 'Amount' },
        ],
        'order': [[2, 'desc']],
        "drawCallback": function( settings ) {
            let colors = ['#9BAAC6', '#6775F8', '#108D7D', '#204369', '#00A0AC'];
            let initials = document.querySelectorAll('.champion-initial');
            initials.forEach((initial) => {
                let randomColor = colors[Math.floor(Math.random() * colors.length)];
                initial.style.background = randomColor;
            });
        }
    });

    bestSellersDataTable = jQuery('#bestsellers-table').DataTable({
        language: {
            'paginate': {
                'previous': '<i class="fa-solid fa-angle-left"></i>',
                'next': '<i class="fa-solid fa-angle-right"></i>'
            }
        },
        'searching': false,
        'paging': true,
        'info': false,
        'pagingType': 'simple',
        'pageLength': 5,
        'bLengthChange': false,
        'columnDefs' : [{
            'targets' : 0 ,
            'data': 'img',
            'render' : function ( url, type, full, meta ) {
                if(meta.row == 1) {
                    if(full[3] == null) {
                        return '<img class="product-img" height="24" width="24" src="' + urls.plugin_url + '/assets/images/woocommerce-placeholder.png' + '"/><span>' + full[0].slice(0, 13) + '...</span>' + '<img src="' + urls.plugin_url + 'assets/images/fire.svg" width="13" />';
                    }
                    return '<img class="product-img" height="24" width="24" src="' + full[3] + '" title="'+full[0]+'" alt="'+full[0]+'"/><span>' + full[0].slice(0, 13) + '...</span>' + '<img src="' + urls.plugin_url + 'assets/images/fire.svg" width="13" />';
                } else {
                    if(full[3] == null) {
                        return '<img class="product-img" height="24" width="24" src="' + urls.plugin_url + '/assets/images/woocommerce-placeholder.png' + '"/><span>' + full[0].slice(0, 13) + '...</span>';
                    }
                    return '<img class="product-img" height="24" width="24" src="' + full[3] + '" title="'+full[0]+'" alt="'+full[0]+'"/><span>' + full[0].slice(0, 13) + '...</span>';
                }
            }
        },
            {
                'targets' : 2,
                'render' : function ( url, type, full, meta ) {
                    return info.currency + full[2];
                }
            }
        ],
        'columns': [
            { title: 'Name' },
            { title: 'Number' },
            { title: 'Revenue' },
        ],
        'order': [[2, 'desc']],
    });
}

function formatData(champions, bestSellers) {
    let finalChampions = [], finalBestSellers = [];

    champions.forEach((champion) => {
        let formatedChampion = [];
        let name = champion.first_name + ' ' + champion.last_name;
        formatedChampion.push(name);
        formatedChampion.push(thousandsFormatter.format(champion.num));
        formatedChampion.push(info.currency + thousandsFormatterDecimals.format(formatWithFloor(parseFloat(champion.net_total))));
        finalChampions.push(formatedChampion);
    });

    bestSellers.forEach((bestSeller) => {
        let formatedBestSeller = [];
        formatedBestSeller.push(bestSeller.post_title);
        formatedBestSeller.push(thousandsFormatter.format(bestSeller.product_qty));
        formatedBestSeller.push(thousandsFormatterDecimals.format(formatWithFloor(parseFloat(bestSeller.product_net_revenue.replace(/,/g, '')))));
        formatedBestSeller.push(bestSeller.guid);
        finalBestSellers.push(formatedBestSeller);
    });

    let data = {
        'champions': finalChampions,
        'bestSellers': finalBestSellers
    };
    return data;
}

function updateDataTables(champions, bestSellers) {
    championsDataTable.clear();
    championsDataTable.rows.add(champions);
    championsDataTable.draw();

    bestSellersDataTable.clear();
    bestSellersDataTable.rows.add(bestSellers);
    bestSellersDataTable.draw();
}

function updateLabelsData(chartsInfo, bestSellers) {
    let titleAverage;
    if (chartsInfo.titleAvg != 0){
       titleAverage =parseFloat(chartsInfo.titleAvg.replace(',', ''));
    }else{
        titleAverage = parseFloat(chartsInfo.titleAvg);
    }

    updateMainInfo('.revenue-inner', info.currency + thousandsFormatterDecimals.format(formatWithFloor(chartsInfo.titleRevenue)));
    updateMainInfo('.orders-inner', thousandsFormatter.format(chartsInfo.titleNumOfOrders));
    updateMainInfo('.conversion-rate-inner', thousandsFormatterDecimals.format(formatWithFloor(chartsInfo.titleConversionRate)) + '%');
    updateMainInfo('.visitors-inner', thousandsFormatter.format(chartsInfo.titleNumOfVisitors));
    updateMainInfo('.customers-inner', thousandsFormatter.format(chartsInfo.titleNumOfNewCustomers + chartsInfo.titleNumOfReturningCustomers));

    updateTablesInfo('.revenue-inner', info.currency + thousandsFormatterDecimals.format(formatWithFloor(parseFloat(chartsInfo.titleRevenue))), info.currency + thousandsFormatterDecimals.format(formatWithFloor(chartsInfo.titleRefunds)));
    updateTablesInfo('.orders-inner', info.currency + thousandsFormatterDecimals.format(formatWithFloor(titleAverage)), thousandsFormatter.format(formatWithFloor(chartsInfo.titleProductsSold)));
    updateTablesInfo('.conversion-rate-inner', thousandsFormatterDecimals.format(formatWithFloor(chartsInfo.titleAtcPercent)) + '%', thousandsFormatterDecimals.format(formatWithFloor(chartsInfo.titleCheckoutInitiatedCR)) + '%');
    updateTablesInfo('.visitors-inner', thousandsFormatter.format(chartsInfo.titleSessioned), thousandsFormatterDecimals.format(formatWithFloor(chartsInfo.titleBounceRate)) + '%');
    updateTablesInfo('.customers-inner', thousandsFormatter.format(chartsInfo.titleNumOfNewCustomers), thousandsFormatter.format(chartsInfo.titleNumOfReturningCustomers));
}

let dashboardTab = document.querySelector('#dashboard');
dashboardTab.classList.add('ic-display-block');

let southWest = L.latLng(-90, -180);
let northEast = L.latLng(90, 180);
let bounds = L.latLngBounds(southWest, northEast);

let map = L.map('countries-map',{
    maxBounds:bounds,
    scrollWheelZoom: true
}).setView([50.8503, 4.3517], 2); //Postavljeno na Brisel,Belgija, sa zoom-om 2, originalno su bile 0,0 kooordinate
L.tileLayer('https://{s}.basemaps.cartocdn.com/light_nolabels/{z}/{x}/{y}.png', { }).addTo(map);
let layerGroup = L.layerGroup().addTo(map);

let callbackFunction = function (start, end, label) {
    //formating start and end for our ajax request
    let startTime = start.format('YYYY-MM-DD HH:mm:ss');
    let endTime = end.format('YYYY-MM-DD HH:mm:ss');

    //label for daterange picker
    document.querySelector('#dashboard-daterangepicker span').innerText = label;
    ajaxGetChartData(startTime, endTime);
    handleMap(startTime, endTime, map, layerGroup);
}

function handleMap(startDate, endDate, map, layerGroup) {
    const requestOptions = {
        method: 'GET',
    };

    layerGroup.clearLayers();
    map.closePopup();

    let addresses;
    let countries = new Map();
    let sumNet = 0;
    jQuery.when(getAddresses(startDate, endDate)).done(function(a1) {
        addresses = JSON.parse(a1);
        addresses.forEach((address, index) => {

            sumNet += parseFloat(address.net_total);
            if(countries.get(address.country) != undefined) {
                let countryNetTotal = countries.get(address.country);
                countryNetTotal += parseFloat(address.net_total);
                countries.set(address.country, countryNetTotal);
            } else {
                countries.set(address.country, parseFloat(address.net_total));
            }

            const markerIcon = L.icon({
                iconUrl: urls.plugin_url + '/assets/images/blue-dot.png',
                iconSize: [16, 16], // size of the icon
                iconAnchor: [0, 0], // point of the icon which will correspond to marker's location
                popupAnchor: [0, 0] // point from which the popup should open relative to the iconAnchor
            });
            let markerPopup = L.popup().setContent(address.address);
            let marker;
            if(address.lat != null && address.lng != null) {
                marker = L.marker(L.latLng(
                    parseFloat(address.lat),
                    parseFloat(address.lng)
                ), {
                    icon: markerIcon
                }).addTo(map).bindPopup(markerPopup);

            } else {
                fetch('https://api.geoapify.com/v1/geocode/search?text=' + encodeURIComponent(address.address) + '&apiKey=d64b623937264b3d9a0eb779cf30684b', requestOptions)
                    .then(response => response.json())
                    .then(result => {
                        let lat = result.features[0].properties.lat;
                        let lng = result.features[0].properties.lon;
                        let country = result.features[0].properties.country_code;

                        marker = L.marker(L.latLng(
                            parseFloat(lat),
                            parseFloat(lng)
                        ), {
                            icon: markerIcon
                        }).addTo(map).bindPopup(markerPopup);

                        jQuery.ajax({
                            url: urls.ajax_url,
                            type: 'post',
                            data: {
                                action: 'ic_update_address_coordinates',
                                nonce: nonces.update_address_coordinates,
                                address: address.address,
                                lat: lat,
                                lng: lng,
                                order_id: address.order_id,
                                country: country
                            },
                            success: function (response) {

                            }
                        });

                    })
                    .catch(error => console.log('error', error));
            }

            if(index === 0) {
                map.panTo(marker.getLatLng());
            }

        });

        const regionNames = new Intl.DisplayNames(
            ['en'], {type: 'region'}
        );

        let countriesDataTableRows = [];
        countries.forEach((value, key) => {
            let percent = (100 * value) / sumNet;
            let countryRow = [
                key,
                info.currency +  thousandsFormatterDecimals.format(formatWithFloor(value)),
                thousandsFormatterDecimals.format(formatWithFloor(percent)) + '%',
                regionNames.of(key.toUpperCase()),
            ];
            countriesDataTableRows.push(countryRow);
        });
        updateCountriesDataTable(countriesDataTableRows);

    });

    dashboardTab.classList.remove('ic-display-block');

}

function getAddresses(startDate, endDate) {
     return jQuery.ajax({
        url: urls.ajax_url,
        type: 'get',
        data: {
            action: 'ic_get_address_coordinates',
            nonce: nonces.get_address_coordinates,
            startDate: startDate,
            endDate: endDate
        }
    });
}

function initCountriesDataTable() {
    countriesDataTable = jQuery('#countries-table').DataTable({
        language: {
            'paginate': {
                'previous': '<i class="fa-solid fa-angle-left"></i>',
                'next': '<i class="fa-solid fa-angle-right"></i>'
            }
            ,
            'search': "_INPUT_",
            'searchPlaceholder': "Search..."

        },
        'paging': true,
        'info': false,
        'searching': true,
        'pagingType': 'simple',
        'pageLength': 5,
        'search' : {
            'return': false,
        },
        'bLengthChange': true,
        'columns': [
            {title: 'Country'},
            {title: 'Revenue'},
            {title: 'Share'},
        ],
        'order': [[2, 'desc']],
        'columnDefs': [{
            'targets': 0,
            'data': 'div',
            'render': function (url, type, full) {
                let icon = urls.plugin_url + '/assets/images/flags/' + full[0] + '.svg';
                return '<div class="country-image-title">' +
                    '<img src="' + icon + '" width="32" />' +
                    '<p>' + full[3] + '</p></div>';
            }
        }]
    });
}

initCountriesDataTable();

function updateCountriesDataTable(rows) {
    countriesDataTable.clear();
    countriesDataTable.rows.add(rows);
    countriesDataTable.draw();
}

//call for dateRangePicker
dateRangePicker('dashboard-date-cont', 'dashboard-daterangepicker', callbackFunction);
initDataTables();

// handleMap();
