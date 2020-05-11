<?php 

namespace App\Services; 

use App\Serie;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB; 

class SerieCreator
{
    public function createSerie(
        string $serieName, 
	int $nmrSeason, 
	int $epBySeason
    ): Serie
    {
        $serie = null;
        DB::beginTransaction();
	$serie = Serie::create(['name' => $serieName]);
	$this->createSeasons($nmrSeason, $epBySeason, $serie);
	DB::commit();
	return $serie;
    }

    private function createSeasons(int $nmrSeasons, int $epBySeason, Serie $serie)
    {
        for ($i = 0; $i <= $nmrSeasons; $i++) {
            $season = $serie->seasons()->create(['number' => $i]);
	    $this->createEpisodes($epBySeason, $season);
	}
    }

    private function createEpisodes(int $epBySeason, $season): void
    {
        for ($j = 1; $j <= $epBySeason; $j++) {
            $season->episodes()->create(['number' => $j]);
	}
    }
}
