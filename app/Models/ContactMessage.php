<?php

namespace App\Models;

use App\Events\ContactMessageCreated;
use App\Events\ContactMessageDeleted;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactMessage extends Model
{
    use HasFactory;

    protected $with = ['author'];

    protected $dispatchesEvents = [
        'created' => ContactMessageCreated::class,
        'deleted' => ContactMessageDeleted::class,
    ];

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
     * Relationship to building that message belongs to
     *
     * @return void
     */
    public function building()
    {
        return $this->belongsTo(Building::class);
    }
}
