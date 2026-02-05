<?php

namespace App\Http\Controllers;

use App\Http\Middleware\Authenticator;
use App\Events\SeriesCreated as SeriesCreatedEvent;
use App\Repositories\SeriesRepository;
use App\Services\ImageUploadService;
use Illuminate\Http\Request;
use App\Http\Requests\SeriesFormRequest;


class SeriesController extends Controller
{
    public function __construct(private SeriesRepository $seriesRepository)
    {
        $this->seriesRepository = $seriesRepository;
        $this->middleware(Authenticator::class)->except(['index']);
    }

    public function index(Request $request)
    {
        $series = $this->seriesRepository->all();

        $message = $request->session()->get('message');

        return view('series.index', compact('series'))
            ->with('message', $message);
    }

    public function create()
    {
        return view('series.create');
    }

    public function store(SeriesFormRequest $request)
    {
        $data = $request->all();
        $cover = $request->file('cover');
        $data['cover'] = ImageUploadService::upload($cover);

        $series = $this->seriesRepository->add($data);
        
        SeriesCreatedEvent::dispatch(
            $series->name,
            $series->id,
            $request->seasonsQty,
            $request->episodesForSeason
        );

        return redirect()->route('series.index')
            ->withMessage("Série '{$series->name}' criada com sucesso!");
    }

    public function destroy(Request $request)
    {
        $serie = $this->seriesRepository->find($request->series);
        if ($serie) {
            $serie->delete();
        }

        return redirect()->route('series.index')
            ->withMessage("Série '{$serie->name}' removida com sucesso!");
    }

    public function edit(Request $request, $id)
    {
        $serie = $this->seriesRepository->find($id);
        return view('series.edit', compact('serie'));
    }

    public function update(SeriesFormRequest $request, $id)
    {
        $serie = $this->seriesRepository->find($id);

        $data = $request->all();
        $cover = $request->file('cover');
        $data['cover'] = ImageUploadService::upload($cover);

        $this->seriesRepository->update($serie, $data);

        return redirect()->route('series.index')
            ->withMessage("Série '{$serie->name}' atualizada com sucesso!");
    }
}
