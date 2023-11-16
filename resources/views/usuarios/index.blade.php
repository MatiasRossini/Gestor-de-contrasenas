@extends('layouts.dashboard')

@section('content')

<div class="container px-6 mx-auto grid">
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
        {{$heading}}
    </h2>
    <h4
      class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300"
    >
      Ultimas carpetas actualizadas (En proceso)
    </h4>

    <div class="grid gap-6 mb-4 md:grid-cols-4 xl:grid-cols-4">
      <!-- Card -->
        <x-responsive-card :titulo="'Aaa'" and valor="100">
        </x-responsive-card>

    </div>

      {{-- Contraseñas generales --}}
    <h4
      class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300"
    >
      Contraseñas
    </h4>

    <x-search :placeholder="'Buscar por Descripción'" and create="{{route('contrasenas.create')}}">
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
                <th class="px-4 py-3">Nombre</th> <!-- Nombre -->
                <th class="px-4 py-3">Contraseña</th>
                <th class="px-4 py-3">Descripción</th>
              </tr>
            </thead>
            <tbody
              class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800"
            >

              @unless(count($contrasenas) == 0)

              @foreach($contrasenas as $contrasena)

              <tr class="text-gray-700 dark:text-gray-400">
                <td class="px-4 py-3" hidden>
                  <p>{{$contrasena->id}}</p>
                </td>
                {{-- Acciones --}}
                <td class="px-3 py-3">
                  <div class="flex items-center space-x-4 text-sm">
                    <a href="{{route('contrasenas.edit', $contrasena->id)}}"
                      class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray" aria-label="Edit">
                      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
                      </svg>                      
                    </a> {{-- Edit --}}

                    <a href="{{route('contrasenas.decrypt', $contrasena->id)}}"
                      class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray" aria-label="Copy">
                      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.666 3.888A2.25 2.25 0 0013.5 2.25h-3c-1.03 0-1.9.693-2.166 1.638m7.332 0c.055.194.084.4.084.612v0a.75.75 0 01-.75.75H9a.75.75 0 01-.75-.75v0c0-.212.03-.418.084-.612m7.332 0c.646.049 1.288.11 1.927.184 1.1.128 1.907 1.077 1.907 2.185V19.5a2.25 2.25 0 01-2.25 2.25H6.75A2.25 2.25 0 014.5 19.5V6.257c0-1.108.806-2.057 1.907-2.185a48.208 48.208 0 011.927-.184" />
                      </svg>
                    </a> {{-- Copy --}}

                    <form method="POST" action="">
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
                </td>
                
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
                      <p class="font-semibold">{{$contrasena->STR_NOMBRE_USUARIO}}</p>
                    </div>
                  </div>
                </td>
                <td class="px-4 py-3 text-sm">
                  <span>********</span>
                </td>
                <td class="px-4 py-3 text-sm">
                  {{$contrasena->STR_DESCRIPCION}}
                </td>
              </tr>

              @endforeach

              @else
              <tr class="text-gray-700 dark:text-gray-400">
                <td class="px-4 py-3">
                  <p class="font-semibold text-xs text-gray-600 dark:text-gray-400">Sin contraseñas cargadas en la cuenta</p>
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
        {{$contrasenas->links()}}
    </div>
</div>

<script>
  function confirmacion() {
    var respuesta = confirm("¿Esta seguro que desea realizar esta accion? Una vez realizada no se podra recuperar")
    if (respuesta == true){
      return true
    }
    else{
      return false
    }
  }
</script>

@endsection