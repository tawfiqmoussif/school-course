<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Branch;
use App\Department;
use Auth;
use App\Level;
use App\Http\Requests\levelRequest;

class LevelController extends Controller
{
    public function index(){
        if ($_SERVER['REQUEST_METHOD']=='POST')
         {
           $levels=Level::where('branch_id',$_POST['branch_id'])->get();
           $branch=Branch::find($_POST['branch_id']);
        }
        if($_SERVER['REQUEST_METHOD']=='GET'){
           $levels=Level::where('branch_id',$_GET['branch_id'])->get();
           $branch=Branch::find($_GET['branch_id']);
        }
           return view('super_admin.level.index',compact('levels','branch'));
    }
 
     public function store(levelRequest $request){
        $level=new Level();
        $level->nom=$request->input('nom');
        $level->branch_id=$request->input('branch_id');
        $level->save();
        session()->flash('success','le niveau à été bien ajouté !! ');
        return redirect('branchs');
    }

    public function create(){
        $branchs=Branch::all();
        return view('super_admin.level.create',compact('branchs'));
    }

    public function edit($id){
        $level=Level::find($id);
        return view('super_admin.level.edit',compact('level'));
    }

    public function update(levelRequest $request,$id){
        $level=Level::find($id);
        $level->nom=$request->input('nom');
        $level->save();
        session()->flash('success','le niveau à été bien modéfier !! ');
        return redirect('branchs');
    }

    public function destroy(Request $request,$id){
        $level=Level::find($id);
        $level->delete();
        session()->flash('success','le niveau à été bien supprimer !! ');
        return redirect('branchs');
    }
}
