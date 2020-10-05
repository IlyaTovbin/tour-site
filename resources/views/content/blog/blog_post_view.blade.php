
@php
    require_once resource_path('views\htmlpurifier-4.13.0\\library\\HTMLPurifier.auto.php');
    $config = HTMLPurifier_Config::createDefault();
    $config->set('HTML.AllowedAttributes', 'src, height, width, alt, style, class');
    $config->set('URI.AllowedSchemes', array('data' => true));
    $purifier = new HTMLPurifier($config);
    $clean_html = $purifier->purify($post->body);
@endphp

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
<section class="py-6">
<div class="container">
        {!! $clean_html !!}
</div>
</section>
<script>
</script>
@endsection





