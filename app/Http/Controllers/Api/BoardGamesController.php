<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\BoardGames;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class BoardGamesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $games = BoardGames::paginate(15);
        return view('games.index', compact('games'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:30',
            'created_by' => 'required|max:30',
            'created_year' => 'required|max:30',
            'genre' => 'required|max:30',
            'language' => 'required|max:30',
        ]);

        if ($validator->fails()) {
            return redirect()->route('boardGames.index')
                ->with('errors', $validator->errors()->messages());
        }
        BoardGames::create($request->all());

        return redirect()->route('boardGames.index')
            ->with('success','New board game created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param int $boardGameId
     * @return Application|Factory|View
     */
    public function show(int $boardGameId): View|Factory|Application
    {
        $boardGame = BoardGames::find($boardGameId);
        return view('games.show', compact('boardGame'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param BoardGames $boardGames
     * @return Response
     */
    public function update(Request $request, BoardGames $boardGames)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $boardGameId
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(int $boardGameId)
    {
        $boardGame = BoardGames::find($boardGameId);
        $boardGame->delete();

        return redirect()->route('boardGames.index')
            ->with('success','Game deleted successfully');
    }

}
