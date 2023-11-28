@extends('layouts.session')
@section('content')

    <div class="flex items-center min-h-screen p-6 bg-gray-50 dark:bg-gray-900">
      <div
        class="flex-1 h-full max-w-4xl mx-auto overflow-hidden bg-white rounded-lg shadow-xl dark:bg-gray-800"
      >
        <div class="flex flex-col overflow-y-auto md:flex-row">
          <div class="h-32 md:h-auto md:w-1/2">
            <img
              aria-hidden="true"
              class="object-cover w-full h-full dark:hidden"
              src="{{asset('img/create-account-office.jpeg')}}"
              alt="Office"
            />
            <img
              aria-hidden="true"
              class="hidden object-cover w-full h-full dark:block"
              src="{{asset('img/create-account-office-dark.jpeg')}}"
              alt="Office"
            />
          </div>
          <div class="flex items-center justify-center p-6 sm:p-12 md:w-1/2">
            <div class="w-full">
              <h1
                class="mb-4 text-xl font-semibold text-gray-700 dark:text-gray-200"
              >
                Crear cuenta
              </h1>

              <form method="POST" action="{{route('usuarios.store')}}">
                @csrf

                <label class="block text-sm">
                  <span class="text-gray-700 dark:text-gray-400">Nombre de usuario</span>
                  <input
                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                    name="STR_USUARIO"
                    placeholder="JohnCleaver"
                    value="{{old('STR_USUARIO')}}"
                  />
                  
                  @error('STR_USUARIO')
                    <p class="text-red-600 text-xs mt-1">{{$message}}</p>
                  @enderror  

                </label>              

                <label class="block mt-4 text-sm">
                  <span class="text-gray-700 dark:text-gray-400">Correo electrónico</span>
                  <input
                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                    name="STR_CORREO"
                    placeholder="example@example.com"
                    value="{{old('STR_CORREO')}}"
                  />
                  
                  @error('STR_CORREO')
                    <p class="text-red-600 text-xs mt-1">{{$message}}</p>
                  @enderror

                </label>

                <x-password-input : title="Contraseña" and name="password" and val="{{old('password')}}">
                  <span class="text-gray-700 dark:text-gray-400 text-xs">(Debe contener un minimo de 10 caracteres y al menos una Mayuscula, minuscula, Número (1-9) y Caracteres especial (!$#%))</span>        
                </x-password-input> <!-- Cierra campo contraseña -->

                </label>

                <label class="block mt-4 text-sm">
                  <span class="text-gray-700 dark:text-gray-400">
                    Confirmar contraseña
                  </span>
                  <input
                    name="password_confirmation"
                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                    placeholder="***************"
                    type="password"
                  />

                  @error('password_confirmation')
                    <p class="text-red-600 text-xs mt-1">{{$message}}</p>
                  @enderror

                </label>
              
                <div class="flex mt-6 text-sm">
                  <label class="flex items-center dark:text-gray-400">
                    <input
                      name="PRIVACY_POLITICS"
                      type="checkbox"
                      class="text-purple-600 form-checkbox focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                    />
                    <span class="ml-2">
                      Estoy de acuerdo con las 
                      <a href="{{asset('pdf/Terminos y Condiciones.pdf')}}" class="underline">politicas de privacidad</a>
                    </span>

                    @error('PRIVACY_POLITICS')
                      <p class="text-red-600 text-xs mt-1">{{$message}}</p>
                    @enderror

                  </label>
                </div>

                <button
                  type="submit"
                  class="block w-full px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                  
                >
                  Crear cuenta
                </button>

              </form> <!-- Cierra el formulario -->

              <hr class="my-8" />
              <p class="mt-4">
                <a
                  class="text-sm font-medium text-purple-600 dark:text-purple-400 hover:underline"
                  href="{{route('usuarios.login')}}"
                >
                  ¿Ya tienes una cuenta? Iniciar sesión
                </a>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>

@endsection