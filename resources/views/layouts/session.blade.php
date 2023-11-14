<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="es">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>{{$heading}}</title>
        <link
          href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
          rel="stylesheet"
        />
        <link rel="stylesheet" href="{{asset('css/tailwind.output.css')}}" />
        <script
          src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"
          defer
        ></script>
        <script src="{{asset('js/init-alpine.js')}}"></script>
    </head>
    <body>

        <main>
            @yield('content')         
        </main>

    </body>
</html>
  