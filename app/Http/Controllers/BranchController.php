<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Branch;
use App\Department;
use Auth;
use App\Http\Requests\categorieRequest;

class BranchController extends Controller
{
     public function index(){
           $branchs=Branch::paginate(10);//paginate kat afficher ghi l3adad li bghiti flpage
           return view('super_admin.branch.index',compact('branchs'));
    }
 
     public function store(categorieRequest $request){
        
        $branch=new Branch();
        $branch->nom=$request->input('nom');
        /** add photo ******/
        if($request->hasFile('photo')){ 
            $branch->photo=$request->photo->store('upload/branchs');
        }
        /*******/
        $branch->small_description=$request->input('small_description');
        $branch->full_description=$request->input('full_description');
        $branch->department_id=$request->input('department_id');
        $branch->save();
        session()->flash('success','la formation à été bien ajouté !! ');
        return redirect('branchs');
    }

    public function create(){
        $departments=Department::all();
        return view('super_admin.branch.create',compact('departments'));
    }

    public function edit($id){
        $branch=Branch::find($id);
        $departments=Department::all();
        return view('super_admin.branch.edit',compact('branch','departments'));
    }

    public function update(categorieRequest $request,$id){
        $branch=Branch::find($id);
        $branch->nom=$request->input('nom');
        $branch->small_description=$request->input('small_description');
        $branch->full_description=$request->input('full_description');
        if($request->hasFile('photo')){
            $branch->photo=$request->photo->store('upload/branchs');
        }
        $branch->department_id=$request->input('department_id');
        $branch->save();
        return redirect('branchs');
    }

    public function destroy(Request $request,$id){
        $branch=Branch::find($id);
        $branch->delete();
        session()->flash('success','la filière à été bien supprimer !! ');
        return redirect('branchs');
    }
}
