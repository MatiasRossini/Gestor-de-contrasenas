@extends('layouts.dashboard')

@section('content')

  <div class="container px-6 mx-auto grid">
    <h2
      class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200"
    >
      {{$heading}}
    </h2>

    <x-responsive-card : titulo="Editar cuenta" and desc="Actualizar/Dar de baja la cuenta" and fecha="{{$user->DTE_MOD}}" and route="{{route('usuarios.edit', $user->id)}}" and icon=3/>

  </div>

@endsection