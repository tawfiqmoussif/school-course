<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{

    public function roles(){
        return $this->belongsToMany('App\Role','user_role','user_id','role_id');
    }
    // had lfct kat79e9li wach l user 3ndo chi role
    public function hasAnyRole($roles){
        if(is_array($roles)){
            foreach ($roles as $role) {
                if($this->hasRole($role)){// hasrole katchofli wach kayn role 3nd l user
                    return true;
                }
            }
        }
        else{
            if($this->hasRole($roles)){
                    return true;
                }
        }

    }
     // hasrole katchofli wach kayn role 3nd l user
     public function hasRole($roles){
        
                if($this->roles()->where('name',$roles)->first()){
                    return true;
                }
                return false;
        }
      /********************** relation ship ********************/
      //un user peut cree un ou ++ posts
      public function posts(){
        return $this->hasMany('App\Post');
    }



        /****** bnisba lhadchi kaykon hna par defaut flaravel *******/
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
