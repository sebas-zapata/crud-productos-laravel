<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;

class ProductoController extends Controller
{
    // Mostrar formulario de registro
    public function create()
    {
        return view('productos.crear');
    }

    // Validar datos, registrar producto y devolver mensaje de exito
    public function store(Request $request)
    {

        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string|max:500',
            'precio' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'categoria' => 'nullable|string|max:100',
            'disponible' => 'required|boolean',
            'imagen' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ], [
            'nombre.required' => 'El nombre del producto es obligatorio.',
            'descripcion.required' => 'La descripción del producto es obligatorio.',
            'precio.required' => 'Debes ingresar un precio.',
            'precio.numeric' => 'El precio debe ser un número.',
        ]);

        $datos = $request->all();

        if ($request->hasFile('imagen')) {
            $ruta = $request->file('imagen')->store('productos', 'public');
            $datos['imagen'] = $ruta;
        }

        $producto = Producto::create($datos);

        return redirect()->route('productos.index')
            ->with('alerta', "Producto '{$producto->nombre}' fue guardado con éxito");
    }

    // Mostrar todos los registros de la tabla productos
    public function index()
    {
        $productos = Producto::paginate(5);
        return view('productos.index', compact('productos'));
    }
    // Ver un producto
    public function show($id)
    {
        $producto = Producto::findOrFail($id);
        return view('productos.mostrar', compact('producto'));
    }


    // Eliminar un producto por el id y devolver mensaje de exito
    public function destroy($id)
    {
        $producto = Producto::findOrFail($id);
        $producto->delete();

        return redirect()->route('productos.index')->with('alerta', "Producto '{$producto->nombre}' eliminado correctamente.");
    }

    // Mostrar formulario con la informacion del producto
    public function edit($id)
    {
        $producto = Producto::findOrFail($id);
        return view('productos.editar', compact('producto'));
    }

    // Validar datos, actualizar producto y devolver mensaje de exito
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string|max:500',
            'precio' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'categoria' => 'nullable|string|max:100',
            'disponible' => 'required|boolean',
        ], [
            'nombre.required' => 'El nombre del producto es obligatorio.',
            'descripcion.required' => 'La descripción del producto es obligatorio.',
            'precio.required' => 'Debes ingresar un precio.',
            'precio.numeric' => 'El precio debe ser un número.',
        ]);

        $producto = Producto::findOrFail($id);
        $producto->update($request->all());

        return redirect()->route('productos.index')
            ->with('alerta', "Producto '{$producto->nombre}' actualizado con éxito.");
    }
}
