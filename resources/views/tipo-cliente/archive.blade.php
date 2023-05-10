<x-layouts.plantilla titulo="Tipo Clientes Deshabilitados"
    meta-description="Tipo Clientes deshabilitados meta description">
    {{-- CONTENIDO DEL MODULO TIPO-CLIENTE --}}

    <div class="container-fluid">

        <h1 class="text-center mt-2"> Tipo de Clientes Deshabilitados</h1>

        <div class="row">
            <div class="col-12">

                <!-- Botones para tabla clientes, crear y ver deshabilitados-->
                <div class="card shadow border-secondary">
                    <div class="card-header border-bottom shadow">
                        <div class="row justify-content-between py-1">
                            <div class="col-12 text-center">
                                <a href="{{ route('tpcl.index') }}" class="btn btn-outline-success bg-gradient"
                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                    data-bs-title="Ver los Registros de los Tipo de Clientes"><span
                                        class="d-none d-lg-inline-block">Regresar a Tabla Tipo de Clientes</span> <i
                                        class="bi bi-person-up"></i> </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Tabla ---->
                <div class="card shadow border-secondary">
                    <div class="card-body shadow">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover table-bordered" id="ordenamiento">
                                <thead class="thead">
                                    <tr>
                                        <th class="col-2 text-center shadow">ID</th>
                                        <th class="col-4 text-center shadow">Nombre</th>
                                        <th class="col-3 text-center shadow">Fecha</th>
                                        <th class="col-3 text-center shadow">Restaurar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tipoClientes as $tipoCliente)
                                        <tr>
                                            <td class="col-2 text-center align-middle">{{ $tipoCliente->id }}</td>
                                            <td class="col-4 text-justify align-middle">
                                                {{ Str::title($tipoCliente->nombre) }}
                                            </td>
                                            <td class="col-3 text-justify align-middle">
                                                {{ $tipoCliente->created_at->diffForHumans() }}
                                            </td>
                                            <td class="col-3 text-center">
                                                @if (Auth::user()->tipo_usuarios_id == 1 || Auth::user()->tipo_usuarios_id == 2)
                                                    <!-- Button trigger modal -->
                                                    <button type="button" class="btn btn-sm btn-outline-success mb-1"
                                                        title="Restaurar" data-bs-toggle="modal"
                                                        data-bs-target="#modal-restaurar-{{ $tipoCliente->id }}"><i
                                                            class="bi bi-file-arrow-up"></i> Restaurar
                                                    </button>
                                                @endif
                                            </td>
                                        </tr>
                                        @include('tipo-cliente.restaurar')
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
