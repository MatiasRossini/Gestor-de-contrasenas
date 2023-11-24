@props(['name', 'grupos'])
<div class="w-full">
  <label class="block mt-4 text-sm">
    <span class="text-gray-700 dark:text-gray-400">Grupos</span>
    <select
      id="select-grupo"
      name="{{$name}}[]"
      multiple
      placeholder="Seleccione grupos"
      autocomplete="off"
      class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
    >
      {{$slot}}

    </select>
  </div>
  
  @error($name)
    <p class="text-red-600 text-xs mt-1">{{$message}}</p>
  @enderror
</label>

<script src="https://cdn.jsdelivr.net/npm/tom-select/dist/js/tom-select.complete.min.js"></script>
<script>
  new TomSelect('#select-grupo', {});
</script>


