<x-layouts.plantilla titulo="Inicio" meta-description="Inicio meta description">
    {{-- CONTENIDO DEL INICIO --}}

    <div class="container-fluid">

        @auth
            <div class="row pt-2">
                <div class="col-12">
                    <div class="card shadow border-secondary alert alert-success alert-dismissible fade show" role="alert">
                        @if (Auth::user()->tipo_usuarios_id == 1)
                            <h3 class="alert-heading">Bienvenido Administrador {{ Auth::user()->name }}</h3>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        @elseif (Auth::user()->tipo_usuarios_id == 2)
                            <h3 class="alert-heading">Bienvenido Propietario {{ Auth::user()->name }}</h3>
                            <button type="button" class="btn-close " data-bs-dismiss="alert" aria-label="Close"></button>
                        @elseif (Auth::user()->tipo_usuarios_id == 3)
                            <h3 class="alert-heading">Bienvenido Empleado {{ Auth::user()->name }}</h3>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        @else
                            {{ Auth::user()->name }}
                        @endif
                    </div>
                </div>
            </div>
        @endauth

        <div class="row pt-3"data-bs-toggle="tooltip" data-bs-placement="top"
            data-bs-title="Ganancia = Ventas - Compras">
            <div class="col-md-6">
                <div class="card shadow border-dark">
                    <div class="card-body shadow-sm p-1 ">
                        <h4 class="text-center">Ganancia Total =
                            @if ($ganancias >= 0)
                                <span class="text-primary"> {{ number_format($ganancias, 2) }}</span>
                            @else
                                <span class="text-danger"> {{ number_format($ganancias, 2) }}</span>
                            @endif
                        </h4>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card shadow border-dark">
                    <div class="card-body shadow-sm p-1 ">
                        <h4 class="text-center">Ganancia del Día =
                            @if ($gananciasmes >= 0)
                                <span class="text-primary"> {{ number_format($gananciasmes, 2) }}</span>
                            @else
                                <span class="text-danger"> {{ number_format($gananciasmes, 2) }}</span>
                            @endif
                        </h4>
                    </div>
                </div>
            </div>
        </div>

        <div class="row pt-3">
            <div class="col-12">
                <div class="card shadow border-secondary">
                    <div class="card-body shadow border-info">
                        @foreach ($totalespordia as $total)
                            <div class="row">
                                <div class="col-lg-6 col-xs-6">
                                    <div class="card text-light bg-info">
                                        <div class="card-body pb-0">
                                            <div class="row m-2">
                                                <div class="col-9 ">
                                                    @foreach ($totales as $tot)
                                                        <h4>Compras</h4>
                                                        <h3> <strong>Q. {{ number_format($tot->totalcompra, 2) }}
                                                                (TOTAL)
                                                            </strong>
                                                        </h3>
                                                    @endforeach
                                                    <h4> <strong>Q. {{ number_format($total->totalcompra, 2) }}
                                                            (HOY)</strong>
                                                    </h4>
                                                </div>
                                                <div class="col-3">
                                                    <a href="{{ route('com.create') }}" class="text-reset"
                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                        data-bs-title="Registrar una Compra">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="115"
                                                            height="115" fill="currentColor" class="bi bi-cart4"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l.5 2H5V5H3.14zM6 5v2h2V5H6zm3 0v2h2V5H9zm3 0v2h1.36l.5-2H12zm1.11 3H12v2h.61l.5-2zM11 8H9v2h2V8zM8 8H6v2h2V8zM5 8H3.89l.5 2H5V8zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z" />
                                                        </svg>
                                                    </a>

                                                </div>
                                            </div>

                                            <div class="row m-2">
                                                <a href="{{ route('com.index') }}"
                                                    class="btn btn-outline-light btn-block">Compras <i
                                                        class="bi bi-arrow-right-circle"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-xs-6">
                                    <div class="card text-info bg-light">
                                        <div class="card-body pb-0">
                                            <div class="row m-2">
                                                <div class="col-9 ">
                                                    @foreach ($totales as $tot)
                                                        <h4>Ventas</h4>
                                                        <h3> <strong>Q. {{ number_format($tot->totalventa, 2) }}
                                                                (TOTAL)
                                                            </strong>
                                                        </h3>
                                                    @endforeach
                                                    <h4> <strong>Q.
                                                            {{ number_format($total->totalventa, 2) }}
                                                            (HOY)
                                                        </strong> </h4>
                                                </div>
                                                <div class="col-3">
                                                    <a href="{{ route('ven.create') }}" class="text-reset"
                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                        data-bs-title="Registrar una Venta">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="115"
                                                            height="115" fill="currentColor" class="bi bi-cash-coin"
                                                            viewBox="0 0 16 16">
                                                            <path fill-rule="evenodd"
                                                                d="M11 15a4 4 0 1 0 0-8 4 4 0 0 0 0 8zm5-4a5 5 0 1 1-10 0 5 5 0 0 1 10 0z" />
                                                            <path
                                                                d="M9.438 11.944c.047.596.518 1.06 1.363 1.116v.44h.375v-.443c.875-.061 1.386-.529 1.386-1.207 0-.618-.39-.936-1.09-1.1l-.296-.07v-1.2c.376.043.614.248.671.532h.658c-.047-.575-.54-1.024-1.329-1.073V8.5h-.375v.45c-.747.073-1.255.522-1.255 1.158 0 .562.378.92 1.007 1.066l.248.061v1.272c-.384-.058-.639-.27-.696-.563h-.668zm1.36-1.354c-.369-.085-.569-.26-.569-.522 0-.294.216-.514.572-.578v1.1h-.003zm.432.746c.449.104.655.272.655.569 0 .339-.257.571-.709.614v-1.195l.054.012z" />
                                                            <path
                                                                d="M1 0a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h4.083c.058-.344.145-.678.258-1H3a2 2 0 0 0-2-2V3a2 2 0 0 0 2-2h10a2 2 0 0 0 2 2v3.528c.38.34.717.728 1 1.154V1a1 1 0 0 0-1-1H1z" />
                                                            <path
                                                                d="M9.998 5.083 10 5a2 2 0 1 0-3.132 1.65 5.982 5.982 0 0 1 3.13-1.567z" />
                                                        </svg>
                                                    </a>

                                                </div>
                                            </div>
                                            <div class="row m-2">
                                                <a href="{{ route('ven.index') }}"
                                                    class="btn btn-outline-info btn-block">Ventas <i
                                                        class="bi bi-arrow-right-circle"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <div class="row pt-3">
            <div class="col-md-6">
                <div class="card shadow border-danger">
                    <div class="card-header shadow-sm pb-0">
                        <h4 class="text-center">Compras - Meses</h4>
                    </div>
                    <div class="card-body shadow">
                        <canvas id="myChart" width="auto" height="auto"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card shadow border-primary">
                    <div class="card-header shadow-sm pb-0">
                        <h4 class="text-center">Ventas - Meses</h4>
                    </div>
                    <div class="card-body shadow">
                        <canvas id="ventas" width="auto" height="auto"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <div class="row pt-3">
            <div class="col-md-12">
                <div class="card show border-success">
                    <div class="card-header shadow-sm pb-0">
                        <h4 class="text-center">Compras y Ventas Diarias</h4>
                    </div>
                    <div class="card-body">
                        <h5 class="text-center text-muted">Cantidad</h5>
                        <canvas id="ventasdiacantidad" width="auto" height="100"></canvas>
                    </div>
                    <div class="card-body">
                        <h5 class="text-center text-muted">Total (Q.)</h5>
                        <canvas id="ventasdia" width="auto" height="100"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @section('script')
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            const ctx = document.getElementById('myChart').getContext('2d');
            const myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: [<?php foreach ($comprasmes as $reg) {
                        setLocale(LC_TIME, 'es-ES', 'Spanish_Spain', 'Spanish');
                        $mes_traducido = strftime('%B', strtotime($reg->mes));
                        echo '"' . $mes_traducido . '",';
                    } ?>],
                    datasets: [{
                        label: 'Compras',
                        data: [<?php foreach ($comprasmes as $reg) {
                            echo '' . $reg->totalmes . ',';
                        } ?>],
                        borderColor: 'rgba(255, 99, 132, 1)',
                        borderWidth: 3
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });

            const venta = document.getElementById('ventas').getContext('2d');
            const charVenta = new Chart(venta, {
                type: 'bar',
                data: {
                    labels: [<?php foreach ($ventasmes as $reg) {
                        setLocale(LC_TIME, 'es-ES', 'Spanish_Spain', 'Spanish');
                        $mes_traducido = strftime('%B', strtotime($reg->mes));
                        echo '"' . $mes_traducido . '",';
                    } ?>],
                    datasets: [{
                        label: 'Ventas',
                        data: [<?php foreach ($ventasmes as $reg) {
                            echo '' . $reg->totalmes . ',';
                        } ?>],
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 3
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });

            const ventadiacantidad = document.getElementById('ventasdiacantidad').getContext('2d');
            const charVentadiaCan = new Chart(ventadiacantidad, {
                type: 'line',
                data: {
                    labels: [<?php foreach ($ventasdia as $reg) {
                        $dia = $reg->dia;
                        echo '"' . $dia . '",';
                    } ?>],
                    datasets: [{
                        label: 'Ventas',
                        data: [<?php foreach ($ventasdia as $reg) {
                            echo '' . $reg->cantidad . ',';
                        } ?>],
                        borderColor: 'rgba(63, 191, 63, 1)',
                        borderWidth: 3
                    }, {
                        label: 'Compras',
                        data: [<?php foreach ($comprasdia as $reg) {
                            echo '' . $reg->cantidad . ',';
                        } ?>],
                        borderColor: 'rgba(60, 10, 63, 1)',
                        borderWidth: 3
                    }, ]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    },
                    elements: {
                        point: {
                            radius: 6,
                            borderwidth: 4,
                            backgroundColor: 'white',
                            hoverRadius: 8,
                            hoverBorderWidth: 4,
                        }
                    }
                }
            });

            const ventadia = document.getElementById('ventasdia').getContext('2d');
            const charVentadia = new Chart(ventadia, {
                type: 'line',
                data: {
                    labels: [<?php foreach ($ventasdia as $reg) {
                        $dia = $reg->dia;
                        echo '"' . $dia . '",';
                    } ?>],
                    datasets: [{
                        label: 'Ventas',
                        data: [<?php foreach ($ventasdia as $reg) {
                            echo '' . $reg->totaldia . ',';
                        } ?>],
                        borderColor: 'rgba(63, 191, 63, 1)',
                        borderWidth: 3
                    }, {
                        label: 'Compras',
                        data: [<?php foreach ($comprasdia as $reg) {
                            echo '' . $reg->totaldia . ',';
                        } ?>],
                        borderColor: 'rgba(60, 10, 63, 1)',
                        borderWidth: 3
                    }, ]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    },
                    elements: {
                        point: {
                            radius: 6,
                            borderwidth: 4,
                            backgroundColor: 'white',
                            hoverRadius: 8,
                            hoverBorderWidth: 4,
                        }
                    }
                }
            });
        </script>
    @endsection

    </div>
</x-layouts.plantilla>
