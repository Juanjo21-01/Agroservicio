<x-layouts.plantilla titulo="Compras" meta-description="Compras meta description">
    {{-- CONTENIDO DEL MODULO COMPRAS --}}

    <div class="container-fluid">

        <h1 class="text-center mt-2">Compras</h1>

        <div class="row">
            <div class="col-12">

                <!-- Botones para tabla tipo compras, crear y ver deshabilitados-->
                <div class="card shadow border-secondary">
                    <div class="card-header border-bottom shadow">
                        <div class="row justify-content-between py-1">
                            <div class="col-6 text-center">
                                <a href="{{ route('tcom.index') }}" class="btn btn-outline-secondary bg-gradient"
                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                    data-bs-title="Ver los Registros de los Tipos de Compras"><span
                                        class="d-none d-lg-inline-block">Ir a Tabla Tipo de Compras</span> <i
                                        class="bi bi-arrow-up-right"></i> </a>
                            </div>
                            <div class="col-6 text-center">
                                <a href="{{ route('com.create') }}" class="btn btn-success bg-gradient"
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
                                        <th class="col-3 text-center shadow align-middle">Fecha de la Compra</th>
                                        <th class="col-2 text-center shadow align-middle">Tipo Compra</th>
                                        <th class="col-2 text-center shadow align-middle">Monto</th>
                                        <th class="col-2 text-center shadow align-middle">Estado</th>
                                        <th class="col-2 text-center shadow align-middle">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($compras as $compra)
                                        <tr>
                                            <td class="col-1 text-center align-middle">{{ $compra->id }}</td>
                                            <td class="col-3 text-center align-middle">
                                                {{ $compra->fecha_compra }}</td>
                                            <td class="col-2 text-justify align-middle">
                                                @foreach ($tipoCompras as $tipoCompra)
                                                    @if ($compra->tipo_compra_id == $tipoCompra->id)
                                                        {{ Str::title($tipoCompra->nombre) }}
                                                    @else
                                                    @endif
                                                @endforeach
                                            </td>
                                            <td class="col-2 text-justify align-middle"> {{ $compra->total }}</td>
                                            <td class="col-2 text-center align-middle">
                                                @if ($compra->status == 'VALID')
                                                    <a class="btn btn-success btn-sm"
                                                        href="{{ route('com.cambiar_estado', $compra->id) }}">
                                                        VALIDA <i class="bi bi-check-circle"></i>
                                                    </a>
                                                @else
                                                    <a class="btn btn-danger btn-sm"
                                                        href="{{ route('com.cambiar_estado', $compra->id) }}">
                                                        CANCELADA <i class="bi bi-x-circle"></i>
                                                    </a>
                                                @endif
                                            </td>
                                            <td class="col-2 text-center">
                                                <a class="btn btn-sm btn-outline-primary mb-1" data-bs-toggle="tooltip"
                                                    data-bs-placement="top" data-bs-title="Ver"
                                                    href="{{ route('com.show', $compra->id) }}"><i
                                                        class="bi bi-eye-fill"></i></a>
                                                <a class="btn btn-sm btn-outline-secondary mb-1"
                                                    data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="PDF"
                                                    href="{{ route('com.pdfDetalle', $compra->id) }}"><i
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
