<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;



    public function users()
    {
        return $this->belongsToMany(User::class)->as('scores')->using(Score::class);
    }

    public function questions()
    {
        return $this->hasMany(Question::class, 'quiz_id', 'id');
    }

    public $timestamps = false;

    protected $fillable = [
        'label',
        'published',
    ];
}
