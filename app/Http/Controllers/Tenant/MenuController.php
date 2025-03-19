<?php

namespace App\Http\Controllers\Tenant;

use App\Http\Controllers\Controller;
use App\Models\Tenant;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
    {

        $dados = [
            'itens' => collect([
                ['id' => 1, 'nome' => 'Pizza Margherita', 'descricao' => 'Molho de tomate, mussarela e manjericão', 'preco' => 39.90],
                ['id' => 2, 'nome' => 'Hambúrguer Artesanal', 'descricao' => 'Pão brioche, carne 180g, queijo cheddar e bacon', 'preco' => 29.90],
                ['id' => 3, 'nome' => 'Lasanha Bolonhesa', 'descricao' => 'Camadas de massa, molho bolonhesa e queijo gratinado', 'preco' => 45.00],
                ['id' => 4, 'nome' => 'Salada Caesar', 'descricao' => 'Alface, frango grelhado, croutons e molho caesar', 'preco' => 25.50],
                ['id' => 5, 'nome' => 'Suco Natural de Laranja', 'descricao' => 'Suco 100% natural, sem açúcar', 'preco' => 9.90],
            ]),
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

        return view('tenants.zezinho-views.index', $dados);
    }
}
