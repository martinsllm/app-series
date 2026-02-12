<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Series;
use App\Repositories\SeriesRepository;

class SeasonsController extends Controller
{
    public function __construct(private SeriesRepository $seriesRepository)
    {
        $this->seriesRepository = $seriesRepository;
    }

    public function index(int $series)
    {
        $series = $this->seriesRepository->find($series);
        if (!$series) {
            return response()->json(['message' => 'Série não encontrada'], 404);
        }
        
        $seasons = $series->seasons;
        return response()->json($seasons);
    }
}
