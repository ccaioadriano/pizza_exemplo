<?php

namespace App\Http\Controllers\Tenant;

use App\Http\Controllers\Controller;
use App\Models\Item;
use App\Models\ItemMenu;
use App\Models\Menu;
use App\Models\Tenant;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index(Request $request)
    {

        $menu = Menu::where('tipo_menu', $request->menu)->first() ?? '';

        //dd($menu);

        $dados = [
            'menus' => Menu::all() ?? [],
            'itens' => $menu->items ?? Item::all(),
            'informacoesRestaurante' => [
                'nome' => 'Sabor & Arte Restaurante',
                'horario_funcionamento' => [
                    'segunda_sexta' => '11:00 - 22:00',
                    'sabado_domingo' => '12:00 - 23:00'
                ],
                'formas_pagamento' => ['Dinheiro', 'Cartão de Crédito', 'Cartão de Débito', 'Pix'],
                'status' => now()->format('H:i') >= '11:00' && now()->format('H:i') <= '22:00' ? 'Aberto' : 'Fechado',
                'endereco' => 'Rua das Delícias, 123 - Centro, São Paulo - SP'
            ]
        ];

        //dd(Item::find(1)->menus, Menu::find(1)->items);

        return view('tenants.zezinho-views.index', $dados);
    }

    public function addItemMenu(Request $request)
    {

    }
}
