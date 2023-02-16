@props(['products'])

<x-product-featured-card :product="$products[0]" />

@if ($products->count() > 1)
    <div class="lg:grid lg:grid-cols-6">
        @foreach ($products->skip(1) as $product)
        <x-product-card
            :product="$product"
            class="{{ $loop->iteration < 3 ? 'col-span-3' : 'col-span-2' }}"/>
        @endforeach
    </div>
@endif