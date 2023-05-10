<x-layouts.plantilla titulo="Conversiones-crear" meta-description="Conversiones meta description">
    <section class="container">

        <h2 class="text-center mt-3">Agregar Nueva Unidad de Medida</h2>

        <div class="row py-2">
            <div class="col-12">

                @includeif('partials.errors')

                <!-- Titulo -->
                <div class="card shadow border-success">
                    <div class="card-header border-bottom shadow">
                        <span class="card-title">Registrar Medida</span>
                    </div>
                </div>

                <!-- Formulario -->
                <div class="card shadow border-success">
                    <div class="card-body shadow">
                        <form method="POST" action="{{ route('con.store') }}" role="form"
                            enctype="multipart/form-data">
                            @csrf

                            @include('conversion.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layouts.plantilla>
