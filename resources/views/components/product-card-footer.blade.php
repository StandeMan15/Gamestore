@props(['product'])

<footer class="flex justify-between items-center mt-8">
    <div>
        <form method="POST" action="">
            @csrf

            <button class="bg-green-500 text-white rounded-xl p-2" type="submit">
                Voeg toe
                <!-- <i class="fa-solid fa-cart-plus"></i> -->
            </button>
        </form>
    </div>
    <div>
        <a href="/{{ $product->category->slug }}/{{ $product->slug }}"
            class="transition-colors duration-300 text-xs font-semibold bg-gray-200 hover:bg-gray-300 rounded-full py-2 px-8">
            Read More
        </a>
    </div>
</footer>