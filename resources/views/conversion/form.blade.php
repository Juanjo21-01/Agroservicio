<div class="card-body shadow-sm p-1">
    <div class="form-floating mb-3">
        {{ Form::text('nombre', $conversione->nombre, [
            'class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ' is-valid'),
            'placeholder' => 'Nombre',
            'minlength="5"',
            'maxlength="25"',
            'autofocus',
        ]) }}
        {{ Form::label('nombre') }}
        {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
    </div>

</div>
<div class="card-footer shadow-sm d-flex justify-content-around">
    <button type="submit" class="btn btn-success"><i class="bi bi-save"></i> Registrar</button>
    <a href="{{ route('con.index') }}" class="btn btn-secondary"><i class="bi bi-backspace-reverse"></i> Cancelar</a>
</div>
