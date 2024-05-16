@extends('layouts.plantilla')

@section('title', 'Agregar Entradas')

@section('content')
<div class="container mx-auto">
    <div class="text-center">
        <!-- Botón de volver -->
        <div class="text-right mb-4">
            <!-- Botón para volver al listado de entradas -->
            <form method="GET" action="{{ route('entradas.index') }}">
                @csrf
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg">
                    Volver al listado
                </button>
            </form>
        </div>

        <!-- Título de la página -->
        <h2 class="font-bold text-xl">
            <img class="inline align-middle" src="{{ asset('images/entradas.png') }}" width="50px" />Agregar Entradas
        </h2>
        <!-- Fin del Título de la página -->
        <h3>
            <!-- Muestra la imagen de perfil del usuario -->
            <img src="{{ asset('Fotos/' . Auth::user()->imagen_avatar) }}" style="width: 100px;" class="mx-auto">
            <!-- Muestra el nick de usuario y su rol, resaltando el rol con negrita -->
            <span class="block">{{ Auth::user()->nick }} - <strong>{{ Auth::user()->role }}</strong></span>
        </h3>
    </div>

    <form action="{{ route('entradas.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <!-- Campo para seleccionar la categoría -->
        <div class="mb-4">
            <label for="categoria" class="block text-gray-700">Categoría:</label>
            <select id="categoria" name="categoria" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-2 px-4 rounded-lg leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                @foreach ($entradas->unique('id_categoria') as $entrada)
                    <option value="{{ $entrada->id_categoria }}">{{ $entrada->nombre_categoria }}</option>
                @endforeach
            </select>
        </div>
        <!-- Campo para ingresar el título de la entrada -->
        <div class="mb-4">
            <label for="titulo" class="block text-gray-700">Título:</label>
            <input type="text" id="titulo" name="titulo" class="form-input mt-1 block w-full rounded-lg bg-gray-200 border">
        </div>
        <!-- Campo para seleccionar una imagen -->
        <div class="mb-4">
            <label for="imagen" class="block text-gray-700">Imagen:</label>
            <input type="file" id="imagen" name="imagen" accept="image/*" class="form-input mt-1 block w-full rounded-lg ">
        </div>
        <!-- Campo para ingresar la descripción de la entrada -->
        <div class="mb-4">
            <label for="descripcion" class="block text-gray-700">Descripción:</label>
            <textarea id="descripcion" name="descripcion" rows="4" class="form-textarea mt-1 block w-full rounded-lg bg-gray-200 border"></textarea>
        </div>
        <!-- Botón para guardar la entrada -->
        <div class="mb-4">
            <input type="submit" value="Guardar" name="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-lg cursor-pointer">
        </div>
    </form>
</div>
@endsection


