<div class="card-body shadow-sm p-0 row g-1">

    <div class="col-md-8 form-floating mb-3">
        {{ Form::text('nombre', $proveedore->nombre, [
            'class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ' is-valid'),
            'placeholder' => 'Nombre',
            'minlength="5"',
            'maxlength="50"',
            'autofocus',
        ]) }}
        {{ Form::label('nombre') }}
        {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="col-md-4 form-floating mb-3">
        {{ Form::text('nit', $proveedore->nit, [
            'class' => 'form-control' . ($errors->has('nit') ? ' is-invalid' : ' is-valid'),
            'placeholder' => 'Nit',
            '',
            'minlength="8"',
            'maxlength="15"',
        ]) }}
        {{ Form::label('nit') }}
        {!! $errors->first('nit', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="col-12 form-floating mb-3">
        {{ Form::text('direccion', $proveedore->direccion, [
            'class' => 'form-control' . ($errors->has('direccion') ? ' is-invalid' : ' is-valid'),
            'placeholder' => 'Direccion',
            'minlength="5"',
            'maxlength="80"',
        ]) }}
        {{ Form::label('dirección') }}
        {!! $errors->first('dirección', '<div class="invalid-feedback">:message</div>') !!}
    </div>
</div>
<div class="card-footer shadow-sm d-flex justify-content-around">
    <button type="submit" class="btn btn-success"><i class="bi bi-save"></i> Registrar</button>
    <a href="{{ route('prov.index') }}" class="btn btn-secondary"><i class="bi bi-backspace-reverse"></i> Cancelar</a>
</div>
