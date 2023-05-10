<x-layouts.plantilla titulo="Ventas-crear" meta-description="Ventas meta description">
    <section class="container">

        <h2 class="text-center mt-3">Agregar Nueva Venta</h2>

        <div class="row py-2">
            <div class="col-12">

                @includeif('partials.errors')

                <!-- Titulo -->
                <div class="card shadow border-success">
                    <div class="card-header border-bottom shadow">
                        <span class="card-title">Registrar Venta</span>
                    </div>
                </div>

                <!-- Formulario -->
                <div class="card shadow border-success">
                    <div class="card-body shadow">
                        <form method="POST" action="{{ route('ven.store') }}" role="form"
                            enctype="multipart/form-data">
                            @csrf

                            @include('venta.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @section('script')
        <script>
            // Al darle click al boton agregar producto
            $(document).ready(function() {
                $("#agregar").click(function() {
                    agregar();
                });
            });

            let cont = 1;
            total = 0;
            subtotal = [];

            $("#guardar").hide();
            $("#producto_id").change(mostrarValores);

            function mostrarValores() {
                datosProducto = document.getElementById("producto_id").value.split("_");
                $("#precio").val(datosProducto[2]);
                $("#stock").val(datosProducto[1]);
            }

            function agregar() {
                datosProducto = document.getElementById("producto_id").value.split("_");

                producto_id = datosProducto[0];
                producto = $("#producto_id option:selected").text();
                cantidad = $("#cantidad").val();
                descuento = $("#descuento").val();
                precio = $("#precio").val();
                stock = $("#stock").val();
                impuesto = $("#impuesto").val();
                conversion_menor_id = $("#conversion_menor_id").val();
                unidad = $("#conversion_menor_id option:selected").text();

                if (
                    producto_id != "" && cantidad != "" && cantidad > 0 && descuento != "" && precio != "" &&
                    conversion_menor_id != ""
                ) {
                    if (parseInt(stock) >= parseInt(cantidad)) {
                        subtotal[cont] =
                            cantidad * precio - cantidad * precio * (descuento / 100);
                        total = total + subtotal[cont];
                        let fila =
                            '<tr class="selected text-center" id="fila' +
                            cont +
                            '"> <td> <button type="button" class="btn btn-danger btn-sm" onclick="eliminar(' +
                            cont +
                            ');"><i class="bi bi-x-lg"></i></button> </td>    <td><input type="hidden" name="producto_id[]" value="' +
                            producto_id +
                            '">' +
                            producto +
                            '</td>  <td><input type="hidden" name="cantidad[]" value="' +
                            cantidad +
                            '"><input type="hidden" name="conversion_menor_id[]" value="' +
                            conversion_menor_id +
                            '"> <input class="form-control" type="number"            value="' +
                            cantidad +
                            '" disabled> </td>   <td><input type="hidden" id="precio[]" name="precio[]" value="' +
                            parseFloat(precio).toFixed(2) +
                            '"> <input class="form-control"            type="number" id="precio[]" value="' +
                            parseFloat(precio).toFixed(2) +
                            '" disabled> </td> <td><input type="hidden" name="descuento[]" value="' +
                            parseFloat(descuento) +
                            '"> <input class="form-control" type="number"            value="' +
                            parseFloat(descuento) +
                            '" disabled> </td>       <td align="right">Q. ' +
                            parseFloat(subtotal[cont].toFixed(2)) +
                            " </td></tr>    ";

                        cont++;
                        limpiar();
                        totales();
                        evaluar();
                        $("#detalles2").append(fila);
                    } else {
                        alert(
                            'La Cantidad que se pretende vender es mayor al Stock'
                        );
                    }
                } else {
                    alert(
                        'Rellene todos los campos del detalle de las ventas: \n-->Productos\n-->Cantidad Vendida\n-->Unidad de Medida'
                    );
                }
            }

            function limpiar() {
                $("#cantidad").val("");
                $("#descuento").val("0");
            }

            function totales() {
                $("#total").html("Q. " + total.toFixed(2));
                total_impuesto = total * (impuesto / 100);
                total_pagar = total + total_impuesto;
                $("#total_impuesto").html("Q. " + total_impuesto.toFixed(2));
                $("#total_pagar_html").html("Q. " + total_pagar.toFixed(2));
                $("#total_pagar").val(total_pagar.toFixed(2));
            }

            function evaluar() {
                if (total > 0) {
                    $("#guardar").show();
                } else {
                    $("#guardar").hide();
                }
            }

            function eliminar(index) {
                total = total - subtotal[index];
                total_impuesto = total * (impuesto / 100);
                total_pagar_html = total + total_impuesto;
                $("#total").html("Q. " + total);
                $("#total_impuesto").html("Q. " + total_impuesto);
                $("#total_pagar_html").html("Q. " + total_pagar_html);
                $("#total_pagar").val(total_pagar_html.toFixed(2));
                $("#fila" + index).remove();
                evaluar();
            }
        </script>
    @endsection
</x-layouts.plantilla>
