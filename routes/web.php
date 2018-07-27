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

Auth::routes();

Route::group(['middleware',['web','auth']],function(){
	
	Route::get('/', function () {
	    return view('welcome');
	})->name('web');

	Route::get('/home', function () {
		if( Auth::user()->manager == 1 ){
			$users['all'] = App\User::all()->tojSon();
			return view('admin_home',$users);
		} else {
			return view('home');
		}
	})->name('home');
});