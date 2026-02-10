<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\SeriesRepository;

class ApiSeriesController extends Controller
{
    public function __construct(private SeriesRepository $seriesRepository)
    {
        $this->seriesRepository = $seriesRepository;
    }

    public function index()
    {
        return $this->seriesRepository->all();
    }

    public function show($id)
    {
        $series = $this->seriesRepository->find($id);
        if (!$series) {
            return response()->json(['message' => 'Série não encontrada'], 404);
        }
        return $series;
    }
}
