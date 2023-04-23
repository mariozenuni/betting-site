<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    use HasFactory;
    
    protected $fillable=['team_id','game_id'];

    public function team()
    {
        return $this->belongsTo(Team::class);
    }
    public function game()
    {
        return $this->belongsTo(Game::class);
    }
    
    public function outcomes()
    {
        return $this->belongsToMany(Outcome::class);
    }
}
