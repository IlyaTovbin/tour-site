

$('.delete-post').on('click', function(){
    data = {
        id: $('.id-value').val(),
        method: 'deleteBlog'
    }
    if(data.id){
        sendAjax(data, BLOG_URL)
    }
})


$('.form-check-input').on('click', function(){
    let value = $(this).prop('checked') ? true : false;
    let id = $(this).data('id');
    let data = { 
        id: id,
        value: value,
        method: 'activePost' 
    }
    sendAjax(data, BLOG_URL, false)
})

