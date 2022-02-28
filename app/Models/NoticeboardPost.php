<?php

namespace App\Models;

use App\Traits\SearchFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;


class NoticeboardPost extends Model
{
    use HasFactory, SearchFilter;

    protected $with = ['author'];

    /**
     * Determines if the user is admin which displays all posts otherwise just displays posts from users building
     *
     * @return void
     */
    public function showAllIfAdmin()
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
