<?php

namespace App;

use Validator;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $table = 'authors';
    protected $fillable = ['name', 'bio'];

    public static $rules = [
    	'name' => 'required|min:3',
    	'bio'  => 'required|min:10'
    ];

    public static function validate($data){
    	return Validator::make($data, static::$rules);
    }

    public static function createInstance($input){
    // this will return a new instance of the Contractor with the form input fields as you just passed it as an array.
    // this will ignore any extra key,value pairs which do not belong to the model for example csrftoken key will be
    return new static($input);
}

}