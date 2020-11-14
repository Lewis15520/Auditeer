$( document ).ready(function() {

    function ajaxRequest(requestURL, requestData, successFunction, errorFunction = null) {
        $.ajaxSetup({
            headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
        });
        jQuery.ajax({
            url: requestURL,
            type: 'POST',
            data: requestData,
            success: function( data ){
                eval(successFunction)(data);
            },
            error: function (xhr, b, c) {
                if(error_function != null){
                    window[errorFunction]();
                }
            }
        });
    }


    $(document).on('click', '.auditDataRow', function () {
        let url = '/auditeer_data/get_data_view';
        let data = {
            'id': $(this).attr('id')
        };
        let success = 'populateHtml';
        ajaxRequest(
            url,
            data,
            success
        );
    });


    function populateHtml(data) {
        $('#dataPanel').html(data);
    }

    $('.auditDataRow:first-child').click();

});
