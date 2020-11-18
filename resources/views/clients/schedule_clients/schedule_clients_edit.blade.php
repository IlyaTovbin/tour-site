@extends('dashboard')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/content/index.css') }}">
@endsection

@section('main_content')
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Редактировать Клиента</h1>
            <a class="btn btn-secondary" href="{{ url('/schedule-clients') }}">Назад</a>
        </div>
        <div>
            <form action="{{ url("/schedule-clients/{$info->id}") }}" method="POST" onsubmit="return validateForm()" class="create-post-form">
                {{ method_field('PUT') }}
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-6">
                     <label for="name">мероприятия:</label>
                     <select type="text" class="form-control" name="schedule" id="schedule" value="{{ $info->name ?? '' }}">
                        @foreach($schedules as $item)
                            <option @if( $item->id === $info->schedule_id ) selected @endif value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                     </select>
                     <span class="text-danger schedule"></span>
                    </div>
                 </div>
                <div class="form-row">
                   <div class="form-group col-md-6">
                    <label for="name">Имя:</label>
                    <input type="text" class="form-control" name="name" id="name" value="{{ $info->name ?? '' }}">
                    <span class="text-danger name"></span>
                   </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                     <label for="phone">Номер телефона:</label>
                     <input type="text" class="form-control" name="phone" id="phone" value="{{ $info->phone ?? '' }}">
                     <span class="text-danger phone"></span>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                     <label for="email">E-mail:</label>
                     <input type="text" class="form-control" name="email" id="email" value="{{ $info->email ?? '' }}">
                     <span class="text-danger email"></span>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                     <label for="quantity">Количество:</label>
                     <input type="number" class="form-control" name="quantity" id="quantity" value="{{ $info->quantity ?? '' }}">
                     <span class="text-danger quantity"></span>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                     <label for="transport">подвозка:</label>
                     <select type="text" class="form-control" name="transport" id="transport">
                        <option value="@if($info->transport === 1) 1 @else 0 @endif">@if($info->transport === 1) Да @else Нет @endif</option>
                        <option value="1">да</option>
                        <option value="0">нет</option>
                     </select>
                     <span class="text-danger transport"></span>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                     <label for="pay">оплата:</label>
                     <select type="text" class="form-control" name="pay" id="pay">
                        <option value="@if($info->pay === 0) 0 @else 1 @endif">@if($info->pay === 0) не оплачено @else оплачено @endif</option>
                        <option value="1">оплачено</option>
                        <option value="0">не оплачено</option>
                     </select>
                     <span class="text-danger pay"></span>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                     <label for="price">цена:</label>
                     <input type="text" class="form-control" name="price" id="price" value="{{ $info->price }}">
                     <span class="text-danger price"></span>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                     <label for="city">город:</label>
                     <input type="text" class="form-control" name="city" id="city" value="{{ $info->city }}">
                     <span class="text-danger city"></span>
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
        let schedule = $('#schedule').val();
        let name = $('#name').val();
        let email = $('#email').val();
        let phone = $('#phone').val();
        let quantity = $('#quantity').val();
        let transport = $('#transport').val();
        let price = $('#price').val();
        let city = $('#city').val();
        if(schedule.length < 2){
            $('.schedule').text('пожалуйста заполните это поле');
            valid = false;
        }else{
            $('.schedule').text('');
        }

        if(name.length < 2){
            $('.name').text('пожалуйста заполните это поле');
            valid = false;
        }else{
            $('.name').text('');
        }

        if(phone.length < 2){
            $('.phone').text('пожалуйста заполните это поле');
            valid = false;
        }else{
            $('.phone').text('');
        }

        if(email.length < 2){
            $('.email').text('пожалуйста заполните это поле');
            valid = false;
        }else{
            $('.email').text('');
        }

        if(quantity < 1){
            $('.quantity').text('пожалуйста заполните это поле');
            valid = false;
        }else{
            $('.quantity').text('');
        }

        if(transport != 0 && transport != 1){
            $('.transport').text('пожалуйста заполните это поле');
            valid = false;
        }else{
            $('.transport').text('');
        }

        if(price.length < 1){
            $('.price').text('пожалуйста заполните это поле');
            valid = false;
        }else{
            $('.price').text('');
        }

        if(city.length < 2){
            $('.city').text('пожалуйста заполните это поле');
            valid = false;
        }else{
            $('.city').text('');
        }


        return valid;
    }

  </script>
@endsection