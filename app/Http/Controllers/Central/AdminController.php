<?php

namespace App\Http\Controllers\Central;

use App\Http\Controllers\Controller;
use App\Models\Tenant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Stancl\Tenancy\Facades\Tenancy;

class AdminController extends Controller
{
    public function index()
    {
        return view('core.painel', ['tenants' => Tenant::all()]);
    }


    public function formTenant(Request $request)
    {
        return view('core.criar-cliente');
    }

    public function storeTenant(Request $request)
    {
        $tenant = Tenant::create([
            'id' => $request->cliente,
            'razao_social' => $request->razao_social,
        ]);

        $domain = config('tenancy.tenant.default_domain');

        $tenant->domains()->create([
            'domain' => $tenant->id . '.' . $domain,
            'tenant_id' => $tenant->id
        ]);

        // Diretórios base para o tenant
        $this->geraTenantViews($tenant->id);

        session()->flash('success', 'Cliente criado com sucesso e arquivos gerados!');

        return redirect('/painel');
    }

    private function geraTenantViews($tenantId)
    {
        $tenantPath = resource_path("views/tenants/{$tenantId}-views");
        $layoutPath = resource_path("views/layouts/{$tenantId}.blade.php");
        $indexPath = $tenantPath . "/index.blade.php";

        // Criar diretórios, se não existirem
        if (!File::exists($tenantPath)) {
            File::makeDirectory($tenantPath, 0755, true);
        }

        // Criar o arquivo de layout do tenant
        if (!File::exists($layoutPath)) {
            File::put($layoutPath, 'Ola ' . tenant('id'));
        }

        if (!File::exists($indexPath)) {
            File::put($indexPath, 'ola');
        }
    }


}
