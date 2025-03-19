<?php

use App\Http\Controllers\Central\AdminController;
use Illuminate\Support\Facades\Route;

//rotas centrais
foreach (config('tenancy.central_domains') as $domain) {
    Route::domain($domain)->group(function () {

        Route::get('/', function () {
            if (auth()->check()) {
                return redirect('admin/dashboard');
            }
            return redirect('/login');
        });

        Route::get('/login', function () {
            return view('auth.login');
        });

        Route::get('/register', function () {
            return view('auth.register');
        });

        Route::middleware(['auth'])->prefix('admin')->group(function () {
            Route::get('/dashboard', [AdminController::class, 'index']);
            Route::get('/meus-clientes', [AdminController::class, 'clientes']);
            Route::get('/clientes/novo', [AdminController::class, 'formTenant']);
            Route::post('/clientes/store', [AdminController::class, 'storeTenant']);
            Route::get('/admin/cliente/{tenant}', [AdminController::class, 'update']);
        });
    });
}
require __DIR__ . '/auth.php';
