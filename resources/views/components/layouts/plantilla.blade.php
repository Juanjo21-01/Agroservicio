<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="{{ $metaDescription ?? 'Default meta description' }} ">
    <title>Agroservicio - {{ $titulo ?? '' }} </title>
    <!-- CSS Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" rel="stylesheet">
    <!-- CSS DataTables-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/responsive/2.4.0/css/responsive.bootstrap5.min.css" rel="stylesheet">

</head>

<body>
    <div class="bg-secondary bg-opacity-10">
        <!-- Barra de navegacion-->
        <x-layouts.header />
        <!-- FIN barra de navegacion-->

        <!-- Modulo-->
        {{ $slot }}
        <!-- FIN Modulo-->

        <!-- Pie de pagina-->
        <x-layouts.footer />
        <!-- FIN pie de pagina-->
    </div>

    <!-- JS Bootstrap-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
        const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
    </script>
    <!-- JS DataTables-->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.4.0/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.4.0/js/responsive.bootstrap5.min.js"></script>
    <script>
        $('#ordenamiento').DataTable({
            responsive: true,
            autoWidth: false,
            "language": {
                "lengthMenu": "Mostrar " +
                    `<select class="form-select form-select-sm">
                        <option value = "10">10</option>
                        <option value = "25">25</option>
                        <option value = "50">50</option>
                        <option value = "100">100</option>
                        <option value = "-1">Todos</option>
                    </select>` +
                    " Registros por Página",
                "zeroRecords": "-- Ningún Registro Encontrado --",
                "info": "Mostrando la Página _PAGE_ de _PAGES_",
                "infoEmpty": "No hay registros disponibles",
                "infoFiltered": "(Filtrado de _MAX_ Registros Totales)",
                "search": "Buscar:",
                "paginate": {
                    "next": "Siguiente",
                    "previous": "Anterior"
                }
            }

        });
    </script>
    <script>
        let vista_preliminar = (event) => {
            let leer_img = new FileReader();
            let id_img = document.getElementById('imagen-prev');

            leer_img.onload = () => {
                if (leer_img.readyState == 2) {
                    id_img.src = leer_img.result;
                }
            }
            leer_img.readAsDataURL(event.target.files[0]);
        }
    </script>
    @yield('script')
</body>

</html>
