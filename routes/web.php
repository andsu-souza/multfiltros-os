<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\TecnicoController;
use App\Http\Controllers\AgendamentoController;
use App\Http\Controllers\OrdemServicoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Página inicial pública (opcional, pode redirecionar para o login)
Route::get('/', function () {
    return view('welcome');
});

// Grupo de rotas protegidas por autenticação (exige que o utilizador esteja com login feito)
Route::middleware(['auth', 'verified'])->group(function () {
    
    // Menu Principal / Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // CRUDs do Sistema
    Route::resource('categorias', CategoriaController::class);
    Route::resource('produtos', ProdutoController::class);
    Route::resource('clientes', ClienteController::class);
    Route::resource('tecnicos', TecnicoController::class);
    Route::resource('agendamentos', AgendamentoController::class);
    Route::resource('ordens-servico', OrdemServicoController::class);

    // Rota personalizada para gerar e exportar a Ordem de Serviço em PDF
    Route::get('ordens-servico/{id}/pdf', [OrdemServicoController::class, 'gerarPdf'])->name('ordens-servico.pdf');

});

// Rotas de autenticação geradas pelo Laravel Breeze (login, registo, recuperação de senha)
require __DIR__.'/auth.php';
