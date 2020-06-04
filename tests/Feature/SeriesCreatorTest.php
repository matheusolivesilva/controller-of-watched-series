<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Services\SerieCreator;
use App\Serie;

class SeriesCreatorTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testSerieCreator()
    {
        $serieCreator = new SerieCreator();
	$serieName = 'Test name';
	$createdSerie = $serieCreator->createSerie($serieName, 1, 1);
	$this->assertInstanceOf(Serie::class, $createdSerie);
	$this->assertDatabaseHas('series', ['name' => $serieName]);
	$this->assertDatabaseHas('seasons', ['serie_id' => $createdSerie->id, 'number' => 1]);
	$this->assertDatabaseHas('episodes',['number' => 1]);
    }
}
