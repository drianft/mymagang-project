<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'job_title',
        'job_description',
        'working-hours',
        'salary',
        'status',
        'job_category',
        'image_post_url'
    ];

    public function hr()
    {
        return $this->belongsTo(Hr::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function applications()
    {
        return $this->hasMany(Application::class);
    }

    public function bookmarkedBy()
    {
        return $this->belongsToMany(Applier::class, 'bookmarks')
                    ->using(Bookmark::class)
                    ->withTimestamps()
                    ->withPivot('saved_at');
    }


}
