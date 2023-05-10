<div class="card-body shadow-sm p-0 row g-1">

    <div class="col-md-6 form-floating mb-3">
        {{ Form::select('tipo_compra_id', $tipoCompra, $compra->tipo_compra_id, [
            'class' => 'form-select' . ($errors->has('tipo_compra_id') ? ' is-invalid' : ' is-valid'),
            'required',
            'autofocus',
        ]) }}
        {{ Form::label('Tipo de Compra') }}
        {!! $errors->first('tipo_compra_id', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="col-md-6 form-floating mb-3">
        {{ Form::select('proveedor_id', $proveedore, $compra->proveedor_id, [
            'class' => 'form-select' . ($errors->has('proveedor_id') ? ' is-invalid' : ' is-valid'),
            'required',
        ]) }}
        {{ Form::label('Proveedor') }}
        {!! $errors->first('proveedor_id', '<div class="invalid-feedback">:message</div>') !!}
    </div>

    <div class="col-md-5 form-floating mb-3">
        <select class="form-select is-valid" name="producto" id="producto" required>
            <option value="" selected disabled>Seleccione un Producto</option>
            @foreach ($producto as $id => $prod)
                <option value="{{ $id }}">{{ $prod }}</option>
            @endforeach
        </select>
        <label for="producto">Producto</label>
    </div>
    <div class="col-md-3 form-floating mb-3">
        <input type="number" class="form-control is-valid" placeholder="Cantidad" name="cantidad" id="cantidad"
            minlength="1" maxlength="25">
        <label for="cantidad">Cantidad de Productos</label>
    </div>
    <div class="col-md-4 form-floating mb-3">
        {{ Form::select('conversion_menor_id', $conversionesMenores, $compra->conversion_menor_id, [
            'class' => 'form-select' . ($errors->has('conversion_menor_id') ? ' is-invalid' : ' is-valid'),
            'id' => 'conversion_menor_id',
            'required',
        ]) }}
        {{ Form::label('Unidad de Medida') }}
        {!! $errors->first('conversion_menor_id', '<div class="invalid-feedback">:message</div>') !!}
    </div>

    <div class="col-md-3 form-floating mb-3">
        <input type="number" class="form-control is-valid" placeholder="Precio" name="precio" id="precio"
            minlength="1" maxlength="25">
        <label for="precio">Precio del Producto Q.</label>
    </div>
    <div class="col-md-3 form-floating mb-3">
        {{ Form::number('impuesto', $compra->impuesto, [
            'class' => 'form-control' . ($errors->has('impuesto') ? ' is-invalid' : ' is-valid'),
            'id' => 'impuesto',
            'placeholder' => 'Impuesto',
            'required',
            'minlength="1"',
            'maxlength="25"',
            'value=0',
        ]) }}
        {{ Form::label('impuesto del producto') }}
        {!! $errors->first('impuesto', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="col-md-6 form-floating mb-3">
        {{ Form::text('descripcion', $compra->descripcion, [
            'class' => 'form-control' . ($errors->has('descripcion') ? ' is-invalid' : ' is-valid'),
            'placeholder' => 'Descripcion',
            'required',
            'minlength="5"',
            'maxlength="100"',
        ]) }}
        {{ Form::label('descripción') }}
        {!! $errors->first('descripcion', '<div class="invalid-feedback">:message</div>') !!}
    </div>

    {{-- Se puede guardar una imagen con el recibo de la compra --}}

    <!-- DETALLE DE COMPRAS -->
    <div class="card">
        <div class="card-header shadow-sm text-center">
            <button type="button" id="agregar" class="btn btn-primary">Agregar Producto</button>
        </div>
        <div class="card-body shadow">
            <h4 class="card-tittle">Detalles de Compra</h4>
            <div class="table-responsive col-md-12">
                <table class="table table-striped table-hover table-bordered" id="detalles">
                    <thead class="thead">
                        <tr class="text-success">
                            <th class="col-2 text-center shadow align-middle">Eliminar</th>
                            <th class="col-4 text-center shadow align-middle">Producto</th>
                            <th class="col-2 text-center shadow align-middle">Cantidad</th>
                            <th class="col-2 text-center shadow align-middle">Precio Q.</th>
                            <th class="col-2 text-center shadow align-middle">SubTotal Q.</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                    <tfoot>
                        <tr class="text-secondary">
                            <th colspan="4">
                                <p align="right">TOTAL: </p>
                            </th>
                            <th>
                                <p align="right"><span id="total">Q. 0.00</span> </p>
                            </th>
                        </tr>
                        <tr id="dvOcultar" class="text-danger">
                            <th colspan="4">
                                <p align="right">TOTAL IMPUESTO (IVA 12 %): </p>
                            </th>
                            <th>
                                <p align="right"><span id="total_impuesto">Q. 0.00</span> </p>
                            </th>
                        </tr>
                        <tr>
                            <th colspan="4">
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
    <a href="{{ route('com.index') }}" class="btn btn-secondary"><i class="bi bi-backspace-reverse"></i> Cancelar</a>
</div>
