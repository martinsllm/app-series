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

        $request->session()->flash('message', "Série '{$serie['name']}' criada com sucesso!");

        return redirect()->route('series.index');
    }

    public function destroy(Request $request)
    {
        $serie = Series::find($request->series);
        if ($serie) {
            $serie->delete();
        }

        $request->session()->flash('message', "Série '{$serie->name}' removida com sucesso!");

        return redirect()->route('series.index');
    }
}
