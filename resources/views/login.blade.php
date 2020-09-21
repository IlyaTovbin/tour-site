@extends('main')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
@stop

@section('content')

  <div class="text-center">
    <form class="form-signin" method="POST" action="" autocomplete="off">
      @csrf()
      {{-- @if ($errors->any())
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
      @endif --}}
      <h1 class="h3 mb-3 font-weight-normal">Вход</h1>
      <label for="email" class="sr-only">Email</label>
      <input type="email" name="email" id="email" class="form-control" placeholder="Email" required autofocus>
      <label for="password" class="sr-only">Password</label>
      <input type="password" name="password" id="password" class="form-control" placeholder="Пароль" required>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Войти</button>
      @if(!empty($login_error))
        <span class="text-danger">{{ $login_error ?? '' }}</span>
      @endif
        <p class="mt-5 mb-3 text-muted">&copy; 2020</p>
    </form>
  </div>

@stop




