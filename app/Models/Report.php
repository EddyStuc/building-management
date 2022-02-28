<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\SearchFilter;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;

class Report extends Model
{
    use HasFactory, SearchFilter;

    protected $with = ['author'];

    /**
     * Determines if user is admin which displays all reports otherwise just displays reports from users building
     *
     * @return void
     */
    public function showAllIfAdmin()
    {
        return Gate::allows('admin') ? Report::latest()->filter(request(['search']))->paginate(10)
            : Auth::user()->building->reports()->filter(request(['search']))->paginate(10);
    }

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
