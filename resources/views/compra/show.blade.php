<x-layouts.plantilla titulo="Compras-ver" meta-description="Compras meta description">
    <section class="container">

        <h2 class="text-center mt-3">Detalles de la Compra No. {{ $compra->id }}</h2>

        <div class="row py-2">
            <div class="col-12">

                <!-- Información -->
                <div class="card shadow border-primary">
                    <div class="card-header border-bottom   pt-3">
                        <div class="row">
                            <div class="col-md-6 text-center p-2">
                                <h5 class="card-title">Proveedor </h5>
                                @foreach ($proveedores as $id => $proveedore)
                                    @if ($id == $compra->proveedor_id)
                                        <a href="{{ route('prov.show', $compra->proveedor_id) }}">
                                            {{ Str::title($proveedore) }}
                                        </a>
                                    @endif
                                @endforeach
                            </div>
                            <div class="col-md-6 text-center p-2">
                                <h5 class="card-title">Tipo de Compra </h5>
                                Al {{ $compra->tipoCompra->nombre }}
                            </div>
                        </div>
                    </div>

                    <div class="card-body border-bottom shadow pt-3">
                        <div class="row">
                            <h5 class="card-tittle shadow pb-3">Compra Registrada por: @foreach ($users as $id => $user)
                                    @if ($id == $compra->usuario_id)
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
                                            <th class="col-2 text-center shadow align-middle">Precio Q.</th>
                                            <th class="col-3 text-center shadow align-middle">SubTotal Q.</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($detalleCompras as $detalle)
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
                                                <td align="right" class="col-3 ">Q.
                                                    {{ number_format($detalle->cantidad * $detalle->precio, 2) }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr class="text-secondary">
                                            <th colspan="3">
                                                <p align="right">SUBTOTAL: </p>
                                            </th>
                                            <th>
                                                <p align="right">Q.
                                                    {{ number_format($subtotal, 2) }}
                                                </p>
                                            </th>
                                        </tr>
                                        <tr class="text-danger">
                                            <th colspan="3">
                                                <p align="right">TOTAL IMPUESTO (IVA {{ $compra->impuesto }} %): </p>
                                            </th>
                                            <th>
                                                <p align="right">Q.
                                                    {{ number_format(($subtotal * $compra->impuesto) / 100, 2) }}
                                                </p>
                                            </th>
                                        </tr>
                                        <tr>
                                            <th colspan="3">
                                                <p align="right">TOTAL: </p>
                                            </th>
                                            <th>
                                                <p align="right">Q.
                                                    {{ number_format($compra->total, 2) }} </p>
                                            </th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer shadow ">
                        <a href="{{ route('com.index') }}" class="btn btn-primary">
                            <i class="bi bi-chevron-double-left"></i> Regresar</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layouts.plantilla>
