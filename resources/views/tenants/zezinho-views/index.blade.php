@extends('layouts.app')
@section('title', tenant('id'))

@section('content')
<div class="container py-5">
    <!-- Cabeçalho com imagem do restaurante -->
    <div class="restaurant-header mb-5 text-center position-relative">
        <img src="{{ asset('images/pizza_banner.png') }}" alt="Banner do Restaurante"
            class="img-fluid rounded-4 shadow-lg" style="max-height: 350px; object-fit: cover; width: 100%;">
        <div class="overlay position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center text-white"
            style="background: rgba(0, 0, 0, 0.5);">
            <h1 class="display-3 fw-bold">{{ $informacoesRestaurante['nome'] }}</h1>
        </div>
    </div>

    <!-- Seção de Informações -->
    <div class="card info-card mb-5 border-0 shadow-sm p-4">
        <div class="card-body">
            <div class="row">
                <div class="col-md-8">
                    <h2 class="fw-bold text-dark">Sobre Nós</h2>
                    <p class="text-muted">
                        {{ $informacoesRestaurante['descricao'] ?? 'Deliciosas pizzas feitas com ingredientes frescos e muito amor!' }}
                    </p>
                    <div class="d-flex align-items-center gap-3 my-3">
                        <i class="fas fa-map-marker-alt text-danger fs-5"></i>
                        <span>{{ $informacoesRestaurante['endereco'] }}</span>
                    </div>
                    <div class="d-flex align-items-center gap-3 my-3">
                        <i class="fas fa-clock text-primary fs-5"></i>
                        <div>
                            <p class="mb-0">Seg-Sex:
                                {{ $informacoesRestaurante['horario_funcionamento']['segunda_sexta'] }}
                            </p>
                            <p class="mb-0">Sáb-Dom:
                                {{ $informacoesRestaurante['horario_funcionamento']['sabado_domingo'] }}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 d-flex align-items-center justify-content-center">
                    <div
                        class="status-badge text-white py-3 px-4 rounded-3 shadow-lg text-center bg-{{ $informacoesRestaurante['status'] == 'Aberto' ? 'success' : 'danger' }}">
                        <i class="fas fa-store fa-2x mb-2"></i>
                        <h3 class="mb-0">{{ $informacoesRestaurante['status'] }}</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Cardápio -->
    <h2 class="text-center mb-4 display-4 text-dark">Nosso Cardápio</h2>
    <div class="mb-3">
        <label for="select-menu" class="form-label fw-bold">Escolha um menu</label>
        <select name="menu" id="select-menu" class="form-select">
            <option value="">Selecione</option>
            @foreach($menus as $menu)
                <option value="{{ $menu->tipo_menu }}" {{ request('menu') == $menu->tipo_menu ? 'selected' : '' }}>
                    {{ ucfirst($menu->tipo_menu) }}
                </option>
            @endforeach
        </select>
    </div>
    <ul class="list-group">
        @foreach ($itens as $item)
            <li class="list-group-item d-flex align-items-center p-4 border-0 shadow-sm rounded-3 mb-3">
                <img src="{{ asset('images/dishes/pizza-classica.png') }}" class="dish-image rounded-3 me-4"
                    alt="{{ $item['titulo'] }}" style="width: 100px; height: 100px; object-fit: cover;">
                <div class="flex-grow-1">
                    <h5 class="fw-bold text-dark">{{ $item['titulo'] }}</h5>
                    <p class="text-muted mb-1">{{ $item['descricao'] }}</p>
                    <span class="h5 text-danger fw-bold">R$ {{ number_format($item['preco'], 2, ',', '.') }}</span>
                </div>
                <button class="btn btn-danger rounded-pill px-4 shadow-sm">
                    <i class="fas fa-cart-plus me-2"></i>Pedir
                </button>
            </li>
        @endforeach
    </ul>
</div>
@stop

@section('css')
<style>
    :root {
        --primary-color: #e74c3c;
        --secondary-color: #2c3e50;
    }

    .info-card {
        background: #fff;
        border-radius: 15px;
    }

    .menu-item {
        transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
        cursor: pointer;
    }

    .menu-item:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 24px rgba(0, 0, 0, 0.1);
    }

    .dish-image {
        height: 220px;
        object-fit: cover;
        transition: transform 0.3s ease-in-out;
    }

    .btn-danger {
        background-color: var(--primary-color);
        border: none;
        transition: background-color 0.3s ease;
    }

    .btn-danger:hover {
        background-color: #c0392b;
    }

    .status-badge {
        font-size: 1.2rem;
        border-radius: 10px;
        transition: transform 0.3s ease-in-out;
    }
</style>
@stop

@section('js')
<script>
    document.getElementById('select-menu').addEventListener('change', function () {
        window.location.href = '?menu=' + this.value;
    });
</script>
@stop