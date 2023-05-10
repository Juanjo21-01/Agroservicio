<x-layouts.plantilla titulo="TipoProductos-crear" meta-description="Proveedores meta description">
    <section class="container">

        <h2 class="text-center mt-3">Agregar Nuevo Tipo de Producto</h2>

        <div class="row py-2">
            <div class="col-12">

                @includeif('partials.errors')

                <!-- Titulo -->
                <div class="card shadow border-success">
                    <div class="card-header border-bottom shadow">
                        <span class="card-title">Registrar Tipo Producto</span>
                    </div>
                </div>

                <!-- Formulario -->
                <div class="card shadow border-success">
                    <div class="card-body shadow">
                        <form method="POST" action="{{ route('tprod.store') }}" role="form"
                            enctype="multipart/form-data">
                            @csrf

                            @include('tipo-producto.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>


</x-layouts.plantilla>
