@extends('main')

@section('styles')
<link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
@yield('style')
@stop

@section('content')
    <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="#">Менеджер Dima-tours</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <ul class="navbar-nav px-3">
    <li class="nav-item text-nowrap">
      <a class="nav-link" href="{{ url('/logout') }}">Выйти</a>
    </li>
  </ul>
</nav>

<div class="container-fluid">
  <div class="row">
    @include('nav')
    @yield('main_content')
  </div>
</div>
@stop

@section('summernote-script')
  @yield('summernote-script')
@stop

@section('scripts')
@yield('script')
@stop


