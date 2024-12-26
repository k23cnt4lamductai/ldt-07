<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::get('/khoa',[LDTKhoaController::class,'ldtGetAllKhoa'])->name('ldtKhoa.ldtgetallkhoa');
Route::get('/khoa/detail/{makh}',[LDTKhoaController::class,'ldtGetKhoa'])->name('ldtKhoa.ldtgetKhoa');
// #khoa - edit
Route::get('/khoa/edit/{makh}',[LDTKhoaController::class,'ldtEdit'])->name('ldtKhoa.ldtEdit');
Route::post('/khoa/edit',[LDTKhoaController::class,'ldtEditSummit'])->name('ldtKhoa.ldtEditSubmit');
// # khoa - insert
Route::get('/khoa/insert',[LDTKhoaController::class,'ldtInsert'])->name('ldtKhoa.ldtInsert');
Route::post('/khoa/insert',[LDTKhoaController::class,'ldtInsertSubmit'])->name('ldtKhoa.ldtInsertSubmit');
#khoa - delete
Route::get('/khoa/delete/{makh}',[LDTKhoaController::class,'ldtDelete'])->name('ldtKhoa.ldtDelete');
#monhoc
Route::get('/monhoc',[LDTMonHocController::class,'ldtList'])->name('ldtmonhoc.ldtList');