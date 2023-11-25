@extends('layouts.dashboard')

@section('content')

  <div class="container px-6 mx-auto grid">
    <h2
      class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200"
    >
      {{$heading}}
    </h2>

    @unless(count($categorias) == 0)

      @foreach($categorias as $categoria)
        <x-responsive-card class="mb-4" : titulo="{{$categoria->STR_NOMBRE}} - ${{$categoria->FLT_VALOR}}" and desc="{{$categoria->STR_DESCRIPCION}}" and fecha="{{$categoria->DTE_MOD}}" and route="errors/404" and icon=2/>
      @endforeach
              
      @else
        <p class="font-semibold text-xs text-gray-600 dark:text-gray-400 text-center">Sin categorias para mostrar</p>
      @endunless
    
  </div>

@endsection