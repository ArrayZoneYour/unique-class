<?php

namespace UniqueClass;

use Illuminate\Database\Eloquent\Model;

class Classes_course extends Model
{
    public function class() {
    	return $this->belongsTo('UniqueClass\Eclass');
    }

    public function course() {
    	return $this->belongsTo('UniqueClass\Course');
    }
}
