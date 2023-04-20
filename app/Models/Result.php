<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    use HasFactory;
    
    protected $fillable=['team_1','team_2','game_id'];

    public function outcomes()
    {
        return $this->belongsToMany(Outcome::class);
    }
    public function result()
    {
        return $this->belongsTo(Game::class);
    }
}
