<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    public function applier()
    {
        return $this->belongsTo(Applier::class);
    }

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function interview()
    {
        return $this->hasOne(Interview::class);
    }
}
