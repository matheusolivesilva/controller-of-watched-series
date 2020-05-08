<?php

namespace App\Http\Controllers;
use App\Http\Requests\SeriesFormRequest;
use App\{Serie, Season, Episode};
use App\Services\SerieCreator;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

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

    public function destroy (Request $request)
    {
        $serie = Serie::find($request->id);
	$serieName = $serie->name;
	$serie->seasons->each(function(Season $season) {
	   $season->episodes()->each(function(Episode $episode) {
	       $episode->delete();
	   });
	   $season->delete();
	});
	$serie->delete();

        Serie::destroy($request->id);
        $request->session()
            ->flash(
             'message',
		     "Serie $serieName successfully deleted"
	    );

        return redirect()->route('list_series');
    }
}
