<x-header />

<body style="font-family: Open Sans, sans-serif">
    <section class="px-6 py-8">
        <nav class="h-20 flex justify-between items-center">
            <div>
                <a href="/">
                    <img src="/images/logo.svg" alt="Artitex Logo" width="165" height="16">
                </a>

            </div>
            <x-lang-dropdown />
            <div class="relative flex items-center">
                <x-shopping-cart class="mr-4" />

                @auth
                <div class="relative w-32">
                    <div x-data="{ open: false }">
                        <x-layout-button />

                        <div x-cloak x-show="open" @click.outside="open = false" class="absolute right-0 z-10 mt-2 w-56 origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
                            <div class="py-1" role="none">

                                @if (auth()->user()->is_admin == 1)
                                <a href="/admin" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="menu-item-0">
                                    <i class="fas fa-chart-bar fa-lg"></i>
                                    {{ __('messages.nav.admin') }}
                                </a>
                                @endif

                                <a href="{{route('showuser')}}" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="menu-item-1"><i class="fas fa-user"></i>{{ __('messages.nav.profile') }}</a>

                                <form method="POST" action="/logout">
                                    @csrf

                                    <button type="submit" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="menu-item-2"><i class="fas fa-sign-out-alt"></i>{{ __('messages.nav.logout') }}</button>
                                </form>
                            </div>
                        </div>



                    </div>
                </div>
                @endauth

                @if (!auth()->check())
                <div x-data="{ isOpen: false }" @keydown.escape="isOpen = false">
                    <button @click="isOpen = !isOpen" class="inline-flex w-full justify-center gap-x-1.5 rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50" id="menu-button" aria-expanded="true" aria-haspopup="true">
                        <i class="fas fa-user-cog fa-lg"></i>
                        <svg class="-mr-1 h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                        </svg>
                    </button>

                    <div x-cloak x-show="isOpen" @click.outside="isOpen = false" class="absolute right-0 z-10 mt-2 w-56 origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
                        <div class="py-1" role="none">
                            <a href="/login" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="menu-item-1">{{ __('messages.nav.login') }}</a>
                            <a href="/register" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="menu-item-0">{{ __('messages.nav.register') }}</a>
                        </div>
                    </div>
                </div>

                @endif
            </div>
        </nav>

        {{ $slot }}


    </section>

    <x-flash />
</body>

<script>
    const menuButton = document.getElementById('menu-button');
    const menu = document.querySelector('.origin-top-right');

    menuButton.addEventListener('click', function(event) {
        event.stopPropagation();
    });

    menu.addEventListener('click', function(event) {
        event.stopPropagation();
    });

    document.addEventListener('click', function(event) {
        if (menu.classList.contains('opacity-100')) {
            menu.classList.remove('opacity-100');
            menu.classList.add('opacity-0');
            menu.classList.add('pointer-events-none');
        }
    });
</script>