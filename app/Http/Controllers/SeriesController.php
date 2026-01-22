<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Series;

class SeriesController extends Controller
{
    public function index(Request $request)
    {
        $series = Series::all();

        $message = $request->session()->get('message');

        return view('series.index', compact('series'))
            ->with('message', $message);
    }

    public function create()
    {
        return view('series.create');
    }

    public function store(Request $request)
    {
        $serie = $request->validate([
            'name' => 'required|string|max:128'
        ]);

        Series::create($serie);

        return redirect()->route('series.index')
            ->with('message', "Série '{$serie['name']}' criada com sucesso!");
    }

    public function destroy(Request $request)
    {
        $serie = Series::find($request->series);
        if ($serie) {
            $serie->delete();
        }

        return redirect()->route('series.index')
            ->with('message', "Série '{$serie->name}' removida com sucesso!");
    }

    public function edit(Request $request, $id)
    {
        $serie = Series::findOrFail($id);
        return view('series.edit', compact('serie'));
    }

    public function update(Request $request, $id)
    {
        $serie = Series::findOrFail($id);

        $data = $request->validate([
            'name' => 'required|string|max:128'
        ]);

        $serie->update($data);

        return redirect()->route('series.index')
            ->with('message', "Série '{$data['name']}' atualizada com sucesso!");
    }
}
