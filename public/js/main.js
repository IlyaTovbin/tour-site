$('.non-target').on('click', function(e){
    e.preventDefault();
})

function sendAjax(data, url, reload = true){
    $.ajax({
        type: 'GET',
        url: url,
        data: data,
        datatype:'html',
        success: function (data) {
            if(reload) location.reload();
        },
        error: function (jqXhr, textStatus, errorMessage) {
            console.log(errorMessage);     
        }
    });
}