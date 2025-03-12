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

        return view('core.dashboard', ['tenants' => Tenant::all()]);
    }
}
