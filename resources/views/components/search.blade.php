@props(['placeholder', 'create'])
  
<div class="flex justify-start flex-1 lg:mr-32 mb-4">
  <form action="" class="relative w-full max-w-xl mr-6 focus-within:text-purple-500">   
    <div class="absolute inset-y-0 flex items-center pl-2">
      <svg
        class="w-4 h-4 text-gray-700 dark:text-gray-400"
        aria-hidden="true"
        fill="currentColor"
        viewBox="0 0 20 20"
      >
        <path
          fill-rule="evenodd"
          d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
          clip-rule="evenodd"
        >
        </path>
      </svg>
    </div>
    <input
      class="w-full pl-8 pr-2 text-sm text-gray-700 placeholder-gray-600 bg-gray-100 border-0 rounded-md dark:placeholder-gray-500 dark:focus:shadow-outline-gray dark:focus:placeholder-gray-600 dark:bg-gray-700 dark:text-gray-200 focus:placeholder-gray-500 focus:bg-white focus:border-purple-300 focus:outline-none focus:shadow-outline-purple form-input"
      type="text"
      name="search"
      placeholder="{{$placeholder}}"
      aria-label="Search"
      autofocus
      onfocus="this.select()"
    />
    {{-- <span class="text-gray-700 dark:text-gray-400">
      Estados
    </span>
    <select
    class="mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
    name="estado"
    >
        <option value="0">No eliminado</option>
        <option value="1">Eliminado</option>
        <option value="2">Todos</option>
    </select> --}}
  </form> 
  <a
    class="px-3 py-1 text-white transition-colors duration-150 bg-purple-600 border border-r-0 border-purple-600 rounded-md focus:outline-none focus:shadow-outline-purple"
    href="{{$create}}"
  >
  +
</a>
</div> 
  