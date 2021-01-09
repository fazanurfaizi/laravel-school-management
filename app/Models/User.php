<?php

namespace App\Models;

use App\Pivots\StudentCasting;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;
    use HasRoles;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'firstname',
        'lastname',
        'email',
        'password',
        'avatar'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $appends = [
        'fullname'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getFullnameAttribute() {
        return "$this->firstname $this->lastname";
    }

    public function getAvatarAttribute($value) {
        if(!is_array($value)) {
            $value = json_decode($value);
        }

        if(empty($value) && empty($value->avatar)) {
            $value = new \STDClass();
            $value->avatar = $this->getGravatar($this->email, 200);
        }

        return $value;
    }

    protected function getGravatar($email, $s = 40, $d = 'mp', $r = 'g', $img = false, $atts = array()) {
        $url = 'https://www.gravatar.com/avatar/';
        $url .= md5(strtolower(trim($email)));
        $url .= "?s=$s&d=$d&r=$r";
        if ($img) {
            $url = '<img src="' . $url . '"';
            foreach ($atts as $key => $val) {
                $url .= ' ' . $key . '="' . $val . '"';
            }
            $url .= ' />';
        }
        return $url;
    }

    public function results() {
        return $this->hasMany(Result::class, 'examiner');
    }

    public function instructCourses() {
        return $this->belongsToMany(Course::class, 'course_teachers');
    }

    public function enrolledCourses() {
        return $this->belongsToMany(Course::class, 'course_students')
            ->using(StudentCasting::class)
            ->withPivot(['rating', 'progress', 'created_at', 'updated_at']);
    }

    public function enrolledLessons() {
        return $this->belongsToMany(Lesson::class, 'lesson_student')
            ->using(StudentCasting::class)
            ->withPivot(['status', 'created_at', 'updated_at']);
    }
}
