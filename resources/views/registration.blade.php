@extends('layouts.app')

@section('title-block')Registration @endsection

@section('content')
<h1>Registration</h1>

<form action="{{ route('user.registration') }}" method="post">
    @csrf

    <div class="form-group mt-3">
        <label for="fio">FIO</label>
        <input type="text" name="fio" placeholder="FIO" id="fio" class="form-control" pattern="[а-яА-ЯЁё- ]*">
        @error('fio')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group mt-3">
        <label for="name">Login</label>
        <input type="text" name="name" placeholder="Login" id="name" class="form-control" pattern="[a-zA-Z]*">
        @error('name')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group mt-3">
        <label for="email">Email</label>
        <input type="text" name="email" placeholder="Email" id="email" class="form-control">
        @error('email')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group mt-3">
        <label for="password">Password</label>
        <input type="password" name="password" placeholder="Password" id="password" class="form-control">
        @error('password')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group mt-3">
        <label for="password_confirmation">Confirm Password</label>
        <input type="password" name="password_confirmation" placeholder="password confirmation" id="password_confirmation" class="form-control">
        @error('password_confirmation')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group mt-3">
        <label for="personal_data" class="form-check-label">Сonsent to the processing of personal data</label>
        <input type="checkbox" name="personal_data" id="personal_data" class="form-check-label" checked>
        @error('personal_data')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <button type="submit" class="btn btn-success mt-3">Login</button>
</form>
@endsection 
