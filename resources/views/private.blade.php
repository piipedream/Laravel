@extends('layouts.app')

@section('title-block')Home @endsection

@section('content')
<h1>Cabinet</h1>

<p>Hello {{ Auth::user()->name }}. it's your messages page</p>

@foreach($data as $elmnt)
<div class="alert alert-info">
    <h3>{{ $elmnt->subject }}</h3>
    <p>{{ $elmnt->email }}</p>
    <p>{{ $elmnt->status }}</p>
    <p>{{ $elmnt->category }}</p>
    <p><small>{{ $elmnt->created_at }}</small></p>
    <a href="{{ route('contact-data-one', $elmnt->id) }}"><button class="btn btn-success">More...</button></a>
</div>
@endforeach

@endsection

@section('aside')@parent<p>Home side text</p>
@endsection
