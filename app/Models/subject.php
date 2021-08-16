<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class subject extends Model
{

    protected $fillable = ['name', 'max_mark', 'min_mark', 'class_id', 'note'];
    protected $table = 'subjects';
    public $timestamps = true;


    public function Class()
    {
        return $this->belongsTo('App\Models\classes', 'class_id');
    }
}
