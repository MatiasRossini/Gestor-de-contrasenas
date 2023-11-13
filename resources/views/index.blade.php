@extends('layouts.dashboard')

@section('content')

    <div class="container px-6 mx-auto grid">
      <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
        @auth
          Bienvenido de nuevo, ! 
        @else
          Bienvenido!
        @endauth
      </h2>

      {{--Cartas--}}
      <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
        Enterate de las ultimas actualizaciones
      </h4>
      <div class="grid gap-6 mb-8 md:grid-cols-2">
        <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
          <h4 class="mb-4 font-semibold text-gray-600 dark:text-gray-300">
            Revenue
          </h4>
          <p class="text-gray-600 dark:text-gray-400">
            Lorem ipsum dolor sit, amet consectetur adipisicing elit.
            Fuga, cum commodi a omnis numquam quod? Totam exercitationem
            quos hic ipsam at qui cum numquam, sed amet ratione! Ratione,
            nihil dolorum.
          </p>
        </div>
        <div class="min-w-0 p-4 text-white bg-purple-600 rounded-lg shadow-xs">
          <h4 class="mb-4 font-semibold">
            Colored card
          </h4>
          <p>
            Lorem ipsum dolor sit, amet consectetur adipisicing elit.
            Fuga, cum commodi a omnis numquam quod? Totam exercitationem
            quos hic ipsam at qui cum numquam, sed amet ratione! Ratione,
            nihil dolorum.
          </p>
        </div>
      </div>
    </div>

@endsection
        