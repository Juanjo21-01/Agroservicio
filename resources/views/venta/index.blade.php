<x-layouts.plantilla titulo="Ventas" meta-description="Ventas meta description">
    {{-- CONTENIDO DEL MODULO VENTA --}}

    <div class="container-fluid">

        <h1 class="text-center mt-2">Ventas</h1>

        <div class="row">
            <!-- Acceder a los reportes -->
            <div class="col-12 my-1 d-flex justify-content-between">
                <a href="{{ route('reporte.dia') }}" class=" btn btn-outline-success btn-sm px-2  "
                    data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Ver los Reportes por dia">Reportes por
                    dia <i class="bi bi-arrow-up-right"></i> </a>
                <a href="{{ route('reporte.fecha') }}" class=" btn btn-outline-success btn-sm px-2  "
                    data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Ver los Reportes por fecha">Reportes
                    por fecha <i class="bi bi-arrow-up-right"></i> </a>
            </div>
        </div>

        <div class="row">
            <div class="col-12">

                <!-- Botones para PDF, crear y ver deshabilitados-->
                <div class="card shadow border-secondary">
                    <div class="card-header border-bottom shadow">
                        <div class="row justify-content-between py-1">
                            <div class="col-6 text-center">
                                <a href="{{ route('tpven.index') }}" class="btn btn-outline-secondary bg-gradient"
                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                    data-bs-title="Ver los Registros de los Tipos de Ventas"><span
                                        class="d-none d-lg-inline-block">Ir a Tabla Tipo de Ventas</span>
                                    <i class="bi bi-arrow-up-right"></i> </a>
                            </div>
                            <div class="col-6 text-center">
                                <a href="{{ route('ven.create') }}" class="btn btn-success bg-gradient"
                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                    data-bs-title="Crear Nuevo Registro"> <i class="bi bi-plus-circle"></i>
                                    <span class="d-none d-sm-inline-block">{{ __('Crear Nuevo') }}</span> </a>
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
                                        <th class="col-3 text-center shadow align-middle">Fecha de la Venta</th>
                                        <th class="col-2 text-center shadow align-middle">Tipo Venta</th>
                                        <th class="col-2 text-center shadow align-middle">Monto</th>
                                        <th class="col-2 text-center shadow align-middle">Estado</th>
                                        <th class="col-2 text-center shadow align-middle">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($ventas as $venta)
                                        <tr>
                                            <td class="col-1 text-center align-middle">{{ $venta->id }}</td>
                                            <td class="col-3 text-center align-middle">
                                                {{ $venta->fecha_venta }}</td>
                                            <td class="col-2 text-justify align-middle">
                                                @foreach ($tipoVentas as $tipoVenta)
                                                    @if ($venta->tipo_venta_id == $tipoVenta->id)
                                                        {{ Str::title($tipoVenta->nombre) }}
                                                    @else
                                                    @endif
                                                @endforeach
                                            </td>
                                            <td class="col-2 text-justify align-middle"> {{ $venta->total }}</td>
                                            <td class="col-2 text-center align-middle">
                                                @if ($venta->status == 'VALID')
                                                    <a class="btn btn-success btn-sm"
                                                        href="{{ route('ven.cambiar_estado', $venta->id) }}">
                                                        VALIDA <i class="bi bi-check-circle"></i>
                                                    </a>
                                                @else
                                                    <a class="btn btn-danger btn-sm"
                                                        href="{{ route('ven.cambiar_estado', $venta->id) }}">
                                                        CANCELADA <i class="bi bi-x-circle"></i>
                                                    </a>
                                                @endif
                                            </td>
                                            <td class="col-2 text-center">
                                                <a class="btn btn-sm btn-outline-primary mb-1" data-bs-toggle="tooltip"
                                                    data-bs-placement="top" data-bs-title="Ver"
                                                    href="{{ route('ven.show', $venta->id) }}"><i
                                                        class="bi bi-eye-fill"></i></a>
                                                <a class="btn btn-sm btn-outline-secondary mb-1"
                                                    data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="PDF"
                                                    href="{{ route('ven.pdfDetalle', $venta->id) }}"><i
                                                        class="bi bi-filetype-pdf"></i></a>
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
