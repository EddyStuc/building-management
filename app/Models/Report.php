<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class Report extends Model
{
    use HasFactory;

    protected $with = ['author'];

    /**
     * Verifies if current user is admin or not to view all data
     *
     * @return void
     */
    public static function displayAllIfAdmin()
    {
        return Gate::allows('admin') ? Report::latest()->paginate(10) : Auth::user()->building->reports()->paginate(10);
    }

     /**
     * Relationship to the author that created
     *
     * @return void
     */
    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Relationship to building it belongs to
     *
     * @return void
     */
    public function building()
    {
        return $this->belongsTo(Building::class);
    }

    /**
     * Relationship to comments about report
     *
     * @return void
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

}
