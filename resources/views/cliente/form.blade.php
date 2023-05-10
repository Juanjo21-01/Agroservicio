<div class="card-body shadow-sm p-0 row g-1">

    <div class="col-md-4 form-floating mb-3">
        {{ Form::select('tipo_cliente_id', $tipoCliente, $cliente->tipo_cliente_id, [
            'class' => 'form-select' . ($errors->has('tipo_cliente_id') ? ' is-invalid' : ' is-valid'),
            'required',
            'autofocus',
        ]) }}
        {{ Form::label('Tipo de Cliente') }}
        {!! $errors->first('tipo_cliente_id', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="col-md-8 form-floating mb-3">
        {{ Form::text('nombre', $cliente->nombre, [
            'class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ' is-valid'),
            'placeholder' => 'Nombre',
            'minlength="5"',
            'maxlength="50"',
        ]) }}
        {{ Form::label('nombre') }}
        {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
    </div>

    <div class="col-md-8 form-floating mb-3">
        {{ Form::text('direccion', $cliente->direccion, [
            'class' => 'form-control' . ($errors->has('direccion') ? ' is-invalid' : ' is-valid'),
            'placeholder' => 'Dirección',
            'minlength="5"',
            'maxlength="80"',
        ]) }}
        {{ Form::label('dirección') }}
        {!! $errors->first('direccion', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="col-md-4 form-floating mb-3">
        {{ Form::text('telefono', $cliente->telefono, [
            'class' => 'form-control' . ($errors->has('telefono') ? ' is-invalid' : ' is-valid'),
            'placeholder' => 'Telefono',
            'minlength="8"',
            'maxlength="25"',
        ]) }}
        {{ Form::label('teléfono') }}
        {!! $errors->first('telefono', '<div class="invalid-feedback">:message</div>') !!}
    </div>


</div>
<div class="card-footer shadow-sm d-flex justify-content-around">
    <button type="submit" class="btn btn-success"><i class="bi bi-save"></i> Registrar</button>
    <a href="{{ route('cl.index') }}" class="btn btn-secondary"><i class="bi bi-backspace-reverse"></i> Cancelar</a>
</div>
