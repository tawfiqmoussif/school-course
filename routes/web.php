<?php
/*ici tous les routes des pages concernent tous le monde 
                   ****** for All ******
    ****************************************************/
Route::get('/','PagesController@home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// tous les posts and categories 
Route::get('categorie','PagesController@categories_for_all');
Route::get('post','PagesController@posts_for_all');
Route::get('department','PagesController@departments_for_all');
Route::get('branch','PagesController@branchs_for_all');

// post ou categorie li 3ndo l id 
Route::get('categorie/{id}','PagesController@categorie_for_all');
Route::get('department/{id}','PagesController@department_for_all');
Route::get('branch/{id}','PagesController@branch_for_all');
Route::get('level/{id}','PagesController@level_for_all');
Route::group(['middleware'=>'roles','roles' => ['super_admin','admin','editor','simple_user','not_active']],function(){
        Route::get('not_active','PagesController@not_active');
});

/******************************************** 
                **** user ******
    ****************************************************/
Route::group(['middleware'=>'roles','roles' => ['super_admin','admin','editor','simple_user']],function(){
        Route::get('post/{id}','PagesController@post_for_all');
});


/********************************************************
                  ****** editor ******
    ****************************************************/
Route::group(['middleware'=>'roles','roles' => ['super_admin','admin','editor']],function(){
Route::resource('posts','PostController');
Route::resource('subposts','SubpostController');
Route::get('posts/{department_id}','PostController@branch');
Route::get('/ajax_department',function(){
  $department_id=Input::get('department_id');
        $branchs=Branch::where('department_id','=',$department_id)->get();
         $response = array(
        'status' => 'success',
        'data' => $branchs
    );
    return \Response::json($response);
});

});
/*
Route::get('subposts/{id}','SubpostController@index');
Route::get('subposts/create','SubpostController@create');
Route::post('subposts','SubpostController@store');
Route::get('subposts/{subpost}/edit','SubpostController@edit');
Route::put('subposts/{subpost}','SubpostController@update');
Route::delete('subposts/{subpost}','SubpostController@destroy');
*/


/*********************************************************
                  ***** Admin ******
    ****************************************************/
Route::group(['middleware'=>'roles','roles' => ['super_admin','admin']],function(){
Route::get('registerfromadmins','RegistrationController@adminindex');
Route::post('registerfromadmins','RegistrationController@adminstore');
});
/**************************************************** 
               ***** super admin ******
    ****************************************************/
Route::group(['middleware'=>'roles','roles' => ['super_admin']],function(){
Route::resource('admincategories','CategorieController');
Route::resource('registrations','RegistrationController');
Route::resource('departments','DepartmentController');
Route::resource('branchs','BranchController');
Route::resource('levels','LevelController');

Route::post('/markAsRead','RegistrationController@markAsRead')->name('markAsRead');
});

