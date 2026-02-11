<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SeriesRequest;
use App\Repositories\SeriesRepository;

class SeriesController extends Controller
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

    public function store(SeriesRequest $request)
    {
        $series = $this->seriesRepository->add($request->all());
        return response()->json($series, 201);
    }

    public function update(SeriesRequest $request, $id)
    {
        $series = $this->seriesRepository->find($id);
        if (!$series) {
            return response()->json(['message' => 'Série não encontrada'], 404);
        }

        $this->seriesRepository->update($series, $request->all());
        return response()->json(['message' => 'Série atualizada com sucesso']);
    }

    public function destroy($id)
    {
        $series = $this->seriesRepository->find($id);
        if (!$series) {
            return response()->json(['message' => 'Série não encontrada'], 404);
        }

        $series->delete($id);
        return response()->json(['message' => 'Série deletada com sucesso']);
    }
}
