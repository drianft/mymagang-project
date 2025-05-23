<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class Bookmark extends Pivot
{
    public $timestamps = false;

    protected $table = 'bookmarks';

    protected $fillable = [
        'applier_id',
        'post_id',
        'saved_at',
    ];

    public function setCreatedAt($value)
    {
        // override supaya gak set created_at
    }

    public function setUpdatedAt($value)
    {
        // override supaya gak set updated_at
    }
}
