<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    public function department(){
    	return $this->belongsTo('App\Department');
    }

    public function levels(){
        return $this->hasMany('App\Level');
    }
}
