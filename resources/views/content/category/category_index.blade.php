@php
    $url = url('/categories');
@endphp
@extends('dashboard')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/content/index.css') }}">
@endsection

@section('main_content')
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Категории для блога</h1>
            <a class="btn btn-primary" href="{{ url('/categories/create') }}">+Создать категорию</a>
        </div>
        @component('utilities.filter_bar', [ 
            'active_off' => true,
            'url' => $url 
        ])
        @endcomponent
        <div class="row">
            @if(isset($categories) && count($categories) > 0)
            @foreach ($categories as $category)
                <div class="col-12 my-1">
                    <div class="card shadow h-100">
                        <div class="card-body">
                            <h5 class="card-title">
                                <a class="dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{ $category->name }}</a>
                                <div class="dropdown-menu p-2 ">
                                <p class=""><a href="{{ url("/categories/{$category->id}/edit") }}" class="text-dark card-link"><i class="fas fa-edit"></i> Редактировать</a></p>
                                <p class=""><a href="#" class="text-dark card-link non-target delete-card" data-title="{{ $category->name }}" data-id="{{ $category->id }}"><i class="far fa-trash-alt"></i> Удалить</a></p>
                                </div>
                            </h5>
                            <p class="card-text"><a target="_blank" href="{{ url("categories/{$category->id}") }}"><i class="far fa-eye"></i> Просмотр</a></p>
                            <p class="card-text"><i class="far fa-calendar-alt"></i> Создана: {{ $category->created_at }}</p>
                            @if($category->created_at != $category->updated_at)
                                <p class="card-text text-success"><i class="far fa-calendar-alt"></i> Обновлена: {{ $category->updated_at }}</p>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
            @else
                <p class="mx-3"><i>Категории не найдены</i></p>
            @endif
        </div>
        <div class="d-flex justify-content-center my-4">
            {{ $categories->links() ?? '' }}
        </div>    
    </main>  


    @component('utilities.center_modal')
    @slot('title')Удалить Категорию? @endslot
    @slot('modal_id')deleteModal @endslot
    @slot('body')
    <p class="content-value badge badge-danger"></p> 
    <input type="hidden" class="id-value">
    @endslot
    @slot('action') delete-category btn-danger @endslot
    @slot('actionName') Удалить @endslot
    @endcomponent

@stop

@section('script')
    <script>
        const CATEGORY_URL = "{{ url('/ajaxRequest/category') }}";
        $('.delete-category').on('click', function(){
            data = {
                id: $('.id-value').val(),
                method: 'deleteCategory'
            }
            if(data.id){
                sendAjax(data, CATEGORY_URL)
            }
})
    </script>
@endsection