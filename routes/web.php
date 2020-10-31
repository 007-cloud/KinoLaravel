<?php

use App\Http\Controllers\ArticlesController;
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
    $articles = App\Models\Articles::take(2)->latest()->get();

    return view('welcome', [
        'articles' => $articles
    ]);
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('films', function () {
    return view('films');
});

Route::get('series', function () {
    return view('series');
});

Route::get('ratings', function () {
    return view('ratings');
});

Route::get('articles', [ArticlesController::class, 'index'])->name('articles.index');
Route::post('articles', [ArticlesController::class, 'store'])->name('articles.store');
Route::get('articles/create', [ArticlesController::class, 'create'])->name('articles.create');
Route::get('articles/{article}', [ArticlesController::class, 'show'])->name('articles.show');
Route::get('articles/{article}/edit', [ArticlesController::class, 'edit'])->name('articles.edit');
Route::put('articles/{article}', [ArticlesController::class, 'update'])->name('articles.update');

Route::get('contacts', function () {
    return view('contacts');
});




