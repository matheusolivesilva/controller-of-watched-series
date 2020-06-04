<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Services\SerieRemover;
use App\Services\serieCreator;

class SerieRemoverTest extends TestCase
{

    use RefreshDatabase;

    /** @var Serie */
    private $serie;

    protected function setUp(): void
    {
        parent::setUp();
	$serieCreator = new SerieCreator();
	$this->serie = $serieCreator->createSerie(
	    'Serie name',
	    1,
	    1
	);
    }

    public function testRemoveOneSerie()
    {
        $this->assertDatabaseHas('series', ['id' => $this->serie->id]);
        $serieRemover = new SerieRemover();
	$serieName = $serieRemover->removeSerie($this->serie->id);
	$this->assertIsString($serieName);
	$this->assertEquals('Serie name', $this->serie->name);
	$this->assertDatabaseMissing('series', ['id' => $this->serie->id]);
    }
}
