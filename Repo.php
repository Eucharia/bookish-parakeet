<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Repo;

class Repo extends Model
{
    // for mass assignment

    protected $fillable = ['message', 'user_id', 'completed'];

    protected $table = 'repos';

    public function dumpInfo(){
    	dd($this->message, $this->completed);
    }

    public function messages(){
    	return $this->hasMany('App\Message');
    }
}
