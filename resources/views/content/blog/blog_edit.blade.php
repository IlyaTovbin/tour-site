@extends('dashboard')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/content/index.css') }}">
@endsection

@section('main_content')
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Редактировать пост</h1>
            <a class="btn btn-secondary" href="{{ url('/blog') }}">Назад</a>
        </div>
        <div>
            <form action="{{ url("/blog/{$post->id}") }}" enctype="multipart/form-data" method="POST" onsubmit="return validateForm()" class="create-post-form">
                {{ method_field('PUT') }}
                @csrf
                <input type="hidden" value="{{ $post->image }}" name="check" />
                <div class="form-row">
                   <div class="form-group col-md-6">
                    <label for="title">Заголовок</label>
                    <input type="text" class="form-control" name="title" id="title" value="{{ $post->title ?? '' }}">
                    <span class="text-danger title"></span>
                   </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="category">категории:</label>
                        <select id="category" name="category" class="form-control">
                          <option value="{{ $post->categorie_id ?? '' }}">{{ $post->category ?? '' }}</option>
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
                        <textarea name="summernote" id="summernote">{{ $post->body ?? '' }}</textarea>
                        <span class="summernote-error text-danger"></span>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="image">Фотография:</label>
                        <br>
                        <img src="{{ url('images/blogs/' . $post->image) }}" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="p-0 dropdown-toggle img-fluid col-12 col-lg-2 mb-1" alt="Responsive image">
                        <p>{{ $post->image }}</p>
                        <input type="file" name="image" id="image">
                        <p class="image-error text-danger"></p>
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

        if(valid) return true;
        return false;

    }


    const UPLOAD_BLOG_URL = "{{ url('/ajaxRequest/blog') }}";

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
                    url: UPLOAD_BLOG_URL,
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: form_data,                         
                    type: 'post',
                    success: function(image){
                        url = "{{ url('images/blogs/content_images') }}" + '/' + image;;
                        $('#summernote').summernote('editor.insertImage', url);
                    }
                });
            },
            onMediaDelete: function(value){
                data = {
                    method: 'removeFileFrom',
                    fileName: value[0].currentSrc
                }
                sendAjax(data, UPLOAD_BLOG_URL, false);
            }
        }
    });
  </script>
@endsection