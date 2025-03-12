@extends('layouts.app')
@section('main')
    <div class="container">
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
                        </li>
                    </ul>
                </div>
            </nav>

            <!-- Main Content -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div
                    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Lista de Tenants</h1>
                    <a href="#" class="btn btn-primary">Novo Tenant</a>
                </div>

                <!-- Table -->
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nome</th>
                                <th>Domínio</th>
                                <th>Status</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $mockTenants = [
                                    ['id' => 1, 'name' => 'Legítimo', 'domain' => 'legitimo.localhost', 'active' => true],
                                    ['id' => 2, 'name' => 'Foo', 'domain' => 'foo.localhost', 'active' => false],
                                    ['id' => 3, 'name' => 'Bar', 'domain' => 'bar.localhost', 'active' => true],
                                ];
                            @endphp

                            @foreach ($mockTenants as $tenant)
                                <tr>
                                    <td>{{ $tenant['id'] }}</td>
                                    <td>{{ $tenant['name'] }}</td>
                                    <td>{{ $tenant['domain'] }}</td>
                                    <td>{{ $tenant['active'] ? 'Ativo' : 'Inativo' }}</td>
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