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
        return $this->hasMany(Demande::class);
    }
    public function membre()
    {
        return $this->hasMany(Membre::class);
    }
    public function notifications()
    {
        return $this->hasMany(Membre::class);
    }

    protected $fillable = [
        'name',
        'montant',
        'type_ordre',
        'type_periode',
        'nbr_tour',
        'etat',
        'nbr_membre',
        'date_start',
        'date_final',
        'periode_ac',
        'curent_tour'
    ];
    function getRouteKeyName()
    {
        return 'id'; //by dauflt id or email... 
    }
}
