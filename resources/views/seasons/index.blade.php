@extends('layout')

@section('header')
    Seasons from {{ $serie->name }}
@endsection

@section('content')
    <ul class="list-group">
        @foreach($seasons as $season)
	    <li class="list-group-item">
	        Season {{ $season->number }}
	    </li>
	@endforeach
    </ul>
@endsection
