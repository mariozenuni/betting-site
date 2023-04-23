<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Game;
use Illuminate\Support\Facades\Log;
class UpdateBettableGameTable extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tableBettableGame:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Updating bettable games attribute table after 30 min';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        Log::info("Cron starts update!");

          Game::query()
        ->where('bettable', '=', 1)
        ->each(function( Game $game){
            $game->bettable = 0;
            $game->save();
        });
    
    }
}
