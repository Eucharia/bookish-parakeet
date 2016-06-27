<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slot extends Model
{
    /**
     * Get the staff that owns the slot.
     */

    public $timestamps = false;
    
    public function staffs()
    {
        return $this->belongsTo('App\Staff', 'App\Booking');
    }
}
