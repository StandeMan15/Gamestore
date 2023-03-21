@props(['product'])

<footer class="flex justify-between items-center mt-16">
    <div class="relative bottom-0">

        <a href="{{route('addItem')}}" class="bg-green-500 text-white rounded-xl p-2" id='$product->id'>
            Add to Cart
        </a>

    </div>
    <div class="relative bottom-0">
        <a href="/{{ $product->category->slug }}/{{ $product->slug }}" class="transition-colors duration-300 text-xs font-semibold bg-gray-200 hover:bg-gray-300 rounded-full py-2 px-8">
            Read More
        </a>
    </div>
</footer>