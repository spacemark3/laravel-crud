<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ArticoloController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\AnimalController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('articoli', [ArticoloController::class, 'index'])->name('articoli.index');
    Route::get('articoli/create', [ArticoloController::class, 'create'])->name('articoli.create');
    Route::post('articoli', [ArticoloController::class, 'store'])->name('articoli.store');
    Route::get('articoli/{articolo}', [ArticoloController::class, 'show'])->name('articoli.show');
    Route::get('articoli/{articolo}/edit', [ArticoloController::class, 'edit'])->name('articoli.edit');
    Route::patch('articoli/{articolo}', [ArticoloController::class, 'update'])->name('articoli.update');
    Route::delete('articoli/{articolo}', [ArticoloController::class, 'destroy'])->name('articoli.destroy');

    Route::get('categorie', [CategoriaController::class, 'index'])->name('categorie.index');
    Route::get('categorie/create', [CategoriaController::class, 'create'])->name('categorie.create');
    Route::post('categorie', [CategoriaController::class, 'store'])->name('categorie.store');
    Route::get('categorie/{categoria}', [CategoriaController::class, 'show'])->name('categorie.show');
    Route::get('categorie/{categoria}/edit', [CategoriaController::class, 'edit'])->name('categorie.edit');
    Route::patch('categorie/{categoria}', [CategoriaController::class, 'update'])->name('categorie.update');
    Route::delete('categorie/{categoria}', [CategoriaController::class, 'destroy'])->name('categorie.destroy');
});

Route::get('testing', function () {
    $articles = ['Articolo 1', 'Articolo 2', 'Articolo 3', 'Articolo 4','Articolo 5', 'Articolo 6'];
    $tables = ['Tavolo 1', 'Tavolo 2', 'Tavolo 3'];

    return view('testing', compact('articles', 'tables'));
});

Route::get('test2', function () {
    $tavole = ['Tavolo A', 'Tavolo B', 'Tavolo C', 'Tavolo D','Tavolo E'];
    $header = 'Pagina Test22222';
    return view('test2')->with('tavole', $tavole)->with('header', $header);
});

Route::get('test3', [AnimalController::class, 'animal'])->name('test3');
Route::get('test3', [AnimalController::class,'functest'])->name('test4');


require __DIR__ . '/auth.php';
