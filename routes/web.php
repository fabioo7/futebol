<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dataTableController;
use App\Http\Controllers\admController;


////////Jogos
Route::get('sorteio', [admController::class, 'sorteio']);
Route::get('jogadores',  [dataTableController::class, 'products'])->name('jogadores.datatables');
Route::POST('check',  [admController::class, 'check']);
Route::GET('timesMontados/{status}',  [admController::class, 'timesMontados']);


require __DIR__.'/auth.php';
