<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CMDBController;
use Illuminate\Support\Facades\Route;

Route::get('/', [CategoryController::class, 'index'])->name('categorias.index');
Route::post('categoria/', [CMDBController::class, 'categorias'])->name('cmdb.categoria');
Route::post('CMDB/exportar/', [CMDBController::class, 'export'])->name('cmdb.export');
Route::get('CMDB/create/', [CMDBController::class, 'create'])->name('cmdb.create');
Route::post('CMDB/importar/', [CMDBController::class, 'import'])->name('cmdb.import');
