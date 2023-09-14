$(document).on('click' , '.delete-btn,.ajax-button' , function (e) {
    e.preventDefault();
    var that = $(this);
    var url = that.attr('href');
    let message = that.attr('data-message') || 'Cette opération est irréversible';

    question(message, function () {
        showLoader();
        $.ajax({
            method: that.attr('data-method') || 'DELETE',
            url: url
        }).done(function (data) {
            closeLoader();
            if (data.success) {
                success(data.message);
                LaravelDataTables["dataTableBuilder"].draw();
            }
        }).fail(function () {
            closeLoader();
        })
    })
})
