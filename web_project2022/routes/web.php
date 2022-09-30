<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DownloadController;

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

/*--------------- Admin Route ---------------*/
Route::prefix('admin')->group(function (){

    Route::get('/login',[AdminController::class, 'Index'])->name('admin_login');

    Route::post('/login/owner',[AdminController::class, 'Login'])->name('admin.login');

    Route::get('/dashboard',[AdminController::class, 'Dashboard'])->name('admin.dashboard')->middleware('admin');

    Route::get('/logout',[AdminController::class, 'AdminLogout'])->name('admin.logout')->middleware('admin');

    Route::prefix('manage')->group(function(){

        Route::get('/managers',[AdminController::class, 'ManageManagers'])->name('admin.manage.managers')->middleware('admin');
        //Route::post('/managers',[AdminController::class, 'AdminRegister'])->name('admin.manage.register')->middleware('admin');
        Route::post('/managers/create',[AdminController::class, 'AdminRegisterCreate'])->name('admin.manage.register.create')->middleware('admin');
        Route::get('/manager/delete/{id}', [AdminController::class, 'destroy'])->middleware('admin');

        Route::get('/comments',[GameController::class, 'dropDownShow'])->name('admin.manage.comments')->middleware('admin');
        Route::get('/comments/search',[CommentController::class, 'getCommentsAdmin'])->name('admin.manage.comments.search')->middleware('admin');
        Route::get('/comments/export',[CommentController::class, 'exportCommentsAdmin'])->name('admin.manage.comments.export')->middleware('admin');

        Route::get('/users',[AdminController::class, 'ManageUsers'])->name('admin.manage.users')->middleware('admin');
        Route::get('/user/delete/{id}', [UserController::class, 'destroy'])->middleware('admin');

        Route::get('/games',[AdminController::class, 'ManageGames'])->name('admin.manage.games')->middleware('admin');
        
        Route::post('/games/create',[GameController::class, 'GameRegisterCreate'])->name('admin.manage.game.create')->middleware('admin');
        Route::get('/game/delete/{id}', [GameController::class, 'destroy'])->middleware('admin');

        Route::resource('genres', 'App\Http\Controllers\GenreController');

        Route::get('/genres',[AdminController::class, 'ManageGenres'])->name('admin.manage.genres')->middleware('admin');
        
        Route::post('/genres', [GenreController::class, 'create'])->middleware('admin');
        Route::post('/genres', [GenreController::class, 'store'])->middleware('admin');


    });

});



/*--------------- Admin Route End ---------------*/

Route::get('/', function () {
    return view('biography');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/biography', function () {
    return view('biography');
})->name('biography');

Route::prefix('games')->group(function(){
    Route::get('/index',[GameController::class, 'games'])->name('games');
});

Route::get('/game/{id}', [GameController::class, 'game'])->name('game');

Route::group(['middleware' => ['auth']], function() {
    /**
    * Logout Route
    */
    Route::get('/logout', [LogoutController::class, 'perform'])->name('logout.perform');
 });

/*--------------- Route::post('/genres',[GenresController::class, 'store']); ---------------*/

/*-----------Comment add-------------*/
Route::resource('comments', 'App\Http\Controllers\CommentController');
        
//Route::post('/game/{id}', [CommentController::class, 'create']);
//Route::post('/game/{id}', [CommentController::class, 'store']);

/*------------Delete comment---------------*/

Route::get('/delete/comment/{id}', [CommentController::class, 'destroy']);

Route::get('/games/search', [GameController::class, 'searchByName']);

require __DIR__.'/auth.php';

/*--------CV---------*/
Route::get('/downloadfile/{filename}', [DownloadController::class, 'downloadfile'])->name('downloadfile');
