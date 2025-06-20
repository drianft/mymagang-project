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
        return $this->hasMany(Application::class, 'applier_id');
    }

    public function bookmarkedPosts()
    {
        return $this->belongsToMany(Post::class, 'bookmarks','applier_id','post_id')
            ->withPivot('saved_at');
    }
}
