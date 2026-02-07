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
}