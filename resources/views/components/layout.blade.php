<x-header />

<body style="font-family: Open Sans, sans-serif" class="bg-gray-200">
    <section class="px-6 py-8 bg-indigo-200">
        <nav class="h-20 flex space-x-8 items-center">
            <div>
                <a href="/" class="block">
                    <img src="/images/logo.png" alt="judo de voltreffer logo" class="object-contain h-32">
                </a>
            </div>
            <div class="w-full">
                <ul class="m-auto flex justify-around">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('info') }}">Info</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('trainers') }}">Trainers</a>
                    </li>
                    <!-- Wedstrijdverslagen, contributie en fotoalbums, vertrouwencontactpersoon, bestuur, huishoudelijk regelement, sociale media -->
                </ul>
            </div>
        </nav>
    </section>
        {{ $slot }}

</body>

<x-layout-footer />