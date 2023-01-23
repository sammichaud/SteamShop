<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class PromotionController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(Game $game)
    {
        return view('games/promotions/create', compact('game'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @param  Game  $game
     *
     * @return RedirectResponse
     */
    public function store(Request $request, Game $game)
    {
        $game->promotions()->create($request->all());

        return redirect()->route('games.show', $game);
    }
}
