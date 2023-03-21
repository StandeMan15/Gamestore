<!doctype html>

<title>Artitex Gamestore</title>
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>

<body style="font-family: Open Sans, sans-serif">
    <section class="px-6 py-8">
        <nav class="md:flex md:justify-between md:items-center">
            <div>
                <a href="/">
                    <img src="/images/logo.svg" alt="Artitex Logo" width="165" height="16">
                </a>
            </div>

            <div class="mt-8 md:mt-0 flex items-center">
                @auth
                <x-shopping-cart />
                    <span class="ml-2 text-xs font-bold uppercase">Welkom, {{ auth()->user()->fname }}!</span>
                    @if (auth()->user()->is_admin == 1)
                        <span class="text-xs font-bold uppercase px-3">
                            <a href="/admin">Adminpanel</a>
                        </span>
                    @endif
                    <form method="POST" action="/logout" class="text-xs font-semibold text-blue-500 ml-6">
                        @csrf

                        <button type="submit">Logout</button>
                    </form>
                @else
                    <x-shopping-cart />
                    <a href="/register" class=" ml-2 text-xs font-bold uppercase">Register</a>
                    <a href="/login" class="ml-6 text-xs font-bold uppercase">Log In</a>
                @endauth

            </div>
        </nav>

        {{ $slot }}


    </section>

    <x-flash />
</body>