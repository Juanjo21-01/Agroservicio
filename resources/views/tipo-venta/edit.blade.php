<x-layouts.plantilla titulo="TipoVentas-editar" meta-description="Ventas meta description">
    <section class="container">

        <h2 class="text-center mt-3">Actualizar Tipo de Venta</h2>

        <div class="row py-2">
            <div class="col-12">

                @includeif('partials.errors')

                <!-- Titulo -->
                <div class="card shadow border-success">
                    <div class="card-header border-bottom shadow">
                        <span class="card-title">Editar Tipo Venta No. {{ $tipoVenta->id }}</span>
                    </div>
                </div>

                <!-- Formulario -->
                <div class="card shadow border-success">
                    <div class="card-body shadow">
                        <form action="{{ route('tpven.update', $tipoVenta->id) }}" method="POST" role="form"
                            enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('tipo-venta.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layouts.plantilla>
