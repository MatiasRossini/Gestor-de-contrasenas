@props(['titulo', 'desc', 'fecha', 'route', 'icon'])
@php
    $caracteres = 50;
@endphp
<a
    href="{{$route}}"
    {{$attributes->merge(['class'=>'group flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800'])}}
>
    <div
        class="p-3 mr-4 text-orange-500 bg-orange-100 rounded-full dark:text-orange-100 dark:bg-orange-500"
    >
    @php
        switch ($icon)
        {
            case 1:
                echo('
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12.75V12A2.25 2.25 0 014.5 9.75h15A2.25 2.25 0 0121.75 12v.75m-8.69-6.44l-2.12-2.12a1.5 1.5 0 00-1.061-.44H4.5A2.25 2.25 0 002.25 6v12a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9a2.25 2.25 0 00-2.25-2.25h-5.379a1.5 1.5 0 01-1.06-.44z" />
                    </svg>
                ');
                break;
                
            case 2:
                echo('
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9.568 3H5.25A2.25 2.25 0 003 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 005.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 009.568 3z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 6h.008v.008H6V6z" />
                    </svg>
                ');
                break;
                
            default:
                break;
        }
    @endphp

      
    </div>
    <div>
        <p
        class="text-lg font-semibold text-gray-700 dark:text-gray-200"
        >
            {{$titulo}} 
        </p>
        <p
        class="mb-1 text-xs text-gray-600 dark:text-gray-400"
        >  
            Ultima modificación: {{$fecha}}
        </p>
        <label
        class="text-sm font-medium text-gray-600 dark:text-gray-400"
        >
            @php
                echo substr($desc, 0, $caracteres).'...';
            @endphp
        </label>
    </div>
</a>