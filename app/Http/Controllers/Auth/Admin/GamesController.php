<?php

namespace App\Http\Controllers\Auth\Admin;

use App\Models\Game;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class GamesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user=collect(Auth::user()->roles)->first();

        if($user->name!=="admin"){
         
            return;
        }

        $games = DB::table('games')->select('id','team1','team2','bettable','ended')->get();
     
      
        return view('auth.admin.games.index')->with('games',$games);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('auth.admin.games.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $user=collect(Auth::user()->roles)->first();

        if($user->name!=="admin"){
         
            return;
        }

        $games =Game::create([
            'team1'=>$request->team1,
            'team2'=>$request->team1,
            'bettable'=>$request->bettable,
            'ended'=>$request->ended,
        ]);

        $games->save();
        
        return redirect(route('games.index'))->with('sucesss','Game added successfully');


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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Game $game)
    {
        //
    }
}
