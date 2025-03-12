<?php

namespace App\Http\Controllers\Tenant;

use App\Http\Controllers\Controller;
use App\Models\Tenant;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index(Request $request)
    {
        return view(tenant('id') . '-views' . '.index');
    }
}
