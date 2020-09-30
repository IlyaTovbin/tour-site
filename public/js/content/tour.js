$('.delete-tour').on('click', function(){
    data = {
        id: $('.id-value').val(),
        method: 'deleteTour'
    }
    if(data.id){
        sendAjax(data, TOUR_URL)
    }
})