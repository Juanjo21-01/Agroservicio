<x-layouts.plantilla titulo="Conversiones Menores-crear" meta-description="Conversiones Menores meta description">
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
                        <form method="POST" action="{{ route('conm.store') }}" role="form"
                            enctype="multipart/form-data">
                            @csrf

                            @include('conversionMenor.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layouts.plantilla>
