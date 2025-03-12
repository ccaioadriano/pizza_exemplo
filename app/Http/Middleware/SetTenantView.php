<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Stancl\Tenancy\Facades\Tenancy;
use Symfony\Component\HttpFoundation\Response;

class SetTenantView
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $tenant = tenancy()->tenant;

        if (!$tenant) {
            abort(404, 'Cliente não encontrado.');
        }

        // Definindo o nome do layout e do diretório de views com base no tenant
        $tenantLayout = 'layouts.' . $tenant->id;
        $tenantViewFolder = $tenant->id . '-views';

        // Compartilhando as variáveis globalmente com as views do Laravel
        View::share('tenant_layout', $tenantLayout);
        View::share('tenant_view_folder', $tenantViewFolder);

        return $next($request);
    }
}
