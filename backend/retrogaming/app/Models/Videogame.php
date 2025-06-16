<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Videogame extends Model
{
   protected $fillable = [
    'titolo',
   'anno',
   'description',
   'copertina',
   'producer_id'


];

   public function producer(){
    return $this->belongsTo(Producer::class,'producer_id');
   }
   public function genres(){
    return $this->belongsToMany(Genre::class,'genres_videogames','videogame_id','genre_id');
   }
   
   public function getCopertinaUrlAttribute() {
        return $this->copertina ? asset('storage/' . $this->copertina) : null;
    }
}
