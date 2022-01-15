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

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, fn ($query, $search) =>
            $query->where(fn($query) =>
                $query->where('title', 'like', '%' . $search . '%')
                ->orWhere('subject', 'like', '%' . $search . '%')
                ->orWhere('body', 'like', '%' . $search . '%')
                ->orWhereHas('author', function($query) use ($search) {
                    return $query->where('name', 'LIKE', '%' . $search . '%');}
                    )
            )
        );
    }

    /**
     * Verifies if current user is admin or not to view all data
     *
     * @return void
     */
    public static function displayAllIfAdmin()
    {
        return Gate::allows('admin') ? Report::latest()->filter(request(['search']))->paginate(10)
                                    : Auth::user()->building->reports()->filter(request(['search']))->paginate(10);
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
