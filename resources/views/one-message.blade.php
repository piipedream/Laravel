@extends('layouts.app')

@section('title-block'){{$data->subject}}@endsection

@section('content')
  <h1>{{$data->subject}}</h1>
    <div class="alert alert-info">
      <p>{{$data->message}}</p>
      <p>Status: {{ $data->status }}</p>
      <p>Category: {{ $data->category }}</p>
      <p>{{$data->email}} - {{$data->name}}</p>
      <p><small>{{$data->created_at}}</small></p>
      @can('admin')
        <a href="{{route('contact-update', $data->id)}}"><button class="btn btn-primary">Редактировать</button></a>
      @endcan
      <a href="{{route('contact-delete', $data->id)}}"><button class="btn btn-danger">Удалить</button></a>
    </div>
@endsection
