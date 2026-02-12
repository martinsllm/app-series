<?php

namespace App\Repositories;

use App\Models\Series;
use App\Models\Season;
use App\Models\Episode;
use Illuminate\Support\Facades\DB;

class EloquentSeriesRepository implements SeriesRepository
{

    public function all($request)
    {  
        $query = Series::query();
        if ($request->has('name')) {
            $query->where('name', 'like', "%{$request->name}%");
        }
        return $query->paginate(3);
    }

    public function find($id) : ?Series
    {
        return Series::find($id);
    }

    public function add(array $data) : Series
    {
        try {
            $series = Series::create($data);
            $this->addSeasons($series, $data['seasonsQty'], $data['episodesForSeason']);
            return $series;
        } catch (\Exception $e) {
            throw $e;
        }
    }

    public function update(Series $series, array $data) : void
    {
        try {
            $series->update($data);
            DB::table('episodes')->whereIn('season_id', function ($query) use ($series) {
                $query->select('id')
                      ->from('seasons')
                      ->where('series_id', $series->id);
            })->delete();
            DB::table('seasons')->where('series_id', $series->id)->delete();
            
            $this->addSeasons($series, $data['seasonsQty'], $data['episodesForSeason']);
        } catch (\Exception $e) {
            throw $e;
        }
    }

    private function addSeasons(Series $series, int $seasonsQty, int $episodesForSeason) : void
    {
        try {
            DB::beginTransaction();

            $seasons = [];
            for($i = 1; $i <= $seasonsQty; $i++) {
                $seasons[] = [
                    'series_id' => $series->id,
                    'number' => $i
                ];
            }

            Season::insert($seasons);

            $episodes = [];
            $seasonModels = Season::where('series_id', $series->id)->get();
            foreach ($seasonModels as $season) {
                for ($i = 1; $i <= $episodesForSeason; $i++) {
                    $episodes[] = [
                        'season_id' => $season->id,
                        'number' => $i
                    ];
                }
            }

            Episode::insert($episodes);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }
    

}