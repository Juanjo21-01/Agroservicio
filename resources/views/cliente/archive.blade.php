<x-layouts.plantilla titulo="Clientes Deshabilitados" meta-description="Clientes deshabilitados meta description">
    {{-- CONTENIDO DEL MODULO CLIENTES --}}

    <div class="container-fluid">

        <h1 class="text-center mt-2">Clientes Deshabilitados</h1>

        <div class="row">
            <div class="col-12">

                <!-- Botones para tabla tipo clientes, crear y ver deshabilitados-->
                <div class="card shadow border-secondary">
                    <div class="card-header border-bottom shadow">
                        <div class="row justify-content-between py-1">
                            <div class="col-12 text-center">
                                <a href="{{ route('cl.index') }}" class="btn btn-outline-success bg-gradient"
                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                    data-bs-title="Ver los Registros de los Clientes"><span
                                        class="d-none d-lg-inline-block">Regresar a la Tabla Clientes</span> <i
                                        class="bi bi-arrow-up-right"></i> </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Mensaje de Alerta ---->
                @if ($message = Session::get('success'))
                    <div class="card shadow border-secondary alert alert-success alert-dismissible fade show"
                        role="alert">
                        <span class="text-center">{{ $message }} </span>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"
                            data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Cerrar Mensaje"></button>
                    </div>
                @endif

                <!-- Tabla ---->
                <div class="card shadow border-secondary">
                    <div class="card-body shadow">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover table-bordered" id="ordenamiento">
                                <thead class="thead">
                                    <tr>
                                        <th class="col-1 text-center shadow align-middle">ID</th>
                                        <th class="col-3 text-center shadow align-middle">Nombre</th>
                                        <th class="col-1 text-center shadow align-middle">Telefono</th>
                                        <th class="col-2 text-center shadow align-middle">Dirección</th>
                                        <th class="col-1 text-center shadow align-middle">Tipo de Cliente</th>
                                        <th class="col-2 text-center shadow align-middle">Fecha</th>
                                        <th class="col-2 text-center shadow align-middle">Restaurar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($clientes as $cliente)
                                        <tr>
                                            <td class="col-1 text-center align-middle">{{ $cliente->id }}</td>
                                            <td class="col-3 text-justify align-middle">
                                                {{ Str::title($cliente->nombre) }}
                                            </td>
                                            <td class="col-1 text-justify align-middle">{{ $cliente->telefono }}
                                            </td>
                                            <td class="col-2 text-justify align-middle">
                                                {{ Str::title($cliente->direccion) }}
                                            </td>
                                            <td class="col-1 text-justify align-middle">
                                                @foreach ($tipoClientes as $tipoCliente)
                                                    @if ($cliente->tipo_cliente_id == $tipoCliente->id)
                                                        {{ Str::title($tipoCliente->nombre) }}
                                                    @else
                                                    @endif
                                                @endforeach
                                            </td>
                                            <td class="col-2 text-justify align-middle">
                                                {{ $cliente->created_at->diffForHumans() }}
                                            <td class="col-2 text-center">
                                                @if (Auth::user()->tipo_usuarios_id == 1 || Auth::user()->tipo_usuarios_id == 2)
                                                    <!-- Button trigger modal -->
                                                    <button type="button" class="btn btn-sm btn-outline-success mb-1"
                                                        title="Restaurar" data-bs-toggle="modal"
                                                        data-bs-target="#modal-restaurar-{{ $cliente->id }}"><i
                                                            class="bi bi-file-arrow-up"></i> Restaurar
                                                    </button>
                                                @endif
                                            </td>
                                        </tr>
                                        @include('cliente.restaurar')
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.plantilla>
