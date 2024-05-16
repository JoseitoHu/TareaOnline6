<?php

namespace App\excel;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;

class UsuariosExport implements FromCollection
{
    // Función que devuelve una colección de usuarios desde la base de datos
    public function collection()
    {
        return User::all();
    }
}
