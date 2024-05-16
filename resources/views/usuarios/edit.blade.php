@extends('layouts.plantilla')

@section('title', 'Actualizar Usuario')

@section('content')

   <div class="container mx-auto">
    <div class="text-center">
        <!-- Botón de volver -->
        <div class="text-right mb-4">
            <!-- Botón para volver al listado de usuarios -->
            <form method="GET" action="{{ route('usuarios.index') }}">
                @csrf
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg">
                    Volver al listado
                </button>
            </form>
        </div>

        <!-- Título de la página -->
        <h2 class="font-bold text-xl">
            <img class="inline align-middle" src="{{ asset('images/user.png') }}" width="50px" />Actualizar Usuario
        </h2>
        <!-- Fin del Título de la página -->
        <h3>
            <!-- Muestra la imagen de perfil del usuario -->
            <img src="{{ asset('Fotos/' . Auth::user()->imagen_avatar) }}" style="width: 100px;" class="mx-auto">
            <!-- Muestra el nick de usuario y su rol, resaltando el rol con negrita -->
            <span class="block">{{ Auth::user()->nick }} - <strong>{{ Auth::user()->role }}</strong></span>
        </h3>
    </div>

    <form action="{{ route('usuarios.update',$user->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <!-- Campo para el Nick del Usuario -->
        <div class="mb-3">
            <label for="nick" class="block">Nick:</label>
            <input type="text" id="nick" name="nick" value="{{ $user->nick }}" class="form-input w-full rounded-md bg-gray-200 border">
        </div>
        <!-- Mostrar imagen actual si existe -->
        <div class="mb-3">
           @if ($user->imagen_avatar)
                <!-- Mostrar imagen si está disponible -->
                <img src="{{ asset('Fotos/' . $user->imagen_avatar) }}" width="200px" class="max-w-full h-auto mb-2 mx-auto" alt="Imagen de la entrada">
            @else
                <!-- Mensaje si no hay imagen disponible -->
                <p class="text-center mb-2">No hay imagen disponible</p>
            @endif
            <!-- Campo para seleccionar una nueva imagen -->
            <label for="imagen" class="block">Imagen:</label>
            <input type="file" id="imagen_avatar" name="imagen_avatar" accept="image/*" value="{{ $user->imagen_avatar }}" class="form-input w-full rounded-md bg-gray-200 border">
        </div>
        <!-- Campo para la Nombre del Usuario -->
        <div class="mb-3">
            <label for="name" class="block">Nombre:</label>
            <input type="text" id="name" name="name" value="{{ $user->name }}" class="form-input w-full rounded-md bg-gray-200 border">
        </div>
        <!-- Campo para la Apellidos del Usuario -->
        <div class="mb-3">
            <label for="apellidos" class="block">Apellidos:</label>
            <input type="text" id="apellidos" name="apellidos" value="{{ $user->apellidos }}" class="form-input w-full rounded-md bg-gray-200 border">
        </div>
        <!-- Campo para el Email del Usuario -->
        <div class="mb-3">
            <label for="email" class="block">Email:</label>
            <input type="email" id="email" name="email" value="{{ $user->email }}" class="form-input w-full rounded-md bg-gray-200 border">
        </div>
        <!-- Campo para el Rol del Usuario -->
        <div class="mb-3">
            <label for="role" class="block">Rol:</label>
            <select id="role" name="role" class="form-select w-full rounded-md bg-gray-200 border">
                <option value="Admin" {{ $user->role == 'Admin' ? 'selected' : '' }}>Administrador</option>
                <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>Usuario</option>
            </select>
        </div>
        <!-- Campo oculto para enviar el ID del usuario -->
        <input type="hidden" name="id" value="{{ $user->id }}">

        <!-- Botón para enviar el formulario y actualizar la entrada -->
        <div class="mb-3">
            <input type="submit" value="Actualizar" name="actualizar" class="btn-success py-2 px-4 rounded-lg">

        </div>
    </form>

</div>

@endsection