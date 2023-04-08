<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Daret extends Model
{
    use HasFactory;


    function invitations()
    {
        return $this->hasMany(Invitation::class);
    }
    function demandes()
    {
        return $this->hasMany(demande::class);
    }
    function membres()
    {
        return $this->hasMany(membre::class);
    }
}
