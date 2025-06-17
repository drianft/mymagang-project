<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Applier extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'user_id',
        'religion',
        'education',
        'cv_url',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }


    public function applications()
    {
        return $this->hasMany(Application::class);
    }

    public function bookmarkedPosts()
    {
        return $this->belongsToMany(Post::class, 'bookmarks')
            ->withPivot('saved_at');
    }
}
