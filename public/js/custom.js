$(document).ready(function() {
    "use strict";
    select2();
    datatable();
});


$(document).on('click', '.customModal', function () {
    "use strict";
    var modalTitle = $(this).data('title');
    var modalUrl = $(this).data('url');
    var modalSize = ($(this).data('size') == '') ? 'md' : $(this).data('size');
    $("#customModal .modal-title").html(modalTitle);
    $("#customModal .modal-dialog").addClass('modal-' + modalSize);
    $.ajax({
        url: modalUrl,
        success: function (result) {
            $('#customModal .body').html(result);
            $("#customModal").modal('show');
            select2();
        },
        error: function (result) {
        }
    });

});

// basic message
$(document).on('click', '.confirm_dialog', function(e) {
    "use strict";
    var dialogForm = $(this).closest("form");
    Swal.fire({
        title: 'Are you sure you want to delete this record ?',
        text: "This record can not be restore after delete. Do you want to confirm?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes'
    }).then((data) => {
        if (data.isConfirmed) {
            dialogForm.submit();
        }
    })
});


$(document).on('click', '.fc-day-grid-event', function (e) {
    "use strict";
    e.preventDefault();
    var event = $(this);
    var modalTitle = $(this).find('.fc-content .fc-title').html();
    var modalSize = 'md';
    var modalUrl = $(this).attr('href');
    $("#customModal .modal-title").html(modalTitle);
    $("#customModal .modal-dialog").addClass('modal-' + modalSize);
    $.ajax({
        url: modalUrl,
        success: function (result) {
            $('#customModal .modal-body').html(result);
            $("#customModal").modal('show');
        },
        error: function (result) {
        }
    });
});


function toastrs(title, message, status) {
    "use strict";
    if(status=='success'){
        var msg_status='primary';
    }else{
        var msg_status='danger';
    }
    $.notify(
        {
            title: '',
            message: message,
            icon: '',
            url: '',
            target: '_blank'
        },
        {
            element: 'body',
            type: msg_status,
            showProgressbar: false,
            placement: {
                from: "top",
                align: "right"
            },
            offset: 20,
            spacing: 10,
            z_index: 1031,
            delay: 3300,
            timer: 1000,
            url_target: '_blank',
            mouse_over: null,
            animate: {
                enter: 'animated fadeInDown',
                exit: 'animated fadeOutRight'
            },
            onShow: null,
            onShown: null,
            onClose: null,
            onClosed: null,
            icon_type: 'class',
        });
}

function convertArrayToJson(form) {
    "use strict";
    var data = $(form).serializeArray();
    var indexed_array = {};

    $.map(data, function (n, i) {
        indexed_array[n['name']] = n['value'];
    });

    return indexed_array;
}

function select2(){
    "use strict";
    $('.basic-select').select2();
    $('.hidesearch').select2({
        minimumResultsForSearch: -1
    });
}

function datatable(){
    "use strict";
    $('.basicdata-tbl').DataTable({
        "scrollX": true,
    });


    //Advance Datatable
    $('.datatbl-advance').DataTable({
        "scrollX": true,
        stateSave: false,
        dom: 'Bfrtip',
        buttons: [
            'print','excel','pdf', 'csv', 'copy',
        ]
    });
}
