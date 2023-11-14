@extends('layouts.dashboard')

@section('content')

<div class="container px-6 mx-auto grid">
    <h2
      class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200"
    >
      {{$heading}}
    </h2>
         
    <form method="POST" action="{{route('categorias.store')}}">
        @csrf
        <div
            class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800"
        >
            <label class="block text-sm">
            <span class="text-gray-700 dark:text-gray-400">Nombre</span>
            <input
                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                name="STR_NOMBRE"
                placeholder="Nombre de la categoría..."
                value="{{old('STR_NOMBRE')}}"
            />

            @error('STR_NOMBRE')
                <p class="text-red-600 text-xs mt-1">{{$message}}</p>
            @enderror

            </label>
    
            <label class="block mt-4 text-sm">
            <span class="text-gray-700 dark:text-gray-400">Descripción</span>
            <textarea
                class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                rows="3"
                name="STR_DESCRIPCION"
                placeholder="Descripción de la categoría..."
            >{{old('STR_DESCRIPCION')}}</textarea>
            
            @error('STR_DESCRIPCION')
                <p class="text-red-600 text-xs mt-1">{{$message}}</p>
            @enderror

            </label>

            <div class="container">
                <label class="inline-block mt-4 text-sm me-4">
                    <span class="text-gray-700 dark:text-gray-400">Nivel de cuenta</span>
                    <input
                    type="number"
                    class=" w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                    name="INT_NIVEL"
                    placeholder="0-99"
                    min="0" max="99"
                    value="{{old('INT_NIVEL')}}"
                    >
                    
                    @error('INT_NIVEL')
                        <p class="text-red-600 text-xs mt-1">{{$message}}</p>
                    @enderror

                </label>

                <label class="inline-block mt-4 text-sm me-4">
                    <span class="text-gray-700 dark:text-gray-400">Valor</span>
                    <input
                    type="number"
                    class=" w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                    name="FLT_VALOR"
                    placeholder="$"
                    min="0" step="0.50"
                    value="{{old('FLT_VALOR')}}"
                    >

                    @error('FLT_VALOR')
                        <p class="text-red-600 text-xs mt-1">{{$message}}</p>
                    @enderror
                </label>
            </div>
            <div
            class="flex flex-col items-center justify-end mt-2 px-6 py-3 px-3 space-y-4 sm:space-y-0 sm:space-x-6 sm:flex-row"
        >
            <a
            class="w-full px-5 py-3 text-sm font-medium leading-5 text-white text-gray-700 transition-colors duration-150 border border-gray-300 rounded-lg dark:text-gray-400 sm:px-4 sm:py-2 sm:w-auto active:bg-transparent hover:border-gray-500 focus:border-gray-500 active:text-gray-500 focus:outline-none focus:shadow-outline-gray"
            href="{{route('categorias.index')}}"
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


@endsection