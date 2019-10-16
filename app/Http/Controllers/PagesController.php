<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Subpost;
use App\Categorie;
use DB;
use App\Department;
use App\Branch;
use App\Level;

class PagesController extends Controller
{
    public function home()
    {
        $categories=Categorie::orderby('id','desc')->paginate(6);
        $posts=Post::orderby('id','desc')->paginate(9);
    	return view('all.home',compact('posts','categories'));
    }

    /************************************************************
       ********************  hado kadkhl lcategorie bdabt wkatl9a les cours li fiha matalan
                                            ***********************************/


    public function categorie_for_all($id)
    {
           $posts=Post::where('categorie_id',$id)->orderby('id','desc')->paginate(15);
           $categorie=Categorie::find($id);
           return view('all.categorie',compact('categorie','posts'));
    }
    public function department_for_all($id)
    {
           $branchs=Branch::where('department_id',$id)->orderby('id','desc')->paginate(15);
           $department=Department::find($id);
           return view('all.department',compact('department','branchs'));
    }
     public function branch_for_all($id)
    {
           $levels=Level::where('branch_id',$id)->orderby('id','desc')->paginate(15);
           $branch=Branch::find($id);
           return view('all.branch',compact('branch','levels'));
    }
     public function level_for_all($id)
    {
           $posts=Post::where('level_id',$id)->orderby('id','desc')->paginate(15);
           $level=Level::find($id);
           return view('all.level',compact('level','posts'));
    }

    //for users only !!!!!!!!!!!!!!!!
    public function post_for_all($id){
         $subposts=Subpost::where('post_id',$id)->orderby('id','asc')->paginate(6);
           $post=Post::find($id);
           return view('user.post',compact('post','subposts'));
    }
/************************************************************
       ********************  hado li fihom ghi les categories kamlin matalan
                                            ***********************************/
    public function categories_for_all()
    {
          $categories=Categorie::orderby('id','desc')->paginate(15);
           return view('all.all_categories',compact('categories'));
    }
    public function posts_for_all(){
          $posts=Post::orderby('id','desc')->paginate(15);
           return view('all.all_posts',compact('posts'));
    }

    public function departments_for_all(){
          $departments=Department::orderby('id','desc')->paginate(15);
           return view('all.all_departments',compact('departments'));
    }

    public function branchs_for_all(){
          $branchs=Branch::orderby('id','desc')->paginate(15);
           return view('all.all_branchs',compact('branchs'));
    }

    public function not_active(){
           return view('user.not_active');
    }
}
