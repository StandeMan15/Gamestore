<button @click="open = !open" class="flex items-center justify-between bg-white border border-gray-300 shadow-md rounded-md px-3 py-2.5 text-xs font-bold uppercase">
  <span class="mr-2">Welkom, {{ auth()->user()->fname }}!</span>
  <svg x-show="!open" class="w-4 h-4 transform -rotate-90" fill="currentColor" viewBox="0 0 20 20">
    <path fill-rule="evenodd" d="M5.293 7.707a1 1 0 0 1 1.414-1.414L10 9.586l3.293-3.293a1 1 0 0 1 1.414 1.414l-4 4a1 1 0 0 1-1.414 0l-4-4z" />
  </svg>
  <svg x-show="open" class="w-4 h-4 transform rotate-90" fill="currentColor" viewBox="0 0 20 20">
    <path fill-rule="evenodd" d="M5.293 7.707a1 1 0 0 0 1.414-1.414L10 9.586l3.293-3.293a1 1 0 0 0-1.414-1.414l-4 4a1 1 0 0 0 0 1.414l4 4z" />
  </svg>
</button>