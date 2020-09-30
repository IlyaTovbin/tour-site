@extends('dashboard')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/content/index.css') }}">
@endsection

@section('main_content')
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Создание Маршрута</h1>
            <a class="btn btn-secondary" href="{{ url('/tour') }}">Назад</a>
        </div>
        <div>
            <form action="{{ url('/tours') }}" enctype="multipart/form-data" method="POST" onsubmit="return validateForm()" class="create-tour-form">
                @csrf
                <div class="form-row">
                   <div class="form-group col-md-6">
                    <label for="title">Заголовок</label>
                    <input type="text" class="form-control" name="title" id="title" placeholder="">
                    <span class="text-danger title"></span>
                   </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="summernote">Контент</label>
                        <textarea name="summernote" id="summernote"></textarea>
                        <span class="summernote-error text-danger"></span>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="file">Галерея</label>
                        <br>
                        <input type="file" multiple name="file[]" id="file">
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


    $('#summernote').summernote({
      tabsize: 2,
      height: 400
    });
  </script>
@endsection