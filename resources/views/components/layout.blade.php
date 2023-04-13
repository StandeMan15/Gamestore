<!doctype html>

<title>Artitex Gamestore</title>
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

<body style="font-family: Open Sans, sans-serif">
    <section class="px-6 py-8">
        <nav class="h-20 flex justify-between items-center">
            <div>
                <a href="/">
                    <img src="/images/logo.svg" alt="Artitex Logo" width="165" height="16">
                </a>
            </div>

            <div class="relative flex items-center">
                <x-shopping-cart class="mr-4" />

                @auth
                <div class="relative w-32">
                    <div x-data="{ open: false }">
                        <button @click="open = !open" class="flex items-center justify-between bg-white border border-gray-300 shadow-md rounded-md px-3 py-2 text-xs font-bold uppercase">
                            <span class="mr-2">Welkom, {{ auth()->user()->fname }}!</span>
                            <svg x-show="!open" class="w-4 h-4 transform -rotate-90" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.707a1 1 0 0 1 1.414-1.414L10 9.586l3.293-3.293a1 1 0 0 1 1.414 1.414l-4 4a1 1 0 0 1-1.414 0l-4-4z" />
                            </svg>
                            <svg x-show="open" class="w-4 h-4 transform rotate-90" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.707a1 1 0 0 0 1.414-1.414L10 9.586l3.293-3.293a1 1 0 0 0-1.414-1.414l-4 4a1 1 0 0 0 0 1.414l4 4z" />
                            </svg>
                        </button>

                        <div x-show="open" @click.outside="open = false" class="absolute right-0 mt-2 w-32 bg-white border border-gray-300 shadow-md rounded-md">
                            <ul>
                                <li class="text-xs font-bold uppercase px-3">
                                    <a href="/admin">Adminpaneel</a>
                                </li>
                                <li class="text-xs font-semibold text-blue-500 ml-6">
                                    <form method="POST" action="/logout">
                                        @csrf

                                        <button type="submit">Logout</button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                @else
                <div class="relative">
                    <div x-data="{ open: false }">
                        <button @click="open = true" class="ml-2 text-xs font-bold uppercase">
                            <i class="fas fa-cog fa-lg mr-10"></i>
                        </button>

                        <div x-show="open" @click.outside="open = false" class="absolute mt-2 w-32">
                            <ul class="py-2">
                                <li class="text-xs font-bold uppercase px-3">
                                    <a href="/register">Register</a>
                                </li>
                                <li class="text-xs font-bold uppercase px-3">
                                    <a href="/login">Log In</a>
                                </li>
                            </ul>
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