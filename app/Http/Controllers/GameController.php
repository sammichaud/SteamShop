<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        return view('games/index', ['games' => Game::all()]);
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
        $game = new Game($request->all());
        $game->owner_id = Auth::user()->id;
        $game->addImage($request->image_path);
        $game->save();

        return redirect()->route('games.index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function promotion()
    {
        $games = Game::all()->where('release_date', '<', now())->sortByDesc('release_date')->take(5);
        return view('games/index', compact('games'));
    }

    /**
     * Display the specified resource.
     *
     * @param Game $game
     * @param Request $request
     */
    public function show(Game $game, Request $request)
    {
        if ($request->prefers(['text', 'image']) == 'image') {
            return redirect(Storage::disk('s3')->temporaryUrl($game->image_path, now()->addMinutes()));
        }
        return view('games/show', compact('game'));
    }

    /**
     * @param Game $game
     *
     * @return RedirectResponse
     */
    public function purchase(Game $game): RedirectResponse
    {
        if ($game->buyByUser(Auth::user())) {
            return redirect()->route('games.index');
        }
        return redirect()->back()->with(
            'error',
            'Achat impossible'
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Game $game
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
     * @param Game $game
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
     * @param Game $game
     *
     * @return Response
     */
    public function destroy(Game $game)
    {
        //
    }
}
