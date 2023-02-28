@props(['product'])

<footer class="flex justify-between items-center mt-8">
    <div>
        <a href="/{{ $product->category->slug }}/{{ $product->slug }}"
            class="transition-colors duration-300 text-xs font-semibold bg-gray-200 hover:bg-gray-300 rounded-full py-2 px-8">
            More Details
        </a>
    </div>

    <div>
        <button class="add-to-cart bg-gray-500 text-white rounded-xl p-2 fas fa-shopping-cart"> Add to cart</button>
    </div>
</footer>