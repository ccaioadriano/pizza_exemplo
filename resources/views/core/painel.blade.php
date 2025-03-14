@extends('layouts.app')
@section('main')
    <div class="container">

        @if(session('success'))
            <div class="bg-green-500 p-3 rounded-md mb-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="row">
            <!-- Sidebar -->
            <nav class="col-md-3 col-lg-2 d-md-block bg-light sidebar">
                <div class="position-sticky pt-3">
                    <h4 class="text-center">Admin Dashboard</h4>
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="#">
                                Gerenciar Tenancies
                            </a>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button>Logout</button>
                            </form>
                        </li>
                    </ul>
                </div>
            </nav>

            <!-- Main Content -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div
                    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Lista de Tenants</h1>
                    <a href="{{ route('tenants.create') }}" class="btn btn-primary">Novo Tenant</a>
                </div>

                <!-- Table -->
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Nome (dominio)</th>
                                <th>Razão Social</th>
                                <th>Domínio</th>
                                <th>Tipo de estabelecimento</th>
                                <th>Plano</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                           

                            @foreach ($tenants as $tenant)
                                <tr>
                                    <td>{{ $tenant->id }}</td>
                                    <td>{{ $tenant->razao_social }}</td>
                                    <td>{{ $tenant->domains()->first()->domain ?? '' }}</td>
                                    <td>{{ $tenant->tipoEstabelecimento?->descricao ?? 'Não informado'}}</td>
                                    <td>Grátis</td>
                                    <td>
                                        <a href="#" class="btn btn-sm btn-warning">Editar</a>
                                        <a href="#" class="btn btn-sm btn-danger">Excluir</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </main>
        </div>
    </div>
@endsection