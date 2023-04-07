<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Daret extends Model
{
    use HasFactory;
    function invitation()
    {
        return $this->hasMany(Invitation::class);
    }
    function demande()
    {
        return $this->hasMany(demande::class);
    }
    function membre()
    {
        return $this->hasMany(membre::class);
    }
  
    
  //n9dro n7tjoha
  function users(){
    return $this->belongsToMany(User::class);
  }
}
