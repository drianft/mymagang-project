<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Interview extends Model
{
    use HasFactory;

    protected $fillable = [
        'hr_id',
        'application_id',
        'interview_time',
        'location',
    ];


    public function application()
    {
        return $this->belongsTo(Application::class);
    }

    public function hr()
    {
        return $this->belongsTo(Hr::class);
    }
}
