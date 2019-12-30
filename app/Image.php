<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Image extends Model
{
    protected $guarded = ['id'];

	public function imageable() {
        return $this->morphTo();
    }

    public function getUrlAttribute($value) {
        if($value == null) {
            return null;
        }
        else {
            return Storage::disk('s3')->url($value);
        }
    }
}
