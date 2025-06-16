<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hr extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'company_id', 'position'];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function interviews()
    {
        return $this->hasMany(Interview::class);
    }
}
