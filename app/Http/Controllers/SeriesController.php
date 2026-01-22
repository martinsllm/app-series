<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Series;
use App\Http\Requests\SeriesFormRequest;

class SeriesController extends Controller
{
    public function index(Request $request)
    {
        $series = Series::all();

        $message = $request->session()->get('message');

        return view('series.index', compact('series'))
            ->withMessage($message);
    }

    public function create()
    {
        return view('series.create');
    }

    public function store(SeriesFormRequest $request)
    {
        Series::create($request->all());

        return redirect()->route('series.index')
            ->withMessage("Série '{$request->name}' criada com sucesso!");
    }

    public function destroy(Request $request)
    {
        $serie = Series::find($request->series);
        if ($serie) {
            $serie->delete();
        }

        return redirect()->route('series.index')
            ->withMessage("Série '{$serie->name}' removida com sucesso!");
    }

    public function edit(Request $request, $id)
    {
        $serie = Series::findOrFail($id);
        return view('series.edit', compact('serie'));
    }

    public function update(SeriesFormRequest $request, $id)
    {
        $serie = Series::findOrFail($id);

        $serie->update($request->all());

        return redirect()->route('series.index')
            ->withMessage("Série '{$serie->name}' atualizada com sucesso!");
    }
}
