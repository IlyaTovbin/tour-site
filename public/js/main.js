$('.non-target').on('click', function(e){
    e.preventDefault();
})

function sendAjax(data, url, reload = true, type = 'get', datatype = 'html', func = null){
    $.ajax({
        type: type,
        url: url,
        data: data,
        datatype: datatype,
        success: function (data) {
            if(reload) location.reload();
            if(func) func(data);
        },
        error: function (jqXhr, textStatus, errorMessage) {
            console.log(errorMessage);     
        }
    });
}

$(document).on('click', '.delete-card', function(){
    let postId = $(this).data('id');
    let title = $(this).data('title');
    $('.content-value').text(title)
    $('.id-value').val(postId)
    $('#deleteModal').modal('show');
})