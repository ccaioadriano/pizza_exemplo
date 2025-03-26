<?php

namespace App\Http\Controllers\Central;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTenantRequest;
use App\Models\Tenant;
use App\Models\TipoEstabelecimento;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

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
        $domain = config('tenancy.tenant.default_domain');

        try {
            DB::transaction(function () use ($request, $slug, $domain) {
                $tenant = Tenant::create([
                    'id' => $slug,
                    'razao_social' => $request->razao_social,
                    'tipo_estabelecimento_id' => $request->tipo_estabelecimento,
                    'email' => $request->email
                ]);

                $tenant->domains()->create([
                    'domain' => $tenant->id . '.' . $domain,
                    'tenant_id' => $tenant->id
                ]);
            });
            session()->flash('success', 'Cliente criado com sucesso e arquivos gerados!');
            return redirect('/admin/meus-clientes');

        } catch (\Throwable $th) {
            session()->flash('error', 'Erro ao salvar cliente!');
            Log::error('Erro ao salvar cliente: ' . $th->getMessage());
            return redirect('/admin/meus-clientes');
        }
    }

    public function edit(Tenant $tenant)
    {
        $tiposEstabelecimentos = TipoEstabelecimento::all();
        return view('core.editar-cliente', ['cliente' => $tenant, 'tipos_estabelecimentos' => $tiposEstabelecimentos]);
    }

    public function update(Request $request, Tenant $tenant)
    {
        try {
            DB::transaction(function () use ($request, $tenant) {

                $tenant->update([
                    'id' => $request->id,
                    'razao_social' => $request->razao_social,
                    'tipo_estabelecimento_id' => $request->tipo_estabelecimento,
                    'data' => ['email' => $request->email] // Salvando no JSON "data"
                ]);


                $domain = config('tenancy.tenant.default_domain');


                $tenant->domains()->update([
                    'tenant_id' => $tenant->id,
                    'domain' => $tenant->id . '.' . $domain
                ]);
            });

            session()->flash('success', 'Cliente atualizado com sucesso!');
            return redirect("/admin/meus-clientes");

        } catch (\Throwable $th) {
            session()->flash('error', 'Erro ao atualizar o cliente!');
            Log::error('Erro ao atualizar cliente: ' . $th->getMessage());
            return redirect("/admin/meus-clientes");
        }
    }

}
