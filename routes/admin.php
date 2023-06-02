<?php


use App\Http\Controllers\Admin\Attraction\AddImageStoreController;
use App\Http\Controllers\Admin\Attraction\DestroyImageController;
use App\Http\Controllers\Admin\City\CreateCityAttractionController;
use App\Http\Controllers\Admin\City\ShowCityAttractionsController;
use App\Http\Controllers\Admin\City\StoreCityAttractionController;
use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\Admin\User\CreateController;
use App\Http\Controllers\Admin\User\DestroyController;
use App\Http\Controllers\Admin\User\EditController;
use App\Http\Controllers\Admin\User\ShowController;
use App\Http\Controllers\Admin\User\StoreController;
use App\Http\Controllers\Admin\User\UpdateController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Requests\Admin\Attraction\UpdateRequest;
use Illuminate\Support\Facades\Route;

Route::prefix('auth')->controller(AuthController::class)->group(function () {
    Route::middleware('guest:admin')->group(function () {
        Route::get('/login', 'showLogin')->name('login');
        Route::post('/login_process', 'login')->name('login_process');
    });
    Route::middleware(['auth:admin'])->group(function () {
        Route::get('/logout', 'logout')->name('logout');
    });
});


Route::middleware('auth:admin')->group(function () {
    Route::get('/', IndexController::class)->name('admin.index');

    Route::prefix('users')->group(function () {
        Route::get('/', \App\Http\Controllers\Admin\User\IndexController::class)
            ->name('admin.users.index');
        Route::get('/create', CreateController::class)
            ->name('admin.users.create');
        Route::post('/', StoreController::class)
            ->name('admin.users.store');
        Route::get('/{user}', ShowController::class)
            ->name('admin.users.show');
        Route::get('/{user}/edit', EditController::class)
            ->name('admin.users.edit');
        Route::patch('/{user}', UpdateController::class)
            ->name('admin.users.update');
        Route::delete('/{user}', DestroyController::class)
            ->name('admin.users.destroy');
    });

    Route::prefix('cities')->group(function (){
        Route::get('/', \App\Http\Controllers\Admin\City\IndexController::class)
            ->name('admin.cities.index');
        Route::delete('/{city}', \App\Http\Controllers\Admin\City\DestroyController::class)
            ->name('admin.cities.destroy');
        Route::get('/create', \App\Http\Controllers\Admin\City\CreateController::class)
            ->name('admin.cities.create');
        Route::post('/', \App\Http\Controllers\Admin\City\StoreController::class)
            ->name('admin.cities.store');
        Route::get('/{city}', \App\Http\Controllers\Admin\City\ShowController::class)
            ->name('admin.cities.show');
        Route::get('/{city}/edit', \App\Http\Controllers\Admin\City\EditController::class)
            ->name('admin.cities.edit');
        Route::patch('/{city}', \App\Http\Controllers\Admin\City\UpdateController::class)
            ->name('admin.cities.update');
        Route::get('/{city}/attractions', ShowCityAttractionsController::class)
            ->name('admin.cities.city_attractions');
        Route::get('/{city}/attractionsCreate', CreateCityAttractionController::class)
            ->name('admin.cities.city_attractions_create');
        Route::post('/{city}/attractionsStore', StoreCityAttractionController::class)
            ->name('admin.cities.city_attractions_store');
    });

    Route::prefix('attractions')->group(function(){
        Route::get('/', \App\Http\Controllers\Admin\Attraction\IndexController::class)
            ->name('admin.attractions.index');
        Route::get('/create', \App\Http\Controllers\Admin\Attraction\CreateController::class)
            ->name('admin.attractions.create');
        Route::post('/', \App\Http\Controllers\Admin\Attraction\StoreController::class)
            ->name('admin.attractions.store');
        Route::get('/{attraction}', \App\Http\Controllers\Admin\Attraction\ShowController::class)
            ->name('admin.attractions.show');
        Route::get('/{attraction}/addImage', \App\Http\Controllers\Admin\Attraction\AddImageController::class)
            ->name('admin.attractions.addImage');
        Route::post('/addImage', AddImageStoreController::class)
            ->name('admin.attractions.addImageStore');
        Route::delete('/{image}}', DestroyImageController::class)
            ->name('admin.attractions.destroyImage');
        Route::get('/{attraction}/edit', \App\Http\Controllers\Admin\Attraction\EditController::class)
            ->name('admin.attractions.edit');
        Route::patch('/{attraction}', \App\Http\Controllers\Admin\Attraction\UpdateController::class)
            ->name('admin.attractions.update');
        Route::delete('/{attraction}', \App\Http\Controllers\Admin\Attraction\DestroyController::class)
            ->name('admin.attractions.destroy');
    });

});



