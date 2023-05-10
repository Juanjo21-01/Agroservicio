<x-layouts.plantilla titulo=" Reporte de Ventas por Dia" meta-description="Reporte de Ventas por dia meta description">
    {{-- CONTENIDO DEL MODULO VENTA --}}

    <div class="container-fluid">

        <h1 class="text-center mt-2">Reporte de Ventas por Día</h1>

        <div class="row">
            <!-- Acceder a la tabla tipo de ventas -->
            <div class="col-12 my-1 d-flex justify-content-between">
                <a href="{{ route('reporte.fecha') }}" class=" btn btn-outline-success btn-sm px-2  "
                    data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Ver los Reportes por fecha">Ir al
                    Reporte por fechas <i class="bi bi-arrow-up-right"></i> </a>
            </div>
        </div>

        <div class="row">
            <div class="col-12">

                <!-- Reporte-->
                <div class="card shadow border-secondary">
                    <div class="card-header border-bottom shadow">
                        <div class="row">
                            <div class="col-12 col-md-4 text-center">
                                <span>Fecha de la Consulta:</span>
                                <div class="form-group">
                                    <strong>{{ \Carbon\Carbon::now()->format('d/m/Y') }}</strong>
                                </div>
                            </div>
                            <div class="col-12 col-md-4 text-center">
                                <span>Cantidad de Registros:</span>
                                <div class="form-group">
                                    <strong>{{ $ventas->count() }}</strong>
                                </div>
                            </div>
                            <div class="col-12 col-md-4 text-center">
                                <span>Total de Ingresos:</span>
                                <div class="form-group">
                                    <strong>Q. {{ number_format($total, 2) }}</strong>
                                </div>
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
                                        <th class="col-2 text-center shadow align-middle">ID</th>
                                        <th class="col-3 text-center shadow align-middle">Fecha de la Venta</th>
                                        <th class="col-3 text-center shadow align-middle">Tipo Venta</th>
                                        <th class="col-2 text-center shadow align-middle">Monto</th>
                                        <th class="col-2 text-center shadow align-middle">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($ventas as $venta)
                                        <tr>
                                            <td class="col-2 text-center align-middle">{{ $venta->id }}</td>
                                            <td class="col-3 text-center align-middle">
                                                {{ $venta->fecha_venta }}</td>
                                            <td class="col-3 text-justify align-middle">
                                                {{ Str::title($venta->tipoVenta->nombre) }}</td>
                                            <td class="col-2 text-justify align-middle"> {{ $venta->total }}</td>
                                            <td class="col-2 text-center">
                                                <a class="btn btn-sm btn-outline-primary mb-1" data-bs-toggle="tooltip"
                                                    data-bs-placement="top" data-bs-title="Ver"
                                                    href="{{ route('ven.show', $venta->id) }}"><i
                                                        class="bi bi-eye-fill"></i></a>
                                                @if (Auth::user()->tipo_usuarios_id == 1 || Auth::user()->tipo_usuarios_id == 2)
                                                    <!-- Button trigger modal -->
                                                    <button type="button" class="btn btn-sm btn-outline-danger mb-1"
                                                        title="Deshabilitar" data-bs-toggle="modal"
                                                        data-bs-target="#modal-deshabilitar-{{ $venta->id }}"><i
                                                            class="bi bi-archive-fill"></i>
                                                    </button>
                                                @endif
                                                <a class="btn btn-sm btn-outline-secondary mb-1"
                                                    data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="PDF"
                                                    href="{{ route('ven.pdfDetalle', $venta->id) }}"><i
                                                        class="bi bi-filetype-pdf"></i></a>
                                            </td>
                                        </tr>
                                        @include('venta.deshabilitar')
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
