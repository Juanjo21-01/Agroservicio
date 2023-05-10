<header class="p-2 bg-dark text-white">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark" aria-label="Offcanvas navbar large">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('home') }}"><i class="bi bi-houses"></i> Inicio</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar2"
                aria-controls="offcanvasNavbar2">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasNavbar2"
                aria-labelledby="offcanvasNavbar2Label">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasNavbar2Label">Opciones</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"
                        aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                        <li class="nav-item"> <a class="nav-link " aria-current="page"
                                href="{{ route('prod.index') }}">Productos</a> </li>
                        <li class="nav-item"> <a class="nav-link " aria-current="page"
                                href="{{ route('com.index') }}">Compras</a> </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false"> Ventas </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ route('ven.index') }}">Tabla de Ventas</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="{{ route('reporte.dia') }}">Reporte del dia</a></li>
                                <li><a class="dropdown-item" href="{{ route('reporte.fecha') }}">Reporte por fechas</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item"> <a class="nav-link " aria-current="page"
                                href="{{ route('prov.index') }}">Proveedores</a> </li>
                        <li class="nav-item"> <a class="nav-link " aria-current="page"
                                href="{{ route('cl.index') }}">Clientes</a> </li>
                        </li>
                        @auth
                            @if (Auth::user()->tipo_usuarios_id == 1 || Auth::user()->tipo_usuarios_id == 2)
                                <li class="nav-item"> <a class="nav-link " aria-current="page"
                                        href="{{ route('usuarios.index') }}">Usuarios</a> </li>
                                </li>
                            @endif
                        @endauth
                    </ul>

                    @guest
                        <a href="{{ route('login.index') }}"><button type="button" class="btn btn-warning ">
                                Iniciar Sesión</button></a>
                    @endguest
                    @auth
                        <form style="display: inline" action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-danger">Cerrar Sesión</button>
                        </form>
                    @endauth
                </div>
            </div>
        </div>
    </nav>
</header>
