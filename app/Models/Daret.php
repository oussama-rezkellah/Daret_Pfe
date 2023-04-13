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

    protected $fillable = [
        'name',
        'montant',
        'type_ordre',
        'type_periode',
        'nbr_tour',
        'etat',
        'nbr_membre',
        'date_start',
        'date_final'
    ];
}
