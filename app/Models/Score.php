<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Score extends Pivot
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'quiz_id',
        'score'
    ];
    public $timestamps = false;
}
