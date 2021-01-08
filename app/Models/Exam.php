<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'title',
        'description',
        'examiner',
        'status',
        'duration',
        'pass_mark',
        'meta',
        'number_of_questions',
        'random_questions',
        'certification',
        'difficulty'
    ];

    protected $casts = [
        'meta' => 'array'
    ];

    public function subjects() {
        return $this->morphToMany(Subject::class, 'subjectables');
    }

    public function courses() {
        return $this->belongsToMany(Course::class, 'sessionables', 'sessionable_id', 'course_id')
            ->wherePivot('sessionable_type', Exam::class);
    }

    public function questions() {
        return $this->hasMany(Question::class);
    }

    public function topics() {
        return $this->morphToMany(Topic::class, 'topicable');
    }

    public function results() {
        return $this->hasMany(Result::class, 'exam_id', 'id');
    }

    public function examiner() {
        return $this->belongsTo(User::class, 'examiner');
    }

    public function sessionable() {
        return $this->morphOne(Sessionable::class, 'sessionable');
    }

    public static function calculateTotalMark($marks) {
        $count = 0;
        foreach ($marks as $mark) {
            $count += $mark->mark;
        }

        return $count;
    }
}
