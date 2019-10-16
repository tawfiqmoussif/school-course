<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    public function branch(){
    	return $this->belongsTo('App\Branch');
    }
}
