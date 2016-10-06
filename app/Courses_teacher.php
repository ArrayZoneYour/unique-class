<?php

namespace UniqueClass;

use Illuminate\Database\Eloquent\Model;

class Courses_teacher extends Model
{
    public function course() {
    	return $this->belongsTo('UniqueClass\Course');
    }

    public function teacher() {
    	return $this->belongsTo('UniqueClass\Teacher');
    }
}
