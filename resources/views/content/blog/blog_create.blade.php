@extends('dashboard')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/content/blog.css') }}">
@endsection

@section('main_content')
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Создание поста</h1>
            <a class="btn btn-secondary" href="{{ url('/blog') }}">Назад</a>
        </div>
        <div>
            <form action="{{ url('/blog') }}" enctype="multipart/form-data" method="POST" onsubmit="return validateForm()" class="create-post-form">
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
                        <label for="category">категории:</label>
                        <select id="category" name="category" class="form-control">
                          <option>Список категории...</option>
                          @if(!empty($categories))
                            @foreach($categories as $category)
                                <option class="" value="{{ $category->id }}">
                                    {{ $category->name }}
                                </option>
                            @endforeach
                          @endif
                        </select>
                        <span class="text-danger category"></span>
                    </div>
                    
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <textarea name="summernote" id="summernote"></textarea>
                        <span class="summernote-error text-danger"></span>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <input type="file" name="image" id="image">
                        <p class="image-error text-danger"></p>
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
        let image = $('#image').val();
        let title = $('#title').val();
        let category = parseInt($('#category').val());
        let summernote = $('#summernote').val();
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
        if(valid) return true;
        return false;

    }


    $('#summernote').summernote({
      tabsize: 2,
      height: 200
    });
  </script>
@endsection