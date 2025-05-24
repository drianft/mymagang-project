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

    }

    public function setUpdatedAt($value)
    {

    }
}
