<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agroservicio - Registrarse</title>
    <!-- Estilos de Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" />

</head>

<body class="text-center bg-light">
    <main class="">
        <div class="container w-75 mt-5  rounded shadow">
            <div class="row align-items-stretch">
                <div class="col d-none d-lg-block"></div>
                <div class="col rounded shadow p-3">
                    <form action="{{ route('registrar.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <img class="mt-3" src="{{ asset('img/logo.png') }}" alt="logo" width="144"
                                height="114">
                        </div>
                        <h1 class="fw-bold py-2">Registrarse</h1>
                        <div class="mb-3">
                            <label class="form-label" for="">Tipo de Usuario</label>
                            <select class="form-control text-center" name="tipo" id="tipo">
                                <option value="0" disabled selected>Seleccione el Usuario</option>
                                <option value="empleado">Empleado</option>
                                <option value="propietario">Propietario</option>
                                <option value="administrador">Administrador</option>
                            </select>
                            @error('tipo')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label text-dark" for="usuario">Usuario</label>
                            <input class="form-control" type="text" id="usuario" name="name"
                                value="{{ old('name') }}" required minlength="8" maxlength="20">
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label text-dark" for="email">Correo Electrónico</label>
                            <input class="form-control" type="email" id="email" name="email"
                                value="{{ old('email') }}" required maxlength="50">
                            @error('email')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="password">Contraseña</label>
                            <input class="form-control" type="password" id="password" name="password"
                                value="{{ old('password') }}" required minlength="8" maxlength="100">
                            @error('password')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="password">Confirmar Contraseña</label>
                            <input class="form-control" type="password" id="password" name="password_confirmation"
                                value="{{ old('password_confirmation') }}" required minlength="8" maxlength="100">
                            @error('password_confirmation')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="d-grid">
                            <button class="btn btn-lg btn-primary" type="submit">Registrar</button>
                        </div>
                        <div class="my-3">
                            <span><a href="{{ route('login.index') }}">Iniciar Sesión</a></span><br>
                        </div>

                    </form>
                </div>
                <div class="col d-none d-lg-block"></div>
            </div>

        </div>

    </main>



    <!-- Enlaces de bootstrap-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
