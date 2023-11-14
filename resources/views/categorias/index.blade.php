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
                      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
                      </svg>               
                  </a> {{-- Edit --}}
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