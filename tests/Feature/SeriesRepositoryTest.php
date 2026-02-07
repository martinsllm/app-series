<?php

namespace Tests\Feature;

use App\Repositories\SeriesRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SeriesRepositoryTest extends TestCase
{
    use RefreshDatabase;

    public function test_when_a_serie_is_created_seasons_and_episodes_are_created(): void
    {
        $repository = $this->app->make(SeriesRepository::class);
        $request = [
            'name' => 'Série Teste',
            'seasonsQty' => 2,
            'episodesForSeason' => 3,
        ];

        $repository->add($request);

        $this->assertDatabaseHas('series', ['name' => 'Série Teste']);
        $this->assertDatabaseCount('seasons', 2);
        $this->assertDatabaseCount('episodes', 6);
    }

    public function test_when_a_serie_is_updated_and_seasons_and_episodes_are_updated(): void
    {
        $repository = $this->app->make(SeriesRepository::class);
        $request = [
            'name' => 'Série Teste',
            'seasonsQty' => 2,
            'episodesForSeason' => 3,
        ];

        $series = $repository->add($request);

        $updateRequest = [
            'name' => 'Série Teste Atualizada',
            'seasonsQty' => 3,
            'episodesForSeason' => 4,
        ];

        $repository->update($series, $updateRequest);

        $this->assertDatabaseHas('series', ['name' => 'Série Teste Atualizada']);
        $this->assertDatabaseCount('seasons', 3);
        $this->assertDatabaseCount('episodes', 12);

    }

    public function test_when_all_series_are_retrieved(): void
    {
        $repository = $this->app->make(SeriesRepository::class);
        $request1 = [
            'name' => 'Série Teste 1',
            'seasonsQty' => 2,
            'episodesForSeason' => 3,
        ];

        $request2 = [
            'name' => 'Série Teste 2',
            'seasonsQty' => 1,
            'episodesForSeason' => 4,
        ];

        $repository->add($request1);
        $repository->add($request2);

        $series = $repository->all();

        $this->assertCount(2, $series);
        $this->assertEquals('Série Teste 1', $series[0]['name']);
        $this->assertEquals('Série Teste 2', $series[1]['name']);
        $this->assertIsArray($series);
    }

    public function test_when_a_series_is_retrieved_by_id(): void
    {
        $repository = $this->app->make(SeriesRepository::class);
        $request = [
            'name' => 'Série Teste',
            'seasonsQty' => 2,
            'episodesForSeason' => 3,
        ];

        $series = $repository->add($request);

        $seriesById = $repository->find($series->id);

        $this->assertEquals('Série Teste', $seriesById['name']);
    }

    public function test_when_a_non_existent_series_is_retrieved_by_id(): void
    {
        $repository = $this->app->make(SeriesRepository::class);

        $this->expectException(\Illuminate\Database\Eloquent\ModelNotFoundException::class);

        $repository->find(999);
    }

    
}