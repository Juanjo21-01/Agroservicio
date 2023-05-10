<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\TipoProducto;
use Illuminate\Http\Request;
use App\Http\Requests\Producto\StoreRequest;
use App\Http\Requests\Producto\UpdateRequest;
use App\Models\Conversione;
use App\Models\Proveedore;

class ProductoController extends Controller
{
    //TODO: Restringir el acceso a los productos
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $productos = Producto::all();
        $tipoProductos = TipoProducto::withTrashed()->get();
        $conversiones = Conversione::withTrashed()->get();
        return view('producto.index', compact('productos', 'tipoProductos', 'conversiones'));
    }


    public function create()
    {
        $producto = new Producto();
        $proveedores =  Proveedore::pluck('nombre', 'id');
        $conversiones =  Conversione::pluck('nombre', 'id');
        $tipoProducto = TipoProducto::pluck('nombre', 'id');
        return view('producto.create', compact('producto', 'tipoProducto', 'proveedores', 'conversiones'));
    }


    public function store(StoreRequest $request)
    {
        // Guardar la imagen
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $imagen_nombre = date('Y') . '_' . date('m') . '_' . date('d') . '_' .  $file->getClientOriginalName();
            $file->move(public_path("/img/productos"), $imagen_nombre);
        }

        $producto =   Producto::create($request->except(['_token', 'foto']) + [
            'imagen' =>   $imagen_nombre,
        ]);

        // Generar codigo
        $numero = $producto->id;
        $numeroConCeros = str_pad($numero, 8, '0', STR_PAD_LEFT);
        $producto->update(['code' => $numeroConCeros]);

        return redirect()->route('prod.index')
            ->with('success', 'Producto Almacenado con Éxito');
    }


    public function show($id)
    {
        $producto = Producto::find($id);
        $proveedores =  Proveedore::pluck('nombre', 'id');
        $conversiones =  Conversione::pluck('nombre', 'id');
        $tipoProducto = TipoProducto::pluck('nombre', 'id');

        
        return view('producto.show', compact('producto', 'tipoProducto', 'proveedores', 'conversiones'));
    }


    public function edit($id)
    {
        $producto = Producto::find($id);
        $proveedores =  Proveedore::pluck('nombre', 'id');
        $conversiones =  Conversione::pluck('nombre', 'id');
        $tipoProducto = TipoProducto::pluck('nombre', 'id');
        return view('producto.edit', compact('producto', 'tipoProducto', 'proveedores', 'conversiones'));
    }


    public function update(UpdateRequest $request, $id)
    {
        // Guardar la imagen
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $imagen_nombre = date('Y') . '_' . date('m') . '_' . date('d') . '_' .  $file->getClientOriginalName();
            $file->move(public_path("/img/productos"), $imagen_nombre);
        }

        $producto = $request->except(['_token', '_method', 'foto']);

        Producto::where('id', '=', $id)->update($producto + [
            'imagen' =>   $imagen_nombre,
        ]);
        return redirect()->route('prod.index')
            ->with('success', 'Producto Actualizado con Éxito');
    }


    public function archive()
    {
    }


    public function destroy($id)
    {
    }


    public function restore($id)
    {
    }

    public function cambiar_estado($id)
    {
        $producto = Producto::find($id);

        if ($producto->status == 'ACTIVE') {
            $producto->update(['status' => 'DEACTIVATED']);
            return redirect()->back();
        } else {
            $producto->update(['status' => 'ACTIVE']);
            return redirect()->back();
        }
    }
}
