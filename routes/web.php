<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\ControllerLogin;
use App\Http\Controllers\Auth\ControllerRegistrar;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\CompraController;
use App\Http\Controllers\ConversioneController;
use App\Http\Controllers\ConversionesMenoreController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ProveedoreController;
use App\Http\Controllers\TelefonoController;
use App\Http\Controllers\TipoClienteController;
use App\Http\Controllers\TipoCompraController;
use App\Http\Controllers\TipoProductoController;
use App\Http\Controllers\TipoVentaController;
use App\Http\Controllers\VentaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReporteController;
use App\Http\Controllers\UserController;
use App\Models\Conversione;

//TODO: RUTAS APP

//TODO: Pagina principal
Route::get('/', [HomeController::class, 'index'])->name('home');


//TODO: Inicio Sesion --> Login
Route::resource('login', ControllerLogin::class, [
    'names' => 'login',
    'parameters' => ['login' => 'login']
]);

//Inicio Sesion --> Logout
Route::post('logout', [ControllerLogin::class, 'destroy'])->name('logout');

//Inicio Sesion --> Registrarse
Route::resource("registrar", ControllerRegistrar::class, [
    'names' => 'registrar',
    'parameters' => ['registrar' => 'registrar']
]);

// USUARIOS
Route::get('usuarios/archive', [UserController::class, 'archive'])->name('usuarios.archive');
Route::resource("usuarios", UserController::class, [
    'names' => 'usuarios',
    'parameters' => ['usuarios' => 'usuarios']
]);
Route::delete('usuarios/{usuarios}', [UserController::class, 'destroy'])->withTrashed()->name('usuarios.destroy');
Route::post('usuarios/{usuarios}/restore', [UserController::class, 'restore'])->withTrashed()->name('usuarios.restore');

// Reporte por dia y fecha
Route::get('ventas/reporte_dia', [ReporteController::class, 'reporte_dia'])->name('reporte.dia');
Route::get('ventas/reporte_fecha', [ReporteController::class, 'reporte_fecha'])->name('reporte.fecha');
Route::post('ventas/reporte_resultados', [ReporteController::class, 'reporte_resultados'])->name('reporte.resultados');


//TODO: MODULO Cliente
Route::get('clientes/archive', [ClienteController::class, 'archive'])->name('cl.archive');
Route::resource("clientes", ClienteController::class, [
    'names' => 'cl',
    'parameters' => ['clientes' => 'cl']
]);
Route::delete('clientes/{cl}', [ClienteController::class, 'destroy'])->withTrashed()->name('cl.destroy');
Route::post('clientes/{cl}/restore', [ClienteController::class, 'restore'])->withTrashed()->name('cl.restore');


//TODO: MODULO Compras
Route::resource("compras", CompraController::class, [
    'names' => 'com',
    'parameters' => ['compras' => 'com']
]);
Route::get('compras/pdf/{com}', [CompraController::class, 'pdfDetalle'])->name('com.pdfDetalle');
Route::get('cambiar_estado/compras/{com}', [CompraController::class, 'cambiar_estado'])->name('com.cambiar_estado');


//TODO: MODULO Producto
Route::resource("productos", ProductoController::class, [
    'names' => 'prod',
    'parameters' => ['productos' => 'prod']
]);
Route::get('cambiar_estado/productos/{prod}', [ProductoController::class, 'cambiar_estado'])->name('prod.cambiar_estado');


//TODO: MODULO Proveedor
Route::get('proveedores/archive', [ProveedoreController::class, 'archive'])->name('prov.archive');
Route::resource("proveedores", ProveedoreController::class, [
    'names' => 'prov',
    'parameters' => ['proveedores' => 'prov']
]);
Route::delete('proveedores/{prov}', [ProveedoreController::class, 'destroy'])->withTrashed()->name('prov.destroy');
Route::post('proveedores/{prov}/restore', [ProveedoreController::class, 'restore'])->withTrashed()->name('prov.restore');


