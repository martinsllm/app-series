<?php

namespace App\Http\Controllers;

use App\Models\Season;
use Illuminate\Http\Request;

class EpisodesController extends Controller
{
    public function index(Request $request, Season $season)
    {
        $message = $request->session()->get('message');
        return view('episodes.index', ['episodes' => $season->episodes, 'series' => $season->series])
            ->with('message', $message);
    }

    public function update(Request $request, Season $season)
    {
        $watchedEpisodes = $request->episodes;

        $season->episodes->each(function ($episode) use ($watchedEpisodes) {
            $episode->watched = in_array($episode->id, $watchedEpisodes);
            $episode->save();
        });

        return redirect()->route('seasons.index', $season->series->id)
            ->withMessage('Episodios assistidos com sucesso!');
    }
}
