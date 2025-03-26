@extends('adminlte::page')

@section('title', 'Editar Cliente')
@section('content_header')
<h1 class="text-primary"><i class="fas fa-user-edit"></i> Editar Cliente</h1>
@stop

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card shadow-lg border-0">
            <div class="card-header bg-warning text-white">
                <h3 class="card-title"><i class="fas fa-edit"></i> Atualize os dados do cliente</h3>
            </div>
            <div class="card-body">
                <form action="/admin/cliente/{{ $cliente->id }}" method="POST">
                    @csrf
                    @method('PUT') {{-- Define o método PUT para edição --}}

                    <div class="row">
                        {{-- Nome --}}
                        <div class="col-md-6">
                            <x-adminlte-input name="id" label="Nome" placeholder="Digite o nome do cliente (dominio)"
                                fgroup-class="mb-4" value="{{ old('name', $cliente->id) }}">
                                <x-slot name="prependSlot">
                                    <div class="input-group-text text-lightblue">
                                        <i class="fas fa-user"></i>
                                    </div>
                                </x-slot>
                            </x-adminlte-input>
                        </div>

                        {{-- Razão Social --}}
                        <div class="col-md-6">
                            <x-adminlte-input name="razao_social" label="Razão Social"
                                placeholder="Digite a razão social" fgroup-class="mb-4"
                                value="{{ old('razao_social', $cliente->razao_social) }}">
                                <x-slot name="prependSlot">
                                    <div class="input-group-text text-primary">
                                        <i class="fas fa-building"></i>
                                    </div>
                                </x-slot>
                            </x-adminlte-input>
                        </div>
                    </div>

                    <div class="row">
                        {{-- Plano --}}
                        {{-- <div class="col-md-6">
                            <x-adminlte-select name="plano" label="Plano" fgroup-class="mb-4">
                                <option value="basico" {{ old('plano', $cliente->plano) == 'basico' ? 'selected' : ''
                                    }}>
                                    Básico</option>
                                <option value="intermediario" {{ old('plano', $cliente->plano) == 'intermediario' ?
                                    'selected' : '' }}>
                                    Intermediário</option>
                                <option value="avancado" {{ old('plano', $cliente->plano) == 'avancado' ? 'selected' :
                                    '' }}>Avançado
                                </option>
                            </x-adminlte-select>
                        </div> --}}

                        {{-- Tipo de Estabelecimento --}}
                        <div class="col-md-6">
                            <x-adminlte-select name="tipo_estabelecimento" label="Tipo de estabelecimento"
                                fgroup-class="mb-4">
                                @foreach ($tipos_estabelecimentos as $tp)
                                    <option value="{{ $tp->id }}" {{ old('tipo_estabelecimento') == $tp->id ? 'selected' : '' }}>
                                        {{ $tp->descricao }}
                                    </option>
                                @endforeach
                            </x-adminlte-select>
                        </div>
                    </div>

                    {{-- Email --}}
                    <x-adminlte-input name="email" type="email" label="Email" placeholder="mail@example.com"
                        fgroup-class="mb-4" value="{{ old('email', $cliente->email) }}">
                        <x-slot name="prependSlot">
                            <div class="input-group-text text-danger">
                                <i class="fas fa-envelope"></i>
                            </div>
                        </x-slot>
                    </x-adminlte-input>
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                    {{-- Botões de Ação --}}
                    <div class="text-center">
                        <x-adminlte-button type="submit" theme="warning" label="Atualizar Cliente" icon="fas fa-save"
                            class="btn-lg px-5" />
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
@stop

@section('css')
<style>
    /* Suavizando sombras e bordas */
    .card {
        border-radius: 10px;
    }

    .card-header {
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
    }

    /* Efeito ao passar o mouse nos inputs */
    .form-control:focus {
        border-color: #ffc107;
        box-shadow: 0 0 10px rgba(255, 193, 7, 0.5);
    }

    /* Botão animado */
    .btn-warning {
        transition: all 0.3s ease-in-out;
    }

    .btn-warning:hover {
        transform: scale(1.05);
        box-shadow: 0px 4px 10px rgba(255, 193, 7, 0.5);
    }

    .preloader {
        display: none !important;
    }
</style>
@stop

@section('js')
<script>
    console.log("Formulário de Edição de Cliente carregado com sucesso!");
</script>
@stop