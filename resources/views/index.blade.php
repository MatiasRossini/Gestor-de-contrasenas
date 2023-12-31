@extends('layouts.dashboard')

@section('content')

    <div class="container px-6 mx-auto grid">
      <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
        @auth
          Bienvenido de nuevo,
          {{auth()->user()->STR_USUARIO}}!
      </h2>

        @else
          Bienvenido!
          @endauth
      </h2>

      <p class="mb-2 text-gray-600 dark:text-gray-400">
        KeyLock es un gestor de contraseñas web con funcionamiento tanto para PC como para Teléfono movil, este se encarga de almacenar y devolver
        cada una de las contraseñas almacenadas.
      </p>
      <p class="mb-2 text-gray-600 dark:text-gray-400">
        El proyecto tiene caracter de personal y final para la tecnicatura "Informatica personal y profesional", en el año 2023. 
        El mismo tomo un total de 3 meses para realizar, el mismo funciona con la plantilla
        <a
          class="text-purple-600 dark:text-purple-400 hover:underline"
          href="https://github.com/estevanmaito/windmill-dashboard"
        >
          Windmill-Dashboard</a>,
        los Frameworks 
        <a class="text-red-600 dark:text-red-700 hover:underline"
          href="https://laravel.com/">
          Laravel</a>,
          <a class="text-blue-500 dark:text-blue-700 hover:underline"
          href="https://tailwindcss.com/">
          Tailwind</a>, 
          <a class="text-gray-500 dark:text-gray-700 hover:underline"
          href="https://alpinejs.dev/">
          Alpine.js</a> 
          y las librerias 
          <a
          class="text-purple-600 dark:text-purple-400 hover:underline"
          href="https://clipboardjs.com/"
          >
          clipboard.js</a>.
      </p>

      <p class="mb-4 text-gray-600 dark:text-gray-400">
        Puedes cambiar de tema a "oscuro" o "claro" tocando el icono en la parte derecha superior!
      </p>

      <!-- Guia - Iconos -->
      <section>
            @auth
        <!-- P - Perfil -->
        <p class="mb-2 text-gray-600 dark:text-gray-400 inline-flex items-center w-full">
          <svg 
          xmlns="http://www.w3.org/2000/svg" 
          fill="none" 
          viewBox="0 0 24 24" 
          stroke-width="1.5" 
          stroke="currentColor" 
          class="w-5 h-5"
        >
          <path
            stroke-linecap="round" 
            stroke-linejoin="round" 
            d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" 
          />
        </svg>
        <span class="ml-2"><- Perfil - Revisa aqui todas tus contraseñas y ultimos tres grupos con más contraseñas!</span>
        </p>

        <!-- P Inicio -->
        <p class="mb-2 text-gray-600 dark:text-gray-400 inline-flex items-center w-full">
          <svg
          class="w-5 h-5"
          aria-hidden="true"
          fill="none"
          stroke-linecap="round"
          stroke-linejoin="round"
          stroke-width="2"
          viewBox="0 0 24 24"
          stroke="currentColor"
        >
          <path
            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"
          ></path>
        </svg>
        <span class="ml-2"><- Inicio - Estas aqui!</span>
        </p>

        <!-- P Nueva contraseña -->
        <p class="mb-2 text-gray-600 dark:text-gray-400 inline-flex items-center w-full">
          <svg 
          xmlns="http://www.w3.org/2000/svg" 
          fill="none" 
          viewBox="0 0 24 24" 
          stroke-width="1.5" 
          stroke="currentColor" 
          class="w-5 h-5"
        >
          <path 
            stroke-linecap="round" 
            stroke-linejoin="round" 
            d="M13.5 16.875h3.375m0 0h3.375m-3.375 0V13.5m0 3.375v3.375M6 10.5h2.25a2.25 2.25 0 002.25-2.25V6a2.25 2.25 0 00-2.25-2.25H6A2.25 2.25 0 003.75 6v2.25A2.25 2.25 0 006 10.5zm0 9.75h2.25A2.25 2.25 0 0010.5 18v-2.25a2.25 2.25 0 00-2.25-2.25H6a2.25 2.25 0 00-2.25 2.25V18A2.25 2.25 0 006 20.25zm9.75-9.75H18a2.25 2.25 0 002.25-2.25V6A2.25 2.25 0 0018 3.75h-2.25A2.25 2.25 0 0013.5 6v2.25a2.25 2.25 0 002.25 2.25z" 
          />
        </svg>
        <span class="ml-2"><- Nueva contraseña - Ingresa aqui para registrar una nueva contraseña en tu cuenta!</span>
        </p>

        <!-- P Grupos -->
        <p class="mb-2 text-gray-600 dark:text-gray-400 inline-flex items-center w-full">
          <svg 
          xmlns="http://www.w3.org/2000/svg" 
          fill="none" 
          viewBox="0 0 24 24" 
          stroke-width="1.5" 
          stroke="currentColor" 
          class="w-5 h-5"
        >
          <path 
            stroke-linecap="round" 
            stroke-linejoin="round" 
            d="M12 10.5v6m3-3H9m4.06-7.19l-2.12-2.12a1.5 1.5 0 00-1.061-.44H4.5A2.25 2.25 0 002.25 6v12a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9a2.25 2.25 0 00-2.25-2.25h-5.379a1.5 1.5 0 01-1.06-.44z" 
          />
        </svg>
        <span class="ml-2"><- Grupos - Revisa todos tus grupos!</span>
        </p>

      @endauth

        <!-- P Categorias -->
        <p class="mb-2 text-gray-600 dark:text-gray-400 inline-flex items-center w-full">
          <svg 
          xmlns="http://www.w3.org/2000/svg" 
          fill="none" 
          viewBox="0 0 24 24" 
          stroke-width="1.5" 
          stroke="currentColor" 
          class="w-5 h-5"
        >
          <path 
            stroke-linecap="round" 
            stroke-linejoin="round" 
            d="M4.5 12.75l7.5-7.5 7.5 7.5m-15 6l7.5-7.5 7.5 7.5" 
          />
        </svg>
        <span class="ml-2"><- Premium - Aqui podras ver los estados de usuario disponibles</span>
        </p>

        <!-- P Actualizaciones -->
        {{-- <p class="mb-2 text-gray-600 dark:text-gray-400 inline-flex items-center w-full">
          <svg 
          xmlns="http://www.w3.org/2000/svg" 
          fill="none" 
          viewBox="0 0 24 24" 
          stroke-width="1.5" 
          stroke="currentColor" 
          class="w-5 h-5"
        >
          <path 
            stroke-linecap="round" 
            stroke-linejoin="round" 
            d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 01-2.25 2.25M16.5 7.5V18a2.25 2.25 0 002.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 002.25 2.25h13.5M6 7.5h3v3H6v-3z" 
          />
        </svg>    
        <span class="ml-2"><- Actualizaciones - (En proceso) Aqui se mostraran todas las actualizaciones realizadas al sistema!</span>
        </p> --}}

        <!-- P Ajustes -->
        <p class="mb-2 text-gray-600 dark:text-gray-400 inline-flex items-center w-full">
          <svg 
          xmlns="http://www.w3.org/2000/svg" 
          fill="none" 
          viewBox="0 0 24 24" 
          stroke-width="1.5" 
          stroke="currentColor" 
          class="w-5 h-5"
        >
          <path 
            stroke-linecap="round" 
            stroke-linejoin="round" 
            d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.324.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 011.37.49l1.296 2.247a1.125 1.125 0 01-.26 1.431l-1.003.827c-.293.24-.438.613-.431.992a6.759 6.759 0 010 .255c-.007.378.138.75.43.99l1.005.828c.424.35.534.954.26 1.43l-1.298 2.247a1.125 1.125 0 01-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.57 6.57 0 01-.22.128c-.331.183-.581.495-.644.869l-.213 1.28c-.09.543-.56.941-1.11.941h-2.594c-.55 0-1.02-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 01-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 01-1.369-.49l-1.297-2.247a1.125 1.125 0 01.26-1.431l1.004-.827c.292-.24.437-.613.43-.992a6.932 6.932 0 010-.255c.007-.378-.138-.75-.43-.99l-1.004-.828a1.125 1.125 0 01-.26-1.43l1.297-2.247a1.125 1.125 0 011.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.087.22-.128.332-.183.582-.495.644-.869l.214-1.281z" 
          />
          <path 
            stroke-linecap="round" 
            stroke-linejoin="round" 
            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" 
          />
        </svg> 
        <span class="ml-2"><- Ajustes - Aqui se le permitira al usuario modificar o eliminar su cuenta</span>
        </p>

        <!-- P Soporte -->
        {{-- <p class="mb-2 text-gray-600 dark:text-gray-400 inline-flex items-center w-full">
          <svg 
          xmlns="http://www.w3.org/2000/svg" 
          fill="none" 
          viewBox="0 0 24 24" 
          stroke-width="1.5" 
          stroke="currentColor" 
          class="w-5 h-5"
        >
          <path 
            stroke-linecap="round" 
            stroke-linejoin="round" 
            d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" 
          />
        </svg>
        <span class="ml-2"><- Soporte - (En proceso) Aqui se mostrara un formulario para contactar con soporte.</span>
        </p>
      </section> --}}

      <!-- Guia - sesión -->
      <section class="mt-2 ">
        @auth
        <!-- P Cerrar sesión -->
        <p class="mb-2 text-gray-600 dark:text-gray-400 inline-flex items-center w-full text-purple-600 dark:text-purple-400">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3 0l3-3m0 0l-3-3m3 3H9" />
          </svg> 
        <span class="ml-2"><- Cerrar sesión - Toca aquí para finalizar la sesión actual</span>
        </p>

        @else

        <!-- P Crear cuenta -->
        <p class="mb-2 text-gray-600 dark:text-gray-400 inline-flex items-center w-full text-purple-600 dark:text-purple-400">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
            <path stroke-linecap="round" stroke-linejoin="round" d="M19 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zM4 19.235v-.11a6.375 6.375 0 0112.75 0v.109A12.318 12.318 0 0110.374 21c-2.331 0-4.512-.645-6.374-1.766z" />
          </svg> 
        <span class="ml-2"><- Crear cuenta - Toca aquí para registrar un nuevo usuario</span>
        </p>

        <!-- P Iniciar sesión -->
        <p class="mb-2 text-gray-600 dark:text-gray-400 inline-flex items-center w-full text-purple-600 dark:text-purple-400">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" />
          </svg>
        <span class="ml-2"><- Iniciar sesión - Toca aquí para iniciar sesión con un usuario ya existente</span>
        </p>

        @endauth
      </section>
    </div>
@endsection
