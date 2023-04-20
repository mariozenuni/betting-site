<?php

namespace App\Http\Controllers\Auth\Admin;

use App\Models\Result;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Game;
use App\Models\Outcome;
use App\Models\Team;

class ResultsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()

    {
        $user=collect(Auth::user()->roles)->first();

        if($user->name!=="admin") {

           return; 
        }

 

        return view('auth.admin.results.create')
        ->with('games',  Game::all())
        ->with('outcomes',Outcome::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
     
                $result = Result::create([
                    'team_1'=>$request->team1,
                    'team_2'=>$request->team2,
                    'game_id'=>$request->game_id,

                 
                    
                ]);

                $result->outcomes()->attach($request->outcome);

                return view('auth.admin.games.index')->with('games',Game::all());
    }

    /**
     * Display the specified resource.
     */
    public function show(Result $result)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Result $result)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Result $result)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Result $result)
    {
        //
    }
}
