<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class my_parent extends Model
{


    protected $fillable = ['father_name', 'mother_name', 'father_phone', 'mother_phone', 'parent_email'];
    protected $table = 'my_parents';
    public $timestamps = true;
}
