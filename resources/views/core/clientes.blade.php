@extends('adminlte::page')

@section('title', 'Clientes')

{{-- Plugins --}}
@section('plugins.Datatables', true)
@section('plugins.Sweetalert2', true)

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
                        <td><a href="http://{{ $cliente->domains()->first()->domain }}:8000"
                                target="_blank">{{$cliente->domains()->first()->domain ?? ''}}</a></td>
                        <td>{{ $cliente->plano ?? 'Grátis' }}</td>
                        <td>
                            <a href="/admin/cliente/{{ $cliente->id }}" class="btn btn-primary btn-sm">
                                <i class="fas fa-edit"></i> Editar
                            </a>
                            <button type="button" class="btn btn-danger btn-sm delete-btn" data-id="{{ $cliente->id }}">
                                <i class="fas fa-trash"></i> Excluir
                            </button>
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
        $('#clientesTable').DataTable();

        $('.delete-btn').on('click', function () {
            let clienteId = $(this).data('id');
            Swal.fire({
                title: 'Tem certeza?',
                text: "Esta ação não pode ser desfeita!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Sim, excluir!',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: `/admin/cliente/${clienteId}/delete`,
                        type: 'POST',
                        data: {
                            _method: 'DELETE',
                            _token: "{{ csrf_token() }}"
                        },
                        success: function () {
                            Swal.fire(
                                'Excluído!',
                                'O cliente foi removido com sucesso.',
                                'success'
                            ).then(() => {
                                location.reload();
                            });
                        },
                        error: function () {
                            Swal.fire(
                                'Erro!',
                                'Houve um problema ao excluir o cliente.',
                                'error'
                            );
                        }
                    });
                }
            });
        });
    });
</script>
@stop