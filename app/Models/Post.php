<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'job_title',
        'hr_id',
        'company_id',
        'job_description',
        'working_hour',
        'salary',
        'status',
        'job_category',
        'image_post_url'
    ];

    public function hr()
    {
        return $this->belongsTo(Hr::class, 'hr_id');
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function bookmarkedBy()
    {
        return $this->belongsToMany(Applier::class, 'bookmarks')
                    ->using(Bookmark::class)
                    ->withTimestamps()
                    ->withPivot('saved_at');
    }

    public function applications()
    {
        return $this->hasMany(Application::class, 'post_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }


}
