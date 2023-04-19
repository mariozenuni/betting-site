<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    protected $fillable=['starting_date','starting_time','bettable','ended'];

    public function teams()
    {
        return $this->belongsToMany(Team::class);
    }
    public function results()
    {
        return $this->hasMany(Result::class);
    }
    
}
