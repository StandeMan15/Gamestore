<div style="position: relative;">
    <x-layout>

        <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
            @if ($products->count())

            <x-products-grid :products="$products" :images="$images" />

            {{ $products->links() }}
            @else
            <p class="text-center">
                {{ __('messages.admin.index.no_products') }}
            </p>
            @endif
        </main>
    </x-layout>
</div>

<x-layout-footer />