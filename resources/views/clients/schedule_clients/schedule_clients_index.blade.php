@php
    $url = url('/schedule-clients');
@endphp
@extends('dashboard')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/content/index.css') }}">
@endsection

@section('main_content')
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">список клиентов</h1>
        </div>
        @component('utilities.filter_bar', [ 
            'url' => $url ,
            'active_off' => 1,
            'filterBy' => $schedules
        ])
        @endcomponent
        <table class="table">
            <thead class="thead-dark">
              <tr>
                <th scope="col">Мероприятия</th>
                <th scope="col">Имя</th>
                <th scope="col">Email</th>
                <th scope="col">Телефон</th>
                <th scope="col">Количество</th>
                <th scope="col">Подвозка</th>
                <th scope="col">Город</th>
                <th scope="col">Цена</th>
                <th scope="col">Оплата</th>
                <th scope="col">Создан</th>
                <th scope="col">Обновлен</th>
              </tr>
            </thead>
            <tbody>
                @if(isset($info) && count($info) > 0)
                @foreach ($info as $client)
                <tr class="hover-bg">
                    <th>{{ $client->title }}</th>
                    <th scope="row"> {{ $client->name }}</th>
                    <td>{{ $client->email }}</td>
                    <td>{{ $client->phone }}</td>
                    <td>{{ $client->quantity }}</td>
                    <td>@if($client->transport === 1) Да @else Нет @endif</td>
                    <td>{{ $client->city ?? '' }}</td>
                    <td>{{ $client->price }}</td>
                    <td>@if($client->pay === 0) не оплачено @else {{ $client->pay }} @endif</td>
                    <td>{{ $client->created_at }}</td>
                    <td>{{ $client->updated_at }}</td>
                </tr>
              @endforeach
              @else
              <p class="mx-3"><i>клиенты не найдены</i></p>
              @endif
            </tbody>
          </table>
        <div class="d-flex justify-content-center my-4">
            {{ $info->links() ?? '' }}
        </div>
    </main>  


    {{-- @component('utilities.center_modal')
    @slot('title')Удалить Статью? @endslot
    @slot('modal_id')deleteModal @endslot
    @slot('body')
    <p class="content-value badge badge-danger"></p> 
    <input type="hidden" class="id-value">
    @endslot
    @slot('action') delete-post btn-danger @endslot
    @slot('actionName') Удалить @endslot
    @endcomponent --}}

@stop

@section('script')
    <script>
        // const BLOG_URL = "{{ url('/ajaxRequest/blog') }}";
        $('.hover-bg').on('hover')
    </script>
    {{-- <script src="{{ asset('js/content/blog.js') }}"></script> --}}
@endsection