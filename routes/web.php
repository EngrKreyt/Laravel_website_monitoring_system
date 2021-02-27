<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Task;
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
    return view('welcome');
});

Route::get('/user', function () {
    return view('user');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware'=> ['auth','admin' or 'employee' or 'intern']],function(){

  Route::get('/dashboard', function () {
      $task = Task::orderBy('created_at', 'asc')->get();

      return view('tasks.index' , [
        'task' => $task,
      ]);
  });
  Route::post('/task', function (Request $request) {
    $validator = Validator::make($request->all(),[
    'name' => 'required|max:255',
  ]);
    if($validator->fails()) {
      return redirect('/dashboard')
              ->withInput()
              ->withErrors($validator);
    }
    Task::create([
      'name' => $request->name,
    ]);
    return redirect('/dashboard');
  });

  Route::delete('/task/{task}', function (Task $task) {
    $task->delete();
    return redirect('/dashboard');
  });
  Route::get('/role-register','Admin\DashboardController@registered');
  Route::get('/role-edit/{id}','Admin\DashboardController@registeredit');
  Route::put('/role-register-update/{id}','Admin\DashboardController@registerupdate');
  Route::delete('/role-delete/{id}','Admin\DashboardController@registerdelete');

  Route::get('/abouts','Admin\AboutusController@index');
  Route::post('/save-aboutus','Admin\AboutusController@store');
  Route::get('/about-us/{id}','Admin\AboutusController@edit');
  Route::put('/aboutus-update/{id}','Admin\AboutusController@update');
  Route::delete('about-us-delete/{id}','Admin\AboutusController@delete');


});

Auth::routes();
//Route:get('/employee', 'EmployeeController@index')->('admin')middleware('admin');
//Route:get('/intern', 'InternController@index')->('intern')middleware('intern');
//Route:get('/client', 'ClientController@index')->('client')middleware('client');

//Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
