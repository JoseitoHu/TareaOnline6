@extends('layouts.plantilla')

@section('title', 'Listado de Usuarios')

@section('content')
    <div class="container mx-auto bg-gray-300">
        <!-- Botones de acción -->
        <div class="flex justify-end">
            <div class="text-right mb-4">
            <!-- Botón para volver al listado de entradas -->
            <form method="GET" action="{{ route('entradas.index') }}">
                @csrf
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg">
                    Volver al listado
                </button>
            </form>
        </div>

            <!-- Botón para cerrar sesión -->
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="btn-danger py-2 px-4 rounded-lg" :href="route('logout')"
                        onclick="event.preventDefault(); this.closest('form').submit();">
                    {{ __('Cerrar Sesión') }}
                </button>
            </form>
        </div>

        <div class="text-center">
            <!-- Título de la página -->
            <h2 class="font-bold text-xl">
                <img class="inline align-middle" src="{{ asset('images/user.png') }}" width="50px" />Listado Usuarios
            </h2>
            <!-- Fin del Título de la página -->
            <h3>
                <!-- Muestra la imagen de perfil del usuario -->
                <img src="{{ asset('Fotos/' . Auth::user()->imagen_avatar) }}" style="width: 100px;" class="mx-auto">
                <!-- Muestra el nick de usuario y su rol, resaltando el rol con negrita -->
                <span class="block">{{ Auth::user()->nick }} - <strong>{{ Auth::user()->role }}</strong></span>
            </h3>
        </div>

        <!-- Contenedor para los usuarios en ventanas de 3 en 3 -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
            @foreach ($usuariosQuery as $user)
                <div class="bg-white shadow-md rounded-md my-4">
                    <div class="p-4">
                        <h5 class="font-bold text-lg">Usuario ID: {{ $user->id }}</h5>
                        <h5 class="font-bold text-lg">{{ $user->nick }}</h5>
                        @if ($user->imagen_avatar)
                            <!-- Mostrar imagen_avatar) si está disponible -->
                            <img src="{{ asset('fotos/' . $user->imagen_avatar) }}" style="max-width: 200px;" class="mx-auto my-4" alt="Imagen del user" />
                        @endif
                        <div class="entry-details">
                            <p><strong>Nombre:</strong> {{ $user->name }}</p>
                            <p><strong>Apellidos:</strong> {{ $user->apellidos }}</p>
                            <p><strong>Email:</strong> {{ $user->email }}</p>
                            <p><strong>Rol:</strong> {{ $user->role }}</p>
                        </div>
                    </div>
                    <div class="flex justify-end p-4">
                        <!-- Añade botones de operación para cada user -->
                        <button type="button" class="btn-primary py-2 px-4 rounded-lg mr-2" data-toggle="modal" data-target="#modificar{{ $user->id }}">Modificar</button>
                        <button type="button" class="btn-danger py-2 px-4 rounded-lg" data-toggle="modal" data-target="#eliminar{{ $user->id }}">Eliminar</button>
                    </div>
                </div>
                <!-- Creamos un modal para cada operación que podremos realizar con cada registro -->
                @include('partials.modalesUsers')
            @endforeach
        </div>
        <div class="text-right mb-4">
            <!-- Botón para importar usuarios -->
            <div class="mb-2">
                <form method="POST" action="{{ route('usuarios.import') }}" enctype="multipart/form-data">
                    @csrf
                    <input type="file" name="file" class="form-input">
                    <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-lg w-full flex items-center justify-center">
                        Importar Usuarios
                    </button>
                </form>
            </div>
            
            <!-- Botón para exportar usuarios -->
            <div>
                <a href="{{ route('usuarios.export') }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded-lg w-full inline-block flex items-center justify-center">
                    Exportar Usuarios
                </a>
            </div>
        </div>
        <!-- Agrega un botón que, al hacer clic, iniciará la impresión del contenido -->
        <button onclick="imprimirPDF()" class="btn-primary py-2 px-4 rounded-lg">Imprimir PDF</button>
    </div>
    <script src="js/app.js"></script>
@endsection