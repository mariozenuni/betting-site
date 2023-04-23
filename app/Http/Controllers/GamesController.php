<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Outcome;
use App\Models\Team;
use Illuminate\Http\Request;

class GamesController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('users.bettables')->with('games',Game::all());
    }
    public function create($gameId)
    {   
       

        return view('users.bettable-create')->with('games',Game::find($gameId)->teams)->with('outcomes',Outcome::all());
    }
}
