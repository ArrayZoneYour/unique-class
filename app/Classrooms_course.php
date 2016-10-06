<?php

namespace UniqueClass;

use Illuminate\Database\Eloquent\Model;

class Classrooms_course extends Model
{
    public function course() {
    	return $this->belongsTo('UniqueClass\Course');
    }

    public function classroom() {
    	return $this->belongsTo('UniqueClass\Classroom');
    }
}
