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
            Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
            Route::get('/meus-clientes', [AdminController::class, 'clientes'])->name('tenants.list');
            Route::get('/clientes/novo', [AdminController::class, 'formTenant'])->name('tenants.create');
            Route::post('/clientes/store', [AdminController::class, 'storeTenant'])->name('tenants.store');
        });
    });
}
require __DIR__ . '/auth.php';
