
@php
    require_once resource_path('views\htmlpurifier-4.13.0\\library\\HTMLPurifier.auto.php');
    $config = HTMLPurifier_Config::createDefault();
    $config->set('HTML.AllowedAttributes', 'src, height, width, alt, style');
    $config->set('URI.AllowedSchemes', array('data' => true));
    $purifier = new HTMLPurifier($config);
    $clean_html = $purifier->purify($post->body);

@endphp

@extends('main')

@section('content')
<div class="container">
    <h1 class="bg-primary text-light text-center mb-5">{{ $post->title }}</h1>
    <div class="summernote">
        {!! $clean_html !!}
    </div>
</div>

<script>
</script>
@endsection





