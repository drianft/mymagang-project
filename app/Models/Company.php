<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    public function hrs()
    {
        return $this->hasMany(Hr::class);
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
