@extends('layout')

@section('header')
Add Serie
@endsection

@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
	        <li> {{ $error }} </li>
            @endforeach
	</ul>
    </div>
@endif
	<form method="post">

		@csrf
	    <div class="row">
	        <div class="col col-8">	
	            <label for="name">Name</label>
	            <input type="text" class="form-control" name="name" id="name">
		</div>

		<div class="col col-2">
                    <label for"nmr_seasons">Nº of seasons</label>
		    <input type="number" class="form-control" name="nmr_seasons" id="nmr_seasons">
		</div>

		<div class="col col-2">
		    <label for="ep_by_season">Ep. by season</label>
		    <input type="number" class="form-control" name="ep_by_season" id="ep_by_season">
		</div>
	    </div>
	    <button class="btn btn-primary mt-2">Save</button>
	</form>
@endsection
