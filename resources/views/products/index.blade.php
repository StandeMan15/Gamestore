<x-layout>
    @include('products._header')

    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
        @if ($products->count())
            <x-products-grid :products="$products" />

            {{ $products->links() }}
        @else
            <p class="text-center">
                There are no products yet. Please check back later
            </p>
        @endif
    </main>
</x-layout>