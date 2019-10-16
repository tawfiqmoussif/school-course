<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Department;
use Auth;
use App\Http\Requests\categorieRequest;
use Illuminate\Http\UploadedFile;

class DepartmentController extends Controller
{
    public function index(){
           $departments=Department::paginate(3);//paginate kat afficher ghi l3adad li bghiti flpage
           return view('super_admin.department.index',compact('departments'));
    }
 
    public function store(categorieRequest $request){
    	
        $department=new Department();
        $department->nom=$request->input('nom');
        $department->small_description=$request->input('small_description');
        $department->full_description=$request->input('full_description');
        //************* add image *******************//
        if($request->hasFile('photo')){
        	$department->photo=$request->photo->store('upload/department');
        }
        $department->save();
        session()->flash('success','la département à été bien ajouté !! ');
        return redirect('departments');
    }

    public function create(){
    	return view('super_admin.department.create');
    }

    public function edit($id){
    	$department=Department::find($id);
    	return view('super_admin.department.edit',compact('department'));
    }

    public function update(categorieRequest $request,$id){
    	$department=Department::find($id);
    	$department->nom=$request->input('nom');
        $department->small_description=$request->input('small_description');
        $department->full_description=$request->input('full_description');
        if($request->hasFile('photo')){
        	$department->photo=$request->photo->store('upload/department');
        }
        $department->save();
        return redirect('departments');
    }

    public function destroy(Request $request,$id){
    	$department=Department::find($id);
    	$department->delete();
        session()->flash('success','la département à été bien supprimer !! ');
    	return redirect('departments');
    }
}
