@extends('layouts.app')

@section('title-block')Все сообщения@endsection

@section('content')
  <form action="{{ route('applicationType-add') }}" method="post">
    @csrf

    <div class="form-group mt-3">
        <label for="typeName">Name</label>
        <input type="text" name="typeName" placeholder="Type Name" id="typeName" class="form-control">
    </div>

    <button type="submit" class="btn btn-success mt-3">Add</button>
  </form>

  <form action="{{ route('applicationType-delete') }}" method="post">
    @csrf

    <select class="form-select mt-3" name="appType_select">
        @foreach($app_data_type as $type)
        <option value="{{ $type->id }}">
            {{ $type->name }}
        </option>
        @endforeach
    </select>

    <button type="submit" class="btn btn-danger mt-3">Delete</button>
</form>
  <h1>Все сообщения</h1>
  @foreach($data as $el)
    <div class="alert alert-info">
      <h3>{{$el->subject}}</h3>
      <p>{{$el->email}}</p>
      <p><small>{{$el->created_at}}</small></p>
      <a href="{{route('contact-data-one', $el->id)}}"><button class="btn btn-warning">Детальнее</button></a>
    </div>
  @endforeach
@endsection
