<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Maatwebsite\Excel\Facades\Excel;
use App\excel\UsuariosExport;
use App\excel\UsuariosImport;

class UsuariosController extends Controller
{
    //función que lleva al listado de usuarios
    public function index()
    {
        $user = Auth::user();
        if ($user->role === 'Admin') {
            $usuariosQuery = DB::table('users')
                ->select('users.*')
                ->get();

            return view('usuarios.index', compact('usuariosQuery'));
        } else {
            return redirect()->route('entradas.index');
        }
    }

    //Función para que lleva a actualizar un usuario
    public function edit($id)
    {
        $user = DB::table('users')->where('id', $id)->first();

        return view('usuarios.edit', compact('user'));
    }


    //funcion para eliminar un usuario
    public function destroy($id)
    {
        $user = User::where('id', $id)->firstOrFail();
        $user->delete();

        return redirect()->route('usuarios.index');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'apellidos' => 'required',
            'nick' => 'required',
            'imagen_avatar' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'email' => 'required',
        ]);

        // Procesar la imagen si se envió una
        if ($request->hasFile('imagen_avatar')) {
            $imagenNombre = time() . '.' . $request->imagen_avatar->extension();
            $request->imagen_avatar->move(public_path('fotos'), $imagenNombre);
        } else {
            // Conservar la imagen existente del usuario si no se envió una nueva
            $user = User::findOrFail($id);
            $imagenNombre = $user->imagen_avatar;
        }

        // Actualizar los datos del usuario
        User::where('id', $id)->update([
            'name' => $request->name,
            'apellidos' => $request->apellidos,
            'nick' => $request->nick,
            'email' => $request->email,
            'imagen_avatar' => $imagenNombre,
        ]);

        return redirect()->route('usuarios.index')->with('success', 'Usuario actualizado exitosamente.');
    }

    // Método para exportar usuarios
    public function export()
    {
        return Excel::download(new UsuariosExport, 'usuarios.xlsx');
    }

    // Método para importar usuarios
    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx',
        ]);

        Excel::import(new UsuariosImport, $request->file('file'));

        return redirect()->route('usuarios.index')->with('success', 'Usuarios importados correctamente.');
    }
}
