<x-layouts.plantilla titulo="Telefono-editar" meta-description="Telefono meta description">
    <section class="container">

        <h2 class="text-center mt-3">Actualizar Número de Teléfono</h2>

        <div class="row py-2">
            <div class="col-12">

                @includeif('partials.errors')

                <!-- Titulo -->
                <div class="card shadow border-success">
                    <div class="card-header border-bottom shadow">
                        <span class="card-title">Editar Número de Teléfono No. {{ $telefono->id }}</span>
                    </div>
                </div>

                <!-- Formulario -->
                <div class="card shadow border-success">
                    <div class="card-body shadow">
                        <form method="POST" action="{{ route('tel.update', $telefono->id) }}" role="form"
                            enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('telefono.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layouts.plantilla>
