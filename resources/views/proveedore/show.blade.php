<x-layouts.plantilla titulo="Proveedores-ver" meta-description="Proveedores meta description">
    <section class="container">

        <h2 class="text-center mt-3">Proveedor No. {{ $proveedore->id }}</h2>

        <div class="row py-2">
            <div class="col-12">

                <!-- Información -->
                <div class="card shadow border-primary">
                    <div class="card-body border-bottom shadow ">
                        <div class="row">
                            <!-- Nombre -->
                            <div class="card-header shadow col-lg-4">
                                <div class="border-bottom text-center pb-4">
                                    <h3 class="">{{ $proveedore->nombre }}</h3>
                                </div>
                                <div class="border-bottom text-center py-4">
                                    <div class="list-group">
                                        <button type="button" class="list-group-item list-group-item-action active">
                                            Sobre proveedor</button>
                                        <button type="button" class="list-group-item list-group-item-action">
                                            Productos</button>
                                        <button type="button" class="list-group-item list-group-item-action">
                                            Registrar producto</button>
                                    </div>
                                </div>
                            </div>
                            <!-- Contenido -->
                            <div class="card shadow col-lg-8 p-2">
                                <h4 class="text-center border-bottom pb-2">Información del proveedor</h4>
                                <div class="card-body shadow">
                                    <div class="input-group py-2">
                                        <span class="input-group-text"><strong>Nombre</strong></span>
                                        <span class="form-control "> {{ $proveedore->nombre }}</span>
                                    </div>
                                    <div class="input-group py-2">
                                        <span class="input-group-text"><strong>Nit</strong></span>
                                        <span class="form-control "> {{ $proveedore->nit }}</span>
                                    </div>
                                    <div class="input-group py-2">
                                        <span class="input-group-text"><strong>Direccion</strong></span>
                                        <span class="form-control "> {{ $proveedore->direccion }}</span>
                                    </div>
                                    <div class="input-group py-2">
                                        <span class="input-group-text"><strong>Fecha de Creación</strong></span>
                                        <span class="form-control " data-bs-toggle="tooltip" data-bs-placement="right"
                                            data-bs-title="Hora: {{ date('H : i : s', strtotime($proveedore->created_at)) }}">
                                            {{ $proveedore->created_at->toFormattedDAteString() }}</span>
                                    </div>
                                    <div class="input-group py-2">
                                        <span class="input-group-text"><strong>Última <span
                                                    class="d-none d-sm-inline-block">
                                                    Fecha de</span> Actualización</strong></span>
                                        <span class="form-control "data-bs-toggle="tooltip" data-bs-placement="right"
                                            data-bs-title="Hora: {{ date('H : i : s', strtotime($proveedore->updated_at)) }}">
                                            {{ $proveedore->updated_at->toFormattedDateString() }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer shadow ">
                        <a href="{{ route('prov.index') }}" class="btn btn-primary">
                            <i class="bi bi-chevron-double-left"></i> Regresar</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layouts.plantilla>
