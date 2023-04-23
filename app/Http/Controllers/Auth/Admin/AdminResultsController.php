<?php

namespace App\Http\Controllers\Auth\Admin;

use App\Models\Result;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Game;
use App\Models\Outcome;
use App\Models\Team;
use App\Http\Requests\StoreResultRequest;
class AdminResultsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // results list to be created
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($gameId)

    {
           
        return view('auth.admin.results.create')
        ->with('games',  Game::find($gameId)->teams)
        ->with('outcomes',Outcome::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreResultRequest $request)
    {
        if(empty($request->team_id) && empty($request->outcome_id)){
            return false;
        }
      
  
                $result = Result::create([
                    'game_id'=>$request->game_id, 
                    'team_id'=>$request->team_id, 
                ]);


                $result->outcomes()->attach($request->outcome_id);

                return redirect(Route('home'))->with('success','Result added successfully');
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
