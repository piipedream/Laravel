@extends('layouts.app')

@section('title-block')Страница контактов@endsection

@section('content')
  <h1>Страница контактов</h1>

  <form action="{{route('contact-form')}}" method="post">
    @csrf

    <input name="user_id"id="user_id" style="display: none" value="{{ Auth::user()->id }}">

    <div class="form-group">
      <label for="name" class="mb-2">Введите имя</label>
      <input type="text" name="name" placeholder="Введите имя" id="name" class="form-control" value="{{ Auth::user()->name }}">
    </div>

    <div class="mt-3 form-group">
      <label for="name" class="mb-2">Email</label>
      <input type="text" name="email" placeholder="Введите email" id="email" class="form-control">
    </div>

    <div class="mt-3 form-group">
      <label for="subject" class="mb-2">Тема сообщения</label>
      <input type="text" name="subject" placeholder="Тема сообщения" id="subject" class="form-control">
    </div>

    <div class="mt-3 form-group">
      <label for="message" class="mb-2">Сообщение</label>
      <textarea name="message" id="message" class="form-control" placeholder="Введите сообщение"></textarea>
    </div>

    <div class="mt-3 form-group">
      <select class="form-select mt-3" name="category">
        @foreach($data as $type)
        <option value="{{ $type->name }}">
            {{ $type->name }}
        </option>
        @endforeach
    </select>
    </div>

    <button type="submit" class="btn mt-3 btn-success">Отправить</button>
  </form>
@endsection
