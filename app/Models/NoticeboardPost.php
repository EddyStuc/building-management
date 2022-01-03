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

    public static function displayAllIfAdmin()
    {
        if (! Gate::allows('admin')) {
            $noticeboardPosts = Auth::user()->building->posts()->paginate(9);
        }
        else {
            $noticeboardPosts = NoticeboardPost::latest()->paginate(9);
        }

        return $noticeboardPosts;
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function building()
    {
        return $this->belongsTo(Building::class);
    }

}
