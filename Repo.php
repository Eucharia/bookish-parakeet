<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Repo;

class Repo extends Model
{
    // for mass assignment

    protected $fillable = ['message', 'user_id', 'completed'];
}
