<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;
     protected $dates = ['deleted_at'];

     protected $fillable = [
    	'nom','	small_description','full_description','photo'
    ];	
/************relation ship *****************/
    //post fiha 1 ou * subposts
    public function subposts(){
    	return $this->hasMany('App\Subpost');
    }
     //post dyal 1 seul user
    public function user(){
    	return $this->belongsTo('App\User');
    }
}
