<x-layouts.plantilla titulo="TipoCompras-editar" meta-description="Compras meta description">
    <section class="container">

        <h2 class="text-center mt-3">Actualizar Tipo de Compra</h2>

        <div class="row py-2">
            <div class="col-12">

                @includeif('partials.errors')

                <!-- Titulo -->
                <div class="card shadow border-success">
                    <div class="card-header border-bottom shadow">
                        <span class="card-title">Editar Tipo Compra No. {{ $tipoCompra->id }}</span>
                    </div>
                </div>

                <!-- Formulario -->
                <div class="card shadow border-success">
                    <div class="card-body shadow">
                        <form method="POST" action="{{ route('tcom.update', $tipoCompra->id) }}" role="form"
                            enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('tipo-compra.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layouts.plantilla>
