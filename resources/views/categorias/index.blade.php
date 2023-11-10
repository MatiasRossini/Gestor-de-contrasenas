@extends('layouts.dashboard')

@section('content')

  <div class="container px-6 mx-auto grid">
    <h2
      class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200"
    >
      {{$heading}}
    </h2>

    <x-search :placeholder="'Buscar por Categoria, Precio o Descripción'" and create="{{route('categorias.create')}}">
    </x-search>

    <!-- New Table -->
    <div class="w-full overflow-hidden rounded-lg shadow-xs">
      <div class="w-full overflow-x-auto">
        <table class="w-full whitespace-no-wrap">
          <thead>
            <tr
              class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800"
            >
              <th class="px-4 py-3" hidden>#</th> <!-- ID -->
              <th class="px-3 py-3">Acción</th> <!-- ID -->
              <th class="px-4 py-3">Categoria</th> <!-- Nombre -->
              <th class="px-4 py-3">Precio</th>
              <th class="px-4 py-3">Descripción</th>
            </tr>
          </thead>
          <tbody
            class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800"
          >

            @unless(count($categorias) == 0)

            @foreach($categorias as $categoria)
                      
            <tr class="text-gray-700 dark:text-gray-400">
              <td class="px-4 py-3" hidden>
                <p>{{$categoria->id}}</p>
              </td>
              {{-- Acciones --}}
              <td class="px-3 py-3">
                <div class="flex items-center space-x-4 text-sm">
                  <a href="{{ route('categorias.edit', $categoria->id) }}" class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray" aria-label="Edit">
                    <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                      <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                    </svg>
                  </a> {{-- Edit --}}

                  <button class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray" aria-label="Delete">
                    <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                      <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                    </svg>
                  </button> {{-- Delete --}}
                </div>
              </td>
              <td class="px-4 py-3">
                <div class="flex items-center text-sm">
                  <!-- Avatar with inset shadow -->
                  <div
                    class="relative hidden w-8 h-8 mr-3 rounded-full md:block"
                  >
                    <svg 
                    class="object-cover w-full h-full rounded-full"
                    alt=""
                    loading="lazy"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M21 7.5l-2.25-1.313M21 7.5v2.25m0-2.25l-2.25 1.313M3 7.5l2.25-1.313M3 7.5l2.25 1.313M3 7.5v2.25m9 3l2.25-1.313M12 12.75l-2.25-1.313M12 12.75V15m0 6.75l2.25-1.313M12 21.75V19.5m0 2.25l-2.25-1.313m0-16.875L12 2.25l2.25 1.313M21 14.25v2.25l-2.25 1.313m-13.5 0L3 16.5v-2.25" />
                    </svg>
                  
                    <div
                      class="absolute inset-0 rounded-full shadow-inner"
                      aria-hidden="true"
                    ></div>
                  </div>
                  <div>
                    <p class="font-semibold">{{$categoria->STR_NOMBRE}}</p>
                    <p class="text-xs text-gray-600 dark:text-gray-400">
                      10x Developer
                    </p>
                  </div>
                </div>
              </td>
              <td class="px-4 py-3 text-xs">
                <span
                  class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100"
                >
                  @if ($categoria['FLT_VALOR'] != 0)
                    ${{$categoria->FLT_VALOR}}
                  
                  @elseif ($categoria['FLT_VALOR'] == 0)
                    Gratis
                  @endif
                </span>
              </td>
              <td class="px-4 py-3 text-sm">
                {{$categoria->STR_DESCRIPCION}}
              </td>
            </tr>

            @endforeach
            
            @else
            <tr class="text-gray-700 dark:text-gray-400">
              <td class="px-4 py-3">
                <p class="font-semibold text-xs text-gray-600 dark:text-gray-400">Sin categorias de cuentas</p>
              </td>
              <td></td>
              <td></td>
              <td></td>
            </tr>
            @endunless
                  
          </tbody>
        </table>
      </div>
      <div
        class="px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800"
      >

      {{$categorias->links()}}
    </div>
  </div>

@endsection