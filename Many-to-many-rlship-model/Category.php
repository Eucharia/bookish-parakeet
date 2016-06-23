<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	protected $fillable = ['name'];
	// the relationship between the accessories and categories table

    public function accessories(){
    	return $this->belongsToMany('App\Accessory', 'accessory_category');
    }
}
