<x-layouts.plantilla titulo="Telefono-ver" meta-description="Telefono meta description">
    <section class="container">

        <h2 class="text-center mt-3">Número de Teléfono No. {{ $telefono->id }}</h2>

        <div class="row py-2">
            <div class="col-12">

                <!-- Titulo -->
                <div class="card shadow border-primary">
                    <div class="card-header border-bottom shadow">
                        <a href="{{ route('tel.index') }}" class="btn btn-primary">
                            <i class="bi bi-chevron-double-left"></i> Regresar</a>
                    </div>
                </div>

                <!-- Contenido -->
                <div class="card shadow border-primary">
                    <div class="card-body shadow">
                        <div class="input-group py-2">
                            <span class="input-group-text"><strong>Proveedor</strong></span>
                            <span class="form-control ">
                                @foreach ($proveedores as $id => $proveedore)
                                    @if ($id == $telefono->proveedor_id)
                                        {{ Str::title($proveedore) }}
                                    @endif
                                @endforeach
                            </span>
                        </div>
                        <div class="input-group py-2">
                            <span class="input-group-text"><strong>Teléfono</strong></span>
                            <span class="form-control "> {{ $telefono->telefono }}</span>
                        </div>
                        <div class="input-group py-2">
                            <span class="input-group-text"><strong>Fecha de Creación</strong></span>
                            <span class="form-control " data-bs-toggle="tooltip" data-bs-placement="right"
                                data-bs-title="Hora: {{ date('H : i : s', strtotime($telefono->created_at)) }}">
                                {{ $telefono->created_at->toFormattedDAteString() }}</span>
                        </div>
                        <div class="input-group py-2">
                            <span class="input-group-text"><strong>Última <span class="d-none d-sm-inline-block">
                                        Fecha de</span> Actualización</strong></span>
                            <span class="form-control "data-bs-toggle="tooltip" data-bs-placement="right"
                                data-bs-title="Hora: {{ date('H : i : s', strtotime($telefono->updated_at)) }}">
                                {{ $telefono->updated_at->toFormattedDateString() }}</span>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layouts.plantilla>
