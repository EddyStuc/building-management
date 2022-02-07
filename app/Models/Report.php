<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\SearchFilter;

class Report extends Model
{
    use HasFactory, SearchFilter;

    protected $with = ['author'];

     /**
     * Relationship to the author that created
     *
     * @return belongsTo
     */
    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Relationship to building it belongs to
     *
     * @return belongsTo
     */
    public function building()
    {
        return $this->belongsTo(Building::class);
    }

    /**
     * Relationship to comments about report
     *
     * @return hasMany
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
