<?php

namespace App\Excel;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;

class UsuariosImport implements ToModel
{
    // Función que devuelve un modelo de usuario a partir de una fila de la hoja de cálculo
    public function model(array $row)
    {
        return new User([
            'name' => $row[0],
            'apellidos' => $row[1],
            'nick' => $row[2],
            'email' => $row[3],
            'role' => $row[5] ?? 'user',
            'password' => Hash::make($row[8]),

            'imagen_avatar' => $row[6] ?? null,
            'email_verified_at' => $row[7] ?? null,
            'remember_token' => $row[9] ?? null,
        ]);
    }
}
