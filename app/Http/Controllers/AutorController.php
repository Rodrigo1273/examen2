<?php

namespace App\Http\Controllers;

use App\Models\Autor;
use Illuminate\Http\Request;

class AutorController extends Controller
{
    // Lista todos los autores
    public function index()
    {
        $autores = Autor::all();
        return view('autores.index', compact('autores'));
    }

    // Muestra el formulario para crear un nuevo autor
    public function create()
    {
        return view('autores.create');
    }

    // Almacena un nuevo autor
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|max:50',
            'apellido' => 'required|max:50',
            'fecha_nacimiento' => 'required|date',
        ]);

        Autor::create($request->all());

        return redirect()->route('autores.index')->with('success', 'Autor creado con éxito');
    }

    // Muestra el formulario para editar un autor existente
    public function edit($id)
    {
        $autor = Autor::find($id);
        return view('autores.edit', compact('autor'));
    }

    // Actualiza la información del autor
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|max:50',
            'apellido' => 'required|max:50',
            'fecha_nacimiento' => 'required|date',
        ]);

        $autor = Autor::find($id);
        $autor->update($request->all());

        return redirect()->route('autores.index')->with('success', 'Autor actualizado con éxito');
    }

    // Elimina un autor
    public function destroy($id)
    {
        Autor::find($id)->delete();
        return redirect()->route('autores.index')->with('success', 'Autor eliminado con éxito');
    }
}

