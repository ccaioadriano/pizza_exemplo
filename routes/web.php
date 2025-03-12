<?php

use App\Http\Controllers\Central\AdminController;
use Illuminate\Support\Facades\Route;

//rotas centrais
foreach (config('tenancy.central_domains') as $domain) {
    Route::domain($domain)->group(function () {

        Route::get('/', function () {
            return "Painel admin <a href='/admin'>Painel</a>";
        });

        Route::get('/login', function () {
            return view('auth.login');
        });

        Route::get('/register', function () {
            return view('auth.register');
        });

        Route::get('/admin', [AdminController::class, 'index'])->middleware('auth')->name('admin_dash');
    });
}
require __DIR__ . '/auth.php';
