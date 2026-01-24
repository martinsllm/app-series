<?php

namespace App\Repositories;

use App\Models\Series;
use App\Models\Season;
use App\Models\Episode;
use Illuminate\Support\Facades\DB;

class SeriesRepository
{

    public function all() : array
    {  
        return Series::all()->toArray();
    }

    public function find(int $id) : ?Series
    {
        return Series::findOrFail($id);
    }

    public function add(array $data) : Series
    {
        return DB::transaction(function () use ($data) {
            $series = Series::create($data);

            $seasons = [];
            for($i = 1; $i <= $data['seasonsQty']; $i++) {
                $seasons[] = [
                    'series_id' => $series->id,
                    'number' => $i
                ];
            }

            Season::insert($seasons);

            $episodes = [];
            foreach ($series->seasons as $season) {
                for ($i = 1; $i <= $data['episodesForSeason']; $i++) {
                    $episodes[] = [
                        'season_id' => $season->id,
                        'number' => $i
                    ];
                }
            }

            Episode::insert($episodes);

            return $series;
        }, 5);
    }

    public function update(Series $series, array $data) : void
    {
        $series->update($data);
    }
    

}