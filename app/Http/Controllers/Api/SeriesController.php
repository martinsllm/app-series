<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SeriesRequest;
use App\Repositories\SeriesRepository;
use App\Services\ImageService;

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

        $cover = $request->file('cover');
        if ($cover) {
            $series->cover = ImageService::upload($cover);
            $series->save();
        }

        return response()->json($series, 201);
    }

    public function update(SeriesRequest $request, $id)
    {
        $series = $this->seriesRepository->find($id);
        if (!$series) {
            return response()->json(['message' => 'Série não encontrada'], 404);
        }

        $data = $request->all();
        $cover = $request->file('cover');
        if ($cover) {
            $data['cover'] = ImageService::upload($cover);
        }

        $this->seriesRepository->update($series, $data);
        return response()->json(['message' => 'Série atualizada com sucesso']);
    }

    public function destroy($id)
    {
        $series = $this->seriesRepository->find($id);

        if ($series) {
            if($series->cover){
                ImageService::delete($series->cover);
            }
            $series->delete();
            return response()->json(['message' => 'Série deletada com sucesso']);
        }

        return response()->json(['message' => 'Série não encontrada'], 404); 
    }
}
