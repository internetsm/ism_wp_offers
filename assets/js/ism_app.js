var ism = window.ism || {};

ism.initDatepickers = function () {

    jQuery(".datepicker").each(function () {
        var datepicker = jQuery(this);
        var arrival = datepicker.data("arrival");
        if (arrival.length > 0) {
            arrival = jQuery(arrival);
        } else {
            arrival = null;
        }
        datepicker.datepicker({
            dateFormat: 'dd-mm-yy',
            onSelect: function (date) {
                var selectedDate = new Date(date);
                var msecsInADay = 86400000;
                var endDate = new Date(selectedDate.getTime() + msecsInADay);
                if (arrival) {
                    arrival.datepicker({
                        dateFormat: 'dd-mm-yy',
                        minDate: endDate
                    })
                }
            }
        });
    });


};

jQuery(function () {
    ism.initDatepickers();
});