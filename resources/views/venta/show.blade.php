<x-layouts.plantilla titulo="Ventas-ver" meta-description="Ventas meta description">
    <section class="container">

        <h2 class="text-center mt-3">Detalles de la Venta No. {{ $venta->id }}</h2>

        <div class="row py-2">
            <div class="col-12">

                <!-- Información -->
                <div class="card shadow border-primary">
                    <div class="card-header border-bottom pt-3">
                        <div class="row">
                            <div class="col-md-6 text-center p-2">
                                <h5 class="card-title">Cliente </h5>
                                <a href="{{ route('cl.show', $venta->cliente_id) }}">
                                    {{ Str::title($venta->cliente->nombre) }}
                                </a>
                            </div>
                            <div class="col-md-6 text-center p-2">
                                <h5 class="card-title">Tipo de Venta </h5>
                                Al {{ $venta->tipoVenta->nombre }}
                            </div>
                        </div>
                    </div>

                    <div class="card-body border-bottom shadow pt-3">
                        <div class="row">
                            <h5 class="card-tittle shadow pb-3">Venta Registrada por: @foreach ($users as $id => $user)
                                    @if ($id == $venta->usuario_id)
                                        {{ Str::title($user) }}
                                    @endif
                                @endforeach
                            </h5>
                            <div class="table-responsive col-md-12 ">
                                <table class="table table-striped table-hover table-bordered shadow" id="detalles">
                                    <thead class="thead">
                                        <tr class="text-success">
                                            <th class="col-4 text-center shadow align-middle">Producto</th>
                                            <th class="col-3 text-center shadow align-middle">Cantidad</th>
                                            <th class="col-2 text-center shadow align-middle">Precio de Venta Q.</th>
                                            <th class="col-1 text-center shadow align-middle">Descuento %</th>
                                            <th class="col-2 text-center shadow align-middle">SubTotal Q.</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($detalleVentas as $detalle)
                                            <tr>
                                                <td class="col-4">{{ $detalle->producto->nombre }}</td>
                                                <td class="col-3 text-center">{{ $detalle->cantidad }}
                                                    @foreach ($conversionesMenores as $id => $conversionesMenor)
                                                        @if ($id == $detalle->conversion_menor_id)
                                                            {{ Str::title($conversionesMenor) }}
                                                        @endif
                                                    @endforeach
                                                </td>
                                                <td class="col-2 text-center"> {{ $detalle->precio }}</td>
                                                <td class="col-1 text-center"> {{ $detalle->descuento }} % <span
                                                        class="text-muted">
                                                        ({{ $detalle->cantidad * $detalle->precio * ($detalle->descuento / 100) }})
                                                    </span>
                                                </td>
                                                <td align="right" class="col-2 ">Q.
                                                    {{ number_format($detalle->cantidad * $detalle->precio - $detalle->cantidad * $detalle->precio * ($detalle->descuento / 100), 2) }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr class="text-secondary">
                                            <th colspan="4">
                                                <p align="right">SUBTOTAL: </p>
                                            </th>
                                            <th>
                                                <p align="right">Q.
                                                    {{ number_format($subtotal, 2) }}
                                                </p>
                                            </th>
                                        </tr>
                                        <tr class="text-danger">
                                            <th colspan="4">
                                                <p align="right">TOTAL IMPUESTO (IVA {{ $venta->impuesto }} %): </p>
                                            </th>
                                            <th>
                                                <p align="right">Q.
                                                    {{ number_format(($subtotal * $venta->impuesto) / 100, 2) }}
                                                </p>
                                            </th>
                                        </tr>
                                        <tr>
                                            <th colspan="4">
                                                <p align="right">TOTAL: </p>
                                            </th>
                                            <th>
                                                <p align="right">Q.
                                                    {{ number_format($venta->total, 2) }} </p>
                                            </th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer shadow ">
                        <a href="{{ route('ven.index') }}" class="btn btn-primary">
                            <i class="bi bi-chevron-double-left"></i> Regresar</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layouts.plantilla>
