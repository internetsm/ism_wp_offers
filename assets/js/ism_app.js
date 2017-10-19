var ism = window.ism || {};

ism.initDatepickers = function () {

    jQuery("#datepicker-arrival").datepicker({
        dateFormat: 'dd-mm-yy',
        // onSelect: function (date) {
        //     var selectedDate = new Date(date);
        //     var msecsInADay = 86400000;
        //     var endDate = new Date(selectedDate.getTime() + msecsInADay);
        // jQuery("#datepicker-departure").datepicker("option", "minDate", endDate);
        // jQuery("#datepicker-departure").datepicker({
        //     "minDate": endDate
        // });
        // }
    });

    jQuery("#datepicker-departure").datepicker({
        dateFormat: 'dd-mm-yy',
    });
};

jQuery(function () {
    ism.initDatepickers();
});