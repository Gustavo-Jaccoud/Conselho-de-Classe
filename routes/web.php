<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Forms_controller;
use App\Http\Controllers\Prof_controller;
use App\Http\Controllers\Turma_controller;
use App\Http\Controllers\disciplina_controller;
use App\Http\Controllers\matricula_controller;
use App\Http\Controllers\Resp_controller;

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
/* Rota home*/
Route::get('/', function () {
    return view('welcome');})->name('Home');
Route::get('/sobre', function () {
    return view('desenvolvedores');})->name('Sobre');
Route::get('/avaliar', [Forms_controller::class, 'Avaliar'])->name('avaliar');

/* Rota-1 forms_resposta*/
Route::post('/store',[Forms_controller::class,'store'])->name('turmas-store');

/* Rota - 2 forms_resposta*/
Route::get('/FormProf', [Forms_controller::class, 'FormProf'])->name('form-prof');

Route::post('/cadresp', [Forms_controller::class, 'cadresp'])->name('cadresp');

Route::prefix('prof')->group(function(){
    Route::get('/', [Prof_controller::class, 'index'])->name('prof-index')->middleware('auth');
    Route::get('/create', [Prof_controller::class, 'create'])->name('prof-create')->middleware('auth');
    Route::post('/', [Prof_controller::class, 'store'])->name('prof-store')->middleware('auth');
    Route::get('/{id}/edit', [Prof_controller::class, 'edit'])->where('id','[0-9]+')->name('prof-edit')->middleware('auth');
    Route::put('/{id}', [Prof_controller::class, 'update'])->where('id','[0-9]+')->name('prof-update')->middleware('auth');
    Route::get('/{id}', [Prof_controller::class, 'destroy'])->where('id','[0-9]+')->name('prof-destroy')->middleware('auth');
});

Route::prefix('turma')->group(function(){
    Route::get('/', [Turma_controller::class, 'index'])->name('turma-index')->middleware('auth');
    Route::get('/create', [Turma_controller::class, 'create'])->name('turma-create')->middleware('auth');
    Route::post('/', [Turma_controller::class, 'store'])->name('turma-store')->middleware('auth');
    Route::get('/{id}/edit', [Turma_controller::class, 'edit'])->where('id','[0-9]+')->name('turma-edit')->middleware('auth');
    Route::put('/{id}', [Turma_controller::class, 'update'])->where('id','[0-9]+')->name('turma-update')->middleware('auth');
    Route::get('/{id}', [Turma_controller::class, 'destroy'])->where('id','[0-9]+')->name('turma-destroy')->middleware('auth');
});
Route::prefix('disciplina')->group(function(){
    Route::get('/', [disciplina_controller::class, 'index'])->name('disciplina-index')->middleware('auth');
    Route::get('/create', [disciplina_controller::class, 'create'])->name('disciplina-create')->middleware('auth');
    Route::post('/', [disciplina_controller::class, 'store'])->name('disciplina-store')->middleware('auth');
    Route::get('/{id}/edit', [disciplina_controller::class, 'edit'])->where('id','[0-9]+')->name('disciplina-edit')->middleware('auth');
    Route::put('/{id}', [disciplina_controller::class, 'update'])->where('id','[0-9]+')->name('disciplina-update')->middleware('auth');
    Route::get('/{id}', [disciplina_controller::class, 'destroy'])->where('id','[0-9]+')->name('disciplina-destroy')->middleware('auth');

});

Route::prefix('matricula')->group(function(){
    Route::get('/', [matricula_controller::class, 'index'])->name('matricula-index')->middleware('auth');
    Route::get('/create', [matricula_controller::class, 'create'])->name('matricula-create')->middleware('auth');
    Route::get('/duplicar', [matricula_controller::class, 'duplicar'])->name('matricula-duplicar')->middleware('auth');
    Route::post('/', [matricula_controller::class, 'store'])->name('matricula-store')->middleware('auth');
    Route::get('/{id}/edit', [matricula_controller::class, 'edit'])->where('id','[0-9]+')->name('matricula-edit')->middleware('auth');
    Route::put('/{id}', [matricula_controller::class, 'update'])->where('id','[0-9]+')->name('matricula-update')->middleware('auth');
    Route::get('/{id}', [matricula_controller::class, 'destroy'])->where('id','[0-9]+')->name('matricula-destroy')->middleware('auth');

});
Route::prefix('administrador')->group(function(){
    Route::view('/','administrador.admin')->name('admin-view')->middleware('auth');

});
Route::prefix('resposta')->group(function(){
    Route::get('/', [Resp_controller::class, 'index'])->name('resposta-index')->middleware('auth');
    Route::get('/config', [Resp_controller::class, 'config'])->name('resposta-config')->middleware('auth');
    Route::post('/', [Resp_controller::class, 'store'])->name('resposta-store')->middleware('auth');

});
Auth::routes();
Route::get('/register', 'App\Http\Controllers\Auth\RegisterController@showRegistrationForm')->name('register')->middleware('auth');

