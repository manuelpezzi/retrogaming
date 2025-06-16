<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Videogame extends Model
{
   protected $fillable = ['titolo','anno','description','copertina','producer_id'];

   public function producer(){
    return $this->belongsTo(Producer::class);
   }
   public function genre(){
    return $this->belongsToMany(Genre::class,'genres_videogames');
   }
   
   public function getCopertinaUrlAttribute() {
        return $this->copertina ? asset('storage/' . $this->copertina) : null;
    }
}
