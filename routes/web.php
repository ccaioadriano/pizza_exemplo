<?php

use App\Http\Controllers\Central\AdminController;
use Illuminate\Support\Facades\Route;

//rotas centrais
foreach (config('tenancy.central_domains') as $domain) {
    Route::domain($domain)->group(function () {

        Route::get('/', function () {
            if (auth()->check()) {
                return redirect('/painel');
            }
            return redirect('/login');
        });

        Route::get('/login', function () {
            return view('auth.login');
        });

        Route::get('/register', function () {
            return view('auth.register');
        });

        Route::get('/painel', [AdminController::class, 'index'])->middleware('auth')->name('tenants.index');
        Route::get('/tenants/create', [AdminController::class, 'formTenant'])->name('tenants.create');
        Route::post('/tenants/store', [AdminController::class, 'storeTenant'])->name('tenants.store');
    });
}
require __DIR__ . '/auth.php';
