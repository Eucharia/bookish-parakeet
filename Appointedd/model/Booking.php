<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Validator;

class Booking extends Model
{
    protected $table = 'bookings';
    public $timestamps = false;

    // making the attributes in the booking model mass assignable

    protected $fillable = ['start_time', 'end_time', 'service', 'customer_id', 'staff_id'];

// validate form names
    public static $rules = [
            'start' => 'required|unique:bookings,start_time',
            'end' => 'required|unique:bookings,end_time',
            'service' => 'required',
            'customer' => 'required|unique:bookings,customer_id',
            'staff' => 'required'
        ];
    //Validation Rules and Validator Function for booking a service
    public static function validator($input){

        return Validator::make($input, static::$rules);
    }

}
