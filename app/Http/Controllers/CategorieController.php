<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Categorie;
use App\Http\Requests\categorieRequest;
use Illuminate\Http\UploadedFile;
use Auth;


class CategorieController extends Controller
{
    public function index(){
           $categories=Categorie::paginate(3);//paginate kat afficher ghi l3adad li bghiti flpage
           return view('super_admin.categorie.index',compact('categories'));
    }
 
    public function store(categorieRequest $request){
    	
        $categorie=new Categorie();
        $categorie->nom=$request->input('nom');
        $categorie->small_description=$request->input('small_description');
        $categorie->full_description=$request->input('full_description');
        //************* add image *******************//
        if($request->hasFile('photo')){
        	$categorie->photo=$request->photo->store('upload/categorie');
        }
        $categorie->save();
        session()->flash('success','la catégorie à été bien ajouté !! ');
        return redirect('admincategories');
    }

    public function create(){
    	return view('super_admin.categorie.create');
    }

    public function edit($id){
    	$categorie=Categorie::find($id);
    	return view('super_admin.categorie.edit',compact('categorie'));
    }

    public function update(categorieRequest $request,$id){
    	$categorie=Categorie::find($id);
    	$categorie->nom=$request->input('nom');
        $categorie->small_description=$request->input('small_description');
        $categorie->full_description=$request->input('full_description');
        if($request->hasFile('photo')){
        	$categorie->photo=$request->photo->store('upload/categorie');
        }
        $categorie->save();
        return redirect('admincategories');
    }

    public function destroy(Request $request,$id){
    	$categorie=Categorie::find($id);
    	$categorie->delete();
        session()->flash('success','la catégorie à été bien supprimer !! ');
    	return redirect('admincategories');
    }
}
