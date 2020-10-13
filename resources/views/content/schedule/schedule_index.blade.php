@php
    $url = url('/schedule');
@endphp
@extends('dashboard')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/content/index.css') }}">
@endsection

@section('main_content')
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Расписния</h1>
            <a class="btn btn-primary" href="{{ url('/schedule/create') }}">+Создать Расписние</a>
        </div>
        @component('utilities.filter_bar', [ 
            'url' => $url 
        ])
        @endcomponent
        <div class="row">
            @if(isset($schedules) && count($schedules) > 0)
            @foreach ($schedules as $schedule)
                <div class="col-12 col-lg-4 my-1">
                    <div class="card shadow h-100">
                        <div class="card-body">
                            <h5 class="card-title">
                                <a class="dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{ $schedule->title }}</a>
                                <div class="dropdown-menu p-2 ">
                                <p class=""><a href="{{ url("/schedule/{$schedule->id}/edit") }}" class="text-dark card-link"><i class="fas fa-edit"></i> Редактировать</a></p>
                                <p class=""><a href="#" class="text-dark card-link non-target delete-card" data-title="{{ $schedule->title }}" data-id="{{ $schedule->id }}"><i class="far fa-trash-alt"></i> Удалить</a></p>
                                </div>
                            </h5>
                            <p class="card-text"> Цена: {{ $schedule->price }} </p>
                            <p class="card-text"><i class="far fa-calendar-alt"></i> Дата: {{ $schedule->from_date }} @if($schedule->to_date) <span>до {{ $schedule->to_date }}</span>  @endif</p>
                            <p class="card-text"><i class="far fa-calendar-alt"></i> Создано: {{ $schedule->created_at }}</p>
                            <p class="card-text"><a target="_blank" href="{{ url("schedule/{$schedule->id}") }}"><i class="far fa-eye"></i> Просмотр</a></p>
                            @if($schedule->created_at != $schedule->updated_at)
                                <p class="card-text text-success"><i class="far fa-calendar-alt"></i> Обновлено: {{ $schedule->updated_at }}</p>
                            @endif
                            <div class="form-check">
                                <input class="form-check-input" @if($schedule->active === 1) checked @endif data-id="{{ $schedule->id }}" type="checkbox">
                                <label class="form-check-label">
                                    Показать на сайте
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            @else
                <p class="mx-3"><i>расписание не найдены</i></p>
            @endif
        </div>
        <div class="d-flex justify-content-center my-4">
            {{ $schedules->links() ?? '' }}
        </div>    
    </main>  


    @component('utilities.center_modal')
    @slot('title')Удалить расписания? @endslot
    @slot('modal_id')deleteModal @endslot
    @slot('body')
    <p class="content-value badge badge-danger"></p> 
    <input type="hidden" class="id-value">
    @endslot
    @slot('action') delete-schedule btn-danger @endslot
    @slot('actionName') Удалить @endslot
    @endcomponent

@stop

@section('script')
    <script>
        const SCHEDULE_URL = "{{ url('/ajaxRequest/schedule') }}";
    </script>
    <script src="{{ asset('js/content/schedule.js') }}"></script>
@endsection