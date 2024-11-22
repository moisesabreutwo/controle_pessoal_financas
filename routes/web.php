<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DespesasGrupoController;
use App\Http\Controllers\DespesasDetalheController;
use App\Http\Controllers\ReceitasGrupoController;
use App\Http\Controllers\ReceitasDetalheController;
use App\Http\Controllers\ReceitasClassificacaoController;
use App\Http\Controllers\DespesasClassificacaoController;
use App\Http\Controllers\DadosExcepcionaisController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\restritaController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\IdentificacaoClienteController;

Route::get('/', [HomeController::class, 'getDadosExcepcionais'])->name('home');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');
Route::get('/videos-educacionais', [HomeController::class, 'videosEducacionais'])->name('videos-educacionais');
Route::get('/outros-videos', [HomeController::class, 'outrosVideos'])->name('outros-videos');
Route::get('/contratar', [HomeController::class, 'contratar'])->name('contratar');

Route::get('/cliente', [IdentificacaoClienteController::class, 'createSite'])->name('cliente');
Route::post('/cliente/store', [IdentificacaoClienteController::class, 'storeSite'])->name('cliente.store');
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::prefix('admin')->group(function () {

        Route::get('/', [restritaController::class, 'getDadosExcepcionais'])->name('restrita');

        Route::resource('despesasGrupo', DespesasGrupoController::class);
        Route::resource('despesasDetalhe', DespesasDetalheController::class);
        Route::resource('receitasGrupo', ReceitasGrupoController::class);
        Route::resource('receitasDetalhe', ReceitasDetalheController::class);
        Route::resource('receitasClassificacao', ReceitasClassificacaoController::class);
        Route::resource('despesasClassificacao', DespesasClassificacaoController::class);
        Route::resource('dadosExcepcionais', DadosExcepcionaisController::class)->only([
            'index', 'edit', 'update', 'store'
        ]);

        Route::resource('/clientes', IdentificacaoClienteController::class);

    });
  
});

require __DIR__.'/auth.php';
