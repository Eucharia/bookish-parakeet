<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    //Get the slot record associated with the customer
    public $timestamps = false;
    
    public function slot()
    {
        return $this->hasOne('App\Slot', 'App\Booking');
    }
}
