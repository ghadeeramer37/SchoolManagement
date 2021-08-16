<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class sections extends Model
{
    protected $fillable = ['name', 'class_id', 'note'];
    protected $table = 'sections';
    public $timestamps = true;


    public function class()
    {
        return $this->belongsTo('App\Models\classes', 'class_id');
    }
}
