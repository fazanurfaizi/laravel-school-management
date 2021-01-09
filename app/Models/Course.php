<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use DB;
use App\Traits\Fileable;

class Course extends Model
{
    use HasFactory;
    use SoftDeletes;
    use Fileable;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'price',
        'thumbnail',
        'start_date',
        'status',
        'features',
        'certified',
        'created_by',
        'updated_by'
    ];

    protected $with = [
        'thumbnail'
    ];

    protected $appends = [
        'permalink'
    ];

    protected $casts = [
        'features' => 'array'
    ];

    public function getRatingAttribute() {
        return number_format(DB::table('course_student')->where('course_id', $this->attributes['id'])->average('rating'), 2);
    }

    public function getPermalinkAttribute() {
        return route('course.show', ['course' => $this->slug]);
    }

    public function setPriceAttribute($input) {
        $this->attributes['price'] = $input ?? null;
    }

    public function scopeOfTeacher($query) {
        return $query->whereHas('teachers', function($q) {
            $q->where('user_id', Auth::user()->id);
        });
    }

    public function teachers() {
        return $this->belongsToMany(User::class, 'course_teachers');
    }

    public function students() {
        return $this->belongsToMany(User::class, 'cource_students')->withTimestamps()->withPivot(['rating', 'progress']);
    }

    public function sessions() {
        return $this->hasMany(Session::class);
    }

    public function lessons() {
        return $this->belongsToMany(Lesson::class, 'sessionables', 'course_id', 'sessionable_id')
            ->wherePivot('sessionable_type', Lesson::class);
    }

    public function publishedLessons() {
        return $this->hasMany(Lessson::class)->orderBy('position')->where('status', 1);
    }

    public function exams() {
        return $this->belongsToMany(Exam::class, 'sessionables', 'course_id', 'sessionable_id')
            ->wherePivot('sessionable_type', Exam::class);
    }

    public function topics() {
        return $this->morphToMany(Topic::class, 'topicable');
    }

    public function subjects() {
        return $this->morphToMany(Subject::class, 'subjectables');
    }

    public function thumbnail() {
        return $this->belongsTo(File::class, 'thumbnail');
    }
}
