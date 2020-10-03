

@extends('main')
@section('styles')
<link rel="stylesheet" href="{{ asset('css/style.default.css') }}" id="theme-stylesheet">
@endsection
@section('content')
<section class="hero py-6 py-lg-7 text-white dark-overlay"><img class="bg-image" src="{{ asset('images/category/' . $category->image) }}" alt="Text page">
    <div class="container overlay-content">
      <h1 class="hero-heading">{{ $category->name }}</h1>
    </div>
  </section>
@endsection





