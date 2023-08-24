function dateRangePicker(containerId, idDateRangePicker, callback) {
    let datesLabels = {
        'Today': [moment().subtract(1, 'day'), moment()],
        'Last 7 days': [moment().subtract(1, 'week'), moment()],
        'Last month': [moment().subtract(1, 'month'), moment()],
        'Last 3 months': [moment().subtract(3, 'month'), moment()],
        'Last 6 months': [moment().subtract(6, 'month'), moment()]
    };

    let labelsToRange = {
        'Today': 'today',
        'Last 7 days': 'week',
        'Last month': 'month',
        'Last 3 months': 'three-month',
        'Last 6 months': 'half-year'
    };

    var start = moment().subtract(1, 'week');
    var end = moment();

    callback(start, end, 'Last 7 days');

    jQuery('#' + idDateRangePicker).daterangepicker({
            startDate: start,
            "alwaysShowCalendars": true,
            timePicker: true,
            endDate: end,
            maxDate: moment().endOf('day'),
            locale: {
                "format": 'MM/D/YYYY HH:mm:ss',
            },
            ranges: datesLabels
        },
        callback);


    let dateRanges = document.querySelectorAll('#' + containerId + ' .specified li');
    dateRanges.forEach((dateRange) => {
        dateRange.addEventListener('click', function () {
            let range = dateRange.dataset.range;
            let active = document.querySelector('#' + containerId + ' .specified li.active');
            if (active) {
                active.classList.remove('active');
            }
            dateRange.classList.add('active');

            let start;
            let label;
            if (range == 'week') {
                label = 'Last 7 days';
            } else if (range == 'day') {
                label = 'Today';
            } else if (range == 'month') {
                label = 'Last month';
            } else if (range == 'three-month') {
                label = 'Last 3 months'
            } else if (range == 'half-year') {
                label = 'Last 6 months'
            }

            start = datesLabels[label][0];
            let end = datesLabels[label][1];

            jQuery('#' + idDateRangePicker).data('daterangepicker').setStartDate(start);
            jQuery('#' + idDateRangePicker).data('daterangepicker').setEndDate(end);

            callback(start, end, label);
        });
    });
    jQuery('#' + idDateRangePicker).on('apply.daterangepicker', function (ev, picker) {
        let chosenLabel = picker.chosenLabel;
        if (chosenLabel === 'Custom Range') {
            let active = document.querySelector('#' + containerId + ' .specified li.active');
            if (active) {
                active.classList.remove('active');
            }
        } else {
            let range = labelsToRange[chosenLabel];
            document.querySelector('li[data-range="' + range + '"]').dispatchEvent(new Event('click'));

        }
    });

}
