<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    use HasFactory;

    protected $fillable = [
        'answers',
        'obtain'
    ];

    protected $casts = [
        'answers' => 'array'
    ];

    public function exam() {
        return $this->belongsTo(Exam::class, 'exam_id');
    }

    public function examiner() {
        return $this->belongsTo(User::class, 'examiner');
    }

    public static function calculateMark($answer) {
        $count = 0;
        if(!empty($answer)) {
            foreach ($answer as $key => $value) {
                $question = Question::where('id', $key)->first();
                if(!empty($question)) {
                    foreach ($question->answer as $questionKey => $questionVal) {
                        if($value == $questionVal) {
                            $count += $question->mark;
                        }
                    }
                }
            }
        }

        return $count;
    }
}
