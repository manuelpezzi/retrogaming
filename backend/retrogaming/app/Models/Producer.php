<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producer extends Model
{
   protected $fillable = ['name','country'];
   public function videogames(){
    return $this->hasMany(Videogame::class);
   }
}
