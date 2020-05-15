@extends('layout')

@section('header')
    Episodes
@endsection

@section('content')
@include('message', ['message' => $message])
    <form action="/season/{{ $seasonId }}/episodes/watch" method="post">
    @csrf
    <ul class="list-group">
        @foreach($episodes as $episode)
            <li class="list-group-item d-flex justify-content-between align-items-center">
	        Episode {{ $episode->number }}
		<input type="checkbox" name="episodes[]" value=" {{ $episode->id }}" {{ $episode->watched ? 'checked' : '' }} >
	    </li>
        @endforeach
    </ul>
    <button class="btn btn-primary mt-2 mb-2">Save</button>
    </form> 
@endsection
