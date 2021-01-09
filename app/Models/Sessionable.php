<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sessionable extends Model
{
    use HasFactory;

    public function sessionable() {
        return $this->morphTo();
    }

    public function session() {
        return $this->belongsTo(Session::class, 'session_id');
    }
}
