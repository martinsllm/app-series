<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Episode;
use App\Repositories\SeriesRepository;
use Illuminate\Http\Request;

class EpisodesController extends Controller
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
        
        return response()->json($series->episodes);
    }

    public function watched(Episode $episode, Request $request)
    {
        $episode->watched = $request->watched;
        $episode->save();
        return response()->json($episode);
    }
}
