<?php

namespace App\Http\Controllers;

use App\Models\Libro;
use App\Models\Autor;
use Illuminate\Http\Request;

class LibroController extends Controller
{
    // Lista todos los libros
    public function index()
    {
        $libros = Libro::with('autor')->get();
        return view('libros.index', compact('libros'));
    }

    // Muestra el formulario para crear un nuevo libro
    public function create()
    {
        $autores = Autor::all();
        return view('libros.create', compact('autores'));
    }

    // Almacena un nuevo libro
    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|max:100',
            'fecha_publicacion' => 'required|date',
            'autor_id' => 'required|exists:autors,id',
            'precio' => 'required|numeric',
        ]);

        Libro::create($request->all());

        return redirect()->route('libros.index')->with('success', 'Libro creado con éxito');
    }

    // Muestra el formulario para editar un libro existente
    public function edit($id)
    {
        $libro = Libro::find($id);
        $autores = Autor::all();
        return view('libros.edit', compact('libro', 'autores'));
    }

    // Actualiza la información del libro
    public function update(Request $request, $id)
    {
        $request->validate([
            'titulo' => 'required|max:100',
            'fecha_publicacion' => 'required|date',
            'autor_id' => 'required|exists:autors,id',
            'precio' => 'required|numeric',
        ]);

        $libro = Libro::find($id);
        $libro->update($request->all());

        return redirect()->route('libros.index')->with('success', 'Libro actualizado con éxito');
    }

    // Elimina un libro
    public function destroy($id)
    {
        Libro::find($id)->delete();
        return redirect()->route('libros.index')->with('success', 'Libro eliminado con éxito');
    }
}
