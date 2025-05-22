<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'job_description',
        'working-hours',
        'salary',
        'status',
        'job_category',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
