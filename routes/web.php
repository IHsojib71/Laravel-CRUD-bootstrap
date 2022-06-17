<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CrudController;

Route::post('insert_record',[CrudController::class, 'insert']);
Route::get('/',[CrudController::class, 'get_data']);

Route::get('/edit/{id}',[CrudController::class, 'edit_data']);
Route::put('/update_record/{id}',[CrudController::class, 'update']);
Route::get('/delete/{id}',[CrudController::class, 'delete_data']);
