<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PDF Compra No. {{ $compra->id }}</title>
    <!-- CSS Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        .tr1:nth-of-type(odd) {
            background: #F0F0F0;
        }

        .td1 {
            border: 1px solid #C4C4C4;
        }

        tfoot {
            top: 50px;
        }
    </style>
</head>

<body style="font-family: 'Helvetica';">
    <header>
        <div>
            <b style="font-weight: bold; font-size: 18px;"><ins>Datos del Proveedor</ins></b>
        </div>
        <table style="position: relative; top: 5px;">
            @foreach ($proveedores as $proveedor)
                @if ($proveedor->id == $compra->proveedor_id)
                    <tr>
                        <td>
                            <b style="font-weight: bold; font-size: 15px;">Nombre:
                                <a href="{{ route('prov.show', $compra->proveedor_id) }}"
                                    style="font-weight: normal; font-size: 15px;">
                                    {{ Str::title($proveedor->nombre) }}
                                </a>
                            </b>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <b style="font-weight: bold; font-size: 15px;">Direccion:
                                <b style="font-weight: normal; font-size: 15px;">{{ $proveedor->direccion }}</b>
                            </b>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <b style="font-weight: bold; font-size: 15px;">Nit:
                                <b style="font-weight: normal; font-size: 15px;">{{ $proveedor->nit }}</b>
                            </b>
                        </td>
                    </tr>
                @endif
            @endforeach
        </table>
        <div class="text-center p-2">
            <p style="font-weight: bold; font-size: 18px;">Tipo de Compra <br>
                <b style="font-weight: normal; font-size: 15px;">Al {{ $compra->tipoCompra->nombre }}</b>
            </p>
        </div>
        <div class="row">
            <p style="font-weight: bold; font-size: 15px;">Compra Registrada Por:
                @foreach ($users as $id => $user)
                    @if ($id == $compra->usuario_id)
                        <b style="font-weight: normal; font-size: 15px;">{{ Str::title($user) }}</b>
                    @endif
                @endforeach
            </p>
            <p style="font-weight: bold; font-size: 15px;" align="right">Fecha De La Compra:
                <b style="font-weight: normal; font-size: 15px;" align="right">{{ $compra->fecha_compra }}</b>
            </p>
        </div>
    </header>

    <main class="row p-2">
        <table>
            <thead>
                <tr style="color: #327E3E;">
                    <th style="background-color: #FFFFFF; border: 1px solid #C4C4C4;"
                        class="col-4 text-center align-middle">Producto</th>
                    <th style="background-color: #FFFFFF; border: 1px solid #C4C4C4;"
                        class="col-3 text-center align-middle">Cantidad</th>
                    <th style="background-color: #FFFFFF; border: 1px solid #C4C4C4;"
                        class="col-2 text-center align-middle">Precio Q.</th>
                    <th style="background-color: #FFFFFF; border: 1px solid #C4C4C4;"
                        class="col-3 text-center align-middle">SubTotal Q.</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($detalleCompras as $detalle)
                    <tr style="color: #363636;" class="tr1">
                        <td class="td1 col-4">{{ $detalle->producto->nombre }}</td>
                        <td class="td1 col-3 text-center">{{ $detalle->cantidad }}
                            @foreach ($conversionesMenores as $id => $conversionesMenor)
                                @if ($id == $detalle->conversion_menor_id)
                                    {{ Str::title($conversionesMenor) }}
                                @endif
                            @endforeach
                        </td>
                        <td class="td1 col-2 text-center"> {{ $detalle->precio }}</td>
                        <td align="right" class="td1 col-3 ">Q.
                            {{ number_format($detalle->cantidad * $detalle->precio, 2) }}</td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th style="position: relative; top: 50px; color: #6F6F6F" colspan="3">
                        <p align="right">SUBTOTAL: </p>
                    </th>
                    <th style="position: relative; top: 50px; color: #6F6F6F">
                        <p align="right">Q.
                            {{ number_format($subtotal, 2) }}
                        </p>
                    </th>
                </tr>
                <tr>
                    <th style="color: #DB2F2F" colspan="3">
                        <p align="right">TOTAL IMPUESTO (IVA {{ $compra->impuesto }} %):
                        </p>
                    </th>
                    <th style="color: #DB2F2F">
                        <p align="right">Q.
                            {{ number_format(($subtotal * $compra->impuesto) / 100, 2) }}
                        </p>
                    </th>
                </tr>
                <tr>
                    <th colspan="3">
                        <p align="right">TOTAL:
                        </p>
                    </th>
                    <th>
                        <p align="right">Q.
                            {{ number_format($compra->total, 2) }}
                        </p>
                    </th>
                </tr>
            </tfoot>
        </table>
    </main>
</body>

</html>
