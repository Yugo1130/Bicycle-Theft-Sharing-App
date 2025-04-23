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

    public function abandonedbicycles()
    {
        return $this->hasMany(AbandonedBicycle::class);
    }

    public function abandonedcomments()
    {
        return $this->hasMany(AbandonedComment::class);
    }

    public function stolenbicycles()
    {
        return $this->hasMany(StolenBicycle::class);
    }

    public function stolencomments()
    {
        return $this->hasMany(StolenComment::class);
    }

    public function searchs()
    {
        return $this->hasMany(Search::class);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
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
        'password' => 'hashed',
    ];
}
