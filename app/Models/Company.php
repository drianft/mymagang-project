<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = ['user_id', 'industry', 'company_description'];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];


    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function hrs()
    {
        return $this->hasMany(Hr::class);
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
