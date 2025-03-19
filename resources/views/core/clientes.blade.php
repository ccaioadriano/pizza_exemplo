@extends('adminlte::page')

@section('title', 'Clientes')

{{-- Plugins --}}
@section('plugins.Datatables', true)

@section('content_header')
<h1>Lista de Clientes</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Clientes Cadastrados</h3>
    </div>
    <div class="card-body">
        <table id="clientesTable" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Razão Social</th>
                    <th>Domínio</th>
                    <th>Plano</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($clientes as $cliente)
                    <tr>
                        <td>{{ $cliente->id }}</td>
                        <td>{{ $cliente->razao_social }}</td>
                        <td><a href="http://{{ $cliente->domains()->first()->domain }}:8000" target="_blank">{{$cliente->domains()->first()->domain ?? ''}}</a></td>
                        <td>{{ $cliente->plano ?? 'Grátis' }}</td>
                        <td>
                            <a href="{{--  --}}" class="btn btn-primary btn-sm">
                                <i class="fas fa-edit"></i> Editar
                            </a>
                            <form action="{{--  --}}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">
                                    <i class="fas fa-trash"></i> Excluir
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@stop

@section('css')


@stop

@section('js')


<script>
    $(document).ready(function () {
        $('#clientesTable').DataTable({

        });
    });
</script>
@stop