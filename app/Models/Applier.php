<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Applier extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'religion',
        'education',
        'cv_url',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function applications()
    {
        return $this->hasMany(Application::class);
    }

    public function bookmarks()
    {
        return $this->belongsToMany(Post::class, 'bookmarks', 'applier_id', 'post_id')
                    ->using(Bookmark::class)
                    ->withPivot('saved_at');
    }
}
