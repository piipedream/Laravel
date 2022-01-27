@extends('layouts.app')

@section('title-block')Главная страница@endsection

@section('content')
<h1>Home page</h1>

<div class="solved_counter">
    @php
    $solved = 0;
    foreach ($data as $value) {
        if ($value->status == "solved") {
            $solved++;
        };
    };
@endphp

<h3 class="solved">Solved: {{ $solved }} </h3>
</div>

@php
    $count = 0;
@endphp

@foreach ($data as $elmnt)

@php
    if ($count == 4) {
        break;
    }
    $count++;
@endphp

<div class="alert alert-info">
    <h3>{{ $elmnt->subject }}</h3>
    <h3>Status: {{ $elmnt->status }}</h3>
    <h3>Type: {{ $elmnt->app_type }}</h3>
    <p><small>{{ $elmnt->created_at }}</small></p>
    @if ( $elmnt->after_img != null )
        <div class="home_images">
            <img class="home_image home_image_after" src="{{asset("storage/image/$elmnt->after_img")}}" alt="">
            <img class="home_image home_image_before" src="{{asset("storage/image/$elmnt->before_img")}}" alt="">
        </div>

    @endif
</div>

@endforeach

<script>
    var audio = new Audio('storage/image/PTQJUES-message-notification.mp3');
    $(document).ready(function(){
        setInterval(function(){
            $(".solved_counter").load(location.href + " .solved");
            console.log("refreshed");
        }, 5000);
    });
</script>

@endsection

@section('aside')
  @parent
  <p>Dop text</p>
@endsection
