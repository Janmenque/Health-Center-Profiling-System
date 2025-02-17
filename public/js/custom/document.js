$('#category').on('change', function () {
    "use strict";
    var category_id=$(this).val();

    url = url.replace(':id', category_id);
    $.ajax({
        url: url,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            category_id:category_id,
        },
        contentType: false,
        processData: false,
        type: 'GET',
        success: function (data) {
            $('.sub_category_id').empty();
            var unit = `<select class="form-control hidesearch sub_category_id" id="sub_category_id" name="sub_category_id"></select>`;
            $('.sc_div').html(unit);

            $.each(data, function(key, value) {
                $('.sub_category_id').append('<option value="' + key + '">' + value +'</option>');
            });
            $('.hidesearch').select2({
                minimumResultsForSearch: -1
            });
        },

    });
});
