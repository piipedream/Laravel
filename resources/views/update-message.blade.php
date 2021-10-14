@extends('layouts.app')

@section('title-block')Обновление записи@endsection

@section('content')
  <h1>Обновление записи</h1>

  <form action="{{route('contact-update-submit', $data->id)}}" method="post">
    @csrf
    <div class="form-group">
      <label for="name" class="mb-2">Введите имя</label>
      <input type="text" name="name" value="{{$data->name}}" placeholder="Введите имя" id="name" class="form-control">
    </div>

    <div class="mt-3 form-group">
      <label for="name" class="mb-2">Email</label>
      <input type="text" name="email" value="{{$data->email}}" placeholder="Введите email" id="email" class="form-control">
    </div>

    <div class="mt-3 form-group">
      <label for="subject" class="mb-2">Тема сообщения</label>
      <input type="text" name="subject" value="{{$data->subject}}" placeholder="Тема сообщения" id="subject" class="form-control">
    </div>

    <div class="mt-3 form-group">
      <label for="message" class="mb-2">Сообщение</label>
      <textarea name="message" id="message" class="form-control" placeholder="Введите сообщение">{{$data->message}}</textarea>
    </div>

    <button type="submit" class="btn mt-3 btn-success">Обновить</button>
  </form>
@endsection
