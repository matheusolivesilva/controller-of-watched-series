@extends('layout')

@section('header')
Series
@endsection

@section('content')

@if(!empty($message))
<div class="alert alert-success">
    {{ $message }} 
</div>
@endif

<a href="{{ route('create_serie_form') }}" class="btn btn-dark mb-2">Add</a>

<ul class="list-group">

@foreach ($series as $serie)
<li class="list-group-item d-flex justify-content-between align-items-center">
    {{ $serie->name }}

    <span id="serie-name-{{ $serie->id }}"> {{ $serie->name }}</span>

    <div class="input-group w-50" hidden id="input-serie-name-{{ $serie->id }}">
        <input type="text" class="form-control" value="{{ $serie->name }}">
	<div class="input-group-append">
            <button class="btn btn-primary" onclick="editSerie({{ $serie->id }})">
                <i class="fas fa-check"></i>
	    </button>
	    @csrf
	</div>
    </div>

    <span class="d-flex">
        <button class="btn btn-info btn-sm mr-1" onclick="toggleInput({{ $serie->id }})">
            <i class="fas fa-edit"></i>
	</button>
        <a href="/series/{{ $serie->id }}/seasons" class="btn btn-info btn-sm mr-1">
	    <i class="fas fa-external-link-alt"></i>
	</a>
    </span>
    <form method="post" action="/series/remove/{{ $serie->id }}" onsubmit="return confirm('Are you sure you want to delete the {{ addslashes( $serie->name) }}?')">
        @csrf
	@method('DELETE')
        <button class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button>
    </form>
</li>
@endforeach

</ul>

<script>
  function toggleInput(serieId) {
    
    const serieNameElement = document.getElementById(`serie-name-${serieId}`);
    const inputSerieElement = document.getElementById(`input-serie-name-${serieId}`);
    
    if (serieNameElement.hasAttribute('hidden')) {
      serieNameElement.removeAttribute('hidden');
      inputSerieElement.hidden = true;
    } else {
       inputSerieElement.removeAttribute('hidden');
       serieNameElement.hidden = true;
    }
  }

  function editSerie(serieId) {
    
    let formData = new FormData();
    const name = document.querySelector(`#input-serie-name-${serieId} > input`).value;

    const token = document.querySelector('input[name="_token"]').value;

    
    formData.append('name', name);
    formData.append('_token', token);
    const url = `/series/${serieId}/editName`;
    fetch(url, {
      method: 'POST',
      body: formData
    }).then(() => {
      toggleInput(serieId);
      document.getElementById(`serie-name-${serieId}`).textContent = name;
    });
  }

</script>
@endsection
