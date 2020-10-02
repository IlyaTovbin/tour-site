$('.delete-tour').on('click', function(){
    data = {
        id: $('.id-value').val(),
        method: 'deleteTour'
    }
    if(data.id){
        sendAjax(data, TOUR_URL)
    }
})

$('.form-check-input').on('click', function(){
    let value = $(this).prop('checked') ? true : false;
    console.log(value)
    let id = $(this).data('id');
    let data = { 
        id: id,
        value: value,
        method: 'activeTour' 
    }
    sendAjax(data, TOUR_URL, false)
})

$('.delete-tour').on('click', function(){
    data = {
        id: $('.id-value').val(),
        method: 'deleteTour'
    }
    if(data.id){
        sendAjax(data, TOUR_URL)
    }
})