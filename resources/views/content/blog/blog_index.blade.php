@php
    $url = url('/blog');
@endphp
@extends('dashboard')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/content/index.css') }}">
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
            <a data-toggle="modal" data-target="#ModalCenter" href="#" class="btn btn-primary mt-2 col-12 col-lg-2">+Создать категорию</a>
        </div>
        <hr>
        @component('utilities.filter_bar', [ 
            'filterBy' => $relevant_categories,
            'url' => $url 
        ])
        @endcomponent
        <div class="row">
            @if(isset($posts))
            @foreach ($posts as $post)
                <div class="col-12 col-lg-4 my-1">
                    <div class="card shadow h-100">
                        <div class="card-body">
                            <h5 class="card-title">
                                <a class="dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{ $post->title }}</a>
                                <div class="dropdown-menu p-2 ">
                                <p class=""><a href="{{ url("/blog/{$post->id}/edit") }}" class="text-dark card-link"><i class="fas fa-edit"></i> Редактировать</a></p>
                                <p class=""><a href="#" class="text-dark card-link non-target delete-card" data-title="{{ $post->title }}" data-id="{{ $post->id }}"><i class="far fa-trash-alt"></i> Удалить</a></p>
                                </div>
                            </h5>
                            <p class="card-text"><i class="fas fa-list"></i> Категория: {{ $post->category }} </p>
                            <p class="card-text"><i class="far fa-calendar-alt"></i> Создан: {{ $post->created_at }}</p>
                            <p class="card-text"><a target="_blank" href="{{ url("blog/{$post->id}") }}"><i class="far fa-eye"></i> Просмотр</a></p>
                            @if($post->created_at != $post->updated_at)
                                <p class="card-text text-success"><i class="far fa-calendar-alt"></i> Обновлен: {{ $post->updated_at }}</p>
                            @endif
                            <div class="form-check">
                                <input class="form-check-input" @if($post->active === 1) checked @endif data-id="{{ $post->id }}" type="checkbox">
                                <label class="form-check-label">
                                    Показать на сайте
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            @else
                <p class="mx-3"><i>Посты не найдены</i></p>
            @endif
        </div>
        <div class="d-flex justify-content-center my-4">
            {{ $posts->links() ?? '' }}
        </div>    
    </main>  
    @component('utilities.center_modal')
    @slot('title')Создать категорию @endslot
    @slot('modal_id')ModalCenter @endslot
    @slot('body')<input class="form-control" id="category-input" type="text" placeholder="названия категории"> @endslot
    @slot('action') save-category btn-primary @endslot
    @endcomponent

    @component('utilities.center_modal')
    @slot('title')Редактировать/Удалить категорию @endslot
    @slot('modal_id')ModalCenterEdit @endslot
    @slot('body')
        <input class="form-control" id="edit-category-val" type="text" placeholder="">
        <input type="hidden" id="edit-category-id">
    @endslot
    @slot('action') edit-category btn-primary @endslot
    @slot('actionName') Редактировать @endslot
    @slot('action2') btn-danger delete-category @endslot
    @slot('action2Name') Удалить @endslot
    @endcomponent

    @component('utilities.center_modal')
    @slot('title')Удалить Статью? @endslot
    @slot('modal_id')deleteModal @endslot
    @slot('body')
    <p class="content-value badge badge-danger"></p> 
    <input type="hidden" class="id-value">
    @endslot
    @slot('action') delete-post btn-danger @endslot
    @slot('actionName') Удалить @endslot
    @endcomponent

@stop

@section('script')
    <script>
        const BLOG_URL = "{{ url('/ajaxRequest/blog') }}";
    </script>
    <script src="{{ asset('js/content/blog.js') }}"></script>
@endsection