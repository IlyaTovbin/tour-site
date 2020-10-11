@extends('dashboard')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/content/index.css') }}">
    <link rel="stylesheet" href="{{ asset('js/jquery-ui-1.12.1.custom/jquery-ui.css') }}">
@endsection

@section('main_content')
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Создание Расписания</h1>
            <a class="btn btn-secondary" href="{{ url('/schedule') }}">Назад</a>
        </div>
        <div>
            <form action="{{ url('/schedule') }}" enctype="multipart/form-data" method="POST" onsubmit="return validateForm()" class="create-post-form">
                @csrf
                <div class="form-row">
                   <div class="form-group col-md-6">
                    <label for="title">Заголовок</label>
                    <input type="text" class="form-control" name="title" id="title" placeholder="">
                    <span class="text-danger title"></span>
                   </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="tour">Маршруты:</label>
                        <select id="tour" name="tour" class="form-control">
                          <option>Список Маршрутов...</option>
                          @if(!empty($tours))
                            @foreach($tours as $tour)
                                <option class="" value="{{ $tour->id }}">
                                    {{ $tour->title }}
                                </option>
                            @endforeach
                          @endif
                        </select>
                        <span class="text-danger tour"></span>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <textarea name="summernote" id="summernote"></textarea>
                        <span class="summernote-error text-danger"></span>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="price">Цена:</label>
                        <input type="number" class="form-control" name="price" id="price" placeholder="">
                        <span class="text-danger price"></span>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="from_date">Дата от:</label>
                        <input class="form-control" name="from_date" type="text" id="from_date">
                        <span class="text-danger from_date"></span>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="to_date">Дата до:</label>
                        <input class="form-control" name="to_date" type="text" id="to_date">
                        <span class="text-danger to_date"></span>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Сохранить</button>
              </form>
        </div>
    </main>  

@stop

@section('summernote-script')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
@endsection

@section('script')
<script src="{{ asset('js/jquery-ui-1.12.1.custom/jquery-ui.js') }}"></script>
<script>
    $( function() {
        $( "#from_date" ).datepicker();
    });

    $( function() {
        $( "#to_date" ).datepicker();
    });

    function validateForm(){
        let valid = true;
        let image = $('#image').val();
        let title = $('#title').val();
        let category = parseInt($('#category').val());
        let summernote = $('#summernote').val();
        console.log(summernote);
        if(title.length < 2){
            $('.title').text('пожалуйста заполните это поле');
            valid = false;
        }else{
            $('.title').text('');
        }

        if(!Number.isInteger(category)){
            $('.category').text('пожалуйста выберите категорию');
            valid = false;
        }else{
            $('.category').text('');
        }

        if(summernote.length < 2){
            $('.summernote-error').text('пожалуйста заполните это поле');
            valid = false;
        }else{
            $('.summernote-error').text('');
        }

        if(image.length < 3){
            $('.image-error').text('пожалуйста заполните это поле');
            valid = false;
        }
        if(valid){
            return true;
        } 
        return false;

    }

    const UPLOAD_SCHEDULE_URL = "{{ url('/ajaxRequest/schedule') }}";

    $('#summernote').summernote({
        tabsize: 2,
        height: 400,
        callbacks: {
            onImageUpload : function(file) {
                let form_data = new FormData();
                form_data.append('file', file[0]);
                form_data.append('method', 'imageUpload');
                form_data.append('_token', '{{ csrf_token() }}');
                $.ajax({
                    url: UPLOAD_SCHEDULE_URL,
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: form_data,                         
                    type: 'post',
                    success: function(image){
                        url = "{{ url('images/schedule/content_images') }}" + '/' + image;;
                        $('#summernote').summernote('editor.insertImage', url);
                    }
                });
            },
            onMediaDelete: function(value){
                data = {
                    method: 'removeFileFrom',
                    fileName: value[0].currentSrc
                }
                sendAjax(data, UPLOAD_SCHEDULE_URL, false);
            }
        }
    });

  </script>
@endsection