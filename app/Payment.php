<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $guarded = ['id'];

	protected $casts = [
        'notes' => 'array'
	];

	public function belongsTo() {
        return $this->belongsTo(Moment::class);
    }
}
