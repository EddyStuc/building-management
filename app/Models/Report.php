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
     * Filter to allow searching on report views
     *
     * @param  mixed $query
     * @param  mixed $filters
     * @return void
     */
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
