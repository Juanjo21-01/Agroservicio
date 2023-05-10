# **Agroservicio**

## ¿Cómo Acceder al Sistema?

### Ejecutar las migraciones

Desde la terminal debe de ejecutar el comando:

    php artisan migrate

### Descargar .sql

Para poder iniciar sesión en el sistema, deberá de ingresar los 3 tipos de usuarios y los triggers con las conversiones.

Lo puede descargar en el siguiente enlace:

[Trigger.sql](https://drive.google.com/file/d/1Hh0nb33qvhZO_otG9MDh34s7Wn_0tPMD/view?usp=share_link)

### Crear la base de datos

El nombre de la base de datos es:
_bd_agroservicio_

Luego debe ejecutar el contenido del archivo **Trigger.sql**

## Correr el Servidor

Desde la terminal debe de ejecutar el comando:

    php artisan serve

Este lo va dirigir a la ruta de inicio de sesión.

## Crear usuario

Pero antes debemos de crear el usuario, entrando a la ruta

    /registrar

![Registrar](public/img/modulos/Registrarse.jpeg)

Luego lo va a redirigir al inicio de sesión y ya puede acceder a la información del sistema

![Login](public/img/modulos/Login.jpeg)

## Módulos Creados:

### Inicio

![Home](public/img/modulos/Home.jpeg)

### Productos

![Productos](public/img/modulos/Productos.jpeg)

### Unidades de Medida

![Unidades-medida](public/img/modulos/Unidad-medidas.jpeg)

### Compras

![Compras](public/img/modulos/Compras.jpeg)

### Ventas

![Ventas](public/img/modulos/Ventas.jpeg)

### Reporte de Ventas

![Reporte-ventas](public/img/modulos/Reporte-ventas.jpeg)

### Proveedores

![Proveedores](public/img/modulos/Proveedores.jpeg)

### Clientes

![Clientes](public/img/modulos/Clientes.jpeg)

### Usuarios

![Usuarios](public/img/modulos/Usuarios.jpeg)
