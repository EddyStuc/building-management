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

    /**
     * Verifies if current user is admin or not to view all data
     *
     * @return void
     */
    public static function displayAllIfAdmin()
    {
        return Gate::allows('admin') ? NoticeboardPost::latest()->paginate(9) : Auth::user()->building->posts()->paginate(9);
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
