<?php

namespace App\Http\Controllers\Central;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTenantRequest;
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


    public function formTenant()
    {

        $tiposEstabelecimentos = TipoEstabelecimento::all();

        return view('core.criar-cliente', ['tipos_estabelecimentos' => $tiposEstabelecimentos]);
    }

    public function storeTenant(StoreTenantRequest $request)
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

        session()->flash('success', 'Cliente criado com sucesso e arquivos gerados!');

        return redirect('admin/dashboard');
    }

    public function update(Request $request, Tenant $tenant){
        return view('auth.login');
    }

}
