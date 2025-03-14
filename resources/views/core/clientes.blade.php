@extends('adminlte::page')

@section('title', 'Clientes')

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
                        <td>{{$cliente->domains()->first()->domain ?? ''}}</td>
                        <td>{{ $cliente->plano ?? 'Grátis' }}</td>
                        <td>
                            <a href="{{--  --}}" class="btn btn-primary btn-sm">
                                <i class="fas fa-edit"></i> Editar
                            </a>
                            <form action="{{--  --}}" method="POST"
                                style="display:inline;">
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
{{-- DataTables CSS --}}
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap4.min.css">
@stop

@section('js')
{{-- jQuery e DataTables JS --}}
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap4.min.js"></script>

<script>
    $(document).ready(function () {
        $('#clientesTable').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.13.4/i18n/Portuguese-Brasil.json"
            }
        });
    });
</script>
@stop