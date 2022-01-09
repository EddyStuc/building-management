<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $with = ['building'];

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Relationship to the building a user is in
     *
     * @return void
     */
    public function building()
    {
        return $this->belongsTo(Building::class);
    }

    /**
     * Relationship to the reports a user has made
     *
     * @return void
     */
    public function reports()
    {
        return $this->hasMany(Report::class)->latest();
    }

     /**
     * Relationship to the posts a user has made
     *
     * @return void
     */
    public function posts()
    {
        return $this->hasMany(NoticeboardPost::class)->latest();
    }

    /**
     * Relationship to comments a user has made
     *
     * @return void
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
