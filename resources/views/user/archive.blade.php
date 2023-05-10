<x-layouts.plantilla titulo="Usuarios Deshabilitados" meta-description="Usuarios deshabilitados meta description">
    {{-- CONTENIDO DEL MODULO USUARIOS --}}

    <div class="container-fluid">

        <h1 class="text-center mt-2">Usuarios Deshabilitados</h1>

        <div class="row">
            <div class="col-12">

                <!-- Botones para crear y ver deshabilitados-->
                <div class="card shadow border-secondary">
                    <div class="card-header border-bottom shadow">
                        <div class="row justify-content-between py-1">
                            <div class="col-4 text-center">
                                <a href="{{ route('registrar.index') }}" class="btn btn-success bg-gradient"
                                    data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Registrar Usuario">
                                    <i class="bi bi-plus-circle"></i>
                                    <span class="d-none d-sm-inline-block">{{ __('Registrar Nuevo') }}</span> </a>
                            </div>
                            <div class="col-4 text-center">
                                <a href="{{ route('usuarios.archive') }}" class="btn btn-danger bg-gradient"
                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                    data-bs-title="Ver Usuarios Deshabilitados"> <i class="bi bi-file-earmark-x"></i>
                                    <span class="d-none d-sm-inline-block">{{ __('Deshabilitados') }} </span></a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Tabla Usuarios---->
                <div class="card shadow border-secondary">
                    <div class="card-body shadow">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover table-bordered" id="ordenamiento">
                                <thead class="thead">
                                    <tr>
                                        <th class="col-1 text-center shadow align-middle">ID</th>
                                        <th class="col-2 text-center shadow align-middle">Usuario</th>
                                        <th class="col-3 text-center shadow align-middle">Correo Electrónico</th>
                                        <th class="col-2 text-center shadow align-middle">Tipo de Usuario</th>
                                        <th class="col-2 text-center shadow align-middle">Fecha</th>
                                        <th class="col-1 text-center shadow align-middle">Restaurar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($usuarios as $usuario)
                                        <tr>
                                            <td class="col-1 text-center align-middle">{{ $usuario->id }}</td>
                                            <td class="col-2 text-justify align-middle">
                                                {{ $usuario->name }}
                                            </td>
                                            <td class="col-3 text-justify align-middle">{{ $usuario->email }}
                                            </td>
                                            <td class="col-2 text-justify align-middle">
                                                @foreach ($tipoUsuarios as $tipoUsuario)
                                                    @if ($tipoUsuario->id == $usuario->tipo_usuarios_id)
                                                        {{ Str::title($tipoUsuario->nombre) }}
                                                    @endif
                                                @endforeach
                                            </td>
                                            <td class="col-2 text-justify align-middle">
                                                {{ $usuario->created_at->diffForHumans() }}
                                            <td class="col-2 text-center">
                                                @if (Auth::user()->tipo_usuarios_id == 1 || Auth::user()->tipo_usuarios_id == 2)
                                                    <!-- Button trigger modal -->
                                                    <button type="button" class="btn btn-sm btn-outline-success mb-1"
                                                        title="Restaurar" data-bs-toggle="modal"
                                                        data-bs-target="#modal-restaurar-{{ $usuario->id }}"><i
                                                            class="bi bi-file-arrow-up"></i> Restaurar
                                                    </button>
                                                @endif
                                            </td>
                                        </tr>
                                        @include('user.restaurar')
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

</x-layouts.plantilla>
