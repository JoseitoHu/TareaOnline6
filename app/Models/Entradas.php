<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Clase Entradas
class Entradas extends Model
{
    use HasFactory;
    // Nombre de la tabla
    protected $table = 'entradas';
    // Clave primaria
    protected $primaryKey = 'entradas_id';

    // Campos de la tabla
    protected $fillable = [
        'usuario_id',
        'categoria_id',
        'titulo',
        'imagen',
        'descripcion',
        'fecha',
    ];
}
