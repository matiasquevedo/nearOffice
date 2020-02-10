<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/',[
	'uses'=>'HomeController@paginaPrincipal',
	'as'=>'pagina.principal'
]);


Route::get('perfil',[
	'uses'=>'UserController@showPerfil',
	'as'=>'user.perfil'
]);

Route::group(['prefix'=>'admin','middleware'=>['auth','admin']], function(){

	Route::get('/',function(){
		return view('admin.index');
	})->name('admin.panel');

	Route::resource('user','UserController');
	Route::get('user/{email}/delete',[
		'uses'=>'UserController@destroy',
		'as'=>'user.destroy'
	]);

	Route::resource('office','OfficeController');
	Route::get('offices/{id}/delete',[
		'uses'=>'OfficeController@destroy',
		'as'=>'offices.destroy'
	]);


	Route::resource('album','AlbumController');
	Route::get('album/{slug}/delete',[
		'uses'=>'AlbumController@destroy',
		'as'=>'album.destroy'
	]);
	Route::get('album/{slug}/post',[
		'uses'=>'AlbumController@post',
		'as'=>'album.post'
	]);
	Route::get('album/{slug}/unpost',[
		'uses'=>'AlbumController@unpost',
		'as'=>'album.unpost'
	]);

	Route::post('album/pic/add',[
		'uses'=>'AlbumController@addPics',
		'as'=>'album.addPics'
	]);

	Route::get('album/pics/index',[
		'uses'=>'AlbumController@indexPic',
		'as'=>'album.indexPic'
	]);



});

Auth::routes();

Route::get('/panel', 'HomeController@index')->name('home');
Route::get('/seccion/{slugPage}', 'HomeController@publicPage')->name('public.page');
Route::get('/eventos', 'HomeController@events')->name('public.eventos');
Route::get('/eventos/{slugEvent}', 'HomeController@event')->name('public.evento');
Route::get('/blog/entradas/{entrySlug}', 'HomeController@entry')->name('public.entrada');
