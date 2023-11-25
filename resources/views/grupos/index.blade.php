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

    @unless(count($grupos) == 0)

      @foreach($grupos as $grupo)

        <x-responsive-card class="mb-4" : titulo="{{$grupo->STR_NOMBRE}}" and desc="{{$grupo->STR_DESCRIPCION}}" and fecha="{{$grupo->DTE_MOD}}" and route="{{route('grupos.show', $grupo->id)}}" and icon=1/>
      @endforeach

      @else
        <p class="font-semibold text-xs text-gray-600 dark:text-gray-400 text-center">Sin grupos en la cuenta</p>

    @endunless
                  
    <div
      class="px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase sm:grid-cols-9 dark:text-gray-400 text-center"
    >
      {{$grupos->links()}}
    </div>

  </div>

@endsection