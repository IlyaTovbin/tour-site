@extends('dashboard')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/content/index.css') }}">
@endsection

@section('main_content')
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Создание Маршрута</h1>
            <a class="btn btn-secondary" href="{{ url('/tours') }}">Назад</a>
        </div>
        <div>
            <form action="{{ url('/tours') }}" enctype="multipart/form-data" method="POST" onsubmit="return validateForm()" class="create-tour-form">
                @csrf
                <div class="form-row">
                   <div class="form-group col-md-6">
                    <label for="title">Заголовок:</label>
                    <input type="text" class="form-control" name="title" id="title" placeholder="">
                    <span class="text-danger title"></span>
                   </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="summernote">Контент:</label>
                        <textarea name="summernote" id="summernote"></textarea>
                        <span class="summernote-error text-danger"></span>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="file">Галерея:</label>
                        <br>
                        <input type="file" multiple name="file[]" id="file">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="google_maps">Координаты на карте:</label>
                        <br>
                        <textarea class="col-12 col-lg-6" name="google_maps" id="google_maps" cols="150" rows="2"></textarea>
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
<script>

    function validateForm(){
        let valid = true;
        let title = $('#title').val();
        console.log(file);
        let category = parseInt($('#category').val());
        let summernote = $('#summernote').val();
        if(title.length < 2){
            $('.title').text('пожалуйста заполните это поле');
            valid = false;
        }else{
            $('.title').text('');
        }

        if(summernote.length < 2){
            $('.summernote-error').text('пожалуйста заполните это поле');
            valid = false;
        }else{
            $('.summernote-error').text('');
        }

        if(valid) return true;
        return false;

    }


    const UPLOAD_TOUR_URL = "{{ url('/ajaxRequest/tour') }}";

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
                    url: UPLOAD_TOUR_URL,
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: form_data,                         
                    type: 'post',
                    success: function(image){
                        url = "{{ url('images/tours/content_images') }}" + '/' + image;;
                        $('#summernote').summernote('editor.insertImage', url);
                    }
                });
            },
            onMediaDelete: function(value){
                data = {
                    method: 'removeFileFrom',
                    fileName: value[0].currentSrc
                }
                sendAjax(data, UPLOAD_TOUR_URL, false);
            }
        }
    });
  </script>
@endsection