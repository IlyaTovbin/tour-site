$('.select-handler').change(function(){
    let selectedCategory = $(this).children("option:selected").val();
    selectedCategory = selectedCategory.split(" - ");
    if(selectedCategory.length === 2){
        $('#ModalCenterEdit').modal('show');
        $('#edit-category-val').val(selectedCategory[1]);
        $('#edit-category-id').val(selectedCategory[0]);
    }
})

$(document).on('click', '.delete-card', function(){
    let postId = $(this).data('id');
    let title = $(this).data('title');
    $('.content-value').text(title)
    $('.id-value').val(postId)
    $('#deleteModal').modal('show');
})

$('.delete-post').on('click', function(){
    data = {
        id: $('.id-value').val(),
        method: 'deleteBlog'
    }
    if(data.id){
        sendAjax(data, BLOG_URL)
    }
})

$('.delete-category').on('click', function(){
    let id = $('#edit-category-id').val();
    let data = {
        method: 'deleteCategory',
        id: id
    }
    if(id){
        sendAjax(data, BLOG_URL)
    }

})

$('.edit-category').on('click', function(){
    let id = $('#edit-category-id').val();
    let value = $('#edit-category-val').val();
    let data = {
        method: 'editCategory',
        id: id,
        value: value
    }
    sendAjax(data, BLOG_URL)

})

$('.save-category').on('click', function(){
    let value = $('#category-input').val()
    if(value.length > 2){
        let data = {
            method: 'saveCategory',
            name: value
        }
        sendAjax(data, BLOG_URL)
    }else{
        $('.error-place').text('поля обязательно | минимум 2 символа')
    }
})

$('.form-check-input').on('click', function(){
    let value = $(this).prop('checked') ? true : false;
    console.log(value)
    let id = $(this).data('id');
    let data = { 
        id: id,
        value: value,
        method: 'activePost' 
    }
    sendAjax(data, BLOG_URL, false)
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