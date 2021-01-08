<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'qtype',
        'question',
        'options',
        'answers',
        'hint',
        'mark',
        'nmark',
        'explanation'
    ];

    protected $casts = [
        'answers' => 'array',
        'options' => 'array'
    ];

    public static $qtypes = [
        'Objective' => 0,
        'TrueFalse' => 1
    ];

    public function getQtypeAttribute($value) {
        $key = array_search($value, self::$qtypes);

        if($key) {
            return ucfirst($key);
        }
    }

    public function setTypeAttribute($value) {
        $value = strtolower($value);
        $key = array_search($value, self::$qtypes);

        if($key) {
            $this->attributes['qtype'] = $value;
        } else {
            $this->attributes['qtype'] = self::$qtypes[$value];
        }
    }

    public function topics() {
        return $this->morphToMany(Topic::class, 'topicable');
    }

    public function exam() {
        return $this->belongsTo(Exam::class);
    }

    public function setAnswerAttribute($value) {
        $this->attributes['answers'] = json_encode($value);
    }
}
