$(window).on('hashchange', function () {
    if (window.location.hash) {
        var page = window.location.hash.replace('#', '');
        if (page == Number.NaN || page <= 0) {
            return false;
        } else {
            getUsers(page);
        }
    }
});
$(document).ready(function () {
    $(".table tbody tr").on('mousemove', function (e) {
        var id = $(this).attr('data-id');
        $(this).find('i').css({top: e.pageY, left: e.pageX});
        $(this).find('i').tooltip('show')
    });
    $(".table tbody tr").on('mouseleave', function (e) {
        $('[data-toggle="tooltip"]').tooltip('hide')
    });
    $('#datetimepicker-from').datetimepicker({
        format: 'YYYY-MM-DD',
        locale: 'ja',
        toolbarPlacement: 'bottom',
        showTodayButton: false,
	      showClear: false,
        ignoreReadonly: true,
        allowInputToggle: true,
        useCurrent : false,
	      maxDate: new Date($('#dateto').val())
    });

    $('#datetimepicker-to').datetimepicker({
        format: 'YYYY-MM-DD',
        locale: 'ja',
        toolbarPlacement: 'bottom',
        showTodayButton: false,
	      showClear: false,
        ignoreReadonly: true,
        allowInputToggle: true,
        useCurrent: false,
        minDate: new Date($('#datefrom').val()),
        maxDate: new Date($('#dateto').val())
    });
    
    $('#time-to').datetimepicker({
        format: 'YYYYMMDD',
        toolbarPlacement: 'bottom',
        showTodayButton: false,
	      showClear: false,
        ignoreReadonly: true,
        allowInputToggle: true,
        useCurrent: true,
        maxDate: new Date()
    });
    
    $("#datetimepicker-from").on("dp.change", function (e) {
        $('#datetimepicker-to').data("DateTimePicker").minDate(e.date);
    });
    $("#datetimepicker-to").on("dp.change", function (e) {
        $('#datetimepicker-from').data("DateTimePicker").maxDate(e.date);
    });

    $(document).on('click', '#search', function (event) {
        var data = {
            type: $('#type').val(),
            call_number: $('#call_number').val(),
            status: $('#status').val(),
            datefrom: $('#datefrom').val(),
            dateto: $('#dateto').val()
        };
        getLogs(1, data);
    });

    $(document).on('click', '.pagination a', function (event) {
        console.log('Click');
        $('li').removeClass('active');
        $(this).parent('li').addClass('active');
        event.preventDefault();
        var page = $(this).attr('href').split('page=')[1];
        // S102
        var divId = $(this).parent().parent().parent().attr('id');
        if (divId === 'paging-monitoring') {
            var data = {
                type: $('#type').val(),
                call_number: $('#call_number').val(),
                status: $('#status').val(),
                datefrom: $('#datefrom').val(),
                dateto: $('#dateto').val(),
                page: page
            };
            getLogs(page, data);
        } else {
            getUsers(page);
        }
    });
});
function getLogs(page, data) {
    $.ajax({
        url: '?page=' + page,
        type: "post",
        data: data,
        datatype: "html",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    }).done(function (data) {
        $('#logBox').empty().html(data);
    }).fail(function (jqXHR, ajaxOptions, thrownError) {
        alert(jqXHR.status);
    });
}