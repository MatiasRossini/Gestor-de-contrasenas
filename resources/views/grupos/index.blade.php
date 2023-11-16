@extends('layouts.dashboard')

@section('content')

  <div class="container px-6 mx-auto grid">
    <h2
      class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200"
    >
      {{$heading}}
    </h2>

    <x-search :placeholder="'Buscar por Grupo o Descripción'" and create="{{route('grupos.create')}}">
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
              <th class="px-4 py-3">Grupo</th> <!-- Nombre -->
              <th class="px-4 py-3">Descripción</th>
            </tr>
          </thead>
          <tbody
            class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800"
          >

        @unless(count($grupos) == 0)

            @foreach($grupos as $grupo)
                      
            <tr class="text-gray-700 dark:text-gray-400">
              <td class="px-4 py-3" hidden>
                <p>{{$grupo->id}}</p>
              </td>
              {{-- Acciones --}}
              <td class="px-3 py-3">
                <div class="flex items-center space-x-4 text-sm">
                  <a href="{{route('grupos.edit', $grupo->id)}}" 
                    class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray" aria-label="Edit">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
                    </svg>               
                  </a> 
                    <form method="POST" action="{{route('grupos.delete', $grupo->id)}}">
                        @csrf
                        @method('DELETE')
                        <button onclick='return confirmacion()'
                        class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray" aria-label="Delete">
                          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                          </svg>                        
                        </button>
                    </form>
                </div> 
              </td> {{-- Edit --}}
              <td class="px-4 py-3">
                <div class="flex items-center text-sm">
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
                    <p class="font-semibold">{{$grupo->STR_NOMBRE}}</p>
                  </div>
                </div>
              </td>
              <td class="px-4 py-3 text-sm">
                {{$grupo->STR_DESCRIPCION}}
              </td>
            </tr>

            @endforeach
            
            @else
            <tr class="text-gray-700 dark:text-gray-400">
              <td class="px-4 py-3">
                <p class="font-semibold text-xs text-gray-600 dark:text-gray-400">Sin grupos en la cuenta</p>
              </td>
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
      {{$grupos->links()}}
    </div>
  </div>
  
@endsection