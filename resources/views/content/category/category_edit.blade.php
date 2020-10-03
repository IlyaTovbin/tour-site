@extends('dashboard')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/content/index.css') }}">
@endsection

@section('main_content')
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Редактировать категорию</h1>
            <a class="btn btn-secondary" href="{{ url('/categories') }}">Назад</a>
        </div>
        <div>
            <form action="{{ url("/categories/{$category->id}") }}" enctype="multipart/form-data" method="POST" onsubmit="return validateForm()" class="create-post-form">
                {{ method_field('PUT') }}
                @csrf
                <input type="hidden" value="{{ $category->image }}" name="check" />
                <div class="form-row">
                   <div class="form-group col-md-6">
                    <label for="title">Заголовок</label>
                    <input type="text" class="form-control" name="title" id="title" value="{{ $category->name ?? '' }}">
                    <span class="text-danger title"></span>
                   </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="image">Баннер:</label>
                        <br>
                        <img src="{{ url('images/category/' . $category->image) }}" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="p-0 dropdown-toggle img-fluid col-12 col-lg-2 mb-1" alt="Responsive image">
                        <p>{{ $category->image }}</p>
                        <input type="file" name="image" id="image">
                        <p class="image-error text-danger"></p>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Редактировать</button>
              </form>
        </div>
    </main>  

@stop


@section('script')
<script>
    function validateForm(){
        let valid = true;
        let title = $('#title').val();
        if(title.length < 2){
            $('.title').text('пожалуйста заполните это поле');
            valid = false;
        }else{
            $('.title').text('');
        }

        if(valid) return true;
        return false;
    }

  </script>
@endsection