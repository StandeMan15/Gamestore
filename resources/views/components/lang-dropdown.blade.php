<body>
  <div class="flex h-screen justify-center items-center">
    <div x-data="{ isOpen: false }" class="relative">
      <button @click="isOpen = !isOpen" class="lang-button block appearance-none bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
        <img src="https://www.worldometers.info/img/flags/{{ session()->get('locale') == 'en' ? 'uk' : 'nl' }}-flag.gif" alt="Language icon" class="inline-block w-6 h-6 mr-2">{{ session()->get('locale') == 'en' ? 'EN' : 'NL' }}
        <svg class="fill-current text-gray-600 inline-block h-4 w-4 mt-1 ml-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
          <path d="M10 14l-6-6h12z" />
        </svg>
      </button>

      <div x-cloak x-show="isOpen" @click.away="isOpen = false" class="fixed h-full lang-container left-auto w-full z-50">
        <div class="lang-content bg-white shadow-md rounded-md flex p-4 w-52 items-center" style="margin-top: 10px;">
          <div>
            <div class="p-1">
              <a href="{{ route('changeLang', ['locale' => 'en']) }}" class="hover:no-underline text-black visited:text-black">
                <img src="https://www.worldometers.info/img/flags/uk-flag.gif" alt="English icon" class="inline-block w-6 h-6 mr-2">
                English
              </a>
            </div>

            <br>
            <div class="p-1">
              <a href="{{ route('changeLang', ['locale' => 'nl']) }}" class="hover:no-underline text-black visited:text-black">
                <img src="https://www.worldometers.info/img/flags/nl-flag.gif" alt="Dutch icon" class="inline-block w-6 h-6 mr-2">
                Nederlands
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
</body>

<script>
  const langContainer = document.querySelector('.lang-container');
  const langContent = document.querySelector('.lang-content');
  const langButton = document.querySelector('.lang-button');

  langContainer.addEventListener('click', function(event) {
    if (!langContent.contains(event.target)) {
      langButton.click(); // simulate a click on the button to toggle isOpen variable
    }
  });
</script>