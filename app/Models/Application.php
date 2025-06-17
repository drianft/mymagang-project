<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    protected $fillable = [
        'status',
        'applied_at',
    ];

    protected $casts = [
    'applied_at' => 'datetime',
    ];
    public function applier()
    {
        return $this->belongsTo(Applier::class, 'applier_id');
    }


    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function interview()
    {
        return $this->hasOne(Interview::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }


}
