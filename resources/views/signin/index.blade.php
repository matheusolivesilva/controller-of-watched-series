
@extends('layout')

@section('header')
    Sign In
@endsection

@section('content')
    @include('errors', ['errors' => $errors])
    <form method="post">
        @csrf
	<div class="form-group">
            <label for="email">Email</label>
	    <input type="email" name="email" id="email" required class="form-control">
	</div>

	<div class="form-group">
            <label for="password">Password</label>
	    <input type="password" name="password" id="password" required min="1" class="form-control">
	</div>
	<button type="submit" class="btn btn-primary mt-3">
	    Sign In
	 </button>

	 <a href="/signup" class="btn btn-secondary mt-3">
	     Sign Up
	 </a>

    </form>

@endsection
