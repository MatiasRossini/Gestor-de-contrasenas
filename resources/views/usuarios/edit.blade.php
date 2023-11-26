@extends('layouts.dashboard')

@section('content')

<div class="container px-6 mx-auto grid">
    <h2
      class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200"
    >
      {{$heading}}
    </h2>
         
    <form method="POST" action="{{route('usuarios.update', $usuario->id)}}">
        @csrf
        {{-- Metodo propio de Laravel para actualizar datos --}}
        @method('PUT')
        
        <div
            class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800"
        >
            <label class="block text-sm">
            <span class="text-gray-700 dark:text-gray-400">Nombre de usuario</span>
            <input
                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                name="STR_USUARIO"
                placeholder="Nombre de usuario..."
                value="{{$usuario->STR_USUARIO}}"
            />

            @error('STR_USUARIO')
                <p class="text-red-600 text-xs mt-1">{{$message}}</p>
            @enderror

            </label> <!-- Cierra campo Nombre usuario -->

        <div
            class="flex flex-col items-center justify-end mt-2 px-6 py-3 px-3 space-y-4 sm:space-y-0 sm:space-x-6 sm:flex-row"
        >
            <a
            class="w-full px-5 py-3 text-sm font-medium leading-5 text-white text-gray-700 transition-colors duration-150 border border-gray-300 rounded-lg dark:text-gray-400 sm:px-4 sm:py-2 sm:w-auto active:bg-transparent hover:border-gray-500 focus:border-gray-500 active:text-gray-500 focus:outline-none focus:shadow-outline-gray"
            href="{{route('usuarios.perfil')}}"
            >
            Cancelar
            </a>
            <button
                type="submit"
                class="w-full px-5 py-3 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg sm:w-auto sm:px-4 sm:py-2 active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
            >
            Subir
            </button>
            </div>
        </div>
    </form>
    
    <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
        <div class="flex flex-col items-center justify-end space-y-4 sm:space-y-0 sm:space-x-6 sm:flex-row">
            <form method="POST" action="{{route('usuarios.delete', $usuario->id)}}">
                @csrf
                @method('DELETE')
                <button 
                class="w-full px-5 py-3 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-lg sm:w-auto sm:px-4 sm:py-2 focus:outline-none focus:shadow-outline-purple"
                onclick='return confirmacion()'
                >
                    Eliminar
                </button>
            </form>
        </div>
    </div>
</div>

@endsection