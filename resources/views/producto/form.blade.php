<div class="card-body shadow-sm p-0 row g-1">

    <div class="col-md-6 form-floating mb-3">
        {{ Form::select('tipo_producto_id', $tipoProducto, $producto->tipo_producto_id, [
            'class' => 'form-select' . ($errors->has('tipo_producto_id') ? ' is-invalid' : ' is-valid'),
            'required',
        ]) }}
        {{ Form::label('Tipo de Producto') }}
        {!! $errors->first('tipo_producto_id', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="col-md-6 form-floating mb-3">
        {{ Form::select('proveedor_id', $proveedores, $producto->proveedor_id, [
            'class' => 'form-select' . ($errors->has('proveedor_id') ? ' is-invalid' : ' is-valid'),
            'required',
        ]) }}
        {{ Form::label('Proveedor') }}
        {!! $errors->first('proveedor_id', '<div class="invalid-feedback">:message</div>') !!}
    </div>

    <div class="col-md-6 form-floating mb-3">
        {{ Form::text('nombre', $producto->nombre, [
            'class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ' is-valid'),
            'placeholder' => 'Nombre',
            'minlength="5"',
            'maxlength="50"',
            'autofocus',
        ]) }}
        {{ Form::label('nombre del producto') }}
        {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="col-md-3 form-floating mb-3">
        {{ Form::text('precio_venta', $producto->precio_venta, [
            'class' => 'form-control' . ($errors->has('precio_venta') ? ' is-invalid' : ' is-valid'),
            'placeholder' => 'Precio Venta',
            'minlength="1"',
            'maxlength="25"',
        ]) }}
        {{ Form::label('precio de venta (Q.)') }}
        {!! $errors->first('precio_venta', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="col-md-3 form-floating mb-3">
        {{ Form::select('conversion_id', $conversiones, $producto->conversion_id, [
            'class' => 'form-select' . ($errors->has('conversion_id') ? ' is-invalid' : ' is-valid'),
            'required',
        ]) }}
        {{ Form::label('Unidad de Medida') }}
        {!! $errors->first('conversion_id', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    {{-- <div class="col-md-3 form-floating mb-3">
        {{ Form::text('cantidad_medida', $producto->cantidad_medida, [
            'class' => 'form-control' . ($errors->has('cantidad_medida') ? ' is-invalid' : ' is-valid'),
            'placeholder' => 'cantidad de medida',
            'minlength="1"',
            'maxlength="25"',
        ]) }}
        {{ Form::label('cantidad de medida') }}
        {!! $errors->first('cantidad_medida', '<div class="invalid-feedback">:message</div>') !!}
    </div> --}}

    <div class="col-md-7 form-floating mb-3">
        {{ Form::text('descripcion', $producto->descripcion, [
            'class' => 'form-control' . ($errors->has('descripcion') ? ' is-invalid' : ' is-valid'),
            'placeholder' => 'Descripcion',
            'minlength="5"',
            'maxlength="100"',
        ]) }}
        {{ Form::label('descripción') }}
        {!! $errors->first('descripcion', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="col-md-5 form-floating mb-3">
        {{ Form::date('fecha_vencimiento', $producto->fecha_vencimiento, [
            'class' => 'form-control' . ($errors->has('fecha_vencimiento') ? ' is-invalid' : ' is-valid'),
            'placeholder' => 'Fecha Vencimiento',
        ]) }}
        {{ Form::label('fecha de vencimiento') }}
        {!! $errors->first('fecha_vencimiento', '<div class="invalid-feedback">:message</div>') !!}
    </div>


    <div class="col-12 mb-3">
        <input class="form-control {{ $errors->has('foto') ? ' is-invalid' : ' is-valid' }}" type="file"
            name="foto" id="foto" required onchange="vista_preliminar(event)">
    </div>
    <div class="col-12 card-img shadow mb-3">
        <img class="img-fluid img-thumbnail mx-auto d-block rounded" alt="" id="imagen-prev">
    </div>

</div>
<div class="card-footer shadow-sm d-flex justify-content-around">
    <button type="submit" class="btn btn-success"><i class="bi bi-save"></i> Registrar</button>
    <a href="{{ route('prod.index') }}" class="btn btn-secondary"><i class="bi bi-backspace-reverse"></i> Cancelar</a>
</div>
