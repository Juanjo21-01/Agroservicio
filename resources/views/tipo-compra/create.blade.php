<x-layouts.plantilla titulo="TipoCompras-crear" meta-description="Compras meta description">
    <section class="container">

        <h2 class="text-center mt-3">Agregar Nuevo Tipo de Compra</h2>

        <div class="row py-2">
            <div class="col-12">

                @includeif('partials.errors')

                <!-- Titulo -->
                <div class="card shadow border-success">
                    <div class="card-header border-bottom shadow">
                        <span class="card-title">Registrar Tipo Compra</span>
                    </div>
                </div>

                <!-- Formulario -->
                <div class="card shadow border-success">
                    <div class="card-body shadow">
                        <form method="POST" action="{{ route('tcom.store') }}" role="form"
                            enctype="multipart/form-data">
                            @csrf

                            @include('tipo-compra.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layouts.plantilla>
