<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Accessory extends Model
{
	 protected $fillable = ['name'];
	// the relationship between accessory and categories table

    public function categories(){
    	return $this->belongsToMany('App\Category', 'accessory_category');
    }
}
