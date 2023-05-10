<x-layouts.plantilla titulo="Conversiones" meta-description="Conversiones meta description">
    {{-- CONTENIDO DEL MODULO Conversiones --}}

    <div class="container-fluid">

        <h1 class="text-center mt-2"> Unidad de Medidas </h1>

        <div class="row">
            <div class="col-12">

                <!-- Botones para tabla productos, crear y ver deshabilitados-->
                <div class="card shadow border-secondary">
                    <div class="card-header border-bottom shadow">
                        <div class="row justify-content-between py-1">
                            <div class="col-3 text-center">
                                <a href="{{ route('prod.index') }}" class="btn btn-outline-secondary bg-gradient"
                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                    data-bs-title="Ver los Registros de los Productos"><span
                                        class="d-none d-lg-inline-block">Regresar a Tabla Productos</span>
                                    <i class="bi bi-cart-plus"></i> </a>
                            </div>
                            <div class="col-3 text-center">
                                <a href="{{ route('con.create') }}" class="btn btn-success bg-gradient"
                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                    data-bs-title="Crear Nuevo Registro"> <i class="bi bi-plus-circle"></i>
                                    <span class="d-none d-sm-inline-block">{{ __('Crear Nuevo') }}</span> </a>
                            </div>
                            <div class="col-3 text-center">
                                <a href="{{ route('con.archive') }}" class="btn btn-danger bg-gradient"
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

                <!-- Tabla Conversiones---->
                <div class="card shadow border-secondary">
                    <div class="card-body shadow">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover table-bordered" id="ordenamiento">
                                <thead class="thead">
                                    <tr>
                                        <th class="col-2 text-center shadow">ID</th>
                                        <th class="col-4 text-center shadow">Nombre</th>
                                        <th class="col-3 text-center shadow">Fecha</th>
                                        <th class="col-3 text-center shadow">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($conversiones as $conversione)
                                        <tr>
                                            <td class="col-2 text-center align-middle">{{ $conversione->id }}</td>
                                            <td class="col-4 text-justify align-middle">
                                                {{ Str::title($conversione->nombre) }}
                                            </td>
                                            <td class="col-3 text-justify align-middle">
                                                {{ $conversione->created_at->diffForHumans() }}
                                            </td>
                                            <td class="col-3 text-center">
                                                <a class="btn btn-sm btn-outline-primary mb-1" data-bs-toggle="tooltip"
                                                    data-bs-placement="top" data-bs-title="Ver"
                                                    href="{{ route('con.show', $conversione->id) }}"><i
                                                        class="bi bi-eye-fill"></i></a>
                                                <a class="btn btn-sm btn-outline-success mb-1" data-bs-toggle="tooltip"
                                                    data-bs-placement="top" data-bs-title="Editar"
                                                    href="{{ route('con.edit', $conversione->id) }}"><i
                                                        class="bi bi-pencil-square"></i></a>

                                                @if (Auth::user()->tipo_usuarios_id == 1 || Auth::user()->tipo_usuarios_id == 2)
                                                    <!-- Button trigger modal -->
                                                    <button type="button" class="btn btn-sm btn-outline-danger mb-1"
                                                        title="Deshabilitar" data-bs-toggle="modal"
                                                        data-bs-target="#modal-deshabilitar-{{ $conversione->id }}"><i
                                                            class="bi bi-archive-fill"></i>
                                                    </button>
                                                @endif
                                            </td>
                                        </tr>
                                        @include('conversion.deshabilitar')
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Tabla Conversiones Menores---->
                <div class="card shadow border-secondary m-5">
                    <div class="card-title shadow">
                        <h3 class="text-center mt-2">Medidas Secundarias</h3>
                    </div>
                    <div class="card-header border-bottom shadow">
                        <div class="row py-1">

                            <div class="col-12 text-center">
                                <a href="{{ route('conm.create') }}" class="btn btn-success bg-gradient"
                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                    data-bs-title="Crear Nuevo Registro"> <i class="bi bi-plus-circle"></i>
                                    <span class="d-none d-sm-inline-block">{{ __('Crear Nuevo') }}</span> </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body shadow">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover table-bordered" id="ordenamiento">
                                <thead class="thead">
                                    <tr>
                                        <th class="col-1 text-center shadow align-middle">ID</th>
                                        <th class="col-3 text-center shadow align-middle">Nombre</th>
                                        <th class="col-2 text-center shadow align-middle">Conversión En</th>
                                        <th class="col-2 text-center shadow align-middle">Fecha</th>

                                        <th class="col-2 text-center shadow align-middle">Estado</th>
                                        <th class="col-2 text-center shadow align-middle">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($conversionesMenores as $conversionesMenor)
                                        <tr>
                                            <td class="col-1 text-center align-middle">{{ $conversionesMenor->id }}
                                            </td>
                                            <td class="col-3 text-justify align-middle">
                                                {{ Str::title($conversionesMenor->nombre) }}
                                            </td>
                                            <td class="col-2 text-justify align-middle">
                                                @foreach ($conversiones as $conversione)
                                                    @if ($conversionesMenor->conversion_id == $conversione->id)
                                                        {{ Str::title($conversione->nombre) }}
                                                    @else
                                                    @endif
                                                @endforeach
                                            </td>
                                            <td class="col-2 text-justify align-middle">
                                                {{ $conversionesMenor->created_at->diffForHumans() }}
                                            </td>
                                            <td class="col-2 text-center align-middle">
                                                @if ($conversionesMenor->status == 'ACTIVE')
                                                    <a class="btn btn-success btn-sm"
                                                        href="{{ route('conm.cambiar_estado', $conversionesMenor->id) }}">
                                                        ACTIVO <i class="bi bi-check-circle"></i>
                                                    </a>
                                                @else
                                                    <a class="btn btn-danger btn-sm"
                                                        href="{{ route('conm.cambiar_estado', $conversionesMenor->id) }}">
                                                        DESACTIVADO <i class="bi bi-x-circle"></i>
                                                    </a>
                                                @endif
                                            </td>
                                            <td class="col-2 text-center">
                                                <a class="btn btn-sm btn-outline-primary mb-1"
                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                    data-bs-title="Ver"
                                                    href="{{ route('conm.show', $conversionesMenor->id) }}"><i
                                                        class="bi bi-eye-fill"></i></a>
                                                @if (Auth::user()->tipo_usuarios_id == 1 || Auth::user()->tipo_usuarios_id == 2)
                                                    <a class="btn btn-sm btn-outline-success mb-1"
                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                        data-bs-title="Editar"
                                                        href="{{ route('conm.edit', $conversionesMenor->id) }}"><i
                                                            class="bi bi-pencil-square"></i></a>
                                                @endif
                                            </td>
                                        </tr>
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
