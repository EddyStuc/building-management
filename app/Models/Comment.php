<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $with = ['author'];

    /**
     * Relationship to the report it belongs to
     *
     * @return void
     */
    public function report()
    {
        return $this->belongsTo(Report::class);
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
}
