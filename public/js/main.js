$('.non-target').on('click', function(e){
    e.preventDefault();
})

function sendAjax(data, url, reload = true, type = 'get'){
    $.ajax({
        type: type,
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

$(document).on('click', '.delete-card', function(){
    let postId = $(this).data('id');
    let title = $(this).data('title');
    $('.content-value').text(title)
    $('.id-value').val(postId)
    $('#deleteModal').modal('show');
})