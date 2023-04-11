<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Membre extends Model
{
    use HasFactory;
    function user()
    {
        return $this->belongsTo(User::class);
    }
    function daret()
    {
        return $this->belongsTo(Daret::class);
    }

    function tours()
    {
        return $this->hasMany(Tour::class);
    }
    protected $fillable = [
        'daret_id',
        'user_id',
        'role',
    ];
    function getRouteKeyName()
    {
        return 'id';
    }
}
