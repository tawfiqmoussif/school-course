<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subpost extends Model
{
     use SoftDeletes;
     protected $dates = ['deleted_at'];

      protected $fillable = [
    	'nom','	small_description','post_id'
    ];

    public function post(){
    	return $this->belongsTo('App\Post');
    }
}
