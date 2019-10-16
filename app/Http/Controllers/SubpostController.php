<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Categorie;
use App\Subpost;
use App\Http\Requests\subpostRequest;

class SubpostController extends Controller
{
    public function index(){
    	/*if ($_SERVER['REQUEST_METHOD'] === 'GET') */
    	 if ($_SERVER['REQUEST_METHOD']=='POST')
         {
           $subposts=Subpost::where('post_id',$_POST['post_id'])->get();
           $post=Post::find($_POST['post_id']);
    	}
    	else{
           $subposts=Subpost::where('post_id',$_GET['post_id'])->get();
           $post=Post::find($_GET['post_id']);
    	}
           return view('editor.post.subpost.index',compact('subposts','post'));
    }
 
    public function store(subpostRequest $request){
        $subpost=new Subpost();
        $subpost->nom=$request->input('nom');
        $subpost->small_description=$request->input('small_description');
        
        $subpost->post_id=$request->input('post_id');
        if($request->hasFile('file')){
            $subpost->file=$request->file->store('upload/subposts');
        }
        $subpost->save();
        session()->flash('success','le chapitre à été bien ajouté !! ');
        return redirect('posts');
    }

    public function create(){
    	$posts=Post::all();
    	return view('editor.post.subpost.create',compact('posts'));
    }

    public function edit($id){
    	$subpost=Subpost::find($id);
    	return view('editor.post.subpost.edit',compact('subpost'));
    }

    public function update(subpostRequest $request,$id){
    	$subpost=Subpost::find($id);
    	$subpost->nom=$request->input('nom');
        $subpost->small_description=$request->input('small_description');
        $subpost->save();
        session()->flash('success','le chapitre à été bien modéfier !! ');
        return redirect('posts');
    }

    public function destroy(Request $request,$id){
    	$subpost=Subpost::find($id);
    	$subpost->delete();
        session()->flash('success','le chapitre à été bien supprimer !! ');
    	return redirect('posts');
    }
}
