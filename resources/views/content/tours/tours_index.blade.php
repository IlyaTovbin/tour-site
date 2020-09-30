
@php
    $url = url('/tours');
@endphp
@extends('dashboard')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/content/index.css') }}">
@endsection

@section('main_content')
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Маршруты</h1>
            <a class="btn btn-primary" href="{{ url('/tours/create') }}">+Создать Маршрут</a>
        </div>
        <hr>
        {{-- @component('utilities.filter_bar', [ 
            'filterBy' => $relevant_categories,
            'url' => $url 
        ])
        @endcomponent --}}
        <div class="row">
            {{-- @if(isset($posts))
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
            @else --}}
                <p class="mx-3"><i>Маршруты не найдены</i></p>
            {{-- @endif --}}
        </div>
        <div class="d-flex justify-content-center my-4">
            {{-- {{ $posts->links() ?? '' }} --}}
        </div>
        
    </main>  

    @component('utilities.center_modal')
    @slot('title')Удалить Маршрут? @endslot
    @slot('modal_id')deleteModal @endslot
    @slot('body')
    <p class="content-value badge badge-danger"></p> 
    <input type="hidden" class="id-value">
    @endslot
    @slot('action') delete-tour btn-danger @endslot
    @slot('actionName') Удалить @endslot
    @endcomponent

@stop

@section('script')
    <script>
        const TOUR_URL = "{{ url('/ajaxRequest/tour') }}";
    </script>
    <script src="{{ asset('js/content/tour.js') }}"></script>
@endsection