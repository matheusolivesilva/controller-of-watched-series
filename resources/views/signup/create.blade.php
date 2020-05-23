@extends('layout')

@section('header')
    Sign Up
@endsection

@section('content')
<form method="post">
    @csrf
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" id="name" required class="form-control">
    </div>
    

    <div class="form-group">
        <label for="email">E-mail</label>
	<input type="email" name="email" id="email" required class="form-control">
    </div>

    <div class="form-group">
        <label for="password">Password</label>
	<input type="password" name="password" id="password" required min="1" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary mt-3">
        Sign Up
    </button>
</form>
@endsection

