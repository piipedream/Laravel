@extends('layouts.app')

@section('title-block')Registration @endsection

@section('content')
<h1>Registration</h1>

<form action="{{ route('user.registration') }}" method="post">
    @csrf

    <div class="form-group mt-3">
        <label for="name">Name</label>
        <input type="text" name="name" placeholder="Name" id="name" class="form-control">
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

    <button type="submit" class="btn btn-success mt-3">Login</button>
</form>
@endsection 
