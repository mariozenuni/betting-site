<?php

namespace App\Http\Controllers\Auth\Admin;

use App\Models\Game;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Http\Requests\StoreGamesRequest;
use App\Models\Team;
class GamesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user=collect(Auth::user()->roles)->first();

         if($user->name!=="admin") {

            return; 
         }

         $games = Game::all();

      

         foreach( $games  as $game){
            
            if($game->starting_time){
                
                $start = Carbon::parse($game->starting_time);
                
                $ended = Carbon::parse($game->starting_time);

                $startingDate = Carbon::parse($game->starting_date)->toDateString();

               $beattable = $start->addMinutes(30);
          

               $endedGame = $ended->addHours(2);
              
               
                $current_time  = Carbon::now()->timezone('Europe/Rome');
                // 

                if($startingDate < Carbon::now()->toDateString()){
                    $game->bettable = 0;
                    $game->ended = 1;
                }
                
              if($current_time->toTimeString() > $beattable->toTimeString()){
        
                    $game->bettable = 0;
                         
              }

              if($current_time->toTimeString() > $endedGame->toTimeString()){
                    $game->ended = 1;
                 
              }

            }
         }

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
    public function store(Request $request)
    {
        

        $user=collect(Auth::user()->roles)->first();

        if($user->name!=="admin"){
         
            return;
        }
    
        $games = Game::create([
            'starting_date'=>$request->starting_date,
            'starting_time'=>$request->starting_time,
            'bettable'=>$request->bettable,
            'ended'=>$request->ended,
        ]);
            
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
