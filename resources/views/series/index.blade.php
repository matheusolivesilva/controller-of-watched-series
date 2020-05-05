@extends('layout')

@section('header')
Series
@endsection

@section('content')

<a href="/series/create" class="btn btn-dark mb-2">Add</a>

<ul class="list-group">
@foreach ($series as $serie)
<li class="list-group-item"><?= $serie; ?></li>
<?php endforeach; ?>
</ul>

@endsection
