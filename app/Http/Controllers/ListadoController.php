<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;
use App\Models\Entradas;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\Paginator;



class ListadoController extends Controller
{
    //función que lleva al listado de entradas

    public function index(Request $request)
    {
        $user = Auth::user();
        $entradasQuery = DB::table('entradas')
            ->join('users', 'entradas.usuario_id', '=', 'users.id')
            ->join('categoria', 'entradas.categoria_id', '=', 'categoria.id_categoria')
            ->select('entradas.*', 'users.*', 'categoria.*');


        // Verificar el rol del usuario y filtrar las entradas según el rol
        if ($user->role === 'user') {
            $entradasQuery->where('entradas.usuario_id', $user->id);
        }

        // Buscar entradas por título o por nick del usuario
        if ($request->has('buscar')) {
            $buscarPor = $request->get('buscar');
            $entradasQuery->where(function ($query) use ($buscarPor) {
                $query->where('entradas.titulo', 'like', '%' . $buscarPor . '%')
                    ->orWhere('users.nick', 'like', '%' . $buscarPor . '%');
            });
        }

        // Ordenar las entradas
        $sortField = $request->get('sort', 'fecha');
        $sortOrder = $request->get('order', 'asc');


        if ($sortField !== 'fecha') {
            $sortField = 'titulo';
        }

        // Paginación
        $perPage = $request->get('perPage', 10);
        Paginator::currentPageResolver(function () use ($request) {
            return $request->page ?? 1;
        });

        $entradas = $entradasQuery->orderBy($sortField, $sortOrder)->paginate($perPage);

        return view('entradas.index', compact('entradas'));
    }




    //función que lleva a la creación de entradas
    public function create()
    {
        $entradas = DB::table('entradas')
            ->join('users', 'entradas.usuario_id', '=', 'users.id')
            ->join('categoria', 'entradas.categoria_id', '=', 'categoria.id_categoria')
            ->select('entradas.*', 'users.*', 'categoria.*')
            ->get();
        return view('entradas.create', ['entradas' => $entradas]);
    }

    //función que lleva al detalle de entradas
    public function show($entradas_id)
    {
        $entrada = DB::table('entradas')
            ->join('users', 'entradas.usuario_id', '=', 'users.id')
            ->join('categoria', 'entradas.categoria_id', '=', 'categoria.id_categoria')
            ->select('entradas.*', 'users.*', 'categoria.*')
            ->where(
                'entradas.entradas_id',
                $entradas_id
            )
            ->first(); // Usamos first() para obtener solo una fila en lugar de una colección

        return view('entradas.show', ['entrada' => $entrada]);
    }


    //función que lleva a la edición de entradas
    public function edit($entradas_id)
    {
        $entrada = DB::table('entradas')
            ->join('users', 'entradas.usuario_id', '=', 'users.id')
            ->join('categoria', 'entradas.categoria_id', '=', 'categoria.id_categoria')
            ->select('entradas.*', 'users.*', 'categoria.*')
            ->where(
                'entradas.entradas_id',
                $entradas_id
            )
            ->first(); // Usamos first() para obtener solo una fila en lugar de una colección

        return view('entradas.edit', ['entrada' => $entrada]);
    }

    //función para agregar entradas mediante un formulario
    public function store(Request $request)
    {
        $request->validate([
            'categoria' => 'required',
            'titulo' => 'required',
            'imagen' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'descripcion' => 'required',
        ]);

        // Procesar la imagen
        $imagenNombre = time() . '.' . $request->imagen->extension();
        $request->imagen->move(public_path('fotos'), $imagenNombre);

        // Crear la entrada en la base de datos
        $entrada = new Entradas();
        $entrada->usuario_id = Auth::id();
        $entrada->categoria_id = $request->categoria;
        $entrada->titulo = $request->titulo;
        $entrada->imagen = $imagenNombre;
        $entrada->descripcion = $request->descripcion;
        $entrada->fecha = now();
        $entrada->save();

        return redirect()->route('entradas.index')->with('success', 'Entrada creada exitosamente.');
    }

    //función para actualizar entradas mediante un formulario
    public function update(Request $request, $entradas_id)
    {
        $request->validate([
            'titulo' => 'required',
            'imagen' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'descripcion' => 'required',
        ]);

        // Procesar la imagen
        $imagenNombre = time() . '.' . $request->imagen->extension();
        $request->imagen->move(public_path('fotos'), $imagenNombre);

        // Buscar la entrada en la base de datos
        $entrada = Entradas::where('entradas_id', $entradas_id)->firstOrFail();


        // Actualizar los campos de la entrada
        $entrada->usuario_id = Auth::id();
        $entrada->titulo = $request->titulo;
        $entrada->imagen = $imagenNombre;
        $entrada->descripcion = $request->descripcion;
        $entrada->fecha = now();
        $entrada->save();

        return redirect()->route('entradas.index')->with('success', 'Entrada actualizada exitosamente.');
    }

    //función para eliminar entradas
    public function destroy($entradas_id)
    {
        $entrada = Entradas::where('entradas_id', $entradas_id)->firstOrFail();
        $entrada->delete();

        return redirect()->route('entradas.index')->with('success', 'Entrada eliminada exitosamente.');
    }
}
