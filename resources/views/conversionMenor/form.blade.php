<div class="card-body shadow-sm p-0 row g-1">
    <div class="col-md-7 form-floating mb-3">
        {{ Form::text('nombre', $conversionesMenor->nombre, [
            'class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ' is-valid'),
            'placeholder' => 'Nombre',
            'minlength="5"',
            'maxlength="25"',
            'autofocus',
        ]) }}
        {{ Form::label('nombre') }}
        {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}


    </div>

    <div class="col-md-5 form-floating mb-3">
        <select class="form-select is-valid" name="conversion_id" id="conversion_id" required>
            <option value="" selected disabled>Seleccione una Medida</option>
            @foreach ($conversione as $id => $prod)
                <option value="{{ $id }}">{{ $prod }}</option>
            @endforeach
        </select>
        <label for="conversion_id">Unidad de Medida</label>
    </div>

</div>
<div class="card-footer shadow-sm d-flex justify-content-around">
    <button type="submit" class="btn btn-success"><i class="bi bi-save"></i> Registrar</button>
    <a href="{{ route('con.index') }}" class="btn btn-secondary"><i class="bi bi-backspace-reverse"></i> Cancelar</a>
</div>
