<x-layouts.plantilla titulo=" Reporte de Ventas por Fecha"
    meta-description="Reporte de Ventas por fecha meta description">
    {{-- CONTENIDO DEL MODULO VENTA --}}

    <div class="container-fluid">

        <h1 class="text-center mt-2">Reporte de Ventas por Fechas</h1>

        <div class="row">
            <!-- Acceder a la tabla tipo de ventas -->
            <div class="col-12 my-1 d-flex justify-content-between">
                <a href="{{ route('reporte.dia') }}" class=" btn btn-outline-success btn-sm px-2  "
                    data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Ver el Reporte por día">Ir al
                    Reporte por día <i class="bi bi-arrow-up-right"></i> </a>
            </div>
        </div>

        <div class="row">
            <div class="col-12">

                <!-- Reporte-->
                <div class="card shadow border-secondary">
                    <div class="card-header border-bottom shadow">
                        <form method="POST" action="{{ route('reporte.resultados') }}" role="form"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-12 col-md-3 text-center">
                                    <span>Fecha Inicial</span>
                                    <div class="form-group">
                                        <input type="date" class="form-control" value="{{ old('fecha_inicio') }}"
                                            name="fecha_inicio" id="fecha_inicio">
                                    </div>
                                </div>
                                <div class="col-12 col-md-3 text-center">
                                    <span>Fecha Final</span>
                                    <div class="form-group">
                                        <input type="date" class="form-control" value="{{ old('fecha_fin') }}"
                                            name="fecha_fin" id="fecha_fin">
                                    </div>
                                </div>
                                <div class="col-12 col-md-3 text-center mt-3">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-sm">Consultar</button>
                                    </div>
                                </div>
                                <div class="col-12 col-md-3 text-center">
                                    <span>Total de Ingresos:</span>
                                    <div class="form-group">
                                        <strong>Q. {{ number_format($total, 2) }}</strong>
                                    </div>
                                </div>
                            </div>
                        </form>
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
    @section('script')
        <script>
            // FECHAS
            window.onload = function() {
                let fecha = new Date(); // Fecha actual
                let dia = fecha.getDate(); // Dia 
                let mes = fecha.getMonth() + 1; // Mes 
                let anio = fecha.getFullYear(); // Año

                if (dia < 10)
                    dia = '0' + dia;
                if (mes < 10)
                    mes = '0' + mes;

                document.getElementById('fecha_fin').value = anio + '-' + mes + '-' + dia;
            }
        </script>
    @endsection
</x-layouts.plantilla>
