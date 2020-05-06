<?php

namespace App\Http\Controllers;
use App\Http\Requests\SeriesFormRequest;
use App\Serie;
use Illuminate\Http\Request;

class SeriesController extends Controller
{

    public function index(Request $request)
    {
        $series = Serie::query()
	    ->orderBy('name')
	    ->get();
	$message = $request->session()->get('message');
	return view ('series.index', compact('series', 'message'));
    }

    public function create()
    {
        return view('series.create');
    }

    public function store(SeriesFormRequest $request)
    {
        $serie = Serie::create($request->all());
	$request->session()
	->flash(
            'message',
	    "The serie with id {$serie->id} was successfully created with the name {$serie->name}"
	);
        
	return redirect()->route('list_series');
    }

    public function destroy (Request $request)
    {
        Serie::destroy($request->id);
        $request->session()
            ->flash(
             'message',
	     'Serie successfully deleted'
	    );

        return redirect()->route('list_series');
    }
}
