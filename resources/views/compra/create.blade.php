<x-layouts.plantilla titulo="Compras-crear" meta-description="Compras meta description">
    <section class="container">

        <h2 class="text-center mt-3">Agregar Nueva Compra</h2>

        <div class="row py-2">
            <div class="col-12">

                @includeif('partials.errors')

                <!-- Titulo -->
                <div class="card shadow border-success">
                    <div class="card-header border-bottom shadow">
                        <span class="card-title">Registrar Compra</span>
                    </div>
                </div>

                <!-- Formulario -->
                <div class="card shadow border-success">
                    <div class="card-body shadow">
                        <form method="POST" action="{{ route('com.store') }}" role="form"
                            enctype="multipart/form-data">
                            @csrf

                            @include('compra.form')

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

            let cont = 0;
            total = 0;
            subtotal = [];

            $("#guardar").hide();

            function agregar() {
                producto_id = $("#producto").val();
                producto = $("#producto option:selected").text();
                cantidad = $("#cantidad").val();
                precio = $("#precio").val();
                impuesto = $("#impuesto").val();
                conversion_menor_id = $("#conversion_menor_id").val();
                unidad = $("#conversion_menor_id option:selected").text();

                if (producto_id != "" && cantidad != "" && cantidad > 0 && precio != "" && conversion_menor_id != "") {
                    subtotal[cont] = cantidad * precio;
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
                        '</td>   <td><input type="hidden" name="cantidad[]" value="' +
                        cantidad +
                        '"><input type="hidden" name="conversion_menor_id[]" value="' +
                        conversion_menor_id +
                        '"> <input class="form-control" type="text" value="' +
                        cantidad +
                        ' ' + unidad + '" disabled> </td>   <td><input type="hidden" id="precio[]" name="precio[]" value="' +
                        precio +
                        '"> <input class="form-control"            type="number" id="precio[]" value="' +
                        precio +
                        '" disabled> </td>        <td align="right">Q. ' +
                        subtotal[cont] +
                        " </td></tr>    ";

                    cont++;
                    limpiar();
                    totales();
                    evaluar();
                    $("#detalles").append(fila);
                } else {
                    alert(
                        'Rellene todos los campos del detalle de las compras: \n-->Productos\n-->Cantidad\n-->Unidad de Medida\n-->Precio'
                    );
                }
            }

            function limpiar() {
                $("#cantidad").val("");
                $("#precio").val("");
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
