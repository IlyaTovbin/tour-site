@extends('dashboard')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/content/blog.css') }}">
@endsection

@section('main_content')
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Редактировать категорию</h1>
            <a class="btn btn-secondary" href="{{ url('/categories') }}">Назад</a>
        </div>
        <div>
            <form action="{{ url("/categories/{$category->id}") }}" method="POST" onsubmit="return validateForm()" class="create-post-form">
                {{ method_field('PUT') }}
                @csrf
                <div class="form-row">
                   <div class="form-group col-md-6">
                    <label for="title">Заголовок</label>
                    <input type="text" class="form-control" name="title" id="title" value="{{ $category->name ?? '' }}">
                    <span class="text-danger title"></span>
                   </div>
                </div>
                <button type="submit" class="btn btn-primary">Редактировать</button>
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
        let image = $('#image').val();
        let title = $('#title').val();
        if(title.length < 2){
            $('.title').text('пожалуйста заполните это поле');
            valid = false;
        }else{
            $('.title').text('');
        }

        if(image.length < 3){
            $('.image-error').text('пожалуйста выберите фотографию');
            valid = false;
        }
        if(valid) return true;
        return false;
    }

  </script>
@endsection