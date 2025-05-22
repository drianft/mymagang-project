<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Interview extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'location',
    ];
    public function application()
    {
        return $this->belongsTo(application::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
