<?php

use App\Http\Controllers\CollaboratorController;
use App\Http\Controllers\ContractController;

Route::get('/collaborators', [CollaboratorController::class, 'index']);
Route::get('/collaborators/sync', [CollaboratorController::class, 'sync']);
Route::get('/contracts/generate/{id}', [ContractController::class, 'generateContract']);
Route::get('/collaborators/list', [CollaboratorController::class, 'listView']);
