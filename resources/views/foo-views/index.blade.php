@extends($tenant_layout)

@section('title', 'menu')
@section('main')
    <div>
        <div class="menu-container">
            <h2 class="text-center mb-4">Cardápio </h2>
            <div class="menu-item">
                <span>🍕 Pizza Margherita</span>
                <span>R$ 30,00</span>
            </div>
            <div class="menu-item">
                <span>🍔 Cheeseburger</span>
                <span>R$ 20,00</span>
            </div>
            <div class="menu-item">
                <span>🌭 Cachorro-Quente</span>
                <span>R$ 15,00</span>
            </div>
            <div class="menu-item">
                <span>🥤 Refrigerante</span>
                <span>R$ 8,00</span>
            </div>
        </div>
    </div>
@endsection