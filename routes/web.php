<?php


use App\Http\Controllers\Admin\Fertilizer\SelectController;
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
/*
Route::group(['namespace' => 'App\Http\Controllers\Main'], function () {

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

        Route::get('/', 'IndexController')->name('admin.clients.index');
        Route::get('/create', 'CreateController')->name('admin.clients.create');
        Route::post('/', 'StoreController')->name('admin.clients.store');
        Route::get('/{client}', 'ShowController')->name('admin.clients.show');
        Route::get('/{client}/edit', 'EditController')->name('admin.clients.edit');
        Route::patch('/{client}', 'UpdateController')->name('admin.clients.update');
        Route::delete('/{client}', 'DeleteController')->name('admin.clients.delete');

    });
        Route::group([ 'namespace' => 'Fertilizer', 'prefix' => 'fertilizer'], function () {

            Route::get('/', 'IndexController')->name('admin.fertilizer.index');
            Route::get('/create', 'CreateController')->name('admin.fertilizer.create');
            Route::post('/', 'StoreController')->name('admin.fertilizer.store');
            Route::get('/{fertilizer}', 'ShowController')->name('admin.fertilizer.show');
            Route::get('/{fertilizer}/edit', 'EditController')->name('admin.fertilizer.edit');
            Route::patch('/{fertilizer}', 'UpdateController')->name('admin.fertilizer.update');
            Route::delete('/{fertilizer}', 'DeleteController')->name('admin.fertilizer.delete');

            Route::get('/select', [SelectController::class, 'index'])->name('admin.fertilizer.select');

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

Route::group(['namespace' => 'App\Http\Controllers\Fertilizer', 'prefix' => 'fertilizer'],
    function () {

                Route::get('/', 'IndexController')->name('fertilizer.index');
                Route::get('/create', 'CreateController')->name('fertilizer.create');
                Route::post('/', 'StoreController')->name('fertilizer.store');
                Route::get('/{fertilizer}', 'ShowController')->name('fertilizer.show');
                Route::get('/{fertilizer}/edit', 'EditController')->name('fertilizer.edit');
                Route::patch('/{fertilizer}', 'UpdateController')->name('fertilizer.update');
                Route::delete('/{fertilizer}', 'DeleteController')->name('fertilizer.delete');

    });

Route::group([ 'namespace' => 'App\Http\Controllers\Admin\User', 'prefix' => 'users'],
    function () {

        Route::get('/', 'IndexController')->name('admin.user.index');
        Route::get('/create', 'CreateController')->name('admin.user.create');
        Route::post('/', 'StoreController')->name('admin.user.store');
        Route::get('/{user}', 'ShowController')->name('admin.user.show');
        Route::get('/{user}/edit', 'EditController')->name('admin.user.edit');
        Route::patch('/{user}', 'UpdateController')->name('admin.user.update');
        Route::delete('/{user}', 'DeleteController')->name('admin.user.delete');

    });

 /*
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');*/
