<x-layouts.plantilla titulo="Productos-ver" meta-description="Ventas meta description">
    <section class="container">

        <h2 class="text-center mt-3">Producto No. {{ $producto->id }}</h2>

        <div class="row py-2">
            <div class="col-12">

                <!-- Información -->
                <div class="card shadow border-primary">
                    <div class="card-body border-bottom shadow">
                        <div class="row">
                            <!-- Nombre -->
                            <div class="card-header shadow col-lg-4">
                                <div class="border-bottom text-center pb-4">
                                    <h3>{{ $producto->nombre }}</h3>
                                    <div class="card-img shadow">
                                        <img src="{{ asset('img/productos/' . $producto->imagen) }}"
                                            class=" img-fluid img-thumbnail mx-auto d-block rounded" alt="">
                                    </div>

                                </div>
                                <!-- Datos -->
                                <div class="py-4">
                                    <span class="d-flex flex-row justify-content-between">
                                        <h4>Estado:</h4>
                                        <h6 class="p-2 text-muted text-center">
                                            @if ($producto->status == 'ACTIVE')
                                                ACTIVO
                                            @else
                                                DESACTIVADO
                                            @endif
                                        </h6>
                                    </span>
                                    <span class="d-flex flex-row justify-content-between">
                                        <h4>Vencimiento:</h4>
                                        <h6 class="p-2 text-muted text-center">
                                            {{ $producto->fecha_vencimiento }}
                                        </h6>
                                    </span>
                                    <span class="d-flex flex-row justify-content-between">
                                        <h4>Proveedor:</h4>
                                        <h6 class="p-2 text-muted text-center">
                                            @foreach ($proveedores as $id => $proveedore)
                                                @if ($id == $producto->proveedor_id)
                                                    <a href="{{ route('prov.show', $producto->proveedor_id) }}">
                                                        {{ Str::title($proveedore) }}
                                                    </a>
                                                @endif
                                            @endforeach
                                        </h6>
                                    </span>
                                    <span class="d-flex flex-row justify-content-between">
                                        <h4>Categoria:</h4>
                                        <h6 class="p-2 text-muted text-center">
                                            <a href="{{ route('tprod.show', $producto->tipoProducto->id) }}">
                                                {{ $producto->tipoProducto->nombre }}
                                            </a>
                                        </h6>
                                    </span>
                                </div>
                                @if ($producto->status == 'ACTIVE')
                                    <a class="col-12 btn btn-success btn-block"
                                        href="{{ route('prod.cambiar_estado', $producto->id) }}">
                                        ACTIVO <i class="bi bi-check-circle"></i>
                                    </a>
                                @else
                                    <a class="col-12 btn btn-danger btn-block"
                                        href="{{ route('prod.cambiar_estado', $producto->id) }}">
                                        DESACTIVADO <i class="bi bi-x-circle"></i>
                                    </a>
                                @endif
                            </div>

                            <!-- Contenido -->
                            <div class="card shadow col-lg-8 p-2">
                                <h4 class="text-center border-bottom pb-2">Información del producto</h4>
                                <div class="card-body shadow row g-1 ">

                                    <div class="col-md-6">
                                        <div class="input-group py-1">
                                            <span class="input-group-text"><strong>Código</strong></span>
                                            <span class="form-control "> {{ $producto->code }}</span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-group py-1">
                                            <span class="input-group-text"><strong>Precio</strong></span>
                                            <span class="form-control "> Q. {{ $producto->precio_venta }}</span>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="input-group py-1">
                                            <span class="input-group-text"><strong>Stock </strong></span>
                                            <span class="form-control "> {{ $producto->stock }} </span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-group py-1">
                                            <span class="input-group-text"><strong>Unidad</strong></span>
                                            <span class="form-control ">
                                                @foreach ($conversiones as $id => $conversione)
                                                    @if ($id == $producto->conversion_id)
                                                        {{ Str::title($conversione) }}
                                                    @endif
                                                @endforeach
                                            </span>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="input-group py-1">
                                            <span class="input-group-text"><strong>Descripcion</strong></span>
                                            <textarea class="form-control " disabled> {{ $producto->descripcion }}</textarea>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="input-group py-1">
                                            <span class="input-group-text"><strong>Fecha de Creación</strong></span>
                                            <span class="form-control " data-bs-toggle="tooltip"
                                                data-bs-placement="right"
                                                data-bs-title="Hora: {{ date('H : i : s', strtotime($producto->created_at)) }}">
                                                {{ $producto->created_at->toFormattedDAteString() }}</span>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="input-group py-1">
                                            <span class="input-group-text"><strong>Última <span
                                                        class="d-none d-md-inline-block">
                                                        Fecha de</span> Actualización</strong></span>
                                            <span class="form-control "data-bs-toggle="tooltip"
                                                data-bs-placement="right"
                                                data-bs-title="Hora: {{ date('H : i : s', strtotime($producto->updated_at)) }}">
                                                {{ $producto->updated_at->toFormattedDateString() }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer shadow ">
                        <a href="{{ route('prod.index') }}" class="btn btn-primary">
                            <i class="bi bi-chevron-double-left"></i> Regresar</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layouts.plantilla>
