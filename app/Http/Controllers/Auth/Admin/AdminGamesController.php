<?php

namespace App\Http\Controllers\Auth\Admin;

use App\Models\Game;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Http\Requests\StoreGamesRequest;
use App\Models\Team;
use App\Models\Result;

class AdminGamesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    
         $games = Game::all();
       

        return view('auth.admin.games.index')->with('games',$games);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       
        return view('auth.admin.games.create')->with('teams', Team::all());
      
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGamesRequest $request)
    {
        
        $games = Game::create([
            'starting_date'=>$request->starting_date,
            'starting_time'=>$request->starting_time,
            'bettable'=>$request->bettable,
            'ended'=>$request->ended,
        ]);
        if(!((int) $request->team_id[0])||!((int) $request->team_id[1])){
            return redirect(route('games.create'))->with('error','Please select a Team');
        }

        $games->teams()->attach($request->team_id);
    
        return redirect(route('games.index'))->with('success','Game added successfully');


    }

    /**
     * Display the specified resource.
     */
    public function show(Game $game)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Game $game)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Game $game)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Game $game)
    {
        //
    }

   
}
