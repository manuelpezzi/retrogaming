<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    protected $fillable =['name','color'];

    public function videogames(){
        return $this->belongsToMany(Videogame::class,'genres_videogames', 'videogame_id', 'genre_id');
    }
}
