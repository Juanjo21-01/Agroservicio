<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agroservicio - Login</title>
    <!-- Estilos de Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>

<body class="text-center bg-light">
    <main class="">
        <div class="container w-75 mt-3  rounded shadow">
            <div class="row align-items-stretch">
                <div class="col d-none d-lg-block"></div>
                <div class="col rounded shadow p-3">
                    <form action="{{ route('login.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <img class="mt-3" src="{{ asset('img/logo.png') }}" alt="logo" width="144"
                                height="114">
                        </div>
                        <h1 class="fw-bold py-2">Iniciar Sesion</h1>
                        <div class="mb-3">
                            <label class="form-label" for="">Tipo de Usuario</label>
                            <select class="form-control text-center" name="tipo" id="tipo" required>
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
                            <label class="form-label text-dark" for="Nombre">Usuario</label>
                            <input class="form-control" type="text" id="Nombre" name="name"
                                value="{{ old('name') }}" required minlength="8">
                        </div>
                        @error('name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                        <div class="mb-3">
                            <label class="form-label" for="password">Contraseña</label>
                            <input class="form-control" type="password" id="passPasswordword" name="password" required>
                        </div>
                        @error('password')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                        <div class="mb-3 form-check ">
                            <label>
                                <input class="form-check-input" type="checkbox" id="" name="remember">
                                Mantener Sesión Conectada </label>
                        </div>
                        <div class="d-grid">
                            <button class="btn btn-lg btn-primary" type="submit">Entrar</button>
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
