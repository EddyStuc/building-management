<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Building extends Model
{
    use HasFactory;

    /**
     * Relationship to the reports for the building
     *
     * @return void
     */
    public function reports()
    {
        return $this->hasMany(Report::class)->latest();
    }

    /**
     * Relationship to the users in the building
     *
     * @return void
     */
    public function users()
    {
        return $this->hasMany(User::class, 'user_id');
    }

    /**
     * Relationship to the posts for the building
     *
     * @return void
     */
    public function posts()
    {
        return $this->hasMany(NoticeboardPost::class)->latest();
    }
}
