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

    public static function displayAllIfAdmin()
    {
        if (! Gate::allows('admin')) {
            $reports = Auth::user()->building->reports()->paginate(10);
        }
        else {
            $reports = Report::latest()->paginate(10);
        }

        return $reports;
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function building()
    {
        return $this->belongsTo(Building::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

}
