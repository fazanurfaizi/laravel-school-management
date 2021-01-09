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
    return view('welcome');
});

Auth::routes(['verify' => true]);
Route::get('/complete-registration', 'Auth\RegisterController@completeRegistration');
Route::post('/2fa', function () {
    return redirect(URL()->previous());
})->name('2fa')->middleware('2fa');
Route::get('/re-authenticate', 'HomeController@reauthenticate');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth', '2fa', 'password.confirm']], function () {
    Route::get('/profile', 'ProfileController@index')->name('profile.index');
    Route::put('/profile', 'ProfileController@update')->name('profile.update');
});
