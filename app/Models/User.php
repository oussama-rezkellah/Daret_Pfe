<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'username',
        'email',
        'phone',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    ////////////////relation

    //n9dro n7tajoha
    function darets()
    {
        return $this->belongsToMany(Daret::class);
    }
    function invitation()
    {
        return $this->hasMany(Invitation::class);
    }
    function demande()
    {
        return $this->hasMany(Demande::class);
    }
    function membre()
    {
        return $this->hasMany(Membre::class);
    }

    function notification()
    {
        return $this->hasMany(Notification::class);
    }

    //ra khaliha hna hh
    // function membrehasOneThrough(){
    //     return $this->hasOneThrough(Membre::class);
    // }
}
