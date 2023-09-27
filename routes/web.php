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

// Route::get('/', function () {
//     return view('welcome');
// });


// Route::get('/hoten/{ten}/lop/{lop}',function($ten,$lop){
//     return 'Chào' .$ten .'Đén với'.$lop;
// });

// Route::get('/demo', function () {
//     return 'Chào bạn đén với lớp php';
// });
Route::prefix('admin')->group(function () {
    Route::Get('/','AdminController@index');
    Route::resource('category','CategoryController');
    Route::resource('product','ProductController');
});

//  Route::Get('/admin/','AdminController@index');

//  Route :: Get('/category','CategoryController@index')->name('category.index');
//  Route :: Get('/product','ProductController@index')->name('product.index');
//  Route :: Get('/blog','BlogController@index')->name('blog.index');
