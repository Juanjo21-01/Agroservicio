<footer class="bg-light py-3 my-4">
    <ul class="nav justify-content-center border-bottom pb-3 mb-3">
        <li><a href="{{ route('home') }}" class="nav-link px-2 text-muted">Inicio</a></li>
        <li><a href="{{ route('prod.index') }}" class="nav-link px-2 text-muted">Productos</a></li>
        <li><a href="{{ route('com.index') }}" class="nav-link px-2 text-muted">Compras</a></li>
        <li><a href="{{ route('ven.index') }}" class="nav-link px-2 text-muted">Ventas</a></li>
        <li><a href="{{ route('prov.index') }}" class="nav-link px-2 text-muted">Proveedores</a></li>
        <li><a href="{{ route('cl.index') }}" class="nav-link px-2 text-muted">Clientes</a></li>
    </ul>
    <p class="text-center text-muted">Agroservicio Don Robin &copy;.
        Todos los derechos reservados <?php echo date('Y'); ?>
    </p>
</footer>
