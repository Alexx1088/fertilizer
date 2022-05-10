<?php


use App\Http\Controllers\Main\IndexController2;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Culture\IndexController3;
use App\Http\Controllers\Admin\Clients\IndexController;

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

/*Route::group(['namespace' => 'App\Http\Controllers\Main'], function () {

    Route::get('/', IndexController::class);

});*/

Route::group(['namespace' => 'App\Http\Controllers\Admin', 'prefix' => 'admin'],
    function () {
        Route::group([ 'namespace' => 'Main',],
            function () {

                Route::get('/', 'IndexController')->name('admin.main.index');

            });

Route::group([ 'namespace' => 'Clients', 'prefix' => 'clients'],
    function () {

        Route::get('/', 'IndexController')->name('clients.index');

    });
        Route::group([ 'namespace' => 'Fertilizer', 'prefix' => 'fertilizer'], function () {

            Route::get('/', 'IndexController')->name('fertilizer.index');
        });

        Route::group([ 'namespace' => 'Culture', 'prefix' => 'cultures'],
            function () {

                Route::get('/', 'IndexController')->name('admin.culture.index');
                Route::get('/create', 'CreateController')->name('admin.culture.create');
               Route::post('/', 'StoreController')->name('admin.culture.store');
               Route::get('/{culture}', 'ShowController')->name('admin.culture.show');
               Route::get('/{culture}/edit', 'EditController')->name('admin.culture.edit');
               Route::patch('/{culture}', 'UpdateController')->name('admin.culture.update');
               Route::delete('/{culture}', 'DeleteController')->name('admin.culture.delete');

            });

    });




Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
