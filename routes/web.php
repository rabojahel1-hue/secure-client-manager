<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClientRequestController;
use App\Models\ClientRequest;
use Illuminate\Support\Facades\Route;

Route::get('/login', [AuthController::class, 'showLogin'])
    ->name('login');

Route::post('/login', [AuthController::class, 'login'])
    ->name('login.submit');

Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout');

Route::get('/', function () {
    $totalRequests = ClientRequest::count();

    $inProgress = ClientRequest::where('status', 'in_progress')->count();

    $completed = ClientRequest::where('status', 'completed')->count();

    return view('dashboard.index', compact(
        'totalRequests',
        'inProgress',
        'completed'
    ));
})->middleware('auth');

Route::middleware('auth')->group(function () {

    Route::get('/requests', [ClientRequestController::class, 'index'])
        ->name('requests.index');

    Route::get('/requests/create', function () {
        return view('requests.create');
    })->name('requests.create');

    Route::post('/requests', [ClientRequestController::class, 'store'])
        ->name('requests.store');

    Route::get('/requests/{request}/edit', [ClientRequestController::class, 'edit'])
        ->name('requests.edit');

    Route::put('/requests/{clientRequest}', [ClientRequestController::class, 'update'])
        ->name('requests.update');

    Route::delete('/requests/{clientRequest}', [ClientRequestController::class, 'destroy'])
        ->name('requests.destroy');

    Route::get('/requests/trash', [ClientRequestController::class, 'trash'])
        ->name('requests.trash');

    Route::post('/requests/trash/{id}/restore', [ClientRequestController::class, 'restore'])
        ->name('requests.restore');

    Route::delete('/requests/trash/{id}', [ClientRequestController::class, 'forceDelete'])
        ->name('requests.forceDelete');
});
