@extends('layouts.plantilla')

@section('title', 'Listado de Entradas')

@section('content')
    <div class="container mx-auto bg-gray-300">
        <!-- Botones de acción -->
        <div class="flex justify-end">
            <!-- Botón para agregar una nueva entrada -->
            <form method="GET" action="{{ route('entradas.create') }}">
                @csrf
                <button type="submit" class="btn-primary py-2 px-4 rounded-lg mr-2">Agregar Entrada</button>
            </form>
            <!-- Botón para actualizar al usuario conectado -->
            <form method="GET" action="{{ route('usuarios.edit', ['id' => auth()->user()->id]) }}">
                @csrf
                <button type="submit" class="btn-primary py-2 px-4 rounded-lg mr-2">Actualizar Perfil</button>
            </form>

            <!-- Botón para cerrar sesión -->
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="btn-danger py-2 px-4 rounded-lg" :href="route('logout')"
                        onclick="event.preventDefault(); this.closest('form').submit();">
                    {{ __('Cerrar Sesión') }}
                </button>
            </form>
        </div>
        <div class="my-4">
            <form action="{{ route('entradas.index') }}" method="GET" class="my-4">
                <div class="flex items-center">
                    <input type="text" name="buscar" placeholder="Buscar..." class="form-input rounded-l-lg">
                    <button type="submit" class="btn-primary rounded-r-lg">Buscar</button>
                </div>
            </form>
        </div>

        <div class="text-center">
            <!-- Título de la página -->
            <h2 class="font-bold text-xl">
                <img class="inline align-middle" src="{{ asset('images/entradas.png') }}" width="50px" />Listado Entradas
            </h2>
            <!-- Fin del Título de la página -->
            <h3>
                <!-- Muestra la imagen de perfil del usuario -->
                <img src="{{ asset('Fotos/' . Auth::user()->imagen_avatar) }}" style="width: 100px;" class="mx-auto">
                <!-- Muestra el nick de usuario y su rol, resaltando el rol con negrita -->
                <span class="block">{{ Auth::user()->nick }} - <strong>{{ Auth::user()->role }}</strong></span>
            </h3>
        </div>
        <!-- Encabezado de la tabla con enlaces de ordenamiento -->
        <div>
            <h5 class="font-bold text-lg">Ordenar por:</h5>
            <ul class="flex">
                <li class="mr-4">
                    <a href="{{ route('entradas.index', ['sort' => 'titulo', 'order' => 'asc']) }}">Título ASC</a>
                </li>
                <li class="mr-4">
                    <a href="{{ route('entradas.index', ['sort' => 'titulo', 'order' => 'desc']) }}">Título DESC</a>
                </li>
                <li class="mr-4">
                    <a href="{{ route('entradas.index', ['sort' => 'fecha', 'order' => 'asc']) }}">Fecha ASC</a>
                </li>
                <li>
                    <a href="{{ route('entradas.index', ['sort' => 'fecha', 'order' => 'desc']) }}">Fecha DESC</a>
                </li>
            </ul>
        </div>

        <!-- Contenedor para las entradas en ventanas de 3 en 3 -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
            @foreach ($entradas as $entrada)
                <div class="bg-white shadow-md rounded-md my-4">
                    <div class="p-4">
                        <h5 class="font-bold text-lg">Entrada ID: {{ $entrada->entradas_id }}</h5>
                        <h5 class="font-bold text-lg">{{ $entrada->titulo }}</h5>
                        @if ($entrada->imagen)
                            <!-- Mostrar imagen si está disponible -->
                            <img src="{{ asset('fotos/' . $entrada->imagen) }}" style="max-width: 200px;" class="mx-auto my-4" alt="Imagen de la tarea" />
                        @endif
                        <div class="entry-details">
                            <p><strong>Autor:</strong> {{ $entrada->nick }}</p>
                            <p><strong>Categoría:</strong> {{ $entrada->nombre_categoria }}</p>
                            <p><strong>Descripción:</strong> {{ $entrada->descripcion }}</p>
                            <p><strong>Fecha:</strong> {{ $entrada->fecha }}</p>
                        </div>
                    </div>
                    <div class="flex justify-end p-4">
                        <!-- Añade botones de operación para cada entrada -->
                        <button type="button" class="btn-primary py-2 px-4 rounded-lg mr-2" data-toggle="modal" data-target="#modificar{{ $entrada->entradas_id }}">Modificar</button>
                        <button type="button" class="btn-info py-2 px-4 rounded-lg mr-2" data-toggle="modal" data-target="#detalle{{ $entrada->entradas_id }}">Detalle</button>
                        <button type="button" class="btn-danger py-2 px-4 rounded-lg" data-toggle="modal" data-target="#eliminar{{ $entrada->entradas_id }}">Eliminar</button>
                    </div>
                </div>
                <!-- Creamos un modal para cada operación que podremos realizar con cada registro -->
                @include('partials.modales')
            @endforeach
        </div>
        <!-- Agrega un botón que, al hacer clic, iniciará la impresión del contenido -->
        <button onclick="imprimirPDF()" class="btn-primary py-2 px-4 rounded-lg">Imprimir PDF</button>
        <!-- Enlaces de paginación -->
        <div class="pagination flex justify-center">
            {{ $entradas->withQueryString()->links() }}
        </div>
        <!-- Información sobre el número de páginas y registros por página -->
        <div class="pagination-info text-center">
            Página {{ $entradas->currentPage() }} de {{ $entradas->lastPage() }}, mostrando {{ $entradas->firstItem() }} - {{ $entradas->lastItem() }} de {{ $entradas->total() }} registros
        </div>
    </div>
    <script src="js/app.js"></script>
@endsection