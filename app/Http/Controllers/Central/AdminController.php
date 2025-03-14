<?php

namespace App\Http\Controllers\Central;

use App\Http\Controllers\Controller;
use App\Models\Tenant;
use App\Models\TipoEstabelecimento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Stancl\Tenancy\Facades\Tenancy;

class AdminController extends Controller
{
    public function index()
    {
        return view('core.dashboard');
    }


    public function clientes()
    {
        return view('core.clientes', ['clientes' => Tenant::all()]);
    }


    public function formTenant(Request $request)
    {

        $tiposEstabelecimentos = TipoEstabelecimento::all();

        return view('core.criar-cliente', ['tipos_estabelecimentos' => $tiposEstabelecimentos]);
    }

    public function storeTenant(Request $request)
    {

        $slug = Str::slug(preg_replace('/[0-9]+/', '', $request->name), '-');

        $tenant = Tenant::create([
            'id' => $slug,
            'razao_social' => $request->razao_social,
            'tipo_estabelecimento_id' => $request->tipo_estabelecimento
        ]);

        $domain = config('tenancy.tenant.default_domain');

        $tenant->domains()->create([
            'domain' => $tenant->id . '.' . $domain,
            'tenant_id' => $tenant->id
        ]);

        // Diretórios base para o tenant
        $this->geraTenantViews($tenant->id);

        session()->flash('success', 'Cliente criado com sucesso e arquivos gerados!');

        return redirect('admin/dashboard');
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
