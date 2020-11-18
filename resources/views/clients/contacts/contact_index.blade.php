@php
    $url = url('/contacts');
    $types = [
        ['id' => 0, 'type' => 'regular'],
        ['id' => 1, 'type' => 'vip']
    ];
@endphp
@extends('dashboard')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/content/index.css') }}">
    <style>
        .text-truncate{
            max-width: 10px !important;
        }
        .max-width{
            overflow: hidden;
            overflow-wrap: break-word;
        }
    </style>
@endsection

@section('main_content')
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">список заявок</h1>
        </div>
        @component('utilities.filter_bar', [ 
            'url' => $url ,
            'active_off' => 1,
            'filterBy' => $types
        ])
        @endcomponent
        <div class="table-responsive">
            <table class="table">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">Имя</th>
                    <th scope="col">Email</th>
                    <th scope="col">Телефон</th>
                    <th scope="col">Сообшения</th>
                    <th scope="col">VIP</th>
                    <th scope="col">Создан</th>
                    <th scope="col">Обновлен</th>
                </tr>
                </thead>
                <tbody>
                    @if(isset($info) && count($info) > 0)
                    @foreach ($info as $client)
                    <tr class="hover-bg">
                        <th scope="row">
                            <a class="dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ $client->name }}</a>
                            <div class="dropdown-menu p-2 ">
                            <p class=""><a href="#" class="text-dark card-link non-target delete-card" data-title="{{ $client->name }}" data-id="{{ $client->id }}"><i class="far fa-trash-alt"></i> Удалить</a></p>
                            </div>
                        </th>
                        <td>{{ $client->email }}</td>
                        <td>{{ $client->phone }}</td>
                        <td class="text-truncate">
                            <a href="#" data-title="{{ $client->message ?? '' }}" class="non-target show-message">
                                {{ $client->message ?? '' }}
                            </a>
                        </td>
                        <td>@if($client->type === 1) Да @else Нет @endif</td>
                        <td>{{ $client->created_at }}</td>
                        <td>{{ $client->updated_at }}</td>
                    </tr>
                @endforeach
                @else
                <p class="mx-3"><i>заявки не найдены</i></p>
                @endif
                </tbody>
          </table>
        </div> 
        <div class="d-flex justify-content-center my-4">
            {{ $info->links() ?? '' }}
        </div>
    </main>  


    @component('utilities.center_modal')
    @slot('title')Удалить заявку? @endslot
    @slot('modal_id')deleteModal @endslot
    @slot('body')
    <p class="content-value badge badge-danger"></p> 
    <input type="hidden" class="id-value">
    @endslot
    @slot('action') delete-post btn-danger @endslot
    @slot('actionName') Удалить @endslot
    @endcomponent

    @component('utilities.center_modal')
    @slot('title')Заявка @endslot
    @slot('modal_id')msgModal @endslot
    @slot('body')
    <p class="content-value max-width"></p> 
    @endslot
    @endcomponent



@stop

@section('script')
    <script>
        const CONTACTS_URL = "{{ url('/ajaxRequest/contacts') }}";
        $('.hover-bg').on('hover');
        $(document).on('click', '.show-message', function(){
            let title = $(this).data('title');
            $('.content-value').text(title)
            $('#msgModal').modal('show');
        })  
    </script>
    <script src="{{ asset('js/content/contacts.js') }}"></script>
@endsection