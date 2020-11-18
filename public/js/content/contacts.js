$('.delete-post').on('click', function(){
    data = {
        id: $('.id-value').val(),
        method: 'deleteContact'
    }
    if(data.id){
        sendAjax(data, CONTACTS_URL)
    }
})




