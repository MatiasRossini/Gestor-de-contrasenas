@if(session()->has('error'))
    <div
    class="mb-4 inline-flex mr-4 ml-4 h-12 items-center rounded-lg bg-red-600 px-6 py-5 text-base text-white"
    role="alert"
    >
        <span class="mr-2">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" />
              </svg>
              
        </span>
        {{session('error')}}
    </div>
@endif

<!-- Recibe contraseña desencriptada y permite copiarla -->
@if(session()->has('decrypt'))
    <div
    class="mb-4 inline-flex mr-4 ml-4 h-12 items-center rounded-lg bg-purple-600 px-6 py-5 text-base text-white"
    role="alert"
    >
        <span class="mr-2">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
              </svg>
              
        </span>
    Contraseña desencriptada! 
    <button 
        id="decryptBtn"
        class="inline-flex items-center px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:underline"
        data-clipboard-target="#decrypt"
        alt="Copiar contraseña desencriptada">
        Copiar
    </button>
    </div>
    {{-- <input aria-hidden="true" id="decrypt" type="text" value="{{session('decrypt')}}"> --}}

    <div style="position:absolute; top:0; left:-500px;">
        <textarea id="decrypt" type="text" rows="1" cols="2">{{session('decrypt')}}</textarea>
    </div>

    <script>
        var clipboard = new ClipboardJS('#decryptBtn');
        console.log(clipboard)


        clipboard.on('success', function(e) {
    console.info('Action:', e.action);
    console.info('Text:', e.text);
    console.info('Trigger:', e.trigger);

    e.clearSelection();
});
        clipboard.on('error', function(e) {
            console.log("BBB")
        });
    </script>
@endif