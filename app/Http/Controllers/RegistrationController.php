<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\registerRequest;
use App\User;
use App\Role;
use App\Notifications\NotificationRegistration;

class RegistrationController extends Controller
{
	/*************** for admins **********************/
    public function adminindex(){
           return view('admin.registerfromadmin');
    }
    public function adminstore(registerRequest $request){
    	$user=new User();
    	$user->name=$request->input('name');
    	$user->email=$request->input('email');
    	$user->password=bcrypt($request->input('password'));
    	$user->save();
        if($request->input('genre')=='simple_user'){
        $user->roles()->attach(Role::where('name','simple_user')->first());
    }
        if($request->input('genre')=='editor'){
        $user->roles()->attach(Role::where('name','editor')->first());
    }
    	 session()->flash('success',"l'utilisateur à été bien ajouté !! ");
    	  return redirect('registerfromadmins');
    }
    /************ for super admin ***********************/
     public function index(){
           $users=User::orderby('id','desc')->paginate(25);
           return view('super_admin.registration.index',compact('users'));
    }
 
    public function store(registerRequest $request){
    	
       $user=new User();
    	$user->name=$request->input('name');
    	$user->email=$request->input('email');
    	$user->password=bcrypt($request->input('password'));
    	$user->save();
        /***** hna super admin kay ajouter ay wa7d bgha ********/
        if($request->input('genre')=='simple_user'){
        $user->roles()->attach(Role::where('name','simple_user')->first());
    }
        if($request->input('genre')=='editor'){
        $user->roles()->attach(Role::where('name','editor')->first());
    }
    if($request->input('genre')=='admin'){
        $user->roles()->attach(Role::where('name','admin')->first());
    }

    	 session()->flash('success',"l'utilisateur à été bien ajouté !! ");
    	  return redirect('registrations');
    }

    public function create(){
    	return view('super_admin.registration.create');
    }

    public function edit($id){
        $user=User::find($id);
        return view('super_admin.registration.edit',compact('user'));
    }

    public function update(Request $request,$id){
        $user=User::where('id',$request->input('id'))->first();
        $user->roles()->detach();
        if($request->input('genre')=='not_active'){
            $user->roles()->attach(Role::where('name','not_active')->first());
        }
        if($request->input('genre')=='simple_user'){
            $user->roles()->attach(Role::where('name','simple_user')->first());
        }
        if($request->input('genre')=='editor'){
            $user->roles()->attach(Role::where('name','editor')->first());
        }
        if($request->input('genre')=='admin'){
            $user->roles()->attach(Role::where('name','admin')->first());
        }
        return redirect('registrations');
    }
    public function destroy(Request $request,$id){
    	$user=User::find($id);
    	$user->delete();
    	return redirect('registrations');
    }
/*****
*
*
*
***********************Notifications********************************************
*
*
******/
    public function markAsRead(Request $request){
        auth()->user()->unreadNotifications->markAsRead();
        return redirect('registrations');
    }
    

}
