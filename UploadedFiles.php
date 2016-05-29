<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UploadedFiles extends Model
{
    protected $table = 'files';

    public $fillable = ['filename'];
}
