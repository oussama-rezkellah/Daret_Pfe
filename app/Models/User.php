<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Membre;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'last_name',
        'first_name',
        'username',
        'email',
        'password',
        'code',
        'code_reset',
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
     * Check if the user is an admin for the given daret
     *
     * @param integer $daretId
     * @return boolean
     */
    public function isDaretAdmin($daretId)
    {
        $member = Membre::where('daret_id', $daretId)
                        ->where('user_id', $this->id)
                        ->where('role', 'admin')
                        ->first();

        return $member ? true : false;
    }

    /**
     * Check if the user is a member of the given daret
     *
     * @param integer $daretId
     * @return boolean
     */
    public function isMemberOfDaret($daretId)
    {
        $member = Membre::where('daret_id', $daretId)
                        ->where('user_id', $this->id)
                        ->first();

        return $member ? true : false;
    }

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    function invitations()
    {
        return $this->hasMany(Invitation::class);
    }
    function demandes()
    {
        return $this->hasMany(Demande::class);
    }
    function membres()
    {
        return $this->hasMany(Membre::class);
    }

    function notifications()
    {
        return $this->hasMany(Notification::class);
    }

}
