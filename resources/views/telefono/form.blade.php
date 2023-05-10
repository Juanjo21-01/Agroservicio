<div class="card-body shadow-sm p-0 row g-1">

    <div class="col-md-6 form-floating mb-3">
        {{ Form::select('proveedor_id', $proveedores, $telefono->proveedor_id, [
            'class' => 'form-select' . ($errors->has('proveedor_id') ? ' is-invalid' : ' is-valid'),
            'required',
            'autofocus',
        ]) }}
        {{ Form::label('proveedor') }}
        {!! $errors->first('proveedor_id', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="col-md-6 form-floating mb-3">
        {{ Form::text('telefono', $telefono->telefono, [
            'class' => 'form-control' . ($errors->has('telefono') ? ' is-invalid' : ' is-valid'),
            'placeholder' => 'Telefono',
            'minlength="8"',
            'maxlength="25"',
        ]) }}
        {{ Form::label('télefono') }}
        {!! $errors->first('telefono', '<div class="invalid-feedback">:message</div>') !!}
    </div>

</div>

<div class="card-footer shadow-sm d-flex justify-content-around">
    <button type="submit" class="btn btn-success"><i class="bi bi-save"></i> Registrar</button>
    <a href="{{ route('tel.index') }}" class="btn btn-secondary"><i class="bi bi-backspace-reverse"></i> Cancelar</a>
</div>
