@extends('dashboard')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/content/blog.css') }}">
@endsection

@section('main_content')
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Блог</h1>
            <a class="btn btn-primary" href="{{ url('/blog/create') }}">+Создать пост</a>
        </div>
        <div>
            <div class="row">
                    <p class="categorie-p col-12 col-lg-1">категории:</p>
                    <select class="form-control select-handler col-12 col-lg-10">
                        <option value="">Список категории...</option>
                        @if(!empty($categories))
                            @foreach($categories as $category)
                                <option class="" value="{{ $category->id }} - {{ $category->name }}">
                                    <a href="#" data-toggle="modal" data-target="#ModalCenterEdit">{{ $category->name }}</a>
                                </option>
                            @endforeach
                        @endif
                    </select>
            </div>
            <a data-toggle="modal" data-target="#ModalCenter" href="#" class="btn btn-primary mt-2 col-12 col-lg-1">+Создать категорию</a>
        </div>
        <hr>

        <div class="row">
            @foreach ($posts as $post)
                <div class="col-12 col-lg-4">
                    <div class="card">
                        <div class="card-body">
                        <h5 class="card-title">
                            <a class="dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ $post->title }}</a>
                            <div class="dropdown-menu p-2">
                              <p class=""><a href="#"><i class="fas fa-edit"></i> Редактировать</a></p>
                              <p class=""><a href="#"><i class="far fa-trash-alt"></i> Удалить</a></p>
                            </div>
                            </h5>
                        <p class="card-text">Категория:</p>
                        <p class="card-text">Создан: {{ $post->created_at }}</p>
                        <p class="card-text"><a href=""><i class="far fa-eye"></i> Просмотр</a></p>
                        @if($post->created_at != $post->updated_at)
                            <p class="card-text text-success">Обновлена:</p>
                        @endif
                        <p><i class="fas fa-toggle-on"></i> </p>
                        </div>
                    </div>
                </div>
            @endforeach
          </div>
  
    </main>  
    @component('utilities.center_modal')
    @slot('title')Создать категорию @endslot
    @slot('modal_id')ModalCenter @endslot
    @slot('body')<input class="form-control" id="category-input" type="text" placeholder="названия категории"> @endslot
    @slot('action') save-category @endslot
    @endcomponent

    @component('utilities.center_modal')
    @slot('title')Редактировать/Удалить категорию @endslot
    @slot('modal_id')ModalCenterEdit @endslot
    @slot('body')
        <input class="form-control" id="edit-category-val" type="text" placeholder="">
        <input type="hidden" id="edit-category-id">
     @endslot
    @slot('action') edit-category @endslot
    @slot('actionName') Редактировать @endslot
    @slot('action2') btn-danger delete-category @endslot
    @slot('action2Name') Удалить @endslot
    @endcomponent

@stop

@section('script')
    <script>

        $('.select-handler').change(function(){
            let selectedCategory = $(this).children("option:selected").val();
            selectedCategory = selectedCategory.split(" - ");
            if(selectedCategory.length === 2){
                $('#ModalCenterEdit').modal('show');
                $('#edit-category-val').val(selectedCategory[1]);
                $('#edit-category-id').val(selectedCategory[0]);
            }
        })

        $('.delete-category').on('click', function(){
            let id = $('#edit-category-id').val();
            let data = {
                method: 'deleteCategory',
                id: id
            }
            if(id){
                sendAjax(data, "{{ url('/ajaxRequest/blog') }}")
            }

        })

        $('.edit-category').on('click', function(){
            let id = $('#edit-category-id').val();
            let value = $('#edit-category-val').val();
            let data = {
                method: 'editCategory',
                id: id,
                value: value
            }
            sendAjax(data, "{{ url('/ajaxRequest/blog') }}")

        })

        $('.save-category').on('click', function(){
            let value = $('#category-input').val()
            if(value.length > 2){
                let data = {
                    method: 'saveCategory',
                    name: value
                }
                sendAjax(data, "{{ url('/ajaxRequest/blog') }}")
            }else{
                $('.error-place').text('поля обязательно | минимум 2 символа')
            }
        })
        function sendAjax(data, url){
            $.ajax({
                type: 'GET',
                url: url,
                data: data,
                datatype:'html',
                success: function (data) {
                    location.reload();
                },
                error: function (jqXhr, textStatus, errorMessage) {
                    console.log(errorMessage);     
                }
            });
        }

    </script>
@endsection