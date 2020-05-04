<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SeriesController extends Controller
{

    public function index(Request $request)
    {
        $series = [
            'Greys\'s Anatomy',
	    'Lost',
	    'Agents of SHIELD'
	];

	return view ('series.index', compact('series'));
    }
}
