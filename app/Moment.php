<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Moment extends Model
{
    protected $guarded = ['id'];

    protected $casts = [
        'share_with' => 'array',
        'share_at' => 'date'
	];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function feel() {
        return $this->belongsTo(Feel::class);
    }

    public function status() {
    	return $this->belongsTo(Status::class);
    }

    public function statuses() {
    	return $this->belongsToMany(Status::class)->withPivot('updated_at');
    }

    public function update_status($status) {
        $status = Status::where([
            'body' => $status,
        ])->get()->first();
        $this->status_id = $status->id;
        $this->save();
        $this->statuses()->attach($status);
    }

    public function payment() {
		return $this->hasOne(Payment::class);
    }

    public function images() {
		return $this->morphMany(Image::class, 'imageable');
    }

    public function schedule() {
        $this->update_status('SCHEDULED');
        $this->is_scheduled = true;
        $this->save();
    }
}
