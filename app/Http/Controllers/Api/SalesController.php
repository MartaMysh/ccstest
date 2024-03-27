<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\BoardGames;
use App\Models\Sales;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class SalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(): View|Factory|Application
    {
        $games = BoardGames::allIdsWithNames();
        $sales = Sales::paginate(15);;
        return view('sales.index', ['games' => $games, 'sales' => $sales]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $validator = Validator::make($request->all(), [
            'board_game_id' => 'required|max:30',
            'price' => 'required|max:30',
            'market' => 'required|max:30',
            'customer' => 'required|max:30',
        ]);

        if ($validator->fails()) {
            return redirect()->route('sales.index')
                ->with('errors', $validator->errors()->messages());
        }

        Sales::create($request->all());

        return redirect()->route('sales.index')
            ->with('success','New game sale created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        $sale = Sales::find($id);
        $sale->delete();

        return redirect()->route('sales.index')
            ->with('success','Sale deleted successfully');
    }
}
