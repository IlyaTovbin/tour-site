$('.delete-schedule').on('click', function(){
    data = {
        id: $('.id-value').val(),
        method: 'deleteSchedule'
    }
    if(data.id){
        sendAjax(data, SCHEDULE_URL)
    }
})

$('.form-check-input').on('click', function(){
    let value = $(this).prop('checked') ? true : false;
    let id = $(this).data('id');
    let data = { 
        id: id,
        value: value,
        method: 'activeSchedule' 
    }
    sendAjax(data, SCHEDULE_URL, false)
})
