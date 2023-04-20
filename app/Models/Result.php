<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    use HasFactory;
    
    protected $fillable=['outcome_1','outcome_2','game_id'];

    public function teams()
    {
        return $this->belongsToMany(Team::class);
    }
    public function result()
    {
        return $this->belongsTo(Game::class);
    }
}
