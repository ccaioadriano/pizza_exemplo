<?php

namespace App\Http\Controllers\Central;

use App\Http\Controllers\Controller;
use App\Models\Tenant;
use Illuminate\Http\Request;
use Stancl\Tenancy\Facades\Tenancy;

class AdminController extends Controller
{
    public function index()
    {
        return view('core.painel', ['tenants' => Tenant::all()]);
    }


    public function formTenant(Request $request){
        return view('core.criar-cliente');
    }    

    public function storeTenant(Request $request)
    {
        $tenant = Tenant::create([
            'id' => $request->cliente,
            'razao_social' => $request->razaoSocial,
        ]);

        $domain = config('tenancy.tenant.default_domain');

        $tenant->domains()->create([
            'domain' => $tenant->id . '.' . $domain,
            'tenant_id' => $tenant->id
        ]);

        session()->flash('success', 'Cliente criado com sucesso!');

        return redirect()->back();
    }
}
