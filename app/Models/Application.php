<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    protected $fillable = [
        'applier_id',
        'post_id',
        'application_status',
    ];

    public function applier()
    {
        return $this->belongsTo(User::class, 'applier_id');
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