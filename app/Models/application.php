<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class application extends Model
{
    use HasFactory;

    protected $fillable = [
        'applicant',
        'job Post',
        'status',
        'date',
        'post',
    ];
}
