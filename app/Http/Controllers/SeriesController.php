<?php

namespace App\Http\Controllers;

use App\Serie;
use Illuminate\Http\Request;

class SeriesController extends Controller
{

    public function index()
    {
        $series = Serie::all();
	return view ('series.index', compact('series'));
    }

    public function create()
    {
        return view('series.create');
    }

    public function store(Request $request)
    {
        $serie = Serie::create($request->all());

	echo "Serie with id {$serie->id} was created: {$serie->name}";
    }
}
