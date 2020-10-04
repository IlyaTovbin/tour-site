@php
    $url = url('/faq');
@endphp
@extends('dashboard')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/content/index.css') }}">
@endsection

@section('main_content')
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Вопросы и ответы</h1>
            <a class="btn btn-primary" href="{{ url('/faq/create') }}">+Создать FAQ</a>
        </div>
        @component('utilities.filter_bar', [ 
            'url' => $url 
        ])
        @endcomponent
        <div class="row">
            @if(isset($all_faq) && count($all_faq) > 0)
            @foreach ($all_faq as $faq)
                <div class="col-12 my-1">
                    <div class="card shadow h-100">
                        <div class="card-body">
                            <h5 class="card-title">
                                <a class="dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{ $faq->question }}</a>
                                <div class="dropdown-menu p-2 ">
                                <p class=""><a href="{{ url("/faq/{$faq->id}/edit") }}" class="text-dark card-link"><i class="fas fa-edit"></i> Редактировать</a></p>
                                <p class=""><a href="#" class="text-dark card-link non-target delete-card" data-title="{{ $faq->question }}" data-id="{{ $faq->id }}"><i class="far fa-trash-alt"></i> Удалить</a></p>
                                </div>
                            </h5>
                            <p class="card-text"> Ответ: {{ $faq->answer }}</p>
                            <p class="card-text"><i class="far fa-calendar-alt"></i> Создан: {{ $faq->created_at }}</p>
                            @if($faq->created_at != $faq->updated_at)
                                <p class="card-text text-success"><i class="far fa-calendar-alt"></i> Обновлен: {{ $faq->updated_at }}</p>
                            @endif
                            <div class="form-check">
                                <input class="form-check-input" @if($faq->active === 1) checked @endif data-id="{{ $faq->id }}" type="checkbox">
                                <label class="form-check-label">
                                    Показать на сайте
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            @else
                <p class="mx-3"><i>FAQ не найдены</i></p>
            @endif
        </div>
        <div class="d-flex justify-content-center my-4">
            {{ $all_faq->links() ?? '' }}
        </div>    
    </main>  


    @component('utilities.center_modal')
    @slot('title')Удалить FAQ? @endslot
    @slot('modal_id')deleteModal @endslot
    @slot('body')
    <p class="content-value badge badge-danger"></p> 
    <input type="hidden" class="id-value">
    @endslot
    @slot('action') delete-faq btn-danger @endslot
    @slot('actionName') Удалить @endslot
    @endcomponent

@stop

@section('script')
    <script>
        const FAQ_URL = "{{ url('/ajaxRequest/faq') }}";
        $('.delete-faq').on('click', function(){
            data = {
                id: $('.id-value').val(),
                method: 'deleteFaq'
            }
            if(data.id){
                sendAjax(data, FAQ_URL)
            }
        })

        $('.form-check-input').on('click', function(){
            let value = $(this).prop('checked') ? true : false;
            let id = $(this).data('id');
            let data = { 
                id: id,
                value: value,
                method: 'activeFaq' 
            }
            sendAjax(data, FAQ_URL, false)
        })
    </script>
@endsection