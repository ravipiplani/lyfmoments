<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Moment extends Model
{
    public function createdBy () {
        return $this->belongsTo(User::class, 'id', 'created_by');
    }

    public function sharedWith () {
        return $this->belongsTo(User::class, 'id', 'share_with');
    }

    public function status() {
    	return $this->belongsTo(Status::class);
    }

    public function statuses() {
    	return $this->belongsToMany(Status::class)->withPivot('updated_at');
    }

    public function update_status($status) {
        $status = Status::where([
            'name' => $status,
        ])->get()->first();
        $this->status_id = $status->id;
        $this->save();
        $this->statuses()->attach($status);
    }

    public function payment() {
		return $this->belongsTo(Payment::class);
    }

    public function images() {
		return $this->morphMany(Image::class, 'imageable');
    }
}
