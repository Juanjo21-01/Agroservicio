<div class="card-body shadow-sm p-0 row g-1">

    <div class="col-md-6 form-floating mb-3">
        {{ Form::select('tipo_venta_id', $tipoVenta, $venta->tipo_venta_id, [
            'class' => 'form-select' . ($errors->has('tipo_venta_id') ? ' is-invalid' : ' is-valid'),
            'required',
            'autofocus',
        ]) }}
        {{ Form::label('Tipo de Venta') }}
        {!! $errors->first('tipo_venta_id', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="col-md-6 form-floating mb-3">
        {{ Form::select('cliente_id', $cliente, $venta->cliente_id, [
            'class' => 'form-select' . ($errors->has('cliente_id') ? ' is-invalid' : ' is-valid'),
            'required',
        ]) }}
        {{ Form::label('Cliente') }}
        {!! $errors->first('cliente_id', '<div class="invalid-feedback">:message</div>') !!}
    </div>

    <div class="col-md-3 form-floating mb-3">
        <select class="form-select is-valid" name="producto_id" id="producto_id" required>
            <option value="" disabled selected>Seleccione un Producto</option>
            @foreach ($producto as $product)
                <option value="{{ $product->id }}_{{ $product->stock }}_{{ $product->precio_venta }}">
                    {{ $product->nombre }}
                </option>
            @endforeach
        </select>
        <label for="producto">Producto</label>
    </div>
    <div class="col-md-3 form-floating mb-3">
        <input type="text" class="form-control is-valid" placeholder="" name="" id="stock" disabled>
        <label for="cantidad">Stock Actual</label>
    </div>
    <div class="col-md-3 form-floating mb-3">
        <input type="text" class="form-control is-valid" placeholder="" name="precio" id="precio" disabled>
        <label for="precio">Precio del Producto Q.</label>
    </div>
    <div class="col-md-3 form-floating mb-3">
        <input type="number" class="form-control is-valid" placeholder="Descuento" name="descuento" id="descuento"
            maxlength="25" value="0">
        <label for="descuento">Descuento de la Venta %</label>
    </div>

    <div class="col-md-3 form-floating mb-3">
        <input type="number" class="form-control is-valid" placeholder="Cantidad" name="cantidad" id="cantidad"
            minlength="1" maxlength="25">
        <label for="cantidad">Cantidad Vendida</label>
    </div>
    <div class="col-md-3 form-floating mb-3">
        {{ Form::select('conversion_menor_id', $conversionesMenores, $venta->conversion_menor_id, [
            'class' => 'form-select' . ($errors->has('conversion_menor_id') ? ' is-invalid' : ' is-valid'),
            'required',
            'id' => 'conversion_menor_id',
        ]) }}
        {{ Form::label('Unidad de Venta') }}
        {!! $errors->first('conversion_menor_id', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="col-md-3 form-floating mb-3">
        {{ Form::number('impuesto', $venta->impuesto, [
            'class' => 'form-control' . ($errors->has('impuesto') ? ' is-invalid' : ' is-valid'),
            'id' => 'impuesto',
            'placeholder' => 'Impuesto',
            'required',
            'minlength="1"',
            'maxlength="25"',
            'value = 0',
        ]) }}
        {{ Form::label('impuesto') }}
        {!! $errors->first('impuesto', '<div class="invalid-feedback">:message</div>') !!}
    </div>


    <div class="col-12 form-floating mb-3">
        {{ Form::text('descripcion', $venta->descripcion, [
            'class' => 'form-control' . ($errors->has('descripcion') ? ' is-invalid' : ' is-valid'),
            'placeholder' => 'Descripcion',
            'required',
            'minlength="5"',
            'maxlength="100"',
        ]) }}
        {{ Form::label('descripción') }}
        {!! $errors->first('descripcion', '<div class="invalid-feedback">:message</div>') !!}
    </div>

    <!-- DETALLE DE VENTAS -->
    <div class="card">
        <div class="card-header shadow-sm text-center">
            <button type="button" id="agregar" class="btn btn-primary">Agregar Producto</button>
        </div>
        <div class="card-body shadow">
            <h4 class="card-tittle">Detalles de Venta</h4>
            <div class="table-responsive col-md-12">
                <table class="table table-striped table-hover table-bordered" id="detalles2">
                    <thead class="thead">
                        <tr class="text-success">
                            <th class="col-1 text-center shadow align-middle">Eliminar</th>
                            <th class="col-3 text-center shadow align-middle">Producto</th>
                            <th class="col-2 text-center shadow align-middle">Cantidad</th>
                            <th class="col-2 text-center shadow align-middle">Precio de Venta Q.</th>
                            <th class="col-2 text-center shadow align-middle">Descuento %</th>
                            <th class="col-2 text-center shadow align-middle">SubTotal Q.</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                    <tfoot>
                        <tr class="text-secondary">
                            <th colspan="5">
                                <p align="right">TOTAL: </p>
                            </th>
                            <th>
                                <p align="right"><span id="total">Q. 0.00</span> </p>
                            </th>
                        </tr>
                        <tr class="text-danger">
                            <th colspan="5">
                                <p align="right">TOTAL IMPUESTO (IVA 12 %): </p>
                            </th>
                            <th>
                                <p align="right"><span id="total_impuesto">Q. 0.00</span> </p>
                            </th>
                        </tr>
                        <tr>
                            <th colspan="5">
                                <p align="right">TOTAL A PAGAR: </p>
                            </th>
                            <th>
                                <p align="right">
                                    <span align="right" id="total_pagar_html">Q. 0.00</span>
                                    <input type="hidden" name="total" id="total_pagar">
                                </p>
                            </th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>

</div>
<div class="card-footer shadow d-flex justify-content-around">
    <button type="submit" id="guardar" class="btn btn-success"><i class="bi bi-save"></i> Registrar</button>
    <a href="{{ route('ven.index') }}" class="btn btn-secondary"><i class="bi bi-backspace-reverse"></i> Cancelar</a>
</div>
