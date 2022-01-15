<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class NoticeboardPost extends Model
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
        return Gate::allows('admin') ? NoticeboardPost::latest()->filter(request(['search']))->paginate(9)
                                    : Auth::user()->building->posts()->filter(request(['search']))->paginate(9);
    }

    /**
     * Relationship to the author who created post
     *
     * @return void
     */
    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Relationship to the building the post belongs to
     *
     * @return void
     */
    public function building()
    {
        return $this->belongsTo(Building::class);
    }

}
