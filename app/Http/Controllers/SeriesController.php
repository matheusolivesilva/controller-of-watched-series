<?php

namespace App\Http\Controllers;
use App\Http\Requests\SeriesFormRequest;
use App\{Serie, Season, Episode};
use App\Services\{SerieCreator, SerieRemover};
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;

class SeriesController extends Controller
{

    public function __constructor()
    {
        $this->middleware('auth');
    }

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

    public function store(SeriesFormRequest $request, SerieCreator $serieCreator)
    {
        $serie = $serieCreator->createSerie(
	    $request->name,
	    $request->nmr_seasons,
	    $request->ep_by_season
	);

	$request->session()
	->flash(
            'message',
	    "The serie with id {$serie->id} was successfully created with the name {$serie->name}"
	);
        
	return redirect()->route('list_series');
    }

    public function destroy (Request $request, SerieRemover $serieRemover)
    {
	$serieName = $serieRemover->removeSerie($request->id);

        $request->session()
            ->flash(
             'message',
	     "Serie $serieName successfully deleted"
	    );

        return redirect()->route('list_series');
    }

    public function editName(int $id, Request $request)
    {
        $newName = $request->name;
	$serie = Serie::find($id);
	$serie->name = $newName;
	$serie->save();
    } 
}
