<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
     public function branchs(){
        return $this->hasMany('App\Branch');
    }
}
