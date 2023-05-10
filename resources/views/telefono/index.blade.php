<x-layouts.plantilla titulo="Telefonos" meta-description="Telefonos meta description">
    {{-- CONTENIDO DEL MODULO Telefonos --}}

    <div class="container-fluid">

        <h1 class="text-center mt-2"> Teléfonos de Proveedores</h1>

        <div class="row">
            <div class="col-12">

                <!-- Botones para tabla proveedores, crear y ver deshabilitados-->
                <div class="card shadow border-secondary">
                    <div class="card-header border-bottom shadow">
                        <div class="row justify-content-between py-1">
                            <div class="col-3 text-center">
                                <a href="{{ route('prov.index') }}" class="btn btn-outline-secondary bg-gradient"
                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                    data-bs-title="Ver los Registros de los Proveedores"><span
                                        class="d-none d-lg-inline-block">Ir a Tabla de Proveedores</span>
                                    <i class="bi bi-arrow-up-right"></i> </a>
                            </div>
                            <div class="col-3 text-center">
                                <a href="{{ route('tel.create') }}" class="btn btn-success bg-gradient"
                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                    data-bs-title="Crear Nuevo Registro"> <i class="bi bi-plus-circle"></i>
                                    <span class="d-none d-sm-inline-block">{{ __('Crear Nuevo') }}</span> </a>
                            </div>
                            <div class="col-3 text-center">
                                <a href="{{ route('tel.archive') }}" class="btn btn-danger bg-gradient"
                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                    data-bs-title="Ver Registros Deshabilitados"> <i class="bi bi-file-earmark-x"></i>
                                    <span class="d-none d-sm-inline-block">{{ __('Deshabilitados') }} </span></a>
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
                                        <th class="col-1 text-center shadow">ID</th>
                                        <th class="col-4 text-center shadow">Proveedor</th>
                                        <th class="col-3 text-center shadow">Telefono</th>
                                        <th class="col-2 text-center shadow">Fecha</th>
                                        <th class="col-2 text-center shadow">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($telefonos as $telefono)
                                        <tr>
                                            <td class="col-1 text-center align-middle">{{ $telefono->id }}</td>
                                            <td class="col-4 text-justify align-middle">
                                                @foreach ($proveedores as $proveedore)
                                                    @if ($proveedore->id == $telefono->proveedor_id)
                                                        {{ Str::title($proveedore->nombre) }}
                                                    @endif
                                                @endforeach
                                            </td>
                                            <td class="col-3 text-center align-middle">{{ $telefono->telefono }} </td>
                                            <td class="col-2 text-justify align-middle">
                                                {{ $telefono->created_at->diffForHumans() }}
                                            </td>
                                            <td class="col-2 text-center">
                                                <a class="btn btn-sm btn-outline-primary mb-1" data-bs-toggle="tooltip"
                                                    data-bs-placement="top" data-bs-title="Ver"
                                                    href="{{ route('tel.show', $telefono->id) }}"><i
                                                        class="bi bi-eye-fill"></i></a>
                                                <a class="btn btn-sm btn-outline-success mb-1" data-bs-toggle="tooltip"
                                                    data-bs-placement="top" data-bs-title="Editar"
                                                    href="{{ route('tel.edit', $telefono->id) }}"><i
                                                        class="bi bi-pencil-square"></i></a>
                                                @if (Auth::user()->tipo_usuarios_id == 1 || Auth::user()->tipo_usuarios_id == 2)
                                                    <!-- Button trigger modal -->
                                                    <button type="button" class="btn btn-sm btn-outline-danger mb-1"
                                                        title="Deshabilitar" data-bs-toggle="modal"
                                                        data-bs-target="#modal-deshabilitar-{{ $telefono->id }}"><i
                                                            class="bi bi-archive-fill"></i>
                                                    </button>
                                                @endif
                                        </tr>
                                        @include('telefono.deshabilitar')
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
