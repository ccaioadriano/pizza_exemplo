@extends('adminlte::page')

@section('title', 'Cadastrar Cliente')

@section('content_header')
<h1 class="text-primary"><i class="fas fa-user-plus"></i> Cadastrar Novo Cliente</h1>
@stop

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card shadow-lg border-0">
            <div class="card-header bg-primary text-white">
                <h3 class="card-title"><i class="fas fa-edit"></i> Preencha os dados abaixo</h3>
            </div>
            <div class="card-body">
                <form action="{{route('tenants.store')}}" method="POST">
                    @csrf

                    <div class="row">
                        {{-- Nome --}}
                        <div class="col-md-6">
                            <x-adminlte-input name="nome" label="Nome" placeholder="Digite o nome do cliente"
                                fgroup-class="mb-4">
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
                                placeholder="Digite a razão social" fgroup-class="mb-4">
                                <x-slot name="prependSlot">
                                    <div class="input-group-text text-primary">
                                        <i class="fas fa-building"></i>
                                    </div>
                                </x-slot>
                            </x-adminlte-input>
                        </div>
                    </div>

                    <div class="row">
                        {{-- Domínio --}}
                        <div class="col-md-6">
                            <x-adminlte-input name="dominio" label="Domínio" placeholder="exemplo.com.br"
                                fgroup-class="mb-4">
                                <x-slot name="prependSlot">
                                    <div class="input-group-text text-success">
                                        <i class="fas fa-globe"></i>
                                    </div>
                                </x-slot>
                            </x-adminlte-input>
                        </div>

                        {{-- Plano --}}
                        <div class="col-md-6">
                            <x-adminlte-select name="plano" label="Plano" fgroup-class="mb-4">
                                <x-slot name="prependSlot">
                                    <div class="input-group-text text-warning">
                                        <i class="fas fa-list"></i>
                                    </div>
                                </x-slot>
                                <option value="basico">Básico</option>
                                <option value="intermediario">Intermediário</option>
                                <option value="avancado">Avançado</option>
                            </x-adminlte-select>
                        </div>
                    </div>

                    {{-- Email --}}
                    <x-adminlte-input name="email" type="email" label="Email" placeholder="mail@example.com"
                        fgroup-class="mb-4">
                        <x-slot name="prependSlot">
                            <div class="input-group-text text-danger">
                                <i class="fas fa-envelope"></i>
                            </div>
                        </x-slot>
                    </x-adminlte-input>

                    {{-- Botão de Enviar --}}
                    <div class="text-center">
                        <x-adminlte-button type="submit" theme="success" label="Cadastrar Cliente" icon="fas fa-save"
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
        border-color: #007bff;
        box-shadow: 0 0 10px rgba(0, 123, 255, 0.5);
    }

    /* Botão animado */
    .btn-success {
        transition: all 0.3s ease-in-out;
    }

    .btn-success:hover {
        transform: scale(1.05);
        box-shadow: 0px 4px 10px rgba(40, 167, 69, 0.5);
    }

    .preloader {
        display: none !important;
    }
</style>
@stop

@section('js')
<script>
    console.log("Formulário de Cliente carregado com sucesso!");
</script>
@stop