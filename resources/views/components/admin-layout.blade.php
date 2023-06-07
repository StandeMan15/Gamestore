<x-header />

<body style="font-family: Open Sans, sans-serif" class="bg-gray-200">
    <section>

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