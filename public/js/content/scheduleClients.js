

$('.delete-post').on('click', function(){
    data = {
        id: $('.id-value').val(),
        method: 'deleteClient'
    }
    if(data.id){
        sendAjax(data, Schedule_Clients_URL)
    }
})



