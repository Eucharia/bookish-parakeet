<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
	// Get the time slots associated with the each staff.

	public $timestamps = false;

	protected $table = 'staffs';
	
    public function slots(){
    	return $this->hasMany('App\Slot', 'App\Booking');
    }
}