//TODO: MODULO Telefono
Route::get('telefonos/archive', [TelefonoController::class, 'archive'])->name('tel.archive');
Route::resource("telefonos", TelefonoController::class, [
    'names' => 'tel',
    'parameters' => ['telefonos' => 'tel']
]);
Route::delete('telefonos/{tel}', [TelefonoController::class, 'destroy'])->withTrashed()->name('tel.destroy');
Route::post('telefonos/{tel}/restore', [TelefonoController::class, 'restore'])->withTrashed()->name('tel.restore');


//TODO: MODULO Tipo Clientes
Route::get('tipoclientes/archive', [TipoClienteController::class, 'archive'])->name('tpcl.archive');
Route::resource("tipoclientes", TipoClienteController::class, [
    'names' => 'tpcl',
    'parameters' => ['tipoclientes' => 'tpcl']
]);
Route::delete('tipoclientes/{tpcl}', [TipoClienteController::class, 'destroy'])->withTrashed()->name('tpcl.destroy');
Route::post('tipoclientes/{tpcl}/restore', [TipoClienteController::class, 'restore'])->withTrashed()->name('tpcl.restore');


//TODO: MODULO Tipo Compras
Route::get('tipocompras/archive', [TipoCompraController::class, 'archive'])->name('tcom.archive');
Route::resource("tipocompras", TipoCompraController::class, [
    'names' => 'tcom',
    'parameters' => ['tipocompras' => 'tcom']
]);
Route::delete('tipocompras/{tcom}', [TipoCompraController::class, 'destroy'])->withTrashed()->name('tcom.destroy');
Route::post('tipocompras/{tcom}/restore', [TipoCompraController::class, 'restore'])->withTrashed()->name('tcom.restore');


//TODO: MODULO Tipo Productos
Route::get('tipoproductos/archive', [TipoProductoController::class, 'archive'])->name('tprod.archive');
Route::resource("tipoproductos", TipoProductoController::class, [
    'names' => 'tprod',
    'parameters' => ['tipoproductos' => 'tprod']
]);
Route::delete('tipoproductos/{tprod}', [TipoProductoController::class, 'destroy'])->withTrashed()->name('tprod.destroy');
Route::post('tipoproductos/{tprod}/restore', [TipoProductoController::class, 'restore'])->withTrashed()->name('tprod.restore');


//TODO: MODULO Tipo Ventas
Route::get('tipoventas/archive', [TipoVentaController::class, 'archive'])->name('tpven.archive');
Route::resource("tipoventas", TipoVentaController::class, [
    'names' => 'tpven',
    'parameters' => ['tipoventas' => 'tpven']
]);
Route::delete('tipoventas/{tpven}', [TipoVentaController::class, 'destroy'])->withTrashed()->name('tpven.destroy');
Route::post('tipoventas/{tpven}/restore', [TipoVentaController::class, 'restore'])->withTrashed()->name('tpven.restore');


//TODO: MODULO Ventas
Route::resource("ventas", VentaController::class, [
    'names' => 'ven',
    'parameters' => ['ventas' => 'ven']
]);
Route::get('ventas/pdf/{ven}', [VentaController::class, 'pdfDetalle'])->name('ven.pdfDetalle');
Route::get('cambiar_estado/ventas/{ven}', [VentaController::class, 'cambiar_estado'])->name('ven.cambiar_estado');


//TODO: MODULO Conversiones
Route::get('conversiones/archive', [ConversioneController::class, 'archive'])->name('con.archive');
Route::resource("conversiones", ConversioneController::class, [
    'names' => 'con',
    'parameters' => ['conversiones' => 'con']
]);
Route::delete('conversiones/{con}', [ConversioneController::class, 'destroy'])->withTrashed()->name('con.destroy');
Route::post('conversiones/{con}/restore', [ConversioneController::class, 'restore'])->withTrashed()->name('con.restore');

//TODO: MODULO Conversiones Menores
Route::resource("conversiones/menores", ConversionesMenoreController::class, [
    'names' => 'conm',
    'parameters' => ['conversiones/menores' => 'conm']
]);
Route::get('cambiar_estado/conversiones/{conm}', [ConversionesMenoreController::class, 'cambiar_estado'])->name('conm.cambiar_estado');
