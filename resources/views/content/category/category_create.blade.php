@extends('dashboard')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/content/index.css') }}">
@endsection

@section('main_content')
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Создание категории</h1>
            <a class="btn btn-secondary" href="{{ url('/blog') }}">Назад</a>
        </div>
        <div>
            <form action="{{ url('/categories') }}" enctype="multipart/form-data" method="POST" onsubmit="return validateForm()" class="create-post-form">
                @csrf
                <div class="form-row">
                   <div class="form-group col-md-6">
                    <label for="title">название:</label>
                    <input type="text" class="form-control" name="title" id="title" placeholder="">
                    <span class="text-danger title"></span>
                   </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="image">Баннер:</label>
                        <br>
                        <input type="file" name="image" id="image">
                        <p class="image-error text-danger"></p>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Сохранить</button>
              </form>
        </div>
    </main>  

@stop


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