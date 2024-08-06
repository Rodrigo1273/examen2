<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    use HasFactory;

    protected $table = 'libros'; // Nombre de la tabla en la base de datos

    public $timestamps = false;

    protected $fillable = [
        'titulo', 
        'fecha_publicacion', 
        'autor_id', 
        'precio'
    ];

    // Relación muchos a uno con Autor
    public function autor()
    {
        return $this->belongsTo(Autor::class);
    }
}
