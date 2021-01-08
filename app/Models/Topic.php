<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description'
    ];

    public function courses() {
        return $this->morphedByMany(Course::class, 'topicable');
    }

    public function exams() {
        return $this->morphedByMany(Exam::class, 'topicable');
    }
}
