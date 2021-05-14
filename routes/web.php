<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
//    try {
//        DB::connection()->getPdo();
//        echo "Connected successfully to: " . DB::connection()->getDatabaseName();
//    } catch (\Exception $e) {
//        die("Could not connect to the database. Please check your configuration. error:" . $e );
//    }
//    die;
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('admin')->group(function () {
    Route::get('/', 'Admin\DashboardController@index')->name('AdminDashboard');
    Route::resource('posts', 'Admin\PostController');
});



//Route::get('/', [
//    'as' => 'index',
//    'uses' => 'HomeController@index'
//]);
//
//Route::get('/posts/{slug}', [
//    'as' => 'get-posts',
//    'uses' => 'PostController@getPost'
//]);

