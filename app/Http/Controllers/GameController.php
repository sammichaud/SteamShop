<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     **/
    public function create()
    {
        return view('games/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     *
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        Game::create($request->all());

        return redirect()->route('games.create');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Game $game
     *
     * @return Response
     */
    public function show(Game $game)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Game $game
     *
     * @return Response
     */
    public function edit(Game $game)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param \App\Models\Game $game
     *
     * @return Response
     */
    public function update(Request $request, Game $game)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Game $game
     *
     * @return Response
     */
    public function destroy(Game $game)
    {
        //
    }
}
