<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    public function moments() {
    	return $this->belongsToMany(Moment::class)->withPivot('updated_at');
    }
}
