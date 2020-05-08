<?php

namespace App\Services;

use App\Serie;

class SerieCreator
{
    public function createSerie(string $serieName, int $nmrSeason, int $epBySeason): Serie
    {
        $serie = Serie::create(['name' => $serieName]);
	$nmrSeasons = $nmrSeason;
	for ($i = 1; $i <= $nmrSeasons; $i++) {
	    $season = $serie->seasons()->create(['number' => $i]);

	    for ($j = 1; $j <= $epBySeason; $j++) {
	        $season->episodes()->create(['number' => $j]);
	    }
	}

	return $serie;

    }
}
