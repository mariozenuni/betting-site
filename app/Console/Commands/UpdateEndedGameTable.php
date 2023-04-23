<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Game;
use Illuminate\Support\Facades\Log;
class UpdateEndedGameTable extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tableEndedGame:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Updating bettable ended attribute table after 2 hours';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        Log::info("Cron starts update!");

          Game::query()
        ->where('ended', '=', 0)
        ->each(function( Game $game){
            $game->ended = 1;
            $game->save();
        });
    
    }
}
