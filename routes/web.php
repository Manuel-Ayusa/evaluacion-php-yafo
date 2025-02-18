<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CMDBController;
use Illuminate\Support\Facades\Route;

Route::get('categorias', [CategoryController::class, 'index'])->name('categorias.index');
Route::get('categoria/{id}', [CMDBController::class, 'categorias'])->name('cmdb.categoria');
Route::get('CMDB/exportar/{id}', [CMDBController::class, 'export'])->name('cmdb.export');
Route::get('CMDB/create', [CMDBController::class, 'create'])->name('cmdb.create');
Route::post('CMDB/importar/', [CMDBController::class, 'import'])->name('cmdb.import');
