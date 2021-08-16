<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class certificate extends Model
{



    public function teachers()
    {
        return $this->belongsToMany('App\Models\teacher', 'teacher_certificates');
    }
}
