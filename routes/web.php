<?php

    use App\Domain\Cards\Controllers\CardsController;
    use App\Domain\Collection\Controllers\CollectionController;
    use App\Domain\Sets\Controllers\SetsController;
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

    Route::get('/sets', [SetsController::class, 'index']);
    Route::get('/sets/{setName}', [SetsController::class, 'view']);

    Route::get('/sets/{setId}/cards', [CardsController::class, 'index']);

    Route::get('/search', [CollectionController::class, 'index']);
