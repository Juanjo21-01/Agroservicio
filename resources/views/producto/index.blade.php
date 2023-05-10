<x-layouts.plantilla titulo="Productos" meta-description="Productos meta description">
    {{-- CONTENIDO DEL MODULO PRODUCTOS --}}

    <div class="container-fluid">

        <h1 class="text-center mt-2">Productos</h1>

        <div class="row">
            <!-- Acceder a las conversiones -->
            <div class="col-12 my-1 d-flex justify-content-between">
                <a href="{{ route('con.index') }}" class=" btn btn-outline-success btn-sm px-2  " data-bs-toggle="tooltip"
                    data-bs-placement="top" data-bs-title="Ver las Conversiones">Unidad de Medidas <i
                        class="bi bi-arrow-up-right"></i> </a>
            </div>
        </div>

        <div class="row">
            <div class="col-12">

                <!-- Botones para tabla tipo productos, crear y ver deshabilitados-->
                <div class="card shadow border-secondary">
                    <div class="card-header border-bottom shadow">
                        <div class="row justify-content-between py-1">
                            <div class="col-6 text-center">
                                <a href="{{ route('tprod.index') }}" class="btn btn-outline-secondary bg-gradient"
                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                    data-bs-title="Ver los Registros de los Tipo de Productos"><span
                                        class="d-none d-lg-inline-block">Ir a Tabla Tipo de Productos</span>
                                    <i class="bi bi-arrow-up-right"></i> </a>
                            </div>
                            <div class="col-6 text-center">
                                <a href="{{ route('prod.create') }}" class="btn btn-success bg-gradient"
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
                                        <th class="col-3 text-center shadow align-middle">Nombre</th>
                                        <th class="col-1 text-center shadow align-middle">Stock</th>
                                        <th class="col-1 text-center shadow align-middle">Unidad Medida</th>
                                        <th class="col-2 text-center shadow align-middle">Tipo de Producto</th>
                                        <th class="col-1 text-center shadow align-middle">Precio Venta</th>
                                        <th class="col-1 text-center shadow align-middle">Fecha de Vencimiento</th>
                                        <th class="col-1 text-center shadow align-middle">Estado</th>
                                        <th class="col-1 text-center shadow align-middle">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($productos as $producto)
                                        <tr>
                                            <td class="col-1 text-center align-middle">{{ $producto->id }}</td>
                                            <td class="col-3 text-justify align-middle">
                                                {{ Str::title($producto->nombre) }}</td>
                                            <td class="col-1 text-center align-middle"> {{ $producto->stock }}</td>
                                            <td class="col-1 text-center align-middle">
                                                @foreach ($conversiones as $conversion)
                                                    @if ($producto->conversion_id == $conversion->id)
                                                        {{ Str::title($conversion->nombre) }}
                                                    @endif
                                                @endforeach
                                            </td>
                                            <td class="col-2 text-justify align-middle">
                                                @foreach ($tipoProductos as $tipoProducto)
                                                    @if ($producto->tipo_producto_id == $tipoProducto->id)
                                                        {{ Str::title($tipoProducto->nombre) }}
                                                    @endif
                                                @endforeach
                                            </td>
                                            <td class="col-1 text-center align-middle">
                                                Q. {{ $producto->precio_venta }}
                                            </td>
                                            <td class="col-1 text-center align-middle">
                                                {{ $producto->fecha_vencimiento }}</td>
                                            <td class="col-1 text-center align-middle">
                                                @if ($producto->status == 'ACTIVE')
                                                    <a class="btn btn-success btn-sm"
                                                        href="{{ route('prod.cambiar_estado', $producto->id) }}">
                                                        ACTIVO <i class="bi bi-check-circle"></i>
                                                    </a>
                                                @else
                                                    <a class="btn btn-danger btn-sm"
                                                        href="{{ route('prod.cambiar_estado', $producto->id) }}">
                                                        DESACTIVADO <i class="bi bi-x-circle"></i>
                                                    </a>
                                                @endif
                                            </td>
                                            <td class="col-1 text-center">
                                                <a class="btn btn-sm btn-outline-primary mb-1" data-bs-toggle="tooltip"
                                                    data-bs-placement="top" data-bs-title="Ver"
                                                    href="{{ route('prod.show', $producto->id) }}"><i
                                                        class="bi bi-eye-fill"></i></a>
                                                @if (Auth::user()->tipo_usuarios_id == 1 || Auth::user()->tipo_usuarios_id == 2)
                                                    <a class="btn btn-sm btn-outline-success mb-1"
                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                        data-bs-title="Editar"
                                                        href="{{ route('prod.edit', $producto->id) }}"><i
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
