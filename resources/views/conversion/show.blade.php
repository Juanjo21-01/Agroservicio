<x-layouts.plantilla titulo="Conversiones-ver" meta-description="Conversiones meta description">
    <section class="container">

        <h2 class="text-center mt-3">Unidad de Medida No. {{ $conversione->id }}</h2>

        <div class="row py-2">
            <div class="col-12">

                <!-- Titulo -->
                <div class="card shadow border-primary">
                    <div class="card-header border-bottom shadow">
                        <a href="{{ route('con.index') }}" class="btn btn-primary">
                            <i class="bi bi-chevron-double-left"></i> Regresar</a>
                    </div>
                </div>

                <!-- Contenido -->
                <div class="card shadow border-primary">
                    <div class="card-body shadow">
                        <div class="input-group py-2">
                            <span class="input-group-text"><strong>Nombre</strong></span>
                            <span class="form-control "> {{ $conversione->nombre }}</span>
                        </div>
                        <div class="input-group py-2">
                            <span class="input-group-text"><strong>Fecha de Creación</strong></span>
                            <span class="form-control " data-bs-toggle="tooltip" data-bs-placement="right"
                                data-bs-title="Hora: {{ date('H : i : s', strtotime($conversione->created_at)) }}">
                                {{ $conversione->created_at->toFormattedDAteString() }}</span>
                        </div>
                        <div class="input-group py-2">
                            <span class="input-group-text"><strong>Última <span class="d-none d-sm-inline-block">
                                        Fecha de</span> Actualización</strong></span>
                            <span class="form-control "data-bs-toggle="tooltip" data-bs-placement="right"
                                data-bs-title="Hora: {{ date('H : i : s', strtotime($conversione->updated_at)) }}">
                                {{ $conversione->updated_at->toFormattedDateString() }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layouts.plantilla>
