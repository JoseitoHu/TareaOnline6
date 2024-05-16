@extends('layouts.plantilla')

@section('title', 'Actualizar Entrada')

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
            <img class="inline align-middle" src="{{ asset('images/entradas.png') }}" width="50px" />Actualizar Entradas
        </h2>
        <!-- Fin del Título de la página -->
        <h3>
            <!-- Muestra la imagen de perfil del usuario -->
            <img src="{{ asset('Fotos/' . Auth::user()->imagen_avatar) }}" style="width: 100px;" class="mx-auto">
            <!-- Muestra el nick de usuario y su rol, resaltando el rol con negrita -->
            <span class="block">{{ Auth::user()->nick }} - <strong>{{ Auth::user()->role }}</strong></span>
        </h3>
    </div>

    <form action="{{ route('entradas.update',$entrada->entradas_id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <!-- Campo para el título de la entrada -->
        <div class="mb-3">
            <label for="titulo" class="block">Titulo:</label>
            <input type="text" id="titulo" name="titulo" value="{{ $entrada->titulo }}" class="form-input w-full rounded-md bg-gray-200 border">
        </div>
        <!-- Mostrar imagen actual si existe -->
        <div class="mb-3">
           @if ($entrada->imagen)
                <!-- Mostrar imagen si está disponible -->
                <img src="{{ asset('Fotos/' . $entrada->imagen) }}" width="200px" class="max-w-full h-auto mb-2 mx-auto" alt="Imagen de la entrada">
            @else
                <!-- Mensaje si no hay imagen disponible -->
                <p class="text-center mb-2">No hay imagen disponible</p>
            @endif
            <!-- Campo para seleccionar una nueva imagen -->
            <label for="imagen" class="block">Imagen:</label>
            <input type="file" id="imagen" name="imagen" accept="image/*" value="{{ $entrada->imagen }}" class="form-input w-full rounded-md bg-gray-200 border">
        </div>
        <!-- Campo para la descripción de la entrada -->
        <div class="mb-3">
            <label for="descripcion" class="block">Descripción:</label>
            <textarea id="descripcion" name="descripcion" rows="10" cols="80" class="form-textarea w-full rounded-md bg-gray-200 border">{{ $entrada->descripcion }}</textarea>
        </div>
        <input type="hidden" name="entradas_id" value="{{ $entrada->entradas_id }}">

        <!-- Botón para enviar el formulario y actualizar la entrada -->
        <div class="mb-3">
            <input type="submit" value="Actualizar" name="actualizar" class="btn-success py-2 px-4 rounded-lg">
        </div>
    </form>

</div>
            <!-- Inicializar el editor CKEditor -->
            <script>
                CKEDITOR.replace('descripcion');
            </script>

@endsection