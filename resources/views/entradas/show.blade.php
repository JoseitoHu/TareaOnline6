@extends('layouts.plantilla')

@section('title', 'Detalle de Entrada')

@section('content')
<div class="container mx-auto">

    <div class="text-center">
        <!-- Título de la página -->
        <h2 class="font-bold text-xl">
            <img class="inline align-middle" src="{{ asset('images/entradas.png') }}" width="50px" />Detalle Entrada
        </h2>
        <!-- Fin del Título de la página -->
        <h3>
            <!-- Muestra la imagen de perfil del usuario -->
            <img src="{{ asset('Fotos/' . Auth::user()->imagen_avatar) }}" style="width: 100px;" class="mx-auto">
            <!-- Muestra el nick de usuario y su rol, resaltando el rol con negrita -->
            <span class="block">{{ Auth::user()->nick }} - <strong>{{ Auth::user()->role }}</strong></span>
        </h3>
    </div>

    <div class="bg-white shadow-md rounded-md my-4 p-4">
        <div class="bg-gray-200 py-3">
            <h5 class="text-lg font-bold text-center">Detalle de la entrada</h5>
        </div>
        @if ($entrada)
            @if ($entrada->imagen)
                <!-- Mostrar imagen si está disponible -->
                <img src="{{ asset('Fotos/' . $entrada->imagen) }}" class="max-w-full h-auto mb-2 mx-auto" alt="Imagen de la entrada">
            @else
                <!-- Mensaje si no hay imagen disponible -->
                <p class="text-center mb-2">No hay imagen disponible</p>
            @endif
            <!-- Título de la entrada -->
            <h3 class="text-xl font-bold mb-2 text-center">{{ $entrada->titulo }}</h3>
            <!-- Descripción de la entrada -->
            <p class="mb-2 text-center">{{ $entrada->descripcion }}</p>
            <!-- Autor de la entrada -->
            <p class="mb-2 text-center">Autor: {{ $entrada->nick }}</p>
            <!-- Imagen de perfil del autor si está disponible -->
            @if($entrada->imagen_avatar)
                <img src="{{ asset('Fotos/' . $entrada->imagen_avatar) }}" class="max-w-full h-auto mb-2 mx-auto" alt="Imagen de perfil del autor">
            @endif
            <!-- Fecha de creación de la entrada -->
            <p class="mb-2 text-center">Fecha de creación: {{ $entrada->created_at }}</p>
            <!-- Última fecha de actualización de la entrada -->
            <p class="mb-2 text-center">Última actualización: {{ $entrada->updated_at }}</p>
        @else
            <!-- Mensaje si no se encontró ninguna entrada -->
            <p class="mb-2 text-center">No se encontró ninguna entrada.</p>
        @endif
        <div class="bg-gray-200 py-3 text-center">
            <!-- Botón para volver al listado de entradas -->
            <form method="GET" action="{{ route('entradas.index') }}">
                @csrf
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg">Volver al listado</button>
            </form>
        </div>
    </div>

</div>
@endsection




