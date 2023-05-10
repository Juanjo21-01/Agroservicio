<x-layouts.plantilla titulo="Telefono-crear" meta-description="Telefono meta description">
    <section class="container">

        <h2 class="text-center mt-3">Agregar Nuevo Número de Teléfono</h2>

        <div class="row py-2">
            <div class="col-12">

                @includeif('partials.errors')

                <!-- Titulo -->
                <div class="card shadow border-success">
                    <div class="card-header border-bottom shadow">
                        <span class="card-title">Registrar Número de Teléfono</span>
                    </div>
                </div>

                <!-- Formulario -->
                <div class="card shadow border-success">
                    <div class="card-body shadow">
                        <form method="POST" action="{{ route('tel.store') }}" role="form"
                            enctype="multipart/form-data">
                            @csrf

                            @include('telefono.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layouts.plantilla>
