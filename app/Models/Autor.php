<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Autor extends Model
{
    use HasFactory;

    protected $table = 'autors'; // Nombre de la tabla en la base de datos

    public $timestamps = false;

    protected $fillable = [
        'nombre',
        'apellido', 
        'fecha_nacimiento'
    ];

    // Relación uno a muchos con Libro
    public function libros()
    {
        return $this->hasMany(Libro::class);
    }
}

