<?php
namespace App\Services;
use Illuminate\Support\Collection;
use App\{Serie, Season, Episode};
use Illuminate\Support\Facades\DB;

class SerieRemover
{
    public function removeSerie(int $serieId): string
    {
        $serieName = '';

	DB::transaction( function() use ($serieId, &$serieName) {
        $serie = Serie::find($serieId);
	$serieName = $serie->name;
	$this->removeSeasons($serie);
	$serie->delete();
    });

	return $serieName;
    }

    public function removeSeasons($serie):void 
    {
        $serie->seasons->each(function(Season $season) {
            $this->removeEpisodes($season);
	    $season->delete();
        });
    }

    public function removeEpisodes(Season $season): void
    {
        $season->episodes()->each(function(Episode $episode) {
	    $episode->delete();
	});

    }
}
