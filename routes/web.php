<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ConfiguracoesController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Supervisor\SupervisorController;
use App\Http\Controllers\Supervisor\lacamentosController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\RelatoriosController;
use App\Http\Controllers\Admin\SetoresController;
use App\Http\Controllers\Admin\SolicitacoesController;
use App\Http\Controllers\Admin\SolicitController;
use App\Http\Controllers\Supervisor\SupervisorRelatoriosController;
use App\Http\Controllers\Supervisor\SupervisorSolicitacoes;
use App\Http\Controllers\Supervisor\UserController as SupervisorUserController;
use App\Http\Controllers\User\UserLancamento;
use App\Http\Controllers\User\UserSolitacoesController;
use App\Http\Controllers\User\UsuarioController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\User\UserRelatoriosController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

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

Route::get('/', function () {
    return view('auth.login');
});


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

//////// Admin ///////

Route::middleware(['auth', 'regra:admin'])->group(function () {

    Route::get('/admin/painel', [AdminController::class, 'index'])->name('admin.painel');
    Route::resource('adminuser', UserController::class);
    Route::get('/adminuser/delete/{id}', [UserController::class, 'delete'])->name('adminuser.delete');

    Route::resource('setores', SetoresController::class);

    Route::resource('solicitacoes', SolicitacoesController::class);
    Route::get('/adminsolicitacoes/pendentes', [SolicitController::class, 'solpendentes'])->name('solicitacoes.pendentes');
    Route::get('/adminsolicitacoes/aprovadas', [SolicitController::class, 'solconcluidas'])->name('solicitacoes.aprovadas');
    Route::post('/adminsolicitacoes/salvar', [SolicitController::class, 'salvar'])->name('solicitacoes.salvar');
    Route::post('/adminsolicitacoes/excluir', [SolicitController::class, 'excluirSolicitacoes'])->name('solicitacoes.excluir');

    Route::get('/relatorios', [RelatoriosController::class, 'index'])->name('relatorios.index');

    Route::match(['get', 'post'], '/relatorios/buscar', [RelatoriosController::class, 'buscar'])->name('relatorios.buscar');
    Route::get('/relatorios/pdf/{id}', [RelatoriosController::class, 'gerarPdf'])->name('relatorios.pdf');

    Route::get('/adminperfil/editar', [AdminController::class, 'editarPerfil'])->name('admin.editar.perfil');
    Route::post('/adminperfil/salvar/{id}', [AdminController::class, 'salvarPerfil'])->name('admin.salvar.perfil');

    Route::get('/admin/configuracoes', [ConfiguracoesController::class, 'index'])->name('admin.config');
    Route::get('/admin/configuracoes/editar', [ConfiguracoesController::class, 'editar'])->name('config.edit');




});


//////// Supervisor ///////

Route::middleware(['auth', 'regra:supervisor'])->group(function () {

    Route::get('/supervisor/painel', [SupervisorController::class, 'index'])->name('supervisor.painel');
    Route::resource('usuarios', SupervisorUserController::class);
    Route::get('/supervisor/delete/{id}', [SupervisorUserController::class, 'delete'])->name('supervisor.delete');

    Route::resource('lancamentos', lacamentosController::class);

    Route::get('/sup_solicitacoes/pendentes', [SupervisorSolicitacoes::class, 'sol_pendentes'])->name('supervisor.pendentes');
    Route::get('/sup_solicitacoes/aprovadas', [SupervisorSolicitacoes::class, 'sol_concluidas'])->name('supervisor.aprovadas');
    Route::post('/sup_solicitacoes/salvar', [SupervisorSolicitacoes::class, 'salvar'])->name('supervisor.salvar');
    Route::post('/sup_solicitacoes/excluir', [SupervisorSolicitacoes::class, 'excluirSolicitacoes'])->name('supervisor.excluir');

    Route::get('/supervisor/relatorios', [SupervisorRelatoriosController::class, 'index'])->name('supervisor.relatorios.index');
    Route::get('/sup_relatorios/buscar', [SupervisorRelatoriosController::class, 'buscar'])->name('supervisor.relatorios.buscar');
    Route::get('/sup_relatorios/pdf/{id}', [SupervisorRelatoriosController::class, 'gerarPdf'])->name('sup.relatorios.pdf');

    Route::get('/perfil/editar', [SupervisorController::class, 'editarPerfil'])->name('editar.perfil');
    Route::post('/perfil/salvar/{id}', [SupervisorController::class, 'salvarPerfil'])->name('salvar.perfil');


});



//////// User ///////

Route::middleware(['auth', 'regra:user'])->group(function () {

    Route::get('/user/painel', [UsuarioController::class, 'index'])->name('user.painel');

    Route::get('userlancamento', [UserLancamento::class, 'index'])->name('userlancamento.index');
    Route::post('userlancamento/store', [UserLancamento::class, 'store'])->name('userlancamento.store');

    Route::get('/user_solicitacoes/pendentes', [UserSolitacoesController::class, 'sol_pendentes'])->name('usuario.pendentes');
    Route::get('/user_solicitacoes/aprovadas', [UserSolitacoesController::class, 'sol_concluidas'])->name('usuario.aprovadas');
    Route::post('/user_solicitacoes/salvar', [UserSolitacoesController::class, 'salvar'])->name('usuario.salvar');
    Route::post('/user_solicitacoes/excluir', [UserSolitacoesController::class, 'excluirSolicitacoes'])->name('usuario.excluir');

    Route::get('/usuario/relatorios', [UserRelatoriosController::class, 'index'])->name('user.relatorios.index');
    Route::get('/usuario/relatorios/buscar', [UserRelatoriosController::class, 'buscar'])->name('user.relatorios.buscar');
    Route::get('/usuario/relatorios/pdf/{id}', [UserRelatoriosController::class, 'gerarPdf'])->name('user.relatorios.pdf');

    Route::get('/userperfil/editar', [UsuarioController::class, 'editarPerfil'])->name('user.editar.perfil');
    Route::post('/userperfil/salvar/{id}', [UsuarioController::class, 'salvarPerfil'])->name('user.salvar.perfil');



});


require __DIR__.'/auth.php';
