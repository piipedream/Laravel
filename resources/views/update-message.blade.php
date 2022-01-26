@extends('layouts.app')

@section('title-block')Обновление записи@endsection

@section('content')
  <h1>Обновление записи</h1>

  <form action="{{route('contact-update-submit', $data->id)}}" method="post">
    @csrf

    <div class="form-group">
      <select name="status" id="status">
        <option value="solved">Решена</option>
        <option value="rejected">Отклонена</option>
      </select>
    </div>

    <button type="submit" class="btn mt-3 btn-success">Обновить</button>
  </form>
@endsection
