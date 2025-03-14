@extends('layouts.app')

@section('main')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-lg border-0">
                    <div class="card-header bg-primary text-white text-center">
                        <h3 class="mb-0">Cadastrar Novo Tenant</h3>
                    </div>
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="{{ route('tenants.store') }}" method="POST">
                            @csrf

                            <div class="mb-3">
                                <label for="cliente" class="form-label">ID do Cliente</label>
                                <input type="text" id="cliente" name="cliente"
                                    class="form-control @error('cliente') is-invalid @enderror" required>
                                @error('cliente')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="razaoSocial" class="form-label">Razão Social</label>
                                <input type="text" id="razaoSocial" name="razao_social"
                                    class="form-control @error('razaoSocial') is-invalid @enderror" required>
                                @error('razaoSocial')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-user-plus"></i> Cadastrar Cliente
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="text-center mt-3">
                    <a href="{{ route('tenants.index') }}" class="btn btn-outline-secondary">
                        <i class="fas fa-arrow-left"></i> Voltar
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection